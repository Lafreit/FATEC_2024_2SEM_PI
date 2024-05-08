<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Paciente</title>
    <link rel="stylesheet" href="/App/View/modules/css/style.css">
</head>
<body>

<section class="patient-section">
    <h1 class="heading">Área do Paciente</h1>
    <div class="row">
        <div class="box1">
            <i class="fas fa-clock"></i>
            <h2>Lembretes de Medicamentos</h2>
            <form action="#" method="post">
                <label for="medication">Medicamento:</label>
                <input type="text" id="medication" name="medication" placeholder="Nome do medicamento">

                <label for="time">Horário:</label>
                <input type="time" id="time" name="time">

                <button type="submit" class="btn btn1">Configurar Lembrete</button>
            </form>
        </div>
        <div class="box1">
            <i class="fas fa-notes-medical"></i>
            <h2>Registro e Monitoramento</h2>
            <form action="#" method="post">
                <label for="side-effects">Efeitos Colaterais:</label>
                <input type="text" id="side-effects" name="side-effects" placeholder="Efeito colateral">

                <label for="severity">Gravidade:</label>
                <select id="severity" name="severity">
                    <option value="mild">Leve</option>
                    <option value="moderate">Moderada</option>
                    <option value="severe">Severa</option>
                </select>

                <button type="submit" class="btn btn1">Registrar Efeito Colateral</button>
            </form>
        </div>
        <div class="box1">
            <i class="fas fa-comments-medical"></i>
            <h2>Comunicação Direta</h2>
            <form action="#" method="post">
                <label for="symptoms">Sintomas:</label>
                <textarea id="symptoms" name="symptoms" placeholder="Descreva seus sintomas"></textarea>

                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" placeholder="Digite sua mensagem"></textarea>

                <button type="submit" class="btn btn1">Enviar Mensagem</button>
            </form>
        </div>
    </div>
</section>

</body>
</html>



    
    
