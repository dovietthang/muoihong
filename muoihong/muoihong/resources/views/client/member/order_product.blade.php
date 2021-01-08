@extends('client.layout')
@section('client_content')
<?php 
	$sum = 0;
    foreach($list_order_product as $key => $value){
        $sum += ($value->qty * $value->price);
    }
?>
<section class="member">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item"><a href="{{route('detail_member')}}">Thông tin tài khoản</a></li>
					<li class="list-group-item"><a href="{{route('change_password')}}">Đổi mật khẩu</a></li>
					<li class="list-group-item active"><a href="{{route('tra_cuu')}}">Quản lý đơn hàng</a></li>
					<li class="list-group-item"><a href="{{route('don_hang_chiet_khau')}}">Quản lý đơn hàng chiết khấu</a></li>
					<li class="list-group-item"><a href="{{route('danh_sach_thanh_vien')}}">Quản lý thành viên</a></li>
					<li class="list-group-item"><a href="{{route('logout')}}">Đăng xuất</a></li>
				</ul>
			</div>
			<div class="col-md-9 member-right">
				<div class="member-header"> Chi tiết đơn hàng : {{$code_order}}</div>
				<div class="table-responsive member-body">
					<div class="table-list-order">
						<form method="get" action="">
						 <input type="" name="keyword">
						 <button style="border: 0;background-color: #ef6176">Tìm kiếm</button>
				        </form><br>
						<table class="table table-bordered ">
							<thead style="text-align: center;">
								<tr>
									<td scope="col" style="width: 5%">STT</td>
									<td scope="col">Hình ảnh</td>
									<td scope="col">Sản phẩm</td>
									<td scope="col" style="width: 10%">Đơn giá</td>
									<td scope="col" style="width: 20%">Chiết khấu người mua</td>
									<td scope="col">Số lượng</td>
									<td scope="col" style="width: 14%">Thành tiền</td>
								</tr>
							</thead>
							<tbody>
								@foreach($list_order_product as $key => $value)
								<tr>
									<td>{{$key+1}}</td>
									<td><img src="/product_image/{{$value->image}}" width="150px;"></td>
									<td>{{$value->name}}</td>
									<td>{{number_format($value->price, 0, '', '.')}}</td>
									<td>0 %</td>
									<td>{{$value->qty}}</td>
									<td>{{number_format($value->qty * $value->price, 0, '', '.')}}</td></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<td colspan="6">Tổng đơn hàng</td>
								<td><strong>{{number_format($sum, 0, '', '.')}}</strong></td>
							</tfoot>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
@endsection