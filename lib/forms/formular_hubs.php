<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_hubs.php								 |*/
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
/*|	Formular fuer die Komponente 'Hubs'				 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Hubs</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='hubs_attr_interne bezeichnung' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Anzahl Ports: </td>
		<td><input name='hubs_attr_Anzahl Ports' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Geschwindigkeit: </td>
		<td><input name='hubs_attr_uplink geschwindigkeit' type='text' size='30'></td>
		</tr>

	  </table>";

?>