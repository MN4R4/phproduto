<?php
	// dados para a conexão
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "query1";
	
	// vamos receber uma variavel chamada r que significa rota
	$r = $_GET['r'];
	require_once($r."/index.php");