<?php 
include_once 'App/DAO/PessoaDAO.php';
class MedicamentoDAO extends PessoaDAO
{
    public function __construct()
    {
        parent ::__construct();

    }

    public function InsertMedication(MedicamentoModel $model)
    {   
        $sql = "INSERT INTO medicacao (paciente_id, nome, quantidade, vezes_ao_dia, duracao_dias) VALUES(?, ?, ?, ?, ?)"; 

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->paciente_id);
        $stmt->bindValue(2, $model->nome);
        $stmt->bindValue(3, $model->quantidade);
        $stmt->bindValue(4, $model->vezes_ao_dia);
        $stmt->bindValue(5, $model->duracao_dias);


        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM medicacao;";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO:: FETCH_CLASS);


    }

    public function Consultar_Medicamento($parametro)
    {   

        try
        {
        $sql = "CALL consultar_medicacao($parametro)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        } catch(PDOException $e)
        {
            return "Erro ao chamar a procedure: ". $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    
}


?>