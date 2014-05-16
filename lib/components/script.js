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


function delete_components(id)
{
	$('#delete-komponenten-k_id').val(id);
}

function move_components(id)
{
	$('#move-komponenten-k_id').val(id);
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
