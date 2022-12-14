@include('modules.UIDetailArticle.css')
<div class="UIDetailArticle_Default1">
	<div class="title">{{$article->title}}</div>
	<div class="datetime">Ngày đăng: {{ date('d-m-Y', strtotime($article->created_at)) }}</div>
	<div class="description">{{$article->description}}</div>
	<div class="detail">
		{!! $article->content !!}
	</div>
</div>