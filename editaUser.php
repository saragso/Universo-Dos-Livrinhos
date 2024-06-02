<?php
// Conectar ao banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "biblioteca";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome_aluno = $_POST["nome"];
    $sobrenome_aluno = $_POST["sobrenome"];
    $email = $_POST["email"];

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_email = $conn->query($sql_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
    } else {
        // Inserir dados na tabela
        $sql_insert = "INSERT INTO usuarios (nome_aluno, sobrenome_aluno, email) VALUES ('$nome_aluno', '$sobrenome_aluno', '$email')";
        
        if ($conn->query($sql_insert) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Registro inserido com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao inserir registro: ' . $conn->error . '</div>';
        }
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
