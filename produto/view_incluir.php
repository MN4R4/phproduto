<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pagina Principal</title>
		<meta charset="utf-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="main.js"></script>
		<link rel="stylesheet" href="../css/style.css">
		<!-- A pasta de referencia para o css estara localizada no principal o caminho deve ser incluido -->
	</head>
	<body>
		<header>
			<h1>Inclusao de Produtos na Tabela</h1>
		</header>

		<?php if(isset($retornoExc)) { ?>
			<h1 id="frase"><?=$retornoExc?></h1>
		<?php } ?>	
		
		<form action="index.php?r=produto&p=incluir" method="POST">
			<p id="label">Produto</p>
			<!-- O campo de input sera preenchido pelo usuario dessa forma não é necessario colocar o valor como na
			vieW_listar ou seja ele não pegara um valor por referencia -->
			<p><input type="text" maxlength="120" name="txtProduto" id="in"/></p>
			<p id="label">Quantidade</p>
			<p><input type="text" maxlength="120" name="txtQuantidade" id="in"/></p>
			<p id="label">Validade</p>
			<p><input type="text" maxlength="120" name="txtValidade" id="in"/></p>
			<p id="btn-1"><input type="submit" value="incluir"/></p>
			<!-- O name cadastro será usado no controller na função que chamará a query, lembrando que será escondida
			para na página-->
			<input type="hidden" name="cadastro"/>
		</form>
		
	<footer>
		<h3>Modelo de Querys</h3>
		<p>Todos os direitos reservados MN4R4 &copy; 2018</p>
	</footer>
	</body>
</html>