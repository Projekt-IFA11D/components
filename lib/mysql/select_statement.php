// Handler for select statements
// kpetsch 2014-05-12

<?php include "quote-sql.php"?>
<?php

// Select select statements and return an array for further processing
// Index is the limiting condition if applicable
function select_statement($Table, $Index) {
  
  // Placeholder data until server is running
  $Server = "PLACEHOLDER SERVER";
  $User = "PLACEHOLDER USER";
  $PW = "PLACEHOLDER PASSWORD";
  $Data = array();
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");
  
  // Escape all special characters inside the string
  $safe_Index = array();
  foreach ($Index as $unsafe_index) {
    $safe_Index[] = sql_quote($unsafe_index);
  }
  // Still needs the correct select statements for each table
  $Statements=["raeume" => "SELECT r_nr AS 'Raum Nr', r_bezeichnung AS Art, r_notiz AS Notiz FROM raeume"];
  
  $Result = mysql_query($Statements[$Table]);
  while($Data[]=mysql_fetch_assoc($Result));

  mysql_close();
  return $Data;
}

print_r(select_statement("raeume", [""=>""]));
?>