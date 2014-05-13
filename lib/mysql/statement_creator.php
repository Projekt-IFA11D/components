<?php
/*
 * Statement creator for DELETE, INSERT and UPDATE
 * @author = Kilian Petsch 
 * @license = 
 * @date = 2014-05-12
 * Create sql statements
 * Expects Values to follow $Values[TABLE]=[COLUMNS => VALUES]
 * Expectes Index to contain key for WHERE condition
*/
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
      foreach ($Index as $key => $value) {
	$Statement[$Table].="$key=\"$value\" AND ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -5);
      break;

    case "Delete":
      $Statement[$Table]="DELETE FROM $Table WHERE ";
      foreach ($Index as $key => $value) {
	$Statement[$Table].="$key=\"$value\" AND ";
      }
      $Statement[$Table]=substr($Statement[$Table], 0, -5);
    }
  }
  return $Statement;
}
?>