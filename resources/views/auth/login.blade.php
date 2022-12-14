<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="{{ asset('') }}"></base>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/font-awesome.min.css') }}">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/adminpro-custon-icon.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/animate.css') }}">
    <!-- form CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/form/form.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/customtheme/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/administration/mainstructure/css/responsive.css') }}">
</head>

<body class="materialdesign">
	<div class="login-form-area mg-t-30 mg-b-40">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-4"></div>
	            <form id="adminpro-form" class="adminpro-form" method="POST" action="{!!route('auth.post.login')!!}">
	                <div class="col-lg-4">
	                    <div class="login-bg">
                        	{{ csrf_field() }}
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="logo">
	                                    <img src="assets/administration/mainstructure/img/logo/logo-vnpt.png" width="350" />
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="login-title">
	                                    <h1>Đăng nhập hệ thống</h1>
	                                </div>
	                            </div>
	                        </div>
	                        @if (session()->has('message'))
	                        <div class="alert alert-danger alert-dismissable">
	                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                            {{ session()->get('message') }}
	                        </div>
	                        @endif
	                        <div class="row">
	                            <div class="col-lg-4">
	                                <div class="login-input-head">
	                                    <p>Tên đăng nhập</p>
	                                </div>
	                            </div>
	                            <div class="col-lg-8">
	                                <div class="login-input-area">
	                                    <input type="text" name="account" />
	                                    <i class="fa fa-user login-user" aria-hidden="true"></i>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-lg-4">
	                                <div class="login-input-head">
	                                    <p>Mật khẩu</p>
	                                </div>
	                            </div>
	                            <div class="col-lg-8">
	                                <div class="login-input-area">
	                                    <input type="password" name="password" />
	                                    <i class="fa fa-lock login-user"></i>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
                                <div class="login-button-pro">
                                    <button type="submit" class="login-button login-button-lg">Đăng nhập</button>
                                </div>
	                        </div>
	                    </div>
	                </div>
	            </form>
	            <div class="col-lg-4"></div>
	        </div>
	    </div>
	</div>
	    <!-- jquery
		============================================ -->
    <script src="{{ asset('assets/administration/mainstructure/js/vendor/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('assets/administration/mainstructure/js/bootstrap.min.js') }}"></script>
    <!-- form validate JS
		============================================ -->
    <script src="{{ asset('assets/administration/mainstructure/js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('assets/administration/mainstructure/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/administration/mainstructure/js/form-active.js') }}"></script>
</body>

</html>