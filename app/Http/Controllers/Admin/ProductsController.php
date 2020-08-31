<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Section;

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
		$productImage = Product::select('product_image')->where('id', $id)->first();
		//Get Producty Image Path
		$product_image_path = 'images/product_images/';
		// Delete Product Image if it exists in Folder
		if (file_exists($product_image_path.$productImage->product_image)) {
			unlink($product_image_path.$productImage->product_image);
		}
		// Delete Product Image from Product Table
		Product::where('id', $id)->update(['product_image'=>'']);

		$message =  'Product Image has been deleted successfully';
		
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

		} else {
			// edit functionality
			$title = "Edit Product";
		}

		$fabricArray =array('cotton', 'polyester', 'wool');
		$sleeveArray =array('Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless');
		$patternArray =array('Checked', 'Plain', 'Self','Printed', 'Solid');
		$fitArray =array('Regular', 'Fit');
		$occasionArray =array('Formal', 'Casual');

		//Sections With Arrays
		$categories = Section::with('categories')->get();
		//$categories = json_decode(json_encode('$categories'), true);
		//echo "<pre>";print_r($categories);die;

		return view('admin.products.add_edit_product')->with(compact('title', 'fabricArray', 'sleeveArray', 'patternArray', 'fitArray', 'occasionArray','categories'));
	}
}
