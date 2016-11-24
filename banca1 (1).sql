-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Nov-2016 às 22:21
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banca1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
`idAvaliacoa` bigint(20) unsigned NOT NULL,
  `descAvaliacao` varchar(300) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`idAvaliacoa`, `descAvaliacao`, `titulo`) VALUES
(1, 'Prova de servidores', 'AV1'),
(2, 'Prova de redes', 'AV2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
`idGrupo` bigint(20) unsigned NOT NULL,
  `idTurma` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `numeroIntegrantes` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `idTurma`, `nome`, `numeroIntegrantes`) VALUES
(1, 10, 'GPO_A', 2),
(2, 11, 'GPO_B', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivelacesso`
--

CREATE TABLE IF NOT EXISTS `nivelacesso` (
`idnivelAcesso` bigint(20) unsigned NOT NULL,
  `descNivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivelacesso`
--

INSERT INTO `nivelacesso` (`idnivelAcesso`, `descNivel`) VALUES
(1, 'Orientador'),
(2, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
`idNota` bigint(20) unsigned NOT NULL,
  `idAvaliacao` int(10) DEFAULT NULL,
  `idUsuario` int(10) DEFAULT NULL,
  `nota` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`idNota`, `idAvaliacao`, `idUsuario`, `nota`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 5),
(3, 1, 3, 3),
(4, 2, 3, 5),
(5, 1, 4, 7),
(6, 2, 4, 6),
(7, 1, 5, 3),
(8, 2, 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariogrupos`
--

CREATE TABLE IF NOT EXISTS `usuariogrupos` (
  `usuarios_idUsuario` int(11) DEFAULT NULL,
  `Grupos_idGrupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariogrupos`
--

INSERT INTO `usuariogrupos` (`usuarios_idUsuario`, `Grupos_idGrupo`) VALUES
(1, 1),
(4, 1),
(3, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`idUsuario` bigint(20) unsigned NOT NULL,
  `nivelAcesso_idnivelAcesso` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `imagem` mediumblob,
  `imagemTipo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nivelAcesso_idnivelAcesso`, `nome`, `email`, `senha`, `imagem`, `imagemTipo`) VALUES
(1, 2, 'Lucas', 'Lucas@gmail.com', '123', NULL, NULL),
(2, 1, 'Tiago', 'tiago@gmail.com', '123', NULL, NULL),
(3, 0, 'Matheus', 'matheus@gmail.com', '123', NULL, NULL),
(4, 0, 'Paula', 'paula@gmail.com', '123', NULL, NULL),
(5, 2, 'Vitor', 'vitor@gmail.com', '123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
 ADD PRIMARY KEY (`idAvaliacoa`), ADD UNIQUE KEY `idAvaliacoa` (`idAvaliacoa`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
 ADD PRIMARY KEY (`idGrupo`), ADD UNIQUE KEY `idGrupo` (`idGrupo`);

--
-- Indexes for table `nivelacesso`
--
ALTER TABLE `nivelacesso`
 ADD PRIMARY KEY (`idnivelAcesso`), ADD UNIQUE KEY `idnivelAcesso` (`idnivelAcesso`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
 ADD PRIMARY KEY (`idNota`), ADD UNIQUE KEY `idNota` (`idNota`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idUsuario`), ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
MODIFY `idAvaliacoa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
MODIFY `idGrupo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nivelacesso`
--
ALTER TABLE `nivelacesso`
MODIFY `idnivelAcesso` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
MODIFY `idNota` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `idUsuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
