<?php 

    class PessoaModel
    {
       public $idPaciente, $nome, $sobrenome, $cpf, $cep, $estado, $cidade, $rua, $numero, $planoSaude, $tipoPessoa, $senha;



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


            if(empty($this->idPaciente))
            {
                $dao->insert($this);

               
             
             
            } else
            {
                $dao->update($this);
               
        
            }

        }

        public function delete(int $idPaciente)
        {
            include 'App/DAO/PessoaDAO.php';

            $dao = new PessoaDAO();
            $dao->delete($idPaciente);
        }



       public function getAllRows()
       {
        include 'App/DAO/PessoaDAO.php';
        $dao = new PessoaDAO();

        $this->rows = $dao->select();

       }




       public function getById(int $idPaciente)
       {
        include 'App/DAO/PessoaDAO.php';
        $dao = new PessoaDAO(); 
        $obj =  $dao->selectById($idPaciente);

        return ($obj) ? $obj : new PessoaModel;

        }


        /*
        public function saveDescription()
        {
            include 'App/DAO/PessoaDAO.php';
            $dao = new PessoaDAO();
            $obj = $dao->insertDescription($this->descricao);
        }
        */
    
    }
      
    
?>