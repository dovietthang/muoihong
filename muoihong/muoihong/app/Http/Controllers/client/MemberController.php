<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use DB;
Use \Carbon\Carbon;
Use App\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class MemberController extends Controller
{
	// public function __construct()
 //    {
 //      $this->middleware('guest:member')->except('logout');
 //    }
	public function postLogin(Request $rq){

    	if (Auth::guard('member')->attempt(['email' => $rq->email, 'password' => $rq->password], $rq->remember)) {
    		$data['status'] = 'success';
    		$data['auth'] = Auth::guard('member')->user()->name;
    		return json_encode($data);
    	}
    	return json_encode("error");
    }
    function postLogout(){
    	Auth::guard('member')->logout();
        return redirect()->route('homepage');
    }
    function detail_member(){
    	return view('client.member.detail_member');
    }
    function update_member(Request $request){

       $model = Member::find($request->id);
       $messages = [
        'name.max' =>'tên quá dài',
        'email.unique'    => 'email đã được sử dụng',
        'cmnd.unique'    => 'số cmnd đã được sử dụng',
        // 'stk.unique'    => 'số tài khoản ngân hàng đã được sử dụng',s
       ];
        $validatedData = Validator::make($request->all(), [
            'name' =>'max:255',
            'email' => 'unique:member,email,'.$request->id,
            'cmnd' =>'unique:member,cmnd,'.$request->id,
            // 'stk' =>'unique:member,stk,'.$request->id,
        ],$messages);

      if ($validatedData->fails()) {
         return redirect()
                        ->route('detail_member')
                        ->withErrors($validatedData)
                        ->withInput();
       }
       $model->fill($request->all());
       $model->save();
       return redirect()->route('detail_member')->with('check_save_member','ok');
    }
    function change_password(){
    	return view('client.member.change_password');
    }
    function update_password(Request $rq){
        $member = Member::find(Auth::guard('member')->user()->id);
        $password = $rq->input('password');
        $model = $member->password;
        if(Hash::check($password, $model)) {
            if($rq->change_password_1 != $rq->change_password_2){
                return redirect()->route('change_password')->with('check_change_password','check_pass_error');
            }
            $member->fill($rq->all());
            $member->password = Hash::make($rq->change_password_2);
            $member->save();
             return redirect()->route('change_password')->with('check_change_password','ok');
        }else{
             return redirect()->route('change_password')->with('check_change_password', "error");
        }
    }
    function tra_cuu(Request $rq){
       if($rq->keyword){
        $list_order = Order::where('member_id',Auth::guard('member')->user()->id)
                      ->where('code_order','like','%'.$rq->keyword.'%')
                      ->paginate(15);
        $sum_order = Order::where('member_id',Auth::guard('member')->user()->id)
                      ->where('code_order','like','%'.$rq->keyword.'%')
                      ->sum('price');
        return view('client.member.list_order',compact('list_order','sum_order'));
       }
        $list_order = Order::where('member_id',Auth::guard('member')->user()->id)->paginate(15);
        $sum_order = Order::where('member_id',Auth::guard('member')->user()->id)->sum('price');
        return view('client.member.list_order',compact('list_order','sum_order'));
    }
    function don_hang_chiet_khau(Request $rq){

        $id_member = Member::find(Auth::guard('member')->user()->id);
        return view('client.member.discount_orders',compact('id_member'));
    }

    function danh_sach_thanh_vien(){
        $id_member = Member::find(Auth::guard('member')->user()->id);
    	return view('client.member.list_member',compact('id_member'));
    }
    
    function add_cart(){
        
    }
    function cart(){
        return view('client.member.cart');
    }
    function pay(Request $request){
        if($request->all()){
          $order = [
            'member_id'=>Auth::guard('member')->user()->id,
            'price'=>$request->order_price,
            'address'=>$request->address['area'].' - '.$request->address['district'].' - '.$request->address['address'],
            'note'=>$request->note,
            'code_order'=>strtoupper($this->generate_string(6)),
            'date_order'=>date('d/m/Y'),
          ];
          $model = new Order();
          $model->fill($order);
          if($model->save()){
            $id_order = $model->id;
            // dd($id_order);
             $cart = json_decode($request->list_cart);
             foreach ($cart as $key => $value) {
                $product_cart =[
                    'id_order'=>$model->id,
                    'id_product'=>$value->id,
                    'qty'=>$value->count,
                ];
                DB::table('order_product')->insert($product_cart);
             }
          }
          return redirect()->route('homepage')->with('check_cart','none');
        }
        
        return view('client.member.pay');
    }
    function generate_string($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }
    function list_product(Request $rq,$id){
        if($rq->keyword){
          return view('client.member.order_product',$this->search_order_product($id,$rq->keyword));
        }
        return view('client.member.order_product',$this->list_order_product($id));
    }
    function list_product_discount(Request $rq,$id){
      if($rq->keyword){
          return view('client.member.list_product_discount',$this->search_order_product($id,$rq->keyword));
        }
        return view('client.member.list_product_discount',$this->list_order_product($id));
    }
    function create_member(Request $request){
        if($request->id){
            $model = Member::find($request->id);
        }else{

           $model = new Member(); 
       }
      $messages = [
        'email.unique'    => 'Email đã được sử dụng',
        'cmnd.unique'    => 'Số chứng minh thư đã được sử dụng',
        // 'stk.unique'    => 'số tài khoản ngân hàng đã được sử dụng',
       ];
        $validatedData = Validator::make($request->all(), [
            'name' =>'max:255',
            'email' => 'unique:member',
            'cmnd' =>'unique:member',
            // 'stk' =>'unique:member',
        ],$messages);

      if ($validatedData->fails()) {
           echo json_encode($validatedData->errors()->all());die();
       }

       $model->fill($request->all());
       $model->password = bcrypt($request->input('password'));
       $model->save();
       echo json_encode('ok');
    }
    public function send_email(Request $rq){
      $user = Member::where('email',$rq->email)->first();
      $name= $user->name;
      $homepage = Route('homepage');
      $randum = $this->generate_string(6);
      $password = bcrypt($randum);
      Member::where('id',$user->id)->update(['password'=>$password]);
      Mail::send('emails.name', compact('name','homepage','randum', 'user'), function($message) use ($user){
            $message->to($user->email, $user->name);
            $message->subject('lấy lại mật khẩu');
      });
      echo json_encode('ok');
    }
}
