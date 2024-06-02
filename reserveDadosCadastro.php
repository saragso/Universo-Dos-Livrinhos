<?php
// Conectar ao banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = strtoupper($_POST["firstname"]);
    $sobrenome = strtoupper($_POST["lastname"]);
    $email = strtoupper($_POST["email"]);
    $celular = strtoupper($_POST["number"]);
    $senha = strtoupper($_POST["password"]);
    $confirmasenha = strtoupper($_POST["confirmPassword"]);

    // Verificar se o e-mail já está cadastrado
    $sql_email = "SELECT * FROM sua_tabela WHERE email = '$email'";
    $result_email = $conn->query($sql_email);

    if ($result_email->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
    } else {
        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            echo '<div class="alert alert-danger" role="alert">As senhas não são iguais.</div>';
        } else {
            // As senhas coincidem e o e-mail não está cadastrado, então podemos prosseguir com o cadastro

            // Inserir os dados no banco de dados (substitua 'sua_tabela' pelo nome da sua tabela)
            $sql_insert = "INSERT INTO sua_tabela (nome, sobrenome, email, celular, senha) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$senha')";
            
            if ($conn->query($sql_insert) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Cadastro realizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar: ' . $conn->error . '</div>';
            }
        }
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
