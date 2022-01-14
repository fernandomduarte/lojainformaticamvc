<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
	<title>Loja</title>
</head>
<body>
	<div class="container">
		<header>
			<div class="menu">
				<nav>
					<a href="<?php echo BASE_URL; ?>">home</a>
					<a href="<?php echo BASE_URL; ?>product/add">cadastrar produto</a>
					<a href="<?php echo BASE_URL; ?>sales/historic">histórico de vendas</a>
					<a href="<?php echo BASE_URL; ?>relatorio">relatório</a>
					<a href="<?php echo BASE_URL; ?>login/sair">sair</a>
				</nav>
			</div>
		</header>
		<section>
			<?php
			$this->loadViewInTemplate($viewName, $viewData);
			?>
		</section>
		<footer>
			Developed by Fernando de Macedo Duarte
		</footer>
	</div>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>