<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Pessoas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>CPF</th>
            <th>CEP</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Tipo de Usuário</th>
            <th>Plano de Saúde</th>
        </tr>
        <?php foreach($model->rows as $item): ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->nome ?></td>
                <td><?= $item->sobrenome ?></td>
                <td><?= $item->cpf ?></td>
                <td><?= $item->cep ?></td>
                <td><?= $item->estado ?></td>
                <td><?= $item->cidade ?></td>
                <td><?= $item->Rua ?></td>
                <td><?= $item->numero ?></td>
                <td><?= $item->tipo_Usuario ?></td>
                <td><?= $item->plano_saude ?></td>
            </tr>
        <?php endforeach?>
    </table>
</body>
</html>