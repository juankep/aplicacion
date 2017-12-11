-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2016 a las 04:22:28
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservacioncitaparalavado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auto`
--

CREATE TABLE `auto` (
  `idAuto` int(11) NOT NULL,
  `placa` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` text,
  `ci` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auto`
--

INSERT INTO `auto` (`idAuto`, `placa`, `modelo`, `color`, `tipo`, `descripcion`, `ci`) VALUES
(1, 'E120', 'SZ KIA', 'blanco', 'liviano', 'año 2013', '1003451794'),
(2, 'E120', 'Aveo', 'rojo', 'liviano', 'año 2013', '1003451793'),
(3, 'E120', 'Vitara', 'negro', 'liviano', 'año 2010', '1003451797'),
(4, 'Q120', 'Mazda', 'negro', 'liviano', 'año 2011', '2523942003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'lavado liviano'),
(2, 'LavadoPesado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ci` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `password2` varchar(15) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `telefonoCliente` varchar(8) NOT NULL,
  `emailCliente` varchar(25) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ci`, `password`, `password2`, `nombreCliente`, `telefonoCliente`, `emailCliente`, `direccion`, `ciudad`) VALUES
('1003451793', '123', '123', 'Diego Sosa', '2922380', 'diego@gmail.com', 'sucre y bolivar', 'Quito'),
('1003451794', '123', '123', 'Luis Gonzalez', '2572025', 'fabygcom@gmail.com', 'San Juan de Iluman', 'Ibarra'),
('1003451795', '123', '123', 'Juan Campos', '2922380', 'karencom@gmail.com', '', ''),
('1003451796', '123', '123', 'Alberto Ruiz', '2922380', 'ruiz@gmail.com', 'Roca y AV Shiris', 'Quito'),
('1003451797', '123', '123', 'Hugo Malta', '2572025', 'hugo@gmail.com', 'Roca y Quito', 'Cotacachi'),
('1003451798', '123', '123', 'Sebastian Colmenares', '2572025', 'sebastian@gmail.com', 'Ceibos', 'Ibarra'),
('2523942001', '123', '123', 'Miguel Zapata', '2922380', 'miguel@gmail.com', 'sucre y bolivar', 'Tulcan'),
('2523942002', '123', '123', 'Ricardo Andrade', '2922380', 'ricardo@gmail.com', 'sucre y bolivar', 'Cayambe'),
('2523942003', '123', '123', 'Susana Yepez', '2922380', 'susana@gmail.com', 'quito - bolivar', 'Atuntaqui'),
('2523942007', '123', '123', 'Martha Velaquez', '2922380', 'velazquez@gmail.com', 'sucre y bolivar', 'Ibarra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `idComprobante` int(11) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `idServicio` int(11) NOT NULL,
  `tituloServicio` varchar(45) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `fechaReservaServicio` datetime NOT NULL,
  `fechaRS` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`idComprobante`, `ci`, `nombreCliente`, `idServicio`, `tituloServicio`, `descripcion`, `fechaReservaServicio`, `fechaRS`) VALUES
(1, '1003451794', 'Luis Gonzalez', 1, 'basico externo', 'chasis', '2016-02-21 07:10:07', '2016-02-20'),
(2, '1003451797', 'Hugo Malta', 2, 'Basico Interno', 'asientos', '2016-02-18 15:24:00', '2016-02-19'),
(3, '1003451796', 'Alberto Ruiz', 1, 'basico Externo', 'chasis', '2016-02-09 10:29:00', '2016-02-10'),
(4, '1003451793', 'Diego Sosa', 3, 'completo', 'chasis y asientos', '2016-02-11 15:34:00', '2016-02-12'),
(5, '1003451797', 'Hugo Malta', 1, 'Basico Externo', 'chasis', '2016-02-13 15:37:00', '2016-02-14'),
(6, '1003451797', 'Hugo Malta', 2, 'basico Interno', 'asientos', '2016-02-11 16:30:00', '2016-02-12'),
(7, '1003451797', 'Hugo Malta', 2, 'basico Interior', 'asientos', '2016-02-21 16:32:00', '2016-02-21'),
(8, '1003451797', 'Hugo Malta', 1, 'basico Exterior', 'chasis', '2016-02-20 15:42:00', '2016-02-21'),
(9, '1003451795', 'Juan Campos', 3, 'completo', 'chasis y asientos', '2016-02-20 15:34:00', '2016-02-20'),
(10, '1003451795', 'Juan Campos', 2, 'basico Interno', 'asientos', '2016-02-20 17:36:00', '2016-02-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mora`
--

