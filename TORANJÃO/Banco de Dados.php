<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lidar com o envio do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Estabelecer uma conexão com o banco de dados (altere as credenciais do banco de dados)
    $conn = new mysqli("localhost", "nome_de_usuario", "senha", "nome_do_banco");

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Recuperar os dados do usuário do banco de dados
    $sql = "SELECT id, nome, senha FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_nome'] = $row['nome'];
            header("Location: painel.php"); // Redirecionar para uma página de painel
            exit();
        } else {
            echo "Senha inválida.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
}
?>
