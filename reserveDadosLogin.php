<?php
include('conexao.php');
session_start(); // Iniciar a sessão

// Verificar a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Receber dados do formulário
$email = $_POST["email"];
$senha = $_POST["password"];

// Consulta SQL para verificar se o e-mail existe na tabela admins
$sqlAdmin = "SELECT id_admin, senha FROM admins WHERE email = ?";
$stmtAdmin = $conexao->prepare($sqlAdmin);
if (!$stmtAdmin) {
    die("Erro na preparação da consulta: " . $conexao->error);
}
$stmtAdmin->bind_param("s", $email);
$stmtAdmin->execute();
$resultAdmin = $stmtAdmin->get_result();

if ($resultAdmin->num_rows > 0) {
    // E-mail encontrado na tabela admins, verificar a senha
    $rowAdmin = $resultAdmin->fetch_assoc();
    if ($senha === $rowAdmin["senha"]) {
        // Senha correta, redirecionar para a página do admin
        $_SESSION["id_admin"] = $rowAdmin["id_admin"]; // Armazenar o ID do admin na sessão
        header("Location: usuariosAdmin.php");
        exit();
    } else {
        // Senha incorreta para o admin - permanece na mesma página
        header("Location: login.html?error-password");
        exit();
    }
} else {
    // Consulta SQL para verificar se o e-mail existe na tabela usuarios
    $sqlUser = "SELECT id_usuario, senha FROM usuarios WHERE email = ?";
    $stmtUser = $conexao->prepare($sqlUser);
    if (!$stmtUser) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }
    $stmtUser->bind_param("s", $email);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows > 0) {
        // E-mail encontrado na tabela usuarios, verificar a senha
        $rowUser = $resultUser->fetch_assoc();
        // Verificar a senha não criptografada primeiro
        if ($senha === $rowUser["senha"] || password_verify($senha, $rowUser["senha"])) {
            // Senha correta, login bem-sucedido
            $_SESSION["id_usuario"] = $rowUser["id_usuario"]; // Armazenar o ID do usuário na sessão
            header("Location: inicioUser.php");
            exit();
        } else {
            // Senha incorreta - permanece na mesma página
            header("Location: login.html?error-password");
            exit();
        }
    } else {
        // E-mail não encontrado - permanece na mesma página
        header("Location: login.html?error-email");
        exit();
    }
}

// Fechar conexões com o banco de dados
$stmtAdmin->close();
$stmtUser->close();
$conexao->close();
?>
