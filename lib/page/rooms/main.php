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

<div class="table table-responsive" id="mark_row1">
	<table class="table table-striped table-hover">
		<th>Raum-Nr</th>
		<th>Raum-Bez</th>
		<th>Raum-Notiz</th>
		<th></th>
		<th></th>
		<?php
			$rooms = select_statement("rooms");
			foreach ($rooms as $room)
			{ ?>
				<tr class="room_detailed_components" style="cursor: pointer;" r_id="<?php echo($room['r_id']) ?>">
					<td><?php echo($room['r_nr']) ?></td>
					<td><?php echo($room['r_bezeichnung'])?></td>
					<td><?php echo($room['r_notiz']) ?></td>
					<td class="col-md-1">
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_room_modal"
							onclick="<?php echo('edit_room($(this), '.$room['r_id'].')') ?>">Editieren</button>
					</td>
					<td class="col-md-1">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_modal"
							onclick="<?php echo('delete_room('.$room['r_id'].')') ?>">L&ouml;schen</button>
					</td>
				</tr>
			<?php }
		?>
	<table>
</div>

<script src="lib/page/rooms/script.js"></script>

