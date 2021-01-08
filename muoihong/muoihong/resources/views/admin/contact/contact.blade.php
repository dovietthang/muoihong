@extends('admin.layout')
@section('admin_content')

  <div class="row">
  	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách liên hệ</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>IP</th>
                          <th>Họ và tên</th>
                          <th>Email</th>
                          <th>Số điện thoại</th>
                          <th>Ghi chú</th>
                          <th>Địa chỉ</th>
                          <th>Ngày gửi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contact as $value)
                         <tr>
                         	<td>{{$value->id}}</td>
                         	<td>{{$value->ip}}</td>
                         	<td>{{$value->full_name}}</td>
                         	<td>{{$value->email}}</td>
                         	<td>{{$value->sdt}}</td>
                         	<td>{{$value->note}}</td>
                         	<td>{{$value->address}}</td>
                         	<td>{{$value->date}}</td>

                          <td>
                            <a href="javascript::void(0)" class="btn btn-danger delete" id="{{$value->id}}"><span class="fa fa-trash-o"></span></a>
                          </td>
                         </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <td colspan="10">
                          {{$contact->links()}}
                        </td>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('admin/js/toastr.js')}}"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('.delete').click(function(){
      var result = confirm("Bạn có muốn xóa liên hệ này không !");
      if (result) {
      var that = $(this);
      var id = that.attr('id');
      $.ajax({
        url: "{{route('contact')}}/delete-contact/"+id,
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