@extends('client.layout')
@section('client_content')
@if(!Auth::guard('member')->check())
<script type="text/javascript">
  localStorage.removeItem("shoppingCart");
</script>
<style type="text/css">
	.add_to_cart{
		display: none;
	}
</style>
@endif
<section class="member">
	<div class="container">
		<section class="product_hot">
          <div class="container">
          	<div class="title_header_post">
            		<a href="{{route('homepage')}}"><i class="fa fa-home"></i></a>&ensp;/&ensp;<a href="javascript:void(0)">{{$cate}}</a>
            	</div>
            <div class="row box">
                @foreach($list_product as $value)
                  <div class="col-md-4 product_one">
                    <a href="{{route('detail_product',['id'=>$value->id])}}" class="detail_product">
                      <div class="zoom_image"><img src="/product_image/{{$value->image}}"></div>
                      
                      <div class="title">
                        {{$value->name}}
                        <h5>Giá: {{number_format($value->price, 0, '', '.')}}</h5>
                      </div>
                    </a>
                    <a href="javascript:void(0)" data-id="{{$value->id}}" data-image="/product_image/{{$value->image}}" data-name="{{$value->name}}" data-price="{{$value->price}}" class="add_to_cart">Đặt hàng</a>
                    
                  </div>
                  
                @endforeach
               </div>
              <div class="row">
                <div class="col-md-12 pagination">
                  {{$list_product->links()}}
                </div>
              </div>
              
              
            </div>

        </section>
	</div>
</section>
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn">&times;</a>

</div>
<script src="{{asset('client/js/jQuery.SimpleCart.js')}}"></script>
<script type="text/javascript">
	check_cart = false;
	$(document).ready(function () {
		$('#mySidenav').simpleCart();
	});
	$('.add_to_cart').click(function(){
		document.getElementById("mySidenav").style.width = "390px";
	})
	$('.closebtn').click(function(){
		document.getElementById("mySidenav").style.width = "0";
	})
</script>
@endsection