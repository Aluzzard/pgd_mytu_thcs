<div class="UISteeringDocument Tab">
	<div class="heading"><span>{{$heading}}</span></div>
	<div class="content">
		<ul>
			@foreach($array as $item)
			<li>
				<a href="/chi-tiet-van-ban-chi-dao/{{$item->id}}">
					<i class="fa fa-circle-chevron-right"></i>{{$item->content}}
					<p class="datetime">Ngày ban hành: {{ date('d/m/Y', strtotime($item->date_effect))}}</p>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>