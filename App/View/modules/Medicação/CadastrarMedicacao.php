<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Medicamento</title>

</head>
<body>
    <form action= "/medicamento/form/save" method="post">
    <div>
    <label>Paciente_id</label>
    <input type="number" name="paciente_id">
    </div>

    <div>
    <label>Nome</label>
    <input type="text" name="nome">
    </div>

    <div>
    <label>quantidade</label>
    <input type="number" name="quantidade">
    </div>

    <div>
    <label>Vezes ao dia</label>
    <input type="tex" name="vezes_ao_dia">
    </div>

    <div class="btn-container">
               
        <button type="submit" class="btn btn-primary">Cadastrar</button>
                
    </div>

    </form>

    


    
</body>
</html>