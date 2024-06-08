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

        // Prepara a instrução SQL para excluir o usuário da tabela 'usuarios'
        $sql_delete_user = "DELETE FROM emprestimos WHERE id_usuario = ?";

        // Prepara e executa a instrução SQL para excluir o usuário da tabela 'usuarios'
        if ($stmt_user = $conexao->prepare($sql_delete_user)) {
            // Vincula o parâmetro ID à declaração SQL
            $stmt_user->bind_param("i", $id_usuario);

            // Executa a declaração SQL para excluir o usuário da tabela 'usuarios'
            if ($stmt_user->execute()) {
                // Agora, vamos excluir o usuário da tabela 'emprestimos'
                $sql_delete_emprestimos = "DELETE FROM usuarios WHERE id_usuario = ?";

                // Prepara e executa a instrução SQL para excluir o usuário da tabela 'emprestimos'
                if ($stmt_emprestimos = $conexao->prepare($sql_delete_emprestimos)) {
                    // Vincula o parâmetro ID à declaração SQL
                    $stmt_emprestimos->bind_param("i", $id_usuario);

                    // Executa a declaração SQL para excluir o usuário da tabela 'emprestimos'
                    if ($stmt_emprestimos->execute()) {
                        // Usuário excluído com sucesso de ambas as tabelas
                        header("Location: usuariosAdmin.php");
                        exit();
                    } else {
                        // Se houver um erro na execução da instrução SQL para excluir o usuário da tabela 'emprestimos', redireciona com uma mensagem de erro
                        header("Location: usuariosAdmin.php");
                        exit();
                    }
                } else {
                    // Se houver um erro na preparação da instrução SQL para excluir o usuário da tabela 'emprestimos', redireciona com uma mensagem de erro
                    header("Location: usuariosAdmin.php");
                    exit();
                }
            } else {
                // Se houver um erro na execução da instrução SQL para excluir o usuário da tabela 'usuarios', redireciona com uma mensagem de erro
                header("Location: usuariosAdmin.php");
                exit();
            }
        } else {
            // Se houver um erro na preparação da instrução SQL para excluir o usuário da tabela 'usuarios', redireciona com uma mensagem de erro
            header("Location: usuariosAdmin.php");
            exit();
        }
    } else {
        // Se o parâmetro 'id_usuario' não foi enviado via POST, redireciona com uma mensagem de erro
        header("Location: usuariosAdmin.php");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
