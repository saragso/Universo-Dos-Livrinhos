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
    $mensagem = strtoupper($_POST["mensagem-texto"]);

    // Inserir os dados no banco de dados (substitua 'sua_tabela' pelo nome da sua tabela)
    $sql_insert = "INSERT INTO sua_tabela (nome, sobrenome, email, celular, mensagem) VALUES ('$nome', '$sobrenome', '$email', '$celular', '$mensagem')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "Mensagem salva! Entraremos em contato em breve";
    } else {
        echo "Erro ao salvar mensagem: " . $conn->error;
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
