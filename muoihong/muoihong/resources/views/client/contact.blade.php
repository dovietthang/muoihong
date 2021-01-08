@extends('client.layout')
@section('client_content')
<section class="member">
  <div class="container">
  	<div class="row">
  		<div class="col-md-6">
  			<div>
  				Nếu bạn có bất kỳ câu hỏi, nhận xét hoặc quan tâm nào về đơn hàng của mình, vui lòng liên hệ – Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.
  				<form action="{{route('save.contact')}}" method="post">
            @if(session('check_contact') == "ok")
            <div class="col-12">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thành công!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            @endif
  					{{csrf_field()}}
  					<div class="form-group">
  						<label for="exampleInputEmail1">Họ và tên</label>
  						<input type="" class="form-control" name="full_name" placeholder="Họ và tên" required="">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">Email</label>
  						<input type="email" class="form-control" name="email" placeholder="Email" required="">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">Số điện thoại</label>
  						<input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" pattern="(\+84|0)\d{9,10}" title="định dạng số diện thoại chưa đúng">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">Địa chỉ</label>
  						<input type="" class="form-control" name="address" placeholder="Địa chỉ">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputPassword1">Nội dung</label>
  						<textarea class="form-control" name="note" placeholder="Nhập nội dung"></textarea>
  					</div>
  					<button type="submit" class="btn btn-primary">Gửi</button>
  				</form>
  			</div>
  		</div>
  		<div class="col-md-6" style="line-height: 30px;">
  			<h5>Công Ty Muối Hồng Vinsalt</h5>
  			<strong>Địa Chỉ: </strong>{{$config['address']['value']}}<br>

  			<strong>Hotline: </strong>{{$config['sdt']['value']}}<br>

  			<strong>Email: </strong> {{$config['email']['value']}}<br>

  			<strong>Website: </strong> www.muoihongvinsalt.com
  		</div>
  	</div>
  	<div class=" map_contact">
  			{!! $config['map']['value'] !!}
  	</div>
  </div>
</section>
@endsection