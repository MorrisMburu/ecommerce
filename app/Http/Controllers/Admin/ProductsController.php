<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Category;
use App\Section;
use App\Brand;
use Image;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{
	public function Products()
	{
		$products = Product::with(['category'=>function ($query)
		{
			$query->select('id', 'category_name');
		}, 'section'=> function ($query){
			$query->select('id', 'name');
		}])->get();
		//$products = json_decode(json_encode($products));
		//echo "<pre>";print_r($products);die;
		return view('admin/products.products')->with(compact('products'));
	}

	public function updateProductStatus(Request $request)
	{
		if ($request->ajax()) {
			$data = $request->all();
			// echo "<pre>";print_r($data);die;
			if ($data['status']=='Active') {
				$status = 0;
			} else {
				$status = 1;
			}

			Product::where("id", $data['product_id'])->update(['status'=>$status]);
			return response()->json(['status' =>$status, 'product_id'=>$data['product_id']]);
		}
	}

	public function deleteProductImage($id)
	{
		//GetProductImage
		$productImage = Product::select('main_image')->where('id', $id)->first();
		//Get Product Image Path
		$small_image_path = 'images/product_images/small/';
		$medium_image_path = 'images/product_images/medium/';
		$large_image_path = 'images/product_images/large/';
		// Delete Product Image if it exists in Folder
		if (file_exists($small_image_path.$productImage->main_image)) {
			unlink($small_image_path.$productImage->main_image);
		}

		// Delete Product Image if it exists in Folder
		if (file_exists($medium_image_path.$productImage->main_image)) {
			unlink($medium_image_path.$productImage->main_image);
		}

		// Delete Product Image if it exists in Folder
		if (file_exists($medium_image_path.$productImage->main_image)) {
			unlink($medium_image_path.$productImage->main_image);
		}
		// Delete Product Image from Product Table
		Product::where('id', $id)->update(['main_image'=>'']);

		$message =  'Product Image has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();
	}

	public function deleteProductVideo($id)
	{
		$productVideo = Product::select('product_video')->where('id', $id)->first();
		//Get Product Image Path
		$product_video_path = 'videos/product_videos/';
		
		// Delete Product Image if it exists in Folder
		if (file_exists($product_video_path.$productVideo->product_video)) {
			unlink($product_video_path.$productVideo->product_video);
		}

		Product::where('id', $id)->update(['product_video'=>'']);

		$message =  'Product Video has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();

	}

	public function deleteProduct($id)
	{
		Product::where('id', $id)->delete();

		$message =  'Product has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();
	}

	public function addEditProduct(Request $request, $id=null)
	{
		if ($id =="") {
			$title = "Add Product";
			$product = new Product;
			$productdata = array();
			$message = "Product added successfully";

		} else {
			// edit functionality
			$title = "Edit Product";
			$productdata = Product::find($id);
			$productdata = json_decode(json_encode($productdata),true);
			$product = Product::find($id);
			$message = "Product updated successfully";
		}

		if ($request->isMethod('post')) {
			$data = $request->all();
			//echo "<pre>";print_r($data);die;	


			$rules = [
				'category_id' => 'required',
				'brand_id' => 'required',
				'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
				'product_code' => 'required|regex:/^[\w-]*$/',
				'product_price' => 'required|numeric',
				'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
			];

			$customMessages = [
				'category_id.required' => 'category is required',
				'product_name.required' => 'Name is required',
				'product_name.regex' => 'Valid Name is required',
				'product_code.required' =>'Product Code is Required',
				'product_code.regex' =>'Valid Product Code is Required',
				'product_price.required' =>'Product Price is required',
				'product_price.numeric' =>'Product Price is required',
				'product_color.required' =>'Product Color is required',
				'product_color.regex' =>'Valid Product Color is required',

			];

			$this->validate($request, $rules, $customMessages);


			

			

            //Upload Product Image
			if($request->hasFile('main_image')){
				$image_tmp = $request->file('main_image');
				if($image_tmp->isValid()){
                    // Get Image Extension
					$extension = $image_tmp->getClientOriginalExtension();
					// Get Client Original Name
					$image_name= $image_tmp->getClientOriginalName();
                    // Generate New Image Name
					$imageName = $image_name.'-'.rand(111,99999).'.'.$extension;
					$large_image_path = 'images/product_images/large/'.$imageName;
					$medium_image_path = 'images/product_images/medium/'.$imageName;
					$small_image_path = 'images/product_images/small/'.$imageName;
                    // Upload the Image
					Image::make($image_tmp)->save($large_image_path);
					Image::make($image_tmp)->resize(520, 600)->save($medium_image_path);
					Image::make($image_tmp)->resize(260, 300)->save($small_image_path);
					$product->main_image = $imageName;
				}
				
			}

			//Upload Video
			if($request->hasFile('product_video')){
				$video_tmp = $request->file('product_video');
				if($video_tmp->isValid()){
                    // Get video Extension
					$extension = $video_tmp->getClientOriginalExtension();
                    // Generate New video Name
					$videoName = rand(111,99999).'.'.$extension;
					$video_path = 'videos/product_videos/';
					$video_tmp->move($video_path, $videoName);
                    // Upload the video
				}
				$product->product_video = $videoName;
			}


            //Save Product in Table
			$categoryDetails = Category::find($data['category_id']);
			//echo "<pre>";print_r($categoryDetails);die;	
			$product->section_id = $categoryDetails['section_id'];
			$product->category_id = $data['category_id'];
			$product->brand_id = $data['brand_id'];
			$product->product_name = $data['product_name'];
			$product->product_code = $data['product_code'];
			$product->product_color = $data['product_color'];
			$product->product_discount = $data['product_discount'];
			$product->product_weight = $data['product_weight'];
			$product->description = $data['description'];
			$product->washcare = $data['washcare'];
			$product->fabric = $data['fabric'];
			$product->pattern = $data['pattern'];
			$product->sleeve = $data['sleeve'];
			$product->fit = $data['fit'];
			$product->occasion = $data['occasion'];
			$product->meta_title = $data['meta_title'];
			$product->meta_keywords = $data['meta_keywords'];
			$product->meta_description = $data['meta_description'];
			if (!empty($data['is_featured'])) {
				$product->is_featured = $data['is_featured'];
			}else{
				$product->is_featured ="No";
			}
			$product->save();

			session::flash('success_message', $message);
			return redirect('admin/products');

		}
		$fabricArray =array('cotton', 'polyester', 'wool');
		$sleeveArray =array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
		$patternArray =array('Checked', 'Plain', 'Self','Printed', 'Solid');
		$fitArray =array('Regular', 'Fit');
		$occasionArray =array('Formal', 'Casual');

		//Sections With Arrays
		$categories = Section::with('categories')->get();
		$categories = json_decode(json_encode($categories), true);
		//echo "<pre>";print_r($categories);die;

		//Get all Brands
		$brands = Brand::where('status', 1)->get();
		$brands = json_decode(json_encode($brands), true);
		//echo "<pre>";print_r($brands);die;

		return view('admin.products.add_edit_product')->with(compact('title', 'fabricArray', 'sleeveArray', 'patternArray', 'fitArray', 'occasionArray','categories', 'brands', 'productdata'));
	}

	public function addAttributes(Request $request, $id) 
	{

		if ($request->isMethod('post')) {
			$data = $request->all();
			foreach ($data['sku'] as $key => $value) {
				if (!empty($value)) {

					$attrCountSKU = ProductsAttribute::where(['sku'=>$value])->count();
					if ($attrCountSKU>0) {
						$message = 'SKU already exists. Add a unique one';
						session::flash('error_message', $message);
						return redirect()->back();
					}

					$attrCountSize = ProductsAttribute::where(['product_id'=>$id, 'size'=>$data['size'][$key]])->count();
					if ($attrCountSize>0) {
						$message = 'Size already exists.';
						session::flash('error_message', $message);
						return redirect()->back();
					}

					$attribute = new ProductsAttribute;
					$attribute->product_id = $id;
					$attribute->sku = $value;
					$attribute->size = $data['size'][$key];
					$attribute->price = $data['price'][$key];
					$attribute->stock = $data['stock'][$key];
					$attribute->status = 1;
					$attribute->save();
				}
			}

			$message =  'Product Attribute has been added successfully';

			session::flash('success_message', $message);
			return redirect()->back();
		}
		$title = "Edit Product";
		$productdata = Product::select('id', 'product_name','product_code', 'product_color', 'main_image')->with('attributes')->find($id);
		$productdata = json_decode(json_encode($productdata),true);
		//echo "<pre>";print_r($productdata);die;

		return view('admin.products.add_attributes')->with(compact('title','productdata')); 

	}

	public function editAttributes(Request $request, $id)
	{
		$data = $request->all();
		//echo "<pre>";print_r($data);die;
		foreach ($data['attrId'] as $key => $attr) {
			if (!empty($attr)) {
				ProductsAttribute::where(['id'=>$data['attrId'][$key]])->update(['price'=>$data['price'][$key], 'stock'=>$data['stock'][$key]]);
			}
		}

		$message =  'Product Attribute has been updated successfully';

		session::flash('success_message', $message);
		return redirect()->back();
	}

	public function updateAttributeStatus(Request $request)
	{
		if ($request->ajax()) {
			$data = $request->all();
			// echo "<pre>";print_r($data);die;
			if ($data['status']=='Active') {
				$status = 0;
			} else {
				$status = 1;
			}

			ProductsAttribute::where("id", $data['attribute_id'])->update(['status'=>$status]);
			return response()->json(['status' =>$status, 'attribute_id'=>$data['attribute_id']]);
		}
	}

	public function deleteAttribute($id)
	{
		ProductsAttribute::where('id', $id)->delete();

		$message =  'Product has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();
	}

	public function addImages(Request $request, $id)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			//echo "<pre>";print_r($data);die;
			if ($request->hasFile('images')) {
				$images = $request->file('images');
				//echo "<pre>";print_r($images);die;
				foreach ($images as $key => $image) {
					$productImage = new ProductsImage;
					$image_tmp = Image::make($image);
					$extension = $image->getClientOriginalExtension();
					$imageName = rand(111,99999).time().'.'.$extension;

					$large_image_path = 'images/product_images/large/'.$imageName;
					$medium_image_path = 'images/product_images/medium/'.$imageName;
					$small_image_path = 'images/product_images/small/'.$imageName;
                    // Upload the Image
					Image::make($image_tmp)->save($large_image_path);
					Image::make($image_tmp)->resize(520, 600)->save($medium_image_path);
					Image::make($image_tmp)->resize(260, 300)->save($small_image_path);

					$productImage->image = $imageName;
					$productImage->product_id= $id;
					$productImage->status =1;
					$productImage->save();
				}

				$message =  'Product Images have been added successfully';

				session::flash('success_message', $message);
				return redirect()->back();
			}
		}
		$title = "Add Images";
		$productdata = Product::with('images')->select('id', 'product_name','product_code', 'product_color', 'main_image')->find($id);
		$productdata = json_decode(json_encode($productdata),true);
		//echo "<pre>";print_r($productdata);die;

		return view('admin.products.add_images')->with(compact('productdata', 'title'));

	}

	public function updateImageStatus(Request $request)
	{
		if ($request->ajax()) {
			$data = $request->all();
			// echo "<pre>";print_r($data);die;
			if ($data['status']=='Active') {
				$status = 0;
			} else {
				$status = 1;
			}

			ProductsImage::where("id", $data['image_id'])->update(['status'=>$status]);
			return response()->json(['status' =>$status, 'image_id'=>$data['image_id']]);
		}
	}

	public function deleteImage($id)
	{
		//GetProductImage
		$productImage = ProductsImage::select('image')->where('id', $id)->first();
		//Get Product Image Path
		$small_image_path = 'images/product_images/small/';
		$medium_image_path = 'images/product_images/medium/';
		$large_image_path = 'images/product_images/large/';
		// Delete Product Image if it exists in Folder
		if (file_exists($small_image_path.$productImage->image)) {
			unlink($small_image_path.$productImage->image);
		}

		// Delete Product Image if it exists in Folder
		if (file_exists($medium_image_path.$productImage->image)) {
			unlink($medium_image_path.$productImage->image);
		}

		// Delete Product Image if it exists in Folder
		if (file_exists($medium_image_path.$productImage->image)) {
			unlink($medium_image_path.$productImage->image);
		}
		// Delete Product Image from Product Table
		ProductsImage::where('id', $id)->delete();

		$message =  'Product Image has been deleted successfully';
		
		session::flash('success_message', $message);
		return redirect()->back();
	}
}
