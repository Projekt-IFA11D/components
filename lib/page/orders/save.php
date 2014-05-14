<?php

mysql_connect("localhost","root","") or die(mysql_Error());
mysql_select_db("itv_v1") or die(mysql_Error());


/*Ignoriere Attributwert Validierung bei:*/
$ignoreVal[0]="taktfrequenz";
$ignoreVal[1]="notiz";
$ignoreVal[2]="interne bezeichnung";

//Patterns für str_replace
$search = array(" ");
$replace= array(" ");

//WIP !! 
/*TEST Array*/

$_POST['anzahl'] = "1";
$_POST['ram_attr_interne bezeichnung'] = "KVR";
$_POST['ram_attr_speicherkapazität'] = "2GB";
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


echo"<pre>";
print_r($ignoreVal);
echo"</pre>";








prepareToSave();
function prepareToSave()
{
    global $ignoreVal,$search,$replace;
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
    
    //Überprüfe ob es sich um ein Komplettsystem handelt
    $is_bundle=checkForBundle($array);
    
    
    if($is_bundle)
    {
        echo"<br /><h2>Komplettsystem</h2>";
    }
    else
    {
        echo"<br /><h2>KEIN Komplettsystem</h2>";
    }
    
    //Hauptverarbeitung
    for($i=1; $i <= $anzahl; $i++)
    {
             
        $compID = createSingleComp($array);
        
        if($is_bundle)
        {
            //$bundleID = createGroupComp();
            //createAggregation($bundleID,$compID);
        }
        
    }
}


function checkForBundle($array)
{
    $comps=array();
    foreach($array AS $comp=>$ignoreVal)
    {
        $comps[$comp]=1;
    }
    
    if(count($comps) > 1)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function rollback($cid)
{
    $sql_comp = "DELETE FROM komponenten WEHRE k_id='".$cid."'";
    $sql_compattr = "DELETE FROM komponente_hat_attribute WHERE komponenten_k_id='".$cid."'";
    $sql_aggregat = "DELETE FROM komponente_hat_komponente WHERE komponente_hat_komponente='".$cid."'";
    mysql_query($sql_comp);
    mysql_query($sql_compattr);
    mysql_query($sql_aggregat);
}


function getAttrValID($val)
{
    $sql = "SELECT zw_id FROM zulaessige_werte WHERE zw_wert LIKE '".mysql_real_escape_string($val)."'";
    $query = mysql_query($sql) or die("Zulässiger Wert konnte nicht abgerufen werden<br /><br />".mysql_error());
    $zw = mysql_fetch_assoc($query);
    
    return $zw['zw_id'];
}

function getAttrID($attr)
{   
    global $search,$replace;
    $sql = "SELECT kat_id FROM komponentenattribute WHERE kat_beschreibung LIKE '".mysql_real_escape_string(str_replace($search,$replace,$attr))."'";
    $query = mysql_query($sql) or die("Komponentenart ID konnte nicht abgerufen werden<br /><br />".mysql_error());
    $attr = mysql_fetch_assoc($query);
    
    return $attr['kat_id'];
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






function createSingleComp($array)
{
    global $ignoreVal,$search,$replace;
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
        
        
        
        //Statement Komponente montieren
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
        
        //Füge Komponente ein
        //mysql_query($sql_komponente) or die("Komponente konnte nicht eingetragen werden!<br /><b>SQL:</b>$sql_komponente<br />Fehler:".mysql_error());
        
        //Hole die neue ID ab
        //$NewCompID = mysql_insert_id();
        
        //Komponentenattribute
        
        //Validiere Attribut und Attributwert und kleb' den insert string zam'
        $sql_attr="INSERT INTO komponente_hat_attribute (komponenten_k_id,komponentenattribute_kat_id, khkat_wert) VALUES ";
        
        //Sicherheits Bool Variable die es evtl. verhindert das die Attribute nicht in die Datenbank gelangen
        $safety_check_attr = false;
        
        
        //Gehe alle Attribute der Komponente durch
        foreach($compData['attr'] AS $attr=>$val)
        {
            $attrID = getAttrID($attr);
            $zwID = getAttrValID($val);
            $firstAttr=true;
            
            
            
            //Prüfe ob Wert Validierung nichtig ist
            if(in_array(strtolower($attr),$ignoreVal))
            {
                $ignore=true;
            }
            else
            {
                $ignore=false;
            }
            
            //Wenn Attribut ID true und Wert Zulässig ODER Attributwert Whitelisted ist wird der String fortgeführt  
            if($attrID && ($zwID || $ignore))
            {
                if($firstAttr)
                {
                    $firstAttr=false;
                }
                else
                {
                    $attr_string .= " , ";
                }
                
                $sql_attr .= " ('".$NewCompID."','".$attrID."','".mysql_real_escape_string($val)."') ";
                
                //Da min 1 Datensatz eingefügt wird, wird die Sicherheitsvariable auf true gesetzt
                $safety_check_attr=true;
            }
        }
        
        echo "<br /><br />Attributstring: ".$sql_attr;
        
        
        //Wenn Sicherheitsvariable true ist, werden die Attribute hinzugefügt. Bei Fehler wird ein Rollback durchgeführt
        if($safety_check_attr)
        {
            if(!mysql_query($sql_attr))
            {
                rollback($NewCompID);
            }
        }
        else
        {
            rollback($NewCompID);
        }
    }
}





?>