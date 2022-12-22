<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Page Title -->
    <title>@yield('title')</title>
    @include('guests.partials.head')
</head>

<body>
    <div class="container">
        <div class="TopContent">
            @php $test = 1; @endphp @include('modules.UIBannerFooter.index')
            @include('modules.UIDropdownMenu.index')
            <div class="row py-2 px-3">
                <div class="col-md-4">
                    @include('modules.UIRealDateTime.index')
                </div>
                <div class="col-md-8">
                    <marquee behavior="scroll" direction="left">
                        <strong>
                            <span class="text-danger">Chào mừng bạn đến với cổng thông tin điện tử của Trường THCS DTNT Mỹ Tú</span>
                        </strong>
                    </marquee>
                </div>
            </div>
        </div>
        <div class="MiddleContent">
            @yield('content')
        </div>
        
    </div>
    <div class="BottomContent">
        @php $test = 2; @endphp @include('modules.UIBannerFooter.index')
    </div>
    @include('guests.partials.javascripts')
</body>

</html>