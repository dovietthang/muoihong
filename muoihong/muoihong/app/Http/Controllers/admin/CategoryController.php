<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $check_cate =  $request->check_cate;
        $category  = Category::where('check_cate',$check_cate)->get();
        return view('admin.category.category',compact('category','check_cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = new Category();
        $check_cate =  $request->check_cate;
        return view('admin.category.form',compact('model','check_cate'));
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
    public function edit(Request $request,$id)
    {
        $model = Category::find($id);
        $check_cate =  $request->check_cate;
        return view('admin.category.form',compact('model','check_cate'));
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
        $delete =  Category::find($id);
        if($delete->delete()){
             DB::table('product')->where('id_cate','=',$id)->delete();  
        }
        echo json_encode('success');
    }
    public function update_status($id){
        $id_cate = Category::where('id',$id)->value('active');
        if ($id_cate == 1) {
             DB::table('category')->where('id',$id)->update(['active'=>0]);  
            echo json_encode("fa-remove");
        }else{
            DB::table('category')->where('id',$id)->update(['active'=>1]); 
            echo json_encode("fa-check");
        }
       
    }
    public function save(Request $request){
        if($request->id){
            $model = Category::find($request->id);
        }else{

           $model = new Category(); 
       }
       $model->fill($request->all());
       $model->save();
       if(isset($request->id)){
         return redirect()->route('category.edit',['id'=> $request->id,'check_cate' => $request->check_cate])->with('check','ok');
       }else{
         return redirect()->route('category.create',['check_cate' => $request->check_cate])->with('check','ok');
       }
    }
}
