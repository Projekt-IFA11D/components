<?php
require_once('global.php');

        if (isset($_GET['page']))
	{
		$page = $_GET['page'];
		if (file_exists('lib/page/'.$page.'/main.php'))
		{
		  require_once('lib/page/'.$page.'/main.php');
		}
	}
	elseif (isset($_GET['wizzard']))
	{
		$wiz = $_GET['wizzard'];
		$type = $_GET['type'];
		if ($wiz == 'bundle')
		{
			if (file_exists('lib/forms/form_bundle_'.$type.'.php'))
			{
				require_once('lib/forms/form_bundle_'.$type.'.php');
			}
		}
		else
		{
			if (file_exists('lib/forms/formular_'.$type.'.php'))
			{
				require_once('lib/forms/formular_'.$type.'.php');
			}	
		}
	}
	elseif (isset($_GET['edit_room']))
	{
	  $changes = $_GET['edit_room'];
	  manipulation_statement("Update", $_GET);
	}
	elseif (isset($_GET['delete_room']))
	{
	  $changes = $_GET['delete_room'];
	  manipulation_statement("Delete", $_GET);
	  var_dump($_GET);
	}
	elseif (isset($_GET['add_room']))
	{
	  $changes = $_GET['add_room'];
	  manipulation_statement("Insert", $_GET);
	  var_dump($_GET);
	}
	else
	{
	  echo('Page not found!');
	}
?>
