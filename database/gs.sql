-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Mar-2017 às 17:51
-- Versão do servidor: 5.6.33-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `gs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamentos`
--

CREATE TABLE IF NOT EXISTS `tb_agendamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `hora` varchar(6) NOT NULL,
  `data` varchar(16) NOT NULL,
  `cont_agend` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_horarios_monitor`
--

CREATE TABLE IF NOT EXISTS `tb_horarios_monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `segunda` varchar(10) NOT NULL,
  `seg_ini` varchar(10) NOT NULL,
  `seg_fim` varchar(10) NOT NULL,
  `terca` varchar(10) NOT NULL,
  `ter_ini` varchar(10) NOT NULL,
  `ter_fim` varchar(10) NOT NULL,
  `quarta` varchar(10) NOT NULL,
  `qua_ini` varchar(10) NOT NULL,
  `qua_fim` varchar(10) NOT NULL,
  `quinta` varchar(10) NOT NULL,
  `qui_ini` varchar(10) NOT NULL,
  `qui_fim` varchar(10) NOT NULL,
  `sexta` varchar(10) NOT NULL,
  `sex_ini` varchar(10) NOT NULL,
  `sex_fim` varchar(10) NOT NULL,
  `sabado` varchar(10) NOT NULL,
  `sab_ini` varchar(10) NOT NULL,
  `sab_fim` varchar(10) NOT NULL,
  `domingo` varchar(10) NOT NULL,
  `dom_ini` varchar(10) NOT NULL,
  `dom_fim` varchar(10) NOT NULL,
  `exibicao_grade` int(11) NOT NULL,
  `agend_minimo` int(11) NOT NULL,
  `agend_padrao` int(11) NOT NULL,
  `agend_maximo` int(11) NOT NULL,
  `pausa` varchar(10) NOT NULL,
  `retorno` varchar(10) NOT NULL,
  `aviso_minimo` int(11) NOT NULL,
  `und_tempo` varchar(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Extraindo dados da tabela `tb_horarios_monitor`
--

INSERT INTO `tb_horarios_monitor` (`id`, `curso_id`, `monitor_id`, `segunda`, `seg_ini`, `seg_fim`, `terca`, `ter_ini`, `ter_fim`, `quarta`, `qua_ini`, `qua_fim`, `quinta`, `qui_ini`, `qui_fim`, `sexta`, `sex_ini`, `sex_fim`, `sabado`, `sab_ini`, `sab_fim`, `domingo`, `dom_ini`, `dom_fim`, `exibicao_grade`, `agend_minimo`, `agend_padrao`, `agend_maximo`, `pausa`, `retorno`, `aviso_minimo`, `und_tempo`, `status`) VALUES
(117, 4, 159, 'seg', '10:00', '18:00', '', '', '', '', '', '', 'qui', '08:00', '20:00', '', '', '', '', '', '', '', '', '', 30, 30, 30, 30, '', '', 12, 'hr', 'Habilitado'),
(118, 3, 6, '', '', '', '', '', '', '', '', '', '', '', '', 'sex', '08:00', '20:00', '', '', '', '', '', '', 60, 15, 30, 30, '12:00', '14:00', 10, 'hr', 'Habilitado'),
(119, 4, 319, '', '', '', '', '', '', '', '10:00', '12:00', '', '', '', '', '', '', '', '', '', '', '', '', 30, 15, 30, 30, '', '', 24, 'hr', 'Habilitado'),
(121, 3, 13, '', '', '', '', '', '', '', '09:00', '17:00', 'qui', '08:00', '18:00', '', '', '', '', '', '', '', '', '', 15, 15, 30, 30, '', '', 13, 'hr', 'Habilitado'),
(123, 3, 15, 'seg', '09:00', '16:00', '', '', '', '', '', '', '', '', '', 'sex', '09:00', '17:00', '', '', '', '', '', '', 60, 15, 30, 30, '12:00', '13:00', 12, 'hr', 'Habilitado'),
(124, 2, 99, 'seg', '15:00', '20:00', 'ter', '08:00', '12:00', 'qua', '06:00', '11:00', 'qui', '10:00', '18:00', 'sex', '10:00', '22:00', 'sab', '08:00', '10:00', 'dom', '10:00', '12:00', 60, 15, 30, 30, '13:00', '14:00', 24, 'hr', 'Habilitado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios_adm`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios_adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome_usuario` varchar(80) NOT NULL,
  `nivel_acesso` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_usuarios_adm`
