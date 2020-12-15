-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 02:00:34
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `nombre`, `nit`, `direccion`) VALUES
(1, 'CAPITAL Y SOLUCIONES SAS', '1234546', 'CR 25 1 A SUR 155 OF 1255'),
(2, '123456', '1234546', 'CR 25 1 A SUR 155 OF 1255'),
(3, 'Pepito Perez', '321654', 'cra 10 # 13 - 36'),
(4, 'Pepito Perez', '321654', 'cra 10 # 13 - 36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio_usuario`
--

CREATE TABLE `comercio_usuario` (
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comercio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comercio_usuario`
--

INSERT INTO `comercio_usuario` (`usuario`, `comercio_id`) VALUES
('daniel', 1),
('danipv2', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(11) NOT NULL,
  `forma_pago` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `forma_pago`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link_pagos`
--

CREATE TABLE `link_pagos` (
  `id` int(11) NOT NULL,
  `token` varchar(110) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_uso` datetime DEFAULT NULL,
  `peticion_pago_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `link_pagos`
--

INSERT INTO `link_pagos` (`id`, `token`, `fecha_uso`, `peticion_pago_id`) VALUES
(1, '5', NULL, 2),
(2, '5fd80925a93d7', '2020-12-15 01:54:56', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `direccion`, `correo`, `telefono`) VALUES
(1, 'Daniel Eduardo', 'Ovallos', 'cra 10 # 13 - 36', 'srdejo@gmail.com', '3138523670'),
(2, 'Daniel Eduardo', 'Ovallos', 'cra 10 # 13 - 36', 'srdejo@gmail.com', '3138523670');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion_pago`
--

CREATE TABLE `peticion_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `monto` int(18) NOT NULL,
  `comision` int(18) NOT NULL,
  `franquisia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `comercio_id` int(11) NOT NULL,
  `forma_pago_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peticion_pago`
--

INSERT INTO `peticion_pago` (`id`, `descripcion`, `monto`, `comision`, `franquisia`, `comercio_id`, `forma_pago_id`) VALUES
(1, 'Plan gratuito', 123, 12, 'Visa', 1, 1),
(2, 'Plan gratuito', 123, 12, 'Visa', 1, 1),
(4, 'Chanclas', 25000, 2500, 'Visa', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Punto de Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `id` int(11) NOT NULL,
  `peticion_pago_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `referencia_efecty` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_tarjeta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`id`, `peticion_pago_id`, `persona_id`, `referencia_efecty`, `numero_tarjeta`) VALUES
(1, 4, 2, NULL, '45679');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`, `rol_id`) VALUES
('daniel', '123456', 2),
('danipv', '1234', 1),
('danipv2', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio_usuario`
--
ALTER TABLE `comercio_usuario`
  ADD KEY `FK_usuario` (`usuario`,`comercio_id`),
  ADD KEY `comercio_id` (`comercio_id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `link_pagos`
--
ALTER TABLE `link_pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peticion_pago_id` (`peticion_pago_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peticion_pago`
--
ALTER TABLE `peticion_pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comercio` (`comercio_id`),
  ADD KEY `FK_forma_pago` (`forma_pago_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_peticion_pago` (`peticion_pago_id`),
  ADD KEY `FK_persona_id` (`persona_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `link_pagos`
--
ALTER TABLE `link_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `peticion_pago`
--
ALTER TABLE `peticion_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comercio_usuario`
--
ALTER TABLE `comercio_usuario`
  ADD CONSTRAINT `comercio_usuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comercio_usuario_ibfk_2` FOREIGN KEY (`comercio_id`) REFERENCES `comercio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `link_pagos`
--
ALTER TABLE `link_pagos`
  ADD CONSTRAINT `link_pagos_ibfk_1` FOREIGN KEY (`peticion_pago_id`) REFERENCES `peticion_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `peticion_pago`
--
ALTER TABLE `peticion_pago`
  ADD CONSTRAINT `peticion_pago_ibfk_2` FOREIGN KEY (`comercio_id`) REFERENCES `comercio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `peticion_pago_ibfk_3` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `transaccion_ibfk_1` FOREIGN KEY (`peticion_pago_id`) REFERENCES `peticion_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaccion_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
