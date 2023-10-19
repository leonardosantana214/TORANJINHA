<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form method="post">
    <!-- Campos do formulário de cadastro -->
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Coloque seu nome" class="input">
    <br>
    <label for="email">E-Mail</label>
    <input type="email" name="email" id="email" placeholder="Coloque o seu E-mail" class="input" required />
    <br><br>
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" class="input" placeholder="Coloque sua Senha">
    <br>
    <label for="cpf">CPF</label>
    <input oninput="mascara(this)" type="text" name="cpf" placeholder="xxx.xxx.xxx-xx" class="input CPF"
        maxlength="11" minlength="11" id="CPF">
    <button type="submit">Cadastrar-se</button>
</form>



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
    $dados_usuario .= "CPF: $cpf\r\n <br><br>";

    // Caminho para o arquivo onde os dados serão salvos (arquivo de bloco de notas)

    // Salve os dados no arquivo
    if (file_put_contents("dados_usuarios.txt", $dados_usuario, FILE_APPEND | LOCK_EX)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao salvar o cadastro.";
    }
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_login = $_POST['email_login'];
    $senha_login = $_POST['senha_login'];

    // Ler o conteúdo do arquivo de bloco de notas
    $dados_usuarios = file_get_contents("dados_usuarios.txt");

    // Dividir o conteúdo em linhas
    $linhas = explode("\n", $dados_usuarios);

    $encontrado = false;

    foreach ($linhas as $linha) {
        $dados = explode(":", $linha);
        if (count($dados) >= 4) { // Verifica se a linha possui os campos necessários
            $email_salvo = trim($dados[1]);
            $senha_salva = trim($dados[3]);

            if ($email_login == $email_salvo && $senha_login == $senha_salva) {
                $encontrado = true;
                break;
            }
        }
    }

    if ($encontrado) {
        echo "Login bem-sucedido!";
    } else {
        echo "Login falhou. Verifique suas credenciais.";
    }
}
?>

    <form method="post">
        <label for="email_login">E-Mail</label>
        <input type="email" name="email_login" placeholder="E-Mail" class="input" required />
        <br><br>
        <label for="senha_login">Senha</label>
        <input type="password" name="senha_login" placeholder="Senha" class="input" required />
        <br><br>
        <button type="submit">Entrar</button>
    </form>


</body>
</html>