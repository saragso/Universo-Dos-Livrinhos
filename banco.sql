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
('Luna', 'Gouveia', 'anapaula15@gmail.com', 'senha_criptografada', '11989561235');

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
('tulu.png', 'Tulu', 'Donaldo Buchwitz', 'Ciranda Cultural', '4 - 8 anos', 'Tulu vive entre a floresta e o lavrado. Ele é amigo dos animais, das plantas e de toda a natureza que o cerca. Mas tudo começa a mudar quando as queimadas tomam conta da mata. Nesta história, Tulu vai descobrir que não só os animais e a floresta que estão correndo perigo…');

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
    nome_aluno VARCHAR(255) NOT NULL,
    sobrenome_aluno VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefone_contato VARCHAR(20),
    mensagem VARCHAR(1000) NOT NULL
);

-- Inserção de dados na tabela `usuarios`
INSERT INTO contato (nome_aluno, sobrenome_aluno, email, telefone_contato, mensagem)
VALUES 
('Lara', 'da Silva', 'joaosilva@gmail.com', '11990909090', 'Gostaria de mais informações sobre a biblioteca')

