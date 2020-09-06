<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	public static function Sections()
	{
		$getSections = Section::with('categories')->where('status', 1)->get();
		$getSections = json_decode(json_encode($getSections),true);
		return $getSections;	
	}
	public function Categories()
	{
		return $this->hasMany('App\Category', 'section_id')->where(['parent_id'=>'ROOT', 'status'=>1])->with('subcategories');
	}
}
