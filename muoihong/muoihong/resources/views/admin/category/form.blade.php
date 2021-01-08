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
					<h4 class="card-title">@if(isset($model->id)) Sửa danh muc @else Thêm danh mục @endif</h4>
					<form class="forms-sample" method="post" action="{{route('category.save')}}">
						{{csrf_field()}}
						<input type="hidden" name="id" value="{{$model->id}}">
						<input type="hidden" name="check_cate" value="{{$check_cate}}">
						@if($check_cate == 'post')
                        <div class="form-group">
							<label for="exampleInputEmail1">Danh mục menu</label>
							<select class="form-control col-md-3" name="id_menu" required="">
								<option value="">chọn</option>
								@foreach($menu as $value)
                                <option value="{{$value->id}}"  @if($model->id_menu == $value->id) selected="" @endif>{{$value->name}}</option>
								@endforeach
							</select>
						</div>
						@else
						<input type="hidden" name="id_menu" value="0">
						@endif
						<div class="form-group">
							<label for="exampleInputEmail1">Tên danh mục <span style="color: red">(*)</span></label>
							<input type="" class="form-control" name="name" required="" value="{{$model->name}}">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Trạng thái</label>
							<select name="active" class="form-control">
								<option value="1" @if($model->active === 1) selected="" @endif>Hiện</option>
								<option value="0" @if($model->active === 0) selected="" @endif>Ẩn</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success mr-2">Lưu</button>
						<a href="{{route('category',['check_cate'=>$check_cate])}}" class="btn btn-light">Huỷ</a>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection