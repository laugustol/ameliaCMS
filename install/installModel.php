<?php
namespace install;
class installModel{
	private $db;
	public $prefix,$db_name_test,$db_name_production,$user,$email,$password;
	public function __construct(){
		$this->db = new \core\ameliaBD;
		ini_set("max_execution_time","600");
	}
	private function encrypter($pass){
		$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')),0, 22);
		$salt = strtr($salt, array('+'=>'.'));
		$hash = crypt($pass,'$2y$10$'.$salt);
		return $hash;
	}
	public function mysql(){
		$sql ="SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';

CREATE TABLE ".$this->prefix."taction (
  idaction int(11) NOT NULL,
  name varchar(15) NOT NULL,
  function int(11) NOT NULL,
  idicon int(11) NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."taction (idaction, name, function, idicon, status) VALUES
(1, 'Agregar', 1, 2, '1'),
(2, 'Editar', 2, 71, '1'),
(3, 'Consultar', 3, 11, '1'),
(4, 'Activar', 4, 20, '1'),
(5, 'Desactivar', 5, 21, '1'),
(6, 'Generar', 6, 1, '1'),
(7, 'Eliminar', 7, 27, '1');

CREATE TABLE ".$this->prefix."tcontact (
  idcontact int(11) NOT NULL,
  name varchar(25) NOT NULL,
  email varchar(60) NOT NULL,
  phone varchar(20) NOT NULL,
  message text NOT NULL,
  iduser int(11) NOT NULL,
  response text NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."taddress (
  idaddress int(11) NOT NULL,
  idfather int(11) NOT NULL,
  name varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  status char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."taddress (idaddress, idfather, name, status) VALUES
(1, 0, 'VENEZUELA', '1'),
(2, 1, 'DTTO. CAPITAL', '1'),
(3, 1, 'ANZOATEGUI', '1'),
(4, 1, 'APURE', '1'),
(5, 1, 'ARAGUA', '1'),
(6, 1, 'BARINAS', '1'),
(7, 1, 'BOLIVAR', '1'),
(8, 1, 'CARABOBO', '1'),
(9, 1, 'COJEDES', '1'),
(10, 1, 'FALCON', '1'),
(11, 1, 'GUARICO', '1'),
(12, 1, 'LARA', '1'),
(13, 1, 'MERIDA', '1'),
(14, 1, 'MIRANDA', '1'),
(15, 1, 'MONAGAS', '1'),
(16, 1, 'NUEVA ESPARTA', '1'),
(17, 1, 'PORTUGUESA', '1'),
(18, 1, 'SUCRE', '1'),
(19, 1, 'TACHIRA', '1'),
(20, 1, 'TRUJILLO', '1'),
(21, 1, 'YARACUY', '1'),
(22, 1, 'ZULIA', '1'),
(23, 1, 'AMAZONAS', '1'),
(24, 1, 'DELTA AMACURO', '1'),
(25, 1, 'VARGAS', '1'),
(26, 2, 'LIBERTADOR', '1'),
(27, 3, 'ANACO', '1'),
(28, 3, 'ARAGUA', '1'),
(29, 3, 'BOLIVAR', '1'),
(30, 3, 'BRUZUAL', '1'),
(31, 3, 'CAJIGAL', '1'),
(32, 3, 'FREITES', '1'),
(33, 3, 'INDEPENDENCIA', '1'),
(34, 3, 'LIBERTAD', '1'),
(35, 3, 'MIRANDA', '1'),
(36, 3, 'MONAGAS', '1'),
(37, 3, 'PEÑALVER', '1'),
(38, 3, 'SIMON RODRIGUEZ', '1'),
(39, 3, 'SOTILLO', '1'),
(40, 3, 'GUANIPA', '1'),
(41, 3, 'GUANTA', '1'),
(42, 3, 'PIRITU', '1'),
(43, 3, 'M.L/DIEGO BAUTISTA U', '1'),
(44, 3, 'CARVAJAL', '1'),
(45, 3, 'SANTA ANA', '1'),
(46, 3, 'MC GREGOR', '1'),
(47, 3, 'S JUAN CAPISTRANO', '1'),
(48, 4, 'ACHAGUAS', '1'),
(49, 4, 'MUÑOZ', '1'),
(50, 4, 'PAEZ', '1'),
(51, 4, 'PEDRO CAMEJO', '1'),
(52, 4, 'ROMULO GALLEGOS', '1'),
(53, 4, 'SAN FERNANDO', '1'),
(54, 4, 'BIRUACA', '1'),
(55, 5, 'GIRARDOT', '1'),
(56, 5, 'SANTIAGO MARIÑO', '1'),
(57, 5, 'JOSE FELIX RIVAS', '1'),
(58, 5, 'SAN CASIMIRO', '1'),
(59, 5, 'SAN SEBASTIAN', '1'),
(60, 5, 'SUCRE', '1'),
(61, 5, 'URDANETA', '1'),
(62, 5, 'ZAMORA', '1'),
(63, 5, 'LIBERTADOR', '1'),
(64, 5, 'JOSE ANGEL LAMAS', '1'),
(65, 5, 'BOLIVAR', '1'),
(66, 5, 'SANTOS MICHELENA', '1'),
(67, 5, 'MARIO B IRAGORRY', '1'),
(68, 5, 'TOVAR', '1'),
(69, 5, 'CAMATAGUA', '1'),
(70, 5, 'JOSE R REVENGA', '1'),
(71, 5, 'FRANCISCO LINARES A.', '1'),
(72, 5, 'M.OCUMARE D LA COSTA', '1'),
(73, 6, 'ARISMENDI', '1'),
(74, 6, 'BARINAS', '1'),
(75, 6, 'BOLIVAR', '1'),
(76, 6, 'EZEQUIEL ZAMORA', '1'),
(77, 6, 'OBISPOS', '1'),
(78, 6, 'PEDRAZA', '1'),
(79, 6, 'ROJAS', '1'),
(80, 6, 'SOSA', '1'),
(81, 6, 'ALBERTO ARVELO T', '1'),
(82, 6, 'A JOSE DE SUCRE', '1'),
(83, 6, 'CRUZ PAREDES', '1'),
(84, 6, 'ANDRES E. BLANCO', '1'),
(85, 7, 'CARONI', '1'),
(86, 7, 'CEDEÑO', '1'),
(87, 7, 'HERES', '1'),
(88, 7, 'PIAR', '1'),
(89, 7, 'ROSCIO', '1'),
(90, 7, 'SUCRE', '1'),
(91, 7, 'SIFONTES', '1'),
(92, 7, 'RAUL LEONI', '1'),
(93, 7, 'GRAN SABANA', '1'),
(94, 7, 'EL CALLAO', '1'),
(95, 7, 'PADRE PEDRO CHIEN', '1'),
(96, 8, 'BEJUMA', '1'),
(97, 8, 'CARLOS ARVELO', '1'),
(98, 8, 'DIEGO IBARRA', '1'),
(99, 8, 'GUACARA', '1'),
(100, 8, 'MONTALBAN', '1'),
(101, 8, 'JUAN JOSE MORA', '1'),
(102, 8, 'PUERTO CABELLO', '1'),
(103, 8, 'SAN JOAQUIN', '1'),
(104, 8, 'VALENCIA', '1'),
(105, 8, 'MIRANDA', '1'),
(106, 8, 'LOS GUAYOS', '1'),
(107, 8, 'NAGUANAGUA', '1'),
(108, 8, 'SAN DIEGO', '1'),
(109, 8, 'LIBERTADOR', '1'),
(110, 9, 'ANZOATEGUI', '1'),
(111, 9, 'FALCON', '1'),
(112, 9, 'GIRARDOT', '1'),
(113, 9, 'MP PAO SN J BAUTISTA', '1'),
(114, 9, 'RICAURTE', '1'),
(115, 9, 'SAN CARLOS', '1'),
(116, 9, 'TINACO', '1'),
(117, 9, 'LIMA BLANCO', '1'),
(118, 9, 'ROMULO GALLEGOS', '1'),
(119, 10, 'ACOSTA', '1'),
(120, 10, 'BOLIVAR', '1'),
(121, 10, 'BUCHIVACOA', '1'),
(122, 10, 'CARIRUBANA', '1'),
(123, 10, 'COLINA', '1'),
(124, 10, 'DEMOCRACIA', '1'),
(125, 10, 'FALCON', '1'),
(126, 10, 'FEDERACION', '1'),
(127, 10, 'MAUROA', '1'),
(128, 10, 'MIRANDA', '1'),
(129, 10, 'PETIT', '1'),
(130, 10, 'SILVA', '1'),
(131, 10, 'ZAMORA', '1'),
(132, 10, 'DABAJURO', '1'),
(133, 10, 'MONS. ITURRIZA', '1'),
(134, 10, 'LOS TAQUES', '1'),
(135, 10, 'PIRITU', '1'),
(136, 10, 'UNION', '1'),
(137, 10, 'SAN FRANCISCO', '1'),
(138, 10, 'JACURA', '1'),
(139, 10, 'CACIQUE MANAURE', '1'),
(140, 10, 'PALMA SOLA', '1'),
(141, 10, 'SUCRE', '1'),
(142, 10, 'URUMACO', '1'),
(143, 10, 'TOCOPERO', '1'),
(144, 11, 'INFANTE', '1'),
(145, 11, 'MELLADO', '1'),
(146, 11, 'MIRANDA', '1'),
(147, 11, 'MONAGAS', '1'),
(148, 11, 'RIBAS', '1'),
(149, 11, 'ROSCIO', '1'),
(150, 11, 'ZARAZA', '1'),
(151, 11, 'CAMAGUAN', '1'),
(152, 11, 'S JOSE DE GUARIBE', '1'),
(153, 11, 'LAS MERCEDES', '1'),
(154, 11, 'EL SOCORRO', '1'),
(155, 11, 'ORTIZ', '1'),
(156, 11, 'S MARIA DE IPIRE', '1'),
(157, 11, 'CHAGUARAMAS', '1'),
(158, 11, 'SAN GERONIMO DE G', '1'),
(159, 12, 'CRESPO', '1'),
(160, 12, 'IRIBARREN', '1'),
(161, 12, 'JIMENEZ', '1'),
(162, 12, 'MORAN', '1'),
(163, 12, 'PALAVECINO', '1'),
(164, 12, 'TORRES', '1'),
(165, 12, 'URDANETA', '1'),
(166, 12, 'ANDRES E BLANCO', '1'),
(167, 12, 'SIMON PLANAS', '1'),
(168, 13, 'ALBERTO ADRIANI', '1'),
(169, 13, 'ANDRES BELLO', '1'),
(170, 13, 'ARZOBISPO CHACON', '1'),
(171, 13, 'CAMPO ELIAS', '1'),
(172, 13, 'GUARAQUE', '1'),
(173, 13, 'JULIO CESAR SALAS', '1'),
(174, 13, 'JUSTO BRICEÑO', '1'),
(175, 13, 'LIBERTADOR', '1'),
(176, 13, 'SANTOS MARQUINA', '1'),
(177, 13, 'MIRANDA', '1'),
(178, 13, 'ANTONIO PINTO S.', '1'),
(179, 13, 'OB. RAMOS DE LORA', '1'),
(180, 13, 'CARACCIOLO PARRA', '1'),
(181, 13, 'CARDENAL QUINTERO', '1'),
(182, 13, 'PUEBLO LLANO', '1'),
(183, 13, 'RANGEL', '1'),
(184, 13, 'RIVAS DAVILA', '1'),
(185, 13, 'SUCRE', '1'),
(186, 13, 'TOVAR', '1'),
(187, 13, 'TULIO F CORDERO', '1'),
(188, 13, 'PADRE NOGUERA', '1'),
(189, 13, 'ARICAGUA', '1'),
(190, 13, 'ZEA', '1'),
(191, 14, 'ACEVEDO', '1'),
(192, 14, 'BRION', '1'),
(193, 14, 'GUAICAIPURO', '1'),
(194, 14, 'INDEPENDENCIA', '1'),
(195, 14, 'LANDER', '1'),
(196, 14, 'PAEZ', '1'),
(197, 14, 'PAZ CASTILLO', '1'),
(198, 14, 'PLAZA', '1'),
(199, 14, 'SUCRE', '1'),
(200, 14, 'URDANETA', '1'),
(201, 14, 'ZAMORA', '1'),
(202, 14, 'CRISTOBAL ROJAS', '1'),
(203, 14, 'LOS SALIAS', '1'),
(204, 14, 'ANDRES BELLO', '1'),
(205, 14, 'SIMON BOLIVAR', '1'),
(206, 14, 'BARUTA', '1'),
(207, 14, 'CARRIZAL', '1'),
(208, 14, 'CHACAO', '1'),
(209, 14, 'EL HATILLO', '1'),
(210, 14, 'BUROZ', '1'),
(211, 14, 'PEDRO GUAL', '1'),
(212, 15, 'ACOSTA', '1'),
(213, 15, 'BOLIVAR', '1'),
(214, 15, 'CARIPE', '1'),
(215, 15, 'CEDEÑO', '1'),
(216, 15, 'EZEQUIEL ZAMORA', '1'),
(217, 15, 'LIBERTADOR', '1'),
(218, 15, 'MATURIN', '1'),
(219, 15, 'PIAR', '1'),
(220, 15, 'PUNCERES', '1'),
(221, 15, 'SOTILLO', '1'),
(222, 15, 'AGUASAY', '1'),
(223, 15, 'SANTA BARBARA', '1'),
(224, 15, 'URACOA', '1'),
(225, 16, 'ARISMENDI', '1'),
(226, 16, 'DIAZ', '1'),
(227, 16, 'GOMEZ', '1'),
(228, 16, 'MANEIRO', '1'),
(229, 16, 'MARCANO', '1'),
(230, 16, 'MARIÑO', '1'),
(231, 16, 'PENIN. DE MACANAO', '1'),
(232, 16, 'VILLALBA(HE)', '1'),
(233, 16, 'TUBORES', '1'),
(234, 16, 'ANTOLIN DEL CAMPO', '1'),
(235, 16, 'GARCIA', '1'),
(236, 17, 'ARAURE', '1'),
(237, 17, 'ESTELLER', '1'),
(238, 17, 'GUANARE', '1'),
(239, 17, 'GUANARITO', '1'),
(240, 17, 'OSPINO', '1'),
(241, 17, 'PAEZ', '1'),
(242, 17, 'SUCRE', '1'),
(243, 17, 'TUREN', '1'),
(244, 17, 'M.JOSE V DE UNDA', '1'),
(245, 17, 'AGUA BLANCA', '1'),
(246, 17, 'PAPELON', '1'),
(247, 17, 'GENARO BOCONOITO', '1'),
(248, 17, 'S RAFAEL DE ONOTO', '1'),
(249, 17, 'SANTA ROSALIA', '1'),
(250, 18, 'ARISMENDI', '1'),
(251, 18, 'BENITEZ', '1'),
(252, 18, 'BERMUDEZ', '1'),
(253, 18, 'CAJIGAL', '1'),
(254, 18, 'MARIÑO', '1'),
(255, 18, 'MEJIA', '1'),
(256, 18, 'MONTES', '1'),
(257, 18, 'RIBERO', '1'),
(258, 18, 'SUCRE', '1'),
(259, 18, 'VALDEZ', '1'),
(260, 18, 'ANDRES E BLANCO', '1'),
(261, 18, 'LIBERTADOR', '1'),
(262, 18, 'ANDRES MATA', '1'),
(263, 18, 'BOLIVAR', '1'),
(264, 18, 'CRUZ S ACOSTA', '1'),
(265, 19, 'AYACUCHO', '1'),
(266, 19, 'BOLIVAR', '1'),
(267, 19, 'INDEPENDENCIA', '1'),
(268, 19, 'CARDENAS', '1'),
(269, 19, 'JAUREGUI', '1'),
(270, 19, 'JUNIN', '1'),
(271, 19, 'LOBATERA', '1'),
(272, 19, 'SAN CRISTOBAL', '1'),
(273, 19, 'URIBANTE', '1'),
(274, 19, 'CORDOBA', '1'),
(275, 19, 'GARCIA DE HEVIA', '1'),
(276, 19, 'GUASIMOS', '1'),
(277, 19, 'MICHELENA', '1'),
(278, 19, 'LIBERTADOR', '1'),
(279, 19, 'PANAMERICANO', '1'),
(280, 19, 'PEDRO MARIA UREÑA', '1'),
(281, 19, 'SUCRE', '1'),
(282, 19, 'ANDRES BELLO', '1'),
(283, 19, 'FERNANDEZ FEO', '1'),
(284, 19, 'LIBERTAD', '1'),
(285, 19, 'SAMUEL MALDONADO', '1'),
(286, 19, 'SEBORUCO', '1'),
(287, 19, 'ANTONIO ROMULO C', '1'),
(288, 19, 'FCO DE MIRANDA', '1'),
(289, 19, 'JOSE MARIA VARGA', '1'),
(290, 19, 'RAFAEL URDANETA', '1'),
(291, 19, 'SIMON RODRIGUEZ', '1'),
(292, 19, 'TORBES', '1'),
(293, 19, 'SAN JUDAS TADEO', '1'),
(294, 20, 'RAFAEL RANGEL', '1'),
(295, 20, 'BOCONO', '1'),
(296, 20, 'CARACHE', '1'),
(297, 20, 'ESCUQUE', '1'),
(298, 20, 'TRUJILLO', '1'),
(299, 20, 'URDANETA', '1'),
(300, 20, 'VALERA', '1'),
(301, 20, 'CANDELARIA', '1'),
(302, 20, 'MIRANDA', '1'),
(303, 20, 'MONTE CARMELO', '1'),
(304, 20, 'MOTATAN', '1'),
(305, 20, 'PAMPAN', '1'),
(306, 20, 'S RAFAEL CARVAJAL', '1'),
(307, 20, 'SUCRE', '1'),
(308, 20, 'ANDRES BELLO', '1'),
(309, 20, 'BOLIVAR', '1'),
(310, 20, 'JOSE F M CAÑIZAL', '1'),
(311, 20, 'JUAN V CAMPO ELI', '1'),
(312, 20, 'LA CEIBA', '1'),
(313, 20, 'PAMPANITO', '1'),
(314, 21, 'BOLIVAR', '1'),
(315, 21, 'BRUZUAL', '1'),
(316, 21, 'NIRGUA', '1'),
(317, 21, 'SAN FELIPE', '1'),
(318, 21, 'SUCRE', '1'),
(319, 21, 'URACHICHE', '1'),
(320, 21, 'PEÑA', '1'),
(321, 21, 'JOSE ANTONIO PAEZ', '1'),
(322, 21, 'LA TRINIDAD', '1'),
(323, 21, 'COCOROTE', '1'),
(324, 21, 'INDEPENDENCIA', '1'),
(325, 21, 'ARISTIDES BASTID', '1'),
(326, 21, 'MANUEL MONGE', '1'),
(327, 21, 'VEROES', '1'),
(328, 22, 'BARALT', '1'),
(329, 22, 'SANTA RITA', '1'),
(330, 22, 'COLON', '1'),
(331, 22, 'MARA', '1'),
(332, 22, 'MARACAIBO', '1'),
(333, 22, 'MIRANDA', '1'),
(334, 22, 'PAEZ', '1'),
(335, 22, 'MACHIQUES DE P', '1'),
(336, 22, 'SUCRE', '1'),
(337, 22, 'LA CAÑADA DE U.', '1'),
(338, 22, 'LAGUNILLAS', '1'),
(339, 22, 'CATATUMBO', '1'),
(340, 22, 'M/ROSARIO DE PERIJA', '1'),
(341, 22, 'CABIMAS', '1'),
(342, 22, 'VALMORE RODRIGUEZ', '1'),
(343, 22, 'JESUS E LOSSADA', '1'),
(344, 22, 'ALMIRANTE P', '1'),
(345, 22, 'SAN FRANCISCO', '1'),
(346, 22, 'JESUS M SEMPRUN', '1'),
(347, 22, 'FRANCISCO J PULG', '1'),
(348, 22, 'SIMON BOLIVAR', '1'),
(349, 23, 'ATURES', '1'),
(350, 23, 'ATABAPO', '1'),
(351, 23, 'MAROA', '1'),
(352, 23, 'RIO NEGRO', '1'),
(353, 23, 'AUTANA', '1'),
(354, 23, 'MANAPIARE', '1'),
(355, 23, 'ALTO ORINOCO', '1'),
(356, 24, 'TUCUPITA', '1'),
(357, 24, 'PEDERNALES', '1'),
(358, 24, 'ANTONIO DIAZ', '1'),
(359, 24, 'CASACOIMA', '1'),
(360, 25, 'VARGAS', '1'),
(361, 26, 'ALTAGRACIA', '1'),
(362, 26, 'CANDELARIA', '1'),
(363, 26, 'CATEDRAL', '1'),
(364, 26, 'LA PASTORA', '1'),
(365, 26, 'SAN AGUSTIN', '1'),
(366, 26, 'SAN JOSE', '1'),
(367, 26, 'SAN JUAN', '1'),
(368, 26, 'SANTA ROSALIA', '1'),
(369, 26, 'SANTA TERESA', '1'),
(370, 26, 'SUCRE', '1'),
(371, 26, '23 DE ENERO', '1'),
(372, 26, 'ANTIMANO', '1'),
(373, 26, 'EL RECREO', '1'),
(374, 26, 'EL VALLE', '1'),
(375, 26, 'LA VEGA', '1'),
(376, 26, 'MACARAO', '1'),
(377, 26, 'CARICUAO', '1'),
(378, 26, 'EL JUNQUITO', '1'),
(379, 26, 'COCHE', '1'),
(380, 26, 'SAN PEDRO', '1'),
(381, 26, 'SAN BERNARDINO', '1'),
(382, 26, 'EL PARAISO', '1'),
(383, 27, 'ANACO', '1'),
(384, 27, 'SAN JOAQUIN', '1'),
(385, 28, 'CM. ARAGUA DE BARCELONA', '1'),
(386, 28, 'CACHIPO', '1'),
(387, 29, 'EL CARMEN', '1'),
(388, 29, 'SAN CRISTOBAL', '1'),
(389, 29, 'BERGANTIN', '1'),
(390, 29, 'CAIGUA', '1'),
(391, 29, 'EL PILAR', '1'),
(392, 29, 'NARICUAL', '1'),
(393, 30, 'CM. CLARINES', '1'),
(394, 30, 'GUANAPE', '1'),
(395, 30, 'SABANA DE UCHIRE', '1'),
(396, 31, 'CM. ONOTO', '1'),
(397, 31, 'SAN PABLO', '1'),
(398, 32, 'CM. CANTAURA', '1'),
(399, 32, 'LIBERTADOR', '1'),
(400, 32, 'SANTA ROSA', '1'),
(401, 32, 'URICA', '1'),
(402, 33, 'CM. SOLEDAD', '1'),
(403, 33, 'MAMO', '1'),
(404, 34, 'CM. SAN MATEO', '1'),
(405, 34, 'EL CARITO', '1'),
(406, 34, 'SANTA INES', '1'),
(407, 35, 'CM. PARIAGUAN', '1'),
(408, 35, 'ATAPIRIRE', '1'),
(409, 35, 'BOCA DEL PAO', '1'),
(410, 35, 'EL PAO', '1'),
(411, 36, 'CM. MAPIRE', '1'),
(412, 36, 'PIAR', '1'),
(413, 36, 'SN DIEGO DE CABRUTICA', '1'),
(414, 36, 'SANTA CLARA', '1'),
(415, 36, 'UVERITO', '1'),
(416, 36, 'ZUATA', '1'),
(417, 37, 'CM. PUERTO PIRITU', '1'),
(418, 37, 'SAN MIGUEL', '1'),
(419, 37, 'SUCRE', '1'),
(420, 38, 'CM. EL TIGRE', '1'),
(421, 39, 'POZUELOS', '1'),
(422, 39, 'CM PTO. LA CRUZ', '1'),
(423, 40, 'CM. SAN JOSE DE GUANIPA', '1'),
(424, 41, 'GUANTA', '1'),
(425, 41, 'CHORRERON', '1'),
(426, 42, 'PIRITU', '1'),
(427, 42, 'SAN FRANCISCO', '1'),
(428, 43, 'LECHERIAS', '1'),
(429, 43, 'EL MORRO', '1'),
(430, 44, 'VALLE GUANAPE', '1'),
(431, 44, 'SANTA BARBARA', '1'),
(432, 45, 'SANTA ANA', '1'),
(433, 45, 'PUEBLO NUEVO', '1'),
(434, 46, 'EL CHAPARRO', '1'),
(435, 46, 'TOMAS ALFARO CALATRAVA', '1'),
(436, 47, 'BOCA UCHIRE', '1'),
(437, 47, 'BOCA DE CHAVEZ', '1'),
(438, 48, 'ACHAGUAS', '1'),
(439, 48, 'APURITO', '1'),
(440, 48, 'EL YAGUAL', '1'),
(441, 48, 'GUACHARA', '1'),
(442, 48, 'MUCURITAS', '1'),
(443, 48, 'QUESERAS DEL MEDIO', '1'),
(444, 49, 'BRUZUAL', '1'),
(445, 49, 'MANTECAL', '1'),
(446, 49, 'QUINTERO', '1'),
(447, 49, 'SAN VICENTE', '1'),
(448, 49, 'RINCON HONDO', '1'),
(449, 50, 'GUASDUALITO', '1'),
(450, 50, 'ARAMENDI', '1'),
(451, 50, 'EL AMPARO', '1'),
(452, 50, 'SAN CAMILO', '1'),
(453, 50, 'URDANETA', '1'),
(454, 51, 'SAN JUAN DE PAYARA', '1'),
(455, 51, 'CODAZZI', '1'),
(456, 51, 'CUNAVICHE', '1'),
(457, 52, 'ELORZA', '1'),
(458, 52, 'LA TRINIDAD', '1'),
(459, 53, 'SAN FERNANDO', '1'),
(460, 53, 'PEÑALVER', '1'),
(461, 53, 'EL RECREO', '1'),
(462, 53, 'SN RAFAEL DE ATAMAICA', '1'),
(463, 54, 'BIRUACA', '1'),
(464, 55, 'CM. LAS DELICIAS', '1'),
(465, 55, 'CHORONI', '1'),
(466, 55, 'MADRE MA DE SAN JOSE', '1'),
(467, 55, 'JOAQUIN CRESPO', '1'),
(468, 55, 'PEDRO JOSE OVALLES', '1'),
(469, 55, 'JOSE CASANOVA GODOY', '1'),
(470, 55, 'ANDRES ELOY BLANCO', '1'),
(471, 55, 'LOS TACARIGUAS', '1'),
(472, 56, 'CM. TURMERO', '1'),
(473, 56, 'SAMAN DE GUERE', '1'),
(474, 56, 'ALFREDO PACHECO M', '1'),
(475, 56, 'CHUAO', '1'),
(476, 56, 'AREVALO APONTE', '1'),
(477, 57, 'CM. LA VICTORIA', '1'),
(478, 57, 'ZUATA', '1'),
(479, 57, 'PAO DE ZARATE', '1'),
(480, 57, 'CASTOR NIEVES RIOS', '1'),
(481, 57, 'LAS GUACAMAYAS', '1'),
(482, 58, 'CM. SAN CASIMIRO', '1'),
(483, 58, 'VALLE MORIN', '1'),
(484, 58, 'GUIRIPA', '1'),
(485, 58, 'OLLAS DE CARAMACATE', '1'),
(486, 59, 'CM. SAN SEBASTIAN', '1'),
(487, 60, 'CM. CAGUA', '1'),
(488, 60, 'BELLA VISTA', '1'),
(489, 61, 'CM. BARBACOAS', '1'),
(490, 61, 'SAN FRANCISCO DE CARA', '1'),
(491, 61, 'TAGUAY', '1'),
(492, 61, 'LAS PEÑITAS', '1'),
(493, 62, 'CM. VILLA DE CURA', '1'),
(494, 62, 'MAGDALENO', '1'),
(495, 62, 'SAN FRANCISCO DE ASIS', '1'),
(496, 62, 'VALLES DE TUCUTUNEMO', '1'),
(497, 62, 'PQ AUGUSTO MIJARES', '1'),
(498, 63, 'CM. PALO NEGRO', '1'),
(499, 63, 'SAN MARTIN DE PORRES', '1'),
(500, 64, 'CM. SANTA CRUZ', '1'),
(501, 65, 'CM. SAN MATEO', '1'),
(502, 66, 'CM. LAS TEJERIAS', '1'),
(503, 66, 'TIARA', '1'),
(504, 67, 'CM. EL LIMON', '1'),
(505, 67, 'CA A DE AZUCAR', '1'),
(506, 68, 'CM. COLONIA TOVAR', '1'),
(507, 69, 'CM. CAMATAGUA', '1'),
(508, 69, 'CARMEN DE CURA', '1'),
(509, 70, 'CM. EL CONSEJO', '1'),
(510, 71, 'CM. SANTA RITA', '1'),
(511, 71, 'FRANCISCO DE MIRANDA', '1'),
(512, 71, 'MONS FELICIANO G', '1'),
(513, 72, 'OCUMARE DE LA COSTA', '1'),
(514, 73, 'ARISMENDI', '1'),
(515, 73, 'GUADARRAMA', '1'),
(516, 73, 'LA UNION', '1'),
(517, 73, 'SAN ANTONIO', '1'),
(518, 74, 'ALFREDO A LARRIVA', '1'),
(519, 74, 'BARINAS', '1'),
(520, 74, 'SAN SILVESTRE', '1'),
(521, 74, 'SANTA INES', '1'),
(522, 74, 'SANTA LUCIA', '1'),
(523, 74, 'TORUNOS', '1'),
(524, 74, 'EL CARMEN', '1'),
(525, 74, 'ROMULO BETANCOURT', '1'),
(526, 74, 'CORAZON DE JESUS', '1'),
(527, 74, 'RAMON I MENDEZ', '1'),
(528, 74, 'ALTO BARINAS', '1'),
(529, 74, 'MANUEL P FAJARDO', '1'),
(530, 74, 'JUAN A RODRIGUEZ D', '1'),
(531, 74, 'DOMINGA ORTIZ P', '1'),
(532, 75, 'ALTAMIRA', '1'),
(533, 75, 'BARINITAS', '1'),
(534, 75, 'CALDERAS', '1'),
(535, 76, 'SANTA BARBARA', '1'),
(536, 76, 'JOSE IGNACIO DEL PUMAR', '1'),
(537, 76, 'RAMON IGNACIO MENDEZ', '1'),
(538, 76, 'PEDRO BRICEÑO MENDEZ', '1'),
(539, 77, 'EL REAL', '1'),
(540, 77, 'LA LUZ', '1'),
(541, 77, 'OBISPOS', '1'),
(542, 77, 'LOS GUASIMITOS', '1'),
(543, 78, 'CIUDAD BOLIVIA', '1'),
(544, 78, 'IGNACIO BRICEÑO', '1'),
(545, 78, 'PAEZ', '1'),
(546, 78, 'JOSE FELIX RIBAS', '1'),
(547, 79, 'DOLORES', '1'),
(548, 79, 'LIBERTAD', '1'),
(549, 79, 'PALACIO FAJARDO', '1'),
(550, 79, 'SANTA ROSA', '1'),
(551, 80, 'CIUDAD DE NUTRIAS', '1'),
(552, 80, 'EL REGALO', '1'),
(553, 80, 'PUERTO DE NUTRIAS', '1'),
(554, 80, 'SANTA CATALINA', '1'),
(555, 81, 'RODRIGUEZ DOMINGUEZ', '1'),
(556, 81, 'SABANETA', '1'),
(557, 82, 'TICOPORO', '1'),
(558, 82, 'NICOLAS PULIDO', '1'),
(559, 82, 'ANDRES BELLO', '1'),
(560, 83, 'BARRANCAS', '1'),
(561, 83, 'EL SOCORRO', '1'),
(562, 83, 'MASPARRITO', '1'),
(563, 84, 'EL CANTON', '1'),
(564, 84, 'SANTA CRUZ DE GUACAS', '1'),
(565, 84, 'PUERTO VIVAS', '1'),
(566, 85, 'SIMON BOLIVAR', '1'),
(567, 85, 'ONCE DE ABRIL', '1'),
(568, 85, 'VISTA AL SOL', '1'),
(569, 85, 'CHIRICA', '1'),
(570, 85, 'DALLA COSTA', '1'),
(571, 85, 'CACHAMAY', '1'),
(572, 85, 'UNIVERSIDAD', '1'),
(573, 85, 'UNARE', '1'),
(574, 85, 'YOCOIMA', '1'),
(575, 85, 'POZO VERDE', '1'),
(576, 86, 'CM. CAICARA DEL ORINOCO', '1'),
(577, 86, 'ASCENSION FARRERAS', '1'),
(578, 86, 'ALTAGRACIA', '1'),
(579, 86, 'LA URBANA', '1'),
(580, 86, 'GUANIAMO', '1'),
(581, 86, 'PIJIGUAOS', '1'),
(582, 87, 'CATEDRAL', '1'),
(583, 87, 'AGUA SALADA', '1'),
(584, 87, 'LA SABANITA', '1'),
(585, 87, 'VISTA HERMOSA', '1'),
(586, 87, 'MARHUANTA', '1'),
(587, 87, 'JOSE ANTONIO PAEZ', '1'),
(588, 87, 'ORINOCO', '1'),
(589, 87, 'PANAPANA', '1'),
(590, 87, 'ZEA', '1'),
(591, 88, 'CM. UPATA', '1'),
(592, 88, 'ANDRES ELOY BLANCO', '1'),
(593, 88, 'PEDRO COVA', '1'),
(594, 89, 'CM. GUASIPATI', '1'),
(595, 89, 'SALOM', '1'),
(596, 90, 'CM. MARIPA', '1'),
(597, 90, 'ARIPAO', '1'),
(598, 90, 'LAS MAJADAS', '1'),
(599, 90, 'MOITACO', '1'),
(600, 90, 'GUARATARO', '1'),
(601, 91, 'CM. TUMEREMO', '1'),
(602, 91, 'DALLA COSTA', '1'),
(603, 91, 'SAN ISIDRO', '1'),
(604, 92, 'CM. CIUDAD PIAR', '1'),
(605, 92, 'SAN FRANCISCO', '1'),
(606, 92, 'BARCELONETA', '1'),
(607, 92, 'SANTA BARBARA', '1'),
(608, 93, 'CM. SANTA ELENA DE UAIREN', '1'),
(609, 93, 'IKABARU', '1'),
(610, 94, 'CM. EL CALLAO', '1'),
(611, 95, 'CM. EL PALMAR', '1'),
(612, 96, 'BEJUMA', '1'),
(613, 96, 'CANOABO', '1'),
(614, 96, 'SIMON BOLIVAR', '1'),
(615, 97, 'GUIGUE', '1'),
(616, 97, 'BELEN', '1'),
(617, 97, 'TACARIGUA', '1'),
(618, 98, 'MARIARA', '1'),
(619, 98, 'AGUAS CALIENTES', '1'),
(620, 99, 'GUACARA', '1'),
(621, 99, 'CIUDAD ALIANZA', '1'),
(622, 99, 'YAGUA', '1'),
(623, 100, 'MONTALBAN', '1'),
(624, 101, 'MORON', '1'),
(625, 101, 'URAMA', '1'),
(626, 102, 'DEMOCRACIA', '1'),
(627, 102, 'FRATERNIDAD', '1'),
(628, 102, 'GOAIGOAZA', '1'),
(629, 102, 'JUAN JOSE FLORES', '1'),
(630, 102, 'BARTOLOME SALOM', '1'),
(631, 102, 'UNION', '1'),
(632, 102, 'BORBURATA', '1'),
(633, 102, 'PATANEMO', '1'),
(634, 103, 'SAN JOAQUIN', '1'),
(635, 104, 'CANDELARIA', '1'),
(636, 104, 'CATEDRAL', '1'),
(637, 104, 'EL SOCORRO', '1'),
(638, 104, 'MIGUEL PEÑA', '1'),
(639, 104, 'SAN BLAS', '1'),
(640, 104, 'SAN JOSE', '1'),
(641, 104, 'SANTA ROSA', '1'),
(642, 104, 'RAFAEL URDANETA', '1'),
(643, 104, 'NEGRO PRIMERO', '1'),
(644, 105, 'MIRANDA', '1'),
(645, 106, 'U LOS GUAYOS', '1'),
(646, 107, 'NAGUANAGUA', '1'),
(647, 108, 'URB SAN DIEGO', '1'),
(648, 109, 'U TOCUYITO', '1'),
(649, 109, 'U INDEPENDENCIA', '1'),
(650, 110, 'COJEDES', '1'),
(651, 110, 'JUAN DE MATA SUAREZ', '1'),
(652, 111, 'TINAQUILLO', '1'),
(653, 112, 'EL BAUL', '1'),
(654, 112, 'SUCRE', '1'),
(655, 123, 'EL PAO', '1'),
(656, 114, 'LIBERTAD DE COJEDES', '1'),
(657, 114, 'EL AMPARO', '1'),
(658, 115, 'SAN CARLOS DE AUSTRIA', '1'),
(659, 115, 'JUAN ANGEL BRAVO', '1'),
(660, 115, 'MANUEL MANRIQUE', '1'),
(661, 116, 'GRL/JEFE JOSE L SILVA', '1'),
(662, 117, 'MACAPO', '1'),
(663, 117, 'LA AGUADITA', '1'),
(664, 118, 'ROMULO GALLEGOS', '1'),
(665, 119, 'SAN JUAN DE LOS CAYOS', '1'),
(666, 119, 'CAPADARE', '1'),
(667, 119, 'LA PASTORA', '1'),
(668, 119, 'LIBERTADOR', '1'),
(669, 120, 'SAN LUIS', '1'),
(670, 120, 'ARACUA', '1'),
(671, 120, 'LA PEÑA', '1'),
(672, 121, 'CAPATARIDA', '1'),
(673, 121, 'BOROJO', '1'),
(674, 121, 'SEQUE', '1'),
(675, 121, 'ZAZARIDA', '1'),
(676, 121, 'BARIRO', '1'),
(677, 121, 'GUAJIRO', '1'),
(678, 122, 'NORTE', '1'),
(679, 122, 'CARIRUBANA', '1'),
(680, 122, 'PUNTA CARDON', '1'),
(681, 122, 'SANTA ANA', '1'),
(682, 123, 'LA VELA DE CORO', '1'),
(683, 123, 'ACURIGUA', '1'),
(684, 123, 'GUAIBACOA', '1'),
(685, 123, 'MACORUCA', '1'),
(686, 123, 'LAS CALDERAS', '1'),
(687, 124, 'PEDREGAL', '1'),
(688, 124, 'AGUA CLARA', '1'),
(689, 124, 'AVARIA', '1'),
(690, 124, 'PIEDRA GRANDE', '1'),
(691, 124, 'PURURECHE', '1'),
(692, 125, 'PUEBLO NUEVO', '1'),
(693, 125, 'ADICORA', '1'),
(694, 125, 'BARAIVED', '1'),
(695, 125, 'BUENA VISTA', '1'),
(696, 125, 'JADACAQUIVA', '1'),
(697, 125, 'MORUY', '1'),
(698, 125, 'EL VINCULO', '1'),
(699, 125, 'EL HATO', '1'),
(700, 125, 'ADAURE', '1'),
(701, 126, 'CHURUGUARA', '1'),
(702, 126, 'AGUA LARGA', '1'),
(703, 126, 'INDEPENDENCIA', '1'),
(704, 126, 'MAPARARI', '1'),
(705, 126, 'EL PAUJI', '1'),
(706, 127, 'MENE DE MAUROA', '1'),
(707, 127, 'CASIGUA', '1'),
(708, 127, 'SAN FELIX', '1'),
(709, 128, 'SAN ANTONIO', '1'),
(710, 128, 'SAN GABRIEL', '1'),
(711, 128, 'SANTA ANA', '1'),
(712, 128, 'GUZMAN GUILLERMO', '1'),
(713, 128, 'MITARE', '1'),
(714, 128, 'SABANETA', '1'),
(715, 128, 'RIO SECO', '1'),
(716, 129, 'CABURE', '1'),
(717, 129, 'CURIMAGUA', '1'),
(718, 129, 'COLINA', '1'),
(719, 130, 'TUCACAS', '1'),
(720, 130, 'BOCA DE AROA', '1'),
(721, 131, 'PUERTO CUMAREBO', '1'),
(722, 131, 'LA CIENAGA', '1'),
(723, 131, 'LA SOLEDAD', '1'),
(724, 131, 'PUEBLO CUMAREBO', '1'),
(725, 131, 'ZAZARIDA', '1'),
(726, 132, 'CM. DABAJURO', '1'),
(727, 133, 'CHICHIRIVICHE', '1'),
(728, 133, 'BOCA DE TOCUYO', '1'),
(729, 133, 'TOCUYO DE LA COSTA', '1'),
(730, 134, 'LOS TAQUES', '1'),
(731, 134, 'JUDIBANA', '1'),
(732, 135, 'PIRITU', '1'),
(733, 135, 'SAN JOSE DE LA COSTA', '1'),
(734, 136, 'STA.CRUZ DE BUCARAL', '1'),
(735, 136, 'EL CHARAL', '1'),
(736, 136, 'LAS VEGAS DEL TUY', '1'),
(737, 137, 'CM. MIRIMIRE', '1'),
(738, 138, 'JACURA', '1'),
(739, 138, 'AGUA LINDA', '1'),
(740, 138, 'ARAURIMA', '1'),
(741, 139, 'CM. YARACAL', '1'),
(742, 140, 'CM. PALMA SOLA', '1'),
(743, 141, 'SUCRE', '1'),
(744, 141, 'PECAYA', '1'),
(745, 142, 'URUMACO', '1'),
(746, 142, 'BRUZUAL', '1'),
(747, 143, 'CM. TOCOPERO', '1'),
(748, 144, 'VALLE DE LA PASCUA', '1'),
(749, 144, 'ESPINO', '1'),
(750, 145, 'EL SOMBRERO', '1'),
(751, 145, 'SOSA', '1'),
(752, 146, 'CALABOZO', '1'),
(753, 146, 'EL CALVARIO', '1'),
(754, 146, 'EL RASTRO', '1'),
(755, 146, 'GUARDATINAJAS', '1'),
(756, 147, 'ALTAGRACIA DE ORITUCO', '1'),
(757, 147, 'LEZAMA', '1'),
(758, 147, 'LIBERTAD DE ORITUCO', '1'),
(759, 147, 'SAN FCO DE MACAIRA', '1'),
(760, 147, 'SAN RAFAEL DE ORITUCO', '1'),
(761, 147, 'SOUBLETTE', '1'),
(762, 147, 'PASO REAL DE MACAIRA', '1'),
(763, 148, 'TUCUPIDO', '1'),
(764, 148, 'SAN RAFAEL DE LAYA', '1'),
(765, 149, 'SAN JUAN DE LOS MORROS', '1'),
(766, 149, 'PARAPARA', '1'),
(767, 149, 'CANTAGALLO', '1'),
(768, 150, 'ZARAZA', '1'),
(769, 150, 'SAN JOSE DE UNARE', '1'),
(770, 151, 'CAMAGUAN', '1'),
(771, 151, 'PUERTO MIRANDA', '1'),
(772, 151, 'UVERITO', '1'),
(773, 152, 'SAN JOSE DE GUARIBE', '1'),
(774, 153, 'LAS MERCEDES', '1'),
(775, 153, 'STA RITA DE MANAPIRE', '1'),
(776, 153, 'CABRUTA', '1'),
(777, 154, 'EL SOCORRO', '1'),
(778, 155, 'ORTIZ', '1'),
(779, 155, 'SAN FCO. DE TIZNADOS', '1'),
(780, 155, 'SAN JOSE DE TIZNADOS', '1'),
(781, 155, 'S LORENZO DE TIZNADOS', '1'),
(782, 156, 'SANTA MARIA DE IPIRE', '1'),
(783, 156, 'ALTAMIRA', '1'),
(784, 157, 'CHAGUARAMAS', '1'),
(785, 158, 'GUAYABAL', '1'),
(786, 158, 'CAZORLA', '1'),
(787, 159, 'FREITEZ', '1'),
(788, 159, 'JOSE MARIA BLANCO', '1'),
(789, 160, 'CATEDRAL', '1'),
(790, 160, 'LA CONCEPCION', '1'),
(791, 160, 'SANTA ROSA', '1'),
(792, 160, 'UNION', '1'),
(793, 160, 'EL CUJI', '1'),
(794, 160, 'TAMACA', '1'),
(795, 160, 'JUAN DE VILLEGAS', '1'),
(796, 160, 'AGUEDO F. ALVARADO', '1'),
(797, 160, 'BUENA VISTA', '1'),
(798, 160, 'JUAREZ', '1'),
(799, 161, 'JUAN B RODRIGUEZ', '1'),
(800, 161, 'DIEGO DE LOZADA', '1'),
(801, 161, 'SAN MIGUEL', '1'),
(802, 161, 'CUARA', '1'),
(803, 161, 'PARAISO DE SAN JOSE', '1'),
(804, 161, 'TINTORERO', '1'),
(805, 161, 'JOSE BERNARDO DORANTE', '1'),
(806, 161, 'CRNEL. MARIANO PERAZA', '1'),
(807, 162, 'BOLIVAR', '1'),
(808, 162, 'ANZOATEGUI', '1'),
(809, 162, 'GUARICO', '1'),
(810, 162, 'HUMOCARO ALTO', '1'),
(811, 162, 'HUMOCARO BAJO', '1'),
(812, 162, 'MORAN', '1'),
(813, 162, 'HILARIO LUNA Y LUNA', '1'),
(814, 162, 'LA CANDELARIA', '1'),
(815, 163, 'CABUDARE', '1'),
(816, 163, 'JOSE G. BASTIDAS', '1'),
(817, 163, 'AGUA VIVA', '1'),
(818, 164, 'TRINIDAD SAMUEL', '1'),
(819, 164, 'ANTONIO DIAZ', '1'),
(820, 164, 'CAMACARO', '1'),
(821, 164, 'CASTAÑEDA', '1'),
(822, 164, 'CHIQUINQUIRA', '1'),
(823, 164, 'ESPINOZA LOS MONTEROS', '1'),
(824, 164, 'LARA', '1'),
(825, 164, 'MANUEL MORILLO', '1'),
(826, 164, 'MONTES DE OCA', '1'),
(827, 164, 'TORRES', '1'),
(828, 164, 'EL BLANCO', '1'),
(829, 164, 'MONTA A VERDE', '1'),
(830, 164, 'HERIBERTO ARROYO', '1'),
(831, 164, 'LAS MERCEDES', '1'),
(832, 164, 'CECILIO ZUBILLAGA', '1'),
(833, 164, 'REYES VARGAS', '1'),
(834, 164, 'ALTAGRACIA', '1'),
(835, 165, 'SIQUISIQUE', '1'),
(836, 165, 'SAN MIGUEL', '1'),
(837, 165, 'XAGUAS', '1'),
(838, 165, 'MOROTURO', '1'),
(839, 166, 'PIO TAMAYO', '1'),
(840, 166, 'YACAMBU', '1'),
(841, 166, 'QBDA. HONDA DE GUACHE', '1'),
(842, 167, 'SARARE', '1'),
(843, 167, 'GUSTAVO VEGAS LEON', '1'),
(844, 167, 'BURIA', '1'),
(845, 168, 'GABRIEL PICON G.', '1'),
(846, 168, 'HECTOR AMABLE MORA', '1'),
(847, 168, 'JOSE NUCETE SARDI', '1'),
(848, 168, 'PULIDO MENDEZ', '1'),
(849, 168, 'PTE. ROMULO GALLEGOS', '1'),
(850, 168, 'PRESIDENTE BETANCOURT', '1'),
(851, 168, 'PRESIDENTE PAEZ', '1'),
(852, 169, 'CM. LA AZULITA', '1'),
(853, 170, 'CM. CANAGUA', '1'),
(854, 170, 'CAPURI', '1'),
(855, 170, 'CHACANTA', '1'),
(856, 170, 'EL MOLINO', '1'),
(857, 170, 'GUAIMARAL', '1'),
(858, 170, 'MUCUTUY', '1'),
(859, 170, 'MUCUCHACHI', '1'),
(860, 171, 'ACEQUIAS', '1'),
(861, 171, 'JAJI', '1'),
(862, 171, 'LA MESA', '1'),
(863, 171, 'SAN JOSE', '1'),
(864, 171, 'MONTALBAN', '1'),
(865, 171, 'MATRIZ', '1'),
(866, 171, 'FERNANDEZ PEÑA', '1'),
(867, 172, 'CM. GUARAQUE', '1'),
(868, 172, 'MESA DE QUINTERO', '1'),
(869, 172, 'RIO NEGRO', '1'),
(870, 173, 'CM. ARAPUEY', '1'),
(871, 173, 'PALMIRA', '1'),
(872, 174, 'CM. TORONDOY', '1'),
(873, 174, 'SAN CRISTOBAL DE T', '1'),
(874, 175, 'ARIAS', '1'),
(875, 175, 'SAGRARIO', '1'),
(876, 175, 'MILLA', '1'),
(877, 175, 'EL LLANO', '1'),
(878, 175, 'JUAN RODRIGUEZ SUAREZ', '1'),
(879, 175, 'JACINTO PLAZA', '1'),
(880, 175, 'DOMINGO PEÑA', '1'),
(881, 175, 'GONZALO PICON FEBRES', '1'),
(882, 175, 'OSUNA RODRIGUEZ', '1'),
(883, 175, 'LASSO DE LA VEGA', '1'),
(884, 175, 'CARACCIOLO PARRA P', '1'),
(885, 175, 'MARIANO PICON SALAS', '1'),
(886, 175, 'ANTONIO SPINETTI DINI', '1'),
(887, 175, 'EL MORRO', '1'),
(888, 175, 'LOS NEVADOS', '1'),
(889, 176, 'CM. TABAY', '1'),
(890, 177, 'CM. TIMOTES', '1'),
(891, 177, 'ANDRES ELOY BLANCO', '1'),
(892, 177, 'PIÑANGO', '1'),
(893, 177, 'LA VENTA', '1'),
(894, 178, 'CM. STA CRUZ DE MORA', '1'),
(895, 178, 'MESA BOLIVAR', '1'),
(896, 178, 'MESA DE LAS PALMAS', '1'),
(897, 179, 'CM. STA ELENA DE ARENALES', '1'),
(898, 179, 'ELOY PAREDES', '1'),
(899, 179, 'PQ R DE ALCAZAR', '1'),
(900, 180, 'CM. TUCANI', '1'),
(901, 180, 'FLORENCIO RAMIREZ', '1'),
(902, 181, 'CM. SANTO DOMINGO', '1'),
(903, 181, 'LAS PIEDRAS', '1'),
(904, 182, 'CM. PUEBLO LLANO', '1'),
(905, 183, 'CM. MUCUCHIES', '1'),
(906, 183, 'MUCURUBA', '1'),
(907, 183, 'SAN RAFAEL', '1'),
(908, 183, 'CACUTE', '1'),
(909, 183, 'LA TOMA', '1'),
(910, 184, 'CM. BAILADORES', '1'),
(911, 184, 'GERONIMO MALDONADO', '1'),
(912, 185, 'CM. LAGUNILLAS', '1'),
(913, 185, 'CHIGUARA', '1'),
(914, 185, 'ESTANQUES', '1'),
(915, 185, 'SAN JUAN', '1'),
(916, 185, 'PUEBLO NUEVO DEL SUR', '1'),
(917, 185, 'LA TRAMPA', '1'),
(918, 186, 'EL LLANO', '1'),
(919, 186, 'TOVAR', '1'),
(920, 186, 'EL AMPARO', '1'),
(921, 186, 'SAN FRANCISCO', '1'),
(922, 187, 'CM. NUEVA BOLIVIA', '1'),
(923, 187, 'INDEPENDENCIA', '1'),
(924, 187, 'MARIA C PALACIOS', '1'),
(925, 187, 'SANTA APOLONIA', '1'),
(926, 188, 'CM. STA MARIA DE CAPARO', '1'),
(927, 189, 'CM. ARICAGUA', '1'),
(928, 189, 'SAN ANTONIO', '1'),
(929, 190, 'CM. ZEA', '1'),
(930, 190, 'CAÑO EL TIGRE', '1'),
(931, 191, 'CAUCAGUA', '1'),
(932, 191, 'ARAGUITA', '1'),
(933, 191, 'AREVALO GONZALEZ', '1'),
(934, 191, 'CAPAYA', '1'),
(935, 191, 'PANAQUIRE', '1'),
(936, 191, 'RIBAS', '1'),
(937, 191, 'EL CAFE', '1'),
(938, 191, 'MARIZAPA', '1'),
(939, 192, 'HIGUEROTE', '1'),
(940, 192, 'CURIEPE', '1'),
(941, 192, 'TACARIGUA', '1'),
(942, 193, 'LOS TEQUES', '1'),
(943, 193, 'CECILIO ACOSTA', '1'),
(944, 193, 'PARACOTOS', '1'),
(945, 193, 'SAN PEDRO', '1'),
(946, 193, 'TACATA', '1'),
(947, 193, 'EL JARILLO', '1'),
(948, 193, 'ALTAGRACIA DE LA M', '1'),
(949, 194, 'STA TERESA DEL TUY', '1'),
(950, 194, 'EL CARTANAL', '1'),
(951, 195, 'OCUMARE DEL TUY', '1'),
(952, 195, 'LA DEMOCRACIA', '1'),
(953, 195, 'SANTA BARBARA', '1'),
(954, 196, 'RIO CHICO', '1'),
(955, 196, 'EL GUAPO', '1'),
(956, 196, 'TACARIGUA DE LA LAGUNA', '1'),
(957, 196, 'PAPARO', '1'),
(958, 196, 'SN FERNANDO DEL GUAPO', '1'),
(959, 197, 'SANTA LUCIA', '1'),
(960, 198, 'GUARENAS', '1'),
(961, 199, 'PETARE', '1'),
(962, 199, 'LEONCIO MARTINEZ', '1'),
(963, 199, 'CAUCAGUITA', '1'),
(964, 199, 'FILAS DE MARICHES', '1'),
(965, 199, 'LA DOLORITA', '1'),
(966, 200, 'CUA', '1'),
(967, 200, 'NUEVA CUA', '1'),
(968, 201, 'GUATIRE', '1'),
(969, 201, 'BOLIVAR', '1'),
(970, 202, 'CHARALLAVE', '1'),
(971, 202, 'LAS BRISAS', '1'),
(972, 203, 'SAN ANTONIO LOS ALTOS', '1'),
(973, 204, 'SAN JOSE DE BARLOVENTO', '1'),
(974, 204, 'CUMBO', '1'),
(975, 205, 'SAN FCO DE YARE', '1'),
(976, 205, 'S ANTONIO DE YARE', '1'),
(977, 206, 'BARUTA', '1'),
(978, 206, 'EL CAFETAL', '1'),
(979, 206, 'LAS MINAS DE BARUTA', '1'),
(980, 207, 'CARRIZAL', '1'),
(981, 208, 'CHACAO', '1'),
(982, 209, 'EL HATILLO', '1'),
(983, 210, 'MAMPORAL', '1'),
(984, 211, 'CUPIRA', '1'),
(985, 211, 'MACHURUCUTO', '1'),
(986, 212, 'CM. SAN ANTONIO', '1'),
(987, 212, 'SAN FRANCISCO', '1'),
(988, 213, 'CM. CARIPITO', '1'),
(989, 214, 'CM. CARIPE', '1'),
(990, 214, 'TERESEN', '1'),
(991, 214, 'EL GUACHARO', '1'),
(992, 214, 'SAN AGUSTIN', '1'),
(993, 214, 'LA GUANOTA', '1'),
(994, 214, 'SABANA DE PIEDRA', '1'),
(995, 215, 'CM. CAICARA', '1'),
(996, 215, 'AREO', '1'),
(997, 215, 'SAN FELIX', '1'),
(998, 215, 'VIENTO FRESCO', '1'),
(999, 216, 'CM. PUNTA DE MATA', '1'),
(1000, 216, 'EL TEJERO', '1'),
(1001, 217, 'CM. TEMBLADOR', '1'),
(1002, 217, 'TABASCA', '1'),
(1003, 217, 'LAS ALHUACAS', '1'),
(1004, 217, 'CHAGUARAMAS', '1'),
(1005, 218, 'EL FURRIAL', '1'),
(1006, 218, 'JUSEPIN', '1'),
(1007, 218, 'EL COROZO', '1'),
(1008, 218, 'SAN VICENTE', '1'),
(1009, 218, 'LA PICA', '1'),
(1010, 218, 'ALTO DE LOS GODOS', '1'),
(1011, 218, 'BOQUERON', '1'),
(1012, 218, 'LAS COCUIZAS', '1'),
(1013, 218, 'SANTA CRUZ', '1'),
(1014, 218, 'SAN SIMON', '1'),
(1015, 219, 'CM. ARAGUA', '1'),
(1016, 219, 'CHAGUARAMAL', '1'),
(1017, 219, 'GUANAGUANA', '1'),
(1018, 219, 'APARICIO', '1'),
(1019, 219, 'TAGUAYA', '1'),
(1020, 219, 'EL PINTO', '1'),
(1021, 219, 'LA TOSCANA', '1'),
(1022, 220, 'CM. QUIRIQUIRE', '1'),
(1023, 220, 'CACHIPO', '1'),
(1024, 221, 'CM. BARRANCAS', '1'),
(1025, 221, 'LOS BARRANCOS DE FAJARDO', '1'),
(1026, 222, 'CM. AGUASAY', '1'),
(1027, 223, 'CM. SANTA BARBARA', '1'),
(1028, 224, 'CM. URACOA', '1'),
(1029, 225, 'CM. LA ASUNCION', '1'),
(1030, 226, 'CM. SAN JUAN BAUTISTA', '1'),
(1031, 226, 'ZABALA', '1'),
(1032, 227, 'CM. SANTA ANA', '1'),
(1033, 227, 'GUEVARA', '1'),
(1034, 227, 'MATASIETE', '1'),
(1035, 227, 'BOLIVAR', '1'),
(1036, 227, 'SUCRE', '1'),
(1037, 228, 'CM. PAMPATAR', '1'),
(1038, 228, 'AGUIRRE', '1'),
(1039, 229, 'CM. JUAN GRIEGO', '1'),
(1040, 229, 'ADRIAN', '1'),
(1041, 230, 'CM. PORLAMAR', '1'),
(1042, 231, 'CM. BOCA DEL RIO', '1'),
(1043, 231, 'SAN FRANCISCO', '1'),
(1044, 232, 'CM. SAN PEDRO DE COCHE', '1'),
(1045, 232, 'VICENTE FUENTES', '1'),
(1046, 233, 'CM. PUNTA DE PIEDRAS', '1'),
(1047, 233, 'LOS BARALES', '1'),
(1048, 234, 'CM.LA PLAZA DE PARAGUACHI', '1'),
(1049, 235, 'CM. VALLE ESP SANTO', '1'),
(1050, 235, 'FRANCISCO FAJARDO', '1'),
(1051, 236, 'CM. ARAURE', '1'),
(1052, 236, 'RIO ACARIGUA', '1'),
(1053, 237, 'CM. PIRITU', '1'),
(1054, 237, 'UVERAL', '1'),
(1055, 238, 'CM. GUANARE', '1'),
(1056, 238, 'CORDOBA', '1'),
(1057, 238, 'SAN JUAN GUANAGUANARE', '1'),
(1058, 238, 'VIRGEN DE LA COROMOTO', '1'),
(1059, 238, 'SAN JOSE DE LA MONTAÑA', '1'),
(1060, 239, 'CM. GUANARITO', '1'),
(1061, 239, 'TRINIDAD DE LA CAPILLA', '1'),
(1062, 239, 'DIVINA PASTORA', '1'),
(1063, 240, 'CM. OSPINO', '1'),
(1064, 240, 'APARICION', '1'),
(1065, 240, 'LA ESTACION', '1'),
(1066, 241, 'CM. ACARIGUA', '1'),
(1067, 241, 'PAYARA', '1'),
(1068, 241, 'PIMPINELA', '1'),
(1069, 241, 'RAMON PERAZA', '1'),
(1070, 242, 'CM. BISCUCUY', '1'),
(1071, 242, 'CONCEPCION', '1'),
(1072, 242, 'SAN RAFAEL PALO ALZADO', '1'),
(1073, 242, 'UVENCIO A VELASQUEZ', '1'),
(1074, 242, 'SAN JOSE DE SAGUAZ', '1'),
(1075, 242, 'VILLA ROSA', '1'),
(1076, 243, 'CM. VILLA BRUZUAL', '1'),
(1077, 243, 'CANELONES', '1'),
(1078, 243, 'SANTA CRUZ', '1'),
(1079, 243, 'SAN ISIDRO LABRADOR', '1'),
(1080, 244, 'CM. CHABASQUEN', '1'),
(1081, 244, 'PEÑA BLANCA', '1'),
(1082, 245, 'CM. AGUA BLANCA', '1'),
(1083, 246, 'CM. PAPELON', '1'),
(1084, 246, 'CAÑO DELGADITO', '1'),
(1085, 247, 'CM. BOCONOITO', '1'),
(1086, 247, 'ANTOLIN TOVAR AQUINO', '1'),
(1087, 248, 'CM. SAN RAFAEL DE ONOTO', '1'),
(1088, 248, 'SANTA FE', '1'),
(1089, 248, 'THERMO MORLES', '1'),
(1090, 249, 'CM. EL PLAYON', '1'),
(1091, 249, 'FLORIDA', '1'),
(1092, 250, 'RIO CARIBE', '1'),
(1093, 250, 'SAN JUAN GALDONAS', '1'),
(1094, 250, 'PUERTO SANTO', '1'),
(1095, 250, 'EL MORRO DE PTO SANTO', '1'),
(1096, 250, 'ANTONIO JOSE DE SUCRE', '1'),
(1097, 251, 'EL PILAR', '1'),
(1098, 251, 'EL RINCON', '1'),
(1099, 251, 'GUARAUNOS', '1'),
(1100, 251, 'TUNAPUICITO', '1'),
(1101, 251, 'UNION', '1'),
(1102, 251, 'GRAL FCO. A VASQUEZ', '1'),
(1103, 252, 'SANTA CATALINA', '1'),
(1104, 252, 'SANTA ROSA', '1'),
(1105, 252, 'SANTA TERESA', '1'),
(1106, 252, 'BOLIVAR', '1'),
(1107, 252, 'MACARAPANA', '1'),
(1108, 253, 'YAGUARAPARO', '1'),
(1109, 253, 'LIBERTAD', '1'),
(1110, 253, 'PAUJIL', '1'),
(1111, 254, 'IRAPA', '1'),
(1112, 254, 'CAMPO CLARO', '1'),
(1113, 254, 'SORO', '1'),
(1114, 254, 'SAN ANTONIO DE IRAPA', '1'),
(1115, 254, 'MARABAL', '1'),
(1116, 255, 'CM. SAN ANT DEL GOLFO', '1'),
(1117, 256, 'CUMANACOA', '1'),
(1118, 256, 'ARENAS', '1'),
(1119, 256, 'ARICAGUA', '1'),
(1120, 256, 'COCOLLAR', '1'),
(1121, 256, 'SAN FERNANDO', '1'),
(1122, 256, 'SAN LORENZO', '1'),
(1123, 257, 'CARIACO', '1'),
(1124, 257, 'CATUARO', '1'),
(1125, 257, 'RENDON', '1'),
(1126, 257, 'SANTA CRUZ', '1'),
(1127, 257, 'SANTA MARIA', '1'),
(1128, 258, 'ALTAGRACIA', '1'),
(1129, 258, 'AYACUCHO', '1'),
(1130, 258, 'SANTA INES', '1'),
(1131, 258, 'VALENTIN VALIENTE', '1'),
(1132, 258, 'SAN JUAN', '1'),
(1133, 258, 'GRAN MARISCAL', '1'),
(1134, 258, 'RAUL LEONI', '1'),
(1135, 259, 'GUIRIA', '1'),
(1136, 259, 'CRISTOBAL COLON', '1'),
(1137, 259, 'PUNTA DE PIEDRA', '1'),
(1138, 259, 'BIDEAU', '1'),
(1139, 260, 'MARIÑO', '1'),
(1140, 260, 'ROMULO GALLEGOS', '1'),
(1141, 261, 'TUNAPUY', '1'),
(1142, 261, 'CAMPO ELIAS', '1'),
(1143, 262, 'SAN JOSE DE AREOCUAR', '1'),
(1144, 262, 'TAVERA ACOSTA', '1'),
(1145, 263, 'CM. MARIGUITAR', '1'),
(1146, 264, 'ARAYA', '1'),
(1147, 264, 'MANICUARE', '1'),
(1148, 264, 'CHACOPATA', '1'),
(1149, 265, 'CM. COLON', '1'),
(1150, 265, 'RIVAS BERTI', '1'),
(1151, 265, 'SAN PEDRO DEL RIO', '1'),
(1152, 266, 'CM. SAN ANT DEL TACHIRA', '1'),
(1153, 266, 'PALOTAL', '1'),
(1154, 266, 'JUAN VICENTE GOMEZ', '1'),
(1155, 266, 'ISAIAS MEDINA ANGARIT', '1'),
(1156, 267, 'CM. CAPACHO NUEVO', '1'),
(1157, 267, 'JUAN GERMAN ROSCIO', '1'),
(1158, 267, 'ROMAN CARDENAS', '1'),
(1159, 268, 'CM. TARIBA', '1'),
(1160, 268, 'LA FLORIDA', '1'),
(1161, 268, 'AMENODORO RANGEL LAMU', '1'),
(1162, 269, 'CM. LA GRITA', '1'),
(1163, 269, 'EMILIO C. GUERRERO', '1'),
(1164, 269, 'MONS. MIGUEL A SALAS', '1'),
(1165, 270, 'CM. RUBIO', '1'),
(1166, 270, 'BRAMON', '1'),
(1167, 270, 'LA PETROLEA', '1'),
(1168, 270, 'QUINIMARI', '1'),
(1169, 271, 'CM. LOBATERA', '1'),
(1170, 271, 'CONSTITUCION', '1'),
(1171, 272, 'LA CONCORDIA', '1'),
(1172, 272, 'PEDRO MARIA MORANTES', '1'),
(1173, 272, 'SN JUAN BAUTISTA', '1'),
(1174, 272, 'SAN SEBASTIAN', '1'),
(1175, 272, 'DR. FCO. ROMERO LOBO', '1'),
(1176, 273, 'CM. PREGONERO', '1'),
(1177, 273, 'CARDENAS', '1'),
(1178, 273, 'POTOSI', '1'),
(1179, 273, 'JUAN PABLO PEÑALOZA', '1'),
(1180, 274, 'CM. STA. ANA  DEL TACHIRA', '1'),
(1181, 275, 'CM. LA FRIA', '1'),
(1182, 275, 'BOCA DE GRITA', '1'),
(1183, 275, 'JOSE ANTONIO PAEZ', '1'),
(1184, 276, 'CM. PALMIRA', '1'),
(1185, 277, 'CM. MICHELENA', '1'),
(1186, 278, 'CM. ABEJALES', '1'),
(1187, 278, 'SAN JOAQUIN DE NAVAY', '1'),
(1188, 278, 'DORADAS', '1'),
(1189, 278, 'EMETERIO OCHOA', '1'),
(1190, 279, 'CM. COLONCITO', '1'),
(1191, 279, 'LA PALMITA', '1'),
(1192, 280, 'CM. UREÑA', '1'),
(1193, 280, 'NUEVA ARCADIA', '1'),
(1194, 281, 'CM. QUENIQUEA', '1'),
(1195, 281, 'SAN PABLO', '1'),
(1196, 281, 'ELEAZAR LOPEZ CONTRERA', '1'),
(1197, 281, 'CM. CORDERO', '1'),
(1198, 283, 'CM.SAN RAFAEL DEL PINAL', '1'),
(1199, 283, 'SANTO DOMINGO', '1'),
(1200, 283, 'ALBERTO ADRIANI', '1'),
(1201, 284, 'CM. CAPACHO VIEJO', '1'),
(1202, 284, 'CIPRIANO CASTRO', '1'),
(1203, 284, 'MANUEL FELIPE RUGELES', '1'),
(1204, 285, 'CM. LA TENDIDA', '1'),
(1205, 285, 'BOCONO', '1'),
(1206, 285, 'HERNANDEZ', '1'),
(1207, 286, 'CM. SEBORUCO', '1'),
(1208, 287, 'CM. LAS MESAS', '1'),
(1209, 288, 'CM. SAN JOSE DE BOLIVAR', '1'),
(1210, 289, 'CM. EL COBRE', '1'),
(1211, 290, 'CM. DELICIAS', '1'),
(1212, 291, 'CM. SAN SIMON', '1'),
(1213, 292, 'CM. SAN JOSECITO', '1'),
(1214, 293, 'CM. UMUQUENA', '1'),
(1215, 294, 'BETIJOQUE', '1'),
(1216, 294, 'JOSE G HERNANDEZ', '1'),
(1217, 294, 'LA PUEBLITA', '1'),
(1218, 294, 'EL CEDRO', '1'),
(1219, 295, 'BOCONO', '1'),
(1220, 295, 'EL CARMEN', '1'),
(1221, 295, 'MOSQUEY', '1'),
(1222, 295, 'AYACUCHO', '1'),
(1223, 295, 'BURBUSAY', '1'),
(1224, 295, 'GENERAL RIVAS', '1'),
(1225, 295, 'MONSEÑOR JAUREGUI', '1'),
(1226, 295, 'RAFAEL RANGEL', '1'),
(1227, 295, 'SAN JOSE', '1'),
(1228, 295, 'SAN MIGUEL', '1'),
(1229, 295, 'GUARAMACAL', '1'),
(1230, 295, 'LA VEGA DE GUARAMACAL', '1'),
(1231, 296, 'CARACHE', '1'),
(1232, 296, 'LA CONCEPCION', '1'),
(1233, 296, 'CUICAS', '1'),
(1234, 296, 'PANAMERICANA', '1'),
(1235, 296, 'SANTA CRUZ', '1'),
(1236, 297, 'ESCUQUE', '1'),
(1237, 297, 'SABANA LIBRE', '1'),
(1238, 297, 'LA UNION', '1'),
(1239, 297, 'SANTA RITA', '1'),
(1240, 298, 'CRISTOBAL MENDOZA', '1'),
(1241, 298, 'CHIQUINQUIRA', '1'),
(1242, 298, 'MATRIZ', '1'),
(1243, 298, 'MONSEÑOR CARRILLO', '1'),
(1244, 298, 'CRUZ CARRILLO', '1'),
(1245, 298, 'ANDRES LINARES', '1'),
(1246, 298, 'TRES ESQUINAS', '1'),
(1247, 299, 'LA QUEBRADA', '1'),
(1248, 299, 'JAJO', '1'),
(1249, 299, 'LA MESA', '1'),
(1250, 299, 'SANTIAGO', '1'),
(1251, 299, 'CABIMBU', '1'),
(1252, 299, 'TUÑAME', '1'),
(1253, 300, 'MERCEDES DIAZ', '1'),
(1254, 300, 'JUAN IGNACIO MONTILLA', '1'),
(1255, 300, 'LA BEATRIZ', '1'),
(1256, 300, 'MENDOZA', '1'),
(1257, 300, 'LA PUERTA', '1'),
(1258, 300, 'SAN LUIS', '1'),
(1259, 301, 'CHEJENDE', '1'),
(1260, 301, 'CARRILLO', '1'),
(1261, 301, 'CEGARRA', '1'),
(1262, 301, 'BOLIVIA', '1'),
(1263, 301, 'MANUEL SALVADOR ULLOA', '1'),
(1264, 301, 'SAN JOSE', '1'),
(1265, 301, 'ARNOLDO GABALDON', '1'),
(1266, 302, 'EL DIVIDIVE', '1'),
(1267, 302, 'AGUA CALIENTE', '1'),
(1268, 302, 'EL CENIZO', '1'),
(1269, 302, 'AGUA SANTA', '1'),
(1270, 302, 'VALERITA', '1'),
(1271, 303, 'MONTE CARMELO', '1'),
(1272, 303, 'BUENA VISTA', '1'),
(1273, 303, 'STA MARIA DEL HORCON', '1'),
(1274, 304, 'MOTATAN', '1'),
(1275, 304, 'EL BAÑO', '1'),
(1276, 304, 'JALISCO', '1'),
(1277, 305, 'PAMPAN', '1'),
(1278, 305, 'SANTA ANA', '1'),
(1279, 305, 'LA PAZ', '1'),
(1280, 305, 'FLOR DE PATRIA', '1'),
(1281, 306, 'CARVAJAL', '1'),
(1282, 306, 'ANTONIO N BRICEÑO', '1'),
(1283, 306, 'CAMPO ALEGRE', '1'),
(1284, 306, 'JOSE LEONARDO SUAREZ', '1'),
(1285, 307, 'SABANA DE MENDOZA', '1'),
(1286, 307, 'JUNIN', '1'),
(1287, 307, 'VALMORE RODRIGUEZ', '1'),
(1288, 307, 'EL PARAISO', '1'),
(1289, 308, 'SANTA ISABEL', '1'),
(1290, 308, 'ARAGUANEY', '1'),
(1291, 308, 'EL JAGUITO', '1'),
(1292, 308, 'LA ESPERANZA', '1'),
(1293, 309, 'SABANA GRANDE', '1'),
(1294, 309, 'CHEREGUE', '1'),
(1295, 309, 'GRANADOS', '1'),
(1296, 310, 'EL SOCORRO', '1'),
(1297, 310, 'LOS CAPRICHOS', '1'),
(1298, 310, 'ANTONIO JOSE DE SUCRE', '1'),
(1299, 311, 'CAMPO ELIAS', '1'),
(1300, 311, 'ARNOLDO GABALDON', '1'),
(1301, 312, 'SANTA APOLONIA', '1'),
(1302, 312, 'LA CEIBA', '1'),
(1303, 312, 'EL PROGRESO', '1'),
(1304, 312, 'TRES DE FEBRERO', '1'),
(1305, 313, 'PAMPANITO', '1'),
(1306, 313, 'PAMPANITO II', '1'),
(1307, 313, 'LA CONCEPCION', '1'),
(1308, 214, 'CM. AROA', '1'),
(1309, 315, 'CM. CHIVACOA', '1'),
(1310, 315, 'CAMPO ELIAS', '1'),
(1311, 316, 'CM. NIRGUA', '1'),
(1312, 316, 'SALOM', '1'),
(1313, 316, 'TEMERLA', '1'),
(1314, 317, 'CM. SAN FELIPE', '1'),
(1315, 317, 'ALBARICO', '1'),
(1316, 317, 'SAN JAVIER', '1'),
(1317, 318, 'CM. GUAMA', '1'),
(1318, 319, 'CM. URACHICHE', '1'),
(1319, 320, 'CM. YARITAGUA', '1'),
(1320, 320, 'SAN ANDRES', '1'),
(1321, 321, 'CM. SABANA DE PARRA', '1'),
(1322, 322, 'CM. BORAURE', '1'),
(1323, 323, 'CM. COCOROTE', '1'),
(1324, 324, 'CM. INDEPENDENCIA', '1'),
(1325, 325, 'CM. SAN PABLO', '1'),
(1326, 326, 'CM. YUMARE', '1'),
(1327, 327, 'CM. FARRIAR', '1'),
(1328, 327, 'EL GUAYABO', '1'),
(1329, 328, 'GENERAL URDANETA', '1'),
(1330, 328, 'LIBERTADOR', '1'),
(1331, 328, 'MANUEL GUANIPA MATOS', '1'),
(1332, 328, 'MARCELINO BRICEÑO', '1'),
(1333, 328, 'SAN TIMOTEO', '1'),
(1334, 328, 'PUEBLO NUEVO', '1'),
(1335, 329, 'PEDRO LUCAS URRIBARRI', '1'),
(1336, 329, 'SANTA RITA', '1'),
(1337, 329, 'JOSE CENOVIO URRIBARR', '1'),
(1338, 329, 'EL MENE', '1'),
(1339, 330, 'SANTA CRUZ DEL ZULIA', '1'),
(1340, 330, 'URRIBARRI', '1'),
(1341, 330, 'MORALITO', '1'),
(1342, 330, 'SAN CARLOS DEL ZULIA', '1'),
(1343, 330, 'SANTA BARBARA', '1'),
(1344, 331, 'LUIS DE VICENTE', '1'),
(1345, 331, 'RICAURTE', '1'),
(1346, 331, 'MONS.MARCOS SERGIO G', '1'),
(1347, 331, 'SAN RAFAEL', '1'),
(1348, 331, 'LAS PARCELAS', '1'),
(1349, 331, 'TAMARE', '1'),
(1350, 331, 'LA SIERRITA', '1'),
(1351, 332, 'BOLIVAR', '1'),
(1352, 332, 'COQUIVACOA', '1'),
(1353, 332, 'CRISTO DE ARANZA', '1'),
(1354, 332, 'CHIQUINQUIRA', '1'),
(1355, 332, 'SANTA LUCIA', '1'),
(1356, 332, 'OLEGARIO VILLALOBOS', '1'),
(1357, 332, 'JUANA DE AVILA', '1'),
(1358, 332, 'CARACCIOLO PARRA PEREZ', '1'),
(1359, 332, 'IDELFONZO VASQUEZ', '1'),
(1360, 332, 'CACIQUE MARA', '1'),
(1361, 332, 'CECILIO ACOSTA', '1'),
(1362, 332, 'RAUL LEONI', '1'),
(1363, 332, 'FRANCISCO EUGENIO B', '1'),
(1364, 332, 'MANUEL DAGNINO', '1'),
(1365, 332, 'LUIS HURTADO HIGUERA', '1'),
(1366, 332, 'VENANCIO PULGAR', '1'),
(1367, 332, 'ANTONIO BORJAS ROMERO', '1'),
(1368, 332, 'SAN ISIDRO', '1'),
(1369, 333, 'FARIA', '1'),
(1370, 333, 'SAN ANTONIO', '1'),
(1371, 333, 'ANA MARIA CAMPOS', '1'),
(1372, 333, 'SAN JOSE', '1'),
(1373, 333, 'ALTAGRACIA', '1'),
(1374, 334, 'GOAJIRA', '1'),
(1375, 334, 'ELIAS SANCHEZ RUBIO', '1'),
(1376, 334, 'SINAMAICA', '1'),
(1377, 334, 'ALTA GUAJIRA', '1'),
(1378, 335, 'SAN JOSE DE PERIJA', '1'),
(1379, 335, 'BARTOLOME DE LAS CASAS', '1'),
(1380, 335, 'LIBERTAD', '1'),
(1381, 335, 'RIO NEGRO', '1'),
(1382, 336, 'GIBRALTAR', '1'),
(1383, 336, 'HERAS', '1'),
(1384, 336, 'M.ARTURO CELESTINO A', '1'),
(1385, 336, 'ROMULO GALLEGOS', '1'),
(1386, 336, 'BOBURES', '1'),
(1387, 336, 'EL BATEY', '1'),
(1388, 337, 'ANDRES BELLO (', '1'),
(1389, 337, 'POTRERITOS', '1'),
(1390, 337, 'EL CARMELO', '1'),
(1391, 337, 'CHIQUINQUIRA', '1'),
(1392, 337, 'CONCEPCION', '1'),
(1393, 338, 'ELEAZAR LOPEZ C', '1'),
(1394, 338, 'ALONSO DE OJEDA', '1'),
(1395, 338, 'VENEZUELA', '1'),
(1396, 338, 'CAMPO LARA', '1'),
(1397, 338, 'LIBERTAD', '1'),
(1398, 339, 'UDON PEREZ', '1'),
(1399, 339, 'ENCONTRADOS', '1'),
(1400, 340, 'DONALDO GARCIA', '1'),
(1401, 340, 'SIXTO ZAMBRANO', '1'),
(1402, 340, 'EL ROSARIO', '1'),
(1403, 341, 'AMBROSIO', '1'),
(1404, 341, 'GERMAN RIOS LINARES', '1'),
(1405, 341, 'JORGE HERNANDEZ', '1'),
(1406, 341, 'LA ROSA', '1'),
(1407, 341, 'PUNTA GORDA', '1'),
(1408, 341, 'CARMEN HERRERA', '1'),
(1409, 341, 'SAN BENITO', '1'),
(1410, 341, 'ROMULO BETANCOURT', '1'),
(1411, 341, 'ARISTIDES CALVANI', '1'),
(1412, 342, 'RAUL CUENCA', '1'),
(1413, 342, 'LA VICTORIA', '1'),
(1414, 342, 'RAFAEL URDANETA', '1'),
(1415, 343, 'JOSE RAMON YEPEZ', '1'),
(1416, 343, 'LA CONCEPCION', '1'),
(1417, 343, 'SAN JOSE', '1'),
(1418, 343, 'MARIANO PARRA LEON', '1'),
(1419, 344, 'MONAGAS', '1'),
(1420, 344, 'ISLA DE TOAS', '1'),
(1421, 345, 'MARCIAL HERNANDEZ', '1'),
(1422, 345, 'FRANCISCO OCHOA', '1'),
(1423, 345, 'SAN FRANCISCO', '1'),
(1424, 345, 'EL BAJO', '1'),
(1425, 345, 'DOMITILA FLORES', '1'),
(1426, 345, 'LOS CORTIJOS', '1'),
(1427, 346, 'BARI', '1'),
(1428, 346, 'JESUS M SEMPRUN', '1'),
(1429, 347, 'SIMON RODRIGUEZ', '1'),
(1430, 347, 'CARLOS QUEVEDO', '1'),
(1431, 347, 'FRANCISCO J PULGAR', '1'),
(1432, 348, 'RAFAEL MARIA BARALT', '1'),
(1433, 348, 'MANUEL MANRIQUE', '1'),
(1434, 348, 'RAFAEL URDANETA', '1'),
(1435, 349, 'FERNANDO GIRON TOVAR', '1'),
(1436, 349, 'LUIS ALBERTO GOMEZ', '1'),
(1437, 349, 'PARHUEÑA', '1'),
(1438, 349, 'PLATANILLAL', '1'),
(1439, 350, 'CM. SAN FERNANDO DE ATABA', '1'),
(1440, 350, 'UCATA', '1'),
(1441, 350, 'YAPACANA', '1'),
(1442, 350, 'CANAME', '1'),
(1443, 351, 'CM. MAROA', '1'),
(1444, 351, 'VICTORINO', '1'),
(1445, 351, 'COMUNIDAD', '1'),
(1446, 352, 'CM. SAN CARLOS DE RIO NEG', '1'),
(1447, 352, 'SOLANO', '1'),
(1448, 352, 'COCUY', '1'),
(1449, 353, 'CM. ISLA DE RATON', '1'),
(1450, 353, 'SAMARIAPO', '1'),
(1451, 353, 'SIPAPO', '1'),
(1452, 353, 'MUNDUAPO', '1'),
(1453, 353, 'GUAYAPO', '1'),
(1454, 354, 'CM. SAN JUAN DE MANAPIARE', '1'),
(1455, 354, 'ALTO VENTUARI', '1'),
(1456, 354, 'MEDIO VENTUARI', '1'),
(1457, 354, 'BAJO VENTUARI', '1'),
(1458, 355, 'CM. LA ESMERALDA', '1'),
(1459, 355, 'HUACHAMACARE', '1'),
(1460, 355, 'MARAWAKA', '1'),
(1461, 355, 'MAVACA', '1'),
(1462, 355, 'SIERRA PARIMA', '1'),
(1463, 356, 'SAN JOSE', '1'),
(1464, 356, 'VIRGEN DEL VALLE', '1'),
(1465, 356, 'SAN RAFAEL', '1'),
(1466, 356, 'JOSE VIDAL MARCANO', '1'),
(1467, 356, 'LEONARDO RUIZ PINEDA', '1'),
(1468, 356, 'MONS. ARGIMIRO GARCIA', '1'),
(1469, 356, 'MCL.ANTONIO J DE SUCRE', '1'),
(1470, 356, 'JUAN MILLAN', '1'),
(1471, 357, 'PEDERNALES', '1'),
(1472, 357, 'LUIS B PRIETO FIGUERO', '1'),
(1473, 358, 'CURIAPO', '1'),
(1474, 358, 'SANTOS DE ABELGAS', '1'),
(1475, 358, 'MANUEL RENAUD', '1'),
(1476, 358, 'PADRE BARRAL', '1'),
(1477, 358, 'ANICETO LUGO', '1'),
(1478, 358, 'ALMIRANTE LUIS BRION', '1'),
(1479, 359, 'IMATACA', '1'),
(1480, 359, 'ROMULO GALLEGOS', '1'),
(1481, 359, 'JUAN BAUTISTA ARISMEN', '1'),
(1482, 359, 'MANUEL PIAR', '1'),
(1483, 359, '5 DE JULIO', '1'),
(1484, 360, 'CARABALLEDA', '1'),
(1485, 360, 'CARAYACA', '1'),
(1486, 360, 'CARUAO', '1'),
(1487, 360, 'CATIA LA MAR', '1'),
(1488, 360, 'LA GUAIRA', '1'),
(1489, 360, 'MACUTO', '1'),
(1490, 360, 'MAIQUETIA', '1'),
(1491, 360, 'NAIGUATA', '1'),
(1492, 360, 'EL JUNKO', '1'),
(1493, 360, 'PQ RAUL LEONI', '1'),
(1494, 360, 'PQ CARLOS SOUBLETTE', '1'),
(1495, 0, 'COLOMBIA', '1'),
(1496, 1495, 'LA GUAJIRA', '1'),
(1497, 1495, 'AMAZONAS', '1'),
(1498, 1495, 'ARAUCA', '1'),
(1499, 1495, 'ANTIOQUIA', '1'),
(1500, 0, 'URUGUAY', '1'),
(1501, 0, 'PERU', '1'),
(1502, 1501, 'LIMA', '1');

CREATE TABLE ".$this->prefix."tcharge (
  idcharge int(11) NOT NULL,
  name varchar(60) NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tcharge (idcharge, name, status) VALUES
(1, 'Administrador', '1');

CREATE TABLE ".$this->prefix."tdcharge_service_action (
  idcharge_service_action int(11) NOT NULL,
  idcharge int(11) NOT NULL,
  idservice int(11) NOT NULL,
  idaction int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tdcharge_service_action (idcharge_service_action, idcharge, idservice, idaction) VALUES
(5279, 1, 22, 1),
(5280, 1, 22, 2),
(5281, 1, 22, 3),
(5282, 1, 22, 4),
(5283, 1, 22, 5),
(5284, 1, 22, 6),
(5285, 1, 22, 7),
(5286, 1, 23, 1),
(5287, 1, 23, 2),
(5288, 1, 23, 3),
(5289, 1, 23, 4),
(5290, 1, 23, 5),
(5291, 1, 23, 7),
(5292, 1, 27, 1),
(5293, 1, 27, 2),
(5294, 1, 27, 3),
(5295, 1, 27, 7),
(5296, 1, 24, 1),
(5297, 1, 24, 2),
(5298, 1, 24, 3),
(5299, 1, 24, 4),
(5300, 1, 24, 5),
(5301, 1, 24, 7),
(5302, 1, 17, 3),
(5303, 1, 17, 6),
(5304, 1, 25, 3),
(5305, 1, 19, 3),
(5306, 1, 19, 6),
(5307, 1, 18, 3),
(5308, 1, 18, 6),
(5309, 1, 28, 2),
(5310, 1, 28, 3),
(5311, 1, 2, 1),
(5312, 1, 2, 2),
(5313, 1, 2, 3),
(5314, 1, 2, 4),
(5315, 1, 2, 5),
(5316, 1, 2, 6),
(5317, 1, 2, 7),
(5318, 1, 15, 1),
(5319, 1, 15, 2),
(5320, 1, 15, 3),
(5321, 1, 15, 4),
(5322, 1, 15, 5),
(5323, 1, 15, 6),
(5324, 1, 15, 7),
(5325, 1, 5, 1),
(5326, 1, 5, 2),
(5327, 1, 5, 3),
(5328, 1, 5, 4),
(5329, 1, 5, 5),
(5330, 1, 5, 6),
(5331, 1, 5, 7),
(5334, 1, 14, 1),
(5335, 1, 14, 2),
(5336, 1, 14, 3),
(5337, 1, 14, 4),
(5338, 1, 14, 5),
(5339, 1, 14, 6),
(5340, 1, 14, 7),
(5341, 1, 4, 1),
(5342, 1, 4, 2),
(5343, 1, 4, 3),
(5344, 1, 4, 4),
(5345, 1, 4, 5),
(5346, 1, 4, 6),
(5347, 1, 4, 7),
(5348, 1, 20, 2),
(5349, 1, 20, 3),
(5350, 1, 8, 1),
(5351, 1, 8, 2),
(5352, 1, 8, 3),
(5353, 1, 8, 4),
(5354, 1, 8, 5),
(5355, 1, 8, 7),
(5356, 1, 3, 1),
(5357, 1, 3, 2),
(5358, 1, 3, 3),
(5359, 1, 3, 4),
(5360, 1, 3, 5),
(5361, 1, 3, 7),
(5364, 1, 6, 1),
(5365, 1, 6, 2),
(5366, 1, 6, 3),
(5367, 1, 6, 4),
(5368, 1, 6, 5),
(5369, 1, 6, 6),
(5370, 1, 6, 7),
(5371, 1, 10, 1),
(5372, 1, 10, 2),
(5373, 1, 10, 3),
(5374, 1, 10, 4),
(5375, 1, 10, 5),
(5376, 1, 10, 6),
(5377, 1, 10, 7),
(5378, 1, 13, 1),
(5379, 1, 13, 2),
(5380, 1, 13, 3),
(5381, 1, 13, 4),
(5382, 1, 13, 5),
(5383, 1, 13, 6),
(5384, 1, 13, 7),
(5385, 1, 12, 1),
(5386, 1, 12, 2),
(5387, 1, 12, 3),
(5388, 1, 12, 4),
(5389, 1, 12, 5),
(5390, 1, 12, 6),
(5391, 1, 12, 7),
(5392, 1, 11, 1),
(5393, 1, 11, 2),
(5394, 1, 11, 3),
(5395, 1, 11, 4),
(5396, 1, 11, 5),
(5397, 1, 11, 6),
(5398, 1, 11, 7),
(5399, 1, 29, 2),
(5400, 1, 29, 3);

CREATE TABLE ".$this->prefix."tdpassword (
  idpassword int(11) NOT NULL,
  iduser int(11) NOT NULL,
  password varchar(250) NOT NULL,
  creation_date timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tdpassword (idpassword, iduser, password, creation_date, status) VALUES
(1, 1, '".$this->encrypter($this->password)."', NOW(), '1');

CREATE TABLE ".$this->prefix."tdquestion_answer (
  idquestion_answer int(11) NOT NULL,
  iduser int(11) NOT NULL,
  question text NOT NULL,
  answer text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tdservice_action (
  idservice_action int(11) NOT NULL,
  idservice int(11) NOT NULL,
  idaction int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tdservice_action (idservice_action, idservice, idaction) VALUES
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
(232, 29, 3);

CREATE TABLE ".$this->prefix."tduser_service_ordered (
  iduser_service_ordered int(11) NOT NULL,
  iduser int(11) NOT NULL,
  idservice int(11) NOT NULL,
  ordered int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE ".$this->prefix."tethnicity (
  idethnicity int(11) NOT NULL,
  name varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  status char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tethnicity (idethnicity, name, status) VALUES
(1, 'NINGUNO', '1'),
(2, 'ACAHUAYO', '1'),
(3, 'ARAHUAC DEL DELTA AMACURO', '1'),
(4, 'ARAHUAC DEL RIO NEGRO', '1'),
(5, 'ARUTANI', '1'),
(6, 'BARI', '1'),
(7, 'GUAJIBO', '1'),
(8, 'GUAJIRO', '1'),
(9, 'GUARAO O WARAO', '1'),
(10, 'GUAYQUERY', '1'),
(11, 'MAPOYO O YAHUANA', '1'),
(12, 'MAQUIRITARE', '1'),
(13, 'PANARE', '1'),
(14, 'PARAUJANO', '1'),
(15, 'PEMON', '1'),
(16, 'PIAROA', '1'),
(17, 'SAPE', '1'),
(18, 'YANOMAMI', '1'),
(19, 'YARURO', '1'),
(20, 'YUCPA', '1'),
(21, 'VOCABLOS DE ORIGEN INDIGENA', '1'),
(22, 'CARI', '1');

CREATE TABLE ".$this->prefix."tgallery (
  idgallery int(11) NOT NULL,
  iduser int(11) DEFAULT NULL,
  src text NOT NULL,
  title text NOT NULL,
  legend text NOT NULL,
  alternative text NOT NULL,
  description text NOT NULL,
  date_created date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."ticon (
  idicon int(11) NOT NULL,
  class varchar(60) NOT NULL,
  name varchar(60) DEFAULT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO ".$this->prefix."ticon (idicon, class, name, status) VALUES
(1, 'glyphicon', 'glyphicon-asterisk', '1'),
(2, 'glyphicon', 'glyphicon-plus', '1'),
(3, 'glyphicon', 'glyphicon-euro', '1'),
(4, 'glyphicon', 'glyphicon-eur', '1'),
(5, 'glyphicon', 'glyphicon-minus', '1'),
(6, 'glyphicon', 'glyphicon-cloud', '1'),
(7, 'glyphicon', 'glyphicon-envelope', '1'),
(8, 'glyphicon', 'glyphicon-pencil', '1'),
(9, 'glyphicon', 'glyphicon-glass', '1'),
(10, 'glyphicon', 'glyphicon-music', '1'),
(11, 'glyphicon', 'glyphicon-search', '1'),
(12, 'glyphicon', 'glyphicon-heart', '1'),
(13, 'glyphicon', 'glyphicon-star', '1'),
(14, 'glyphicon', 'glyphicon-star-empty', '1'),
(15, 'glyphicon', 'glyphicon-user', '1'),
(16, 'glyphicon', 'glyphicon-film', '1'),
(17, 'glyphicon', 'glyphicon-th-large', '1'),
(18, 'glyphicon', 'glyphicon-th', '1'),
(19, 'glyphicon', 'glyphicon-th-list', '1'),
(20, 'glyphicon', 'glyphicon-ok', '1'),
(21, 'glyphicon', 'glyphicon-remove', '1'),
(22, 'glyphicon', 'glyphicon-zoom-in', '1'),
(23, 'glyphicon', 'glyphicon-zoom-out', '1'),
(24, 'glyphicon', 'glyphicon-off', '1'),
(25, 'glyphicon', 'glyphicon-signal', '1'),
(26, 'glyphicon', 'glyphicon-cog', '1'),
(27, 'glyphicon', 'glyphicon-trash', '1'),
(28, 'glyphicon', 'glyphicon-home', '1'),
(29, 'glyphicon', 'glyphicon-file', '1'),
(30, 'glyphicon', 'glyphicon-time', '1'),
(31, 'glyphicon', 'glyphicon-road', '1'),
(32, 'glyphicon', 'glyphicon-download-alt', '1'),
(33, 'glyphicon', 'glyphicon-download', '1'),
(34, 'glyphicon', 'glyphicon-upload', '1'),
(35, 'glyphicon', 'glyphicon-inbox', '1'),
(36, 'glyphicon', 'glyphicon-play-circle', '1'),
(37, 'glyphicon', 'glyphicon-repeat', '1'),
(38, 'glyphicon', 'glyphicon-refresh', '1'),
(39, 'glyphicon', 'glyphicon-list-alt', '1'),
(40, 'glyphicon', 'glyphicon-lock', '1'),
(41, 'glyphicon', 'glyphicon-flag', '1'),
(42, 'glyphicon', 'glyphicon-headphones', '1'),
(43, 'glyphicon', 'glyphicon-volume-off', '1'),
(44, 'glyphicon', 'glyphicon-volume-down', '1'),
(45, 'glyphicon', 'glyphicon-volume-up', '1'),
(46, 'glyphicon', 'glyphicon-qrcode', '1'),
(47, 'glyphicon', 'glyphicon-barcode', '1'),
(48, 'glyphicon', 'glyphicon-tag', '1'),
(49, 'glyphicon', 'glyphicon-tags', '1'),
(50, 'glyphicon', 'glyphicon-book', '1'),
(51, 'glyphicon', 'glyphicon-bookmark', '1'),
(52, 'glyphicon', 'glyphicon-print', '1'),
(53, 'glyphicon', 'glyphicon-camera', '1'),
(54, 'glyphicon', 'glyphicon-font', '1'),
(55, 'glyphicon', 'glyphicon-bold', '1'),
(56, 'glyphicon', 'glyphicon-italic', '1'),
(57, 'glyphicon', 'glyphicon-text-height', '1'),
(58, 'glyphicon', 'glyphicon-text-width', '1'),
(59, 'glyphicon', 'glyphicon-align-left', '1'),
(60, 'glyphicon', 'glyphicon-align-center', '1'),
(61, 'glyphicon', 'glyphicon-align-right', '1'),
(62, 'glyphicon', 'glyphicon-align-justify', '1'),
(63, 'glyphicon', 'glyphicon-list', '1'),
(64, 'glyphicon', 'glyphicon-indent-left', '1'),
(65, 'glyphicon', 'glyphicon-indent-right', '1'),
(66, 'glyphicon', 'glyphicon-facetime-video', '1'),
(67, 'glyphicon', 'glyphicon-picture', '1'),
(68, 'glyphicon', 'glyphicon-map-marker', '1'),
(69, 'glyphicon', 'glyphicon-adjust', '1'),
(70, 'glyphicon', 'glyphicon-tint', '1'),
(71, 'glyphicon', 'glyphicon-edit', '1'),
(72, 'glyphicon', 'glyphicon-share', '1'),
(73, 'glyphicon', 'glyphicon-check', '1'),
(74, 'glyphicon', 'glyphicon-move', '1'),
(75, 'glyphicon', 'glyphicon-step-backward', '1'),
(76, 'glyphicon', 'glyphicon-fast-backward', '1'),
(77, 'glyphicon', 'glyphicon-backward', '1'),
(78, 'glyphicon', 'glyphicon-play', '1'),
(79, 'glyphicon', 'glyphicon-pause', '1'),
(80, 'glyphicon', 'glyphicon-stop', '1'),
(81, 'glyphicon', 'glyphicon-forward', '1'),
(82, 'glyphicon', 'glyphicon-fast-forward', '1'),
(83, 'glyphicon', 'glyphicon-step-forward', '1'),
(84, 'glyphicon', 'glyphicon-eject', '1'),
(85, 'glyphicon', 'glyphicon-chevron-left', '1'),
(86, 'glyphicon', 'glyphicon-chevron-right', '1'),
(87, 'glyphicon', 'glyphicon-plus-sign', '1'),
(88, 'glyphicon', 'glyphicon-minus-sign', '1'),
(89, 'glyphicon', 'glyphicon-remove-sign', '1'),
(90, 'glyphicon', 'glyphicon-ok-sign', '1'),
(91, 'glyphicon', 'glyphicon-question-sign', '1'),
(92, 'glyphicon', 'glyphicon-info-sign', '1'),
(93, 'glyphicon', 'glyphicon-screenshot', '1'),
(94, 'glyphicon', 'glyphicon-remove-circle', '1'),
(95, 'glyphicon', 'glyphicon-ok-circle', '1'),
(96, 'glyphicon', 'glyphicon-ban-circle', '1'),
(97, 'glyphicon', 'glyphicon-arrow-left', '1'),
(98, 'glyphicon', 'glyphicon-arrow-right', '1'),
(99, 'glyphicon', 'glyphicon-arrow-up', '1'),
(100, 'glyphicon', 'glyphicon-arrow-down', '1'),
(101, 'glyphicon', 'glyphicon-share-alt', '1'),
(102, 'glyphicon', 'glyphicon-resize-full', '1'),
(103, 'glyphicon', 'glyphicon-resize-small', '1'),
(104, 'glyphicon', 'glyphicon-exclamation-sign', '1'),
(105, 'glyphicon', 'glyphicon-gift', '1'),
(106, 'glyphicon', 'glyphicon-leaf', '1'),
(107, 'glyphicon', 'glyphicon-fire', '1'),
(108, 'glyphicon', 'glyphicon-eye-open', '1'),
(109, 'glyphicon', 'glyphicon-eye-close', '1'),
(110, 'glyphicon', 'glyphicon-warning-sign', '1'),
(111, 'glyphicon', 'glyphicon-plane', '1'),
(112, 'glyphicon', 'glyphicon-calendar', '1'),
(113, 'glyphicon', 'glyphicon-random', '1'),
(114, 'glyphicon', 'glyphicon-comment', '1'),
(115, 'glyphicon', 'glyphicon-magnet', '1'),
(116, 'glyphicon', 'glyphicon-chevron-up', '1'),
(117, 'glyphicon', 'glyphicon-chevron-down', '1'),
(118, 'glyphicon', 'glyphicon-retweet', '1'),
(119, 'glyphicon', 'glyphicon-shopping-cart', '1'),
(120, 'glyphicon', 'glyphicon-folder-close', '1'),
(121, 'glyphicon', 'glyphicon-folder-open', '1'),
(122, 'glyphicon', 'glyphicon-resize-vertical', '1'),
(123, 'glyphicon', 'glyphicon-resize-horizontal', '1'),
(124, 'glyphicon', 'glyphicon-hdd', '1'),
(125, 'glyphicon', 'glyphicon-bullhorn', '1'),
(126, 'glyphicon', 'glyphicon-bell', '1'),
(127, 'glyphicon', 'glyphicon-certificate', '1'),
(128, 'glyphicon', 'glyphicon-thumbs-up', '1'),
(129, 'glyphicon', 'glyphicon-thumbs-down', '1'),
(130, 'glyphicon', 'glyphicon-hand-right', '1'),
(131, 'glyphicon', 'glyphicon-hand-left', '1'),
(132, 'glyphicon', 'glyphicon-hand-up', '1'),
(133, 'glyphicon', 'glyphicon-hand-down', '1'),
(134, 'glyphicon', 'glyphicon-circle-arrow-right', '1'),
(135, 'glyphicon', 'glyphicon-circle-arrow-left', '1'),
(136, 'glyphicon', 'glyphicon-circle-arrow-up', '1'),
(137, 'glyphicon', 'glyphicon-circle-arrow-down', '1'),
(138, 'glyphicon', 'glyphicon-globe', '1'),
(139, 'glyphicon', 'glyphicon-wrench', '1'),
(140, 'glyphicon', 'glyphicon-tasks', '1'),
(141, 'glyphicon', 'glyphicon-filter', '1'),
(142, 'glyphicon', 'glyphicon-briefcase', '1'),
(143, 'glyphicon', 'glyphicon-fullscreen', '1'),
(144, 'glyphicon', 'glyphicon-dashboard', '1'),
(145, 'glyphicon', 'glyphicon-paperclip', '1'),
(146, 'glyphicon', 'glyphicon-heart-empty', '1'),
(147, 'glyphicon', 'glyphicon-link', '1'),
(148, 'glyphicon', 'glyphicon-phone', '1'),
(149, 'glyphicon', 'glyphicon-pushpin', '1'),
(150, 'glyphicon', 'glyphicon-usd', '1'),
(151, 'glyphicon', 'glyphicon-gbp', '1'),
(152, 'glyphicon', 'glyphicon-sort', '1'),
(153, 'glyphicon', 'glyphicon-sort-by-alphabet', '1'),
(154, 'glyphicon', 'glyphicon-sort-by-alphabet-alt', '1'),
(155, 'glyphicon', 'glyphicon-sort-by-order', '1'),
(156, 'glyphicon', 'glyphicon-sort-by-order-alt', '1'),
(157, 'glyphicon', 'glyphicon-sort-by-attributes', '1'),
(158, 'glyphicon', 'glyphicon-sort-by-attributes-alt', '1'),
(159, 'glyphicon', 'glyphicon-unchecked', '1'),
(160, 'glyphicon', 'glyphicon-expand', '1'),
(161, 'glyphicon', 'glyphicon-collapse-down', '1'),
(162, 'glyphicon', 'glyphicon-collapse-up', '1'),
(163, 'glyphicon', 'glyphicon-log-in', '1'),
(164, 'glyphicon', 'glyphicon-flash', '1'),
(165, 'glyphicon', 'glyphicon-log-out', '1'),
(166, 'glyphicon', 'glyphicon-new-window', '1'),
(167, 'glyphicon', 'glyphicon-record', '1'),
(168, 'glyphicon', 'glyphicon-save', '1'),
(169, 'glyphicon', 'glyphicon-open', '1'),
(170, 'glyphicon', 'glyphicon-saved', '1'),
(171, 'glyphicon', 'glyphicon-import', '1'),
(172, 'glyphicon', 'glyphicon-export', '1'),
(173, 'glyphicon', 'glyphicon-send', '1'),
(174, 'glyphicon', 'glyphicon-floppy-disk', '1'),
(175, 'glyphicon', 'glyphicon-floppy-saved', '1'),
(176, 'glyphicon', 'glyphicon-floppy-remove', '1'),
(177, 'glyphicon', 'glyphicon-floppy-save', '1'),
(178, 'glyphicon', 'glyphicon-floppy-open', '1'),
(179, 'glyphicon', 'glyphicon-credit-card', '1'),
(180, 'glyphicon', 'glyphicon-transfer', '1'),
(181, 'glyphicon', 'glyphicon-cutlery', '1'),
(182, 'glyphicon', 'glyphicon-header', '1'),
(183, 'glyphicon', 'glyphicon-compressed', '1'),
(184, 'glyphicon', 'glyphicon-earphone', '1'),
(185, 'glyphicon', 'glyphicon-phone-alt', '1'),
(186, 'glyphicon', 'glyphicon-tower', '1'),
(187, 'glyphicon', 'glyphicon-stats', '1'),
(188, 'glyphicon', 'glyphicon-sd-video', '1'),
(189, 'glyphicon', 'glyphicon-hd-video', '1'),
(190, 'glyphicon', 'glyphicon-subtitles', '1'),
(191, 'glyphicon', 'glyphicon-sound-stereo', '1'),
(192, 'glyphicon', 'glyphicon-sound-dolby', '1'),
(193, 'glyphicon', 'glyphicon-sound-5-1', '1'),
(194, 'glyphicon', 'glyphicon-sound-6-1', '1'),
(195, 'glyphicon', 'glyphicon-sound-7-1', '1'),
(196, 'glyphicon', 'glyphicon-copyright-mark', '1'),
(197, 'glyphicon', 'glyphicon-registration-mark', '1'),
(198, 'glyphicon', 'glyphicon-cloud-download', '1'),
(199, 'glyphicon', 'glyphicon-cloud-upload', '1'),
(200, 'glyphicon', 'glyphicon-tree-conifer', '1'),
(201, 'glyphicon', 'glyphicon-tree-deciduous', '1'),
(202, 'glyphicon', 'glyphicon-cd', '1'),
(203, 'glyphicon', 'glyphicon-save-file', '1'),
(204, 'glyphicon', 'glyphicon-open-file', '1'),
(205, 'glyphicon', 'glyphicon-level-up', '1'),
(206, 'glyphicon', 'glyphicon-copy', '1'),
(207, 'glyphicon', 'glyphicon-paste', '1'),
(208, 'glyphicon', 'glyphicon-alert', '1'),
(209, 'glyphicon', 'glyphicon-equalizer', '1'),
(210, 'glyphicon', 'glyphicon-king', '1'),
(211, 'glyphicon', 'glyphicon-queen', '1'),
(212, 'glyphicon', 'glyphicon-pawn', '1'),
(213, 'glyphicon', 'glyphicon-bishop', '1'),
(214, 'glyphicon', 'glyphicon-knight', '1'),
(215, 'glyphicon', 'glyphicon-baby-formula', '1'),
(216, 'glyphicon', 'glyphicon-tent', '1'),
(217, 'glyphicon', 'glyphicon-blackboard', '1'),
(218, 'glyphicon', 'glyphicon-bed', '1'),
(219, 'glyphicon', 'glyphicon-apple', '1'),
(220, 'glyphicon', 'glyphicon-erase', '1'),
(221, 'glyphicon', 'glyphicon-hourglass', '1'),
(222, 'glyphicon', 'glyphicon-lamp', '1'),
(223, 'glyphicon', 'glyphicon-duplicate', '1'),
(224, 'glyphicon', 'glyphicon-piggy-bank', '1'),
(225, 'glyphicon', 'glyphicon-scissors', '1'),
(226, 'glyphicon', 'glyphicon-bitcoin', '1'),
(227, 'glyphicon', 'glyphicon-yen', '1'),
(228, 'glyphicon', 'glyphicon-ruble', '1'),
(229, 'glyphicon', 'glyphicon-scale', '1'),
(230, 'glyphicon', 'glyphicon-ice-lolly', '1'),
(231, 'glyphicon', 'glyphicon-ice-lolly-tasted', '1'),
(232, 'glyphicon', 'glyphicon-education', '1'),
(233, 'glyphicon', 'glyphicon-option-horizontal', '1'),
(234, 'glyphicon', 'glyphicon-option-vertical', '1'),
(235, 'glyphicon', 'glyphicon-menu-hamburger', '1'),
(236, 'glyphicon', 'glyphicon-modal-window', '1'),
(237, 'glyphicon', 'glyphicon-oil', '1'),
(238, 'glyphicon', 'glyphicon-grain', '1'),
(239, 'glyphicon', 'glyphicon-sunglasses', '1'),
(240, 'glyphicon', 'glyphicon-text-size', '1'),
(241, 'glyphicon', 'glyphicon-text-color', '1'),
(242, 'glyphicon', 'glyphicon-text-background', '1'),
(243, 'glyphicon', 'glyphicon-object-align-top', '1'),
(244, 'glyphicon', 'glyphicon-object-align-bottom', '1'),
(245, 'glyphicon', 'glyphicon-object-align-horizontal', '1'),
(246, 'glyphicon', 'glyphicon-object-align-left', '1'),
(247, 'glyphicon', 'glyphicon-object-align-vertical', '1'),
(248, 'glyphicon', 'glyphicon-object-align-right', '1'),
(249, 'glyphicon', 'glyphicon-triangle-right', '1'),
(250, 'glyphicon', 'glyphicon-triangle-left', '1'),
(251, 'glyphicon', 'glyphicon-triangle-bottom', '1'),
(252, 'glyphicon', 'glyphicon-triangle-top', '1'),
(253, 'glyphicon', 'glyphicon-console', '1'),
(254, 'glyphicon', 'glyphicon-superscript', '1'),
(255, 'glyphicon', 'glyphicon-subscript', '1'),
(256, 'glyphicon', 'glyphicon-menu-left', '1'),
(257, 'glyphicon', 'glyphicon-menu-right', '1'),
(258, 'glyphicon', 'glyphicon-menu-down', '1'),
(259, 'glyphicon', 'glyphicon-menu-up', '1'),
(260, 'fa', 'fa-american-sign-language-interpreting', '1'),
(261, 'fa', 'fa-assistive-listening-systems', '1'),
(262, 'fa', 'fa-glass', '1'),
(263, 'fa', 'fa-music', '1'),
(264, 'fa', 'fa-search', '1'),
(265, 'fa', 'fa-envelope-o', '1'),
(266, 'fa', 'fa-heart', '1'),
(267, 'fa', 'fa-star', '1'),
(268, 'fa', 'fa-star-o', '1'),
(269, 'fa', 'fa-user', '1'),
(270, 'fa', 'fa-film', '1'),
(271, 'fa', 'fa-th-large', '1'),
(272, 'fa', 'fa-th', '1'),
(273, 'fa', 'fa-th-list', '1'),
(274, 'fa', 'fa-check', '1'),
(275, 'fa', 'fa-remove', '1'),
(276, 'fa', 'fa-close', '1'),
(277, 'fa', 'fa-times', '1'),
(278, 'fa', 'fa-search-plus', '1'),
(279, 'fa', 'fa-search-minus', '1'),
(280, 'fa', 'fa-power-off', '1'),
(281, 'fa', 'fa-signal', '1'),
(282, 'fa', 'fa-gear', '1'),
(283, 'fa', 'fa-cog', '1'),
(284, 'fa', 'fa-trash-o', '1'),
(285, 'fa', 'fa-home', '1'),
(286, 'fa', 'fa-file-o', '1'),
(287, 'fa', 'fa-clock-o', '1'),
(288, 'fa', 'fa-road', '1'),
(289, 'fa', 'fa-download', '1'),
(290, 'fa', 'fa-arrow-circle-o-down', '1'),
(291, 'fa', 'fa-arrow-circle-o-up', '1'),
(292, 'fa', 'fa-inbox', '1'),
(293, 'fa', 'fa-play-circle-o', '1'),
(294, 'fa', 'fa-rotate-right', '1'),
(295, 'fa', 'fa-repeat', '1'),
(296, 'fa', 'fa-refresh', '1'),
(297, 'fa', 'fa-list-alt', '1'),
(298, 'fa', 'fa-lock', '1'),
(299, 'fa', 'fa-flag', '1'),
(300, 'fa', 'fa-headphones', '1'),
(301, 'fa', 'fa-volume-off', '1'),
(302, 'fa', 'fa-volume-down', '1'),
(303, 'fa', 'fa-volume-up', '1'),
(304, 'fa', 'fa-qrcode', '1'),
(305, 'fa', 'fa-barcode', '1'),
(306, 'fa', 'fa-tag', '1'),
(307, 'fa', 'fa-tags', '1'),
(308, 'fa', 'fa-book', '1'),
(309, 'fa', 'fa-bookmark', '1'),
(310, 'fa', 'fa-print', '1'),
(311, 'fa', 'fa-camera', '1'),
(312, 'fa', 'fa-font', '1'),
(313, 'fa', 'fa-bold', '1'),
(314, 'fa', 'fa-italic', '1'),
(315, 'fa', 'fa-text-height', '1'),
(316, 'fa', 'fa-text-width', '1'),
(317, 'fa', 'fa-align-left', '1'),
(318, 'fa', 'fa-align-center', '1'),
(319, 'fa', 'fa-align-right', '1'),
(320, 'fa', 'fa-align-justify', '1'),
(321, 'fa', 'fa-list', '1'),
(322, 'fa', 'fa-dedent', '1'),
(323, 'fa', 'fa-outdent', '1'),
(324, 'fa', 'fa-indent', '1'),
(325, 'fa', 'fa-video-camera', '1'),
(326, 'fa', 'fa-photo', '1'),
(327, 'fa', 'fa-image', '1'),
(328, 'fa', 'fa-picture-o', '1'),
(329, 'fa', 'fa-pencil', '1'),
(330, 'fa', 'fa-map-marker', '1'),
(331, 'fa', 'fa-adjust', '1'),
(332, 'fa', 'fa-tint', '1'),
(333, 'fa', 'fa-edit', '1'),
(334, 'fa', 'fa-pencil-square-o', '1'),
(335, 'fa', 'fa-share-square-o', '1'),
(336, 'fa', 'fa-check-square-o', '1'),
(337, 'fa', 'fa-arrows', '1'),
(338, 'fa', 'fa-step-backward', '1'),
(339, 'fa', 'fa-fast-backward', '1'),
(340, 'fa', 'fa-backward', '1'),
(341, 'fa', 'fa-play', '1'),
(342, 'fa', 'fa-pause', '1'),
(343, 'fa', 'fa-stop', '1'),
(344, 'fa', 'fa-forward', '1'),
(345, 'fa', 'fa-fast-forward', '1'),
(346, 'fa', 'fa-step-forward', '1'),
(347, 'fa', 'fa-eject', '1'),
(348, 'fa', 'fa-chevron-left', '1'),
(349, 'fa', 'fa-chevron-right', '1'),
(350, 'fa', 'fa-plus-circle', '1'),
(351, 'fa', 'fa-minus-circle', '1'),
(352, 'fa', 'fa-times-circle', '1'),
(353, 'fa', 'fa-check-circle', '1'),
(354, 'fa', 'fa-question-circle', '1'),
(355, 'fa', 'fa-info-circle', '1'),
(356, 'fa', 'fa-crosshairs', '1'),
(357, 'fa', 'fa-times-circle-o', '1'),
(358, 'fa', 'fa-check-circle-o', '1'),
(359, 'fa', 'fa-ban', '1'),
(360, 'fa', 'fa-arrow-left', '1'),
(361, 'fa', 'fa-arrow-right', '1'),
(362, 'fa', 'fa-arrow-up', '1'),
(363, 'fa', 'fa-arrow-down', '1'),
(364, 'fa', 'fa-mail-forward', '1'),
(365, 'fa', 'fa-share', '1'),
(366, 'fa', 'fa-expand', '1'),
(367, 'fa', 'fa-compress', '1'),
(368, 'fa', 'fa-plus', '1'),
(369, 'fa', 'fa-minus', '1'),
(370, 'fa', 'fa-asterisk', '1'),
(371, 'fa', 'fa-exclamation-circle', '1'),
(372, 'fa', 'fa-gift', '1'),
(373, 'fa', 'fa-leaf', '1'),
(374, 'fa', 'fa-fire', '1'),
(375, 'fa', 'fa-eye', '1'),
(376, 'fa', 'fa-eye-slash', '1'),
(377, 'fa', 'fa-warning', '1'),
(378, 'fa', 'fa-exclamation-triangle', '1'),
(379, 'fa', 'fa-plane', '1'),
(380, 'fa', 'fa-calendar', '1'),
(381, 'fa', 'fa-random', '1'),
(382, 'fa', 'fa-comment', '1'),
(383, 'fa', 'fa-magnet', '1'),
(384, 'fa', 'fa-chevron-up', '1'),
(385, 'fa', 'fa-chevron-down', '1'),
(386, 'fa', 'fa-retweet', '1'),
(387, 'fa', 'fa-shopping-cart', '1'),
(388, 'fa', 'fa-folder', '1'),
(389, 'fa', 'fa-folder-open', '1'),
(390, 'fa', 'fa-arrows-v', '1'),
(391, 'fa', 'fa-arrows-h', '1'),
(392, 'fa', 'fa-bar-chart-o', '1'),
(393, 'fa', 'fa-bar-chart', '1'),
(394, 'fa', 'fa-twitter-square', '1'),
(395, 'fa', 'fa-facebook-square', '1'),
(396, 'fa', 'fa-camera-retro', '1'),
(397, 'fa', 'fa-key', '1'),
(398, 'fa', 'fa-gears', '1'),
(399, 'fa', 'fa-cogs', '1'),
(400, 'fa', 'fa-comments', '1'),
(401, 'fa', 'fa-thumbs-o-up', '1'),
(402, 'fa', 'fa-thumbs-o-down', '1'),
(403, 'fa', 'fa-star-half', '1'),
(404, 'fa', 'fa-heart-o', '1'),
(405, 'fa', 'fa-sign-out', '1'),
(406, 'fa', 'fa-linkedin-square', '1'),
(407, 'fa', 'fa-thumb-tack', '1'),
(408, 'fa', 'fa-external-link', '1'),
(409, 'fa', 'fa-sign-in', '1'),
(410, 'fa', 'fa-trophy', '1'),
(411, 'fa', 'fa-github-square', '1'),
(412, 'fa', 'fa-upload', '1'),
(413, 'fa', 'fa-lemon-o', '1'),
(414, 'fa', 'fa-phone', '1'),
(415, 'fa', 'fa-square-o', '1'),
(416, 'fa', 'fa-bookmark-o', '1'),
(417, 'fa', 'fa-phone-square', '1'),
(418, 'fa', 'fa-twitter', '1'),
(419, 'fa', 'fa-facebook-f', '1'),
(420, 'fa', 'fa-facebook', '1'),
(421, 'fa', 'fa-github', '1'),
(422, 'fa', 'fa-unlock', '1'),
(423, 'fa', 'fa-credit-card', '1'),
(424, 'fa', 'fa-feed', '1'),
(425, 'fa', 'fa-rss', '1'),
(426, 'fa', 'fa-hdd-o', '1'),
(427, 'fa', 'fa-bullhorn', '1'),
(428, 'fa', 'fa-bell', '1'),
(429, 'fa', 'fa-certificate', '1'),
(430, 'fa', 'fa-hand-o-right', '1'),
(431, 'fa', 'fa-hand-o-left', '1'),
(432, 'fa', 'fa-hand-o-up', '1'),
(433, 'fa', 'fa-hand-o-down', '1'),
(434, 'fa', 'fa-arrow-circle-left', '1'),
(435, 'fa', 'fa-arrow-circle-right', '1'),
(436, 'fa', 'fa-arrow-circle-up', '1'),
(437, 'fa', 'fa-arrow-circle-down', '1'),
(438, 'fa', 'fa-globe', '1'),
(439, 'fa', 'fa-wrench', '1'),
(440, 'fa', 'fa-tasks', '1'),
(441, 'fa', 'fa-filter', '1'),
(442, 'fa', 'fa-briefcase', '1'),
(443, 'fa', 'fa-arrows-alt', '1'),
(444, 'fa', 'fa-group', '1'),
(445, 'fa', 'fa-users', '1'),
(446, 'fa', 'fa-chain', '1'),
(447, 'fa', 'fa-link', '1'),
(448, 'fa', 'fa-cloud', '1'),
(449, 'fa', 'fa-flask', '1'),
(450, 'fa', 'fa-cut', '1'),
(451, 'fa', 'fa-scissors', '1'),
(452, 'fa', 'fa-copy', '1'),
(453, 'fa', 'fa-files-o', '1'),
(454, 'fa', 'fa-paperclip', '1'),
(455, 'fa', 'fa-save', '1'),
(456, 'fa', 'fa-floppy-o', '1'),
(457, 'fa', 'fa-square', '1'),
(458, 'fa', 'fa-navicon', '1'),
(459, 'fa', 'fa-reorder', '1'),
(460, 'fa', 'fa-bars', '1'),
(461, 'fa', 'fa-list-ul', '1'),
(462, 'fa', 'fa-list-ol', '1'),
(463, 'fa', 'fa-strikethrough', '1'),
(464, 'fa', 'fa-underline', '1'),
(465, 'fa', 'fa-table', '1'),
(466, 'fa', 'fa-magic', '1'),
(467, 'fa', 'fa-truck', '1'),
(468, 'fa', 'fa-pinterest', '1'),
(469, 'fa', 'fa-pinterest-square', '1'),
(470, 'fa', 'fa-google-plus-square', '1'),
(471, 'fa', 'fa-google-plus', '1'),
(472, 'fa', 'fa-money', '1'),
(473, 'fa', 'fa-caret-down', '1'),
(474, 'fa', 'fa-caret-up', '1'),
(475, 'fa', 'fa-caret-left', '1'),
(476, 'fa', 'fa-caret-right', '1'),
(477, 'fa', 'fa-columns', '1'),
(478, 'fa', 'fa-unsorted', '1'),
(479, 'fa', 'fa-sort', '1'),
(480, 'fa', 'fa-sort-down', '1'),
(481, 'fa', 'fa-sort-desc', '1'),
(482, 'fa', 'fa-sort-up', '1'),
(483, 'fa', 'fa-sort-asc', '1'),
(484, 'fa', 'fa-envelope', '1'),
(485, 'fa', 'fa-linkedin', '1'),
(486, 'fa', 'fa-rotate-left', '1'),
(487, 'fa', 'fa-undo', '1'),
(488, 'fa', 'fa-legal', '1'),
(489, 'fa', 'fa-gavel', '1'),
(490, 'fa', 'fa-dashboard', '1'),
(491, 'fa', 'fa-tachometer', '1'),
(492, 'fa', 'fa-comment-o', '1'),
(493, 'fa', 'fa-comments-o', '1'),
(494, 'fa', 'fa-flash', '1'),
(495, 'fa', 'fa-bolt', '1'),
(496, 'fa', 'fa-sitemap', '1'),
(497, 'fa', 'fa-umbrella', '1'),
(498, 'fa', 'fa-paste', '1'),
(499, 'fa', 'fa-clipboard', '1'),
(500, 'fa', 'fa-lightbulb-o', '1'),
(501, 'fa', 'fa-exchange', '1'),
(502, 'fa', 'fa-cloud-download', '1'),
(503, 'fa', 'fa-cloud-upload', '1'),
(504, 'fa', 'fa-user-md', '1'),
(505, 'fa', 'fa-stethoscope', '1'),
(506, 'fa', 'fa-suitcase', '1'),
(507, 'fa', 'fa-bell-o', '1'),
(508, 'fa', 'fa-coffee', '1'),
(509, 'fa', 'fa-cutlery', '1'),
(510, 'fa', 'fa-file-text-o', '1'),
(511, 'fa', 'fa-building-o', '1'),
(512, 'fa', 'fa-hospital-o', '1'),
(513, 'fa', 'fa-ambulance', '1'),
(514, 'fa', 'fa-medkit', '1'),
(515, 'fa', 'fa-fighter-jet', '1'),
(516, 'fa', 'fa-beer', '1'),
(517, 'fa', 'fa-h-square', '1'),
(518, 'fa', 'fa-plus-square', '1'),
(519, 'fa', 'fa-angle-double-left', '1'),
(520, 'fa', 'fa-angle-double-right', '1'),
(521, 'fa', 'fa-angle-double-up', '1'),
(522, 'fa', 'fa-angle-double-down', '1'),
(523, 'fa', 'fa-angle-left', '1'),
(524, 'fa', 'fa-angle-right', '1'),
(525, 'fa', 'fa-angle-up', '1'),
(526, 'fa', 'fa-angle-down', '1'),
(527, 'fa', 'fa-desktop', '1'),
(528, 'fa', 'fa-laptop', '1'),
(529, 'fa', 'fa-tablet', '1'),
(530, 'fa', 'fa-mobile-phone', '1'),
(531, 'fa', 'fa-mobile', '1'),
(532, 'fa', 'fa-circle-o', '1'),
(533, 'fa', 'fa-quote-left', '1'),
(534, 'fa', 'fa-quote-right', '1'),
(535, 'fa', 'fa-spinner', '1'),
(536, 'fa', 'fa-circle', '1'),
(537, 'fa', 'fa-mail-reply', '1'),
(538, 'fa', 'fa-reply', '1'),
(539, 'fa', 'fa-github-alt', '1'),
(540, 'fa', 'fa-folder-o', '1'),
(541, 'fa', 'fa-folder-open-o', '1'),
(542, 'fa', 'fa-smile-o', '1'),
(543, 'fa', 'fa-frown-o', '1'),
(544, 'fa', 'fa-meh-o', '1'),
(545, 'fa', 'fa-gamepad', '1'),
(546, 'fa', 'fa-keyboard-o', '1'),
(547, 'fa', 'fa-flag-o', '1'),
(548, 'fa', 'fa-flag-checkered', '1'),
(549, 'fa', 'fa-terminal', '1'),
(550, 'fa', 'fa-code', '1'),
(551, 'fa', 'fa-mail-reply-all', '1'),
(552, 'fa', 'fa-reply-all', '1'),
(553, 'fa', 'fa-star-half-empty', '1'),
(554, 'fa', 'fa-star-half-full', '1'),
(555, 'fa', 'fa-star-half-o', '1'),
(556, 'fa', 'fa-location-arrow', '1'),
(557, 'fa', 'fa-crop', '1'),
(558, 'fa', 'fa-code-fork', '1'),
(559, 'fa', 'fa-unlink', '1'),
(560, 'fa', 'fa-chain-broken', '1'),
(561, 'fa', 'fa-question', '1'),
(562, 'fa', 'fa-info', '1'),
(563, 'fa', 'fa-exclamation', '1'),
(564, 'fa', 'fa-superscript', '1'),
(565, 'fa', 'fa-subscript', '1'),
(566, 'fa', 'fa-eraser', '1'),
(567, 'fa', 'fa-puzzle-piece', '1'),
(568, 'fa', 'fa-microphone', '1'),
(569, 'fa', 'fa-microphone-slash', '1'),
(570, 'fa', 'fa-shield', '1'),
(571, 'fa', 'fa-calendar-o', '1'),
(572, 'fa', 'fa-fire-extinguisher', '1'),
(573, 'fa', 'fa-rocket', '1'),
(574, 'fa', 'fa-maxcdn', '1'),
(575, 'fa', 'fa-chevron-circle-left', '1'),
(576, 'fa', 'fa-chevron-circle-right', '1'),
(577, 'fa', 'fa-chevron-circle-up', '1'),
(578, 'fa', 'fa-chevron-circle-down', '1'),
(579, 'fa', 'fa-html5', '1'),
(580, 'fa', 'fa-css3', '1'),
(581, 'fa', 'fa-anchor', '1'),
(582, 'fa', 'fa-unlock-alt', '1'),
(583, 'fa', 'fa-bullseye', '1'),
(584, 'fa', 'fa-ellipsis-h', '1'),
(585, 'fa', 'fa-ellipsis-v', '1'),
(586, 'fa', 'fa-rss-square', '1'),
(587, 'fa', 'fa-play-circle', '1'),
(588, 'fa', 'fa-ticket', '1'),
(589, 'fa', 'fa-minus-square', '1'),
(590, 'fa', 'fa-minus-square-o', '1'),
(591, 'fa', 'fa-level-up', '1'),
(592, 'fa', 'fa-level-down', '1'),
(593, 'fa', 'fa-check-square', '1'),
(594, 'fa', 'fa-pencil-square', '1'),
(595, 'fa', 'fa-external-link-square', '1'),
(596, 'fa', 'fa-share-square', '1'),
(597, 'fa', 'fa-compass', '1'),
(598, 'fa', 'fa-toggle-down', '1'),
(599, 'fa', 'fa-caret-square-o-down', '1'),
(600, 'fa', 'fa-toggle-up', '1'),
(601, 'fa', 'fa-caret-square-o-up', '1'),
(602, 'fa', 'fa-toggle-right', '1'),
(603, 'fa', 'fa-caret-square-o-right', '1'),
(604, 'fa', 'fa-euro', '1'),
(605, 'fa', 'fa-eur', '1'),
(606, 'fa', 'fa-gbp', '1'),
(607, 'fa', 'fa-dollar', '1'),
(608, 'fa', 'fa-usd', '1'),
(609, 'fa', 'fa-rupee', '1'),
(610, 'fa', 'fa-inr', '1'),
(611, 'fa', 'fa-cny', '1'),
(612, 'fa', 'fa-rmb', '1'),
(613, 'fa', 'fa-yen', '1'),
(614, 'fa', 'fa-jpy', '1'),
(615, 'fa', 'fa-ruble', '1'),
(616, 'fa', 'fa-rouble', '1'),
(617, 'fa', 'fa-rub', '1'),
(618, 'fa', 'fa-won', '1'),
(619, 'fa', 'fa-krw', '1'),
(620, 'fa', 'fa-bitcoin', '1'),
(621, 'fa', 'fa-btc', '1'),
(622, 'fa', 'fa-file', '1'),
(623, 'fa', 'fa-file-text', '1'),
(624, 'fa', 'fa-sort-alpha-asc', '1'),
(625, 'fa', 'fa-sort-alpha-desc', '1'),
(626, 'fa', 'fa-sort-amount-asc', '1'),
(627, 'fa', 'fa-sort-amount-desc', '1'),
(628, 'fa', 'fa-sort-numeric-asc', '1'),
(629, 'fa', 'fa-sort-numeric-desc', '1'),
(630, 'fa', 'fa-thumbs-up', '1'),
(631, 'fa', 'fa-thumbs-down', '1'),
(632, 'fa', 'fa-youtube-square', '1'),
(633, 'fa', 'fa-youtube', '1'),
(634, 'fa', 'fa-xing', '1'),
(635, 'fa', 'fa-xing-square', '1'),
(636, 'fa', 'fa-youtube-play', '1'),
(637, 'fa', 'fa-dropbox', '1'),
(638, 'fa', 'fa-stack-overflow', '1'),
(639, 'fa', 'fa-instagram', '1'),
(640, 'fa', 'fa-flickr', '1'),
(641, 'fa', 'fa-adn', '1'),
(642, 'fa', 'fa-bitbucket', '1'),
(643, 'fa', 'fa-bitbucket-square', '1'),
(644, 'fa', 'fa-tumblr', '1'),
(645, 'fa', 'fa-tumblr-square', '1'),
(646, 'fa', 'fa-long-arrow-down', '1'),
(647, 'fa', 'fa-long-arrow-up', '1'),
(648, 'fa', 'fa-long-arrow-left', '1'),
(649, 'fa', 'fa-long-arrow-right', '1'),
(650, 'fa', 'fa-apple', '1'),
(651, 'fa', 'fa-windows', '1'),
(652, 'fa', 'fa-android', '1'),
(653, 'fa', 'fa-linux', '1'),
(654, 'fa', 'fa-dribbble', '1'),
(655, 'fa', 'fa-skype', '1'),
(656, 'fa', 'fa-foursquare', '1'),
(657, 'fa', 'fa-trello', '1'),
(658, 'fa', 'fa-female', '1'),
(659, 'fa', 'fa-male', '1'),
(660, 'fa', 'fa-gittip', '1'),
(661, 'fa', 'fa-gratipay', '1'),
(662, 'fa', 'fa-sun-o', '1'),
(663, 'fa', 'fa-moon-o', '1'),
(664, 'fa', 'fa-archive', '1'),
(665, 'fa', 'fa-bug', '1'),
(666, 'fa', 'fa-vk', '1'),
(667, 'fa', 'fa-weibo', '1'),
(668, 'fa', 'fa-renren', '1'),
(669, 'fa', 'fa-pagelines', '1'),
(670, 'fa', 'fa-stack-exchange', '1'),
(671, 'fa', 'fa-arrow-circle-o-right', '1'),
(672, 'fa', 'fa-arrow-circle-o-left', '1'),
(673, 'fa', 'fa-toggle-left', '1'),
(674, 'fa', 'fa-caret-square-o-left', '1'),
(675, 'fa', 'fa-dot-circle-o', '1'),
(676, 'fa', 'fa-wheelchair', '1'),
(677, 'fa', 'fa-vimeo-square', '1'),
(678, 'fa', 'fa-turkish-lira', '1'),
(679, 'fa', 'fa-try', '1'),
(680, 'fa', 'fa-plus-square-o', '1'),
(681, 'fa', 'fa-space-shuttle', '1'),
(682, 'fa', 'fa-slack', '1'),
(683, 'fa', 'fa-envelope-square', '1'),
(684, 'fa', 'fa-wordpress', '1'),
(685, 'fa', 'fa-openid', '1'),
(686, 'fa', 'fa-institution', '1'),
(687, 'fa', 'fa-bank', '1'),
(688, 'fa', 'fa-university', '1'),
(689, 'fa', 'fa-mortar-board', '1'),
(690, 'fa', 'fa-graduation-cap', '1'),
(691, 'fa', 'fa-yahoo', '1'),
(692, 'fa', 'fa-google', '1'),
(693, 'fa', 'fa-reddit', '1'),
(694, 'fa', 'fa-reddit-square', '1'),
(695, 'fa', 'fa-stumbleupon-circle', '1'),
(696, 'fa', 'fa-stumbleupon', '1'),
(697, 'fa', 'fa-delicious', '1'),
(698, 'fa', 'fa-digg', '1'),
(699, 'fa', 'fa-pied-piper-pp', '1'),
(700, 'fa', 'fa-pied-piper-alt', '1'),
(701, 'fa', 'fa-drupal', '1'),
(702, 'fa', 'fa-joomla', '1'),
(703, 'fa', 'fa-language', '1'),
(704, 'fa', 'fa-fax', '1'),
(705, 'fa', 'fa-building', '1'),
(706, 'fa', 'fa-child', '1'),
(707, 'fa', 'fa-paw', '1'),
(708, 'fa', 'fa-spoon', '1'),
(709, 'fa', 'fa-cube', '1'),
(710, 'fa', 'fa-cubes', '1'),
(711, 'fa', 'fa-behance', '1'),
(712, 'fa', 'fa-behance-square', '1'),
(713, 'fa', 'fa-steam', '1'),
(714, 'fa', 'fa-steam-square', '1'),
(715, 'fa', 'fa-recycle', '1'),
(716, 'fa', 'fa-automobile', '1'),
(717, 'fa', 'fa-car', '1'),
(718, 'fa', 'fa-cab', '1'),
(719, 'fa', 'fa-taxi', '1'),
(720, 'fa', 'fa-tree', '1'),
(721, 'fa', 'fa-spotify', '1'),
(722, 'fa', 'fa-deviantart', '1'),
(723, 'fa', 'fa-soundcloud', '1'),
(724, 'fa', 'fa-database', '1'),
(725, 'fa', 'fa-file-pdf-o', '1'),
(726, 'fa', 'fa-file-word-o', '1'),
(727, 'fa', 'fa-file-excel-o', '1'),
(728, 'fa', 'fa-file-powerpoint-o', '1'),
(729, 'fa', 'fa-file-photo-o', '1'),
(730, 'fa', 'fa-file-picture-o', '1'),
(731, 'fa', 'fa-file-image-o', '1'),
(732, 'fa', 'fa-file-zip-o', '1'),
(733, 'fa', 'fa-file-archive-o', '1'),
(734, 'fa', 'fa-file-sound-o', '1'),
(735, 'fa', 'fa-file-audio-o', '1'),
(736, 'fa', 'fa-file-movie-o', '1'),
(737, 'fa', 'fa-file-video-o', '1'),
(738, 'fa', 'fa-file-code-o', '1'),
(739, 'fa', 'fa-vine', '1'),
(740, 'fa', 'fa-codepen', '1'),
(741, 'fa', 'fa-jsfiddle', '1'),
(742, 'fa', 'fa-life-bouy', '1'),
(743, 'fa', 'fa-life-buoy', '1'),
(744, 'fa', 'fa-life-saver', '1'),
(745, 'fa', 'fa-support', '1'),
(746, 'fa', 'fa-life-ring', '1'),
(747, 'fa', 'fa-circle-o-notch', '1'),
(748, 'fa', 'fa-ra', '1'),
(749, 'fa', 'fa-resistance', '1'),
(750, 'fa', 'fa-rebel', '1'),
(751, 'fa', 'fa-ge', '1'),
(752, 'fa', 'fa-empire', '1'),
(753, 'fa', 'fa-git-square', '1'),
(754, 'fa', 'fa-git', '1'),
(755, 'fa', 'fa-y-combinator-square', '1'),
(756, 'fa', 'fa-yc-square', '1'),
(757, 'fa', 'fa-hacker-news', '1'),
(758, 'fa', 'fa-tencent-weibo', '1'),
(759, 'fa', 'fa-qq', '1'),
(760, 'fa', 'fa-wechat', '1'),
(761, 'fa', 'fa-weixin', '1'),
(762, 'fa', 'fa-send', '1'),
(763, 'fa', 'fa-paper-plane', '1'),
(764, 'fa', 'fa-send-o', '1'),
(765, 'fa', 'fa-paper-plane-o', '1'),
(766, 'fa', 'fa-history', '1'),
(767, 'fa', 'fa-circle-thin', '1'),
(768, 'fa', 'fa-header', '1'),
(769, 'fa', 'fa-paragraph', '1'),
(770, 'fa', 'fa-sliders', '1'),
(771, 'fa', 'fa-share-alt', '1'),
(772, 'fa', 'fa-share-alt-square', '1'),
(773, 'fa', 'fa-bomb', '1'),
(774, 'fa', 'fa-soccer-ball-o', '1'),
(775, 'fa', 'fa-futbol-o', '1'),
(776, 'fa', 'fa-tty', '1'),
(777, 'fa', 'fa-binoculars', '1'),
(778, 'fa', 'fa-plug', '1'),
(779, 'fa', 'fa-slideshare', '1'),
(780, 'fa', 'fa-twitch', '1'),
(781, 'fa', 'fa-yelp', '1'),
(782, 'fa', 'fa-newspaper-o', '1'),
(783, 'fa', 'fa-wifi', '1'),
(784, 'fa', 'fa-calculator', '1'),
(785, 'fa', 'fa-paypal', '1'),
(786, 'fa', 'fa-google-wallet', '1'),
(787, 'fa', 'fa-cc-visa', '1'),
(788, 'fa', 'fa-cc-mastercard', '1'),
(789, 'fa', 'fa-cc-discover', '1'),
(790, 'fa', 'fa-cc-amex', '1'),
(791, 'fa', 'fa-cc-paypal', '1'),
(792, 'fa', 'fa-cc-stripe', '1'),
(793, 'fa', 'fa-bell-slash', '1'),
(794, 'fa', 'fa-bell-slash-o', '1'),
(795, 'fa', 'fa-trash', '1'),
(796, 'fa', 'fa-copyright', '1'),
(797, 'fa', 'fa-at', '1'),
(798, 'fa', 'fa-eyedropper', '1'),
(799, 'fa', 'fa-paint-brush', '1'),
(800, 'fa', 'fa-birthday-cake', '1'),
(801, 'fa', 'fa-area-chart', '1'),
(802, 'fa', 'fa-pie-chart', '1'),
(803, 'fa', 'fa-line-chart', '1'),
(804, 'fa', 'fa-lastfm', '1'),
(805, 'fa', 'fa-lastfm-square', '1'),
(806, 'fa', 'fa-toggle-off', '1'),
(807, 'fa', 'fa-toggle-on', '1'),
(808, 'fa', 'fa-bicycle', '1'),
(809, 'fa', 'fa-bus', '1'),
(810, 'fa', 'fa-ioxhost', '1'),
(811, 'fa', 'fa-angellist', '1'),
(812, 'fa', 'fa-cc', '1'),
(813, 'fa', 'fa-shekel', '1'),
(814, 'fa', 'fa-sheqel', '1'),
(815, 'fa', 'fa-ils', '1'),
(816, 'fa', 'fa-meanpath', '1'),
(817, 'fa', 'fa-buysellads', '1'),
(818, 'fa', 'fa-connectdevelop', '1'),
(819, 'fa', 'fa-dashcube', '1'),
(820, 'fa', 'fa-forumbee', '1'),
(821, 'fa', 'fa-leanpub', '1'),
(822, 'fa', 'fa-sellsy', '1'),
(823, 'fa', 'fa-shirtsinbulk', '1'),
(824, 'fa', 'fa-simplybuilt', '1'),
(825, 'fa', 'fa-skyatlas', '1'),
(826, 'fa', 'fa-cart-plus', '1'),
(827, 'fa', 'fa-cart-arrow-down', '1'),
(828, 'fa', 'fa-diamond', '1'),
(829, 'fa', 'fa-ship', '1'),
(830, 'fa', 'fa-user-secret', '1'),
(831, 'fa', 'fa-motorcycle', '1'),
(832, 'fa', 'fa-street-view', '1'),
(833, 'fa', 'fa-heartbeat', '1'),
(834, 'fa', 'fa-venus', '1'),
(835, 'fa', 'fa-mars', '1'),
(836, 'fa', 'fa-mercury', '1'),
(837, 'fa', 'fa-intersex', '1'),
(838, 'fa', 'fa-transgender', '1'),
(839, 'fa', 'fa-transgender-alt', '1'),
(840, 'fa', 'fa-venus-double', '1'),
(841, 'fa', 'fa-mars-double', '1'),
(842, 'fa', 'fa-venus-mars', '1'),
(843, 'fa', 'fa-mars-stroke', '1'),
(844, 'fa', 'fa-mars-stroke-v', '1'),
(845, 'fa', 'fa-mars-stroke-h', '1'),
(846, 'fa', 'fa-neuter', '1'),
(847, 'fa', 'fa-genderless', '1'),
(848, 'fa', 'fa-facebook-official', '1'),
(849, 'fa', 'fa-pinterest-p', '1'),
(850, 'fa', 'fa-whatsapp', '1'),
(851, 'fa', 'fa-server', '1'),
(852, 'fa', 'fa-user-plus', '1'),
(853, 'fa', 'fa-user-times', '1'),
(854, 'fa', 'fa-hotel', '1'),
(855, 'fa', 'fa-bed', '1'),
(856, 'fa', 'fa-viacoin', '1'),
(857, 'fa', 'fa-train', '1'),
(858, 'fa', 'fa-subway', '1'),
(859, 'fa', 'fa-medium', '1'),
(860, 'fa', 'fa-yc', '1'),
(861, 'fa', 'fa-y-combinator', '1'),
(862, 'fa', 'fa-optin-monster', '1'),
(863, 'fa', 'fa-opencart', '1'),
(864, 'fa', 'fa-expeditedssl', '1'),
(865, 'fa', 'fa-battery-4', '1'),
(866, 'fa', 'fa-battery-full', '1'),
(867, 'fa', 'fa-battery-3', '1'),
(868, 'fa', 'fa-battery-three-quarters', '1'),
(869, 'fa', 'fa-battery-2', '1'),
(870, 'fa', 'fa-battery-half', '1'),
(871, 'fa', 'fa-battery-1', '1'),
(872, 'fa', 'fa-battery-quarter', '1'),
(873, 'fa', 'fa-battery-0', '1'),
(874, 'fa', 'fa-battery-empty', '1'),
(875, 'fa', 'fa-mouse-pointer', '1'),
(876, 'fa', 'fa-i-cursor', '1'),
(877, 'fa', 'fa-object-group', '1'),
(878, 'fa', 'fa-object-ungroup', '1'),
(879, 'fa', 'fa-sticky-note', '1'),
(880, 'fa', 'fa-sticky-note-o', '1'),
(881, 'fa', 'fa-cc-jcb', '1'),
(882, 'fa', 'fa-cc-diners-club', '1'),
(883, 'fa', 'fa-clone', '1'),
(884, 'fa', 'fa-balance-scale', '1'),
(885, 'fa', 'fa-hourglass-o', '1'),
(886, 'fa', 'fa-hourglass-1', '1'),
(887, 'fa', 'fa-hourglass-start', '1'),
(888, 'fa', 'fa-hourglass-2', '1'),
(889, 'fa', 'fa-hourglass-half', '1'),
(890, 'fa', 'fa-hourglass-3', '1'),
(891, 'fa', 'fa-hourglass-end', '1'),
(892, 'fa', 'fa-hourglass', '1'),
(893, 'fa', 'fa-hand-grab-o', '1'),
(894, 'fa', 'fa-hand-rock-o', '1'),
(895, 'fa', 'fa-hand-stop-o', '1'),
(896, 'fa', 'fa-hand-paper-o', '1'),
(897, 'fa', 'fa-hand-scissors-o', '1'),
(898, 'fa', 'fa-hand-lizard-o', '1'),
(899, 'fa', 'fa-hand-spock-o', '1'),
(900, 'fa', 'fa-hand-pointer-o', '1'),
(901, 'fa', 'fa-hand-peace-o', '1'),
(902, 'fa', 'fa-trademark', '1'),
(903, 'fa', 'fa-registered', '1'),
(904, 'fa', 'fa-creative-commons', '1'),
(905, 'fa', 'fa-gg', '1'),
(906, 'fa', 'fa-gg-circle', '1'),
(907, 'fa', 'fa-tripadvisor', '1'),
(908, 'fa', 'fa-odnoklassniki', '1'),
(909, 'fa', 'fa-odnoklassniki-square', '1'),
(910, 'fa', 'fa-get-pocket', '1'),
(911, 'fa', 'fa-wikipedia-w', '1'),
(912, 'fa', 'fa-safari', '1'),
(913, 'fa', 'fa-chrome', '1'),
(914, 'fa', 'fa-firefox', '1'),
(915, 'fa', 'fa-opera', '1'),
(916, 'fa', 'fa-internet-explorer', '1'),
(917, 'fa', 'fa-tv', '1'),
(918, 'fa', 'fa-television', '1'),
(919, 'fa', 'fa-contao', '1'),
(920, 'fa', 'fa-500px', '1'),
(921, 'fa', 'fa-amazon', '1'),
(922, 'fa', 'fa-calendar-plus-o', '1'),
(923, 'fa', 'fa-calendar-minus-o', '1'),
(924, 'fa', 'fa-calendar-times-o', '1'),
(925, 'fa', 'fa-calendar-check-o', '1'),
(926, 'fa', 'fa-industry', '1'),
(927, 'fa', 'fa-map-pin', '1'),
(928, 'fa', 'fa-map-signs', '1'),
(929, 'fa', 'fa-map-o', '1'),
(930, 'fa', 'fa-map', '1'),
(931, 'fa', 'fa-commenting', '1'),
(932, 'fa', 'fa-commenting-o', '1'),
(933, 'fa', 'fa-houzz', '1'),
(934, 'fa', 'fa-vimeo', '1'),
(935, 'fa', 'fa-black-tie', '1'),
(936, 'fa', 'fa-fonticons', '1'),
(937, 'fa', 'fa-reddit-alien', '1'),
(938, 'fa', 'fa-edge', '1'),
(939, 'fa', 'fa-credit-card-alt', '1'),
(940, 'fa', 'fa-codiepie', '1'),
(941, 'fa', 'fa-modx', '1'),
(942, 'fa', 'fa-fort-awesome', '1'),
(943, 'fa', 'fa-usb', '1'),
(944, 'fa', 'fa-product-hunt', '1'),
(945, 'fa', 'fa-mixcloud', '1'),
(946, 'fa', 'fa-scribd', '1'),
(947, 'fa', 'fa-pause-circle', '1'),
(948, 'fa', 'fa-pause-circle-o', '1'),
(949, 'fa', 'fa-stop-circle', '1'),
(950, 'fa', 'fa-stop-circle-o', '1'),
(951, 'fa', 'fa-shopping-bag', '1'),
(952, 'fa', 'fa-shopping-basket', '1'),
(953, 'fa', 'fa-hashtag', '1'),
(954, 'fa', 'fa-bluetooth', '1'),
(955, 'fa', 'fa-bluetooth-b', '1'),
(956, 'fa', 'fa-percent', '1'),
(957, 'fa', 'fa-gitlab', '1'),
(958, 'fa', 'fa-wpbeginner', '1'),
(959, 'fa', 'fa-wpforms', '1'),
(960, 'fa', 'fa-envira', '1'),
(961, 'fa', 'fa-universal-access', '1'),
(962, 'fa', 'fa-wheelchair-alt', '1'),
(963, 'fa', 'fa-question-circle-o', '1'),
(964, 'fa', 'fa-blind', '1'),
(965, 'fa', 'fa-audio-description', '1'),
(966, 'fa', 'fa-volume-control-phone', '1'),
(967, 'fa', 'fa-braille', '1'),
(968, 'fa', 'fa-asl-interpreting', '1'),
(969, 'fa', 'fa-deafness', '1'),
(970, 'fa', 'fa-hard-of-hearing', '1'),
(971, 'fa', 'fa-deaf', '1'),
(972, 'fa', 'fa-glide', '1'),
(973, 'fa', 'fa-glide-g', '1'),
(974, 'fa', 'fa-signing', '1'),
(975, 'fa', 'fa-sign-language', '1'),
(976, 'fa', 'fa-low-vision', '1'),
(977, 'fa', 'fa-viadeo', '1'),
(978, 'fa', 'fa-viadeo-square', '1'),
(979, 'fa', 'fa-snapchat', '1'),
(980, 'fa', 'fa-snapchat-ghost', '1'),
(981, 'fa', 'fa-snapchat-square', '1'),
(982, 'fa', 'fa-pied-piper', '1'),
(983, 'fa', 'fa-first-order', '1'),
(984, 'fa', 'fa-yoast', '1'),
(985, 'fa', 'fa-themeisle', '1'),
(986, 'fa', 'fa-google-plus-circle', '1'),
(987, 'fa', 'fa-google-plus-official', '1'),
(988, 'fa', 'fa-fa', '1'),
(989, 'fa', 'fa-font-awesome', '1');

CREATE TABLE ".$this->prefix."tlog_access (
  idlog_access int(11) NOT NULL,
  name varchar(20) NOT NULL,
  message text NOT NULL,
  ip varchar(16) NOT NULL,
  browser varchar(30) NOT NULL,
  date_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  operative_system varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tlog_movement (
  idlog_movement int(11) NOT NULL,
  iduser int(11) NOT NULL,
  idaction int(11) NOT NULL,
  idservice int(11) NOT NULL,
  message text NOT NULL,
  data text NOT NULL,
  date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tlog_report (
  idlog_report int(11) NOT NULL,
  iduser int(11) NOT NULL,
  report text NOT NULL,
  code text NOT NULL,
  date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tnationality (
  idnationality int(11) NOT NULL,
  name_one varchar(3) NOT NULL,
  name_two varchar(25) NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tnationality (idnationality, name_one, name_two, status) VALUES
(1, 'V', 'Venezolano', '1');

CREATE TABLE ".$this->prefix."torganization (
  name_one varchar(50) NOT NULL,
  name_two varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  description text NOT NULL,
  idgallery_header int(11) NOT NULL,
  idgallery_favicon int(11) NOT NULL,
  address text NOT NULL,
  rights text NOT NULL,
  phone_one varchar(20) NOT NULL,
  phone_two varchar(20) NOT NULL,
  phone_three varchar(20) NOT NULL,
  number_question_answer int(11) DEFAULT NULL,
  login int(11) DEFAULT NULL,
  new_password_sent_email int(11) DEFAULT NULL,
  email_host text,
  email_port varchar(5) DEFAULT NULL,
  email_security_smtp char(1) DEFAULT NULL,
  email_type_security_smtp varchar(3) DEFAULT NULL,
  email_user text,
  email_password text,
  email_subject text,
  email_message text,
  number_days_password_diferrence int(11) DEFAULT NULL,
  number_answer_allowed int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."torganization (name_one, name_two, email, description, idgallery_header, idgallery_favicon, address, rights, phone_one, phone_two, phone_three, number_question_answer, login, new_password_sent_email, email_host, email_port, email_security_smtp, email_type_security_smtp, email_user, email_password, email_subject, email_message, number_days_password_diferrence, number_answer_allowed) VALUES
('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 0, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 1, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2);

CREATE TABLE ".$this->prefix."tpage (
  idpage int(11) NOT NULL,
  url text NOT NULL,
  link text NOT NULL,
  name text NOT NULL,
  img text NOT NULL,
  idicon int(11) DEFAULT NULL,
  content text NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tperson (
  idperson int(11) NOT NULL,
  idnationality int(11) NOT NULL,
  idethnicity int(11) NOT NULL,
  idcharge int(11) NOT NULL,
  image text NOT NULL,
  identification_card varchar(15) NOT NULL,
  name_one varchar(20) NOT NULL,
  name_two varchar(20) NOT NULL,
  last_name_one varchar(20) NOT NULL,
  last_name_two varchar(20) NOT NULL,
  sex char(1) NOT NULL,
  email varchar(50) NOT NULL,
  birth_date date NOT NULL,
  birth_place text NOT NULL,
  idaddress int(11) NOT NULL,
  address text NOT NULL,
  phone_one varchar(20) NOT NULL,
  phone_two varchar(20) NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tperson (idperson, idnationality, idethnicity, idcharge, image, identification_card, name_one, name_two, last_name_one, last_name_two, sex, email, birth_date, birth_place, idaddress, address, phone_one, phone_two, status) VALUES
(1, 1, 1, 1, '', '00000000', 'Administrador', '', 'Root', '', 'M', '".$this->email."', NOW(), '', 1036, '', '', '', '1');

CREATE TABLE ".$this->prefix."tpost (
  idpost int(11) NOT NULL,
  url varchar(70) NOT NULL,
  name text NOT NULL,
  color char(7) NOT NULL,
  idgallery int(11) NOT NULL,
  content text NOT NULL,
  iduser int(11) NOT NULL,
  date_created date NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tpost (idpost, url, name, color, idgallery, content, iduser, date_created, status) VALUES
(1, 'ameliacms', 'AmeliaCMS', '151559', 4, '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Es una plataforma dise&ntilde;ada para crear aplicaciones web, posee caracter&iacute;sticas relevantes y f&aacute;ciles de utilizar.</span><br /><span style=\"color: #000000;\">Con solo importar la base de datos el usuario esta listo para hacer uso de ella. Adem&aacute;s, posee una curva de aprendizaje alta y permite la escalabilidad ya que esta basado bajo la arquitectura MVC.</span></p>', 1, '2017-08-03', '1');

CREATE TABLE ".$this->prefix."tservice (
  idservice int(11) NOT NULL,
  idfather int(11) NOT NULL,
  name varchar(30) NOT NULL,
  url varchar(30) NOT NULL,
  idicon int(11) DEFAULT NULL,
  color char(7) NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tservice (idservice, idfather, name, url, idicon, color, status) VALUES
(1, 0, 'Seguridad y config.', '', 139, '', '1'),
(2, 1, 'Cargos', 'charge', 591, '', '1'),
(3, 1, 'Acciones', 'action', 108, 'F5F5F5', '1'),
(4, 1, 'Servicios', 'service', 26, '', '1'),
(5, 1, 'Etnias', 'ethnicity', 964, '', '1'),
(6, 1, 'Nacionalidades', 'nationality', 179, '', '1'),
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
(24, 21, 'Redes sociales', 'social_network', 848, 'F5F5F5', '1'),
(25, 16, 'Listados', 'list_report', 321, 'F5F5F5', '1'),
(27, 21, 'Galeria', 'gallery', 327, 'F5F5F5', '1'),
(28, 21, 'Temas', 'themes', 710, 'F5F5F5', '1'),
(29, 21, 'Contacto', 'contact', 7, 'F5F5F5', '1');

CREATE TABLE ".$this->prefix."tsocial_network (
  idsocial_network int(11) NOT NULL,
  name varchar(30) NOT NULL,
  url text NOT NULL,
  idicon int(11) DEFAULT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."ttemplate (
  idtemplate int(11) NOT NULL,
  fields text NOT NULL,
  data text NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE ".$this->prefix."tuser (
  iduser int(11) NOT NULL,
  idperson int(11) NOT NULL,
  name varchar(20) NOT NULL,
  failed_attempts int(11) NOT NULL,
  initiated int(11) NOT NULL,
  note text NOT NULL,
  status char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO ".$this->prefix."tuser (iduser, idperson, name, failed_attempts, initiated, note, status) VALUES
(1, 1, '".$this->user."', 0, 0, '', '1');

ALTER TABLE ".$this->prefix."taction
  ADD PRIMARY KEY (idaction);

ALTER TABLE ".$this->prefix."tcontact
  ADD PRIMARY KEY (idcontact);

ALTER TABLE ".$this->prefix."taddress
  ADD PRIMARY KEY (idaddress);

ALTER TABLE ".$this->prefix."tcharge
  ADD PRIMARY KEY (idcharge);

ALTER TABLE ".$this->prefix."tdcharge_service_action
  ADD PRIMARY KEY (idcharge_service_action),
  ADD KEY ".$this->prefix."tdcharge_service_action_ibfk_1 (idcharge),
  ADD KEY idservice (idservice),
  ADD KEY idaction (idaction);

ALTER TABLE ".$this->prefix."tdpassword
  ADD PRIMARY KEY (idpassword),
  ADD KEY iduser (iduser);

ALTER TABLE ".$this->prefix."tdquestion_answer
  ADD PRIMARY KEY (idquestion_answer),
  ADD KEY iduser (iduser);

ALTER TABLE ".$this->prefix."tdservice_action
  ADD PRIMARY KEY (idservice_action),
  ADD KEY idservice (idservice),
  ADD KEY idaction (idaction);

ALTER TABLE ".$this->prefix."tduser_service_ordered
  ADD PRIMARY KEY (iduser_service_ordered),
  ADD KEY iduser (iduser),
  ADD KEY idservice (idservice);

ALTER TABLE ".$this->prefix."tethnicity
  ADD PRIMARY KEY (idethnicity);

ALTER TABLE ".$this->prefix."tgallery
  ADD PRIMARY KEY (idgallery),
  ADD KEY iduser (iduser);

ALTER TABLE ".$this->prefix."ticon
  ADD PRIMARY KEY (idicon);

ALTER TABLE ".$this->prefix."tlog_access
  ADD PRIMARY KEY (idlog_access);

ALTER TABLE ".$this->prefix."tlog_movement
  ADD PRIMARY KEY (idlog_movement),
  ADD KEY iduser (iduser),
  ADD KEY idaction (idaction),
  ADD KEY idservice (idservice);

ALTER TABLE ".$this->prefix."tlog_report
  ADD PRIMARY KEY (idlog_report),
  ADD KEY iduser (iduser);

ALTER TABLE ".$this->prefix."tnationality
  ADD PRIMARY KEY (idnationality);

ALTER TABLE ".$this->prefix."tpage
  ADD PRIMARY KEY (idpage),
  ADD KEY idicon (idicon);

ALTER TABLE ".$this->prefix."tperson
  ADD PRIMARY KEY (idperson),
  ADD KEY idnationality (idnationality),
  ADD KEY idethnicity (idethnicity),
  ADD KEY idcharge (idcharge),
  ADD KEY idaddress (idaddress);

ALTER TABLE ".$this->prefix."tpost
  ADD PRIMARY KEY (idpost),
  ADD KEY iduser (iduser);

ALTER TABLE ".$this->prefix."tservice
  ADD PRIMARY KEY (idservice),
  ADD KEY idicon (idicon);

ALTER TABLE ".$this->prefix."tsocial_network
  ADD PRIMARY KEY (idsocial_network),
  ADD KEY idicon (idicon);

ALTER TABLE ".$this->prefix."ttemplate
  ADD PRIMARY KEY (idtemplate);

ALTER TABLE ".$this->prefix."tuser
  ADD PRIMARY KEY (iduser),
  ADD KEY idperson (idperson);

ALTER TABLE ".$this->prefix."taction
  MODIFY idaction int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE ".$this->prefix."tcontact
  MODIFY idcontact int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."taddress
  MODIFY idaddress int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1503;

ALTER TABLE ".$this->prefix."tcharge
  MODIFY idcharge int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE ".$this->prefix."tdcharge_service_action
  MODIFY idcharge_service_action int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5399;

ALTER TABLE ".$this->prefix."tdpassword
  MODIFY idpassword int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE ".$this->prefix."tdquestion_answer
  MODIFY idquestion_answer int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tdservice_action
  MODIFY idservice_action int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

ALTER TABLE ".$this->prefix."tduser_service_ordered
  MODIFY iduser_service_ordered int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tethnicity
  MODIFY idethnicity int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

ALTER TABLE ".$this->prefix."tgallery
  MODIFY idgallery int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE ".$this->prefix."ticon
  MODIFY idicon int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;

ALTER TABLE ".$this->prefix."tlog_access
  MODIFY idlog_access int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tlog_movement
  MODIFY idlog_movement int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tlog_report
  MODIFY idlog_report int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tnationality
  MODIFY idnationality int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE ".$this->prefix."tpage
  MODIFY idpage int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tperson
  MODIFY idperson int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE ".$this->prefix."tpost
  MODIFY idpost int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE ".$this->prefix."tservice
  MODIFY idservice int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

ALTER TABLE ".$this->prefix."tsocial_network
  MODIFY idsocial_network int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."ttemplate
  MODIFY idtemplate int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE ".$this->prefix."tuser
  MODIFY iduser int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE ".$this->prefix."tcontact
  ADD CONSTRAINT tcontact_ibfk_1 FOREIGN KEY (iduser) REFERENCES tuser (iduser) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tdcharge_service_action
  ADD CONSTRAINT ".$this->prefix."tdcharge_service_action_ibfk_1 FOREIGN KEY (idcharge) REFERENCES ".$this->prefix."tcharge (idcharge) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ".$this->prefix."tdcharge_service_action_ibfk_2 FOREIGN KEY (idservice) REFERENCES ".$this->prefix."tdservice_action (idservice) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ".$this->prefix."tdcharge_service_action_ibfk_3 FOREIGN KEY (idaction) REFERENCES ".$this->prefix."tdservice_action (idaction) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tdpassword
  ADD CONSTRAINT ".$this->prefix."tdpassword_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tdquestion_answer
  ADD CONSTRAINT ".$this->prefix."_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser);

ALTER TABLE ".$this->prefix."tdservice_action
  ADD CONSTRAINT ".$this->prefix."tdservice_action_ibfk_1 FOREIGN KEY (idservice) REFERENCES ".$this->prefix."tservice (idservice) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ".$this->prefix."tdservice_action_ibfk_2 FOREIGN KEY (idaction) REFERENCES ".$this->prefix."taction (idaction) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tduser_service_ordered
  ADD CONSTRAINT ".$this->prefix."tduser_service_ordered_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT ".$this->prefix."tduser_service_ordered_ibfk_2 FOREIGN KEY (idservice) REFERENCES ".$this->prefix."tservice (idservice) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tgallery
  ADD CONSTRAINT ".$this->prefix."tgallery_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE ".$this->prefix."tlog_movement
  ADD CONSTRAINT ".$this->prefix."tlog_movement_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT ".$this->prefix."tlog_movement_ibfk_3 FOREIGN KEY (idaction) REFERENCES ".$this->prefix."taction (idaction) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT ".$this->prefix."tlog_movement_ibfk_4 FOREIGN KEY (idservice) REFERENCES ".$this->prefix."tservice (idservice) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE ".$this->prefix."tlog_report
  ADD CONSTRAINT ".$this->prefix."tlog_report_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE ".$this->prefix."tpage
  ADD CONSTRAINT ".$this->prefix."tpage_ibfk_1 FOREIGN KEY (idicon) REFERENCES ".$this->prefix."ticon (idicon) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE ".$this->prefix."tperson
  ADD CONSTRAINT ".$this->prefix."tperson_ibfk_1 FOREIGN KEY (idnationality) REFERENCES ".$this->prefix."tnationality (idnationality),
  ADD CONSTRAINT ".$this->prefix."tperson_ibfk_2 FOREIGN KEY (idethnicity) REFERENCES ".$this->prefix."tethnicity (idethnicity),
  ADD CONSTRAINT ".$this->prefix."tperson_ibfk_3 FOREIGN KEY (idcharge) REFERENCES ".$this->prefix."tcharge (idcharge),
  ADD CONSTRAINT ".$this->prefix."tperson_ibfk_4 FOREIGN KEY (idaddress) REFERENCES ".$this->prefix."taddress (idaddress);

ALTER TABLE ".$this->prefix."tpost
  ADD CONSTRAINT ".$this->prefix."tpost_ibfk_1 FOREIGN KEY (iduser) REFERENCES ".$this->prefix."tuser (iduser);

ALTER TABLE ".$this->prefix."tservice
  ADD CONSTRAINT ".$this->prefix."tservice_ibfk_1 FOREIGN KEY (idicon) REFERENCES ".$this->prefix."ticon (idicon) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE ".$this->prefix."tsocial_network
  ADD CONSTRAINT ".$this->prefix."tsocial_network_ibfk_1 FOREIGN KEY (idicon) REFERENCES ".$this->prefix."ticon (idicon) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE ".$this->prefix."tuser
  ADD CONSTRAINT ".$this->prefix."tuser_ibfk_1 FOREIGN KEY (idperson) REFERENCES ".$this->prefix."tperson (idperson) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
";
    
		$this->db->exec_native($sql);
		
  $_SESSION["environment"]=1;
   $this->db->__destruct();
   $this->db->__construct();
		return $this->db->exec_native($sql);
	}
	public function postgresql(){

    $sql = "SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

CREATE TABLE ".$this->prefix."taction (
    idaction serial NOT NULL,
    name character varying(15),
    function integer,
    idicon integer,
    status character(1)
);



CREATE TABLE ".$this->prefix."taddress (
    idaddress serial NOT NULL,
    idfather integer,
    name character varying(50),
    status character varying(255)
);


CREATE TABLE ".$this->prefix."tcharge (
    idcharge serial NOT NULL,
    name character varying(60),
    status character(1)
);

CREATE TABLE ".$this->prefix."tcontact (
    idcontact serial NOT NULL,
    name character varying(25),
    email character varying(60),
    phone character varying(20),
    message text,
    iduser integer,
    response text,
    status character(1)
);

CREATE TABLE ".$this->prefix."tdcharge_service_action (
    idcharge_service_action serial NOT NULL,
    idcharge integer,
    idservice integer,
    idaction integer
);

CREATE TABLE ".$this->prefix."tdpassword (
    idpassword serial NOT NULL,
    iduser integer,
    password text,
    creation_date timestamp without time zone,
    status character(1)
);

CREATE TABLE ".$this->prefix."tdquestion_answer (
    idquestion_answer serial NOT NULL,
    iduser integer,
    question text,
    answer text
);

CREATE TABLE ".$this->prefix."tdservice_action (
    idservice_action serial NOT NULL,
    idservice integer,
    idaction integer
);

CREATE TABLE ".$this->prefix."tduser_service_ordered (
    iduser_service_ordered serial NOT NULL,
    iduser integer,
    idservice integer,
    ordered integer
);

CREATE TABLE ".$this->prefix."tethnicity (
    idethnicity serial NOT NULL,
    name character varying(45),
    status character(1)
);

CREATE TABLE ".$this->prefix."tgallery (
    idgallery serial NOT NULL,
    iduser integer,
    src text,
    title text,
    legend text,
    alternative text,
    description text,
    date_created date
);

CREATE TABLE ".$this->prefix."ticon (
    idicon serial NOT NULL,
    class character varying(60),
    name character varying(60),
    status character(1)
);

CREATE TABLE ".$this->prefix."tlog_access (
    idlog_access serial NOT NULL,
    name character varying(20),
    message text,
    ip character varying(16),
    browser character varying(30),
    date_created timestamp without time zone,
    operative_system character varying(30)
);

CREATE TABLE ".$this->prefix."tlog_movement (
    idlog_movement serial NOT NULL,
    iduser integer,
    idaction integer,
    idservice character varying(255),
    message text,
    data text,
    date_created timestamp without time zone
);

CREATE TABLE ".$this->prefix."tlog_report (
    idlog_report serial NOT NULL,
    iduser integer,
    report text,
    code text,
    date_created timestamp without time zone
);

CREATE TABLE ".$this->prefix."tnationality (
    idnationality serial NOT NULL,
    name_one character varying(3),
    name_two character varying(25),
    status character(1)
);

CREATE TABLE ".$this->prefix."tnotice (
    idnotice serial NOT NULL,
    title character varying(160),
    content text,
    url text,
    date_created date,
    status character(1)
);

CREATE TABLE ".$this->prefix."torganization (
    name_one character varying(50),
    name_two character varying(50),
    email character varying(50),
    description text,
    idgallery_header integer,
    idgallery_favicon integer,
    address text,
    rights text,
    phone_one character varying(20),
    phone_two character varying(20),
    phone_three character varying(20),
    number_question_answer integer,
    login integer,
    new_password_sent_email integer,
    email_host text,
    email_port character varying(5),
    email_security_smtp character(1),
    email_type_security_smtp character varying(3),
    email_user text,
    email_password text,
    email_subject text,
    email_message text,
    number_days_password_diferrence integer,
    number_answer_allowed integer,
    skip_homepage character(1),
    type_web character(1)
);

CREATE TABLE ".$this->prefix."tpage (
    idpage serial NOT NULL,
    url text,
    link text,
    name text,
    img text,
    idicon integer,
    content text,
    view_main character(1),
    status character(1)
);

CREATE TABLE ".$this->prefix."tperson (
    idperson serial NOT NULL,
    idnationality integer,
    idethnicity integer,
    idcharge integer,
    image text,
    identification_card character varying(15),
    name_one character varying(20),
    name_two character varying(20),
    last_name_one character varying(20),
    last_name_two character varying(20),
    sex character(1),
    email character varying(50),
    birth_date date,
    birth_place text,
    idaddress integer,
    address text,
    phone_one character varying(20),
    phone_two character varying(20),
    status character(1)
);

CREATE TABLE ".$this->prefix."tpost (
    idpost serial NOT NULL,
    url character varying(70),
    name text,
    color character(7),
    idgallery integer,
    content text,
    iduser integer,
    date_created date,
    status character(1)
);

CREATE TABLE ".$this->prefix."tservice (
    idservice serial NOT NULL,
    idfather integer,
    name character varying(30),
    url character varying(30),
    idicon integer,
    color character(7),
    status character(1)
);

CREATE TABLE ".$this->prefix."tsocial_network (
    idsocial_network serial NOT NULL,
    name character varying(30),
    url text,
    idicon integer,
    status character(1)
);

CREATE TABLE ".$this->prefix."ttheme (
    idtheme serial NOT NULL,
    name text,
    description text,
    src text,
    img text,
    status character(1)
);

CREATE TABLE ".$this->prefix."ttheme_origin (
    idtheme_origin serial NOT NULL,
    name text,
    description text,
    img text,
    src text,
    date_created date,
    status character(1)
);

CREATE TABLE ".$this->prefix."tuser (
    iduser serial NOT NULL,
    idperson integer,
    name character varying(20),
    failed_attempts integer,
    initiated integer,
    note text,
    status character(1)
);

INSERT INTO ".$this->prefix."taction VALUES (1, 'Agregar', 1, 2, '1');
INSERT INTO ".$this->prefix."taction VALUES (2, 'Editar', 2, 71, '1');
INSERT INTO ".$this->prefix."taction VALUES (3, 'Consultar', 3, 11, '1');
INSERT INTO ".$this->prefix."taction VALUES (4, 'Activar', 4, 20, '1');
INSERT INTO ".$this->prefix."taction VALUES (5, 'Desactivar', 5, 21, '1');
INSERT INTO ".$this->prefix."taction VALUES (6, 'Generar', 6, 1, '1');
INSERT INTO ".$this->prefix."taction VALUES (7, 'Eliminar', 7, 27, '1');";
$sql.="
INSERT INTO ".$this->prefix."tdservice_action VALUES (1, 2, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (2, 2, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (3, 2, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (4, 2, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (5, 2, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (6, 2, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (7, 2, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (8, 3, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (9, 3, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (10, 3, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (11, 3, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (12, 3, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (14, 3, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (15, 4, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (16, 4, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (17, 4, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (18, 4, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (19, 4, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (20, 4, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (21, 4, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (122, 6, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (123, 6, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (124, 6, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (125, 6, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (126, 6, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (127, 6, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (128, 6, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (129, 5, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (130, 5, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (131, 5, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (132, 5, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (133, 5, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (134, 5, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (135, 5, 7);

INSERT INTO ".$this->prefix."tdservice_action VALUES (138, 8, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (139, 8, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (140, 8, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (141, 8, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (142, 8, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (143, 8, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (144, 10, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (145, 10, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (146, 10, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (147, 10, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (148, 10, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (149, 10, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (150, 10, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (151, 11, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (153, 11, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (154, 11, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (155, 11, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (156, 11, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (157, 11, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (158, 11, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (159, 12, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (160, 12, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (161, 12, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (162, 12, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (163, 12, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (164, 12, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (165, 12, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (166, 13, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (167, 13, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (168, 13, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (169, 13, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (170, 13, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (171, 13, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (172, 13, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (174, 14, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (175, 14, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (176, 14, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (177, 14, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (178, 14, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (179, 14, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (180, 15, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (181, 15, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (182, 15, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (183, 15, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (184, 15, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (185, 15, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (186, 15, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (190, 17, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (191, 18, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (192, 19, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (195, 14, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (196, 20, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (197, 20, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (198, 22, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (199, 22, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (200, 22, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (201, 22, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (202, 22, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (203, 22, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (204, 22, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (205, 23, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (206, 23, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (207, 23, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (208, 23, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (209, 23, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (211, 23, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (212, 24, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (213, 24, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (214, 24, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (215, 24, 4);
INSERT INTO ".$this->prefix."tdservice_action VALUES (216, 24, 5);
INSERT INTO ".$this->prefix."tdservice_action VALUES (218, 24, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (219, 25, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (220, 26, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (221, 26, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (222, 27, 1);
INSERT INTO ".$this->prefix."tdservice_action VALUES (223, 27, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (224, 27, 7);
INSERT INTO ".$this->prefix."tdservice_action VALUES (225, 27, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (226, 19, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (227, 18, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (228, 17, 6);
INSERT INTO ".$this->prefix."tdservice_action VALUES (229, 28, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (230, 28, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (239, 31, 2);
INSERT INTO ".$this->prefix."tdservice_action VALUES (240, 31, 3);
INSERT INTO ".$this->prefix."tdservice_action VALUES (241, 28, 4);

INSERT INTO ".$this->prefix."tethnicity VALUES (1, 'NINGUNO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (2, 'ACAHUAYO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (3, 'ARAHUAC DEL DELTA AMACURO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (4, 'ARAHUAC DEL RIO NEGRO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (5, 'ARUTANI', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (6, 'BARI', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (7, 'GUAJIBO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (8, 'GUAJIRO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (9, 'GUARAO O WARAO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (10, 'GUAYQUERY', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (11, 'MAPOYO O YAHUANA', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (12, 'MAQUIRITARE', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (13, 'PANARE', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (14, 'PARAUJANO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (15, 'PEMON', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (16, 'PIAROA', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (17, 'SAPE', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (18, 'YANOMAMI', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (19, 'YARURO', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (20, 'YUCPA', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (21, 'VOCABLOS DE ORIGEN INDIGENA', '1');
INSERT INTO ".$this->prefix."tethnicity VALUES (22, 'CARI', '1');

INSERT INTO ".$this->prefix."tgallery VALUES (1, 1, 'uploads/gallery/2017082320382016923927_1348435195230600_1816631906_n.jpg', '', '', '', '', '2017-08-23');
INSERT INTO ".$this->prefix."tgallery VALUES (2, 1, 'uploads/gallery/2017082320392316933488_1348432158564237_1757376988_n.jpg', '', '', '', '', '2017-08-23');
INSERT INTO ".$this->prefix."tgallery VALUES (3, 1, 'uploads/gallery/20170826063617LogoMC.png', NULL, NULL, NULL, NULL, '2017-08-26');";
$sql.="
INSERT INTO ".$this->prefix."tnationality VALUES (1, 'V', 'Venezolano', '1');

INSERT INTO ".$this->prefix."torganization VALUES ('AmeliaCMS', 'AmeliaCMS ', 'augustoalvarez05@gmail.com', 'Version Beta', 0, 3, 'av 36 entre 22 y 23', 'Todos los derechos reservados 2017', '04245370954', '', '', 2, 0, 0, 'lcoalhost', '23', '1', 'TLS', 'root', '1234', 'asda', '', 3, 2, NULL, NULL);

INSERT INTO ".$this->prefix."tpage VALUES (1, 'mkasda', '0', 'asdasd', '', 1, '<p>nkasdka</p>', '1', '1');

INSERT INTO ".$this->prefix."tperson VALUES (1, 1, 1, 1, '', '00000000', 'Administrador', '', 'Root', '', 'F', '".$this->email."', NOW(), 'asad', 1036, '', '', '', '1');

INSERT INTO ".$this->prefix."tpost VALUES (1, 'ameliacms', 'AmeliaCMS', '151559 ', 4, '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Es una plataforma dise&ntilde;ada para crear aplicaciones web, posee caracter&iacute;sticas relevantes y f&aacute;ciles de utilizar.</span><br /><span style=\"color: #000000;\">Con solo importar la base de datos el usuario esta listo para hacer uso de ella. Adem&aacute;s, posee una curva de aprendizaje alta y permite la escalabilidad ya que esta basado bajo la arquitectura MVC.</span></p>', 1, '2017-08-03', '1');

INSERT INTO ".$this->prefix."tservice VALUES (1, 0, 'Seguridad y config.', '', 139, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (2, 1, 'Cargos', 'charge', 591, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (3, 1, 'Acciones', 'action', 108, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (4, 1, 'Servicios', 'service', 26, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (5, 1, 'Etnias', 'ethnicity', 964, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (6, 1, 'Nacionalidades', 'nationality', 179, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (8, 1, 'Iconos', 'icon', 8, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (9, 0, 'Localidades', '', 438, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (10, 9, 'Parroquias', 'parish', 327, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (11, 9, 'Municipios', 'municipality', 328, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (12, 9, 'Estados', 'state', 328, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (13, 9, 'Paises', 'country', 328, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (14, 1, 'Personas', 'person', 445, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (15, 1, 'Usuarios', 'user', 445, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (16, 0, 'Reportes', '', 392, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (17, 16, 'Bitacora de acceso', 'log_access', 801, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (18, 16, 'Bitacora de movimientos', 'log_movement', 803, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (19, 16, 'Bitacora de reportes', 'log_report', 802, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (20, 1, 'Organizacion', 'organization', 28, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (22, 21, 'Publicaciones', 'post', 782, '       ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (23, 21, 'Paginas', 'page', 29, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (24, 32, 'Redes sociales', 'social_network', 848, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (25, 16, 'Listados', 'list_report', 321, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (26, 1, 'Configuracion', 'configuration', 124, 'F5F5F5 ', '0');
INSERT INTO ".$this->prefix."tservice VALUES (27, 21, 'Galeria', 'gallery', 327, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (28, 21, 'Temas', 'theme', 710, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (31, 1, 'Editor de codigo', 'codeeditor', 550, 'F5F5F5 ', '1');
INSERT INTO ".$this->prefix."tservice VALUES (21, 0, 'Blog', '', 50, '       ', '0');

INSERT INTO ".$this->prefix."ttheme VALUES (1, 'Clean Blog', 'blog1', 'clean-blog/', 'img', ' ');
INSERT INTO ".$this->prefix."ttheme VALUES (2, 'Basica', 'Simple tema', 'basica/', 'img', '1');

INSERT INTO ".$this->prefix."tuser VALUES (1, 1, '".$this->user."', 0, 0, '', '1');

ALTER TABLE ONLY ".$this->prefix."taction
    ADD CONSTRAINT ".$this->prefix."taction_pkey PRIMARY KEY (idaction);

ALTER TABLE ONLY ".$this->prefix."taddress
    ADD CONSTRAINT ".$this->prefix."taddress_pkey PRIMARY KEY (idaddress);

ALTER TABLE ONLY ".$this->prefix."tcharge
    ADD CONSTRAINT ".$this->prefix."tcharge_pkey PRIMARY KEY (idcharge);

ALTER TABLE ONLY ".$this->prefix."tcontact
    ADD CONSTRAINT ".$this->prefix."tcontact_pkey PRIMARY KEY (idcontact);

ALTER TABLE ONLY ".$this->prefix."tdcharge_service_action
    ADD CONSTRAINT ".$this->prefix."tdcharge_service_action_pkey PRIMARY KEY (idcharge_service_action);

ALTER TABLE ONLY ".$this->prefix."tdpassword
    ADD CONSTRAINT ".$this->prefix."tdpassword_pkey PRIMARY KEY (idpassword);

ALTER TABLE ONLY ".$this->prefix."tdquestion_answer
    ADD CONSTRAINT ".$this->prefix."tdquestion_answer_pkey PRIMARY KEY (idquestion_answer);

ALTER TABLE ONLY ".$this->prefix."tdservice_action
    ADD CONSTRAINT ".$this->prefix."tdservice_action_pkey PRIMARY KEY (idservice_action);

ALTER TABLE ONLY ".$this->prefix."tduser_service_ordered
    ADD CONSTRAINT ".$this->prefix."tduser_service_ordered_pkey PRIMARY KEY (iduser_service_ordered);

ALTER TABLE ONLY ".$this->prefix."tethnicity
    ADD CONSTRAINT ".$this->prefix."tethnicity_pkey PRIMARY KEY (idethnicity);

ALTER TABLE ONLY ".$this->prefix."tgallery
    ADD CONSTRAINT ".$this->prefix."tgallery_pkey PRIMARY KEY (idgallery);

ALTER TABLE ONLY ".$this->prefix."ticon
    ADD CONSTRAINT ".$this->prefix."ticon_pkey PRIMARY KEY (idicon);

ALTER TABLE ONLY ".$this->prefix."tlog_access
    ADD CONSTRAINT ".$this->prefix."tlog_access_pkey PRIMARY KEY (idlog_access);

ALTER TABLE ONLY ".$this->prefix."tlog_movement
    ADD CONSTRAINT ".$this->prefix."tlog_movement_pkey PRIMARY KEY (idlog_movement);

ALTER TABLE ONLY ".$this->prefix."tlog_report
    ADD CONSTRAINT ".$this->prefix."tlog_report_pkey PRIMARY KEY (idlog_report);

ALTER TABLE ONLY ".$this->prefix."tnationality
    ADD CONSTRAINT ".$this->prefix."tnationality_pkey PRIMARY KEY (idnationality);

ALTER TABLE ONLY ".$this->prefix."tnotice
    ADD CONSTRAINT ".$this->prefix."tnotice_pkey PRIMARY KEY (idnotice);

ALTER TABLE ONLY ".$this->prefix."tpage
    ADD CONSTRAINT ".$this->prefix."tpage_pkey PRIMARY KEY (idpage);

ALTER TABLE ONLY ".$this->prefix."tperson
    ADD CONSTRAINT ".$this->prefix."tperson_pkey PRIMARY KEY (idperson);

ALTER TABLE ONLY ".$this->prefix."tpost
    ADD CONSTRAINT ".$this->prefix."tpost_pkey PRIMARY KEY (idpost);

ALTER TABLE ONLY ".$this->prefix."tservice
    ADD CONSTRAINT ".$this->prefix."tservice_pkey PRIMARY KEY (idservice);

ALTER TABLE ONLY ".$this->prefix."tsocial_network
    ADD CONSTRAINT ".$this->prefix."tsocial_network_pkey PRIMARY KEY (idsocial_network);

ALTER TABLE ONLY ".$this->prefix."ttheme_origin
    ADD CONSTRAINT ".$this->prefix."ttheme_origin_pkey PRIMARY KEY (idtheme_origin);

ALTER TABLE ONLY ".$this->prefix."ttheme
    ADD CONSTRAINT ".$this->prefix."ttheme_pkey PRIMARY KEY (idtheme);

ALTER TABLE ONLY ".$this->prefix."tuser
    ADD CONSTRAINT ".$this->prefix."tuser_pkey PRIMARY KEY (iduser);

ALTER TABLE ONLY ".$this->prefix."tdcharge_service_action
    ADD CONSTRAINT ".$this->prefix."tdcharge_service_action_idcharge_fkey FOREIGN KEY (idcharge) REFERENCES ".$this->prefix."tservice(idservice) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE ONLY ".$this->prefix."tdservice_action
    ADD CONSTRAINT ".$this->prefix."tdservice_action_idservice_fkey FOREIGN KEY (idservice) REFERENCES ".$this->prefix."tservice(idservice) ON UPDATE CASCADE ON DELETE CASCADE;";
$sql.="
INSERT INTO ".$this->prefix."taddress VALUES (1, 0, 'VENEZUELA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (2, 1, 'DTTO. CAPITAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (3, 1, 'ANZOATEGUI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (4, 1, 'APURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (5, 1, 'ARAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (6, 1, 'BARINAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (7, 1, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (8, 1, 'CARABOBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (9, 1, 'COJEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (10, 1, 'FALCON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (11, 1, 'GUARICO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (12, 1, 'LARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (13, 1, 'MERIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (14, 1, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (15, 1, 'MONAGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (16, 1, 'NUEVA ESPARTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (17, 1, 'PORTUGUESA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (18, 1, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (19, 1, 'TACHIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (20, 1, 'TRUJILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (21, 1, 'YARACUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (22, 1, 'ZULIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (23, 1, 'AMAZONAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (24, 1, 'DELTA AMACURO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (25, 1, 'VARGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (26, 2, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (27, 3, 'ANACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (28, 3, 'ARAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (29, 3, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (30, 3, 'BRUZUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (31, 3, 'CAJIGAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (32, 3, 'FREITES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (33, 3, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (34, 3, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (35, 3, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (36, 3, 'MONAGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (37, 3, 'PEÃ‘ALVER', '1');
INSERT INTO ".$this->prefix."taddress VALUES (38, 3, 'SIMON RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (39, 3, 'SOTILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (40, 3, 'GUANIPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (41, 3, 'GUANTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (42, 3, 'PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (43, 3, 'M.L/DIEGO BAUTISTA U', '1');
INSERT INTO ".$this->prefix."taddress VALUES (44, 3, 'CARVAJAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (45, 3, 'SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (46, 3, 'MC GREGOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (47, 3, 'S JUAN CAPISTRANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (48, 4, 'ACHAGUAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (49, 4, 'MUÃ‘OZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (50, 4, 'PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (51, 4, 'PEDRO CAMEJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (52, 4, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (53, 4, 'SAN FERNANDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (54, 4, 'BIRUACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (55, 5, 'GIRARDOT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (56, 5, 'SANTIAGO MARIÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (57, 5, 'JOSE FELIX RIVAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (58, 5, 'SAN CASIMIRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (59, 5, 'SAN SEBASTIAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (60, 5, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (61, 5, 'URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (62, 5, 'ZAMORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (63, 5, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (64, 5, 'JOSE ANGEL LAMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (65, 5, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (66, 5, 'SANTOS MICHELENA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (67, 5, 'MARIO B IRAGORRY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (68, 5, 'TOVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (69, 5, 'CAMATAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (70, 5, 'JOSE R REVENGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (71, 5, 'FRANCISCO LINARES A.', '1');
INSERT INTO ".$this->prefix."taddress VALUES (72, 5, 'M.OCUMARE D LA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (73, 6, 'ARISMENDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (74, 6, 'BARINAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (75, 6, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (76, 6, 'EZEQUIEL ZAMORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (77, 6, 'OBISPOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (78, 6, 'PEDRAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (79, 6, 'ROJAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (80, 6, 'SOSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (81, 6, 'ALBERTO ARVELO T', '1');
INSERT INTO ".$this->prefix."taddress VALUES (82, 6, 'A JOSE DE SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (83, 6, 'CRUZ PAREDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (84, 6, 'ANDRES E. BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (85, 7, 'CARONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (86, 7, 'CEDEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (87, 7, 'HERES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (88, 7, 'PIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (89, 7, 'ROSCIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (90, 7, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (91, 7, 'SIFONTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (92, 7, 'RAUL LEONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (93, 7, 'GRAN SABANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (94, 7, 'EL CALLAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (95, 7, 'PADRE PEDRO CHIEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (96, 8, 'BEJUMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (97, 8, 'CARLOS ARVELO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (98, 8, 'DIEGO IBARRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (99, 8, 'GUACARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (100, 8, 'MONTALBAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (101, 8, 'JUAN JOSE MORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (102, 8, 'PUERTO CABELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (103, 8, 'SAN JOAQUIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (104, 8, 'VALENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (105, 8, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (106, 8, 'LOS GUAYOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (107, 8, 'NAGUANAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (108, 8, 'SAN DIEGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (109, 8, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (110, 9, 'ANZOATEGUI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (111, 9, 'FALCON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (112, 9, 'GIRARDOT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (113, 9, 'MP PAO SN J BAUTISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (114, 9, 'RICAURTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (115, 9, 'SAN CARLOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (116, 9, 'TINACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (117, 9, 'LIMA BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (118, 9, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (119, 10, 'ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (120, 10, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (121, 10, 'BUCHIVACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (122, 10, 'CARIRUBANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (123, 10, 'COLINA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (124, 10, 'DEMOCRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (125, 10, 'FALCON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (126, 10, 'FEDERACION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (127, 10, 'MAUROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (128, 10, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (129, 10, 'PETIT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (130, 10, 'SILVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (131, 10, 'ZAMORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (132, 10, 'DABAJURO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (133, 10, 'MONS. ITURRIZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (134, 10, 'LOS TAQUES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (135, 10, 'PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (136, 10, 'UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (137, 10, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (138, 10, 'JACURA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (139, 10, 'CACIQUE MANAURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (140, 10, 'PALMA SOLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (141, 10, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (142, 10, 'URUMACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (143, 10, 'TOCOPERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (144, 11, 'INFANTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (145, 11, 'MELLADO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (146, 11, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (147, 11, 'MONAGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (148, 11, 'RIBAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (149, 11, 'ROSCIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (150, 11, 'ZARAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (151, 11, 'CAMAGUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (152, 11, 'S JOSE DE GUARIBE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (153, 11, 'LAS MERCEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (154, 11, 'EL SOCORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (155, 11, 'ORTIZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (156, 11, 'S MARIA DE IPIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (157, 11, 'CHAGUARAMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (158, 11, 'SAN GERONIMO DE G', '1');
INSERT INTO ".$this->prefix."taddress VALUES (159, 12, 'CRESPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (160, 12, 'IRIBARREN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (161, 12, 'JIMENEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (162, 12, 'MORAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (163, 12, 'PALAVECINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (164, 12, 'TORRES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (165, 12, 'URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (166, 12, 'ANDRES E BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (167, 12, 'SIMON PLANAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (168, 13, 'ALBERTO ADRIANI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (169, 13, 'ANDRES BELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (170, 13, 'ARZOBISPO CHACON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (171, 13, 'CAMPO ELIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (172, 13, 'GUARAQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (173, 13, 'JULIO CESAR SALAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (174, 13, 'JUSTO BRICEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (175, 13, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (176, 13, 'SANTOS MARQUINA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (177, 13, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (178, 13, 'ANTONIO PINTO S.', '1');
INSERT INTO ".$this->prefix."taddress VALUES (179, 13, 'OB. RAMOS DE LORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (180, 13, 'CARACCIOLO PARRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (181, 13, 'CARDENAL QUINTERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (182, 13, 'PUEBLO LLANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (183, 13, 'RANGEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (184, 13, 'RIVAS DAVILA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (185, 13, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (186, 13, 'TOVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (187, 13, 'TULIO F CORDERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (188, 13, 'PADRE NOGUERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (189, 13, 'ARICAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (190, 13, 'ZEA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (191, 14, 'ACEVEDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (192, 14, 'BRION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (193, 14, 'GUAICAIPURO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (194, 14, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (195, 14, 'LANDER', '1');
INSERT INTO ".$this->prefix."taddress VALUES (196, 14, 'PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (197, 14, 'PAZ CASTILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (198, 14, 'PLAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (199, 14, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (200, 14, 'URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (201, 14, 'ZAMORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (202, 14, 'CRISTOBAL ROJAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (203, 14, 'LOS SALIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (204, 14, 'ANDRES BELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (205, 14, 'SIMON BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (206, 14, 'BARUTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (207, 14, 'CARRIZAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (208, 14, 'CHACAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (209, 14, 'EL HATILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (210, 14, 'BUROZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (211, 14, 'PEDRO GUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (212, 15, 'ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (213, 15, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (214, 15, 'CARIPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (215, 15, 'CEDEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (216, 15, 'EZEQUIEL ZAMORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (217, 15, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (218, 15, 'MATURIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (219, 15, 'PIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (220, 15, 'PUNCERES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (221, 15, 'SOTILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (222, 15, 'AGUASAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (223, 15, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (224, 15, 'URACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (225, 16, 'ARISMENDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (226, 16, 'DIAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (227, 16, 'GOMEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (228, 16, 'MANEIRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (229, 16, 'MARCANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (230, 16, 'MARIÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (231, 16, 'PENIN. DE MACANAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (232, 16, 'VILLALBA(HE)', '1');
INSERT INTO ".$this->prefix."taddress VALUES (233, 16, 'TUBORES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (234, 16, 'ANTOLIN DEL CAMPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (235, 16, 'GARCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (236, 17, 'ARAURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (237, 17, 'ESTELLER', '1');
INSERT INTO ".$this->prefix."taddress VALUES (238, 17, 'GUANARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (239, 17, 'GUANARITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (240, 17, 'OSPINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (241, 17, 'PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (242, 17, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (243, 17, 'TUREN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (244, 17, 'M.JOSE V DE UNDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (245, 17, 'AGUA BLANCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (246, 17, 'PAPELON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (247, 17, 'GENARO BOCONOITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (248, 17, 'S RAFAEL DE ONOTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (249, 17, 'SANTA ROSALIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (250, 18, 'ARISMENDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (251, 18, 'BENITEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (252, 18, 'BERMUDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (253, 18, 'CAJIGAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (254, 18, 'MARIÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (255, 18, 'MEJIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (256, 18, 'MONTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (257, 18, 'RIBERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (258, 18, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (259, 18, 'VALDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (260, 18, 'ANDRES E BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (261, 18, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (262, 18, 'ANDRES MATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (263, 18, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (264, 18, 'CRUZ S ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (265, 19, 'AYACUCHO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (266, 19, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (267, 19, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (268, 19, 'CARDENAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (269, 19, 'JAUREGUI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (270, 19, 'JUNIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (271, 19, 'LOBATERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (272, 19, 'SAN CRISTOBAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (273, 19, 'URIBANTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (274, 19, 'CORDOBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (275, 19, 'GARCIA DE HEVIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (276, 19, 'GUASIMOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (277, 19, 'MICHELENA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (278, 19, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (279, 19, 'PANAMERICANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (280, 19, 'PEDRO MARIA UREÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (281, 19, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (282, 19, 'ANDRES BELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (283, 19, 'FERNANDEZ FEO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (284, 19, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (285, 19, 'SAMUEL MALDONADO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (286, 19, 'SEBORUCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (287, 19, 'ANTONIO ROMULO C', '1');
INSERT INTO ".$this->prefix."taddress VALUES (288, 19, 'FCO DE MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (289, 19, 'JOSE MARIA VARGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (290, 19, 'RAFAEL URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (291, 19, 'SIMON RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (292, 19, 'TORBES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (293, 19, 'SAN JUDAS TADEO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (294, 20, 'RAFAEL RANGEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (295, 20, 'BOCONO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (296, 20, 'CARACHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (297, 20, 'ESCUQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (298, 20, 'TRUJILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (299, 20, 'URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (300, 20, 'VALERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (301, 20, 'CANDELARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (302, 20, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (303, 20, 'MONTE CARMELO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (304, 20, 'MOTATAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (305, 20, 'PAMPAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (306, 20, 'S RAFAEL CARVAJAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (307, 20, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (308, 20, 'ANDRES BELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (309, 20, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (310, 20, 'JOSE F M CAÃ‘IZAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (311, 20, 'JUAN V CAMPO ELI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (312, 20, 'LA CEIBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (313, 20, 'PAMPANITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (314, 21, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (315, 21, 'BRUZUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (316, 21, 'NIRGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (317, 21, 'SAN FELIPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (318, 21, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (319, 21, 'URACHICHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (320, 21, 'PEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (321, 21, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (322, 21, 'LA TRINIDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (323, 21, 'COCOROTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (324, 21, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (325, 21, 'ARISTIDES BASTID', '1');
INSERT INTO ".$this->prefix."taddress VALUES (326, 21, 'MANUEL MONGE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (327, 21, 'VEROES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (328, 22, 'BARALT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (329, 22, 'SANTA RITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (330, 22, 'COLON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (331, 22, 'MARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (332, 22, 'MARACAIBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (333, 22, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (334, 22, 'PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (335, 22, 'MACHIQUES DE P', '1');
INSERT INTO ".$this->prefix."taddress VALUES (336, 22, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (337, 22, 'LA CAÃ‘ADA DE U.', '1');
INSERT INTO ".$this->prefix."taddress VALUES (338, 22, 'LAGUNILLAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (339, 22, 'CATATUMBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (340, 22, 'M/ROSARIO DE PERIJA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (341, 22, 'CABIMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (342, 22, 'VALMORE RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (343, 22, 'JESUS E LOSSADA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (344, 22, 'ALMIRANTE P', '1');
INSERT INTO ".$this->prefix."taddress VALUES (345, 22, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (346, 22, 'JESUS M SEMPRUN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (347, 22, 'FRANCISCO J PULG', '1');
INSERT INTO ".$this->prefix."taddress VALUES (348, 22, 'SIMON BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (349, 23, 'ATURES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (350, 23, 'ATABAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (351, 23, 'MAROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (352, 23, 'RIO NEGRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (353, 23, 'AUTANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (354, 23, 'MANAPIARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (355, 23, 'ALTO ORINOCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (356, 24, 'TUCUPITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (357, 24, 'PEDERNALES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (358, 24, 'ANTONIO DIAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (359, 24, 'CASACOIMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (360, 25, 'VARGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (361, 26, 'ALTAGRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (362, 26, 'CANDELARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (363, 26, 'CATEDRAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (364, 26, 'LA PASTORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (365, 26, 'SAN AGUSTIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (366, 26, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (367, 26, 'SAN JUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (368, 26, 'SANTA ROSALIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (369, 26, 'SANTA TERESA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (370, 26, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (371, 26, '23 DE ENERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (372, 26, 'ANTIMANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (373, 26, 'EL RECREO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (374, 26, 'EL VALLE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (375, 26, 'LA VEGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (376, 26, 'MACARAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (377, 26, 'CARICUAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (378, 26, 'EL JUNQUITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (379, 26, 'COCHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (380, 26, 'SAN PEDRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (381, 26, 'SAN BERNARDINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (382, 26, 'EL PARAISO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (383, 27, 'ANACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (384, 27, 'SAN JOAQUIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (385, 28, 'CM. ARAGUA DE BARCELONA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (386, 28, 'CACHIPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (387, 29, 'EL CARMEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (388, 29, 'SAN CRISTOBAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (389, 29, 'BERGANTIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (390, 29, 'CAIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (391, 29, 'EL PILAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (392, 29, 'NARICUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (393, 30, 'CM. CLARINES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (394, 30, 'GUANAPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (395, 30, 'SABANA DE UCHIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (396, 31, 'CM. ONOTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (397, 31, 'SAN PABLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (398, 32, 'CM. CANTAURA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (399, 32, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (400, 32, 'SANTA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (401, 32, 'URICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (402, 33, 'CM. SOLEDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (403, 33, 'MAMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (404, 34, 'CM. SAN MATEO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (405, 34, 'EL CARITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (406, 34, 'SANTA INES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (407, 35, 'CM. PARIAGUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (408, 35, 'ATAPIRIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (409, 35, 'BOCA DEL PAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (410, 35, 'EL PAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (411, 36, 'CM. MAPIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (412, 36, 'PIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (413, 36, 'SN DIEGO DE CABRUTICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (414, 36, 'SANTA CLARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (415, 36, 'UVERITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (416, 36, 'ZUATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (417, 37, 'CM. PUERTO PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (418, 37, 'SAN MIGUEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (419, 37, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (420, 38, 'CM. EL TIGRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (421, 39, 'POZUELOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (422, 39, 'CM PTO. LA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (423, 40, 'CM. SAN JOSE DE GUANIPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (424, 41, 'GUANTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (425, 41, 'CHORRERON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (426, 42, 'PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (427, 42, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (428, 43, 'LECHERIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (429, 43, 'EL MORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (430, 44, 'VALLE GUANAPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (431, 44, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (432, 45, 'SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (433, 45, 'PUEBLO NUEVO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (434, 46, 'EL CHAPARRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (435, 46, 'TOMAS ALFARO CALATRAVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (436, 47, 'BOCA UCHIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (437, 47, 'BOCA DE CHAVEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (438, 48, 'ACHAGUAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (439, 48, 'APURITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (440, 48, 'EL YAGUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (441, 48, 'GUACHARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (442, 48, 'MUCURITAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (443, 48, 'QUESERAS DEL MEDIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (444, 49, 'BRUZUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (445, 49, 'MANTECAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (446, 49, 'QUINTERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (447, 49, 'SAN VICENTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (448, 49, 'RINCON HONDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (449, 50, 'GUASDUALITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (450, 50, 'ARAMENDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (451, 50, 'EL AMPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (452, 50, 'SAN CAMILO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (453, 50, 'URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (454, 51, 'SAN JUAN DE PAYARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (455, 51, 'CODAZZI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (456, 51, 'CUNAVICHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (457, 52, 'ELORZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (458, 52, 'LA TRINIDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (459, 53, 'SAN FERNANDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (460, 53, 'PEÃ‘ALVER', '1');
INSERT INTO ".$this->prefix."taddress VALUES (461, 53, 'EL RECREO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (462, 53, 'SN RAFAEL DE ATAMAICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (463, 54, 'BIRUACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (464, 55, 'CM. LAS DELICIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (465, 55, 'CHORONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (466, 55, 'MADRE MA DE SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (467, 55, 'JOAQUIN CRESPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (468, 55, 'PEDRO JOSE OVALLES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (469, 55, 'JOSE CASANOVA GODOY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (470, 55, 'ANDRES ELOY BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (471, 55, 'LOS TACARIGUAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (472, 56, 'CM. TURMERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (473, 56, 'SAMAN DE GUERE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (474, 56, 'ALFREDO PACHECO M', '1');
INSERT INTO ".$this->prefix."taddress VALUES (475, 56, 'CHUAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (476, 56, 'AREVALO APONTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (477, 57, 'CM. LA VICTORIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (478, 57, 'ZUATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (479, 57, 'PAO DE ZARATE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (480, 57, 'CASTOR NIEVES RIOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (481, 57, 'LAS GUACAMAYAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (482, 58, 'CM. SAN CASIMIRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (483, 58, 'VALLE MORIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (484, 58, 'GUIRIPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (485, 58, 'OLLAS DE CARAMACATE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (486, 59, 'CM. SAN SEBASTIAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (487, 60, 'CM. CAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (488, 60, 'BELLA VISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (489, 61, 'CM. BARBACOAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (490, 61, 'SAN FRANCISCO DE CARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (491, 61, 'TAGUAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (492, 61, 'LAS PEÃ‘ITAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (493, 62, 'CM. VILLA DE CURA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (494, 62, 'MAGDALENO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (495, 62, 'SAN FRANCISCO DE ASIS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (496, 62, 'VALLES DE TUCUTUNEMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (497, 62, 'PQ AUGUSTO MIJARES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (498, 63, 'CM. PALO NEGRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (499, 63, 'SAN MARTIN DE PORRES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (500, 64, 'CM. SANTA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (501, 65, 'CM. SAN MATEO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (502, 66, 'CM. LAS TEJERIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (503, 66, 'TIARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (504, 67, 'CM. EL LIMON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (505, 67, 'CA A DE AZUCAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (506, 68, 'CM. COLONIA TOVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (507, 69, 'CM. CAMATAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (508, 69, 'CARMEN DE CURA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (509, 70, 'CM. EL CONSEJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (510, 71, 'CM. SANTA RITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (511, 71, 'FRANCISCO DE MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (512, 71, 'MONS FELICIANO G', '1');
INSERT INTO ".$this->prefix."taddress VALUES (513, 72, 'OCUMARE DE LA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (514, 73, 'ARISMENDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (515, 73, 'GUADARRAMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (516, 73, 'LA UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (517, 73, 'SAN ANTONIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (518, 74, 'ALFREDO A LARRIVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (519, 74, 'BARINAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (520, 74, 'SAN SILVESTRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (521, 74, 'SANTA INES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (522, 74, 'SANTA LUCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (523, 74, 'TORUNOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (524, 74, 'EL CARMEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (525, 74, 'ROMULO BETANCOURT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (526, 74, 'CORAZON DE JESUS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (527, 74, 'RAMON I MENDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (528, 74, 'ALTO BARINAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (529, 74, 'MANUEL P FAJARDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (530, 74, 'JUAN A RODRIGUEZ D', '1');
INSERT INTO ".$this->prefix."taddress VALUES (531, 74, 'DOMINGA ORTIZ P', '1');
INSERT INTO ".$this->prefix."taddress VALUES (532, 75, 'ALTAMIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (533, 75, 'BARINITAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (534, 75, 'CALDERAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (535, 76, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (536, 76, 'JOSE IGNACIO DEL PUMAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (537, 76, 'RAMON IGNACIO MENDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (538, 76, 'PEDRO BRICEÃ‘O MENDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (539, 77, 'EL REAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (540, 77, 'LA LUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (541, 77, 'OBISPOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (542, 77, 'LOS GUASIMITOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (543, 78, 'CIUDAD BOLIVIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (544, 78, 'IGNACIO BRICEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (545, 78, 'PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (546, 78, 'JOSE FELIX RIBAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (547, 79, 'DOLORES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (548, 79, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (549, 79, 'PALACIO FAJARDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (550, 79, 'SANTA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (551, 80, 'CIUDAD DE NUTRIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (552, 80, 'EL REGALO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (553, 80, 'PUERTO DE NUTRIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (554, 80, 'SANTA CATALINA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (555, 81, 'RODRIGUEZ DOMINGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (556, 81, 'SABANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (557, 82, 'TICOPORO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (558, 82, 'NICOLAS PULIDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (559, 82, 'ANDRES BELLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (560, 83, 'BARRANCAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (561, 83, 'EL SOCORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (562, 83, 'MASPARRITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (563, 84, 'EL CANTON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (564, 84, 'SANTA CRUZ DE GUACAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (565, 84, 'PUERTO VIVAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (566, 85, 'SIMON BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (567, 85, 'ONCE DE ABRIL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (568, 85, 'VISTA AL SOL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (569, 85, 'CHIRICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (570, 85, 'DALLA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (571, 85, 'CACHAMAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (572, 85, 'UNIVERSIDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (573, 85, 'UNARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (574, 85, 'YOCOIMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (575, 85, 'POZO VERDE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (576, 86, 'CM. CAICARA DEL ORINOCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (577, 86, 'ASCENSION FARRERAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (578, 86, 'ALTAGRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (579, 86, 'LA URBANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (580, 86, 'GUANIAMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (581, 86, 'PIJIGUAOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (582, 87, 'CATEDRAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (583, 87, 'AGUA SALADA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (584, 87, 'LA SABANITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (585, 87, 'VISTA HERMOSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (586, 87, 'MARHUANTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (587, 87, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (588, 87, 'ORINOCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (589, 87, 'PANAPANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (590, 87, 'ZEA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (591, 88, 'CM. UPATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (592, 88, 'ANDRES ELOY BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (593, 88, 'PEDRO COVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (594, 89, 'CM. GUASIPATI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (595, 89, 'SALOM', '1');
INSERT INTO ".$this->prefix."taddress VALUES (596, 90, 'CM. MARIPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (597, 90, 'ARIPAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (598, 90, 'LAS MAJADAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (599, 90, 'MOITACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (600, 90, 'GUARATARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (601, 91, 'CM. TUMEREMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (602, 91, 'DALLA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (603, 91, 'SAN ISIDRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (604, 92, 'CM. CIUDAD PIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (605, 92, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (606, 92, 'BARCELONETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (607, 92, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (608, 93, 'CM. SANTA ELENA DE UAIREN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (609, 93, 'IKABARU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (610, 94, 'CM. EL CALLAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (611, 95, 'CM. EL PALMAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (612, 96, 'BEJUMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (613, 96, 'CANOABO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (614, 96, 'SIMON BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (615, 97, 'GUIGUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (616, 97, 'BELEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (617, 97, 'TACARIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (618, 98, 'MARIARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (619, 98, 'AGUAS CALIENTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (620, 99, 'GUACARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (621, 99, 'CIUDAD ALIANZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (622, 99, 'YAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (623, 100, 'MONTALBAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (624, 101, 'MORON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (625, 101, 'URAMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (626, 102, 'DEMOCRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (627, 102, 'FRATERNIDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (628, 102, 'GOAIGOAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (629, 102, 'JUAN JOSE FLORES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (630, 102, 'BARTOLOME SALOM', '1');
INSERT INTO ".$this->prefix."taddress VALUES (631, 102, 'UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (632, 102, 'BORBURATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (633, 102, 'PATANEMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (634, 103, 'SAN JOAQUIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (635, 104, 'CANDELARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (636, 104, 'CATEDRAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (637, 104, 'EL SOCORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (638, 104, 'MIGUEL PEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (639, 104, 'SAN BLAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (640, 104, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (641, 104, 'SANTA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (642, 104, 'RAFAEL URDANETA', '1');
";
$sql.="INSERT INTO ".$this->prefix."taddress VALUES (643, 104, 'NEGRO PRIMERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (644, 105, 'MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (645, 106, 'U LOS GUAYOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (646, 107, 'NAGUANAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (647, 108, 'URB SAN DIEGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (648, 109, 'U TOCUYITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (649, 109, 'U INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (650, 110, 'COJEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (651, 110, 'JUAN DE MATA SUAREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (652, 111, 'TINAQUILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (653, 112, 'EL BAUL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (654, 112, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (655, 123, 'EL PAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (656, 114, 'LIBERTAD DE COJEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (657, 114, 'EL AMPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (658, 115, 'SAN CARLOS DE AUSTRIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (659, 115, 'JUAN ANGEL BRAVO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (660, 115, 'MANUEL MANRIQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (661, 116, 'GRL/JEFE JOSE L SILVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (662, 117, 'MACAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (663, 117, 'LA AGUADITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (664, 118, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (665, 119, 'SAN JUAN DE LOS CAYOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (666, 119, 'CAPADARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (667, 119, 'LA PASTORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (668, 119, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (669, 120, 'SAN LUIS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (670, 120, 'ARACUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (671, 120, 'LA PEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (672, 121, 'CAPATARIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (673, 121, 'BOROJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (674, 121, 'SEQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (675, 121, 'ZAZARIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (676, 121, 'BARIRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (677, 121, 'GUAJIRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (678, 122, 'NORTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (679, 122, 'CARIRUBANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (680, 122, 'PUNTA CARDON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (681, 122, 'SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (682, 123, 'LA VELA DE CORO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (683, 123, 'ACURIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (684, 123, 'GUAIBACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (685, 123, 'MACORUCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (686, 123, 'LAS CALDERAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (687, 124, 'PEDREGAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (688, 124, 'AGUA CLARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (689, 124, 'AVARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (690, 124, 'PIEDRA GRANDE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (691, 124, 'PURURECHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (692, 125, 'PUEBLO NUEVO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (693, 125, 'ADICORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (694, 125, 'BARAIVED', '1');
INSERT INTO ".$this->prefix."taddress VALUES (695, 125, 'BUENA VISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (696, 125, 'JADACAQUIVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (697, 125, 'MORUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (698, 125, 'EL VINCULO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (699, 125, 'EL HATO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (700, 125, 'ADAURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (701, 126, 'CHURUGUARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (702, 126, 'AGUA LARGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (703, 126, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (704, 126, 'MAPARARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (705, 126, 'EL PAUJI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (706, 127, 'MENE DE MAUROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (707, 127, 'CASIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (708, 127, 'SAN FELIX', '1');
INSERT INTO ".$this->prefix."taddress VALUES (709, 128, 'SAN ANTONIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (710, 128, 'SAN GABRIEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (711, 128, 'SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (712, 128, 'GUZMAN GUILLERMO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (713, 128, 'MITARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (714, 128, 'SABANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (715, 128, 'RIO SECO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (716, 129, 'CABURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (717, 129, 'CURIMAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (718, 129, 'COLINA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (719, 130, 'TUCACAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (720, 130, 'BOCA DE AROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (721, 131, 'PUERTO CUMAREBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (722, 131, 'LA CIENAGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (723, 131, 'LA SOLEDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (724, 131, 'PUEBLO CUMAREBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (725, 131, 'ZAZARIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (726, 132, 'CM. DABAJURO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (727, 133, 'CHICHIRIVICHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (728, 133, 'BOCA DE TOCUYO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (729, 133, 'TOCUYO DE LA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (730, 134, 'LOS TAQUES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (731, 134, 'JUDIBANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (732, 135, 'PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (733, 135, 'SAN JOSE DE LA COSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (734, 136, 'STA.CRUZ DE BUCARAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (735, 136, 'EL CHARAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (736, 136, 'LAS VEGAS DEL TUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (737, 137, 'CM. MIRIMIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (738, 138, 'JACURA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (739, 138, 'AGUA LINDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (740, 138, 'ARAURIMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (741, 139, 'CM. YARACAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (742, 140, 'CM. PALMA SOLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (743, 141, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (744, 141, 'PECAYA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (745, 142, 'URUMACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (746, 142, 'BRUZUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (747, 143, 'CM. TOCOPERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (748, 144, 'VALLE DE LA PASCUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (749, 144, 'ESPINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (750, 145, 'EL SOMBRERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (751, 145, 'SOSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (752, 146, 'CALABOZO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (753, 146, 'EL CALVARIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (754, 146, 'EL RASTRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (755, 146, 'GUARDATINAJAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (756, 147, 'ALTAGRACIA DE ORITUCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (757, 147, 'LEZAMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (758, 147, 'LIBERTAD DE ORITUCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (759, 147, 'SAN FCO DE MACAIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (760, 147, 'SAN RAFAEL DE ORITUCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (761, 147, 'SOUBLETTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (762, 147, 'PASO REAL DE MACAIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (763, 148, 'TUCUPIDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (764, 148, 'SAN RAFAEL DE LAYA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (765, 149, 'SAN JUAN DE LOS MORROS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (766, 149, 'PARAPARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (767, 149, 'CANTAGALLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (768, 150, 'ZARAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (769, 150, 'SAN JOSE DE UNARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (770, 151, 'CAMAGUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (771, 151, 'PUERTO MIRANDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (772, 151, 'UVERITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (773, 152, 'SAN JOSE DE GUARIBE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (774, 153, 'LAS MERCEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (775, 153, 'STA RITA DE MANAPIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (776, 153, 'CABRUTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (777, 154, 'EL SOCORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (778, 155, 'ORTIZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (779, 155, 'SAN FCO. DE TIZNADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (780, 155, 'SAN JOSE DE TIZNADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (781, 155, 'S LORENZO DE TIZNADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (782, 156, 'SANTA MARIA DE IPIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (783, 156, 'ALTAMIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (784, 157, 'CHAGUARAMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (785, 158, 'GUAYABAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (786, 158, 'CAZORLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (787, 159, 'FREITEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (788, 159, 'JOSE MARIA BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (789, 160, 'CATEDRAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (790, 160, 'LA CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (791, 160, 'SANTA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (792, 160, 'UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (793, 160, 'EL CUJI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (794, 160, 'TAMACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (795, 160, 'JUAN DE VILLEGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (796, 160, 'AGUEDO F. ALVARADO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (797, 160, 'BUENA VISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (798, 160, 'JUAREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (799, 161, 'JUAN B RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (800, 161, 'DIEGO DE LOZADA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (801, 161, 'SAN MIGUEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (802, 161, 'CUARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (803, 161, 'PARAISO DE SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (804, 161, 'TINTORERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (805, 161, 'JOSE BERNARDO DORANTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (806, 161, 'CRNEL. MARIANO PERAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (807, 162, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (808, 162, 'ANZOATEGUI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (809, 162, 'GUARICO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (810, 162, 'HUMOCARO ALTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (811, 162, 'HUMOCARO BAJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (812, 162, 'MORAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (813, 162, 'HILARIO LUNA Y LUNA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (814, 162, 'LA CANDELARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (815, 163, 'CABUDARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (816, 163, 'JOSE G. BASTIDAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (817, 163, 'AGUA VIVA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (818, 164, 'TRINIDAD SAMUEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (819, 164, 'ANTONIO DIAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (820, 164, 'CAMACARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (821, 164, 'CASTAÃ‘EDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (822, 164, 'CHIQUINQUIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (823, 164, 'ESPINOZA LOS MONTEROS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (824, 164, 'LARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (825, 164, 'MANUEL MORILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (826, 164, 'MONTES DE OCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (827, 164, 'TORRES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (828, 164, 'EL BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (829, 164, 'MONTA A VERDE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (830, 164, 'HERIBERTO ARROYO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (831, 164, 'LAS MERCEDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (832, 164, 'CECILIO ZUBILLAGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (833, 164, 'REYES VARGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (834, 164, 'ALTAGRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (835, 165, 'SIQUISIQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (836, 165, 'SAN MIGUEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (837, 165, 'XAGUAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (838, 165, 'MOROTURO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (839, 166, 'PIO TAMAYO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (840, 166, 'YACAMBU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (841, 166, 'QBDA. HONDA DE GUACHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (842, 167, 'SARARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (843, 167, 'GUSTAVO VEGAS LEON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (844, 167, 'BURIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (845, 168, 'GABRIEL PICON G.', '1');
INSERT INTO ".$this->prefix."taddress VALUES (846, 168, 'HECTOR AMABLE MORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (847, 168, 'JOSE NUCETE SARDI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (848, 168, 'PULIDO MENDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (849, 168, 'PTE. ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (850, 168, 'PRESIDENTE BETANCOURT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (851, 168, 'PRESIDENTE PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (852, 169, 'CM. LA AZULITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (853, 170, 'CM. CANAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (854, 170, 'CAPURI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (855, 170, 'CHACANTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (856, 170, 'EL MOLINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (857, 170, 'GUAIMARAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (858, 170, 'MUCUTUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (859, 170, 'MUCUCHACHI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (860, 171, 'ACEQUIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (861, 171, 'JAJI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (862, 171, 'LA MESA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (863, 171, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (864, 171, 'MONTALBAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (865, 171, 'MATRIZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (866, 171, 'FERNANDEZ PEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (867, 172, 'CM. GUARAQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (868, 172, 'MESA DE QUINTERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (869, 172, 'RIO NEGRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (870, 173, 'CM. ARAPUEY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (871, 173, 'PALMIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (872, 174, 'CM. TORONDOY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (873, 174, 'SAN CRISTOBAL DE T', '1');
INSERT INTO ".$this->prefix."taddress VALUES (874, 175, 'ARIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (875, 175, 'SAGRARIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (876, 175, 'MILLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (877, 175, 'EL LLANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (878, 175, 'JUAN RODRIGUEZ SUAREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (879, 175, 'JACINTO PLAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (880, 175, 'DOMINGO PEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (881, 175, 'GONZALO PICON FEBRES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (882, 175, 'OSUNA RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (883, 175, 'LASSO DE LA VEGA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (884, 175, 'CARACCIOLO PARRA P', '1');
INSERT INTO ".$this->prefix."taddress VALUES (885, 175, 'MARIANO PICON SALAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (886, 175, 'ANTONIO SPINETTI DINI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (887, 175, 'EL MORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (888, 175, 'LOS NEVADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (889, 176, 'CM. TABAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (890, 177, 'CM. TIMOTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (891, 177, 'ANDRES ELOY BLANCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (892, 177, 'PIÃ‘ANGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (893, 177, 'LA VENTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (894, 178, 'CM. STA CRUZ DE MORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (895, 178, 'MESA BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (896, 178, 'MESA DE LAS PALMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (897, 179, 'CM. STA ELENA DE ARENALES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (898, 179, 'ELOY PAREDES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (899, 179, 'PQ R DE ALCAZAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (900, 180, 'CM. TUCANI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (901, 180, 'FLORENCIO RAMIREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (902, 181, 'CM. SANTO DOMINGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (903, 181, 'LAS PIEDRAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (904, 182, 'CM. PUEBLO LLANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (905, 183, 'CM. MUCUCHIES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (906, 183, 'MUCURUBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (907, 183, 'SAN RAFAEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (908, 183, 'CACUTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (909, 183, 'LA TOMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (910, 184, 'CM. BAILADORES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (911, 184, 'GERONIMO MALDONADO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (912, 185, 'CM. LAGUNILLAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (913, 185, 'CHIGUARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (914, 185, 'ESTANQUES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (915, 185, 'SAN JUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (916, 185, 'PUEBLO NUEVO DEL SUR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (917, 185, 'LA TRAMPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (918, 186, 'EL LLANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (919, 186, 'TOVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (920, 186, 'EL AMPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (921, 186, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (922, 187, 'CM. NUEVA BOLIVIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (923, 187, 'INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (924, 187, 'MARIA C PALACIOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (925, 187, 'SANTA APOLONIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (926, 188, 'CM. STA MARIA DE CAPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (927, 189, 'CM. ARICAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (928, 189, 'SAN ANTONIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (929, 190, 'CM. ZEA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (930, 190, 'CAÃ‘O EL TIGRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (931, 191, 'CAUCAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (932, 191, 'ARAGUITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (933, 191, 'AREVALO GONZALEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (934, 191, 'CAPAYA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (935, 191, 'PANAQUIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (936, 191, 'RIBAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (937, 191, 'EL CAFE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (938, 191, 'MARIZAPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (939, 192, 'HIGUEROTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (940, 192, 'CURIEPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (941, 192, 'TACARIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (942, 193, 'LOS TEQUES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (943, 193, 'CECILIO ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (944, 193, 'PARACOTOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (945, 193, 'SAN PEDRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (946, 193, 'TACATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (947, 193, 'EL JARILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (948, 193, 'ALTAGRACIA DE LA M', '1');
INSERT INTO ".$this->prefix."taddress VALUES (949, 194, 'STA TERESA DEL TUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (950, 194, 'EL CARTANAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (951, 195, 'OCUMARE DEL TUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (952, 195, 'LA DEMOCRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (953, 195, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (954, 196, 'RIO CHICO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (955, 196, 'EL GUAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (956, 196, 'TACARIGUA DE LA LAGUNA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (957, 196, 'PAPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (958, 196, 'SN FERNANDO DEL GUAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (959, 197, 'SANTA LUCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (960, 198, 'GUARENAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (961, 199, 'PETARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (962, 199, 'LEONCIO MARTINEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (963, 199, 'CAUCAGUITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (964, 199, 'FILAS DE MARICHES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (965, 199, 'LA DOLORITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (966, 200, 'CUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (967, 200, 'NUEVA CUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (968, 201, 'GUATIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (969, 201, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (970, 202, 'CHARALLAVE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (971, 202, 'LAS BRISAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (972, 203, 'SAN ANTONIO LOS ALTOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (973, 204, 'SAN JOSE DE BARLOVENTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (974, 204, 'CUMBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (975, 205, 'SAN FCO DE YARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (976, 205, 'S ANTONIO DE YARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (977, 206, 'BARUTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (978, 206, 'EL CAFETAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (979, 206, 'LAS MINAS DE BARUTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (980, 207, 'CARRIZAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (981, 208, 'CHACAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (982, 209, 'EL HATILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (983, 210, 'MAMPORAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (984, 211, 'CUPIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (985, 211, 'MACHURUCUTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (986, 212, 'CM. SAN ANTONIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (987, 212, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (988, 213, 'CM. CARIPITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (989, 214, 'CM. CARIPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (990, 214, 'TERESEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (991, 214, 'EL GUACHARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (992, 214, 'SAN AGUSTIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (993, 214, 'LA GUANOTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (994, 214, 'SABANA DE PIEDRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (995, 215, 'CM. CAICARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (996, 215, 'AREO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (997, 215, 'SAN FELIX', '1');
INSERT INTO ".$this->prefix."taddress VALUES (998, 215, 'VIENTO FRESCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (999, 216, 'CM. PUNTA DE MATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1000, 216, 'EL TEJERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1001, 217, 'CM. TEMBLADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1002, 217, 'TABASCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1003, 217, 'LAS ALHUACAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1004, 217, 'CHAGUARAMAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1005, 218, 'EL FURRIAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1006, 218, 'JUSEPIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1007, 218, 'EL COROZO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1008, 218, 'SAN VICENTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1009, 218, 'LA PICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1010, 218, 'ALTO DE LOS GODOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1011, 218, 'BOQUERON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1012, 218, 'LAS COCUIZAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1013, 218, 'SANTA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1014, 218, 'SAN SIMON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1015, 219, 'CM. ARAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1016, 219, 'CHAGUARAMAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1017, 219, 'GUANAGUANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1018, 219, 'APARICIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1019, 219, 'TAGUAYA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1020, 219, 'EL PINTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1021, 219, 'LA TOSCANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1022, 220, 'CM. QUIRIQUIRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1023, 220, 'CACHIPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1024, 221, 'CM. BARRANCAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1025, 221, 'LOS BARRANCOS DE FAJARDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1026, 222, 'CM. AGUASAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1027, 223, 'CM. SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1028, 224, 'CM. URACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1029, 225, 'CM. LA ASUNCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1030, 226, 'CM. SAN JUAN BAUTISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1031, 226, 'ZABALA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1032, 227, 'CM. SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1033, 227, 'GUEVARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1034, 227, 'MATASIETE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1035, 227, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1036, 227, 'SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1037, 228, 'CM. PAMPATAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1038, 228, 'AGUIRRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1039, 229, 'CM. JUAN GRIEGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1040, 229, 'ADRIAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1041, 230, 'CM. PORLAMAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1042, 231, 'CM. BOCA DEL RIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1043, 231, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1044, 232, 'CM. SAN PEDRO DE COCHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1045, 232, 'VICENTE FUENTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1046, 233, 'CM. PUNTA DE PIEDRAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1047, 233, 'LOS BARALES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1048, 234, 'CM.LA PLAZA DE PARAGUACHI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1049, 235, 'CM. VALLE ESP SANTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1050, 235, 'FRANCISCO FAJARDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1051, 236, 'CM. ARAURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1052, 236, 'RIO ACARIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1053, 237, 'CM. PIRITU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1054, 237, 'UVERAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1055, 238, 'CM. GUANARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1056, 238, 'CORDOBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1057, 238, 'SAN JUAN GUANAGUANARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1058, 238, 'VIRGEN DE LA COROMOTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1059, 238, 'SAN JOSE DE LA MONTAÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1060, 239, 'CM. GUANARITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1061, 239, 'TRINIDAD DE LA CAPILLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1062, 239, 'DIVINA PASTORA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1063, 240, 'CM. OSPINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1064, 240, 'APARICION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1065, 240, 'LA ESTACION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1066, 241, 'CM. ACARIGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1067, 241, 'PAYARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1068, 241, 'PIMPINELA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1069, 241, 'RAMON PERAZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1070, 242, 'CM. BISCUCUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1071, 242, 'CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1072, 242, 'SAN RAFAEL PALO ALZADO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1073, 242, 'UVENCIO A VELASQUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1074, 242, 'SAN JOSE DE SAGUAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1075, 242, 'VILLA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1076, 243, 'CM. VILLA BRUZUAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1077, 243, 'CANELONES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1078, 243, 'SANTA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1079, 243, 'SAN ISIDRO LABRADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1080, 244, 'CM. CHABASQUEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1081, 244, 'PEÃ‘A BLANCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1082, 245, 'CM. AGUA BLANCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1083, 246, 'CM. PAPELON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1084, 246, 'CAÃ‘O DELGADITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1085, 247, 'CM. BOCONOITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1086, 247, 'ANTOLIN TOVAR AQUINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1087, 248, 'CM. SAN RAFAEL DE ONOTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1088, 248, 'SANTA FE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1089, 248, 'THERMO MORLES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1090, 249, 'CM. EL PLAYON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1091, 249, 'FLORIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1092, 250, 'RIO CARIBE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1093, 250, 'SAN JUAN GALDONAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1094, 250, 'PUERTO SANTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1095, 250, 'EL MORRO DE PTO SANTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1096, 250, 'ANTONIO JOSE DE SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1097, 251, 'EL PILAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1098, 251, 'EL RINCON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1099, 251, 'GUARAUNOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1100, 251, 'TUNAPUICITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1101, 251, 'UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1102, 251, 'GRAL FCO. A VASQUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1103, 252, 'SANTA CATALINA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1104, 252, 'SANTA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1105, 252, 'SANTA TERESA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1106, 252, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1107, 252, 'MACARAPANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1108, 253, 'YAGUARAPARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1109, 253, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1110, 253, 'PAUJIL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1111, 254, 'IRAPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1112, 254, 'CAMPO CLARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1113, 254, 'SORO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1114, 254, 'SAN ANTONIO DE IRAPA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1115, 254, 'MARABAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1116, 255, 'CM. SAN ANT DEL GOLFO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1117, 256, 'CUMANACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1118, 256, 'ARENAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1119, 256, 'ARICAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1120, 256, 'COCOLLAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1121, 256, 'SAN FERNANDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1122, 256, 'SAN LORENZO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1123, 257, 'CARIACO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1124, 257, 'CATUARO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1125, 257, 'RENDON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1126, 257, 'SANTA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1127, 257, 'SANTA MARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1128, 258, 'ALTAGRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1129, 258, 'AYACUCHO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1130, 258, 'SANTA INES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1131, 258, 'VALENTIN VALIENTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1132, 258, 'SAN JUAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1133, 258, 'GRAN MARISCAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1134, 258, 'RAUL LEONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1135, 259, 'GUIRIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1136, 259, 'CRISTOBAL COLON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1137, 259, 'PUNTA DE PIEDRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1138, 259, 'BIDEAU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1139, 260, 'MARIÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1140, 260, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1141, 261, 'TUNAPUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1142, 261, 'CAMPO ELIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1143, 262, 'SAN JOSE DE AREOCUAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1144, 262, 'TAVERA ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1145, 263, 'CM. MARIGUITAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1146, 264, 'ARAYA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1147, 264, 'MANICUARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1148, 264, 'CHACOPATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1149, 265, 'CM. COLON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1150, 265, 'RIVAS BERTI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1151, 265, 'SAN PEDRO DEL RIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1152, 266, 'CM. SAN ANT DEL TACHIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1153, 266, 'PALOTAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1154, 266, 'JUAN VICENTE GOMEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1155, 266, 'ISAIAS MEDINA ANGARIT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1156, 267, 'CM. CAPACHO NUEVO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1157, 267, 'JUAN GERMAN ROSCIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1158, 267, 'ROMAN CARDENAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1159, 268, 'CM. TARIBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1160, 268, 'LA FLORIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1161, 268, 'AMENODORO RANGEL LAMU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1162, 269, 'CM. LA GRITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1163, 269, 'EMILIO C. GUERRERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1164, 269, 'MONS. MIGUEL A SALAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1165, 270, 'CM. RUBIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1166, 270, 'BRAMON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1167, 270, 'LA PETROLEA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1168, 270, 'QUINIMARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1169, 271, 'CM. LOBATERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1170, 271, 'CONSTITUCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1171, 272, 'LA CONCORDIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1172, 272, 'PEDRO MARIA MORANTES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1173, 272, 'SN JUAN BAUTISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1174, 272, 'SAN SEBASTIAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1175, 272, 'DR. FCO. ROMERO LOBO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1176, 273, 'CM. PREGONERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1177, 273, 'CARDENAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1178, 273, 'POTOSI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1179, 273, 'JUAN PABLO PEÃ‘ALOZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1180, 274, 'CM. STA. ANA  DEL TACHIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1181, 275, 'CM. LA FRIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1182, 275, 'BOCA DE GRITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1183, 275, 'JOSE ANTONIO PAEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1184, 276, 'CM. PALMIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1185, 277, 'CM. MICHELENA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1186, 278, 'CM. ABEJALES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1187, 278, 'SAN JOAQUIN DE NAVAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1188, 278, 'DORADAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1189, 278, 'EMETERIO OCHOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1190, 279, 'CM. COLONCITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1191, 279, 'LA PALMITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1192, 280, 'CM. UREÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1193, 280, 'NUEVA ARCADIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1194, 281, 'CM. QUENIQUEA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1195, 281, 'SAN PABLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1196, 281, 'ELEAZAR LOPEZ CONTRERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1197, 281, 'CM. CORDERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1198, 283, 'CM.SAN RAFAEL DEL PINAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1199, 283, 'SANTO DOMINGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1200, 283, 'ALBERTO ADRIANI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1201, 284, 'CM. CAPACHO VIEJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1202, 284, 'CIPRIANO CASTRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1203, 284, 'MANUEL FELIPE RUGELES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1204, 285, 'CM. LA TENDIDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1205, 285, 'BOCONO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1206, 285, 'HERNANDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1207, 286, 'CM. SEBORUCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1208, 287, 'CM. LAS MESAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1209, 288, 'CM. SAN JOSE DE BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1210, 289, 'CM. EL COBRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1211, 290, 'CM. DELICIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1212, 291, 'CM. SAN SIMON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1213, 292, 'CM. SAN JOSECITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1214, 293, 'CM. UMUQUENA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1215, 294, 'BETIJOQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1216, 294, 'JOSE G HERNANDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1217, 294, 'LA PUEBLITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1218, 294, 'EL CEDRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1219, 295, 'BOCONO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1220, 295, 'EL CARMEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1221, 295, 'MOSQUEY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1222, 295, 'AYACUCHO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1223, 295, 'BURBUSAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1224, 295, 'GENERAL RIVAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1225, 295, 'MONSEÃ‘OR JAUREGUI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1226, 295, 'RAFAEL RANGEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1227, 295, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1228, 295, 'SAN MIGUEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1229, 295, 'GUARAMACAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1230, 295, 'LA VEGA DE GUARAMACAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1231, 296, 'CARACHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1232, 296, 'LA CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1233, 296, 'CUICAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1234, 296, 'PANAMERICANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1235, 296, 'SANTA CRUZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1236, 297, 'ESCUQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1237, 297, 'SABANA LIBRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1238, 297, 'LA UNION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1239, 297, 'SANTA RITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1240, 298, 'CRISTOBAL MENDOZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1241, 298, 'CHIQUINQUIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1242, 298, 'MATRIZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1243, 298, 'MONSEÃ‘OR CARRILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1244, 298, 'CRUZ CARRILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1245, 298, 'ANDRES LINARES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1246, 298, 'TRES ESQUINAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1247, 299, 'LA QUEBRADA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1248, 299, 'JAJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1249, 299, 'LA MESA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1250, 299, 'SANTIAGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1251, 299, 'CABIMBU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1252, 299, 'TUÃ‘AME', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1253, 300, 'MERCEDES DIAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1254, 300, 'JUAN IGNACIO MONTILLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1255, 300, 'LA BEATRIZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1256, 300, 'MENDOZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1257, 300, 'LA PUERTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1258, 300, 'SAN LUIS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1259, 301, 'CHEJENDE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1260, 301, 'CARRILLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1261, 301, 'CEGARRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1262, 301, 'BOLIVIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1263, 301, 'MANUEL SALVADOR ULLOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1264, 301, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1265, 301, 'ARNOLDO GABALDON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1266, 302, 'EL DIVIDIVE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1267, 302, 'AGUA CALIENTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1268, 302, 'EL CENIZO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1269, 302, 'AGUA SANTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1270, 302, 'VALERITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1271, 303, 'MONTE CARMELO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1272, 303, 'BUENA VISTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1273, 303, 'STA MARIA DEL HORCON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1274, 304, 'MOTATAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1275, 304, 'EL BAÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1276, 304, 'JALISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1277, 305, 'PAMPAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1278, 305, 'SANTA ANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1279, 305, 'LA PAZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1280, 305, 'FLOR DE PATRIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1281, 306, 'CARVAJAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1282, 306, 'ANTONIO N BRICEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1283, 306, 'CAMPO ALEGRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1284, 306, 'JOSE LEONARDO SUAREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1285, 307, 'SABANA DE MENDOZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1286, 307, 'JUNIN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1287, 307, 'VALMORE RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1288, 307, 'EL PARAISO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1289, 308, 'SANTA ISABEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1290, 308, 'ARAGUANEY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1291, 308, 'EL JAGUITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1292, 308, 'LA ESPERANZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1293, 309, 'SABANA GRANDE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1294, 309, 'CHEREGUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1295, 309, 'GRANADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1296, 310, 'EL SOCORRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1297, 310, 'LOS CAPRICHOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1298, 310, 'ANTONIO JOSE DE SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1299, 311, 'CAMPO ELIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1300, 311, 'ARNOLDO GABALDON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1301, 312, 'SANTA APOLONIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1302, 312, 'LA CEIBA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1303, 312, 'EL PROGRESO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1304, 312, 'TRES DE FEBRERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1305, 313, 'PAMPANITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1306, 313, 'PAMPANITO II', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1307, 313, 'LA CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1308, 214, 'CM. AROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1309, 315, 'CM. CHIVACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1310, 315, 'CAMPO ELIAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1311, 316, 'CM. NIRGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1312, 316, 'SALOM', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1313, 316, 'TEMERLA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1314, 317, 'CM. SAN FELIPE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1315, 317, 'ALBARICO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1316, 317, 'SAN JAVIER', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1317, 318, 'CM. GUAMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1318, 319, 'CM. URACHICHE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1319, 320, 'CM. YARITAGUA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1320, 320, 'SAN ANDRES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1321, 321, 'CM. SABANA DE PARRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1322, 322, 'CM. BORAURE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1323, 323, 'CM. COCOROTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1324, 324, 'CM. INDEPENDENCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1325, 325, 'CM. SAN PABLO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1326, 326, 'CM. YUMARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1327, 327, 'CM. FARRIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1328, 327, 'EL GUAYABO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1329, 328, 'GENERAL URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1330, 328, 'LIBERTADOR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1331, 328, 'MANUEL GUANIPA MATOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1332, 328, 'MARCELINO BRICEÃ‘O', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1333, 328, 'SAN TIMOTEO', '1');";
$sql.="INSERT INTO ".$this->prefix."taddress VALUES (1334, 328, 'PUEBLO NUEVO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1335, 329, 'PEDRO LUCAS URRIBARRI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1336, 329, 'SANTA RITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1337, 329, 'JOSE CENOVIO URRIBARR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1338, 329, 'EL MENE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1339, 330, 'SANTA CRUZ DEL ZULIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1340, 330, 'URRIBARRI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1341, 330, 'MORALITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1342, 330, 'SAN CARLOS DEL ZULIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1343, 330, 'SANTA BARBARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1344, 331, 'LUIS DE VICENTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1345, 331, 'RICAURTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1346, 331, 'MONS.MARCOS SERGIO G', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1347, 331, 'SAN RAFAEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1348, 331, 'LAS PARCELAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1349, 331, 'TAMARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1350, 331, 'LA SIERRITA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1351, 332, 'BOLIVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1352, 332, 'COQUIVACOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1353, 332, 'CRISTO DE ARANZA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1354, 332, 'CHIQUINQUIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1355, 332, 'SANTA LUCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1356, 332, 'OLEGARIO VILLALOBOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1357, 332, 'JUANA DE AVILA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1358, 332, 'CARACCIOLO PARRA PEREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1359, 332, 'IDELFONZO VASQUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1360, 332, 'CACIQUE MARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1361, 332, 'CECILIO ACOSTA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1362, 332, 'RAUL LEONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1363, 332, 'FRANCISCO EUGENIO B', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1364, 332, 'MANUEL DAGNINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1365, 332, 'LUIS HURTADO HIGUERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1366, 332, 'VENANCIO PULGAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1367, 332, 'ANTONIO BORJAS ROMERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1368, 332, 'SAN ISIDRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1369, 333, 'FARIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1370, 333, 'SAN ANTONIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1371, 333, 'ANA MARIA CAMPOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1372, 333, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1373, 333, 'ALTAGRACIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1374, 334, 'GOAJIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1375, 334, 'ELIAS SANCHEZ RUBIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1376, 334, 'SINAMAICA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1377, 334, 'ALTA GUAJIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1378, 335, 'SAN JOSE DE PERIJA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1379, 335, 'BARTOLOME DE LAS CASAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1380, 335, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1381, 335, 'RIO NEGRO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1382, 336, 'GIBRALTAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1383, 336, 'HERAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1384, 336, 'M.ARTURO CELESTINO A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1385, 336, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1386, 336, 'BOBURES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1387, 336, 'EL BATEY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1388, 337, 'ANDRES BELLO (', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1389, 337, 'POTRERITOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1390, 337, 'EL CARMELO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1391, 337, 'CHIQUINQUIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1392, 337, 'CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1393, 338, 'ELEAZAR LOPEZ C', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1394, 338, 'ALONSO DE OJEDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1395, 338, 'VENEZUELA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1396, 338, 'CAMPO LARA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1397, 338, 'LIBERTAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1398, 339, 'UDON PEREZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1399, 339, 'ENCONTRADOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1400, 340, 'DONALDO GARCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1401, 340, 'SIXTO ZAMBRANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1402, 340, 'EL ROSARIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1403, 341, 'AMBROSIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1404, 341, 'GERMAN RIOS LINARES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1405, 341, 'JORGE HERNANDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1406, 341, 'LA ROSA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1407, 341, 'PUNTA GORDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1408, 341, 'CARMEN HERRERA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1409, 341, 'SAN BENITO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1410, 341, 'ROMULO BETANCOURT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1411, 341, 'ARISTIDES CALVANI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1412, 342, 'RAUL CUENCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1413, 342, 'LA VICTORIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1414, 342, 'RAFAEL URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1415, 343, 'JOSE RAMON YEPEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1416, 343, 'LA CONCEPCION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1417, 343, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1418, 343, 'MARIANO PARRA LEON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1419, 344, 'MONAGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1420, 344, 'ISLA DE TOAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1421, 345, 'MARCIAL HERNANDEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1422, 345, 'FRANCISCO OCHOA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1423, 345, 'SAN FRANCISCO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1424, 345, 'EL BAJO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1425, 345, 'DOMITILA FLORES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1426, 345, 'LOS CORTIJOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1427, 346, 'BARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1428, 346, 'JESUS M SEMPRUN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1429, 347, 'SIMON RODRIGUEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1430, 347, 'CARLOS QUEVEDO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1431, 347, 'FRANCISCO J PULGAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1432, 348, 'RAFAEL MARIA BARALT', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1433, 348, 'MANUEL MANRIQUE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1434, 348, 'RAFAEL URDANETA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1435, 349, 'FERNANDO GIRON TOVAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1436, 349, 'LUIS ALBERTO GOMEZ', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1437, 349, 'PARHUEÃ‘A', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1438, 349, 'PLATANILLAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1439, 350, 'CM. SAN FERNANDO DE ATABA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1440, 350, 'UCATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1441, 350, 'YAPACANA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1442, 350, 'CANAME', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1443, 351, 'CM. MAROA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1444, 351, 'VICTORINO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1445, 351, 'COMUNIDAD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1446, 352, 'CM. SAN CARLOS DE RIO NEG', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1447, 352, 'SOLANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1448, 352, 'COCUY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1449, 353, 'CM. ISLA DE RATON', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1450, 353, 'SAMARIAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1451, 353, 'SIPAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1452, 353, 'MUNDUAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1453, 353, 'GUAYAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1454, 354, 'CM. SAN JUAN DE MANAPIARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1455, 354, 'ALTO VENTUARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1456, 354, 'MEDIO VENTUARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1457, 354, 'BAJO VENTUARI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1458, 355, 'CM. LA ESMERALDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1459, 355, 'HUACHAMACARE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1460, 355, 'MARAWAKA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1461, 355, 'MAVACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1462, 355, 'SIERRA PARIMA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1463, 356, 'SAN JOSE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1464, 356, 'VIRGEN DEL VALLE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1465, 356, 'SAN RAFAEL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1466, 356, 'JOSE VIDAL MARCANO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1467, 356, 'LEONARDO RUIZ PINEDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1468, 356, 'MONS. ARGIMIRO GARCIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1469, 356, 'MCL.ANTONIO J DE SUCRE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1470, 356, 'JUAN MILLAN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1471, 357, 'PEDERNALES', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1472, 357, 'LUIS B PRIETO FIGUERO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1473, 358, 'CURIAPO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1474, 358, 'SANTOS DE ABELGAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1475, 358, 'MANUEL RENAUD', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1476, 358, 'PADRE BARRAL', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1477, 358, 'ANICETO LUGO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1478, 358, 'ALMIRANTE LUIS BRION', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1479, 359, 'IMATACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1480, 359, 'ROMULO GALLEGOS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1481, 359, 'JUAN BAUTISTA ARISMEN', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1482, 359, 'MANUEL PIAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1483, 359, '5 DE JULIO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1484, 360, 'CARABALLEDA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1485, 360, 'CARAYACA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1486, 360, 'CARUAO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1487, 360, 'CATIA LA MAR', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1488, 360, 'LA GUAIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1489, 360, 'MACUTO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1490, 360, 'MAIQUETIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1491, 360, 'NAIGUATA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1492, 360, 'EL JUNKO', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1493, 360, 'PQ RAUL LEONI', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1494, 360, 'PQ CARLOS SOUBLETTE', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1495, 0, 'COLOMBIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1496, 1495, 'LA GUAJIRA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1497, 1495, 'AMAZONAS', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1498, 1495, 'ARAUCA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1499, 1495, 'ANTIOQUIA', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1500, 0, 'URUGUAY', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1501, 0, 'PERU', '1');
INSERT INTO ".$this->prefix."taddress VALUES (1502, 1501, 'LIMA', '1');

INSERT INTO ".$this->prefix."tcharge VALUES (1, 'Administrador', '1');
INSERT INTO ".$this->prefix."tcharge VALUES (2, 'gerente', '1');

INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6588, 1, 28, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6589, 1, 28, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6590, 1, 28, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6591, 1, 23, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6592, 1, 23, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6593, 1, 23, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6594, 1, 23, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6595, 1, 23, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6596, 1, 23, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6597, 1, 32, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6598, 1, 33, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6599, 1, 33, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6600, 1, 33, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6601, 1, 33, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6602, 1, 33, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6603, 1, 33, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6604, 1, 34, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6605, 1, 34, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6606, 1, 34, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6607, 1, 34, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6608, 1, 34, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6609, 1, 34, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6610, 1, 24, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6611, 1, 24, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6612, 1, 24, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6613, 1, 24, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6614, 1, 24, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6615, 1, 24, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6616, 1, 29, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6617, 1, 29, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6618, 1, 27, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6619, 1, 27, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6620, 1, 27, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6621, 1, 27, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6622, 1, 22, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6623, 1, 22, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6624, 1, 22, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6625, 1, 22, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6626, 1, 22, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6627, 1, 22, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6628, 1, 22, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6629, 1, 30, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6630, 1, 30, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6631, 1, 30, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6632, 1, 30, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6633, 1, 30, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6634, 1, 30, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6635, 1, 13, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6636, 1, 13, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6637, 1, 13, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6638, 1, 13, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6639, 1, 13, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6640, 1, 13, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6641, 1, 13, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6642, 1, 11, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6643, 1, 11, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6644, 1, 11, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6645, 1, 11, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6646, 1, 11, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6647, 1, 11, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6648, 1, 11, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6649, 1, 12, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6650, 1, 12, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6651, 1, 12, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6652, 1, 12, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6653, 1, 12, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6654, 1, 12, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6655, 1, 12, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6656, 1, 10, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6657, 1, 10, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6658, 1, 10, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6659, 1, 10, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6660, 1, 10, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6661, 1, 10, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6662, 1, 10, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6663, 1, 25, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6664, 1, 18, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6665, 1, 18, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6666, 1, 19, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6667, 1, 19, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6668, 1, 17, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6669, 1, 17, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6670, 1, 31, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6671, 1, 31, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6672, 1, 5, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6673, 1, 5, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6674, 1, 5, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6675, 1, 5, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6676, 1, 5, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6677, 1, 5, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6678, 1, 5, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6679, 1, 15, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6680, 1, 15, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6681, 1, 15, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6682, 1, 15, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6683, 1, 15, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6684, 1, 15, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6685, 1, 15, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6686, 1, 3, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6687, 1, 3, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6688, 1, 3, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6689, 1, 3, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6690, 1, 3, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6691, 1, 3, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6692, 1, 8, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6693, 1, 8, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6694, 1, 8, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6695, 1, 8, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6696, 1, 8, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6697, 1, 8, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6698, 1, 6, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6699, 1, 6, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6700, 1, 6, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6701, 1, 6, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6702, 1, 6, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6703, 1, 6, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6704, 1, 6, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6705, 1, 20, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6706, 1, 20, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6707, 1, 4, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6708, 1, 4, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6709, 1, 4, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6710, 1, 4, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6711, 1, 4, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6712, 1, 4, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6713, 1, 4, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6714, 1, 14, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6715, 1, 14, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6716, 1, 14, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6717, 1, 14, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6718, 1, 14, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6719, 1, 14, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6720, 1, 14, 7);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6721, 1, 2, 1);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6722, 1, 2, 2);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6723, 1, 2, 3);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6724, 1, 2, 4);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6725, 1, 2, 5);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6726, 1, 2, 6);
INSERT INTO ".$this->prefix."tdcharge_service_action VALUES (6727, 1, 2, 7);

INSERT INTO ".$this->prefix."tdpassword VALUES (1, 1, '".$this->encrypter($this->password)."', NOW(), '1');

INSERT INTO ".$this->prefix."ticon VALUES (1, 'glyphicon', 'glyphicon-asterisk', '1');
INSERT INTO ".$this->prefix."ticon VALUES (2, 'glyphicon', 'glyphicon-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (3, 'glyphicon', 'glyphicon-euro', '1');
INSERT INTO ".$this->prefix."ticon VALUES (4, 'glyphicon', 'glyphicon-eur', '1');
INSERT INTO ".$this->prefix."ticon VALUES (5, 'glyphicon', 'glyphicon-minus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (6, 'glyphicon', 'glyphicon-cloud', '1');
INSERT INTO ".$this->prefix."ticon VALUES (7, 'glyphicon', 'glyphicon-envelope', '1');
INSERT INTO ".$this->prefix."ticon VALUES (8, 'glyphicon', 'glyphicon-pencil', '1');
INSERT INTO ".$this->prefix."ticon VALUES (9, 'glyphicon', 'glyphicon-glass', '1');
INSERT INTO ".$this->prefix."ticon VALUES (10, 'glyphicon', 'glyphicon-music', '1');
INSERT INTO ".$this->prefix."ticon VALUES (11, 'glyphicon', 'glyphicon-search', '1');
INSERT INTO ".$this->prefix."ticon VALUES (12, 'glyphicon', 'glyphicon-heart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (13, 'glyphicon', 'glyphicon-star', '1');
INSERT INTO ".$this->prefix."ticon VALUES (14, 'glyphicon', 'glyphicon-star-empty', '1');
INSERT INTO ".$this->prefix."ticon VALUES (15, 'glyphicon', 'glyphicon-user', '1');
INSERT INTO ".$this->prefix."ticon VALUES (16, 'glyphicon', 'glyphicon-film', '1');
INSERT INTO ".$this->prefix."ticon VALUES (17, 'glyphicon', 'glyphicon-th-large', '1');
INSERT INTO ".$this->prefix."ticon VALUES (18, 'glyphicon', 'glyphicon-th', '1');
INSERT INTO ".$this->prefix."ticon VALUES (19, 'glyphicon', 'glyphicon-th-list', '1');
INSERT INTO ".$this->prefix."ticon VALUES (20, 'glyphicon', 'glyphicon-ok', '1');
INSERT INTO ".$this->prefix."ticon VALUES (21, 'glyphicon', 'glyphicon-remove', '1');
INSERT INTO ".$this->prefix."ticon VALUES (22, 'glyphicon', 'glyphicon-zoom-in', '1');
INSERT INTO ".$this->prefix."ticon VALUES (23, 'glyphicon', 'glyphicon-zoom-out', '1');
INSERT INTO ".$this->prefix."ticon VALUES (24, 'glyphicon', 'glyphicon-off', '1');
INSERT INTO ".$this->prefix."ticon VALUES (25, 'glyphicon', 'glyphicon-signal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (26, 'glyphicon', 'glyphicon-cog', '1');
INSERT INTO ".$this->prefix."ticon VALUES (27, 'glyphicon', 'glyphicon-trash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (28, 'glyphicon', 'glyphicon-home', '1');
INSERT INTO ".$this->prefix."ticon VALUES (29, 'glyphicon', 'glyphicon-file', '1');
INSERT INTO ".$this->prefix."ticon VALUES (30, 'glyphicon', 'glyphicon-time', '1');
INSERT INTO ".$this->prefix."ticon VALUES (31, 'glyphicon', 'glyphicon-road', '1');
INSERT INTO ".$this->prefix."ticon VALUES (32, 'glyphicon', 'glyphicon-download-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (33, 'glyphicon', 'glyphicon-download', '1');
INSERT INTO ".$this->prefix."ticon VALUES (34, 'glyphicon', 'glyphicon-upload', '1');
INSERT INTO ".$this->prefix."ticon VALUES (35, 'glyphicon', 'glyphicon-inbox', '1');
INSERT INTO ".$this->prefix."ticon VALUES (36, 'glyphicon', 'glyphicon-play-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (37, 'glyphicon', 'glyphicon-repeat', '1');
INSERT INTO ".$this->prefix."ticon VALUES (38, 'glyphicon', 'glyphicon-refresh', '1');
INSERT INTO ".$this->prefix."ticon VALUES (39, 'glyphicon', 'glyphicon-list-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (40, 'glyphicon', 'glyphicon-lock', '1');
INSERT INTO ".$this->prefix."ticon VALUES (41, 'glyphicon', 'glyphicon-flag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (42, 'glyphicon', 'glyphicon-headphones', '1');
INSERT INTO ".$this->prefix."ticon VALUES (43, 'glyphicon', 'glyphicon-volume-off', '1');
INSERT INTO ".$this->prefix."ticon VALUES (44, 'glyphicon', 'glyphicon-volume-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (45, 'glyphicon', 'glyphicon-volume-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (46, 'glyphicon', 'glyphicon-qrcode', '1');
INSERT INTO ".$this->prefix."ticon VALUES (47, 'glyphicon', 'glyphicon-barcode', '1');
INSERT INTO ".$this->prefix."ticon VALUES (48, 'glyphicon', 'glyphicon-tag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (49, 'glyphicon', 'glyphicon-tags', '1');
INSERT INTO ".$this->prefix."ticon VALUES (50, 'glyphicon', 'glyphicon-book', '1');
INSERT INTO ".$this->prefix."ticon VALUES (51, 'glyphicon', 'glyphicon-bookmark', '1');
INSERT INTO ".$this->prefix."ticon VALUES (52, 'glyphicon', 'glyphicon-print', '1');
INSERT INTO ".$this->prefix."ticon VALUES (53, 'glyphicon', 'glyphicon-camera', '1');
INSERT INTO ".$this->prefix."ticon VALUES (54, 'glyphicon', 'glyphicon-font', '1');
INSERT INTO ".$this->prefix."ticon VALUES (55, 'glyphicon', 'glyphicon-bold', '1');
INSERT INTO ".$this->prefix."ticon VALUES (56, 'glyphicon', 'glyphicon-italic', '1');
INSERT INTO ".$this->prefix."ticon VALUES (57, 'glyphicon', 'glyphicon-text-height', '1');
INSERT INTO ".$this->prefix."ticon VALUES (58, 'glyphicon', 'glyphicon-text-width', '1');
INSERT INTO ".$this->prefix."ticon VALUES (59, 'glyphicon', 'glyphicon-align-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (60, 'glyphicon', 'glyphicon-align-center', '1');
INSERT INTO ".$this->prefix."ticon VALUES (61, 'glyphicon', 'glyphicon-align-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (62, 'glyphicon', 'glyphicon-align-justify', '1');
INSERT INTO ".$this->prefix."ticon VALUES (63, 'glyphicon', 'glyphicon-list', '1');
INSERT INTO ".$this->prefix."ticon VALUES (64, 'glyphicon', 'glyphicon-indent-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (65, 'glyphicon', 'glyphicon-indent-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (66, 'glyphicon', 'glyphicon-facetime-video', '1');
INSERT INTO ".$this->prefix."ticon VALUES (67, 'glyphicon', 'glyphicon-picture', '1');
INSERT INTO ".$this->prefix."ticon VALUES (68, 'glyphicon', 'glyphicon-map-marker', '1');
INSERT INTO ".$this->prefix."ticon VALUES (69, 'glyphicon', 'glyphicon-adjust', '1');
INSERT INTO ".$this->prefix."ticon VALUES (70, 'glyphicon', 'glyphicon-tint', '1');
INSERT INTO ".$this->prefix."ticon VALUES (71, 'glyphicon', 'glyphicon-edit', '1');
INSERT INTO ".$this->prefix."ticon VALUES (72, 'glyphicon', 'glyphicon-share', '1');
INSERT INTO ".$this->prefix."ticon VALUES (73, 'glyphicon', 'glyphicon-check', '1');
INSERT INTO ".$this->prefix."ticon VALUES (74, 'glyphicon', 'glyphicon-move', '1');
INSERT INTO ".$this->prefix."ticon VALUES (75, 'glyphicon', 'glyphicon-step-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (76, 'glyphicon', 'glyphicon-fast-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (77, 'glyphicon', 'glyphicon-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (78, 'glyphicon', 'glyphicon-play', '1');
INSERT INTO ".$this->prefix."ticon VALUES (79, 'glyphicon', 'glyphicon-pause', '1');
INSERT INTO ".$this->prefix."ticon VALUES (80, 'glyphicon', 'glyphicon-stop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (81, 'glyphicon', 'glyphicon-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (82, 'glyphicon', 'glyphicon-fast-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (83, 'glyphicon', 'glyphicon-step-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (84, 'glyphicon', 'glyphicon-eject', '1');
INSERT INTO ".$this->prefix."ticon VALUES (85, 'glyphicon', 'glyphicon-chevron-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (86, 'glyphicon', 'glyphicon-chevron-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (87, 'glyphicon', 'glyphicon-plus-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (88, 'glyphicon', 'glyphicon-minus-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (89, 'glyphicon', 'glyphicon-remove-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (90, 'glyphicon', 'glyphicon-ok-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (91, 'glyphicon', 'glyphicon-question-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (92, 'glyphicon', 'glyphicon-info-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (93, 'glyphicon', 'glyphicon-screenshot', '1');
INSERT INTO ".$this->prefix."ticon VALUES (94, 'glyphicon', 'glyphicon-remove-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (95, 'glyphicon', 'glyphicon-ok-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (96, 'glyphicon', 'glyphicon-ban-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (97, 'glyphicon', 'glyphicon-arrow-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (98, 'glyphicon', 'glyphicon-arrow-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (99, 'glyphicon', 'glyphicon-arrow-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (100, 'glyphicon', 'glyphicon-arrow-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (101, 'glyphicon', 'glyphicon-share-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (102, 'glyphicon', 'glyphicon-resize-full', '1');
INSERT INTO ".$this->prefix."ticon VALUES (103, 'glyphicon', 'glyphicon-resize-small', '1');
INSERT INTO ".$this->prefix."ticon VALUES (104, 'glyphicon', 'glyphicon-exclamation-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (105, 'glyphicon', 'glyphicon-gift', '1');
INSERT INTO ".$this->prefix."ticon VALUES (106, 'glyphicon', 'glyphicon-leaf', '1');
INSERT INTO ".$this->prefix."ticon VALUES (107, 'glyphicon', 'glyphicon-fire', '1');
INSERT INTO ".$this->prefix."ticon VALUES (108, 'glyphicon', 'glyphicon-eye-open', '1');
INSERT INTO ".$this->prefix."ticon VALUES (109, 'glyphicon', 'glyphicon-eye-close', '1');
INSERT INTO ".$this->prefix."ticon VALUES (110, 'glyphicon', 'glyphicon-warning-sign', '1');
INSERT INTO ".$this->prefix."ticon VALUES (111, 'glyphicon', 'glyphicon-plane', '1');
INSERT INTO ".$this->prefix."ticon VALUES (112, 'glyphicon', 'glyphicon-calendar', '1');
INSERT INTO ".$this->prefix."ticon VALUES (113, 'glyphicon', 'glyphicon-random', '1');
INSERT INTO ".$this->prefix."ticon VALUES (114, 'glyphicon', 'glyphicon-comment', '1');
INSERT INTO ".$this->prefix."ticon VALUES (115, 'glyphicon', 'glyphicon-magnet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (116, 'glyphicon', 'glyphicon-chevron-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (117, 'glyphicon', 'glyphicon-chevron-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (118, 'glyphicon', 'glyphicon-retweet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (119, 'glyphicon', 'glyphicon-shopping-cart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (120, 'glyphicon', 'glyphicon-folder-close', '1');
INSERT INTO ".$this->prefix."ticon VALUES (121, 'glyphicon', 'glyphicon-folder-open', '1');
INSERT INTO ".$this->prefix."ticon VALUES (122, 'glyphicon', 'glyphicon-resize-vertical', '1');
INSERT INTO ".$this->prefix."ticon VALUES (123, 'glyphicon', 'glyphicon-resize-horizontal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (124, 'glyphicon', 'glyphicon-hdd', '1');
INSERT INTO ".$this->prefix."ticon VALUES (125, 'glyphicon', 'glyphicon-bullhorn', '1');
INSERT INTO ".$this->prefix."ticon VALUES (126, 'glyphicon', 'glyphicon-bell', '1');
INSERT INTO ".$this->prefix."ticon VALUES (127, 'glyphicon', 'glyphicon-certificate', '1');
INSERT INTO ".$this->prefix."ticon VALUES (128, 'glyphicon', 'glyphicon-thumbs-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (129, 'glyphicon', 'glyphicon-thumbs-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (130, 'glyphicon', 'glyphicon-hand-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (131, 'glyphicon', 'glyphicon-hand-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (132, 'glyphicon', 'glyphicon-hand-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (133, 'glyphicon', 'glyphicon-hand-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (134, 'glyphicon', 'glyphicon-circle-arrow-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (135, 'glyphicon', 'glyphicon-circle-arrow-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (136, 'glyphicon', 'glyphicon-circle-arrow-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (137, 'glyphicon', 'glyphicon-circle-arrow-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (138, 'glyphicon', 'glyphicon-globe', '1');
INSERT INTO ".$this->prefix."ticon VALUES (139, 'glyphicon', 'glyphicon-wrench', '1');
INSERT INTO ".$this->prefix."ticon VALUES (140, 'glyphicon', 'glyphicon-tasks', '1');
INSERT INTO ".$this->prefix."ticon VALUES (141, 'glyphicon', 'glyphicon-filter', '1');
INSERT INTO ".$this->prefix."ticon VALUES (142, 'glyphicon', 'glyphicon-briefcase', '1');
INSERT INTO ".$this->prefix."ticon VALUES (143, 'glyphicon', 'glyphicon-fullscreen', '1');
INSERT INTO ".$this->prefix."ticon VALUES (144, 'glyphicon', 'glyphicon-dashboard', '1');
INSERT INTO ".$this->prefix."ticon VALUES (145, 'glyphicon', 'glyphicon-paperclip', '1');
INSERT INTO ".$this->prefix."ticon VALUES (146, 'glyphicon', 'glyphicon-heart-empty', '1');
INSERT INTO ".$this->prefix."ticon VALUES (147, 'glyphicon', 'glyphicon-link', '1');
INSERT INTO ".$this->prefix."ticon VALUES (148, 'glyphicon', 'glyphicon-phone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (149, 'glyphicon', 'glyphicon-pushpin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (150, 'glyphicon', 'glyphicon-usd', '1');
INSERT INTO ".$this->prefix."ticon VALUES (151, 'glyphicon', 'glyphicon-gbp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (152, 'glyphicon', 'glyphicon-sort', '1');
INSERT INTO ".$this->prefix."ticon VALUES (153, 'glyphicon', 'glyphicon-sort-by-alphabet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (154, 'glyphicon', 'glyphicon-sort-by-alphabet-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (155, 'glyphicon', 'glyphicon-sort-by-order', '1');
INSERT INTO ".$this->prefix."ticon VALUES (156, 'glyphicon', 'glyphicon-sort-by-order-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (157, 'glyphicon', 'glyphicon-sort-by-attributes', '1');
INSERT INTO ".$this->prefix."ticon VALUES (158, 'glyphicon', 'glyphicon-sort-by-attributes-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (159, 'glyphicon', 'glyphicon-unchecked', '1');
INSERT INTO ".$this->prefix."ticon VALUES (160, 'glyphicon', 'glyphicon-expand', '1');
INSERT INTO ".$this->prefix."ticon VALUES (161, 'glyphicon', 'glyphicon-collapse-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (162, 'glyphicon', 'glyphicon-collapse-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (163, 'glyphicon', 'glyphicon-log-in', '1');
INSERT INTO ".$this->prefix."ticon VALUES (164, 'glyphicon', 'glyphicon-flash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (165, 'glyphicon', 'glyphicon-log-out', '1');
INSERT INTO ".$this->prefix."ticon VALUES (166, 'glyphicon', 'glyphicon-new-window', '1');
INSERT INTO ".$this->prefix."ticon VALUES (167, 'glyphicon', 'glyphicon-record', '1');
INSERT INTO ".$this->prefix."ticon VALUES (168, 'glyphicon', 'glyphicon-save', '1');
INSERT INTO ".$this->prefix."ticon VALUES (169, 'glyphicon', 'glyphicon-open', '1');
INSERT INTO ".$this->prefix."ticon VALUES (170, 'glyphicon', 'glyphicon-saved', '1');
INSERT INTO ".$this->prefix."ticon VALUES (171, 'glyphicon', 'glyphicon-import', '1');
INSERT INTO ".$this->prefix."ticon VALUES (172, 'glyphicon', 'glyphicon-export', '1');
INSERT INTO ".$this->prefix."ticon VALUES (173, 'glyphicon', 'glyphicon-send', '1');
INSERT INTO ".$this->prefix."ticon VALUES (174, 'glyphicon', 'glyphicon-floppy-disk', '1');
INSERT INTO ".$this->prefix."ticon VALUES (175, 'glyphicon', 'glyphicon-floppy-saved', '1');
INSERT INTO ".$this->prefix."ticon VALUES (176, 'glyphicon', 'glyphicon-floppy-remove', '1');
INSERT INTO ".$this->prefix."ticon VALUES (177, 'glyphicon', 'glyphicon-floppy-save', '1');
INSERT INTO ".$this->prefix."ticon VALUES (178, 'glyphicon', 'glyphicon-floppy-open', '1');
INSERT INTO ".$this->prefix."ticon VALUES (179, 'glyphicon', 'glyphicon-credit-card', '1');
INSERT INTO ".$this->prefix."ticon VALUES (180, 'glyphicon', 'glyphicon-transfer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (181, 'glyphicon', 'glyphicon-cutlery', '1');
INSERT INTO ".$this->prefix."ticon VALUES (182, 'glyphicon', 'glyphicon-header', '1');
INSERT INTO ".$this->prefix."ticon VALUES (183, 'glyphicon', 'glyphicon-compressed', '1');
INSERT INTO ".$this->prefix."ticon VALUES (184, 'glyphicon', 'glyphicon-earphone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (185, 'glyphicon', 'glyphicon-phone-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (186, 'glyphicon', 'glyphicon-tower', '1');
INSERT INTO ".$this->prefix."ticon VALUES (187, 'glyphicon', 'glyphicon-stats', '1');
INSERT INTO ".$this->prefix."ticon VALUES (188, 'glyphicon', 'glyphicon-sd-video', '1');
INSERT INTO ".$this->prefix."ticon VALUES (189, 'glyphicon', 'glyphicon-hd-video', '1');
INSERT INTO ".$this->prefix."ticon VALUES (190, 'glyphicon', 'glyphicon-subtitles', '1');
INSERT INTO ".$this->prefix."ticon VALUES (191, 'glyphicon', 'glyphicon-sound-stereo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (192, 'glyphicon', 'glyphicon-sound-dolby', '1');
INSERT INTO ".$this->prefix."ticon VALUES (193, 'glyphicon', 'glyphicon-sound-5-1', '1');
INSERT INTO ".$this->prefix."ticon VALUES (194, 'glyphicon', 'glyphicon-sound-6-1', '1');
INSERT INTO ".$this->prefix."ticon VALUES (195, 'glyphicon', 'glyphicon-sound-7-1', '1');
INSERT INTO ".$this->prefix."ticon VALUES (196, 'glyphicon', 'glyphicon-copyright-mark', '1');
INSERT INTO ".$this->prefix."ticon VALUES (197, 'glyphicon', 'glyphicon-registration-mark', '1');
INSERT INTO ".$this->prefix."ticon VALUES (198, 'glyphicon', 'glyphicon-cloud-download', '1');
INSERT INTO ".$this->prefix."ticon VALUES (199, 'glyphicon', 'glyphicon-cloud-upload', '1');
INSERT INTO ".$this->prefix."ticon VALUES (200, 'glyphicon', 'glyphicon-tree-conifer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (201, 'glyphicon', 'glyphicon-tree-deciduous', '1');
INSERT INTO ".$this->prefix."ticon VALUES (202, 'glyphicon', 'glyphicon-cd', '1');
INSERT INTO ".$this->prefix."ticon VALUES (203, 'glyphicon', 'glyphicon-save-file', '1');
INSERT INTO ".$this->prefix."ticon VALUES (204, 'glyphicon', 'glyphicon-open-file', '1');
INSERT INTO ".$this->prefix."ticon VALUES (205, 'glyphicon', 'glyphicon-level-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (206, 'glyphicon', 'glyphicon-copy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (207, 'glyphicon', 'glyphicon-paste', '1');
INSERT INTO ".$this->prefix."ticon VALUES (208, 'glyphicon', 'glyphicon-alert', '1');
INSERT INTO ".$this->prefix."ticon VALUES (209, 'glyphicon', 'glyphicon-equalizer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (210, 'glyphicon', 'glyphicon-king', '1');
INSERT INTO ".$this->prefix."ticon VALUES (211, 'glyphicon', 'glyphicon-queen', '1');
INSERT INTO ".$this->prefix."ticon VALUES (212, 'glyphicon', 'glyphicon-pawn', '1');
INSERT INTO ".$this->prefix."ticon VALUES (213, 'glyphicon', 'glyphicon-bishop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (214, 'glyphicon', 'glyphicon-knight', '1');
INSERT INTO ".$this->prefix."ticon VALUES (215, 'glyphicon', 'glyphicon-baby-formula', '1');
INSERT INTO ".$this->prefix."ticon VALUES (216, 'glyphicon', 'glyphicon-tent', '1');
INSERT INTO ".$this->prefix."ticon VALUES (217, 'glyphicon', 'glyphicon-blackboard', '1');
INSERT INTO ".$this->prefix."ticon VALUES (218, 'glyphicon', 'glyphicon-bed', '1');
INSERT INTO ".$this->prefix."ticon VALUES (219, 'glyphicon', 'glyphicon-apple', '1');
INSERT INTO ".$this->prefix."ticon VALUES (220, 'glyphicon', 'glyphicon-erase', '1');
INSERT INTO ".$this->prefix."ticon VALUES (221, 'glyphicon', 'glyphicon-hourglass', '1');
INSERT INTO ".$this->prefix."ticon VALUES (222, 'glyphicon', 'glyphicon-lamp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (223, 'glyphicon', 'glyphicon-duplicate', '1');
INSERT INTO ".$this->prefix."ticon VALUES (224, 'glyphicon', 'glyphicon-piggy-bank', '1');
INSERT INTO ".$this->prefix."ticon VALUES (225, 'glyphicon', 'glyphicon-scissors', '1');
INSERT INTO ".$this->prefix."ticon VALUES (226, 'glyphicon', 'glyphicon-bitcoin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (227, 'glyphicon', 'glyphicon-yen', '1');
INSERT INTO ".$this->prefix."ticon VALUES (228, 'glyphicon', 'glyphicon-ruble', '1');
INSERT INTO ".$this->prefix."ticon VALUES (229, 'glyphicon', 'glyphicon-scale', '1');
INSERT INTO ".$this->prefix."ticon VALUES (230, 'glyphicon', 'glyphicon-ice-lolly', '1');
INSERT INTO ".$this->prefix."ticon VALUES (231, 'glyphicon', 'glyphicon-ice-lolly-tasted', '1');
INSERT INTO ".$this->prefix."ticon VALUES (232, 'glyphicon', 'glyphicon-education', '1');
INSERT INTO ".$this->prefix."ticon VALUES (233, 'glyphicon', 'glyphicon-option-horizontal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (234, 'glyphicon', 'glyphicon-option-vertical', '1');
INSERT INTO ".$this->prefix."ticon VALUES (235, 'glyphicon', 'glyphicon-menu-hamburger', '1');
INSERT INTO ".$this->prefix."ticon VALUES (236, 'glyphicon', 'glyphicon-modal-window', '1');
INSERT INTO ".$this->prefix."ticon VALUES (237, 'glyphicon', 'glyphicon-oil', '1');
INSERT INTO ".$this->prefix."ticon VALUES (238, 'glyphicon', 'glyphicon-grain', '1');
INSERT INTO ".$this->prefix."ticon VALUES (239, 'glyphicon', 'glyphicon-sunglasses', '1');
INSERT INTO ".$this->prefix."ticon VALUES (240, 'glyphicon', 'glyphicon-text-size', '1');
INSERT INTO ".$this->prefix."ticon VALUES (241, 'glyphicon', 'glyphicon-text-color', '1');
INSERT INTO ".$this->prefix."ticon VALUES (242, 'glyphicon', 'glyphicon-text-background', '1');
INSERT INTO ".$this->prefix."ticon VALUES (243, 'glyphicon', 'glyphicon-object-align-top', '1');
INSERT INTO ".$this->prefix."ticon VALUES (244, 'glyphicon', 'glyphicon-object-align-bottom', '1');
INSERT INTO ".$this->prefix."ticon VALUES (245, 'glyphicon', 'glyphicon-object-align-horizontal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (246, 'glyphicon', 'glyphicon-object-align-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (247, 'glyphicon', 'glyphicon-object-align-vertical', '1');
INSERT INTO ".$this->prefix."ticon VALUES (248, 'glyphicon', 'glyphicon-object-align-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (249, 'glyphicon', 'glyphicon-triangle-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (250, 'glyphicon', 'glyphicon-triangle-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (251, 'glyphicon', 'glyphicon-triangle-bottom', '1');
INSERT INTO ".$this->prefix."ticon VALUES (252, 'glyphicon', 'glyphicon-triangle-top', '1');
INSERT INTO ".$this->prefix."ticon VALUES (253, 'glyphicon', 'glyphicon-console', '1');
INSERT INTO ".$this->prefix."ticon VALUES (254, 'glyphicon', 'glyphicon-superscript', '1');
INSERT INTO ".$this->prefix."ticon VALUES (255, 'glyphicon', 'glyphicon-subscript', '1');
INSERT INTO ".$this->prefix."ticon VALUES (256, 'glyphicon', 'glyphicon-menu-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (257, 'glyphicon', 'glyphicon-menu-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (258, 'glyphicon', 'glyphicon-menu-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (259, 'glyphicon', 'glyphicon-menu-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (260, 'fa', 'fa-american-sign-language-interpreting', '1');
INSERT INTO ".$this->prefix."ticon VALUES (261, 'fa', 'fa-assistive-listening-systems', '1');
INSERT INTO ".$this->prefix."ticon VALUES (262, 'fa', 'fa-glass', '1');
INSERT INTO ".$this->prefix."ticon VALUES (263, 'fa', 'fa-music', '1');
INSERT INTO ".$this->prefix."ticon VALUES (264, 'fa', 'fa-search', '1');
INSERT INTO ".$this->prefix."ticon VALUES (265, 'fa', 'fa-envelope-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (266, 'fa', 'fa-heart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (267, 'fa', 'fa-star', '1');
INSERT INTO ".$this->prefix."ticon VALUES (268, 'fa', 'fa-star-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (269, 'fa', 'fa-user', '1');
INSERT INTO ".$this->prefix."ticon VALUES (270, 'fa', 'fa-film', '1');
INSERT INTO ".$this->prefix."ticon VALUES (271, 'fa', 'fa-th-large', '1');
INSERT INTO ".$this->prefix."ticon VALUES (272, 'fa', 'fa-th', '1');
INSERT INTO ".$this->prefix."ticon VALUES (273, 'fa', 'fa-th-list', '1');
INSERT INTO ".$this->prefix."ticon VALUES (274, 'fa', 'fa-check', '1');
INSERT INTO ".$this->prefix."ticon VALUES (275, 'fa', 'fa-remove', '1');
INSERT INTO ".$this->prefix."ticon VALUES (276, 'fa', 'fa-close', '1');
INSERT INTO ".$this->prefix."ticon VALUES (277, 'fa', 'fa-times', '1');
INSERT INTO ".$this->prefix."ticon VALUES (278, 'fa', 'fa-search-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (279, 'fa', 'fa-search-minus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (280, 'fa', 'fa-power-off', '1');
INSERT INTO ".$this->prefix."ticon VALUES (281, 'fa', 'fa-signal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (282, 'fa', 'fa-gear', '1');
INSERT INTO ".$this->prefix."ticon VALUES (283, 'fa', 'fa-cog', '1');
INSERT INTO ".$this->prefix."ticon VALUES (284, 'fa', 'fa-trash-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (285, 'fa', 'fa-home', '1');
INSERT INTO ".$this->prefix."ticon VALUES (286, 'fa', 'fa-file-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (287, 'fa', 'fa-clock-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (288, 'fa', 'fa-road', '1');
INSERT INTO ".$this->prefix."ticon VALUES (289, 'fa', 'fa-download', '1');
INSERT INTO ".$this->prefix."ticon VALUES (290, 'fa', 'fa-arrow-circle-o-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (291, 'fa', 'fa-arrow-circle-o-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (292, 'fa', 'fa-inbox', '1');
INSERT INTO ".$this->prefix."ticon VALUES (293, 'fa', 'fa-play-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (294, 'fa', 'fa-rotate-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (295, 'fa', 'fa-repeat', '1');
INSERT INTO ".$this->prefix."ticon VALUES (296, 'fa', 'fa-refresh', '1');
INSERT INTO ".$this->prefix."ticon VALUES (297, 'fa', 'fa-list-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (298, 'fa', 'fa-lock', '1');
INSERT INTO ".$this->prefix."ticon VALUES (299, 'fa', 'fa-flag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (300, 'fa', 'fa-headphones', '1');
INSERT INTO ".$this->prefix."ticon VALUES (301, 'fa', 'fa-volume-off', '1');
INSERT INTO ".$this->prefix."ticon VALUES (302, 'fa', 'fa-volume-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (303, 'fa', 'fa-volume-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (304, 'fa', 'fa-qrcode', '1');
INSERT INTO ".$this->prefix."ticon VALUES (305, 'fa', 'fa-barcode', '1');
INSERT INTO ".$this->prefix."ticon VALUES (306, 'fa', 'fa-tag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (307, 'fa', 'fa-tags', '1');
INSERT INTO ".$this->prefix."ticon VALUES (308, 'fa', 'fa-book', '1');
INSERT INTO ".$this->prefix."ticon VALUES (309, 'fa', 'fa-bookmark', '1');
INSERT INTO ".$this->prefix."ticon VALUES (310, 'fa', 'fa-print', '1');
INSERT INTO ".$this->prefix."ticon VALUES (311, 'fa', 'fa-camera', '1');
INSERT INTO ".$this->prefix."ticon VALUES (312, 'fa', 'fa-font', '1');
INSERT INTO ".$this->prefix."ticon VALUES (313, 'fa', 'fa-bold', '1');
INSERT INTO ".$this->prefix."ticon VALUES (314, 'fa', 'fa-italic', '1');
INSERT INTO ".$this->prefix."ticon VALUES (315, 'fa', 'fa-text-height', '1');
INSERT INTO ".$this->prefix."ticon VALUES (316, 'fa', 'fa-text-width', '1');
INSERT INTO ".$this->prefix."ticon VALUES (317, 'fa', 'fa-align-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (318, 'fa', 'fa-align-center', '1');
INSERT INTO ".$this->prefix."ticon VALUES (319, 'fa', 'fa-align-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (320, 'fa', 'fa-align-justify', '1');
INSERT INTO ".$this->prefix."ticon VALUES (321, 'fa', 'fa-list', '1');
INSERT INTO ".$this->prefix."ticon VALUES (322, 'fa', 'fa-dedent', '1');
INSERT INTO ".$this->prefix."ticon VALUES (323, 'fa', 'fa-outdent', '1');
INSERT INTO ".$this->prefix."ticon VALUES (324, 'fa', 'fa-indent', '1');
INSERT INTO ".$this->prefix."ticon VALUES (325, 'fa', 'fa-video-camera', '1');
INSERT INTO ".$this->prefix."ticon VALUES (326, 'fa', 'fa-photo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (327, 'fa', 'fa-image', '1');
INSERT INTO ".$this->prefix."ticon VALUES (328, 'fa', 'fa-picture-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (329, 'fa', 'fa-pencil', '1');
INSERT INTO ".$this->prefix."ticon VALUES (330, 'fa', 'fa-map-marker', '1');
INSERT INTO ".$this->prefix."ticon VALUES (331, 'fa', 'fa-adjust', '1');
INSERT INTO ".$this->prefix."ticon VALUES (332, 'fa', 'fa-tint', '1');
INSERT INTO ".$this->prefix."ticon VALUES (333, 'fa', 'fa-edit', '1');
INSERT INTO ".$this->prefix."ticon VALUES (334, 'fa', 'fa-pencil-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (335, 'fa', 'fa-share-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (336, 'fa', 'fa-check-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (337, 'fa', 'fa-arrows', '1');
INSERT INTO ".$this->prefix."ticon VALUES (338, 'fa', 'fa-step-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (339, 'fa', 'fa-fast-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (340, 'fa', 'fa-backward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (341, 'fa', 'fa-play', '1');
INSERT INTO ".$this->prefix."ticon VALUES (342, 'fa', 'fa-pause', '1');
INSERT INTO ".$this->prefix."ticon VALUES (343, 'fa', 'fa-stop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (344, 'fa', 'fa-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (345, 'fa', 'fa-fast-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (346, 'fa', 'fa-step-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (347, 'fa', 'fa-eject', '1');
INSERT INTO ".$this->prefix."ticon VALUES (348, 'fa', 'fa-chevron-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (349, 'fa', 'fa-chevron-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (350, 'fa', 'fa-plus-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (351, 'fa', 'fa-minus-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (352, 'fa', 'fa-times-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (353, 'fa', 'fa-check-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (354, 'fa', 'fa-question-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (355, 'fa', 'fa-info-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (356, 'fa', 'fa-crosshairs', '1');
INSERT INTO ".$this->prefix."ticon VALUES (357, 'fa', 'fa-times-circle-o', '1');
";
$sql.="INSERT INTO ".$this->prefix."ticon VALUES (358, 'fa', 'fa-check-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (359, 'fa', 'fa-ban', '1');
INSERT INTO ".$this->prefix."ticon VALUES (360, 'fa', 'fa-arrow-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (361, 'fa', 'fa-arrow-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (362, 'fa', 'fa-arrow-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (363, 'fa', 'fa-arrow-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (364, 'fa', 'fa-mail-forward', '1');
INSERT INTO ".$this->prefix."ticon VALUES (365, 'fa', 'fa-share', '1');
INSERT INTO ".$this->prefix."ticon VALUES (366, 'fa', 'fa-expand', '1');
INSERT INTO ".$this->prefix."ticon VALUES (367, 'fa', 'fa-compress', '1');
INSERT INTO ".$this->prefix."ticon VALUES (368, 'fa', 'fa-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (369, 'fa', 'fa-minus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (370, 'fa', 'fa-asterisk', '1');
INSERT INTO ".$this->prefix."ticon VALUES (371, 'fa', 'fa-exclamation-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (372, 'fa', 'fa-gift', '1');
INSERT INTO ".$this->prefix."ticon VALUES (373, 'fa', 'fa-leaf', '1');
INSERT INTO ".$this->prefix."ticon VALUES (374, 'fa', 'fa-fire', '1');
INSERT INTO ".$this->prefix."ticon VALUES (375, 'fa', 'fa-eye', '1');
INSERT INTO ".$this->prefix."ticon VALUES (376, 'fa', 'fa-eye-slash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (377, 'fa', 'fa-warning', '1');
INSERT INTO ".$this->prefix."ticon VALUES (378, 'fa', 'fa-exclamation-triangle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (379, 'fa', 'fa-plane', '1');
INSERT INTO ".$this->prefix."ticon VALUES (380, 'fa', 'fa-calendar', '1');
INSERT INTO ".$this->prefix."ticon VALUES (381, 'fa', 'fa-random', '1');
INSERT INTO ".$this->prefix."ticon VALUES (382, 'fa', 'fa-comment', '1');
INSERT INTO ".$this->prefix."ticon VALUES (383, 'fa', 'fa-magnet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (384, 'fa', 'fa-chevron-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (385, 'fa', 'fa-chevron-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (386, 'fa', 'fa-retweet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (387, 'fa', 'fa-shopping-cart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (388, 'fa', 'fa-folder', '1');
INSERT INTO ".$this->prefix."ticon VALUES (389, 'fa', 'fa-folder-open', '1');
INSERT INTO ".$this->prefix."ticon VALUES (390, 'fa', 'fa-arrows-v', '1');
INSERT INTO ".$this->prefix."ticon VALUES (391, 'fa', 'fa-arrows-h', '1');
INSERT INTO ".$this->prefix."ticon VALUES (392, 'fa', 'fa-bar-chart-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (393, 'fa', 'fa-bar-chart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (394, 'fa', 'fa-twitter-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (395, 'fa', 'fa-facebook-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (396, 'fa', 'fa-camera-retro', '1');
INSERT INTO ".$this->prefix."ticon VALUES (397, 'fa', 'fa-key', '1');
INSERT INTO ".$this->prefix."ticon VALUES (398, 'fa', 'fa-gears', '1');
INSERT INTO ".$this->prefix."ticon VALUES (399, 'fa', 'fa-cogs', '1');
INSERT INTO ".$this->prefix."ticon VALUES (400, 'fa', 'fa-comments', '1');
INSERT INTO ".$this->prefix."ticon VALUES (401, 'fa', 'fa-thumbs-o-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (402, 'fa', 'fa-thumbs-o-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (403, 'fa', 'fa-star-half', '1');
INSERT INTO ".$this->prefix."ticon VALUES (404, 'fa', 'fa-heart-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (405, 'fa', 'fa-sign-out', '1');
INSERT INTO ".$this->prefix."ticon VALUES (406, 'fa', 'fa-linkedin-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (407, 'fa', 'fa-thumb-tack', '1');
INSERT INTO ".$this->prefix."ticon VALUES (408, 'fa', 'fa-external-link', '1');
INSERT INTO ".$this->prefix."ticon VALUES (409, 'fa', 'fa-sign-in', '1');
INSERT INTO ".$this->prefix."ticon VALUES (410, 'fa', 'fa-trophy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (411, 'fa', 'fa-github-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (412, 'fa', 'fa-upload', '1');
INSERT INTO ".$this->prefix."ticon VALUES (413, 'fa', 'fa-lemon-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (414, 'fa', 'fa-phone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (415, 'fa', 'fa-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (416, 'fa', 'fa-bookmark-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (417, 'fa', 'fa-phone-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (418, 'fa', 'fa-twitter', '1');
INSERT INTO ".$this->prefix."ticon VALUES (419, 'fa', 'fa-facebook-f', '1');
INSERT INTO ".$this->prefix."ticon VALUES (420, 'fa', 'fa-facebook', '1');
INSERT INTO ".$this->prefix."ticon VALUES (421, 'fa', 'fa-github', '1');
INSERT INTO ".$this->prefix."ticon VALUES (422, 'fa', 'fa-unlock', '1');
INSERT INTO ".$this->prefix."ticon VALUES (423, 'fa', 'fa-credit-card', '1');
INSERT INTO ".$this->prefix."ticon VALUES (424, 'fa', 'fa-feed', '1');
INSERT INTO ".$this->prefix."ticon VALUES (425, 'fa', 'fa-rss', '1');
INSERT INTO ".$this->prefix."ticon VALUES (426, 'fa', 'fa-hdd-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (427, 'fa', 'fa-bullhorn', '1');
INSERT INTO ".$this->prefix."ticon VALUES (428, 'fa', 'fa-bell', '1');
INSERT INTO ".$this->prefix."ticon VALUES (429, 'fa', 'fa-certificate', '1');
INSERT INTO ".$this->prefix."ticon VALUES (430, 'fa', 'fa-hand-o-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (431, 'fa', 'fa-hand-o-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (432, 'fa', 'fa-hand-o-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (433, 'fa', 'fa-hand-o-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (434, 'fa', 'fa-arrow-circle-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (435, 'fa', 'fa-arrow-circle-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (436, 'fa', 'fa-arrow-circle-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (437, 'fa', 'fa-arrow-circle-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (438, 'fa', 'fa-globe', '1');
INSERT INTO ".$this->prefix."ticon VALUES (439, 'fa', 'fa-wrench', '1');
INSERT INTO ".$this->prefix."ticon VALUES (440, 'fa', 'fa-tasks', '1');
INSERT INTO ".$this->prefix."ticon VALUES (441, 'fa', 'fa-filter', '1');
INSERT INTO ".$this->prefix."ticon VALUES (442, 'fa', 'fa-briefcase', '1');
INSERT INTO ".$this->prefix."ticon VALUES (443, 'fa', 'fa-arrows-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (444, 'fa', 'fa-group', '1');
INSERT INTO ".$this->prefix."ticon VALUES (445, 'fa', 'fa-users', '1');
INSERT INTO ".$this->prefix."ticon VALUES (446, 'fa', 'fa-chain', '1');
INSERT INTO ".$this->prefix."ticon VALUES (447, 'fa', 'fa-link', '1');
INSERT INTO ".$this->prefix."ticon VALUES (448, 'fa', 'fa-cloud', '1');
INSERT INTO ".$this->prefix."ticon VALUES (449, 'fa', 'fa-flask', '1');
INSERT INTO ".$this->prefix."ticon VALUES (450, 'fa', 'fa-cut', '1');
INSERT INTO ".$this->prefix."ticon VALUES (451, 'fa', 'fa-scissors', '1');
INSERT INTO ".$this->prefix."ticon VALUES (452, 'fa', 'fa-copy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (453, 'fa', 'fa-files-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (454, 'fa', 'fa-paperclip', '1');
INSERT INTO ".$this->prefix."ticon VALUES (455, 'fa', 'fa-save', '1');
INSERT INTO ".$this->prefix."ticon VALUES (456, 'fa', 'fa-floppy-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (457, 'fa', 'fa-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (458, 'fa', 'fa-navicon', '1');
INSERT INTO ".$this->prefix."ticon VALUES (459, 'fa', 'fa-reorder', '1');
INSERT INTO ".$this->prefix."ticon VALUES (460, 'fa', 'fa-bars', '1');
INSERT INTO ".$this->prefix."ticon VALUES (461, 'fa', 'fa-list-ul', '1');
INSERT INTO ".$this->prefix."ticon VALUES (462, 'fa', 'fa-list-ol', '1');
INSERT INTO ".$this->prefix."ticon VALUES (463, 'fa', 'fa-strikethrough', '1');
INSERT INTO ".$this->prefix."ticon VALUES (464, 'fa', 'fa-underline', '1');
INSERT INTO ".$this->prefix."ticon VALUES (465, 'fa', 'fa-table', '1');
INSERT INTO ".$this->prefix."ticon VALUES (466, 'fa', 'fa-magic', '1');
INSERT INTO ".$this->prefix."ticon VALUES (467, 'fa', 'fa-truck', '1');
INSERT INTO ".$this->prefix."ticon VALUES (468, 'fa', 'fa-pinterest', '1');
INSERT INTO ".$this->prefix."ticon VALUES (469, 'fa', 'fa-pinterest-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (470, 'fa', 'fa-google-plus-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (471, 'fa', 'fa-google-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (472, 'fa', 'fa-money', '1');
INSERT INTO ".$this->prefix."ticon VALUES (473, 'fa', 'fa-caret-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (474, 'fa', 'fa-caret-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (475, 'fa', 'fa-caret-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (476, 'fa', 'fa-caret-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (477, 'fa', 'fa-columns', '1');
INSERT INTO ".$this->prefix."ticon VALUES (478, 'fa', 'fa-unsorted', '1');
INSERT INTO ".$this->prefix."ticon VALUES (479, 'fa', 'fa-sort', '1');
INSERT INTO ".$this->prefix."ticon VALUES (480, 'fa', 'fa-sort-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (481, 'fa', 'fa-sort-desc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (482, 'fa', 'fa-sort-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (483, 'fa', 'fa-sort-asc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (484, 'fa', 'fa-envelope', '1');
INSERT INTO ".$this->prefix."ticon VALUES (485, 'fa', 'fa-linkedin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (486, 'fa', 'fa-rotate-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (487, 'fa', 'fa-undo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (488, 'fa', 'fa-legal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (489, 'fa', 'fa-gavel', '1');
INSERT INTO ".$this->prefix."ticon VALUES (490, 'fa', 'fa-dashboard', '1');
INSERT INTO ".$this->prefix."ticon VALUES (491, 'fa', 'fa-tachometer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (492, 'fa', 'fa-comment-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (493, 'fa', 'fa-comments-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (494, 'fa', 'fa-flash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (495, 'fa', 'fa-bolt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (496, 'fa', 'fa-sitemap', '1');
INSERT INTO ".$this->prefix."ticon VALUES (497, 'fa', 'fa-umbrella', '1');
INSERT INTO ".$this->prefix."ticon VALUES (498, 'fa', 'fa-paste', '1');
INSERT INTO ".$this->prefix."ticon VALUES (499, 'fa', 'fa-clipboard', '1');
INSERT INTO ".$this->prefix."ticon VALUES (500, 'fa', 'fa-lightbulb-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (501, 'fa', 'fa-exchange', '1');
INSERT INTO ".$this->prefix."ticon VALUES (502, 'fa', 'fa-cloud-download', '1');
INSERT INTO ".$this->prefix."ticon VALUES (503, 'fa', 'fa-cloud-upload', '1');
INSERT INTO ".$this->prefix."ticon VALUES (504, 'fa', 'fa-user-md', '1');
INSERT INTO ".$this->prefix."ticon VALUES (505, 'fa', 'fa-stethoscope', '1');
INSERT INTO ".$this->prefix."ticon VALUES (506, 'fa', 'fa-suitcase', '1');
INSERT INTO ".$this->prefix."ticon VALUES (507, 'fa', 'fa-bell-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (508, 'fa', 'fa-coffee', '1');
INSERT INTO ".$this->prefix."ticon VALUES (509, 'fa', 'fa-cutlery', '1');
INSERT INTO ".$this->prefix."ticon VALUES (510, 'fa', 'fa-file-text-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (511, 'fa', 'fa-building-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (512, 'fa', 'fa-hospital-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (513, 'fa', 'fa-ambulance', '1');
INSERT INTO ".$this->prefix."ticon VALUES (514, 'fa', 'fa-medkit', '1');
INSERT INTO ".$this->prefix."ticon VALUES (515, 'fa', 'fa-fighter-jet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (516, 'fa', 'fa-beer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (517, 'fa', 'fa-h-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (518, 'fa', 'fa-plus-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (519, 'fa', 'fa-angle-double-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (520, 'fa', 'fa-angle-double-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (521, 'fa', 'fa-angle-double-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (522, 'fa', 'fa-angle-double-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (523, 'fa', 'fa-angle-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (524, 'fa', 'fa-angle-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (525, 'fa', 'fa-angle-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (526, 'fa', 'fa-angle-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (527, 'fa', 'fa-desktop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (528, 'fa', 'fa-laptop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (529, 'fa', 'fa-tablet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (530, 'fa', 'fa-mobile-phone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (531, 'fa', 'fa-mobile', '1');
INSERT INTO ".$this->prefix."ticon VALUES (532, 'fa', 'fa-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (533, 'fa', 'fa-quote-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (534, 'fa', 'fa-quote-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (535, 'fa', 'fa-spinner', '1');
INSERT INTO ".$this->prefix."ticon VALUES (536, 'fa', 'fa-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (537, 'fa', 'fa-mail-reply', '1');
INSERT INTO ".$this->prefix."ticon VALUES (538, 'fa', 'fa-reply', '1');
INSERT INTO ".$this->prefix."ticon VALUES (539, 'fa', 'fa-github-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (540, 'fa', 'fa-folder-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (541, 'fa', 'fa-folder-open-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (542, 'fa', 'fa-smile-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (543, 'fa', 'fa-frown-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (544, 'fa', 'fa-meh-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (545, 'fa', 'fa-gamepad', '1');
INSERT INTO ".$this->prefix."ticon VALUES (546, 'fa', 'fa-keyboard-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (547, 'fa', 'fa-flag-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (548, 'fa', 'fa-flag-checkered', '1');
INSERT INTO ".$this->prefix."ticon VALUES (549, 'fa', 'fa-terminal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (550, 'fa', 'fa-code', '1');
INSERT INTO ".$this->prefix."ticon VALUES (551, 'fa', 'fa-mail-reply-all', '1');
INSERT INTO ".$this->prefix."ticon VALUES (552, 'fa', 'fa-reply-all', '1');
INSERT INTO ".$this->prefix."ticon VALUES (553, 'fa', 'fa-star-half-empty', '1');
INSERT INTO ".$this->prefix."ticon VALUES (554, 'fa', 'fa-star-half-full', '1');
INSERT INTO ".$this->prefix."ticon VALUES (555, 'fa', 'fa-star-half-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (556, 'fa', 'fa-location-arrow', '1');
INSERT INTO ".$this->prefix."ticon VALUES (557, 'fa', 'fa-crop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (558, 'fa', 'fa-code-fork', '1');
INSERT INTO ".$this->prefix."ticon VALUES (559, 'fa', 'fa-unlink', '1');
INSERT INTO ".$this->prefix."ticon VALUES (560, 'fa', 'fa-chain-broken', '1');
INSERT INTO ".$this->prefix."ticon VALUES (561, 'fa', 'fa-question', '1');
INSERT INTO ".$this->prefix."ticon VALUES (562, 'fa', 'fa-info', '1');
INSERT INTO ".$this->prefix."ticon VALUES (563, 'fa', 'fa-exclamation', '1');
INSERT INTO ".$this->prefix."ticon VALUES (564, 'fa', 'fa-superscript', '1');
INSERT INTO ".$this->prefix."ticon VALUES (565, 'fa', 'fa-subscript', '1');
INSERT INTO ".$this->prefix."ticon VALUES (566, 'fa', 'fa-eraser', '1');
INSERT INTO ".$this->prefix."ticon VALUES (567, 'fa', 'fa-puzzle-piece', '1');
INSERT INTO ".$this->prefix."ticon VALUES (568, 'fa', 'fa-microphone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (569, 'fa', 'fa-microphone-slash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (570, 'fa', 'fa-shield', '1');
INSERT INTO ".$this->prefix."ticon VALUES (571, 'fa', 'fa-calendar-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (572, 'fa', 'fa-fire-extinguisher', '1');
INSERT INTO ".$this->prefix."ticon VALUES (573, 'fa', 'fa-rocket', '1');
INSERT INTO ".$this->prefix."ticon VALUES (574, 'fa', 'fa-maxcdn', '1');
INSERT INTO ".$this->prefix."ticon VALUES (575, 'fa', 'fa-chevron-circle-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (576, 'fa', 'fa-chevron-circle-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (577, 'fa', 'fa-chevron-circle-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (578, 'fa', 'fa-chevron-circle-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (579, 'fa', 'fa-html5', '1');
INSERT INTO ".$this->prefix."ticon VALUES (580, 'fa', 'fa-css3', '1');
INSERT INTO ".$this->prefix."ticon VALUES (581, 'fa', 'fa-anchor', '1');
INSERT INTO ".$this->prefix."ticon VALUES (582, 'fa', 'fa-unlock-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (583, 'fa', 'fa-bullseye', '1');
INSERT INTO ".$this->prefix."ticon VALUES (584, 'fa', 'fa-ellipsis-h', '1');
INSERT INTO ".$this->prefix."ticon VALUES (585, 'fa', 'fa-ellipsis-v', '1');
INSERT INTO ".$this->prefix."ticon VALUES (586, 'fa', 'fa-rss-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (587, 'fa', 'fa-play-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (588, 'fa', 'fa-ticket', '1');
INSERT INTO ".$this->prefix."ticon VALUES (589, 'fa', 'fa-minus-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (590, 'fa', 'fa-minus-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (591, 'fa', 'fa-level-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (592, 'fa', 'fa-level-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (593, 'fa', 'fa-check-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (594, 'fa', 'fa-pencil-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (595, 'fa', 'fa-external-link-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (596, 'fa', 'fa-share-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (597, 'fa', 'fa-compass', '1');
INSERT INTO ".$this->prefix."ticon VALUES (598, 'fa', 'fa-toggle-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (599, 'fa', 'fa-caret-square-o-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (600, 'fa', 'fa-toggle-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (601, 'fa', 'fa-caret-square-o-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (602, 'fa', 'fa-toggle-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (603, 'fa', 'fa-caret-square-o-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (604, 'fa', 'fa-euro', '1');
INSERT INTO ".$this->prefix."ticon VALUES (605, 'fa', 'fa-eur', '1');
INSERT INTO ".$this->prefix."ticon VALUES (606, 'fa', 'fa-gbp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (607, 'fa', 'fa-dollar', '1');
INSERT INTO ".$this->prefix."ticon VALUES (608, 'fa', 'fa-usd', '1');
INSERT INTO ".$this->prefix."ticon VALUES (609, 'fa', 'fa-rupee', '1');
INSERT INTO ".$this->prefix."ticon VALUES (610, 'fa', 'fa-inr', '1');
INSERT INTO ".$this->prefix."ticon VALUES (611, 'fa', 'fa-cny', '1');
INSERT INTO ".$this->prefix."ticon VALUES (612, 'fa', 'fa-rmb', '1');
INSERT INTO ".$this->prefix."ticon VALUES (613, 'fa', 'fa-yen', '1');
INSERT INTO ".$this->prefix."ticon VALUES (614, 'fa', 'fa-jpy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (615, 'fa', 'fa-ruble', '1');
INSERT INTO ".$this->prefix."ticon VALUES (616, 'fa', 'fa-rouble', '1');
INSERT INTO ".$this->prefix."ticon VALUES (617, 'fa', 'fa-rub', '1');
INSERT INTO ".$this->prefix."ticon VALUES (618, 'fa', 'fa-won', '1');
INSERT INTO ".$this->prefix."ticon VALUES (619, 'fa', 'fa-krw', '1');
INSERT INTO ".$this->prefix."ticon VALUES (620, 'fa', 'fa-bitcoin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (621, 'fa', 'fa-btc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (622, 'fa', 'fa-file', '1');
INSERT INTO ".$this->prefix."ticon VALUES (623, 'fa', 'fa-file-text', '1');
INSERT INTO ".$this->prefix."ticon VALUES (624, 'fa', 'fa-sort-alpha-asc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (625, 'fa', 'fa-sort-alpha-desc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (626, 'fa', 'fa-sort-amount-asc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (627, 'fa', 'fa-sort-amount-desc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (628, 'fa', 'fa-sort-numeric-asc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (629, 'fa', 'fa-sort-numeric-desc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (630, 'fa', 'fa-thumbs-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (631, 'fa', 'fa-thumbs-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (632, 'fa', 'fa-youtube-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (633, 'fa', 'fa-youtube', '1');
INSERT INTO ".$this->prefix."ticon VALUES (634, 'fa', 'fa-xing', '1');
INSERT INTO ".$this->prefix."ticon VALUES (635, 'fa', 'fa-xing-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (636, 'fa', 'fa-youtube-play', '1');
INSERT INTO ".$this->prefix."ticon VALUES (637, 'fa', 'fa-dropbox', '1');
INSERT INTO ".$this->prefix."ticon VALUES (638, 'fa', 'fa-stack-overflow', '1');
INSERT INTO ".$this->prefix."ticon VALUES (639, 'fa', 'fa-instagram', '1');
INSERT INTO ".$this->prefix."ticon VALUES (640, 'fa', 'fa-flickr', '1');
INSERT INTO ".$this->prefix."ticon VALUES (641, 'fa', 'fa-adn', '1');
INSERT INTO ".$this->prefix."ticon VALUES (642, 'fa', 'fa-bitbucket', '1');
INSERT INTO ".$this->prefix."ticon VALUES (643, 'fa', 'fa-bitbucket-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (644, 'fa', 'fa-tumblr', '1');
INSERT INTO ".$this->prefix."ticon VALUES (645, 'fa', 'fa-tumblr-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (646, 'fa', 'fa-long-arrow-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (647, 'fa', 'fa-long-arrow-up', '1');
INSERT INTO ".$this->prefix."ticon VALUES (648, 'fa', 'fa-long-arrow-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (649, 'fa', 'fa-long-arrow-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (650, 'fa', 'fa-apple', '1');
INSERT INTO ".$this->prefix."ticon VALUES (651, 'fa', 'fa-windows', '1');
INSERT INTO ".$this->prefix."ticon VALUES (652, 'fa', 'fa-android', '1');
INSERT INTO ".$this->prefix."ticon VALUES (653, 'fa', 'fa-linux', '1');
INSERT INTO ".$this->prefix."ticon VALUES (654, 'fa', 'fa-dribbble', '1');
INSERT INTO ".$this->prefix."ticon VALUES (655, 'fa', 'fa-skype', '1');
INSERT INTO ".$this->prefix."ticon VALUES (656, 'fa', 'fa-foursquare', '1');
INSERT INTO ".$this->prefix."ticon VALUES (657, 'fa', 'fa-trello', '1');
INSERT INTO ".$this->prefix."ticon VALUES (658, 'fa', 'fa-female', '1');
INSERT INTO ".$this->prefix."ticon VALUES (659, 'fa', 'fa-male', '1');
INSERT INTO ".$this->prefix."ticon VALUES (660, 'fa', 'fa-gittip', '1');
INSERT INTO ".$this->prefix."ticon VALUES (661, 'fa', 'fa-gratipay', '1');
INSERT INTO ".$this->prefix."ticon VALUES (662, 'fa', 'fa-sun-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (663, 'fa', 'fa-moon-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (664, 'fa', 'fa-archive', '1');
INSERT INTO ".$this->prefix."ticon VALUES (665, 'fa', 'fa-bug', '1');
INSERT INTO ".$this->prefix."ticon VALUES (666, 'fa', 'fa-vk', '1');
INSERT INTO ".$this->prefix."ticon VALUES (667, 'fa', 'fa-weibo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (668, 'fa', 'fa-renren', '1');
INSERT INTO ".$this->prefix."ticon VALUES (669, 'fa', 'fa-pagelines', '1');
INSERT INTO ".$this->prefix."ticon VALUES (670, 'fa', 'fa-stack-exchange', '1');
INSERT INTO ".$this->prefix."ticon VALUES (671, 'fa', 'fa-arrow-circle-o-right', '1');
INSERT INTO ".$this->prefix."ticon VALUES (672, 'fa', 'fa-arrow-circle-o-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (673, 'fa', 'fa-toggle-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (674, 'fa', 'fa-caret-square-o-left', '1');
INSERT INTO ".$this->prefix."ticon VALUES (675, 'fa', 'fa-dot-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (676, 'fa', 'fa-wheelchair', '1');
INSERT INTO ".$this->prefix."ticon VALUES (677, 'fa', 'fa-vimeo-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (678, 'fa', 'fa-turkish-lira', '1');
INSERT INTO ".$this->prefix."ticon VALUES (679, 'fa', 'fa-try', '1');
INSERT INTO ".$this->prefix."ticon VALUES (680, 'fa', 'fa-plus-square-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (681, 'fa', 'fa-space-shuttle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (682, 'fa', 'fa-slack', '1');
INSERT INTO ".$this->prefix."ticon VALUES (683, 'fa', 'fa-envelope-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (684, 'fa', 'fa-wordpress', '1');
INSERT INTO ".$this->prefix."ticon VALUES (685, 'fa', 'fa-openid', '1');
INSERT INTO ".$this->prefix."ticon VALUES (686, 'fa', 'fa-institution', '1');
INSERT INTO ".$this->prefix."ticon VALUES (687, 'fa', 'fa-bank', '1');
INSERT INTO ".$this->prefix."ticon VALUES (688, 'fa', 'fa-university', '1');
INSERT INTO ".$this->prefix."ticon VALUES (689, 'fa', 'fa-mortar-board', '1');
INSERT INTO ".$this->prefix."ticon VALUES (690, 'fa', 'fa-graduation-cap', '1');
INSERT INTO ".$this->prefix."ticon VALUES (691, 'fa', 'fa-yahoo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (692, 'fa', 'fa-google', '1');
INSERT INTO ".$this->prefix."ticon VALUES (693, 'fa', 'fa-reddit', '1');
INSERT INTO ".$this->prefix."ticon VALUES (694, 'fa', 'fa-reddit-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (695, 'fa', 'fa-stumbleupon-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (696, 'fa', 'fa-stumbleupon', '1');
INSERT INTO ".$this->prefix."ticon VALUES (697, 'fa', 'fa-delicious', '1');
INSERT INTO ".$this->prefix."ticon VALUES (698, 'fa', 'fa-digg', '1');
INSERT INTO ".$this->prefix."ticon VALUES (699, 'fa', 'fa-pied-piper-pp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (700, 'fa', 'fa-pied-piper-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (701, 'fa', 'fa-drupal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (702, 'fa', 'fa-joomla', '1');
INSERT INTO ".$this->prefix."ticon VALUES (703, 'fa', 'fa-language', '1');
INSERT INTO ".$this->prefix."ticon VALUES (704, 'fa', 'fa-fax', '1');
INSERT INTO ".$this->prefix."ticon VALUES (705, 'fa', 'fa-building', '1');
INSERT INTO ".$this->prefix."ticon VALUES (706, 'fa', 'fa-child', '1');
INSERT INTO ".$this->prefix."ticon VALUES (707, 'fa', 'fa-paw', '1');
INSERT INTO ".$this->prefix."ticon VALUES (708, 'fa', 'fa-spoon', '1');
INSERT INTO ".$this->prefix."ticon VALUES (709, 'fa', 'fa-cube', '1');
INSERT INTO ".$this->prefix."ticon VALUES (710, 'fa', 'fa-cubes', '1');
INSERT INTO ".$this->prefix."ticon VALUES (711, 'fa', 'fa-behance', '1');
INSERT INTO ".$this->prefix."ticon VALUES (712, 'fa', 'fa-behance-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (713, 'fa', 'fa-steam', '1');
INSERT INTO ".$this->prefix."ticon VALUES (714, 'fa', 'fa-steam-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (715, 'fa', 'fa-recycle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (716, 'fa', 'fa-automobile', '1');
INSERT INTO ".$this->prefix."ticon VALUES (717, 'fa', 'fa-car', '1');
INSERT INTO ".$this->prefix."ticon VALUES (718, 'fa', 'fa-cab', '1');
INSERT INTO ".$this->prefix."ticon VALUES (719, 'fa', 'fa-taxi', '1');
INSERT INTO ".$this->prefix."ticon VALUES (720, 'fa', 'fa-tree', '1');
INSERT INTO ".$this->prefix."ticon VALUES (721, 'fa', 'fa-spotify', '1');
INSERT INTO ".$this->prefix."ticon VALUES (722, 'fa', 'fa-deviantart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (723, 'fa', 'fa-soundcloud', '1');
INSERT INTO ".$this->prefix."ticon VALUES (724, 'fa', 'fa-database', '1');
INSERT INTO ".$this->prefix."ticon VALUES (725, 'fa', 'fa-file-pdf-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (726, 'fa', 'fa-file-word-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (727, 'fa', 'fa-file-excel-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (728, 'fa', 'fa-file-powerpoint-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (729, 'fa', 'fa-file-photo-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (730, 'fa', 'fa-file-picture-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (731, 'fa', 'fa-file-image-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (732, 'fa', 'fa-file-zip-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (733, 'fa', 'fa-file-archive-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (734, 'fa', 'fa-file-sound-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (735, 'fa', 'fa-file-audio-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (736, 'fa', 'fa-file-movie-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (737, 'fa', 'fa-file-video-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (738, 'fa', 'fa-file-code-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (739, 'fa', 'fa-vine', '1');
INSERT INTO ".$this->prefix."ticon VALUES (740, 'fa', 'fa-codepen', '1');
INSERT INTO ".$this->prefix."ticon VALUES (741, 'fa', 'fa-jsfiddle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (742, 'fa', 'fa-life-bouy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (743, 'fa', 'fa-life-buoy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (744, 'fa', 'fa-life-saver', '1');
INSERT INTO ".$this->prefix."ticon VALUES (745, 'fa', 'fa-support', '1');
INSERT INTO ".$this->prefix."ticon VALUES (746, 'fa', 'fa-life-ring', '1');
INSERT INTO ".$this->prefix."ticon VALUES (747, 'fa', 'fa-circle-o-notch', '1');
INSERT INTO ".$this->prefix."ticon VALUES (748, 'fa', 'fa-ra', '1');
INSERT INTO ".$this->prefix."ticon VALUES (749, 'fa', 'fa-resistance', '1');
INSERT INTO ".$this->prefix."ticon VALUES (750, 'fa', 'fa-rebel', '1');
INSERT INTO ".$this->prefix."ticon VALUES (751, 'fa', 'fa-ge', '1');
INSERT INTO ".$this->prefix."ticon VALUES (752, 'fa', 'fa-empire', '1');
INSERT INTO ".$this->prefix."ticon VALUES (753, 'fa', 'fa-git-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (754, 'fa', 'fa-git', '1');
INSERT INTO ".$this->prefix."ticon VALUES (755, 'fa', 'fa-y-combinator-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (756, 'fa', 'fa-yc-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (757, 'fa', 'fa-hacker-news', '1');
INSERT INTO ".$this->prefix."ticon VALUES (758, 'fa', 'fa-tencent-weibo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (759, 'fa', 'fa-qq', '1');
INSERT INTO ".$this->prefix."ticon VALUES (760, 'fa', 'fa-wechat', '1');
INSERT INTO ".$this->prefix."ticon VALUES (761, 'fa', 'fa-weixin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (762, 'fa', 'fa-send', '1');
INSERT INTO ".$this->prefix."ticon VALUES (763, 'fa', 'fa-paper-plane', '1');
INSERT INTO ".$this->prefix."ticon VALUES (764, 'fa', 'fa-send-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (765, 'fa', 'fa-paper-plane-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (766, 'fa', 'fa-history', '1');
INSERT INTO ".$this->prefix."ticon VALUES (767, 'fa', 'fa-circle-thin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (768, 'fa', 'fa-header', '1');
INSERT INTO ".$this->prefix."ticon VALUES (769, 'fa', 'fa-paragraph', '1');
INSERT INTO ".$this->prefix."ticon VALUES (770, 'fa', 'fa-sliders', '1');
INSERT INTO ".$this->prefix."ticon VALUES (771, 'fa', 'fa-share-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (772, 'fa', 'fa-share-alt-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (773, 'fa', 'fa-bomb', '1');
INSERT INTO ".$this->prefix."ticon VALUES (774, 'fa', 'fa-soccer-ball-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (775, 'fa', 'fa-futbol-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (776, 'fa', 'fa-tty', '1');
INSERT INTO ".$this->prefix."ticon VALUES (777, 'fa', 'fa-binoculars', '1');
INSERT INTO ".$this->prefix."ticon VALUES (778, 'fa', 'fa-plug', '1');
INSERT INTO ".$this->prefix."ticon VALUES (779, 'fa', 'fa-slideshare', '1');
INSERT INTO ".$this->prefix."ticon VALUES (780, 'fa', 'fa-twitch', '1');
INSERT INTO ".$this->prefix."ticon VALUES (781, 'fa', 'fa-yelp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (782, 'fa', 'fa-newspaper-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (783, 'fa', 'fa-wifi', '1');
INSERT INTO ".$this->prefix."ticon VALUES (784, 'fa', 'fa-calculator', '1');
INSERT INTO ".$this->prefix."ticon VALUES (785, 'fa', 'fa-paypal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (786, 'fa', 'fa-google-wallet', '1');
INSERT INTO ".$this->prefix."ticon VALUES (787, 'fa', 'fa-cc-visa', '1');
INSERT INTO ".$this->prefix."ticon VALUES (788, 'fa', 'fa-cc-mastercard', '1');
INSERT INTO ".$this->prefix."ticon VALUES (789, 'fa', 'fa-cc-discover', '1');
INSERT INTO ".$this->prefix."ticon VALUES (790, 'fa', 'fa-cc-amex', '1');
INSERT INTO ".$this->prefix."ticon VALUES (791, 'fa', 'fa-cc-paypal', '1');
INSERT INTO ".$this->prefix."ticon VALUES (792, 'fa', 'fa-cc-stripe', '1');
INSERT INTO ".$this->prefix."ticon VALUES (793, 'fa', 'fa-bell-slash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (794, 'fa', 'fa-bell-slash-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (795, 'fa', 'fa-trash', '1');
INSERT INTO ".$this->prefix."ticon VALUES (796, 'fa', 'fa-copyright', '1');
INSERT INTO ".$this->prefix."ticon VALUES (797, 'fa', 'fa-at', '1');
INSERT INTO ".$this->prefix."ticon VALUES (798, 'fa', 'fa-eyedropper', '1');
INSERT INTO ".$this->prefix."ticon VALUES (799, 'fa', 'fa-paint-brush', '1');
INSERT INTO ".$this->prefix."ticon VALUES (800, 'fa', 'fa-birthday-cake', '1');
INSERT INTO ".$this->prefix."ticon VALUES (801, 'fa', 'fa-area-chart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (802, 'fa', 'fa-pie-chart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (803, 'fa', 'fa-line-chart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (804, 'fa', 'fa-lastfm', '1');
INSERT INTO ".$this->prefix."ticon VALUES (805, 'fa', 'fa-lastfm-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (806, 'fa', 'fa-toggle-off', '1');
INSERT INTO ".$this->prefix."ticon VALUES (807, 'fa', 'fa-toggle-on', '1');
INSERT INTO ".$this->prefix."ticon VALUES (808, 'fa', 'fa-bicycle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (809, 'fa', 'fa-bus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (810, 'fa', 'fa-ioxhost', '1');
INSERT INTO ".$this->prefix."ticon VALUES (811, 'fa', 'fa-angellist', '1');
INSERT INTO ".$this->prefix."ticon VALUES (812, 'fa', 'fa-cc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (813, 'fa', 'fa-shekel', '1');
INSERT INTO ".$this->prefix."ticon VALUES (814, 'fa', 'fa-sheqel', '1');
INSERT INTO ".$this->prefix."ticon VALUES (815, 'fa', 'fa-ils', '1');
INSERT INTO ".$this->prefix."ticon VALUES (816, 'fa', 'fa-meanpath', '1');
INSERT INTO ".$this->prefix."ticon VALUES (817, 'fa', 'fa-buysellads', '1');
INSERT INTO ".$this->prefix."ticon VALUES (818, 'fa', 'fa-connectdevelop', '1');
INSERT INTO ".$this->prefix."ticon VALUES (819, 'fa', 'fa-dashcube', '1');
INSERT INTO ".$this->prefix."ticon VALUES (820, 'fa', 'fa-forumbee', '1');
INSERT INTO ".$this->prefix."ticon VALUES (821, 'fa', 'fa-leanpub', '1');
INSERT INTO ".$this->prefix."ticon VALUES (822, 'fa', 'fa-sellsy', '1');
INSERT INTO ".$this->prefix."ticon VALUES (823, 'fa', 'fa-shirtsinbulk', '1');
INSERT INTO ".$this->prefix."ticon VALUES (824, 'fa', 'fa-simplybuilt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (825, 'fa', 'fa-skyatlas', '1');
INSERT INTO ".$this->prefix."ticon VALUES (826, 'fa', 'fa-cart-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (827, 'fa', 'fa-cart-arrow-down', '1');
INSERT INTO ".$this->prefix."ticon VALUES (828, 'fa', 'fa-diamond', '1');
INSERT INTO ".$this->prefix."ticon VALUES (829, 'fa', 'fa-ship', '1');
INSERT INTO ".$this->prefix."ticon VALUES (830, 'fa', 'fa-user-secret', '1');
INSERT INTO ".$this->prefix."ticon VALUES (831, 'fa', 'fa-motorcycle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (832, 'fa', 'fa-street-view', '1');
INSERT INTO ".$this->prefix."ticon VALUES (833, 'fa', 'fa-heartbeat', '1');
INSERT INTO ".$this->prefix."ticon VALUES (834, 'fa', 'fa-venus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (835, 'fa', 'fa-mars', '1');
INSERT INTO ".$this->prefix."ticon VALUES (836, 'fa', 'fa-mercury', '1');
INSERT INTO ".$this->prefix."ticon VALUES (837, 'fa', 'fa-intersex', '1');
INSERT INTO ".$this->prefix."ticon VALUES (838, 'fa', 'fa-transgender', '1');
INSERT INTO ".$this->prefix."ticon VALUES (839, 'fa', 'fa-transgender-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (840, 'fa', 'fa-venus-double', '1');
INSERT INTO ".$this->prefix."ticon VALUES (841, 'fa', 'fa-mars-double', '1');
INSERT INTO ".$this->prefix."ticon VALUES (842, 'fa', 'fa-venus-mars', '1');
INSERT INTO ".$this->prefix."ticon VALUES (843, 'fa', 'fa-mars-stroke', '1');
INSERT INTO ".$this->prefix."ticon VALUES (844, 'fa', 'fa-mars-stroke-v', '1');
INSERT INTO ".$this->prefix."ticon VALUES (845, 'fa', 'fa-mars-stroke-h', '1');
INSERT INTO ".$this->prefix."ticon VALUES (846, 'fa', 'fa-neuter', '1');
INSERT INTO ".$this->prefix."ticon VALUES (847, 'fa', 'fa-genderless', '1');
INSERT INTO ".$this->prefix."ticon VALUES (848, 'fa', 'fa-facebook-official', '1');
INSERT INTO ".$this->prefix."ticon VALUES (849, 'fa', 'fa-pinterest-p', '1');
INSERT INTO ".$this->prefix."ticon VALUES (850, 'fa', 'fa-whatsapp', '1');
INSERT INTO ".$this->prefix."ticon VALUES (851, 'fa', 'fa-server', '1');
INSERT INTO ".$this->prefix."ticon VALUES (852, 'fa', 'fa-user-plus', '1');
INSERT INTO ".$this->prefix."ticon VALUES (853, 'fa', 'fa-user-times', '1');
INSERT INTO ".$this->prefix."ticon VALUES (854, 'fa', 'fa-hotel', '1');
INSERT INTO ".$this->prefix."ticon VALUES (855, 'fa', 'fa-bed', '1');
INSERT INTO ".$this->prefix."ticon VALUES (856, 'fa', 'fa-viacoin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (857, 'fa', 'fa-train', '1');
INSERT INTO ".$this->prefix."ticon VALUES (858, 'fa', 'fa-subway', '1');
INSERT INTO ".$this->prefix."ticon VALUES (859, 'fa', 'fa-medium', '1');
INSERT INTO ".$this->prefix."ticon VALUES (860, 'fa', 'fa-yc', '1');
INSERT INTO ".$this->prefix."ticon VALUES (861, 'fa', 'fa-y-combinator', '1');
INSERT INTO ".$this->prefix."ticon VALUES (862, 'fa', 'fa-optin-monster', '1');
INSERT INTO ".$this->prefix."ticon VALUES (863, 'fa', 'fa-opencart', '1');
INSERT INTO ".$this->prefix."ticon VALUES (864, 'fa', 'fa-expeditedssl', '1');
INSERT INTO ".$this->prefix."ticon VALUES (865, 'fa', 'fa-battery-4', '1');
INSERT INTO ".$this->prefix."ticon VALUES (866, 'fa', 'fa-battery-full', '1');
INSERT INTO ".$this->prefix."ticon VALUES (867, 'fa', 'fa-battery-3', '1');
INSERT INTO ".$this->prefix."ticon VALUES (868, 'fa', 'fa-battery-three-quarters', '1');
INSERT INTO ".$this->prefix."ticon VALUES (869, 'fa', 'fa-battery-2', '1');
INSERT INTO ".$this->prefix."ticon VALUES (870, 'fa', 'fa-battery-half', '1');
INSERT INTO ".$this->prefix."ticon VALUES (871, 'fa', 'fa-battery-1', '1');
INSERT INTO ".$this->prefix."ticon VALUES (872, 'fa', 'fa-battery-quarter', '1');
INSERT INTO ".$this->prefix."ticon VALUES (873, 'fa', 'fa-battery-0', '1');
INSERT INTO ".$this->prefix."ticon VALUES (874, 'fa', 'fa-battery-empty', '1');
INSERT INTO ".$this->prefix."ticon VALUES (875, 'fa', 'fa-mouse-pointer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (876, 'fa', 'fa-i-cursor', '1');
INSERT INTO ".$this->prefix."ticon VALUES (877, 'fa', 'fa-object-group', '1');
INSERT INTO ".$this->prefix."ticon VALUES (878, 'fa', 'fa-object-ungroup', '1');
INSERT INTO ".$this->prefix."ticon VALUES (879, 'fa', 'fa-sticky-note', '1');
INSERT INTO ".$this->prefix."ticon VALUES (880, 'fa', 'fa-sticky-note-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (881, 'fa', 'fa-cc-jcb', '1');
INSERT INTO ".$this->prefix."ticon VALUES (882, 'fa', 'fa-cc-diners-club', '1');
INSERT INTO ".$this->prefix."ticon VALUES (883, 'fa', 'fa-clone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (884, 'fa', 'fa-balance-scale', '1');
INSERT INTO ".$this->prefix."ticon VALUES (885, 'fa', 'fa-hourglass-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (886, 'fa', 'fa-hourglass-1', '1');
INSERT INTO ".$this->prefix."ticon VALUES (887, 'fa', 'fa-hourglass-start', '1');
INSERT INTO ".$this->prefix."ticon VALUES (888, 'fa', 'fa-hourglass-2', '1');
INSERT INTO ".$this->prefix."ticon VALUES (889, 'fa', 'fa-hourglass-half', '1');
INSERT INTO ".$this->prefix."ticon VALUES (890, 'fa', 'fa-hourglass-3', '1');
INSERT INTO ".$this->prefix."ticon VALUES (891, 'fa', 'fa-hourglass-end', '1');
INSERT INTO ".$this->prefix."ticon VALUES (892, 'fa', 'fa-hourglass', '1');
INSERT INTO ".$this->prefix."ticon VALUES (893, 'fa', 'fa-hand-grab-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (894, 'fa', 'fa-hand-rock-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (895, 'fa', 'fa-hand-stop-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (896, 'fa', 'fa-hand-paper-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (897, 'fa', 'fa-hand-scissors-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (898, 'fa', 'fa-hand-lizard-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (899, 'fa', 'fa-hand-spock-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (900, 'fa', 'fa-hand-pointer-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (901, 'fa', 'fa-hand-peace-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (902, 'fa', 'fa-trademark', '1');
INSERT INTO ".$this->prefix."ticon VALUES (903, 'fa', 'fa-registered', '1');
INSERT INTO ".$this->prefix."ticon VALUES (904, 'fa', 'fa-creative-commons', '1');
INSERT INTO ".$this->prefix."ticon VALUES (905, 'fa', 'fa-gg', '1');
INSERT INTO ".$this->prefix."ticon VALUES (906, 'fa', 'fa-gg-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (907, 'fa', 'fa-tripadvisor', '1');
INSERT INTO ".$this->prefix."ticon VALUES (908, 'fa', 'fa-odnoklassniki', '1');
INSERT INTO ".$this->prefix."ticon VALUES (909, 'fa', 'fa-odnoklassniki-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (910, 'fa', 'fa-get-pocket', '1');
INSERT INTO ".$this->prefix."ticon VALUES (911, 'fa', 'fa-wikipedia-w', '1');
INSERT INTO ".$this->prefix."ticon VALUES (912, 'fa', 'fa-safari', '1');
INSERT INTO ".$this->prefix."ticon VALUES (913, 'fa', 'fa-chrome', '1');
INSERT INTO ".$this->prefix."ticon VALUES (914, 'fa', 'fa-firefox', '1');
INSERT INTO ".$this->prefix."ticon VALUES (915, 'fa', 'fa-opera', '1');
INSERT INTO ".$this->prefix."ticon VALUES (916, 'fa', 'fa-internet-explorer', '1');
INSERT INTO ".$this->prefix."ticon VALUES (917, 'fa', 'fa-tv', '1');
INSERT INTO ".$this->prefix."ticon VALUES (918, 'fa', 'fa-television', '1');
INSERT INTO ".$this->prefix."ticon VALUES (919, 'fa', 'fa-contao', '1');
INSERT INTO ".$this->prefix."ticon VALUES (920, 'fa', 'fa-500px', '1');
INSERT INTO ".$this->prefix."ticon VALUES (921, 'fa', 'fa-amazon', '1');
INSERT INTO ".$this->prefix."ticon VALUES (922, 'fa', 'fa-calendar-plus-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (923, 'fa', 'fa-calendar-minus-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (924, 'fa', 'fa-calendar-times-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (925, 'fa', 'fa-calendar-check-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (926, 'fa', 'fa-industry', '1');
INSERT INTO ".$this->prefix."ticon VALUES (927, 'fa', 'fa-map-pin', '1');
INSERT INTO ".$this->prefix."ticon VALUES (928, 'fa', 'fa-map-signs', '1');
INSERT INTO ".$this->prefix."ticon VALUES (929, 'fa', 'fa-map-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (930, 'fa', 'fa-map', '1');
INSERT INTO ".$this->prefix."ticon VALUES (931, 'fa', 'fa-commenting', '1');
INSERT INTO ".$this->prefix."ticon VALUES (932, 'fa', 'fa-commenting-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (933, 'fa', 'fa-houzz', '1');
INSERT INTO ".$this->prefix."ticon VALUES (934, 'fa', 'fa-vimeo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (935, 'fa', 'fa-black-tie', '1');
INSERT INTO ".$this->prefix."ticon VALUES (936, 'fa', 'fa-fonticons', '1');
INSERT INTO ".$this->prefix."ticon VALUES (937, 'fa', 'fa-reddit-alien', '1');
INSERT INTO ".$this->prefix."ticon VALUES (938, 'fa', 'fa-edge', '1');
INSERT INTO ".$this->prefix."ticon VALUES (939, 'fa', 'fa-credit-card-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (940, 'fa', 'fa-codiepie', '1');
INSERT INTO ".$this->prefix."ticon VALUES (941, 'fa', 'fa-modx', '1');
INSERT INTO ".$this->prefix."ticon VALUES (942, 'fa', 'fa-fort-awesome', '1');
INSERT INTO ".$this->prefix."ticon VALUES (943, 'fa', 'fa-usb', '1');
INSERT INTO ".$this->prefix."ticon VALUES (944, 'fa', 'fa-product-hunt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (945, 'fa', 'fa-mixcloud', '1');
INSERT INTO ".$this->prefix."ticon VALUES (946, 'fa', 'fa-scribd', '1');
INSERT INTO ".$this->prefix."ticon VALUES (947, 'fa', 'fa-pause-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (948, 'fa', 'fa-pause-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (949, 'fa', 'fa-stop-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (950, 'fa', 'fa-stop-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (951, 'fa', 'fa-shopping-bag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (952, 'fa', 'fa-shopping-basket', '1');
INSERT INTO ".$this->prefix."ticon VALUES (953, 'fa', 'fa-hashtag', '1');
INSERT INTO ".$this->prefix."ticon VALUES (954, 'fa', 'fa-bluetooth', '1');
INSERT INTO ".$this->prefix."ticon VALUES (955, 'fa', 'fa-bluetooth-b', '1');
INSERT INTO ".$this->prefix."ticon VALUES (956, 'fa', 'fa-percent', '1');
INSERT INTO ".$this->prefix."ticon VALUES (957, 'fa', 'fa-gitlab', '1');
INSERT INTO ".$this->prefix."ticon VALUES (958, 'fa', 'fa-wpbeginner', '1');
INSERT INTO ".$this->prefix."ticon VALUES (959, 'fa', 'fa-wpforms', '1');
INSERT INTO ".$this->prefix."ticon VALUES (960, 'fa', 'fa-envira', '1');
INSERT INTO ".$this->prefix."ticon VALUES (961, 'fa', 'fa-universal-access', '1');
INSERT INTO ".$this->prefix."ticon VALUES (962, 'fa', 'fa-wheelchair-alt', '1');
INSERT INTO ".$this->prefix."ticon VALUES (963, 'fa', 'fa-question-circle-o', '1');
INSERT INTO ".$this->prefix."ticon VALUES (964, 'fa', 'fa-blind', '1');
INSERT INTO ".$this->prefix."ticon VALUES (965, 'fa', 'fa-audio-description', '1');
INSERT INTO ".$this->prefix."ticon VALUES (966, 'fa', 'fa-volume-control-phone', '1');
INSERT INTO ".$this->prefix."ticon VALUES (967, 'fa', 'fa-braille', '1');
INSERT INTO ".$this->prefix."ticon VALUES (968, 'fa', 'fa-asl-interpreting', '1');
INSERT INTO ".$this->prefix."ticon VALUES (969, 'fa', 'fa-deafness', '1');
INSERT INTO ".$this->prefix."ticon VALUES (970, 'fa', 'fa-hard-of-hearing', '1');
INSERT INTO ".$this->prefix."ticon VALUES (971, 'fa', 'fa-deaf', '1');
INSERT INTO ".$this->prefix."ticon VALUES (972, 'fa', 'fa-glide', '1');
INSERT INTO ".$this->prefix."ticon VALUES (973, 'fa', 'fa-glide-g', '1');
INSERT INTO ".$this->prefix."ticon VALUES (974, 'fa', 'fa-signing', '1');
INSERT INTO ".$this->prefix."ticon VALUES (975, 'fa', 'fa-sign-language', '1');
INSERT INTO ".$this->prefix."ticon VALUES (976, 'fa', 'fa-low-vision', '1');
INSERT INTO ".$this->prefix."ticon VALUES (977, 'fa', 'fa-viadeo', '1');
INSERT INTO ".$this->prefix."ticon VALUES (978, 'fa', 'fa-viadeo-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (979, 'fa', 'fa-snapchat', '1');
INSERT INTO ".$this->prefix."ticon VALUES (980, 'fa', 'fa-snapchat-ghost', '1');
INSERT INTO ".$this->prefix."ticon VALUES (981, 'fa', 'fa-snapchat-square', '1');
INSERT INTO ".$this->prefix."ticon VALUES (982, 'fa', 'fa-pied-piper', '1');
INSERT INTO ".$this->prefix."ticon VALUES (983, 'fa', 'fa-first-order', '1');
INSERT INTO ".$this->prefix."ticon VALUES (984, 'fa', 'fa-yoast', '1');
INSERT INTO ".$this->prefix."ticon VALUES (985, 'fa', 'fa-themeisle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (986, 'fa', 'fa-google-plus-circle', '1');
INSERT INTO ".$this->prefix."ticon VALUES (987, 'fa', 'fa-google-plus-official', '1');
INSERT INTO ".$this->prefix."ticon VALUES (988, 'fa', 'fa-fa', '1');
INSERT INTO ".$this->prefix."ticon VALUES (989, 'fa', 'fa-font-awesome', '1');";
   $this->db->exec_native($sql);
   $_SESSION["environment"]=1;
   $this->db->__destruct();
   $this->db->__construct();
   $this->db->exec_native($sql);
   
	}
}
?>