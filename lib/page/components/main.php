<?php
	require_once('details.php');
?>

<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Komponenten</h1>
	</div>
	<div class="col-sm-3 col-md-3 pull-right">
       		 <form class="navbar-form" role="search" id="search-input-field">
        		<div class="input-group">
            			<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            			<div class="input-group-btn">
                			<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            			</div>
        		</div>
        	</form>
        </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#srch-term").keyup(function () {
	    var data = this.value.split(" ");
	    var jo = $(".table").find("tr");
	    if (this.value == "") {
		jo.show();
		return;
	    }
	    jo.hide();

	    jo.filter(function (i, v) {
		var $t = $(this);
		for (var d = 0; d < data.length; ++d) {
		    if ($t.is(":contains('" + data[d] + "')")) {
			return true;
		    }
		}
		return false;
	    })
	    .show();
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

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Firmenname</th>
		<th>Raum-Bez</th>
		<th>Einkaufsdatum</th>
		<th>Gew&auml;hrleistungsdauer</th>
		<th>Notiz</th>
		<th>Hersteller</th>
		<th>Komponentenart</th>
		<th></th>
		<?php
			$acquisitions = select_statement("acquisitions");
			foreach ($acquisitions as $acquisition)
			{ ?>
					<tr>
						<td><?php echo($acquisition['l_firmenname']) ?></td>
						<td><?php echo($acquisition['r_bezeichnung'])?></td>
						<td><?php echo($acquisition['k_einkaufsdatum']) ?></td>
						<td><?php echo($acquisition['k_gewaehrleistungsdauer'])." Jahre"?></td>
						<td><?php echo($acquisition['k_notiz'])?></td>
						<td><?php echo($acquisition['k_hersteller'])?></td>
						<td><?php echo($acquisition['ka_komponentenart'])?></td>
						<!--<td class="col-md-1 edit_components"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_components_modal" onclick="<?php echo('edit_components($(this), '.$acquisition['k_id'].')') ?>">Editieren</button></td>-->
						<td class="col-md-1">
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".details_room_components_modal"
							onclick="<?php echo('edit_room_components($(this), '.$room_component['k_id'].')') ?>">Details</button>
						</td>
						<td class="col-md-1">
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_room_components_modal"
							onclick="<?php echo('delete_room_components('.$room_component['k_id'].')') ?>">L&ouml;schen</button>
						</td>
					</tr>
			<?php }
		?>
	<table>
</div>

<script src="lib/page/components/script.js"></script>


