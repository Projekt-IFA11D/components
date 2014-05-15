$( document ).ready(function() {
	$( '#step_2' ).hide();
	$( '#step_3' ).hide();
});

$( "#c_type" ).on('change', function(e) {
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


function bundle_next(getParam,formular)
{
	$( '#step_2' ).hide();
    $( '#step_3' ).hide();
	type = $("#type").val();
	formVal = $('#'+formular).serialize();
	$.ajax({
		url: "ajax.php?wizzard="+getParam+"&type="+type,
		cache: false,
		type: 'POST',
		data: formVal
	})
	.done(function( html ) {
	    $( '.main' ).find( '#step_3' ).find( '#single' ).html( " " );
		$( '.main' ).find( '#step_3' ).find( '#single' ).html( html );
	});
	$( '#step_3' ).show();
};