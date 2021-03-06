<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords = [
        	['id'=>1, 'name'=>'GAP', 'status'=>1],
        	['id'=>2, 'name'=>'Arrow', 'status'=>1],
        	['id'=>3, 'name'=>'Levi', 'status'=>1],
        	['id'=>4, 'name'=>'England', 'status'=>1],
        	['id'=>5, 'name'=>'Monte Carlo', 'status'=>1],
        ];

        Brand::insert($brandRecords);
    }
}
