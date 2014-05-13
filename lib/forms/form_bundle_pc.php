<?php
/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	form_bundle_pc.php								 |*/
/*|													 |*/
/*| Version:										 |*/
/*|	========										 |*/
/*|	1.0												 |*/
/*|													 |*/
/*|	Autor:											 |*/
/*|	======											 |*/
/*|	Marco Stecher 									 |*/
/*|													 |*/
/*| Beschreibung:									 |*/
/*|	=============									 |*/
/*|	Formular für die Vorauswahl der Komponenten		 |*/
/*| eines PCs. Verwendung im Bestellungswizzard.	 |*/
/*|													 |*/
/*+--------------------------------------------------+*/


echo"
		
	<form method='POST' action='#' name='pc_bundle'>
	<table border='0'>
	<tr>
		<td><input type='checkbox' name='form' value='cpu'></td>
		<td>CPU</td>
	</tr>

	<tr>
		<td><input type='checkbox' name='form' value='mainboard'></td>
		<td>Mainboard</td>
	</tr>
		

	<tr>
		<td><input type='checkbox' name='form' value='ram'></td>
		<td>Arbeitsspeicher</td>
	</tr>	

	<tr>
		<td><input type='checkbox' name='form' value='hdd'></td>
		<td>Festplatte</td>
	</tr>

	<tr>
		<td><input type='checkbox' name='form' value='raidcontroller'></td>
		<td>Raidcontroller</td>
	</tr>
	
	<tr>
		<td><input type='checkbox' name='form' value='laufwerk'></td>
		<td>Laufwerk</td>
	</tr>
	
	<tr>
		<td><input type='checkbox' name='form' value='netzteil'></td>
		<td>Netzteil</td>
	</tr>	
	
	<tr>
		<td><input type='checkbox' name='form' value='grafikkarte'></td>
		<td>Grafikkarte</td>
	</tr>

	<tr>
		<td><input type='checkbox' name='form' value='netzwerkkarte'></td>
		<td>Netzwerkkarte</td>
	</tr>
		
	</table>
	</form>
	";




?>