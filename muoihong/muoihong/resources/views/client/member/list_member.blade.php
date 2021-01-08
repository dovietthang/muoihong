@extends('client.layout')
@section('client_content')
<section class="member">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item"><a href="{{route('detail_member')}}">Thông tin tài khoản</a></li>
					<li class="list-group-item "><a href="{{route('change_password')}}">Đổi mật khẩu</a></li>
					<li class="list-group-item"><a href="{{route('tra_cuu')}}">Quản lý đơn hàng</a></li>
					<li class="list-group-item"><a href="{{route('don_hang_chiet_khau')}}">Quản lý đơn hàng chiết khấu </a></li>
					<li class="list-group-item active"><a href="{{route('danh_sach_thanh_vien')}}">Quản lý thành viên</a></li>
					<li class="list-group-item"><a href="{{route('logout')}}">Đăng xuất</a></li>
				</ul>
			</div>
			<div class="col-md-9 member-right">
				<div class="member-header">Quản lý thành viên</div>
				<ul>
					<li>
						{{Auth::guard('member')->user()->full_name}}
					</li>
					{{$id_member->listMember($id_member->cmnd)}}
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection
