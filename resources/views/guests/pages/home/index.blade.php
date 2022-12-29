@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		@include('modules.UIFeaturedNews.index')
		@php $id = 4; @endphp
		@include('modules.UIAdvertisements.index')
		<div class="row">
			<div class="col-md-6">
				@php $heading = "Văn bản mới"; $array = $UISteeringDocument->take(10); @endphp
				@include('modules.UISteeringDocument.Tab.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản Phòng GD&ĐT"; $array = $UISteeringDocument->where('organization_id', 11)->take(10); @endphp
				@include('modules.UISteeringDocument.Tab.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thời khóa biểu"; $array = $UITabArticle->where('category_id', 88)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thi - Kiểm tra"; $array = $UITabArticle->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
		</div>
		@php $id = 6; @endphp
		@include('modules.UIAdvertisements.index')
		<div class="row">
			<div class="col-md-6">
				@php $heading = "Hoạt động chuyên môn"; $array = $UITabArticle->whereIn('category_id', [148,149,150])->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Hoạt động đoàn - Đội"; $array = $UITabArticle->where('category_id', 89)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Công khai theo TT36"; $array = $UITabArticle->where('category_id', 142)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Kế hoạch Năm - Tháng"; $array = $UITabArticle->where('category_id', 143)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Lịch công tác tuần của BGH"; $array = $UITabArticle->where('category_id', 141)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thông báo"; $array = $UITabArticle->where('category_id', 144)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Hoạt động NGLL"; $array = $UITabArticle->where('category_id', 145)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Ban đại diện CMHS"; $array = $UITabArticle->where('category_id', 147)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Công tác nội trú"; $array = $UITabArticle->where('category_id', 146)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
		</div>
	</div>
	<div class="col-md-4">
		@php $heading = "TIN TỨC - SỰ KIỆN"; $array = $UIHotNews->whereIn('category_id', [87,88,89,97,98,99,100,101,141,142,143,144,148,149,150])->take(5); $sub_item_img = true; @endphp
		@include('modules.UIHotNews.index')

		@php $id = 5; @endphp
		@include('modules.UIAdvertisements.index')

		@php $type_display = 2; @endphp
		@include('modules.UIWebsiteLinks.index')

		@php $type_display = 1; @endphp
		@include('modules.UIImageLibrary.List.index')
		@include('modules.UICounterVisitors.index')
	</div>
</div>
@endsection

@section('scripts')
@endsection