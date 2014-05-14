<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_accesspoints.php						 |*/
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
/*|	Formular fuer die Komponente 'Accesspoints'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Accesspoints</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='ap_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>IP: </td>
		<td><input name='ap_ip' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Pfad der Konfigdatei: </td>
		<td><input name='ap_config' type='text' size='30'></td>
		</tr>

	  </table>";

?>