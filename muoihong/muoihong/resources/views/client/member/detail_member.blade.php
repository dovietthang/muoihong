@extends('client.layout')
@section('client_content')

<section class="member">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item active"><a href="{{route('detail_member')}}">Thông tin tài khoản</a></li>
					<li class="list-group-item"><a href="{{route('change_password')}}">Đổi mật khẩu</a></li>
					<li class="list-group-item"><a href="{{route('tra_cuu')}}">Quản lý đơn hàng</a></li>
					<li class="list-group-item"><a href="{{route('don_hang_chiet_khau')}}">Quản lý đơn hàng chiết khấu</a></li>
					<li class="list-group-item"><a href="{{route('danh_sach_thanh_vien')}}">Quản lý thành viên</a></li>
					<li class="list-group-item"><a href="{{route('logout')}}">Đăng xuất</a></li>
				</ul>
			</div>
			<div class="col-md-9 member-right">
				<div class="member-header">Thông tin khách hàng</div>
				<div>
					<div class="member-body">
						@if ($errors->any())
						<div class="col-12">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
						@endif
						@if(session('check_save_member') == "ok")
					    <div class="col-12">
					      <div class="alert alert-success alert-dismissible fade show" role="alert">
					        <strong>Cập nhật Thành công!</strong>
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					    </div>
					    @endif
						<form class="forms-sample registration_member" method="post" action="{{route('update_member')}}">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{Auth::guard('member')->user()->id}}">
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Tên tài khoản</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-user"></i></div>
										</div>
										<input type="text" class="form-control" name="name" placeholder="Tên tài khoản" value="{{Auth::guard('member')->user()->name}}" disabled="">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">CMND</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i></div>
										</div>
										<input type="" class="form-control" name="cmnd" placeholder="Số CMND" value="{{Auth::guard('member')->user()->cmnd}}" pattern="[0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Email</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope"></i></div>
										</div>
										<input type="email" class="form-control" name="email" placeholder="Email" value="{{Auth::guard('member')->user()->email}}" disabled="">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Họ và tên</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-user"></i></div>
										</div>
										<input type="" class="form-control" name="full_name" placeholder="Họ và tên" value="{{Auth::guard('member')->user()->full_name}}">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Số điện thoại</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-phone"></i></div>
										</div>
										<input type="" class="form-control" name="sdt" placeholder="Số điện thoại" value="{{Auth::guard('member')->user()->sdt}}" pattern="(\+84|0)\d{9,10}" title="định dạng số diện thoại chưa đúng">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Địa chỉ</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-map-marker"></i></div>
										</div>
										<input type="" class="form-control" name="address" placeholder="Địa chỉ" value="{{Auth::guard('member')->user()->address}}">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Tên ngân hàng</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-usd"></i></div>
										</div>
										<input type="" class="form-control" name="back_name" placeholder="Tên ngân hàng + chi nhánh" value="{{Auth::guard('member')->user()->back_name}}">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Số tài khoản ngân hàng</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-sort-numeric-desc"></i></div>
										</div>
										<input type="" class="form-control" name="stk" placeholder="Số tài khoản ngân hàng" value="{{Auth::guard('member')->user()->stk}}">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Giới tính</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-user"></i></div>
										</div>
										<select name="gender" class="form-control">
											<option value="0">Giới tính</option>
											<option value="Nam" @if(Auth::guard('member')->user()->gender === 'Nam') selected="" @endif>Nam</option>
											<option value="Nữ" @if(Auth::guard('member')->user()->gender === 'Nữ') selected="" @endif>Nữ</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<label class="col-md-2 col-form-label" for="inlineFormInputGroup">Ngày sinh</label>
									<div class="input-group col-md-10">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="  fa fa-calendar"></i></div>
										</div>
										<input type="" class="form-control" name="birthday" required="" id="datepicker" readonly="readonly" value="{{Auth::guard('member')->user()->birthday}}">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<div class="row">
									<div class="col-md-10">
										<button type="submit" class="btn btn-success mr-2" style="background: #ef6177;border: 0">Lưu</button>
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