-- Faze 03----------------------------- Atualizando Faze 02 ---------------------

ALTER TABLE usuarios MODIFY complemento VARCHAR(255) NULL;
ALTER TABLE usuarios MODIFY telefone VARCHAR(15) NULL;

-- Faze 02----------------------------- Criando tabelas robustas-----------------
-- Criando base
CREATE DATABASE XXXXXX;

-- Usando base
USE XXXXXX;

-- Tabela para Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    rua VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(255),
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    telefone VARCHAR(20),
    data_nascimento DATE NOT NULL,
    pergunta1 VARCHAR(255) NOT NULL,
    resposta1 VARCHAR(255) NOT NULL,
    pergunta2 VARCHAR(255) NOT NULL,
    resposta2 VARCHAR(255) NOT NULL,
    pergunta3 VARCHAR(255) NOT NULL,
    resposta3 VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para Vendedores
CREATE TABLE vendedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18) UNIQUE NOT NULL,
    rua VARCHAR(255) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(255),
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    pais VARCHAR(100) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    telefone VARCHAR(20),
    data_nascimento DATE NOT NULL,
    dados_bancarios TEXT NOT NULL,
    pergunta1 VARCHAR(255) NOT NULL,
    resposta1 VARCHAR(255) NOT NULL,
    pergunta2 VARCHAR(255) NOT NULL,
    resposta2 VARCHAR(255) NOT NULL,
    pergunta3 VARCHAR(255) NOT NULL,
    resposta3 VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Faze 01----------------------------- Criando tabelas simples-----------------
-- Criando base
CREATE DATABASE XXXXXX;

-- Usando base
USE XXXXXX;

-- Criando tabela dentro da base
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    senha VARCHAR(255),
    pergunta1 VARCHAR(255),
    resposta1 VARCHAR(255),
    pergunta2 VARCHAR(255),
    resposta2 VARCHAR(255),
    pergunta3 VARCHAR(255),
    resposta3 VARCHAR(255)
);

-- Criando tabela dentro da base
CREATE TABLE vendedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    senha VARCHAR(255),
    pergunta1 VARCHAR(255),
    resposta1 VARCHAR(255),
    pergunta2 VARCHAR(255),
    resposta2 VARCHAR(255),
    pergunta3 VARCHAR(255),
    resposta3 VARCHAR(255),
    cpf_cnpj VARCHAR(255),
    dados_bancarios TEXT
);