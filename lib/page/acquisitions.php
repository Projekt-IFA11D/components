<!-- MODAL EDIT ACQ -->
<div class="modal fade edit_acq_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
            <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Neuanschaffung editieren</h4>
      </div>
      <div class="modal-body">
		<form method="POST">
			<table table-striped>
					<tr>
						<td><label>Firmenname</label></td>
						<td><input class="form-control" type='text' id="i_acq_firmenname" name='i_acq_firmenname' size='20'></td>
					</tr>
					<tr>
						<td><label>Raum-Bez</label></td>
						<td><input class="form-control" type='text' id="i_acq_raum_bez" name='i_acq_raum_bez' size='20'></td>
					</tr>	
					<tr>
						<td><label>Einkaufsdatum</label></td>
						<td><input class="form-control" type='text' id="i_acq_einkaufsdatum" name='i_acq_einkaufsdatum' size='20'></td>
					</tr>
					<tr>
						<td><label>Gew&auml;hrleistungsdauer</label></td>
						<td><input class="form-control" type='text' id="i_acq_gw" name='i_acq_gw' size='20'></td>
					</tr>
					<tr>
						<td><label>Notiz</label></td>
						<td><input class="form-control" type='text' id="i_acq_notiz" name='i_acq_notiz' size='20'></td>
					</tr>
					<tr>
						<td><label>Hersteller</label></td>
						<td><input class="form-control" type='text' id="i_acq_hersteller" name='i_acq_hersteller' size='20'></td>
					</tr>
					<tr>
						<td><label>Komponentenart</label></td>
						<td><input class="form-control" type='text' id="i_acq_komponentenart" name='i_acq_komponentenart' size='20'></td>
					</tr>		
			</table>
	  </div>	
		  
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
			<button type="submit" class="btn btn-primary" id="edit_acq" name="submit" value="edit_acq">Hinzufügen</button>
		  </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ACQ -->



<?php 

	if(isset($_POST['Submit'])){
		
	}

?>



<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Neubeschaffungen</h1>
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
			$acqisitions = select_statement("acqisitions");
			foreach ($acqisitions as $acqisition)
			{ ?>
					<tr> 
						<td><?php echo($acqisition['l_firmenname']) ?></td>
						<td><?php echo($acqisition['r_bezeichnung'])?></td>
						<td><?php echo($acqisition['k_einkaufsdatum']) ?></td>
						<td><?php echo($acqisition['k_gewaehrleistungsdauer']) ?></td>
						<td><?php echo($acqisition['k_notiz'])?></td>
						<td><?php echo($acqisition['k_hersteller'])?></td>
						<td><?php echo($acqisition['ka_komponentenart'])?></td>
						<td class="col-md-1 edit_acq"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_acq_modal">Editieren</button></td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script>
	jQuery('.edit_acq').on('click', function() {
		
		$('#i_acq_firmenname').val('');
		$('#i_acq_raum_bez').val('');
		$('#i_acq_einkaufsdatum').val('');
		$('#i_acq_gw').val('');
		$('#i_acq_notiz').val('');
		$('#i_acq_hersteller').val('');
		$('#i_acq_komponentenart').val('');
		
		var $row = jQuery(this).closest('tr');
		var $columns = $row.find('td');
		var arr_acq = [];
		jQuery.each($columns, function(i, item) {
			arr_acq[i] = item.innerHTML;
		});
		
		$('#i_acq_firmenname').val(arr_acq[0]);
		$('#i_acq_raum_bez').val(arr_acq[1]);
		$('#i_acq_einkaufsdatum').val(arr_acq[2]);
		$('#i_acq_gw').val(arr_acq[3]);
		$('#i_acq_notiz').val(arr_acq[4]);
		$('#i_acq_hersteller').val(arr_acq[5]);
		$('#i_acq_komponentenart').val(arr_acq[6]);
	});	
</script>


