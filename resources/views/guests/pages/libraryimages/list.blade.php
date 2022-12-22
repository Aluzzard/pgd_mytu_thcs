@extends('guests.layouts.layout')

@section('title', 'Thư viện ảnh')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('modules.UIMenuNavigation.index')
            @php $type_display = 2; @endphp
            @include('modules.UIImageLibrary.List.index')
        </div>
        <div class="col-md-4">
            @include('modules.UIVerticalMenu.index')

            @php $heading = "Tin tức - Sự kiện"; $array = $articles->whereIn('category_id', [87,88,89,97,98,99,100,101,141,142,143,144,148,149,150])->take(5); $sub_item_img = true; @endphp
            @include('modules.UITabArticle.index')
            
            @php $id = 5; @endphp
            @include('modules.UIAdvertisements.index')
            @php $type_display = 2; @endphp
            @include('modules.UIWebsiteLinks.index')

        </div>
    </div>

@endsection