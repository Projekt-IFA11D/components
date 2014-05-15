function edit_room(caller, id)
{
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_edit = [];
	$.each(columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('#edit-raeume-r_id').val(id);
	$('#edit-raeume-r_nr').val(arr_edit[0]);
	$('#edit-raeume-r_bezeichnung').val(arr_edit[1]);
	$('#edit-raeume-r_notiz').val(arr_edit[2]);
}

function delete_room(id)
{
	$('#delete-raeume-r_id').val(id);
}

function room_submit(caller, action)
{
	var form = caller.closest('form');
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

$( ".room_detailed_components" ).on('click', function(e) {
	var room = $(this).parent().attr('r_id');
	console.log($(this));
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
