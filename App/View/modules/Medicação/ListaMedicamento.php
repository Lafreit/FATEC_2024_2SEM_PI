<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Medicamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('caminho/para/sua/imagem.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: #333;
        }

        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
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
            <th>Paciente ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Vezes ao Dia</th>
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