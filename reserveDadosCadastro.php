<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome_aluno = strtoupper($_POST["name"]);
    $sobrenome_aluno = strtoupper($_POST["lastname"]);
    $email = strtoupper($_POST["email"]);
    $telefone_contato = strtoupper($_POST["number"]);
    $senha = strtoupper($_POST["password"]);
    $confirmasenha = strtoupper($_POST["confirmPassword"]);

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_email = $conexao->query($sql_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
    } else {
        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            echo '<div class="alert alert-danger" role="alert">As senhas não são iguais.</div>';
        } else {
            // As senhas coincidem e o e-mail não está cadastrado, então podemos prosseguir com o cadastro

            // Inserir os dados no banco de dados (substitua 'sua_tabela' pelo nome da sua tabela)
            $sql_insert = "INSERT INTO usuarios (nome_aluno, sobrenome_aluno, email, celular, senha) VALUES ('$nome_aluno', '$sobrenome_aluno', '$email', '$celular', '$senha')";
            
            if ($conexao->query($sql_insert) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar: ' . $conexao->error . '</div>';
            }
        }
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
