<!-- MODAL EDIT SUB COMPONENTS ROOM -->
<div class="modal fade edit_sub_component_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Komponente editieren</h4>
			</div>
			<form method="POST">
				<div class="modal-body">
					<input type='hidden' id="edit-raeume-r_id" name='raeume-r_id'>
					<label>Raum-Nr</label>
					<input class="form-control" type='text' id="edit-raeume-r_nr" name='raeume-r_nr' size='20'>
					<label>Raum-Nr</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_nr" name='raeume-r_nr' size='20'></td>
					<label>Raum-Bez</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_bezeichnung" name='raeume-r_bezeichnung' size='20'></td>
					<label>K-Art</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_notiz" name='raeume-r_notiz' size='20'></td>
					<label>K-Beschreibung</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_notiz" name='raeume-r_notiz' size='20'></td>
					<label>Wert</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_notiz" name='raeume-r_notiz' size='20'></td>
					<label>Aggregatsbez.</label></td>
					<input class="form-control" type='text' id="edit-raeume-r_notiz" name='raeume-r_notiz' size='20'></td>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="room_submit($(this), 'edit_room')">Absenden</button>
				</div>
			</form>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT SUB COMPONENT ROOM -->
