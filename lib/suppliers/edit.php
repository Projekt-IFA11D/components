<!-- ADD SUPPLIER MODAL -->
<div class="modal fade edit_supplier_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lieferant editieren</h4>
			</div>
			<form class="form-horizontal" role="form">
				<div class="modal-body">
					<input type='hidden' class="supplier_s_id" name='raeume_r_id'>
                    <div class="form-group">
                        <label for="edit-lieferant-l_firmenname" class="col-sm2 control-label">Firma</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieferant-l_firmenname" id="edit-lieferant-l_firmenname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-lieferant-l_strasse" class="col-sm2 control-label">Strasse</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieferant-l_strasse" id="edit-lieferant-l_strasse">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-plz_zuordnung-plz_ort" class="col-sm2 control-label">Ort</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="plz_zuordnung-plz_ort" id="edit-plz_zuordnung-plz_ort">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-plz_zuordnung-plz_plz" class="col-sm2 control-label">PLZ</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="plz_zuordnung-plz_plz" id="edit-plz_zuordnung-plz_plz">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-lieferant-l_tel" class="col-sm2 control-label">Telefon</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieferant-l_tel" id="edit-lieferant-l_tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-lieferant-l_mobil" class="col-sm2 control-label">Mobil</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieferant-l_mobil" id="edit-lieferant-l_mobil">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-lieferant-l_fax" class="col-sm2 control-label">Fax</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieferant-l_fax" id="edit-lieferant-l_fax">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-lieferant-l_email" class="col-sm2 control-label">E-Mail</label>
                         <div class="col-sm-9">
                            <input type="email" class="form-control" name="lieferant-l_email" id="edit-lieferant-l_email">
                        </div>
                    </div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supplier_submit($(this), 'edit_supplier')">Hinzuf&uuml;gen</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END ADD SUPPLIER MODAL -->
