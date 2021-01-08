@extends('admin.layout')
@section('admin_content')
<div class="col-md-12 d-flex align-items-stretch grid-margin">
  <div class="row flex-grow">
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
          <h4 class="card-title">@if(isset($model->id)) Sửa sản phẩm @else Thêm sản phẩm @endif</h4>
          <form class="forms-sample" method="post" action="{{route('product.save')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$model->id}}">
            <div class="form-group">
              <label for="exampleInputEmail1">Danh mục tra <span style="color: red">(*)</span></label>
              <select class="form-control col-md-3" name="id_cate">
                @foreach($cate_product as $value)
                  <option value="{{$value->id}}"  @if($model->id_cate == $value->id) selected="" @endif>{{$value->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tiêu đề sản phẩm <span style="color: red">(*)</span></label>
              <input type="" class="form-control" name="name" required="" value="{{$model->name}}">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Mã sản phẩm <span style="color: red"></span></label>
              <input type="" class="form-control" name="ma_sp" value="{{$model->ma_sp}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mô tả</label>
              <textarea name="description" class="form-control" id="editor">{{$model->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Gía</label>
              <input type="number" class="form-control" name="price" value="{{$model->price}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số lượng</label>
              <input type="number" class="form-control" name="quantity"  value="{{$model->quantity}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Ảnh <span style="color: red">(*)</span></label>
              <input type="file" class="form-control" name="image" @if(!$model->id) required="" accept=".jpg, .jpeg, .png" @endif>
              @if($model->image)
              <div class="form-group">
                <img src="/product_image/{{$model->image}}" width="100px">

              </div>
              @endif
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Trạng thái</label>
              <select name="active" class="form-control">
                <option value="1" @if($model->active === 1) selected="" @endif>Hiện</option>
                <option value="0" @if($model->active === 0) selected="" @endif>Ẩn</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success mr-2">Lưu </button>
            <a href="{{route('product')}}" class="btn btn-light">Huỷ</a>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
  // function setTwoNumberDecimal(el) {
  //       var ok = new Intl.NumberFormat('vi-VN').format($('#price').val()); 
  //       $('#price').val(ok)
  //   };
</script>
@endsection