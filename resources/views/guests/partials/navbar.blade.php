<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="/"><img src="{{$information_website->logo}}" alt="Logo" width="50"></a>
                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">
                            @foreach($menus as $key=>$menu)
                                @if(count($menu->childs))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$menu->name}}</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($menu->childs as $menu1)
                                        <a class="dropdown-item" href="{{$menu1->url ? $menu1->url : '/'.$menu1->slug}}">{{$menu1->name}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{$menu->url ? $menu->url : '/'.$menu->slug}}">{{$menu->name}}</a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                        <!-- Search Form  -->
                        <div id="search-wrapper">
                            <form action="#">
                                <input type="text" id="search" placeholder="Tìm kiếm...">
                                <div id="close-icon"></div>
                                <input class="d-none" type="submit" value="">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->