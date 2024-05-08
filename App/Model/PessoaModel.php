<?php 

    class PessoaModel
    {
       public $id, $nome, $sobrenome, $cpf, $cep, $estado, $cidade, $rua, $numero, $plano_saude, $tipo_Usuario, $senha;

       public $rows;
       
       public function __construct()
       {
        
        $this->senha = $this->gerarSenha($tamanho = 8);
       }


       protected function gerarSenha($tamanho = 8)
       {
           $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
           $senha = '';
           for ($i = 0; $i < $tamanho; $i++) {
               $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
           }
           return $senha;
       }

       public function save()
       {
        include 'App/DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        $dao->insert($this);
       }

       public function getAllRows()
       {
        include 'App/DAO/PessoaDAO.php';
        $dao = new PessoaDAO();

        $this->rows = $dao->select();

       }
    }
?>