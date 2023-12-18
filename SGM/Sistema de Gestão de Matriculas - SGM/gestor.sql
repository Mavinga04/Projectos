-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 26, 2021 as 01:07 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `gestor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cert`
--

CREATE TABLE IF NOT EXISTS `cert` (
  `id_cert` int(11) NOT NULL AUTO_INCREMENT,
  `cert` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cert`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cert`
--

INSERT INTO `cert` (`id_cert`, `cert`) VALUES
(1, '7307514e6af94bff3e1565a50551fe9c.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `classe`) VALUES
(1, '1Âª'),
(2, '2Âª'),
(3, '3Âª'),
(4, '4Âª'),
(5, '5Âª'),
(6, '6Âª'),
(7, '7Âª'),
(8, '8Âª'),
(9, '9Âª'),
(10, '10Âª'),
(11, '11Âª'),
(12, '12Âª'),
(13, '13Âª');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `contacto` varchar(9) NOT NULL,
  `outro` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `contacto`, `outro`) VALUES
(1, '946541448', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `curso`) VALUES
(1, 'Ã‘/tem'),
(2, 'CiÃªncias EconÃ³micas & JurÃ­dicas'),
(3, 'CiÃªncias FÃ­sicas & BiolÃ³gicas'),
(4, 'InformÃ¡tica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encarregado`
--

CREATE TABLE IF NOT EXISTS `encarregado` (
  `id_encarregado` int(11) NOT NULL AUTO_INCREMENT,
  `pai` varchar(50) NOT NULL,
  `mae` varchar(50) NOT NULL,
  `encarregado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_encarregado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `encarregado`
--

INSERT INTO `encarregado` (`id_encarregado`, `pai`, `mae`, `encarregado`) VALUES
(1, 'Ramos Manuel', 'Suzana Mendes', 'Ramos Manuel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id_foto`, `foto`) VALUES
(1, '7307514e6af94bff3e1565a50551fe9c.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `bi` varchar(50) NOT NULL,
  `fk_provincia` int(11) NOT NULL,
  `fk_sexo` int(11) NOT NULL,
  `fk_encarregado` int(11) NOT NULL,
  `fk_contacto` int(11) NOT NULL,
  `fk_morada` int(11) NOT NULL,
  `fk_classe` int(11) NOT NULL,
  `fk_curso` int(11) NOT NULL,
  `fk_turno` int(11) NOT NULL,
  `fk_repitent` int(11) NOT NULL,
  `fk_foto` int(11) NOT NULL,
  `fk_cert` int(11) NOT NULL,
  `criado` date DEFAULT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `fk_provincia` (`fk_provincia`),
  KEY `fk_sexo` (`fk_sexo`),
  KEY `fk_encarregado` (`fk_encarregado`),
  KEY `fk_contacto` (`fk_contacto`),
  KEY `fk_morada` (`fk_morada`),
  KEY `fk_classe` (`fk_classe`),
  KEY `fk_curso` (`fk_curso`),
  KEY `fk_turno` (`fk_turno`),
  KEY `fk_repitent` (`fk_repitent`),
  KEY `fk_foto` (`fk_foto`),
  KEY `fk_cert` (`fk_cert`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `nome`, `data`, `bi`, `fk_provincia`, `fk_sexo`, `fk_encarregado`, `fk_contacto`, `fk_morada`, `fk_classe`, `fk_curso`, `fk_turno`, `fk_repitent`, `fk_foto`, `fk_cert`, `criado`) VALUES
(1, 'JoÃ£o Mavinga Ramos', '2001-05-04', '00627579LA048', 1, 1, 1, 1, 1, 13, 4, 2, 1, 1, 1, '2021-05-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `morada`
--

CREATE TABLE IF NOT EXISTS `morada` (
  `id_morada` int(11) NOT NULL AUTO_INCREMENT,
  `morada` varchar(45) NOT NULL,
  PRIMARY KEY (`id_morada`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `morada`
--

INSERT INTO `morada` (`id_morada`, `morada`) VALUES
(1, '11 de Novembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `provincia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `provincia`) VALUES
(1, 'Luanda'),
(2, 'Cabinda'),
(3, 'Benguela'),
(4, 'Huambo'),
(5, 'Kwanza-Sul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `repitent`
--

CREATE TABLE IF NOT EXISTS `repitent` (
  `id_repitent` int(11) NOT NULL AUTO_INCREMENT,
  `repitent` varchar(20) NOT NULL,
  PRIMARY KEY (`id_repitent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `repitent`
--

INSERT INTO `repitent` (`id_repitent`, `repitent`) VALUES
(1, 'Primeira vez'),
(2, 'Repitente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sexo`
--

CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `sexo` varchar(10) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `turno` varchar(50) NOT NULL,
  PRIMARY KEY (`id_turno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id_turno`, `turno`) VALUES
(1, 'ManhÃ£'),
(2, 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `fk_sexo` int(11) NOT NULL,
  `nivel` enum('1','2') NOT NULL,
  `senha` varchar(32) NOT NULL,
  `senha_recuperacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_sexo` (`fk_sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `usuario`, `fk_sexo`, `nivel`, `senha`, `senha_recuperacao`) VALUES
(1, 'Conta Convidado', 'Convidado', 1, '1', 'a8d371749a821b0ca952ba236f45d5da', 'recouver'),
(2, 'JoÃ£o MaviNga Ramos', 'MaviNga ', 1, '1', '7215ee9c7d9dc229d2921a40e899ec5f', 'Makaba'),
(3, 'SecretÃ¡ria', 'Isabel', 2, '2', '23b58def11b45727d3351702515f86af', 'Isa');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`fk_provincia`) REFERENCES `provincia` (`id_provincia`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`fk_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`fk_encarregado`) REFERENCES `encarregado` (`id_encarregado`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`fk_contacto`) REFERENCES `contacto` (`id_contacto`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_5` FOREIGN KEY (`fk_morada`) REFERENCES `morada` (`id_morada`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_6` FOREIGN KEY (`fk_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `matricula_ibfk_7` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `matricula_ibfk_8` FOREIGN KEY (`fk_turno`) REFERENCES `turno` (`id_turno`),
  ADD CONSTRAINT `matricula_ibfk_9` FOREIGN KEY (`fk_repitent`) REFERENCES `repitent` (`id_repitent`),
  ADD CONSTRAINT `matricula_ibfk_10` FOREIGN KEY (`fk_foto`) REFERENCES `fotos` (`id_foto`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_11` FOREIGN KEY (`fk_cert`) REFERENCES `cert` (`id_cert`) ON DELETE CASCADE;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_sexo`) REFERENCES `sexo` (`id_sexo`);
