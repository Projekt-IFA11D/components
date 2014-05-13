<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Lieferanten</h1>
	</div>
	<div class="col-md-10">
		<button id="add_btn"type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_supplier_modal">Hinzufügen</button>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped" id="suppliers_table">
		<th>Firmenname</th>
		<th>Straße</th>
		<th>PLZ</th>
		<th>Ort</th>
		<th>Tel</th>
		<th>Mobil</th>
		<th>Fax</th>
		<th>Email</th>
		<th></th>
		<th></th>
		<?php
			$suppliers = select_statement("suppliers");
			foreach ($suppliers as $supplier)
			{ ?>
				<tr>
					<td><?php echo($supplier['l_firmenname']) ?></td>
					<td><?php echo($supplier['l_strasse']) ?></td>
					<td><?php echo($supplier['plz_plz']) ?></td>
					<td><?php echo($supplier['plz_ort']) ?></td>
					<td><?php echo($supplier['l_tel']) ?></td>
					<td><?php echo($supplier['l_mobil']) ?></td>
					<td><?php echo($supplier['l_fax']) ?></td>
					<td><?php echo($supplier['l_email']) ?></td>
					<td class="col-md-1"><button type="button" class="btn btn-primary btn-xs">Editieren</button></td>
					<td class="col-md-1"><button type="button" class="btn btn-danger btn-xs">L&ouml;schen</button></td>
				</tr>
			<?php }
		?>
  </table>
</div>

<div class="modal fade add_supplier_modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Lieferer hinzufügen</h4>
      </div>
      <div class="modal-body">
		<!-- 
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">	 
				<form role="form"> 
					<div class="form-group">
						<label for="i_item_1">Item 1</label>
						<input class="form-control" id="i_item_1" name="item1" type="text"></input>
					</div>
					<div class="form-group">
						<label for="i_item_1">Item 2</label>
						<input class="form-control" id="i_item_2" name="item2" type="text"></input>
					</div>
					<div class="form-group">
						<label for="i_item_1">Item 3</label>
						<input class="form-control" id="i_item_3" name="item3" type="text"></input>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>	
		-->
		
	
		<table table-striped>
				<tr>
					<td>Firma:</td>
					<td><input class="form-control" type='text' name='lieferant__l_firmenname' size='20'></td>
				</tr>
				 
	
				<tr>
					<td>Strasse:</td>
					<td><input class="form-control" type='text' name='lieferant__l_strasse' size='20'>
				</tr>
					
				<tr>
					<td>Ort:</td>
					<td><input class="form-control" type='text' name='plz_zurordnung__ORT' size='20'>
				</tr>
	
				
				<tr>
					<td>Postleitzahl:</td>
					<td><input class="form-control" type='text' name='plz_zurordnung__PLZ' size='6'>
				</tr>
	
				<tr>
					<td>Telefon:</td>
					<td><input class="form-control" type='text' name='lieferant__l_tel' size='20'>
				</tr>
				
				<tr>
					<td>Mobil:</td>
					<td><input class="form-control" type='text' name='lieferant__l_mobil' size='20'>
				</tr>
				
				<tr>
					<td>Fax:</td>
					<td><input class="form-control" type='text' name='lieferant__l_fax' size='20'>
				</tr>

				<tr>
					<td>Email:</td>
					<td><input class="form-control" type='text' name='lieferant__l_email' size='20'>
				</tr>
	
		</table>
	


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
        <button type="button" class="btn btn-primary" id="add_supplier_button" name="add_supplier_button">Hinzufügen</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

