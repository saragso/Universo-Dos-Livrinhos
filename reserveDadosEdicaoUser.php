<?php
include('conexao.php');

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_foto'])) {
        $email = strtoupper($_POST["email"]); 

        // Verifica se o arquivo foi enviado
        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
            $foto = $_FILES['foto_perfil'];

            // Diretório de destino para a foto de perfil
            $diretorioDestino = './Assets/Imagens/';
            $caminhoArquivo = $diretorioDestino . basename($foto['name']);

            // Verifica se o diretório de destino existe, se não, cria
            if (!file_exists($diretorioDestino)) {
                mkdir($diretorioDestino, 0777, true);
            }

            // Move o arquivo enviado para o diretório de destino
            if (move_uploaded_file($foto['tmp_name'], $caminhoArquivo)) {
                // Atualiza o caminho da foto de perfil no banco de dados
                $sql_update_foto = "UPDATE usuarios SET foto_perfil='$caminhoArquivo' WHERE email='$email'";

                if ($conexao->query($sql_update_foto) === TRUE) {
                    error_log("Foto de perfil atualizada com sucesso: " . $caminhoArquivo);
                    header("Location: editarDadosUser.html?success=foto");
                    exit();
                } else {
                    error_log("Erro ao atualizar foto no banco de dados: " . $conexao->error);
                    header("Location: editarDadosUser.html?error=foto");
                    exit();
                }
            } else {
                error_log("Erro ao mover o arquivo enviado.");
                header("Location: editarDadosUser.html?error=move");
                exit();
            }
        } else {
            error_log("Nenhum arquivo enviado ou erro no envio: " . $_FILES['foto_perfil']['error']);
            header("Location: editarDadosUser.html?error=no_file");
            exit();
        }
    } elseif (isset($_POST['update_nome'])) {
        $nome_aluno = ($_POST["nome_aluno"]);
        $sobrenome_aluno = ($_POST["sobrenome_aluno"]);
        $email = strtoupper($_POST["email"]);

        $sql_update_nome = "UPDATE usuarios SET nome_aluno='$nome_aluno', sobrenome_aluno='$sobrenome_aluno' WHERE email='$email'";

        if ($conexao->query($sql_update_nome) === TRUE) {
            header("Location: editarDadosUser.html?success=nome");
            exit();
        } else {
            header("Location: editarDadosUser.html?error=nome");
            exit();
        }
    } elseif (isset($_POST['update_email'])) {
        $email = ($_POST["email"]);
        $email_antigo = ($_POST["email_antigo"]);

        $sql_update_email = "UPDATE usuarios SET email='$email' WHERE email='$email_antigo'";

        if ($conexao->query($sql_update_email) === TRUE) {
            header("Location: editarDadosUser.html?success=email");
            exit();
        } else {
            header("Location: editarDadosUser.html?error=email");
            exit();
        }

    } elseif (isset($_POST['update_telefone'])) {
        $telefone_contato = ($_POST["tel"]);
        $email = strtoupper($_POST["email"]);

        $sql_update_telefone = "UPDATE usuarios SET telefone_contato='$telefone_contato' WHERE email='$email'";

        if ($conexao->query($sql_update_telefone) === TRUE) {
            header("Location: editarDadosUser.html?success=telefone");
            exit();
        } else {
            header("Location: editarDadosUser.html?error=telefone");
            exit();
        }

    } elseif (isset($_POST['update_senha'])) {
        $senha = $_POST["new-password"];
        $confirmasenha = $_POST["confirm-new-Password"];
        $email = strtoupper($_POST["email"]);

        // Verificar se as senhas são iguais
        if ($senha != $confirmasenha) {
            header("Location: editarDadosUser.html?error=senha");
            exit();
        } else {
            // Criptografar a nova senha
            $senha_hashed = password_hash($senha, PASSWORD_BCRYPT);

            // Atualizar a senha no banco de dados
            $sql_update_senha = "UPDATE usuarios SET senha='$senha_hashed' WHERE email='$email'";

            if ($conexao->query($sql_update_senha) === TRUE) {
                header("Location: editarDadosUser.html?success=senha");
                exit();
            } else {
                header("Location: editarDadosUser.html?error=senha");
                exit();
            }
        }
    }
}

$conexao->close();
?>