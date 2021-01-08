<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Order;
use Config;
use Illuminate\Support\Facades\File;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function list_order_product($id){
    	$data['list_order_product']= DB::table('shop_order')
                             ->select('product.id','product.price','product.name','product.image','order_product.qty')
                             ->join('order_product', 'shop_order.id', '=', 'order_product.id_order')
                             ->join('product', 'order_product.id_product', '=', 'product.id')
                             ->where('id_order',$id)
                             ->get();
        $data['code_order'] = Order::find($id)->code_order;
        return $data;
    }
    public function search_order_product($id,$keyword=''){
        $data['list_order_product']= DB::table('shop_order')
                             ->select('product.id','product.price','product.name','product.image','order_product.qty')
                             ->join('order_product', 'shop_order.id', '=', 'order_product.id_order')
                             ->join('product', 'order_product.id_product', '=', 'product.id')
                             ->where('id_order',$id)
                             ->Where('name','like', '%' . $keyword . '%')
                             ->get();
        $data['code_order'] = Order::find($id)->code_order;
        return $data;
    }
    function utf8convert($str) {
    if(!$str) return false;
    $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
     foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
     return $str;
   }
    function utf8tourl($text){
        $text = strtolower($this->utf8convert($text));
        $text = str_replace( "ß", "ss", $text);
        $text = str_replace( "%", "", $text);
        $text = preg_replace("/[^_a-zA-Z0-9 -]
        /", "",$text);
        $text = str_replace(array('%20', ' '), '-', $text);
        $text = str_replace("----","-",$text);
        $text = str_replace("---","-",$text);
        $text = str_replace("--","-",$text);
    return $text;
    }
    public function remove_path($path){
        $realPath = public_path($path);
        if (File::exists($realPath)) {
            return File::delete($realPath);
        }

        return true;
    }
}
