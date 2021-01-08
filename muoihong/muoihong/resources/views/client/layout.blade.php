<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="cart" content="{{route('cart')}}">
        <meta name="pay" content="{{route('pay')}}">
        <title>{{$config['namesite']['value']}}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jqury ui -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- end jqury ui -->
        <!-- alert -->
        <link href="{{asset('admin/css/toastr.css')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('admin/js/toastr.js')}}"></script>
        <!-- endalert -->
        <link rel="stylesheet" type="text/css" href="{{ asset('client/css/style.css')}}">

 
    </head>
    <body>
      <header>
        <div class="top_header">
          <div class="logo">
            <a href="{{route('homepage')}}"><img src="{{ asset('client/logo.jpg')}}" width="280px"></a>
          </div>
          <div class="login_top">
          @if(isset(Auth::guard('member')->user()->id))
            <!-- Example single danger button -->
            <div class="btn-group float-right">
              <a href="javascript::void(0)"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                xin chào: {{Auth::guard('member')->user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('detail_member')}}">Thông tin tài khoản</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('change_password')}}">Đổi mật khẩu</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('tra_cuu')}}">Danh sách đơn hàng</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('don_hang_chiet_khau')}}">Danh sách chiết khấu </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('danh_sach_thanh_vien')}}">Danh sách thành viên</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
              </div>
            </div>
          @else
          <div class="btn-group float-right">
            <a href="javascript:void(0)" class="icon_menu" data-toggle="modal" data-target="#registration"> Đăng kí</a>
            <a class="icon_menu" style="padding: 0 5px;">|</a>
            <a href="javascript:void(0)" class="icon_menu" data-toggle="modal" data-target="#login"> Đăng nhập</a>
          </div>
          @endif
          </div>
        </div>
        <div class="container-full nav_header">
          <div class="container ">
            <div class="row">
              <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"  style="margin-left: 100px;">
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('homepage')}}">Trang chủ</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link  @if(count($gioi_thieu) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Giới thiệu
                        </a>
                        @if(count($gioi_thieu) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($gioi_thieu as $value)
                             <a class="dropdown-item" href="{{route('list_post',['id'=>$value->id,'slug'=>'gioi-thieu'])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link @if(count($cate_product) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Sản phẩm
                        </a>
                        @if(count($cate_product) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($cate_product as $value)
                             <a class="dropdown-item" href="{{route('list_product',['id'=>$value->id])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link @if(count($chia_se_khach_hang) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Chia sẻ khách hàng
                        </a>
                        @if(count($chia_se_khach_hang) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($chia_se_khach_hang as $value)
                             <a class="dropdown-item" href="{{route('list_post',['id'=>$value->id,'slug'=>'chia-se-khach-hang'])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link @if(count($hop_tac_kinh_doanh) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Hợp tác kinh doanh
                        </a>
                        @if(count($hop_tac_kinh_doanh) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($hop_tac_kinh_doanh as $value)
                             <a class="dropdown-item" href="{{route('list_post',['id'=>$value->id,'slug'=>'hop-tac-kinh-doanh'])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link @if(count($thu_vien_suc_khoe) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Thư viện sức khỏe
                        </a>
                        @if(count($thu_vien_suc_khoe) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($thu_vien_suc_khoe as $value)
                             <a class="dropdown-item" href="{{route('list_post',['id'=>$value->id,'slug'=>'thu-vien-suc-khoe'])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link @if(count($tin_tuc) >0) dropdown-toggle @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Tin tức
                        </a>
                        @if(count($tin_tuc) >0)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          @foreach($tin_tuc as $value)
                             <a class="dropdown-item" href="{{route('list_post',['id'=>$value->id,'slug'=>'tin-tuc'])}}">{{$value->name}}</a>
                          @endforeach
                        </div>
                        @endif
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('client.contact')}}">Liên hệ</a>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>
       @yield('client_content')

       <section class="footer2">
          <div class="container">
            <div class="row">
              <div class="col-md-4 box_footer1">
                <h2>Muối hồng Vinsalt</h2>
                <div class="row">
                  <div class="col-md-1 col-1 col-sm-1">
                    <img src="https://triquangminh.com/images/ft1.png" alt="địa chỉ">
                  </div>
                  <div class="col-md-11 col-11 col-sm-11">
                    <span>Địa chỉ: {{$config['address']['value']}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1 col-1 col-sm-1">
                    <img src="https://triquangminh.com/images/ft2.png" alt="liên hê">
                  </div>
                  <div class="col-md-11 col-11 col-sm-11">
                    <span>Điện thoại: {{$config['sdt']['value']}}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1 col-1 col-sm-1">
                    <img src="https://triquangminh.com/images/ft3.png" alt="Email">
                  </div>
                  <div class="col-md-11 col-11 col-sm-11">
                    <span>Email: {{$config['email']['value']}}</span>
                  </div>
                </div>
                <div class="social_footer">
                  <span>Mạng xã hội: </span>
                  <a target="blank" href="">
                    <img src="https://triquangminh.com/upload/hinhanh/youtube-7085.png" alt="Youtube">
                  </a>
                  <a target="blank" href="">
                    <img src="https://triquangminh.com/upload/hinhanh/google-9425.png" alt="Google">
                  </a>
                  <a target="blank" href="">
                    <img src="https://triquangminh.com/upload/hinhanh/twiter-1117.png" alt="Twiter">
                  </a>
                  <a target="blank" href="">
                    <img src="https://triquangminh.com/upload/hinhanh/face-6270.png" alt="Facebook">
                  </a>
                </div>
              </div>
              <div class="col-md-2">
                <h6>CHÍNH SÁCH HỔ TRỢ</h6>
                <ul>
                  <li><a href="">Hướng dẫn mua hàng</a></li>
                </ul>
              </div>
              <div class="col-md-2">
                <h6>VỀ CHÚNG TÔI</h6>
                <p><span>Sự ra đời của muối hồng Vinsalt</span></p>
              </div>
              <div class="col-md-4">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1005144559691668&autoLogAppEvents=1"></script>
                <div class="fb-page" data-href="https://www.facebook.com/Mu%E1%BB%91i-H%E1%BB%93ng-Hymalaya-Vinsalt-104722071012942/" data-tabs="timeline" data-width="" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Mu%E1%BB%91i-H%E1%BB%93ng-Hymalaya-Vinsalt-104722071012942/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Mu%E1%BB%91i-H%E1%BB%93ng-Hymalaya-Vinsalt-104722071012942/">Muối Hồng Hymalaya Vinsalt</a></blockquote></div>
              </div>
            </div>
          </div>
        </section>
        <section class="footer3">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <span>{!!$config['footer']['value'] !!}</span>
              </div>
            </div>
          </div>
        </section>
      <!-- Modal -->
      <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Đăng kí tài khoản</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="check_error"></div>
                {{csrf_field()}}
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Email(*)</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email(*)" id="email">
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Tên tài khoản(*)</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" name="name" placeholder="Tên tài khoản(*)" id="name">
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Mật khẩu(*)</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-key"></i></div>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu(*)" id="password" >
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Nhập lại mật khẩu(*)</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-key"></i></div>
                    </div>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu(*)" id="password_confirmation"> 
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">CMND</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-sort-numeric-asc"></i></div>
                    </div>
                    <input type="number" class="form-control" name="cmnd" placeholder="Số CMND(*)" id="cmnd">
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Mã giới thiệu</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-codepen"></i></div>
                    </div>
                    <input type="number" class="form-control" name="RefID" placeholder="Mã giới thiệu" id="RefID">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              Bạn đã có tài khoản ?<a href="javascript:void(0)" data-toggle="modal" data-target="#login" class="show_login">Đăng nhập</a>
              <button type="button" class="btn btn-primary submit_registration" style="background-color: #ef6176;border: 0">Đăng kí thành viên</button>
            </div>
          </div>
        </div>
      </div>
      <!-- login -->
      <!-- Modal -->
      <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top:15%">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Đăng nhập tài khoản</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="error_login">
                </div>
                {{csrf_field()}}
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Email</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Email" id="email_login">
                  </div>
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Mật khẩu</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-key"></i></div>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" id="password_login">
                  </div>
                </div>
                <div class="col-auto">
                 <a href="javascriptja:void" class='forgot_password' data-toggle="modal" data-target="#forgot_password">Quên mật khẩu</a>
               </div>
            </div>
            <div class="modal-footer">
              Bạn chưa có tài khoản ?<a href="javascript:void(0)" data-toggle="modal" data-target="#registration" class="show_registration">Đăng kí</a>
              <button type="button" class="btn btn-primary submit_login" style="background-color: #ef6176;border: 0">Đăng nhập</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Modal -->
      <div class="modal fade" id="forgot_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top:15%">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Quên mật khẩu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="error_forgot_password">
                </div>
                <div class="col-auto">
                  <label class="sr-only" for="inlineFormInputGroup">Email</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                    <input type="text" class="form-control" id="email_forgot_password" placeholder="Email">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary submit_forgot_password">Gửi</button>
            </div>
          </div>
        </div>
      </div>


  </body>
<script>

  $( function() {
    
    $( "#datepicker" ).datepicker();
    $('.submit_registration').click(function(){
      if($('#name').val() == '' || $('#email').val() == '' || $('#password').val() == '' || $('#cmnd').val() == ''){
        html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Bạn cần nhập thông tin</ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
                console.log(html);
           $('.check_error').html(html);
           return false;
      }
      if($('#password').val().length <6){
        html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Mật khẩu phải lớn hơn 6 và nhỏ hơn 30</ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
                console.log(html);
           $('.check_error').html(html);
           return false;
      }
      if($('#password').val() != $('#password_confirmation').val()){
        html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Mật khẩu không giống nhau </ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
                console.log(html);
           $('.check_error').html(html);
           return false;
      }
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('registration.member')}}",
        data:{
          name:$('#name').val(),
          email:$('#email').val(),
          password:$('#password').val(),
          RefID:$('#RefID').val(),
          cmnd:$('#cmnd').val(),
        },
        method: "POST",
        dataType: 'JSON',
        success: function(data){
          if(data == 'ok'){
            $('.close').click();
            toastr.success('Đăng kí thành công !');
            return true;
          }
          var li = '';
          $.each( data, function( key, value ) {
              li+= '<li>'+value+'</li>';
          });
          html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>'+li+'</ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
                console.log(html);
           $('.check_error').html(html);
        }
      })
    })
    $('.submit_login').click(function(){
      var that = $(this)
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('login')}}",
        data:{
          email:$('#email_login').val(),
          password:$('#password_login').val(),
          // remember:true
        },
        method: "POST",
        dataType: 'JSON',
        success: function(data){
          console.log(data);
          if(data.status == "success"){
             $('.login_top').html(`
               <div class="btn-group float-right">
              <a href="javascript::void(0)"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                xin chào: ${data.auth}
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('detail_member')}}">Thông tin tài khoản</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('change_password')}}">Đổi mật khẩu</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('tra_cuu')}}">Danh sách đơn hàng</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('don_hang_chiet_khau')}}">Danh sách chiết khấu </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('danh_sach_thanh_vien')}}">Danh sách thành viên</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">Đăng xuất</a>
              </div>
            </div>
              `);
             $('.close').click();
             $('.add_to_cart').css('display','flex');
          }else{
            $('.error_login').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Tài khoản hoặc mật khẩu không chính sác</ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>\n\
              ');
          }
        }
        })
    })
    $('.forgot_password').click(function(){
      $('.close').click();
    });
    $('.show_login').click(function(){
      $('.close').click();
    })
    $('.show_registration').click(function(){
      $('.close').click();
    })
    $('.submit_forgot_password').click(function(){
       if($('#email_forgot_password').val() == ''){
        html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Email không được để trống </ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
               
           $('.error_forgot_password').html(html);
         return false;
       }
      if(!$('#email_forgot_password').val().split('@')[1]){
         html = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n\
                  <ul>Email không đúng định dạng </ul>\n\
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n\
                    <span aria-hidden="true">&times;</span>\n\
                  </button>\n\
                </div>';
               
           $('.error_forgot_password').html(html);
         return false;
      }
     
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{route('forgot_password')}}",
        data:{
          email:$('#email_forgot_password').val(),
        },
        method: "POST",
        dataType: 'JSON',
        success: function(data){
             $('.close').click();
            toastr.success('Kiểm tra email để lấy lại mật khẩu của bạn');
        }
      })
    })

  } );
</script>
<style>
.scrollToTop{
    padding:0 10px; 
    text-align:center; 
    text-decoration: none;
    position:fixed;
    font-size: 40px;
    right:40px;
    bottom: 10px;
    display:none;
    border-radius: 50%;
    background: #f78396;

}
.scrollToTop:hover{
    text-decoration:none;
}
</style>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-up" style="color: #fff;"></i></a>
<script type="text/javascript">
  $(document).ready(function(){

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});
</script>

</html>
