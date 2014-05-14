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
                        <label for="lieferant__l_firmenname" class="col-sm2 control-label">Firma</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="lieferant__l_firmenname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieferant__l_strasse" class="col-sm2 control-label">Strasse</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="lieferant__l_strasse">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="plz_zuordnung__ORT" class="col-sm2 control-label">Ort</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="plz_zuordnung__ORT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="plz_zuordnung__PLZ" class="col-sm2 control-label">PLZ</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="plz_zuordnung__PLZ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieferant__l_tel" class="col-sm2 control-label">Telefon</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="lieferant__l_tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieferant__l_mobil" class="col-sm2 control-label">Mobil</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="lieferant__l_mobil">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieferant__l_fax" class="col-sm2 control-label">Fax</label>
                         <div class="col-sm-9">
                            <input type="text" class="form-control" id="lieferant__l_fax">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lieferant__l_email" class="col-sm2 control-label">E-Mail</label>
                         <div class="col-sm-9">
                            <input type="email" class="form-control" id="lieferant__l_email">
                        </div>
                    </div>
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
