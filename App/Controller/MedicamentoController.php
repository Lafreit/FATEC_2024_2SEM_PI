<?php 
class MedicamentoController{



public static function index()
{
    include 'App/Model/MedicamentoModel.php';

    $model = new MedicamentoModel();
    $model->getAllRows();
    include 'App/View/modules/Pessoa/ListaMedicamento.php';
}




public static function form()
{
    include 'App/View/modules/Pessoa/CadastrarMedicacao.php';
}




public static function save()
{
    include 'App/Model/MedicamentoModel.php';
    $model = new MedicamentoModel();
    $model->paciente_id = $_POST['paciente_id'];
    $model->nome = $_POST['nome'];
    $model->quantidade = $_POST['quantidade'];
    $model->vezes_ao_dia = $_POST['vezes_ao_dia'];


    $model->save();

    header("Location: /medicamento");

   
}

public static function formConsulta()
{
    include 'App/View/modules/Pessoa/ConsultarCPF.php';
}



public static function Consulta()
{
    include 'App/Model/MedicamentoModel.php';
    $model = new MedicamentoModel();
    $model->parametro = $_POST['id'];

    $model->consulta();

    include 'App/View/modules/Pessoa/ConsultarP.php';


}


}

?>