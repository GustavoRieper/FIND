-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2019 às 02:57
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `find`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `senha`) VALUES
(1, 'Gustavo', 'admin@find.com', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendar`
--

CREATE TABLE `calendar` (
  `id_calendar` int(11) NOT NULL,
  `date_start` time(4) NOT NULL,
  `date_end` time(4) NOT NULL,
  `week` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contract`
--

CREATE TABLE `contract` (
  `id_user` int(11) NOT NULL,
  `id_professional` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `profession`
--

CREATE TABLE `profession` (
  `cd_profissao` int(11) NOT NULL COMMENT 'Código da Profissão',
  `nm_profissao` varchar(20) NOT NULL COMMENT 'Nome da Profissão',
  `ds_profissao` varchar(50) NOT NULL COMMENT 'Descrição da Profissoão'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profession`
--

INSERT INTO `profession` (`cd_profissao`, `nm_profissao`, `ds_profissao`) VALUES
(1, 'Eletricista', 'Eletricista residencial'),
(2, 'Marceneiro', 'Marceneiro'),
(0, 'Pintor', 'Printor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professional`
--

CREATE TABLE `professional` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL COMMENT 'Nível de acesso',
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `profissao` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `lat` varchar(20) NOT NULL COMMENT 'latitude',
  `long` varchar(50) NOT NULL COMMENT 'longitude',
  `endereco` varchar(100) NOT NULL,
  `num_endereco` varchar(50) NOT NULL,
  `nota` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professional`
--

INSERT INTO `professional` (`id`, `level`, `name`, `last_name`, `email`, `senha`, `tel`, `profissao`, `cpf`, `lat`, `long`, `endereco`, `num_endereco`, `nota`) VALUES
(2, 2, 'Airton', 'Rieper', 'airtonrieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '2147483647', '-26.331701', '-48.834186', '', '0', '1.0'),
(6, 2, 'Ivonete', 'Rieper', 'ivoneterieper@gmail.com', 'teste', '(47) 99688-5321', 'Marceneiro', '09388815904', '-26.278354', '-48.835632', '', '0', '2.0'),
(8, 2, 'Gustavo', 'Rieper', 'gustavorieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '09388815904', '-26.288359', '-48.848631', 'Rua Inácio de Oliveira, 350 - Itaum, Joinville - SC, 89210-128, Brasil', '0', '2.0'),
(9, 2, 'Jean', 'Schultz', 'jean.schultz@ielusc.br', 'teste123', '(47) 99199-9999', 'Eletricista', '02898329932', '-26.267841', '-48.825433', '', '0', '1.5'),
(10, 2, 'Paula', 'Picolli', 'paulapicolli@gmail.com', 'teste', '(47) 98887-7777', 'Marceneiro', '09388815903', '-26.292101', '-48.850079', '', '0', '3.0'),
(11, 2, 'Zelindo Silvio', 'Petri', 'zelindo@gmail.com', 'teste', '(47) 99682-7273', 'Marceneiro', '09388815904', '-26.289597', '-48.856392', '', '0', '2.5'),
(13, 2, 'Ronaldo', 'Fenomeno', 'dentu?o@gmail.com', 'teste', '47996827273', 'Eletricista', '09388815904', '-26.3308062', '-48.833311', 'Rua Inácio de Oliveira, 350 - Itaum, Joinville - SC, 89210-128, Brasil', '350', '2.0'),
(14, 2, 'Michelangelo', 'Simoni', 'micamica@gmail.com', 'teste', '(47) 99672-7273', 'Pintor', '09388815904', '-26.318984', '-48.844330000000014', 'R. Cel. Francisco Gomes, 12 - Anita Garibaldi, Joinville - SC, 89202-073, Brasil', '12', '1.5'),
(15, 2, 'Leonardo', 'da Vinci', 'leo@gmail.com', 'teste', '(47) 99672-7273', 'Pintor', '09388815904', '-26.3050509', '-48.85932249999996', 'R. Aquidaban, 222 - Glória, Joinville - SC, 89216-295, Brasil', '222', '3.3'),
(16, 2, 'Roger', 'Carvalho', 'rogercarvalho@gmail.com', 'teste', '(47) 98839-4193', 'Pintor', '09388815904', '-26.2150743', '-48.905276000000015', 'R. Joinville, 13721 - Centro (Pirabeiraba), Joinville - SC, Brasil', '13721', '4.2'),
(17, 2, 'Thiago', 'Avila', 'thiagoavilafolks@gmail.com', '1234', '(47) 7070-7070', 'Marceneiro', '09388815904', '-26.264409', '-48.85447799999997', 'R. Iguaçu, 533 - Santo Antônio, Joinville - SC, 89218-180, Brasil', '533', '5'),
(21, 2, 'Cristov?o', 'Colombo', 'cris@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '09388815904', '-26.3361934', '-48.84373740000001', 'R. Floresta - Floresta, Joinville - SC, 89211-690, Brasil', '10', '2.7'),
(22, 2, 'Maicol', 'Peterson', 'Maicol@gmail.com', 'teste', '(47) 99682-7273', 'Pintor', '09388815904', '-26.324387', '-48.84394550000002', 'R. Monsenhor Gercino, 60 - Paranaguamirim, Joinville - SC, 89210-000, Brasil', '60', '1.0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `level`, `name`, `last_name`, `email`, `senha`, `tel`) VALUES
(2, 3, 'José', 'Pereira', 'josepereira@find.com', 'teste', '(47) 99682-7273'),
(3, 3, 'Jean', 'Rafael', 'jeanraf@gmail.com', 'teste1234', '(99) 99999-9999'),
(4, 3, '', '', 'user@find.com.br', 'teste', ''),
(5, 3, 'Maicol', 'Almeida', 'maicol@gmail.com', 'teste', '(47) 99682-7273'),
(6, 3, 'Ronaldinho', 'Gaucho', 'cheirador@gmail.com', 'teste', '(47) 99682-7273'),
(7, 3, 'adriana', 'silva', 'adriana@gmail.com', '12345', '(99) 999-9999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_calendar`),
  ADD UNIQUE KEY `id_pro_FK` (`id_calendar`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id_user`,`id_professional`);

--
-- Indexes for table `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `ID_pro_FK` (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id_calendar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professional`
--
ALTER TABLE `professional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
