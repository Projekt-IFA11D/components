<?php
/*
  Modulname:
  ==========
  quote-sql.php

  Version:
  ========
  1.0

  Autor:
  ======
  Kilian Petsch

  Beschreibung:
  =============
  Quote parameters which go into sql statements for safety reasons
*/

// Function to close quotes/braces etc. in variables which go into sql statements
function sql_quote($SQL) {

  return mysql_real_escape_string($SQL);
}

?>