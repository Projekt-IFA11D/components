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
					<input type='hidden' id="i_room_id" name='i_room_id'>
					<table>
						<tr>
							<td><label>Raum-Nr</label></td>
							<td><input class="form-control" type='text' id="i_room_nr" name='i_room_nr' size='20' disabled></td>
						</tr>
						<tr>
							<td><label>Raum-Bez</label></td>
							<td><input class="form-control" type='text' id="i_room_bez" name='i_room_bez' size='20'></td>
						</tr>
						<tr>
							<td><label>Raum-Notiz</label></td>
							<td><input class="form-control" type='text' id="i_room_notiz" name='i_room_notiz' size='20'></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					<button type="button" class="btn btn-primary" data-dismuss="modal" id="i_room_submit" onclick="room_submit($(this), 'edit_room')">Hinzufügen</button>
				</div>
			</form>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->
