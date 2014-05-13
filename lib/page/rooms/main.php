<?php
	require_once('add.php');
	require_once('edit.php');
	require_once('delete.php');
?>

<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">R&auml;ume</h1>
	</div>
	<div class="col-md-10">
		<button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_room_modal">Hinzuf&uuml;gen</button>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Raum-Nr</th>
		<th>Raum-Bez</th>
		<th>Raum-Notiz</th>
		<th></th>
		<th></th>
		<?php
			$rooms = select_statement("rooms");
			foreach ($rooms as $room)
			{ ?>
				<tr>
					<td><?php echo($room['r_nr']) ?></td>
					<td><?php echo($room['r_bezeichnung'])?></td>
					<td><?php echo($room['r_notiz']) ?></td>
					<td class="col-md-1 edit_room">
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_room_modal">Editieren</button>
					</td>
					<td class="col-md-1 delete_room">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_modal">L&ouml;schen</button>
					</td>
				</tr>
			<?php }
		?>
	<table>
</div>

<?php

	if(isset($_POST['submit'])){

		switch($_POST['submit']){

			case 'add_room':

				break;

			case 'delete_room':

				break;

			case 'edit_room':

				break;
		}
	}

?>


<script>

	jQuery('.edit_room').on('click', function() {
		
		$('#i_raum_nr').val('');
		$('#i_raum_bez').val('');
		$('#i_raum_not').val('');
		
		var $row = jQuery(this).closest('tr');
		var $columns = $row.find('td');
		var arr_edit = [];
		jQuery.each($columns, function(i, item) {
			arr_edit[i] = item.innerHTML;
		});
		$('#i_raum_nr').val(arr_edit[0]);
		$('#i_raum_bez').val(arr_edit[1]);
		$('#i_raum_not').val(arr_edit[2]);
		console.log(values);
	});
	
	
	
</script>
