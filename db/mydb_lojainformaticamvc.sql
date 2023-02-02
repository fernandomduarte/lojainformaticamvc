-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02/02/2023 às 12:26
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb_lojainformaticamvc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `url_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `quantity`, `min_quantity`, `url_image`) VALUES
(1, 434979, 'Película samsung galaxy A10', 19.9, 27, 5, 'df60ad59644f9c0bbd3663b97e4e0055.jpg'),
(2, 460526, 'Fones de ouvido philco com bluetooth', 79, 3, 1, '6dcc73c40faf539a1f6cd2ed53a8d999.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `value` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `sales`
--

INSERT INTO `sales` (`id`, `product_code`, `product_name`, `value`, `quantity`, `datetime`) VALUES
(1, 434979, 'Película samsung galaxy A10', 19, 1, '2022-12-26 12:26:25'),
(2, 434979, 'Película samsung galaxy A10', 19.9, 1, '2022-12-26 12:34:23'),
(3, 460526, 'Fones de ouvido philco com bluetooth', 79, 1, '2022-12-26 12:36:43'),
(4, 460526, 'Fones de ouvido philco com bluetooth', 79, 1, '2022-12-29 12:06:28'),
(5, 434979, 'Película samsung galaxy A10', 18, 1, '2022-12-29 12:06:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `token`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '9d79e7da3574302e703b321570c9b6b4');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
