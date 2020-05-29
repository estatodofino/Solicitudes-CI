-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 08:27:47
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('123123123', '123456', 'Fulanito de tal', 'Mata tigres', 'Licenciado en artes callejeras'),
('j-30911469-7', '13177251', 'Felix Perez', 'Gerente de Tienda', 'TSU Administracion'),
('j-403223173-7', '18900789', 'Virginia Villanaza', 'Encargada', 'TSU en Publicidad y Mercadeo'),
('j-31149554-1', '21157355', 'Marian Mosquera', 'Sub-Gerente', 'Abogada'),
('j-40322312455-7', '25470091', 'Enderson Acosta', 'Gerente General', 'Lic. en Computacion');

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
(1, '000018', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 12, '2018-09-07'),
(3, '000018', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-09'),
(4, '000019', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-09'),
(5, '000020', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-09'),
(6, '000021', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-09'),
(7, '000022', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 12, '2018-09-09'),
(8, '000023', 'coti-add-clien4.png', 123452123, '2018-04-18', 24, 0, '2018-09-09'),
(9, '000024', 'arrays-controller2.png', 45678123, '2018-09-09', 30, 14, '2018-09-17'),
(10, '000025', 'tipo-carro-select.png', 2147483647, '2018-09-19', 16, 0, '2018-09-18'),
(11, '000026', 'tipo-carro-select.png', 2147483647, '2018-03-09', 60, 40, '2018-09-19'),
(12, '000027', 'arrays-controller3.png', 2147483647, '2018-09-09', 50, 34, '2018-09-24'),
(13, '000029', 'coti-add-clien9.png', 123456, '2018-09-09', 1, -11, '2018-09-26'),
(14, '000030', 'clientes.png', 2424455, '2018-10-03', 40, 10, '2018-10-04'),
(15, '000031', 'Sin_título2.png', 2147483647, '2018-07-09', 60, 48, '2018-10-08'),
(16, '000032', 'Sin_título3.png', 2147483647, '2018-07-09', 60, 48, '2018-10-08');

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
(40, '000014', 'Fotocopia de CI', 'asd.png', '2018-08-31'),
(41, '000014', 'Comprobante de pago', '450_10005.jpg', '2018-08-31'),
(42, '000015', 'Fotocopia de CI', '24-07-247.png', '2018-08-31'),
(43, '000015', 'Comprobante de pago', '8044770361.jpg', '2018-08-31'),
(44, '000016', 'Fotocopia de CI', 'coti-add-car6.png', '2018-09-02'),
(45, '000016', 'Comprobante de pago', 'destinos.png', '2018-09-02'),
(46, '000017', 'Comprobante de Inscripcion', 'coti-add-clien3.png', '2018-09-03'),
(47, '000018', 'Fotocopia de CI', 'coti-add-car7.png', '2018-09-07'),
(48, '000018', 'Comprobante de pago', 'coti-add-clien4.png', '2018-09-07'),
(55, '000019', 'Fotocopia de CI', 'arrays-controller1.png', '2018-09-09'),
(56, '000019', 'Comprobante de pago', 'modelo.jpg', '2018-09-09'),
(57, '000020', 'Fotocopia de CI', 'actualizar.png', '2018-09-09'),
(58, '000020', 'Comprobante de pago', 'culminacion.png', '2018-09-09'),
(59, '000021', 'Fotocopia de CI', 'cabec.png', '2018-09-09'),
(60, '000021', 'Comprobante de pago', 'posicion_rango.png', '2018-09-09'),
(61, '000023', 'Fotocopia de CI', 'culminacion1.png', '2018-09-09'),
(62, '000023', 'Comprobante de pago', 'menu_admin.png', '2018-09-09'),
(63, '000024', 'Fotocopia de CI', 'arrays-controller2.png', '2018-09-17'),
(64, '000024', 'Comprobante de pago', 'coti-add-car8.png', '2018-09-17'),
(65, '000024', 'Comprobante de inscripcion', 'cotizacion_full.png', '2018-09-17'),
(66, '000024', 'Macur', 'ftp3.png', '2018-09-17'),
(68, '000026', 'Fotocopia de CI', 'tipo-carro-select.png', '2018-09-18'),
(69, '000026', 'Comprobante de pago', 'coti-add-clien5.png', '2018-09-18'),
(70, '000026', 'Partida de nacimiento', 'coti-add-car9.png', '2018-09-18'),
(71, '000026', 'Titulo obtenido', 'Sin_título.png', '2018-09-18'),
(72, '000025', 'Macur', 'precios-porruta.png', '2018-09-18'),
(73, '000026', 'Notas certificadas', 'coti-add-clien6.png', '2018-09-19'),
(74, '000026', 'Constancia de buena conducta', 'cotizacion_full1.png', '2018-09-19'),
(75, '000026', 'Copia del carnet militar', 'coti-add-car10.png', '2018-09-19'),
(76, '000027', 'Fotocopia de CI', 'arrays-controller3.png', '2018-09-20'),
(77, '000027', 'Comprobante de pago', 'coti-add-car11.png', '2018-09-20'),
(78, '000027', 'Partida de nacimiento', 'coti-add-clien7.png', '2018-09-20'),
(79, '000027', 'Titulo de bachiller', 'cotizacion_full2.png', '2018-09-20'),
(80, '000027', 'Macur', 'Sin_título1.png', '2018-09-20'),
(82, '000028', 'Constancia de culminacion', 'cotizacion_full3.png', '2018-09-26'),
(83, '000029', 'Fotocopia de CI', 'coti-add-clien8.png', '2018-09-26'),
(84, '000029', 'Comprobante de pago', 'coti-add-clien9.png', '2018-09-26'),
(85, '000030', 'Comprobante de pago', 'conductores.png', '2018-10-04'),
(86, '000030', 'Titulo obtenido', 'opcion.png', '2018-10-04'),
(87, '000030', 'Notas certificadas', 'new_socio.png', '2018-10-04'),
(88, '000030', 'Fotocopia de la CI', 'clientes.png', '2018-10-04'),
(89, '000030', 'Copia del carnet militar', 'add_chofer.png', '2018-10-04'),
(90, '000030', 'Partida de nacimiento', 'socio.png', '2002-01-01'),
(91, '000030', 'Constancia de buena conducta', 'new_socio1.png', '2002-01-01'),
(92, '000031', 'Fotocopia de CI', 'arrays-controller4.png', '2018-10-08'),
(93, '000031', 'Comprobante de pago', 'Sin_título2.png', '2018-10-08'),
(94, '000032', 'Fotocopia de CI', 'cotizacion_full4.png', '2018-10-08'),
(95, '000032', 'Comprobante de pago', 'Sin_título3.png', '2018-10-08'),
(96, '000033', 'Comprobante de Inscripcion', 'becky_rela.png', '2018-10-20'),
(97, '000040', 'Comprobante de inscripcion', '450_10003.jpg', '2018-10-21'),
(99, '000040', 'Comprobante de pago', '4249-20180306081706.jpg', '2018-10-21'),
(100, '000040', 'Pensum', '804477036.jpg', '2018-10-21'),
(101, '000042', 'Pensum', 'add_chofer.png', '2018-10-22'),
(102, '000042', 'Comprobante de inscripcion', 'ingreso.png', '2018-10-22'),
(103, '000042', 'Comprobante de pago', 'ingreso1.png', '2018-10-22'),
(107, '000043', 'Comprobante de Inscripcion', 'Koala.jpg', '2018-10-23'),
(108, '000044', 'Pensum', 'FICHA_Roiman_Ramirez.docx', '2018-10-25'),
(109, '000044', 'Comprobante de inscripcion', 'FICHA_TECNICA_-_copia.docx', '2018-10-25'),
(110, '000044', 'Comprobante de pago', '4285600256_80a93e2d06_b.jpg', '2018-10-25'),
(111, '000044', 'Comprobante de inscripción', 'Desert2.jpg', '2020-05-26');

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
('j-31149554-1', 'Manta Sport Wear, C.A', 'Av. Josefa Camejo con Calle Zamora', '0269-2442156'),
('j-40322312455-7', 'Beckend Software', 'Av. General Pelayo CC Caribean', '+584126660678'),
('j-403223173-7', 'Urban Jazz', 'Av. General Pelayo CC Caribean', '+584126660678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id` int(10) NOT NULL,
  `id_modificacion` int(10) NOT NULL,
  `justificacion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `justificaciones`
--

INSERT INTO `justificaciones` (`id`, `id_modificacion`, `justificacion`) VALUES
(4, 7, 'esta lloviendo afuera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `cod_materia` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_materia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `horas_semanales` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `semestre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`cod_materia`, `nombre_materia`, `horas_semanales`, `semestre`, `tipo`, `estado`) VALUES
('900110', 'castellano i', '4', '1', 'obligatoria', 1),
('911001', 'matematica i', '8', '1', 'obligatoria', 0),
('961601', 'programacion i', '6', '1', 'obligatoria', 1),
('961610', 'analisis numerico', '6', '5', 'obligatoria', 1),
('961611', 'teoria de la computacion', '4', '5', 'obligatoria', 1),
('961612', 'ingenieria del software', '4', '5', 'obligatoria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_solicitud`
--

CREATE TABLE `mensaje_solicitud` (
  `cod_is` int(100) NOT NULL,
  `descrip_is` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_is` date NOT NULL,
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensaje_solicitud`
--

INSERT INTO `mensaje_solicitud` (`cod_is`, `descrip_is`, `fecha_is`, `num_solicitud`, `estado`) VALUES
(1, 'No cargo los documentos.', '2018-10-24', '000001', 1),
(2, 'No subio el archivo correcto.', '2018-10-24', '000033', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion`
--

CREATE TABLE `modificacion` (
  `cod_modificacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modificacion`
--

INSERT INTO `modificacion` (`cod_modificacion`, `fecha_inicio`, `fecha_fin`, `periodo`, `estado`) VALUES
('mod-i-2018', '2018-10-19', '2018-10-26', 'i-2018', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_materias`
--

CREATE TABLE `modificacion_materias` (
  `id` int(10) NOT NULL,
  `id_modificacion` int(10) NOT NULL,
  `cod_materia` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `condicion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `respuesta_sol` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modificacion_materias`
--

INSERT INTO `modificacion_materias` (`id`, `id_modificacion`, `cod_materia`, `condicion`, `tipo`, `respuesta`, `respuesta_sol`) VALUES
(8, 7, '900110', 'Choque de horas', 'inscribir', 'aprobada', 'Aprobada por buen rendimiento.'),
(9, 7, '961601', 'Choque de horas', 'inscribir', 'rechazada', 'exceso de horas.'),
(10, 7, '961612', 'retiro', 'retirar', 'rechazada', 'no se puede retirar la materia, por matricula.'),
(11, 7, '961611', 'retiro', 'retirar', 'Diferido', 'Comuniquese con su coordinador.');

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
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id` int(10) NOT NULL,
  `nom_periodo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cod_periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_periodo` date NOT NULL,
  `fin_periodo` date NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id`, `nom_periodo`, `cod_periodo`, `inicio_periodo`, `fin_periodo`, `estado`) VALUES
(1, 'primero 2018', 'i-2018', '2018-01-13', '2018-06-12', 1),
(2, 'Primero 2013', 'i-2013', '2013-02-02', '2013-08-02', 0);

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
(1, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_equivalencias`
--

CREATE TABLE `solicitud_equivalencias` (
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_solicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grado` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `year_grado` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `institucion_grado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pais_grado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_grado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_institucion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `year` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_proceso` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_equivalencias`
--

INSERT INTO `solicitud_equivalencias` (`num_solicitud`, `tipo_solicitud`, `fecha_solicitud`, `ci_solicitante`, `estatus_solicitud`, `grado`, `year_grado`, `institucion_grado`, `pais_grado`, `estado_grado`, `tipo_institucion`, `periodo`, `year`, `fecha_proceso`, `estado`) VALUES
('000026', 6, '2018-09-19', '25605209', 'En espera', 'Licenciado en Computacion ', '2018', 'La Univeridad del Zulia', 'Venezuela', 'Falcon', 'Publico', 'i-2018', '2018', '0000-00-00', 1),
('000030', 5, '2018-10-04', '25605209', 'En espera', 'Tecnico medio en Comercio', '2014', 'U.E.C Parroquial Punta Cardon', 'Venezuela', 'Falcon', 'Privado', 'i-2018', '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_especiales`
--

CREATE TABLE `solicitud_especiales` (
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_solicitud` int(10) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `estatus_solicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_origen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `year_electivo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_proceso` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_especiales`
--

INSERT INTO `solicitud_especiales` (`num_solicitud`, `tipo_solicitud`, `fecha_solicitud`, `estatus_solicitud`, `ci_solicitante`, `carrera_origen`, `cod_ubicacion`, `periodo`, `year_electivo`, `fecha_proceso`, `estado`) VALUES
('000024', 9, '2018-09-17', 'En espera', '25605209', 'Educacion', '', 'i-2018', '2018', '0000-00-00', 1),
('000025', 9, '2018-09-18', 'En espera', '25605209', 'Computacion', '', 'i-2018', '2018', '0000-00-00', 1),
('000027', 8, '2018-09-24', 'En espera', '25605209', 'Computacion', '', 'i-2018', '2018', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_general`
--

CREATE TABLE `solicitud_general` (
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_solicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `tipo_solicitud` int(10) NOT NULL,
  `fecha_proceso` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_general`
--

INSERT INTO `solicitud_general` (`num_solicitud`, `ci_solicitante`, `estatus_solicitud`, `periodo`, `fecha_solicitud`, `tipo_solicitud`, `fecha_proceso`, `estado`) VALUES
('000001', '25470091', 'Rechazada', 'i-2018', '2018-08-10', 11, '0000-00-00', 1),
('000002', '25470091', 'En espera', 'i-2018', '2018-08-10', 11, '0000-00-00', 1),
('000009', '25470091', 'En espera', 'i-2018', '2018-08-20', 11, '0000-00-00', 1),
('000011', '21155474', 'En espera', 'i-2018', '2018-08-27', 12, '0000-00-00', 1),
('000012', '21155474', 'En espera', 'i-2018', '2018-08-28', 13, '0000-00-00', 1),
('000013', '21155474', 'En espera', 'i-2018', '2018-08-28', 15, '0000-00-00', 1),
('000014', '21155474', 'En espera', 'i-2018', '2018-08-31', 14, '0000-00-00', 1),
('000015', '21155474', 'En espera', 'i-2018', '2018-08-31', 12, '0000-00-00', 1),
('000016', '21155474', 'En espera', 'i-2018', '2018-09-02', 12, '0000-00-00', 1),
('000018', '21155474', 'En espera', 'i-2018', '2018-09-09', 12, '0000-00-00', 1),
('000019', '21155474', 'En espera', 'i-2018', '2018-09-09', 13, '0000-00-00', 1),
('000020', '21155474', 'En espera', 'i-2018', '2018-09-09', 13, '0000-00-00', 1),
('000021', '21155474', 'En espera', 'i-2018', '2018-09-09', 13, '0000-00-00', 1),
('000022', '21155474', 'En espera', 'i-2018', '2018-09-09', 13, '0000-00-00', 1),
('000023', '21155474', 'En espera', 'i-2018', '2018-09-09', 13, '0000-00-00', 1),
('000028', '25470091', 'En espera', 'i-2018', '2018-09-26', 11, '0000-00-00', 1),
('000029', '21155474', 'En espera', 'i-2018', '2018-09-26', 12, '0000-00-00', 1),
('000031', '21155474', 'En espera', 'i-2018', '2018-10-08', 12, '0000-00-00', 1),
('000032', '21155474', 'En espera', 'i-2018', '2018-10-08', 13, '0000-00-00', 1),
('000044', '21156441', '', 'i-2018', '2020-05-26', 11, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_modificacion`
--

CREATE TABLE `solicitud_modificacion` (
  `id` int(10) NOT NULL,
  `num_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ci_solicitante` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `estatus_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `tipo_solicitud` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `cod_modificacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_proceso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_modificacion`
--

INSERT INTO `solicitud_modificacion` (`id`, `num_solicitud`, `ci_solicitante`, `estatus_solicitud`, `fecha_solicitud`, `tipo_solicitud`, `estado`, `cod_modificacion`, `fecha_proceso`) VALUES
(7, '000042', '25470091', 'Procesada', '2018-10-22', 16, 1, 'mod-i-2018', '2018-10-24');

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
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_proceso` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud_postulacion`
--

INSERT INTO `solicitud_postulacion` (`ci_solicitante`, `fecha_solicitud`, `num_solicitud`, `cod_tipo_solicitud`, `estado_solicitud`, `rif_empresa`, `ci_asesor`, `periodo`, `fecha_proceso`, `estado`) VALUES
('25470091', '2018-10-20', '000033', 10, 'Rechazada', 'j-30911469-7', '13177251', 'i-2018', '0000-00-00', 1),
('10614067', '2018-10-23', '000043', 10, 'En espera', 'j-30911469-7', '13177251', 'i-2018', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `cod_tipo_solicitud` int(11) NOT NULL,
  `nombre_solicitud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(15) NOT NULL,
  `cod_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`cod_tipo_solicitud`, `nombre_solicitud`, `cantidad`, `valor`, `cod_tipo_usuario`) VALUES
(5, 'equivalencias no egresados', '1', 30, 4),
(6, 'equivalencias egresados', '0', 30, 4),
(7, 'traslado', '1', 20, 4),
(8, 'reincorporacion', '2', 16, 4),
(9, 'Cambio de carrera', '1', 16, 4),
(10, 'Carta de postulacion de pasantia', '11', 0, 2),
(11, 'Constancia de culminacion de materias', '7', 0, 2),
(12, 'Carta de posicion y rango', '11', 12, 3),
(13, 'Carta de modalidad', '7', 12, 3),
(14, 'Certificacion de programas', '1', 0, 3),
(15, 'Certificacion de pensum', '1', 0, 3),
(16, 'Modificacion de inscripcion', '10', 30, 2);

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
(4, 'Usuario-Especial', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_tipo_usuario` int(10) NOT NULL,
  `ci_usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nom_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ape_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
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

INSERT INTO `usuarios` (`cod_tipo_usuario`, `ci_usuario`, `nom_usuario`, `ape_usuario`, `correo_usuario`, `password`, `token`, `request_token`, `created_at`, `estado`) VALUES
(2, '10614067', 'Omaira', 'Padilla', 'orrsm@gmail.com', '10614067', '980178a12e29d36eb6d59d0b359f81f07ac45600', '2018-10-10 11:46:23', '2018-09-11 04:30:00', 1),
(3, '10969461', 'Emiro ', 'Acosta', 'emirojesus@gmail.com', '10969461', '45c618cfd2310b71b54379f1439888676332c1aa', '2018-10-25 14:52:49', '2018-10-25 04:00:00', 0),
(3, '123456', 'fefe', 'ñoño', 'fefenono_@gmail.com', '258258', 'f084b39d445eb915b1aa15cc9dd57d8a437ada7f', '2020-05-28 05:56:47', '2020-05-28 04:00:00', 0),
(4, '19130950', 'Roiman', 'Ramirez', 'roiman_j@gmail.com', '19130950', 'b106572a11f81fd79138cdd8758fe436623bd858', '2018-10-25 14:46:22', '2018-10-25 04:00:00', 0),
(3, '21155474', 'Wilson', 'Henriquezi', 'pipo_majo@gmail.com', '21155474', '247f26003293ce6179ad7dda9eb0a9eadcc273f7', '2018-10-10 11:46:11', '2018-07-22 04:00:00', 1),
(2, '21156441', 'ANDRES', 'ZEA', 'andreas@gmail.com', '21156441', '92cfd5597b5473620e7bf0666320654faa2dd38e', '2020-05-26 06:05:48', '2018-10-25 04:00:00', 1),
(1, '24426616', 'Berquismaria', 'Sanchez', 'berquissanchezu@gmail.com', '24426616', 'b2aa901e589bfa6cbc66d25c03bcd27428918781', '2018-10-10 11:45:57', '2018-07-22 04:00:00', 1),
(2, '24426617', 'Elliemaria', 'Sanchez', 'elliepincho@gmail.com', '24426617', '5534a9da42f7f9bd16c2a10157328ac4d5d4e95d', '2018-10-25 07:26:46', '2018-10-25 04:00:00', 0),
(2, '25470091', 'Enderson', 'Acosta', 'endersona24@gmail.com', '25470091', '04960037f8da361b42b4dfbc63d7be95241674e4', '2018-10-10 11:42:09', '2018-07-22 01:52:23', 1),
(4, '25605209', 'Wigson', 'Henriquez', 'wigsonghm@gmail.com', '25605209', 'ef75bbe30a3f95c58d49a9ddf1c81244ef15d89a', '2018-10-10 11:45:46', '2018-09-11 04:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_data`
--

CREATE TABLE `usuario_data` (
  `id` int(20) NOT NULL,
  `ci_usuario` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pri_nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sec_nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pri_apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sec_apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_movil` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_fijo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `periodo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_data`
--

INSERT INTO `usuario_data` (`id`, `ci_usuario`, `pri_nombre`, `sec_nombre`, `pri_apellido`, `sec_apellido`, `sexo`, `telefono_movil`, `telefono_fijo`, `direccion`, `correo_usuario`, `fecha_nacimiento`, `periodo`, `titulo`) VALUES
(4, '10614067', 'Omaira', 'Josefina', 'Padilla', 'Molina', 'Femenino', '123456', '123456', 'calle bolivar #9', 'orrsm@gmail.com', '2018-11-09', 'primero 2018', 'Constancia_de_Residencia.pdf'),
(9, '10969461', 'Emiro ', 'Jesus', 'Acosta', 'Acosta', 'Masculino', '04129690099', '2463919', 'calle bolivar #36', 'emirojesus@gmail.com', '1988-01-01', 'i-2013', 'Rif.pdf'),
(10, '123456', 'fefe', '', 'ñoño', '', '', '', '', '', 'fefenono_@gmail.com', '0000-00-00', 'primero 2013', ''),
(8, '19130950', 'Roiman', '', 'Ramirez', '', '', '', '', '', 'roiman_j@gmail.com', '0000-00-00', '', ''),
(3, '21155474', 'Wilson', 'Gregorio', 'Henriquez', 'Manaure', 'Masculino', '123123', '123123', 'colombia hombe', 'pipox_majo@hotmail.com', '2018-05-18', 'Segundo', ''),
(7, '21156441', 'Andres', 'Jesus', 'Zea', 'Alvarez', 'Masculino', '920146256', '266302', 'calle mariño c/ arismendy', 'andreas@gmail.com', '1996-05-25', 'i-2018', ''),
(2, '24426616', 'Berquismaria', '--', 'Sanchez', 'Urbina', 'Femenino', '0414-360-2180', '0414-360-2180', 'Judibana Calle 17-A Oeste Urb. Adaro', 'berquissanchezu@gmail.com', '1994-05-23', 'Primero', ''),
(6, '24426617', 'Elliemaria', '', 'Sanchez', '', '', '', '', '', 'elliepincho@gmail.com', '0000-00-00', 'i-2018', ''),
(1, '25470091', 'Enderson', 'Smith', 'Acosta', 'Floriz', 'Masculino', '920146256', '04143602180', 'calle bolivar #9', 'endersona24@gmail.com', '1994-07-24', '2013', 'recaudos-cuenta-corriente-personas.pdf'),
(5, '25605209', 'Wigson', 'Gregorio', 'Henriquez', 'Manaure', 'Masculino', '04127683456', '04127683456', 'callejon padilla #3', 'wigsonghm@gmail.com', '1998-09-24', '', '');

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
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`cod_materia`);

--
-- Indices de la tabla `mensaje_solicitud`
--
ALTER TABLE `mensaje_solicitud`
  ADD PRIMARY KEY (`cod_is`);

--
-- Indices de la tabla `modificacion`
--
ALTER TABLE `modificacion`
  ADD UNIQUE KEY `cod_modifiacion` (`cod_modificacion`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `modificacion_materias`
--
ALTER TABLE `modificacion_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modifiacion` (`id_modificacion`),
  ADD KEY `cod_materia` (`cod_materia`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_periodo_2` (`cod_periodo`),
  ADD KEY `cod_periodo` (`cod_periodo`);

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
-- Indices de la tabla `solicitud_equivalencias`
--
ALTER TABLE `solicitud_equivalencias`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`),
  ADD KEY `cod_tipo_solicitud` (`tipo_solicitud`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `solicitud_especiales`
--
ALTER TABLE `solicitud_especiales`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`),
  ADD KEY `tipo_solicitud` (`tipo_solicitud`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`,`tipo_solicitud`),
  ADD KEY `fk_solicitud_tipo` (`tipo_solicitud`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `solicitud_modificacion`
--
ALTER TABLE `solicitud_modificacion`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `id` (`id`),
  ADD KEY `cod_modificacion` (`cod_modificacion`),
  ADD KEY `tipo_solicitud` (`tipo_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`);

--
-- Indices de la tabla `solicitud_postulacion`
--
ALTER TABLE `solicitud_postulacion`
  ADD PRIMARY KEY (`num_solicitud`),
  ADD KEY `cod_tipo_solicitud` (`cod_tipo_solicitud`),
  ADD KEY `ci_solicitante` (`ci_solicitante`),
  ADD KEY `rif_empresa` (`rif_empresa`),
  ADD KEY `ci_asesor` (`ci_asesor`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`cod_tipo_solicitud`),
  ADD KEY `cod_tipo_usuario` (`cod_tipo_usuario`),
  ADD KEY `cod_tipo_usuario_2` (`cod_tipo_usuario`);

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
-- Indices de la tabla `usuario_data`
--
ALTER TABLE `usuario_data`
  ADD PRIMARY KEY (`ci_usuario`),
  ADD KEY `ci_usuario` (`ci_usuario`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `mensaje_solicitud`
--
ALTER TABLE `mensaje_solicitud`
  MODIFY `cod_is` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modificacion_materias`
--
ALTER TABLE `modificacion_materias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `solicitud_modificacion`
--
ALTER TABLE `solicitud_modificacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario_data`
--
ALTER TABLE `usuario_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD CONSTRAINT `fk_asesor_empresa` FOREIGN KEY (`rif_empresa`) REFERENCES `empresas` (`rif`);

--
-- Filtros para la tabla `modificacion`
--
ALTER TABLE `modificacion`
  ADD CONSTRAINT `fk_modificacion_periodo` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`cod_periodo`);

--
-- Filtros para la tabla `modificacion_materias`
--
ALTER TABLE `modificacion_materias`
  ADD CONSTRAINT `fk_materia_materias` FOREIGN KEY (`cod_materia`) REFERENCES `materias` (`cod_materia`),
  ADD CONSTRAINT `fk_modificacion_materia` FOREIGN KEY (`id_modificacion`) REFERENCES `solicitud_modificacion` (`id`);

--
-- Filtros para la tabla `solicitud_equivalencias`
--
ALTER TABLE `solicitud_equivalencias`
  ADD CONSTRAINT `fk_solicitante_equivalencia` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_solicitudeq_periodos` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`cod_periodo`),
  ADD CONSTRAINT `fk_tipo_equivalencia` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `solicitud_especiales`
--
ALTER TABLE `solicitud_especiales`
  ADD CONSTRAINT `fk_solicitante_especial` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_solicitudes_periodos` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`cod_periodo`),
  ADD CONSTRAINT `fk_tipo_especial` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD CONSTRAINT `fk_solicitud_periodos` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`cod_periodo`),
  ADD CONSTRAINT `fk_solicitud_solicitante` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_solicitud_tipo` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `solicitud_modificacion`
--
ALTER TABLE `solicitud_modificacion`
  ADD CONSTRAINT `fk_solicitante_modificacion` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_tipo_modificacion` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`);

--
-- Filtros para la tabla `solicitud_postulacion`
--
ALTER TABLE `solicitud_postulacion`
  ADD CONSTRAINT `fk_postulaciion_asesor` FOREIGN KEY (`ci_asesor`) REFERENCES `asesor_empresarial` (`ci_asesor`),
  ADD CONSTRAINT `fk_postulaciion_empresa` FOREIGN KEY (`rif_empresa`) REFERENCES `empresas` (`rif`),
  ADD CONSTRAINT `fk_postulacion_solicitante` FOREIGN KEY (`ci_solicitante`) REFERENCES `usuarios` (`ci_usuario`),
  ADD CONSTRAINT `fk_potulacion_tipo_solicitud` FOREIGN KEY (`cod_tipo_solicitud`) REFERENCES `tipo_solicitud` (`cod_tipo_solicitud`),
  ADD CONSTRAINT `fk_solicitud_periodo` FOREIGN KEY (`periodo`) REFERENCES `periodos` (`cod_periodo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_tipo_usuario`) REFERENCES `tipo_usuario` (`cod_tipo_usuario`);

--
-- Filtros para la tabla `usuario_data`
--
ALTER TABLE `usuario_data`
  ADD CONSTRAINT `usuario_ibfk_usuario` FOREIGN KEY (`ci_usuario`) REFERENCES `usuarios` (`ci_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
