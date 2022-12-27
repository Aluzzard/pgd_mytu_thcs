@extends('guests.layouts.layout')

@section('title', 'Thư viện video youtube')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('modules.UIMenuNavigation.index')
            @php $type_display = 2; @endphp
            @include('modules.UIVideoYoutube.index')
        </div>
        <div class="col-md-4">
            @php $type_display = 1; @endphp
            @include('modules.UIWebsiteLinks.index')

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