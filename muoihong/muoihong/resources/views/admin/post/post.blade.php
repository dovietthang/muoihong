@extends('admin.layout')
@section('admin_content')
  <div class="row">
  	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách bài viết</h4>
                  <p class="card-description">
                   <a href="{{route('post.create')}}" class="btn btn-primary"><span class="fa fa-plus-circle"></span></a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Ảnh đại diện</th>
                          <th>Tên</th>
                          <th>Chuyên mục tra</th>
                          <th>Trạng thái</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($post as $value)
                         <tr>
                         	<td>{{$value->id}}</td>
                          <td><img src="/post_image/{{$value->image}}" width="150px;"></td>
                         	<td>{{$value->name}}</td>
                          <td>{{$value->find_cate($value->id_cate)}}</td>
                          <td>
                            @if($value->active == 1)
                               <a href="javascript::void(0)" class="status" id="{{$value->id}}"><span class="fa fa-check"></span></a>
                             @else
                               <a href="javascript::void(0)"  class="status" id="{{$value->id}}"><span class="fa fa-remove"></span></a>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('post.edit',['id'=>$value->id])}}" class="btn btn-warning"><span class=" fa fa-edit"></span> </a>
                            <a href="javascript::void(0)" class="btn btn-danger delete" id="{{$value->id}}"><span class="fa fa-trash-o"></span></a>
                          </td>
                         </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <td colspan="5">
                          {{$post->links()}}
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
    $('.status').click(function(){
      var that = $(this)
      var id = that.attr('id');
      $.ajax({
        url: "{{route('post')}}/update-status/"+id,
        method: "GET",
        dataType: 'JSON',
        success: function(data){
          console.log(data);
          if(data == 'fa-check'){
            that.html('<span class="fa fa-check"></span>');       
          }else{
            that.html('<span class="fa fa-remove"></span>');    
          } 
          toastr.success('Thành công !');
        }
        })
    })
    $('.delete').click(function(){
      var result = confirm("Bạn có muốn xóa bài viết không !");
      if (result) {
      var that = $(this);
      var id = that.attr('id');
      $.ajax({
        url: "{{route('post')}}/destroy/"+id,
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