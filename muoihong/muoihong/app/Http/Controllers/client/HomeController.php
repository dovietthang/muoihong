<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;
use App\Post;
use App\Member;



class HomeController extends Controller
{
    public function index(){
        $product = Product::select('id','name','price','slug','image')->where('active',1)->paginate(15);
    	return view('welcome',compact('product'));
    }
    function list_product($id){
        $list_product = Product::select('id','name','slug','image','price')->where([['id_cate','=',$id],['active','=',1]])->paginate(6);
        $cate = Category::find($id)->name;
       return view('client.product.list_product',compact('list_product','cate'));
    }
    function detail_product($id){
        $detail_product = Product::find($id);
    	return view('client.product.detail',compact('detail_product'));
    }
    function contact(){
    	return view('client.contact');
    }
    function submit_contact(Request $request){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $data =[
            'ip' => $ip,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'note' => $request->note,
            'address'=>$request->address,
            'date'=>date('d/m/Y')
        ];
        DB::table('contact')->insert($data);
        if($request->check == 'homepage'){
            return redirect()->route('homepage')->with('check_contact', "ok");
        }
        return redirect()->route('client.contact')->with('check_contact', "ok");
    }
    function list_post($id,$slug){
        $list_post = Post::select('id','name','slug','image','date')->where([['id_cate','=',$id],['active','=',1]])->get();
        $cate = Category::find($id)->name;
       return view('client.post.list_post',compact('list_post','cate'));
    }
    
    function detail_post($id){
        $detail_post = Post::find($id);
        $id_cate = $detail_post->id_cate;
        $name_cate =  DB::table('category')
        ->select('menu.name as menu_name','category.name as cate_name','menu.slug as slug_menu','category.id as id_cate')
        ->join('menu','menu.id','category.id_menu')->where('category.id',$id_cate)->first();
        $list_post_relate = Post::select('id','name','slug','date')->where([
            ['id_cate','=',$id_cate],
            ['id','<>',$id],
            ['active','=',1]
        ])->orderBy('id', 'desc')->paginate(10);
        return view('client.post.detail_post',compact('detail_post','list_post_relate','name_cate'));
    }
    
}
