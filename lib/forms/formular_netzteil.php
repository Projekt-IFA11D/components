<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_netzteil.php							 |*/
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
/*|	Formular fuer die Komponente 'Netzteil'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Netzteil</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Leistung: </td>
		<td><input name='nt_leistung' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Steckertyp zum Mainboard: </td>
		<td><input name='nt_stecker_mb' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Steckertyp zur CPU: </td>
		<td><input name='nt_stecker_cpu' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Anschluss-Anzahl: </td>
		<td><input name='nt_anz_anschlauss' type='text' size='30'></td>
		</tr>

	  </table>";

?>