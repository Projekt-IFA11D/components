<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">R&auml;ume</h1>
	</div>
	<div class="col-md-10">
		<button type="button" class="btn btn-primary" style="float: right">Hinzuf&uuml;gen</button>
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
					<td><?php echo($room['r_bezeichnung']) ?></td>
					<td><?php echo($room['r_notiz']) ?></td>
					<td class="col-md-1"><button type="button" class="btn btn-primary btn-xs">Editieren</button></td>
					<td class="col-md-1"><button type="button" class="btn btn-danger btn-xs">L&ouml;schen</button></td>
				</tr>
			<?php }
		?>
	<table>
</div>
