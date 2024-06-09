catalogoLivrosUser.html vira catalogoLivrosUser.php

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"> <!--Define o conjunto de caracteres UTF-8 para suportar diferentes idiomas-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Define a largura da tela e a escala inicial para dispositivos móveis-->
    <!--Carrega o arquivo CSS do framework Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Carrega o arquivo CSS personalizado-->
    <link rel="stylesheet" href="./Assets/CSS/catalogoLivrosUser.css">
    <!--Define o ícone da página-->
    <link rel="shortcut icon" href="./Assets/Imagens/logo.png" type="image/x-icon">
    <title>Catálogo</title> <!--Define o título da página-->
</head>
<body>
    <!--Menu lateral / sidebar-->
    <nav id="sidebar">
        <div id="sidebar-content">
            <div id="user">
                <img src="./Assets/Imagens/avatar.png" id="user-avatar" alt="avatar do usuário" width="50px">
                <p id="user-infos">
                    <span class="item-description">Lara</span>
                    <span class="item-description">Estudante</span>
                </p>
            </div>
    
            <ul id="side-itens"> <!--Itens do menu lateral-->
                <li class="side-item">
                    <a href="./inicioUser.html">
                        <img class="icon-dashboard" src="./Assets/Imagens/icon homepage.png" alt="icone casa - dashboard" width="15px">
                        <span class="item-description">Início</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./perfilUser.html">
                        <img class="icon-perfil" src="./Assets/Imagens/icon user.png" alt="icone perfil do usuário" width="15px">
                        <span class="item-description">Perfil</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="./livrosAlugadosUser.html">
                        <img class="icon-livros-alugados" src="./Assets/Imagens/icon books.png" alt="icone livros alugados" width="15px">
                        <span class="item-description">Livros alugados</span>
                    </a>
                </li>
                <li class="side-item active">
                    <a href="./catalogoLivrosUser.html">
                        <img class="" src="./Assets/Imagens/icon catalog.png" alt="icone catálogo de livros" width="15px">
                        <span class="item-description">Catálogo de livros</span>
                    </a>
                </li>
            </ul>
    
            <!--Seta - Botão de abrir e fechar o menu lateral-->
            <button id="open-btn">
                <img id="open-btn-icon" src="./Assets/Imagens/icon seta.ico" alt="icone de seta" width="15px">
            </button>
        </div>
        
        <!--Botão de logout-->
        <div id="logout">
            <button id="logout-btn">
                <img id="logout-btn-icon" src="./Assets/Imagens/icon logout.ico" alt="ícone logout" width="15px">
                <span class="item-description">
                    <a href="index.html">Logout</a>
                </span>
            </button>
        </div>
    </nav> <!--Fim do menu lateral-->
    
    <main> <!--conteúdo da página, fora o menu-->
        <h1>Catálogo de livros</h1>

        <!--Usando cards do bootstrap para fazer o catálogo de livros disponíveis para aluguel-->
        <div class="cards">
            <?php

            // Incluir o arquivo de conexão com o banco de dados
            include('conexao.php');

            // Verificar se a conexão foi estabelecida
            if ($conexao->connect_error) {
                die("Falha na conexão: " . $conexao->connect_error);
            }

            // Diretório onde as imagens de capa dos livros estão armazenadas
            $caminho_imagens = 'Assets/Imagens/';

            // Consulta SQL para selecionar os dados dos livros
            $sql = "SELECT capalivro, nomelivro, autor, classificacao, sinopse FROM livros";
            $resultado = $conexao->query($sql);

            // Verificar se há resultados
            if ($resultado->num_rows > 0) {
                // Loop através dos resultados
                while ($linha = $resultado->fetch_assoc()) {
                    $capa = $linha['capalivro'];
                    $titulo = $linha['nomelivro'];
                    $autor = $linha['autor'];
                    $classificacao = $linha['classificacao'];
                    $sinopse = $linha['sinopse'];

                    // Construir o caminho completo da imagem
                    $caminho_capa = $caminho_imagens . $capa;

                    // Gerar o card
                    echo "<div class='card' style='width: 18rem; height: 38rem; margin: 10px;'>";
                    echo "<img src='$caminho_capa' class='card-img-top' alt='Capa do livro: $titulo'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>$titulo</h5>";
                    echo "<h6 class='card-subtitle'>$autor</h6>";
                    echo "<p>Classificação: $classificacao</p>";
                    echo "<p class='card-text'>$sinopse</p>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum livro encontrado.";
            }

            // Fechar a conexão com o banco de dados
            $conexao->close();
            ?>
        </div> <!--fim dos cards usando bootstrap-->
    </main>

    <!--script do menu-->
    <script src="./Assets/JS/scriptMenuUser.js"></script>
    <!--script do bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
