<!-- MODAL MODAL MOVE COMPONENT -->
<div class="modal fade move_room_component_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Komponente verschieben</h4>
			</div>
			<div class="modal-body">
					<label>In welchen Raum wollen Sie die Komponente verschieben?</label>
					<input class="form-control" id="i_move_room_component" name="i_move_room_component" size="20" type="text"></input>
			</div>
			<form method="POST">
				<div class="modal-footer">
					<input type='hidden' id="move-komponenten-k_id" name='komponenten-k_id'>
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="components_submit($(this), 'move_room_component')">Verschieben</button> <!-- move room component TODO -->
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL MOVE COMPONENT -->
