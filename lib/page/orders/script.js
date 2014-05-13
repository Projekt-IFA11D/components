$( document ).ready(function() {
	$( '#step_2' ).hide();
	$( '#step_3' ).hide();
});

$( "#c_type" ).on('click', function(e) {
	var sel = $( "#c_type option:selected" );
	if (sel.attr('id') == 'bundle')
	{
		$( '#step_1' ).hide();
		$.ajax({
			url: "ajax.php?wizzard=bundle&type="+sel.val(),
			cache: false
		})
		.done(function( html ) {
			$( '.main' ).find( '#step_2' ).find( '#bundle' ).html( html );
		});
		$( '#step_2' ).show();
	}
	else
	{
		$( '#step_1' ).hide();
		$.ajax({
			url: "ajax.php?wizzard=single&type="+sel.val(),
			cache: false
		})
		.done(function( html ) {
			$( '.main' ).find( '#step_3' ).find( '#single' ).html( html );
		});
		$( '#step_3' ).show();
	}
});
