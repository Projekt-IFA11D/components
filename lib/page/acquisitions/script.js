function edit_acquisition(caller, id)
{
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_acq = [];
	$.each(columns, function(i, item) {
		arr_acq[i] = item.innerHTML;
	});
	$('#i_acq_k_id').val(id);
	$('#i_acq_firmenname').val(arr_acq[1]);
	$('#i_acq_raum_bez').val(arr_acq[2]);
	$('#i_acq_einkaufsdatum').val(arr_acq[3]);
	$('#i_acq_gw').val(arr_acq[4]);
	$('#i_acq_notiz').val(arr_acq[5]);
	$('#i_acq_hersteller').val(arr_acq[6]);
	$('#i_acq_komponentenart').val(arr_acq[7]);
}



function acquisition_submit(caller, action)
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