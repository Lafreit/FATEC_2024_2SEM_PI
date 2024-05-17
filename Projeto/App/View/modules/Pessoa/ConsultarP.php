<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Medicamento</title>
    <style>
        /* Estilos para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilo para as linhas alternadas */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Estilo para os links */
        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Medicamento</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Dosagem</th>
        </tr>
        <?php
        // Verifica se há resultados para exibir
        if (!empty($model->result)) {
            // Inicializa uma variável para armazenar temporariamente o último nome de paciente
            $ultimo_nome = '';
        
            foreach ($model->result as $linha) {
                // Verifica se o nome do paciente é diferente do último nome exibido
                if ($linha->nome != $ultimo_nome) {
                    echo '<tr>';
                    echo '<td>' . $linha->idPaciente . '</td>';
                    echo '<td><a href="/pessoa/form?id=' . $linha->idPaciente . '">' . $linha->nome . '</a></td>';
                    $ultimo_nome = $linha->nome; // Atualiza o último nome exibido
                } else {
                    // Se for o mesmo nome do paciente, exibe células vazias para o ID e o nome
                    echo '<tr><td></td><td></td>'; // Abre uma nova linha apenas para ID e nome
                }
                // Exibe as informações do paciente
                echo "<td>{$linha->Medicamento}</td>";
                echo "<td>{$linha->tipo}</td>";
                echo "<td>{$linha->descricao}</td>";
                echo "<td>{$linha->data_prescricao}</td>";
                echo "<td>{$linha->dosagem}</td>";
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