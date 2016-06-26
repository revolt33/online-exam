function refresh() {
	var e = document.getElementById('paper');
	var exam = e.options[e.selectedIndex].value;
	$.post('participations.php', {exam: exam}, function(data)
	{
		document.getElementById('content').innerHTML = data;
		var div = document.getElementById('content');
		div.style.visibility = 'visible' ;
	});
};