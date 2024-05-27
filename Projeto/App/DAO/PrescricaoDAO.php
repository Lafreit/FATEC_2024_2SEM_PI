<?php
    include 'App/DAO/PessoaDAO.php';
    class PrescricaoDAO extends PessoaDAO
    {
        public $sucess;
        public function __construct()
        {
            parent ::__construct();
        }

        public function PrescricaoMedica(PrescricaoModel $model)
        {
            try
            {
                $sql = "CALL prescrever_medicacao(?, ?, ?, ?, ?, ?)";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindParam(1, $model->cpf);
                $stmt->bindParam(2, $model->id_medicamentosconsulta);
                $stmt->bindParam(3, $model->dosagem);
                $stmt->bindParam(4, $model->instrucao);
                $stmt->bindParam(5, $model->duracao);
                $stmt->bindParam(6, $model->CRM);
                $stmt->execute();
        
                // Redirecionar para a página de prescrição médica após a execução bem-sucedida
                header("Location: /prescricao/form");
                exit();
            } catch(PDOException $e)
            {
                // Em caso de erro, redirecionar para a página  e exibir mensagem de erro
                echo "<script>alert('Erro ao chamar a procedure: " . $e->getMessage() . "');</script>";
                echo "<script>window.location.href='/prescricao/form';</script>";
                exit();
            }
        }
    }
?>