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
    <meta charset="UTF-8"><!--Define o conjunto de caracterese UTF-8 para suportar diferentes idiomas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Define a largura da tela e a escala inicial para dispositivos móveis-->
    <link rel="stylesheet" href="./Assets/CSS/editarDadosUser.css"> <!--carrega o css personalizado-->
    <link rel="shortcut icon" href="Assets/Imagens/Logo.png" type="image/x-icon"> <!--Define o ícone da página-->
    <title>Editar dados</title> <!--titulo da página-->
</head>
<body> 
    <!--início do menu lateral-->
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
    
    <main> <!--conteúdo da página-->
        <div class="container">
            <div class="form">
                    <div class="form-header">
                        <div class="title">
                            <h1>Editar dados</h1>
                        </div>                   
                    </div>                    
                    <br>

                    <!--FORM PARA ALTERAR FOTO-->
                    <div class="input-group">                       
                        <div class="input-box">
                            <label>Alterações na foto de perfil!</label><br>
                            <form action="reserveDadosEdicaoUser.php" method="post" enctype="multipart/form-data">
                                <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*" required>  
                                <label for="email">Informe seu e-mail para verificação!</label>
                                <input id="email" type="email" name="email" placeholder="E-mail a ser cadastrado" required maxlength="80">
                                <div class="continue-button">
                                    <button type="submit" name="update_foto">Alterar foto de perfil!</button>
                                </div>                                   
                            </form>
                            
                            
                    <br><br>
                <!--FORM Nome-->
                    <form action="reserveDadosEdicaoUser.php" method="post">
                        <div class="input-group">
                            <div class="input-box">
                                <label>Alterações no nome cadastrado!</label><br>
                                <label for="nome">Nome</label>
                                <input id="nome_aluno" type="text" name="nome_aluno" placeholder="Nome do aluno" required maxlength="30">
                                <label for="sobrenome">Sobrenome</label>
                                <input id="sobrenome_aluno" type="text" name="sobrenome_aluno" placeholder="Sobrenome do aluno" required maxlength="50">
                                <label for="email">Informe seu e-mail para verificação!</label>
                                <input id="email" type="email" name="email" placeholder="E-mail de cadastro" required maxlength="80">
                                <div class="continue-button">
                                    <button type="submit" name="update_nome">Salvar alterações no nome!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <form action="reserveDadosEdicaoUser.php" method="post"> <!--início do formulário de edição de dados pessoais-->
                    <div class="input-group">
                        <div class="input-box">
                            <label>Alterações no e-mail cadastrado!</label><br>
                            <label for="email">E-mail de verificação!</label>
                            <input id="email_antigo" type="email" name="email_antigo" placeholder="E-mail de cadastro" required maxlength="80">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" name="email" placeholder="E-mail a ser cadastrado" required maxlength="80">
                            <!--Botão para salvar alterações-->
                            <div class="continue-button">
                                <button type="submit" name="update_email">Salvar e-mail alterado!</button>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </form>
                <form action="reserveDadosEdicaoUser.php" method="post"> <!--início do formulário de edição de dados pessoais-->
                   
                    <div class="input-group">
                        <div class="input-box">
                            <label>Adicione ou altere o telefone cadastrado!</label><br>
                            <label for="number">Telefone</label>
                            <input id="number" type="tel" name="tel" placeholder="(xx) xxxxx-xxxx" required maxlength="11">
                            <label for="email">Informe seu e-mail para verificação!</label>
                            <input id="email" type="email" name="email" placeholder="E-mail a ser cadastrado" required maxlength="80">
                            <!--Botão para salvar alterações-->
                            <div class="continue-button">
                                <button type="submit" name="update_telefone">Salvar telefone!</button>
                            </div>
                        </div>
                    </div>
                </form>
                    <br><br>
                    <form action="reserveDadosEdicaoUser.php" method="post"> <!--início do formulário de edição de dados pessoais-->
                        <div class="input-group">
                        <div class="input-box">
                            <label>Altere sua senha!</label><br>
                            <label for="new-password">Nova senha</label>
                            <input id="new-password" type="password" name="new-password" placeholder="Digite sua nova senha" required maxlength="8">
                            <label for="confirmPassword">Confirme sua nova Senha</label>
                            <input id="confirm-new-Password" type="password" name="confirm-new-Password" placeholder="Confirme sua senha" required maxlength="8">
                            <label for="email">Informe seu e-mail para verificação!</label>
                            <input id="email" type="email" name="email" placeholder="E-mail a ser cadastrado" required maxlength="80">
                            <!--Botão para salvar alterações-->
                            <div class="continue-button">
                                <button type="submit" name="update_senha">Salvar alteração de senha!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="./Assets/JS/script.js"></script>
</body>
</html>