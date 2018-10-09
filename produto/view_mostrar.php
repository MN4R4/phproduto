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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body>
		<header>
			<h1>Lista dos Produtos</h1>
		</header>

		<section>
			<p></p>
		</section>

		<?php if(isset($retornoExc)) { ?>
			<h1 id="frase"><?=$retornoExc?></h1>
		<?php } ?>	
		
		<table>
			<tr id="prim">
				<td>Id</td>
				<td>Produto</td>
				<td>Quantidade</td>
				<td>Validade</td>
				<td>Inserir</td>
				<td>Apagar</td>
			</tr>
			
			<?php foreach($dados as $linha) {  ?> 			
				<tr id="sql">
					<td><?=$linha['id']?></td>
					<td><?=$linha['produto']?></td>
					<td><?=$linha['quantidade']?></td>
					<td><?=$linha['validade']?></td>
					<td><a href="index.php?r=produto&p=incluir" id="create"  >Inserir</a></td>
					<td><a href="index.php?r=produto&p=excluir&codigo=<?=$linha['id']?>" onclick = "return confirm('Deseja realmente excluir o registro?')" id="delete" >Excluir</a></td>
				</tr>
			<?php } ?>
		</table>
		<p></p>
			<section id="btn-filtro">
			<form action="controller.php" method='POST'>
				<select id="operacao">
					<option value=""></option>
					<option value="nome" name ="txtNome">Nome</option>
					<option value="quantidade" name = "txtQuantidade">Quantidade</option>
					<option value="validade" name = "txtValidade">Validade</option>
					<!--para transformar em botao o fa-fa colocar um id para identificar e href  -->
				</select><a href="index.php?r=produto&p=" id="btn" class="fa fa-search" aria-hidden="true"></a>
			</form>
	<footer>
		<h3>Modelo de Querys</h3>
		<p>Todos os direitos reservados MN4R4 &copy; 2018</p>
	</footer>
	</body>
</html>