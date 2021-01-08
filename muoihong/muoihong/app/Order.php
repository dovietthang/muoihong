<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='shop_order';
    public $fillable = ['member_id','price','code_order','date_order','active','address','node'];
}
