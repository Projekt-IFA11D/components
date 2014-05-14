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


// MUSS NOCH GEMACHT WERDEN
function delete_components(id)
{
	$('.raeume-r_id').val(id);
}

function components_submit(caller, action)
{
	var form = caller.closest('form');
	console.log(form);
	var ser = form.serialize();
	$('body').removeClass('modal-open');
	$('.modal-backdrop').remove();
	$.ajax({
		url: "ajax.php?"+action+"="+ser,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
}
