<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
     protected $fillable=[
    	'brand_name',
    	'status',
    	'slug'
    ];

    public function products(){
    	return $this->hasMany('App\models\Product');
    }
}
