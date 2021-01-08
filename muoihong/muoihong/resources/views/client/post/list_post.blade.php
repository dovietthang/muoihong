@extends('client.layout')
@section('client_content')
<style type="text/css">
        .post:hover span{
          color:red;
        }
</style>
<section class="member">
	<div class="container">
                <div class="title_header_post">
                        <a href="{{route('homepage')}}"><i class="fa fa-home"></i></a>&ensp;/&ensp;<a href="javascript:void(0)">{{$cate}}</a>
                </div>
		<div class="row all_post">
		@foreach($list_post as $value)
                 <div class="col-md-3 post">
                 	<a href="{{route('detai_post',['id'=>$value->id,'slug'=>$value->slug])}}">
                 	<img src="/post_image/{{$value->image}}" width="100%">
                 	<div class="title_post">
                 		<h6>{{$value->name}}</h6>
                 		<span class="date">{{$value->date}} |</span> <span class="cate">{{$cate}}</span>
                 	</div>
                 	</a>
                 </div>
		@endforeach
		</div>
	</div>
</section>

@endsection