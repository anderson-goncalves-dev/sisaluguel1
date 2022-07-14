-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2022 às 21:49
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aluga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id_aluguel` int(3) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `valor_total` double NOT NULL,
  `situacao_aluguel` varchar(45) NOT NULL,
  `danosAdicionais` text DEFAULT NULL,
  `valor_adicional` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`id_aluguel`, `id_cliente`, `id_veiculo`, `data_inicio`, `data_final`, `valor_total`, `situacao_aluguel`, `danosAdicionais`, `valor_adicional`) VALUES
(1, 33, 2, '2022-07-13', '2022-07-14', 140, 'finalizado', 'pneu furado', 50),
(5, 33, 4, '2022-07-13', '2022-07-15', 240, 'finalizado', 'Sem danos', 0),
(6, 37, 4, '2022-07-14', '2022-07-15', 160, 'finalizado', ' SEM DANOS', 0),
(7, 36, 14, '2022-07-15', '2022-07-16', 134, 'finalizado', ' Sem danos', 0),
(8, 34, 13, '2022-07-14', '2022-07-23', 780, 'finalizado', ' sem danos', 0),
(9, 34, 13, '2022-07-14', '2022-07-23', 780, 'finalizado', ' danos na lataria', 430),
(10, 38, 13, '2022-07-14', '2022-07-15', 156, 'finalizado', ' Lataria amassada', 45);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `rua` varchar(60) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `cpf`, `cidade`, `bairro`, `rua`, `numero`, `telefone`) VALUES
(33, 'Fernanda Pereira souza pereira', 'fernanda@hotmail.com', '06078576815', 'Ceraima', 'Brasilia', 'ESPIRIO SANTO', '200', '77998767766'),
(34, 'FABIO LIMA SOUZA', 'fabiolima@hotmail.com', '06087665432', 'GUARULHOS', 'SANTO ANDRE', 'ALMEIDA', '765', '77991546576'),
(35, 'Pedro Souza', 'Pedrosouza@hotmail.com', '45676897886', 'SANTANA', 'CACHOEIRA', 'Para', '345', '77991867576'),
(36, 'JORGE GOMES PEREIRA', 'JORGEGOMES@HOTMAIL.COM', '87996875634', 'CAETITE', 'SANTO ANDRE', 'ULICES', '567', '77885756743'),
(37, 'PABLO RAVELLY COTRIM TEIXEIRA', 'pabloravelly20@hotmail.com', '47686959544', 'Guanambi', 'SANTO ANDRE', 'Para', '200', '77887689955'),
(38, 'Julia Santos', 'julia@hotmail.com', '08767584321', 'SANTANA', 'SANTO ANDRE', 'Serjipe', '673', '77987654334'),
(39, 'LUIS PEREIRA', 'LUISPEREIRA@HOTMAIL.COM', '98545443434', 'GUARULHOS', 'SANTA LUZIA', 'ULICES', '456', '77881233233');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id_despesa` int(3) NOT NULL,
  `id_aluguel` int(3) NOT NULL,
  `diasAtraso` int(3) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(3) NOT NULL,
  `marca` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(8, 'Fiat'),
(10, 'Chevrolet'),
(11, 'Ford'),
(12, 'Renault'),
(13, 'Volkswagen'),
(15, 'bmw'),
(16, 'Honda'),
(17, 'Kia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(3) NOT NULL,
  `id_marca` int(3) NOT NULL,
  `modelo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca`, `modelo`) VALUES
(12, 10, 'Corsa'),
(13, 8, 'Unoo'),
(14, 10, 'Celta'),
(15, 11, 'Ka'),
(16, 8, 'Punto'),
(17, 11, 'Fusion'),
(18, 13, 'Gol'),
(19, 13, 'Golf'),
(20, 13, 'Voyage'),
(21, 11, 'Fiesta'),
(22, 12, 'Virtus'),
(23, 15, 'i330');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(4) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `cpf`, `cidade`, `bairro`, `rua`, `numero`, `telefone`) VALUES
(19, 'PABLO RAVELLY COTRIM TEIXEIRA', 'pabloravelly20@hotmail.com', '202cb962ac59075b964b07152d234b70', '06046558556', 'Ceraima', 'Nucle de Ceraima', 'Para', '95', '77991677755'),
(20, 'FABIO LIMA', 'fabiolima@hotmail.com', '202cb962ac59075b964b07152d234b70', '09874657454', 'GUARULHOS', 'CACHOEIRA', 'ULICES', '345', '77991876544'),
(21, 'JORGE GOMES', 'jorgegomes@hotmail.com', '202cb962ac59075b964b07152d234b70', '07586785454', 'SANTANA', 'Brasilia', 'ULICES', '50', '77887465454');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id_veiculo` int(3) NOT NULL,
  `id_marca` int(3) NOT NULL,
  `id_modelo` int(3) NOT NULL,
  `valor_diaria` double NOT NULL,
  `placa` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `situacao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id_veiculo`, `id_marca`, `id_modelo`, `valor_diaria`, `placa`, `ano`, `situacao`) VALUES
(1, 8, 13, 45, 'RIO2A18', 2004, 'manutencao'),
(2, 8, 13, 70, 'DFK0K76', 2019, 'disponivel'),
(4, 13, 19, 80, 'JHFHD13', 2010, 'disponivel'),
(5, 15, 23, 120, 'JHFHD13', 2012, 'disponivel'),
(6, 13, 20, 150, 'DFK0887', 2012, 'disponivel'),
(7, 13, 20, 150, 'DFK0887', 2012, 'disponivel'),
(10, 13, 19, 67, 'FH5H6H6', 2014, 'disponivel'),
(11, 13, 20, 67, '5h687k7', 2019, 'disponivel'),
(12, 11, 21, 35, '67JH4G5', 2015, 'disponivel'),
(13, 8, 16, 78, 'JK95HBG', 2013, 'disponivel'),
(14, 12, 22, 67, '6HU6Y6H', 2014, 'disponivel');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id_aluguel`),
  ADD KEY `fk_id_cliente` (`id_cliente`),
  ADD KEY `fk_id_veiculo` (`id_veiculo`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `fk_despesas` (`id_aluguel`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `fk_marca` (`id_marca`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `fk_marca_veiculo` (`id_marca`),
  ADD KEY `fk_modelo_veiculo` (`id_modelo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id_aluguel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id_despesa` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id_veiculo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_id_veiculo` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculo` (`id_veiculo`);

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_despesas` FOREIGN KEY (`id_aluguel`) REFERENCES `aluguel` (`id_aluguel`);

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `fk_marca_veiculo` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_modelo_veiculo` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
