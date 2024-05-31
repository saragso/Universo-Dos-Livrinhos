<?php
// Conectar ao banco de dados
$servername = "seu_servidor";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar qual formulário foi submetido
    if (isset($_POST['update_nome'])) {
        $nome = strtoupper($_POST["nome-aluno"]);
        $sobrenome = strtoupper($_POST["nome-responsavel"]);
        
        $sql_update_nome = "UPDATE sua_tabela SET nome='$nome', sobrenome='$sobrenome' WHERE id='seu_id'";
        
        if ($conn->query($sql_update_nome) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Nome atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar nome: ' . $conn->error . '</div>';
        }
    } elseif (isset($_POST['update_email'])) {
        $email = strtoupper($_POST["email"]);
        
        // Verificar se o e-mail já está cadastrado
        $sql_email = "SELECT * FROM sua_tabela WHERE email = '$email'";
        $result_email = $conn->query($sql_email);

        if ($result_email->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">Esse e-mail já está cadastrado.</div>';
        } else {
            $sql_update_email = "UPDATE sua_tabela SET email='$email' WHERE id='seu_id'";
            
            if ($conn->query($sql_update_email) === TRUE) {
                echo '<div class="alert alert-success" role="alert">E-mail atualizado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar e-mail: ' . $conn->error . '</div>';
            }
        }
    } elseif (isset($_POST['update_telefone'])) {
        $celular = strtoupper($_POST["tel"]);
        
        $sql_update_telefone = "UPDATE sua_tabela SET celular='$celular' WHERE id='seu_id'";
        
        if ($conn->query($sql_update_telefone) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Telefone atualizado com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao atualizar telefone: ' . $conn->error . '</div>';
        }
    } elseif (isset($_POST['update_senha'])) {
        $senha = strtoupper($_POST["new-password"]);
        $confirmasenha = strtoupper($_POST["confirm-new-Password"]);
        
        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            echo '<div class="alert alert-danger" role="alert">As senhas não são iguais.</div>';
        } else {
            // As senhas coincidem, prosseguir com a atualização
            $sql_update_senha = "UPDATE sua_tabela SET senha='$senha' WHERE id='seu_id'";
            
            if ($conn->query($sql_update_senha) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Senha atualizada com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao atualizar senha: ' . $conn->error . '</div>';
            }
        }
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>
