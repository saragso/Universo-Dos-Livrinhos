<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Depuração: verificar os dados recebidos do formulário
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    echo '</pre>';

    // Receber os dados do formulário
    $nomelivro = $_POST["namelivro"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];
    $classificacao = $_POST["classificacao"];
    $sinopse = $_POST["sinopse"];

    // Verifica se o arquivo foi enviado
    if (isset($_FILES['capalivro']) && $_FILES['capalivro']['error'] == 0) {
        $capalivro = $_FILES['capalivro'];

        // Diretório de destino para a foto de perfil
        $diretorioDestino = './Assets/Imagens/';
        $caminhoArquivo = $diretorioDestino . basename($capalivro['name']);

        // Verifica se o diretório de destino existe, se não, cria
        if (!file_exists($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        // Depuração: verificar o caminho do arquivo
        echo 'Caminho do arquivo: ' . $caminhoArquivo . '<br>';

        // Move o arquivo enviado para o diretório de destino
        if (move_uploaded_file($capalivro['tmp_name'], $caminhoArquivo)) {
            // Depuração: confirmar que o arquivo foi movido com sucesso
            echo 'Arquivo movido com sucesso<br>';

            // Escapar os dados antes de inserir no banco
            $capalivroEscapado = $conexao->real_escape_string($caminhoArquivo);
            $nomelivro = $conexao->real_escape_string($nomelivro);
            $autor = $conexao->real_escape_string($autor);
            $editora = $conexao->real_escape_string($editora);
            $classificacao = $conexao->real_escape_string($classificacao);
            $sinopse = $conexao->real_escape_string($sinopse);

            $sql_insert = "INSERT INTO livros (capalivro, nomelivro, autor, editora, classificacao, sinopse) VALUES ('$capalivroEscapado', '$nomelivro', '$autor', '$editora', '$classificacao', '$sinopse')";

            // Depuração: verificar a query SQL
            echo 'SQL: ' . $sql_insert . '<br>';

            if ($conexao->query($sql_insert) === TRUE) {
                //echo '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso!</div>'; 
                //INSERIR UM ALERT AQUI - LIVRO CADASTRADO COM SUCESSO
                header("Location: catalogoLivro.php");
                exit();
            } else {
                //echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar livro: ' . $conexao->error . '</div>'; 
                //INSERIR UM ALERT AQUI - ERRO AO CADASTRAR LIVRO
                header("Location: catalogoLivro.php");
                exit();
            }
        } else {
            //echo '<div class="alert alert-danger" role="alert">Erro ao mover o arquivo enviado.</div>';
            //INSERIR UM ALERT AQUI - ERRO AO MOVER O ARQUIVO ENVIADO
            header("Location: catalogoLivro.php");
            exit();
        }
    } else {
        //echo '<div class="alert alert-danger" role="alert">Erro no envio do arquivo.</div>';
        //INSERIR UM ALERT AQUI - ERRO NO ENVIO DO ARQUIVO
        header("Location: catalogoLivro.php");
        exit();
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
