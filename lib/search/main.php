<?php
    $arr_hersteller   = array();	
	$arr_raum         = array();
	$arr_kaufdatum    = array();
	$arr_gewaehrdauer = array();
	$arr_lieferant    = array();
	$arr_notiz        = array();	
    
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
 	function print_data2($array_name) {
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

    function print_data($name)
    {
        switch ($name)
        {
            case "hersteller":
                $data = select_statement("components_producer");
                break;
            case "raum":
                $data = select_statement("room_name");
                break;
            case "kaufdatum":
                $data = select_statement("components_date");
                break;
            case "gewaehrdauer":
                $data = select_statement("components_guarantee");
                break;
            case "lieferant":
                $data =  select_statement("suppliers_name");
                break;
            case "notiz":
                $data = select_statement("components_note");
                break;
        }
 		foreach($data AS $index=>$val) {
 			if(is_array($val)) {
 				foreach($val AS $subIndex=>$subVal) {
 					echo("<option>".$subVal."</option>");
 				}
 			} else {
 				echo("<option>".$val."</option>");
 			}
 		}
    }
    
	fill_arrays();
?>


<h1 class="page-header">Suchfilter</h1>
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
					        <?php print_data("hersteller") ?>
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
                            <?php print_data("raum") ?>
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
					        <?php print_data("kaufdatum") ?>
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
					        <?php print_data("gewaehrdauer") ?>
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
					        <?php print_data("lieferant") ?>
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
                            <?php print_data("notiz") ?>
                        </select>		
                    </ul>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary"  onclick="search_submit($(this))">Hinzu&uuml;en</button>
        <input class='btn btn-danger' type='reset' Name = 'loeschen' VALUE = 'L&ouml;schen'>			
    </div>
</form>
