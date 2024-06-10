<?php

/*PHP MENU*/
session_start();
include('conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.html");
    exit();
}

$id_usuario = $_SESSION["id_usuario"];

// Consulta SQL para obter as informações do usuário
$sql = "SELECT nome_aluno, foto_perfil FROM usuarios WHERE id_usuario = ?";
$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row["nome_aluno"];
    $foto_perfil = $row["foto_perfil"] ? $row["foto_perfil"] : 'Assets/Imagens/foto de perfil.png'; // Foto padrão se não houver foto de perfil
} else {
    $nome = "Usuário";
    $foto_perfil = 'Assets/Imagens/foto de perfil.png';
}
//Fim php menu

// Prepara a instrução SQL para buscar os dados dos livros alugados pelo usuário logado
$sql = "SELECT l.nomelivro, l.capalivro, l.autor, e.data_emprestimo, e.data_devolucao 
        FROM emprestimos e
        INNER JOIN livros l ON e.id_livro = l.id_livro
        WHERE e.id_usuario = ?";

// Executa a consulta SQL
$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta SQL: " . $conexao->error);
}

// Cria um array para armazenar os dados dos livros alugados pelo usuário
$livros = array();

// Percorre os resultados da consulta e adiciona ao array
while ($row = $result->fetch_assoc()) {
    $livros[] = $row;
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<!--Esse menu será usado em todas as páginas de usuário-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!--Define o conjunto de caracteres UTF-8 para suportar diferentes idiomas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Define a largura da tela e a escala inicial para dispositivos móveis-->
    <!--Carrega o arquivo CSS do framework Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Carrega o arquivo CSS personalizado-->
    <link rel="stylesheet" href="./Assets/CSS/livrosAlugadosUser.css">
    <!--Define o ícone da página-->
    <link rel="shortcut icon" href="./Assets/Imagens/logo.png" type="image/x-icon">
    <title>Livros alugados</title> <!--Define o título da página-->
</head>
<body>
    <!--Menu lateral / sidebar-->
    <nav id="sidebar">
        <div id="sidebar-content">
            <div id="user">
                <img src="<?php echo $foto_perfil; ?>" id="user-avatar" alt="avatar do usuário" width="50px">
                <p id="user-infos">
                    <span class="item-description">
                        <?php echo $nome; ?>
                    </span>
                    <span class="item-description">
                        Estudante
                    </span>
                </p>
            </div>
            <ul id="side-itens">
                <li class="side-item">
                    <a href="./inicioUser.php">
                        <img class="icon-dashboard" src="./Assets/Imagens/icon homepage.png" alt="icone casa - dashboard" width="15px">
                        <span class="item-description">
                            Início
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./perfilUser.php">
                        <img class="icon-perfil" src="./Assets/Imagens/icon user.png" alt="icone perfil do usuário" width="15px">
                        <span class="item-description">
                            Perfil
                        </span>
                    </a>
                </li>
                <li class="side-item active">
                    <a href="./livrosAlugadosUser.php">
                        <img class="icon-livros-alugados" src="./Assets/Imagens/icon books.png" alt="icone livros alugados" width="15px">
                        <span class="item-description">
                            Livros alugados
                        </span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./catalogoLivrosUser.php">
                        <img class="" src="./Assets/Imagens/icon catalog.png" alt="icone catálogo de livros" width="15px">
                        <span class="item-description">
                            Catálogo de livros
                        </span>
                    </a>
                </li>
            </ul>
            <button id="open-btn">
                <img id="open-btn-icon" src="./Assets/Imagens/icon seta.ico" alt="icone de seta" width="15px">
            </button>
        </div>
        <div id="logout">
            <button id="logout-btn">
                <img id="logout-btn-icon" src="./Assets/Imagens/icon logout.ico" alt="ícone logout" width="15px">
                <span class="item-description">
                    Logout
                </span>
            </button>
        </div>
    </nav> <!--fim do menu lateral-->

    <main> <!--conteúdo da página, fora o menu-->
        <h1>Livros Alugados</h1>
          
          <div class="cards">
          <?php 
        // Verifica se existem livros para exibir
        if (!empty($livros)) {
            // Itera sobre cada livro
            foreach ($livros as $livro) {
                // Exibe os dados do livro
                echo "<div class='card' style='width: 18rem;'>
                        <img src='./Assets/Imagens/{$livro["capalivro"]}' class='card-img-top' alt='livro: {$livro["nomelivro"]}'>
                        <div class='card-body'>
                          <h5 class='card-title'>{$livro["nomelivro"]}</h5>
                          <p class='card-text'>{$livro["autor"]}</p>
                        </div>
                        <ul class='list-group list-group-flush'>
                          <li class='list-group-item'>Data de empréstimo: {$livro["data_emprestimo"]}</li>
                          <li class='list-group-item'>Data de devolução: {$livro["data_devolucao"]}</li>
                        </ul>
                      </div>";
            }
        } else {
            // Se não houver livros, exibe uma mensagem
            echo "Nenhum livro alugado encontrado.";
        }
        ?>
          </div>  <!--fim dos cards usando bootstrap-->
                  
    </main>
  
    <!--script do menu-->
    <script src="./Assets/JS/scriptMenuUser.js"></script>
    <!--script do bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>