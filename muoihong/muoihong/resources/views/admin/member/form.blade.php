@extends('admin.layout')
@section('admin_content')
<div class="col-md-12 d-flex align-items-stretch grid-margin">
  <div class="row flex-grow">
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
    @if(session('check') == "ok")
    <div class="col-12">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">@if(isset($model->id)) Sửa thành viên @else Thêm thành viên @endif</h4>
          <form class="forms-sample" method="post" action="{{route('member.save')}}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$model->id}}">
            <div class="form-group">
              <label for="exampleInputEmail1">Tên tài khoản <span style="color: red">(*)</span></label>
              <input type="" class="form-control" name="name" required="" value="{{$model->name}}" pattern="[A-Za-z0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputEmail1">Cấp bậc(F)</label>
              <select class="form-control">
                {{$model->showMember($member)}}
              </select>
            </div> -->
            <div class="form-group">
              <label for="exampleInputEmail1">Mật khẩu <span style="color: red">(*)</span></label>
              <input type="password" class="form-control" name="password" required="" pattern="[A-Za-z0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Số CMND <span style="color: red">(*)</span></label>
              <input type="number" class="form-control" name="cmnd" required="" value="{{$model->cmnd}}" pattern="[0-9]{6,30}" title="nhập tối thiểu 6 kí tự, tối đa 30 kí tự">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mã giới thiệu</label>
              <input type="" name="ma_gioi_thieu" class="form-control" value="{{$model->RefID}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email <span style="color: red">(*)</span></label>
              <input type="email" class="form-control" name="email" required="" value="{{$model->email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Họ và tên <span style="color: red">(*)</span></label>
              <input type="" class="form-control" name="full_name" required="" value="{{$model->full_name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" name="sdt" value="{{$model->sdt}}" pattern="(\+84|0)\d{9,10}" title="định dạng số diện thoại chưa đúng">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Địa chỉ </label>
              <input type="" class="form-control" name="address" value="{{$model->address}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tên ngân hàng + chi nhánh</label>
              <input type="" class="form-control" name="back_name" value="{{$model->back_name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số tài khoản ngân hàng</label>
              <input type="" class="form-control" name="stk" value="{{$model->stk}}" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Giới tính</label>
              <select name="gender" class="form-control">
                <option value="Nam" @if($model->active === 'Nam') selected="" @endif>Nam</option>
                <option value="Nữ" @if($model->active === 'Nữ') selected="" @endif>Nữ</option>
              </select>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Ngày sinh</label>
              <input type="" class="form-control" name="birthday" value="{{$model->birthday}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Trạng thái</label>
              <select name="active" class="form-control">
                <option value="1" @if($model->active === 1) selected="" @endif>Hiện</option>
                <option value="0" @if($model->active === 0) selected="" @endif>Ẩn</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success mr-2">Lưu</button>
            <a href="{{route('member')}}" class="btn btn-light">Huỷ</a>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection