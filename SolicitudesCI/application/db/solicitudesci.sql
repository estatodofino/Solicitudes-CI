-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2018 a las 20:49:11
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitudesci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_empresarial`
--

CREATE TABLE `asesor_empresarial` (
  `rif_empresa` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ci_asesor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_asesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_asesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `profesion_asesor` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asesor_empresarial`
--

INSERT INTO `asesor_empresarial` (`rif_empresa`, `ci_asesor`, `nombre_asesor`, `cargo_asesor`, `profesion_asesor`) VALUES
('123123123', '10605673', 'pirulin pin pom', 'Gerente General', 'Lic. Computacion'),
('j-30911469-7', '13177251', 'Felix Perez', 'Gerente de Tienda', 'TSU Administracion'),
('j-31149554-1', '21157355', 'Marian Mosquera', 'Sub-Gerente', 'Abogada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id` int(11) NOT NULL,
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_adj` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_referencia` int(25) NOT NULL,
  `fecha_deposito` date NOT NULL,
  `monto_deposito` int(10) NOT NULL,
  `saldo` int(20) NOT NULL,
  `fecha_solicitud` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`id`, `num_solicitud`, `ruta_adj`, `cod_referencia`, `fecha_deposito`, `monto_deposito`, `saldo`, `fecha_solicitud`) VALUES
