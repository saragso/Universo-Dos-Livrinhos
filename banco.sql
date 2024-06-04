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

