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
						<td><label>K-ID</label></td>
						<td><input class="form-control" type='text' id="i_acq_k_id" name='i_acq_k_id' size='20'></td>
					</tr>
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