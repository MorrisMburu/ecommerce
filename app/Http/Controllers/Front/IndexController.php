<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function index()
	{
		$page_name = "index";

		$featuredCount = Product::where('is_featured', 'Yes')->where('status',1)->count();
		$featuredItems = Product::where('is_featured', 'Yes')->where('status',1)->get()->toArray();
		$featuredItemsChunk = array_chunk($featuredItems, 4);
		//Get New Products
		$newProducts = Product::orderBy('id', 'Desc')->where('status',1)->limit(6)->get()->toArray();
		//echo "<pre>";print_r($newProducts);die;
		return view('front.index')->with(compact('page_name','featuredCount','featuredItemsChunk', 'newProducts'));
	}
}
