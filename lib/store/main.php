<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Neubeschaffungen</h1>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<tr class="header">
			<th>Firmenname</th>
			<th>Einkaufsdatum</th>
			<th>Gew&auml;hrleistungsdauer</th>
			<th>Notiz</th>
			<th>Hersteller</th>
			<th>Komponentenart</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<?php
			$components = select_statement("acquisitions");
			foreach ($components as $component)
			{ ?>
					<tr>
						<td><?php echo($component['l_firmenname']) ?></td>
						<td><?php echo($component['k_einkaufsdatum']) ?></td>
						<td><?php echo($component['k_gewaehrleistungsdauer'])." Jahre"?></td>
						<td><?php echo($component['k_notiz'])?></td>
						<td><?php echo($component['k_hersteller'])?></td>
						<td><?php echo($component['ka_komponentenart'])?></td>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs"
							onclick="<?php echo('edit_components($(this), '.$component['ka_id'].')') ?>">Details</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".move_component_modal">Verschieben</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_component_modal"
							onclick="<?php echo('delete_components('.$component['k_id'].')') ?>">L&ouml;schen</button>
						</td>
					</tr>
			<?php }
		?>
	<table>
</div>
