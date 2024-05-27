-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/05/2024 às 00:29
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

--
-- Despejando dados para a tabela `efeitoscolaterais`
--

INSERT INTO `efeitoscolaterais` (`id`, `descricao`, `data_descricao`, `id_paciente`) VALUES
(1, 'Náusea', '2024-05-27 18:25:42', 5);

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

--
-- Despejando dados para a tabela `medicamentosconsulta`
--

INSERT INTO `medicamentosconsulta` (`idMedicamento`, `nomeMedicamento`, `fabricante`, `tipo`, `uso`) VALUES
(1, 'Dipirona', 'Genérico', 'Analgésico', 'Dor de cabeça, febre, dor muscular'),
(2, 'Paracetamol', 'Genérico', 'Analgésico', 'Dor de cabeça, febre'),
(3, 'Ibuprofeno', 'Genérico', 'Anti-inflamatório', 'Dor muscular, inflamação'),
(4, 'Omeprazol', 'Genérico', 'Inibidor de bomba de prótons', 'Refluxo ácido, úlcera péptica'),
(5, 'Amoxicilina', 'Genérico', 'Antibiótico', 'Infecções bacterianas, sinusite'),
(6, 'Dexametasona', 'Genérico', 'Corticosteroide', 'Inflamações, alergias'),
(7, 'Cloridrato de Ciprofloxacino', 'Genérico', 'Antibiótico', 'Infecções bacterianas, cistite'),
(8, 'Dipirona Sódica + Cafeína', 'Genérico', 'Analgésico', 'Dor de cabeça, enxaqueca'),
(9, 'Cetoprofeno', 'Genérico', 'Anti-inflamatório', 'Dor muscular, inflamação'),
(10, 'Cloridrato de Tramadol', 'Genérico', 'Analgésico opioide', 'Dor moderada a severa'),
(11, 'Ranitidina', 'Genérico', 'Antagonista dos receptores H2', 'Úlcera péptica, refluxo ácido'),
(12, 'Azitromicina', 'Genérico', 'Antibiótico', 'Infecções respiratórias, sinusite'),
(13, 'Dipirona Sódica', 'Genérico', 'Analgésico', 'Dor de cabeça, febre'),
(14, 'Prednisona', 'Genérico', 'Corticosteroide', 'Inflamações, alergias'),
(15, 'Cefalexina', 'Genérico', 'Antibiótico', 'Infecções bacterianas, infecções de pele'),
(16, 'Metformina', 'Genérico', 'Hipoglicemiante', 'Diabetes tipo 2'),
(17, 'Sinvastatina', 'Genérico', 'Estatina', 'Colesterol alto, prevenção de doenças cardiovasculares'),
(18, 'Losartana Potássica', 'Genérico', 'Bloqueador do receptor de angiotensina II', 'Hipertensão arterial, insuficiência cardíaca'),
(19, 'Hidroclorotiazida', 'Genérico', 'Diurético', 'Hipertensão arterial, edema'),
(20, 'Loratadina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(21, 'Enalapril', 'Genérico', 'Inibidor da enzima conversora de angiotensina (IECA)', 'Hipertensão arterial, insuficiência cardíaca'),
(22, 'Diclofenaco Sódico', 'Genérico', 'Anti-inflamatório não esteroide (AINE)', 'Dor muscular, inflamação'),
(23, 'Metronidazol', 'Genérico', 'Antibiótico', 'Infecções bacterianas, infecções parasitárias'),
(24, 'Nimesulida', 'Genérico', 'Anti-inflamatório não esteroide (AINE)', 'Dor leve a moderada, inflamação'),
(25, 'Cloridrato de Sertralina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina (ISRS)', 'Depressão, transtorno obsessivo-compulsivo (TOC)'),
(26, 'Levotiroxina Sódica', 'Genérico', 'Hormônio da tireoide', 'Hipotireoidismo'),
(27, 'Dextrometorfano', 'Genérico', 'Antitussígeno', 'Tosse seca'),
(28, 'Lansoprazol', 'Genérico', 'Inibidor de bomba de prótons', 'Refluxo ácido, úlcera péptica'),
(29, 'Ceftriaxona', 'Genérico', 'Antibiótico', 'Infecções bacterianas graves, meningite'),
(30, 'Fluconazol', 'Genérico', 'Antifúngico', 'Infecções fúngicas, candidíase'),
(31, 'Bromoprida', 'Genérico', 'Antiemético', 'Náuseas, vômitos'),
(32, 'Sulfato de Salbutamol', 'Genérico', 'Broncodilatador', 'Asma, doença pulmonar obstrutiva crônica (DPOC)'),
(33, 'Olanzapina', 'Genérico', 'Antipsicótico', 'Esquizofrenia, transtorno bipolar'),
(34, 'Pantoprazol', 'Genérico', 'Inibidor de bomba de prótons', 'Refluxo ácido, úlcera péptica'),
(35, 'Amitriptilina', 'Genérico', 'Antidepressivo tricíclico', 'Depressão, dor crônica'),
(36, 'Ciprofloxacino', 'Genérico', 'Antibiótico', 'Infecções bacterianas, cistite'),
(37, 'Cloridrato de Sibutramina', 'Genérico', 'Inibidor de recaptação de serotonina e noradrenalina (IRSN)', 'Obesidade'),
(38, 'Diclofenaco Potássico', 'Genérico', 'Anti-inflamatório não esteroide (AINE)', 'Dor muscular, inflamação'),
(39, 'Budesonida', 'Genérico', 'Corticosteroide', 'Asma, doença pulmonar obstrutiva crônica (DPOC)'),
(40, 'Carbonato de Lítio', 'Genérico', 'Estabilizador de humor', 'Transtorno bipolar'),
(41, 'Cloridrato de Ciclobenzaprina', 'Genérico', 'Relaxante muscular', 'Espasmos musculares, dor lombar'),
(42, 'Candesartana Cilexetila', 'Genérico', 'Bloqueador do receptor de angiotensina II', 'Hipertensão arterial, insuficiência cardíaca'),
(43, 'Escitalopram', 'Genérico', 'Inibidor seletivo da recaptação de serotonina (ISRS)', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(44, 'Rosuvastatina Cálcica', 'Genérico', 'Estatina', 'Colesterol alto, prevenção de doenças cardiovasculares'),
(45, 'Sulfato de Neomicina', 'Genérico', 'Antibiótico', 'Infecções bacterianas, queimaduras'),
(46, 'Risperidona', 'Genérico', 'Antipsicótico', 'Esquizofrenia, transtorno bipolar'),
(47, 'Cloridrato de Cetirizina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(48, 'Cloridrato de Paroxetina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina (ISRS)', 'Depressão, transtorno de ansiedade'),
(49, 'Valsartana', 'Genérico', 'Bloqueador do receptor de angiotensina II', 'Hipertensão arterial, insuficiência cardíaca'),
(50, 'Cefuroxima Axetila', 'Genérico', 'Antibiótico', 'Infecções bacterianas, sinusite'),
(51, 'Fexofenadina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(52, 'Nifedipino', 'Genérico', 'Bloqueador dos canais de cálcio', 'Hipertensão arterial, angina'),
(53, 'Metronidazol + Nistatina', 'Genérico', 'Antibiótico e antifúngico', 'Infecções bacterianas e fúngicas, vaginite'),
(54, 'Cetotifeno', 'Genérico', 'Antialérgico', 'Asma, rinite alérgica'),
(55, 'Drospirenona + Etinilestradiol', 'Genérico', 'Anticoncepcional oral combinado', 'Contracepção'),
(56, 'Sulfametoxazol + Trimetoprima', 'Genérico', 'Antibiótico', 'Infecções bacterianas, infecções do trato urinário'),
(57, 'Atenolol', 'Genérico', 'Bloqueador beta-adrenérgico', 'Hipertensão arterial, angina'),
(58, 'Amoxicilina + Clavulanato de Potássio', 'Genérico', 'Antibiótico', 'Infecções bacterianas, sinusite'),
(59, 'Rivotril', 'Genérico', 'Benzodiazepínico', 'Ansiedade, epilepsia'),
(60, 'Clobetasol', 'Genérico', 'Corticosteroide', 'Dermatite, psoríase'),
(61, 'Cloridrato de Metadona', 'Genérico', 'Analgésico opioide', 'Dor moderada a severa, terapia de substituição de opioides'),
(62, 'Fluoxetina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina (ISRS)', 'Depressão, transtorno obsessivo-compulsivo (TOC)'),
(63, 'Sinvastatina + Ezetimiba', 'Genérico', 'Estatina + inibidor da absorção do colesterol', 'Colesterol alto'),
(64, 'Levoletiracetam', 'Genérico', 'Anticonvulsivante', 'Epilepsia'),
(65, 'Doxiciclina', 'Genérico', 'Antibiótico', 'Infecções bacterianas, acne'),
(66, 'Telmisartana', 'Genérico', 'Bloqueador do receptor de angiotensina II', 'Hipertensão arterial, insuficiência cardíaca'),
(67, 'Furosemida', 'Genérico', 'Diurético de alça', 'Hipertensão arterial, edema'),
(68, 'Cloridrato de Fluoxetina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina (ISRS)', 'Depressão, transtorno obsessivo-compulsivo (TOC)'),
(69, 'Loperamida', 'Genérico', 'Antidiarreico', 'Diarreia'),
(70, 'Cetoprofeno', 'Genérico', 'Anti-inflamatório não esteroide (AINE)', 'Dor muscular, inflamação'),
(71, 'Nimesulida + Cetoprofeno', 'Genérico', 'Anti-inflamatório não esteroide (AINE)', 'Dor muscular, inflamação'),
(72, 'Sinvastatina + Atorvastatina', 'Genérico', 'Estatina', 'Colesterol alto'),
(73, 'Cloridrato de Betaxolol', 'Genérico', 'Bloqueador beta-adrenérgico', 'Glaucoma, hipertensão arterial'),
(74, 'Cloridrato de Bupropiona', 'Genérico', 'Antidepressivo atípico', 'Depressão, cessação do tabagismo'),
(75, 'Hidroxicloroquina', 'Genérico', 'Agente antimalárico', 'Malária, artrite reumatoide'),
(76, 'Cetoprofeno + Cloridrato de Ciclobenzaprina', 'Genérico', 'Anti-inflamatório + relaxante muscular', 'Dor muscular, inflamação'),
(77, 'Clonazepam', 'Genérico', 'Benzodiazepínico', 'Ansiedade, distúrbios do sono'),
(78, 'Cloridrato de Tansulosina', 'Genérico', 'Bloqueador alfa-adrenérgico', 'Hiperplasia prostática benigna'),
(79, 'Cloridrato de Fluoxetina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico', 'Depressão, transtorno depressivo maior'),
(80, 'Sinvastatina + Rosuvastatina', 'Genérico', 'Estatina', 'Colesterol alto'),
(81, 'Cloridrato de Metformina', 'Genérico', 'Hipoglicemiante', 'Diabetes tipo 2'),
(82, 'Cloridrato de Fexofenadina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(83, 'Miconazol', 'Genérico', 'Antifúngico', 'Infecções fúngicas, candidíase'),
(84, 'Difosfato de Cloroquina', 'Genérico', 'Agente antimalárico', 'Malária, artrite reumatoide'),
(85, 'Cloridrato de Metoclopramida', 'Genérico', 'Antiemético', 'Náuseas, vômitos'),
(86, 'Cloridrato de Nortriptilina', 'Genérico', 'Antidepressivo tricíclico', 'Depressão, dor crônica'),
(87, 'Paracetamol + Cafeína', 'Genérico', 'Analgésico', 'Dor de cabeça, febre'),
(88, 'Cloridrato de Tiamina', 'Genérico', 'Vitamina B1', 'Deficiência de tiamina'),
(89, 'Cloridrato de Donepezila', 'Genérico', 'Inibidor da acetilcolinesterase', 'Doença de Alzheimer, demência'),
(90, 'Cloridrato de Metadona + Cloridrato de Ciclobenzaprina', 'Genérico', 'Analgésico opioide + relaxante muscular', 'Dor moderada a severa, espasmos musculares'),
(91, 'Cloridrato de Ciclobenzaprina + Diclofenaco Sódico', 'Genérico', 'Relaxante muscular + anti-inflamatório não esteroide (AINE)', 'Espasmos musculares, inflamação'),
(92, 'Carbonato de Cálcio + Colecalciferol', 'Genérico', 'Suplemento de cálcio e vitamina D', 'Deficiência de cálcio, prevenção de osteoporose'),
(93, 'Cloridrato de Amiodarona', 'Genérico', 'Antiarrítmico', 'Arritmias cardíacas, fibrilação atrial'),
(94, 'Cloridrato de Loperamida', 'Genérico', 'Antidiarreico', 'Diarreia'),
(95, 'Cloridrato de Ranitidina', 'Genérico', 'Antagonista dos receptores H2', 'Úlcera péptica, refluxo ácido'),
(96, 'Cloridrato de Hidroxizina', 'Genérico', 'Antialérgico', 'Urticária, dermatite'),
(97, 'Cloridrato de Ciclobenzaprina + Paracetamol', 'Genérico', 'Relaxante muscular + analgésico', 'Espasmos musculares, dor'),
(98, 'Levocetirizina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(99, 'Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Antidepressivo atípico + antagonista dos receptores opioides', 'Obesidade, cessação do tabagismo'),
(100, 'Carbonato de Lítio + Cloreto de Potássio', 'Genérico', 'Estabilizador de humor + suplemento de potássio', 'Transtorno bipolar, deficiência de potássio'),
(101, 'Cloridrato de Amitriptilina + Cloridrato de Amitriptilina + Cloridrato de Clorpromazina', 'Genérico', 'Analgésico opioide + antidepressivo tricíclico + neuroléptico', 'Dor neuropática, depressão resistente ao tratamento'),
(102, 'Cloridrato de Metadona + Naloxona', 'Genérico', 'Analgésico opioide + antagonista dos receptores opioides', 'Dor moderada a severa, terapia de substituição de opioides'),
(103, 'Cloridrato de Benazepril', 'Genérico', 'Inibidor da enzima conversora de angiotensina (IECA)', 'Hipertensão arterial, insuficiência cardíaca'),
(104, 'Cloridrato de Ondansetrona', 'Genérico', 'Antiemético', 'Náuseas, vômitos'),
(105, 'Cloridrato de Tramadol + Paracetamol', 'Genérico', 'Analgésico opioide + analgésico', 'Dor moderada a severa'),
(106, 'Sinvastatina + Losartana Potássica', 'Genérico', 'Estatina + bloqueador do receptor de angiotensina II', 'Colesterol alto, hipertensão arterial'),
(107, 'Cloridrato de Lidocaína', 'Genérico', 'Anestésico local', 'Anestesia tópica, procedimentos médicos'),
(108, 'Cloridrato de Venlafaxina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN)', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(109, 'Brometo de Otilônio', 'Genérico', 'Antiespasmódico', 'Síndrome do intestino irritável, cólicas abdominais'),
(110, 'Cloridrato de Doxiciclina', 'Genérico', 'Antibiótico', 'Infecções bacterianas, acne'),
(111, 'Cloridrato de Desloratadina', 'Genérico', 'Antialérgico', 'Rinite alérgica, urticária'),
(112, 'Cloridrato de Dicloridrato de Cetotifeno', 'Genérico', 'Antialérgico', 'Asma, rinite alérgica'),
(113, 'Sulfato de Neomicina + Bacitracina', 'Genérico', 'Antibiótico tópico', 'Feridas, infecções cutâneas'),
(114, 'Cloridrato de Labetalol', 'Genérico', 'Bloqueador alfa e beta-adrenérgico', 'Hipertensão arterial, emergência hipertensiva'),
(115, 'Cloridrato de Duloxetina', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN)', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(116, 'Cloridrato de Donepezila + Cloridrato de Memantina', 'Genérico', 'Inibidor da acetilcolinesterase + antagonista do receptor NMDA', 'Doença de Alzheimer, demência'),
(117, 'Cloridrato de Meclizina', 'Genérico', 'Anti-histamínico', 'Náuseas, vertigem'),
(118, 'Brometo de Ipratrópio', 'Genérico', 'Broncodilatador', 'Doença pulmonar obstrutiva crônica (DPOC), bronquite'),
(119, 'Cloridrato de Dapagliflozina', 'Genérico', 'Inibidor do cotransportador de sódio-glicose 2 (SGLT2)', 'Diabetes tipo 2'),
(120, 'Cloridrato de Topiramato', 'Genérico', 'Anticonvulsivante', 'Epilepsia, enxaqueca'),
(121, 'Cloridrato de Fluoxetina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico + antagonista dos receptores opioides', 'Obesidade, depressão'),
(122, 'Cloridrato de Venlafaxina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN) + antidepressivo atípico', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(123, 'Cloridrato de Betametasona', 'Genérico', 'Corticosteroide', 'Inflamações, alergias'),
(124, 'Sulfato de Condroitina + Sulfato de Glucosamina', 'Genérico', 'Suplemento para saúde das articulações', 'Osteoartrite, dores articulares'),
(125, 'Cloridrato de Tansulosina + Dutasterida', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase', 'Hiperplasia prostática benigna'),
(126, 'Cloridrato de Memantina', 'Genérico', 'Antagonista do receptor NMDA', 'Doença de Alzheimer, demência'),
(127, 'Cloridrato de Sertralina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(128, 'Cloridrato de Dapagliflozina + Cloridrato de Metformina', 'Genérico', 'Inibidor do cotransportador de sódio-glicose 2 (SGLT2) + hipoglicemiante', 'Diabetes tipo 2'),
(129, 'Cloridrato de Sotalol', 'Genérico', 'Bloqueador beta-adrenérgico', 'Arritmias cardíacas, taquicardia'),
(130, 'Cloridrato de Metoclopramida + Dimeticona', 'Genérico', 'Antiêmético + antiflatulento', 'Náuseas, flatulência'),
(131, 'Cloridrato de Benzonatato', 'Genérico', 'Antitussígeno', 'Tosse'),
(132, 'Cloridrato de Mebeverina', 'Genérico', 'Antiespasmódico', 'Síndrome do intestino irritável, cólicas abdominais'),
(133, 'Cloridrato de Duloxetina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN) + antidepressivo atípico', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(134, 'Cloridrato de Terbinafina', 'Genérico', 'Antifúngico', 'Infecções fúngicas, pé de atleta'),
(135, 'Cloridrato de Metformina + Cloridrato de Saxagliptina', 'Genérico', 'Hipoglicemiante', 'Diabetes tipo 2'),
(136, 'Cloridrato de Pramipexol', 'Genérico', 'Agonista dopaminérgico', 'Doença de Parkinson, síndrome das pernas inquietas'),
(137, 'Carbonato de Cálcio + Vitamina D3', 'Genérico', 'Suplemento de cálcio e vitamina D', 'Deficiência de cálcio, prevenção de osteoporose'),
(138, 'Cloridrato de Hidroxizina + Cloridrato de Ranitidina', 'Genérico', 'Antialérgico + antagonista dos receptores H2', 'Urticária, refluxo ácido'),
(139, 'Cloridrato de Metilfenidato', 'Genérico', 'Estimulante do sistema nervoso central', 'Transtorno do déficit de atenção e hiperatividade (TDAH)'),
(140, 'Cloridrato de Metoclopramida + Dimeticona + Hioscina', 'Genérico', 'Antiêmético + antiflatulento + antiespasmódico', 'Náuseas, flatulência, cólicas abdominais'),
(141, 'Cloridrato de Venlafaxina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN) + antidepressivo atípico + antagonista dos receptores opioides', 'Depressão, transtorno de ansiedade generalizada (TAG), obesidade'),
(142, 'Cloridrato de Amiodarona + Sinvastatina', 'Genérico', 'Antiarrítmico + estatina', 'Arritmias cardíacas, colesterol alto'),
(143, 'Cloridrato de Fexofenadina + Cloridrato de Pseudoefedrina', 'Genérico', 'Antialérgico + descongestionante', 'Rinite alérgica, congestão nasal'),
(144, 'Cloridrato de Sertralina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico + antagonista dos receptores opioides', 'Depressão, transtorno de ansiedade generalizada (TAG), obesidade'),
(145, 'Cloridrato de Pramipexol + Cloridrato de Carbidopa + Levodopa', 'Genérico', 'Agonista dopaminérgico + inibidor da descarboxilase da dopa + precursor da dopamina', 'Doença de Parkinson'),
(146, 'Cloridrato de Trazodona', 'Genérico', 'Antidepressivo', 'Depressão, transtorno de ansiedade'),
(147, 'Cloridrato de Metformina + Vildagliptina', 'Genérico', 'Hipoglicemiante', 'Diabetes tipo 2'),
(148, 'Cloridrato de Amitriptilina + Cloridrato de Clorpromazina + Cloridrato de Levomepromazina', 'Genérico', 'Antidepressivo tricíclico + neuroléptico fenotiazínico', 'Depressão, esquizofrenia'),
(149, 'Cloridrato de Mirtazapina', 'Genérico', 'Antidepressivo', 'Depressão, transtorno de ansiedade'),
(150, 'Cloridrato de Tolterodina', 'Genérico', 'Antimuscarínico', 'Bexiga hiperativa, incontinência urinária'),
(151, 'Cloridrato de Venlafaxina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN) + antidepressivo atípico + antagonista dos receptores opioides', 'Depressão, transtorno de ansiedade generalizada (TAG), obesidade'),
(152, 'Cloridrato de Tansulosina + Dutasterida', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase', 'Hiperplasia prostática benigna'),
(153, 'Cloridrato de Trazodona + Cloridrato de Nortriptilina', 'Genérico', 'Antidepressivo + antidepressivo tricíclico', 'Depressão, transtorno de ansiedade'),
(154, 'Cloridrato de Terazosina', 'Genérico', 'Bloqueador alfa-adrenérgico', 'Hipertensão arterial, hiperplasia prostática benigna'),
(155, 'Cloridrato de Mirtazapina + Cloridrato de Venlafaxina', 'Genérico', 'Antidepressivo + inibidor seletivo da recaptação de serotonina e noradrenalina (IRSN)', 'Depressão, transtorno de ansiedade'),
(156, 'Cloridrato de Ranolazina', 'Genérico', 'Inibidor da corrente de sódio tardia', 'Angina'),
(157, 'Cloridrato de Budesonida + Formoterol', 'Genérico', 'Corticosteroide + agonista beta-2 adrenérgico', 'Asma, doença pulmonar obstrutiva crônica (DPOC)'),
(158, 'Cloridrato de Sildenafila', 'Genérico', 'Inibidor da fosfodiesterase tipo 5 (PDE5)', 'Disfunção erétil'),
(159, 'Cloridrato de Sertralina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(160, 'Cloridrato de Tansulosina + Finasterida', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase', 'Hiperplasia prostática benigna'),
(161, 'Cloridrato de Sildenafila + Tadalafila', 'Genérico', 'Inibidor da fosfodiesterase tipo 5 (PDE5)', 'Disfunção erétil'),
(162, 'Cloridrato de Ranitidina + Oxetacaina', 'Genérico', 'Antagonista dos receptores H2 + anestésico local', 'Úlcera péptica, dor abdominal'),
(163, 'Cloridrato de Tansulosina + Dutasterida + Sulfato de Alfa Tocoferol', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase + vitamina E', 'Hiperplasia prostática benigna'),
(164, 'Cloridrato de Ranitidina + Simeticona', 'Genérico', 'Antagonista dos receptores H2 + antiflatulento', 'Úlcera péptica, flatulência'),
(165, 'Cloridrato de Metoclopramida + Dimeticona + Trimebutina', 'Genérico', 'Antiêmético + antiflatulento + antiespasmódico', 'Náuseas, flatulência, cólicas abdominais'),
(166, 'Cloridrato de Sertralina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico + antagonista dos receptores opioides', 'Depressão, transtorno de ansiedade generalizada (TAG), obesidade'),
(167, 'Cloridrato de Tamsulosina + Dutasterida', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase', 'Hiperplasia prostática benigna'),
(168, 'Cloridrato de Ranitidina + Lidocaína', 'Genérico', 'Antagonista dos receptores H2 + anestésico local', 'Úlcera péptica, dor abdominal'),
(169, 'Cloridrato de Nortriptilina + Cloridrato de Amitriptilina', 'Genérico', 'Antidepressivo tricíclico', 'Depressão, dor crônica'),
(170, 'Cloridrato de Prazosina', 'Genérico', 'Bloqueador alfa-adrenérgico', 'Hipertensão arterial, hiperplasia prostática benigna'),
(171, 'Cloridrato de Sildenafila + Dapoxetina', 'Genérico', 'Inibidor da fosfodiesterase tipo 5 (PDE5) + inibidor seletivo da recaptação de serotonina (ISRS)', 'Disfunção erétil, ejaculação precoce'),
(172, 'Cloridrato de Sertralina + Cloridrato de Bupropiona + Naltrexona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico + antagonista dos receptores opioides', 'Depressão, transtorno de ansiedade generalizada (TAG), obesidade'),
(173, 'Cloridrato de Sertralina + Cloridrato de Bupropiona', 'Genérico', 'Inibidor seletivo da recaptação de serotonina + antidepressivo atípico', 'Depressão, transtorno de ansiedade generalizada (TAG)'),
(174, 'Cloridrato de Ranitidina + Dimeticona', 'Genérico', 'Antagonista dos receptores H2 + antiflatulento', 'Úlcera péptica, flatulência'),
(175, 'Cloridrato de Sildenafil + Dapoxetine', 'Genérico', 'Inibidor da fosfodiesterase tipo 5 (PDE5) + inibidor seletivo da recaptação de serotonina (ISRS)', 'Disfunção erétil, ejaculação precoce'),
(176, 'Cloridrato de Sildenafil + Tadalafil', 'Genérico', 'Inibidor da fosfodiesterase tipo 5 (PDE5)', 'Disfunção erétil'),
(177, 'Cloridrato de Ranitidina + Dimeticona + Omeprazol', 'Genérico', 'Antagonista dos receptores H2 + antiflatulento + inibidor de bomba de prótons', 'Úlcera péptica, flatulência, refluxo ácido'),
(178, 'Cloridrato de Tansulosina + Dutasterida + Sulfato de Alfa Tocoferol', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase + vitamina E', 'Hiperplasia prostática benigna'),
(179, 'Cloridrato de Omeprazol + Bicarbonato de Sódio', 'Genérico', 'Inibidor de bomba de prótons + antiácido', 'Refluxo ácido, úlcera péptica'),
(180, 'Cloridrato de Terbinafina + Cloridrato de Ciclopirox', 'Genérico', 'Antifúngico tópico', 'Micose, onicomicose'),
(181, 'Cloridrato de Terazosina + Finasterida', 'Genérico', 'Bloqueador alfa-adrenérgico + inibidor da 5-alfa-redutase', 'Hipertensão arterial, hiperplasia prostática benigna');

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

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id`, `NumCRM`, `nome`, `data_nascimento`, `cpf`, `especialidade`, `telefone`, `senha`) VALUES
(1, 654321, 'Dr. João Silva', '1975-08-23', '123.456.789-00', 'Cardiologia', '(11) 98765-4321', 'senhaSegura123'),
(2, 789012, 'Dra. Maria Oliveira', '1980-05-14', '987.654.321-00', 'Neurologia', '(21) 99876-5432', 'senhaSegura456');

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

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nome`, `sobrenome`, `cpf`, `cep`, `estado`, `rua`, `cidade`, `numero`, `PlanoSaude`, `tipoPessoa`, `senha`, `medico_id`) VALUES
(1, 'Ana', 'Souza', '111.222.333-44', '12345-678', 'SP', 'Rua das Flores', 'São Paulo', '100', 'Unimed', 'Física', 'senhaAna123', 1),
(2, 'CarlosTeste', 'Ferreira', '222.333.444-55', '13604192', 'SP', 'Rua Melânia Baraldi Maróstica', 'Araras', '215', NULL, 'pessoa', 'aqNdl8rl', 2),
(3, 'Fernanda', 'Almeida', '333.444.555-66', '34567-890', 'MG', 'Rua das Palmeiras', 'Belo Horizonte', '300', 'Bradesco Saúde', 'Física', 'senhaFernanda789', 1),
(4, 'João', 'Silva', '444.555.666-77', '45678-901', 'RS', 'Rua dos Pinhais', 'Porto Alegre', '400', 'SulAmérica', 'Física', 'senhaJoao101', 2),
(5, 'marianaTeste', 'Costa', '555.666.777-88', '56789-012', 'PR', 'Avenida Paraná', 'Curitiba', '500', 'Porto Seguro', 'Física', 'senhaMariana202', 1),
(7, 'Antonio', 'Pescano', '4967456785', '13604192', 'SP', 'Rua Melânia Baraldi Maróstica', 'Araras', '215', 'amil', 'dependente', '6Q49YfPo', 2),
(8, 'Lilian', 'Miranda', '23232323', '13604192', 'SP', 'Rua Melânia Baraldi Maróstica', 'Araras', '215', 'unimed', 'dependente', 'ifQDk3nD', 2);

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
-- Despejando dados para a tabela `prescricao`
--

INSERT INTO `prescricao` (`id`, `id_paciente`, `id_medicamentosconsulta`, `data_prescricao`, `duracao`, `dosagem`, `instrucao`, `medico_id`) VALUES
(1, 5, 1, '2024-05-27 18:49:34', 7, '500mg', 'Tomar após as refeições', 1),
(2, 8, 12, '2024-05-27 21:51:24', 12, '500mg', 'Tomar 3 vezes ao dia', 2),
(3, 5, 2, '2024-05-27 21:59:30', 7, '500mg', 'testes', NULL),
(4, 5, 3, '2024-05-27 22:03:34', 7, '500mg', 'testess2', 1),
(5, 8, 12, '2024-05-27 22:12:22', 1, '500mg', 'Testando Tudo', 2),
(6, 8, 1, '2024-05-27 22:13:38', 2, '500mg', 'TESTEEEEEEEE', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `medicamentosconsulta`
--
ALTER TABLE `medicamentosconsulta`
  MODIFY `idMedicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `prescricao`
--
ALTER TABLE `prescricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
