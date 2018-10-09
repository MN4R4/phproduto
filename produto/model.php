<?php
	// o model sera utilizado para guardar as funções do sql
	function produto_mostrar($conexao){
		$sql = "SELECT * FROM produto";
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	function organizar_nome($conexao){
		$sql = "SELECT * FROM produto ORDER BY produto";
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	function organizar_quantidade($conexao){
		$sql = "SELECT * FROM produto ORDER BY quantidade";
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	function organizar_validade($conexao){
		$sql = "SELECT * FROM produto ORDER BY validade";
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	// a validação dos dados será realizada no model ( vai verificar se os dados colocados estão corretos)
	// o NULL na função deve ser colocado dentro de aspas simples
	function produto_incluir($conexao,$produto,$quantidade,$validade){
		if($produto == ""){
			return false;
		} else if ($quantidade ==""){
			$quantidade = NULL;
		} else if ($validade ==""){
			$validade = NULL;
		} else {
			$sql = sprintf("INSERT INTO produto(produto,quantidade,validade) VALUES ('%s',%s,%s)", $produto, $quantidade,$validade);
			// vai mostrar o erro de conexão do resultado - or die (mysql_error())
			$resultado = mysqli_query($conexao,$sql);
			return $resultado;
		}
	}

	function produto_excluir($conexao,$id_produto){
		$sql = sprintf("DELETE FROM produto WHERE id = %s",$id_produto);
		$resultado = mysqli_query($conexao,$sql);
		return $resultado;
	}

	
	