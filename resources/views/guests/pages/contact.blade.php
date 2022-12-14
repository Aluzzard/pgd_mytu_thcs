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
    
	<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Liên hệ</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="{{ route('home.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3 title">Liên hệ</h1>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                        <h5 class="text-white">Số điện thoại</h5>
                        <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>{{$information_website->numberphone}}</p>
                        <h5 class="text-white">Email</h5>
                        <p class="mb-5"><i class="fa fa-envelope me-3"></i>{{$information_website->email}}</p>
                        <h5 class="text-white">Địa chỉ</h5>
                        <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>{{$information_website->address}}</p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    @if(count($errors)>0)
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $err)
                        {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(Session::has('flash_success'))
                    <div class="alert alert-success">
                        {{ session('flash_success') }}
                    </div>
                    @endif
                    <form id="form-action" method="post" action="{{ route('home.contact.post') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-control" name="type" value="{{ old('type') }}">
                                        <option value="0"> Khách hàng</option>
                                        <option value="1"> Mở đại lý</option>
                                    </select>
                                    <label>Loại</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    <label for="name">Họ tên</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="numberphone" value="{{ old('numberphone') }}">
                                    <label for="email">Số điện thoại</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                    <label for="subject">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" value="{{ old('content') }}" name="content" style="height: 200px"></textarea>
                                    <label for="message">Nội dung</label>
                                </div>
                            </div>
                            <div class="col-md-6">
					            <div class="form-floating">
					              	<input type="text" id="captcha" name="captcha" class="form-control" placeholder="Nhập mã bảo vệ">
					              	<label for="message">Nhập mã bảo vệ</label>
					            </div>
				            </div>
				            <div class="col-md-6">
				              	<span class="btn-captcha">
				                	<img src="{!! captcha_src(); !!}"/>
				            	</span>
				          	</div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
   
@endsection
