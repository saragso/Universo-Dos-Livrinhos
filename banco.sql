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
('Lara', 'da Silva', 'joaosilva@gmail.com', '00000000', '11990909090'),
('Felipe', 'Vieira', 'solangevieira@gmail.com', '00000000', '11970706060'),
('Luara', 'Mendes', 'joicemendes123@gmail.com', '00000000', '11925302890'),
('André', 'Almeida', 'leandroalmeida@gmail.com', '00000000', '11956783215'),
('Luna', 'Gouveia', 'anapaula15@gmail.com', '00000000', '11989561235'),
('Carlos', 'Pereira', 'fernandopereira@gmail.com', '00000000', '(31) 93456-7890'),
('Ana', 'Silva', 'mariasilva@gmail.com', '00000000', '(11) 91234-5678'),
('Julia', 'Lima', 'ricardo_lima@gmail.com', '00000000', '(11) 90123-4567'),
('Olivia', 'Gomes', 'marcos.gomes@gmail.com', '00000000', '(51) 94567-8901'),
('Rafael', 'Araujo', 'isabel.araujo@gmail.com', '00000000', '(81) 97890-1234'),
('Eduardo', 'Oliveira', 'patriciaoliveira@gmail.com', '00000000', '(51) 95678-9012'),
('Wendy', 'Freitas', 'renatofreitas@gmail.com', '00000000', '(41) 92345-6789'),
('Sofia', 'Carvalho', 'brunocarvalho@gmail.com', '00000000', '(91) 98901-2345'),
('Gabriel', 'Rodrigues', 'carla.rodrigues@gmail.com', '00000000', '(71) 97890-1234'),
('Nicolas', 'Fernandes', 'elisa.fernandes@gmail.com', '00000000', '(41) 93456-7890'),
('Lucas', 'Melo', 'ana.melo@gmail.com', '00000000', '(21) 91234-5678'),
('Vanessa', 'Viana', 'mariana.viana@gmail.com', '00000000', '(91) 95678-9012'),
('Tiago', 'Santos', 'juliana_santos@gmail.com', '00000000', '(11) 99012-3456'),
('Victor', 'Correia', 'gabriela_correia@gmail.com', '00000000', '(31) 91234-5678'),
('Sabrina', 'Barros', 'carlosbarros@gmail.com', '00000000', '(71) 93456-7890'),
('Pedro', 'Lopes', 'aline.lopes@gmail.com', '00000000', '(61) 95678-9012'),
('Marina', 'Lacerda', 'isabel_lacerda@gmail.com', '00000000', '(21) 98901-2345'),
('Yasmin', 'Dias', 'gustavo_dias@gmail.com', '00000000', '(61) 94567-8901'),
('Isabela', 'Torres', 'patricia_torres@gmail.com', '00000000', '(71) 94567-8901'),
('Keila', 'Mendes', 'fabio_mendes@gmail.com', '00000000', '(71) 96789-0123'),
('Helena', 'Martins', 'lucas_martins@gmail.com', '00000000', '(81) 98901-2345'),
('William', 'Peixoto', 'rodrigo.peixoto@gmail.com', '00000000', '(11) 96789-0123'),
('João', 'Moreira', 'bruno.moreira@gmail.com', '00000000', '(81) 95678-9012'),
('Daniel', 'Figueiredo', 'fernanda.figueiredo@gmail.com', '00000000', '(21) 99012-3456'),
('Bruno', 'Souza', 'joao.souza@gmail.com', '00000000', '(21) 92345-6789'),
('Thiago', 'Moura', 'elisa.moura@gmail.com', '00000000', '(81) 94567-8901'),
('Leonardo', 'Nogueira', 'fabio.nogueira@gmail.com', '00000000', '(11) 97890-1234'),
('Nathalia', 'Tavares', 'ricardo.tavares@gmail.com', '00000000', '(31) 99012-3456'),
('Elaine', 'Monteiro', 'marcosmonteiro@gmail.com', '00000000', '(31) 90123-4567'),
('Henrique', 'Vasconcelos', 'elisavasconcelos@gmail.com', '00000000', '(61) 93456-7890'),
('Fabio', 'Reis', 'ana.reis@gmail.com', '00000000', '(41) 91234-5678'),
('Karla', 'Nascimento', 'mariana.nascimento@gmail.com', '00000000', '(91) 96789-0123'),
('Ana', 'Moura', 'carlos_moura@gmail.com', '00000000', '(81) 96789-0123'),
('Carla', 'Neves', 'roberto_neves@gmail.com', '00000000', '(11) 98901-2345'),
('Bruno', 'Leite', 'patricia.leite@gmail.com', '00000000', '(91) 97890-1234'),
('Yuri', 'Furtado', 'bruno.furtado@gmail.com', '00000000', '(31) 98901-2345'),
('Otavio', 'Cavalcante', 'julia.cavalcante@gmail.com', '00000000', '(41) 90123-4567'),
('Paula', 'Xavier', 'roberto.xavier@gmail.com', '00000000', '(51) 91234-5678'),
('Renan', 'Mendonça', 'patricia.mendonca@gmail.com', '00000000', '(61) 92345-6789'),
('Daniela', 'Almeida', 'julia.almeida@gmail.com', '00000000', '(41) 94567-8901'),
('Igor', 'Barbosa', 'mariana.barbosa@gmail.com', '00000000', '(91) 99012-3456'),
('Xavier', 'Teixeira', 'luciana.teixeira@gmail.com', '00000000', '(51) 93456-7890'),
('Zion', 'Oliveira', 'roberto.oliveira@gmail.com', '00000000', '(41) 99012-3456'),
('Ursula', 'Vieira', 'anderson.vieira@gmail.com', '00000000', '(21) 90123-4567'),
('Quesia', 'Santana', 'fabio.santana@gmail.com', '00000000', '(71) 96789-0123'),
('Fernanda', 'Costa', 'roberto.costa@gmail.com', '00000000', '(61) 96789-0123'),
('Mariana', 'Ribeiro', 'rodrigo.ribeiro@gmail.com', '00000000', '(31) 92345-6789');


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
('o monstro que adorava ler.png', 'O monstro que adorava ler', 'Lili Chartrand', 'SM', '4 - 7 anos', 'À beira de uma floresta encantada, um monstro assustador encontra um estranho objeto que ele cheira e lambe. Não tem gosto de nada! Com raiva, joga-o no chão. No entanto, esse objeto admirável vai mudar completamente a sua vida e seu humor.'),
('perigoso.png', 'Perigoso!', 'Tim Warnes', 'Ciranda Cultural', '4 anos', 'Bob é uma toupeira que adora etiquetar as coisas. Um dia, ele encontra uma coisa muito estranha. Uma coisa escamosa. Uma coisa escamosa com dentes pontudos. Ahhh! Cuidado, Bob!'),
('do jeito que voce e.png', 'Do jeito que você é', 'Walter Sagardoy', 'Carrocinha', '3-5 anos', 'Cada um tem um jeito. Uns são mais bagunceiros, outros mais tagarelas. Tem também aqueles que são mais criativos, tímidos, além dos mais engraçados. Outros são mais quietos, calados, organizados, tem até mesmo os mais solitários.'),
('como ser amigo.png', 'Como ser amigo', 'Molly Wigand', 'Paulus Editora', '8 anos', 'Em como ser amigo - um livro sobre amizade… Feito pra mim! a autora Molly Wigand apresenta às crianças os valores que ajudam a construir boas amizades: lealdade, verdade e honestidade'),
('espaco.png', 'Espaço', 'Lígia Knobl', 'Ciranda Cultural', '6 anos', 'Prepare-se para uma viagem inesquecível pelo lugar mais misterioso de todos: o espaço sideral! Com este livro, você vai descobrir muitas curiosidades sobre os planetas e o universo'),
('como eu cheguei aqui.png', 'Como eu cheguei aqui?', 'Philip Bunting', 'Brinque-Book', '8 anos', 'Como eu cheguei aqui? Para responder a essa pergunta, o livro traça a história desde o Big Bang (teoria que explica a origem do universo) até o seu nascimento.'),
('o menino que tinha medo de errar.png', 'O menino que tinha medo de errar', 'Andrea Viviana Taubman', 'Zit', '5 - 9 anos', 'Pedro vive preocupado, com medo de errar. Prefere passar os dias sozinho, confinado em sua casa, a aproveitar a companhia dos amigos, porque tem medo de fazer alguma coisa errada nas brincadeiras. A escola então, é uma preocupação sem fim!'),
('tulu.png', 'Tulu', 'Donaldo Buchwitz', 'Ciranda Cultural', '4 - 8 anos', 'Tulu vive entre a floresta e o lavrado. Ele é amigo dos animais, das plantas e de toda a natureza que o cerca. Mas tudo começa a mudar quando as queimadas tomam conta da mata. Nesta história, Tulu vai descobrir que não só os animais e a floresta que estão correndo perigo…'),
('o pequeno principe.png', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 'HarperKids', '2 - 8 anos', 'Conheça um piloto perdido no deserto, uma rosa vaidosa habitando um planeta frio e um pequeno príncipe que parte em uma viagem estranha e extraordinária por diversos planetas até encontrar a Terra, onde finalmente conhece a verdadeira natureza do amor.'),
('onde esta a bluey.png', 'Onde está a Bluey? Um livro de esconde-esconde', 'Joe Brumm', 'On Line Editora', '3 - 6 anos', 'Você viu Bluey e Bingo? Este livro de esconde-esconde está repleto de surpresas escondidas esperando por você. Explore um mundo repleto de desafios e diversão com os personagens do desenho.'),
('o varal das letras.png', 'O varal das letras', 'Donaldo Buchweitz e Ieda Silva', 'Ciranda Cultural', '4 - 6 anos', 'As letras fugiram do baú da professora. O que será que elas estão aprontando?'),
('o castelo.png', 'O castelo', 'Aleksei Tolstói', 'Ciranda Cultural', '2 - 5 anos', 'Que pote mais belo! Parece até um castelo! Quem será que mora aqui? Divirta-se com esse conto clássico cumulativo, escrito por Aleksei Tolstói, ilustrado por Junior Caramez e traduzido diretamente do russo por Yuri Martins.'),
('a galinha ruiva.png', 'A galinha ruiva', 'Elza Fiúza', 'Ciranda Cultural', '2 - 5 anos', 'A galinha ruiva encontrou um pé de milho com espigas enormes, perfeitas para fazer um delicioso bolo. Mas, para que o bolo fique bem gostoso, ela precisa da ajuda dos amigos animais. Será que eles a ajudaram? Aprenda com esta história a importância de cooperar e ajudar o próximo.'),
('a arvore generosa.png', 'A árvore generosa', 'Shel Silverstein', 'Companhia das Letrinhas', '5 anos', 'Neste clássico da literatura infantil, um menino e uma árvore têm uma relação muito especial. Dia após dia, ele come suas maçãs, brinca em seus galhos e descansa sob sua sombra. Porém, à medida que vai crescendo, fica cada vez mais exigente em seus pedidos.'),
('o monstro das cores.png', 'O monstro das cores', 'Anna Llenas', 'Aletria', '2 - 6 anos', 'A história estimula as crianças a identificar as diferentes emoções que sentem, como alegria, tristeza, raiva, medo e calma, através de cores. Por sua história cativante, "O monstro das cores" tornou-se o livro de cabeceira de milhares de famílias e educadores.'),
('tarsilinha e as formas.png', 'Tarsilinha e as formas', 'Patrícia Engel Secco', 'Melhoramentos', '3 - 7 anos', 'Conhecer as formas geométricas por meio de obras de arte famosas é muito interessante. Em Tarsilinha e as Formas, a percepção dos elementos que compõem as pinturas da modernista Tarsila do Amaral é uma nova forma de estimular e aguçar o olhar das crianças.'),
('a historia do pedro coelho.png', 'A história do Pedro Coelho', 'Beatriz Potter', 'Edições Barbatana', '3 - 5 anos', 'Antes de sair, a senhora Coelha avisou a seus quatro coelhinhos, Flopsy, Mopsy, Rabo-de-algodão e Pedro: “Vocês podem ir passear nos campos, mas não entrem na horta do senhor MacGregor!”.'),
('meu crespo e de rainha.png', 'Meu crespo é de rainha', 'Bell Hookks', 'Boitatá', '5 - 8 anos', 'Meu crespo é de rainha é um livro que enaltece a beleza dos fenótipos negros, exaltando penteados e texturas afro, serve de referência à garota que se vê ali representada e admirada.'),
('a pele que eu tenho.png', 'A pele que eu tenho', 'Chris Raschka', 'Bell Hooks', '5 - 8 anos', 'A cor da nossa pele é apenas uma cobertura. Para conhecer uma pessoa de verdade, é preciso enxergar além da aparência. Abrir bem o coração, encontrar no outro tesouros guardados e livrar-se de preconceitos e estereótipos.'),
('passaro amarelo.png', 'Pássaro amarelo', 'Olga de Dios', 'Boitatá', '3 - 5 anos', 'Pássaro Amarelo é um conto dedicado a todas as pessoas que compartilham livremente o seu conhecimento. Através da história de um pássaro que não consegue voar com as próprias asas, reflete sobre as invenções que melhoram a vida das pessoas e suas comunidades.'),
('o monstro das cores vai a escola.png', 'O monstro das cores vai à escola', 'Anna Llenas', 'Aletria', '2 - 5 anos', 'Escola...o que será? Uma nuvem mágica em que se pode voar? Uma selva cheia de armadilhas? Calma, Monstro das Cores! A escola é bem legal e lá te esperam muitas aventuras e novos amigos! '),
('a historia dos ratinhos.png', 'A história dos ratinhos travessos', 'Beatrix Potter', 'Edições Barbatana', '5 - 8 anos', 'Certo dia, um simpático e atrevido casal de ratinhos avista uma bonita casa. Ao espiar pela janela, veem que a mesa está servida com vasta refeição e decidem entrar. Acontece que a casa é de boneca, e a comida não tem o sabor que eles imaginavam.'),
('juntos somos mais fortes.png', 'Juntos somos mais fortes: um livro sobre a vida em grupo', 'Eileen Spinelli', 'Girassol', '5 anos', 'Com muitos exemplos de empatia, diálogo, resolução de conflitos e cooperação, a obra mostra como respeitar ao próximo pode ser simples e uma atitude eficaz para o dia a dia das pessoas.'),
('cara de que.png', 'Cara de quê?', 'Ivanke', 'Catapulta', '1 - 4 anos', 'As emoções são comuns a todas as pessoas. Não importa de que parte do mundo sejam ou a que cultura pertençam. Este livro maravilhoso, ensinará as crianças a descobrir e reconhecer as emoções no outro, e as estimulará a expressar as suas.'),
('pedro vira porco espinho.png', 'Pedro vira porco-espinho', 'Janaina Tokitaka', 'Jujuba Editora', '2 - 5 anos', 'Que tal discutir com as crianças de onde vêm as emoções? Do que se alimenta a raiva? Por que estamos calmos e de repente - pum – não estamos mais? A autora Janaina Tokitaka conta a história de Pedro, um menino comum que vai levando a vida em suas rotinas de criança'),
('buscar.png', 'Buscar', 'Olga de Dios', 'Boitatá', '0 - 3 anos', 'Bu está o tempo todo cabisbaixo. Olhando sempre para o chão, passa por toda a vizinhança, que sempre pergunta: “O que você está fazendo?”, e Bu sempre responde: “Estou buscando algo”. Um dia, quando um passarinho passou voando por cima dele, Bu sentiu algo caindo na sua cabeça.'),
('nao me toca.png', 'Não me toca, seu boboca!', 'Andrea Viviana Taubman', 'Aletria', '4 - 12 anos', 'Ritoca tem uma história para contar, meio difícil de entender, muito difícil de falar. O encontro com um tio gentil e sorridente acaba se tornando um pesadelo, do qual Ritoca e seus amigos, felizmente, conseguem escapar. “Se for de um jeito suspeito, ninguém deve tocar na gente!”, ela logo reconhece.'),
('tenho monstros na barriga.png', 'Tenho monstros na barriga', 'Tonia Casarin', 'Reino Editorial', '3 - 12 anos', 'o livro narra a história do pequeno marcelo, que diz sentir um monte de "coisas" desconhecidas na barriga. No decorrer da história, ele entende que essas "coisas" na verdade são as emoções e as chama de "monstrinhos".'),
('para onde vamos.png', 'Para onde vamos quando desaparecemos?', 'Isabel Minhós Martins', 'Planeta Tangerina', '8 - 10 anos', 'Já parou para pensar aonde vão as meias sem par? A areia da praia levada pelo vento? E o barulho, quando tudo fica em silêncio? Esses são alguns dos mistérios que a vida distribui aos montes.'),
('um dia muito mal humorado.png', 'Um dia muito mal-humorado', 'Stella J. Jonas', 'Ciranda Cultural', '2 - 5 anos', 'Uma grande onde de mau humor está se espalhando pela floresta! Começa com o urso, aborrece a toupeira... que se exalta com o ouriço, que é espinhoso com a raposa. Logo o mau humor do urso deixou todo mundo mal-humorado!'),
('o nabo gigante.png', 'O nabo gigante', 'Aleksei Tolstói', 'Ciranda Cultural', '2 - 5 anos', 'Um nabo gigante nasceu na fazenda do vovô. Ele tentou colher o nabo, mas não conseguiu. Então, ele chamou a vovó, que chamou a neta, que chamou... Será que todos juntos conseguirão colher esse nabo fresquinho?'),
('a magica da respiracao.png', 'A mágica da respiração', 'Christopher Willard', 'Caminho Suave', '3 - 7 anos', 'Todos nós vivemos dias difíceis de vez em quando. Temos sentimentos desagradáveis, como raiva, medo, solidão ou até uma tristeza mais profunda. Respire junto com esta história para descobrir algo que você já faz e que tem um poder mágico de transformar seus dias.'),
('carona na vassoura.png', 'Carona na vassoura', 'Julia Donaldson', 'Brinque-Book', '3 - 5 anos', 'A bruxa e seu gato estavam muito felizes voando na vassoura, até que... o vento leva primeiro o chapéu da bruxa, depois seu laço e, por fim, a varinha! Felizmente, cada uma dessas coisas é apanhada por um animal prestativo que se junta à bruxa agradecida e seu gato na viagem.'),
('amoras.png', 'Amoras', 'Emicida', 'Companhia das Letrinhas', '3 anos', 'Na música “Amoras”, Emicida canta: “Que a doçura das frutinhas sabor acalanto/ Fez a criança sozinha alcançar a conclusão/ Papai que bom, porque eu sou pretinha também”.'),
('posso ficar no meio.png', 'Posso ficar no meio?', 'Susanne Strasser', 'Companhia das Letrinhas', '2 anos', 'Chegou a hora da leitura! A criança chama o hamster para ler ao seu lado no sofá, e logo chegam também a zebra, o gato e o leão. Mas a cegonha ainda não apareceu e o peixe também está atrasado… Quando será que todos vão conseguir se reunir para começar a história?'),
('meu corpinho.png', 'Meu corpinho é só meu', 'Lara Nogueira', 'Editora Inverso', '3 - 5 anos', 'Como contribuir para um mundo melhor? Para a autora é ajudando as crianças a compreenderem o quanto suas vidas são importantes! pensando nisso, ela escreveu a história da pequena Maria e da descoberta de que seu corpinho é... só dela! Conheça essa história você também!'),
('gildo.png', 'Gildo', 'Silvana Rando', 'Brinque-Book', '2 - 5 anos', 'Gildo é muito corajoso. Mas como quase todo mundo, existe uma coisa que o deixa apavorado... Sempre na noite anterior a alguma festinha de aniversário de um amigo, ele não consegue pregar os olhos, por que será?'),
('a raposa vai de carro.png', 'A raposa vai de carro', 'Susanne Strasser', 'Companhia das Letrinhas', '1 - 3 anos', 'Uma raposa tremelica feliz pelos pedregulhos, desliza entre as poças e dirige pelas curvas com seu carro. Até que um ratinho se junta a ela, e a raposa nem dá trela. E depois a toupeira, o passarinho e a cobra também pegam carona… Opa! Como essa viagem vai terminar?'),
('estrelas e planetas.png', 'Estrelas e planetas', 'Pierre Winters', 'Brinque-Book', '4 - 7 anos', 'Você quer saber tudo sobre estrelas e planetas? Por que existe o dia e a noite? Por que o formato da Lua muda? o Sol é uma estrela? Que planetas existem? Para essas e muitas outras dúvidas, você terá respostas.'),
('o urso rabugento.png', 'O urso rabugento', 'Nick Bland', 'Brinque-Book', '2 - 5 anos', 'Num dia de chuva e vento, uma zebra, um alce, um leão e uma ovelha procuravam um lugar para brincar – e achavam que tinham encontrado o local ideal numa caverna seca e quentinha. Mas eis que a caverna já conta com um inquilino e ele não quer saber de companhia!'),
('o homem que amava.png', 'O homem que amava caixas', 'Stephen Michael King', 'Brinque-Book', '2 - 6 anos', 'Este livro, delicadamente, explora a complexidade das emoções envolvidas quando se ama alguém, e mostra que, às vezes, o amor pode ser demonstrado através de atos e não de palavras. As ilustrações, de um colorido vivo, complementam o texto sensível e delicado.'),
('o mundo nunca dorme.png', 'O mundo nunca dorme', 'Natalie Rompella', 'Melhoramentos', '3 - 6 anos', 'Este livro sobre natureza convida as crianças a conhecerem um universo paralelo, que fervilha de vida enquanto elas dormem. Uma atmosfera de mistério envolve tudo, até os desenhos naturalistas dos animais no final do livro.'),
('o coelho.png', 'O coelho, o escuro e a lata de biscoitos', 'Nicola O Byrne', 'Brinque-Book', '2 - 5 anos', 'Era uma vez um coelho que não queria ir dormir. Então, ele teve uma ideia brilhante para adiar a hora de ir para a cama. Prendeu o escuro em uma lata de biscoitos! Com o sol iluminando tudo, ele continuaria acordado, certo?'),
('vai dar tudo certo.png', 'Vai dar tudo certo', 'Lysa Terkeurst', 'Thomas Nelson Brasil', '2 - 6 anos', 'Neste livro infantil, Sementinha e Raposinha estão enfrentando medos, mudanças e coisas totalmente novas. E eles não gostam nem um pouco disso!'),
('abigail.png', 'Abigail', 'Catherine Rayner', 'Ciranda Cultural', '2 - 4 anos', 'Abigail adora contar. É seu passatempo favorito. Mas quando ela resolve contar as listras da zebra e as manchas do guepardo, eles simplesmente não ficam parados. Não tem jeito! O que Abigail vai fazer?'),
('eu consigo.png', 'Eu consigo!: Para crianças determinadas', 'Tracey Corderoy', 'Ciranda Cultural', '2 - 3 anos', 'Eu consigo! Olhe para mim. Sou muito esperto sim! Finalmente, o ursinho conseguiu fechar todos os botões sozinho, até os mais difíceis da sua nova mochila! Ele está tão feliz. Mas agora ele quer fazer tudo sozinho... Perfeito para você que está descobrindo o mundo!'),
('monstro rosa.png', 'Monstro rosa', 'Olga de Dios', 'Boitatá', '3 anos', 'Monstro Rosa é mais do que uma história sobre como as diferenças podem unir as pessoas, mas um verdadeiro grito de liberdade. Seu protagonista é um estranho no ninho: um ser que, antes mesmo de vir ao mundo, já era diferente dos outros.'),
('gogo.png', 'Gogô - De onde vêm os bebês?', 'Caroline Arcari', 'Caqui Editora', '3 - 6 anos', 'De forma cuidadosa e muito precisa, esta obra explica para as crianças conceitos fundamentais da vida, destacando valores importantes sobre respeito, consentimento, maturidade e prevenção da violência sexual.'),
('a bicicleta voadora.png', 'A bicicleta voadora', 'Jonas Ribeiro', 'Editora Elementar', '8 - 11 anos', 'Quanto custa uma bicicleta voadora? E quanto custa uma bicicleta de verdade? De forma lírica, são questionados os valores da sociedade de consumo, o apelo para que crianças consumam sem nenhum critério e a necessidade de reforçar a educação financeira das crianças.'),
('dinheiro compra tudo.png', 'Dinheiro compra tudo: Educação financeira para crianças','Cássia D Aquino', 'Editora Moderna', '9 - 12 anos', 'Onde é fabricado o dinheiro? As moedas têm sempre o mesmo formato? Qual a maior cédula do mundo? Afinal, dinheiro compra ou não felicidade? As respostas para essas e outras perguntas estão reunidas neste livro. Além de aprender um montão de novidades, os alunos poderão rir com as anedotas, desvendar truques de mágica, aprender a plantar dinheiro e fabricar as moedinhas mais saborosas do mundo!'), 
('o menino da lua.png', 'O menino da lua', 'Ziraldo', 'Melhoramentos', '6 - 10 anos', 'Ziraldo cria uma história surpreendente, no meio do sistema solar, onde o nada e o vazio cedem espaço às brincadeiras, às cambalhotas e a tudo aquilo que é eterno como a amizade.'),
('como contar crocodilos.png', 'Como contar crocodilos', 'Margaret Mayo', 'Companhia das Letrinhas', '6 - 8 anos', 'Como contar crocodilos é, sob todos os aspectos, uma obra encantadora. Aqui a autora Margaret Mayo reuniu oito contos populares, de nações e lugares tão afastados como a Indonésia e as planícies norte-americanas, o Japão e a Grã-Bretanha, a Grécia e as savanas africanas.'),
('carta errante.png', 'Carta errante, vó atrapalhada, menina aniversariante', 'Mirna Pinsky', 'FTD', '9 - 12 anos', 'Pedro Boné trabalhava nos correios e sua função era responder cartas enviadas para Papai Noel e Super-Homem, descobrir endereços incompletos, traduzir caligrafias ilegíveis...'),
('logo antes de nascer.png', 'Logo antes de nascer', 'Frank Fraser', 'Mater Verbi', '2 - 5 anos', 'Um menino que está prestes a nascer e conversa diretamente com Deus. Ele questiona Deus o que ele será no futuro e Deus diz que tem grandes planos para ele, o que faz o menino tentar adivinhar o que será... Um astronauta? Um médico? Um professor? Um fazendeiro?'),
('a grande fabrica.png', 'A grande fábrica de palavras', 'Agnès Lestrade', 'Aletria', '6 - 10 anos', 'Existe um país onde as pessoas quase não falam. O pequeno Philéas precisa de palavras para abrir seu coração à doce Cybelle. Mas como fazê-lo se tudo o que ele tem vontade de dizer à Cybelle custa uma fortuna?'),
('contos de fadas.png', 'Contos de fadasdos Irmãos Grimm', 'Irmãos Grimm', 'Principis', '10 anos', 'Reconhecidos mundialmente pela qualidade dos contos que produziram desde o começo do século XIX, os irmãos Grimm diziam estar só escrevendo as histórias que escutavam de camponeses e amigos.'),
('lobo mau bom.png', 'O lobo mau bom', 'Carolina Rodrigues da Silva Souza', 'Coruja Garatuja', '5 anos', 'O Lobo acreditou no que as pessoas diziam sobre ele. Assim se tornou o Lobo Mau. Até que encontrou um amigo que o fez lembrar do que havia em seu coração, e no final da história você conhecerá o verdadeiro Lobo.'),
('o bom dinossauro.png', 'O bom dinossauro - Coleção minhas primeiras histórias', 'Jefferson Ferreira', 'Editora Rideel', '2 - 5 anos', 'Compartilhe um momento de carinho e fantasia com as crianças! Acompanhe os pequenos à uma terra de sonhos em 10 minutos de leitura por meio de textos curtos e páginas ricamente ilustradas. No final, atividades divertidas irão entreter e ensinar a criançada!');

