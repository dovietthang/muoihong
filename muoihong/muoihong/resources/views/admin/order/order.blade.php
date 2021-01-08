@extends('admin.layout')
@section('admin_content')

  <div class="row">
  	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách đơn hàng</h4>
                  <form method="get" action="">
                   <select name="keyword">
                     <option value='all' @if($key === 'all') selected="" @endif >Tất cả</option>
                     <option value='0' @if($key === '0') selected="" @endif>Đã huỷ</option>
                     <option value='1' @if($key === '1') selected="" @endif>Đã duyệt</option>
                     <option value='null' @if($key === 'null') selected="" @endif>Đang đợi duyệt</option>
                   </select>
                   <button>Tìm kiếm</button>
                </form><br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Thành viên</th>
                          <th>Giá</th>
                          <th>Mã đơn hàng</th>
                          <th>Ngày thực hiện</th>
                          <th>Địa chỉ</th>
                          <th>Ghi chú</th>
                          <th style="text-align: center;">Trạng thái</th>cs
                          <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($list_order as $value)
                         <tr>
                         	<td>{{$value->id}}</td>
                         	<td>{{$value->member_id}}</td>
                          <td>{{number_format($value->price, 0, '', '.')}} đ</td>
                          <td>{{$value->code_order}}</td>
                          <td>{{$value->date_order}}</td>
                          <td>{{$value->address}}</td>
                          <td>{{$value->node}}</td>
                          <td >
                            <!-- @if($value->active == 1)
                               <a href="javascript::void(0)" class="status btn" id="{{$value->id}}" data-text='huỷ'>Duyệt đơn</a>
                             @else
                               <a href="javascript::void(0)"  class="status btn" id="{{$value->id}}" data-text='duyệt'>Huỷ đơn</a>
                            @endif -->
                            @if(is_null($value->active))
                          
                                 <a href="javascript::void(0)" class="status_1 btn btn-warning" id="{{$value->id}}" data-text='huỷ'>Từ chối</a>
                                 <a href="javascript::void(0)" class="status_2 btn btn-success" id="{{$value->id}}" data-text='duyệt'>Duyệt đơn</a>
                       
                            @endif
                           
                          </td>
                          <td>
                            <a href="{{route('order.order_product',['id'=>$value->id])}}" class="btn btn-warning" title="Xem tất cả sản phẩm trong đơn hàng"><span class=" fa fa-folder-open"></span> </a>
                            <a href="javascript::void(0)" class="btn btn-danger delete" id="{{$value->id}}" data-toggle="tooltip" title="Xoá đơn hàng"><span class="fa fa-trash-o"></span></a>
                          </td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div>{{$list_order->links()}}</div>
                  </div>
                </div>
              </div>
            </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('admin/js/toastr.js')}}"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('.status_1').click(function(){
      var text_confirm = $(this).attr('data-text');
      console.log(text_confirm);
      var r = confirm("Bạn có muốn "+text_confirm+" đơn không!");
      if (r == true) {
      var that = $(this);
      var id = that.attr('id');
      $.ajax({
        url: "{{route('order')}}/update-status/"+id,
        method: "GET",
        dataType: 'JSON',
        success: function(data){
           that.parent().parent().addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
           });
          toastr.success('Thành công !');
        }
        })
      }
    })
    $('.status_2').click(function(){
      var text_confirm = $(this).attr('data-text');
      console.log(text_confirm);
      var r = confirm("Bạn có muốn "+text_confirm+" đơn không!");
      if (r == true) {
      var that = $(this);
      var id = that.attr('id');
      $.ajax({
        url: "{{route('order')}}/update-status/"+id,
        method: "GET",
        dataType: 'JSON',
        success: function(data){
           that.parent().parent().addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
           });
          toastr.success('Thành công !');
        }
        })
      }
    })
    $('.delete').click(function(){
      var result = confirm("Xóa danh mục sẽ đơn hàng !");
      if (result) {
      var that = $(this);
      var id = that.attr('id');
      $.ajax({
        url: "{{route('order')}}/destroy/"+id,
        method: "GET",
        dataType: 'JSON',
        success: function(data){
          if(data == 'success'){
            that.parent().parent().addClass('removed-item').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
                $(this).remove();
           });
            toastr.success('Thành công !');
          }
          
        }
        })
      }
    })
  })
 
</script>
 @endsection