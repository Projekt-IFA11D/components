<?php
/*
  Modulname:
  ==========
  manipulation_statements.php

  Version:
  ========
  1.0

  Autor:
  ======
  Kilian Petsch

  Beschreibung:
  ============
  Handler for manipulation statements
*/

// Split the form names into their respective tables and columns
error_reporting(0);
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

// Function to create manipulation statements for tables which have attribution tables
function complex_manipulation_statement($Form_Data) {

  $Table_Columns = read_column_names($Form_Data);
  $Type = preg_grep("/^[add_|edit_].*/U", array_keys($Form_Data));
  $First_Column = $Table_Columns[$Type[0]];
  
  // The first column is not in the same array as the rest of them,
  // so we need to move it
  $First_Column_Name = preg_replace("/^.*-/U", "", preg_replace("/=.*$/U", "", $First_Column));
  $First_Column_Value = preg_replace("/^.*=/U", "", $First_Column);
  $Table_Columns["lieferant"][$First_Column_Name[""]] = $First_Column_Value[""];
  // Remove unneccessary arrays from the form data
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

// Move components to a different room
function manip_edit_component($Data) {

  $Table_Columns = read_column_names($Data);  

  $Type = preg_grep("/^[add_|edit_].*/U", array_keys($Data));
  $First_Column = $Table_Columns[$Type[0]];
  
  // The first column is not in the same array as the rest of them,
  // so we need to move it
  $First_Column_Name = preg_replace("/^.*-/U", "", preg_replace("/=.*$/U", "", $First_Column));
  $First_Column_Value = preg_replace("/^.*=/U", "", $First_Column);
  $Table_Columns["komponenten"][$First_Column_Name[""]] = $First_Column_Value[""];
  // Remove unneccessary arrays from the form data
  unset($Table_Columns[$Type[0]]);
  unset($Table_Columns["_"]);

  $k_Data = $Table_Columns["komponenten"];
  $Statement="UPDATE komponenten LEFT JOIN komponente_hat_komponente ON komponenten.k_id=komponente_hat_komponente.komponenten_k_id_teil SET komponenten.raeume_r_id=".$k_Data["raeume_r_id"]." WHERE k_id=".$K_Data["k_id"]." or komponente_hat_komponente.komponenten_k_id_aggregat=".$K_Data["k_id"];
  //$Statement = "UPDATE komponenten SET raeume_r_id=".$k_Data["raeume_r_id"]." WHERE k_id=".$K_Data["k_id"];
  
}

// Create an update statement for suppliers
function manip_edit_supplier($Data) {

  $Supp_Data = $Data["lieferant"];
  $Supp_Data["l_plz_id"] = extract_plz_suppliers($Data);

  $Condition = $Supp_Data["l_id"];
  unset($Supp_Data["l_id"]);

  $Statement = "UPDATE lieferant SET ";
  foreach ($Supp_Data as $key => $value) {
    $Statement.=$key."=\"".$value."\", ";
  }
  $Statement = substr($Statement, 0, -2);
  $Statement.=" WHERE l_id=".$Condition;
  return $Statement;
  
}

// Create an insert statement for suppliers
function manip_add_supplier($Data) {

  $Supp_Data = $Data["lieferant"];
  $Supp_Data["l_plz_id"] = extract_plz_suppliers($Data);

  $Keys = implode(', ', array_keys($Supp_Data));
  $Statement = "INSERT INTO lieferant($Keys) VALUES(";
  foreach (array_values($Supp_Data) as $val) {
    $Statement.="'".$val."', ";
  }
  $Statement = substr($Statement, 0, -2);
  $Statement.=")";
  return $Statement;

  
}

// function to extract the plz_id from the attribution table so we can fill all columns in lieferant
function extract_plz_suppliers($Data) {

  $Plz_Data = $Data["plz_zuordnung"];
  $Plz_Id_Result = mysql_query("SELECT plz_id FROM plz_zuordnung WHERE plz_plz='".$Plz_Data["plz_plz"]."' AND plz_ort='".$Plz_Data["plz_ort"]."'");
  $Plz_Id = mysql_fetch_row($Plz_Id_Result);
  return $Plz_Id[0];

}

// "Delete" function for components
function not_really_delete($Form_Data, $Is_Sub = 0) {

  $Room_Result = mysql_query("SELECT r_id FROM raeume WHERE r_nr=\"deleted\"");
  $Room = mysql_fetch_row($Room_Result);
  $Index = $Form_Data["delete_component"];
  $Index = preg_replace("/^.*-/U", "", $Index);
  mysql_query("UPDATE komponenten SET raeume_r_id='".$Room[0]."' WHERE $Index");

  // Subcomponents should lose their reference
  if($Is_Sub==1) {
    mysql_query("DELETE From komponente_hat_komponente WHERE komponenten_k_id_teil=".$Index);
  }
}

?>
