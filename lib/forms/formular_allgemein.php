<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_allgemein.php							 |*/
/*|													 |*/
/*| Version:										 |*/
/*|	========										 |*/
/*|	1.0												 |*/
/*|													 |*/
/*|	Autor:											 |*/
/*|	======											 |*/
/*|	Maximilian Drescher								 |*/
/*|													 |*/
/*| Beschreibung:									 |*/
/*|	=============									 |*/
/*|	Formular fuer die Komponente 'Allgemein'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/
function form_general($type)
{
    
    $output = "";
    $output .= "<table border = '1' cellpadding = '0' cellspacing='4'>
    
    		<tr>
    		<td align='right'>Hersteller: </td>
    		<td><input name='".$type."_main_hersteller' type='text' size='30'></td>
    		</tr>
    
    		<tr>
    		<td align='right'>Raum: </td>
    		<td><input name='".$type."_raeume_raum' type='text' size='30'></td>
    		</tr>
    
    		<tr>
    		<td align='right'>Kaufdatum: </td>
    		<td><input name='".$type."_main_einkaufsdatum' type='text' size='30'></td>
    		</tr>
    
    		<tr>
    		<td align='right'>Gewaehrleistungsdauer: </td>
    		<td><input name='".$type."_main_gewaehrleistungsdauer' type='text' size='30'></td>
    		</tr>
    
    		<tr>
    		<td align='right'>Lieferant: </td>
    		<td><input name='".$type."_lieferant_lieferant' type='text' size='30'></td>
    		</tr>
    
    		<tr>
    		<td align='right'>Notiz: </td>
    		<td><input name='".$type."_main_notiz' type='text' size='30'></td>
    		</tr>
    
    	  </table>";
    return $output;
}
?>