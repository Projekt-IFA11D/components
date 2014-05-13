<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_netzwerkkarte.php						 |*/
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
/*|	Formular fuer die Komponente 'Netzwerkkarte'	 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Netzwerkkarte</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='nk_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Bandbreite/Geschwindigkeit: </td>
		<td><input name='nk_bandbreite' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Externe Schnittstelle: </td>
		<td><input type='checkbox' name='nk_ext_if' value='nk_ext_if_rj45'>RJ45<br>
		<input type='checkbox' name='nk_ext_if' value='nk_ext_if_lwl'>LWL<br></td>
		</tr>
		
		<tr>
		<td align='right'>Interne Schnittstelle: </td>
		<td><input type='checkbox' name='nk_int_if' value='nk_int_if_pci'>PCI<br>
		<input type='checkbox' name='nk_int_if' value='nk_int_if_pcie'>PCI-E<br></td>
		</tr>
		
		<tr>
		<td align='right'>Anzahl externer Ports: </td>
		<td><input name='nk_anz_ports' type='text' size='30'></td>
		</tr>

	  </table>";

?>