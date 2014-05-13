<?php
/* 
 * Handler for select statements
 * @author = Kilian Petsch
 * @date = 2014-05-12

*/

// Select select statements and return an array for further processing
// Index is the limiting condition if applicable
function select_statement($Table, $Index = 0) {
  
  $Data = array();

  // Still needs the correct select statements for each table
  $Statements=["rooms" => "SELECT r_nr, r_bezeichnung, r_notiz FROM raeume",
			   "suppliers" => "SELECT L.l_firmenname, L.l_strasse, L.l_tel, L.l_mobil, L.l_fax, L.l_email, plz.PLZ, plz.Ort FROM lieferant AS L 
INNER JOIN plz_zurodnung AS plz ON (L.l_plz_id=plz.ID)"];

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach ($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }

  $Result = mysql_query($Statements[$Table]);
  while($Data[]=mysql_fetch_assoc($Result));
  // Need to delete last element of the array as fetch_assoc writes its failure into the array
  array_pop($Data);

  mysql_close();
  return nice_empty_values($Data);
}

// Handle multiple select statements which need to be returned in a single array
function complex_select_statement($Table, $Index = 0) {

  $Data = array();
  $Sub_Data = array();
  // Still needs the correct select statements for each table
  $Statements = ["components" => ["SELECT PLACEHOLDER FROM PLACEHOLDER", "SELECT PLACEHOLDER FROM PLACEHOLDER WHERE $Index"]];

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }

  $Result = mysql_query($Statements[$Table[0]]);
  while($Data[] = mysql_fetch_assoc($Result));
  array_pop($Data);
  
  foreach ($Data as $piece) {
    $Sub_Result = mysql_query($Statements[$Table[1]]);
    while($Sub_Data[] = mysql_fetch_assoc($Result));
    array_pop($Sub_Data);
    $piece[$Table] = $Sub_Data;
  }

  mysql_close();
  return nice_empty_values($Data);
  
}

// Replace NULL values with visual empty signs
function nice_empty_values($Data) {
  
  foreach ($Data as $arr_Data) {
    foreach ($arr_Data as $key => $raw_Data) {
      if($raw_Data==NULL && !is_array($raw_Data)) {
	$tmp[$key]="-";
      } else {
	$tmp[$key]=$raw_Data;
      }
    }
    $nice_Data[]=$tmp;
    unset($tmp);
  }

  return $nice_Data;
}
?>
