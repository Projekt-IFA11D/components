// Handler for select statements
// kpetsch 12/05/2014

<?php

function select_statement($Type, $Index) {
  
  $Server="localhost";
  $User="root";
  $PW="1234";
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");

  $Statements=["raeume" => "SELECT * FROM raeume"];

  $Result=mysql_query($Statements);
  while($tmp=mysql_fetch_row($Result)) {
    $Data[]=$tmp;
  }

  mysql_close();
  return $Data;
}


?>