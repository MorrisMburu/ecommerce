<?php

namespace App\Http\Controllers;

use App\models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategory= ProductCategory::all();
        return view('backend.productcategory.index', compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.productcategory.create');  
    }
    
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {

        $slug=Str::slug($request->brand_name, '-');

         ProductCategory::create([
            'brand_name'=>$request->brand_name,
            'slug'=>$slug
        ]);
        return redirect('dashboard/productcategory');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productcategory)
    {
            return view('backend.productcategory.update', compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productcategory)
    {
        $slug=Str::slug($request->brand_name, '-');

         $productcategory->update([
            'brand_name'=>$request->brand_name,
            'slug'=>$slug
        ]);
        return redirect('dashboard/productcategory');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productcategory)
    {
        $productcategory->delete();
        return redirect('dashboard/productcategory');

    }
}
