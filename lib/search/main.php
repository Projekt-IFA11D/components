
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
        <form> 
        <div class='container'>
            <div class='row'>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Hersteller</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_hersteller[]' size='5' >"
					      .print_data($arr_hersteller)."
						</select>		
                        </ul>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Raum</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_raum[]' size='5' >"
					      .print_data($arr_raum)."
						</select>		
                        </ul>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Kaufdatum</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_kaufdatum[]' size='5' >"
					      .print_data($arr_kaufdatum)."
						</select>		
                        </ul>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Gew&auml;hrleistung</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_gewaehrdauer[]' size='5' >"
					      .print_data($arr_gewaehrdauer)."
						</select>		
                        </ul>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Lieferant</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_lieferant[]' size='5' >"
					      .print_data($arr_lieferant)."
						</select>		
                        </ul>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <h3 class='panel-title'>Notiz</h3>
                        </div>
                        <ul class='list-group'>
						<select multiple class='form-control' name='sel_notiz[]' size='5' >"
					      .print_data($arr_notiz)."
						</select>		
                        </ul>
                    </div>
                </div>
            </div>
			<button onclick='search_submit($(this))' class='btn btn-primary'></button>
			<input class='btn btn-danger' type='reset' Name = 'loeschen' VALUE = 'L&ouml;schen'>			
        </div>
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
