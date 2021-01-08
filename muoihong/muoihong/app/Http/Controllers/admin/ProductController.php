<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $product  = Product::select('id','id_cate','image','name','ma_sp','price','quantity','active')->paginate(15);
        return view('admin.product.product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Product();
        return view('admin.product.form',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::find($id);
        return view('admin.product.form',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  Product::find($id);
        $product->delete();
        $this->remove_path('product_image/'.$product->image);
        echo json_encode('success');
    }
    public function update_status($id){
        $id_cate = Product::where('id',$id)->value('active');
        if ($id_cate == 1) {
             DB::table('product')->where('id',$id)->update(['active'=>0]);  
            echo json_encode("fa-remove");
        }else{
            DB::table('product')->where('id',$id)->update(['active'=>1]); 
            echo json_encode("fa-check");
        }
       
    }
    public function save(Request $request){

        if($request->id){
            $model = Product::find($request->id);
        }else{

           $model = new Product(); 
       }
       $fileName="";
        if ($request->hasFile('image')) {
    
            $file = $request->image;
            $fileName= time().$file->getClientOriginalName();
            $file->move('product_image',$fileName);
        }else{
         $fileName = $model->image;
        }
       $model->fill($request->all());
       $model->image = $fileName;
       $model->slug = $this->utf8tourl($this->utf8convert($request->input('name')));
       $model->save();
       if(isset($request->id)){
         return redirect()->route('product.edit',['id'=> $request->id])->with('check','ok');
       }else{
         return redirect()->route('product.create')->with('check','ok');
       }
    }
}
