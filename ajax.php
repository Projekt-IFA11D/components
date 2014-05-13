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
	else
	{
		echo('Page nor found!');
	}
?>
