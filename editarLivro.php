<?php
// Conectar ao banco de dados
include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $status = $_POST["status"];
    $id_usuario = $_POST["id_usuario"];
    $data_emprestimo = $_POST["data_emprestimo"];
    $data_devolucao = $_POST["data_devolucao"];

    // Atualizar dados na tabela
    $sql_update = "UPDATE emprestimos SET status='$status', data_emprestimo='$data_emprestimo', data_devolucao='$data_devolucao' WHERE id_emprestimo='$id_usuario'";
    
    if ($conexao->query($sql_update) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Registro atualizado com sucesso!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Erro ao atualizar registro: ' . $conexao->error . '</div>';
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
