@extends('admin.layout')
@section('admin_content')
<?php 
  $sum = 0;
    foreach($list_order_product as $key => $value){
        $sum += ($value->qty * $value->price);
    }
?>
  <div class="row">
  	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách đơn hàng</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Sản phẩm</th>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng đặt</th>
                          <th>Đơn giá</th>
                          <th>Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($list_order_product as $value)
                         <tr>
                         	<td>{{$value->id}}</td>
                         	<td><img src="/product_image/{{$value->image}}" width="150px;"></td>
                         	<td>{{$value->name}}</td>
                         	<td>{{$value->qty}}</td>
                         	<td>{{number_format($value->price, 0, '', '.')}} đ</td>
                         	<td>{{number_format($value->qty * $value->price, 0, '', '.')}}</td>
                         </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      	<td><h5>Tổng đơn hàng</h5></td>
                      	<td colspan="4"></td>
                      	<td><h5>{{number_format($sum, 0, '', '.')}} đ</h5></td>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
  </div>
  @endsection