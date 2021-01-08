<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        if(!is_null($rq->keyword)){
            
            if($rq->keyword === 'all'){
                $key='all';
                $list_order = Order::orderBy('id', 'desc')->paginate(15);
                $list_order->withPath('?keyword='.$key);
                return view('admin.order.order',compact('list_order','key'));
            }
            if($rq->keyword === 'null'){
                $key=$rq->keyword;
                $list_order = Order::where('active',null)->orderBy('id', 'desc')->paginate(15);
                $list_order->withPath('?keyword='.$key);
                return view('admin.order.order',compact('list_order','key'));
            }
            $key=$rq->keyword;
            $list_order = Order::where('active','=',$rq->keyword)->orderBy('id', 'desc')->paginate(15);
            $list_order->withPath('?keyword='.$key);
            return view('admin.order.order',compact('list_order','key'));
           
        }
        $key='all';
        $list_order = Order::orderBy('id', 'desc')->paginate(15);
        return view('admin.order.order',compact('list_order','key'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  Order::find($id);
        if($delete->delete()){
             DB::table('order_product')->where('id_order','=',$id)->delete();  
        }
        echo json_encode('success');
    }
    public function update_status($id){
        $id_cate = Order::where('id',$id)->value('active');
        if ($id_cate == 1) {
             DB::table('shop_order')->where('id',$id)->update(['active'=>0]);  
            echo json_encode("fa-remove");
        }else{
            DB::table('shop_order')->where('id',$id)->update(['active'=>1]); 
            echo json_encode("fa-check");
        }
       
    }
    public function list_product($id){
        
        return view('admin.order.order_product',$this->list_order_product($id));
    }
}
