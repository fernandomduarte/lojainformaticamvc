<h2>Novo produto</h2>
<form class="form" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		( * ) Campos Obrigatórios<br/><br/>
		<label>
			Código de Barras*:
			<input type="text" name="code" id="code">
			<label><input type="checkbox" name="barcode" id="barcode"/>Gerar código automaticamente</label>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Nome/Marca/Modelo*:
			<input type="text" name="name" required>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Preço*:
			<input type="text" name="price" id="price" required>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Quantidade*:
			<input type="number" name="quantity" required>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Qtd. Mínima*:
			<input type="number" name="min_quantity" required>
		</label><br/>
	</div>

	<div class="form-group">
		<label>
			Carregar imagem do produto*:
			<input type="file" name="image" id="image" onchange="previewImage()" required /></br> 
			<img id="preview" alt=""> 
		</label><br/>
	</div>

	<div class="form-group">
		<input type="submit" value="Salvar">
	</div>

</form>

