<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
    	'product_name',
    	'price',
    	'status',
        'slug',
        'description',
    	'category_id'
    ];

    public function category(){
    	return $this->belongsto('App\models\ProductCategory');
    }


    public function product_image(){
    	return $this->hasMany('App\models\ProductImage');
    }
}
