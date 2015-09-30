$(document).ready(function() {
	var majors = new Array();
	$("#majors").on("click",function() {
		$(".gwt-Anchor").each(function() {
			majors.push($(this).text());
		});
		// console.log(majors);
		$.post('process.php', {majors}, function(data) {
				console.log(data);
		},  'json');
	});
});