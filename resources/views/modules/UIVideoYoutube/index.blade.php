@if($type_display == 1)
@include('modules.UIVideoYoutube.css')
<div class="UIVideoYoutube Default1">
	<div class="heading">
		<span>Thư viện ảnh</span>
	</div>
	<div class="library-content-box">
		@foreach($UIVideoYoutube as $library)
		<a href="/thu-vien-anh/{{$library->id}}">
			<div class="row library">
				<div class="col-md-4"><img src="{{ asset('assets/guests/default/modules/UIVideoYoutube/img/youtube.png') }}" width="100%"></div>
				<div class="col-md-8"><span class="title">{{$library->name}}</span></div>
			</div>
		</a>
		@endforeach
	</div>
</div>
@else
@include('modules.UIVideoYoutube.css2')
<div class="UIVideoYoutube Default2">
	<div class="library-content-box">
		<div class="row view">
			<div class="col-md-12">
				<iframe width="100%" height="315" type="YoutubePlayer" src="https://www.youtube.com/embed/{{$UIVideoYoutube->first()->link}}"></iframe>
			</div>
		</div>
		<div class="row list-relative">
			@foreach($UIVideoYoutube as $library)
			<div class="col-md-3 item" data-href="{{$library->link}}">
				<img src="https://img.youtube.com/vi/{{$library->link}}/mqdefault.jpg" width="100%">
				<p>{{$library->name}}</p>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif