<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nomelivro = $_POST["namelivro"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $classificacao = $_POST["classificacao"];
    $sinopse = $_POST["sinopse"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['capa'])) {
        
            // Verifica se o arquivo foi enviado
            if (isset($_FILES['capa']) && $_FILES['foto_perfil']['error'] == 0) {
                $capa = $_FILES['capa'];
        
                // Diretório de destino para a foto de perfil
                $diretorioDestino = './Assets/Imagens/';
                $caminhoArquivo = $diretorioDestino . basename($capa['name']);
        
                // Verifica se o diretório de destino existe, se não, cria
                if (!file_exists($diretorioDestino)) {
                    mkdir($diretorioDestino, 0777, true);
                }
        
                // Move o arquivo enviado para o diretório de destino
                if (move_uploaded_file($foto['tmp_name'], $caminhoArquivo)) {
                    // Inserir dados na tabela
                    $sql_insert = "INSERT INTO livros (capalivro, nomelivro, autor, editora, classificacao, sinopse) VALUES ('$capalivro', '$nomelivro', '$autor', '$editora', '$classificacao', '$sinopse')";
    
                    if ($conexao->query($sql_insert) === TRUE) {
                         echo '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso!</div>'; //ALERT
                     } else {
                         echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar livro: ' . $conexao->error . '</div>'; //ALERT
                     }
              }
             }
        }
    }
    
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
