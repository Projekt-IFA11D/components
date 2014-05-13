<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_pc.php									 |*/
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
/*|	Formular fuer die Komponente 'PC'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: PC</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>
		
		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='pc_name' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>IP des Geraetes: </td>
		<td><input name='pc_ip' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Subnetzmaske: </td>
		<td><input name='pc_subnetzmaske' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Gateway: </td>
		<td><input name='pc_gateway' type='text' size='30'></td>
		</tr>
		
	  </table>";
?>