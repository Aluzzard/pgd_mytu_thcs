@extends('guests.layouts.layout')

@section('title', $type == 'steering_documents' ? 'Văn bản điều hành' : 'Văn bản quy phạm pháp luật')

@section('styles')
  @include('modules.UISteeringDocument.List.css')
@endsection

@section('content')

<div class="row">
    <div class="col-md-4">
        @include('modules.UIVerticalMenu.index')
        @php $type_display = 1; @endphp
        @include('modules.UIImageLibrary.List.index')
    </div>
    <div class="col-md-8">
        
        @if($type == 'steering_documents')
            @include('modules.UISteeringDocument.List.index')
        @else
            @include('modules.UIRulesOfLaw.List.index')
        @endif
    </div>
</div>
@endsection

@section('scripts')
	@include('modules.UISteeringDocument.List.javascripts')
@endsection


