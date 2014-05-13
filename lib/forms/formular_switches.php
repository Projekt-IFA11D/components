<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_switches.php							 |*/
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
/*|	Formular fuer die Komponente 'Switches'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Switches</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='sw_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>IP: </td>
		<td><input name='sw_ip' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Anzahl Ports: </td>
		<td><input name='sw_anz_port' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Uplinktyp: </td>
		<td><input type='checkbox' name='sw_uplink' value='sw_uplink_lwl'>LWL<br>
		<input type='checkbox' name='sw_uplink' value='sw_uplink_rj45'>RJ45<br>
		</tr>
		
		<tr>
		<td align='right'>Geschwindigkeit (des Uplinks/der Ports im Raum): </td>
		<td><input name='sw_geschw' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Pfad der Konfigdatei: </td>
		<td><input name='sw_config' type='text' size='30'></td>
		</tr>		

	  </table>";

?>