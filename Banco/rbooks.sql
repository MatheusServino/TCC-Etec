create database bd_livros default character set utf8 collate utf8_general_ci;
use bd_livros;
 
-- drop database bd_livros;
 
create table usuarios(
cod int primary key auto_increment,
usuario varchar(45) not null,
nome varchar(30) not null,
senha varchar(60) not null
) engine=InnoDB default charset=utf8;
 
create table generos(
cod int(11) not null primary key auto_increment,
genero varchar(20) not null
) engine=InnoDB default charset=utf8;
 
create table editoras(
cod int(11) not null primary key auto_increment,
editora varchar(100) not null,
foto varchar(100) not null,
pais varchar(20) not null,
descricao text not null
) engine=InnoDB default charset=utf8;
 
create table autores(
cod int(11) not null primary key auto_increment,
nome varchar(100) not null,
foto varchar(100) not null,
descricao text not null
) engine=InnoDB default charset=utf8;

CREATE TABLE livros (
    cod INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cod_genero INT(11) NOT NULL,
    cod_editora INT(11) NOT NULL,
    cod_autor INT(11) NOT NULL,
    sinopse TEXT NOT NULL,
    nota DECIMAL(4,2) NOT NULL,
    capa VARCHAR(100) DEFAULT NULL,
    ano_publicacao INT NOT NULL,
    link VARCHAR(255) DEFAULT NULL,
    preco DECIMAL(10,2) NOT NULL,

    FOREIGN KEY (cod_genero) REFERENCES generos (cod),
    FOREIGN KEY (cod_editora) REFERENCES editoras (cod),
    FOREIGN KEY (cod_autor) REFERENCES autores (cod)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE avaliacoes (

id int not null primary key auto_increment,
id_usuario int,
id_livro int,
qtd_estrela int,
mensagem varchar(255),
created datetime not null,
modified datetime default null,

foreign key (id_usuario) references usuarios(cod),
foreign key (id_livro) references livros(cod)
);
 


CREATE TABLE Cartas (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NULL,
    id_autor INT NOT NULL,
    comentario TEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(cod) ON DELETE SET NULL,
    FOREIGN KEY (id_autor) REFERENCES autores(cod)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ListaLeitura (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_usuario int,
    id_livro int,
    favorito BOOLEAN DEFAULT FALSE,
    lendo BOOLEAN DEFAULT FALSE,
    lido BOOLEAN DEFAULT FALSE,

    FOREIGN KEY (id_usuario) REFERENCES usuarios(cod),
    FOREIGN KEY (id_livro) REFERENCES livros(cod)
);

-- select	* from listaleitura;
-- select	* from avaliacoes;
-- select * from usuarios;
-- add pelo usuario;
-- select * from generos;

INSERT INTO generos (genero) VALUES
('Romance'),
('Ficção Científica'),
('Fantasia'),
('Mistério'),
('Biografia'),
('Drama'),
('Aventura'),
('Clássico'),
('Distopia'),
('Histórico');

-- select * from editoras;

insert into editoras(editora, foto, pais, descricao) values
('Companhia das Letras','Companhia das Letras.jpg', 'Brasil', 'Fundada em 1986 por Luiz Schwarcz e Lilia Moritz Schwarcz, a Companhia das Letras rapidamente se tornou uma das editoras mais respeitadas do Brasil. Seu objetivo inicial era unir rigor editorial com um catálogo de qualidade, o que se concretizou com publicações de autores brasileiros e estrangeiros renomados. Ao longo dos anos, a editora cresceu e passou a incorporar selos diversos, como Seguinte (literatura jovem), Paralela (ficção comercial), Alfaguara (literatura estrangeira), entre outros. Em 2011, a Penguin Books tornou-se sócia da editora, criando o selo Penguin-Companhia, fortalecendo ainda mais seu catálogo de clássicos. A editora é conhecida pela diversidade de seu catálogo e pelo cuidado gráfico e editorial.'),
('HarperCollins', 'HarperCollins.png', 'EUA', 'A HarperCollins é uma das maiores editoras do mundo, formada pela fusão da Harper & Row (fundada em 1817) e da William Collins, Sons (fundada em 1819). Publica obras de autores como J.R.R. Tolkien, George R.R. Martin e Veronica Roth. No Brasil, iniciou operações em 2015 por meio de uma joint venture com a Ediouro, tornando-se independente em 2017.'),
('Penguin Books', 'Penguin Books.png', 'Reino Unido', 'Fundada em 1935 por Allen Lane, a Penguin Books revolucionou o mercado editorial ao oferecer livros de qualidade a preços acessíveis. É conhecida por sua vasta coleção de clássicos e por ser parte do grupo Penguin Random House, uma das maiores editoras do mundo.'),
('Editora Record', 'Editora Record.jpg', 'Brasil', 'Criada em 1942 por Alfredo Machado, a Editora Record começou como distribuidora de tiras de jornal e impressos, expandindo-se depois para livros. É uma das editoras mais antigas e influentes do Brasil. Seu catálogo é bastante amplo, indo da literatura brasileira à estrangeira, biografias, história, sociologia, política e livros infantojuvenis. Ao longo das décadas, a Record publicou autores como Gabriel García Márquez, Paulo Coelho, José Saramago, Nelson Rodrigues, Agatha Christie e muitos outros. Também criou selos como BestBolso, Verus, Galerinha Record, e José Olympio, cada um voltado para públicos distintos. A editora segue como um pilar da indústria editorial brasileira.'),
('Bloomsbury', 'Bloomsbury.png', 'Reino Unido', 'Fundada em 1986 por Nigel Newton, a Bloomsbury ganhou destaque mundial com a publicação da série Harry Potter, de J.K. Rowling. Além disso, publica obras de autores como Sarah J. Maas e Khaled Hosseini.'),
('Suma de Letras', 'Suma de Letras.jpg',  'Brasil', 'A Suma de Letras foi criada como selo da Editora Objetiva e passou a fazer parte do grupo Companhia das Letras em 2015. Inicialmente, o selo publicava romances comerciais, thrillers e obras de entretenimento. Com o tempo, reposicionou-se como uma editora especializada em ficção especulativa, com foco em gêneros como fantasia, ficção científica e terror. É hoje a casa editorial de autores como Stephen King, Joe Hill, Blake Crouch e Octavia E. Butler no Brasil. A Suma se destaca também por seu cuidado gráfico e por manter uma forte base de leitores apaixonados por literatura de gênero.'),
('Editora Intrínseca', 'Editora Intrínseca.png', 'Brasil', 'Fundada em 2003 por Jorge Oakim, a Editora Intrínseca iniciou suas atividades com o livro Hell - Paris 75016, de Lolita Pille. Ganhou destaque com obras como A Menina que Roubava Livros, de Markus Zusak, Crepúsculo, de Stephenie Meyer, Cinquenta Tons de Cinza, de E.L. James, e A Culpa é das Estrelas, de John Green. A editora é reconhecida por seu catálogo diversificado, que inclui literatura brasileira e estrangeira, política, economia, ciências sociais e infantojuvenil.'),
('Editora Rocco', 'Editora Rocco.png', 'Brasil', 'Fundada em 1975 por Paulo Roberto Rocco, a Editora Rocco é uma das mais importantes do Brasil. Iniciou sua trajetória com o livro Teje Preso, de Chico Anysio. Em 1988, publicou O Alquimista, de Paulo Coelho, que se tornou um best-seller. A editora é conhecida por publicar séries como Harry Potter, Jogos Vorazes, Divergente e Eragon, além de autores como Clarice Lispector, J.K. Rowling, Thalita Rebouças, Suzanne Collins, Margaret Atwood, Alice Oseman, Fredrik Backman, Anne Rice, Nilton Bonder, Ruth Ware, Frei Betto, Neil Gaiman e Miriam Leitão.'),
('Vintage Books', 'Vintage Books.png', 'EUA', 'Fundada em 1954, a Vintage Books é um selo da Knopf Doubleday Publishing Group, que integra o conglomerado Penguin Random House. A editora é especializada em literatura contemporânea e clássicos modernos, com um catálogo que inclui autores premiados e influentes, como Toni Morrison, Haruki Murakami, Philip Roth, Margaret Atwood, entre outros. Reconhecida pelo alto padrão editorial e pela curadoria literária refinada, a Vintage publica tanto edições de bolso quanto títulos de ficção literária e não ficção de peso acadêmico e cultural.'),
('Editora Objetiva', 'Editora Objetiva.png','Brasil', 'A Editora Objetiva foi fundada em 1992 e logo se destacou por seu foco em livros de não ficção, política, cultura e literatura contemporânea. Seu catálogo inclui autores como Luis Fernando Veríssimo, Tony Judt, Stephen King (publicado pelo selo Suma), Arnaldo Jabor e Harold Bloom. Criou selos importantes como Suma, Fontanar, e Alfaguara Brasil. Em 2015, a Companhia das Letras adquiriu 55% da editora, e hoje a Objetiva é um selo dentro do grupo, mantendo seu foco em obras de qualidade com apelo intelectual e jornalístico.'),
('Pandorga', 'Pandorga.jpg', 'Brasil', 'Fundada em 1992, a Pandorga é uma editora brasileira especializada em literatura infantojuvenil. Seu catálogo inclui autores como Sylvia Orthof, Bia Bedran, Ana Maria Machado e ilustradores como Ziraldo e Rui de Oliveira. A editora também produziu o programa infantil Pandorga, exibido na TVE e TV Brasil, que ganhou prêmios como o Prêmio Açorianos e o Prêmio ARI. Em 2013, firmou parceria com a TVE e a TV Brasil para produzir uma nova temporada do programa, que estreou em rede nacional em 2015. '),
('Via Leitura', 'Via Leitura.png', 'Brasil', 'A Via Leitura é um selo da Editora Record, focado na publicação de livros de bolso e literatura popular. Seu objetivo é democratizar o acesso à leitura, oferecendo livros a preços acessíveis e com ampla distribuição em livrarias, supermercados e bancas de jornal. A editora busca atender ao público leitor que busca entretenimento e cultura a preços acessíveis.'),
('BestBolso', 'BestBolso.png', 'Brasil', 'O BestBolso é um selo da Editora Record, especializado na publicação de livros de diversos gêneros a preços acessíveis. Com foco em democratizar o acesso à leitura, o selo oferece obras de ficção, não ficção, biografias e literatura infantojuvenil, com ampla distribuição em pontos de venda como livrarias, supermercados e bancas de jornal.'),
('Objetiva', 'Objetiva.png', 'Brasil', 'Fundada em 1992, a Editora Objetiva se consolidou como uma das principais editoras brasileiras. Seu catálogo inclui autores como Luis Fernando Veríssimo, Tony Judt, Arnaldo Jabor, Harold Bloom, Stephen King e Joe Hill, além do Dicionário Houaiss, um dos mais completos da língua portuguesa. A editora também lançou os selos Suma, Alfaguara e Fontanar, voltados para diferentes gêneros literários. Em 2015, a Companhia das Letras adquiriu 55% da Objetiva, tornando-se a principal acionista. '),
('Nova Fronteira', 'Nova Fronteira.png', 'Brasil', 'Fundada em 1965 por Carlos Lacerda, a Nova Fronteira é uma das maiores editoras do Brasil, com sede no Rio de Janeiro. Possui um catálogo com mais de 1.500 títulos publicados, incluindo obras de autores como Guimarães Rosa, Ariano Suassuna, João Ubaldo Ribeiro, Cecília Meireles, Manuel Bandeira, Thomas Mann, Jean-Paul Sartre, Günter Grass, Virginia Woolf, Marguerite Yourcenar, Italo Svevo, Ezra Pound, Dino Buzzati, Agatha Christie, Ana Maria Machado, Bia Bedran, Sylvia Orthof, Rui de Oliveira, Ziraldo, Cláudio Martins e Roger Melo. Em 2006, o controle acionário da Nova Fronteira foi adquirido pela Ediouro Publicações.'),
('Alta Life', 'Alta Life.png', 'Brasil', 'A Alta Life é uma editora brasileira especializada em literatura de autoajuda e bem-estar. Seu catálogo inclui obras voltadas para o desenvolvimento pessoal, qualidade de vida e espiritualidade. A editora busca oferecer aos leitores ferramentas para o autoconhecimento e aprimoramento pessoal.');


-- select * from cartas;

INSERT INTO autores (nome, foto, descricao) VALUES
('George Orwell', 'george orwell.jpg', 'George Orwell foi um escritor, jornalista e ensaísta britânico, conhecido por suas obras críticas ao totalitarismo.'),
('J.K. Rowling', 'J.K. Rowling.jpg', 'J.K. Rowling é uma escritora britânica, famosa por criar a série Harry Potter, que se tornou um fenômeno mundial.'),
('Paulo Coelho', 'Paulo Coelho.jpg', 'Paulo Coelho é um escritor brasileiro, conhecido por seus romances espirituais e filosóficos, como O Alquimista.'),
('Carlos Ruiz Zafón', 'Carlos Ruiz Zafón.jpg', 'Carlos Ruiz Zafón foi um escritor espanhol, autor de romances que misturam mistério e literatura gótica.'),
('Jane Austen', 'Jane Austen.jpg', 'Jane Austen foi uma escritora inglesa, conhecida por suas obras que exploram a condição feminina na sociedade do século XIX.'),
('F. Scott Fitzgerald', 'F. Scott Fitzgerald.jpg', 'F. Scott Fitzgerald foi um escritor americano, autor de O Grande Gatsby, que retrata a era do jazz nos EUA.'),
('Harper Lee', 'Harper Lee.jpg', 'Harper Lee foi uma escritora americana, conhecida por seu romance O Sol é para Todos, que aborda questões raciais.'),
('Gabriel García Márquez', 'Gabriel García Márquez.jpg', 'Gabriel García Márquez foi um escritor colombiano, vencedor do Nobel de Literatura, conhecido por Cem Anos de Solidão.'),
('J.R.R. Tolkien', 'J.R.R. Tolkien.jpg', 'J.R.R. Tolkien foi um escritor britânico, autor de O Senhor dos Anéis e O Hobbit, obras fundamentais da fantasia.'),
('Ernest Hemingway', 'Ernest Hemingway.jpg', 'Ernest Hemingway foi um escritor americano, conhecido por seu estilo conciso e obras como O Velho e o Mar.'),
('Dan Brown','Dan Brown.jpg', 'Daniel Gerhard Brown, conhecido por assinar como Dan Brown, é um escritor norte-americano. Seu primeiro livro, Fortaleza Digital, foi publicado em 1998 nos Estados Unidos.'),
('Markus Zusak', 'Markus Zusak.jpg', 'Markus Frank Zusak é um escritor australiano, famoso pelo seu best-seller internacional Brasil: A Menina que Roubava'),
('Machado de Assis', 'Machado de Assis.jpg', 'Joaquim Maria Machado de Assis foi um escritor brasileiro, amplamente reconhecido por críticos, estudiosos, escritores e leitores como o maior expoente da literatura brasileira.'),
('Antoine de Saint-Exupéry', 'Antoine de Saint-Exupéry.jpg', 'Antoine de Saint-Exupéry, nascido Antoine-Marie-Roger de Saint-Exupéry, foi um escritor, ilustrador e piloto francês, internacionalmente reconhecido pelo seu livro Le Petit Prince, provavelmente a obra infantil mais celebrada da história.'),
('Margaret Atwood', 'Margaret Atwood.jpg', 'Margaret Eleanor Atwood é uma escritora canadense, romancista, poetisa, contista, ensaísta e crítica literária internacionalmente reconhecida, tendo recebido inúmeros prêmios literários importantes. Foi agraciada com a Ordem do Canadá, a mais alta distinção em seu país.'),
('Victor Hugo', 'Victor Hugo.jpg', 'Victor-Marie Hugo foi um romancista, poeta, dramaturgo, ensaísta, artista, estadista e ativista pelos direitos humanos francês de grande atuação política em seu país. É autor de Les Misérables e de Notre-Dame de Paris, entre diversas outras obras clássicas de fama e renome mundial.'),
('Fiódor Dostoiévski', 'Fiódor Dostoiévski.jpg', 'Fiódor Mikhailovitch Dostoiévski foi um escritor, filósofo e jornalista do Império Russo. É considerado um dos maiores romancistas e pensadores da história, bem como um dos maiores "psicólogos" que já existiram.'),
('J.D. Salinger', 'J.D. Salinger.jpg', 'Jerome David Salinger, mais conhecido como J.D. Salinger, foi um escritor norte-americano tido como um dos mais influentes do período pós-guerra. Ficou conhecido em 1948 por conta de suas novelas, publicadas na revista The New Yorker, sobretudo pelo aclamado conto A Perfect Day for Bananafish.'),
('Bram Stoker', 'Bram Stoker.jpg', 'Abraham "Bram" Stoker foi um romancista, poeta e contista irlandês, mundialmente conhecido por seu romance gótico Drácula, a mais conhecida obra a marcar o desenvolvimento do mito literário moderno do vampiro.'),
('Mary Shelley', 'Mary Shelley.jpg', 'Mary Wollstonecraft Shelley, nascida Mary Wollstonecraft Godwin, mais conhecida por Mary Shelley, foi uma escritora britânica, filha do filósofo William Godwin e da feminista e escritora Mary Wollstonecraft.'),
('Emily Brontë', 'Emily Brontë.jpg', 'Emily Jane Brontë foi uma escritora e poetisa britânica, autora do romance Wuthering Heights, hoje considerado um clássico da literatura mundial. Era a segunda irmã mais velha das três sobreviventes irmãs Brontë, entre Charlotte e Anne. Ela escrevia sob o pseudônimo masculino Ellis Bell. '),
('Liev Tolstói', 'Liev Tolstói.jpg', 'Lev Nikoláievitch Tolstói, também conhecido em português como Liev, Leão, Leo ou Leon Tolstói, foi um escritor russo, amplamente reconhecido como um dos maiores de todos os tempos.'),
('Umberto Eco', 'Umberto Eco.jpg', 'Umberto Eco foi um escritor, filósofo, semiólogo, linguista e bibliófilo italiano de fama internacional. Foi titular da cadeira de Semiótica e diretor da Escola Superior de ciências humanas na Universidade de Bolonha.'),
('Vladimir Nabokov', 'Vladimir Nabokov.jpg', 'Vladimir Vladimirovich Nabokov foi um romancista, poeta, tradutor e entomologista russo-americano. Seus primeiros nove romances foram escritos em russo, mas ele conseguiu proeminência internacional após começar a escrever prosa em inglês.'),
('Nathaniel Hawthorne', 'Nathaniel Hawthorne.jpg', 'Nathaniel Hawthorne foi um escritor norte-americano, considerado o primeiro grande escritor dos Estados Unidos e o maior contista de seu país, sendo o responsável por tornar o puritanismo de sua época um dos temas centrais da tradição gótica.'),
('Oscar Wilde', 'Oscar Wilde.jpg', 'Oscar Fingal O Flahertie Wills Wilde, ou simplesmente Oscar Wilde, foi um influente escritor, poeta e dramaturgo irlandês.'),
('C.S. Lewis', 'C.S. Lewis.jpg', 'Clive Staples Lewis, comumente referido como C. S. Lewis, foi um professor universitário, escritor, romancista, poeta, crítico literário, ensaísta e teólogo anglicano irlandês. Durante sua carreira acadêmica, foi professor e membro do Magdalen College, tanto da Universidade de Oxford como da Universidade de Cambridge.'),
('Stephen King', 'Stephen King.jpg', 'Stephen Edwin King é um escritor norte-americano de terror, ficção sobrenatural, suspense, ficção científica e fantasia. Os seus livros já venderam mais de 400 milhões de cópias, com publicações em mais de 40 países. É o 9º autor mais traduzido no mundo.'),
('Suzanne Collins', 'Suzanne Collins.jpg', 'Suzanne Marie Collins é uma escritora e roteirista de ficção científica e literatura infanto-juvenil americana, conhecida pela trilogia Jogos Vorazes que virou filme sob título homônimo em 2012. Seus livros já venderam mais de 85 milhões de cópias no mundo todo.'),
('Mariana Zapata', 'Mariana Zapata.jpg', 'Mariana Zapata é autora bestseller do New York Times, USA Today e Amazon. Os seus romances estão publicados em mais de 12 línguas. Vive numa cidade pequena, no Colorado, com o marido e os seus adorados grand danois, Dorian e Kaiser. Quando não está a escrever, lê, passa o tempo ao ar livre e com a família.'),
('Colleen hoover', 'colleen hoover.jpg', 'Colleen Hoover, nascida Margaret Colleen Fennell é uma escritora norte-americana que escreve principalmente livros que abordam como tema central traumas, violências e a exposição de relacionamentos tóxicos, ambientado no gênero "romântico" de ficção para jovens adultos.'),
('Stephanie Garber', 'Stephanie Garber.jpg', 'Stephanie Garber é uma autora americana de ficção para jovens adultos conhecida pela série Caraval. Ela já foi a autora best-seller número 1 do New York Times e do Sunday Times com a série Caraval, que foi traduzida em mais de 25 idiomas.'),
('Mark Twain', 'Mark Twain.jpg', 'Samuel Langhorne Clemens, mais conhecido pelo pseudônimo Mark Twain, foi um escritor e humorista estadunidense crítico do racismo. É mais conhecido pelos romances As Aventuras de Tom Sawyer e sua sequência Aventuras de Huckleberry Finn, este último frequentemente chamado de "O Maior Romance Americano".' ),
('Jon Krakauer', 'Jon Krakauer.jpg', 'JON KRAKAUER nasceu em 1954, em Brookline, Massachusetts. Vencedor do prêmio do Clube Alpino Americano de literatura sobre montanhismo, escreve para diversas revistas e jornais de circulação nacional nos Estados Unidos.'),
('Robert Louis Stevenson', 'Robert Louis Stevenson.jpg', 'Robert Louis Stevenson, um mestre da narrativa escocesa do século XIX, encantou o mundo com sua prosa envolvente e suas histórias de suspense e dualidade moral.'),
('Walter Isaacson', 'Walter Isaacson.jpg', 'Walter Isaacson é um jornalista e escritor norte-americano. Já foi presidente e diretor executivo do Instituto Aspen e da CNN, além de editor da revista Time. É o autor de Einstein, His Life and Universe, Benjamin Franklin: An American Life e Kissinger: A Biography.'),
('Nelson Mandela', 'Nelson Mandela.jpg', 'Nelson Rolihlahla Mandela foi um advogado, líder rebelde e presidente da África do Sul de 1994 a 1999, considerado como o mais importante líder da África Subsaariana, vencedor do Prêmio Nobel da Paz de 1993, e pai da moderna nação sul-africana, onde é normalmente referido como Madiba ou "Tata".');


-- select * from livros;
SELECT * FROM livros
WHERE cod_genero = 1;

INSERT INTO livros (nome, cod_genero, cod_editora, cod_autor, sinopse, nota, capa, ano_publicacao, link, preco) VALUES
('1984', 2, 1, 1, 'Em uma sociedade totalitária e vigilante, Winston Smith luta contra o sistema opressor do Partido, buscando liberdade e verdade em um mundo onde a realidade é manipulada.', 4.8, '1984.jpg', 1949, 'https://www.amazon.com.br/1984-George-Orwell/dp/8535914846', '21.00'),
('Harry Potter e a Pedra Filosofal', 3, 8, 2, 'Harry descobre ser um bruxo e ingressa em Hogwarts, onde faz amigos e enfrenta perigos enquanto desvenda os mistérios de sua origem.', 4.9, 'Harry Potter e a Pedra Filosofal.jpg', 1997, 'https://www.amazon.com.br/Harry-Potter-Pedra-Filosofal-Rowling/dp/8532530788/ref=asc_df_8532530788?mcid=c01261251f5d3ec6a254ec15d8074843&tag=googleshopp00-20&linkCode=df0&hvadid=709856848257&hvpos=&hvnetw=g&hvrand=3431012517348397050&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9100667&hvtargid=pla-569630960550&psc=1&language=pt_BR&gad_source=1', '44,32'),
('It: A Coisa', 3, 3, 28, 'Um grupo de crianças enfrenta uma entidade maligna que assume a forma de um palhaço, retornando para confrontá-la décadas depois.', 4.6, 'It A Coisa.jpg', 1986,'https://www.amazon.com.br/coisa-Stephen-King/dp/8560280944/ref=sr_1_1?crid=8RLHSUAKTP4F&dib=eyJ2IjoiMSJ9.rzkuCBJOjzSWCJC4NTvLvgCGAyspoE9kAtZ-EmIrf52_p7nr3I8yVP0EobgtGe9iy8UEiqotLyIXWBtlm5EUAxYbmLE9U22tmaKM3V3_HbiWxdLWjQtaObwxHetnV15N_MBHFwOEA5MUA1stXrBb7TNp2ya6lAvamAzWgLIGiVZVOirBk3COhNkJUBxY5cExn_s3mm839me6xdIeo-SdNDUlZL-bpmEe8hUAWf-mPIE.JrFPcWU5Z_DvUK1eiB8iN_nDQoMgj0glTQ_FrWK-_eY&dib_tag=se&keywords=it+a+coisa&qid=1750289464&s=books&sprefix=it%2Cstripbooks%2C204&sr=1-1&ufe=app_do%3Aamzn1.fos.6121c6c4-c969-43ae-92f7-cc248fc6181d', '111,00'),
('O Alquimista', 6, 1, 3, 'Santiago, um jovem pastor, parte em uma jornada em busca de um tesouro, aprendendo sobre a importância de seguir seus sonhos e ouvir seu coração.', 4.7, 'O Alquimista.jpg', 1988, 'https://www.amazon.com.br/alquimista-Paulo-Coelho/dp/8584390677/ref=sr_1_1?crid=29ZQSO5FTZDJR&dib=eyJ2IjoiMSJ9.sPJhEYc_X-Zkyxw43-qkFDL4cayJMGvbhGCNFMYxC_1BZ6XankDcjg0n6tcyZtG3U3CZ3YEDRpsNzhBOIo-oV13Wxy8Vk0zZHlBYz0Nw5SOoY5azJ503O8IbvJJAi7xxzgnACFl-wh145w7XzsO25SuwoNF5bc1oCBkTIFMyzj3aQptozsiNy5J48_hhbP-w_Ks6VMna5ZPYPqGH5OuxcXGLl38kuenrTifPxVVcFRU.aLBzZis71whcEEyjEChK4a4G4vIDgiRRh09gKM74iyM&dib_tag=se&keywords=o+alquimista&qid=1750289666&s=books&sprefix=o+alqui%2Cstripbooks%2C186&sr=1-1&ufe=app_do%3Aamzn1.fos.6d798eae-cadf-45de-946a-f477d47705b9', '44,10'),
('A Sombra do Vento', 4, 1, 4, 'Daniel encontra um livro misterioso e, ao buscar informações sobre o autor, mergulha em uma trama de segredos e perigos na Barcelona pós-guerra.', 4.6, 'A Sombra do Vento.jpg', 2001,'https://www.amazon.com.br/sombra-vento-Carlos-Ruiz-Zaf%C3%B3n/dp/8556510345/ref=sr_1_1?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3LPXI6EICN2K1&dib=eyJ2IjoiMSJ9.8_JA9keBHDEHo3tejDu-PB6JW3Z6euI4qNh937laMs90ez8uWZi5O4HE155LytfFUr5aMOk4Kt2qgx3GtsGnPJsRkTZ7IpfSKNC2O17ViEzu1qxgu5GTwbjHtV83ukRGS9SRyh4HQE2LtmYfxnm6RYmEXtCLdu521kdWjViH95Xwnn7KLDtxs5kgsmz73KiEG9YsRd3cz7HBwxjsjIn-Z9Vv3sErtcsGp0oALKBGQ8k.5ZmyDcEAE469GJDdIOuekBtPSL3jjShHTR0Gp8B5dWA&dib_tag=se&keywords=a+sombra+do+vento&qid=1750289717&s=books&sprefix=a+sombra+do+vento%2Cstripbooks%2C182&sr=1-1&ufe=app_do%3Aamzn1.fos.6d798eae-cadf-45de-946a-f477d47705b9', '72,64'),
('Orgulho e Preconceito', 1, 11, 5, 'Elizabeth Bennet enfrenta as convenções sociais e seus próprios preconceitos ao se envolver com o orgulhoso Sr. Darcy na Inglaterra do século XIX.', 4.5, 'Orgulho e Preconceito.jpg', 1813, '', ''),
('O Grande Gatsby', 1, 12, 6, 'Em meio ao glamour dos anos 1920, o misterioso Jay Gatsby promove festas grandiosas na esperança de reencontrar seu antigo amor, Daisy Buchanan.', 4.4, 'O Grande Gatsby.jpg', 1925, '', ''),
('O Sol é para Todos', 6, 9, 7, 'A jovem Scout Finch cresce no sul dos EUA durante a Grande Depressão, enquanto seu pai, o advogado Atticus Finch, defende um homem negro injustamente acusado de estupro.', 4.8, 'O Sol é para Todos.jpg', 1960, '', ''),
('Cem Anos de Solidão', 2, 4, 8, 'A saga da família Buendía na cidade fictícia de Macondo, marcada por eventos mágicos e repetição de destinos ao longo das gerações.', 4.9, 'Cem Anos de Solidão.jpg', 1967, '', ''),
('O Senhor dos Anéis: A Sociedade do Anel', 3, 5, 9, 'Frodo Bolseiro parte em uma missão para destruir um anel poderoso, acompanhado por um grupo de heróis em um mundo de fantasia épica.', 4.9, 'Senhor.jpg', 1954, '', ''),
('O Velho e o Mar', 6, 10, 10, 'Santiago, um velho pescador cubano, trava uma batalha solitária contra um enorme peixe no mar, numa história sobre resistência e dignidade.', 4.3, 'O Velho e o Mar.jpg', 1952, '', ''),
('O Código Da Vinci', 4, 2, 11, 'O simbologista Robert Langdon investiga um assassinato no Louvre e descobre uma trama que pode abalar os fundamentos da cristandade.', 4.5, 'O Código Da Vinci.jpg', 2003, '', ''),
('A Menina que Roubava Livros', 6, 7, 12, 'Durante a Segunda Guerra Mundial, Liesel encontra consolo nos livros que rouba e compartilha com seus vizinhos e o homem judeu escondido em seu porão.', 4.7, 'A Menina que Roubava Livros.jpg', 2005, '', ''),
('Dom Casmurro', 1, 1, 13, 'Bentinho, obcecado pelo passado, narra sua juventude e o relacionamento com Capitu, levantando dúvidas sobre traição e ciúmes.', 4.2, 'Dom Casmurro.jpg', 1899, '', ''),
('Memórias Póstumas de Brás Cubas', 8, 1, 13, 'Narrada por um defunto, esta obra inovadora e satírica reflete sobre a vida, a sociedade e a condição humana com humor ácido.', 4.6, 'Memórias Póstumas de Brás Cubas.jpg', 1881, '', ''),
('O Pequeno Príncipe', 8, 3, 14, 'Um piloto encontra um pequeno príncipe em um deserto, que lhe conta sobre sua jornada por planetas e os aprendizados sobre amor, amizade e perda.', 4.8, 'O Pequeno Príncipe.jpg', 1943, '', ''),
('O Conto da Aia', 2, 8, 15, 'Em uma teocracia totalitária chamada Gilead, as mulheres são propriedade do estado. Offred, uma aia, luta para recuperar sua liberdade e identidade.', 4.6, 'O Conto da Aia.jpg', 1985, '', ''),
('Os Miseráveis', 6, 3, 16, 'Jean Valjean é perseguido pelo inspetor Javert após quebrar a condicional, numa França do século XIX marcada por injustiça e redenção.', 4.9, 'Os Miseráveis.jpg', 1862, '', ''),
('Crime e Castigo', 6, 3, 17, 'Raskólnikov, um ex-estudante pobre, acredita que pessoas extraordinárias têm o direito de cometer crimes e mata uma velha agiota, mergulhando em tormento psicológico.', 4.8, 'Crime e Castigo.jpg', 1866, '', ''),
('O Apanhador no Campo de Centeio', 6, 3, 18, 'Holden Caulfield, um adolescente rebelde, foge da escola e perambula por Nova York, refletindo sobre a falsidade do mundo adulto.', 4.2, 'O Apanhador no Campo de Centeio.jpg', 1951, '', ''),
('Drácula', 4, 3, 19, 'Jonathan Harker viaja à Transilvânia e encontra o misterioso Conde Drácula, desencadeando uma luta entre o bem e o mal.', 4.5, 'Drácula.jpg', 1897, '', ''),
('Frankenstein', 2, 3, 20, 'Victor Frankenstein cria uma criatura em uma experiência científica e enfrenta as consequências éticas e morais de desafiar a natureza.', 4.3, 'Frankenstein.jpg', 1818, '', ''),
('O Morro dos Ventos Uivantes', 1, 3, 21, 'Heathcliff e Catherine vivem um amor destrutivo em meio a vingança, paixão e obsessão no interior da Inglaterra.', 4.4, 'O Morro dos Ventos Uivantes.jpg', 1847, '', ''),
('Anna Kariênina', 1, 3, 22, 'Anna abandona o marido e o filho por um romance com o conde Vronsky, enfrentando a hipocrisia da sociedade russa do século XIX.', 4.7, 'Anna Kariênina.jpg', 1877, '', ''),
('A Revolução dos Bichos', 9, 1, 1, 'Os animais de uma fazenda se rebelam contra os humanos para criar uma sociedade justa, mas o poder corrompe seus líderes.', 4.6, 'A Revolução dos Bichos.jpg', 1945, '', ''),
('O Nome da Rosa', 10, 4, 23, 'Em um mosteiro medieval, o monge William de Baskerville investiga misteriosos assassinatos ligados a livros proibidos.', 4.5, 'O Nome da Rosa.jpg', 1980, '', ''),
('A Metamorfose', 6, 3, 24, 'Gregor Samsa acorda transformado em um inseto e lida com o isolamento e a rejeição da família e sociedade.', 4.2, 'A Metamorfose.jpg', 1915, '', ''),
('Lolita', 1, 3, 25, 'Humbert Humbert se apaixona por Dolores Haze, uma adolescente de 12 anos, em uma narrativa controversa e perturbadora.', 4.1, 'Lolita.jpg', 1955, '', ''),
('Os Irmãos Karamázov', 6, 12, 17, 'Três irmãos com visões diferentes sobre fé e moral enfrentam um drama familiar quando seu pai é assassinado.', 4.9, 'Os Irmãos Karamázov.jpg', 1880, '', ''),
('A Letra Escarlate', 1, 3, 26, 'Hester Prynne é condenada ao ostracismo em uma comunidade puritana por cometer adultério e dar à luz uma filha ilegítima.', 4.3, 'A Letra Escarlate.jpg', 1850, '', ''),
('O Retrato de Dorian Gray', 1, 3, 27, 'Dorian Gray permanece eternamente jovem enquanto um retrato envelhece em seu lugar, refletindo sua decadência moral.', 4.4, 'O Retrato de Dorian Gray.jpg', 1890, '', ''),
('As Crônicas de Nárnia: O Leão, a Feiticeira e o Guarda-Roupa', 3, 3, 28, 'Quatro irmãos descobrem o mundo mágico de Nárnia e ajudam o leão Aslam a derrotar a Feiticeira Branca.', 4.7, 'As Crônicas de Nárnia O Leão, a Feiticeira e o Guarda-Roupa.jpg', 1950, '', ''),
('Carrie, a Estranha', 6, 3, 28, 'Carrie White descobre ter poderes telecinéticos e os usa de forma destrutiva após sofrer bullying e repressão religiosa.', 4.2, 'Carrie, a Estranha.jpg', 1974, '', ''),
('O Iluminado', 6, 3, 28, 'Jack Torrance, escritor e ex-alcoólatra, leva sua família para um hotel isolado onde forças sobrenaturais ameaçam sua sanidade.', 4.7, 'O Iluminado.jpg', 1977, '', ''),
('Sob a Redoma', 2, 3, 28, 'Uma pequena cidade americana é isolada por uma redoma invisível e enfrenta o caos social e político.', 4.3, 'Sob a Redoma.jpg', 2009, '', ''),
('Jogos Vorazes', 9, 8, 29, 'Conta a história de Katniss Everdeen, que se voluntaria para participar de um evento anual chamado "Jogos Vorazes" em um mundo distópico chamado Panem. Panem é formada por 12 distritos que são controlados pela Capital, e os Jogos são uma forma de a Capital manter o poder sobre os distritos, obrigando-os a enviar um menino e uma menina para lutar até a morte em uma arena. ', 4.9, 'Jogos Vorazes.jpg', 2019, '', ''),
('Era uma vez um coração partido', 1, 8, 32, 'Desde pequena, Evangeline Raposa sempre acreditou no amor verdadeiro e em finais felizes... até descobrir que o amor de sua vida vai se casar com outra pessoa. Desesperada para impedir o casamento e curar seu coração ferido, Evangeline faz um acordo com o carismático, porém perverso, Jacks, o Príncipe de Copas.', 4.8, 'Era uma vez um coração partido.jpg', 2022, '', ''),
('Verity', 1, 8, 31, 'Verity é um romance e thriller psicológico da autora norte-americana Colleen Hoover, foi inicialmente publicado pela própria autora em 2018 e teve a sua 1º edição em Portugal publicada pela TopSeller a 11 de novembro de 2019.', 4.3, 'Verity.jpg', 2019, '', ''),
('Kulti', 1, 8, 30, 'conta a história de Sal, uma jogadora de futebol, e Kulti, seu novo treinador, que foi seu ídolo e amor platônico na infância. A narrativa é centrada em Sal e mostra como ela se aproxima de Kulti, um homem misterioso e reservado, que aos poucos revela mais de sua personalidade. O livro explora o desenvolvimento do relacionamento entre eles, incluindo a tensão sexual, a construção de uma amizade e a evolução do romance. ', 4.9, 'Kulti.jpg', 2018, '', ''),
('As Aventuras de Huckleberry Finn', 7, 13, 33, 'Uma das obras mais clássicas da literatura americana, narra as aventuras do jovem Huck descendo o rio Mississippi. Cheio de crítica social, humor e liberdade.', 4.5, 'As Aventuras de Huckleberry Finn.jpg', 1884, '', ''),
('Na Natureza Selvagem', 7, 14, 34, 'Conta a história real de Christopher McCandless, um jovem que abandonou tudo para viver uma aventura extrema no Alasca. Mistura narrativa jornalística com reflexão existencial.', 4.5, 'Na Natureza Selvagem.jpg', 1996, '', ''),
('A Ilha do Tesouro', 7, 15, 35, 'Um verdadeiro clássico da literatura de piratas, com mapas escondidos, traições e caças ao tesouro. Leitura envolvente e atemporal.', 4.5, 'A Ilha do Tesouro.jpg', 1883, '', ''),
('Steve Jobs', 5, 1, 36, 'Uma biografia detalhada e reveladora do fundador da Apple. Baseada em entrevistas com Jobs e pessoas próximas, mostra os altos e baixos da vida de um dos maiores inovadores do nosso tempo.', 4.5, 'Steve Jobs.jpg', 2011, '', ''),
('Longa Caminhada Até a Liberdade', 5, 16, 37, 'A autobiografia de Mandela é inspiradora. Ele narra sua luta contra o apartheid na África do Sul, os anos na prisão e a vitória como presidente. Uma história de coragem, dignidade e perseverança.', 4.5, 'Longa Caminhada Até a Liberdade.jpg',  1994, '', '');

-- select * from Resenhas;
-- add pelo usuario;
-- select * from Cartas;
-- add pelo usuario;
