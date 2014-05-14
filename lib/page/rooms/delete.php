<!-- MODAL DELETE ROOM -->
<div class="modal fade delete_room_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Raum l&ouml;schen</h4>
			</div>
			<div class="modal-body">Sind Sie sicher?</div>
			<form method="POST">
				<div class="modal-footer">
					<input type='hidden' id="delete-raeume-r_id" name='delete-raeume-r_id'>
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="room_submit($(this), 'delete_room')">L&ouml;schen</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL DELETE ROOM -->
