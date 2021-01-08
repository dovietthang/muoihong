<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post  = Post::select('id','id_cate','image','name','active')->paginate(15);
        return view('admin.post.post',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Post();
        return view('admin.post.form',compact('model'));
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Post::find($id);
        return view('admin.post.form',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);
        $post->delete();
        $this->remove_path('post_image/'.$post->image);
        echo json_encode('success');
    }
    public function update_status($id){
        $id_cate = Post::where('id',$id)->value('active');
        if ($id_cate == 1) {
             DB::table('post')->where('id',$id)->update(['active'=>0]);  
            echo json_encode("fa-remove");
        }else{
            DB::table('post')->where('id',$id)->update(['active'=>1]); 
            echo json_encode("fa-check");
        }
       
    }
    public function save(Request $request){
        if($request->id){
            $model = Post::find($request->id);
        }else{

           $model = new Post(); 
       }
       $fileName="";
        if ($request->hasFile('image')) {
    
            $file = $request->image;
            $fileName= time().$file->getClientOriginalName();
            $file->move('post_image',$fileName);
        }else{
         $fileName = $model->image;
        }
       $model->fill($request->all());
       $model->image = $fileName;
       $model->date = date('d/m/Y');
       $model->slug = $this->utf8tourl($this->utf8convert($request->input('name')));
       $model->save();
       if(isset($request->id)){
         return redirect()->route('post.edit',['id'=> $request->id])->with('check','ok');
       }else{
         return redirect()->route('post.create')->with('check','ok');
       }
    }
}
