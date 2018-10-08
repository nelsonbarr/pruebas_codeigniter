-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: citas_medicas
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'2018-09-26 08:00:00','Dolor abdominal',NULL,NULL,1,'Fiebre, malestar estomacal','Apendicitis',NULL,1,1,12000,1,1);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Oncologia'),(2,'Urologia');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoscitas`
--

DROP TABLE IF EXISTS `estadoscitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoscitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoscitas`
--

LOCK TABLES `estadoscitas` WRITE;
/*!40000 ALTER TABLE `estadoscitas` DISABLE KEYS */;
INSERT INTO `estadoscitas` VALUES (1,'No Confirmada'),(2,'Cancelada'),(3,'En camino'),(4,'En Sala'),(5,'Visto');
/*!40000 ALTER TABLE `estadoscitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadosciviles`
--

DROP TABLE IF EXISTS `estadosciviles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadosciviles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadosciviles`
--

LOCK TABLES `estadosciviles` WRITE;
/*!40000 ALTER TABLE `estadosciviles` DISABLE KEYS */;
INSERT INTO `estadosciviles` VALUES (1,'Soltero'),(2,'Casado'),(3,'Union Libre'),(4,'Viudo'),(5,'Divorciado');
/*!40000 ALTER TABLE `estadosciviles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadospagos`
--

DROP TABLE IF EXISTS `estadospagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadospagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadospagos`
--

LOCK TABLES `estadospagos` WRITE;
/*!40000 ALTER TABLE `estadospagos` DISABLE KEYS */;
INSERT INTO `estadospagos` VALUES (1,'Pagado'),(2,'Pendiente'),(3,'Transito(Transferencia)');
/*!40000 ALTER TABLE `estadospagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicos`
--

DROP TABLE IF EXISTS `medicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicos` (
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
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fechacreacion` datetime DEFAULT NULL,
  `idespecialidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref_med_tipodoc` (`idtipodocumento`),
  KEY `ref_med_especialidades` (`idespecialidad`),
  CONSTRAINT `ref_med_especialidades` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_med_tipodoc` FOREIGN KEY (`idtipodocumento`) REFERENCES `tiposdocumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicos`
--

LOCK TABLES `medicos` WRITE;
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` VALUES (1,1,'3200555441','Pedro','Perez','M','1981-09-05','pedrop@gmail.com','Crra 65','3225371462',NULL,1,'2018-09-25 00:00:00',1);
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;
UNLOCK TABLES;

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
  KEY `ref_estadocivil` (`idestadocivil`),
  KEY `ref_tipodoc` (`idtipodocumento`),
  CONSTRAINT `ref_estadocivil` FOREIGN KEY (`idestadocivil`) REFERENCES `estadosciviles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ref_tipodoc` FOREIGN KEY (`idtipodocumento`) REFERENCES `tiposdocumento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,2,'799282','Nelson ','Barraez','M','1981-07-17','nelsonbarr@gmail.com','Crra 56','3225371462',NULL,'Apendicitis',NULL,'MErthiolate',0,1,'2018-09-25 00:00:00','Empleado',3);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposdocumento`
--

DROP TABLE IF EXISTS `tiposdocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposdocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposdocumento`
--

LOCK TABLES `tiposdocumento` WRITE;
/*!40000 ALTER TABLE `tiposdocumento` DISABLE KEYS */;
INSERT INTO `tiposdocumento` VALUES (1,'Cedula Ciudadania'),(2,'Cedula Extranjeria'),(3,'Pasaporte');
/*!40000 ALTER TABLE `tiposdocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `perfil` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'nelsonbarr','Nelson','Barraez','nelsonbarr@gmail.com','3225371462','123',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-28 14:00:14
