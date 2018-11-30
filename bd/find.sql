-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2018 às 23:59
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

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
-- Estrutura da tabela `pro`
--

CREATE TABLE `pro` (
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
  `uf` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pro`
--

INSERT INTO `pro` (`id`, `level`, `name`, `last_name`, `email`, `senha`, `tel`, `profissao`, `cpf`, `cep`, `rua`, `bairro`, `cidade`, `uf`) VALUES
(2, 2, 'Airton', 'Rieper', 'airtonrieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '2147483647', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC'),
(6, 2, 'Ivonete', 'Rieper', 'ivoneterieper@gmail.com', 'teste', '(47) 99688-5321', 'Marceneiro', '09388815904', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC'),
(8, 2, 'Gustavo', 'Rieper', 'gustavorieper@gmail.com', 'teste', '(47) 99682-7273', 'Eletricista', '09388815904', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC'),
(9, 2, 'Jean', 'Schultz', 'jean.schultz@ielusc.br', 'teste123', '(47) 99199-9999', 'Eletricista', '02898329932', 89227315, 'Rua Xaxim', 'Iririú', 'Joinville', 'SC'),
(10, 2, 'Paula', 'Picolli', 'paulapicolli@gmail.com', 'teste', '(47) 98887-7777', 'Marceneiro', '09388815903', 89210128, 'Rua Inácio de Oliveira', 'Itaum', 'Joinville', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissoes`
--

CREATE TABLE `profissoes` (
  `cd_profissao` int(11) NOT NULL COMMENT 'Código da Profissão',
  `nm_profissao` varchar(20) NOT NULL COMMENT 'Nome da Profissão',
  `ds_profissao` varchar(50) NOT NULL COMMENT 'Descrição da Profissoão'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profissoes`
--

INSERT INTO `profissoes` (`cd_profissao`, `nm_profissao`, `ds_profissao`) VALUES
(1, 'Eletricista', 'Eletricista residencial'),
(2, 'Marceneiro', 'Marceneiro');

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
(2, 3, 'Jose', 'Pereira', 'josepereira@find.com', 'teste', '(47) 99682-7273'),
(3, 3, 'Jean', 'Rafael', 'jeanraf@gmail.com', 'teste1234', '(99) 99999-9999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro`
--
ALTER TABLE `pro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `profissoes`
--
ALTER TABLE `profissoes`
  ADD PRIMARY KEY (`cd_profissao`);

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
-- AUTO_INCREMENT for table `pro`
--
ALTER TABLE `pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profissoes`
--
ALTER TABLE `profissoes`
  MODIFY `cd_profissao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código da Profissão', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
