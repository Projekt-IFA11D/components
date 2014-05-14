<?php
	require_once('add.php');
	require_once('edit.php');
	require_once('delete.php');
?>

<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Lieferanten</h1>
	</div>
	<div class="col-md-10">
		<button id="add_btn"type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target=".add_supplier_modal">Hinzuf&uuml;gen</button>
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
					<td class="col-md-1">
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_supplier_modal"
							onclick="<?php echo('edit_supplier($(this), '.$supplier['l_id'].')') ?>">Editieren</button>
					</td>
					<td class="col-md-1">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_supplier_modal"
							onclick="<?php echo('delete_supplier('.$supplier['l_id'].')') ?>">L&ouml;schen</button>
					</td>
				</tr>
			<?php }
		?>
  </table>
</div>

<script src="lib/page/suppliers/script.js"></script>
