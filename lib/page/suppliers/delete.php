<!-- MODAL DELETE ROOM -->
<div class="modal fade delete_supplier_modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lierferrant l&ouml;schen</h4>
			</div>
			<div class="modal-body">Sind Sie sicher?</div>
			<form method="POST">
				<div class="modal-footer">
					<input type='hidden' class="supplier_s_id" name='lieferanten_l_id'>
					<button type="button" class="btn btn-default" data-dismiss="modal">Nein</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="supplier_submit($(this), 'delete_supplier')">Ja</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL DELETE ROOM -->
