<?php 

    class PessoaDAO
    {

        protected $conexao;
        public function __construct()
        {
            $dsn = "mysql:host=localhost:3306;dbname=bdclinicapi";

            $this->conexao = new PDO($dsn, 'root','');

        }
        public function insert(PessoaModel $model)
        {
            #essa string sql vai ser processada, um preparo pra ser executada, evitando injeção de sql
            $sql = "INSERT INTO paciente(nome, sobrenome, cpf, cep, estado, rua, cidade, numero, planoSaude, tipoPessoa, senha, medico_id) Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->sobrenome);
            $stmt->bindValue(3, $model->cpf);
            $stmt->bindValue(4, $model->cep);
            $stmt->bindValue(5, $model->estado);
            $stmt->bindValue(6, $model->rua);
            $stmt->bindValue(7, $model->cidade);
            $stmt->bindValue(8, $model->numero);
            $stmt->bindValue(9, $model->PlanoSaude);
            $stmt->bindValue(10, $model->tipoPessoa);
            $stmt->bindValue(11, $model->senha);
            $stmt->bindValue(12, $model->medico_id);


            $stmt->execute();
            

            
        }

        public function update(PessoaModel $model)
        {
            

            $sql = "UPDATE paciente SET nome = ?, sobrenome = ?, cpf =?, cep = ?, estado = ?, rua = ?, cidade = ?, numero = ?, planoSaude = ?, tipoPessoa = ?, senha = ?, medico_id = ? where idPaciente = ? ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->sobrenome);
            $stmt->bindValue(3, $model->cpf);
            $stmt->bindValue(4, $model->cep);
            $stmt->bindValue(5, $model->estado);
            $stmt->bindValue(6, $model->rua);
            $stmt->bindValue(7, $model->cidade);
            $stmt->bindValue(8, $model->numero);
            $stmt->bindValue(9, $model->PlanoSaude);
            $stmt->bindValue(10, $model->tipoPessoa);
            $stmt->bindValue(11, $model->senha);
            $stmt->bindValue(12, $model->medico_id);
            $stmt->bindValue(13, $model->idPaciente);

            $stmt->execute();
        }

        public function select($medico_id)
        {
            include_once 'App/Model/PessoaModel.php';
            $sql = "SELECT * FROM paciente WHERE medico_id = ?";
        
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $medico_id); // Use o parâmetro $medico_id aqui
        
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'PessoaModel'); // Use FETCH_CLASS para retornar objetos do tipo PessoaModel
        }

        public function delete(int $idPaciente)
        {
            $sql = "DELETE  FROM paciente where idPaciente = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $idPaciente);

            $stmt->execute();

        }



        public function selectById(int $idPaciente)
        {
            include_once 'App/Model/PessoaModel.php';
            $sql = "SELECT * FROM paciente where idPaciente = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $idPaciente);

            $stmt->execute();

            return $stmt->fetchObject("PessoaModel");
        }


        /*
        public function insertDescription()
        {
            $sql = "INSERT INTO efeitoscolaterais(descricao, pacienteID) Values(?, ?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->$idPaciente);

            $stmt->execute();
        }
        */
    }
?>