function edit_supplier(caller, id)
{
	console.log(caller);
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_edit = [];
	$.each(columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('.supplier_s_id').val(id);
	$('#lieferant-l_firmenname').val(arr_edit[0]);
	$('#lieferant-l_strasse').val(arr_edit[1]);
	$('#plz_zurordnung-ORT').val(arr_edit[2]);
	$('#plz_zurordnung-PLZ').val(arr_edit[3]);
	$('#lieferant-l_tel').val(arr_edit[4]);
	$('#lieferant-l_mobil').val(arr_edit[5]);
	$('#lieferant-l_fax').val(arr_edit[6]);
	$('#lieferant-l_email').val(arr_edit[7]);
}

function delete_supplier(id)
{
	$('.supplier_s_id').val(id);
}

function supplier_submit(caller, action)
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
