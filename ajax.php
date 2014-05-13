<?php
	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
		if (file_exists('lib/page/'.$page.'/main.php'))
		{
			require_once('global.php');
			require_once('lib/page/'.$page.'/main.php');
		}
	}
	elseif (isset($_GET['edit_room']))
	{
		$changes = $_GET['edit_room'];
		var_dump($_GET);
	}
	elseif (isset($_GET['delete_room']))
	{
		$changes = $_GET['delete_room'];
		var_dump($_GET);
	}
	elseif (isset($_GET['add_room']))
	{
		$changes = $_GET['add_room'];
		var_dump($_GET);
	}
	else
	{
		echo('Page nor found!');
	}
?>
