@extends('guests.layouts.layout')

@section('title') {{$information_website->name}} @endsection
@section('meta') {{$information_website->name}} @endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('modules.UIVerticalMenu.index')
        @php $type_display = 1; @endphp
        @include('modules.UIListImageLibrary.index')
    </div>
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
</div>
@endsection

@section('scripts')
@endsection