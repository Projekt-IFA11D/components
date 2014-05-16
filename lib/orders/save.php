<?php
error_reporting(0);
mysql_connect("localhost","root","") or die(mysql_Error());
mysql_select_db("itv_v1") or die(mysql_Error());
header("Content-Type: text/html; charset=utf-8");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
/*Ignoriere Attributwert Validierung bei:*/
$ignoreVal[0]="taktfrequenz";
$ignoreVal[1]="notiz";
$ignoreVal[2]="interne bezeichnung";
$ignoreVal[3]="sockel";
$ignoreVal[4]="Maximal Unterstuetzter RAM";
$ignoreVal[5]="onboard-funktionalitaet";
$ignoreVal[6]="einsatzzweck";
$ignoreVal[7]="uplink geschwindigkeit";
$ignoreVal[8]="anzahl ports";
$ignoreVal[9]="leistung";
$ignoreVal[10]="ip-adresse";
$ignoreVal[11]="id vlans";

//Sicherheits Bool Variable die es evtl. verhindert das die Attribute nicht in die Datenbank gelangen
$safety_check_attr = false;

//Patterns für str_replace
$search = array(" ");
$replace= array(" ");

//WIP !! 
/*TEST Array*/
/*
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

$_POST['anzahl'] ="1";
$_POST['mainboard_attr_interne_bezeichnung'] ="Asus";
$_POST['mainboard_attr_sockel'] ="ATX";
$_POST['mainboard_attr_ram-typ'] ="DDR3";
$_POST['mainboard_attr_maximal_unterstuetzter_ram'] ="32GB";
$_POST['mainboard_attr_anzahl_baenke'] ="4";
$_POST['mainboard_attr_formfaktor'] ="ATX";
$_POST['mainboard_attr_onboard-funktionalitaet'][0] ="Grafikkarte";
$_POST['mainboard_attr_onboard-funktionalitaet'][1] ="Netzwerk";
$_POST['mainboard_attr_onboard-funktionalitaet'][2] ="Wake on LAN";
$_POST['mainboard_attr_onboard-funktionalitaet'][3] ="Raidcontroller";
$_POST['mainboard_attr_schnittstellen_(intern)'][0] ="sata";
$_POST['mainboard_attr_schnittstellen_(intern)'][1] ="sas";
$_POST['mainboard_attr_schnittstellen_(extern)'][0] ="USB 2.0";
$_POST['mainboard_attr_schnittstellen_(extern)'][1] ="USB 3.0";
$_POST['mainboard_main_hersteller'] ="asus";
$_POST['mainboard_raeume_raum'] ="r001";
$_POST['mainboard_main_einkaufsdatum'] ="15.05.2014";
$_POST['mainboard_main_gewaehrleistungsdauer'] ="2";
$_POST['mainboard_lieferant_lieferant'] ="HP";
$_POST['mainboard_main_notiz'] ="Mainboard Test";
*/

/*
echo"<pre>";
    print_r($_POST);
echo"</pre>";


echo"<pre>";
print_r($ignoreVal);
echo"</pre>";
*/

//Handlervariable für die Trennzeichen
$firstAttr=true;





prepareToSave();
function prepareToSave()
{
    global $ignoreVal,$search,$replace,$firstAttr;
    $anzahl = $_POST['anzahl'];
    unset($_POST['anzahl']);
    
    $array = array();
    
    foreach($_POST AS $key=>$value)
    {    
            $array = splitSortInput($key,$value,$array);
    }
    /*
    echo"<pre>";
    print_r($array);
    echo"</pre>";
    */
    //Überprüfe ob es sich um ein Komplettsystem handelt
    $is_bundle=checkForBundle($array);
    
    
    if($is_bundle)
    {
        //echo"<br /><h2>Komplettsystem</h2>";
        //Separiere PC vom Rest!
        $pc = $array['komplettsystem'];
        unset($array['komplettsystem']);
        $teilkomponenten = $array;
    }
    else
    {
       // echo"<br /><h2>KEIN Komplettsystem</h2>";
        $teilkomponenten = $array;
    }
    
    //Hauptverarbeitung
    for($i=1; $i <= $anzahl; $i++)
    {
    	//Sicherheits Bool Variable die es evtl. verhindert das die Attribute nicht in die Datenbank gelangen
    	$safety_check_attr = false;
    	//Handlervariable für die Trennzeichen
    	$firstAttr=true;
    	
        $compID = createSingleComp($teilkomponenten);
        
        if($is_bundle)
        {
        	//Sicherheits Bool Variable die es evtl. verhindert das die Attribute nicht in die Datenbank gelangen
        	$safety_check_attr = false;
        	//Handlervariable für die Trennzeichen
        	$firstAttr=true;
        	 
            $bundleID = createSingleComp($pc);
            createAggregation($bundleID,$compID,formDate($pc['main']['einkaufsdatum']));
        }
        
    }
    
    echo"<center><h2>Komponente gespeichert</h2></center>";
}


