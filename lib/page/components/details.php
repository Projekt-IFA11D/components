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
		switch $_GET["component"]
		{
			case 1:
			form_bundle_pc.php
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
		}
	}

?>
			




?>



