@extends('guests.layouts.layout')

@section('title', $type == 'steering_documents' ? 'Chi tiết văn bản điều hành' : 'Chi tiết văn bản quy phạm pháp luật')

@section('styles')
  @include('modules.UIDetailSteeringDocument.css')
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        @include('modules.UIVerticalMenu.index')
        @php $type_display = 1; @endphp
        @include('modules.UIListImageLibrary.index')
    </div>
    <div class="col-md-8">
        @include('modules.UIMenuNavigation.index')
        @if($type == 'steering_documents')
            @include('modules.UIDetailSteeringDocument.index')
        @else
            @include('modules.UIDetailRulesOfLaw.index')
        @endif
    </div>
</div>  
@endsection
@section('scripts')
  
@endsection