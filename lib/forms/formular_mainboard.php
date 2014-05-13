<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_mainboard.php							 |*/
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
/*|	Formular fuer die Komponente 'Mainboard'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Mainboard</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>
		
		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='mb_name' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Sockel: </td>
		<td><input name='mb_sockel' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>RAM-Typ: </td>
		<td><input name='mb_ram_typ' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>RAM maximal moeglich: </td>
		<td><input name='mb_ram_max' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Baenke Anzahl: </td>
		<td><input name='mb_baenke_anzahl' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Steckertyp zum Netzteil: </td>
		<td><input name='mb_stecker_netz' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Steckertyp zum CPU: </td>
		<td><input name='mb_stecker_cpu' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Onboard-Funktionalitaet: </td>
		<td><input type='checkbox' name='mb_funktion' value='mb_grafik'>Grafik<br>
		<input type='checkbox' name='mb_funktion' value='mb_nic'>NIC<br>
		<input type='checkbox' name='mb_funktion' value='mb_wol'>WakeOnLAN<br>
		<input type='checkbox' name='mb_funktion' value='mb_raidctrl'>Raidcontroller<br></td>
		</tr>
		
		<tr>
		<td align='right'>Interne Schnittstellen: </td>
		<td><input type='checkbox' name='mb_int_if' value='mb_int_if_sata'>SATA<br>
		<input type='checkbox' name='mb_int_if' value='mb_int_if_sas'>SAS<br>
		Sonstiges: <input name='mb_int_if_sonstig' type='text' size='30'></td>		
		</tr>
		
		<tr>
		<td align='right'>Externe Schnittstellen: </td>
		<td><input type='checkbox' name='mb_ext_if' value='mb_ext_if_usb_2'>USB 2.0<br>
		<input type='checkbox' name='mb_ext_if' value='mb_ext_if_usb_3'>USB 3.0<br>
		Sonstiges: <input name='mb_extern_if_sonstig' type='text' size='30'></td>		
		</tr>
		
	  </table>";
?>