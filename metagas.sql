-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2025 at 07:27 PM
-- Server version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metagas`
--

-- --------------------------------------------------------

--
-- Table structure for table `abastecimentos_carretas`
--

CREATE TABLE `abastecimentos_carretas` (
  `id` int(11) NOT NULL,
  `controle` int(11) NOT NULL,
  `nf` varchar(32) NOT NULL,
  `certificado` varchar(32) DEFAULT '',
  `saida` date NOT NULL,
  `placa` varchar(32) NOT NULL DEFAULT '',
  `p_inicial` varchar(16) DEFAULT '',
  `p_final` varchar(16) DEFAULT '',
  `carregamento` varchar(16) DEFAULT '',
  `o2` varchar(16) DEFAULT '',
  `n2` varchar(16) DEFAULT '',
  `ch4` varchar(16) DEFAULT '',
  `co2` varchar(16) DEFAULT '',
  `soma` varchar(16) DEFAULT '',
  `densidade` varchar(16) DEFAULT '',
  `ponto` varchar(16) DEFAULT '',
  `wobbe` varchar(16) DEFAULT '',
  `pcs` varchar(16) DEFAULT '',
  `ch4_media` varchar(16) DEFAULT '',
  `co2_media` varchar(16) DEFAULT '',
  `o2_media` varchar(16) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `abastecimentos_carretas`
--

INSERT INTO `abastecimentos_carretas` (`id`, `controle`, `nf`, `certificado`, `saida`, `placa`, `p_inicial`, `p_final`, `carregamento`, `o2`, `n2`, `ch4`, `co2`, `soma`, `densidade`, `ponto`, `wobbe`, `pcs`, `ch4_media`, `co2_media`, `o2_media`) VALUES
(1, 314, '12228', 'CQ092025-314', '2025-10-13', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45');

-- --------------------------------------------------------

--
-- Table structure for table `abastecimentos_gnv`
--

CREATE TABLE `abastecimentos_gnv` (
  `id` int(11) NOT NULL,
  `saida` datetime NOT NULL,
  `cliente` varchar(32) NOT NULL DEFAULT '',
  `motorista` varchar(32) DEFAULT '',
  `rg` varchar(16) DEFAULT '',
  `placa` varchar(32) NOT NULL DEFAULT '',
  `p_inicial` varchar(16) DEFAULT '',
  `p_final` varchar(16) DEFAULT '',
  `volume` varchar(16) DEFAULT '',
  `valor` varchar(16) DEFAULT '',
  `pureza` varchar(16) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `abastecimentos_gnv`
--

INSERT INTO `abastecimentos_gnv` (`id`, `saida`, `cliente`, `motorista`, `rg`, `placa`, `p_inicial`, `p_final`, `volume`, `valor`, `pureza`) VALUES
(1, '2025-10-13 00:00:00', 'Contatto', 'Rafael', '9999999999', 'LMZ-7E95', '20', '250', '146.4', '585.60', '94.67');

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `user_id`, `nome`) VALUES
(1, 1, 'Rafael Castro Couto');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'administrador'),
(2, 'supervisor'),
(3, 'operador');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cnpj` varchar(32) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` varchar(512) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cnpj`, `endereco`, `celular`, `observacoes`) VALUES
(1, 'Rafael Operador', '', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '2199999999', 'Operador');

-- --------------------------------------------------------

--
-- Table structure for table `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `instituicao` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `instituicao`, `descricao`) VALUES
(1, 'Metagas', 'Ferramenta de controle de produção Cakephp CMS');

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `dia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`id`, `dia`) VALUES
(1, 'segunda-feira'),
(2, 'terça-feira'),
(3, 'quarta-feira'),
(4, 'quinta-feira'),
(5, 'sexta-feira');

-- --------------------------------------------------------

--
-- Table structure for table `instituicoes`
--

CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cnpj` char(32) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `url` varchar(128) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `cep` char(11) DEFAULT '',
  `telefone` varchar(16) DEFAULT '',
  `observacoes` varchar(256) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `nome`, `cnpj`, `email`, `url`, `endereco`, `cep`, `telefone`, `observacoes`) VALUES
(1, 'Metagas Central 1', 'XXXX', 'meta@gas.com', NULL, 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '999999999', '999999999999', '');

-- --------------------------------------------------------

--
-- Table structure for table `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cpf` varchar(16) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` varchar(512) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `operadores`
--

INSERT INTO `operadores` (`id`, `user_id`, `nome`, `cpf`, `endereco`, `celular`, `observacoes`) VALUES
(1, 1, 'Rafael Operador', '99999999999', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '2199999999', 'Operador');

-- --------------------------------------------------------

--
-- Table structure for table `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `ch4_media_biogas` varchar(16) DEFAULT '',
  `co2_media_biogas` varchar(16) DEFAULT '',
  `o2_media_biogas` varchar(16) DEFAULT '',
  `ch4_media_metano` varchar(16) DEFAULT '',
  `co2_media_metano` varchar(16) DEFAULT '',
  `o2_media_metano` varchar(16) DEFAULT '',
  `n2_media_metano` varchar(16) DEFAULT '',
  `volume_biogas_dia` varchar(16) DEFAULT '',
  `consumo_clientes` varchar(512) DEFAULT '',
  `dispenser` varchar(16) DEFAULT '',
  `energia` varchar(16) DEFAULT '',
  `densidade` varchar(16) DEFAULT '',
  `status` varchar(4) DEFAULT '',
  `observacoes` varchar(512) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `relatorios`
--

INSERT INTO `relatorios` (`id`, `supervisor_id`, `instituicao_id`, `ch4_media_biogas`, `co2_media_biogas`, `o2_media_biogas`, `ch4_media_metano`, `co2_media_metano`, `o2_media_metano`, `n2_media_metano`, `volume_biogas_dia`, `consumo_clientes`, `dispenser`, `energia`, `densidade`, `status`, `observacoes`) VALUES
(1, 1, 1, '56.42', '45.51', '0.35', '93.41', '2.23', '0.59', '3.77', '36188', '', '549.07', '15386', '0.7', 'PO', 'HORAS DE PRODUÇÃO: 14:00 / DEVIDO A QUEDA DE ENERGIA ENEL (05:30 - 14:00), E APÓS RETORNO ENEL FALHA NO CUBÍCULO THOPPEN (14:00 - 15:30) / CROMATOGRAFIA: TBB-0E87 (93,139%), TAQ-5D93 (92,949%)');

-- --------------------------------------------------------

--
-- Table structure for table `supervisores`
--

CREATE TABLE `supervisores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cpf` varchar(16) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` varchar(512) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `supervisores`
--

INSERT INTO `supervisores` (`id`, `user_id`, `nome`, `cpf`, `endereco`, `celular`, `observacoes`) VALUES
(1, 1, 'Rafael', '99999999999', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '2199999999', 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`) VALUES
(1, 'rafaelcastrocouto@gmail.com', '', '2025-10-13 20:12:02', '2025-10-13 20:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecimentos_carretas`
--
ALTER TABLE `abastecimentos_carretas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abastecimentos_gnv`
--
ALTER TABLE `abastecimentos_gnv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecimentos_carretas`
--
ALTER TABLE `abastecimentos_carretas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abastecimentos_gnv`
--
ALTER TABLE `abastecimentos_gnv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
