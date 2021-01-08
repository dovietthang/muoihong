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
  .detail_product_find img{
    object-fit: none;
  }
</style>
@endif
<section class="member">
  <div class="container">
    <div class="row detail_product_find">
      <div class="col-md-5">
        <img src="/product_image/{{$detail_product->image}}">
      </div>
      <div class="col-md-7">
        <h4>{{$detail_product->name}}</h4>
        <p>Giá: @if(isset($detail_product->price)) {{number_format($detail_product->price, 0, '', '.')}}  @else Liên hệ @endif</p>
        @if(isset($detail_product->ma_sp))<p>Mã Sp: {{$detail_product->ma_sp}}</p>@endif 
        <div>
          <a href="javascript:void(0)" data-id="{{$detail_product->id}}" data-image="/product_image/{{$detail_product->image}}" data-name="{{$detail_product->name}}" data-price="{{$detail_product->price}}" class="add_to_cart customer_cart">Giỏ hàng</a>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <div class="col-md-12">
        <h5>Giới thiệu sản phẩm</h5>
        <hr>
        {!! $detail_product->description !!}
        <div id="fb-share-button" class="btn">

          <span>Chia sẻ</span>
          <!-- nút chia sẻ fb -->
          <script>var fbButton = document.getElementById('fb-share-button');
          var url = window.location.href;
          console.log(url)
          fbButton.addEventListener('click', function() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
              'facebook-share-dialog',
              'width=800,height=600'
              );
            return false;
          });</script>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="fb-root"></div>
        <div class="fb-comments" data-href="" data-width="100%" data-numposts="5"></div>
      </div>
    </div>
  </div>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>

</section> 
 <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn">&times;</a>
         
        </div>
        <script src="{{asset('client/js/jQuery.SimpleCart.js')}}"></script>
        <script type="text/javascript">
          check_cart = false;
          $(document).ready(function () {
                $('#mySidenav').simpleCart();
                 $('.fb-comments').attr('data-href',window.location.href)
            });
          $('.add_to_cart').click(function(){
            document.getElementById("mySidenav").style.width = "390px";
          })
          $('.closebtn').click(function(){
             document.getElementById("mySidenav").style.width = "0";
          })
        </script>
@endsection