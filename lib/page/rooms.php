<?php 

	if(isset($_POST['submit'])){
		
		switch($_POST['submit']){
			
			case 'add_room':
				
				break;
			
			case 'delete_room':
				
				break;
			
			case 'edit_room':
				
				break;
		}
	}

?>

<!-- MODAL DELETE ROOM -->
<div class="modal fade delete_room_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Raum l&ouml;schen</h4>
      </div>
      <div class="modal-body">
		  Sind Sie sicher?
	  </div>
	  <form method="POST">		
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
			<button type="submit" class="btn btn-primary" id="delete_room" name="submit" value="delete_room">Ja</button>
		  </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL DELETE ROOM -->


<!-- MODAL EDIT ROOM -->
<div class="modal fade edit_room_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
            <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Raum editieren</h4>
      </div>
      <div class="modal-body">
		<form method="POST">
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
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->



<!-- MODAL ADD ROOM -->
<div class="modal fade add_room_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
            <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Raum hinzuf&uuml;gen</h4>
      </div>
      <div class="modal-body">
		<form method="POST">
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
			<button type="submit" class="btn btn-primary" id="add_room" name="submit" value="add_room">Hinzufügen</button>
		  </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END MODAL EDIT ROOM -->


<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">R&auml;ume</h1>
	</div>
	<div class="col-md-10">
		<button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_room_modal">Hinzuf&uuml;gen</button>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Raum-Nr</th>
		<th>Raum-Bez</th>
		<th>Raum-Notiz</th>
		<th></th>
		<th></th>
		<?php
			$rooms = select_statement("rooms");
			foreach ($rooms as $room)
			{ ?>
					<tr> 
						<td><?php echo($room['r_nr']) ?></td>
						<td><?php echo($room['r_bezeichnung'])?></td>
						<td><?php echo($room['r_notiz']) ?></td>
						<td class="col-md-1 edit_room"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_room_modal">Editieren</button></td>
						<td class="col-md-1 delete_room"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_modal">L&ouml;schen</button></td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script>

	jQuery('.edit_room').on('click', function() {
		
		$('#i_raum_nr').val('');
		$('#i_raum_bez').val('');
		$('#i_raum_not').val('');
		
		var $row = jQuery(this).closest('tr');
		var $columns = $row.find('td');
		var arr_edit = [];
		jQuery.each($columns, function(i, item) {
			arr_edit[i] = item.innerHTML;
		});
		$('#i_raum_nr').val(arr_edit[0]);
		$('#i_raum_bez').val(arr_edit[1]);
		$('#i_raum_not').val(arr_edit[2]);
		console.log(values);
	});
	
	
	
</script>
