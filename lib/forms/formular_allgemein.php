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
    $output .= "
        <div class'form-horizontal'>
            <div class='form-group'>
            <label for='".$type."_main_hersteller' class='col-sm1'>Hersteller</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_hersteller'>
                </div>
            </div>

            <div class='form-group'>
            <label for='".$type."_main_raum' class='col-sm1'>Raum</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_raum'>
                </div>
            </div>

            <div class='form-group'>
            <label for='".$type."_main_einkaufsdatum' class='col-sm1'>Kaufdatum</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_einkaufsdatum'>
                </div>
            </div>

            <div class='form-group'>
            <label for='".$type."_main_gewaehrleistung' class='col-sm1'>Gew&auml;hrleistung;</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_gewaehrleistung'>
                </div>
            </div>

            <div class='form-group'>
            <label for='".$type."_main_lieferant' class='col-sm1'>Lieferant</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_lieferant'>
                </div>
            </div>

            <div class='form-group'>
            <label for='".$type."_main_notiz' class='col-sm1'>Notiz</label>
                <div class='col-sm-7'>
                    <input type='text' class='form-control' name='".$type."_main_notiz'>
                </div>
            </div>
        </div>";
    return $output;

 //               <table border = '1' cellpadding = '0' cellspacing='4'>
 //   
 //   		<tr>
 //   		<td align='right'>Hersteller: </td>
 //   		<td><input name='".$type."_main_hersteller' type='text' size='30'></td>
 //   		</tr>
 //   
 //   		<tr>
 //   		<td align='right'>Raum: </td>
 //   		<td><input name='".$type."_raeume_raum' type='text' size='30'></td>
 //   		</tr>
 //   
 //   		<tr>
 //   		<td align='right'>Kaufdatum: </td>
 //   		<td><input name='".$type."_main_einkaufsdatum' type='text' size='30'></td>
 //   		</tr>
 //   
 //   		<tr>
 //   		<td align='right'>Gewaehrleistungsdauer: </td>
 //   		<td><input name='".$type."_main_gewaehrleistungsdauer' type='text' size='30'></td>
 //   		</tr>
 //   
 //   		<tr>
 //   		<td align='right'>Lieferant: </td>
 //   		<td><input name='".$type."_lieferant_lieferant' type='text' size='30'></td>
 //   		</tr>
 //   
 //   		<tr>
 //   		<td align='right'>Notiz: </td>
 //   		<td><input name='".$type."_main_notiz' type='text' size='30'></td>
 //   		</tr>
 //   
 //   	  </table>";
}
?>
