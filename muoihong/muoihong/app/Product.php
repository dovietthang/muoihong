<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Product extends Model
{
    protected $table ='product';
    public $fillable = ['name','slug','id_cate','description','price','ma_sp','quantity','active','image'];
    function find_cate($id){
    	$cate = Category::find($id);
    	if($cate){
    		return $cate->name;
    	}else{
    		return 'chưa có danh mục';
    	}
    }
}
