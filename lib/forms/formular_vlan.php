<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_vlan.php								 |*/
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
/*|	Formular fuer die Komponente 'VLAN'				 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: VLAN</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='vlan_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>ID des VLANS: </td>
		<td><input name='vlan_id' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Portzahl: </td>
		<td><input name='vlan_ports' type='text' size='30'></td>
		</tr>

	  </table>";

?>