<!-- MODAL ADD ROOM -->
<div class="modal fade add_room_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Raum hinzuf&uuml;gen</h4>
			</div>
			<form class="form-horizontal" role="form" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="add-raeume-r_nr" class="col-sm2 control-label">Raum-Nr.</label>
                         <div class="col-sm-8">
                            <input type="text" class="form-control" name="raeume-r_nr" id="add-add-raeume-r_nr">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-raeume-r_bezeichnung" class="col-sm2 control-label">Raum-Bez.</label>
                         <div class="col-sm-8">
                            <input type="text" class="form-control" name="raeume-r_bezeichnung" id="add-add-raeume-r_bezeichnung">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="add-raeume-r_notiz" class="col-sm2 control-label">Raum-Notiz</label>
                         <div class="col-sm-8">
                            <input type="text" class="form-control" name="raeume-r_notiz" id="add-add-raeume-r_notiz">
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					<button type="button" class="btn btn-primary" data-dismuss="modal" onclick="room_submit($(this), 'add_room')">Hinzu&uuml;en</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->
