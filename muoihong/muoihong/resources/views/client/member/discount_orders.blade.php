@extends('client.layout')
@section('client_content')
<section class="member">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group">
					<li class="list-group-item"><a href="{{route('detail_member')}}">Thông tin tài khoản</a></li>
					<li class="list-group-item"><a href="{{route('change_password')}}">Đổi mật khẩu</a></li>
					<li class="list-group-item "><a href="{{route('tra_cuu')}}">Quản lý đơn hàng</a></li>
					<li class="list-group-item active"><a href="{{route('don_hang_chiet_khau')}}">Quản lý đơn hàng chiết khấu</a></li>
					<li class="list-group-item"><a href="{{route('danh_sach_thanh_vien')}}">Quản lý thành viên</a></li>
					<li class="list-group-item"><a href="{{route('logout')}}">Đăng xuất</a></li>
				</ul>
			</div>
			<div class="col-md-9 member-right">
				<div class="member-header"> Danh sách đơn hàng</div>
				<div class="table-responsive member-body">
					<div class="table-list-order">
						
						 <input type="" id="myInput">
						 <button style="border: 0;background-color: #ef6176" onclick="myFunction()">Tìm kiếm</button>
				        <br>
				        <br>
						<table class="table table-bordered " >
							<thead style="text-align: center;">
								<tr>
									<td scope="col">ID</td>
									<td scope="col">Mã đơn hàng</td>
									<td scope="col">Ngày đặt hàng</td>
									<td scope="col">Tên người mua hàng</td>
									<td scope="col">Mã NPP | CMND</td>
									<td scope="col">Level được hưởng</td>
									<td scope="col">Số tiền đơn hàng</td>
									<td scope="col">Chiết khấu đơn hàng nhận được</td>
									<td scope="col">Chiết khấu SP giới thiệu trực tiếp</td>
									<td scope="col">Tổng tiền chiết khấu cuối cùng nhận được</td>
									<td scope="col">Thao tác</td>
								</tr>
							</thead>
							<tbody id="myTable">
							  {{$id_member->getOrderProduct($id_member->cmnd)}}
							</tbody>
						</table>
						<div> </div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
@endsection