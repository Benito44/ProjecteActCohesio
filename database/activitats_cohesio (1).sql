-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2024 a las 16:32:12
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumne`
--

INSERT INTO `alumne` (`id`, `nom`, `cognoms`, `email`, `grup_id`, `Clase`) VALUES
(94, 'Juan', 'Pérez', 'jperez@example.com', 475, 'SMX1-1'),
(95, 'María', 'García', 'mgarcia@example.com', 477, 'SMX1-2'),
(96, 'Pedro', 'Rodríguez', 'prodriguez@example.com', 479, 'SMX1-3'),
(97, 'Laura', 'Martínez', 'lmartinez@example.com', 481, 'SMX1-4'),
(98, 'Miguel', 'López', 'mlopez@example.com', 483, 'SMX2-1'),
(99, 'Ana', 'Sánchez', 'asanchez@example.com', 485, 'SMX2-2'),
(100, 'Luis', 'Fernández', 'lfernandez@example.com', 486, 'ASIX1'),
(101, 'Carmen', 'Ruíz', 'cruiz@example.com', 488, 'ASIX2'),
(102, 'Javier', 'González', 'jgonzalez@example.com', 489, 'DAW1'),
(103, 'Elena', 'Díaz', 'ediaz@example.com', 491, 'DAW2'),
(104, 'Carlos', 'Ramírez', 'ramirez@example.com', 475, 'SMX1-1'),
(105, 'Isabel', 'Pérez', 'iperez@example.com', 477, 'SMX1-2'),
(106, 'David', 'Martín', 'dmartin@example.com', 479, 'SMX1-3'),
(107, 'Sara', 'Rodríguez', 'srodriguez@example.com', 481, 'SMX1-4'),
(108, 'José', 'López', 'jlopez@example.com', 483, 'SMX2-1'),
(109, 'Marta', 'García', 'mgarcia2@example.com', 485, 'SMX2-2'),
(110, 'Pablo', 'Sánchez', 'psanchez@example.com', 486, 'ASIX1'),
(111, 'Beatriz', 'Fernández', 'bfernandez@example.com', 488, 'ASIX2'),
(112, 'Alejandro', 'Gómez', 'agomez@example.com', 489, 'DAW1'),
(113, 'Nuria', 'Ruíz', 'nruiz@example.com', 491, 'DAW2'),
(114, 'Raúl', 'González', 'rgonzalez@example.com', 475, 'SMX1-1'),
(115, 'Lorena', 'Díaz', 'ldiaz@example.com', 477, 'SMX1-2'),
(116, 'Andrés', 'Ramírez', 'aramirez@example.com', 479, 'SMX1-3'),
(117, 'Claudia', 'Pérez', 'cperez@example.com', 481, 'SMX1-4'),
(118, 'Adrián', 'Martín', 'amartin@example.com', 483, 'SMX2-1'),
(119, 'Lucía', 'Rodríguez', 'lrodriguez@example.com', 485, 'SMX2-2'),
(120, 'Antonio', 'López', 'alopez@example.com', 486, 'ASIX1'),
(121, 'Cristina', 'García', 'cgarcia@example.com', 488, 'ASIX2'),
(122, 'Jorge', 'Sánchez', 'jsanchez@example.com', 489, 'DAW1'),
(123, 'Silvia', 'Fernández', 'sfernandez@example.com', 491, 'DAW2'),
(124, 'Manuel', 'Gómez', 'mgomez@example.com', 475, 'SMX1-1'),
(125, 'Rocío', 'Ruíz', 'rruiz@example.com', 477, 'SMX1-2'),
(126, 'Rafael', 'González', 'rgonzalez2@example.com', 479, 'SMX1-3'),
(127, 'Patricia', 'Díaz', 'pdiaz@example.com', 481, 'SMX1-4'),
(128, 'Diego', 'Ramírez', 'dramirez@example.com', 483, 'SMX2-1'),
(129, 'Eva', 'Pérez', 'eperez@example.com', 485, 'SMX2-2'),
(130, 'Francisco', 'Martín', 'fmartin@example.com', 486, 'ASIX1'),
(131, 'Alba', 'Rodríguez', 'arodriguez@example.com', 488, 'ASIX2'),
(132, 'Roberto', 'López', 'rlopez@example.com', 489, 'DAW1'),
(133, 'Anaís', 'García', 'anais@example.com', 491, 'DAW2'),
(134, 'Lorenzo', 'Jiménez', 'ljimenez@example.com', 475, 'SMX1-1'),
(135, 'Sofía', 'Ortega', 'sortega@example.com', 477, 'SMX1-2'),
(136, 'Héctor', 'Sanz', 'hsanz@example.com', 479, 'SMX1-3'),
(137, 'Carolina', 'Rodríguez', 'crodriguez@example.com', 481, 'SMX1-4'),
(138, 'Gonzalo', 'Fernández', 'gfernandez@example.com', 483, 'SMX2-1'),
(139, 'Lara', 'Gómez', 'lgomez@example.com', 485, 'SMX2-2'),
(140, 'Samuel', 'López', 'slopez@example.com', 486, 'ASIX1'),
(141, 'Natalia', 'Ruiz', 'nruiz2@example.com', 488, 'ASIX2'),
(142, 'Oscar', 'Martínez', 'omartinez@example.com', 489, 'DAW1'),
(143, 'Valentina', 'León', 'vleon@example.com', 491, 'DAW2'),
(144, 'Rubén', 'Pérez', 'rperez@example.com', 475, 'SMX1-1'),
(145, 'Miriam', 'Sánchez', 'msanchez@example.com', 477, 'SMX1-2'),
(146, 'Luisa', 'González', 'lgonzalez@example.com', 479, 'SMX1-3'),
(147, 'Miguel', 'Ángel', 'Díaz', 0, 'mdiaz@'),
(148, 'Joaquín', 'Serrano', 'jserrano@example.com', 483, 'SMX2-1'),
(149, 'Raquel', 'Ortega', 'rodriguez@example.com', 485, 'SMX2-2'),
(150, 'Alberto', 'García', 'agarcia@example.com', 486, 'ASIX1'),
(151, 'Carla', 'Fernández', 'cfernandez@example.com', 487, 'ASIX2'),
(152, 'Eduardo', 'Rodríguez', 'erodriguez@example.com', 489, 'DAW1'),
(153, 'Clara', 'Ramírez', 'cramirez@example.com', 490, 'DAW2'),
(154, 'Iván', 'Gómez', 'igomez@example.com', 475, 'SMX1-1'),
(155, 'Paula', 'Sánchez', 'psanchez2@example.com', 477, 'SMX1-2'),
(156, 'Jordi', 'Martínez', 'jmartinez@example.com', 479, 'SMX1-3'),
(157, 'Valeria', 'Díaz', 'vdiaz@example.com', 481, 'SMX1-4'),
(158, 'Mateo', 'López', 'malopez@example.com', 483, 'SMX2-1'),
(159, 'Elena', 'González', 'egonzalez@example.com', 485, 'SMX2-2'),
(160, 'Guillermo', 'Ruíz', 'gruiz@example.com', 486, 'ASIX1'),
(161, 'Sara', 'Gómez', 'sgomez@example.com', 487, 'ASIX2'),
(162, 'Alberto', 'Pérez', 'aperez@example.com', 489, 'DAW1'),
(163, 'Alicia', 'Rodríguez', 'arodriguez2@example.com', 490, 'DAW2'),
(164, 'Hugo', 'Sánchez', 'hsanchez2@example.com', 474, 'SMX1-1'),
(165, 'Marta', 'Fernández', 'mfernandez2@example.com', 477, 'SMX1-2'),
(166, 'Leo', 'González', 'lgonzalez2@example.com', 478, 'SMX1-3'),
(167, 'Marina', 'Díaz', 'mdiaz2@example.com', 481, 'SMX1-4'),
(168, 'Sergio', 'Ramírez', 'sramirez@example.com', 482, 'SMX2-1'),
(169, 'Nerea', 'Ortega', 'nortega2@example.com', 484, 'SMX2-2'),
(170, 'Andrea', 'Sanz', 'asanz2@example.com', 489, 'DAW1'),
(171, 'Julia', 'Martínez', 'jmartinez2@example.com', 490, 'DAW2'),
(172, 'Iker', 'Rodríguez', 'irodriguez@example.com', 474, 'SMX1-1'),
(173, 'Emma', 'López', 'elopez2@example.com', 476, 'SMX1-2'),
(174, 'Marcos', 'García', 'mgarcia3@example.com', 478, 'SMX1-3'),
(175, 'Laura', 'Fernández', 'lfenandez3@example.com', 480, 'SMX1-4'),
(176, 'Dylan', 'Pérez', 'dperez@example.com', 482, 'SMX2-1'),
(177, 'Aurora', 'Gómez', 'agomez3@example.com', 484, 'SMX2-2'),
(178, 'Alex', 'laksla', 'a.vazquez@sapalomera.cat', 474, 'SMX1-1'),
(179, 'Aymeeen', 'Sbeey', 'a.yeye@sapalomera.cat', 474, 'SMX1-1'),
(180, 'Mark', 'Alvarez', 'malvarez@example.com', 487, 'ASIX2'),
(181, 'Ayman', 'Sbay', 'asbayy@example.com', 487, 'ASIX2'),
(182, 'Pedro', 'Rodríguez', 'prodriguez2@example.com', 490, 'DAW2'),
(183, 'David', 'Buesa', 'dbuesa@example.com', 490, 'DAW2'),
(184, 'Benitto', 'Cemal', 'bcamela@example.com', 487, 'ASIX2'),
(185, 'Oriol', 'Romeu', 'oromeu@example.com', 490, 'DAW2'),
(186, 'Mario', 'Martínez', 'mmartinez@example.com', 474, 'SMX1-1'),
(187, 'Sandra', 'García', 'sgarcia@example.com', 474, 'SMX1-1'),
(188, 'Pablo', 'Serrano', 'pserrano@example.com', 474, 'SMX1-1'),
(189, 'Carla', 'Martín', 'cmartin@example.com', 474, 'SMX1-1'),
(190, 'Diego', 'García', 'dgarcia@example.com', 476, 'SMX1-2'),
(191, 'Elena', 'Martín', 'emartin@example.com', 476, 'SMX1-2'),
(192, 'Hugo', 'Sánchez', 'hsanchez@example.com', 476, 'SMX1-2'),
(193, 'Paula', 'Gómez', 'pgomez@example.com', 476, 'SMX1-2'),
(194, 'Alejandro', 'Torres', 'atorres@example.com', 476, 'SMX1-2'),
(195, 'Isabel', 'Ruiz', 'iruiz@example.com', 476, 'SMX1-2'),
(196, 'Claudia', 'Martínez', 'cmartinez@example.com', 478, 'SMX1-3'),
(197, 'Daniel', 'Gómez', 'dgomez@example.com', 478, 'SMX1-3'),
(198, 'Laura', 'Ramírez', 'lramirez@example.com', 478, 'SMX1-3'),
(199, 'Alejandro', 'Díaz', 'adiaz@example.com', 478, 'SMX1-3'),
(200, 'Nuria', 'López', 'nlopez@example.com', 478, 'SMX1-3'),
(201, 'Víctor', 'García', 'vgarcia@example.com', 478, 'SMX1-3'),
(202, 'Sergio', 'Sánchez', 'ssanchez@example.com', 480, 'SMX1-4'),
(203, 'Marta', 'Pérez', 'mperez@example.com', 480, 'SMX1-4'),
(204, 'Andrés', 'López', 'alopez2@example.com', 480, 'SMX1-4'),
(205, 'Patricia', 'Martínez', 'pmartinez@example.com', 480, 'SMX1-4'),
(206, 'Javier', 'García', 'jgarcia@example.com', 480, 'SMX1-4'),
(207, 'Lucía', 'Ruiz', 'lruiz@example.com', 480, 'SMX1-4'),
(208, 'Martín', 'Martínez', 'mmartinez2@example.com', 482, 'SMX2-1'),
(209, 'Julia', 'Sánchez', 'jsanchez2@example.com', 482, 'SMX2-1'),
(210, 'Alejandro', 'Pérez', 'aperez2@example.com', 482, 'SMX2-1'),
(211, 'Elena', 'Gómez', 'egomez@example.com', 482, 'SMX2-1'),
(212, 'Pablo', 'González', 'pgonzalez@example.com', 482, 'SMX2-1'),
(213, 'Diego', 'Rodríguez', 'drodriguez@example.com', 484, 'SMX2-2'),
(214, 'Clara', 'García', 'cgarcia2@example.com', 484, 'SMX2-2'),
(215, 'Pedro', 'Sánchez', 'psanchez3@example.com', 484, 'SMX2-2'),
(216, 'María', 'Martín', 'mmartin2@example.com', 484, 'SMX2-2'),
(217, 'Javier', 'Serrano', 'jserrano2@example.com', 484, 'SMX2-2'),
(218, 'Laura', 'García', 'lgarcia@example.com', 484, 'SMX2-2'),
(219, 'Nose', 'que', 'nsq@example.com', 476, 'SMX1-2'),
(220, 'cuantos', 'por', 'cpor@example.com', 476, 'SMX1-2');

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
) ENGINE=InnoDB AUTO_INCREMENT=492 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grup`
--

INSERT INTO `grup` (`id`, `nom`) VALUES
(474, 'SMX1-1A'),
(475, 'SMX1-1B'),
(476, 'SMX1-2A'),
(477, 'SMX1-2B'),
(478, 'SMX1-3A'),
(479, 'SMX1-3B'),
(480, 'SMX1-4A'),
(481, 'SMX1-4B'),
(482, 'SMX2-1A'),
(483, 'SMX2-1B'),
(484, 'SMX2-2A'),
(485, 'SMX2-2B'),
(486, '1ASIXA'),
(487, '2ASIXA'),
(488, '2ASIXB'),
(489, '1DAWA'),
(490, '2DAWA'),
(491, '2DAWB');

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
-- Volcado de datos para la tabla `professor`
--

INSERT INTO `professor` (`id`, `nom`, `cognoms`, `administrador`, `email`) VALUES
(0, 'Ayman', 'Sbay Zekkari', 1, 'a.sbay@sapalomera.cat');

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