--

INSERT INTO `tb_usuarios_adm` (`id`, `usuario`, `senha`, `nome_usuario`, `nivel_acesso`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'REGINALDO CANDIDO', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_atribuicoes`
--
CREATE TABLE IF NOT EXISTS `vw_atribuicoes` (
`id` bigint(10)
,`roleid` bigint(10)
,`contextid` bigint(10)
,`userid` bigint(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_categorias`
--
CREATE TABLE IF NOT EXISTS `vw_categorias` (
`id_category` bigint(10)
,`name` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_contexto`
--
CREATE TABLE IF NOT EXISTS `vw_contexto` (
`id` bigint(10)
,`contextlevel` bigint(10)
,`instanceid` bigint(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_cursos`
--
CREATE TABLE IF NOT EXISTS `vw_cursos` (
`id_course` bigint(10)
,`category` bigint(10)
,`fullname` varchar(254)
,`format` varchar(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_usuarios`
--
CREATE TABLE IF NOT EXISTS `vw_usuarios` (
`id` bigint(10)
,`username` varchar(100)
,`firstname` varchar(100)
,`lastname` varchar(100)
,`email` varchar(100)
,`city` varchar(120)
);
-- --------------------------------------------------------

--
-- Structure for view `vw_atribuicoes`
--
DROP TABLE IF EXISTS `vw_atribuicoes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_atribuicoes` AS select `moodle`.`mdl_role_assignments`.`id` AS `id`,`moodle`.`mdl_role_assignments`.`roleid` AS `roleid`,`moodle`.`mdl_role_assignments`.`contextid` AS `contextid`,`moodle`.`mdl_role_assignments`.`userid` AS `userid` from `moodle`.`mdl_role_assignments`;

-- --------------------------------------------------------

--
-- Structure for view `vw_categorias`
--
DROP TABLE IF EXISTS `vw_categorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_categorias` AS select `moodle`.`mdl_course_categories`.`id` AS `id_category`,`moodle`.`mdl_course_categories`.`name` AS `name` from `moodle`.`mdl_course_categories`;

-- --------------------------------------------------------

--
-- Structure for view `vw_contexto`
--
DROP TABLE IF EXISTS `vw_contexto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_contexto` AS select `moodle`.`mdl_context`.`id` AS `id`,`moodle`.`mdl_context`.`contextlevel` AS `contextlevel`,`moodle`.`mdl_context`.`instanceid` AS `instanceid` from `moodle`.`mdl_context`;

-- --------------------------------------------------------

--
-- Structure for view `vw_cursos`
--
DROP TABLE IF EXISTS `vw_cursos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cursos` AS select `moodle`.`mdl_course`.`id` AS `id_course`,`moodle`.`mdl_course`.`category` AS `category`,`moodle`.`mdl_course`.`fullname` AS `fullname`,`moodle`.`mdl_course`.`format` AS `format` from `moodle`.`mdl_course`;

-- --------------------------------------------------------

--
-- Structure for view `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios` AS select `moodle`.`mdl_user`.`id` AS `id`,`moodle`.`mdl_user`.`username` AS `username`,`moodle`.`mdl_user`.`firstname` AS `firstname`,`moodle`.`mdl_user`.`lastname` AS `lastname`,`moodle`.`mdl_user`.`email` AS `email`,`moodle`.`mdl_user`.`city` AS `city` from `moodle`.`mdl_user`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
