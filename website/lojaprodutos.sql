-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2023 às 18:14
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaprodutos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `email` varchar(200) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`email`, `nome`, `PASSWORD`, `tipo`) VALUES
('antonio@gmail.com', 'António', '123', 1),
('joao@gmail.com', 'João', '123', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `data_criacao` date NOT NULL DEFAULT current_timestamp(),
  `id_cliente` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `Id_transacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `data_criacao`, `id_cliente`, `estado`, `Id_transacao`) VALUES
(36, '2023-11-29', NULL, 0, 'PAYID-MVTVFEA51933637FG970081A'),
(37, '2023-11-29', 'manuel@gmail.com', 0, 'PAYID-MVTVMTA8EW928735K288494R'),
(38, '2023-11-29', 'manuel@gmail.com', 1, ''),
(39, '2023-11-29', 'manuel@gmail.com', 0, 'PAYID-MVTVPEQ11T4910088660013K'),
(40, '2023-11-29', 'manuel@gmail.com', 0, 'PAYID-MVTVQGA419469341L948691V'),
(41, '2023-11-29', 'manuel@gmail.com', 1, ''),
(42, '2023-11-30', 'manuel@gmail.com', 1, ''),
(43, '2023-11-30', 'manuel@gmail.com', 0, 'PAYID-MVUJC3Q0XE83770Y5957922C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaproduto`
--

CREATE TABLE `categoriaproduto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoriaproduto`
--

INSERT INTO `categoriaproduto` (`id`, `descricao`) VALUES
(7, 'brinquedos'),
(5, 'casas'),
(6, 'jogadores'),
(4, 'Outros'),
(1, 'Paineis'),
(3, 'patins'),
(2, 'Porta-Chaves');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `email` varchar(200) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`email`, `nome`, `PASSWORD`, `tipo`) VALUES
('manuel@gmail.com', 'Manuel', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcarrinho`
--

CREATE TABLE `itemcarrinho` (
  `idcarrinho` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itemcarrinho`
--

INSERT INTO `itemcarrinho` (`idcarrinho`, `quantidade`, `idproduto`) VALUES
(36, 1, 25),
(37, 4, 25),
(38, 1, 6),
(39, 1, 25),
(40, 1, 25),
(41, 1, 21),
(42, 4, 6),
(43, 1, 21),
(43, 1, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `preco` float NOT NULL,
  `filename` varchar(256) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descricao` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `filename`, `id_categoria`, `descricao`) VALUES
(6, 'teste', 10, 'baja3.jpg', 6, 'dsg'),
(21, 'qweq', 23, 'inseption2.png', 4, 'qeqqwe'),
(25, 'teste', 1, 'joaoCosta.png', 6, 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descricao` (`descricao`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `itemcarrinho`
--
ALTER TABLE `itemcarrinho`
  ADD PRIMARY KEY (`idcarrinho`,`quantidade`,`idproduto`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
