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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `fechacita` datetime NOT NULL,
  `motivocita` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `resultadocita` text,
  `idpaciente` int(11) DEFAULT NULL,
  `sintomas` text,
  `enfermedadesprevias` text,
  `medicinastomadas` text,
  `idmedico` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `montocita` double DEFAULT NULL,
  `idestadopago` int(11) NOT NULL DEFAULT '1',
  `idestadocita` int(11) NOT NULL DEFAULT '1',
  `fechafincita` datetime DEFAULT NULL,
  PRIMARY KEY (`idcita`),
  KEY `ref_citas_medicos` (`idmedico`),
  KEY `ref_citas_paciente` (`idpaciente`),
  KEY `ref_citas_pago` (`idestadopago`),
  KEY `ref_citas_cita` (`idestadocita`),
  KEY `idcita` (`idcita`),
  CONSTRAINT `ref_citas_cita` FOREIGN KEY (`idestadocita`) REFERENCES `estadoscitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_citas_medicos` FOREIGN KEY (`idmedico`) REFERENCES `medicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_citas_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_citas_pago` FOREIGN KEY (`idestadopago`) REFERENCES `estadospagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'2018-09-26 00:00:00','Dolor abdominal',NULL,NULL,1,'Fiebre, malestar estomacal','Apendicitis',NULL,1,1,12000,1,1,NULL),(2,'2018-10-01 06:05:55','Prueba de mo',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2018-10-01 06:05:55'),(3,'2018-10-01 06:07:07','Prueba de mo',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2018-10-01 06:07:07');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-30 23:13:36
