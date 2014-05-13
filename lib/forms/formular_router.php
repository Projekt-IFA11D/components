<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_router.php								 |*/
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
/*|	Formular fuer die Komponente 'Router'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Router</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='router_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>ID des VLANS: </td>
		<td><input name='router_id' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Portzahl: </td>
		<td><input name='router_ports' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>IP 1: </td>
		<td><input name='router_ip1' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>IP 2: </td>
		<td><input name='router_ip2' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>IP 3: </td>
		<td><input name='router_ip3' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>IP 4: </td>
		<td><input name='router_ip4' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Pfad der Konfigdatei: </td>
		<td><input name='vlan_config' type='text' size='30'></td>
		</tr>
		
	  </table>";

?>