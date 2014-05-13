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

	require_once "../config.inc.php";
	require_once "select_statement.php";

/*+--------------------------------------------------+*/
/*|	DEFINE VARIABLES								 |*/
/*+--------------------------------------------------+*/

	/* variables to connect to database */
	$SERVER     = "127.0.0.1";		
	$USER       = "root";
	$PASSWORD   = "";
	$DATABASE   = "itv_v1";


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

	@mysql_connect($SERVER, $USER, $PASSWORD) or die ("Fehler".mysql_error());
	mysql_select_db($DATABASE);
	

	fill_arrays();
	create_search_mask();
	
	
	/**
	 * creates a mask in which you can specify your search
	 */
	function create_search_mask() {
		global $arr_hersteller, $arr_kaufdatum;
		echo "
		<h1> Suchfilter </h1><br><br><br>		
		<form action='' method='post'>			
			<table border = '1' cellpadding = '0' cellspacing='4'>
				<tr>
					<td width='250px'>Hersteller</td>
					<td width='250px'>Raum</td>
					<td width='250px'>Kaufdatum</td>
					
				</tr>
				<tr>
					<td>
						<select name='sel_hersteller' size='5'>"
					      .print_data($arr_hersteller).
						"</select>		
					</td>			
					<td>
						<select name='sel_raum' size='5'>"
// 					      .print_data($arr_raum).
						."</select>		
					</td>			
					<td>
						<select name='sel_kaufdatum' size='5'>"
   					     .print_data($arr_kaufdatum).
						"</select>		
					</td>    
			</table>	
			<br><br>		
			<table border = '1' cellpadding = '0' cellspacing='4'>
				<tr>
					<td width='250px'>Gewährleistungdauer</td>
					<td width='250px'>Lieferant</td>
					<td width='250px'>Notiz</td>			
				</tr>
				<tr>						
					<td>
						<select name='sel_gewaehrdauer' size='5'>"
// 					      .print_data($arr_gewaehrdauer).
						."</select>		
					</td>			
					<td>
						<select name='sel_lieferant' size='5'>"
// 					      .print_data($arr_lieferant).
						."</select>		
					</td>			
					<td>
						<select name='sel_notiz' size='5'>"
// 					      .print_data($arr_notiz).
						."</select>		
					</td>			
				</tr>    
			</table>			
		</form>";
		
	}	/* end of create_search_mask */
	
	
	function fill_arrays() {
		global $arr_hersteller, $arr_raum, $arr_kaufdatum, 
				$arr_gewaehrdatum, $arr_lieferant, $arr_notiz;
		
		$arr_hersteller   = request_data("components_producer");
//		$arr_raum         = request_data("raum");
 		$arr_kaufdatum    = request_data("components_date");
// 		$arr_gewaehrdatum = request_data("gewaehrdatum");
// 		$arr_lieferant    = request_data("lieferant");
// 		$arr_notiz        = request_data("notiz");
	}
	
	
 	function request_data( $search_param ) {
		$arr_tmp = array();
		$arr_tmp = select_statement($search_param);
		return $arr_tmp;
 	}
 	
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
 	}

?>