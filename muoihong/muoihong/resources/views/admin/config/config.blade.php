@extends('admin.layout')
@section('admin_content')
  <div class="row">
  	@if(session('check_config') == "ok")
        <div class="col-12">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thành công!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
    @endif
  	<div class="col-md-12">
  		<div class="card">
  			<div class="card-body">
  				<h4 class="card-title">Cấu hình website</h4>
  				<form class="forms-sample" action="{{route('configsave')}}" method="post" enctype="multipart/form-data">
  					@csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên website</label>
              <input type="text" class="form-control" name="value[namesite]" value="{{isset($model['namesite']['value']) ?$model['namesite']['value']:'' }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input type="text" class="form-control" name="value[address]" value="{{isset($model['address']['value']) ?$model['address']['value']:'' }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" name="value[sdt]" value="{{isset($model['sdt']['value']) ?$model['sdt']['value']:'' }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" class="form-control" name="value[email]" value="{{isset($model['email']['value']) ?$model['email']['value']:'' }}">
            </div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">F (%)</label>
  						<input type="text" class="form-control" name="value[F]" value="{{isset($model['F']['value']) ?$model['F']['value']:'' }}">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">F1 (%)</label>
  						<input type="text" class="form-control" name="value[F1]" value="{{isset($model['F1']['value']) ?$model['F1']['value']:'' }}">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">F2 (%)</label>
  						<input type="text" class="form-control" name="value[F2]" value="{{isset($model['F2']['value']) ?$model['F2']['value']:'' }}">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">F3 (%)</label>
  						<input type="text" class="form-control" name="value[F3]" value="{{isset($model['F3']['value']) ?$model['F3']['value']:'' }}">
  					</div>
  					<div class="form-group">
  						<label for="exampleInputEmail1">F4 (%)</label>
  						<input type="text" class="form-control" name="value[F4]" value="{{isset($model['F4']['value']) ?$model['F4']['value']:'' }}">
  					</div>
            <div class="form-group">
              <label for="exampleInputEmail1">Footer</label>
              <input type="text" class="form-control" name="value[footer]" value="{{isset($model['footer']['value']) ?$model['footer']['value']:'' }}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">iframe youtobe</label>
              <textarea class="form-control" name="value[youtobe]">{{isset($model['youtobe']['value']) ?$model['youtobe']['value']:'' }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bản đồ</label>
              <textarea class="form-control" name="value[map]">{{isset($model['map']['value']) ?$model['map']['value']:'' }}</textarea>
            </div>
  					<button type="submit" class="btn btn-success mr-2">Submit</button>
  				</form>
  			</div>
  		</div>
  	</div>
  </div>

@endsection