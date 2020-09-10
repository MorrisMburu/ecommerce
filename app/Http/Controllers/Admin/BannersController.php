<?php

namespace App\Http\Controllers\Admin;
use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Image;

class BannersController extends Controller
{
	public function banners()
	{
		$banners = Banner::get()->toArray();

		return view('admin.banners.banners')->with(compact('banners'));
	}

	public function updateBannerStatus(Request $request)
	{
		if ($request->ajax()) {
			$data = $request->all();
			// echo "<pre>";print_r($data);die;
			if ($data['status']=='Active') {
				$status = 0;
			} else {
				$status = 1;
			}

			Banner::where("id", $data['banner_id'])->update(['status'=>$status]);
			return response()->json(['status' =>$status, 'banner_id'=>$data['banner_id']]);
		}

		return redirect()->back();

	}

	public function deleteBanner($id)
	{
		$bannerImage = Banner::where('id', $id)->first();

		$banner_image_path = '/images/banner_images/';

		if (file_exists($banner_image_path.$bannerImage->image)) {
			unlink($banner_image_path.$bannerImage->image);
		}

		Banner::where('id', $id)->delete();

		$message =  'Banner has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();
	}

	public function addEditBanner(Request $request, $id=null)
	{
		if ($id=="") {
			$banner = new Banner;
			$title ="Add Banner Image";
			$message = "Banner added successfully";
		} else {
			$banner = Banner::find($id);
			$title ="Edit Banner Image";
			$message = "Banner updated successfully";
		}

		if ($request->isMethod('post')) {
			$data = $request->all();
			//echo "<pre>";print_r($data);die;
			$banner->link = $data['link'];
			$banner->title = $data['title'];
			$banner->alt = $data['alt'];

			//Upload banner Image
			if($request->hasFile('image')){
				$image_tmp = $request->file('image');
				if($image_tmp->isValid()){
                    // Get Image Extension
					$extension = $image_tmp->getClientOriginalExtension();
					// Get Client Original Name
					$image_name= $image_tmp->getClientOriginalName();
                    // Generate New Image Name
					$imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
					$banner_image_path = 'images/banner_images/'.$imageName;
                    // Upload the Image
					Image::make($image_tmp)->resize(1170, 480)->save($banner_image_path);
					$banner->image = $imageName;
				}
				
			}
			$banner->save();
			session::flash('sucesss_message', $message);
			return redirect('admin/banners');
		}
		return view('admin.banners.add_edit_banner')->with(compact('title', 'banner', 'message'));
	}
}