-- Criação da tabela `emprestimos`
CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NULL,
    id_livro INT NOT NULL,
    status ENUM('disponivel', 'alugado') DEFAULT 'disponivel',
    data_emprestimo DATE,
    data_devolucao DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro)
    
);

-- Inserção de dados na tabela `emprestimos`
INSERT INTO emprestimos (status, id_usuario, id_livro, data_emprestimo, data_devolucao)
VALUES 
('alugado', 1, 1, '2024-06-15', '2024-06-16'),
('alugado', 1, 3, '2024-04-23', '2024-04-23'),
('alugado', 18, 9, '2024-04-18', '2024-04-19'),
('alugado', 4, 49, '2024-06-01', '2024-06-02'),
('alugado', 23, 45, '2024-05-27', '2024-05-28'),
('alugado', 6, 25, '2024-04-12', '2024-04-13'),
('alugado', 10, 21, '2024-04-30', '2024-05-01'),
('alugado', 7, 15, '2024-05-19', '2024-05-20'),
('alugado', 19, 31, '2024-06-12', '2024-06-13'),
('alugado', 16, 33, '2024-05-05', '2024-05-06'),
('alugado', 25, 13, '2024-06-07', '2024-06-08'),
('alugado', 3, 7, '2024-06-02', '2024-06-03'),
('alugado', 30, 6, '2024-05-30', '2024-05-31'),
('alugado', 21, 43, '2024-06-04', '2024-06-05'),
('alugado', 27, 55, '2024-05-03', '2024-05-04'),
('alugado', 22, 39, '2024-05-21', '2024-05-22'),
('alugado', 26, 53, '2024-06-11', '2024-06-12'),
('alugado', 28, 2, '2024-04-26', '2024-04-27'),
('alugado', 9, 19, '2024-05-09', '2024-05-10'),
('alugado', 14, 29, '2024-05-17', '2024-05-18'),
('alugado', 11, 23, '2024-05-28', '2024-05-29'),
('alugado', 24, 51, '2024-05-23', '2024-05-24'),
('alugado', 20, 41, '2024-05-14', '2024-05-15'),
('alugado', 2, 5, '2024-05-12', '2024-05-13'),
('alugado', 8, 17, '2024-06-14', '2024-06-15'),
('alugado', 15, 35, '2024-04-21', '2024-04-22'),
('alugado', 17, 37, '2024-06-09', '2024-06-10'),
('alugado', 13, 27, '2024-06-03', '2024-06-04'),
('alugado', 12, 31, '2024-06-12', '2024-06-13'),
('alugado', 5, 11, '2024-05-25', '2024-05-26'),
('alugado', 29, 4, '2024-05-07', '2024-05-08');


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
('Letícia', 'leticiamendes@gmail.com', '000000');

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
('Lara', 'da Silva', 'joaosilva@gmail.com', '11990909090', 'Gostaria de mais informações sobre a biblioteca'),
('Felipe', 'Vieira', 'solangevieira@gmail.com', '11970706060', 'Qual o horário de funcionamento da livraria?'),
('Luara', 'Mendes', 'joicemendes123@gmail.com', '11925302890', 'Como faço para pegar emprestado um livro?'),
('André', 'Almeida', 'leandroalmeida@gmail.com', '11956783215', 'Quais os livros disponíveis para crianças de 5 anos?'),
('Luna', 'Gouveia', 'anapaula15@gmail.com', '11989561235', 'Quando devo devolver o livro que peguei emprestado?'),
('Carlos', 'Pereira', 'fernandopereira@gmail.com', '(31) 93456-7890', 'Vocês têm livros em braille para crianças?'),
('Ana', 'Silva', 'mariasilva@gmail.com', '(11) 91234-5678', 'Gostaria de saber se vocês têm livros sobre animais para meu filho'),
('Julia', 'Lima', 'ricardo_lima@gmail.com', '(11) 90123-4567', 'Qual o valor da mensalidade para ser sócio da biblioteca?'),
('Olivia', 'Gomes', 'marcos.gomes@gmail.com', '(51) 94567-8901', 'Posso renovar o empréstimo do livro por mais tempo?'),
('Rafael', 'Araujo', 'isabel.araujo@gmail.com', '(81) 97890-1234', 'Vocês oferecem atividades extracurriculares para crianças?'),
('Eduardo', 'Oliveira', 'patriciaoliveira@gmail.com', '(51) 95678-9012', 'Onde posso encontrar livros de pintura para crianças?'),
('Wendy', 'Freitas', 'renatofreitas@gmail.com', '(41) 92345-6789', 'Como faço para doar livros para a biblioteca?'),
('Sofia', 'Carvalho', 'brunocarvalho@gmail.com', '(91) 98901-2345', 'Qual a idade recomendada para o livro "O Pequeno Príncipe"?'),
('Gabriel', 'Rodrigues', 'carla.rodrigues@gmail.com', '(71) 97890-1234', 'Vocês têm livros interativos para crianças?'),
('Nicolas', 'Fernandes', 'elisa.fernandes@gmail.com', '(41) 93456-7890', 'Gostaria de saber sobre o programa de leitura para crianças'),
('Lucas', 'Melo', 'ana.melo@gmail.com', '(21) 91234-5678', 'Quais os livros mais populares entre as crianças?'),
('Vanessa', 'Viana', 'mariana.viana@gmail.com', '(91) 95678-9012', 'Como faço para me tornar voluntário na biblioteca?'),
('Tiago', 'Santos', 'juliana_santos@gmail.com', '(11) 99012-3456', 'Quais os eventos culturais que a biblioteca promove?'),
('Victor', 'Correia', 'gabriela_correia@gmail.com', '(31) 91234-5678', 'Onde encontro livros educativos para meu filho de 3 anos?'),
('Sabrina', 'Barros', 'carlosbarros@gmail.com', '(71) 93456-7890', 'Vocês têm livros sobre reciclagem para crianças?'),
('Pedro', 'Lopes', 'aline.lopes@gmail.com', '(61) 95678-9012', 'Qual a política de troca de livros danificados?'),
('Marina', 'Lacerda', 'isabel_lacerda@gmail.com', '(21) 98901-2345', 'Vocês oferecem descontos para compras em grande quantidade?'),
('Yasmin', 'Dias', 'gustavo_dias@gmail.com', '(61) 94567-8901', 'Como faço para agendar uma visita à biblioteca com minha turma?'),
('Isabela', 'Torres', 'patricia_torres@gmail.com', '(71) 94567-8901', 'Vocês têm livros sobre contos de fadas para crianças?'),
('Keila', 'Mendes', 'fabio_mendes@gmail.com', '(71) 96789-0123', 'Como posso ajudar a promover a leitura entre as crianças da comunidade?'),
('Helena', 'Martins', 'lucas_martins@gmail.com', '(81) 98901-2345', 'Quais as medidas de segurança adotadas na biblioteca?'),
('William', 'Peixoto', 'rodrigo.peixoto@gmail.com', '(11) 96789-0123', 'Vocês têm livros sobre ciências para crianças?'),
('João', 'Moreira', 'bruno.moreira@gmail.com', '(81) 95678-9012', 'Gostaria de saber se vocês têm livros sobre astronomia para crianças'),
('Daniel', 'Figueiredo', 'fernanda.figueiredo@gmail.com', '(21) 99012-3456', 'Posso fazer doações de livros usados para a biblioteca?'),
('Bruno', 'Souza', 'joao.souza@gmail.com', '(21) 92345-6789', 'Qual o prazo para devolver um livro emprestado?'),
('Thiago', 'Moura', 'elisa.moura@gmail.com', '(81) 94567-8901', 'Quais as formas de pagamento aceitas na biblioteca?'),
('Leonardo', 'Nogueira', 'fabio.nogueira@gmail.com', '(11) 97890-1234', 'Quais os cuidados necessários para preservar os livros?'),
('Nathalia', 'Tavares', 'ricardo.tavares@gmail.com', '(31) 99012-3456', 'Gostaria de saber sobre os eventos literários realizados pela biblioteca');


