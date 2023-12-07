-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2023 às 21:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho-final`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `idConta` int(11) NOT NULL,
  `saldo` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conta`
--

INSERT INTO `conta` (`idConta`, `saldo`) VALUES
(1, 1100.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `extrato`
--

CREATE TABLE `extrato` (
  `tipoTransacao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `extrato`
--

INSERT INTO `extrato` (`tipoTransacao`, `valor`) VALUES
('Pix', 50.00),
('Depósito', 10.00),
('Saque', 15.00),
('Saque', 500.00),
('Depósito', 100.00),
('Saque', 30.00),
('Depósito', 1200.00),
('Pix', 15.00),
('Pix', 0.00),
('Pix', 0.00),
('Pix', 0.00),
('Pix', 0.00),
('Pix', 1300.00),
('Depósito', 1200.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pix`
--

CREATE TABLE `pix` (
  `pixId` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `chave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pix`
--

INSERT INTO `pix` (`pixId`, `nome`, `chave`) VALUES
(12, 'jkodjopwadwa', '9123498129'),
(14, 'joaoaoao', '9817234981');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`);

--
-- Índices de tabela `pix`
--
ALTER TABLE `pix`
  ADD PRIMARY KEY (`pixId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pix`
--
ALTER TABLE `pix`
  MODIFY `pixId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
