-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_clinica
CREATE DATABASE IF NOT EXISTS `db_clinica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_clinica`;

-- Copiando estrutura para procedure db_clinica.consultar_medicacao
DELIMITER //
CREATE PROCEDURE `consultar_medicacao`(IN cpf VARCHAR(13))
BEGIN 

SELECT p.id, p.nome, m.nome AS 'Medicamento',m.quantidade, m.vezes_ao_dia AS 'VezesAoDia' FROM paciente p INNER JOIN medicacao m ON p.id = m.paciente_id AND p.cpf = cpf;

END//
DELIMITER ;

-- Copiando estrutura para tabela db_clinica.medicacao
CREATE TABLE IF NOT EXISTS `medicacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `vezes_ao_dia` varchar(40) NOT NULL,
  `duracao_dias` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_paciente_id` (`paciente_id`),
  CONSTRAINT `fk_paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE,
  CONSTRAINT `medicacao_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_clinica.medico
CREATE TABLE IF NOT EXISTS `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `sobrenome` varchar(90) NOT NULL,
  `crm` char(7) NOT NULL,
  `especialidade` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_clinica.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `sobrenome` varchar(70) NOT NULL,
  `cpf` varchar(70) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `rua` varchar(90) NOT NULL,
  `numero` int(11) NOT NULL,
  `plano_saude` varchar(50) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
