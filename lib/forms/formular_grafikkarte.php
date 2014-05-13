<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_grafikkarte.php						 |*/
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
/*|	Formular fuer die Komponente 'Grafikkarte'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Grafikkarte</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='gk_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Interne Schnittstelle: </td>
		<td><input name='gk_intern_if' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Speicher: </td>
		<td><input name='gk_speicher' type='text' size='30'></td>
		</tr>

	  </table>";

?>