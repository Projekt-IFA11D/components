<?php
	if (isset($_GET['search']))
	{
		require_once('components/delete.php');
		require_once('components/move.php');
		require_once('search/search_handler.php');
		echo('<script src="lib/components/script.js"></script>');
	}
	else
	{
		require_once("search/main.php");
		echo('<script src="lib/search/script.js"></script>');
	}
?>
