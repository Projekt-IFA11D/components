<?php
	if (!isset ($_GET['component']))
	{
		require_once('components/delete.php');
		require_once('components/main.php');
	}
	else
	{
		require_once('components/details.php');
	}
?>

<script src="lib/components/script.js"></script>
