-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2021 às 23:21
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
-- Banco de dados: `userbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_access`
--

CREATE TABLE `user_access` (
  `user` varchar(240) NOT NULL,
  `password` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_access`
--

INSERT INTO `user_access` (`user`, `password`, `email`, `adm`) VALUES
('admin', '6ce20aed712d3be2261dfa2faef53b56', 'master@gmail.com', 1),
('bh27', 'd9988936d859ccb508424dc9030e9f2b', 'bruno27@gmail.com', NULL),
('carlinhos', '6642a57540145bc9c4a90229b7ff4c19', 'junior11@outlook.com', NULL),
('gabigol', '6ce20aed712d3be2261dfa2faef53b56', 'gabigol@gabigol.com', NULL),
('getulio54', '1dc13d614dc40a74a80921dffcca244a', 'getulio@vargas.com', NULL),
('pedro2', 'fe65622d5010ca861a7fffdd615514da', 'pedro2@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_info`
--

CREATE TABLE `user_info` (
  `user` varchar(240) NOT NULL,
  `id` int(11) NOT NULL,
  `adm` tinyint(1) DEFAULT NULL,
  `fullname` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `niver` date NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `logradouro` varchar(340) NOT NULL,
  `casanum` varchar(240) NOT NULL,
  `complemento` varchar(160) DEFAULT NULL,
  `bairro` varchar(240) NOT NULL,
  `cidade` varchar(240) NOT NULL,
  `uf` varchar(160) NOT NULL,
  `cep` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_info`
--

INSERT INTO `user_info` (`user`, `id`, `adm`, `fullname`, `email`, `niver`, `sexo`, `logradouro`, `casanum`, `complemento`, `bairro`, `cidade`, `uf`, `cep`) VALUES
('carlinhos', 4, NULL, 'Carlos Johnson Junior', 'junior11@outlook.com', '1999-08-03', 'Masculino', 'Rua Sargento Pinto', '999', 'Casa B', 'Santa Luzia', 'Recife', 'PE', '20921-440'),
('gabigol', 5, NULL, 'Gabriel Barbosa', 'gabigol@gabigol.com', '1987-05-04', 'Masculino', 'Campo de São Cristóvão', '177', '', 'São Cristóvão', 'Santos', 'SP', '20921-440'),
('getulio54', 8, NULL, 'Getúlio Dornelles Vargas', 'getulio@vargas.com', '1882-04-19', 'Masculino', 'Rua Piraúba', '45', 'Casa B', 'Inhaúma', 'São Borja', 'RS', '20921-440'),
('master', 1, 1, 'Administrador', 'master@gmail.com', '2021-03-12', 'Não declarado', 'Rua Piraúba', 's/n', '', 'São Cristóvão', 'Rio de Janeiro', 'RJ', '20921-440'),
('pedro2', 6, NULL, 'Pedro de Alcântara João Carlos Leopoldo Salvador Bibiano Francisco Xavier de Paula Leocádio Miguel Gabriel Rafael Gonzaga de Habsburgo-Lorena e Bragança', 'pedro2@gmail.com', '1825-12-02', 'Masculino', 'Quinta da Boa Vista', 's/n', '', 'São Cristóvão', 'Rio de Janeiro', 'RJ', '20940-040');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`user`);

--
-- Índices para tabela `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
