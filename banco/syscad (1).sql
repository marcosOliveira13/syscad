-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 19-Maio-2021 às 06:31
-- Versão do servidor: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syscad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_medicos`
--

CREATE TABLE `dados_medicos` (
  `id_dados_medicos` int(11) NOT NULL,
  `precao_arterial` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `doenca_cronica` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `relacao_familiar` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `problemas_mediunicos` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `vicios` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `queixa` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_atualizacao` date NOT NULL,
  `id_login` int(11) NOT NULL,
  `peso` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `altura` varchar(240) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='dados medicos dos pacientes';

--
-- Extraindo dados da tabela `dados_medicos`
--

INSERT INTO `dados_medicos` (`id_dados_medicos`, `precao_arterial`, `doenca_cronica`, `relacao_familiar`, `problemas_mediunicos`, `vicios`, `queixa`, `data_cadastro`, `data_atualizacao`, `id_login`, `peso`, `id_pessoa`, `altura`) VALUES
(10, '', '', '', '', '', 'Dores no corpo', '2019-03-17', '2019-03-17', 45, '', 10, ''),
(11, '', '', '', '', '', 'Dores musculares', '2019-03-17', '2019-03-17', 44, '', 11, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encaminhamento`
--

CREATE TABLE `encaminhamento` (
  `id_encaminhamento` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `observacao` text COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL,
  `data_atualizacao` date NOT NULL,
  `id_login` int(11) NOT NULL,
  `outro` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `encaminhamento` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='encaminhamento para tratamento';

--
-- Extraindo dados da tabela `encaminhamento`
--

INSERT INTO `encaminhamento` (`id_encaminhamento`, `id_pessoa`, `observacao`, `data_cadastro`, `data_atualizacao`, `id_login`, `outro`, `encaminhamento`) VALUES
(10, 10, '', '2019-03-17', '2019-03-17', 45, '', 'Corrente MagnÃ©tica I'),
(11, 11, '', '2019-03-17', '2019-03-17', 44, '', 'Corrente MagnÃ©tica I');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `idade` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `complementar` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_fixo` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_celular1` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_celular2` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacao` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Dados Pessoa ';

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `sobrenome`, `data_nascimento`, `idade`, `estado_civil`, `cidade`, `uf`, `endereco`, `complementar`, `email`, `telefone_fixo`, `telefone_celular1`, `telefone_celular2`, `ocupacao`, `data_cadastro`) VALUES
(10, 'Amanda ', 'Soares', '1998-06-06', '20', '', '', '  ', '', '', '', '61 9 9355 0538 ', '61 9 9999-9999', '', '', '2019-03-17'),
(11, 'Julha', 'Fernandes', '1999-06-15', '19', '', '', '  GO  ', '', '', '', '', '61 993550538', '', 'professora', '2019-03-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `triador`
--

CREATE TABLE `triador` (
  `id_login` int(11) NOT NULL,
  `nome_triador` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(240) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usuario` varchar(240) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='dados triador';

--
-- Extraindo dados da tabela `triador`
--

INSERT INTO `triador` (`id_login`, `nome_triador`, `senha`, `usuario`) VALUES
(33, 'Marcos AraÃºjo Oliveira ', '123', 'admin'),
(34, 'Suelen', '1', 'susu'),
(35, 'Marcos AraÃºjo Oliveira ', '1', 'a'),
(36, 'Marcos Araújo Oliveira ', '1', 'b'),
(37, 'CÃ©lia AraÃºjo Viana AnÃ§an', '1', 'g'),
(38, 'CÃ©lia AraÃºjo Viana AnÃ§an', '1', 'o'),
(39, 'CÃ©lia AraÃºjo Viana AnÃ§an', 'Karina', 'Oo'),
(40, 'Jennifer Mendes', '123', 'Jennifer'),
(41, 'Marcos ', '123', 'marquinhos'),
(42, 'nome de usuario', '123', 'user'),
(43, 'k', 'k', 'k'),
(44, 'usuario teste - nome', '123', 'user1'),
(45, 'nome do usuario', '123', 'user2'),
(46, ' ', ' ', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_medicos`
--
ALTER TABLE `dados_medicos`
  ADD PRIMARY KEY (`id_dados_medicos`),
  ADD KEY `id_login_fk` (`id_login`) USING BTREE,
  ADD KEY `id_pessoa_fk` (`id_pessoa`);

--
-- Indexes for table `encaminhamento`
--
ALTER TABLE `encaminhamento`
  ADD PRIMARY KEY (`id_encaminhamento`),
  ADD KEY `id_pessoa` (`id_pessoa`),
  ADD KEY `id_login_fk` (`id_login`) USING BTREE,
  ADD KEY `id_pessoa_fk` (`id_pessoa`) USING BTREE;

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD UNIQUE KEY `id_pessoa` (`id_pessoa`);

--
-- Indexes for table `triador`
--
ALTER TABLE `triador`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_medicos`
--
ALTER TABLE `dados_medicos`
  MODIFY `id_dados_medicos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `encaminhamento`
--
ALTER TABLE `encaminhamento`
  MODIFY `id_encaminhamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `triador`
--
ALTER TABLE `triador`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `dados_medicos`
--
ALTER TABLE `dados_medicos`
  ADD CONSTRAINT `dados_medicos_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `triador` (`id_login`),
  ADD CONSTRAINT `dados_medicos_ibfk_3` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `encaminhamento`
--
ALTER TABLE `encaminhamento`
  ADD CONSTRAINT `encaminhamento_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id_pessoa`),
  ADD CONSTRAINT `encaminhamento_ibfk_3` FOREIGN KEY (`id_login`) REFERENCES `triador` (`id_login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
