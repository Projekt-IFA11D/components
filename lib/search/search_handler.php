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
/*|	DEFINE VARIABLES								 |*/
/*+--------------------------------------------------+*/

   // var_dump($_GET);
	
	$where_condition = "";
	$where_condition .= get_where_condition("sel_hersteller" , "k.k_hersteller");
	$where_condition .= get_where_condition("sel_raum" , "r.r_nr");	
	$where_condition .= get_where_condition("sel_kaufdatum" , "k.k_einkaufsdatum");
	$where_condition .= get_where_condition("sel_gewaehrdauer" , "k.k_gewaehrleistungsdauer");
	$where_condition .= get_where_condition("sel_lieferant" , "l.l_firmenname");	
	$where_condition .= get_where_condition("sel_notiz" , "k.k_notiz");
	
	// DEBUG
	//echo "where:".$where_condition;
	$result = array();
	
	
	// Function calls
	$result = select_statement("search_filter", $where_condition);
	//print_r(select_statement("search_filter", $where_condition));
	//print_r($result);	
	print_result($result);	

	/**
	 * prints out the restults of the search
	 * @param $result   array with searched data
	 */
    function print_result($result) { ?>
        <h1 class="page-header">Suchergebnis</h1>
        <div class="table-responsive">
                <table class="table table-striped" id="search_result_table">
                    <th>Firmenname</th>
                    <th>Raumbezeichnung</th>
                    <th>Einkaufsdatum</th>
                    <th>Gew&auml;hrleistungsdauer (Jahre)</th>
                    <th>Notiz</th>
                    <th>Hersteller</th>
                    <th>Komponentenart</th>
                    <th></th>
                    <th></th>
                    <th></th>
<?php
             
                for($i = 0; $i < count($result); $i++) 
                {
                
				    echo "<tr>";						
						echo "<td>".$result[$i]['l_firmenname']."</td>";
						echo "<td>".$result[$i]['r_bezeichnung']."</td>";
						echo "<td>".$result[$i]['k_einkaufsdatum']."</td>";
						echo "<td>".$result[$i]['k_gewaehrleistungsdauer']."</td>";
						echo "<td>".$result[$i]['k_notiz']."</td>";
						echo "<td>".$result[$i]['k_hersteller']."</td>";
                        echo "<td>".$result[$i]['ka_komponentenart']."</td>";
?>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs"
							onclick="<?php echo('edit_components($(this), '.$result[$i]['k_id'].')'); ?>">Details</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".move_component_modal">Verschieben</button>
						</td>
						<td class="col-md-1">
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".delete_component_modal"
							onclick="<?php echo('delete_components('.$result[$i]['k_id'].')'); ?>">L&ouml;schen</button>
						</td>
<?php					
                        echo "</tr>";
                }
                    /** end of print_result */
        }?>
  </table>
</div>
	
<?php	
	/**
	 * function creates WHERE conditions
	 * @param  $select_param   name of the multiple select
	 * @param  $name           name of the attribute in the table
	 * @return string          WHERE condition
	 */
	function get_where_condition($select_param, $name) {
       // echo("<br><br>START:");
        // echo("<br><br>EDNE");
		global $where_condition;
		// Delete last added 'AND' if POST is empty
		if (empty($_GET[$select_param])) {
			$check = substr( $where_condition, strlen($where_condition)-4, strlen($where_condition) );
			if ($check == "AND ") {
				$where_condition = substr ( $where_condition , 0, strlen($where_condition)-4 );
		//		echo "where bearbeitet: ".$where_condition."<br>";
			}			
 			return "";
		}
		
		// ignore 'AND' at the first time
		if ($where_condition != "") {
			$where_condition .= " AND ";
		}
		
		$where_query = " ( ";		
		$first = true;		
		
		foreach($_GET[$select_param] AS $current) {
	    //	echo "Current: ".$current."<br>";
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

		//echo "WHERE:".$where_query."PARAM: ".$select_param."<br><br>";

		return $where_query;
	} /** end of get_where_condition */

?>
