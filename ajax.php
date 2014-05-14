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
			
			echo "<form id='compForm'>";
			
			echo "<input type='hidden' id='type' value='".$type."'>";
			if (file_exists('lib/forms/form_bundle_'.$type.'.php'))
			{
				require_once('lib/forms/form_bundle_'.$type.'.php');
			}
			
			
			echo "<br>";
			
			echo "</form>";
			echo "<input type='button' id='bundle_next' onclick='bundle_next()' value='Weiter'>";
	
			
		}
		elseif($wiz == "save")
		{
			order_wizzard_save();
		}
		else
		{
			
			
			echo "<form name='compForm'>";
			echo "Menge: <input type='text' name='anzahl' value='1'>";
			if(isset($_POST['form']))
			{
				/*
				echo"<pre>";
					print_r($_POST);
				echo"</pre>";*/
				foreach($_POST['form'] AS $val)
				{
					require_once('lib/forms/formular_'.$val.'.php');
				}
			}
			else
			{
				if (file_exists('lib/forms/formular_'.$type.'.php'))
				{
					require_once('lib/forms/formular_'.$type.'.php');
				}	
			}
			require_once('lib/forms/formular_allgemein.php');
			
			echo "<br>";
			echo "<input type='submit' name='send_comps' value='Anlegen'>";
			echo "</form>";
			
		}
		
		
		
		
		
		
		
	}
    elseif (isset($_GET['room_component']))
	{
		$page = $_GET['room_component'];
		if (file_exists('lib/page/rooms/room_component.php'))
		{
			require_once('lib/page/rooms/room_component.php');
		}
	}
	elseif (isset($_GET['edit_room']))
	{
		manipulation_statement("Update", $_GET);
	}
	elseif (isset($_GET['delete_room']))
	{
		manipulation_statement("Delete", $_GET);
		var_dump($_GET);
	}
	elseif (isset($_GET['add_room']))
	{
		manipulation_statement("Insert", $_GET);
		var_dump($_GET);
	}
	elseif (isset($_GET['edit_supplier']))
	{
		manipulation_statement("Update", $_GET);
		var_dump($_GET);
	}
	elseif (isset($_GET['delete_supplier']))
	{
		manipulation_statement("Delete", $_GET);
		var_dump($_GET);
	}
	elseif (isset($_GET['add_supplier']))
	{
		manipulation_statement("Insert", $_GET);
		var_dump($_GET);
	}
	else
	{
	  echo('Page not found!');
	}
?>
