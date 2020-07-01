-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Fev-2020 às 20:14
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `id_nome`
--

CREATE TABLE `id_nome` (
  `idNomeMes` int(11) NOT NULL,
  `nomeMes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `id_nome`
--

INSERT INTO `id_nome` (`idNomeMes`, `nomeMes`) VALUES
(1, 'Janeiro'),
(2, 'Fevereiro'),
(3, 'Março'),
(4, 'Abril'),
(5, 'Maio'),
(6, 'Junho'),
(7, 'Julho'),
(8, 'Agosto'),
(9, 'Setembro'),
(10, 'Outubro'),
(11, 'Novembro'),
(12, 'Dezembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `idMes` int(11) NOT NULL,
  `nomeNf` varchar(220) NOT NULL,
  `valorNf` float(23,2) NOT NULL,
  `idPagador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensalidade`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `mes`
--

CREATE TABLE `mes` (
  `idMes` int(11) NOT NULL,
  `idNomeMes` int(11) NOT NULL,
  `idPagador` int(11) NOT NULL,
  `ano` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idPagador` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `id_nome`
  ADD PRIMARY KEY (`idNomeMes`);

--
-- Índices para tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD KEY `idMes` (`idMes`),
  ADD KEY `idPagador` (`idPagador`);

--
-- Índices para tabela `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`idMes`),
  ADD KEY `idPagador` (`idPagador`),
  ADD KEY `idMes` (`idNomeMes`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idPagador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mes`
--
ALTER TABLE `mes`
  MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idPagador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `mensalidade_ibfk_1` FOREIGN KEY (`idMes`) REFERENCES `mes` (`idMes`),
  ADD CONSTRAINT `mensalidade_ibfk_2` FOREIGN KEY (`idPagador`) REFERENCES `usuarios` (`idPagador`);

--
-- Limitadores para a tabela `mes`
--
ALTER TABLE `mes`
  ADD CONSTRAINT `mes_ibfk_1` FOREIGN KEY (`idPagador`) REFERENCES `usuarios` (`idPagador`),
  ADD CONSTRAINT `mes_ibfk_2` FOREIGN KEY (`idNomeMes`) REFERENCES `id_nome` (`idNomeMes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
