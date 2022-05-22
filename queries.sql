CREATE DATABASE FMU_PROJETO_WEB

USE FMU_PROJETO_WEB

CREATE TABLE TB_CEP
(
CEP CHAR(8) NOT NULL PRIMARY KEY,
UF CHAR(2) NOT NULL,
LOGRADOURO VARCHAR(60) NOT NULL,
CIDADE VARCHAR(60) NOT NULL,
BAIRRO VARCHAR(60) NOT NULL 
)

CREATE TABLE TB_TUTOR
(
CPF CHAR(11) NOT NULL PRIMARY KEY,
NOME VARCHAR(60) NOT NULL,
CELULAR CHAR(11) NOT NULL,
TELEFONE CHAR(8),
EMAIL VARCHAR(60) NOT NULL,
SENHA VARCHAR(60) NOT NULL,	
CEP CHAR(8) NOT NULL,
CONSTRAINT FK_CEP FOREIGN KEY (CEP) REFERENCES TB_CEP(CEP),
NUMERO_ENDERECO INT NOT NULL,
COMPLEMENTO_ENDERECO VARCHAR(60)
)

CREATE TABLE TB_GENERO
(
ID INT NOT NULL PRIMARY KEY,
SIGLA CHAR(1) NOT NULL,
NOME VARCHAR(9) NOT NULL
)
