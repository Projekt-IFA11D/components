<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_cpu.php								 |*/
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
/*|	Formular fuer die Komponente 'CPU'				 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: CPU</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>
		
		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='cpu_name' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Sockel: </td>
		<td><input name='cpu_sockel' type='text' size='30'></td>
		</tr>
		
	  </table>";

?>