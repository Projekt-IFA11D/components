function edit_components(caller, id)
{
	$.ajax({
		url: "ajax.php?component="+id,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
	
}

function components_submit(caller, action)
{
	var form = caller.closest('form');
	console.log(form);
	var ser = form.serialize();
	console.log(ser);
	$.ajax({
		url: "ajax.php?"+action+"="+ser,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
}
