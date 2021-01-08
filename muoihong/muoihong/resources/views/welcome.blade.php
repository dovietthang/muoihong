@extends('client.layout')
@section('client_content')


<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.css'>
<style type="text/css">
  .product_hot img {
  width: 100%;
  height: 250px !important;
  object-fit: cover;
}
.product_one{
  padding: 0 10px;
}
.product_hot .slick-dots {
  text-align: center;
  margin: 0 0 10px 0;
  padding: 0;
}
.product_hot .slick-dots li {
  display: inline-block;
  margin-left: 4px;
  margin-right: 4px;
}
.product_hot .slick-dots li.slick-active button {
  background-color: black;
}
.product_hot .slick-dots li button {
  font: 0/0 a;
  text-shadow: none;
  color: transparent;
  background-color: #999;
  border: none;
  width: 15px;
  height: 15px;
  border-radius: 50%;
}
.product_hot .slick-dots li :hover {
  background-color: black;
}

/* Custom Arrow */
.product_hot .prev {
  color: #999;
  position: absolute;
  top: 38%;
  left: -2em;
  font-size: 1.5em;
}
.product_hot .prev :hover {
  cursor: pointer;
  color: black;
}

.product_hot .next {
  color: #999;
  position: absolute;
  top: 38%;
  right: -2em;
  font-size: 1.5em;
}
.product_hot .next :hover {
  cursor: pointer;
  color: black;
}

@media screen and (max-width: 800px) {
  .product_hot .next {
    display: none !important;
  }
}
</style>

@if(session('check_cart') == "none")
<script type="text/javascript">
  $( document ).ready(function() {
   toastr.success('Đặt hàng thành công !');
   localStorage.removeItem("shoppingCart");
 });
</script>
@endif
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
      <section id="main">
        <section class="slide">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="{{asset('client/slide.jpg')}}" alt="First slide" style="max-height: 700px;object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('client/slide.jpg')}}" alt="Second slide" style="max-height: 700px;object-fit: cover;">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{asset('client/slide.jpg')}}" alt="Third slide" style="max-height: 700px;object-fit: cover;">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </section>
        <section class="about">
          <div class="container">
            <div class="row">
              <div class="col-md-12 box">
                <div class="title_main">
                <h2>Giới thiệu về chúng tôi</h2>
              </div>
                {!! $config['youtobe']['value'] !!}
              </div>
            </div>
          </div>
        </section>
        <section class="product_hot">
          <div class="container">
            <div class="row">
              <div class="col-md-12 box">
               <div class="title_main">
                <h2>Sản phẩm chính của chúng tôi</h2>
              </div>
              <!-- partial:index.partial.html -->
                  <div class="container">

                      <div class="row">
                        <div class="col-md-12 heroSlider-fixed box">
                          <div class="overlay">
                        </div>
                           <!-- Slider -->
                          <div class="slider responsive">
                             @foreach($product as $value)
                            <div class="product_one">
                               <a href="{{route('detail_product',['id'=>$value->id])}}" class="detail_product">
                                <div class="zoom_image"><img src="/product_image/{{$value->image}}" alt="" /></div>
                                <div class="title">
                                            {{$value->name}}
                                            <h5>Giá: @if(isset($value->price)) {{number_format($value->price, 0, '', '.')}}  @else Liên hệ @endif</h5>
                                </div>
                              </a>
                              <a href="javascript:void(0)" data-id="{{$value->id}}" data-image="/product_image/{{$value->image}}" data-name="{{$value->name}}" data-price="{{$value->price}}" class="add_to_cart">Đặt hàng</a>
                            </div>
                            @endforeach
                          </div>
                           <!-- control arrows -->
                          <div class="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                          </div>
                          <div class="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  <!-- partial -->
              </div>
            </div>
          </div>

        </section>
        <section class="uses">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
              <div class="title_main">
                <h2>Công dụng lợi ích của muối hồng Vinsalt</h2>
              </div>
              <div class="box">
                <img src="https://triquangminh.com/upload/hinhanh/banner-cong-dung-2016.png">
              </div>
              </div>
            </div>
          </div>
        </section>
        <section class="opinion">
          <h3 style="color:#fff;">Ý kiến khách hàng</h3>
          <img src="https://triquangminh.com/images/line_congdung.png"><br>
        </section>
      </section>
        <section class="footer1">
           <div class="container">
              <div class="col-md-12">  
              <form class="contact" action="{{route('save.contact')}}?check=homepage" method="post" style="text-align: center;color:#fff">
                {{csrf_field()}}
                <h3>Liên hệ với chúng tôi</h3>
                <img src="https://triquangminh.com/images/line_congdung.png"><br>
                <p>Điền thông tin vào form bên dưới khi bạn có thắc mắc, muốn liên hệ<br>
                  Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.</p>
                <div class="row">
  
                    <div class="col-md-6">
                      <input type="" name="full_name" placeholder="Họ và tên" required="">
                      <input type="email" name="email" placeholder="Email" required="">
                    </div>

                    <div class="col-md-6">
                      <input type="" name="address" placeholder="Địa chỉ">
                      <input type="text" name="sdt" placeholder="Số điện thoại" pattern="(\+84|0)\d{9,10}" title="định dạng số diện thoại chưa đúng">
                    </div>

                    <div class="col-md-12">
                      <textarea name="note" placeholder="Nhập nội dung" style="padding: 10px 0 0 10px;"></textarea>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                      <button type="submit" class="contact_submit">Gửi liên hệ</button>
                    </div>
                 </div>
                </form>
              </div>
              </div>
              <div class="people"></div>
        </section>

        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn">&times;</a>
         
        </div>


<!-- slide  -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js'></script>
<script type="text/javascript">
  $('.responsive').slick({
  dots: true,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>

<!-- endslide -->

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