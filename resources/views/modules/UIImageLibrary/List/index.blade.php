@if($type_display == 1)
@include('modules.UIImageLibrary.List.css')
<div class="UIListLibraryImage_Default1">
	<div class="heading">
		<span>Thư viện ảnh</span>
	</div>
	<div class="library-content-box">
		@foreach($UIImageLibrary as $library)
		<a href="/thu-vien-anh/{{$library->id}}">
			<div class="row library">
				<div class="col-md-4"><img src="{{$library->path}}" width="100%"></div>
				<div class="col-md-8"><span class="title">{{$library->name}}</span></div>
			</div>
		</a>
		@endforeach
	</div>
</div>
@else
@include('modules.UIImageLibrary.List.css2')
<div class="UIListLibraryImage_Default2">
	<div class="library-content-box">
		<div class="row library">
			@foreach($UIImageLibrary as $library)
				<div class="col-md-3">
					<a href="/thu-vien-anh/{{$library->id}}">
						<img src="{{$library->path}}" width="100%">
						<div class="title">{{$library->name}}</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endif