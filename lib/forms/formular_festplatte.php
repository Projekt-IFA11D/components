<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_festplatte.php							 |*/
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
/*|	Formular fuer die Komponente 'Festplatte'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Komponente: Festplatte</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='fp_name' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Schnittstellenart: </td>
		<td><input type='checkbox' name='fp_ssa' value='ssa_ide'>IDE<br>
		<input type='checkbox' name='fp_ssa' value='ssa_sata'>SATA<br>
		<input type='checkbox' name='fp_ssa' value='ssa_sas'>SAS<br>
		Sonstiges: <input name='fp_ssa_sonstig' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Einsatzzweck: </td>
		<td><input type='checkbox' name='fp_zweck' value='z_client'>Client<br>
		<input type='checkbox' name='fp_zweck' value='z_server'>Server<br>
		Sonstiges: <input name='fp_zweck_sonstig' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Groesse: </td>
		<td><input name='fp_groesse' type='text' size='30'></td>
		</tr>		

		<tr>
		<td align='right'>Speicherart: </td>
		<td><input type='checkbox' name='fp_spa' value='spa_magnetisch'>Magnetisch<br>
		<input type='checkbox' name='fp_spa' value='spa_ssd'>SSD<br></td>
		</tr>

	  </table>";

?>