CREATE TABLE `mora` (
  `idMora` int(11) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `motivo` varchar(45) DEFAULT NULL,
  `estadoMora` varchar(45) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `fechaEmitida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mora`
--

INSERT INTO `mora` (`idMora`, `ci`, `motivo`, `estadoMora`, `cantidad`, `fechaEmitida`) VALUES
(1, '1003451794', 'Retardo de Servicio', 'Activa', '4.60', '2016-02-20'),
(2, '1003451794', 'Retardo de Servicio', 'Activa', '4.60', '2016-02-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `fechaReserva` date DEFAULT NULL,
  `fechaAtencion` date DEFAULT NULL,
  `idServicio` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `caracteristicas` varchar(45) NOT NULL,
  `presioServicio` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `stockServicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `nombre`, `descripcion`, `caracteristicas`, `presioServicio`, `estado`, `tipo`, `idCategoria`, `stockServicio`) VALUES
(1, 'basico Exterior', 'chasis', 'agua espumosa', 3, 'activa', 'A', 1, 18),
(2, 'Basico Interior', 'asientos', 'amueblados aspirador', 5, 'activo', 'B', 1, 8),
(5, 'completa', 'exterior e interior', 'agua, espuma, aspiradora', 5, 'Activo', 'C', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `idEmpleado` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(15) NOT NULL,
  `password2` varchar(15) NOT NULL,
  `nombreEmpleado` varchar(45) NOT NULL,
  `telefonoEmpleado` varchar(8) NOT NULL,
  `emailEmpleado` varchar(20) NOT NULL,
  `direccionEmpleado` text NOT NULL,
  `idServicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`idEmpleado`, `user`, `password`, `password2`, `nombreEmpleado`, `telefonoEmpleado`, `emailEmpleado`, `direccionEmpleado`, `idServicio`) VALUES
(1, 'victor', 'victor', 'victor', 'Victor Farinango', '29452012', 'vic@gmail.com', 'Sucre y quito', 2),
(3, 'luis', '123', '123', 'Luis Fabian', '2946718', 'faby@gmail.com', 'Iluman', 1),
(4, 'Mario', '123', '123', 'Mario Fuentes', '29345123', 'mario@gmail.com', 'Sucre Av Quito', 5),
(7, 'Jessy', '123', '123', 'Jessy Campos', '2922380', 'campos@gmail.com', 'sucre y bolivar', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`idAuto`),
  ADD KEY `fk_AUTO_CLIENTE1_idx` (`ci`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`idComprobante`);

--
-- Indices de la tabla `mora`
--
ALTER TABLE `mora`
  ADD PRIMARY KEY (`idMora`),
  ADD KEY `fk_MORA_CLIENTE1_idx` (`ci`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `ci_idx` (`ci`),
  ADD KEY `fk_RESERVA_SERVICIO1_idx` (`idServicio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`),
  ADD KEY `fk_SERVICIO_CATEGORIA1_idx` (`idCategoria`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_TRABAJADOR_SERVICIO1_idx` (`idServicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auto`
--
ALTER TABLE `auto`
  MODIFY `idAuto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mora`
--
ALTER TABLE `mora`
  MODIFY `idMora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `fk_AUTO_CLIENTE1` FOREIGN KEY (`ci`) REFERENCES `cliente` (`ci`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mora`
--
ALTER TABLE `mora`
  ADD CONSTRAINT `fk_MORA_CLIENTE1` FOREIGN KEY (`ci`) REFERENCES `cliente` (`ci`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `ci` FOREIGN KEY (`ci`) REFERENCES `cliente` (`ci`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RESERVA_SERVICIO1` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `fk_SERVICIO_CATEGORIA1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `fk_TRABAJADOR_SERVICIO1` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
