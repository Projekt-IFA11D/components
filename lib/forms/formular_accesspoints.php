<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_accesspoints.php						 |*/
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
/*|	Formular fuer die Komponente 'Accesspoints'		 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Accesspoint</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='accesspoint_attr_interne bezeichnung' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>IP: </td>
		<td><input name='accesspoint_attr_ip-adresse' type='text' size='30'></td>
		</tr>

	  </table>";

?>