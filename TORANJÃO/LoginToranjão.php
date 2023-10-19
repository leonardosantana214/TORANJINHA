<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleLogin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Login - Toranjinha</title>
    <script src="LoginToranja.js">
    </script>
</head>

<body class="body">
    <div class="container">
        <div class="card-container">
            <div class="card">
                <!-- LOGIN -->
                <div class="login-form">
                    <div class="header">Login</div>
                    <div class="content">
                        <form action="meu primeiro site.html" method="post">

                            <!-- Campos do formulário de login -->

                            <label for="email">E-Mail</label>
                            <input type="email" id="email" placeholder="Coloque o seu E-mail" class="input" required />
                            <br><br>
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" class="input" placeholder="Coloque sua Senha"> <br> <br>
                            <button class="custom-btn btn-6"><span>LOGIN</span></button>
                        </form>
                    </div>
                    <button class="btn btn-rotate" id="btn-login">Faça o cadastro</button>
                </div>
                <!-- CADASTRO -->
                <div class="signup-form">
                    <div class="header">CADASTRO</div>
                    <div class="content">
                        <form action="meu primeiro site.html" method="post">
                            <!-- Campos do formulário de cadastro -->
                            <label for="nome">Nome</label>
                            <input type="text" placeholder="Coloque seu nome" class="input">
                            <br>
                            <label for="email">E-Mail</label>
                            <input type="email" id="email" placeholder="Coloque o seu E-mail" class="input" required />
                            <br><br>
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" class="input" placeholder="Coloque sua Senha">
                            <br>
                            <label for="cpf">CPF</label>
                            <input oninput="mascara(this)" type="text" placeholder="xxx.xxx.xxx-xx" class="input CPF"
                                maxlength="11" minlength="11" id="CPF">
                            <button type="submit">Salvar</button>
                        </form>
                    </div>
                    <button class="btn btn-rotate btn-7" id="btn-signup">Cadastrar-se</button>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
// Include your database connection code here
$host = "login"; // Nome do host do banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT); // Hash the password
    $cpf = $_POST["cpf"];

    // Insert the user data into the database
    $sql = "INSERT INTO users (nome, email, senha, cpf) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $senha, $cpf]);

    // Redirect to a success page or display a message
    header("Location: registration_success.html");
}
?>

<?php
// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    // Crie uma string com os dados do usuário
    $dados_usuario = "Nome: $nome\r\n";
    $dados_usuario .= "E-Mail: $email\r\n";
    $dados_usuario .= "Senha: $senha\r\n";
    $dados_usuario .= "CPF: $cpf\r\n";

    // Caminho para o arquivo onde os dados serão salvos (arquivo de bloco de notas)
    $arquivo = 'dados_usuarios.txt';

    // Salve os dados no arquivo
    if (file_put_contents($arquivo, $dados_usuario, FILE_APPEND | LOCK_EX)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao salvar o cadastro.";
    }
}
?>

?>

</html>