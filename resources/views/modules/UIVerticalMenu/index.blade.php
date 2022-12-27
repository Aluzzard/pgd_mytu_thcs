<div class="UIVerticalMenu">
	@foreach($UIVerticalMenu as $v_menu)
		@if(count($v_menu->childs) > 0)
		<div class="heading">{{$v_menu->name}}</div>
			@if(count($v_menu->childs))
			<ul class="content">
				@foreach($v_menu->childs->where('show_v_menu', 1) as $v_menu1)
				<li>
					<i class="fa fa-share me-2"></i>
					<a href="{{$v_menu1->url ? $v_menu1->url : '/'.$v_menu1->slug}}">{{$v_menu1->name}}</a>
				</li>
				@endforeach
			</ul>
			@endif
		@endif
	@endforeach
</div>