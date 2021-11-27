<h2>Editar produto</h2>
<form class="form" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		<label>
			Código de Barras:
			<input type="text" name="code" id="code" value="<?php echo $info['code']; ?>" readonly>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Nome/Marca/Modelo:
			<input type="text" name="name" value="<?php echo $info['name']; ?>">
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Preço:
			<input type="text" name="price" id="price" value="<?php echo number_format($info['price'], 2, ',', '.'); ?>">
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Quantidade:
			<input type="number" name="quantity" value="<?php echo $info['quantity']; ?>">
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Qtd. Mínima:
			<input type="number" name="min_quantity" value="<?php echo $info['min_quantity']; ?>">
		</label><br/>
	</div>

	<!--
	<div class="form-group">
		<label>
			Carregar imagem do produto:
			<input type="file" name="image" id="image"></br>  onchange="previewImage()"
		</label><br/>
	</div>
	-->

	<div class="form-group">
		<input type="submit" value="Atualizar">
	</div>

</form>