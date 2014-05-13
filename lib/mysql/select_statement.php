// Handler for select statements
// kpetsch 2014-05-12

<?php include "quote-sql.php"?>
<?php

// Select select statements and return an array for further processing
// Index is the limiting condition if applicable
function select_statement($Table, $Index) {
  
  // Placeholder data until server is running
  $Server = "PLACEHOLDER";
  $User = "PLACEHOLDER";
  $PW = "PLACEHOLDER";
  $Data = array();
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");

  // Escape all special characters inside the string
  if($Index!=0) {
    $safe_Index = array();
    foreach ($Index as $unsafe_index) {
      $safe_Index[] = sql_quote($unsafe_index);
    }
  }
  // Still needs the correct select statements for each table
  $Statements=["raeume" => "SELECT r_nr, r_bezeichnung, r_notiz FROM raeume"];
  
  $Result = mysql_query($Statements[$Table]);
  while($Data[]=mysql_fetch_assoc($Result));
  // Need to delete last element of the array as fetch_assoc writes its failure into the array
  array_pop($Data);

  mysql_close();
  return $Data;
}

var_dump(select_statement("raeume", [""=>""]));
?>