<div class="UIFeaturedNews">
	<div class="heading"><i class="fa fa-newspaper me-2"></i>Tin tức - nổi bật</div>
	<div class="row">
		<div class="left-side col-md-6">
			@foreach($UIFeaturedNews->take(1) as $article)
			<a href="/{{$article->category->slug}}/{{$article->slug}}">
				<img src="{{$article->avatar}}" width="100%">
				<div class="title">{{$article->title}}</div>
				<div class="datetime"><span>Ngày đăng: {{ date('d/m/Y', strtotime($article->created_at))}}</span></div>
			</a>
			@endforeach
		</div>
		<div class="right-side col-md-6">
			@foreach($UIFeaturedNews->skip(1)->take(4) as $article)
			<a href="/{{$article->category->slug}}/{{$article->slug}}">
				<div class="row">
					<div class="col-md-4">
						<img src="{{$article->avatar}}" width="100%">
					</div>
					<div class="col-md-8">
						<div class="title">{{$article->title}}</div>
						<div class="datetime"><span>Ngày đăng: {{ date('d/m/Y', strtotime($article->created_at))}}</span></div>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
