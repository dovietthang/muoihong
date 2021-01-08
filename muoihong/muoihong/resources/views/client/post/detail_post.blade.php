@extends('client.layout')
@section('client_content')
<section class="member" style="font-size: 19px;">
	<div class="container">
		<div class="title_header_post">
			<a href="{{route('homepage')}}"><i class="fa fa-home"></i></a>&ensp;/&ensp;<a href="javascript:void(0)">{{$name_cate->menu_name}}</a>&ensp;/&ensp;<a href="{{route('list_post',['id'=>$name_cate->id_cate,'slug'=>$name_cate->slug_menu])}}">{{$name_cate->cate_name}}</a>&ensp;/&ensp;<a href="">{{$detail_post->name}}</a>
		</div> 
		<div class="row">
			<div class="col-md-12">
				<h3>{{$detail_post->name}}</h3>
				<div id="fb-share-button" class="btn">
                    
                      <span>Facebook</span>
                      <!-- nút chia sẻ fb -->
                      <script>var fbButton = document.getElementById('fb-share-button');
                      var url = window.location.href;
                      console.log(url)
                      fbButton.addEventListener('click', function() {
                          window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
                            'facebook-share-dialog',
                            'width=800,height=600'
                            );
                          return false;
                      });</script>
                  </div>
				<p><i class="fa fa-calendar"></i>&ensp;{{$detail_post->date}}</p>
				<p>{!! $detail_post->description !!}</p>
			</div>
		</div>
		@if(count($list_post_relate) >0)
		<div class="row ">
			<div class="col-md-12">
				<h3>Bài viết liên quan</h3>
				@foreach($list_post_relate as $value)
                <div class="list_post_relate">
                	<a href="{{route('detai_post',['id'=>$value->id,'slug'=>$value->slug])}}">&raquo;	{{$value->name}}
                	   <span style="color: #0099FF">({{$value->date}})</span>
                    </a>
                </div>
				@endforeach
			</div>
		</div>
		@endif
	</div>
</section>
@endsection