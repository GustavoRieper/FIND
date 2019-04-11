-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Abr-2019 às 18:02
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
(2, 'Marceneiro', 'Marceneiro');

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
  `cep` int(8) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `lat` varchar(20) NOT NULL COMMENT 'latitude',
  `long` varchar(20) NOT NULL COMMENT 'longitude'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professional`
--

INSERT INTO `professional` (`id`, `level`, `name`, `last_name`, `email`, `senha`, `tel`, `profissao`, `cpf`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `lat`, `long`) VALUES
(2, 2, 'Airton', 'Rieper', 'airtonrieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '2147483647', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC', '-26.331701', '-48.834186'),
(6, 2, 'Ivonete', 'Rieper', 'ivoneterieper@gmail.com', 'teste', '(47) 99688-5321', 'Marceneiro', '09388815904', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC', '-26.278354', '-48.835632'),
(8, 2, 'Gustavo', 'Rieper', 'gustavorieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '09388815904', 89210128, 'Rua', 'Itaum', 'Joinville', 'SC', '-26.288359', '-48.848631'),
(9, 2, 'Jean', 'Schultz', 'jean.schultz@ielusc.br', 'teste123', '(47) 99199-9999', 'Eletricista', '02898329932', 89227315, 'Rua Xaxim', 'Iririú', 'Joinville', 'SC', '-26.267841', '-48.825433'),
(10, 2, 'Paula', 'Picolli', 'paulapicolli@gmail.com', 'teste', '(47) 98887-7777', 'Marceneiro', '09388815903', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC', '-26.292101', '-48.850079'),
(11, 2, 'Zelindo Silvio', 'Petri', 'zelindo@gmail.com', 'teste', '(47) 99682-7273', 'Marceneiro', '09388815904', 89210128, 'Rua', 'Itaum', 'Joinville', 'SC', '-26.289597', '-48.856392');

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
(4, 3, 'Usuário', 'Find', 'user@find.com.br', 'teste', '(47) 99682-7272'),
(5, 3, 'Maicol', 'Almeida', 'maicol@gmail.com', 'teste', '(47) 99682-7273');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
