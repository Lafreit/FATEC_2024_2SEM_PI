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
            <th>ID</th>
            <th>Nome</th>
            <th>Nome do Medicamento</th>
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
            echo '<tr><td colspan="3">Nenhum medicamento encontrado para este paciente.</td></tr>';
        }
        ?>
    </table>
</body>
</html>