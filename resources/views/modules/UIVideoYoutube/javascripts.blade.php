<script type="text/javascript">
	$(document).ready(function () {
		$('.UIVideoYoutube .list-relative .item').on('click', function(){
			href = $(this).data('href');
			$('.UIVideoYoutube .view iframe').attr('src', 'https://www.youtube.com/embed/'+href);
		});
	});
</script>