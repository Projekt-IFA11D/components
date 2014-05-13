<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_drucker.php							 |*/
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
/*|	Formular fuer die Komponente 'Drucker'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Drucker</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Drucker: </td>
		<td><input name='drucker_ip' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Druckertyp: </td>
		<td><input type='radio' name='drucker_typ' value='drucker_typ_tinte'> Tinte<br>
    	<input type='radio' name='drucker_typ' value='drucker_typ_laser'> Laser<br>
		<input type='radio' name='drucker_typ' value='drucker_typ_nadel'> Nadel<br></td>
		</tr>
		
		<tr>
		<td align='right'>Druckerart: </td>
		<td><input type='radio' name='drucker_art' value='drucker_art_farbe'>Farbe<br>
    	<input type='radio' name='drucker_art' value='drucker_art_sw'>Schwarz-Weiss<br></td>
		</tr>
		
		<tr>
		<td align='right'>Anschluss-Art: </td>
		<td><input type='checkbox' name='drucker_anschluss' value='drucker_anschluss_lan'>LAN<br>
		<input type='checkbox' name='drucker_anschluss' value='drucker_anschluss_usb'>USB<br>
		Sonstiges: <input name='drucker_sontiges' type='text' size='30'></td>
		</tr>

	  </table>";

?>