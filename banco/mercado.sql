-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 30-Nov-2021 às 05:13
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mercado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `TBPRODUCTS`
--

CREATE TABLE `TBPRODUCTS` (
  `ID` int(11) NOT NULL,
  `COD` varchar(50) DEFAULT NULL,
  `PRODUCT_NAME` varchar(100) NOT NULL,
  `PRODUCT_TYPE` tinyint(4) NOT NULL,
  `PRODUCT_VALUE` decimal(7,3) DEFAULT NULL,
  `PRODUCT_INVENTORY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TBUSERS`
--

CREATE TABLE `TBUSERS` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SECRET` varchar(100) NOT NULL,
  `JOB_ID` int(11) NOT NULL,
  `ENABLED` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `TBUSERS`
--

INSERT INTO `TBUSERS` (`ID`, `NAME`, `EMAIL`, `SECRET`, `JOB_ID`, `ENABLED`) VALUES
(1, 'admin', 'admin@meumercado.com.br', 'a76b7f25b6ba5ec51bd9fa42f4143b63c2495996e783baa4d9f8459d314f6ad2', 0, 1),
(2, 'Vendedor', 'vendedor@meumercado.com.br', 'a76b7f25b6ba5ec51bd9fa42f4143b63c2495996e783baa4d9f8459d314f6ad2', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `TBPRODUCTS`
--
ALTER TABLE `TBPRODUCTS`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `COD` (`COD`);

--
-- Índices para tabela `TBUSERS`
--
ALTER TABLE `TBUSERS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `TBPRODUCTS`
--
ALTER TABLE `TBPRODUCTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `TBUSERS`
--
ALTER TABLE `TBUSERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
