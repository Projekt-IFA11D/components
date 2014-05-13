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
					<td class="col-md-1">
						<button id="edit-room" type="button" class="btn btn-primary btn-xs"
							data-toggle="modal" data-target=".edit_room_modal"
							value=<?php echo($room['r_id']) ?>>Editieren</button>
					</td>
					<td class="col-md-1">
						<button id="delete-room" type="button" class="btn btn-danger btn-xs"
							data-toggle="modal" data-target=".delete_room_modal"
							value=<?php echo($room['r_id']) ?>>L&ouml;schen</button>
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
