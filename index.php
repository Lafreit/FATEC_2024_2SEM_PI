<?php
include 'App/Controller/PessoaController.php'; 
include 'App/Controller/MedicamentoController.php';
    
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



        case '/medicamento':
            MedicamentoController:: index();
        break;

        
        case '/medicamento/formConsulta':
            MedicamentoController::formConsulta();
        break;

        

        case'/medicamento/Consultar';
            MedicamentoController::Consulta();
        break;

        
        

        case '/medicamento/form':
            MedicamentoController::form();
        break;
        

        case '/medicamento/form/save':
            MedicamentoController::save();
        break;

        default:
            echo "Erro 404";
        break;
        
    }
     /*
   
    if ($_SERVER['REQUEST_URI'] !== '/caminho/desejado') {
        // Redirecionar para a URL desejada
        header('Location: /caminho/desejado', true, 301);
        exit;
    }
     */
?>