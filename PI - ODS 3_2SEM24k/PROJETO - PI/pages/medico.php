<?php
include 'conexao.php';

$pacientes = [];

// Realizar busca de pacientes por CPF
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filtro_cpf'])) {
    $filtro_cpf = $_POST['filtro_cpf'];
    $sql = "SELECT id, nome FROM paciente WHERE cpf = '$filtro_cpf'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pacientes[] = $row;
        }
    }
}

// Inserir lembrete e medicação no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idpaciente'])) {
    $paciente_id = $_POST['idpaciente'];

    // Se a ação for adicionar lembrete
    if ($_POST['action'] == 'adicionar_lembrete' && isset($_POST['mensagem']) && isset($_POST['data_hora'])) {
        $mensagem = $_POST['mensagem'];
        $data_hora = $_POST['data_hora'];

        try {
            // Preparação da declaração SQL para evitar injeção de SQL
            $sql = "INSERT INTO lembretes (paciente_id, mensagem, data_hora) VALUES (?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            // Ligação de parâmetros à declaração SQL com escape de dados
            $stmt->bind_param("iss", $paciente_id, $mensagem, $data_hora);

            // Execução da declaração preparada
            if ($stmt->execute()) {
                echo "Lembrete inserido com sucesso!";
            } else {
                throw new Exception("Erro ao inserir lembrete: " . $mysqli->error);
            }

            // Fechamento da declaração preparada
            $stmt->close();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    // Se a ação for adicionar medicação
    elseif ($_POST['action'] == 'adicionar_medicacao' && isset($_POST['medicacao']) && isset($_POST['quantidade']) && isset($_POST['vezes_dia']) && isset($_POST['duracao_dias'])) {
        $medicacao = $_POST['medicacao'];
        $quantidade = $_POST['quantidade'];
        $vezes_dia = $_POST['vezes_dia'];
        $duracao_dias = $_POST['duracao_dias'];

        try {
            // Preparação da declaração SQL para evitar injeção de SQL
            $sql = "INSERT INTO medicacao (paciente_id, medicacao, quantidade, vezes_dia, duracao_dias) VALUES (?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);

            // Ligação de parâmetros à declaração SQL com escape de dados
            $stmt->bind_param("isiii", $paciente_id, $medicacao, $quantidade, $vezes_dia, $duracao_dias);

            // Execução da declaração preparada
            if ($stmt->execute()) {
                echo "Medicação inserida com sucesso!";
            } else {
                throw new Exception("Erro ao inserir medicação: " . $mysqli->error);
            }

            // Fechamento da declaração preparada
            $stmt->close();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Paciente por CPF</title>
    <link rel="stylesheet" href="../css/medico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Buscar Paciente por CPF</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
                <label for="filtro_cpf" class="form-label">Digite o CPF do paciente:</label>
                <input type="text" name="filtro_cpf" id="filtro_cpf" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php if (!empty($pacientes)) : ?>
            <h2 class="mt-4 mb-4 text-center">Paciente encontrado:</h2>
            <ul>
                <?php foreach ($pacientes as $paciente) : ?>
                    <li>
                        <div>
                            <strong><?php echo $paciente['nome']; ?></strong> - ID: <?php echo $paciente['id']; ?>
                        </div>
                        <div class="lembrete-form">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="idpaciente" value="<?php echo $paciente['id']; ?>">
                                <div class="mb-3">
                                    <label for="mensagem" class="form-label">Mensagem do Lembrete:</label>
                                    <textarea name="mensagem" id="mensagem" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="data_hora" class="form-label">Data/Hora:</label>
                                    <input type="datetime-local" name="data_hora" id="data_hora" class="form-control">
                                </div>
                                <button type="submit" name="action" value="adicionar_lembrete" class="btn btn-primary">Adicionar Lembrete</button>
                            </form>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="idpaciente" value="<?php echo $paciente['id']; ?>">
                                <div class="mb-3">
                                    <label for="medicacao" class="form-label">Medicação:</label>
                                    <input type="text" name="medicacao" id="medicacao" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="quantidade" class="form-label">Quantidade:</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control" min="1">
                                </div>
                                <div class="mb-3">
                                    <label for="vezes_dia" class="form-label">Vezes por dia:</label>
                                    <input type="number" name="vezes_dia" id="vezes_dia" class="form-control" min="1">
                                </div>
                                <div class="mb-3">
                                    <label for="duracao_dias" class="form-label">Duração (dias):</label>
                                    <input type="number" name="duracao_dias" id="duracao_dias" class="form-control" min="1">
                                </div>
                                <div class="mb-3">
                                    <label for="data_hora" class="form-label">Data/Hora:</label>
                                    <input type="datetime-local" name="data_hora" id="data_hora" class="form-control">
                                </div>
                                <button type="submit" name="action" value="adicionar_medicacao" class="btn btn-primary">Adicionar Medicação</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['filtro_cpf'])) : ?>
            <p class="mt-4 mb-4 text-center">Nenhum paciente encontrado com o CPF informado.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>