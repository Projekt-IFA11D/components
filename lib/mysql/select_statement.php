<?php
/* 
 * Handler for select statements
 * @author = Kilian Petsch
 * @license = 
 * @date = 2014-05-12
 * Select select statements and return an array for further processing
*/

// Index is the limiting condition if applicable
function select_statement($Table, $Index = 0) {
  
  $Data = array();

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach ($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }
  // Still needs the correct select statements for each table
  $Statements=["rooms" => "SELECT r_nr, r_bezeichnung, r_notiz FROM raeume",
			   "suppliers" => "SELECT L.l_firmenname, L.l_strasse, L.l_tel, L.l_mobil, L.l_fax, L.l_email, plz.PLZ, plz.Ort FROM lieferant AS L 
INNER JOIN plz_zurodnung AS plz ON (L.l_plz_id=plz.ID)"];
  
  $Result = mysql_query($Statements[$Table]);
  while($Data[]=mysql_fetch_assoc($Result));
  // Need to delete last element of the array as fetch_assoc writes its failure into the array
  array_pop($Data);

  mysql_close();
  return $Data;
}

?>
