<?php
	if (isset ($_GET['component']))
	{
		require_once('components/delete.php');
		require_once('components/move.php');
		require_once('components/details.php');
		require_once('components/edit_sub_component.php');
	}
	else
	{
		require_once('components/delete.php');
		require_once('components/move.php');
		require_once('components/main.php');
	}
?>
<script src="lib/components/script.js"></script>
