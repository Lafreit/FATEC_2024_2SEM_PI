<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Medicamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 30%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastrar Prescricao</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nomeMedicamento">id_paciente</label>
                <input type="number" id="nomeMedicamento" name="id_paciente" required>
            </div>

            <div class="form-group">
                <label for="id_medicamentosconsulta">id_medicamento</label>
                <input type="number" id="id_medicamento" name="fabricante" required>
            </div>

            <div class="form-group">
                <label for="quantidade">tipo</label>
                <input type="text" id="tipo" name="tipo" required>
            </div>

            <div class="form-group">
                <label for="uso">Uso</label>
                <input type="text" id="uso" name="uso" required>
            </div>


            <div class="btn-container">
                <button type="submit" class="btn">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>