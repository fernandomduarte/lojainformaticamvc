<div class="title">Histórico de vendas</div>
<table border="1">
	<thead>
		<tr>
			<th>Cód.</th>
			<th>Nome</th>
			<th>Qtd.</th>
			<th>Valor da Venda(UN.)</th>
            <th>Valor total</th>
			<th>Dia/hora</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($list as $item_vendido): ?>
		<tr>
			<td><?php echo $item_vendido['product_code']; ?></td>
			<td><?php echo $item_vendido['product_name']; ?></td>
			<td><?php echo $item_vendido['quantity']; ?></td>
			<td>R$ <?php echo number_format($item_vendido['value'], 2, ',', '.'); ?></td>
            <td>R$ <?php echo number_format(floatval($item_vendido['value'] * $item_vendido['quantity']), 2, ',', '.'); ?></td>
			<td><?php echo date('d/m/Y H:i', strtotime($item_vendido['datetime'])); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>