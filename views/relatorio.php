<h2>Relatório</h2>

<table border="1">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome do produto</th>
            <th>Qtd. em estoque</th>
            <th>Qtd. mínima</th>
            <th>Produtos à comprar</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($list as $item) :?>
        <tr>
            <td><?php echo $item['code']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $item['min_quantity']; ?></td>
            <td><?php echo intval($item['min_quantity'] - $item['quantity']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>