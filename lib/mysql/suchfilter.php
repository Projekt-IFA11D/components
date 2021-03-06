<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Modulname:									 	 |*/
/*|	==========									 	 |*/
/*|	suchfilter.php									 |*/
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
/*|	Modul, um einzelne Komponenten herauszufiltern.	 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

/*+--------------------------------------------------+*/
/*|	INCLUDES										 |*/
/*+--------------------------------------------------+*/

// 	require_once "../config.inc.php";
	require_once "select_statement.php";

/*+--------------------------------------------------+*/
/*|	DEFINE VARIABLES								 |*/
/*+--------------------------------------------------+*/

	/* variables to connect to database */
	$SERVER     = "127.0.0.1";		
	$USER       = "root";
	$PASSWORD   = "";
	$DATABASE   = "itv_v1";

	@mysql_connect($SERVER, $USER, $PASSWORD) or die ("Fehler".mysql_error());
	mysql_select_db($DATABASE);
	
	/* arrays containing infos about components */
	$arr_hersteller   = array();	
	$arr_raum         = array();
	$arr_kaufdatum    = array();
	$arr_gewaehrdauer = array();
	$arr_lieferant    = array();
	$arr_notiz        = array();	
	

/*+--------------------------------------------------+*/
/*|	FUNCTIONS										 |*/
/*+--------------------------------------------------+*/

	fill_arrays();
	create_search_mask();
	
	
	
	/**
	 * creates a mask in which you can specify your search
	 */
	function create_search_mask() {
		global $arr_hersteller, $arr_kaufdatum, $arr_gewaehrdauer,
				$arr_notiz, $arr_lieferant, $arr_raum;
		echo "
		<h1> Suchfilter </h1><br><br><br>"	
// 		<form id='suchfilter'>	
		."<form action='such_select.php' method='post'>			
			<table border = '0' cellpadding = '0' cellspacing='4'>
				<tr>
					<td width='200px'>Hersteller</td>
					<td width='200px'>Raum</td>
					<td width='200px'>Kaufdatum</td>
					
				</tr>
				<tr>
					<td>
						<select name='sel_hersteller[]' size='5' multiple>"
					      .print_data($arr_hersteller).
						"</select>		
					</td>			
					<td>
						<select name='sel_raum[]' size='5' multiple>"
 					      .print_data($arr_raum).
						"</select>		
					</td>			
					<td>
						<select name='sel_kaufdatum[]' size='5' multiple>"
   					     .print_data($arr_kaufdatum).
						"</select>		
					</td>    
			</table>	
				
			<table border = '0' cellpadding = '0' cellspacing='4'>
				<tr>
					<td width='200px'>Gew�hrleistungdauer</td>
					<td width='200px'>Lieferant</td>
					<td width='200px'>Notiz</td>			
				</tr>
				<tr>						
					<td>
						<select name='sel_gewaehrdauer[]' size='5' multiple>"
 					      .print_data($arr_gewaehrdauer).
						"</select>		
					</td>			
					<td>
						<select name='sel_lieferant[]' size='5' multiple>"
 					      .print_data($arr_lieferant).
						"</select>		
					</td>			
					<td>
						<select name='sel_notiz[]' size='5' multiple>"
 					      .print_data($arr_notiz).
						"</select>		
					</td>			
				</tr>    
			</table>"
			//<button onclick='bundle_next('such', 'suchfilter')'></button>
			."<input type = 'Submit' Name = 'submit' VALUE = 'Submit'>			
		</form>";
		
	} /** end of create_search_mask */
	
	
	
	/**
	 * function which calls the function request_data to 
	 * fill our global arrays with the necessary data
	 */
	function fill_arrays() {
		global $arr_hersteller, $arr_raum, $arr_kaufdatum, 
				$arr_gewaehrdauer, $arr_lieferant, $arr_notiz;
		
		$arr_hersteller   = select_statement("components_producer");
		$arr_raum         = select_statement("room_name");
 		$arr_kaufdatum    = select_statement("components_date");
 		$arr_gewaehrdauer = select_statement("components_guarantee");
 		$arr_lieferant    = select_statement("suppliers_name");
 		$arr_notiz        = select_statement("components_note");
	} /** end of fill_arrays */
	

 	
 	/**
 	 * function prints out the <option/> tags in the browser
 	 * @param  $array_name   array which should be printed
 	 * @return string        created output which should be printed
 	 */
 	function print_data( $array_name ) {
 		$output ="";
 		//echo "<pre>";print_r($array_name);
 		foreach($array_name AS $index=>$val) {
 			if(is_array($val)) {
 				foreach($val AS $subIndex=>$subVal) {
 					$output .= "<option>".$subVal."</option>";	
 				}
 			} else {
 				$output .= "<option>".$val."</option>";
 			}
 		}
 		return $output;
 	} /** end of print_data */

?>