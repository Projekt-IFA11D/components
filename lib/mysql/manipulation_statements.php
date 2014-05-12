// Handler for manipulation statements
// kpetsch 12/05/2014

<?php

function manipulation_statement($Type, $Form_Data) {

  if(isset($Form_Data["Anzahl"]) && $Form_Data["Anzahl"] > 0) {
    $Anzahl = $Form_Data["Anzahl"];
    unset($Form_Data["Anzahl"]);
  } else {
    $Anzahl = 1;
    unset($Form_Data["Anzahl"]);
  }

  $Table_Columns = read_column_names($Form_Data);
  if(!check_column_names($Table_Columns)) {
    // Raise some kind of error
  }
  
  $Statements=create_statement($Table_Columns, $Type, $Index);

  for($i=0;$i<$Anzahl;$i++) {
    foreach ($Statements as $Statement) {
      mysql_query($Statement);
    }
  }
}

?>