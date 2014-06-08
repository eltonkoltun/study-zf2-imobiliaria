-- phpMyAdmin SQL Dump
-- version 4.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Maio-2014 às 20:37
-- Versão do servidor: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `controler` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `texto` text COLLATE latin1_general_ci,
  `meta_descricao` text COLLATE latin1_general_ci,
  `meta_palavras_chave` text COLLATE latin1_general_ci,
  `cliente_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `css` text COLLATE latin1_general_ci,
  `script` text COLLATE latin1_general_ci,
  `mostrar_mapa` tinyint(1) NOT NULL DEFAULT '1',
  `mostrar_similares` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `assunto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `mensagem` text COLLATE latin1_general_ci,
  `imovel_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `tipo` char(1) COLLATE latin1_general_ci NOT NULL DEFAULT 'M',
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtros`
--

CREATE TABLE IF NOT EXISTS `filtros` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `filtro_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtros_imoveis`
--

CREATE TABLE IF NOT EXISTS `filtros_imoveis` (
  `imovel_id` int(11) NOT NULL,
  `filtro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL,
  `imovel_id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `informacoes` text COLLATE latin1_general_ci,
  `ficha_tecnica` text COLLATE latin1_general_ci,
  `caracteristicas` text COLLATE latin1_general_ci,
  `endereco` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `destaque` tinyint(4) NOT NULL DEFAULT '0',
  `bairro_id` int(11) NOT NULL,
  `ordem` int(11) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes_acessos`
--

CREATE TABLE IF NOT EXISTS `permissoes_acessos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `visualizar` tinyint(1) NOT NULL,
  `alterar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `similares`
--

CREATE TABLE IF NOT EXISTS `similares` (
  `imovel_id` int(11) NOT NULL,
  `imovel_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `perfil` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `criacao` datetime NOT NULL,
  `alteracao` datetime NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='perfil= master, admin, super';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bairros`
--
ALTER TABLE `bairros`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bairro_1_idx` (`cidade_id`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cidades_1_idx` (`estado_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_contatos_1_idx` (`imovel_id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_estados_1_idx` (`pais_id`);

--
-- Indexes for table `filtros`
--
ALTER TABLE `filtros`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filtros_imoveis`
--
ALTER TABLE `filtros_imoveis`
 ADD PRIMARY KEY (`imovel_id`,`filtro_id`), ADD KEY `fk_filtros_imoveis_1_idx` (`imovel_id`), ADD KEY `fk_filtros_imoveis_2_idx` (`filtro_id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_fotos_1_idx` (`imovel_id`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_imoveis_1_idx` (`bairro_id`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissoes_acessos`
--
ALTER TABLE `permissoes_acessos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_permissoes_acessos_2_idx` (`area_id`), ADD KEY `fk_permissoes_acessos_1_idx` (`usuario_id`);

--
-- Indexes for table `similares`
--
ALTER TABLE `similares`
 ADD PRIMARY KEY (`imovel_id`,`imovel_id2`), ADD KEY `fk_similares_1_idx` (`imovel_id`), ADD KEY `fk_similares_2_idx` (`imovel_id2`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
ADD CONSTRAINT `fk_bairro_1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
ADD CONSTRAINT `fk_cidades_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
ADD CONSTRAINT `fk_contatos_1` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `estados`
--
ALTER TABLE `estados`
ADD CONSTRAINT `fk_estados_1` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `filtros_imoveis`
--
ALTER TABLE `filtros_imoveis`
ADD CONSTRAINT `fk_filtros_imoveis_1` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_filtros_imoveis_2` FOREIGN KEY (`filtro_id`) REFERENCES `filtros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fotos`
--
ALTER TABLE `fotos`
ADD CONSTRAINT `fk_fotos_1` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
ADD CONSTRAINT `fk_imoveis_1` FOREIGN KEY (`bairro_id`) REFERENCES `bairros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `permissoes_acessos`
--
ALTER TABLE `permissoes_acessos`
ADD CONSTRAINT `fk_permissoes_acessos_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_permissoes_acessos_2` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `similares`
--
ALTER TABLE `similares`
ADD CONSTRAINT `fk_similares_1` FOREIGN KEY (`imovel_id`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_similares_2` FOREIGN KEY (`imovel_id2`) REFERENCES `imoveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
