<?php
    namespace Crud{

    use Exception;

        abstract class Conexao
        {
            protected function conectarBanco()
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