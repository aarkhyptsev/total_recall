-- MySQL dump 10.13  Distrib 8.3.0, for Linux (x86_64)
--
-- Host: localhost    Database: shpp_3
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `author_id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Андрей Богуславский'),(2,'Марк Саммерфильд'),(3,'Уэс Маккинни'),(4,'Брюс Эккель'),(5,'Джон Вудкок'),(6,'Дрю Нейл'),(7,'Джей Макгаврен'),(8,'Мартин Фаулер'),(9,'Энтони Грей'),(10,'Роберт Мартин'),(11,'Пол Дейтел'),(12,'Тим Кедлек'),(13,'Александр Сераков'),(14,'Сет Гринберг'),(15,'Сэмюэл Грингард'),(16,'А. Белов'),(17,'Джереми Блум'),(18,'Сергей Мастицкий'),(19,'Люк Веллинг'),(20,'Джеймс Р. Грофф'),(21,'Гэри Маклин Холл'),(22,'Дэвид Флэнаган'),(23,'Томас Кормен'),(24,'М., Вильямс'),(25,'Прамодкумар Дж. Садаладж'),(26,'Харви Дейтел'),(27,'Чарльз Лейзерсон'),(28,'Рональд Ривест'),(32,'Test Author');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) NOT NULL,
  `book_img` varchar(20) NOT NULL,
  `book_click` int NOT NULL DEFAULT '0',
  `book_year` int NOT NULL DEFAULT '2000',
  `delete_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА','22.jpg',17,2000,NULL),(2,'Программирование на языке Go!','23.jpg',11,2000,NULL),(3,'Python и анализ данных','26.jpg',13,2000,NULL),(4,'Thinking in Java (4th Edition)','27.jpg',9,2000,NULL),(5,'Computer Coding for Kid','36.jpg',8,2000,NULL),(6,'Practical Vim','48.jpg',0,2000,NULL),(7,'Head First Ruby','47.jpg',0,2000,NULL),(8,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence','46.jpg',0,2000,NULL),(9,'Swift Pocket Reference: Programming for iOS and OS X','45.jpg',0,2000,NULL),(10,'Clean Code: A Handbook of Agile Software Craftsmanship','44.jpg',0,2000,NULL),(11,'Android для разработчиков','43.jpg',0,2000,NULL),(12,'Адаптивный дизайн. Делаем сайты для любых устройств','42.jpg',0,2000,NULL),(13,'InDesign CS6','41.jpg',0,2000,NULL),(14,'Sketching User Experiences: The Workbook','40.jpg',2,2000,NULL),(15,'The Internet of Things','39.jpg',0,2000,NULL),(16,'Программирование микроконтроллеров для начинающих и не только','38.jpg',0,2000,NULL),(17,'Exploring Arduino: Tools and Techniques for Engineering Wizardry','37.jpg',0,2000,NULL),(18,'Статистический анализ и визуализация данных с помощью R','35.jpg',0,2000,NULL),(19,'PHP and MySQL Web Development','34.jpg',0,2000,NULL),(20,'SQL: The Complete Referenc','33.jpg',1,2000,NULL),(21,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Pri','32.jpg',0,2000,NULL),(22,'JavaScript Pocket Reference','31.jpg',0,2000,NULL),(23,'Introduction to Algorithms','29.jpg',1,2000,NULL),(24,'Толковый словарь сетевых терминов и аббревиатур','25.jpg',0,2000,NULL);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books_authors` (
  `book_id` int NOT NULL,
  `author_id` int NOT NULL,
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_authors`
--

LOCK TABLES `books_authors` WRITE;
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(8,25),(11,26),(23,27),(23,28);
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `versions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `versions`
--

LOCK TABLES `versions` WRITE;
/*!40000 ALTER TABLE `versions` DISABLE KEYS */;
INSERT INTO `versions` VALUES (1,'migrations/01_base.sql','2024-04-25 06:57:42'),(2,'migrations/02_add_authors.sql','2024-04-25 06:57:42'),(3,'migrations/03_add_books_authors.sql','2024-04-25 06:57:42'),(4,'migrations/04_delete_authors_in_book.sql','2024-04-25 06:57:42');
/*!40000 ALTER TABLE `versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-25 17:00:01
