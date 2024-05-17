<?php
// routes.php

include 'App/Controller/PessoaController.php'; 
include 'App/Controller/MedicamentoController.php';
include 'App/Controller/PrescricaoController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        header("location: App/View/modules/Pessoa/funcionario.php");
    break;

    case '/pessoa':
        PessoaController::index();
    break;
    
    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/form/save':
        PessoaController::save();
    break;

    case '/pessoa/delete':
        PessoaController::delete();
    break;

    case '/medicamento':
        MedicamentoController::index();
    break;

    case '/medicamento/formConsulta':
        MedicamentoController::formConsulta();
    break;

    case '/medicamento/Consultar';
        MedicamentoController::Consulta();
    break;

    case '/medicamento/form':
        MedicamentoController::form();
    break;

    case '/medicamento/form/save':
        MedicamentoController::save();
    break;
        /*
    case '/paciente';
        PessoaController:: indexPaciente();

    case '/paciente/descricao/save':
        PessoaController::saveDescription();
    break;
        */

    case '/prescricao/form':
        PrescricaoController::form();
    break;

    case '/prescricao/form/save':
        PrescricaoController::save();
    break;

    default:
        header("HTTP/1.0 404 Not Found");
        echo "Erro 404";
    break;
}
?>