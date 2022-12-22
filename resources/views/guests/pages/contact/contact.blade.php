@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('styles')
<!-- notifications CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/notifications/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/notifications/notifications.css') }}">
<style type="text/css">
.filter__box {
	background: var(--primary);
    text-align: center;
    padding: 5px 0;
    font-size: 15px;
    color: white;
    font-weight: bold;
}
.article__box {
    transition: transform .5s;
}
.article__box:hover {
    transform: scale(1.1);
    box-shadow: 0 0 10px rgb(0 0 0 / 20%);
    -webkit-box-shadow: 0 0 10px rgb(0 0 0 / 20%);
}
.article__box .title {
    font-weight: bold;
    padding: 10px 0px;
}
.article__box .time {
    font-size: 13px;
    color: black;
}
.article__box .description {
    color: black;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    display: -webkit-box;
    line-height: 1.5;
}
.right-content .box .product-item img {
    height: 160px;
}
</style>
@endsection
@section('content')
    
    @include('modules.UIMenuNavigation.index')
    @include('modules.UIContactUs.index')
    
@endsection
