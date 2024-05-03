<?php
 class Conexao
        {
            #host de conexão com o banco
            public $Host = 'localhost';
            public  $Name = 'db_clinica';
            public $User = 'root';
            public $Pass= '';
            #nome da tabela a ser manipulado
            private $table;
            #instancia de conexao com o banco
            private $connection;
            #define a tabela e instância a conexão
            public function __construct($table= null)
            {
              
                $this->table = $table;
                $this->conectarBanco();
            }
            #metodo responsável para realizar uma conexão com o banco
            protected function conectarBanco()
            {
                try
                {
                    $this->connection = new \mysqli('localhost', 'root', '', 'db_clinica');
                }
                catch(Exception $Erro)
                {
                    return $Erro->getMessage();
                }
            }
        }
    
    
?>