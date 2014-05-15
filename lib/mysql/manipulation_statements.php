<?php
/* 
 * Handler for manipulation statements
 * @author = Kilian Petsch
 * @date = 2014-05-12
*/

// Split the form names into their respective tables and columns
function read_column_names($Data) {
  
  $Table_Columns = array();
  foreach ($Data as $columns => $values) {
    $Table_split=split("-", $columns, 2);
    $Table_Columns[$Table_split[0]][$Table_split[1]] = sql_quote($values);
  }
  return $Table_Columns;
}

// Check if all columns of the form data exist in the database
function check_column_names($Data) {
  
  $Diffs = array();
  foreach ($Data as $table => $columns) {
    $real_cols_q=mysql_query("show columns from $table");
    while($tmp=mysql_fetch_row($real_cols_q)) {
      $real_cols[]=$tmp[0];
    }
    $Diffs[$table] = array_diff(array_keys($columns), $real_cols);
  }
  if ($Diffs == "") {
    return 0;
  } else {
    return $Diffs;
  }
}

// Build a data manipulation statement from the form data
function manipulation_statement($Type, $Form_Data) {

  // Unsetting the timestamp as we don't need it here
  if(isset($Form_Data["_"])) {
    unset($Form_Data["_"]);
  }
  if(isset($Form_Data["Anzahl"]) && $Form_Data["Anzahl"] > 0) {
    $Anzahl = $Form_Data["Anzahl"];
    unset($Form_Data["Anzahl"]);
  } else {
    $Anzahl = 1;
    unset($Form_Data["Anzahl"]);
  }

  $table_key = preg_grep("/^[delete_|edit_].*/U", array_keys($Form_Data));
  if(!empty($table_key)) {
    $Index = preg_replace("/^.*-/U", "", $Form_Data[$table_key[0]]);

    // We need a dummy element in the array for the extraction of the table name
    if($Type=="Delete") {
      $Form_Data[preg_replace("/=.*$/U", "", $Form_Data[$table_key[0]])] = 1;
    }
    unset($Form_Data[$table_key[0]]);
  } else if($Type!="Insert") {
      // raise some kind of error
  } else {
    // Ignore this line
    $Form_Data[preg_replace("/=.*$/U", "", $Form_Data[preg_grep("/^[add_].*/U", array_keys($Form_Data))[0]])] = preg_replace("/^.*=/U", "", $Form_Data[preg_grep("/^[add_].*/U", array_keys($Form_Data))[0]]);
    unset($Form_Data[preg_grep("/^[add_].*/U", array_keys($Form_Data))[0]]);
      $Index = "";
  }

  $Table_Columns = read_column_names($Form_Data);
  
  $Statements = create_statement($Table_Columns, $Type, [$Index]);
  for($i=0;$i<$Anzahl;$i++) {
    foreach ($Statements as $Statement) {
      mysql_query($Statement);
    }
  }
}

function complex_manipulation_statement($Index, $Form_Data) {

  // Array of statements
  $Statements = ["A" => "B"];
  mysql_query($Statements[$Index]);

}

function not_really_delete($Form_Data) {
  $Index = $Form_Data[preg_grep("/^[delete_|edit_].*/U", array_keys($Form_Data));
  mysql_query("UPDATE komponenten SET raeume_r_id=8 WHERE $Index");
}

?>
