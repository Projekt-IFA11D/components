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
					<table table-striped>
						<tr>
							<td><label>Raum-Nr</label></td>
							<td><input class="form-control" type='text' id="i_raum_nr" name='i_raum_nr' size='20' disabled></td>
						</tr>
						<tr>
							<td><label>Raum-Bez</label></td>
							<td><input class="form-control" type='text' id="i_raum_bez" name='i_raum_bez' size='20'></td>
						</tr>
						<tr>
							<td><label>Raum-Notiz</label></td>
							<td><input class="form-control" type='text' id="i_raum_notiz" name='i_raum_notiz' size='20'></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
					<button type="submit" class="btn btn-primary" id="edit_room" name="submit" value="edit_room">Hinzufügen</button>
				</div>
			</form>
		</div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->
