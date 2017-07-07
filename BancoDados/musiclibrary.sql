-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 07-Jul-2017 às 15:07
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
  `nome` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `artista` int(11) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_artista` (`artista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`nome`, `ano`, `ID`, `artista`, `imagem`) VALUES
('...Baby One More Time', 1999, 1, 1, 'bomt.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`ID`, `nome`, `genero`, `descricao`, `imagem`) VALUES
(1, 'Britney Spears', 'Pop', 'Princesa do Pop', 'britney.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE IF NOT EXISTS `musica` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `duracao` time NOT NULL,
  `compositor` varchar(40) NOT NULL,
  `album` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `album` (`album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`ID`, `numero`, `nome`, `duracao`, `compositor`, `album`) VALUES
(1, 1, '...Baby One More Time', '00:03:23', 'B.Brown', 1),
(2, 2, 'You Drive Me Crazy', '00:03:57', 'M. Martin', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` int(1) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `nome`, `email`, `senha`, `nivel`, `imagem`) VALUES
(1, 'Paulo', 'Teste@gmail.com', '1234', 1, '1.jpg'),
(2, 'Pedro', 'Teste2@email.com.br', '1234', 2, '2.jpg'),
(3, 'Admin', 'Admin@admin.com', 'admin', 1, '2.jpg'),
(4, 'Matheus Silva', 'Matheus@matheus.com', '1234', 2, '17523387_10209035406550117_1566441275897893686_n.jpg'),
(5, 'Luis', 'Luis@email.com.br', '1234', 1, 'ATgAAAAcIWAGHj1cldUwhO9Qvma-CntxhBZaM98v8-W9nLlMu71JBfOmbWe7V7Fq53J09WHaTwuvgbj0JmaMn1sotjkhAJtU9.jpg'),
(6, 'Luis V', 'Luis@l.v', '....', 1, '17523387_10209035406550117_1566441275897893686_n.jpg'),
(8, 'Fernando', 'Fernando@fernando.com', '1234', 1, '2.jpg'),
(9, 'Henrique', 'Henrique@bol.com', '1234', 1, '2.jpg'),
(10, 'Luis', 'Noite@bol.com', '1234', 1, '2.jpg'),
(11, 'Testando100', '10@teste.com', '1234', 1, NULL),
(12, 'Testando50', '50@email.com', '1234', 1, '2.jpg'),
(13, 'Iann', 'Iann@email.com', '1234', 2, 'avatar_1202489_1491929057.png');

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
