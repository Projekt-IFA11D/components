
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
/*| bootstrap by Matthias Grießmeier                 |*/
/*|													 |*/
/*| Beschreibung:									 |*/
/*|	=============									 |*/
/*|	Modul, um einzelne Komponenten herauszufiltern.	 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

/*+--------------------------------------------------+*/
/*|	DEFINE VARIABLES								 |*/
/*+--------------------------------------------------+*/

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
		<h1> Suchfilter </h1><br><br><br>		
        <form action='such_select.php' method='post'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Hersteller</h3>
                        </div>
                        <ul class='list-group'>";
                        foreach($arr_hersteller as $h) {
                            echo "<a href='#' class='list-group-item'>".print_data($h)."</a>"; 
                        }
        echo "          </ul>
                    </div>
                </div>
            </div>
        </div>

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
					<td width='200px'>Gewährleistungdauer</td>
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
			</table>
			<input type = 'Submit' Name = 'submit' VALUE = 'Submit'>			
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
	
	
	
// 	/**
// 	 * function calls select_statement, which executes the select command
// 	 * 
// 	 * @param  $search_param   string with the data that should be 'selected'
// 	 * @return $arr_tmp        array containing the data
// 	 */
//  	function request_data( $search_param ) {
// 		$arr_tmp = array();
// 		$arr_tmp = select_statement($search_param);
// 		return $arr_tmp;
//  	} /** end of request_data */
 	
 	
 	
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
