<div class="row">
	<div class="col-md-2">
		<h1 class="page-header">Details</h1>
	</div>
</div>

<?php

	print_r($_GET["component"]);
	
	//1-8 & 13-25

	if(!empty ($_GET["component"]))
	{
		switch ($_GET["component"])
		{
			case 1:
			require_once('lib\forms\form_bundle_pc.php');
			break;

			case 2:
			formular_ram.php
			break;

			case 3:
			formular_cpu.php
			break;

			case 4:
			formular_mainboard.php
			break;

			case 5:
			formular_festplatte.php
			break;

			case 6:
			formular_grafikkarte.php
			break;

			case 7:
			formular_netzwerkkarte.php
			break;

			case 8:
			formular_raidcontroller.php
			break;

			case 13:
			formular_netzteil.php
			break;

			case 14:
			formular_switches.php
			break;

			case 15:
			formular_vlan.php
			break;

			case 16:
			formular_router.php
			break;

			case 17:
			formular_hubs.php
			break;

			case 18:
			formular_accesspoints.php
			break;
	
			case 19:
			formular_drucker.php
			break;
			
			case 20:
			//todo: optisches laufwerk muss von formular_cd/dvd + brenner abgefangen werden. 1 Vorgang - 4 Formulare?
			break;

			case 21:
			formular_software.php
			break;
			
			case 22:
			//todo: Formular für Beamer fehlt
			break;

			case 23:
			//todo: Formular für Maus fehlt
			break;

			case 24:
			//todo: Formular für Tastatur fehlt
			break;
			
			case 25:
			//todo: Formular für Monitor fehlt
			break;
			
		}
	}

?>
			








