-- Tabela de Usuários
CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(45),
    cpf VARCHAR(45),
    senha VARCHAR(45)
);

INSERT INTO usuario (nome, cpf, senha) VALUES
('Joaquim', '123', '123'),
('Marlon', '111', '111');


-- Tabela de Regiões
CREATE TABLE regiao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL
);

INSERT INTO regiao (nome) VALUES
('Norte'),
('Centro-Oeste');


-- Tabela de Cidades
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


-- Tabela de Pontos Focais (empresas)
CREATE TABLE ponto_focal (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,                         
    razao_social VARCHAR(100),                          
    tipo VARCHAR(30), ,           
    cnpj_cpf VARCHAR(30),                               
    endereco VARCHAR(150),
    telefone VARCHAR(20),
    celular VARCHAR(20),
    email VARCHAR(100),
    cidade_id INT,
    FOREIGN KEY (cidade_id) REFERENCES cidade(id)
);

INSERT INTO ponto_focal (
    nome, razao_social, tipo, cnpj_cpf, endereco, telefone, celular,
    email, cidade_id
) VALUES
(
    'Feclopes', 'Feclopes Serviços Educacionais LTDA', 'Privada', '12.345.678/0001-99',
    'Rua das Flores, 123', '(44) 1234-5678', '(44) 91234-5678', 'contato@feclopes.com.br', 1
),
(
    'Assistência Social', 'Instituto Assistência Social', 'Pública', '98.765.432/0001-11',
    'Av. Central, 456', '(43) 2345-6789', '(43) 99876-5432', 'assistencia@social.org', 2
);


-- Tabela de Áreas de Curso
CREATE TABLE area_curso (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(60) NOT NULL
);

INSERT INTO area_curso (nome) VALUES
('Tecnologia'),
('Gastronomia'),
('Gestão');


-- Tabela de Compras de Áreas (origem como texto)
CREATE TABLE compra_area (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ponto_focal_id INT NOT NULL,
    area_curso_id INT NOT NULL,
    data_compra DATE NOT NULL,
    origem VARCHAR(100),                 -- campo texto simples
    observacao_origem VARCHAR(255),
    FOREIGN KEY (ponto_focal_id) REFERENCES ponto_focal(id),
    FOREIGN KEY (area_curso_id) REFERENCES area_curso(id)
);

INSERT INTO compra_area (
    ponto_focal_id, area_curso_id, data_compra, origem, observacao_origem
) VALUES
(1, 1, '2025-07-07', 'Marketing Digital', 'Instagram'),
(2, 2, '2025-07-05', 'Feira Educacional', 'Stand do SENAC');
