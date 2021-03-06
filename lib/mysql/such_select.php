<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Modulname:									 	 |*/
/*|	==========									 	 |*/
/*|	suchselect.php									 |*/
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
/*|	Modul, welches eine WHERE Bedingung ausgehend	 |*/
/*|	von suchfilter.php erstellt.					 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

/*+--------------------------------------------------+*/
/*|	INCLUDES										 |*/
/*+--------------------------------------------------+*/

	require_once "select_statement.php";
	require_once "suchfilter.php";

/*+--------------------------------------------------+*/
/*|	DEFINE VARIABLES								 |*/
/*+--------------------------------------------------+*/
	
	$where_condition = "";
	$where_condition .= get_where_condition("sel_hersteller" , "k.k_hersteller");
	$where_condition .= get_where_condition("sel_raum" , "r.r_nr");	
	$where_condition .= get_where_condition("sel_kaufdatum" , "k.k_einkaufsdatum");
	$where_condition .= get_where_condition("sel_gewaehrdauer" , "k.k_gewaehrleistungsdauer");
	$where_condition .= get_where_condition("sel_lieferant" , "l.l_firmenname");	
	$where_condition .= get_where_condition("sel_notiz" , "k.k_notiz");
	
	// DEBUG
	echo $where_condition;
	$result = array();
	mysql_select_db($DATABASE);
	
	
	// Function calls
	$result = select_statement("search_filter", $where_condition);
	//print_r($result);	
	print_result($result);	
	
	/**
	 * prints out the restults of the search
	 * @param $result   array with searched data
	 */
	function print_result($result) {
		echo "<table border = '1'>
					<tr>
						<td width='200px'>Firmenname</td>
						<td width='200px'>Raumbezeichnung</td>
						<td width='200px'>Einkaufsdatum</td>
						<td width='200px'>Gewaerhleistungsdauer</td>
						<td width='200px'>Notiz</td>
						<td width='200px'>Hersteller</td>
						<td width='200px'>Komponentenart</td>
					</tr>";
					for($i = 0; $i < count($result); $i++) {
						echo "<tr>";						
							echo "<td>".$result[$i]['l_firmenname']."</td>";
							echo "<td>".$result[$i]['r_bezeichnung']."</td>";
							echo "<td>".$result[$i]['k_einkaufsdatum']."</td>";
							echo "<td>".$result[$i]['k_gewaehrleistungsdauer']."</td>";
							echo "<td>".$result[$i]['k_notiz']."</td>";
							echo "<td>".$result[$i]['k_hersteller']."</td>";
							echo "<td>".$result[$i]['ka_komponentenart']."</td>";
						
						echo "</tr>";
					}
				echo "</table>";
	} /** end of print_result */
	
	
	/**
	 * function creates WHERE conditions
	 * @param  $select_param   name of the multiple select
	 * @param  $name           name of the attribute in the table
	 * @return string          WHERE condition
	 */
	function get_where_condition($select_param, $name) {
		global $where_condition, $b_valid;
		$b_valid = false;
		// Delte last added 'AND' if POST is empty
		if (empty($_POST[$select_param])) {
			echo "aufruf: ".$select_param."<br>";
			$check = substr( $where_condition, strlen($where_condition)-4, strlen($where_condition) );
			echo "check : ".$check."<br>";
			if ($check == "AND ") {
				$where_condition = substr ( $where_condition , 0, strlen($where_condition)-4 );
				echo "where bearbeitet: ".$where_condition."<br>";
			}			
 			return "";
		}
		
		// ignore 'AND' at the first time
		if ($where_condition != "") {
			$where_condition .= " AND ";
		}
		
		$where_query = " ( ";		
		$first = true;		
		
		foreach($_POST[$select_param] AS $current) {
			echo "Current: ".$current."<br>";
			if($current != "" AND $current != "-") {
				if(!$first) {
					$where_query .= " OR ";
				} else {
					$first = false;
				}
		
				$where_query .= $name." = '".mysql_real_escape_string($current)."' ";
			}
		}		
		$where_query .= " ) ";

		echo "WHERE:".$where_query."PARAM: ".$select_param."<br><br>";

		return $where_query;
	} /** end of get_where_condition */

?>