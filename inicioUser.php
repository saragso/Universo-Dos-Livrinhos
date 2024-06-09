<?php
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

// Fechar conexão com o banco de dados
$stmt->close();
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/CSS/inicioUser.css">
    <link rel="shortcut icon" href="Assets/Imagens/Logo.png" type="image/x-icon">
    <title>Início</title>
</head>
<body>
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
                <li class="side-item active">
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
                <li class="side-item">
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
    </nav>
    <main>
        <h1>Início</h1>
        <section class="first-section">
            <div>
                <h1 class="boas-vindas">Olá! Seja bem-vindo(a), amiguinho(a): <br>
                    <strong><?php echo $nome; ?></strong></h1>
            </div>
            <div class="box-img-main">
                <img class="img-profile" alt="Foto de perfil do Aluno" src="<?php echo $foto_perfil; ?>">
            </div>
        </section>
    </main>
    <script src="./Assets/JS/script.js"></script>
</body>
</html>
