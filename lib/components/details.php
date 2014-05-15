<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Details</h1>
	</div>
</div>

<?php

	if(!empty ($_GET["component"]))
	{
		switch ($_GET["component"])
		{
			case 1:
			require_once('lib/forms/form_bundle_pc.php');
			break;

			case 2:			
			require_once('lib/forms/formular_ram.php');
			break;

			case 3:
			require_once('lib/forms/formular_cpu.php');
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
			require_once('lib/forms/form_bundle_pc.php');
			//todo: optisches laufwerk muss von formular_cd/dvd + brenner abgefangen werden. 1 Vorgang - 4 Formulare?
			break;

			case 21:
			require_once('lib/forms/formular_software.php');
			break;
			
			case 22:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Beamer fehlt
			break;

			case 23:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Maus fehlt
			break;

			case 24:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Tastatur fehlt
			break;
			
			case 25:
			require_once('lib/forms/form_bundle_pc.php');
			//todo: Formular für Monitor fehlt
			break;
		}
	}

	echo "<button type='submit' class='btn btn-default'>&Auml;ndern</button>";
?>
