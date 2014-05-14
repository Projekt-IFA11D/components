<!-- ADD SUPPLIER MODAL -->
<div class="modal fade add_supplier_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lieferant hinzuf&uuml;gen</h4>
			</div>
			<form>
				<div class="modal-body">
					<table table-striped>
						<tr>
							<td><label>Firma</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_firmenname' size='20'></td>
						</tr>
						<tr>
							<td><label>Strasse</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_strasse' size='20'>
						</tr>
						<tr>
							<td><label>Ort</label></td>
							<td><input class="form-control" type='text' name='plz_zurordnung__ORT' size='20'>
						</tr>
						<tr>
							<td><label>PLZ</label></td>
							<td><input class="form-control" type='text' name='plz_zurordnung__PLZ' size='6'>
						</tr>
						<tr>
							<td><label>Telefon</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_tel' size='20'>
						</tr>
						<tr>
							<td><label>Mobil</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_mobil' size='20'>
						</tr>
						<tr>
							<td><label>Fax</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_fax' size='20'>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input class="form-control" type='text' name='lieferant__l_email' size='20'>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supplier_submit($(this), 'add_supplier')">Hinzuf&uuml;gen</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END ADD SUPPLIER MODAL -->
