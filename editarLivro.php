<?php
// Conectar ao banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "biblioteca";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $status = $_POST["status"];
    $id_aluno = $_POST["id_aluno"];
    $data_emprestimo = $_POST["data_emprestimo"];
    $data_devolucao = $_POST["data_devolucao"];

    // Atualizar dados na tabela
    $sql_update = "UPDATE emprestimos SET status='$status', data_emprestimo='$data_emprestimo', data_devolucao='$data_devolucao' WHERE id_emprestimo='$id_aluno'";
    
    if ($conn->query($sql_update) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Registro atualizado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar registro: ' . $conn->error . '</div>';
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
