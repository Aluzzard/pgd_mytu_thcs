
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}"></base>
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$information_website->logo}}">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/guests/default/mainstructure/css/bootstrap/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/guests/default/mainstructure/css/bootstrap/bootstrap.css') }}">
    <!-- Font awesome CSS
    ============================================ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <style>
        :root {
            --color-gradient: <?= $information_website->color_gradient ?>;
            --color-background: <?= $information_website->color_background ?>;
            --color-font: <?= $information_website->color_font ?>;
            --color-font-hover: <?= $information_website->color_font_hover ?>;
            --color-font-focus: <?= $information_website->color_font_focus ?>;
        }
        .container {
            width: 1000px;
        }
    </style>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="s7f9sY8l"></script>
    @yield('styles')

    @include('modules.UIBannerFooter.css')
    @include('modules.UIDropdownMenu.css')
    @include('modules.UIRealDateTime.css')
    @include('modules.UIFeaturedNews.css')
    @include('modules.UIVerticalMenu.css')
    @include('modules.UISteeringDocument.Tab.css')
    @include('modules.UITabArticle.css')
    @include('modules.UICounterVisitors.css')
