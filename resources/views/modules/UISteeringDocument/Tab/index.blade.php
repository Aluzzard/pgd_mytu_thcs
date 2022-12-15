<div class="UISteeringDocument Tab">
	<div class="heading">{{$heading}}</div>
	<div class="content">
		<ul>
			@foreach($array as $item)
			<li>
				<a href="#">
					<i class="fa fa-circle-chevron-right"></i>{{$item->content}}
					<p class="text-primary">Ngày ban hành: {{ date('d/m/Y', strtotime($item->date_effect))}}</p>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>