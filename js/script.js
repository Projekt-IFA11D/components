function testbtn()
{
	alert( "Handler for .click() called." );
		console.log('asd');

}
$( document ).ready(function() {

	$( "#add_supplier_button" ).click(function() {
		alert( "Handler for .click() called." );
		console.log('asd');
	});
});

$( "edit-room" ).on('click', function() {

	console.log("test");
	var $row = jQuery(this).closest('tr');
	var $columns = $row.find('td');
	var arr_edit = [];
	jQuery.each($columns, function(i, item) {
		arr_edit[i] = item.innerHTML;
	});
	$('#i_raum_nr').val(arr_edit[0]);
	$('#i_raum_bez').val(arr_edit[1]);
	$('#i_raum_not').val(arr_edit[2]);
});

$( "delete-room" ).on('click', function() {

	//console.log(($(this).value));
	console.log("test");
});
