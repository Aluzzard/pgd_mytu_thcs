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
				@php $heading = "Văn bản mới"; $array = $steering_documents->take(10); @endphp
				@include('modules.UISteeringDocument.Tab.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản Phòng GD&ĐT"; $array = $steering_documents->where('organization_id', 11)->take(10); @endphp
				@include('modules.UISteeringDocument.Tab.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thời khóa biểu"; $array = $articles->where('category_id', 88)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thi - Kiểm tra"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
		</div>
		@php $id = 6; @endphp
		@include('modules.UIAdvertisements.index')
		<div class="row">
			<div class="col-md-6">
				@php $heading = "Hoạt động chuyên môn"; $array = $articles->where('category_id', 105)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Hoạt động đoàn - Đội"; $array = $articles->where('category_id', 88)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Công khai theo TT36"; $array = $articles->where('category_id', 88)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Kế hoạch Năm - Tháng"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Lịch công tác tuần của BGH"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Thông báo"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản trường"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Hoạt động NGLL"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Ban đại diện CMHS"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Công tác nội trú"; $array = $articles->where('category_id', 100)->take(4); $sub_item_img = false; @endphp
				@include('modules.UITabArticle.index')
			</div>
		</div>
	</div>
	<div class="col-md-4">
		@php $heading = "TIN TỨC - SỰ KIỆN"; $array = $articles->whereIn('category_id', [87,88,89,97,98,99,100,101,141,142,143,144,148,149,150])->take(5); $sub_item_img = true; @endphp
		@include('modules.UITabArticle.index')

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