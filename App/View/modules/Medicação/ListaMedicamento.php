<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Medicamento</title>
</head>
<body>
    <table>
        <tr>
            <th>Paciente_id</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>vezes ao dia</th>
            

        </tr>
        <?php foreach($model->rows as $item): ?>
            <tr>

                <td><?= $item->paciente_id ?></td>
                <td><?= $item->nome ?></td>
                <td><?= $item->quantidade ?></td>
                <td><?= $item->vezes_ao_dia ?></td>
          
            
            
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>