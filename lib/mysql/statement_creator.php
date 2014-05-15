<?php
/*

  Modulname:
  ==========
  statement_creator.php

  Version:
  ========
  1.0

  Autor:
  ======
  Kilian Petsch

  Beschreibung:
  =============
  Statement creator for DELETE, INSERT and UPDATE
*/

// Build an SQL statement for data manipulation
function create_statement($Values, $Type, $Index) {

  foreach ($Values as $Table => $Columns) {
    switch ($Type) {
    case "Insert":
      $keys=array_keys($Columns);
      $values=array_values($Columns);
      
      $Statement[$Table]="INSERT INTO $Table (";
      foreach ($keys as $key) {
	$Statement[$Table].="$key, ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -2);
      $Statement[$Table].=") VALUES(";
      foreach ($values as $value) {
	$Statement[$Table].="\"$value\", ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -2);
      $Statement[$Table].=")";
      break;
      
    case "Update":
      $Statement[$Table]="UPDATE $Table SET ";
      foreach ($Columns as $key => $value) {
	$Statement[$Table].="$key=\"$value\", ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -2);
      $Statement[$Table].=" WHERE ";
      foreach ($Index as $value) {
	$Statement[$Table].="$value AND ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -5);
      break;

    case "Delete":
      $Statement[$Table]="DELETE FROM $Table WHERE ";
      foreach ($Index as $value) {
	$Statement[$Table].="$value AND ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -5);
      break;
    }
  }
  return $Statement;
}
?>