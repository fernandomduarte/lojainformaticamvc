<h2>Vender produto</h2>
<form class="form" method="POST" onsubmit="return confirm('Deseja vender este produto?');">

	<div class="form-group">
		<label>
			Código de Barras:
			<input type="text" name="code" id="code" value="<?php echo $info['code']; ?>" readonly>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Nome/Marca/Modelo:
			<input type="text" name="name" value="<?php echo $info['name']; ?>" readonly>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Preço:
			<input type="text" name="s_price" id="s_price" value="<?php echo number_format($info['price'], 2, ',', '.'); ?>">
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Quantidade a ser vendida:
			<input type="number" name="s_quantity" value="1">
		</label><br/>
	</div>

	<div class="form-group">
		<input type="submit" value="Vender">
	</div>

</form>