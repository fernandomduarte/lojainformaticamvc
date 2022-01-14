<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <title>Imagem <?php echo $imagem['name']; ?></title>
</head>
<body>
    <div class="image">
        <img id="big_image" src="<?php echo BASE_URL; ?>assets/images/<?php echo $imagem['url_image']; ?>" alt="">
    </div>
    
    <div class="info">
        <table border="1" width="500" id="table_info">
            <tr>
                <th>Nome do Produto</th>
                <td><?php echo $imagem['name']; ?></td>
            </tr>

            <tr>
                <th>Código</th>
                <td><?php echo $imagem['code']; ?></td>
            </tr>

        </table>
    </div>
        
</body>
</html>

<?php

/**
 * Código: <?php echo $imagem['code'];
 * Nome do Produto: <?php echo $imagem['name'];
**/

?>
