<!DOCTYPE html>
<html lang="pt-br">
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

        td[colspan="6"] {
            text-align: center;
            font-style: italic;
            color: #888;
        }

        .delete-link {
            color: red;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-link:hover {
            text-decoration: underline;
        }

        .delete-button {
            background-color: #f44336;
            border: none;
            color: white;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
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
            // Inicializa uma variável para armazenar temporariamente o último nome de paciente
            $ultimo_nome = '';
        
            foreach ($model->result as $linha) {
                echo '<tr>';
                // Verifica se o nome do paciente é diferente do último nome exibido
                if ($linha->nome != $ultimo_nome) {
                   
                    echo '<td>' . $linha->id . '</td>';

                    echo '<td> <a href="/pessoa/form?id=' . $linha->id . '"> ' . $linha->nome . '</td>';
                    $ultimo_nome = $linha->nome; // Atualiza o último nome exibido
                } else {
                    // Se for o mesmo nome do paciente, exibe células vazias para o ID e o nome
                    echo '<td></td><td></td>';
                }
                // Exibe as informações do medicamento
                echo '<td>' . $linha->Medicamento . '</td>';
                echo '<td>' . $linha->quantidade . '</td>';
                echo '<td>' . $linha->VezesAoDia . '</td>';
                echo '</tr>';
            }
        } else {
            // Se não houver resultados, exibe uma mensagem de que nenhum medicamento foi encontrado
            echo '<tr><td colspan="6">Nenhum medicamento encontrado para este paciente.</td></tr>';
        }
        ?>
    </table>
</body>
</html>