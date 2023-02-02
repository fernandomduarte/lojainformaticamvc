<div class="title">Cadastrar novo produto</div>

<form class="form" method="POST" enctype="multipart/form-data">
	
	<div class="form-group">
		( * ) Campos Obrigatórios<br/><br/>
		<label>
			Código de Barras*:
			<input type="text" name="code" id="code">
			<label><input type="checkbox" name="barcode" id="barcode"/>Gerar código automaticamente</label>
		</label><br/>
	
		<label>
			Nome/Marca/Modelo*:
			<input type="text" name="name" required>
		</label><br/>
	
		<label>
			Preço*:
			<input type="text" name="price" id="price" required>
		</label><br/>
	
		<label>
			Quantidade*:
			<input type="number" name="quantity" required>
		</label><br/>
	
		<label>
			Qtd. Mínima*:
			<input type="number" name="min_quantity" required>
		</label><br/>
	
		<label>
			Carregar imagem do produto*:
			<input type="file" name="image" id="image" onchange="previewImage()" required /></br> 
			<img id="preview" alt=""> 
		</label><br/>
	
		<input type="submit" value="Salvar">
	

</form>

