<?php
include 'App/DAO/PessoaDAO.php';

class LoginDAO extends PessoaDAO
{
    private $result;

    public function __construct()
    {
        parent::__construct();
    }

    public function validacao(LoginModel $model)
    {
        $tipo = $model->tipo;
        $sql = "";
        $redirect = "";

        if ($tipo == 'Pessoa') {
            $sql = "SELECT p.nome, p.cpf, p.senha FROM paciente p WHERE p.cpf = ? AND p.senha = ?";
            $redirect = "/telaP";
        } elseif ($tipo == 'Medico') {
            $sql = "SELECT m.nomeCompleto, m.cpf, m.senha FROM medico m WHERE m.cpf = ? AND m.senha = ?";
            $redirect = "/telaM";
        } else {
            header('Location: /form/login');
            exit();
        }

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->cpf);
        $stmt->bindValue(2, $model->senha);
        $stmt->execute();

        $this->result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Chama o método de verificação de sessão após a execução da consulta
        $this->sessao();
        header("location: $redirect");

    }

    public function sessao()
    {
        if (!empty($this->result)) {
            // Se os dados de login forem encontrados, inicia a sessão
            session_start();
            $_SESSION["logged_in"] = true;
            return true;
        } else {
            // Se os dados de login não forem encontrados, redireciona para o formulário de login
            header('Location: /form/login');
            exit();
        }
    }
}
?>