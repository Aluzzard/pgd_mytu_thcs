@if($type_display == 1)
@include('modules.UIListImageLibrary.css')
<div class="UIListLibraryImage_Default1">
	<div class="heading">
		Thư viện ảnh
	</div>
	<div class="library-content-box">
		@foreach($image_libraries as $library)
		<a href="/thu-vien-anh/{{$library->id}}">
			<div class="row library">
				<div class="col-md-4"><img src="{{$library->path}}" width="100%"></div>
				<div class="col-md-8">{{$library->name}}</div>
			</div>
		</a>
		@endforeach
	</div>
</div>
@else
@include('modules.UIListImageLibrary.css2')
<div class="UIListLibraryImage_Default2">
	<div class="library-content-box">
		<div class="row library">
			@foreach($image_libraries as $library)
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