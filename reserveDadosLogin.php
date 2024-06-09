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

// Verificar se o email e a senha correspondem a uma conta específica
if ($email === "leticiamendes@gmail.com") {
    // Redirecionar para a página específica
    header("Location: usuariosAdmin.php");
    exit();
}

// Consulta SQL para verificar se o e-mail existe no banco de dados
$sql = "SELECT id_usuario, senha FROM usuarios WHERE email = ?";
$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // E-mail encontrado, verificar a senha
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row["senha"])) {
        // Senha correta, login bem-sucedido
        $_SESSION["id_usuario"] = $row["id_usuario"]; // Armazenar o ID do usuário na sessão
        header("Location: inicioUser.php");
        exit();
    } else {
        // Senha incorreta - permanece na mesma página
        header("Location: login.php");
        exit();
    }
} else {
    // E-mail não encontrado - permanece na mesma página
    header("Location: login.php");
    exit();
}

// Fechar conexão com o banco de dados
$stmt->close();
$conexao->close();
?>
