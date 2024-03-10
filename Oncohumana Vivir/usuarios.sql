-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 02:11:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oncohumana_vivir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(15) NOT NULL COMMENT 'Identificación de usuario',
  `nombres` varchar(50) DEFAULT NULL COMMENT 'Nombres del usuario',
  `apellidos` varchar(50) DEFAULT NULL COMMENT 'Apellidos del usuario',
  `telefono` varchar(20) DEFAULT NULL COMMENT 'Teléfono del usuario',
  `email` varchar(100) DEFAULT NULL COMMENT 'Correo electrónico del usuario',
  `rol` enum('paciente','recepcionista','administrador','editor','medico') DEFAULT NULL COMMENT 'Rol de usuario',
  `usuario` varchar(20) DEFAULT NULL COMMENT 'Nombre usuario en el logueo',
  `contrasenna` varchar(60) DEFAULT NULL COMMENT 'Contraseña del usuario en el logueo',
  `estado` enum('activo','no activo') DEFAULT NULL COMMENT 'Estado del usuario en el sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `telefono`, `email`, `rol`, `usuario`, `contrasenna`, `estado`) VALUES
(1025468596, 'Carlos', 'Martínez', '314586965', 'administrador1_01@gmail.com', 'administrador', 'administrador1', '1234', 'activo'),
(1025468597, 'Andrea', 'Peláez', '314586966', 'recepcionista1_01@gmail.com', 'recepcionista', 'recepcionista1', '1234', 'activo'),
(1025468598, 'Andrés', 'Torres', '314586967', 'medico1_01@gmail.com', 'medico', 'medico1', '1234', 'activo'),
(1025468599, 'Alexánder', 'López', '314586968', 'alexander_lopez1_01@gmail.com', 'paciente', 'paciente1', '1234', 'activo'),
(1025468600, 'Alexandra', 'Linares', '314586969', 'alexandra_linares1_01@gmail.com', 'editor', 'editor1', '1234', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(15) NOT NULL AUTO_INCREMENT COMMENT 'Identificación de usuario', AUTO_INCREMENT=1025468601;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
