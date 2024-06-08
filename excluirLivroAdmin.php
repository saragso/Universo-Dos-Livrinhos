<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro 'iid_livro' foi enviado via POST
    if (isset($_POST['id_livro'])) {
        // Obtém o ID do usuário a ser excluído
        $id_livro = $_POST['id_livro'];

        // Prepara a instrução SQL para excluir o usuário da tabela 'usuarios'
        $sql_delete_lvr = "DELETE FROM emprestimos WHERE id_livro = ?";

        // Prepara e executa a instrução SQL para excluir o usuário da tabela 'usuarios'
        if ($stmt_lvr = $conexao->prepare($sql_delete_lvr)) {
            // Vincula o parâmetro ID à declaração SQL
            $stmt_lvr->bind_param("i", $id_livro);

            // Executa a declaração SQL para excluir o usuário da tabela 'usuarios'
            if ($stmt_lvr->execute()) {
                // Agora, vamos excluir o usuário da tabela 'emprestimos'
                $sql_delete_emprestimos = "DELETE FROM livros WHERE id_livro = ?";

                // Prepara e executa a instrução SQL para excluir o usuário da tabela 'emprestimos'
                if ($stmt_emprestimos = $conexao->prepare($sql_delete_emprestimos)) {
                    // Vincula o parâmetro ID à declaração SQL
                    $stmt_emprestimos->bind_param("i", $id_livro);

                    // Executa a declaração SQL para excluir o usuário da tabela 'emprestimos'
                    if ($stmt_emprestimos->execute()) {
                        // Usuário excluído com sucesso de ambas as tabelas
                        header("Location: catalogoLivro.html");
                        exit();
                    } else {
                        // Se houver um erro na execução da instrução SQL para excluir o usuário da tabela 'emprestimos', redireciona com uma mensagem de erro
                        header("Location: catalogoLivro.html?error=emprestimos_execution");
                        exit();
                    }
                } else {
                    // Se houver um erro na preparação da instrução SQL para excluir o usuário da tabela 'emprestimos', redireciona com uma mensagem de erro
                    header("Location: catalogoLivro.html?error=emprestimos_prepare");
                    exit();
                }
            } else {
                // Se houver um erro na execução da instrução SQL para excluir o usuário da tabela 'usuarios', redireciona com uma mensagem de erro
                header("Location: catalogoLivro.html?error=user_execution");
                exit();
            }
        } else {
            // Se houver um erro na preparação da instrução SQL para excluir o usuário da tabela 'usuarios', redireciona com uma mensagem de erro
            header("Location: catalogoLivro.html?error=user_prepare");
            exit();
        }
    } else {
        // Se o parâmetro 'id_usuario' não foi enviado via POST, redireciona com uma mensagem de erro
        header("Location: catalogoLivro.html?error=id_missing");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>