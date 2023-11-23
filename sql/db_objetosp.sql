CREATE DATABASE `objetosp`;
USE `objetosp`;

CREATE TABLE `alumno` (
  `num_control` varchar(30) PRIMARY KEY NOT NULL,
  `nombre` varchar(255),
  `grado` integer,
  `grupo` varchar(6),
  `foto` blob
);

CREATE TABLE `objeto` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255),
  `descripcion` varchar(255),
  `lugar` varchar(255),
  `fecha_reporte` timestamp DEFAULT CURRENT_TIMESTAMP,
  `alumno_num_control` varchar(30),
  `estados_estado` varchar(50)
);

CREATE TABLE `estados` (
  `estado` varchar(50) PRIMARY KEY NOT NULL
);

CREATE TABLE `perdidas` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `alumno_num_control` varchar(30),
  `objeto_id` int,
  `estado` varchar(50),
  `alumno_nc_encontro` varchar(30) DEFAULT NULL,
  `fecha_update` timestamp DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`alumno_num_control`) REFERENCES `alumno` (`num_control`),
  FOREIGN KEY (`objeto_id`) REFERENCES `objeto` (`id`),
  FOREIGN KEY (`estado`) REFERENCES `estados` (`estado`),
  FOREIGN KEY (`alumno_nc_encontro`) REFERENCES `alumno` (`num_control`)
);

ALTER TABLE `objeto` ADD FOREIGN KEY (`alumno_num_control`) REFERENCES `alumno` (`num_control`);
ALTER TABLE `objeto` ADD FOREIGN KEY (`estados_estado`) REFERENCES `estados` (`estado`);

INSERT INTO `estados` (`estado`) VALUES ('Perdido');
INSERT INTO `estados` (`estado`) VALUES ('Encontrado');
INSERT INTO `estados` (`estado`) VALUES ('Recuperado');
INSERT INTO `estados` (`estado`) VALUES ('Sin recoger');
