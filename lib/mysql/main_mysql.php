<?php
	mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD);
	mysql_select_db(MYSQL_DATABASE);

	require_once("statement_creator.php");
	require_once("quote-sql.php");
	require_once("manipulation_statements.php");
	require_once("select_statement.php");
?>
