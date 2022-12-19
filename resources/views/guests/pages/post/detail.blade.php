@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        @include('modules.UIMenuNavigation.index')
        @include('modules.UIDetailArticle.index')
    </div>
    <div class="col-md-4">
        @include('modules.UIVerticalMenu.index')
        @php $type_display = 1; @endphp
        @include('modules.UIImageLibrary.List.index')
    </div>
</div>
@endsection

@section('scripts')
@endsection