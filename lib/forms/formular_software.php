<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_software.php							 |*/
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
/*|	Formular fuer die Komponente 'Software'			 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>Software</h1><br><br>";
echo "<table border = '1' cellpadding = '0' cellspacing='4'>

		<tr>
		<td align='right'>Interne Bezeichnung/Name: </td>
		<td><input name='software_attr_interne bezeichnung' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Versionsnummer: </td>
		<td><input name='software_attr_versionsnummer' type='text' size='30'></td>
		</tr>

		<tr>
		<td align='right'>Lizenztyp: </td>
		<td><select name='software_attr_lizenztyp' size='3'>
      		<option>Volumen</option>
      		<option>Einzelplatzlizenz</option>
      		<option>Schuelerversion</option>
      		<option>Lehrerversion</option>
      		<option>Verwaltung</option>
    		</select>
		</td>
		</tr>

		<tr>
		<td align='right'>Lizenzanzahl: </td>
		<td><input name='software_attr_lizenzanzahl' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Lizenzlaufzeit: </td>
		<td><input name='software_attr_lizenzlaufzeit' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Lizenzinformationen: </td>
		<td><input name='software_attr_lizenzinformationen' type='text' size='30'></td>
		</tr>
		
		<tr>
		<td align='right'>Installationshinweise: </td>
		<td><input name='software_attr_installationshinweis' type='text' size='30'></td>
		</tr>

	  </table>";

?>