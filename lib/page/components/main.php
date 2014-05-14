<?php
	require_once('edit.php');
?>

<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Komponenten</h1>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Firmenname</th>
		<th>Raum-Bez</th>
		<th>Einkaufsdatum</th>
		<th>Gew&auml;hrleistungsdauer</th>
		<th>Notiz</th>
		<th>Hersteller</th>
		<th>Komponentenart</th>
		<th></th>
		<?php
			$acquisitions = select_statement("acquisitions");
			foreach ($acquisitions as $acquisition)
			{ ?>
					<tr>
						<td><?php echo($acquisition['l_firmenname']) ?></td>
						<td><?php echo($acquisition['r_bezeichnung'])?></td>
						<td><?php echo($acquisition['k_einkaufsdatum']) ?></td>
						<td><?php echo($acquisition['k_gewaehrleistungsdauer'])." Jahre"?></td>
						<td><?php echo($acquisition['k_notiz'])?></td>
						<td><?php echo($acquisition['k_hersteller'])?></td>
						<td><?php echo($acquisition['ka_komponentenart'])?></td>
						<td class="col-md-1 edit_components"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_components_modal" onclick="<?php echo('edit_components($(this), '.$acquisition['k_id'].')') ?>">Editieren</button></td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script src="lib/page/components/script.js"></script>


