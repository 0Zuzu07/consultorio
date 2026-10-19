CREATE DATABASE IF NOT EXISTS consultorio
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE consultorio;

CREATE TABLE paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100),
    endereco VARCHAR(255),
    data_nascimento DATE NOT NULL,
    convenio VARCHAR(255),
    observacao VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    email VARCHAR(100),
    endereco VARCHAR(255),
    data_nascimento DATE,
    senha VARCHAR(255),
    perfil ENUM('dentista','secretaria') NOT NULL,
    cro VARCHAR(20),
    especialidade VARCHAR(100),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    dentista_id INT NOT NULL,
    data_hora DATETIME NOT NULL,
    status VARCHAR(255) DEFAULT 'AGENDADA',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (paciente_id) REFERENCES paciente (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (dentista_id) REFERENCES funcionario (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE consulta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    dentista_id INT NOT NULL,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    valor_total DECIMAL(10, 2) DEFAULT 0.00,  
    valor_pago DECIMAL(10, 2) DEFAULT 0.00,
    forma_pagamento ENUM('DINHEIRO','PIX','CARTÃO DE DEBITO','CARTÃO DE CREDITO') NOT NULL,
    procedimentos_realizados  VARCHAR(255),
    procedimentos_arealizar  VARCHAR(255),
    descricao  VARCHAR(255),
    medicacao VARCHAR(255),    
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (paciente_id) REFERENCES paciente (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (dentista_id) REFERENCES funcionario (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dados Iniciais de Teste
INSERT INTO paciente (nome, cpf, telefone, email, endereco, data_nascimento, convenio) VALUES
('Ana Paula Silva', '555.666.777-88', '(11) 97777-6666', 'ana.silva@gmail.com', 'Rua 8', '1995-10-25', 'Unimed');

INSERT INTO funcionario (nome, cpf, telefone, email, endereco, data_nascimento, senha, perfil, cro, especialidade) VALUES
('Dr. Carlos Eduardo', '111.222.333-44', '(11) 98888-7777', 'carlos@odonto.com', 'Rua 8', '1980-05-12','123','dentista', 'CRO-SP-12345', 'Ortodontia'),
('Samara', '111.111.111-11', '(11) 98888-7777', 'secretaria@odonto.com', 'Rua 18', '1999-05-12','123','secretaria', '', '');