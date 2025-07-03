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
-- Table structure for table `avaliacoes`
--

DROP TABLE IF EXISTS `avaliacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `qtd_estrela` int(11) DEFAULT NULL,
  `mensagem` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_livro` (`id_livro`),
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`cod`),
  CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacoes`
--

LOCK TABLES `avaliacoes` WRITE;
/*!40000 ALTER TABLE `avaliacoes` DISABLE KEYS */;
INSERT INTO `avaliacoes` VALUES (1,1,27,4,'Livro ótimo!!!!!','2025-06-23 21:26:59',NULL),(2,1,10,5,'a historia é incrivel.','2025-06-23 21:28:10',NULL),(3,1,44,5,'muito inspirador','2025-06-23 21:28:50',NULL),(4,1,15,3,'Li na escola','2025-06-23 21:29:54',NULL),(5,3,27,5,'Que livro maravilhoso, a capa e linda','2025-06-23 21:30:55',NULL),(6,3,10,4,'amei o universo','2025-06-23 21:31:12',NULL),(7,3,44,4,'historia instigante\r\n','2025-06-23 21:31:35',NULL),(8,3,15,5,'amei a vibe','2025-06-23 21:31:50',NULL),(9,2,44,5,'homem incrivel','2025-06-23 21:32:47',NULL),(10,2,10,5,'frodo e incrivel','2025-06-23 21:33:31',NULL),(11,2,27,4,'nao gostei','2025-06-23 21:33:51',NULL),(12,2,27,4,'nao gostei','2025-06-23 21:33:51',NULL),(13,2,15,5,'meu professor mandou eu ler, e achei incrivel','2025-06-23 21:35:28',NULL),(14,4,27,3,'legal','2025-06-23 21:36:16',NULL),(15,4,10,1,'odiei','2025-06-23 21:36:33',NULL),(16,4,44,3,'ainda estou lendo','2025-06-23 21:36:53',NULL),(17,4,15,3,'li pelo autor','2025-06-23 21:37:24',NULL);
/*!40000 ALTER TABLE `avaliacoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-23 21:38:35
