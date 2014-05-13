<?php
/*
 * Quote parameters which go into sql statements for safety reasons
 * @author = Kilian Petsch
 * @license = 
 * @date = 2014-05-12
 * Function to close quotes/braces etc. in variables which go into sql statements
*/
function sql_quote($SQL) {

  return mysql_real_escape_string($SQL);
}

?>