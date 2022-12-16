@if($type_display == 1)
@include('modules.UIWebsiteLinks.css')
<div class="UIWebsiteLinks_Default1">
	<div class="heading">
		CHÍNH PHỦ ĐIỆN TỬ
	</div>
	<div class="link-content-box">
		<div class="row">
			@foreach($website_links as $link)
			@if( $link->avatar )
			<div class="col-md-4">
				<a class="item" href="{{$link->slug}}">
					<img src="{{$link->avatar}}" width="100%">
					<div class="title">
						{{$link->name}}
					</div>
				</a>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
@else
@include('modules.UIWebsiteLinks.css2')
<div class="UIWebsiteLinks_Default2">
	<div class="heading">
		<span>Liên kết website</span>
	</div>
	<div class="link-content-box">
		<select class="form-control" onchange="window.open(this.value)">
			<option selected>-- Chọn liên kết --</option>
			@foreach($website_links as $link)
			@if( !$link->avatar )
			<option value="{{$link->slug}}">{{$link->name}}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>
@endif
