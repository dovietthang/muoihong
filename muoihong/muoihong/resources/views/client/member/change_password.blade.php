@extends('client.layout')
@section('client_content')
<section class="member">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item"><a href="{{route('detail_member')}}">Thông tin tài khoản</a></li>
					<li class="list-group-item active"><a href="{{route('change_password')}}">Đổi mật khẩu</a></li>
					<li class="list-group-item"><a href="{{route('tra_cuu')}}">Quản lý đơn hàng</a></li>
					<li class="list-group-item"><a href="{{route('don_hang_chiet_khau')}}">Quản lý đơn hàng chiết khấu</a></li>
					<li class="list-group-item"><a href="{{route('danh_sach_thanh_vien')}}">Quản lý thành viên</a></li>
					<li class="list-group-item"><a href="{{route('logout')}}">Đăng xuất</a></li>
				</ul>
			</div>
			<div class="col-md-9 member-right">
				<div class="member-header">Đặt lại mật khẩu của bạn</div>
				<div>
					<div class="member-body">
						<form class="forms-sample registration_member" method="get" action="{{route('update_password')}}">
							{{csrf_field()}}
							<div class="col-auto">
								<div class="row">
									<label class="col-md-12 col-form-label" for="inlineFormInputGroup">Hãy cập nhật lại mật khẩu của bạn ngay bây giờ bằng cách nhập mật khẩu mới vào các trường bên dưới.</label>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<div class="col-md-12">
										<div class="col-12">
											@if(session('check_change_password') == 'ok')
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Đổi mật khẩu thành công!</strong>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											@elseif(session('check_change_password') == 'check_pass_error')
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Mật khẩu mới phải trùng nhau!</strong>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											@elseif(session('check_change_password') == 'error')
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Mật khẩu cũ không chính xác!</strong>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Mật khẩu</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-lock"></i></div>
										</div>
										<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="" pattern="[A-Za-z0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
									</div>
								</div>
							</div>
                            <div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Nhập Mật khẩu Mới</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-lock"></i></div>
										</div>
										<input type="password" class="form-control" name="change_password_1" placeholder="Nhập Mật khẩu Mới" required="" pattern="[A-Za-z0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Nhập Lại Mật khẩu</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-random"></i></div>
										</div>
										<input type="password" class="form-control" name="change_password_2" placeholder="Nhập Lại Mật khẩu" required="" pattern="[A-Za-z0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup"></label>
									<div class="input-group col-md-10">
										
										<button class="submit_form_member">Cập nhật</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
