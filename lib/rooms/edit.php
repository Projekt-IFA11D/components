<!-- MODAL EDIT ROOM -->
<div class="modal fade edit_room_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Raum editieren</h4>
			</div>
			<form method="POST">
				<div class="modal-body">
					<input type='hidden' id="edit-raeume-r_id" name='raeume-r_id'>
					<table>
						<tr>
							<td><label>Raum-Nr</label></td>
							<td><input class="form-control" type='text' id="edit-raeume-r_nr" name='raeume-r_nr' size='20' disabled></td>
						</tr>
						<tr>
							<td><label>Raum-Bez</label></td>
							<td><input class="form-control" type='text' id="edit-raeume-r_bezeichnung" name='raeume-r_bezeichnung' size='20'></td>
						</tr>
						<tr>
							<td><label>Raum-Notiz</label></td>
							<td><input class="form-control" type='text' id="edit-raeume-r_notiz" name='raeume-r_notiz' size='20'></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" 
						onclick="room_submit($(this), 'edit_room')">Absenden</button>
				</div>
			</form>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->
