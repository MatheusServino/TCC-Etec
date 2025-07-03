-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_livros
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `editoras`
--

DROP TABLE IF EXISTS `editoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editoras` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `editora` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoras`
--

LOCK TABLES `editoras` WRITE;
/*!40000 ALTER TABLE `editoras` DISABLE KEYS */;
INSERT INTO `editoras` VALUES (1,'Companhia das Letras','Companhia das Letras.jpg','Brasil','Fundada em 1986 por Luiz Schwarcz e Lilia Moritz Schwarcz, a Companhia das Letras rapidamente se tornou uma das editoras mais respeitadas do Brasil. Seu objetivo inicial era unir rigor editorial com um catálogo de qualidade, o que se concretizou com publicações de autores brasileiros e estrangeiros renomados. Ao longo dos anos, a editora cresceu e passou a incorporar selos diversos, como Seguinte (literatura jovem), Paralela (ficção comercial), Alfaguara (literatura estrangeira), entre outros. Em 2011, a Penguin Books tornou-se sócia da editora, criando o selo Penguin-Companhia, fortalecendo ainda mais seu catálogo de clássicos. A editora é conhecida pela diversidade de seu catálogo e pelo cuidado gráfico e editorial.'),(2,'HarperCollins','HarperCollins.png','EUA','A HarperCollins é uma das maiores editoras do mundo, formada pela fusão da Harper & Row (fundada em 1817) e da William Collins, Sons (fundada em 1819). Publica obras de autores como J.R.R. Tolkien, George R.R. Martin e Veronica Roth. No Brasil, iniciou operações em 2015 por meio de uma joint venture com a Ediouro, tornando-se independente em 2017.'),(3,'Penguin Books','Penguin Books.png','Reino Unido','Fundada em 1935 por Allen Lane, a Penguin Books revolucionou o mercado editorial ao oferecer livros de qualidade a preços acessíveis. É conhecida por sua vasta coleção de clássicos e por ser parte do grupo Penguin Random House, uma das maiores editoras do mundo.'),(4,'Editora Record','Editora Record.jpg','Brasil','Criada em 1942 por Alfredo Machado, a Editora Record começou como distribuidora de tiras de jornal e impressos, expandindo-se depois para livros. É uma das editoras mais antigas e influentes do Brasil. Seu catálogo é bastante amplo, indo da literatura brasileira à estrangeira, biografias, história, sociologia, política e livros infantojuvenis. Ao longo das décadas, a Record publicou autores como Gabriel García Márquez, Paulo Coelho, José Saramago, Nelson Rodrigues, Agatha Christie e muitos outros. Também criou selos como BestBolso, Verus, Galerinha Record, e José Olympio, cada um voltado para públicos distintos. A editora segue como um pilar da indústria editorial brasileira.'),(5,'Bloomsbury','Bloomsbury.png','Reino Unido','Fundada em 1986 por Nigel Newton, a Bloomsbury ganhou destaque mundial com a publicação da série Harry Potter, de J.K. Rowling. Além disso, publica obras de autores como Sarah J. Maas e Khaled Hosseini.'),(6,'Suma de Letras','Suma de Letras.jpg','Brasil','A Suma de Letras foi criada como selo da Editora Objetiva e passou a fazer parte do grupo Companhia das Letras em 2015. Inicialmente, o selo publicava romances comerciais, thrillers e obras de entretenimento. Com o tempo, reposicionou-se como uma editora especializada em ficção especulativa, com foco em gêneros como fantasia, ficção científica e terror. É hoje a casa editorial de autores como Stephen King, Joe Hill, Blake Crouch e Octavia E. Butler no Brasil. A Suma se destaca também por seu cuidado gráfico e por manter uma forte base de leitores apaixonados por literatura de gênero.'),(7,'Editora Intrínseca','Editora Intrínseca.png','Brasil','Fundada em 2003 por Jorge Oakim, a Editora Intrínseca iniciou suas atividades com o livro Hell - Paris 75016, de Lolita Pille. Ganhou destaque com obras como A Menina que Roubava Livros, de Markus Zusak, Crepúsculo, de Stephenie Meyer, Cinquenta Tons de Cinza, de E.L. James, e A Culpa é das Estrelas, de John Green. A editora é reconhecida por seu catálogo diversificado, que inclui literatura brasileira e estrangeira, política, economia, ciências sociais e infantojuvenil.'),(8,'Editora Rocco','Editora Rocco.png','Brasil','Fundada em 1975 por Paulo Roberto Rocco, a Editora Rocco é uma das mais importantes do Brasil. Iniciou sua trajetória com o livro Teje Preso, de Chico Anysio. Em 1988, publicou O Alquimista, de Paulo Coelho, que se tornou um best-seller. A editora é conhecida por publicar séries como Harry Potter, Jogos Vorazes, Divergente e Eragon, além de autores como Clarice Lispector, J.K. Rowling, Thalita Rebouças, Suzanne Collins, Margaret Atwood, Alice Oseman, Fredrik Backman, Anne Rice, Nilton Bonder, Ruth Ware, Frei Betto, Neil Gaiman e Miriam Leitão.'),(9,'Vintage Books','Vintage Books.png','EUA','Fundada em 1954, a Vintage Books é um selo da Knopf Doubleday Publishing Group, que integra o conglomerado Penguin Random House. A editora é especializada em literatura contemporânea e clássicos modernos, com um catálogo que inclui autores premiados e influentes, como Toni Morrison, Haruki Murakami, Philip Roth, Margaret Atwood, entre outros. Reconhecida pelo alto padrão editorial e pela curadoria literária refinada, a Vintage publica tanto edições de bolso quanto títulos de ficção literária e não ficção de peso acadêmico e cultural.'),(10,'Editora Objetiva','Editora Objetiva.png','Brasil','A Editora Objetiva foi fundada em 1992 e logo se destacou por seu foco em livros de não ficção, política, cultura e literatura contemporânea. Seu catálogo inclui autores como Luis Fernando Veríssimo, Tony Judt, Stephen King (publicado pelo selo Suma), Arnaldo Jabor e Harold Bloom. Criou selos importantes como Suma, Fontanar, e Alfaguara Brasil. Em 2015, a Companhia das Letras adquiriu 55% da editora, e hoje a Objetiva é um selo dentro do grupo, mantendo seu foco em obras de qualidade com apelo intelectual e jornalístico.'),(11,'Pandorga','Pandorga.jpg','Brasil','Fundada em 1992, a Pandorga é uma editora brasileira especializada em literatura infantojuvenil. Seu catálogo inclui autores como Sylvia Orthof, Bia Bedran, Ana Maria Machado e ilustradores como Ziraldo e Rui de Oliveira. A editora também produziu o programa infantil Pandorga, exibido na TVE e TV Brasil, que ganhou prêmios como o Prêmio Açorianos e o Prêmio ARI. Em 2013, firmou parceria com a TVE e a TV Brasil para produzir uma nova temporada do programa, que estreou em rede nacional em 2015. '),(12,'Via Leitura','Via Leitura.png','Brasil','A Via Leitura é um selo da Editora Record, focado na publicação de livros de bolso e literatura popular. Seu objetivo é democratizar o acesso à leitura, oferecendo livros a preços acessíveis e com ampla distribuição em livrarias, supermercados e bancas de jornal. A editora busca atender ao público leitor que busca entretenimento e cultura a preços acessíveis.'),(13,'BestBolso','BestBolso.png','Brasil','O BestBolso é um selo da Editora Record, especializado na publicação de livros de diversos gêneros a preços acessíveis. Com foco em democratizar o acesso à leitura, o selo oferece obras de ficção, não ficção, biografias e literatura infantojuvenil, com ampla distribuição em pontos de venda como livrarias, supermercados e bancas de jornal.'),(14,'Objetiva','Objetiva.png','Brasil','Fundada em 1992, a Editora Objetiva se consolidou como uma das principais editoras brasileiras. Seu catálogo inclui autores como Luis Fernando Veríssimo, Tony Judt, Arnaldo Jabor, Harold Bloom, Stephen King e Joe Hill, além do Dicionário Houaiss, um dos mais completos da língua portuguesa. A editora também lançou os selos Suma, Alfaguara e Fontanar, voltados para diferentes gêneros literários. Em 2015, a Companhia das Letras adquiriu 55% da Objetiva, tornando-se a principal acionista. '),(15,'Nova Fronteira','Nova Fronteira.png','Brasil','Fundada em 1965 por Carlos Lacerda, a Nova Fronteira é uma das maiores editoras do Brasil, com sede no Rio de Janeiro. Possui um catálogo com mais de 1.500 títulos publicados, incluindo obras de autores como Guimarães Rosa, Ariano Suassuna, João Ubaldo Ribeiro, Cecília Meireles, Manuel Bandeira, Thomas Mann, Jean-Paul Sartre, Günter Grass, Virginia Woolf, Marguerite Yourcenar, Italo Svevo, Ezra Pound, Dino Buzzati, Agatha Christie, Ana Maria Machado, Bia Bedran, Sylvia Orthof, Rui de Oliveira, Ziraldo, Cláudio Martins e Roger Melo. Em 2006, o controle acionário da Nova Fronteira foi adquirido pela Ediouro Publicações.'),(16,'Alta Life','Alta Life.png','Brasil','A Alta Life é uma editora brasileira especializada em literatura de autoajuda e bem-estar. Seu catálogo inclui obras voltadas para o desenvolvimento pessoal, qualidade de vida e espiritualidade. A editora busca oferecer aos leitores ferramentas para o autoconhecimento e aprimoramento pessoal.');
/*!40000 ALTER TABLE `editoras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-23 21:38:36
