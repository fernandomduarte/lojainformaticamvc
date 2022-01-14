<h2>Editar produto</h2>

<form class="form" method="POST" onsubmit="return confirm('Deseja confirmar as informações deste produto?');">

	<div class="form-group">
		( * ) Campos Obrigatórios<br/><br/>
		<label>
			Código de Barras:
			<input type="text" name="code" id="code" value="<?php echo $info['code']; ?>" readonly>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Nome/Marca/Modelo*:
			<input type="text" name="name" value="<?php echo $info['name']; ?>" required >
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Preço*:
			<input type="text" name="price" id="price" value="<?php echo number_format($info['price'], 2, ',', '.'); ?>" required >
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Quantidade*:
			<input type="number" name="quantity" value="<?php echo $info['quantity']; ?>" required >
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Qtd. Mínima*:
			<input type="number" name="min_quantity" value="<?php echo $info['min_quantity']; ?>" required >
		</label><br/>
	</div>
	
	<div class="form-group">
		<input type="submit" value="Atualizar Produto">
	</div>
</form>

<div class="line"></div>

<form class="form" enctype="multipart/form-data" method="post" onsubmit="return confirm('Deseja alterar a imagem deste produto?');">
	<div class="form-group">
		<label>
			Carregar imagem do produto*:
			<input type="file" name="image" id="image" onchange="previewImage()" required /></br> 
			<img id="preview" src="<?php echo BASE_URL; ?>assets/images/<?php echo $info['url_image']; ?>" alt=""> 
		</label><br/>
	</div>

	<div class="form-group">
		<input type="submit" value="Atualizar Imagem">
	</div>
</form>

