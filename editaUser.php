<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome_aluno = $_POST["nome_aluno"];
    $sobrenome_aluno = $_POST["sobrenome_aluno"];
    $email = $_POST["email"];

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_email = $conexao->query($sql_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
    } else {
        // Inserir dados na tabela
        $sql_insert = "INSERT INTO usuarios (nome_aluno, sobrenome_aluno, email) VALUES ('$nome_aluno', '$sobrenome_aluno', '$email')";
        
        if ($conexao->query($sql_insert) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Registro inserido com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao inserir registro: ' . $conexao->error . '</div>';
        }
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
