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
    $Table_split=split("_", $columns, 2);
    $Table_Columns[$Table_split[0]][$Table_split[1]] = sql_quote($values);
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

  // Needs regex for the part after _
  $regex = "/^.*_/U";
  if(isset($Form_Data["delete_room"])) {
    $Index = preg_replace($regex, "", $Form_Data["delete_room"]);
    unset($Form_Data["delete_room"]);
  } else if(isset($Form_Data["edit_room"])) {
    $Index = preg_replace($regex, "", $Form_Data["edit_room"]);
    unset($Form_Data["edit_room"]);
  } else if($Type!="Insert") {
      // raise some kind of error
  } else {
      $Index = "";
  }

  $Table_Columns = read_column_names($Form_Data);
  if(!check_column_names($Table_Columns)) {
    // Raise some kind of error
  }
  
  $Statements = create_statement($Table_Columns, $Type, [$Index]);
  for($i=0;$i<$Anzahl;$i++) {
    foreach ($Statements as $Statement) {
      mysql_query($Statement);
    }
  }
}

?>
