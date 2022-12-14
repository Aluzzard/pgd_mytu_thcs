@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		@include('modules.UIFeaturedNews.index')
		@php $id = 4; @endphp
		@include('modules.UIAdvertisements.index')

		
	</div>
	<div class="col-md-4">
		@php $heading = "TIN TỨC - SỰ KIỆN"; $array = $articles->whereIn('category_id', [87,88,89,97,98,99,100,101,141,142,143,144,148,149,150])->take(5); $sub_item_img = true; @endphp
		@include('modules.UITabArticle.index')

		@php $id = 5; @endphp
		@include('modules.UIAdvertisements.index')
	</div>
</div>
<div class="row">
	<div class="col-md-12">

	</div>
</div>
<div class="row">
	<div class="col-md-4">
		@include('modules.UIVerticalMenu.index')
		@php $type_display = 2; @endphp
		@include('modules.UIWebsiteLinks.index')
		@php $type_display = 1; @endphp
		@include('modules.UIListImageLibrary.index')
		@php $type_display = 1; @endphp
		@include('modules.UIMultiHtml.index')
		@include('modules.UICounterVisitors.index')
	</div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-6">
				@php $heading = "Văn bản mới"; $array = $documents_new->take(10); @endphp
				@include('modules.UISteeringDocumentNew.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản Phòng GD&ĐT"; $array = $steering_documents->where('organization_id', 11)->take(10); @endphp
				@include('modules.UISteeringDocumentNew.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản Quy phạm Pháp luật"; $array = $rules_of_law->take(10); @endphp
				@include('modules.UISteeringDocumentNew.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Văn bản HĐND-UBND Huyện"; $array = $rules_of_law->where('organization_id', 14)->take(10); @endphp
				@include('modules.UISteeringDocumentNew.index')
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				@php $heading = "Lịch công tác"; $array = $articles->where('category_id', 105)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Hoạt động - Sự kiện"; $array = $articles->where('category_id', 87)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Giáo dục mầm non"; $array = $articles->where('category_id', 88)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Giáo dục tiểu học"; $array = $articles->where('category_id', 100)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Giáo dục trung học cơ sở"; $array = $articles->where('category_id', 101)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
			<div class="col-md-6">
				@php $heading = "Trường học thân thiện"; $array = $articles->where('category_id', 104)->take(4); @endphp
				@include('modules.UITabArticle.index')
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@include('modules.UISchools.index')
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@endsection