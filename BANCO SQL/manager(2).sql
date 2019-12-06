-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2019 às 21:29
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `manager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `endereco` varchar(256) DEFAULT NULL,
  `cidade` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `tipo` enum('J','F') DEFAULT NULL,
  `telefone` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `endereco`, `cidade`, `email`, `tipo`, `telefone`) VALUES
(1, 'Wiliam Rocha Silva', 'Av. Porto Alegre, 428 - Niteroi, Betim', 'Betim', 'vrumautocenter@hotmail.com', 'J', '992791510'),
(2, 'Excellence Auto Center LTDA', 'Av. Tapajos, 2490 - Vila Cristina', 'Betim', 'excelence@hotmail.com', 'J', '3135468746'),
(6, 'nome', 'endereco', 'cidade', 'email', 'J', 'telefone'),
(7, 'GERALDO ATAIDE DE OLIVEIRA', 'RUA SAO BORJAS 114 - Industrial', 'Contagem', 'geraldo@gmail.com', 'F', '(31)3353-4980'),
(8, 'VALDECI DA SILVA PINHEIRO', 'RUA PADRE AIRTON FREIRE DIVINO - Guanabara', 'Betim', 'valdecipinheiro@hotmail.com', 'F', '(31)3283-2254'),
(9, 'ROMUALDO AUTO PECAS DE ABAETE LTDA', 'RUA FREI ORLANDO 118 - Amazonas', 'Abaete', 'NOVAAUTOPECAS@YAHOO.COM.BR', 'J', '(37)3541-3958'),
(10, 'WALTER PEREIRA DA SILVA', 'RUA EDITE NERI - PORTO', 'Brasilandia de Minas', 'walterp@outlook.com', 'F', '(38)3662-3891'),
(11, 'DL SERV DE ALINH. BALAN. E MEC. LTDA', 'RUA ARTUR DUARTE 1845', 'Rio Acima', 'dlservice@yahoo.com.br', 'J', '(31)3545-1374'),
(12, 'JOSUE DE LIMA PINHEIRO ME', 'AV PRESIDENTE JUSCELINO KUBSTCHECK, 1475', 'FRUTAL', 'TOPCARFRUTAL@GMAIL.COM', 'J', '(34)2954-8312'),
(13, 'WENDEL TOMAS CANDIAN', 'AV PREFEITO SIMAO TAMM BIAS FORTES, 721', 'BARBACENA', 'WENDELCANDIAN@TERRA.COM.BR', 'F', '(32)98853-1411'),
(14, 'JEAN BRAGA DE OLIVEIRA ME', 'AV. MIGUEL HENRIQUES DA SILVA, 805', 'IGARAPE', 'ERMELINDA_RIOS@YAHOO.COM.BR', 'J', '(31)99951-2361'),
(15, 'CASA DAS PECAS RESENDE E SILVA LTDA', 'AV JOAO PAULINELLI DE CARVALHO, 280', 'BAMBUI', 'casapecasresende@bol.com.br', 'J', '(37)34311-667'),
(26, 'Mauricio Cesar da Costa', 'Av. Porto Feliz - Ceu azul', ' Belo Horizonte', 'autocentermauri@hotmail.com', 'J', '(31)99874-5712'),
(27, 'Lucas Moura', 'Av. Porto Feliz - Ceu azul', ' Belo Horizonte', 'autocentermauri@hotmail.com', 'J', '(31)99874-5712'),
(28, 'Joao Vitor de Faria', 'Rua rio ganges 940', 'Contagem', 'jvfaria015@gmail.com', 'F', '31993707899'),
(29, 'Joao Vitor de Faria', 'Rua rio ganges 940', 'Contagem', 'jvfaria015@gmail.com', 'F', '31993707899');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisico`
--

CREATE TABLE `fisico` (
  `id_fisico` int(11) NOT NULL,
  `cpf` varchar(256) NOT NULL,
  `rg` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `juridico`
--

CREATE TABLE `juridico` (
  `id_juridico` int(11) NOT NULL,
  `cnpj` varchar(256) NOT NULL,
  `insc_estadual` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `juridico`
--

INSERT INTO `juridico` (`id_juridico`, `cnpj`, `insc_estadual`) VALUES
(1, '22921553000110', '00145654124');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email`, `senha`) VALUES
(1, 'Joao Vitor de Faria', 'jvfaria015@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` int(11) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  `id_venda_cliente` int(11) NOT NULL,
  `id_venda_vendedor` int(11) NOT NULL,
  `data_venda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `valor`, `id_venda_cliente`, `id_venda_vendedor`, `data_venda`) VALUES
(1, '200.00', 1, 46, '2019-09-03'),
(3, '300.00', 1, 46, '2019-09-10'),
(6, '90.00', 1, 46, '2019-10-01'),
(8, '546.00', 2, 46, '2019-08-04'),
(9, '999.99', 1, 46, '2019-05-12'),
(10, '999.99', 1, 46, '2019-12-01'),
(11, '836.90', 1, 46, '2019-12-05'),
(12, '426.90', 2, 46, '2019-05-20'),
(13, '426.90', 2, 46, '2019-04-21'),
(14, '999.99', 10, 46, '2019-07-15'),
(15, '200.16', 10, 46, '2019-07-28'),
(16, '687.20', 10, 46, '2019-07-18'),
(17, '567.57', 13, 46, '2019-02-20'),
(19, '2456.64', 14, 46, '2019-05-12'),
(20, '1647.93', 15, 46, '2019-07-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome_vendedor`) VALUES
(3, 'Edilson'),
(46, 'Joao Vitor ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `fisico`
--
ALTER TABLE `fisico`
  ADD PRIMARY KEY (`id_fisico`);

--
-- Índices para tabela `juridico`
--
ALTER TABLE `juridico`
  ADD PRIMARY KEY (`id_juridico`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_venda_cliente` (`id_venda_cliente`),
  ADD KEY `fk_venda_vendedor` (`id_venda_vendedor`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `fisico`
--
ALTER TABLE `fisico`
  MODIFY `id_fisico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `juridico`
--
ALTER TABLE `juridico`
  MODIFY `id_juridico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fisico`
--
ALTER TABLE `fisico`
  ADD CONSTRAINT `fk_id_fisico` FOREIGN KEY (`id_fisico`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `juridico`
--
ALTER TABLE `juridico`
  ADD CONSTRAINT `fk_id_juridico` FOREIGN KEY (`id_juridico`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`id_venda_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_venda_vendedor` FOREIGN KEY (`id_venda_vendedor`) REFERENCES `vendedor` (`id_vendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
