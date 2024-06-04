<?php
include('conexao.php');

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_nome'])) {
        $nome_aluno = strtoupper($_POST["nome_aluno"]);
        $sobrenome_aluno = strtoupper($_POST["sobrenome_aluno"]);
        $email = strtoupper($_POST["email"]);

        $sql_update_nome = "UPDATE usuarios SET nome_aluno='$nome_aluno', sobrenome_aluno='$sobrenome_aluno' WHERE email='$email'";

        if ($conexao->query($sql_update_nome) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Nome atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar nome: ' . $conexao->error . '</div>';
        }
    } elseif (isset($_POST['update_email'])) {
        $email = strtoupper($_POST["email"]);
        $email_antigo = strtoupper($_POST["email_antigo"]);

        $sql_update_email = "UPDATE usuarios SET email='$email' WHERE email='$email_antigo'";

        if ($conexao->query($sql_update_email) === TRUE) {
            echo '<div class="alert alert-success" role="alert">E-mail atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar e-mail: ' . $conexao->error . '</div>';
        }

    } elseif (isset($_POST['update_telefone'])) {
        $telefone_contato = strtoupper($_POST["tel"]);
        $email = strtoupper($_POST["email"]);

        $sql_update_telefone = "UPDATE usuarios SET telefone_contato='$telefone_contato' WHERE email='$email'";

        if ($conexao->query($sql_update_telefone) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Telefone atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar telefone: ' . $conexao->error . '</div>';
        }

    } elseif (isset($_POST['update_senha'])) {
        $senha = strtoupper($_POST["new-password"]);
        $confirmasenha = strtoupper($_POST["confirm-new-Password"]);
        $email = strtoupper($_POST["email"]);

            $sql_update_senha = "UPDATE usuarios SET senha='$senha' WHERE email='$email'";

            if ($conexao->query($sql_update_senha) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Senha atualizada com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar senha: ' . $conexao->error . '</div>';
            }
        
    }
}

$conexao->close();
?>

