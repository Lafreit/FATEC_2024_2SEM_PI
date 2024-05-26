<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/log1.png" type="image/x-icons">
    <title>Dashboard Médico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="App/View/modules/css/medico.css">
    <!-- Inclua outros estilos CSS aqui -->
    <style>
        /* Adicione estilos personalizados aqui */
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h2 class="logo-nombre">
        </div>
    </header>

    <div class="container">
        <!-- Abas ou seções do dashboard -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pacientes-tab" data-toggle="tab" href="#pacientes" role="tab" aria-controls="pacientes" aria-selected="true">Pacientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="medicamentos-tab" data-toggle="tab" href="#medicamentos" role="tab" aria-controls="medicamentos" aria-selected="false">Medicamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="receita-tab" data-toggle="tab" href="#receita" role="tab" aria-controls="receita" aria-selected="false">Receita Médica</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- Seção de Pacientes -->
            <div class="tab-pane fade show active" id="pacientes" role="tabpanel" aria-labelledby="pacientes-tab">
                <!-- Conteúdo do CRUD de Pacientes -->
                <!-- Copie e cole o HTML do CRUD de Pacientes aqui -->
                <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/log1.png" type="image/x-icons">
    <title>Pacientes</title>
    <link rel="stylesheet" href="App/View/modules/css/opcpacientes.css">
</head>
<body>
    <header>
        <div class="logo">
            <h2 class="logo-nombre">
        </div>
    </header>
    
    <!-- Crud -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fim do Crud -->

    <!-- Crud -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b></b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar Novo Paciente</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Excluir</span></a>						
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Nome Completo</th>
                            <th>Idade</th>
                            <th>Gênero</th>
                            <th>CPF</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td>Bruno</td>
                            <td>36</td>
                            <td>M</td>
                            <td>0953678145</td>
                            <td>Fatec-Araras </td>
                            <td>(019) 998-2222</td>
                            <td>bruno@fatecararas.com</td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Excluir">&#xE872;</i></a>
                            </td>
                        </tr>
                        <!-- Aqui vão os outros registros -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Fim do Crud -->

    <!-- Modais do Crud -->
    <div id="addEmployeeModal" class="modal fade">
        <!-- Conteúdo do modal -->
    </div>

    <div id="editEmployeeModal" class="modal fade">
        <!-- Conteúdo do modal -->
    </div>

    <div id="deleteEmployeeModal" class="modal fade">
        <!-- Conteúdo do modal -->
    </div>
    <!-- Fim dos Modais do Crud -->

    <!-- Scripts do Crud -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Fim dos Scripts do Crud -->

    <script src="js/main.js"></script>
</body>
</html>
            </div>

            <!-- Seção de Medicamentos -->
            <div class="tab-pane fade" id="medicamentos" role="tabpanel" aria-labelledby="medicamentos-tab">
                <!-- Conteúdo do CRUD de Medicamentos -->
                <!-- Copie e cole o HTML do CRUD de Medicamentos aqui -->
                <!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/log1.png" type="image/x-icons">
<title>Medicamentos</title>
<header>
    <div class="logo">
    <h2 class="logo-nome"></h2>
    </div>
</header>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
  
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2> <b></b></h2></div>
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
                            <a href="#" class="view" title="Ver" data-toggle="tooltip"><button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
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
                            <a href="#" class="view" title="Ver" data-toggle="tooltip"><button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
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
                            <a href="#" class="view" title="Ver" data-toggle="tooltip"><button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
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
                            <a href="#" class="view" title="Ver" data-toggle="tooltip"><button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
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
                            <a href="#" class="view" title="Ver" data-toggle="tooltip"><button onclick="imprimirPagina();"><i class='fa fa-print'></i></button>
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
</body>
</html>

                
            </div>

            <!-- Seção de Receita Médica -->
            <div class="tab-pane fade" id="receita" role="tabpanel" aria-labelledby="receita-tab">
                <!-- Conteúdo do Formulário de Receita Médica -->
                <!-- Copie e cole o HTML do Formulário de Receita Médica aqui -->
                <!DOCTYPE html>
<head>
    <!-- Definição do título da página -->
    <title>Receita Médica</title>
    <!-- Inclusão do arquivo de estilo CSS -->
    <link rel="stylesheet" href="../css/opcreceita.css">
</head>

<body>
    <header>
        <!-- Cabeçalho da página (possivelmente poderia conter o logotipo ou título adicional) -->
    </header>

    <!-- Tabela contendo o formulário de receita médica e a lista de receitas -->
    <table>
        <tr>
            <td>
                <!-- Formulário de receita médica -->
                <div class="col-sm-6">
                    <h2>Receita Médica</h2>
                </div>
                <form autocomplete="off" onsubmit="onFormSubmit()">
                    <!-- Campo para inserir o nome do paciente -->
                    <div>
                        <label for="productCode">Nome do paciente</label>
                        <input type="text" name="productCode" id="productCode">
                    </div>
                    <!-- Campo para inserir o medicamento -->
                    <div>
                        <label for="product">Medicamento</label>
                        <input type="text" name="product" id="product">
                    </div>
                    <!-- Campo para inserir a quantidade do medicamento -->
                    <div>
                        <label for="qty">Quantidade</label>
                        <input type="number" name="qty" id="qty">
                    </div>
                    <!-- Campo para inserir as indicações -->
                    <div>
                        <label for="product1">Indicações</label>
                        <input type="text" name="product1" id="product1">
                    </div>
                    <!-- Campo para inserir a duração do tratamento -->
                    <div>
                        <label for="product1">Duração do tratamento</label>
                        <input type="text" name="product2" id="product2">
                    </div>
                    <!-- Campo para inserir o médico prescritor -->
                    <div>
                        <label for="product1">Médico prescritor</label>
                        <input type="text" name="product3" id="product3">
                    </div>

                    <!-- Botões de ação do formulário -->
                    <div class="form_action--button">
                        <input type="submit" value="Receitar">
                        <input type="reset" value="Reiniciar">
                    </div>
                </form>
            </td>
            <!-- Tabela de lista de receitas -->
            <td>
                <table class="list" id="storeList">
                    <!-- Cabeçalho da tabela de lista de receitas -->
                    <thead>
                        <tr>
                            <th>Nomes do paciente</th>
                            <th>Medicamento</th>
                            <th>Quantidade</th>
                            <th>Indicações</th>
                            <th>Duração do tratamento</th>
                            <th>Médico prescritor</th>
                        </tr>
                    </thead>
                    <!-- Corpo da tabela de lista de receitas (a ser preenchido dinamicamente) -->
                    <tbody>

                    </tbody>
                </table>
            </td>
        </tr>
    </table>

    <!-- Inclusão do arquivo de script JavaScript -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
            </div>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Adicione outros scripts JavaScript aqui -->
</body>
</html>
