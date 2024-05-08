<?php 
class MedicamentoController{



public static function index()
{
    include 'App/Model/MedicamentoModel.php';

    $model = new MedicamentoModel();
    $model->getAllRows();
    include 'App/View/modules/Medicação/ListaMedicamento.php';
}




public static function form()
{
    include 'App/View/modules/Medicação/CadastrarMedicacao.php';
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
    if(isset($_POST['cpf'])) {
        // Atribui o valor do campo 'cpf' à propriedade 'parametro' do modelo
        $model->parametro = $_POST['cpf'];

        // Realiza a consulta utilizando o método 'consulta' do modelo
        $model->consulta();

    } else {
        // Se o campo 'cpf' não foi enviado através do método POST, exibe uma mensagem de erro
        echo "O campo 'cpf' não foi enviado através do formulário.";
    }

    // Inclui a view ConsultarP.php
    include 'App/View/modules/Pessoa/ConsultarP.php';
}

}
?>