function edit_components(caller, id)
{
	var row = caller.closest('tr');
	var columns = row.find('td');
	var arr_comp = [];
	$.each(columns, function(i, item) {
		arr_comp[i] = item.innerHTML;
	});
	$('#i_acq_firmenname').val(arr_comp[0]);
	$('#i_acq_raum_bez').val(arr_comp[1]);
	$('#i_acq_einkaufsdatum').val(arr_comp[2]);
	$('#i_acq_gw').val(arr_comp[3]);
	$('#i_acq_notiz').val(arr_comp[4]);
	$('#i_acq_hersteller').val(arr_comp[5]);
	$('#i_acq_komponentenart').val(arr_comp[6]);
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