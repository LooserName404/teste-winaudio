CREATE TABLE anamnese(
    nr_anamnese INTEGER,
    id_paciente INTEGER,
    desc_anamnese VARCHAR(512),
    resposta BOOLEAN,
    CONSTRAINT pk_anamnese PRIMARY KEY (nr_anamnese, id_paciente),
    CONSTRAINT fk_anamnese FOREIGN KEY (id_paciente) REFERENCES paciente (id_paciente) ON DELETE CASCADE
)