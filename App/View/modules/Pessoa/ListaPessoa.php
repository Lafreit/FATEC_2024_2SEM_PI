<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>cpf</th>
            <th>Cep</th>
            <th></th>
            <th>Estado</th>
            <th></th>
            <th>Cidade</th>
            <th></th>
            <th>Rua</th>
            <th></th>
            <th>numero</th>
            <th></th>
            <th>Tipo de Usuario</th>
            <th>Plano de Saude</th>

        </tr>
        <?php foreach($model->rows as $item): ?>
            <tr>

                <td><?= $item->id ?></td>
                <td><?= $item->nome ?></td>
                <td><?= $item->sobrenome ?></td>
                <td><?= $item->cpf ?></td>
                <td><?= $item->cep ?></td>
                <td></td>
                <td><?= $item->estado ?></td>
                <td></td>
                <td><?= $item->cidade ?></td>
                <td></td>
                <td><?= $item->rua ?></td>
                <td></td>
                <td><?= $item->numero ?></td>
                <td></td>
                <td><?= $item->tipo_usuario ?></td>
                <td><?= $item->plano_saude ?></td>
          
            
            
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>