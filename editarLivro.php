<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os parâmetros foram enviados via POST
    if (isset($_POST['id_livro'], $_POST['id_usuario'], $_POST['status'], $_POST['data_emprestimo'], $_POST['data_devolucao'])) {
        $id_livro = $_POST['id_livro'];
        $id_usuario = $_POST['id_usuario'];
        $status = $_POST['status'];
        $data_emprestimo = $_POST['data_emprestimo'];
        $data_devolucao = $_POST['data_devolucao'];

        // Verifica se o id_usuario existe na tabela usuarios
        $sql_check_user = "SELECT COUNT(*) FROM usuarios WHERE id_usuario = ?";
        if ($stmt_check_user = $conexao->prepare($sql_check_user)) {
            $stmt_check_user->bind_param("i", $id_usuario);
            $stmt_check_user->execute();
            $stmt_check_user->bind_result($user_count);
            $stmt_check_user->fetch();
            $stmt_check_user->close();

            if ($user_count == 0) {
                // Redireciona de volta se o usuário não existir
                header("Location: editarLivro.html?error=user_not_found");
                exit();
            }
        } else {
            header("Location: editarLivro.html?error=check_user_prepare");
            exit();
        }

        // Consulta para verificar se o livro já está alugado
        $sql_check_status = "SELECT status FROM emprestimos WHERE id_livro = ?";
        if ($stmt_check = $conexao->prepare($sql_check_status)) {
            $stmt_check->bind_param("i", $id_livro);
            $stmt_check->execute();
            $stmt_check->bind_result($current_status);
            $stmt_check->fetch();
            $stmt_check->close();

            if ($current_status == 'alugado') {
                // Atualiza o status do livro
                $sql_update = "UPDATE emprestimos SET id_usuario = ?, status = ?, data_emprestimo = ?, data_devolucao = ? WHERE id_livro = ?";
                if ($stmt_update = $conexao->prepare($sql_update)) {
                    $stmt_update->bind_param("isssi", $id_usuario, $status, $data_emprestimo, $data_devolucao, $id_livro);
                    if ($stmt_update->execute()) {
                        header("Location: catalogoLivro.html");
                        exit();
                    } else {
                        header("Location: catalogoLivro.html");
                        exit();
                    }
                    $stmt_update->close();
                } else {
                    header("Location: catalogoLivro.html");
                    exit();
                }
            } else {
                // Insere um novo empréstimo
                $sql_insert = "INSERT INTO emprestimos (id_usuario, id_livro, status, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?, ?)";
                if ($stmt_insert = $conexao->prepare($sql_insert)) {
                    $stmt_insert->bind_param("iisss", $id_usuario, $id_livro, $status, $data_emprestimo, $data_devolucao);
                    if ($stmt_insert->execute()) {
                        header("Location: catalogoLivro.html");
                        exit();
                    } else {
                        header("Location: catalogoLivro.html");
                        exit();
                    }
                    $stmt_insert->close();
                } else {
                    header("Location: catalogoLivro.html");
                    exit();
                }
            }
        } else {
            header("Location: catalogoLivro.html");
            exit();
        }
    } else {
        header("Location: catalogoLivro.html");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
