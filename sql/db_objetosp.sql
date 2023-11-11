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
  `descripcion` varchar(255),
  `lugar` varchar(255),
  `fecha_reporte` timestamp DEFAULT (now()),
  `fecha_update` timestamp DEFAULT null,
  `alumno_num_control` varchar(30),
  `estados_estado` varchar(50)
);

CREATE TABLE `estados` (
  `estado` varchar(50) PRIMARY KEY NOT NULL
);

ALTER TABLE `objeto` ADD FOREIGN KEY (`alumno_num_control`) REFERENCES `alumno` (`num_control`);

ALTER TABLE `objeto` ADD FOREIGN KEY (`estados_estado`) REFERENCES `estados` (`estado`);
