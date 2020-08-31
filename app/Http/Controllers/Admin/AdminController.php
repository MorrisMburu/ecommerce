<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use Image;

use App\Admin;

class AdminController extends Controller
{
    public function index () {
        Session::put('page', 'dashboard');
    	return view('admin.index');
    }

    public function login (Request $request) {
    	if ($request->ismethod('post')) {
    		$data = $request->all();

            $rules =[
                'email' => 'required|email|max:255',
                'password'=>'required'
            ];

            $customMessages = [
                'email.required' => 'Emaiĺ is required',
                'email.email' => 'Valid emaiĺ is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules, $customMessages);

    		if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
    			return redirect('admin/dashboard');
    		} else{
                Session::flash('error_message', 'Invalid Emaiĺ or Password');
    			return redirect()->back();
    		}
    	}
    	return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function settings(){
        Session::put('page', 'settings');
        $adminDetails = Admin:: where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkCurrentPassword(Request $request){
        $data = $request->all();
        if (Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            echo "true";
        } else{
            echo "false";
        };
    }

    public function updateCurrentPassword(Request $request){
        if ($request->ismethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
                if($data['new_pwd']==$data['confirm_pwd']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                        Session::flash('success_message', 'New Password changed successfully');
                    } else{
                        Session::flash('error_message', 'New Password does not match');
                    }
            } else{
                Session::flash('error_message', 'Your current Password is incorrect');
            }   
        return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request){
        Session::put('page', 'update-admin-details');
        if ($request->ismethod('post')) {
            $data = $request->all();

            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
                'admin_image' => 'image'

            ];

            $customMessages = [
                'admin_name.required' => 'name is required',
                'admin_name.alpha' => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric' => 'Enter Valid Mobile',
                'admin_image.image' => 'Enter valid image'
            ];

            $this->validate($request, $rules, $customMessages);

 
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                    // Upload the Image
                    Image::make($image_tmp)->resize(400, 400)->save($imagePath);
                }
            }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
            }else{
                $imageName = "";
            }

            //Update admin details
            Admin::where('email', Auth::guard('admin')->user()->email)->update([
                'name' =>$data['admin_name'],
                'mobile' =>$data['admin_mobile'],
                'image' =>$imageName
            ]);
            Session::flash('success_message', 'adminDetails have been updated successfully');
        }
        return view('admin.update_admin_details');
    }
}
