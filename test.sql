-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-08-2015 a las 02:57:09
-- Versión del servidor: 5.5.36-MariaDB
-- Versión de PHP: 5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phonebook`
--

CREATE TABLE IF NOT EXISTS `phonebook` (
  `name` varchar(1024) NOT NULL COMMENT 'Full Name',
  `phone` bigint(128) NOT NULL COMMENT 'Phone Number',
  `date_add` date NOT NULL COMMENT 'Date of Adding',
  `add_notes` varchar(4000) NOT NULL COMMENT 'Additional Notes',
  PRIMARY KEY (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Phone Book Table';

--
-- Volcado de datos para la tabla `phonebook`
--

INSERT INTO `phonebook` (`name`, `phone`, `date_add`, `add_notes`) VALUES
('CESAR ANDRADE', 4330775, '2015-08-02', 'Add Notes for this Record'),
('ANGELICA LOPEZ', 2750000, '2015-08-05', 'TEST DATA INFORMACION  add. More information for the record'),
('IVAN QUINONES C', 3163331279, '2015-08-24', 'J KADSJF LKASDJ FHLAKJFHAJKD FHLAKJ FHKLAJD FHKLAJD FHLF'),
('LUIS EDUARDO MILLAN', 3005656029, '2015-08-04', 'INFORMATION INFORMATION AND INFORMATION'),
('CESAR MAURICIO ANDRADE', 3144127870, '2015-08-10', 'This is the Add Notes More information for the record'),
('MARIANA ANDRADE', 3185656025, '2015-08-04', 'RECORD INFORMATION ADDITIONAL'),
('NELSON RODRIGUEZ', 381711110018, '2015-08-02', 'THIS IS THE ASSITANCE'),
('JOSE JAVIER CASTIBLANCO', 314852369, '2015-08-10', 'PROFFESIONAL AND DATABASE MANAGER'),
('MARIELA AVILA', 2865555, '2015-08-14', 'PROFESIONAL DE LA BASE DE DATOS'),
('DIEGO ARMANDO BARON GUERRERO', 86852522, '2015-08-13', 'The Auxiliar to give information'),
('LUZ MERY MORENO', 7485255, '2015-08-14', 'International Information'),
('CLASIFICADOS EL ESPECTADOR', 5712627700, '2015-08-14', 'This is the phone special number'),
('Juan Carlos Correa', 43307755, '2015-07-05', 'Additional information is in the website'),
('PEDRO ANTONIO PEREZ', 2518115, '2015-08-14', 'This is the Add Notes Notes add. More information for the record'),
('MARIA DEL CARMEN ARISMENDY', 5714426373, '2015-08-14', 'This is test purposes Only'),
('JUAN FRANCISCO ARISMENDY', 25181115, '2015-08-14', 'This is the cousin''s manager'),
('CESAR AUGUSTO ANDRADE A', 12334232343, '2015-08-15', 'Notes NOtes Information Test Addition'),
('CESAR AUGUSTO A', 57134159995, '2015-08-15', 'THIS IS THE PHONE DIRECT OF THE OFFICE'),
('MARIA DEL CARMEN ARISMENDY', 5713415995, '2015-08-14', 'Test Record'),
('BANCO GNB SUDAMERIS', 5712750000, '2015-08-14', 'TEST DATA INFORMACION FOR ADD NOTES'),
('NOMBRE DE PRUEBA', 5713811094, '2015-08-15', 'TEST RECORD OBSERVATIONS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(512) NOT NULL COMMENT 'First and Last Name User',
  `user_email` varchar(512) NOT NULL COMMENT 'User e-mail',
  `user_paswd` varchar(1024) NOT NULL COMMENT 'User Password',
  PRIMARY KEY (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='User table information';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_name`, `user_email`, `user_paswd`) VALUES
('CESAR ANDRADE', 'cesaring28@gmail.com', '8e018c9b53c13b12849def7232845489'),
('ANGELICA LOPEZ', 'angelica.lopeztorres@gmail.com', 'a14389915aedcf94dcf555156720144f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
