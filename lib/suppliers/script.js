function edit_supplier(caller, id)
{
	console.log(caller);
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_edit = [];
	$.each(columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('#edit-lieferant-l_id').val(id);
	$('#edit-lieferant-l_firmenname').val(arr_edit[0]);
	$('#edit-lieferant-l_strasse').val(arr_edit[1]);
	$('#edit-plz_zuordnung-plz_ort').val(arr_edit[3]);
	$('#edit-plz_zuordnung-plz_plz').val(arr_edit[2]);
	$('#edit-lieferant-l_tel').val(arr_edit[4]);
	$('#edit-lieferant-l_mobil').val(arr_edit[5]);
	$('#edit-lieferant-l_fax').val(arr_edit[6]);
	$('#edit-lieferant-l_email').val(arr_edit[7]);
}

function delete_supplier(id)
{
	$('#delete-lieferant-l_id').val(id);
}

function supplier_submit(caller, action)
{
	var form = caller.closest('form');
	var ser = form.serialize();
	$.ajax({
		url: "ajax.php?"+action+"="+ser,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
}
