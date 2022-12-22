<script type="text/javascript">
	$('#regen-captcha').on('click', function(e){
		e.preventDefault();
		func_reloadCaptcha();

	});
	func_reloadCaptcha = function(){
		var anchor = $('#regen-captcha');
		var captcha = anchor.prev('img');
		$('input[type="captcha"]').val('');

		$.ajax({
			type: "GET",
			url: '/ajax_regen_captcha',
		}).done(function( msg ) {
			captcha.attr('src', msg);
		});
	}
</script>