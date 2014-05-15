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
  /* DOES NOT WORK
    if(!check_column_names($Table_Columns)) {
    // Raise some kind of error
    } */
  
  $Statements = create_statement($Table_Columns, $Type, [$Index]);
  for($i=0;$i<$Anzahl;$i++) {
    foreach ($Statements as $Statement) {
      mysql_query($Statement);
    }
  }
}

/* DOES NOT WORK WRITE A HARDCODED FUNCTION
function find_attribution_table($Data) {
  
  $Columns = array();
  $Attr_Tables = array();
  foreach (array_keys($Data) as $Table) {
    $SQL = "SELECT
    `column_name`, 
    `referenced_table_schema` AS foreign_db, 
    `referenced_table_name` AS foreign_table, 
    `referenced_column_name`  AS foreign_column 
FROM
    `information_schema`.`KEY_COLUMN_USAGE`
WHERE
    `constraint_schema` = SCHEMA()
AND
    `table_name` = $Table
AND
    `referenced_column_name` IS NOT NULL
ORDER BY
    `column_name`";
    if(mysql_query($SQL)=="") {
      $Attr_Tables[] = $Table;
    }
  }
  return $Attr_Tables;
}


function attribution_manipulation_statement($Type, $Form_Data) {

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
  
  $Table_Columns = read_column_names($Form_Data);
  $Missing_Vals = check_column_names($Table_Columns);

  $Attr_Tables = find_attribution_table($Table_Columns);
  $Attr_Values = array();
  mysql_query("SELECT $Missing_Vals FROM $Attr_Tables WHERE ")
    
  }
  
  } */

function not_really_delete($Index) {
  mysql_query("UPDATE komponenten SET raeume_r_id=8 WHERE $Index");
}

?>
