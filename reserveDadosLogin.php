<?php

// Estabelecer conexão com o banco de dados
$servername = "localhost"; // endereço do servidor
$username = "seu_usuario"; // nome de usuário do banco de dados
$password = "sua_senha"; // senha do banco de dados
$dbname = "nome_do_banco_de_dados"; // nome do banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber dados do formulário
$email = $_POST["email"];
$senha = $_POST["password"];

// Consulta SQL para verificar se o e-mail existe no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // E-mail encontrado, verificar a senha
    $row = $result->fetch_assoc();
    if ($senha === $row["senha"]) {
        // Senha correta, login bem-sucedido
        header("Location: inicioUser.html");
        exit();
    } else {
        // Senha incorreta
        $login_error = "Senha incorreta.";
    }
} else {
    // E-mail não encontrado
    $login_error = "E-mail não encontrado.";
}

if (!empty($login_error)) {
    echo '<div class="alert alert-danger" role="alert">' . $login_error . '</div>';
}

// Fechar conexão com o banco de dados
$conn->close();

?>
