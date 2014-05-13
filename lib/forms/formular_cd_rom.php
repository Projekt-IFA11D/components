<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_cd_rom.php								 |*/
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
/*|	Formular fuer die Komponente 'CD-ROM'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: CD-ROM</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Lesegeschwindigkeit: </td>
		<td><input name='cd_lese_geschw' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Schnittstelle: </td>
		<td><input name='cd_if' type='text' size='30'></td>
		</tr>

	  </table>";

?>