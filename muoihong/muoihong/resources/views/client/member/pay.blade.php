@extends('client.layout')
@section('client_content')
<div class="member">
  <form method="get">
  	
	<div class="container pay">
		<div class="row">
			<div class="col-md-8">
				<div class="box1">
					<div class="step-title">Thông tin nhận hàng</div>
					<input type="hidden" name="list_cart" class="list_cart">
					<input type="hidden" name="order_price" class="order_price">
					<div class="step-content">
						<div class="form-group row">
							<div class="col-md-4">Họ và tên</div>
							<div class="col-md-8"><input type="" name="full_name" value="{{Auth::guard('member')->user()->full_name}}"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Email</div>
							<div class="col-md-8"><input type="email" name="email" value="{{Auth::guard('member')->user()->email}}"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Khu vực</div>
							<div class="col-md-8"><input type="" name="address[area]"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Quận huyện</div>
							<div class="col-md-8"><input type="" name="address[district]"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Địa chỉ</div>
							<div class="col-md-8"><input type="" name="address[address]" value="{{Auth::guard('member')->user()->address}}"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Số điện thoại nhận hàng</div>
							<div class="col-md-8"><input type="" name="" value="{{Auth::guard('member')->user()->sdt}}"></div>
						</div>
						<div class="form-group row">
							<div class="col-md-4">Ghi chú</div>
							<div class="col-md-8"><textarea name="note"></textarea></div>
						</div>
					</div>
				</div>
				<div class="box2">
					<div class="step-title">Vận chuyển & Thanh toán</div>
					<div class="step-content">
		                <strong>Hình thức thanh toán</strong><br>
						<!-- <input type="radio">Thanh toán trực tuyến<br> -->
						Thông tin tài khoản ngân hàng:<br>

						<strong>Công Ty Muối Hồng Vinsalt </strong><br>

						<strong>THÔNG TIN TÀI KHOẢN NGÂN HÀNG </strong><br>

						<p><strong>1. Ngân hàng Vietcombank</strong> <br>

						Số tài khoản: 0571000037037<br>

						Chi Nhánh: Dung Quất, Quảng Ngãi.<br>

						Chủ tài khoản: Trần Thị Kim Trinh <br></p>



						<strong>2. Ngân hàng NN& PTNT Agribank</strong>

						Số tài khoản: 5500205020447<br>

						Chi Nhánh: Bình Dương, Tỉnh Bình Dương<br>

						Chủ tài khoản: Trần Thị Kim Trinh <br>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="block_donhang">
					<div class="title_donhang">
						<div class="row">
							<div class="col-md-6">Đơn hàng</div>
							<div class="col-md-6 text-right"><a href="{{route('cart')}}">Sửa</a></div>
						</div>
					</div>
					<div class="content_donhang">

					</div>
				</div>
			</div>
		</div>
	</div>
  </form>
</div>
<script src="{{asset('client/js/jQuery.SimpleCart.js')}}"></script>
        <script type="text/javascript">
        	check_cart = 'pay';
        	$(document).ready(function () {
        		$('.content_donhang').simpleCart();
        	});

        </script>
@endsection