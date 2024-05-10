create database bdClinicaPI;

use bdClinicaPI;

create table paciente
(
    idPaciente int AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    sobrenome VARCHAR(45) not null,
    cpf VARCHAR(14) NOT NULL,
    cep VARCHAR(14) not null,
    estado VARCHAR(20) NOT NULL,
    rua VARCHAR(30) NOT NULL,
    cidade VARCHAR(30) NOT NULL,
    numero int (5) NOT NULL,
    planoSaude VARCHAR(50) NOT NULL,
    tipoPessoa VARCHAR(20) NOT NULL
);

create table medicamentosConsulta
(
    idMedicamento int AUTO_INCREMENT PRIMARY KEY,
    nomeMedicamento VARCHAR (255) not NULL,
    fabricante VARCHAR (255) not null,
    tipo VARCHAR (255) not null,
    uso text not null
);

create table medico
(
    numCRM int (20) PRIMARY KEY,
    nomeCompleto VARCHAR (150) not null,
    dataNascimento DATE not null,
    cpf VARCHAR(14) NOT NULL,
    especialidade VARCHAR (255) not null,
    telefone VARCHAR(24) not null
);

create table efeitosColaterais(
    idEfeitosColaterais int PRIMARY KEY AUTO_INCREMENT,
    descricao text not null,
    pacienteID int not null,
    medicamentoID int not null,
    FOREIGN KEY(medicamentoID) REFERENCES medicamentosConsulta(idMedicamento),
    FOREIGN KEY(pacienteID) REFERENCES paciente(idPaciente)
);

create table imagem
(
    idImg INT AUTO_INCREMENT PRIMARY KEY,
    caminhoArquivo VARCHAR(255) not null,
    pacienteID INT,
    medicoID int(20),
    FOREIGN KEY (pacienteID) REFERENCES paciente (idPaciente),
    FOREIGN KEY (medicoID) REFERENCES medico(numCRM)
);