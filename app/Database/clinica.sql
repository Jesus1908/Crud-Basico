CREATE DATABASE clinica;
USE clinica;

CREATE TABLE pacientes(
    idpaciente    INT AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(50)  NOT NULL,
    dni           CHAR(7)      NOT NULL,
    correo        VARCHAR(100) NOT NULL,
    expediente    VARCHAR(200) NOT NULL   
)ENGINE=INNODB;

CREATE TABLE enfermedades(
    idenfermedad   INT AUTO_INCREMENT PRIMARY KEY,
    id_paciente    INT          NOT NULL,
    nombre         VARCHAR(100) NOT NULL,
    descripcion    TEXT,
    FOREIGN KEY (id_paciente) REFERENCES pacientes(idpaciente) 
        ON DELETE CASCADE
)ENGINE=INNODB;

-- Insertar pacientes
INSERT INTO pacientes(nombre, dni, correo, expediente) VALUES
('Ana Torres',  '1234567', 'ana@mail.com', 'ana_torres.pdf'),
('Luis Gómez',  '7654321', 'luis@mail.com', 'img02.png'),
('María Pérez', '1112223', 'maria@mail.com', 'maria_perez.pdf');

-- Insertar enfermedades
INSERT INTO enfermedades(id_paciente, nombre, descripcion) VALUES
(1, 'Gripe', 'Fiebre y malestar general'),
(2, 'Diabetes', 'Requiere control de glucosa'),
(3, 'Hipertensión', 'Presión arterial elevada');

SELECT * FROM enfermedades;
