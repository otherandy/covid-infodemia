-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: covid
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etiquetas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas`
--

LOCK TABLES `etiquetas` WRITE;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
INSERT INTO `etiquetas` VALUES (1,'vacuna','2021-05-12 12:35:50'),(2,'octubre','2020-10-15 12:35:50'),(3,'escuincle','2021-10-15 12:35:50'),(4,'mama','2022-10-15 12:35:50'),(5,'joven','2023-10-15 12:35:50');
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_de_resumen`
--

DROP TABLE IF EXISTS `etiquetas_de_resumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etiquetas_de_resumen` (
  `resumenes_id` int unsigned NOT NULL,
  `etiquetas_id` int unsigned NOT NULL,
  PRIMARY KEY (`resumenes_id`,`etiquetas_id`),
  KEY `fk_resumenes_has_etiquetas_etiquetas1_idx` (`etiquetas_id`),
  KEY `fk_resumenes_has_etiquetas_resumenes_idx` (`resumenes_id`),
  CONSTRAINT `fk_resumenes_has_etiquetas_etiquetas1` FOREIGN KEY (`etiquetas_id`) REFERENCES `etiquetas` (`id`),
  CONSTRAINT `fk_resumenes_has_etiquetas_resumenes` FOREIGN KEY (`resumenes_id`) REFERENCES `resumenes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_de_resumen`
--

LOCK TABLES `etiquetas_de_resumen` WRITE;
/*!40000 ALTER TABLE `etiquetas_de_resumen` DISABLE KEYS */;
INSERT INTO `etiquetas_de_resumen` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(3,3),(4,3),(4,4);
/*!40000 ALTER TABLE `etiquetas_de_resumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumenes`
--

DROP TABLE IF EXISTS `resumenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resumenes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` mediumtext NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idnew_table_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumenes`
--

LOCK TABLES `resumenes` WRITE;
/*!40000 ALTER TABLE `resumenes` DISABLE KEYS */;
INSERT INTO `resumenes` VALUES (1,'Los Escuincles','Tu','Se va a editar como admiiiiiiiiiiiinnnn','https://www.ebay.com/','','','2021-05-27 22:20:59'),(2,'T E S T','TEST','Esto es una prueba de insertar.','test','test','test','2021-05-27 22:20:59'),(3,'Tus Escuincles','El','Hola, esto es un mini rewsumen muy escuincle. jeje.','https://www.eby.com/',NULL,NULL,'2021-05-20 05:46:06'),(4,'Nuestros Escuincles','Popo','soy un escuince asdsadasdasdsada','https://www.eba.com/',NULL,NULL,'2021-05-20 05:47:06');
/*!40000 ALTER TABLE `resumenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resumenes-cambios`
--

DROP TABLE IF EXISTS `resumenes-cambios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resumenes-cambios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `id_resumen` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `resumen` mediumtext NOT NULL,
  `fuente` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resumenes-cambios`
--

LOCK TABLES `resumenes-cambios` WRITE;
/*!40000 ALTER TABLE `resumenes-cambios` DISABLE KEYS */;
INSERT INTO `resumenes-cambios` VALUES (17,'usuario1',1,'Los Escuincles','El Escuincle','esto es una prueba de java script enviando todas las variables como post','https://github.com/',NULL,NULL,'2021-05-27 22:20:59'),(23,'usuario1',1,'Los Escuincles','Tu','Se edito con la nueva base de datos woooooooooooooooooooo','https://www.ebay.com/','','','2021-05-27 22:20:59'),(26,'escuicnle',1,'Los Escuincles','Tu','Se va a editar como usuario normal		  ','https://www.ebay.com/','','','2021-05-27 22:20:59'),(27,'escuicnle',1,'Los Escuincles','Tu','Se va a editar como usuario normal		  ','https://www.ebay.com/','','','2021-05-27 22:20:59');
/*!40000 ALTER TABLE `resumenes-cambios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'usuario1','$2y$10$bFo9BEyhcxTug2.3uPgvGOz9BHUbS4/d43ayUWh0GOZyfpcAy.mf6','prueba@hotmail.com','admin'),(2,'admin','$2y$10$Y8GrWSDmDweanTBIx6vHS.zi4ucIaUbGgb4dFzl5/7X0S1w.Cwfr.','admin@admin.com','admin'),(22,'escuicnle','$2y$10$97Wm.krBFKR/AMRrKpb7X.XXjJdmPGNt6N9.uzxZ98DoDn6wIK9hy','nestorelvin@gmail.com','usuario');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'covid'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-07 15:04:36
