<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $fillable=[
    	'f_name',
    	'l_name',
    	'company_name',
    	'phone',
    	'email',
    	'country',
    	'address',
    	'postcode',
    	'town',
    	'other_notes'
    ];

    public function payments(){
    	return $this->hasMany('App\models\Payment');
    }
}
