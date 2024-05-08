<?php 
    class PessoaController
    {
        #cada um dos metodos vai ser responsável por processar uma rota e serão  staticos

        #vai me devolver a lista de dados do usuario
        public static function index()
        {
            include 'App/Model/PessoaModel.php';

            $model = new PessoaModel();
            $model->getAllRows();
            include 'App/View/modules/Pessoa/ListaPessoa.php';
            
        }

        public static function form()
        {
            include 'App/View/modules/Pessoa/CadastroPaciente.php';
        
        }


          
        public static function save()
        {
            include 'App/Model/PessoaModel.php';
            $model = new PessoaModel();
            $model->nome = $_POST['nome'];
            $model->sobrenome = $_POST['sobrenome'];
            $model->cpf = $_POST['cpf'];
            $model->cep = $_POST['cep'];
            $model->estado = $_POST['estado'];
            $model->cidade = $_POST['cidade'];
            $model->rua = $_POST['Rua'];
            $model->numero = $_POST['numero'];
            $model->tipo_Usuario = $_POST['tipo_usuario'];
            $model->plano_saude = $_POST['plano'];
            



            $model->save();

            header("Location: /pessoa");
        }
    }
?>