<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';
    public $fillable = ['name','id_menu','check_cate','active'];
    static function find_menu($id){
    	$find_menu = Category::where([
                ['check_cate','=','post'],
                ['id_menu','=',$id],
                ['active','=',1]
                ])->get();
    	return $find_menu;
    }
}
