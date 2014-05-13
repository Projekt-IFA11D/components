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

echo "<h1>Komponente: Allgemein</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Hersteller: </td>
		<td><input name='allg_hersteller' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Raum: </td>
		<td><input name='allg_raum' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Kaufdatum: </td>
		<td><input name='allg_kaufdatum' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Gewaehrleistungsdauer: </td>
		<td><input name='allg_gewaehr_dauer' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Lieferant: </td>
		<td><input name='allg_lieferant' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Notiz: </td>
		<td><input name='allg_notiz' type='text' size='30'></td>
		</tr>

	  </table>";

?>