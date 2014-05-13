function edit_room(caller, id)
{
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_edit = [];
	$.each(columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('#i_room_id').val(id);
	$('#i_room_nr').val(arr_edit[0]);
	$('#i_room_bez').val(arr_edit[1]);
	$('#i_room_notiz').val(arr_edit[2]);
}

function delete_room(id)
{
	$('#i_room_id').val(id);
}

function room_submit(caller, action)
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
