<!-- ADD SUPPLIER MODAL -->
<div class="modal fade add_supplier_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lieferant hinzuf&uuml;gen</h4>
			</div>
            <form class="form-horizontal" role="form">
				<div class="modal-body">
                    <div class="form-group">
                        <label for="add-lieferant-l_firmenname" class="col-sm2 control-label">Firma</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-lieferant-l_firmenname" name="lieferant-l_firmenname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-lieferant-l_strasse" class="col-sm2 control-label">Strasse</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-lieferant-l_strasse" name="lieferant-l_strasse">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-plz_zuordnung-plz_ort" class="col-sm2 control-label">Ort</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-plz_zuordnung-plz_ort" name="plz_zuordnung-plz_ort">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-plz_zuordnung-plz_plz" class="col-sm2 control-label">PLZ</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-plz_zuordnung-plz_plz" name="plz_zuordnung-plz_plz">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-lieferant-l_tel" class="col-sm2 control-label">Telefon</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-lieferant-l_tel" name="lieferant-l_tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-lieferant-l_mobil" class="col-sm2 control-label">Mobil</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-lieferant-l_mobil" name="lieferant-l_mobil">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-lieferant-l_fax" class="col-sm2 control-label">Fax</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="add-lieferant-l_fax" name="lieferant-l_fax">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-lieferant-l_email" class="col-sm2 control-label">E-Mail</label>
                         <div class="col-sm-9">
                            <input type="email" class="form-control" id="add-lieferant-l_email" name="lieferant-l_email">
                        </div>
                    </div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="supplier_submit($(this), 'add_supplier')">Hinzuf&uuml;gen</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END ADD SUPPLIER MODAL -->
