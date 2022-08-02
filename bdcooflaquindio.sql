-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2021 a las 03:39:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcooptransp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idConductor` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Rh` varchar(5) NOT NULL,
  `Eps` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idConductor`, `Cedula`, `Nombres`, `Apellidos`, `Direccion`, `Telefono`, `Rh`, `Eps`) VALUES
(21, 91220751, 'Otoniel', 'Suarez Delgado', 'centro Galan', '312564655', 'o+', 'Salud Vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor_vehiculo`
--

CREATE TABLE `conductor_vehiculo` (
  `idConductor` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `Nit` int(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `idPasajero` int(11) NOT NULL,
  `Tipo_Documento` varchar(50) NOT NULL,
  `Numero_Documento` int(10) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Origen` varchar(50) NOT NULL,
  `Destino` varchar(50) NOT NULL,
  `Valor_Pasaje` int(10) NOT NULL,
  `idVehiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `Numero_Vehiculo` int(10) NOT NULL,
  `Tipo_Vehiculo` varchar(50) NOT NULL,
  `Placa` varchar(50) NOT NULL,
  `Modelo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idConductor`);

--
-- Indices de la tabla `conductor_vehiculo`
--
ALTER TABLE `conductor_vehiculo`
  ADD KEY `id_conductor` (`idConductor`),
  ADD KEY `id_vehiculo` (`idVehiculo`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `idVehiculos` (`idVehiculo`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`idPasajero`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idConductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `idPasajero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor_vehiculo`
--
ALTER TABLE `conductor_vehiculo`
  ADD CONSTRAINT `conductor_vehiculo_ibfk_1` FOREIGN KEY (`idConductor`) REFERENCES `conductor` (`idConductor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_vehiculo_ibfk_2` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
