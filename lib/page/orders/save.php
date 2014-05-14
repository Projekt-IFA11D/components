<?php

//WIP !! 


function getSupplierID($supplier)
{
	$sql = "SELECT l_id FROM lieferant WHERE l_firmenname LIKE '".mysql_real_escape_string($supplier)."'";
	$query = mysql_query($sql) or die("Lieferanten ID konnte nicht abgerufen werden<br><br>".mysql_error());
	
	$lief = mysql_fetch_assoc($query);
	
	if($lief[l_id] == "")
	{
		return false;
	}
	else
	{
		return $lief['l_id'];
	}
}


function getRoomID($room)
{
	$sql = "SELECT r_id FROM raeume WHERE r_nr LIKE '".mysql_real_escape_string($supplier)."'";
	$query = mysql_query($sql) or die("Raum ID konnte nicht abgerufen werden<br><br>".mysql_error());
	
	$lief = mysql_fetch_assoc($query);
	
	return $lief['l_id'];
}


function getComponentID($component)
{
	$sql = "SELECT k_id FROM komponentenarten WHERE ka_komponentenart LIKE '".mysql_real_escape_string($component)."'";
	$query = mysql_query($sql) or die("Komponent ID konnte nicht abgerufen werden<br><br>".mysql_error());

	$comp = mysql_fetch_assoc($query);

	return $comp['ka_id'];
}


function checkValidValue($val)
{
	
	$sql = "SELECT * FROM zulaessige_werte WHERE zw_wert LIKE '".mysql_real_escape_string($supplier)."'";
	$query = mysql_query($sql) or die("Wert konnte nicht validiert werden<br><br>".mysql_error());
	
	if(mysql_num_rows($query) > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}


function splitSortInput($key,$value,$array)
{
	
	$splitted = explode("_",$key);
	$comp = $splitted[0];
	$section = $splitted[1];
	if(count($splitted) == 3)
	{
		$attr = $splitted[2];
		$array[$comp][$section][$attr]=$value;
	}
	$array[$comp][$section]=$value;
	
	
	return $array;
	
}


function createNewSupplier()
{
	//sql zeugs zum lieferanten anlegen bla.........	
}


function createComponent()
{
	$supplier = getSupplierID("12");
	if(!$supplier)
	{
		createNewSupplier();
	}
	
	
	$room = getRoomID("12");
	
	
}
?>