<?php

use Illuminate\Database\Seeder;
use App\ProductsImage;

class ProductsImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductsImageRecords = [
        	['id'=>1,'product_id'=>1, 'image'=>'Blue.jpg-72595.jpg', 'status'=>1]
        ];

        ProductsImage::insert($ProductsImageRecords);
    }
}
