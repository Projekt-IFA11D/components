// Handler for select statements
// kpetsch 2014-05-12

<?php

// Select select statements and return an array for further processing
function select_statement($Type, $Index) {
  
  // Placeholder data until server is running
  $Server = "PLACEHOLDER SERVER";
  $User = "PLACEHOLDER USER";
  $PW = "PLACEHOLDER PASSWORD";
  $Data = array();
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");

  // Still needs the correct select statements for each table
  $Statements=["raeume" => "SELECT * FROM raeume WHERE $Index[0]"];
  
  $Result = mysql_query($Statements["raeume"]);
  while($Data[]=mysql_fetch_assoc($Result));

  mysql_close();
  return $Data;
}

?>