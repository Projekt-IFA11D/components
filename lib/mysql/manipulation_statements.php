// Handler for manipulation statements
// kpetsch 12/05/2014

<?php include "statement_creator.php"?>
<?php
// Split the form names into their respective tables and columns
function read_column_names($Data) {
  
  $Table_Columns = array();
  foreach ($Data as $columns => $values) {
    $Table_split=split("_", $columns, 2);
    $Table_Columns[$Table_split[0]][$Table_split[1]] = $values;
  }
  return $Table_Columns;
}

// Check if all columns of the form data exist in the database
function check_column_names($Data) {
  
  foreach ($Data as $table => $columns) {
    $real_cols_q=mysql_query("show columns from $table");
    while($tmp=mysql_fetch_row($real_cols_q)) {
      $real_cols[]=$tmp[0];
    }
    if(array_diff(array_keys($columns), $real_cols)) {
      return false;
    } else {
      return true;
    }
  }
}

function manipulation_statement($Type, $Form_Data) {

  $Server="localhost";
  $User="root";
  $PW="1234";
  mysql_connect($Server, $User, $PW);
  mysql_select_db("itv_v1");
  if(isset($Form_Data["Anzahl"]) && $Form_Data["Anzahl"] > 0) {
    $Anzahl = $Form_Data["Anzahl"];
    unset($Form_Data["Anzahl"]);
  } else {
    $Anzahl = 1;
    unset($Form_Data["Anzahl"]);
  }

  if(isset($Form_Data["Index"])) {
    $Index = $Form_Data["Index"];
    unset($Form_Data["Index"]);
  } else if($Type!="Insert") {
      // raise some kind of error
  } else {
      $Index = "";
  }

  $Table_Columns = read_column_names($Form_Data);
  if(!check_column_names($Table_Columns)) {
    // Raise some kind of error
  }
  
  $Statements=create_statement($Table_Columns, $Type, $Index);
  for($i=0;$i<$Anzahl;$i++) {
    foreach ($Statements as $Statement) {
      print $Statement;
      mysql_query($Statement);
    }
  }
  mysql_close();
}

?>