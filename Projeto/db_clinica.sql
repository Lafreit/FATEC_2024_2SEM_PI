-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
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
CREATE DATABASE IF NOT EXISTS `db_clinica` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_clinica`;

-- Copiando estrutura para procedure db_clinica.consultar_medicacao
DELIMITER //
CREATE PROCEDURE `consultar_medicacao`(IN cpf VARCHAR(70))
BEGIN
  	
	  SELECT p.id, p.nome, m.nome AS 'Medicamento', m.quantidade,
	   m.vezes_ao_dia AS 'VezesAoDia' FROM paciente p INNER JOIN medicacao m ON p.id = m.paciente_id WHERE p.cpf = cpf;
	
	
	END//
DELIMITER ;

-- Copiando estrutura para tabela db_clinica.medicacao
CREATE TABLE IF NOT EXISTS `medicacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `vezes_ao_dia` varchar(70) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  CONSTRAINT `medicacao_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela db_clinica.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf` varchar(70) DEFAULT NULL,
  `cep` varchar(70) DEFAULT NULL,
  `estado` varchar(70) DEFAULT NULL,
  `cidade` varchar(70) DEFAULT NULL,
  `Rua` varchar(70) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `plano_saude` varchar(70) DEFAULT NULL,
  `tipo_Usuario` varchar(70) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
