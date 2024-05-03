<?php

 include ('CRUD/DB/Conexao.php');
class Paciente
{
    public $id;
    public $nome;
    public $cep;
    public $estado;
    public $cidade;
    public $Rua;
    public $numero;
    public $tipoUser;
    public $planoSaude;
    public $senha;
    public $data;

    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');
        $DB = new Conexao('paciente');
        echo "<pre>"; print_r($DB); echo"</pre>"; exit;


    }
    

}
 
 
 ?>