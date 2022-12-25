@include('modules.UIListArticles.css')
<div class="UIListArticles_Default1">
	@if(count($articles)>0)
	@foreach( $articles as $key=>$article )
	<div class="item">
		<a href="/{{$article->slug}}">
	        <div class="row">
	            <div class="col-lg-2 col-md-4">
	                <div class="gallery">
	                    <img width="100%" src="{{$article->avatar ? $article->avatar : 'assets\guests\img\image.png'}}" alt="{{$article->title}}" >
	                </div>
	            </div>
	            <div class="col-lg-10 col-md-8">
	                <div class="title">
	                    {{ $article->title }}
	                </div>
	                <div class="time">
	                    Ngày đăng: {{ date('d-m-Y', strtotime($article->created_at)) }}
	                </div>
	                <div class="description">
	                    {!! $article->description !!}
	                </div>
	            </div>
	        </div>
	    </a>
	</div>
	@endforeach
	{!! $articles->links() !!}
	@endif
</div>
