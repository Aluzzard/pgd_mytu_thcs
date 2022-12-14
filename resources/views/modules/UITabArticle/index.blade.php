<div class="UITabArticle">
	<div class="heading">{{$heading}}</div>
	<div class="content">
			@php $key = 0; @endphp
			@foreach($array as $item)
			<a href="/{{$item->category->slug}}/{{$item->slug}}">
				<div class="row {{$key == 0 ? 'first-item' : 'item'}}">
					@if($key==0)
					<div class="col-md-4">
						<img src="{{$item->avatar}}" width="100%">
					</div>
					<div class="col-md-8">
						<div class="title">{{$item->title}}</div>
						<p class="text-primary">Ngày đăng: {{ date('d/m/Y', strtotime($item->created_at))}}</p>
					</div>
					@else
						@if($sub_item_img == 1)
						<div class="col-md-4">
							<img src="{{$item->avatar}}" width="100%">
						</div>
						<div class="col-md-8">
							<div class="title">{{$item->title}}</div>
							<p class="text-primary">Ngày đăng: {{ date('d/m/Y', strtotime($item->created_at))}}</p>
						</div>
						@else
						<div class="col-md-12">
							<div class="title"><i class="fa fa-caret-right me-2"></i>{{$item->title}}</div>
						</div>
						@endif
					@endif
				</div>
			</a>
			@php $key++; @endphp
			@endforeach
	</div>
</div>