CREATE DATABASE projeto_login;

USE projeto_login;

CREATE TABLE usuario
(
 Idusuario INT  AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120),
 telefone VARCHAR(20),
 email VARCHAR(40),
 senha VARCHAR(32)


);