


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_medicacao` (IN `cpf_paciente` VARCHAR(20))   BEGIN
DECLARE paciente_id INT;


 SELECT 
        p.idPaciente, 
        p.nome, 
        m.nomeMedicamento AS 'Medicamento',
        m.tipo, 
        e.descricao, 
        pr.data_prescricao, 
        pr.dosagem
    FROM 
        paciente p
    LEFT JOIN 
        efeitoscolaterais e ON p.idPaciente = e.pacienteID AND p.cpf = cpf
    INNER JOIN 
        prescricao pr ON p.idPaciente = pr.id_paciente
    INNER JOIN 
        medicamentosconsulta m ON pr.id_medicamentosconsulta = m.idMedicamento
    WHERE
        p.cpf = cpf_paciente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prescrever_medicacao` (IN `cpf_paciente` VARCHAR(20), IN `id_medicamentosconsulta` INT, IN `dosagem` VARCHAR(90), IN `instrucao` VARCHAR(255), IN `duracao` INT)   BEGIN
DECLARE paciente_id INT;


SELECT idPaciente INTO paciente_id FROM paciente WHERE cpf = cpf_paciente;


IF paciente_id IS NULL THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Paciente não encontrado';
ELSE

    INSERT INTO prescricao (id_paciente, id_medicamentosconsulta, duracao, dosagem, instrucao)
    VALUES (paciente_id, id_medicamentosconsulta, duracao, dosagem, instrucao);

END IF;

END$$

DELIMITER ;

CREATE TABLE `efeitoscolaterais` (
  `idEfeitosColaterais` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `pacienteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `imagem` (
  `idImg` int(11) NOT NULL,
  `caminhoArquivo` varchar(255) NOT NULL,
  `pacienteID` int(11) DEFAULT NULL,
  `medicoID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `medicamentosconsulta` (
  `idMedicamento` int(11) NOT NULL,
  `nomeMedicamento` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `uso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `medico` (
  `numCRM` int(20) NOT NULL,
  `nomeCompleto` varchar(150) NOT NULL,
  `dataNascimento` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `telefone` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
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
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medicamentosconsulta` int(11) NOT NULL,
  `data_prescricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `duracao` int(11) NOT NULL,
  `dosagem` varchar(50) NOT NULL,
  `instrucao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `efeitoscolaterais`
  ADD PRIMARY KEY (`idEfeitosColaterais`),
  ADD KEY `pacienteID` (`pacienteID`);

ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idImg`),
  ADD KEY `pacienteID` (`pacienteID`),
  ADD KEY `medicoID` (`medicoID`);

ALTER TABLE `medicamentosconsulta`
  ADD PRIMARY KEY (`idMedicamento`);

ALTER TABLE `medico`
  ADD PRIMARY KEY (`numCRM`);

ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medicamentosconsulta` (`id_medicamentosconsulta`);


ALTER TABLE `efeitoscolaterais`
  MODIFY `idEfeitosColaterais` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `imagem`
  MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `medicamentosconsulta`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `efeitoscolaterais`
  ADD CONSTRAINT `efeitoscolaterais_ibfk_1` FOREIGN KEY (`pacienteID`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_ibfk_1` FOREIGN KEY (`pacienteID`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagem_ibfk_2` FOREIGN KEY (`medicoID`) REFERENCES `medico` (`numCRM`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `prescricao`
  ADD CONSTRAINT `prescricao_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescricao_ibfk_2` FOREIGN KEY (`id_medicamentosconsulta`) REFERENCES `medicamentosconsulta` (`idMedicamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
