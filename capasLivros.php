<?php
// conexão com o banco de dados
include('conexao.php');

// Verifica se a conexão foi estabelecida
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Diretório onde as imagens de capa dos livros estão armazenadas
$caminho_imagens = 'Assets/Imagens/';

// Nomes das imagens
$nomes_imagens = ['a arvore generosa.png', 'a bicicleta voadora.png', 'a galinha ruiva.png', 'a grande fabrica.png', 'a historia do pedro coelho.png', 'a historia dos ratinhos.png', 'a magica da respiracao.png', 'a pele que eu tenho.png', 'a raposa vai de carro.png', 'abigail.png', 'amoras.png', 'cara de que.png', 'carona na vassoura.png', 'carta errante.png', 'como contar crocodilos.png', 'como eu cheguei aqui.png', 'como ser amigo.png', 'contos de fadas.png', 'dinheiro compra tudo.png', 'do jeito que voce e.png', 'espaco.png', 'estrelas e planetas.png', 'eu consigo.png', 'gildo.png', 'gogo.png', 'juntos somos mais fortes.png', 'lobo mau bom.png', 'meu corpinho.png', 'meu crespo e de rainha.png', 'monstro rosa.png', 'nao me toca.png', 'o bom dinossauro.png', 'o castelo.png', 'o coelho.png', 'o homem que amava.png', 'o menino da lua.png', 'o menino que tinha medo de errar.png', 'o monstro das cores vai a escola.png', 'o monstro das cores.png', 'o monstro que adorava ler.png', 'o mundo nunca dorme.png', 'o nabo gigante.png', 'o pequeno principe.png', 'o urso rabugento.png', 'o varal das letras.png', 'onde esta a bluey.png', 'para onde vamos.png', 'passaro amarelo.png', 'pedro vira porco espinho.png', 'perigoso.png', 'posso ficar no  meio.png', 'tarsilinha e as formas.png', 'tenho monstros na barriga.png', 'tulu.png', 'um dia muito mal humorado.png', 'vai dar tudo certo.png'];

// Loop para exibir todas as imagens
foreach ($nomes_imagens as $nome_imagem) {
    // Construir o caminho completo da imagem
    $caminho_completo = $caminho_imagens . $nome_imagem;

    // Exibir a imagem na página
    echo '<img src="' . $caminho_completo . '" alt="Capa do Livro"><br>';
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
