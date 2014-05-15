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

function complex_manipulation_statement($Form_Data) {

  $Table_Columns = read_column_names($Form_Data);
  $Type = preg_grep("/^[add_].*/U", array_keys($Form_Data));
  $First_Column = $Table_Columns[$Type[0]];
  $First_Column_Name = preg_replace("/^.*-/U", "", preg_replace("/=.*$/U", "", $First_Column));
  $First_Column_Value = preg_replace("/^.*=/U", "", $First_Column);
  $Table_Columns["lieferant"][$First_Column_Name[""]] = $First_Column_Value[""];
  unset($Table_Columns[$Type[0]]);
  unset($Table_Columns["_"]);

  switch ($Type[0]) {
  case "edit_supplier":
    $Statement = manip_edit_supplier($Table_Columns);
    break;
  case "add_supplier":
    $Statement = manip_add_supplier($Table_Columns);
    break;
  case "edit_component":
    $Statement = manip_edit_component($Table_Columns);
        break;
  case "add_component":
    $Statement = manip_add_component($Table_Columns);
  }
  mysql_query($Statement);
}

function manip_add_supplier($Data) {
  
  $Plz_Data = $Data["plz_zuordnung"];
  $Supp_Data = $Data["lieferant"];
  $Plz_Id_Result = mysql_query("SELECT plz_id FROM plz_zuordnung WHERE plz_plz='".$Plz_Data["plz_plz"]."' AND plz_ort='".$Plz_Data["plz_ort"]."'");
  $Plz_Id = mysql_fetch_row($Plz_Id_Result);
  $Supp_Data["l_plz_id"] = $Plz_Id[0];
  $Keys = implode(', ', array_keys($Supp_Data));
  $Statement = "INSERT INTO lieferant($Keys) VALUES(";
  foreach (array_values($Supp_Data) as $val) {
    $Statement.="'".$val."', ";
  }
  $Statement = substr($Statement, 0, -2);
  $Statement.=")";
  return $Statement;

  
}

function not_really_delete($Form_Data) {
  $Room_Result = mysql_query("SELECT r_id FROM raeume WHERE r_nr=\"deleted\"");
  $Room = mysql_fetch_row($Room_Result);
  $Index = $Form_Data["delete_component"];
  $Index = preg_replace("/^.*-/U", "", $Index);
  mysql_query("UPDATE komponenten SET raeume_r_id='".$Room[0]."' WHERE $Index");
}

?>
