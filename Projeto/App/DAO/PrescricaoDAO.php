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

             // Definir a mensagem de sucesso na sessão
             $_SESSION['success_message'] = "Prescrição cadastrada com sucesso";
           
             // Redirecionar para a página de prescrição médica após a execução bem-sucedida
             header("Location: /prescricao/form");
            exit();
        } catch(PDOException $e)
        {
            return "Erro ao chamar a procedure: ". $e->getMessage();
        }
    }
    }


?>