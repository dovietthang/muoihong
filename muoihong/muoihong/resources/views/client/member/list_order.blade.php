@extends('client.layout')
@section('client_content')
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
				<div class="member-header"> Danh sách đơn hàng</div>
				<div class="table-responsive member-body">
					<div class="table-list-order">
						<form method="get" action="">
						 <input type="" name="keyword">
						 <button style="border: 0;background-color: #ef6176">Tìm kiếm</button>
				        </form><br>
						<table class="table table-bordered ">
							<thead style="text-align: center;">
								<tr>
									<td scope="col">STT</td>
									<td scope="col">Mã đơn hàng</td>
									<td scope="col">Ngày đặt hàng</td>
									<td scope="col">Số tiền đơn hàng</td>
									<td scope="col" style="width: 20%">Chiết khấu sản phẩm được hưởng thêm</td>
									<td scope="col">Tiền chiết khấu</td>
									<td scope="col" style="width: 15%">Tình trạng</td>
									<td scope="col">Thao tác</td>
								</tr>
							</thead>
							<tbody>
								@foreach($list_order as $key => $value)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$value->code_order}}</td>
									<td>{{$value->date_order}}</td>
									<td>{{number_format($value->price, 0, '', '.')}}</td>
									<td>0</td>
									<td>0</td>
									<th>@if($value->active === null)<span style="color:#faae02"> Chờ duyệt </span>@elseif($value->active === 0)<span style="color:#e63b59"> Đã huỷ </span>@elseif($value->active === 1) <span style="color:#6df391">Đã xác nhận</span> @endif</th>
									<td><a href="{{route('list_order_product',['id'=>$value->id])}}" style="color: #ef6177">Xem</a></td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3">Tổng tiền</td>
									<td><strong>{{number_format($sum_order, 0, '', '.')}} đ</strong></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
						<div> {{$list_order->links()}}</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
@endsection