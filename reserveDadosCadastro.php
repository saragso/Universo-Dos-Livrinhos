<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome_aluno = ($_POST["name"]);
    $sobrenome_aluno = ($_POST["lastname"]);
    $email = ($_POST["email"]);
    $telefone_contato = ($_POST["number"]);
    $senha = $_POST["password"];
    $confirmasenha = $_POST["confirmPassword"];

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_email = $conexao->query($sql_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
    } else {
        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            // Redirecionar para a página de cadastro com uma mensagem de erro
            header("Location: cadastreSe.php?error=password");
            exit();
        } else {
            // As senhas coincidem e o e-mail não está cadastrado, então podemos prosseguir com o cadastro

            // Criptografar a senha
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir os dados no banco de dados
            $sql_insert = "INSERT INTO usuarios (nome_aluno, sobrenome_aluno, email, telefone_contato, senha) VALUES ('$nome_aluno', '$sobrenome_aluno', '$email', '$telefone_contato', '$senha_hash')";

            if ($conexao->query($sql_insert) === TRUE) {
                // Redirecionar para a página de início do usuário com uma mensagem de sucesso
                header("Location: login.html");
                exit();
            } else {
                // Redirecionar para a página de cadastro com uma mensagem de erro
                header("Location: cadastreSe.php?error=database");
                exit();
            }
        }
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
