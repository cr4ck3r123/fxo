-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 06:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfxoeletronicos`
--

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `url_foto` varchar(300) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `valor` double NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `qtde` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `url_foto`, `nome`, `valor`, `descricao`, `qtde`, `categoria`) VALUES
(1, 'https://dc723.4shared.com/img/Ju7VrZQciq/s24/17c7a91f008/fone_de_ouvido?async&rand=0.34680946473003904', 'Y50 TWS Fone De Ouvido Bluetooth 5.0 Com Controle Touch Stereo Esportivo', 79.9, 'Descrição:\r\nVersão Bluetooth: 5.0\r\nMaterial do fone de ouvido: Plástico ABS\r\nPotência do fone de ouvido: 55 mAh\r\nCompartimento de carregamento: 450 mAh\r\nTempo de ouvir: cerca de 3 horas\r\nTamanho do produto: armazém de carregamento 7,5*4.3*2,8cm\r\nTamanho da embalagem 13.5*8.5*3,5cm\r\n\r\nEspecificações:\r\n1. Técnica de cancelamento de ruído ajuda contra alto e irritante ruído.\r\n2. O controlador foi projetado para controlar volume, selecione músicas e toma chamadas.\r\n3. Mesmo desgaste por muito tempo ', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `whatssap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `whatssap`, `email`, `senha`, `nivel_usuario`) VALUES
(1, 'Fernando Xavier de Oliveira', '45991174316', 'fernando@corp.kionux.com.br', '8f29314475d119a53dec3826d1f8af0e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
