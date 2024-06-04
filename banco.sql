-- Criação do banco de dados
CREATE DATABASE biblioteca;
USE biblioteca;

-- Criação da tabela `usuarios`
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(255) NOT NULL,
    sobrenome_aluno VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto_perfil VARCHAR(255),
    telefone_contato VARCHAR(20)
); 

-- Inserção de dados na tabela `usuarios`
INSERT INTO usuarios (nome_aluno, sobrenome_aluno, email, senha, telefone_contato)
VALUES 
('Lara', 'da Silva', 'joaosilva@gmail.com', 'senha_criptografada', '11990909090'),
('Felipe', 'Vieira', 'solangevieira@gmail.com', 'senha_criptografada', '11970706060'),
('Luara', 'Mendes', 'joicemendes123@gmail.com', 'senha_criptografada', '11925302890'),
('André', 'Almeida', 'leandroalmeida@gmail.com', 'senha_criptografada', '11956783215'),
('Luna', 'Gouveia', 'anapaula15@gmail.com', 'senha_criptografada', '11989561235'),
('Carlos', 'Pereira', 'fernandopereira@gmail.com', 'senha_criptografada', '(31) 93456-7890'),
('Ana', 'Silva', 'mariasilva@gmail.com', 'senha_criptografada', '(11) 91234-5678'),
('Julia', 'Lima', 'ricardo_lima@gmail.com', 'senha_criptografada', '(11) 90123-4567'),
('Olivia', 'Gomes', 'marcos.gomes@gmail.com', 'senha_criptografada', '(51) 94567-8901'),
('Rafael', 'Araujo', 'isabel.araujo@gmail.com', 'senha_criptografada', '(81) 97890-1234'),
('Eduardo', 'Oliveira', 'patriciaoliveira@gmail.com', 'senha_criptografada', '(51) 95678-9012'),
('Wendy', 'Freitas', 'renatofreitas@gmail.com', 'senha_criptografada', '(41) 92345-6789'),
('Sofia', 'Carvalho', 'brunocarvalho@gmail.com', 'senha_criptografada', '(91) 98901-2345'),
('Gabriel', 'Rodrigues', 'carla.rodrigues@gmail.com', 'senha_criptografada', '(71) 97890-1234'),
('Nicolas', 'Fernandes', 'elisa.fernandes@gmail.com', 'senha_criptografada', '(41) 93456-7890'),
('Lucas', 'Melo', 'ana.melo@gmail.com', 'senha_criptografada', '(21) 91234-5678'),
('Vanessa', 'Viana', 'mariana.viana@gmail.com', 'senha_criptografada', '(91) 95678-9012'),
('Tiago', 'Santos', 'juliana_santos@gmail.com', 'senha_criptografada', '(11) 99012-3456'),
('Victor', 'Correia', 'gabriela_correia@gmail.com', 'senha_criptografada', '(31) 91234-5678'),
('Sabrina', 'Barros', 'carlosbarros@gmail.com', 'senha_criptografada', '(71) 93456-7890'),
('Pedro', 'Lopes', 'aline.lopes@gmail.com', 'senha_criptografada', '(61) 95678-9012'),
('Marina', 'Lacerda', 'isabel_lacerda@gmail.com', 'senha_criptografada', '(21) 98901-2345'),
('Yasmin', 'Dias', 'gustavo_dias@gmail.com', 'senha_criptografada', '(61) 94567-8901'),
('Isabela', 'Torres', 'patricia_torres@gmail.com', 'senha_criptografada', '(71) 94567-8901'),
('Keila', 'Mendes', 'fabio_mendes@gmail.com', 'senha_criptografada', '(71) 96789-0123'),
('Helena', 'Martins', 'lucas_martins@gmail.com', 'senha_criptografada', '(81) 98901-2345'),
('William', 'Peixoto', 'rodrigo.peixoto@gmail.com', 'senha_criptografada', '(11) 96789-0123'),
('João', 'Moreira', 'bruno.moreira@gmail.com', 'senha_criptografada', '(81) 95678-9012'),
('Daniel', 'Figueiredo', 'fernanda.figueiredo@gmail.com', 'senha_criptografada', '(21) 99012-3456'),
('Bruno', 'Souza', 'joao.souza@gmail.com', 'senha_criptografada', '(21) 92345-6789'),
('Thiago', 'Moura', 'elisa.moura@gmail.com', 'senha_criptografada', '(81) 94567-8901'),
('Leonardo', 'Nogueira', 'fabio.nogueira@gmail.com', 'senha_criptografada', '(11) 97890-1234'),
('Nathalia', 'Tavares', 'ricardo.tavares@gmail.com', 'senha_criptografada', '(31) 99012-3456'),
('Elaine', 'Monteiro', 'marcosmonteiro@gmail.com', 'senha_criptografada', '(31) 90123-4567'),
('Henrique', 'Vasconcelos', 'elisavasconcelos@gmail.com', 'senha_criptografada', '(61) 93456-7890'),
('Fabio', 'Reis', 'ana.reis@gmail.com', 'senha_criptografada', '(41) 91234-5678'),
('Karla', 'Nascimento', 'mariana.nascimento@gmail.com', 'senha_criptografada', '(91) 96789-0123'),
('Ana', 'Moura', 'carlos_moura@gmail.com', 'senha_criptografada', '(81) 96789-0123'),
('Carla', 'Neves', 'roberto_neves@gmail.com', 'senha_criptografada', '(11) 98901-2345'),
('Bruno', 'Leite', 'patricia.leite@gmail.com', 'senha_criptografada', '(91) 97890-1234'),
('Yuri', 'Furtado', 'bruno.furtado@gmail.com', 'senha_criptografada', '(31) 98901-2345'),
('Otavio', 'Cavalcante', 'julia.cavalcante@gmail.com', 'senha_criptografada', '(41) 90123-4567'),
('Paula', 'Xavier', 'roberto.xavier@gmail.com', 'senha_criptografada', '(51) 91234-5678'),
('Renan', 'Mendonça', 'patricia.mendonca@gmail.com', 'senha_criptografada', '(61) 92345-6789'),
('Daniela', 'Almeida', 'julia.almeida@gmail.com', 'senha_criptografada', '(41) 94567-8901'),
('Igor', 'Barbosa', 'mariana.barbosa@gmail.com', 'senha_criptografada', '(91) 99012-3456'),
('Xavier', 'Teixeira', 'luciana.teixeira@gmail.com', 'senha_criptografada', '(51) 93456-7890'),
('Zion', 'Oliveira', 'roberto.oliveira@gmail.com', 'senha_criptografada', '(41) 99012-3456'),
('Ursula', 'Vieira', 'anderson.vieira@gmail.com', 'senha_criptografada', '(21) 90123-4567'),
('Quesia', 'Santana', 'fabio.santana@gmail.com', 'senha_criptografada', '(71) 96789-0123'),
('Fernanda', 'Costa', 'roberto.costa@gmail.com', 'senha_criptografada', '(61) 96789-0123'),
('Mariana', 'Ribeiro', 'rodrigo.ribeiro@gmail.com', 'senha_criptografada', '(31) 92345-6789');


