@extends('guests.layouts.layout')

@section('title', 'Thư viện ảnh')

@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('modules.UIVerticalMenu.index')
            @php $type_display = 1; @endphp
            @include('modules.UIListImageLibrary.index')
        </div>
        <div class="col-md-8">
            @include('modules.UIMenuNavigation.index')
            @php $type_display = 2; @endphp
            @include('modules.UIListImageLibrary.index')
        </div>
    </div>

@endsection