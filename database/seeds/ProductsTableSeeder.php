<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$productRecords = [
    		['id'=>1, 'category_id'=>16, 'section_id'=>1, 'product_name'=>'Blue T-Shirt', 'product_code'=>'B10000', 'product_color'=>'Blue', 'product_price'=>100, 'product_discount'=>20, 'product_weight'=>20, 'product_video'=>'', 'main_image'=>'', 'description'=>'Blue T Shirt', 'washcare'=>'machine','fabric'=>'wool', 'pattern'=>'checked','sleeve'=>'', 'fit'=>'', 'occasion'=>'Casual', 'meta_title'=>'', 'meta_description'=>'', 'meta_keywords'=>'', 'is_featured'=>'No', 'status'=>1],

    		['id'=>2, 'category_id'=>16, 'section_id'=>1, 'product_name'=>'Red Casual T-Shirt', 'product_code'=>'R10000', 'product_color'=>'Red', 'product_price'=>100, 'product_discount'=>20, 'product_weight'=>20, 'product_video'=>'', 'main_image'=>'', 'description'=>'Red T Shirt', 'washcare'=>'machine','fabric'=>'wool', 'pattern'=>'checked','sleeve'=>'', 'fit'=>'', 'occasion'=>'Casual', 'meta_title'=>'', 'meta_description'=>'', 'meta_keywords'=>'', 'is_featured'=>'No', 'status'=>1],

    	];

		Product::insert($productRecords);
    }
}

