@include('modules.UIArticles.Detail.css')
<div class="UIDetailArticle Default1">
	<div class="title">{{$UIDetailArticle->title}}</div>
	<div class="datetime">Ngày đăng: {{ date('d-m-Y', strtotime($UIDetailArticle->created_at)) }}</div>
	<div class="description">{{$UIDetailArticle->description}}</div>
	<div class="detail">
		{!! $UIDetailArticle->content !!}
	</div>
</div>