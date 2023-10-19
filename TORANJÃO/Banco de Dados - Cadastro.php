<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lidar com o envio do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cpf = $_POST['cpf'];

    // Estabelecer uma conexão com o banco de dados (altere as credenciais do banco de dados)
    $conn = new mysqli("localhost", "nome_de_usuario", "senha", "nome_do_banco");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inserir os dados do usuário no banco de dados
    $sql = "INSERT INTO users (nome, email, senha, cpf) VALUES ('$nome', '$email', '$senha', '$cpf')";

    if ($conn->query($sql) === TRUE) {
        // Registro bem-sucedido
        header("Location: sucesso.html"); // Redirecionar para uma página de sucesso
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Exibir erros do MySQL
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Exibir erros do PHP
if (!$conn->query($sql)) {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

?>
