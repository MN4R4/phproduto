<?php
	// atribui uma variavel para verificar atraves da funcao se conectou utilizando os parametros do index;
	// quando vc coloca o @na frente da função de erro ele mostrara o erro que poderá ser pesquisado no html sem 
	// sem mostrar o erro que mostra no servidor
	
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "query1";

	$conexao = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);

	if(mysqli_connect_errno($conexao)){
		$resultado = "A conexão falhou".mysqli_connect_error();
	} else {
		$resultado = "Conexão bem sucedida!";
	}

	@mysqli_close($conexao);
	