-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Jul-2017 às 10:37
-- Versão do servidor: 5.5.28
-- versão do PHP: 5.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `musiclibrary`
--
CREATE DATABASE IF NOT EXISTS `musiclibrary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `musiclibrary`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `nome` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `artista` int(11) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_artista` (`artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`nome`, `ano`, `ID`, `artista`, `imagem`) VALUES
('In The Zone', 2003, 2, 2, 'itz.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`ID`, `nome`, `genero`, `descricao`, `imagem`) VALUES
(2, 'Britney Spears', 'Pop', 'Princesa do Pop', 'britney.jpg'),
(4, 'Madonna', 'Pop', 'Rainha do Pop', 'madonna.jpg'),
(5, 'Michael Jackson', 'Pop', 'Rei do Pop', 'michael.jpg'),
(7, 'Bruno Mars', 'Soul', 'Lazy Song', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `artistas`
--

CREATE TABLE IF NOT EXISTS `artistas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE IF NOT EXISTS `musica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `duracao` time NOT NULL,
  `compositor` varchar(100) NOT NULL,
  `album` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `album` (`album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`ID`, `numero`, `nome`, `duracao`, `compositor`, `album`) VALUES
(3, 1, 'Me Against The Music', '00:03:23', 'B.Brown', 2),
(4, 2, '2', '00:02:00', '2', 2),
(5, 3, '3', '00:03:00', '3', 2),
(8, 4, '4', '00:04:00', '4', 2),
(13, 5, '5', '00:00:05', '5', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` int(1) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `nome`, `email`, `senha`, `nivel`, `imagem`) VALUES
(3, 'Admin', 'Admin@admin.com', 'admin', 0, '2.jpg'),
(41, 'Ge', 'Ge@ge.com', '1234', 2, NULL),
(42, 'Fe', 'Fe@fe.com', '1234', 2, NULL),
(43, 'Joana', 'Joana@joana.com', '1234', 2, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_artista` FOREIGN KEY (`artista`) REFERENCES `artista` (`ID`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`album`) REFERENCES `album` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
