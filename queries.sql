CREATE DATABASE FMU_PROJETO_WEB;

USE FMU_PROJETO_WEB;

CREATE TABLE TB_TUTOR(
	ID_TUTOR	INT				NOT NULL AUTO_INCREMENT	PRIMARY KEY,
	NOME		VARCHAR(60)		NOT NULL,
	CPF			CHAR(11)		NOT NULL,
	EMAIL		VARCHAR(60)		NOT NULL,
	SENHA		VARCHAR(30)		NOT NULL,
	TELEFONE	VARCHAR(12)		,
	CELULAR		VARCHAR(13)		NOT NULL,
	CEP			CHAR(8)			NOT NULL,
	UF			CHAR(2)		,
	LOGRADOURO	VARCHAR(100)	,
	CIDADE	    VARCHAR(60)	,
	BAIRRO		VARCHAR(60)	,
	NUMERO		VARCHAR(10)	,
	COMPLEMENTO VARCHAR(100)
);

CREATE TABLE TB_PET(
	ID_PET			INT				NOT NULL AUTO_INCREMENT	PRIMARY KEY,
	RGA				VARCHAR(8),
	ID_TUTOR		INT				NOT NULL,
	TIPO_PET		INT				NOT NULL,
	NOME			VARCHAR(60)	NOT NULL,
	SEXO			INT				NOT NULL,
	DATA_NASCIMENTO	DATE			,
	APELIDO			VARCHAR(60),
	RACA			VARCHAR(60),
	COR				VARCHAR(60),
	PESO			FLOAT,
	TEMPERAMENTO	INT,
	CASTRADO		INT								,
	DEFICIENCIA		INT								,
	CONSTRAINT FK_TUTOR  FOREIGN KEY (ID_TUTOR) REFERENCES TB_TUTOR(ID_TUTOR)
);

CREATE TABLE TB_SERVICO(
	ID_SERVICO	INT				NOT NULL AUTO_INCREMENT	PRIMARY KEY,
	DESCRICAO	VARCHAR(500)	NOT NULL,
	VALOR		FLOAT			NOT NULL
);

CREATE TABLE TB_AGENDAMENTO(
	ID_AGENDAMENTO	INT				NOT NULL AUTO_INCREMENT	PRIMARY KEY,
	ID_PET			INT				NOT NULL,
	DATA			DATETIME		NOT NULL,
	CONSTRAINT FK_PET  FOREIGN KEY (ID_PET) REFERENCES TB_PET(ID_PET)
);

CREATE TABLE TB_SERVICO_AGENDAMENTO(
	ID_AGENDAMENTO	INT				NOT NULL,
	ID_SERVICO		INT				NOT NULL,
	CONSTRAINT FK_AGENDAMENTO FOREIGN KEY (ID_AGENDAMENTO) REFERENCES TB_AGENDAMENTO(ID_AGENDAMENTO),
	CONSTRAINT FK_SERVICO FOREIGN KEY (ID_SERVICO) REFERENCES TB_SERVICO(ID_SERVICO)
);

DELIMITER $
CREATE FUNCTION FUNC_VALOR_AGENDAMENTO(ID_AGENDAMENTO INT) RETURNS FLOAT
BEGIN
    RETURN(
        SELECT SUM(s.VALOR) FROM TB_SERVICO s INNER JOIN TB_SERVICO_AGENDAMENTO a ON a.ID_SERVICO = s.ID_SERVICO
        WHERE a.ID_AGENDAMENTO = ID_AGENDAMENTO);
END
