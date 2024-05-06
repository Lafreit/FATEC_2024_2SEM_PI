<?php

/*
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
    */
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
        <form action= "/medicamento/Consultar" method="post">
            <div class="mb-3">
                <label for="cpf" class="form-label">Digite o CPF do paciente:</label>
                <input type="text" name="cpf" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>