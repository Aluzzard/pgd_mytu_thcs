@include('modules.UIMenuNavigation.css')
<div class="UIMenuNavigation">
    <ul>
        <li><a href="{{ route('home.index') }}"><i class="fa fa-home me-2"></i>Trang chủ</a></li>
        @foreach($UIMenuNavigation as $menu)
        <li><a href="{{$menu->slug}}"> / {{$menu->name}}</a></li>
        @endforeach
    </ul>
</div>