<div class="UICounterVisitors_Default1">
	<div class="heading">
		<span>Thống kê truy cập</span>
	</div>
	<div class="counter-visitors-content">
		<ul>
			<li>
				<span>Hôm nay: </span>
				<span>{{$visitor->where('name','today')->first()->counter}}</span>
			</li>
			<li>
				<span>Trong tuần: </span>
				<span>{{$visitor->where('name','week')->first()->counter}}</span>
			</li>
			<li>
				<span>Trong tháng:</span>
				<span>{{$visitor->where('name','month')->first()->counter}}</span>
			</li>
			<li>
				<span>Trong năm: </span>
				<span>{{$visitor->where('name','year')->first()->counter}}</span>
			</li>
			<li>
				<span>Tất cả: </span>
				<span>{{$visitor->where('name','total')->first()->counter}}</span>
			</li>
		</ul>
	</div>
</div>