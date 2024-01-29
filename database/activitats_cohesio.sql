-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2024 a las 16:10:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `activitats_cohesio`
--
CREATE DATABASE IF NOT EXISTS `activitats_cohesio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `activitats_cohesio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitat`
--

DROP TABLE IF EXISTS `activitat`;
CREATE TABLE IF NOT EXISTS `activitat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `descripcio` varchar(45) DEFAULT NULL,
  `professor_puntuador` int(11) NOT NULL,
  `professor_assistencia` int(11) NOT NULL,
  `localitzacio_text` varchar(45) DEFAULT NULL,
  `localitzacio_coord` point DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_activitat_professor1_idx` (`professor_puntuador`),
  KEY `fk_activitat_professor2_idx` (`professor_assistencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumne`
--

DROP TABLE IF EXISTS `alumne`;
CREATE TABLE IF NOT EXISTS `alumne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `cognoms` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `grup_id` int(11) NOT NULL,
  `Clase` varchar(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_group_idx` (`grup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumne`
--

INSERT INTO `alumne` (`id`, `nom`, `cognoms`, `email`, `grup_id`, `Clase`) VALUES
(2, 'Ayman', 'Sbay Zekkari', 'ayman.zekkari@gmail.com', 1, 'DAW2'),
(3, 'Benitto', 'Camela', 'benitto@gmail.com', 2, 'DAW1'),
(4, 'Marc', 'sljfhkasjdfjksadfjkds', 'marc@gmail.com', 1, 'ASIX1'),
(5, 'Angel', 'Tarensi', 'angel@sapalomera.cat', 1, 'DAW2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumne_assisteix_activitat`
--

DROP TABLE IF EXISTS `alumne_assisteix_activitat`;
CREATE TABLE IF NOT EXISTS `alumne_assisteix_activitat` (
  `alumne_id` int(11) NOT NULL,
  `activitat_id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`alumne_id`,`activitat_id`),
  KEY `fk_alumne_has_activitat_activitat1_idx` (`activitat_id`),
  KEY `fk_alumne_has_activitat_alumne1_idx` (`alumne_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `option` varchar(20) NOT NULL,
  `value` varchar(45) NOT NULL,
  PRIMARY KEY (`option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grup`
--

DROP TABLE IF EXISTS `grup`;
CREATE TABLE IF NOT EXISTS `grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grup`
--

INSERT INTO `grup` (`id`, `nom`) VALUES
(1, 'DAW2'),
(2, 'DAW1'),
(3, 'ASIX2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grup_puntua_activitat`
--

DROP TABLE IF EXISTS `grup_puntua_activitat`;
CREATE TABLE IF NOT EXISTS `grup_puntua_activitat` (
  `grup_id` int(11) NOT NULL,
  `activitat_id` int(11) NOT NULL,
  `puntuacio` int(11) NOT NULL,
  PRIMARY KEY (`grup_id`,`activitat_id`),
  KEY `fk_grup_has_activitat_activitat1_idx` (`activitat_id`),
  KEY `fk_grup_has_activitat_grup1_idx` (`grup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `cognoms` varchar(45) DEFAULT NULL,
  `administrador` tinyint(4) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activitat`
--
ALTER TABLE `activitat`
  ADD CONSTRAINT `fk_activitat_professor1` FOREIGN KEY (`professor_puntuador`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activitat_professor2` FOREIGN KEY (`professor_assistencia`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumne`
--
ALTER TABLE `alumne`
  ADD CONSTRAINT `fk_usuari_grup` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumne_assisteix_activitat`
--
ALTER TABLE `alumne_assisteix_activitat`
  ADD CONSTRAINT `fk_alumne_has_activitat_activitat1` FOREIGN KEY (`activitat_id`) REFERENCES `activitat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumne_has_activitat_alumne1` FOREIGN KEY (`alumne_id`) REFERENCES `alumne` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grup_puntua_activitat`
--
ALTER TABLE `grup_puntua_activitat`
  ADD CONSTRAINT `fk_grup_has_activitat_activitat1` FOREIGN KEY (`activitat_id`) REFERENCES `activitat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grup_has_activitat_grup1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
