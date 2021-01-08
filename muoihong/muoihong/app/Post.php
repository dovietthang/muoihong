<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table ='post';
    public $fillable = ['name','slug','id_cate','description','active','image','date'];
    function find_cate($id){
    	$cate = Category::find($id);
    	if($cate){
    		return $cate->name;
    	}else{
    		return 'chưa có danh mục';
    	}
    }
}
