-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2022 at 08:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `casaecozinha`
--

CREATE TABLE `casaecozinha` (
  `id` int(11) NOT NULL,
  `url_foto` varchar(300) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casaecozinha`
--

INSERT INTO `casaecozinha` (`id`, `url_foto`, `nome`, `valor`, `descricao`) VALUES
(1, 'https://dc780.4shared.com/img/yJ3YtQ3Ziq/s24/17c281f7a20/IMG_585125_3JPG-1200x1200?async&rand=0.9314320379716508', 'Sanduicheira Free Home FR-1604 - 750W - 127V - Preto', 95, 'Marca Free Home\r\nModelo FR-1604\r\nCor Preto\r\nPotência 750W\r\nCaracterísticas Revestimento antiaderente - Alça com trava - Luzes indicadores de temperatura e funcionamento\r\nVoltagem 127V - 50Hz');

-- --------------------------------------------------------

--
-- Table structure for table `eletronicos`
--

CREATE TABLE `eletronicos` (
  `id` int(11) NOT NULL,
  `url_foto` varchar(300) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eletronicos`
--

INSERT INTO `eletronicos` (`id`, `url_foto`, `nome`, `valor`, `descricao`) VALUES
(1, 'https://dc737.4shared.com/img/o6q427_miq/s24/17c182abad0/94d9874fff7902c6bea317e0ca45bc?async&rand=0.9609561202074799', 'Speaker Ecopower EP-2320 - USB/SD/AUX - Bluetooth - 5W - Camuflado', 180, 'Marca Ecopower\nModelo EP-2320\nCor Camuflado\nPotência 2x 5W \nResposta de Frequência 150Hz-15KHz\nBluetooth  v5.0\nBateria3000mAh\nDuração da carga 4 - 6 horas\nTempo de recarga 5 - 6 horas\nDimensões21.8 x 9.2 x 9.8 cm\nPeso 775 gr'),
(2, 'https://dc737.4shared.com/img/oLvI2x6mea/s24/17c18312370/cxpreta?async=&rand=0.5774844037822406', 'Speaker Ecopower EP-2320 - USB/SD/AUX - Bluetooth - 5W - PRETA', 180, 'Marca Ecopower\nModelo EP-2320\nCor Preta\nPotência 2x 5W \nResposta de Frequência 150Hz-15KHz\nBluetooth  v5.0\nBateria3000mAh\nDuração da carga 4 - 6 horas\nTempo de recarga 5 - 6 horas\nDimensões21.8 x 9.2 x 9.8 cm\nPeso 775 gr'),
(5, 'https://dc737.4shared.com/img/6fllnGKsiq/s24/17c18340d88/cxcinza?async&rand=0.19597405877307317', 'Speaker Ecopower EP-2320 - USB/SD/AUX - Bluetooth - 5W - Cinza', 180, 'Marca Ecopower\nModelo EP-2320\nCor Cinza\nPotência 2x 5W \nResposta de Frequência 150Hz-15KHz\nBluetooth  v5.0\nBateria3000mAh\nDuração da carga 4 - 6 horas\nTempo de recarga 5 - 6 horas\nDimensões21.8 x 9.2 x 9.8 cm\nPeso 775 gr');

-- --------------------------------------------------------

--
-- Table structure for table `informatica`
--

CREATE TABLE `informatica` (
  `id` int(11) NOT NULL,
  `url_foto` varchar(300) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informatica`
--

INSERT INTO `informatica` (`id`, `url_foto`, `nome`, `valor`, `descricao`) VALUES
(1, 'https://dc737.4shared.com/img/6GueYZYlea/s24/17c1843a9a0/tecladohp?async&rand=0.5191281287909029', 'Teclado Gamer HP K130 - Com Fio - Inglês - Preto', 115, 'Marca HP\nModelo K130\nCor Preto\nQuantidade de teclas 104\nConexão USB\nComprimento do cabo 1.8 metros\nIdioma Inglês\nDimensões 46.3 x 19.2 x 3.1 cm\nPeso 815 gr'),
(2, 'https://dc737.4shared.com/img/pOokddeaiq/s24/17c18ab9718/tecladoemouse?async&rand=0.1571415991408287', 'Kit Mouse e Teclado Ecopower EP-K605 - Membrana - Espanhol - Preto', 90, 'Marca Ecopower\r\nModelo EP-K605\r\nCor Preto \r\nQuantidade de botões no mouse 2\r\nConexão mouse Receptor Nano USB 2.4GHz\r\nIdioma do Teclado Espanhol \r\nQuantidade de teclas 115\r\nConexão teclado Receptor Nano USB 2.4GHz\r\nDimensões do teclado 44.1 x 15.2 x 2.3 cm\r\nDimensões do mouse 11 x 6 x 3 cm');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `whatssap` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `nivel_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `whatssap`, `email`, `senha`, `nivel_usuario`) VALUES
(1, 'Fernando ', '45991174316', 'fxoeletronicos@gmail.com', 'ca7ed6a1791bd39b6b52e48869319a20', 0),
(2, 'FERNANDO XAVIER DE OLIVEIRA', '(45) 99117-4316', 'suportewicell@gmail.com', 'nando1287', 0),
(3, 'FERNANDO XAVIER DE OLIVEIRA', '(45) 99117-4316', 'fernando_oliveira4@msn.com', '123456', 0),
(4, 'FERNANDO XAVIER DE OLIVEIRA', '(45) 99117-4316', 'wicellwicell@gmail.com', 'ca7ed6a1791bd39b6b52e48869319a20', 0),
(5, 'administrador', '(45) 99117-4316', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casaecozinha`
--
ALTER TABLE `casaecozinha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eletronicos`
--
ALTER TABLE `eletronicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informatica`
--
ALTER TABLE `informatica`
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
-- AUTO_INCREMENT for table `casaecozinha`
--
ALTER TABLE `casaecozinha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eletronicos`
--
ALTER TABLE `eletronicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `informatica`
--
ALTER TABLE `informatica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
