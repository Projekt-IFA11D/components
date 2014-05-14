<?php

mysql_connect("localhost","root","") or die(mysql_Error());
mysql_select_db("itv_v1") or die(mysql_Error());


//WIP !! 
/*TEST Array*/

$_POST['anzahl'] = "1";
$_POST['ram_attr_name'] = "KVR";
$_POST['ram_attr_groesse'] = "2GB";
$_POST['ram_attr_taktfrequenz'] = "1333MHZ";

$_POST['ram_main_hersteller'] = "Kingston";
$_POST['ram_main_einkaufsdatum'] = "14.05.2014";
$_POST['ram_main_gewaehrleistungsdauer'] = "2";
$_POST['ram_main_notiz'] = "Nigelnagel neu";

$_POST['ram_raeume_raum'] = "r001";

$_POST['ram_lieferant_lieferant'] = "Lenovo";


echo"<pre>";
    print_r($_POST);
echo"</pre>";


prepareToSave();
function prepareToSave()
{
    $anzahl = $_POST['anzahl'];
    unset($_POST['anzahl']);
    
    $array = array();
    
    foreach($_POST AS $key=>$value)
    {    
            $array = splitSortInput($key,$value,$array);
    }
    
    echo"<pre>";
    print_r($array);
    echo"</pre>";
    
    
    
    
    //Hauptverarbeitung
    foreach($array AS $component=>$compData)
    {
        
        $lieferantID = getSupplierID($compData['lieferant']['lieferant']);
        $raumID = getRoomID($compData['raeume']['raum']);
        $komponentenartID = getCompTypeID($component);
        //Existiert der Lieferant? Ja => Liefert die ID zurück; Nein=> gibt false zurück
        if(!$lieferantID)
        {
            echo"Lieferant existiert nicht!";
        }
        
        if(!$raumID)
        {
            echo"Raum existiert nicht!";
        }
        
        if(!$komponentenartID)
        {
            echo"Komponentenart existiert nicht!";
        }
        
        
        //Datum umbauen
        $datum = formDate($compData['main']['einkaufsdatum']);
        
        $sql_komponente = "INSERT INTO komponenten SET 
                            lieferant_l_id='".mysql_real_escape_string($lieferantID)."',
                            raeume_r_id='".mysql_real_escape_string($raumID)."',
                            k_einkaufsdatum='".$datum."',
                            k_gewaehrleistungsdauer='".mysql_real_escape_string($compData['main']['gewaehrleistungsdauer'])."',
                            k_notiz='".mysql_real_escape_string($compData['main']['notiz'])."',
                            k_hersteller='".mysql_real_escape_string($compData['main']['hersteller'])."',
                            komponentenarten_ka_id='".mysql_real_escape_string($komponentenartID)."'
                            ";
        echo "<br /><br />".$sql_komponente;
    }
    
    
    
    
    
    
    
    

  
    for($i=1; $i <= $anzahl; $i++)
    {
        
        
        
    }
}

function splitSortInput($key,$value,$array)
{
	
	$splitted = explode("_",$key);
	$comp = $splitted[0];
	$section = $splitted[1];
    $attr = $splitted[2];

    $array[$comp][$section][$attr]=$value;
	
	return $array;
	
}

function formDate($date)
{
    $date = explode(".",$date);
    return $date[2]."-".$date[1]."-".$date[0];
}


function getCompTypeID($comp)
{
    $sql = "SELECT ka_id FROM komponentenarten WHERE ka_komponentenart LIKE '".mysql_real_escape_string($comp)."'";
    $query = mysql_query($sql) or die("Komponentenart ID konnte nicht abgerufen werden<br /><br />".mysql_error());
    $ct = mysql_fetch_assoc($query);
    
    return $ct['ka_id'];
}



function getSupplierID($supplier)
{
	$sql = "SELECT l_id FROM lieferant WHERE l_firmenname LIKE '".mysql_real_escape_string($supplier)."'";
	$query = mysql_query($sql) or die("Lieferanten ID konnte nicht abgerufen werden<br><br>".mysql_error());
	
	$lief = mysql_fetch_assoc($query);
	
	if($lief['l_id'] == "")
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
	$sql = "SELECT r_id FROM raeume WHERE r_nr LIKE '".mysql_real_escape_string($room)."'";
	$query = mysql_query($sql) or die("Raum ID konnte nicht abgerufen werden<br><br>".mysql_error());
	
	$room = mysql_fetch_assoc($query);
	
	return $room['r_id'];
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









?>