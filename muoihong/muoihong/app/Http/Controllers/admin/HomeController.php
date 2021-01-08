<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config;
use DB;
class HomeController extends Controller
{
    public function index(){
        $lien_he = DB::table('contact')->count();
        $san_pham = DB::table('product')->count();
        $tin = DB::table('post')->count();
        $dat_hang = DB::table('shop_order')->count();
        $thanh_vien = DB::table('member')->count();
        $danh_muc = DB::table('category')->where('check_cate','product')->count();
        $chuyen_muc = DB::table('category')->where('check_cate','post')->count();
    	return view('admin.dashboard',compact('lien_he','san_pham','tin','dat_hang','danh_muc','chuyen_muc','thanh_vien'));
    }
    function contact(){
        $contact = DB::table('contact')->paginate(15);
        return view('admin.contact.contact',compact('contact'));
    }
    function delete_contact($id){
        DB::table('contact')->where('id', '=', $id)->delete();
        echo json_encode('success');
    }
    function config(){
    	$key = Config::all();
    	$model = [];
    	foreach ($key as $key => $value) {
    		$model[$value->keys]['key'] =$value->keys;
    		$model[$value->keys]['value'] =$value->value;
    	}

    	return view('admin.config.config',compact('model'));
    }
    function configsave(Request $rq){
       // dd($rq->value);
       foreach ($rq->value as $key => $value) {
            DB::table('config')->updateOrInsert(
       		['keys' =>  $key]
        	);
        	DB::table('config')
            ->where('keys',$key)
            ->update(['value' => $value]);
       

     }
     return back()->with('check_config','ok');
   }
}
