<!doctype html>
<html lang="pt-br">

<head>

	<title>Minha Loja</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>




	<?php

	session_start();

	include 'conexao.php';
	include 'nav.php';
	include 'cabecalho.html';
	// Esse é um operador ternário dividido em três partes condition ? true : false
	$consulta = isset($conexao) ? $conexao->query('SELECT * FROM produtos') : ""
	?>

	<div class="container-fluid">
		<div class="row">

			<?php
			//verificar se a variavel consulta tem recebeu mesmo o valor da conexão
			if ($consulta) {
				while ($exibir = $consulta->fetch(PDO::FETCH_ASSOC)) {
			?>

					<div class="col-sm-3">
						<img src="img/<?php //echo $exibir['foto1']; 
										?>" class="img-responsive" style="width:100%;">
						<div>
							<h1><?php echo $exibir['produto']; ?></h1>
						</div>
						<div>
							<h4>R$<?php echo number_format($exibir['preco'], 2, ',', '.'); ?></h4>
						</div>

						<div class="text-center">

							<a href="detalhes.php?id=<?php echo $exibir['id']; ?>">

								<button class="btn btn-lg btn-block btn-default"><span class="glyphicon glyphicon-info-sign" style="color: cadetblue;"> Detalhes</span></button></a>

						</div>

						<div class="text-center" style="margin-top: 5px;">
							<!--se o estoque for 0 zero aparecerá iindisponivel-->
							<?php if ($exibir['quantidade'] > 0) { ?>

								<button class="btn btn-lg btn-block btn-info">
									<span class="glyphicon glyphicon-usd"> Comprar</span>
								</button>

							<?php } else { ?>

								<button class="btn btn-lg btn-block btn-danger disabled">
									<span class="glyphicon glyphicon-ban-circle"> Indisponível</span>
								</button>

							<?php } ?>

						</div>
					</div>


			<?php
				}
			}

			?>

		</div>


	</div>

	<?php
	include 'footer.html';
	?>


</body>

</html>