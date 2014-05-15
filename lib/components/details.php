<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Details</h1>
	</div>
</div>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Raum-Nr</th>
		<th>Raum-Bezeichnung</th>
		<th>Komponentenart</th>
		<th>Komponentenbeschreibung</th>
		<th>Wert</th>
		<th>Aggregatbez.</th>
		<th></th>
		<th></th>
		<th></th>
		<?php
			$k_id= ($_GET["component"]);
			$components = complex_select_statement('main_components');
			foreach ($components as $component)
			{
				foreach ($component['main_components'] as $subcomponent)
				{
					if ($subcomponent['AggregatNr']==($k_id)){
					?>
					<tr>
						<td><?php echo($subcomponent['RaumNr']) ?></td>
						<td><?php echo($subcomponent['r_bezeichnung'])?></td>
						<td><?php echo($subcomponent['ka_komponentenart']) ?></td>
						<td><?php echo($subcomponent['kat_beschreibung'])?></td>
						<td><?php echo($subcomponent['khkat_wert'])?></td>
						<td><?php echo($subcomponent['AggregatBez'])?></td>
						<td>
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".edit_sub_component_modal">Editieren</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".move_component_modal">Verschieben</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-danger btn-xs"
								onclick="<?php echo('delete_sub_components($(this), '.$component['ka_id'].')') ?>">L&ouml;schen</button>
						</td>
					</tr>
					<?php
					}
				}
			}
		?>
	<table>
</div>
