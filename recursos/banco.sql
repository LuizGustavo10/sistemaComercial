CREATE TABLE usuario(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(45),
    cpf VARCHAR(45),
    senha VARCHAR(45)
);

INSERT INTO usuario (nome, cpf, senha) VALUES
('Joaquim', '123', '123'),
('Marlon', '111', '111');



CREATE TABLE regiao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL
);

INSERT INTO regiao (nome) VALUES
('Norte'),
('Centro-Oeste');




CREATE TABLE cidade (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL,
    cep VARCHAR(20),
    estado VARCHAR(45),
    regiao_id INT,
    FOREIGN KEY (regiao_id) REFERENCES regiao(id)
);

INSERT INTO cidade (nome, cep, estado, regiao_id) VALUES
('Maringá', '87000-000', 'Paraná', 1),
('Londrina', '86000-000', 'Paraná', 2);


CREATE TABLE ponto_focal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo ENUM('Pública', 'Privada') NOT NULL,
    cidade_id INT,
    FOREIGN KEY (cidade_id) REFERENCES cidade(id)
);

INSERT INTO ponto_focal (nome, tipo, cidade_id) VALUES
('Feclopes', 'Privada', 1),
('Assistência Social', 'Pública', 2);




CREATE TABLE area_curso (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL
);

INSERT INTO area_curso (nome) VALUES
('Tecnologia'),
('Gastronomia'),
('Gestão');





CREATE TABLE area_curso (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL
);

INSERT INTO area_curso (nome) VALUES
('Tecnologia'),
('Gastronomia'),
('Gestão');


