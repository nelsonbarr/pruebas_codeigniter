-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: citas_medicas
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtipodocumento` int(11) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `enfermedadesprevias` varchar(500) DEFAULT NULL,
  `medicamentos` varchar(500) DEFAULT NULL,
  `alergias` varchar(500) DEFAULT NULL,
  `visitaprevia` tinyint(1) NOT NULL DEFAULT '1',
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecharegistro` datetime DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `idestadocivil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ref_estadocivil` (`idestadocivil`),
  KEY `ref_tipodoc` (`idtipodocumento`),
  CONSTRAINT `ref_estadocivil` FOREIGN KEY (`idestadocivil`) REFERENCES `estadosciviles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_tipodoc` FOREIGN KEY (`idtipodocumento`) REFERENCES `tiposdocumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,2,'799282','Nelson ','Barraez','M','1981-07-17','nelsonbarr@gmail.com','Crra 56','3225371462',NULL,'Apendicitis',NULL,'MErthiolate',0,1,'2018-09-25 00:00:00','Empleado',3),(2,2,'811481','Joanna','Escalante',NULL,'2018-09-30','joannaescalante56@gmail.com','',NULL,NULL,'','','',1,1,NULL,NULL,2),(3,1,'8748999','Nelsn ','Barraez',NULL,'2018-09-30','nelsonbarr@gmail.com','Carrera 56 #153-84, Torre 1 apto 101',NULL,NULL,'','','',1,1,NULL,NULL,3),(4,1,'8748999','Nelsn ','Barraez',NULL,'2018-09-30','nelsonbarr@gmail.com','Carrera 56 #153-84, Torre 1 apto 101',NULL,NULL,'','','',1,1,NULL,NULL,3),(5,1,'8748999','Nelsn ','Barraez',NULL,'2018-09-30','nelsonbarr@gmail.com','Carrera 56 #153-84, Torre 1 apto 101',NULL,NULL,'','','',1,1,NULL,NULL,3);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-30 23:13:38
