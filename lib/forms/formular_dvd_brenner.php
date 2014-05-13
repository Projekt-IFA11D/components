<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_dvd_brenner.php						 |*/
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
/*|	Formular fuer die Komponente 'DVD-Brenner'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: DVD-Brenner</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Lesegeschwindigkeit: </td>
		<td><input name='dvdb_lese_geschw' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Schreibgeschwindigkeit: </td>
		<td><input name='dvdb_schreib_geschw' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Schnittstelle: </td>
		<td><input name='dvdb_if' type='text' size='30'></td>
		</tr>

	  </table>";

?>