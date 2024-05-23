<?php
class Auth
{
    public static function validador()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) 
        {
            // Se não estiver logado, define a mensagem de erro e redireciona para a página de login
            $_SESSION['error_message'] = "Por favor, faça login para acessar esta página.";
            header("Location: /form/login");
            exit();
        }
    }


    public static function iniciarSessao($result)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($result)) {
            // Se os dados de login forem encontrados, inicia a sessão
            $_SESSION["logged_in"] = true;
            return true;
        } else {
            // Se os dados de login não forem encontrados, define a mensagem de erro e redireciona para o formulário de login
            $_SESSION['error_message'] = "Usuário ou senha incorretos.";
            header('Location: /form/login');
            exit();
        }
        }
        

    
    public static function exibirMensagemErro()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se existe uma mensagem de erro na variável de sessão
        if (isset($_SESSION['error_message'])) {
        
            echo '<div style="color: red;">' . $_SESSION['error_message'] . '</div>';

            // Limpa a variável de sessão para que a mensagem de erro não persista após um novo acesso à página de login
            unset($_SESSION['error_message']);
        }
    }


    public static function exibirMensagemSucesso()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty( $_SESSION['success_message'])) {
        
            echo '<div>' . $_SESSION['success_message'] . '</div>';

            unset($_SESSION['success_message']);

         
        }
    }   



    public static function logout()
    {
        session_start();

       
        session_destroy();

        // Redireciona o usuário para a página de login
        header("Location: /");
        exit();
    }
}
?>
