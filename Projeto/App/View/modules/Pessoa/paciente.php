<?php
if (strpos($_SERVER['PHP_SELF'], basename(__FILE__)) !== false) {
    // Redireciona para a página inicial
    header("Location: /");
    exit();
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/log1.png" type="image/x-icons">
    <title>Dashboard Paciente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="App/View/modules/css/telapaciente.css">
    <!-- Inclua outros estilos CSS aqui -->
    <style>
        /* Adicione estilos personalizados aqui */
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h2 class="logo-nombre">Dashboard Paciente</h2>
        </div>
    </header>

    <div class="container">
        <!-- Abas ou seções do dashboard -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="medicamento-tab" data-toggle="tab" href="#medicamento" role="tab" aria-controls="medicamento" aria-selected="true">Medicamento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="alarme-tab" data-toggle="tab" href="#alarme" role="tab" aria-controls="alarme" aria-selected="false">Alarme</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sintomas-tab" data-toggle="tab" href="#sintomas" role="tab" aria-controls="sintomas" aria-selected="false">Sintomas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="relatorio-tab" data-toggle="tab" href="#relatorio" role="tab" aria-controls="relatorio" aria-selected="false">Relatório Completo</a>
            </li>
            <li>
                <a class="btn" id="logout-tab" href="/logout">Logout</a>
            </li>
        </ul>

        <!-- Conteúdo das abas -->
        <div class="tab-content" id="myTabContent">
            <!-- Conteúdo da aba de Medicamento -->
            <div class="tab-pane fade show active" id="medicamento" role="tabpanel" aria-labelledby="medicamento-tab">
                <!-- Adicione o conteúdo aqui -->
                <div class="container-xl">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2><b></b></h2></div>
                                    <div class="col-sm-4">
                                        <div class="search-box">
                                            <i class="material-icons">&#xE8B6;</i>
                                            <input type="text" class="form-control" placeholder="Buscar&hellip;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome <i class="fa fa-sort"></i></th>
                                        <th>Concentração</th>
                                        <th>Fórmula Farmacêutica <i class="fa fa-sort"></i></th>
                                        <th>Esquema de tratamento</th>
                                        <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0001</td>
                                        <td>Amoxicilina</td>
                                        <td>500 mg</td>
                                        <td>TAB</td>
                                        <td>60 Comprimidos</td>
                                        <td>
                                            <a href="#" class="view" title="Ver" data-toggle="tooltip">
                                                <button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
                                            </a>
                                            <script>
                                                function imprimirPagina() {
                                                    window.print();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0002</td>
                                        <td>Cefalexina</td>
                                        <td>250 mg</td>
                                        <td>Líquido Oral</td>
                                        <td>1 Frasco</td>
                                        <td>
                                            <a href="#" class="view" title="Ver" data-toggle="tooltip">
                                                <button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
                                            </a>
                                            <script>
                                                function imprimirPagina() {
                                                    window.print();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0003</td>
                                        <td>Loratadina</td>
                                        <td>10 mg</td>
                                        <td>TAB</td>
                                        <td>5 Comprimidos</td>
                                        <td>
                                            <a href="#" class="view" title="Ver" data-toggle="tooltip">
                                                <button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
                                            </a>
                                            <script>
                                                function imprimirPagina() {
                                                    window.print();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0004</td>
                                        <td>Omeprazol</td>
                                        <td>20 mg</td>
                                        <td>TAB</td>
                                        <td>30 Comprimidos</td>
                                        <td>
                                            <a href="#" class="view" title="Ver" data-toggle="tooltip">
                                                <button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
                                            </a>
                                            <script>
                                                function imprimirPagina() {
                                                    window.print();
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>0005</td>
                                        <td>Paracetamol</td>
                                        <td>500 mg</td>
                                        <td>TAB</td>
                                        <td>28 Comprimidos</td>
                                        <td>
                                            <a href="#" class="view" title="Ver" data-toggle="tooltip">
                                                <button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
                                            </a>
                                            <script>
                                                function imprimirPagina() {
                                                    window.print();
                                                }
                                            </script>
                                        </td>
                                    </tr>        
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>  
            </div>

            <!-- Conteúdo da aba de Alarme -->
            <div class="tab-pane fade" id="alarme" role="tabpanel" aria-labelledby="alarme-tab">
                <!-- Adicione o conteúdo aqui -->
                <div class="container">
                    <form id="alarmForm" class="success-alert">
                        <div class="form-group">
                            <label for="medicineName">Nome do Medicamento:</label>
                            <input type="text" id="medicineName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alarmTime">Horário do Alarme:</label>
                            <input type="time" id="alarmTime" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar Alarme</button>
                    </form>
                    <div id="alarmList">
                        <!-- Aqui serão listados os alarmes adicionados -->
                    </div>
                </div>
            </div>

            <!-- Conteúdo da aba de Sintomas -->
            <div class="tab-pane fade" id="sintomas" role="tabpanel" aria-labelledby="sintomas-tab">
                <!-- Adicione o conteúdo aqui -->
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Adicionar Sintoma
                        </div>
                        <div class="card-body">
                            <form id="addSymptomForm" action="/paciente" method="post" class="success-alert">
                                <div class="form-group">
                                    <label for="symptom">Sintoma / Efeito Colateral:</label>
                                    <input type="text" class="form-control" id="symptom" placeholder="Digite o sintoma ou efeito colateral" name="descricao" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Adicionar Sintoma</button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4">
                        <table id="symptomsTable" class="table">
                            <thead>
                                <tr>
                                    <th>Sintoma / Efeito Colateral</th>
                                    <th>Gravidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aqui serão adicionados dinamicamente os sintomas -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Conteúdo da aba de Relatório Completo -->
            <div class="tab-pane fade" id="relatorio" role="tabpanel" aria-labelledby="relatorio-tab">
                <div class="container">
                    <header>
                        <h1>Relatório Médico</h1>
                    </header>
                    <section class="medications">
                        <h2>Receitas Médicas</h2>
                        <ul>
                            <li>
                                <h3>Medicamento 1</h3>
                                <p>Dosagem: <span>XX mg</span></p>
                                <p>Frequência: <span>X vezes ao dia</span></p>
                                <p>Duração do tratamento: <span>X dias/semanas/meses</span></p>
                            </li>
                            <li>
                                <h3>Medicamento 2</h3>
                                <p>Dosagem: <span>XX mg</span></p>
                                <p>Frequência: <span>X vezes ao dia</span></p>
                                <p>Duração do tratamento: <span>X dias/semanas/meses</span></p>
                            </li>
                            <!-- Adicione mais medicamentos conforme necessário -->
                        </ul>
                    </section>
                    <section class="instructions">
                        <h2>Instruções</h2>
                        <p>Tome os medicamentos conforme indicado.</p>
                        <p>Se houver qualquer reação adversa, entre em contato com seu médico imediatamente.</p>
                        <p>Siga todas as instruções cuidadosamente para garantir a eficácia do tratamento.</p>
                    </section>
                    <section class="contact">
                        <h2>Contato do Médico</h2>
                        <p>Nome: <span>Nome do médico</span></p>
                        <p>Telefone: <span>Número de contato</span></p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("form.success-alert").forEach(function(form) {
                form.addEventListener("submit", function(event) {
                    event.preventDefault();
                    alert("Enviado com sucesso");
                    form.submit();
                });
            });
        });
    </script>
</body>
</html>