-- Criação da tabela `livros`
CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    capalivro VARCHAR(255) NOT NULL,
    nomelivro VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    editora VARCHAR(255) NOT NULL,
    classificacao VARCHAR(50),
    sinopse TEXT
);

-- Inserção de dados na tabela `livros`
INSERT INTO livros (capalivro, nomelivro, autor, editora, classificacao, sinopse)
VALUES 
('o monstro que adorava ler.png', 'O monstro que adorava ler', 'Lili Chartrand', 'SM', '4 - 7 anos', 'À beira de uma floresta encantada, um monstro assustador encontra um estranho objeto que ele cheira e lambe. Não tem gosto de nada! Com raiva, joga-o no chão. No entanto, esse objeto admirável vai mudar completamente a sua vida e seu humor. Uma história engraçada, surpreendente e tocante sobre a magia dos livros e o prazer da leitura'),
('perigoso.png', 'Perigoso!', 'Tim Warnes', 'Ciranda Cultural', '4 anos', 'Bob é uma toupeira que adora etiquetar as coisas. Um dia, ele encontra uma coisa muito estranha. Uma coisa escamosa. Uma coisa escamosa com dentes pontudos. Ahhh! Cuidado, Bob!'),
('do jeito que voce e.png', 'Do jeito que você é', 'Walter Sagardoy', 'Carrocinha', '3-5 anos', 'Cada um tem um jeito. Uns são mais bagunceiros, outros mais tagarelas. Tem também aqueles que são mais criativos, tímidos, além dos mais engraçados. Outros são mais quietos, calados, organizados, tem até mesmo os mais solitários. Walter Sagardoy escreveu e Márcia Menezes ilustrou este livro sensível, que fala de amor, de ser quem realmente você é, para vivermos em um mundo melhor.'),
('como ser amigo.png', 'Como ser amigo', 'Molly Wigand', 'Paulus Editora', '8 anos', 'Em como ser amigo - um livro sobre amizade… Feito pra mim! a autora Molly Wigand apresenta às crianças os valores que ajudam a construir boas amizades: lealdade, verdade e honestidade'),
('espaco.png', 'Espaço', 'Lígia Knobl', 'Ciranda Cultural', '6 anos', 'Prepare-se para uma viagem inesquecível pelo lugar mais misterioso de todos: o espaço sideral! Com este livro, você vai descobrir muitas curiosidades sobre os planetas e o universo'),
('como eu cheguei aqui.png', 'Como eu cheguei aqui?', 'Philip Bunting', 'Brinque-Book', '8 anos', 'Como eu cheguei aqui? Para responder a essa pergunta, o livro traça a história desde o Big Bang (teoria que explica a origem do universo) até o seu nascimento.'),
('o menino que tinha medo de errar.png', 'O menino que tinha medo de errar', 'Andrea Viviana Taubman', 'Zit', '5 - 9 anos', 'Pedro vive preocupado, com medo de errar. Prefere passar os dias sozinho, confinado em sua casa, a aproveitar a companhia dos amigos, porque tem medo de fazer alguma coisa errada nas brincadeiras. A escola, então, é uma preocupação sem fim para ele! Um lugar onde não faltam oportunidades para cometer deslizes. Mas com a ajuda de uma fada, Pedro percebe que viver reprimido o impede de experimentar momentos incríveis.'),
('tulu.png', 'Tulu', 'Donaldo Buchwitz', 'Ciranda Cultural', '4 - 8 anos', 'Tulu vive entre a floresta e o lavrado. Ele é amigo dos animais, das plantas e de toda a natureza que o cerca. Mas tudo começa a mudar quando as queimadas tomam conta da mata. Nesta história, Tulu vai descobrir que não só os animais e a floresta que estão correndo perigo…'),
('o pequeno principe.png', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'HarperKids', '2 - 8 anos', 'Conheça um piloto perdido no deserto, uma rosa vaidosa habitando um planeta frio e um pequeno príncipe que parte em uma viagem estranha e extraordinária por diversos planetas até encontrar a Terra, onde finalmente conhece a verdadeira natureza do amor.'),
('onde esta a bluey.png', 'Onde está a Bluey? Um livro de esconde-esconde', 'Joe Brumm', 'On Line Editora', '3 - 6 anos', 'Você viu Bluey e Bingo? Este livro de esconde-esconde está repleto de surpresas escondidas esperando por você. Explore um mundo repleto de desafios e diversão com os personagens do desenho.'),
('o varal das letras.png', 'O varal das letras', 'Donaldo Buchweitz e Ieda Silva', 'Ciranda Cultural', '4 - 6 anos', 'As letras fugiram do baú da professora. O que será que elas estão aprontando?'),
('o castelo.png', 'O castelo', 'Aleksei Tolstói', 'Ciranda Cultural', '2 - 5 anos', 'Que pote mais belo! Parece até um castelo! Quem será que mora aqui? Divirta-se com esse conto clássico cumulativo, escrito por Aleksei Tolstói, ilustrado por Junior Caramez e traduzido diretamente do russo por Yuri Martins.'),
('a galinha ruiva.png', 'A galinha ruiva', 'Elza Fiúza', 'Ciranda Cultural', '2 - 5 anos', 'A galinha ruiva encontrou um pé de milho com espigas enormes, perfeitas para fazer um delicioso bolo. Mas, para que o bolo fique bem gostoso, ela precisa da ajuda dos amigos animais. Será que eles a ajudaram? Aprenda com esta história a importância de cooperar e ajudar o próximo.'),
('a arvore generosa.png', 'A árvore generosa', 'Shel Silverstein', 'Companhia das Letrinhas', '5 anos', 'Neste clássico da literatura infantil, um menino e uma árvore têm uma relação muito especial. Dia após dia, ele come suas maçãs, brinca em seus galhos e descansa sob sua sombra. Porém, à medida que vai crescendo, fica cada vez mais exigente em seus pedidos, e a árvore, mesmo com poucos recursos mas cheia de amor, continua a fazer tudo o que ele quer.'),
('o monstro das cores.png', 'O monstro das cores', 'Anna Llenas', 'Aletria', '2 - 6 anos', 'A história estimula as crianças a identificar as diferentes emoções que sentem, como alegria, tristeza, raiva, medo e calma, através de cores. Por sua história cativante, "O monstro das cores" tornou-se o livro de cabeceira de milhares de famílias e educadores.'),
('tarsilinha e as formas.png', 'Tarsilinha e as formas', 'Patrícia Engel Secco', 'Melhoramentos', '3 - 7 anos', 'Conhecer as formas geométricas por meio de obras de arte famosas é muito interessante. Em Tarsilinha e as Formas, a percepção dos elementos que compõem as pinturas da modernista Tarsila do Amaral é uma nova forma de estimular e aguçar o olhar das crianças.'),
('a historia do pedro coelho.png', 'A história do Pedro Coelho', 'Beatriz Potter', 'Edições Barbatana', '3 - 5 anos', 'Antes de sair, a senhora Coelha avisou a seus quatro coelhinhos, Flopsy, Mopsy, Rabo-de-algodão e Pedro: “Vocês podem ir passear nos campos, mas não entrem na horta do senhor MacGregor!”.'),
('meu crespo e de rainha.png', 'Meu crespo é de rainha', 'Bell Hookks', 'Boitatá', '5 - 8 anos', 'Meu crespo é de rainha é um livro que enaltece a beleza dos fenótipos negros, exaltando penteados e texturas afro, serve de referência à garota que se vê ali representada e admirada.'),
('a pele que eu tenho.png', 'A pele que eu tenho', 'Chris Raschka', 'Bell Hooks', '5 - 8 anos', 'A cor da nossa pele é apenas uma cobertura. Para conhecer uma pessoa de verdade, é preciso enxergar além da aparência. Abrir bem o coração, encontrar no outro tesouros guardados e livrar-se de preconceitos e estereótipos.'),
('passaro amarelo.png', 'Pássaro amarelo', 'Olga de Dios', 'Boitatá', '3 - 5 anos', 'Pássaro Amarelo é um conto dedicado a todas as pessoas que compartilham livremente o seu conhecimento. Através da história de um pássaro que não consegue voar com as próprias asas, reflete sobre as invenções que melhoram a vida das pessoas e suas comunidades.'),
('o monstro das cores vai a escola.png', 'O monstro das cores vai à escola', 'Anna Llenas', 'Aletria', '2 - 5 anos', 'Escola...o que será? Uma nuvem mágica em que se pode voar? Uma selva cheia de armadilhas? Calma, Monstro das Cores! A escola é bem legal e lá te esperam muitas aventuras e novos amigos! '),
('a historia dos ratinhos.png', 'A história dos ratinhos travessos', 'Beatrix Potter', 'Edições Barbatana', '5 - 8 anos', 'Certo dia, um simpático e atrevido casal de ratinhos avista uma bonita casa. Ao espiar pela janela, veem que a mesa está servida com vasta refeição e decidem entrar. Acontece que a casa é de boneca, e a comida não tem o sabor que eles imaginavam, dando início a uma enorme confusão por parte dos dois ratinhos...'),
('juntos somos mais fortes.png', 'Juntos somos mais fortes: um livro sobre a vida em grupo', 'Eileen Spinelli', 'Girassol', '5 anos', 'Este livro ilustrado mostra as alegrias do trabalho em equipe e da vida em comunidade. Com muitos exemplos de empatia, diálogo, resolução de conflitos e cooperação, a obra mostra como respeitar ao próximo pode ser simples e uma atitude eficaz para o dia a dia das pessoas.'),
('cara de que.png', 'Cara de quê?', 'Ivanke', 'Catapulta', '1 - 4 anos', 'As emoções são comuns a todas as pessoas. Não importa de que parte do mundo sejam ou a que cultura pertençam. Este livro maravilhoso, ensinará as crianças a descobrir e reconhecer as emoções no outro, e as estimulará a expressar as suas.'),
('pedro vira porco espinho.png', 'Pedro vira porco-espinho', 'Janaina Tokitaka', 'Jujuba Editora', '2 - 5 anos', 'Que tal discutir com as crianças de onde vêm as emoções? Do que se alimenta a raiva? Por que estamos calmos e de repente - pum – não estamos mais? A autora Janaina Tokitaka conta a história de Pedro, um menino comum que vai levando a vida em suas rotinas de criança'),
('buscar.png', 'Buscar', 'Olga de Dios', 'Boitatá', '0 - 3 anos', 'Bu está o tempo todo cabisbaixo. Olhando sempre para o chão, passa por toda a vizinhança, que sempre pergunta: “O que você está fazendo?”, e Bu sempre responde: “Estou buscando algo”. Um dia, quando um passarinho passou voando por cima dele, Bu sentiu algo caindo na sua cabeça.'),
('nao me toca.png', 'Não me toca, seu boboca!', 'Andrea Viviana Taubman', 'Aletria', '4 - 12 anos', 'Ritoca tem uma história para contar, meio difícil de entender, muito difícil de falar. O encontro com um tio gentil e sorridente acaba se tornando um pesadelo, do qual Ritoca e seus amigos, felizmente, conseguem escapar. “Se for de um jeito suspeito, ninguém deve tocar na gente!”, ela logo reconhece.'),
('tenho monstros na barriga.png', 'Tenho monstros na barriga', 'Tonia Casarin', 'Reino Editorial', '3 - 12 anos', 'o livro narra a história do pequeno marcelo, que diz sentir um monte de "coisas" desconhecidas na barriga. No decorrer da história, ele entende que essas "coisas" na verdade são as emoções e as chama de "monstrinhos".');


