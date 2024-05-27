-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/05/2024 às 00:48
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdclinicapi`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultar_medicacao` (IN `cpf_paciente` VARCHAR(20))   BEGIN



 SELECT 
        p.idPaciente, 
        p.nome, 
        m.nomeMedicamento AS 'Medicamento',
        m.tipo, 
        e.descricao, 
        pr.data_prescricao, 
        pr.dosagem,
        me.nome AS 'Doutor(a)',
        me.NumCRM
    FROM 
        paciente p
    LEFT JOIN 
       efeitoscolaterais e ON p.idPaciente = e.id_paciente
    LEFT JOIN 
        prescricao pr ON p.idPaciente = pr.id_paciente
    LEFT JOIN 
        medicamentosconsulta m ON pr.id_medicamentosconsulta = m.idMedicamento
   INNER JOIN
   		medico me ON me.id = p.medico_id
    WHERE
        p.cpf = cpf_paciente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prescrever_medicacao` (IN `cpf_paciente` VARCHAR(20), IN `id_medicamentosconsulta` INT, IN `dosagem` VARCHAR(90), IN `instrucao` VARCHAR(255), IN `duracao` INT, IN `CRM` INT)   BEGIN
DECLARE paciente_id INT;
DECLARE medico_id INT;

-- Consultar o ID do paciente com base no CPF fornecido
SELECT idPaciente INTO paciente_id FROM paciente WHERE cpf = cpf_paciente;
SELECT id INTO medico_id FROM medico WHERE CRM = NumCRM;

-- Verificar se o paciente existe
IF paciente_id IS NULL AND medico_id IS NULL THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Paciente não encontrado';
ELSE
    -- Inserir a prescrição na tabela de prescrições
    INSERT INTO prescricao (id_paciente, id_medicamentosconsulta, duracao, dosagem, instrucao, medico_id)
    VALUES (paciente_id, id_medicamentosconsulta, duracao, dosagem, instrucao, medico_id);

END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `efeitoscolaterais`
--

CREATE TABLE `efeitoscolaterais` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_descricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `idImg` int(11) NOT NULL,
  `caminhoArquivo` varchar(255) NOT NULL,
  `pacienteID` int(11) DEFAULT NULL,
  `medicoID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicamentosconsulta`
--

CREATE TABLE `medicamentosconsulta` (
  `idMedicamento` int(11) NOT NULL,
  `nomeMedicamento` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `uso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `NumCRM` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `PlanoSaude` varchar(255) DEFAULT NULL,
  `tipoPessoa` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prescricao`
--

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medicamentosconsulta` int(11) NOT NULL,
  `data_prescricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `duracao` int(11) NOT NULL,
  `dosagem` varchar(50) NOT NULL,
  `instrucao` varchar(255) DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `efeitoscolaterais`
--
ALTER TABLE `efeitoscolaterais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Índices de tabela `medicamentosconsulta`
--
ALTER TABLE `medicamentosconsulta`
  ADD PRIMARY KEY (`idMedicamento`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `medico_id` (`medico_id`);

--
-- Índices de tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medicamentosconsulta` (`id_medicamentosconsulta`),
  ADD KEY `medico_id` (`medico_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `efeitoscolaterais`
--
ALTER TABLE `efeitoscolaterais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicamentosconsulta`
--
ALTER TABLE `medicamentosconsulta`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `efeitoscolaterais`
--
ALTER TABLE `efeitoscolaterais`
  ADD CONSTRAINT `efeitoscolaterais_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE;

--
-- Restrições para tabelas `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `prescricao`
--
ALTER TABLE `prescricao`
  ADD CONSTRAINT `prescricao_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescricao_ibfk_2` FOREIGN KEY (`id_medicamentosconsulta`) REFERENCES `medicamentosconsulta` (`idMedicamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescricao_ibfk_3` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
