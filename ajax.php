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
			echo "<input type='button' id='bundle_next' onclick=\"bundle_next('showForms','compForm')\" value='Weiter'>";
		}
		elseif($wiz == "save")
		{
			echo"<pre>";
                print_r($_POST);
            echo"</pre>";
            
		}
		else
		{
		    require_once('lib/forms/formular_allgemein.php');
			echo "<form id='compNextForm'>";
			echo "Menge: <input type='text' name='anzahl' value='1'>";
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
            echo "<input type='button' id='comp_next' onclick=\"bundle_next('save','compNextForm')\"  value='Anlegen'>";
		}
	}
    elseif (isset($_GET['room_component']))
	{
		$page = $_GET['room_component'];
		if (file_exists('lib/page/rooms/room_components.php'))
		{
			require_once('lib/page/rooms/room_components.php');
		}
	}
    elseif (isset($_GET['component']))
	{
		$page = $_GET['component'];
		if (file_exists('lib/page/components/details.php'))
		{
			require_once('lib/page/components/details.php');
		}
	}
    elseif (isset($_GET['search']))
	{
		$page = $_GET['search'];
		if (file_exists('lib/mysql/suchfilter.php'))
		{
			require_once('lib/mysql/suchfilter.php');
		}
	}
	elseif (isset($_GET['edit_room']))
	{
		manipulation_statement("Update", $_GET);
		require_once('lib/page/rooms/main.php');

	}
	elseif (isset($_GET['delete_room']))
	{
		manipulation_statement("Delete", $_GET);
		require_once('lib/page/rooms/main.php');
	}
	elseif (isset($_GET['add_room']))
	{
		manipulation_statement("Insert", $_GET);
		require_once('lib/page/rooms/main.php');
	}
	elseif (isset($_GET['edit_supplier']))
	{
		manipulation_statement("Update", $_GET);
		require_once('lib/page/suppliers/main.php');
	}
	elseif (isset($_GET['delete_supplier']))
	{
		manipulation_statement("Delete", $_GET);
		require_once('lib/page/suppliers/main.php');
	}
	elseif (isset($_GET['add_supplier']))
	{
		manipulation_statement("Insert", $_GET);
		require_once('lib/page/suppliers/main.php');
	}
	elseif (isset($_GET['edit_component']))
	{
		manipulation_statement("Update", $_GET);
	}
	elseif (isset($_GET['delete_component']))
	{
		manipulation_statement("Delete", $_GET);
		require_once('lib/page/components/main.php');
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
