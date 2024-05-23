<?php
    include 'App/Model/LoginModel.php';

    class LoginController
    {

        public static function form()
        {
           include('App/View/modules/Pessoa/login.php');
        }
        public static function Autenticar()
        {
            $model = new LoginModel();
            $model->cpf = $_POST['cpf'];
            $model->senha = $_POST['senha'];
            $model->tipo = $_POST['tipo'];
            $model->consultarAcesso();
        }
          

       
            public static function logout()
            {
                // Inicia a sessão se ainda não estiver iniciada
                session_start();
        
                // Destroi todas as variáveis de sessão
                $_SESSION = array();
        
                // Se desejar destruir a sessão completamente, descomente a linha abaixo
                // session_destroy();
        
                // Redireciona o usuário para a página de login
                header("Location: /form/login");
                exit();
            }
      
     
    }



?>