<?php
// routes.php

include 'App/Controller/PessoaController.php'; 
include 'App/Controller/MedicamentoController.php';
include 'App/Controller/PrescricaoController.php';
include 'App/Controller/LoginController.php';
include_once 'App/Service/Auth.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    // Rotas de Login
    case '/form/login':
        LoginController::form();
        break;

    case '/login':
        LoginController::Autenticar();
        break;

    case '/logout':
        LoginController::logout();
        break;

    // Rotas protegidas - CadastroPaciente
    case '/pessoa':
        Auth::validador();
        PessoaController::index();
        break;

    case '/pessoa/form':
        Auth::validador();
        PessoaController::form();
        break;

    case '/pessoa/form/save':
        Auth::validador();
        PessoaController::save();
        break;

    // case '/pessoa/delete':
    //     Auth::validador();
    //     PessoaController::delete();
    //     break;

    // Telas
    case '/':
        PessoaController::telaIncial();
        break;

    case '/telaP':
        Auth::validador();
        PessoaController::HomePaciente();
        break;

    case '/telaM':
        Auth::validador();
        PessoaController::HomeMedico();
        break;

    // Rotas protegidas - Medicamento
    case '/medicamento':
        Auth::validador();
        MedicamentoController::index();
        break;

    case '/medicamento/formConsulta':
        Auth::validador();
        MedicamentoController::formConsulta();
        break;

    case '/medicamento/Consultar':
        Auth::validador();
        MedicamentoController::Consulta();
        break;

    case '/medicamento/form':
        Auth::validador();
        MedicamentoController::form();
        break;

    case '/medicamento/form/save':
        Auth::validador();
        MedicamentoController::save();
        break;

    // Rotas protegidas - Prescrição
    case '/prescricao/form':
        Auth::validador();
        PrescricaoController::form();
        break;

    case '/prescricao/form/save':
        Auth::validador();
        PrescricaoController::save();
        break;

    // Rota padrão (404)
    default:
        header("HTTP/1.0 404 Not Found");
        echo "Erro 404";
        break;
}
?>