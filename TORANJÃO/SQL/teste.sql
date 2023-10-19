-- Crie um novo banco de dados chamado 'cadastro_usuarios'
CREATE DATABASE cadastro_usuarios;

-- Use o banco de dados recém-criado
USE cadastro_usuarios;

-- Crie uma tabela chamada 'usuarios' para armazenar informações de usuário
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
