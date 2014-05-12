// Handler for select statements
// kpetsch 12/05/2014

<?php

function select_statement($Type, $Index) {
  
  $Server = "localhost";
  $User = "root";
  $PW = "1234";
  $Data = array();
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");

  $Statements=["raeume" => "SELECT * FROM raeume WHERE $Index[0]"];
  
  $Result = mysql_query($Statements["raeume"]);
  while($Data[]=mysql_fetch_assoc($Result));

  mysql_close();
  return $Data;
}

?>