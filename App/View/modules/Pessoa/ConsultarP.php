<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Medicamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
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

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td[colspan="5"] {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Medicamento</th>
            <th>Quantidade</th>
            <th>Vezes ao Dia</th>
        </tr>
        <?php
        // Verifica se há resultados para exibir
        if (!empty($model->result)) {
            foreach ($model->result as $linha) {
                echo '<tr>';
                echo '<td>' . $linha->id . '</td>';
                echo '<td>' . $linha->nome . '</td>';
                echo '<td>' . $linha->Medicamento . '</td>';
                echo '<td>' . $linha->quantidade . '</td>';
                echo '<td>' . $linha->VezesAoDia . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="5">Nenhum medicamento encontrado para este paciente.</td></tr>';
        }
        ?>
    </table>
</body>
</html>