<?php 

    class PessoaDAO
    {

        protected $conexao;
        public function __construct()
        {
            $dsn = "mysql:host=localhost:3306;dbname=db_clinica";

            $this->conexao = new PDO($dsn, 'root','');

        }
        public function insert(PessoaModel $model)
        {
            #essa string sql vai ser processada, um preparo pra ser executada, evitando injeção de sql
            $sql = "INSERT INTO paciente(nome, sobrenome, cpf, cep, estado, cidade, Rua, numero, plano_saude, tipo_Usuario, senha) Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->sobrenome);
            $stmt->bindValue(3, $model->cpf);
            $stmt->bindValue(4, $model->cep);
            $stmt->bindValue(5, $model->estado);
            $stmt->bindValue(6, $model->cidade);
            $stmt->bindValue(7, $model->rua);
            $stmt->bindValue(8, $model->numero);
            $stmt->bindValue(9, $model->plano_saude);
            $stmt->bindValue(10, $model->tipo_Usuario);
            $stmt->bindValue(11, $model->senha);

            $stmt->execute();
            
        }

        public function update(PessoaModel $model)
        {

        }

        public function select()
        {
            $sql = "SELECT * FROM paciente";

            $stmt = $this->conexao->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        public function delete()
        {
            
        }
    }
?>