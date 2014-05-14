<?php
	require_once('delete.php');
?>



<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Komponenten</h1>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<tr class="sticky">
			<th>Firmenname</th>
			<th>Raum-Bez</th>
			<th>Einkaufsdatum</th>
			<th>Gew&auml;hrleistungsdauer</th>
			<th>Notiz</th>
			<th>Hersteller</th>
			<th>Komponentenart</th>
			<th></th>
			<th></th>
		</tr>
		<?php
			$components = select_statement("acquisitions");
			foreach ($components as $component)
			{ ?>
					<tr>
						<td><?php echo($component['l_firmenname']) ?></td>
						<td><?php echo($component['r_bezeichnung'])?></td>
						<td><?php echo($component['k_einkaufsdatum']) ?></td>
						<td><?php echo($component['k_gewaehrleistungsdauer'])." Jahre"?></td>
						<td><?php echo($component['k_notiz'])?></td>
						<td><?php echo($component['k_hersteller'])?></td>
						<td><?php echo($component['ka_komponentenart'])?></td>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs"
							onclick="<?php echo('edit_components($(this), '.$component['ka_id'].')') ?>">Details</button>
						</td>
						<td class="col-md-1">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_components_modal"
							onclick="<?php echo('delete_components('.$component['k_id'].')') ?>">L&ouml;schen</button>
						</td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script src="lib/page/components/script.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#srch-term").keyup(function () {
	    var data = this.value.split(" ");
	    var jo = $(".table").find("tr");
	    if (this.value == "") {
		      jo.show();
		      return;
	    }
      $(".table tr:not(:first-child)").hide(); 

      jo.filter(function (i, v) {
		      var $t = $(this);
		      for (var d = 0; d < data.length; ++d) {
		          if ($t.is(":contains('" + data[d] + "')")) {
		            	return true;
		          }
	      	}
	        return false;
	    }).show();
	}).focus(function () {
	    this.value = "";
	    $(this).css({
	       "color": "black"
	    });
	    $(this).unbind('focus');
	}).css({
	   "color": "#C0C0C0"
	});
});
</script>

