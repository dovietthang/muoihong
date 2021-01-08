@extends('client.layout')
@section('client_content')

<section class="member">
	<div class="container table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th scope="col" width="120px" >Sản phẩm</th>
					<th scope="col">Đơn giá</th>
					<th scope="col" width="100px">Số lượng</th>
					<th scope="col">Thành tiền</th>
					<th scope="col">Xóa</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="container">
		<div class="row pay_menu">
			<div class="col-md-6 left">
				<a href="{{route('homepage')}}">Tiếp tục mua hàng</a>
			</div>
			<div class="col-md-6 right text-right">
				<a href="{{route('pay')}}">Tiến hành thanh toán</a>
			</div>
		</div>
	</div>
</section>
<script src="{{asset('client/js/jQuery.SimpleCart.js')}}"></script>
        <script type="text/javascript">
        	check_cart = 'cart';
        	$(document).ready(function () {
        		$('.table').simpleCart();
        	});

        </script>
@endsection