<div class="UIDropdownMenu">
    <div class="stellarnav">
        <ul>
            @foreach($menus as $menu)
            <li><a href="{{$menu->url ? $menu->url : '/'.$menu->slug}}">{{$menu->name}}</a>
                @if(count($menu->childs))
                <ul>
                    @foreach($menu->childs as $menu1)
                    <li><a href="{{$menu1->url ? $menu1->url : '/'.$menu1->slug}}">{{$menu1->name}}</a>
                        @if(count($menu1->childs))
                        <ul>
                            @foreach($menu1->childs as $menu2)
                            <li><a href="{{$menu2->url ? $menu2->url : '/'.$menu2->slug}}">{{$menu2->name}}</a>
                                @if(count($menu2->childs))
                                <ul>
                                    @foreach($menu2->childs as $menu3)
                                    <li><a href="{{$menu3->url ? $menu3->url : '/'.$menu3->slug}}">{{$menu3->name}}</a>
                                    @endforeach
                                </ul>
                                @endif
                            @endforeach
                        </ul>
                        @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
