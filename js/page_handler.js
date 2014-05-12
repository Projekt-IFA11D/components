$( "a[href^=#]" ).on('click', function(e) {
	var href = $(this).attr('href');
	href = href.substring(1);
	$("li").removeClass('active');
	$(this).parent().addClass('active');
	e.stopPropagation();
	$.ajax({
		url: "lib/page/"+href+".php",
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
	e.preventDefault();
});
