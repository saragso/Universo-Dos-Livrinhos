<?php

include('conexao.php');

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar qual formulário foi submetido
    if (isset($_POST['update_nome'])) {
        $nome_aluno = strtoupper($_POST["nome-aluno"]);
        $sobrenome_aluno = strtoupper($_POST["nome-responsavel"]);
        
        $sql_update_nome = "UPDATE usuarios SET nome_aluno='$nome_aluno', sobrenome_aluno='$sobrenome_aluno' WHERE id='seu_id'";
        
        if ($conexao->query($sql_update_nome) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Nome atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar nome: ' . $conexao->error . '</div>';
        }
    } elseif (isset($_POST['update_email'])) {
        $email = strtoupper($_POST["email"]);
        
        // Verificar se o e-mail já está cadastrado
        $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $result_email = $conexao->query($sql_email);

        if ($result_email->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
        } else {
            $sql_update_email = "UPDATE usuarios SET email='$email' WHERE id='seu_id'";
            
            if ($conexao->query($sql_update_email) === TRUE) {
                echo '<div class="alert alert-success" role="alert">E-mail atualizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar e-mail: ' . $conexao->error . '</div>';
            }
        }
    } elseif (isset($_POST['update_telefone'])) {
        $telefone_contato = strtoupper($_POST["tel"]);
        
        $sql_update_telefone = "UPDATE usuarios SET telefone_contato='$telefone_contato' WHERE id='seu_id'";
        
        if ($conexao->query($sql_update_telefone) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Telefone atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar telefone: ' . $conexao->error . '</div>';
        }
    } elseif (isset($_POST['update_senha'])) {
        $senha = strtoupper($_POST["new-password"]);
        $confirmasenha = strtoupper($_POST["confirm-new-Password"]);
        
        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            echo '<div class="alert alert-danger" role="alert">As senhas não são iguais.</div>';
        } else {
            // As senhas coincidem, prosseguir com a atualização
            $sql_update_senha = "UPDATE usuarios SET senha='$senha' WHERE id='seu_id'";
            
            if ($conexao->query($sql_update_senha) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Senha atualizada com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar senha: ' . $conexao->error . '</div>';
            }
        }
    }
}

// Fechar conexão com o banco de dados
$conexao->close();
?>
