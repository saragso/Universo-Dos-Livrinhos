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
$sql = "SELECT nome_aluno, sobrenome_aluno, email, telefone_contato, foto_perfil FROM usuarios WHERE id_usuario = ?";
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
    $sobrenome = $row["sobrenome_aluno"];
    $email = $row["email"];
    $telefone_contato = $row["telefone_contato"];
    $foto_perfil = $row["foto_perfil"] ? $row["foto_perfil"] : 'Assets/Imagens/avatar.png'; // Foto padrão se não houver foto de perfil
} else {
    // Definir valores padrão em caso de falha na consulta
    $nome = "Usuário";
    $email = "email@example.com";
    $telefone_contato = "00000000000";
    $foto_perfil = 'Assets/Imagens/avatar.png';
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
    <link rel="stylesheet" href="./Assets/CSS/perfilUser.css">
    <link rel="shortcut icon" href="Assets/Imagens/Logo.png" type="image/x-icon">
    <title>Perfil</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <!-- Início do menu lateral -->
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
                        <span class="item-description">Início</span>
                    </a>
                </li>
                <li class="side-item active">
                    <a href="./perfilUser.php">
                        <img class="icon-perfil" src="./Assets/Imagens/icon user.png" alt="icone perfil do usuário" width="15px">
                        <span class="item-description">Perfil</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./livrosAlugadosUser.php">
                        <img class="icon-livros-alugados" src="./Assets/Imagens/icon books.png" alt="icone livros alugados" width="15px">
                        <span class="item-description">Livros alugados</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./catalogoLivrosUser.php">
                        <img class="" src="./Assets/Imagens/icon catalog.png" alt="icone catálogo de livros" width="15px">
                        <span class="item-description">Catálogo de livros</span>
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
                <span class="item-description">Logout</span>
            </button>
        </div>
    </nav> <!-- Fim do menu lateral -->

    <main> <!-- Conteúdo da página, fora o menu -->
        <h1>Meu Perfil</h1>
        <div class="container">
            <div class="card">
                <img src="<?php echo $foto_perfil; ?>" alt="perfil" class="profile-img">
                <br><br>
                <div class="container-text">
                    <h1 class="name">
                        <label for="nome-aluno-banco"><?php echo $nome; ?> <?php echo $sobrenome; ?></label>
                    </h1><br>
                    <h3 class="desc">
                        <div class="form-group">
                            <label for="e-mail">E-mail:</label>
                            <label for="e-mail-banco"><?php echo $email; ?></label><br>
                            <label for="telefone_contato">Telefone:</label>
                            <label id="telefone_contato"><?php echo $telefone_contato; ?></label>
                        </div>
                    </h3>
                    <br>
                    <!-- Botão de editar dados do usuário -->
                    <div class="login-button">
                        <button><a href="./editarDadosUser.php">Editar Dados</a></button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            // Adicionando máscara ao campo de telefone
            var telefone = $('#telefone_contato').text();
            telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            $('#telefone_contato').text(telefone);
        });
    </script>
    <script src="./Assets/JS/script.js"></script>
</body>
</html>