(0, '000018', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id` int(15) NOT NULL,
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_adj` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_adj` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id`, `num_solicitud`, `nombre_adj`, `ruta_adj`, `fecha`) VALUES
(1, '000002', 'Constancia de culminacion', '24-07-244.png', '2018-08-10'),
(2, '000003', 'Comprobante de Inscripcion', 'asd1.png', '2018-08-10'),
(3, '000004', 'Comprobante de Inscripcion', '450_10002.jpg', '2018-08-10'),
(4, '000005', 'Comprobante de Inscripcion', 'control-operaciones.jpg', '2018-08-10'),
(5, '000006', 'Comprobante de Inscripcion', 'asd3.png', '2018-08-10'),
(6, '000007', 'Comprobante de Inscripcion', 'asd4.png', '2018-08-20'),
(7, '000008', 'Comprobante de Inscripcion', 'automatizacion_de_empleos.jpg', '2018-08-20'),
(8, '000009', 'Constancia de culminacion', '1502211321016.png', '2018-08-20'),
(11, '000010', 'Comprobante de Inscripcion', 'coti-add-clien.png', '2018-08-25'),
(17, '000011', 'Comprobante de pago', 'coti-add-clien2.png', '2018-08-27'),
(18, '000011', 'Fotocopia de CI', 'coti-add-car4.png', '2018-08-27'),
(31, '000012', 'Fotocopia de CI', '4249-201803060817064.jpg', '2018-08-28'),
(32, '000012', 'Comprobante de pago', '15022113210162.png', '2018-08-28'),
(35, '000013', 'Pensum', '7(2)91-1133.pdf', '2018-08-28'),
(36, '000013', 'Macur', 'carta_de_inscripción_enderson.docx', '2018-08-28'),
(37, '000013', 'Fotocopia de CI', 'becky_rela.png', '2018-08-28'),
(38, '000013', 'Comprobante de pago', 'asd5.png', '2018-08-28'),
(39, '000014', 'Macur', 'ACTA_VEREDICTO_I-2018.doc', '2018-08-31'),
(40, '000014', 'Fotocopia de CI', '804477036.jpg', '2018-08-31'),
(41, '000014', 'Comprobante de pago', '450_10005.jpg', '2018-08-31'),
(42, '000015', 'Fotocopia de CI', '24-07-247.png', '2018-08-31'),
(43, '000015', 'Comprobante de pago', '8044770361.jpg', '2018-08-31'),
(44, '000016', 'Fotocopia de CI', 'coti-add-car6.png', '2018-09-02'),
(45, '000016', 'Comprobante de pago', 'destinos.png', '2018-09-02'),
(46, '000017', 'Comprobante de Inscripcion', 'coti-add-clien3.png', '2018-09-03'),
(47, '000018', 'Fotocopia de CI', 'coti-add-car7.png', '2018-09-07'),
(48, '000018', 'Comprobante de pago', 'coti-add-clien4.png', '2018-09-07'),
(49, '000019', 'Fotocopia de CI', 'destinos1.png', '2018-09-07'),
(51, '000020', 'Fotocopia de CI', 'tipo_vehiculo1.png', '2018-09-07'),
(52, '000020', 'Comprobante de pago', 'modelo_bd1.jpg', '2018-09-07'),
(53, '000018', 'Comprobante de pago', 'ftp2.png', '2018-09-07'),
(54, '000019', 'Comprobante de pago', 'arrays-controller.png', '2018-09-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_varios`
--

CREATE TABLE `documentos_varios` (
  `cod_doc` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descrip_doc` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_doc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `rif` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_empresa` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empresa` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`rif`, `nombre_empresa`, `direccion_empresa`, `telefono_empresa`) VALUES
('123123123', 'asdasd', '123asdads', '1231233'),
('j-30911469-7', 'Sport & More C.A', 'Av. 6 C.C LAS VIRTUDES NIVEL P/B LOCAL 1-2', '0269-2485009'),
('j-31149554-1', 'Manta Sport Wear, C.A', 'Av. Josefa Camejo con Calle Zamora', '0269-2442156');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE `pensum` (
  `periodo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `documento_ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_pensum` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `ci_personal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nom_personal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ape_personal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_personal` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cargopersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `cod_programas` int(11) NOT NULL,
  `cod_materia` int(11) NOT NULL,
  `nombre_programa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(10) NOT NULL,
  `secuencia` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `secuencia`) VALUES
(1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_general`
--

CREATE TABLE `solicitud_general` (
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_solicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `tipo_solicitud` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_general`
--

INSERT INTO `solicitud_general` (`num_solicitud`, `ci_solicitante`, `estatus_solicitud`, `periodo`, `fecha_solicitud`, `tipo_solicitud`) VALUES
('000001', '25470091', 'En espera', '', '2018-08-10', 11),
('000002', '25470091', 'En espera', '', '2018-08-10', 11),
('000009', '25470091', '', '', '2018-08-20', 11),
('000011', '21155474', 'En espera', '', '2018-08-27', 12),
('000012', '21155474', 'En espera', '', '2018-08-28', 13),
('000013', '21155474', 'En espera', '', '2018-08-28', 15),
('000014', '21155474', 'En espera', '', '2018-08-31', 14),
('000015', '21155474', 'En espera', '', '2018-08-31', 12),
('000016', '21155474', 'En espera', '', '2018-09-02', 12),
('000018', '21155474', 'En espera', '', '2018-09-07', 12),
('000019', '21155474', 'En espera', 'primero 2018', '2018-09-08', 12),
('000020', '21155474', 'En espera', 'primero 2018', '2018-09-07', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_postulacion`
--

CREATE TABLE `solicitud_postulacion` (
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_tipo_solicitud` int(11) NOT NULL,
  `estado_solicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1',
  `rif_empresa` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ci_asesor` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_proceso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_postulacion`
--

INSERT INTO `solicitud_postulacion` (`ci_solicitante`, `fecha_solicitud`, `num_solicitud`, `cod_tipo_solicitud`, `estado_solicitud`, `rif_empresa`, `ci_asesor`, `periodo`, `fecha_proceso`) VALUES
('25470091', '2018-08-10', '000005', 10, 'En espera', 'j-31149554-1', '21157355', '', '0000-00-00'),
('25470091', '2018-08-10', '000006', 10, 'En espera', 'j-30911469-7', '13177251', '', '0000-00-00'),
('25470091', '2018-08-20', '000007', 10, 'En espera', 'j-30911469-7', '13177251', '', '0000-00-00'),
('25470091', '2018-08-20', '000008', 10, 'En espera', 'j-30911469-7', '13177251', '', '0000-00-00'),
('25470091', '2018-08-25', '000010', 10, 'En espera', 'j-31149554-1', '21157355', '', '0000-00-00'),
('25470091', '2018-09-03', '000017', 10, 'En espera', 'j-30911469-7', '13177251', 'primero 2018', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `cod_tipo_solicitud` int(11) NOT NULL,
  `nombre_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`cod_tipo_solicitud`, `nombre_solicitud`, `cantidad`, `valor`) VALUES
(10, 'Carta de postulacion de pasantia', '9', 0),
(11, 'Constancia de culminacionde materias', '5', 0),
(12, 'Carta de posicion y rango', '6', 12),
(13, 'Carta de modalidad', '1', 0),
(14, 'Certificacion de programas', '1', 0),
(15, 'Certificacion de pensum', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `cod_tipo_usuario` int(10) NOT NULL,
  `tipo_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipo_usuario`, `tipo_usuario`, `nivel`) VALUES
(1, 'Administrador', 1),
(2, 'Activo-LUZ', 2),
(3, 'Egresado-LUZ', 3),
(4, 'Usuario Especial', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_tipo_usuario` int(10) NOT NULL,
  `ci_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nom_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ape_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `request_token` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_tipo_usuario`, `ci_usuario`, `nom_usuario`, `ape_usuario`, `direccion`, `telefono`, `correo_usuario`, `password`, `token`, `request_token`, `created_at`, `estado`) VALUES
(3, '21155474', 'Wilson', 'Henriquezi', 'Cal. las Piñas Nro.139', '0412-658-4489', 'pipo_majo@gmail.com', '123456', '247f26003293ce6179ad7dda9eb0a9eadcc273f7', '2018-08-16 18:05:19', '2018-07-22 04:00:00', 0),
(1, '24426616', 'Berquismaria', 'Sanchez', '', '', 'berquissanchezu@gmail.com', '123456', 'b2aa901e589bfa6cbc66d25c03bcd27428918781', '2018-07-22 04:30:43', '2018-07-22 04:00:00', 0),
(2, '25470091', 'Enderson', 'Acosta', 'Calle Bolivar # 9 de Punta cardon', '+58 424 6007256', 'endersona24@gmail.com', '123456', '04960037f8da361b42b4dfbc63d7be95241674e4', '2018-08-11 03:16:02', '2018-07-22 01:52:23', 1),
(4, '25605209', 'pepe', 'Mujica', 'Calle zamora #5', '04126660678', 'mujica_pep@gmail.com', '12345', '67c66b3f70ca78fbd71e45ea7e32c81628701c19', '2018-08-16 18:07:37', '2018-07-22 04:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_periodo`
--

CREATE TABLE `usuario_periodo` (
  `ci_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `periodo` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_periodo`
--

INSERT INTO `usuario_periodo` (`ci_usuario`, `year`, `periodo`) VALUES
('25470091', 'Segundo', '2013'),
('24426616', '2018', 'Primero'),
('21155474', '2018', 'Segundo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD PRIMARY KEY (`ci_asesor`),
  ADD KEY `rif_empresa` (`rif_empresa`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`cod_referencia`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_solicitud` (`num_solicitud`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`rif`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ci_personal`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`,`tipo_solicitud`),
  ADD KEY `fk_solicitud_tipo` (`tipo_solicitud`);

--
-- Indices de la tabla `solicitud_postulacion`
--
ALTER TABLE `solicitud_postulacion`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `cod_tipo_solicitud` (`cod_tipo_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`),
  ADD KEY `rif_empresa` (`rif_empresa`),
  ADD KEY `ci_asesor` (`ci_asesor`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`cod_tipo_solicitud`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`cod_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ci_usuario`),
  ADD KEY `usuario_ibfk_1` (`cod_tipo_usuario`);

--
-- Indices de la tabla `usuario_periodo`
--
ALTER TABLE `usuario_periodo`
  ADD KEY `ci_usuario` (`ci_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD CONSTRAINT `fk_asesor_empresa` FOREIGN KEY (`rif_empresa`) REFERENCES `empresas` (`rif`);

--
-- Filtros para la tabla `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD CONSTRAINT `fk_solicitud_solicitante` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_solicitud_tipo` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `solicitud_postulacion`
--
ALTER TABLE `solicitud_postulacion`
  ADD CONSTRAINT `fk_postulaciion_asesor` FOREIGN KEY (`ci_asesor`) REFERENCES `asesor_empresarial` (`ci_asesor`),
  ADD CONSTRAINT `fk_postulaciion_empresa` FOREIGN KEY (`rif_empresa`) REFERENCES `empresas` (`rif`),
  ADD CONSTRAINT `fk_postulacion_solicitante` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_potulacion_tipo_solicitud` FOREIGN KEY (`cod_tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_usuario`);

--
-- Filtros para la tabla `usuario_periodo`
--
ALTER TABLE `usuario_periodo`
  ADD CONSTRAINT `usuario_ibfk_usuario` FOREIGN KEY (`ci_usuario`) REFERENCES `usuarios` (`ci_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
