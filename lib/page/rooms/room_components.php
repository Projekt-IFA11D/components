<div class="row">
	<div class="col-md-6">
		<h1 class="page-header">Komponenten des Raumes <?php echo $_GET['room_component']?></h1>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_room_components_modal">Hinzuf&uuml;gen</button>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Raum-Bez</th>
		<th>Lieferant</th>
		<th>Art</th>
		<th>Einkaufsdatum</th>
		<th>Gew&auml;hrleistungsdauer</th>
		<th>Notiz</th>
		<th>Hersteller</th>
		<th></th>
		<th></th>
		<?php
			$room_components = complex_select_statement("components");
			foreach ($room_components as $room_component)
			{ ?>
				<tr class="room_detailed_components" style="cursor: pointer;">
					<td><?php echo($room_component['r_bezeichnung']) ?></td>
					<td><?php echo($room_component['l_firmenname'])?></td>
					<td><?php echo($room_component['ka_komponentenart']) ?></td>
					<td><?php echo($room_component['k_einkaufsdatum']) ?></td>
					<td><?php echo($room_component['k_gewaehrleistungsdauer'])." Jahre" ?></td>
					<td><?php echo($room_component['k_notiz']) ?></td>
					<td><?php echo($room_component['k_hersteller']) ?></td>
					<td class="col-md-1">
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_room_components_modal"
							onclick="<?php echo('edit_room_components($(this), '.$room_component['k_id'].')') ?>">Editieren</button>
					</td>
					<td class="col-md-1">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_components_modal"
							onclick="<?php echo('delete_room_components('.$room_component['k_id'].')') ?>">L&ouml;schen</button>
					</td>
				</tr>
			<?php }
			
		?>
	<table>
</div>
	
<script src="lib/page/rooms/script.js"></script>

