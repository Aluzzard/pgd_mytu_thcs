@extends('guests.layouts.layout')

@section('title', $type == 'steering_documents' ? 'Văn bản điều hành' : 'Văn bản quy phạm pháp luật')

@section('styles')
  @include('modules.UIListSteeringDocument.css')
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
            @include('modules.UIListSteeringDocument.index')
        @else
            @include('modules.UIListRulesOfLaw.index')
        @endif
    </div>
</div>
@endsection

@section('scripts')
	@include('modules.UIListSteeringDocument.javascripts')
@endsection


