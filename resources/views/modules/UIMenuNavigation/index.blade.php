@include('modules.UIMenuNavigation.css')
<div class="UIMenuNavigation">
    <ul>
        <li><a href="{{ route('home.index') }}"><i class="fa fa-home me-2"></i>Trang chủ /</a></li>
        <li><a href="{{$category->slug}}">{{$category->name}}</a></li>
    </ul>
</div>