-- Criação da tabela `emprestimos`
CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NULL,
    id_livro INT NOT NULL,
    status ENUM('disponivel', 'alugado') DEFAULT 'disponivel',
    data_emprestimo TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_devolucao DATE,
    data_efetiva_devolucao DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro)
    
);

-- Inserção de dados na tabela `emprestimos`
INSERT INTO emprestimos (status, id_usuario, id_livro, data_devolucao, data_efetiva_devolucao)
VALUES 
('alugado', 1, 1, '2024-06-15', '2024-06-16'),
('alugado', 1, 3, '2024-04-23', '2024-04-23');

-- Criação da tabela `admins`
CREATE TABLE admins (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Inserção de dados na tabela `admins`
INSERT INTO admins (nome, email, senha)
VALUES 
('Letícia', 'leticiamendes@gmail.com', 'senha_criptografada');

CREATE TABLE contato (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(255) NOT NULL,
    sobrenome_aluno VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone_contato VARCHAR(20) NOT NULL,
    mensagem VARCHAR(1000) NOT NULL
);

-- Inserção de dados na tabela `usuarios`
INSERT INTO contato (nome_aluno, sobrenome_aluno, email, telefone_contato, mensagem)
VALUES 
('Lara', 'da Silva', 'joaosilva@gmail.com', '11990909090', 'Gostaria de mais informações sobre a biblioteca')

