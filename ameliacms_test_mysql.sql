-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2017 a las 08:25:17
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7
CREATE TABLE `acms_tcontact` (
  `idcontact` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `message` text COLLATE utf8_spanish_ci NOT NULL,
  `iduser` int(11) NOT NULL,
  `response` text COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--

INSERT INTO `acms_tdcharge_service_action` (`idcharge_service_action`, `idcharge`, `idservice`, `idaction`) VALUES
(6588, 1, 28, 2),
(6589, 1, 28, 3),
(6590, 1, 28, 4),
(6591, 1, 23, 1),
(6592, 1, 23, 2),
(6593, 1, 23, 3),
(6594, 1, 23, 4),
(6595, 1, 23, 5),
(6596, 1, 23, 7),
(6597, 1, 32, 1),
(6598, 1, 33, 1),
(6599, 1, 33, 2),
(6600, 1, 33, 3),
(6601, 1, 33, 4),
(6602, 1, 33, 5),
(6603, 1, 33, 7),
(6604, 1, 34, 1),
(6605, 1, 34, 2),
(6606, 1, 34, 3),
(6607, 1, 34, 4),
(6608, 1, 34, 5),
(6609, 1, 34, 7),
(6610, 1, 24, 1),
(6611, 1, 24, 2),
(6612, 1, 24, 3),
(6613, 1, 24, 4),
(6614, 1, 24, 5),
(6615, 1, 24, 7),
(6616, 1, 29, 2),
(6617, 1, 29, 3),
(6618, 1, 27, 1),
(6619, 1, 27, 2),
(6620, 1, 27, 3),
(6621, 1, 27, 7),
(6622, 1, 22, 1),
(6623, 1, 22, 2),
(6624, 1, 22, 3),
(6625, 1, 22, 4),
(6626, 1, 22, 5),
(6627, 1, 22, 6),
(6628, 1, 22, 7),
(6629, 1, 30, 1),
(6630, 1, 30, 2),
(6631, 1, 30, 3),
(6632, 1, 30, 4),
(6633, 1, 30, 5),
(6634, 1, 30, 7),
(6635, 1, 13, 1),
(6636, 1, 13, 2),
(6637, 1, 13, 3),
(6638, 1, 13, 4),
(6639, 1, 13, 5),
(6640, 1, 13, 6),
(6641, 1, 13, 7),
(6642, 1, 11, 1),
(6643, 1, 11, 2),
(6644, 1, 11, 3),
(6645, 1, 11, 4),
(6646, 1, 11, 5),
(6647, 1, 11, 6),
(6648, 1, 11, 7),
(6649, 1, 12, 1),
(6650, 1, 12, 2),
(6651, 1, 12, 3),
(6652, 1, 12, 4),
(6653, 1, 12, 5),
(6654, 1, 12, 6),
(6655, 1, 12, 7),
(6656, 1, 10, 1),
(6657, 1, 10, 2),
(6658, 1, 10, 3),
(6659, 1, 10, 4),
(6660, 1, 10, 5),
(6661, 1, 10, 6),
(6662, 1, 10, 7),
(6663, 1, 25, 3),
(6664, 1, 18, 3),
(6665, 1, 18, 6),
(6666, 1, 19, 3),
(6667, 1, 19, 6),
(6668, 1, 17, 3),
(6669, 1, 17, 6),
(6670, 1, 31, 2),
(6671, 1, 31, 3),
(6672, 1, 5, 1),
(6673, 1, 5, 2),
(6674, 1, 5, 3),
(6675, 1, 5, 4),
(6676, 1, 5, 5),
(6677, 1, 5, 6),
(6678, 1, 5, 7),
(6679, 1, 15, 1),
(6680, 1, 15, 2),
(6681, 1, 15, 3),
(6682, 1, 15, 4),
(6683, 1, 15, 5),
(6684, 1, 15, 6),
(6685, 1, 15, 7),
(6686, 1, 3, 1),
(6687, 1, 3, 2),
(6688, 1, 3, 3),
(6689, 1, 3, 4),
(6690, 1, 3, 5),
(6691, 1, 3, 7),
(6692, 1, 8, 1),
(6693, 1, 8, 2),
(6694, 1, 8, 3),
(6695, 1, 8, 4),
(6696, 1, 8, 5),
(6697, 1, 8, 7),
(6698, 1, 6, 1),
(6699, 1, 6, 2),
(6700, 1, 6, 3),
(6701, 1, 6, 4),
(6702, 1, 6, 5),
(6703, 1, 6, 6),
(6704, 1, 6, 7),
(6705, 1, 20, 2),
(6706, 1, 20, 3),
(6707, 1, 4, 1),
(6708, 1, 4, 2),
(6709, 1, 4, 3),
(6710, 1, 4, 4),
(6711, 1, 4, 5),
(6712, 1, 4, 6),
(6713, 1, 4, 7),
(6714, 1, 14, 1),
(6715, 1, 14, 2),
(6716, 1, 14, 3),
(6717, 1, 14, 4),
(6718, 1, 14, 5),
(6719, 1, 14, 6),
(6720, 1, 14, 7),
(6721, 1, 2, 1),
(6722, 1, 2, 2),
(6723, 1, 2, 3),
(6724, 1, 2, 4),
(6725, 1, 2, 5),
(6726, 1, 2, 6),
(6727, 1, 2, 7),
(6728, 1, 7, 2),
(6729, 1, 7, 3);

INSERT INTO `acms_tdservice_action` (`idservice_action`, `idservice`, `idaction`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 3, 1),
(9, 3, 2),
(10, 3, 3),
(11, 3, 4),
(12, 3, 5),
(14, 3, 7),
(15, 4, 1),
(16, 4, 2),
(17, 4, 3),
(18, 4, 4),
(19, 4, 5),
(20, 4, 6),
(21, 4, 7),
(122, 6, 1),
(123, 6, 2),
(124, 6, 3),
(125, 6, 4),
(126, 6, 5),
(127, 6, 6),
(128, 6, 7),
(129, 5, 1),
(130, 5, 2),
(131, 5, 3),
(132, 5, 4),
(133, 5, 5),
(134, 5, 6),
(135, 5, 7),
(136, 7, 2),
(137, 7, 3),
(138, 8, 1),
(139, 8, 2),
(140, 8, 3),
(141, 8, 4),
(142, 8, 5),
(143, 8, 7),
(144, 10, 1),
(145, 10, 2),
(146, 10, 3),
(147, 10, 4),
(148, 10, 5),
(149, 10, 6),
(150, 10, 7),
(151, 11, 1),
(153, 11, 3),
(154, 11, 4),
(155, 11, 5),
(156, 11, 6),
(157, 11, 7),
(158, 11, 2),
(159, 12, 1),
(160, 12, 2),
(161, 12, 3),
(162, 12, 4),
(163, 12, 5),
(164, 12, 6),
(165, 12, 7),
(166, 13, 1),
(167, 13, 2),
(168, 13, 3),
(169, 13, 4),
(170, 13, 5),
(171, 13, 6),
(172, 13, 7),
(174, 14, 2),
(175, 14, 3),
(176, 14, 4),
(177, 14, 5),
(178, 14, 6),
(179, 14, 7),
(180, 15, 1),
(181, 15, 2),
(182, 15, 3),
(183, 15, 4),
(184, 15, 5),
(185, 15, 6),
(186, 15, 7),
(190, 17, 3),
(191, 18, 3),
(192, 19, 3),
(195, 14, 1),
(196, 20, 2),
(197, 20, 3),
(198, 22, 1),
(199, 22, 2),
(200, 22, 3),
(201, 22, 4),
(202, 22, 5),
(203, 22, 6),
(204, 22, 7),
(205, 23, 1),
(206, 23, 2),
(207, 23, 3),
(208, 23, 4),
(209, 23, 5),
(211, 23, 7),
(212, 24, 1),
(213, 24, 2),
(214, 24, 3),
(215, 24, 4),
(216, 24, 5),
(218, 24, 7),
(219, 25, 3),
(220, 26, 2),
(221, 26, 3),
(222, 27, 1),
(223, 27, 3),
(224, 27, 7),
(225, 27, 2),
(226, 19, 6),
(227, 18, 6),
(228, 17, 6),
(229, 28, 2),
(230, 28, 3),
(231, 29, 2),
(232, 29, 3),
(233, 30, 1),
(234, 30, 2),
(235, 30, 3),
(236, 30, 4),
(237, 30, 5),
(238, 30, 7),
(239, 31, 2),
(240, 31, 3),
(241, 28, 4),
(243, 32, 1),
(244, 33, 1),
(245, 33, 2),
(246, 33, 3),
(248, 33, 7),
(249, 34, 1),
(250, 34, 2),
(251, 34, 3),
(252, 34, 4),
(253, 34, 5),
(254, 34, 7),
(255, 33, 5),
(256, 33, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_tdslider`
--

CREATE TABLE `acms_tdslider` (
  `iddslider` int(11) NOT NULL,
  `idslider` int(11) NOT NULL,
  `idgallery` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `idpage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acms_tdslider`
--

INSERT INTO `acms_tdslider` (`iddslider`, `idslider`, `idgallery`, `title`, `description`, `idpage`) VALUES
(23, 17, 2, '4', '5', 1),
(24, 17, 1, '2', '2', 1),
(25, 17, 2, '1', '3', 1);

-- --------------------------------------------------------

CREATE TABLE `acms_tnotice` (
  `idnotice` int(11) NOT NULL,
  `title` varchar(160) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  `date_created` date NOT NULL,
  `status` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acms_tnotice`
--

INSERT INTO `acms_tnotice` (`idnotice`, `title`, `content`, `url`, `date_created`, `status`) VALUES
(1, 'Hola mundo', 'Nuevo hola mundox', '', '0000-00-00', '1'),
(2, 'dos', 'aasdasd', '', '2017-08-04', '1');


CREATE TABLE `acms_tpage` (
  `idpage` int(11) NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `link` text COLLATE utf8_spanish_ci NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `img` text COLLATE utf8_spanish_ci NOT NULL,
  `idicon` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_spanish_ci NOT NULL,
  `view_main` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `status` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


INSERT INTO `acms_tservice` (`idservice`, `idfather`, `name`, `url`, `idicon`, `color`, `status`) VALUES
(1, 0, 'Seguridad y config.', '', 139, '', '1'),
(2, 1, 'Cargos', 'charge', 591, '', '1'),
(3, 1, 'Acciones', 'action', 108, 'F5F5F5', '1'),
(4, 1, 'Servicios', 'service', 26, '', '1'),
(5, 1, 'Etnias', 'ethnicity', 964, '', '1'),
(6, 1, 'Nacionalidades', 'nationality', 179, '', '1'),
(7, 1, 'Permisos', 'permission', 8, '', '1'),
(8, 1, 'Iconos', 'icon', 8, '', '1'),
(9, 0, 'Localidades', '', 438, '', '1'),
(10, 9, 'Parroquias', 'parish', 327, '', '1'),
(11, 9, 'Municipios', 'municipality', 328, '', '1'),
(12, 9, 'Estados', 'state', 328, '', '1'),
(13, 9, 'Paises', 'country', 328, '', '1'),
(14, 1, 'Personas', 'person', 445, '', '1'),
(15, 1, 'Usuarios', 'user', 445, '', '1'),
(16, 0, 'Reportes', '', 392, '', '1'),
(17, 16, 'Bitacora de acceso', 'log_access', 801, 'F5F5F5', '1'),
(18, 16, 'Bitacora de movimientos', 'log_movement', 803, 'F5F5F5', '1'),
(19, 16, 'Bitacora de reportes', 'log_report', 802, 'F5F5F5', '1'),
(20, 1, 'Organizacion', 'organization', 28, '', '1'),
(21, 0, 'Blog', '', 50, '', '1'),
(22, 21, 'Publicaciones', 'post', 782, '', '1'),
(23, 21, 'Paginas', 'page', 29, 'F5F5F5', '1'),
(24, 32, 'Redes sociales', 'social_network', 848, 'F5F5F5', '1'),
(25, 16, 'Listados', 'list_report', 321, 'F5F5F5', '1'),
(26, 1, 'Configuracion', 'configuration', 124, 'F5F5F5', '0'),
(27, 21, 'Galeria', 'gallery', 327, 'F5F5F5', '1'),
(28, 21, 'Temas', 'theme', 710, 'F5F5F5', '1'),
(29, 21, 'Contacto', 'contact', 7, 'F5F5F5', '1'),
(30, 21, 'Noticias', 'notice', 782, 'F5F5F5', '1'),
(31, 1, 'Editor de codigo', 'codeeditor', 550, 'F5F5F5', '1'),
(32, 21, 'Personalizar', '', 709, 'F5F5F5', '1'),
(33, 32, 'Slider', 'slider', 327, 'F5F5F5', '1'),
(34, 32, 'Servicios', 'servicehome', 851, 'F5F5F5', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_tservicehome`
--

CREATE TABLE `acms_tservicehome` (
  `idservicehome` int(11) NOT NULL,
  `title` varchar(60) CHARACTER SET latin1 NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 NOT NULL,
  `idicon` int(11) NOT NULL,
  `idgallery` int(11) NOT NULL,
  `idpage` int(11) NOT NULL,
  `status` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acms_tservicehome`
--

INSERT INTO `acms_tservicehome` (`idservicehome`, `title`, `description`, `idicon`, `idgallery`, `idpage`, `status`) VALUES
(1, 'Hola mundo', 'Es una descripcion mas larga', 4, 0, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acms_tslider`
--

CREATE TABLE `acms_tslider` (
  `idslider` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `status` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acms_tslider`
--

INSERT INTO `acms_tslider` (`idslider`, `name`, `status`) VALUES
(17, 'nuevoasd', '1');


CREATE TABLE `acms_ttheme_origin` (
  `idtheme_origin` int(11) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `src` text CHARACTER SET latin1 NOT NULL,
  `date_created` date NOT NULL,
  `status` char(1) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acms_ttheme_origin`
--

INSERT INTO `acms_ttheme_origin` (`idtheme_origin`, `name`, `description`, `img`, `src`, `date_created`, `status`) VALUES
(2, 'Basic', 'Simple tema basico', 'img', 'basica.zip', '2017-08-20', '1');--

--
-- Indices de la tabla `acms_taction`
--
ALTER TABLE `acms_taction`
  ADD PRIMARY KEY (`idaction`);

--
-- Indices de la tabla `acms_taddress`
--
ALTER TABLE `acms_taddress`
  ADD PRIMARY KEY (`idaddress`);

--
-- Indices de la tabla `acms_tcharge`
--
ALTER TABLE `acms_tcharge`
  ADD PRIMARY KEY (`idcharge`);

--
-- Indices de la tabla `acms_tcontact`
--
ALTER TABLE `acms_tcontact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Indices de la tabla `acms_tdcharge_service_action`
--
ALTER TABLE `acms_tdcharge_service_action`
  ADD PRIMARY KEY (`idcharge_service_action`),
  ADD KEY `acms_tdcharge_service_action_ibfk_1` (`idcharge`),
  ADD KEY `idservice` (`idservice`),
  ADD KEY `idaction` (`idaction`);

--
-- Indices de la tabla `acms_tdpassword`
--
ALTER TABLE `acms_tdpassword`
  ADD PRIMARY KEY (`idpassword`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `acms_tdquestion_answer`
--
ALTER TABLE `acms_tdquestion_answer`
  ADD PRIMARY KEY (`idquestion_answer`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `acms_tdservice_action`
--
ALTER TABLE `acms_tdservice_action`
  ADD PRIMARY KEY (`idservice_action`),
  ADD KEY `idservice` (`idservice`),
  ADD KEY `idaction` (`idaction`);

--
-- Indices de la tabla `acms_tdslider`
--
ALTER TABLE `acms_tdslider`
  ADD PRIMARY KEY (`iddslider`);

--
-- Indices de la tabla `acms_tduser_service_ordered`
--
ALTER TABLE `acms_tduser_service_ordered`
  ADD PRIMARY KEY (`iduser_service_ordered`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idservice` (`idservice`);

--
-- Indices de la tabla `acms_tethnicity`
--
ALTER TABLE `acms_tethnicity`
  ADD PRIMARY KEY (`idethnicity`);

--
-- Indices de la tabla `acms_tgallery`
--
ALTER TABLE `acms_tgallery`
  ADD PRIMARY KEY (`idgallery`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `acms_ticon`
--
ALTER TABLE `acms_ticon`
  ADD PRIMARY KEY (`idicon`);

--
-- Indices de la tabla `acms_tlog_access`
--
ALTER TABLE `acms_tlog_access`
  ADD PRIMARY KEY (`idlog_access`);

--
-- Indices de la tabla `acms_tlog_movement`
--
ALTER TABLE `acms_tlog_movement`
  ADD PRIMARY KEY (`idlog_movement`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idaction` (`idaction`),
  ADD KEY `idservice` (`idservice`);

--
-- Indices de la tabla `acms_tlog_report`
--
ALTER TABLE `acms_tlog_report`
  ADD PRIMARY KEY (`idlog_report`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `acms_tnationality`
--
ALTER TABLE `acms_tnationality`
  ADD PRIMARY KEY (`idnationality`);

--
-- Indices de la tabla `acms_tnotice`
--
ALTER TABLE `acms_tnotice`
  ADD PRIMARY KEY (`idnotice`);

--
-- Indices de la tabla `acms_tpage`
--
ALTER TABLE `acms_tpage`
  ADD PRIMARY KEY (`idpage`),
  ADD KEY `idicon` (`idicon`);

--
-- Indices de la tabla `acms_tperson`
--
ALTER TABLE `acms_tperson`
  ADD PRIMARY KEY (`idperson`),
  ADD KEY `idnationality` (`idnationality`),
  ADD KEY `idethnicity` (`idethnicity`),
  ADD KEY `idcharge` (`idcharge`),
  ADD KEY `idaddress` (`idaddress`);

--
-- Indices de la tabla `acms_tpost`
--
ALTER TABLE `acms_tpost`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `iduser` (`iduser`);

--
-- Indices de la tabla `acms_tservice`
--
ALTER TABLE `acms_tservice`
  ADD PRIMARY KEY (`idservice`),
  ADD KEY `idicon` (`idicon`);

--
-- Indices de la tabla `acms_tservicehome`
--
ALTER TABLE `acms_tservicehome`
  ADD PRIMARY KEY (`idservicehome`);

--
-- Indices de la tabla `acms_tslider`
--
ALTER TABLE `acms_tslider`
  ADD PRIMARY KEY (`idslider`);

--
-- Indices de la tabla `acms_tsocial_network`
--
ALTER TABLE `acms_tsocial_network`
  ADD PRIMARY KEY (`idsocial_network`),
  ADD KEY `idicon` (`idicon`);

--
-- Indices de la tabla `acms_ttheme`
--
ALTER TABLE `acms_ttheme`
  ADD PRIMARY KEY (`idtheme`);

--
-- Indices de la tabla `acms_ttheme_origin`
--
ALTER TABLE `acms_ttheme_origin`
  ADD PRIMARY KEY (`idtheme_origin`);

--
-- Indices de la tabla `acms_tuser`
--
ALTER TABLE `acms_tuser`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idperson` (`idperson`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acms_taction`
--
ALTER TABLE `acms_taction`
  MODIFY `idaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `acms_taddress`
--
ALTER TABLE `acms_taddress`
  MODIFY `idaddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1503;
--
-- AUTO_INCREMENT de la tabla `acms_tcharge`
--
ALTER TABLE `acms_tcharge`
  MODIFY `idcharge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tcontact`
--
ALTER TABLE `acms_tcontact`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `acms_tdcharge_service_action`
--
ALTER TABLE `acms_tdcharge_service_action`
  MODIFY `idcharge_service_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6730;
--
-- AUTO_INCREMENT de la tabla `acms_tdpassword`
--
ALTER TABLE `acms_tdpassword`
  MODIFY `idpassword` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tdquestion_answer`
--
ALTER TABLE `acms_tdquestion_answer`
  MODIFY `idquestion_answer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `acms_tdservice_action`
--
ALTER TABLE `acms_tdservice_action`
  MODIFY `idservice_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT de la tabla `acms_tdslider`
--
ALTER TABLE `acms_tdslider`
  MODIFY `iddslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `acms_tduser_service_ordered`
--
ALTER TABLE `acms_tduser_service_ordered`
  MODIFY `iduser_service_ordered` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `acms_tethnicity`
--
ALTER TABLE `acms_tethnicity`
  MODIFY `idethnicity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `acms_tgallery`
--
ALTER TABLE `acms_tgallery`
  MODIFY `idgallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `acms_ticon`
--
ALTER TABLE `acms_ticon`
  MODIFY `idicon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;
--
-- AUTO_INCREMENT de la tabla `acms_tlog_access`
--
ALTER TABLE `acms_tlog_access`
  MODIFY `idlog_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `acms_tlog_movement`
--
ALTER TABLE `acms_tlog_movement`
  MODIFY `idlog_movement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1035;
--
-- AUTO_INCREMENT de la tabla `acms_tlog_report`
--
ALTER TABLE `acms_tlog_report`
  MODIFY `idlog_report` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `acms_tnationality`
--
ALTER TABLE `acms_tnationality`
  MODIFY `idnationality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tnotice`
--
ALTER TABLE `acms_tnotice`
  MODIFY `idnotice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `acms_tpage`
--
ALTER TABLE `acms_tpage`
  MODIFY `idpage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tperson`
--
ALTER TABLE `acms_tperson`
  MODIFY `idperson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tpost`
--
ALTER TABLE `acms_tpost`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tservice`
--
ALTER TABLE `acms_tservice`
  MODIFY `idservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `acms_tservicehome`
--
ALTER TABLE `acms_tservicehome`
  MODIFY `idservicehome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acms_tslider`
--
ALTER TABLE `acms_tslider`
  MODIFY `idslider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `acms_tsocial_network`
--
ALTER TABLE `acms_tsocial_network`
  MODIFY `idsocial_network` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `acms_ttheme`
--
ALTER TABLE `acms_ttheme`
  MODIFY `idtheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `acms_ttheme_origin`
--
ALTER TABLE `acms_ttheme_origin`
  MODIFY `idtheme_origin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `acms_tuser`
--
ALTER TABLE `acms_tuser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
