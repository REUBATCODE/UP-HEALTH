-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2023 a las 05:45:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uphealth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `num_empleado` varchar(10) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `correo` varchar(60) DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `numero_celular` varchar(10) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date NOT NULL,
  `rol` enum('super','admin') NOT NULL DEFAULT 'admin',
  `status` enum('activo','baja') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `nombre`, `apellido`, `num_empleado`, `imagen`, `correo`, `password`, `numero_celular`, `fecha_nacimiento`, `rol`, `status`) VALUES
(1, 'jorge', 'santillan', '123', NULL, '123@123', '123', '1234567891', '2023-06-16', 'super', 'activo'),
(3, 'pollo jefe', 'de los pollitos', '123456', '../../img/img-user-admin/f856cbfbe877db38c8061fdff9386578/pollo.jpg', 'ddfff@gmail.com', '$2y$10$5dyivrB6HHRoIKUfpy/Qm.V0rpLbvrMKXPUbEf9omCWmbNnn8kGkG', '6633399609', '1999-12-12', 'super', 'activo'),
(4, 'Angel Dabnee', 'Gonzalez Rodriguez', '1234', 'c83f59ee7745303db312a9f2178be8ccusuarioAngel.jpg', 'a@gmail.com', 'AngelDabnee', '6622782034', '1997-09-08', 'super', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id_ejercicio` int(11) NOT NULL,
  `nombre_ejercicio` varchar(255) NOT NULL,
  `grupo_muscular` enum('pecho','espalda','gluteo','cuadriceps','gemelos','femoral','hombro','biceps','triceps','abdomen') DEFAULT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejercicio`, `nombre_ejercicio`, `grupo_muscular`, `descripcion`, `imagen`) VALUES
(19, 'quisiera algo de ti ', 'gluteo', 'muy ricos', '086d24ed3e09474f568d1032d4bb21d4fondo menu.jpg'),
(21, 'aaaaaaaa', 'gemelos', 'aaaaaaasdasd', 'c1d0bf591f6764e61dcbdf5b1284f92aspiderman fondo crud.jpg'),
(22, 'algo bello pal plebello', 'pecho', 'chichi', '9b6fc4efe94215052bda24432d79780epresPechoBancoPlano.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutinacreada`
--

CREATE TABLE `rutinacreada` (
  `id` int(11) NOT NULL,
  `id_ejercicio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutinacreada`
--

INSERT INTO `rutinacreada` (`id`, `id_ejercicio`, `nombre`) VALUES
(7, 19, '56'),
(8, 21, '56'),
(9, 22, '56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Correo`, `Password`, `nombre_usuario`) VALUES
(1, 'usuario1@example.com', 'contraseña1', 'Ruben'),
(2, 'usuario2@example.com', 'contraseña2', 'Bernardo'),
(3, 'usuario3@example.com', 'contraseña3', 'Jorge'),
(4, 'usuario4@example.com', 'contraseña4', 'Esteban'),
(5, 'usuario5@example.com', 'contraseña5', 'Angel'),
(6, 'usuario6@example.com', 'contraseña6', 'Dabnee'),
(7, 'usuario7@example.com', 'contraseña7', 'Fernando'),
(8, 'usuario8@example.com', 'contraseña8', 'Murfo'),
(9, 'usuario9@example.com', 'contraseña9', 'Luis'),
(10, 'usuario10@example.com', 'contraseña10', 'Daniel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `num_empleado` (`num_empleado`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD UNIQUE KEY `id_ejercicio` (`id_ejercicio`);

--
-- Indices de la tabla `rutinacreada`
--
ALTER TABLE `rutinacreada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rutina_a_ejercicio` (`id_ejercicio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `rutinacreada`
--
ALTER TABLE `rutinacreada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rutinacreada`
--
ALTER TABLE `rutinacreada`
  ADD CONSTRAINT `rutina_a_ejercicio` FOREIGN KEY (`id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
