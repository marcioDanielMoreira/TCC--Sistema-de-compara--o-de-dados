-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2016 às 03:37
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outroteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `idBanco` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`idBanco`, `nome`) VALUES
(5, 'MySql'),
(6, 'Oracle Database');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `idSaida` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `senha`) VALUES
(1, 'admin@admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'marcio@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'marcio_dm12@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vent`
--

CREATE TABLE `vent` (
  `idVent` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vref`
--

CREATE TABLE `vref` (
  `idVref` int(11) NOT NULL,
  `idBanco` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vref`
--

INSERT INTO `vref` (`idVref`, `idBanco`, `nome`, `valor`) VALUES
(12, 6, 'remote_os_authent', 'FALSE'),
(13, 6, '_TRACE_FILES_PUBLIC', 'FALSE'),
(14, 6, 'remote_os_roles', 'FALSE'),
(15, 6, 'utl_file_dir', 'preenchido'),
(16, 6, 'O7_DICTIONARY_ACCESSIBILITY', 'FALSE'),
(17, 6, 'audit_trail', 'OS'),
(18, 6, 'audit_file_dest', 'preenchido');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`idBanco`);

--
-- Indexes for table `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`idSaida`),
  ADD KEY `FK_Saida_idUsuario` (`idUsuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `vent`
--
ALTER TABLE `vent`
  ADD PRIMARY KEY (`idVent`),
  ADD KEY `FK_Vent_idUsuario` (`idUsuario`);

--
-- Indexes for table `vref`
--
ALTER TABLE `vref`
  ADD PRIMARY KEY (`idVref`),
  ADD KEY `FK_Vref_idBanco` (`idBanco`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banco`
--
ALTER TABLE `banco`
  MODIFY `idBanco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `saida`
--
ALTER TABLE `saida`
  MODIFY `idSaida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vent`
--
ALTER TABLE `vent`
  MODIFY `idVent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vref`
--
ALTER TABLE `vref`
  MODIFY `idVref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `saida`
--
ALTER TABLE `saida`
  ADD CONSTRAINT `FK_Saida_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vent`
--
ALTER TABLE `vent`
  ADD CONSTRAINT `FK_Vent_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vref`
--
ALTER TABLE `vref`
  ADD CONSTRAINT `FK_Vref_idBanco` FOREIGN KEY (`idBanco`) REFERENCES `banco` (`idBanco`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
