<?php
	if (isset($_GET['room_component']))
	{
		require_once('components/delete.php');
		require_once('components/move.php');
		require_once('rooms/room_components.php');
		echo('<script src="lib/components/script.js"></script>');
	}
	else
	{
		require_once('rooms/add.php');
		require_once('rooms/edit.php');
		require_once('rooms/delete.php');
		require_once("rooms/main.php");
		echo('<script src="lib/rooms/script.js"></script>');
	}
?>
