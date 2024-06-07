<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro 'id_usuario' foi enviado via POST
    if (isset($_POST['id_usuario'])) {
        // Obtém o ID do usuário a ser excluído
        $id_usuario = $_POST['id_usuario'];

        // Prepara a instrução SQL para excluir o usuário com base no ID
        $sql_delete_user = "DELETE FROM usuarios WHERE id_usuario = ?";

        // Prepara e executa a instrução SQL
        if ($stmt = $conexao->prepare($sql_delete_user)) {
            // Vincula o parâmetro ID à declaração SQL
            $stmt->bind_param("i", $id_usuario);

            // Executa a declaração SQL
            if ($stmt->execute()) {
                // Usuário excluído com sucesso
                header("Location: usuariosAdmin.html");
                exit();
            } else {
                // Se houver um erro na execução da instrução SQL, redireciona com uma mensagem de erro
                header("Location: usuariosAdmin.html?error=execution");
                exit();
            }
        } else {
            // Se houver um erro na preparação da instrução SQL, redireciona com uma mensagem de erro
            header("Location: usuariosAdmin.html?error=prepare");
            exit();
        }
    } else {
        // Se o parâmetro 'id_usuario' não foi enviado via POST, redireciona com uma mensagem de erro
        header("Location: usuariosAdmin.html?error=id_missing");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
