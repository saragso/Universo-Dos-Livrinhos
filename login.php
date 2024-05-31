<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres UTF-8 para suportar diferentes idiomas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Define a largura da tela e a escala inicial para dispositivos móveis -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Importa o arquivo CSS do framework Bootstrap -->
    <link rel="stylesheet" href="./Assets/CSS/login.css"> <!-- Importa o arquivo CSS personalizado para a página de login -->
    <link rel="shortcut icon" href="./Assets/Imagens/logo.png" type="image/x-icon"> <!-- Define o ícone da página -->
    <title>Login</title> <!-- Define o título da página -->
</head>
<body>
    <?php

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        // Prepara a consulta SQL para evitar injeção de SQL
        $stmt = $conn->prepare("SELECT email, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($db_email, $db_senha);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            // Verifica se a senha está correta
            if (password_verify($senha, $db_senha)) {
                // Senha correta, redireciona para a página de usuário
                header("Location: inicioUser.html");
                exit();
            } else {
                // Senha incorreta
                $login_error = "Senha incorreta.";
            }
        } else {
            // E-mail não encontrado
            $login_error = "E-mail não encontrado.";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

    <header> <!-- Início do cabeçalho -->
        <!-- Navbar usando o Bootstrap -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid"> <!-- Div que envolve todo o navbar -->
                <a class="navbar-brand" href="sobreNos.html"><img src="./Assets/Imagens/Logo.png" alt="" width="50" height="50">Universo dos Livrinhos</a> <!-- Link para a página "sobreNos.html" -->
                <!-- Botão de toggle para telas menores -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> <!-- Div para o conteúdo do menu -->
                    <div class="navbar-nav">
                        <!-- Links do menu -->
                        <a class="nav-link" href="./index.html">Página principal</a>
                        <a class="nav-link" href="./sobreNos.html">Sobre nós</a>
                        <a class="nav-link" href="./entreEmContato.html">Entre em contato</a>
                        <a class="nav-link" href="./login.html">Login</a>
                        <a class="nav-link" href="./cadastreSe.html">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Fim do navbar -->
    </header> <!-- Fim do cabeçalho -->

    <main>
        <section class="home">
            <div class="container">
                <!-- Imagem na parte esquerda da tela -->
                <div class="form-image">
                    <img src="./Assets/Imagens/imagem página login.png" alt="Frase 'a cada livro, uma nova aventura', menino com um livro na cabeça e elementos que remetem à leitura na infância" width="100%" height="100%">
                </div>
                <!-- Formulário de login na parte direita da tela -->
                <div class="form">
<<<<<<< HEAD:login.php
                    <form action="" method="POST">
=======
                    <form action="reserveDadosLogin.php" method="post">
>>>>>>> b197ba98aae14bed34cf9df085a7ebcf4c99b1b1:login.html
                        <div class="form-header">
                            <div class="title">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <!-- Campos de entrada para email e senha -->
                        <div class="input-group">
                            <div class="input-box">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required maxlength="80">
                            </div>
                            <div class="input-box">
                                <label for="password">Senha</label>
                                <input id="password" type="password" name="password" placeholder="Digite sua senha" required maxlength="8">
                            </div>
                            <!-- Links para cadastro e recuperação de senha -->
                            <div class="input-box">
                                <label for="text">Ainda não tem uma conta? <a href="cadastreSe.html">Cadastre-se</a></label>
                                <label for="text">Esqueceu a senha? <a href="esqueceuSenha.html">Clique aqui</a></label>
                            </div>
                        </div>
                        <!-- Botão para enviar o formulário -->
                        <div class="continue-button">
                            <button type="submit">Entrar</button>
                        </div>
                        <?php
                        if (!empty($login_error)) {
                            echo '<div class="alert alert-danger" role="alert">' . $login_error . '</div>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <!--Script bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> <!-- Script do Bootstrap para funcionalidades como o carrossel -->
</body>
</html>