function createAggregation($parent,$child,$kaufdatum)
{
    $sql = "INSERT INTO komponente_hat_komponente SET
            komponenten_k_id_aggregat = '".$parent."',
           	komponenten_k_id_teil = '".$child."',
            vorgangsarten_v_id = '1',
            khk_datum ='".$kaufdatum."'
            ";
            
    if(!mysql_query($sql))
    {
        rollback($child);
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
    $sql_aggregat = "DELETE FROM komponente_hat_komponente WHERE komponenten_k_id_teil='".$cid."'";
    mysql_query($sql_comp);
    mysql_query($sql_compattr);
    mysql_query($sql_aggregat);
    
    //echo"<h1>ROLLBACK DURCHGEFÜHRT!";
}


function getAttrValID($val)
{
	//echo "<h2>$val</h2>";
    if($val)
    {
		$sql = "SELECT zw_id FROM zulaessige_werte WHERE zw_wert LIKE '".mysql_real_escape_string($val)."'";
	    $query = mysql_query($sql) or die("Zulässiger Wert konnte nicht abgerufen werden<br /><br />".mysql_error());
	    $zw = mysql_fetch_assoc($query);
	    return $zw['zw_id'];
    }
    else 
    {
    	return false;
    }
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
	unset($splitted[0]);
	unset($splitted[1]);
	unset($splitted[2]);
	
	if(isset($splitted[3]))
	{
		$attr = $attr." ".$splitted[3];
	}
	
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
    global $ignoreVal,$search,$replace,$safety_check_attr,$firstAttr;
    
    foreach($array AS $component=>$compData)
    {
        
        $lieferantID = getSupplierID($compData['lieferant']['lieferant']);
        $raumID = getRoomID($compData['raeume']['raum']);
        $komponentenartID = getCompTypeID($component);
        //Existiert der Lieferant? Ja => Liefert die ID zurück; Nein=> gibt false zurück
        if(!$lieferantID)
        {
            //echo"Lieferant existiert nicht!";
        }
        
        if(!$raumID)
        {
            //echo"Raum existiert nicht!";
        }
        
        if(!$komponentenartID)
        {
            //echo"Komponentenart existiert nicht!";
        }
        
        
        //Datum umbauen
        $datum = formDate($compData['main']['einkaufsdatum']);
        
        
        
        //Statement Komponente montieren
        $sql_komponente = "INSERT INTO komponenten SET 
                            lieferant_l_id='".mysql_real_escape_string($lieferantID)."',
                            raeume_r_id='2',
                            k_einkaufsdatum='".$datum."',
                            k_gewaehrleistungsdauer='".mysql_real_escape_string($compData['main']['gewaehrleistungsdauer'])."',
                            k_notiz='".mysql_real_escape_string($compData['main']['notiz'])."',
                            k_hersteller='".mysql_real_escape_string($compData['main']['hersteller'])."',
                            komponentenarten_ka_id='".mysql_real_escape_string($komponentenartID)."'
                            ";
        //echo "<br /><br />".$sql_komponente;
        
        //Füge Komponente ein
        mysql_query($sql_komponente);// or die("Komponente konnte nicht eingetragen werden!<br /><b>SQL:</b>$sql_komponente<br />Fehler:".mysql_error());
        
        //Hole die neue ID ab
        $NewCompID = mysql_insert_id();
        
        
        
        
        
        //Komponentenattribute
        //Validiere Attribut und Attributwert und kleb' den insert string zam'
        $sql_attr="INSERT INTO komponente_hat_attribute (komponenten_k_id,komponentenattribute_kat_id, khkat_wert) VALUES ";
        
        
        
        
         
        //Gehe alle Attribute der Komponente durch
        foreach($compData['attr'] AS $attr=>$val)
        {
        	
        	if($val != "" && !empty($val))
        	{
	        	
	        	if(is_array($val))
	        	{
	        		foreach($val AS $value)
	        		{
	        			if($value != "" && !empty($value))
	        			{
	        				$sql_attr_values ="";
	       					$sql_attr_values .= attributManagement($attr,$value,$NewCompID,$sql_attr_values);
	       					$sql_attr = $sql_attr.$sql_attr_values;
	        			}
	        		}
	        	}	
	        	else
	        	{
	        		$sql_attr_values ="";
	        		$sql_attr_values .= attributManagement($attr,$val,$NewCompID,$sql_attr_values);
	        		$sql_attr = $sql_attr.$sql_attr_values;
	        	}
	        	
        
        	}
        }
    }
    
    
    //echo "<br /><br />Attributstring: ".$sql_attr;
    
    //Wenn Sicherheitsvariable true ist, werden die Attribute hinzugefügt. Bei Fehler wird ein Rollback durchgeführt
    if($safety_check_attr)
    {
    	if(!mysql_query($sql_attr))
    	{
    		//echo"<br />Attribute nicht angelegt!<br />SQL: $sql_attr <br>".mysql_error();
    		
    		
    		rollback($NewCompID);
    	}
    }
    else
    { 
    	rollback($NewCompID);
    }
}




function attributManagement($attr,$val,$NewCompID,$sql_attr)
{
	global $search,$replace,$firstAttr,$safety_check_attr,$ignoreVal,$firstAttr;
	
	//Hole Attributs ID. Wenn kein Attribut vorhanden, dann wird false zurückgegeben
	$attrID = getAttrID($attr);
	 
	//Es wird nachgeschaut ob der Attributswert zulässig ist
	$zwID = getAttrValID($val);
	
	 
	if(!$attrID)
	{
		//echo "<br>Attribut '<b>$attr</b>' existiert nicht!";
	}

	if(!$zwID)
	{
		//echo "<br>Wert '<b>$val</b>' existiert nicht!";
	}
	
	 
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
		//Handler ab wann ein Komma in den String eingefügt wird.
		if($firstAttr)
		{
			$firstAttr=false;
		}
		else
		{
			$firstAttr=false;
			$sql_attr .= " , ";
		}
		
		//Es werden die Values hinzugefügt Komponenten ID, Attributs ID und Attributswert
		$sql_attr .= " ('".$NewCompID."','".$attrID."','".mysql_real_escape_string($val)."') ";
	 
		//Da min 1 Datensatz eingefügt wird, wird die Sicherheitsvariable auf true gesetzt
		$safety_check_attr=true;
	}	
	
	return $sql_attr;
}



?>