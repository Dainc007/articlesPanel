-- MySQL dump 10.13  Distrib 8.0.19, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: articles
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article_categories` (
  `article_id` int NOT NULL,
  `category_id` int NOT NULL,
  KEY `category_id_idx` (`category_id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categories`
--

LOCK TABLES `article_categories` WRITE;
/*!40000 ALTER TABLE `article_categories` DISABLE KEYS */;
INSERT INTO `article_categories` VALUES (21,1),(22,1);
/*!40000 ALTER TABLE `article_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `status` enum('active','archived','waiting') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (21,'Lorem','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit semper leo vel porttitor. Integer et arcu non purus dignissim venenatis. Nulla sed ornare tellus, in viverra eros. Sed vel felis gravida, pellentesque ex eget, faucibus elit. Quisque fermentum elit orci, non tempor lorem dictum at. Vivamus aliquam sem quis dolor elementum bibendum. Vivamus varius ut felis vitae sagittis. Etiam cursus, enim sed vehicula feugiat, sapien est luctus magna, ac.','active','2021-04-20 12:07:23','2021-04-20 12:07:23'),(22,'Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus consectetur accumsan urna at varius. Cras accumsan fringilla interdum. Vestibulum est nisl, vestibulum eget blandit ut, tempus nec purus. Nullam mattis iaculis mauris nec scelerisque. Fusce eu arcu bibendum, hendrerit libero ac, tempus risus. Praesent eu commodo leo. Phasellus eu leo sed arcu vehicula ultricies. Proin sagittis lectus diam, at dignissim risus mattis a. In erat metus, congue ut elementum vel, egestas at augue. Nullam quis tortor velit. Pellentesque ac lacus quis lacus hendrerit finibus eget sed mauris. Donec orci quam, pharetra ac ultrices quis, ullamcorper sit amet risus. Aliquam iaculis consequat efficitur. Curabitur faucibus nulla nibh, vitae consequat urna fermentum quis. Pellentesque habitant morbi tristique senectus et netus et malesuada.','active','2021-04-20 12:09:25','2021-04-20 12:09:25'),(23,' Morbi ex felis ex','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in semper enim. Nam non enim fringilla, interdum arcu eu, ultricies nisl. Nulla commodo aliquet magna eget sodales. Aliquam id velit vitae est accumsan pulvinar. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ac ornare metus. Quisque lobortis neque vel dolor mollis pretium eget eu elit. Morbi efficitur dui non ex sollicitudin, non suscipit sapien pretium. Sed quis ultrices risus, id feugiat tortor. Maecenas non commodo nunc. Morbi ex felis, congue in molestie eu, interdum eget risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sagittis arcu dapibus, tempor quam ut, auctor tortor. Proin nec lacinia nulla, eu egestas tortor.','active','2021-04-20 12:27:36','2021-04-20 13:41:29');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'sport');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-20 15:56:28
