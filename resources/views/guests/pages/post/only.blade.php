@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        @include('modules.UIMenuNavigation.index')
        @if($article)
        @include('modules.UIDetailArticle.index')
        @else
        <div>
            Nội dung đang được cập nhật
        </div>
        @endif
    </div>
    <div class="col-md-4">
        @include('modules.UIVerticalMenu.index')

        @php $heading = "Tin tức - Sự kiện"; $array = $articles->whereIn('category_id', [87,88,89,97,98,99,100,101,141,142,143,144,148,149,150])->take(5); $sub_item_img = true; @endphp
        @include('modules.UITabArticle.index')
        
        @php $id = 5; @endphp
        @include('modules.UIAdvertisements.index')
        @php $type_display = 2; @endphp
        @include('modules.UIWebsiteLinks.index')
        
        @include('modules.UICounterVisitors.index')
    </div>
</div>
@endsection

@section('scripts')
@endsection