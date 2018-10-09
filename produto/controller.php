<?php

	// as 4 variaveis estavam no index mas devem ser colocadas no controller para acessar o bd
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "query1";

	$conexao = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	// vai verificar primeiro se conectou
	if (mysqli_connect_errno($conexao)){
		echo "A conexão falhou".mysqli_connect_error();
		exit();
	}
	// solicitação para usar o sql
	require('model.php');

	if(isset($_GET['p'])){
		$passo = $_GET['p'];
	} else {
		$passo = null;
	}

	switch($passo){
		case "incluir":
			produtoIncluir($conexao);
			break;
		case "listar":
			$dados = listarDados($conexao);
			require("view_mostrar.php");
			break;
		case "excluir":
			$retornoExc = excluirProduto($conexao);
			$dados = listarDados($conexao);
			require("view_mostrar.php");
			break;
		case "nome":
			$dados =  listaNome($conexao);
			require("view_mostrar.php");
			break;
		case "quantidade":
			$dados =  listaQuantidade($conexao);
			require("view_mostrar.php");
			break;
		case "validade":
			$dados =  listaValidade($conexao);
			require("view_mostrar.php");
			break;
		default:
			$dados = listarDados($conexao);
			require("view_mostrar.php");
			break;
	}

	function listarDados($conexao){
		$resultado = produto_mostrar($conexao);
		$data = array();
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'],"produto"=> $row['produto'],"quantidade" => $row['quantidade'],"validade"=> $row['validade']);
		}
		return $data;
	}
	function listaNome($conexao){
		$resultado = organizar_nome($conexao);
		$data = array();
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'],"produto"=> $row['produto'],"quantidade" => $row['quantidade'],"validade"=> $row['validade']);
		}
		return $data;
	}
	function listaQuantidade($conexao){
		$resultado = organizar_quantidade($conexao);
		$data = array();
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'],"produto"=> $row['produto'],"quantidade" => $row['quantidade'],"validade"=> $row['validade']);
		}
		return $data;
	}

	function listaValidade($conexao){
		$resultado = organizar_validade($conexao);
		$data = array();
		while($row = mysqli_fetch_array($resultado)){
			$data[] = array("id" => $row['id'],"produto"=> $row['produto'],"quantidade" => $row['quantidade'],"validade"=> $row['validade']);
		}
		return $data;
	}

	function produtoIncluir($conexao) {
		// verificar se o formulario foi postado
		if(isset($_POST['cadastro'])){
			// caso não entre no programa
			$produto = $_POST['txtProduto'];
			$quantidade = $_POST['txtQuantidade'];
			$validade = $_POST['txtValidade'];
			if(produto_incluir($conexao,$produto,$quantidade,$validade)){
				$retornoExc = "Produto incluido com sucesso!!!";
				$dados = listarDados($conexao);
				require("view_mostrar.php");
			} else {
				$retornoExc = "A operação falhou. Tente novamente.";
				require("view_incluir.php");
			}

		} else {
			// se não entrar vai mostrar essa view
			require("view_incluir.php");
		} 
	}

	function excluirProduto($conexao){
		$id_produto = (isset($_GET['codigo'])) ? $_GET['codigo'] : null;
		$resultado = produto_excluir($conexao,$id_produto);
		if($resultado){
			return "Exclusão efetuda com sucesso!";
		} else{
			return "";
		}
	}

	mysqli_close($conexao);