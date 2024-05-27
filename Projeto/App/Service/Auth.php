<?php

class Auth
{
    public static function validador()
    {
        self::startSession();

        if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
            self::setErrorMessage("Por favor, faça login para acessar esta página.");
            self::redirect("/form/login");
        }
    }

    public static function iniciarSessao($result)
    {
        self::startSession();

        if (!empty($result)) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] = $result['id'];
            $_SESSION["user_data"] = $result;
            return true;
        } else {
            self::setErrorMessage("Usuário ou senha incorretos.");
            self::redirect("/form/login");
            return false;
        }
    }

    public static function getLoggedInUserId()
    {
        self::startSession();

        return isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true ? $_SESSION["user_id"] : null;
    }



    public static function logout()
    {
        self::startSession();
        session_destroy();
        self::redirect("/");
    }

    private static function setErrorMessage($message)
    {
        $_SESSION['error_message'] = $message;
    }

    private static function redirect($location)
    {
        header("Location: $location");
        exit();
    }

    private static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}

?>