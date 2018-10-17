CREATE TABLE `tiposdocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE `estadoscitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `estadospagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtipodocumento` smallint,
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
  PRIMARY KEY (`id`),
  CONSTRAINT `paciente_fk_1` FOREIGN KEY (`idtipodocumento`) REFERENCES `tiposdocumento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtipodocumento` smallint,
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
  KEY `category_id` (`category_id`),
  CONSTRAINT `medicos_fk_1` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidades` (`idespecialidad`),
   CONSTRAINT `medicos_fk_2` FOREIGN KEY (`idtipodocumento`) REFERENCES `tiposdocumento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
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
  CONSTRAINT `citas_fk_1` FOREIGN KEY (`idpaciente`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `citas_fk_2` FOREIGN KEY (`idmedico`) REFERENCES `medicos` (`id`),
  CONSTRAINT `citas_fk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusr`),
  CONSTRAINT `citas_fk_4` FOREIGN KEY (`idestadopago`) REFERENCES `estadospagos` (`id`),
  CONSTRAINT `citas_fk_5` FOREIGN KEY (`idestadoscitas`) REFERENCES `estadoscitas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
