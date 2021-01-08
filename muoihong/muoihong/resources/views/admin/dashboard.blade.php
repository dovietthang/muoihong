@extends('admin.layout')
@section('admin_content')
<style type="text/css">
	.count_db{
		background-color: #ccc;
		padding: 10px 10px;
		margin: 10px 0;
		border-radius: 10px;
	}
</style>
<div class="col-md-12 d-flex align-items-stretch grid-margin">
	<div class="row flex-grow">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				  <div class="count_db">Số lượng sản phẩm:  {{$san_pham}}</div>
                  <div class="count_db">Số lượng danh mục sản phẩm: {{$danh_muc}}</div>
                  <div class="count_db">Số lượng bài viết: {{$tin}}</div>
                  <div class="count_db">Số lượng chuyên mục bài viết: {{$chuyen_muc}}</div>
                  <div class="count_db">Số lượng thành viên: {{$thanh_vien}}</div>
                  <div class="count_db">Số lượng đặt hàng: {{$dat_hang}}</div>
                  <div class="count_db">Số lượng liên hệ: {{$lien_he}}</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection