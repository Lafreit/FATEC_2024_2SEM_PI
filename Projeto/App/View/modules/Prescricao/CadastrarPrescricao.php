<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Medicamento</title>
   
</head>
<body>
    <div class="container">
        <h2>Cadastrar Prescricao</h2>
        <form action="/prescricao/form/save" method="post">
            <div>
                <label for="cpf">CPF</label>
                <input type="varchar" id="cpf" name="cpf" required>
            </div>

            <div class="form-group">
                <label for="id_medicamentosconsulta">id_medicamento</label>
                <input type="number" id="id_medicamentosconsulta" name="id_medicamentosconsulta" required>
            </div>

            <div class="form-group">
                <label for="duracao">Duração</label>
                <input type="number" id="duracao" name="duracao" required>
            </div>

            <div class="form-group">
                <label for="dosagem">dosagem</label>
                <input type="dosagem" id="dosagem" name="dosagem" required>
            </div>


            <div class="form-group">
                <label for="instrucao">Instrucao</label>
                <input type="text" id="instrucao" name="instrucao" required>
            </div>



            <div class="btn-container">
                <button type="submit" class="btn">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>