CREATE DATABASE IF NOT EXISTS `bdclinicapi`;
USE `bdclinicapi`;

-- Tabela 'paciente'
CREATE TABLE IF NOT EXISTS `paciente` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(14) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `numero` int(5) NOT NULL,
  `planoSaude` varchar(50) NOT NULL,
  `tipoPessoa` varchar(20) NOT NULL,
  `senha` varchar(16) NOT NULL,
  PRIMARY KEY (`idPaciente`),
  UNIQUE KEY `cpf` (`cpf`)
);

-- Tabela 'medico'
CREATE TABLE IF NOT EXISTS `medico` (
  `numCRM` int(20) NOT NULL,
  `nomeCompleto` varchar(150) NOT NULL,
  `dataNascimento` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `telefone` varchar(24) NOT NULL,
  PRIMARY KEY (`numCRM`),
  UNIQUE KEY `cpf` (`cpf`)
);

-- Tabela 'efeitoscolaterais'
CREATE TABLE IF NOT EXISTS `efeitoscolaterais` (
  `idEfeitosColaterais` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `pacienteID` int(11) NOT NULL,
  PRIMARY KEY (`idEfeitosColaterais`),
  KEY `pacienteID` (`pacienteID`),
  CONSTRAINT `efeitoscolaterais_ibfk_1` FOREIGN KEY (`pacienteID`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabela 'imagem'
CREATE TABLE IF NOT EXISTS `imagem` (
  `idImg` int(11) NOT NULL AUTO_INCREMENT,
  `caminhoArquivo` varchar(255) NOT NULL,
  `pacienteID` int(11) DEFAULT NULL,
  `medicoID` int(20) DEFAULT NULL,
  PRIMARY KEY (`idImg`),
  KEY `pacienteID` (`pacienteID`),
  KEY `medicoID` (`medicoID`),
  CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`pacienteID`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `imagem_ibfk_2` FOREIGN KEY (`medicoID`) REFERENCES `medico` (`numCRM`) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabela 'medicamentosconsulta'
CREATE TABLE IF NOT EXISTS `medicamentosconsulta` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nomeMedicamento` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `uso` text NOT NULL,
  PRIMARY KEY (`idMedicamento`)
);

-- Tabela 'prescricao'
CREATE TABLE IF NOT EXISTS `prescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_medicamentosconsulta` int(11) NOT NULL,
  `data_prescricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `duracao` int(11) NOT NULL,
  `dosagem` varchar(50) NOT NULL,
  `instrucao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_medicamentosconsulta` (`id_medicamentosconsulta`),
  CONSTRAINT `prescricao_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prescricao_ibfk_2` FOREIGN KEY (`id_medicamentosconsulta`) REFERENCES `medicamentosconsulta` (`idMedicamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Procedure 'consultar_medicacao'
DELIMITER //
CREATE PROCEDURE `consultar_medicacao`(IN cpf VARCHAR(15))
BEGIN
    SELECT 
        p.idPaciente, 
        p.nome, 
        m.nomeMedicamento AS 'Medicamento',
        m.tipo, 
        e.descricao AS 'Efeitos Colaterais', 
        pr.data_prescricao, 
        pr.dosagem
    FROM 
        paciente p
    LEFT JOIN 
        efeitoscolaterais e ON p.idPaciente = e.pacienteID
    INNER JOIN 
        prescricao pr ON p.idPaciente = pr.id_paciente
    INNER JOIN 
        medicamentosconsulta m ON pr.id_medicamentosconsulta = m.idMedicamento
    WHERE
        p.cpf = cpf;
END//
DELIMITER ;

-- Procedure 'prescrever_medicacao'
DELIMITER //
CREATE PROCEDURE `prescrever_medicacao`(
    IN cpf_paciente VARCHAR(13),
    IN id_medicacao INT,
    IN dosagem VARCHAR(50),
    IN data_prescricao DATE
)
BEGIN 
    DECLARE paciente_id INT;
 
    SELECT idPaciente INTO paciente_id FROM paciente WHERE cpf = cpf_paciente;
    
    IF paciente_id IS NULL THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Paciente não encontrado';
    ELSE
        INSERT INTO prescricao (id_paciente, id_medicamentosconsulta, dosagem, data_prescricao)
        VALUES (paciente_id, id_medicacao, dosagem, data_prescricao);
        
        SELECT 'Prescrição realizada com sucesso' AS mensagem;
    END IF;
END//
DELIMITER ;
