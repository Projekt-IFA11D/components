<!-- ADD SUPPLIER MODAL -->
<div class="modal fade edit_supplier_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lieferant editieren</h4>
			</div>
			<form>
				<div class="modal-body">
					<input type='hidden' class="supplier_s_id" name='raeume_r_id'>
					<table table-striped>
						<tr>
							<td><label>Firma</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_firmenname' name='lieferant_l_firmenname' size='20'></td>
						</tr>
						<tr>
							<td><label>Strasse</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_strasse' name='lieferant_l_strasse' size='20'>
						</tr>
						<tr>
							<td><label>Ort</label></td>
							<td><input class="form-control" type='text' id='plz_zurordnung_ORT' name='plz_zurordnung_ORT' size='20'>
						</tr>
						<tr>
							<td><label>PLZ</label></td>
							<td><input class="form-control" type='text' id='plz_zurordnung_PLZ' name='plz_zurordnung_PLZ' size='6'>
						</tr>
						<tr>
							<td><label>Telefon</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_tel' name='lieferant_l_tel' size='20'>
						</tr>
						<tr>
							<td><label>Mobil</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_mobil' name='lieferant_l_mobil' size='20'>
						</tr>
						<tr>
							<td><label>Fax</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_fax' name='lieferant_l_fax' size='20'>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input class="form-control" type='text' id='lieferant_l_email' name='lieferant_l_email' size='20'>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supplier_submit($(this), 'edit_supplier')">Hinzuf&uuml;gen</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END ADD SUPPLIER MODAL -->
