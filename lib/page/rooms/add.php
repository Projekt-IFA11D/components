<!-- MODAL ADD ROOM -->
<div class="modal fade add_room_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Raum hinzuf&uuml;gen</h4>
			</div>
			<form method="POST">
				<div class="modal-body">
					<table table-striped>
						<tr>
							<td><label>Raum-Nr</label></td>
							<td><input class="form-control" type='text' name='i_raum_nr' size='20'></td>
						</tr>
						<tr>
							<td><label>Raum-Bez</label></td>
							<td><input class="form-control" type='text' name='i_raum_bez' size='20'></td>
						</tr>
						<tr>
							<td><label>Raum-Notiz</label></td>
							<td><input class="form-control" type='text' name='i_raum_notiz' size='20'></td>
						</tr>
					</table>
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
