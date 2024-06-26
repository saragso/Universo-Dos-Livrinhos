<?php

include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os parâmetros foram enviados via POST
    if (isset($_POST['id_livro'], $_POST['status'])) {
        $id_livro = $_POST['id_livro'];
        $status = $_POST['status'];

        // Verifica se o status é "alugado" ou "disponível"
        if ($status === 'alugado') {
            if (isset($_POST['id_usuario'], $_POST['data_emprestimo'], $_POST['data_devolucao'])) {
                $id_usuario = $_POST['id_usuario'];
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
                                header("Location: catalogoLivro.php");
                                exit();
                            } else {
                                header("Location: catalogoLivro.php?error=update_failed");
                                exit();
                            }
                            $stmt_update->close();
                        } else {
                            header("Location: catalogoLivro.php?error=update_prepare_failed");
                            exit();
                        }
                    } else {
                        // Insere um novo empréstimo
                        $sql_insert = "INSERT INTO emprestimos (id_usuario, id_livro, status, data_emprestimo, data_devolucao) VALUES (?, ?, ?, ?, ?)";
                        if ($stmt_insert = $conexao->prepare($sql_insert)) {
                            $stmt_insert->bind_param("iisss", $id_usuario, $id_livro, $status, $data_emprestimo, $data_devolucao);
                            if ($stmt_insert->execute()) {
                                header("Location: catalogoLivro.php");
                                exit();
                            } else {
                                header("Location: catalogoLivro.php?error=insert_failed");
                                exit();
                            }
                            $stmt_insert->close();
                        } else {
                            header("Location: catalogoLivro.php?error=insert_prepare_failed");
                            exit();
                        }
                    }
                } else {
                    header("Location: catalogoLivro.php?error=check_status_prepare_failed");
                    exit();
                }
            } else {
                header("Location: catalogoLivro.php?error=missing_params");
                exit();
            }
        } else if ($status === 'disponivel') {
            // Atualiza o status do livro para "disponível" e limpa os campos de empréstimo
            $sql_update = "UPDATE emprestimos SET id_usuario = NULL, status = 'disponivel', data_emprestimo = NULL, data_devolucao = NULL WHERE id_livro = ?";
            if ($stmt_update = $conexao->prepare($sql_update)) {
                $stmt_update->bind_param("i", $id_livro);
                if ($stmt_update->execute()) {
                    header("Location: catalogoLivro.php");
                    exit();
                } else {
                    header("Location: catalogoLivro.php?error=update_failed");
                    exit();
                }
                $stmt_update->close();
            } else {
                header("Location: catalogoLivro.php?error=update_prepare_failed");
                exit();
            }
        } else {
            header("Location: catalogoLivro.php?error=invalid_status");
            exit();
        }
    } else {
        header("Location: catalogoLivro.php?error=missing_params");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();

?>
