<fieldset id="campo_busca">
	<form method="get">
		<input type="search" name="search" id="search" placeholder="Digite o código de barras ou o nome do produto..." value="<?php echo (!empty($_GET['search'])) ? $_GET['search']: '' ;?>">
	</form>
</fieldset>

<div class="title">Produtos em Estoque</div>

<table border=1>
	<thead>
		<tr>
			<th>Cód.</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Quantidade</th>
			<th> - </th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($list as $item): ?>
		<tr>
			<td><?php echo $item['code']; ?></td>
			<td>
				<a href="<?php echo BASE_URL; ?>image/show/<?php echo $item['code']; ?>" target="_blank"><?php echo $item['name']; ?></a>	
			</td>
			<td>R$ <?php echo number_format($item['price'], 2, ',', '.'); ?></td>
			<td><?php echo $item['quantity']; ?></td>
			<td>
				<a href="<?php echo BASE_URL; ?>product/edit/<?php echo $item['id']; ?>">Editar</a>
				<a href="<?php echo BASE_URL; ?>product/sell/<?php echo $item['id']; ?>">Vender</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>