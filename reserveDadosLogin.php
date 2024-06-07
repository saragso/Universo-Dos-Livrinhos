<?php

include('conexao.php');

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
    header("Location: usuariosAdmin.html");
    exit();
}

// Consulta SQL para verificar se o e-mail existe no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conexao->query($sql);

if ($result->num_rows > 0) {
    // E-mail encontrado, verificar a senha
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row["senha"])) {
        // Senha correta, login bem-sucedido
        header("Location: inicioUser.html");
        exit();
    } else {
        // Senha incorreta - permanece na mesma página
        header("Location: login.html?error=password");
        exit();
    }
} else {
    // E-mail não encontrado - permanece na mesma página
    header("Location: login.html?error=email");
    exit();
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
