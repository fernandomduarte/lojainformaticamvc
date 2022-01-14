<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/login.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<form method="POST" class="form">

				<?php if(!empty($msg)): ?>
					<div class="msg"><?php echo $msg; ?></div>
				<?php endif; ?>

				<div class="form-group">
					<label>
						<input placeholder="Nome do usuário" type="text" name="name" id="name">
					</label><br/>
				</div>

				<div class="form-group">
					<label>
						<input placeholder="Senha do usuário" type="password" name="password">
					</label></br/>
				</div>

				<div class="form-group">
					<input type="submit" value="Entrar">
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</body>
</html>