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
          <h4 class="card-title">@if(isset($model->id)) Sửa bài viết @else Thêm bài viết @endif</h4>
          <form class="forms-sample" method="post" action="{{route('post.save')}}"  enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$model->id}}">
            <div class="form-group">
              <label for="exampleInputEmail1">Chuyên mục <span style="color: red">(*)</span></label>
              <select class="form-control col-md-3" name="id_cate" required="">
                 <option>Chọn danh mục</option>
                @foreach($cate_post as $value)
                  <option value="{{$value->id}}" @if($model->id_cate == $value->id) selected="" @endif>{{$value->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tiêu đề sản phẩm <span style="color: red">(*)</span></label>
              <input type="" class="form-control" name="name" required="" value="{{$model->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mô tả</label>
              <textarea name="description" class="form-control" id="editor">{{$model->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Ảnh <span style="color: red">(*)</span></label>
              <input type="file" class="form-control" name="image" @if(!$model->id) required="" accept=".jpg, .jpeg, .png" @endif>
              @if($model->image)
              <div class="form-group">
                <img src="/post_image/{{$model->image}}" width="100px" > 

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
            <button type="submit" class="btn btn-success mr-2">Lưu</button>
            <a href="{{route('post')}}" class="btn btn-light">Huỷ</a>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection