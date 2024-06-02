<?php
// Conectar ao banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $capalivro = strtoupper($_POST["capalivro"]);
    $nomelivro = strtoupper($_POST["namelivro"]);
    $autor = strtoupper($_POST["autor"]);
    $editora = strtoupper($_POST["editora"]);
    $classificacao = strtoupper($_POST["classificacao"]);
    $sinopse = strtoupper($_POST["sinopse"]);

    // Inserir os dados no banco de dados (substitua 'sua_tabela' pelo nome da sua tabela)
    $sql_insert = "INSERT INTO sua_tabela (capalivro, nomelivro, autor, editora, classificacao, sinopse) VALUES ('$capalivro', '$nomelivro', '$autor', '$editora', '$classificacao', '$sinopse')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Livro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar livro: " . $conn->error;
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
