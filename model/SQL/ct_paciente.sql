CREATE TABLE paciente(
    id_paciente INTEGER AUTO_INCREMENT,
    cpf INTEGER NOT NULL,
    nome_paciente VARCHAR(128) NOT NULL,
    dt_nascimento DATE NOT NULL,
    CONSTRAINT pk_paciente PRIMARY KEY (id_paciente),
    CONSTRAINT uk_paciente_cpf UNIQUE (cpf)
);