
DROP TABLE IF EXISTS `cat_sectores`;
CREATE TABLE IF NOT EXISTS `cat_sectores` (
  `id_cat_sectores` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat_sectores`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cat_sectores`
--

INSERT INTO `cat_sectores` (`id_cat_sectores`, `descripcion`, `createdAt`, `updatedAt`, `activo`) VALUES
(1, '1', NULL, '2024-11-18 03:44:15', 1),
(2, '2', NULL, '2024-11-18 03:44:15', 1),
(3, '2 BIS', NULL, '2024-11-17 22:08:40', 1),
(4, '3', NULL, '2024-11-17 22:10:48', 1),
(5, '4', NULL, '2024-11-17 22:13:59', 1),
(6, '5', NULL, NULL, 1),
(7, '5 BIS', NULL, NULL, 1),
(8, '6', NULL, NULL, 1),
(9, '7', NULL, NULL, 1),
(10, '8', NULL, NULL, 1),
(11, '9', NULL, NULL, 1),
(12, '9 BIS', NULL, NULL, 1),
(13, '10', NULL, NULL, 1),
(14, '10 BIS', NULL, NULL, 1),
(15, '11', NULL, NULL, 1),
(16, '11 BIS', NULL, NULL, 1),
(17, '12', NULL, NULL, 1),
(18, '12 BIS', NULL, NULL, 1),
(19, '13', NULL, NULL, 1),
(20, '13 BIS', NULL, NULL, 1),
(21, '14', NULL, NULL, 1);


-- Base de datos: `db_oficialia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_zonas`
--

DROP TABLE IF EXISTS `cat_zonas`;
CREATE TABLE IF NOT EXISTS `cat_zonas` (
  `id_cat_zonas` int(11) NOT NULL AUTO_INCREMENT,
  `id_sector` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat_zonas`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cat_zonas`
--

INSERT INTO `cat_zonas` (`id_cat_zonas`, `id_sector`, `descripcion`, `createdAt`, `updatedAt`, `activo`) VALUES
(1, 1, '1.1', NULL, NULL, 1),
(2, 1, '1.2', NULL, NULL, 1),
(3, 1, '1.3', NULL, NULL, 1),
(4, 2, '2.1', NULL, NULL, 1),
(5, 2, '2.2', NULL, NULL, 1),
(6, 2, '2.3', NULL, NULL, 1),
(7, 2, '2.4', NULL, NULL, 1),
(8, 3, '2.5', NULL, NULL, 1),
(9, 3, '2.6', NULL, NULL, 1),
(10, 3, '2.7', NULL, NULL, 1),
(11, 3, '2.8', NULL, NULL, 1),
(12, 4, '3.1', NULL, NULL, 1),
(13, 4, '3.2', NULL, NULL, 1),
(14, 4, '3.3', NULL, NULL, 1),
(15, 4, '3.4', NULL, NULL, 1),
(16, 4, '3.5', NULL, NULL, 1),
(17, 5, '4.1', NULL, NULL, 1),
(18, 5, '4.2', NULL, NULL, 1),
(19, 5, '4.3', NULL, NULL, 1),
(20, 5, '4.4', NULL, NULL, 1),
(21, 5, '4.5', NULL, NULL, 1),
(22, 5, '4.6', NULL, NULL, 1),
(23, 5, '4.7', NULL, NULL, 1),
(24, 6, '5.1', NULL, NULL, 1),
(25, 6, '5.2', NULL, NULL, 1),
(26, 6, '5.3', NULL, NULL, 1),
(27, 7, '5.4', NULL, NULL, 1),
(28, 7, '5.5', NULL, NULL, 1),
(29, 7, '5.6', NULL, NULL, 1),
(30, 7, '5.7', NULL, NULL, 1),
(31, 7, '5.8', NULL, NULL, 1),
(32, 8, '6.1', NULL, NULL, 1),
(33, 8, '6.2', NULL, NULL, 1),
(34, 8, '6.3', NULL, NULL, 1),
(35, 8, '6.4', NULL, NULL, 1),
(36, 8, '6.5', NULL, NULL, 1),
(37, 9, '7.1', NULL, NULL, 1),
(38, 9, '7.2', NULL, NULL, 1),
(39, 9, '7.3', NULL, NULL, 1),
(40, 9, '7.4', NULL, NULL, 1),
(41, 9, '7.5', NULL, NULL, 1),
(42, 9, '7.6', NULL, NULL, 1),
(43, 9, '7.7', NULL, NULL, 1),
(44, 10, '8.1', NULL, NULL, 1),
(45, 10, '8.2', NULL, NULL, 1),
(46, 10, '8.3', NULL, NULL, 1),
(47, 10, '8.4', NULL, NULL, 1),
(48, 10, '8.5', NULL, NULL, 1),
(49, 11, '9.1', NULL, NULL, 1),
(50, 11, '9.1', NULL, NULL, 1),
(51, 11, '9.2', NULL, NULL, 1),
(52, 11, '9.3', NULL, NULL, 1),
(53, 11, '9.4', NULL, NULL, 1),
(54, 11, '9.5', NULL, NULL, 1),
(55, 11, '9.6', NULL, NULL, 1),
(56, 12, '9.7', NULL, NULL, 1),
(57, 12, '9.8', NULL, NULL, 1),
(58, 12, '9.9', NULL, NULL, 1),
(59, 13, '10.1', NULL, NULL, 1),
(60, 13, '10.2', NULL, NULL, 1),
(61, 13, '10.3', NULL, NULL, 1),
(62, 13, '10.4', NULL, NULL, 1),
(63, 14, '10.5', NULL, NULL, 1),
(64, 14, '10.6', NULL, NULL, 1),
(65, 14, '10.7', NULL, NULL, 1),
(66, 15, '11.1', NULL, NULL, 1),
(67, 15, '11.2', NULL, NULL, 1),
(68, 15, '11.3', NULL, NULL, 1),
(69, 16, '11.4', NULL, NULL, 1),
(70, 16, '11.5', NULL, NULL, 1),
(71, 16, '11.6', NULL, NULL, 1),
(72, 17, '12.1', NULL, NULL, 1),
(73, 17, '12.2', NULL, NULL, 1),
(74, 17, '12.3', NULL, NULL, 1),
(75, 17, '12.4', NULL, NULL, 1),
(76, 17, '12.5', NULL, NULL, 1),
(77, 18, '12.6', NULL, NULL, 1),
(78, 18, '12.7', NULL, NULL, 1),
(79, 18, '12.8', NULL, NULL, 1),
(80, 18, '12.9', NULL, NULL, 1),
(81, 19, '13.1', NULL, NULL, 1),
(82, 19, '13.2', NULL, NULL, 1),
(83, 19, '13.3', NULL, NULL, 1),
(84, 20, '13.4', NULL, NULL, 1),
(85, 20, '13.5', NULL, NULL, 1),
(86, 20, '13.6', NULL, NULL, 1),
(87, 20, '13.7', NULL, NULL, 1),
(88, 20, '13.8', NULL, NULL, 1),
(89, 20, '13.9', NULL, NULL, 1),
(90, 21, '14.1', NULL, NULL, 1),
(91, 21, '14.2', NULL, NULL, 1),
(92, 21, '14.3', NULL, NULL, 1),
(93, 21, '14.4', NULL, NULL, 1),
(94, 21, '14.5', NULL, NULL, 1),
(95, 21, '14.6', NULL, NULL, 1),
(96, 12, '9.10', NULL, NULL, 1),
(97, 12, '9.11', NULL, NULL, 1);



-- Base de datos: `db_oficialia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_secciones`
--

DROP TABLE IF EXISTS `cat_secciones`;
CREATE TABLE IF NOT EXISTS `cat_secciones` (
  `id_cat_secciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona` int(11) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `microsector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat_secciones`)
) ENGINE=InnoDB AUTO_INCREMENT=388 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cat_secciones`
--

INSERT INTO `cat_secciones` (`id_cat_secciones`, `id_zona`, `createdAt`, `updatedAt`, `descripcion`, `microsector`, `activo`) VALUES
(1, 81, NULL, NULL, '4757', '', 1),
(2, 72, NULL, NULL, '4758', '', 1),
(3, 72, NULL, NULL, '4759', '', 1),
(4, 88, NULL, NULL, '4760', '', 1),
(5, 83, NULL, NULL, '4761', '', 1),
(6, 82, NULL, NULL, '4762', '', 1),
(7, 82, NULL, NULL, '4763', '', 1),
(8, 84, NULL, NULL, '4764', '', 1),
(9, 84, NULL, NULL, '4765', '', 1),
(10, 85, NULL, NULL, '4766', '', 1),
(11, 85, NULL, NULL, '4767', '', 1),
(12, 82, NULL, NULL, '4768', '', 1),
(13, 74, NULL, NULL, '4769', '', 1),
(14, 72, NULL, NULL, '4770', '', 1),
(15, 73, NULL, NULL, '4771', '', 1),
(16, 73, NULL, NULL, '4772', '', 1),
(17, 73, NULL, NULL, '4773', '', 1),
(18, 75, NULL, NULL, '4774', '', 1),
(19, 75, NULL, NULL, '4775', '', 1),
(20, 74, NULL, NULL, '4776', '', 1),
(21, 74, NULL, NULL, '4777', '', 1),
(22, 83, NULL, NULL, '4778', '', 1),
(23, 83, NULL, NULL, '4779', '', 1),
(24, 85, NULL, NULL, '4780', '', 1),
(25, 84, NULL, NULL, '4781', '', 1),
(26, 89, NULL, NULL, '4782', '', 1),
(27, 89, NULL, NULL, '4783', '', 1),
(28, 89, NULL, NULL, '4784', '', 1),
(29, 89, NULL, NULL, '4785', '', 1),
(30, 88, NULL, NULL, '4786', '', 1),
(31, 86, NULL, NULL, '4788', '', 1),
(32, 75, NULL, NULL, '4789', '', 1),
(33, 75, NULL, NULL, '4790', '', 1),
(34, 76, NULL, NULL, '4791', '', 1),
(35, 76, NULL, NULL, '4792', '', 1),
(36, 76, NULL, NULL, '4793', '', 1),
(37, 77, NULL, NULL, '4794', '', 1),
(38, 77, NULL, NULL, '4795', '', 1),
(39, 80, NULL, NULL, '4796', '', 1),
(40, 87, NULL, NULL, '4797', '', 1),
(41, 87, NULL, NULL, '4798', '', 1),
(42, 77, NULL, NULL, '4799', '', 1),
(43, 78, NULL, NULL, '4800', '', 1),
(44, 78, NULL, NULL, '4801', '', 1),
(45, 77, NULL, NULL, '4802', '', 1),
(46, 80, NULL, NULL, '4803', '', 1),
(47, 78, NULL, NULL, '4804', '', 1),
(48, 79, NULL, NULL, '4805', '', 1),
(49, 80, NULL, NULL, '4806', '', 1),
(50, 80, NULL, NULL, '4807', '', 1),
(51, 79, NULL, NULL, '4808', '', 1),
(52, 79, NULL, NULL, '4809', '', 1),
(53, 80, NULL, NULL, '4810', '', 1),
(54, 79, NULL, NULL, '4811', '', 1),
(55, 93, NULL, NULL, '4812', '', 1),
(56, 93, NULL, NULL, '4813', '', 1),
(57, 93, NULL, NULL, '4814', '', 1),
(58, 93, NULL, NULL, '4815', '', 1),
(59, 95, NULL, NULL, '4816', '', 1),
(60, 95, NULL, NULL, '4817', '', 1),
(61, 95, NULL, NULL, '4818', '', 1),
(62, 95, NULL, NULL, '4819', '', 1),
(63, 95, NULL, NULL, '4820', '', 1),
(64, 94, NULL, NULL, '4821', '', 1),
(65, 94, NULL, NULL, '4822', '', 1),
(66, 94, NULL, NULL, '4823', '', 1),
(67, 94, NULL, NULL, '4824', '', 1),
(68, 92, NULL, NULL, '4825', '', 1),
(69, 92, NULL, NULL, '4826', '', 1),
(70, 92, NULL, NULL, '4827', '', 1),
(71, 92, NULL, NULL, '4828', '', 1),
(72, 91, NULL, NULL, '4829', '', 1),
(73, 91, NULL, NULL, '4830', '', 1),
(74, 91, NULL, NULL, '4831', '', 1),
(75, 91, NULL, NULL, '4832', '', 1),
(76, 90, NULL, NULL, '4833', '', 1),
(77, 90, NULL, NULL, '4834', '', 1),
(78, 90, NULL, NULL, '4835', '', 1),
(79, 47, NULL, NULL, '4836', '', 1),
(80, 47, NULL, NULL, '4837', '', 1),
(81, 48, NULL, NULL, '4838', '', 1),
(82, 48, NULL, NULL, '4839', '', 1),
(83, 48, NULL, NULL, '4840', '', 1),
(84, 47, NULL, NULL, '4841', '', 1),
(85, 46, NULL, NULL, '4842', '', 1),
(86, 45, NULL, NULL, '4843', '', 1),
(87, 44, NULL, NULL, '4844', '', 1),
(88, 44, NULL, NULL, '4845', '', 1),
(89, 44, NULL, NULL, '4846', '', 1),
(90, 46, NULL, NULL, '4847', '', 1),
(91, 40, NULL, NULL, '4848', '', 1),
(92, 39, NULL, NULL, '4849', '', 1),
(93, 39, NULL, NULL, '4850', '', 1),
(94, 41, NULL, NULL, '4851', '', 1),
(95, 41, NULL, NULL, '4852', '', 1),
(96, 41, NULL, NULL, '4853', '', 1),
(97, 39, NULL, NULL, '4854', '', 1),
(98, 46, NULL, NULL, '4855', '', 1),
(99, 46, NULL, NULL, '4856', '', 1),
(100, 37, NULL, NULL, '4857', '', 1),
(101, 39, NULL, NULL, '4858', '', 1),
(102, 41, NULL, NULL, '4859', '', 1),
(103, 38, NULL, NULL, '4860', '', 1),
(104, 38, NULL, NULL, '4861', '', 1),
(105, 37, NULL, NULL, '4862', '', 1),
(106, 37, NULL, NULL, '4863', '', 1),
(107, 37, NULL, NULL, '4864', '', 1),
(108, 37, NULL, NULL, '4865', '', 1),
(109, 38, NULL, NULL, '4866', '', 1),
(110, 38, NULL, NULL, '4867', '', 1),
(111, 4, NULL, NULL, '4868', '', 1),
(112, 2, NULL, NULL, '4869', '', 1),
(113, 27, NULL, NULL, '4870', '', 1),
(114, 26, NULL, NULL, '4871', '', 1),
(115, 26, NULL, NULL, '4872', '', 1),
(116, 26, NULL, NULL, '4873', '', 1),
(117, 27, NULL, NULL, '4874', '', 1),
(118, 26, NULL, NULL, '4875', '', 1),
(119, 63, NULL, NULL, '4876', '', 1),
(120, 65, NULL, NULL, '4877', '', 1),
(121, 63, NULL, NULL, '4878', '', 1),
(122, 60, NULL, NULL, '4879', '', 1),
(123, 60, NULL, NULL, '4880', '', 1),
(124, 60, NULL, NULL, '4881', '', 1),
(125, 61, NULL, NULL, '4882', '', 1),
(126, 61, NULL, NULL, '4883', '', 1),
(127, 59, NULL, NULL, '4884', '', 1),
(128, 71, NULL, NULL, '4885', '', 1),
(129, 71, NULL, NULL, '4886', '', 1),
(130, 71, NULL, NULL, '4887', '', 1),
(131, 70, NULL, NULL, '4888', '', 1),
(132, 70, NULL, NULL, '4889', '', 1),
(133, 70, NULL, NULL, '4890', '', 1),
(134, 70, NULL, NULL, '4891', '', 1),
(135, 69, NULL, NULL, '4892', '', 1),
(136, 71, NULL, NULL, '4893', '', 1),
(137, 71, NULL, NULL, '4894', '', 1),
(138, 59, NULL, NULL, '4895', '', 1),
(139, 62, NULL, NULL, '4896', '', 1),
(140, 62, NULL, NULL, '4897', '', 1),
(141, 59, NULL, NULL, '4898', '', 1),
(142, 61, NULL, NULL, '4899', '', 1),
(143, 62, NULL, NULL, '4900', '', 1),
(144, 60, NULL, NULL, '4901', '', 1),
(145, 60, NULL, NULL, '4902', '', 1),
(146, 60, NULL, NULL, '4903', '', 1),
(147, 60, NULL, NULL, '4904', '', 1),
(148, 62, NULL, NULL, '4905', '', 1),
(149, 2, NULL, NULL, '4906', '', 1),
(150, 26, NULL, NULL, '4907', '', 1),
(151, 25, NULL, NULL, '4908', '', 1),
(152, 28, NULL, NULL, '4909', '', 1),
(153, 31, NULL, NULL, '4910', '', 1),
(154, 27, NULL, NULL, '4911', '', 1),
(155, 31, NULL, NULL, '4912', '', 1),
(156, 27, NULL, NULL, '4913', '', 1),
(157, 3, NULL, NULL, '4914', '', 1),
(158, 3, NULL, NULL, '4915', '', 1),
(159, 3, NULL, NULL, '4916', '', 1),
(160, 1, NULL, NULL, '4917', '', 0),
(161, 1, NULL, NULL, '4918', '', 1),
(162, 1, NULL, NULL, '4919', '', 1),
(163, 7, NULL, NULL, '4920', '', 1),
(164, 7, NULL, NULL, '4921', '', 1),
(165, 2, NULL, NULL, '4922', '', 1),
(166, 3, NULL, NULL, '4923', '', 1),
(167, 2, NULL, NULL, '4924', '', 1),
(168, 31, NULL, NULL, '4925', '', 1),
(169, 30, NULL, NULL, '4926', '', 1),
(170, 30, NULL, NULL, '4927', '', 1),
(171, 28, NULL, NULL, '4928', '', 1),
(172, 28, NULL, NULL, '4929', '', 1),
(173, 24, NULL, NULL, '4930', '', 1),
(174, 24, NULL, NULL, '4931', '', 1),
(175, 24, NULL, NULL, '4932', '', 1),
(176, 24, NULL, NULL, '4933', '', 1),
(177, 24, NULL, NULL, '4934', '', 1),
(178, 66, NULL, NULL, '4935', '', 1),
(179, 68, NULL, NULL, '4936', '', 1),
(180, 68, NULL, NULL, '4937', '', 1),
(181, 69, NULL, NULL, '4938', '', 1),
(182, 69, NULL, NULL, '4939', '', 1),
(183, 69, NULL, NULL, '4940', '', 1),
(184, 68, NULL, NULL, '4941', '', 1),
(185, 68, NULL, NULL, '4942', '', 1),
(186, 66, NULL, NULL, '4943', '', 1),
(187, 66, NULL, NULL, '4944', '', 1),
(188, 28, NULL, NULL, '4945', '', 1),
(189, 29, NULL, NULL, '4946', '', 1),
(190, 29, NULL, NULL, '4947', '', 1),
(191, 30, NULL, NULL, '4948', '', 1),
(192, 29, NULL, NULL, '4949', '', 1),
(193, 2, NULL, NULL, '4950', '', 1),
(194, 2, NULL, NULL, '4951', '', 1),
(195, 9, NULL, NULL, '4952', '', 1),
(196, 23, NULL, NULL, '4953', '', 1),
(197, 22, NULL, NULL, '4954', '', 1),
(198, 22, NULL, NULL, '4955', '', 1),
(199, 66, NULL, NULL, '4956', '', 1),
(200, 67, NULL, NULL, '4957', '', 1),
(201, 67, NULL, NULL, '4958', '', 1),
(202, 67, NULL, NULL, '4959', '', 1),
(203, 67, NULL, NULL, '4960', '', 1),
(204, 67, NULL, NULL, '4961', '', 1),
(205, 23, NULL, NULL, '4962', '', 1),
(206, 33, NULL, NULL, '4963', '', 1),
(207, 33, NULL, NULL, '4964', '', 1),
(208, 33, NULL, NULL, '4965', '', 1),
(209, 96, NULL, NULL, '4966', '', 1),
(210, 97, NULL, NULL, '4967', '', 1),
(211, 58, NULL, NULL, '4968', '', 1),
(212, 58, NULL, NULL, '4969', '', 1),
(213, 1, NULL, NULL, '4970', '', 1),
(214, 58, NULL, NULL, '4971', '', 1),
(215, 58, NULL, NULL, '4972', '', 1),
(216, 32, NULL, NULL, '4973', '', 1),
(217, 32, NULL, NULL, '4974', '', 1),
(218, 34, NULL, NULL, '4975', '', 1),
(219, 33, NULL, NULL, '4976', '', 1),
(220, 33, NULL, NULL, '4977', '', 1),
(221, 34, NULL, NULL, '4978', '', 1),
(222, 32, NULL, NULL, '4979', '', 1),
(223, 32, NULL, NULL, '4980', '', 1),
(224, 32, NULL, NULL, '4981', '', 1),
(225, 34, NULL, NULL, '4982', '', 1),
(226, 36, NULL, NULL, '4983', '', 1),
(227, 34, NULL, NULL, '4984', '', 1),
(228, 36, NULL, NULL, '4985', '', 1),
(229, 36, NULL, NULL, '4986', '', 1),
(230, 36, NULL, NULL, '4987', '', 1),
(231, 35, NULL, NULL, '4988', '', 1),
(232, 35, NULL, NULL, '4989', '', 1),
(233, 35, NULL, NULL, '4990', '', 1),
(234, 35, NULL, NULL, '4991', '', 1),
(235, 34, NULL, NULL, '4992', '', 1),
(236, 48, NULL, NULL, '4993', '', 1),
(237, 6, NULL, NULL, '4994', '', 1),
(238, 6, NULL, NULL, '4995', '', 1),
(239, 43, NULL, NULL, '4996', '', 1),
(240, 42, NULL, NULL, '4997', '', 1),
(241, 45, NULL, NULL, '4998', '', 1),
(242, 45, NULL, NULL, '4999', '', 1),
(243, 40, NULL, NULL, '5000', '', 1),
(244, 42, NULL, NULL, '5001', '', 1),
(245, 6, NULL, NULL, '5002', '', 1),
(246, 7, NULL, NULL, '5003', '', 1),
(247, 10, NULL, NULL, '5004', '', 1),
(248, 10, NULL, NULL, '5005', '', 1),
(249, 7, NULL, NULL, '5006', '', 1),
(250, 7, NULL, NULL, '5007', '', 1),
(251, 6, NULL, NULL, '5008', '', 1),
(252, 6, NULL, NULL, '5009', '', 1),
(253, 6, NULL, NULL, '5010', '', 1),
(254, 42, NULL, NULL, '5011', '', 1),
(255, 40, NULL, NULL, '5012', '', 1),
(256, 40, NULL, NULL, '5013', '', 1),
(257, 45, NULL, NULL, '5014', '', 1),
(258, 42, NULL, NULL, '5015', '', 1),
(259, 43, NULL, NULL, '5016', '', 1),
(260, 43, NULL, NULL, '5017', '', 1),
(261, 5, NULL, NULL, '5018', '', 1),
(262, 5, NULL, NULL, '5019', '', 1),
(263, 10, NULL, NULL, '5020', '', 1),
(264, 10, NULL, NULL, '5021', '', 1),
(265, 10, NULL, NULL, '5022', '', 1),
(266, 11, NULL, NULL, '5023', '', 1),
(267, 9, NULL, NULL, '5024', '', 1),
(268, 22, NULL, NULL, '5025', '', 1),
(269, 23, NULL, NULL, '5026', '', 1),
(270, 23, NULL, NULL, '5027', '', 1),
(271, 10, NULL, NULL, '5028', '', 1),
(272, 43, NULL, NULL, '5029', '', 1),
(273, 43, NULL, NULL, '5030', '', 1),
(274, 43, NULL, NULL, '5031', '', 1),
(275, 43, NULL, NULL, '5032', '', 1),
(276, 5, NULL, NULL, '5033', '', 1),
(277, 21, NULL, NULL, '5034', '', 1),
(278, 21, NULL, NULL, '5035', '', 1),
(279, 21, NULL, NULL, '5036', '', 1),
(280, 8, NULL, NULL, '5037', '', 1),
(281, 11, NULL, NULL, '5038', '', 1),
(282, 11, NULL, NULL, '5039', '', 1),
(283, 5, NULL, NULL, '5040', '', 1),
(284, 5, NULL, NULL, '5041', '', 1),
(285, 4, NULL, NULL, '5042', '', 1),
(286, 14, NULL, NULL, '5043', '', 1),
(287, 11, NULL, NULL, '5044', '', 1),
(288, 11, NULL, NULL, '5045', '', 1),
(289, 9, NULL, NULL, '5046', '', 1),
(290, 9, NULL, NULL, '5047', '', 1),
(291, 8, NULL, NULL, '5048', '', 1),
(292, 20, NULL, NULL, '5049', '', 1),
(293, 21, NULL, NULL, '5050', '', 1),
(294, 8, NULL, NULL, '5051', '', 1),
(295, 9, NULL, NULL, '5052', '', 1),
(296, 16, NULL, NULL, '5053', '', 1),
(297, 15, NULL, NULL, '5054', '', 1),
(298, 15, NULL, NULL, '5055', '', 1),
(299, 14, NULL, NULL, '5056', '', 1),
(300, 14, NULL, NULL, '5057', '', 1),
(301, 4, NULL, NULL, '5058', '', 1),
(302, 15, NULL, NULL, '5059', '', 1),
(303, 16, NULL, NULL, '5060', '', 1),
(304, 16, NULL, NULL, '5061', '', 1),
(305, 13, NULL, NULL, '5062', '', 1),
(306, 13, NULL, NULL, '5063', '', 1),
(307, 8, NULL, NULL, '5064', '', 1),
(308, 8, NULL, NULL, '5065', '', 1),
(309, 20, NULL, NULL, '5066', '', 1),
(310, 19, NULL, NULL, '5067', '', 1),
(311, 18, NULL, NULL, '5068', '', 1),
(312, 17, NULL, NULL, '5069', '', 1),
(313, 17, NULL, NULL, '5070', '', 1),
(314, 17, NULL, NULL, '5071', '', 1),
(315, 17, NULL, NULL, '5072', '', 1),
(316, 17, NULL, NULL, '5073', '', 1),
(317, 18, NULL, NULL, '5074', '', 1),
(318, 18, NULL, NULL, '5075', '', 1),
(319, 18, NULL, NULL, '5076', '', 1),
(320, 19, NULL, NULL, '5077', '', 1),
(321, 19, NULL, NULL, '5078', '', 1),
(322, 20, NULL, NULL, '5079', '', 1),
(323, 19, NULL, NULL, '5080', '', 1),
(324, 12, NULL, NULL, '5081', '', 1),
(325, 12, NULL, NULL, '5082', '', 1),
(326, 12, NULL, NULL, '5083', '', 1),
(327, 12, NULL, NULL, '5084', '', 1),
(328, 13, NULL, NULL, '5085', '', 1),
(329, 13, NULL, NULL, '5086', '', 1),
(330, 16, NULL, NULL, '5087', '', 1),
(331, 13, NULL, NULL, '5088', '', 1),
(332, 13, NULL, NULL, '5089', '', 1),
(333, 12, NULL, NULL, '5090', '', 1),
(334, 12, NULL, NULL, '5091', '', 1),
(335, 49, NULL, NULL, '5092', '', 1),
(336, 49, NULL, NULL, '5093', '', 1),
(337, 49, NULL, NULL, '5094', '', 1),
(338, 49, NULL, NULL, '5095', '', 1),
(339, 51, NULL, NULL, '5096', '', 1),
(340, 51, NULL, NULL, '5097', '', 1),
(341, 51, NULL, NULL, '5098', '', 1),
(342, 57, NULL, NULL, '5099', '', 1),
(343, 57, NULL, NULL, '5100', '', 1),
(344, 57, NULL, NULL, '5101', '', 1),
(345, 56, NULL, NULL, '5102', '', 1),
(346, 56, NULL, NULL, '5103', '', 1),
(347, 57, NULL, NULL, '5104', '', 1),
(348, 57, NULL, NULL, '5105', '', 1),
(349, 51, NULL, NULL, '5106', '', 1),
(350, 54, NULL, NULL, '5107', '', 1),
(351, 55, NULL, NULL, '5108', '', 1),
(352, 54, NULL, NULL, '5109', '', 1),
(353, 54, NULL, NULL, '5110', '', 1),
(354, 54, NULL, NULL, '5111', '', 1),
(355, 53, NULL, NULL, '5112', '', 1),
(356, 53, NULL, NULL, '5113', '', 1),
(357, 53, NULL, NULL, '5114', '', 1),
(358, 55, NULL, NULL, '5115', '', 1),
(359, 55, NULL, NULL, '5116', '', 1),
(360, 96, NULL, NULL, '5117', '', 1),
(361, 96, NULL, NULL, '5118', '', 1),
(362, 56, NULL, NULL, '5119', '', 1),
(363, 56, NULL, NULL, '5120', '', 1),
(364, 97, NULL, NULL, '5121', '', 1),
(365, 55, NULL, NULL, '5122', '', 1),
(366, 52, NULL, NULL, '5123', '', 1),
(367, 52, NULL, NULL, '5124', '', 1),
(368, 52, NULL, NULL, '5125', '', 1),
(369, 53, NULL, NULL, '5126', '', 1),
(370, 65, NULL, NULL, '5127', '', 1),
(371, 64, NULL, NULL, '5128', '', 1),
(372, 64, NULL, NULL, '5129', '', 1),
(373, 64, NULL, NULL, '5130', '', 1),
(374, 63, NULL, NULL, '5131', '', 1),
(375, 63, NULL, NULL, '5132', '', 1),
(376, 65, NULL, NULL, '5133', '', 1),
(377, 65, NULL, NULL, '5134', '', 1),
(378, 97, NULL, NULL, '5135', '', 1),
(379, 97, NULL, NULL, '5136', '', 1),
(380, 48, NULL, NULL, '6644', '', 1),
(381, 86, NULL, NULL, '6664', '', 1),
(382, 86, NULL, NULL, '6665', '', 1),
(384, 81, NULL, NULL, '6744', '', 1),
(385, 81, NULL, NULL, '6745', '', 1),
(386, 81, NULL, NULL, '6746', '', 1),
(387, 81, NULL, NULL, '6747', '', 1);
COMMIT;
