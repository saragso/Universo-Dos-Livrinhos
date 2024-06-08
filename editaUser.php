<?php
include('conexao.php');

// Verifica se a conexão foi estabelecida corretamente
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os parâmetros necessários foram enviados via POST
    if (isset($_POST['id_usuario'], $_POST['nome_aluno'], $_POST['sobrenome_aluno'], $_POST['email'])) {
        // Obtém os dados do formulário
        $id_usuario = $_POST['id_usuario'];
        $nome_aluno = $_POST['nome_aluno'];
        $sobrenome_aluno = $_POST['sobrenome_aluno'];
        $email = $_POST['email'];

        // Prepara a instrução SQL para atualizar os dados do usuário na tabela 'usuarios'
        $sql_update_user = "UPDATE usuarios SET nome_aluno = ?, sobrenome_aluno = ?, email = ? WHERE id_usuario = ?";

        // Prepara e executa a instrução SQL
        if ($stmt = $conexao->prepare($sql_update_user)) {
            // Vincula os parâmetros à declaração SQL
            $stmt->bind_param("sssi", $nome_aluno, $sobrenome_aluno, $email, $id_usuario);

            // Executa a declaração SQL
            if ($stmt->execute()) {
                // Usuário atualizado com sucesso
                header("Location: usuariosAdmin.html?success=1");
                exit();
            } else {
                // Se houver um erro na execução da instrução SQL, redireciona com uma mensagem de erro
                die("Erro na execução da instrução SQL: " . $stmt->error);
                header("Location: usuariosAdmin.html?error=update_execution");
                exit();
            }
        } else {
            // Se houver um erro na preparação da instrução SQL, redireciona com uma mensagem de erro
            die("Erro na preparação da instrução SQL: " . $conexao->error);
            header("Location: usuariosAdmin.html?error=update_prepare");
            exit();
        }
    } else {
        // Se algum parâmetro necessário não foi enviado via POST, redireciona com uma mensagem de erro
        header("Location: usuariosAdmin.html?error=missing_parameters");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
