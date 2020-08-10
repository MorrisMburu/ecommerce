<?php

namespace App\Http\Controllers;

use App\models\ProductImage;
use App\models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productimage= ProductImage::all();
        return view('backend.productimage.index', compact( 'productimage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product= Product::all();
        return view('backend.productimage.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug=Str::slug($request->img_title, '-');

        $image = time().'.'.$request->img->extension();
        $request->img->move(public_path('images'), $image);

        ProductImage::create([
            'img_title'=>$request->img_title,
            'img'=>$image,
            'product_id'=>$request->product_id,

            'slug'=>$slug
        ]);

        return redirect('dashboard/productImage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        $product=Product::all();
        return view('backend.productimage.update', compact('productImage', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $slug=Str::slug($request->img_title, '-');

        $productImage->update([
            'img_title'=>$request->img_title,
            'img'=>$request->img,
            'product_id'=>$request->product_id,

            'slug'=>$slug
        ]);

        return redirect('dashboard/productImage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return redirect('dashboard/productImage');
    }
}
