<!-- MODAL MODAL MOVE COMPONENT -->
<div class="modal fade move_component_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Komponente verschieben</h4>
			</div>
			<form method="POST">
				<div class="modal-body">
					<label>In welchen Raum wollen Sie die Komponente verschieben?</label>
					<input type="text" class="form-control" id="move-raeume-r_nr" name="raeume-r_nr"></input>
				</div>
				<div class="modal-footer">
					<input type='hidden' id="move-komponenten-k_id" name='komponenten-k_id'>
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="components_submit($(this), 'move_component')">Verschieben</button> <!-- move component TODO -->
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL MOVE COMPONENT -->
