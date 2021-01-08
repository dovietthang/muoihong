<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Member;
use DB;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $member  = Member::paginate(15);
        return view('admin.member.member',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Member();
        $member = Member::all();
        return view('admin.member.form',compact('model','member'));
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
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Member::find($id);
        $member = Member::where('id','<>',$id)->get();
        return view('admin.member.form',compact('model','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Member::find($id);
        if($delete->delete()){
             $list_order = DB::table('shop_order')->where('member_id',$id)->get();
             foreach ($list_order as $key => $value) {
                $delete_order =  Order::find($value->id);
               if($delete_order->delete()){
                   DB::table('order_product')->where('id_order','=',$value->id)->delete();  
               }
           }
        }
        echo json_encode('success');
    }
    public function update_status($id){
        $id_cate = Member::where('id',$id)->value('active');
        if ($id_cate == 1) {
             DB::table('member')->where('id',$id)->update(['active'=>0]);  
            echo json_encode("fa-remove");
        }else{
            DB::table('member')->where('id',$id)->update(['active'=>1]); 
            echo json_encode("fa-check");
        }
       
    }
    public function save(Request $request){
        if($request->id){
            $model = Member::find($request->id);
        }else{

           $model = new Member(); 
       }
       $messages = [
        'name.max' =>'tên quá dài',
        'email.unique'    => 'email đã được sử dụng',
        'cmnd.unique'    => 'số cmnd đã được sử dụng',
       ];
        $validatedData = Validator::make($request->all(), [
            'name' =>'max:255',
            'email' => 'unique:member,email,'.$request->id,
            'cmnd' =>'unique:member,cmnd,'.$request->id,
        ],$messages);

      if ($validatedData->fails()) {
        if(isset($request->id)){
            return redirect()
                        ->route('member.edit',['id'=> $request->id])
                        ->withErrors($validatedData)
                        ->withInput();
        }else{
            return redirect()
                        ->route('member.create')
                        ->withErrors($validatedData)
                        ->withInput();
        }
       }
       $model->fill($request->all());
       $model->password = bcrypt($request->input('password'));
       $model->save();
       if(isset($request->id)){
         return redirect()->route('member.edit',['id'=> $request->id])->with('check','ok');
       }else{
         return redirect()->route('member.create')->with('check','ok');
       }
    }
}
