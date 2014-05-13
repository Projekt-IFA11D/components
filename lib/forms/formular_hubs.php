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

echo "<h1>Komponente: Hubs</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='hub_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Anzahl Ports: </td>
		<td><input name='hub_ports' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Geschwindigkeit: </td>
		<td><input name='hub_geschw' type='text' size='30'></td>
		</tr>

	  </table>";

?>