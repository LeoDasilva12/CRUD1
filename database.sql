
create database if not exists crud2 default character set utf8 default collate utf8_general_ci;

use crud2;

CREATE TABLE cidade (
    id_cidade int(11) PRIMARY KEY AUTO_INCREMENT,
    nome_cidade varchar(100) NOT NULL,
    sigla_pais char(2) DEFAULT NULL,
    KEY sigla_pais (sigla_pais)
) default charset = utf8;

INSERT INTO cidade (id_cidade, nome_cidade, sigla_pais) VALUES
(1, 'Luanda', 'AO'),
(2, "São Paulo", 'br'),
(3, 'Rio de Janeiro', 'br'),
(4, 'Cidade do Cabo', 'af'),
(5, 'Porto', 'pt'),
(6, 'Lisboa', 'pt'),
(7, 'Leiria', 'pt'),
(8, 'Huambo', 'AO'),
(9, 'Benguela', 'AO'),
(10, 'Malanje', 'AO');

CREATE TABLE cliente (
    id_cliente int(11) PRIMARY KEY AUTO_INCREMENT,
    nome_cliente varchar(100) NOT NULL,
    telefone_cliente varchar(20) DEFAULT NULL,
    endereco_cliente varchar(255) DEFAULT NULL,
    id_cidade int(11) DEFAULT NULL,
    email_cliente varchar(100) DEFAULT NULL,
    KEY id_cidade (id_cidade)
) default charset = utf8;


CREATE TABLE pais (
    sigla_pais char(2) PRIMARY KEY,
    nome_pais varchar(100) NOT NULL
) default charset = utf8;

INSERT INTO pais (sigla_pais, nome_pais) VALUES
('AO', 'Angola'),
('br', 'Brasil'),
('pt', 'Portugal'),
('it', "Itália"),
('af', "África do Sul");
COMMIT;