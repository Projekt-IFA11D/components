<?php
	require_once('edit.php');
?>


<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Neubeschaffungen</h1>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>K-ID</th>
		<th>Firmenname</th>
		<th>Raum-Bez</th>
		<th>Einkaufsdatum</th>
		<th>Gew&auml;hrleistungsdauer</th>
		<th>Notiz</th>
		<th>Hersteller</th>
		<th>Komponentenart</th>
		<th></th>
		<?php
			$acqisitions = select_statement("acqisitions");
			foreach ($acqisitions as $acqisition)
			{ ?>
					<tr>
						<td><?php echo($acqisition['k_id']) ?></td>
						<td><?php echo($acqisition['l_firmenname']) ?></td>
						<td><?php echo($acqisition['r_bezeichnung'])?></td>
						<td><?php echo($acqisition['k_einkaufsdatum']) ?></td>
						<td><?php echo($acqisition['k_gewaehrleistungsdauer']) ?></td>
						<td><?php echo($acqisition['k_notiz'])?></td>
						<td><?php echo($acqisition['k_hersteller'])?></td>
						<td><?php echo($acqisition['ka_komponentenart'])?></td>
						<td class="col-md-1 edit_acq"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_acq_modal" onclick="<?php echo('edit_acquisition($(this), '.$acqisition['k_id'].')') ?>">Editieren</button></td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script src="lib/page/acquisitions/script.js"></script>


