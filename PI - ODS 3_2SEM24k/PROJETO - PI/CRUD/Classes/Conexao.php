<?php
    namespace Crud{

    use Exception;

        class Conexao
        {
            public function conectarBanco()
            {
                try
                {
                    $Con = new \mysqli("localhost","root", "", "db_clinica");
                    return $Con;
                }
                catch(Exception $Erro)
                {
                    return $Erro->getMessage();
                }
            }
        }
    }
    
    
?>