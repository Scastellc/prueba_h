-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2018 a las 21:01:47
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotelinking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codes`
--

CREATE TABLE `codes` (
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `canjeado` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`login`, `code`, `canjeado`) VALUES
('salvaa', 'lw2xbbgqxu65cs681codxq60w', 'no'),
('salvaa', '7zwtrhi09lwv3xmqcfgjv5y2f', 'si'),
('salvaa', 'spnx2bdr0o0o7vqz5obmix6ip', 'si'),
('salvaa', '1crpsau7nysxyr421gdnj4rhw', 'si'),
('salvaa', 'j3a4xr1pbv6exd4ym60ap2zg2', 'si'),
('salvaa', '3jjyb867ibfekk4fpl6a82ejb', 'no'),
('salvaa', '6gacf9b61ebutog6uoa6607dh', 'no'),
('salvaa', '0aco6aprh45skhj9xi7pd79wd', 'no'),
('salvaa', '963tw8jy0qgtl98u3kwp06zec', 'no'),
('prueba1', 'vgxbj9ih5ljjn7gt5f7xajzz4', 'si'),
('prueba1', 'c8qnlwvzivsjb54t7o58t80sa', 'si'),
('prueba1', '18be2mae2ix0i9qu9s0uqjyle', 'si'),
('salva', 'wlee8xbtzxtckkqseecxz6a6i', 'no'),
('salva', 'rabs4ux1lac5kyg73iaffvm9y', 'si'),
('salva', '0dgfshp17bfc359tmf7ivsf9v', 'si'),
('salva', '08t0vpgsz4kwt3o0jwhm7swmz', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `pass`) VALUES
('salvaa', 'ea82bac996880fe48d046c0f950a4c74'),
('prueba1', 'e1b849f9631ffc1829b2e31402373e3c'),
('salva', '7e0a7e675bb557f7ebd89fb2b5d6c7de');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
