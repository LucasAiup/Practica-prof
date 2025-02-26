-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 06:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(8) NOT NULL,
  `id_carrera` enum('DS','ITI','AF','') DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `id_carrera`, `password`) VALUES
(45949066, 'DS', 'URQUIZA49'),
(47825386, 'AF', 'URQUIZA49'),
(49787930, 'ITI', 'URQUIZA49');

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `nombre_materia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materias_af`
--

CREATE TABLE `materias_af` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `correlatividad_1` int(11) DEFAULT NULL,
  `correlatividad_2` int(11) DEFAULT NULL,
  `correlatividad_3` int(11) DEFAULT NULL,
  `año` enum('1','2','3','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materias_af`
--

INSERT INTO `materias_af` (`id_materia`, `nombre`, `correlatividad_1`, `correlatividad_2`, `correlatividad_3`, `año`) VALUES
(1, 'comunicacion', 0, 0, 0, '1'),
(2, 'udi 1', 0, 0, 0, '1'),
(3, 'matematica', 0, 0, 0, '1'),
(4, 'ingles tecnico 1', 0, 0, 0, '1'),
(5, 'psicosociologia de la org', 0, 0, 0, '1'),
(6, 'modelo de negocios', 0, 0, 0, '1'),
(7, 'arquitectura de computadoras', 0, 0, 0, '1'),
(8, 'gestion de software 1', 0, 0, 0, '1'),
(9, 'analisis de sis org', 0, 0, 0, '1'),
(10, 'problematicas socio contemp', 0, 0, 0, '2'),
(11, 'udi 2', 0, 0, 0, '2'),
(12, 'ingles tecnico 2', 4, 0, 0, '2'),
(13, 'estadistica', 0, 0, 0, '2'),
(14, 'InnDesEmprende', 0, 0, 0, '2'),
(15, 'gestion de software 2', 8, 0, 0, '2'),
(16, 'estrategias de negocios', 6, 0, 0, '2'),
(17, 'desarrollo de sistemas', 9, 0, 0, '2'),
(18, 'practica profesionalizante 1', 0, 0, 0, '2'),
(19, 'etica y responsabilidad social', 0, 0, 0, '3'),
(20, 'derecho y legislacion laboral', 0, 0, 0, '3'),
(21, 'redes y comunicacion', 0, 0, 0, '3'),
(22, 'seguridad de los sistemas', 0, 0, 0, '3'),
(23, 'bases de datos', 0, 0, 0, '3'),
(24, 'sistema de informacion org', 6, 0, 0, '3'),
(25, 'desarrollo de sistemas web', 17, 0, 0, '3'),
(26, 'practica profesionalizante 2', 18, 14, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `materias_ds`
--

CREATE TABLE `materias_ds` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `correlatividad_1` int(11) DEFAULT NULL,
  `correlatividad_2` int(11) DEFAULT NULL,
  `correlatividad_3` int(11) DEFAULT NULL,
  `año` enum('1','2','3','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materias_ds`
--

INSERT INTO `materias_ds` (`id_materia`, `nombre`, `correlatividad_1`, `correlatividad_2`, `correlatividad_3`, `año`) VALUES
(1, 'comunicacion', 0, 0, 0, '1'),
(2, 'udi 1', 0, 0, 0, '1'),
(3, 'matematica', 0, 0, 0, '1'),
(4, 'ingles tecnico 1', 0, 0, 0, '1'),
(5, 'administracion', 0, 0, 0, '1'),
(6, 'tecnologia de la informacion', 0, 0, 0, '1'),
(7, 'logica y estructura de datos', 0, 0, 0, '1'),
(8, 'ingenieria de software 1', 0, 0, 0, '1'),
(9, 'sistemas operativos', 0, 0, 0, '1'),
(10, 'problematicas socio contemp', 0, 0, 0, '2'),
(11, 'udi 2', 0, 0, 0, '2'),
(12, 'ingles tecnico 2', 4, 0, 0, '2'),
(13, 'InnDesEmprende', 0, 0, 0, '2'),
(14, 'estadistica', 0, 0, 0, '2'),
(15, 'programacion 1', 7, 0, 0, '2'),
(16, 'ingenieria de software 2', 8, 0, 0, '2'),
(17, 'bases de datos 1', 0, 0, 0, '2'),
(18, 'practica profesionalizante 1', 0, 0, 0, '2'),
(19, 'etica y responsabilidad social', 0, 0, 0, '3'),
(20, 'derecho y legislacion laboral', 0, 0, 0, '3'),
(21, 'redes y comunicacion', 6, 9, 0, '3'),
(22, 'programacion 2', 15, 0, 0, '3'),
(23, 'gestion protectos de software', 16, 0, 0, '3'),
(24, 'bases de datos 2', 17, 9, 0, '3'),
(25, 'practica profesionalizante 2', 18, 5, 13, '3');

-- --------------------------------------------------------

--
-- Table structure for table `materias_iti`
--

CREATE TABLE `materias_iti` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `correlatividad_1` int(11) DEFAULT NULL,
  `correlatividad_2` int(11) DEFAULT NULL,
  `correlatividad_3` int(11) DEFAULT NULL,
  `año` enum('1','2','3','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materias_iti`
--

INSERT INTO `materias_iti` (`id_materia`, `nombre`, `correlatividad_1`, `correlatividad_2`, `correlatividad_3`, `año`) VALUES
(1, 'comunicacion', 0, 0, 0, '1'),
(2, 'udi 1', 0, 0, 0, '1'),
(3, 'matematica', 0, 0, 0, '1'),
(4, 'fisica aplicada', 0, 0, 0, '1'),
(5, 'administracion', 0, 0, 0, '1'),
(6, 'ingles tecnico', 0, 0, 0, '1'),
(7, 'arquitectura de computadoras', 0, 0, 0, '1'),
(8, 'logica y programacion', 0, 0, 0, '1'),
(9, 'infraestructura de redes 1', 0, 0, 0, '1'),
(10, 'problematicas socio contemp', 0, 0, 0, '2'),
(11, 'udi 2', 0, 0, 0, '2'),
(12, 'estadistica', 0, 0, 0, '2'),
(13, 'InnDesEmprende', 0, 0, 0, '2'),
(14, 'sistemas operativos', 7, 0, 0, '2'),
(15, 'algoritm y estructura de datos', 3, 8, 0, '2'),
(16, 'base de datos', 8, 0, 0, '2'),
(17, 'infraestructura de redes 2', 9, 0, 0, '2'),
(18, 'practica profesionalizante 1', 0, 0, 0, '2'),
(19, 'etica y responsabilidad social', 0, 0, 0, '3'),
(20, 'derecho y legislacion laboral', 0, 0, 0, '3'),
(21, 'administracion bases de datos', 16, 0, 0, '3'),
(22, 'seguridad de los sistemas', 14, 0, 0, '3'),
(23, 'integridad y migracion de dato', 17, 5, 0, '3'),
(24, 'admin sis op y redes', 17, 14, 0, '3'),
(25, 'practica profesionalizante 2', 18, 13, 0, '3');

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id_materias` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id_materias`, `nota`, `id_alumno`) VALUES
(1, 6, 45949066),
(2, 7, 45949066),
(3, 8, 45949066),
(4, 6, 45949066),
(5, 7, 45949066),
(6, 9, 45949066),
(7, 4, 45949066),
(8, 6, 45949066),
(9, 5, 45949066);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indexes for table `materias_af`
--
ALTER TABLE `materias_af`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `materias_ds`
--
ALTER TABLE `materias_ds`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `materias_iti`
--
ALTER TABLE `materias_iti`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`);

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
