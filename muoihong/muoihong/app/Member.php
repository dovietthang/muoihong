<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Http\Request;
class Member extends Authenticatable
{
    protected $table ='member';
    public $fillable = ['name','password','cmnd','email','full_name','sdt','address','back_name','stk','gender','birthday','RefID'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $config = [];
    public function __construct()
    {
       $key = Config::all();
      foreach ($key as $key => $value) {
        $config[$value->keys]['key'] =$value->keys;
        $config[$value->keys]['value'] =$value->value;
      }
      $this->config = $config;
    }
    function showMember($member, $parent_id = 0, $char = '')
    {

    	foreach ($member as $key => $item)
    	{
    		if ($item->RefID == $parent_id)
    		{
    			echo '<option value="'.$item->id.'">';
    			echo $char . $item->full_name;
    			echo '</option>';         
    			unset($member[$key]);
    			$this->showMember($member, $item->id, $char.'|---');
    		}
    	}

    }
    function listMember($parent_id = 0,  $char = '')
    {
        $member = Member::where('RefID',$parent_id)->get();
        echo '<ul>';
        foreach ($member as $key => $value) {
             if(isset($parent_id)){
                
                echo '<li>( F'.((count(explode('|', $char))) == 0 ? '': (count(explode('|', $char)))).' ) ' . $value->name.'</li>';
                        
                unset($member[$key]);
                $this->listMember($value->cmnd,$char.'|---');
             }

        }
        echo '</ul>'; 
    }
    function getOrderProduct($parent_id = 0,  $char = '')
    {
        $member = Member::where('RefID',$parent_id)->get();
   
        foreach ($member as $key => $value) {
             if(isset($parent_id)){
                foreach ($this->getIdOrderProduct($value->id) as $keys => $values) {
                   $f = 'F'.((count(explode('|', $char))-1) == 0 ? '': (count(explode('|', $char))-1));
                   if($f == 'F'){
                    $discount = $this->config['F']['value']; 
                   }elseif ($f == 'F1') {
                     $discount = $this->config['F1']['value'];
                   }elseif ($f == 'F2') {
                     $discount = $this->config['F2']['value'];
                   }elseif ($f == 'F3') {
                     $discount = $this->config['F3']['value'];
                   }elseif ($f == 'F4') {
                     $discount = $this->config['F4']['value'];
                   }else {
                     $discount = $this->config['F4']['value'];
                   }
                   $sum = number_format(($values->price*$discount)/100, 0, '', '.');
                   echo "<tr>";
                   echo '<td>'.$values->id.'</td>';
                   echo '<td>'.$values->code_order.'</td>';
                   echo '<td>'.$values->date_order.'</td>';
                   echo '<td>'.$values->full_name.'</td>';
                   echo '<td>'.$values->cmnd.'</td>';
                   echo '<td>'.$f.'</td>';
                   echo '<td>'.number_format($values->price, 0, '', '.').'</td>';
                   echo '<td>'.$discount.'%</td>';
                   echo '<td>0%</td>';
                   echo '<td>'.$sum.'</td>';
                   echo '<td><a href="'.route('list_product_discount',['id'=>$values->id]).'" style="color: #ef6177">Xem</a></td>';
                   echo "</tr>";

                }
                unset($member[$key]);
                $this->getOrderProduct($value->cmnd,$char.'|---');
             }

        }
         
    }

    function getIdOrderProduct($id){
        $id_order = DB::table('shop_order')
                    ->select('shop_order.*','member.full_name','member.cmnd')
                    ->join('member','shop_order.member_id','=','member.id')
                    ->where('member_id',$id)->get();
        return $id_order;

    }
}
