<script type="text/javascript">
	$(document).ready(function () {
		setInterval(function () {
			var days = new Array("Chủ nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
			var months = new Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
			var am_pm;
			var d = new Date();
			var s = d.getSeconds();
			var m = d.getMinutes();
			var h = d.getHours();
			var day = d.getDay();
			var date = d.getDate();
			var month = d.getMonth();
			var year = d.getFullYear();
			if (s < 10) { s = "0" + s }
			if (m < 10) { m = "0" + m }
				if (h > 12)
					{ h -= 12; am_pm = "PM" }
				else { am_pm = "AM" }
				if (h < 10) { h = "0" + h }
					$(".clock").text(days[day] + ', ' + date + "/" + months[month] + '/' + year + ', ' + h + ':' + m + ':' + s + ' ' + am_pm);
			}, 1000);
	});
</script>