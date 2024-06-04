<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $capalivro = $_POST["capalivro"];
    $nomelivro = $_POST["namelivro"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $classificacao = $_POST["classificacao"];
    $sinopse = $_POST["sinopse"];

    // Inserir dados na tabela
    $sql_insert = "INSERT INTO livros (capalivro, nomelivro, autor, editora, classificacao, sinopse) VALUES ('$capalivro', '$nomelivro', '$autor', '$editora', '$classificacao', '$sinopse')";
    
    if ($conexao->query($sql_insert) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar livro: ' . $conexao->error . '</div>';
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
