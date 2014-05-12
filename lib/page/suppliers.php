
<div class="row">
	<h1>Lieferer</h1>
	<button id="add_btn"type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_supplier_modal">Hinzufügen</button>
</div>
<div class="row">
	<div class="table-responsive">
	  <table class="table table-striped" id="suppliers_table">
		<th>Firmenname</th>
		<th>Straße</th>
		<th>Tel</th>
		<th>Mobil</th>
		<th>Fax</th>
		<th>Email</th>
		<th>Tel</th>
		<th>Ort</th>
		<th></th>  
		<tr>
			<td> item 1</td>
			<td> item 2</td>
			<td> item 3</td>
			<td> item 4</td>
			<td> item 5</td>
			<td> item 6</td>
			<td> item 7</td>
			<td> item 8</td>
			<td>	
				<button type="button" class="btn btn-primary btn-xs" style="float: right">Löschen</button>
				<button type="button" class="btn btn-primary btn-xs" style="float: right">Editieren</button>
			</td>	
		</tr>
	  </table>
	</div>
</div>

<div class="modal fade add_supplier_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Lieferer hinzufügen</h4>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Schließen</button>
        <button type="button" class="btn btn-primary" id="add_supplier_button" name="add_supplier_button">Hinzufügen</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

