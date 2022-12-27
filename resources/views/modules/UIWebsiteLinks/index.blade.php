@if($type_display == 1)
@include('modules.UIWebsiteLinks.css')
<div class="UIWebsiteLinks_Default1">
	<div class="heading">
		<span>Chính phủ điện tử</span>
	</div>
	<div class="link-content-box">
		@foreach($UIWebsiteLinks as $link)
		@if( $link->avatar )
		<a class="item" href="{{$link->slug}}" target="_blank">
			<img src="{{$link->avatar}}" width="100%">
			<div class="title">
				{{$link->name}}
			</div>
		</a>
		@endif
		@endforeach
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
			@foreach($UIWebsiteLinks as $link)
			@if( !$link->avatar )
			<option value="{{$link->slug}}">{{$link->name}}</option>
			@endif
			@endforeach
		</select>
	</div>
</div>
@endif
