@extends('guests.layouts.layout')

@section('title') Thư viện ảnh @endsection

@section('styles')
<style type="text/css">
.att2 {
    background-size: cover;
    height: 400px;
    width: auto;
    background-repeat: no-repeat;
    background-position: 50% 50%;
}
@media only screen and (max-width: 500px) {
    .h-100px{
        height: 100px!important;
        /*background-size: contain!important;*/

    }
}
.carousel-indicators {
    bottom: -50px;
    margin: 0;
}
.carousel-indicators li {
    width: 100px !important;
}
.carousel-indicators > li > img {
/*    width: 100px !important;*/
    height: 100px;
    object-fit: cover;

}
.carousel-indicators > li.active > img {
    border: 3px dotted red;
}
#carouselExampleIndicators1 .owl-dots {
    text-align: center;
    position: absolute;
    bottom: 20px;
    width: 100%;
}
#carouselExampleIndicators1 .owl-dots button.owl-dot {
  width: 15px;
  height: 15px;
  border-radius: 50%;
  display: inline-block;
  background: white;
  margin: 0 3px;
}
#carouselExampleIndicators1 .owl-dots button.owl-dot.active {
  background-color: red;
  border: 2px solid white;
}
#carouselExampleIndicators1 .owl-dots button.owl-dot:focus {
  outline: none;
}
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            @include('modules.UIVerticalMenu.index')
            @php $type_display = 1; @endphp
            @include('modules.UIImageLibrary.List.index')
        </div>
        <div class="col-md-8">
            @php $type_display = 2; @endphp
            @include('modules.UIImageLibrary.Detail.index')
        </div>
    </div>
  
@endsection