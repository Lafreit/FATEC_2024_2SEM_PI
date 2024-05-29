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
            // Inicializa variáveis para armazenar temporariamente os últimos valores exibidos
            $ultimo_nome = '';
            $ultima_descricao = '';
            $ultimo_NumCRM = '';
            $ultimo_medicamento = '';
        
            foreach ($model->result as $linha) {
                // Verifica se qualquer um dos campos é diferente do último valor exibido
                $mostrar_nova_linha = false;
                if ($linha->nome != $ultimo_nome || $linha->descricao != $ultima_descricao || $linha->NumCRM != $ultimo_NumCRM || $linha->Medicamento != $ultimo_medicamento) {
                    $mostrar_nova_linha = true;
                }
        
                if ($mostrar_nova_linha) {
                    echo '<tr>';
                    // Exibe o nome do paciente se for diferente do último nome exibido
                    if ($linha->nome != $ultimo_nome) {
                        echo '<td>' . $linha->idPaciente . '</td>';
                        echo '<td><a href="/pessoa/form?id=' . $linha->idPaciente . '">' . $linha->nome . '</a></td>';
                        $ultimo_nome = $linha->nome; // Atualiza o último nome exibido
                    } else {
                        echo '<td></td><td></td>';
                    }
        
                    // Exibe o medicamento se for diferente do último medicamento exibido
                    if ($linha->Medicamento != $ultimo_medicamento) {
                        echo "<td>{$linha->Medicamento}</td>";
                        $ultimo_medicamento = $linha->Medicamento; // Atualiza o último medicamento exibido
                    } else {
                        echo '<td></td>';
                    }
        
                    // Exibe a descrição se for diferente da última descrição exibida
                    if ($linha->descricao != $ultima_descricao) {
                        echo "<td>{$linha->descricao}</td>";
                        $ultima_descricao = $linha->descricao; // Atualiza a última descrição exibida
                    } else {
                        echo '<td></td>';
                    }
        
                    // Exibe o NumCRM se for diferente do último NumCRM exibido
                    if ($linha->NumCRM != $ultimo_NumCRM) {
                        echo "<td>{$linha->NumCRM}</td>";
                        $ultimo_NumCRM = $linha->NumCRM; // Atualiza o último NumCRM exibido
                    } else {
                        echo '<td></td>';
                    }
        
                    echo '</tr>';
                }
            }
        } else {
            // Se não houver resultados, exibe uma mensagem de que nenhum medicamento foi encontrado
            echo '<tr><td colspan="6">Nenhum medicamento encontrado para este paciente.</td></tr>';
        }
        ?>
    </table>
</body>
</html>