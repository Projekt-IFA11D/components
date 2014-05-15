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
							<td class="col-md-1">
								<button type="button" class="btn btn-primary btn-xs"
								onclick="<?php echo('edit_components($(this), '.$component['ka_id'].')') ?>">Editieren</button>
			</td><td>
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

<?php

	if(!empty ($_GET["component"]))
	{
		//print_r($_GET['component']);
		switch ($_GET["component"])
		{
			case 1:
			require_once('lib/forms/form_bundle_pc.php');
			break;

			case 2:			
			require_once('lib/forms/formular_ram.php');
			break;

			case 3:
			require_once('lib/forms/formular_prozessor.php');
			break;

			case 4:
			require_once('lib/forms/formular_mainboard.php');
			break;

			case 5:
			require_once('lib/forms/formular_festplatte.php');
			break;

			case 6:
			require_once('lib/forms/formular_grafikkarte.php');
			break;

			case 7:
			require_once('lib/forms/formular_netzwerkkarte.php');
			break;

			case 8:
			require_once('lib/forms/formular_raidcontroller.php');
			break;

			case 13:
			require_once('lib/forms/formular_netzteil.php');
			break;

			case 14:
			require_once('lib/forms/formular_switches.php');
			break;

			case 15:
			require_once('lib/forms/formular_vlan.php');
			break;

			case 16:
			require_once('lib/forms/formular_router.php');
			break;

			case 17:
			require_once('lib/forms/formular_hubs.php');
			break;

			case 18:
			require_once('lib/forms/formular_accesspoints.php');
			break;
	
			case 19:
			require_once('lib/forms/formular_drucker.php');
			break;
			
			case 20:
			require_once('lib/forms/formular_optische_laufwerke.php');
			break;

			case 21:
			require_once('lib/forms/formular_software.php');
			break;
			
			case 22:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Beamer fehlt
			break;

			case 23:
			require_once('lib/forms/formular_mouse.php');
			break;

			case 24:
			require_once('lib/forms/tastatur.php');
			break;
			
			case 25:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Monitor fehlt
			break;
		}
	}

	echo "<button type='submit' class='btn btn-default'>&Auml;ndern</button>";
?>
