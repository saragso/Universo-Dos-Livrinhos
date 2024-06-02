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
    $capa = $_POST["capalivro"];
    $nome = $_POST["nomelivro"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $classificacao = $_POST["classificacao"];
    $sinopse = $_POST["sinopse"];

    // Inserir dados na tabela
    $sql_insert = "INSERT INTO livros (capa, nome, autor, editora, classificacao, sinopse) VALUES ('$capa', '$nome', '$autor', '$editora', '$classificacao', '$sinopse')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar livro: ' . $conn->error . '</div>';
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
