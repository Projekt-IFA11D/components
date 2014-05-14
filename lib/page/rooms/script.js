function edit_room(caller, id)
{
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_edit = [];
	$.each(columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('.raeume_r_id').val(id);
	$('#raeume_r_nr').val(arr_edit[0]);
	$('#raeume_r_bezeichnung').val(arr_edit[1]);
	$('#raeume_r_notiz').val(arr_edit[2]);
}

function delete_room(id)
{
	$('.raeume_r_id').val(id);
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

$( ".room_detailed_components" ).on('click', function(e) {
	var room = $(this).attr('r_id');
	e.stopPropagation();
	$.ajax({
		url: "ajax.php?room_component="+room,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
	e.preventDefault();
});
