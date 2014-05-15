<?php
	require_once('global.php');

    if (isset($_GET['page']))
	{
		$page = $_GET['page'];
		if (file_exists('lib/'.$page.'.php'))
		{
		  require_once('lib/'.$page.'.php');
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
			echo "<button class='btn btn-primary' type='button' id='bundle_next' onclick=\"bundle_next('showForms','compForm')\">Weiter</button>";
		}
		elseif($wiz == "save")
		{
			require_once('lib/page/orders/save.php');
            
		}
		else
		{
		    require_once('lib/forms/formular_allgemein.php');
			echo "<form id='compNextForm'>";
			echo "<label>Menge: </label>";
			echo "<input class='form-control' type='text' name='anzahl' value='1' style='width:10%'>";
			if(isset($_POST['form']) && is_array($_POST['form']))
			{
				
				echo"<pre>";
					print_r($_POST);
				echo"</pre>";
                
                echo"<table border='0'>";
                     
                
				foreach($_POST['form'] AS $val)
				{
				    echo"<tr>";
					echo"<td>";require_once('lib/forms/formular_'.$val.'.php');echo"</td>";
                    echo"<td valign='top'>".form_general($val)."</td>";
				    echo"</tr>";
                }
                echo"</table>";
			}
			else
			{
			     echo"<table border='0'>
                        <tr>
                     ";
				if (file_exists('lib/forms/formular_'.$type.'.php'))
				{
					echo"<td>";require_once('lib/forms/formular_'.$type.'.php');echo"</td>";
                    echo"<td valign='top'>".form_general($type)."</td>";
				}
                echo"</tr></table>";
			}
			
			echo "<br>";
			echo "</form>";
            echo "<button class='btn btn-primary' type='button' id='comp_next' onclick=\"bundle_next('save','compNextForm')\">Anlegen</button>";
		}
	}
    elseif (isset($_GET['room_component']))
	{
		$page = $_GET['room_component'];
		if (file_exists('lib/rooms/room_components.php'))
		{
			require_once('lib/rooms/room_components.php');
		}
	}
    elseif (isset($_GET['component']))
	{
		$page = $_GET['component'];
		if (file_exists('lib/components.php'))
		{
			require_once('lib/components.php');
		}
	}
	elseif (isset($_GET['edit_room']))
	{
		manipulation_statement("Update", $_GET);
		require_once('lib/rooms.php');

	}
	elseif (isset($_GET['delete_room']))
	{
		manipulation_statement("Delete", $_GET);
		require_once('lib/rooms.php');
	}
	elseif (isset($_GET['add_room']))
	{
		manipulation_statement("Insert", $_GET);
		require_once('lib/rooms.php');
	}
	elseif (isset($_GET['edit_supplier']))
	{
	        complex_manipulation_statement($_GET);
		require_once('lib/suppliers.php');
	}
	elseif (isset($_GET['delete_supplier']))
	{
		manipulation_statement("Delete", $_GET);
		require_once('lib/suppliers.php');
	}
	elseif (isset($_GET['add_supplier']))
	{
		complex_manipulation_statement($_GET);
		require_once('lib/suppliers.php');
	}
	elseif (isset($_GET['edit_component']))
	{
		manipulation_statement("Update", $_GET);
	}
	elseif (isset($_GET['delete_component']))
	{
		not_really_delete($_GET);
		require_once('lib/components.php');
	}
	elseif (isset($_GET['add_component']))
	{
		manipulation_statement("Insert", $_GET);
	}
	else
	{
	  echo('Page not found!');
	}
?>
