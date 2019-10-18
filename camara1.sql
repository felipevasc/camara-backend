-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2019 às 23:38
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camara1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

CREATE TABLE `comissoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `presidente` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `relator` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `membro` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `nome`, `descricao`, `tipo`, `presidente`, `relator`, `membro`) VALUES
(1, 'JustiÃ§a e RedaÃ§Ã£o', '', 0, '', '', ''),
(2, 'Diretos Humanos', NULL, NULL, '', '', ''),
(3, 'OrÃ§amento', NULL, NULL, '', '', ''),
(4, 'SaÃºde e AssistÃªncia Social', NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes_projetos`
--

CREATE TABLE `comissoes_projetos` (
  `id` int(11) NOT NULL,
  `comissao` int(11) DEFAULT NULL,
  `projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comissoes_projetos`
--

INSERT INTO `comissoes_projetos` (`id`, `comissao`, `projeto`) VALUES
(1, 1, 13),
(2, 2, 13),
(3, 3, 13),
(4, 4, 13),
(5, 1, 14),
(6, 3, 14),
(7, 1, 16),
(8, 2, 16),
(9, 3, 16),
(10, 4, 16),
(11, 1, 17),
(12, 3, 17),
(13, 1, 29),
(14, 1, 32),
(15, 3, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronometro`
--

CREATE TABLE `cronometro` (
  `id` int(11) NOT NULL,
  `hora_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pausado` tinyint(1) DEFAULT NULL,
  `tempo_decorrido` int(11) DEFAULT NULL,
  `tempo_previsto` int(11) DEFAULT NULL,
  `hora_ultimo_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vereador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cronometro`
--

INSERT INTO `cronometro` (`id`, `hora_inicio`, `pausado`, `tempo_decorrido`, `tempo_previsto`, `hora_ultimo_start`, `vereador`) VALUES
(34, '2017-02-12 09:53:40', 1, NULL, 20, '2017-02-12 09:53:40', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `discurso`
--

CREATE TABLE `discurso` (
  `id` int(11) NOT NULL,
  `inicio_normal` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `inicio_adicional` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `segundos_normal` int(11) DEFAULT NULL,
  `segundos_adicional` int(11) DEFAULT NULL,
  `vereador` int(11) DEFAULT NULL,
  `pausado` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `discurso`
--

INSERT INTO `discurso` (`id`, `inicio_normal`, `inicio_adicional`, `segundos_normal`, `segundos_adicional`, `vereador`, `pausado`) VALUES
(1, '20:45:43', '21:15:05', 0, 0, 5, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emendas`
--

CREATE TABLE `emendas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `projeto` int(11) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `pautado` tinyint(1) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`) VALUES
(4, 'asdfasdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `liberar`
--

CREATE TABLE `liberar` (
  `id` int(11) NOT NULL,
  `pequeno_expediente` date DEFAULT NULL,
  `grande_expediente` date DEFAULT NULL,
  `votacao_projeto` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `texto_projeto` text COLLATE utf8_bin,
  `microfone` tinyint(1) DEFAULT NULL,
  `tv` varchar(255) COLLATE utf8_bin NOT NULL,
  `inicio_sessao` timestamp NULL DEFAULT NULL,
  `sessao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `expediente` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `liberar`
--

INSERT INTO `liberar` (`id`, `pequeno_expediente`, `grande_expediente`, `votacao_projeto`, `texto_projeto`, `microfone`, `tv`, `inicio_sessao`, `sessao`, `expediente`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 'exibe_presenca.php', '2019-05-09 21:05:54', 'TRESENTÃ‰SIMA TRIGÃ‰SIMA SEGUNDA SESSÃƒO ORDINÃRIA', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palavras`
--

CREATE TABLE `palavras` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `vereador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `palavras`
--

INSERT INTO `palavras` (`id`, `data`, `vereador`) VALUES
(1, '2017-02-12', 1),
(2, '2017-02-12', 1),
(3, '2017-02-12', 1),
(4, '2017-02-12', 1),
(5, '2017-02-12', 4),
(6, '2017-02-13', 9),
(7, '2017-02-15', 1),
(43, '2017-02-20', 10),
(454, '2018-07-05', 2),
(452, '2018-07-05', 1),
(453, '2018-07-05', 13),
(457, '2018-07-12', 4),
(456, '2018-07-05', 14),
(459, '2018-07-12', 2),
(460, '2018-07-12', 10),
(533, '2018-11-01', NULL),
(505, '2018-09-06', 6),
(506, '2018-09-06', 15),
(529, '2018-10-25', NULL),
(527, '2018-10-25', NULL),
(528, '2018-10-25', NULL),
(548, '2018-12-06', 6),
(549, '2018-12-06', 15),
(546, '2018-11-14', NULL),
(550, '2018-12-06', 9),
(553, '2018-12-13', NULL),
(554, '2018-12-13', NULL),
(556, '2019-01-17', 6),
(557, '2019-01-17', 9),
(559, '2019-02-14', 13),
(561, '2019-02-14', 15),
(562, '2019-02-14', 6),
(563, '2019-02-21', 13),
(566, '2019-02-21', 15),
(567, '2019-02-21', 6),
(568, '2019-02-21', 9),
(569, '2019-03-07', 6),
(570, '2019-03-07', 13),
(571, '2019-03-07', 15),
(572, '2019-03-07', 4),
(573, '2019-03-14', 6),
(574, '2019-03-14', 13),
(575, '2019-03-14', 15),
(576, '2019-03-14', 4),
(577, '2019-03-21', NULL),
(587, '2019-04-17', 6),
(588, '2019-04-17', 15),
(582, '2019-03-21', 13),
(589, '2019-04-17', 13),
(593, '2019-05-02', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pareceres`
--

CREATE TABLE `pareceres` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `projeto` int(11) DEFAULT NULL,
  `comissao` int(11) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pareceres`
--

INSERT INTO `pareceres` (`id`, `nome`, `projeto`, `comissao`, `descricao`, `tipo`, `anexo`) VALUES
(1, '', NULL, NULL, '', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `partidos`
--

INSERT INTO `partidos` (`id`, `nome`, `imagem`) VALUES
(4, 'SD', '../auxiliares/fotos/6da2458429ce6dd1c036f113c82e3b5b.jpg'),
(5, 'PP', '../auxiliares/fotos/5c2bd51fee9879c5761dee61218ea3fa.jpg'),
(6, 'PC DO B', '../auxiliares/fotos/1040a91071dbd757faadd58df487a93b.jpg'),
(7, 'PMB', '../auxiliares/fotos/d795373f106bc6ef0555730d39b6dbc7.jpg'),
(8, 'PSD', '../auxiliares/fotos/41a7b0b9d0f416eccbfe67d6aa966829.jpg'),
(9, 'PSB', '../auxiliares/fotos/20ff26273fc4cc359a4574a1c156863a.jpg'),
(10, 'PDT', '../auxiliares/fotos/97b83867e8028eed558ddb57678e8dd1.jpg'),
(11, 'PRB', '../auxiliares/fotos/64d1d05ac4d74f735edbc87d93d729b7.jpg'),
(12, 'PSDB', '../auxiliares/fotos/87146a4c6d5e28e7c77953317454c065.jpg'),
(13, 'PT', '../auxiliares/fotos/c9e106c15de2951e3e0bebb4f90c56df.jpg'),
(15, 'MDB', '../auxiliares/fotos/96d448731602123c65712b0d5a0d831d.jpg'),
(16, 'PRTB', '../auxiliares/fotos/9f5eb9075493472dd73fca5e1f1a2417.jpg'),
(17, 'PTB', '../auxiliares/fotos/e2c254257cd077475af10e0d691fa6d1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presencas`
--

CREATE TABLE `presencas` (
  `id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `vereador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `presencas`
--

INSERT INTO `presencas` (`id`, `data`, `vereador`) VALUES
(657, '2018-07-26 13:52:28', 15),
(658, '2018-07-26 08:54:19', 15),
(659, '2018-07-26 09:24:04', 2),
(660, '2018-07-28 21:57:55', 2),
(661, '2018-07-28 21:58:11', 15),
(662, '2018-07-28 21:59:42', 8),
(663, '2018-07-28 22:00:32', 14),
(664, '2018-07-28 23:09:06', 6),
(665, '2018-07-30 04:25:22', 15),
(919, '2018-12-13 23:19:44', 8),
(889, '2018-11-14 23:30:05', 7),
(918, '2018-12-13 23:19:44', 2),
(946, '2018-12-18 00:47:17', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `descricao` text COLLATE utf8_bin,
  `autor` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ordem` int(255) DEFAULT NULL,
  `votacao_aberta` tinyint(1) DEFAULT NULL,
  `anexo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `pautado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome`, `descricao`, `autor`, `ordem`, `votacao_aberta`, `anexo`, `aprovado`, `pautado`) VALUES
(74, 'PROJETO DE DECRETO LEGISLATIVO  NÂ° 05', '', '', 2, NULL, NULL, NULL, 0),
(75, 'MOÃ‡ÃƒO DE APOIO NÂ°. 04/2019', '', '', 0, NULL, NULL, NULL, NULL),
(77, 'PROJETO DE LEI NÂ° 56/2019', '', '', 2, NULL, NULL, NULL, 0),
(78, 'REQUERIMENTO N.Âº 035/2019', '', '', 0, NULL, NULL, NULL, NULL),
(79, 'REQUERIMENTO N.Âº 061/2019', '', '', 0, NULL, NULL, NULL, NULL),
(70, 'MOÃ‡ÃƒO DE PESAR NÂ°. 004/2019', '', '', 2, NULL, NULL, NULL, 0),
(71, 'PROJETO DE RESOLUÃ‡ÃƒO NÂ° 03/2019', '', '', 2, NULL, NULL, NULL, 0),
(72, 'REQUERIMENTO N.Âº 021/2019', '', '', 0, NULL, NULL, NULL, NULL),
(73, 'ATA DA SESSÃƒO ORDINÃRIA NÂ° 331', '', '', 1, NULL, NULL, NULL, 1),
(68, 'MOÃ‡ÃƒO DE PESAR NÂ°. 002/2019,', 'MOÃ‡ÃƒO DE PESAR REFENTE AO FALECIMENTO DA SRA. MARIA CILENE DE SOUSA, OCORRIDO DIA 6 DE FEVEREIRO', '', 2, NULL, NULL, NULL, 0),
(69, 'MOÃ‡ÃƒO DE PESAR NÂ°. 003/2019,', 'MOÃ‡ÃƒO DE PESAR REFERENTE AO FALECIMENTO DO SR. TOMÃ‰ RAIMUNDO DE CARVALHO 09 DE FEVEREIRO', '', 2, NULL, NULL, NULL, 0),
(65, 'PROJETO DE LEI NÂ° 52/2019', '', '', 0, NULL, NULL, NULL, NULL),
(66, 'PROJETO DE LEI NÂ° 53/2019', '', '', 2, NULL, NULL, NULL, 0),
(67, 'MOÃ‡ÃƒO DE PESAR NÂ°. 001/2019,', 'ALFREDO NOGUEIRA MAGALHÃƒES NASCEU EM VIÃ‡OSA DO CEARÃ NO DIA 19 DE ABRIL DE 1941, SEU NASCIMENTO ACONTECEU NA MESMA CASA ONDE VIVEU A VIDA TODA, CASA ESSA QUE PERTENCIA A SEU AVÃ” MATERNO E DEPOIS A SEU PAI.', '', 2, NULL, NULL, NULL, 0),
(58, 'PROJETO DE LEI NÂ° 54/2019', '', '', 2, NULL, NULL, NULL, 0),
(60, 'COMISSÃƒO DE FINANÃ‡AS E ORÃ‡AMENTO', '', '', 0, NULL, NULL, NULL, NULL),
(61, 'COMISSÃƒO DE OBRAS E SERVIÃ‡OS PÃšBLICOS', '', '', 0, NULL, NULL, NULL, NULL),
(62, 'COMISSÃƒO DE MEIO AMBIENTE, DIREITOS HUMANOS E DEFESA DO CONSUMIDOR', '', '', 0, NULL, NULL, NULL, NULL),
(64, 'EMENDA MODIFICATIVA NÂ° 01/2019 AO PROJETO NÂ°51/2019', '', '', 0, NULL, NULL, NULL, NULL),
(59, 'COMISSÃƒO DE JUSTIÃ‡A E REDAÃ‡ÃƒO', '', '', 0, NULL, NULL, NULL, NULL),
(56, 'PROJETO DE RESOLUÃ‡ÃƒO NÂ° 01/2019', '', '', 2, NULL, NULL, NULL, 0),
(57, 'PROJETO DE RESOLUÃ‡ÃƒO NÂ° 02/2019', '', '', 2, NULL, NULL, NULL, 0),
(52, 'REQUERIMENTO N.Âº 437/2018', '', '', 4, NULL, NULL, NULL, 0),
(63, 'PROJETO DE LEI NÂ° 51/2019', '', '', 0, NULL, NULL, NULL, NULL),
(54, 'PROJETO DE LEI NÂ° 52/2018', '', '', 0, NULL, NULL, NULL, NULL),
(76, 'PROJETO DE LEI NÂ° 55/2019', '', '', 2, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `id` int(11) NOT NULL,
  `aberta` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `suplentes`
--

CREATE TABLE `suplentes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `partido` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_votos`
--

CREATE TABLE `tipos_votos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipos_votos`
--

INSERT INTO `tipos_votos` (`id`, `nome`, `imagem`) VALUES
(1, 'A FAVOR', '../auxiliares/ico/bola_azul.png'),
(2, 'CONTRA', '../auxiliares/ico/bola_vermelha.png'),
(3, 'ABSTENCAO', '../auxiliares/ico/bola_amarela.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vereadores`
--

CREATE TABLE `vereadores` (
  `id` int(11) NOT NULL,
  `nome_urna` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `imagem` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `partido` int(11) DEFAULT NULL,
  `solicitar_palavra` tinyint(1) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `microfone` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `vereadores`
--

INSERT INTO `vereadores` (`id`, `nome_urna`, `nome`, `usuario`, `numero`, `email`, `senha`, `imagem`, `partido`, `solicitar_palavra`, `ordem`, `microfone`) VALUES
(1, 'TOINHO', 'FRANCISCO ANTONIO SILVA CARDOSO', 'cleber', NULL, '', '3ae80ce7fa474024ddf7958035c8153e35cf912c', '../auxiliares/fotos/8d0ab127f56849b15f4860669227e940.jpg', 17, 1, NULL, 0),
(2, 'ERANILDO FONTENELE', 'ERANILDO FONTENELE XAVIER', NULL, NULL, '', '86cea4f704ed43ad8965d5cfff357bd59e97876a', '../auxiliares/fotos/b1777e773c23e51f3e2fff5a8f0b968b.jpg', 10, NULL, 1, 0),
(3, 'NEIDE BRITO', 'IVONEIDE DA SILVA BRITO', NULL, NULL, '', '356a192b7913b04c54574d18c28d46e6395428ab', '../auxiliares/fotos/83fa26381b6ccffe4f16b63c2caf4eff.jpg', 15, 1, NULL, 0),
(4, 'MANUEL ALVES', 'MANUEL ALVES DE SOUSA', NULL, NULL, '', '4fe7a90daaaa084605f6f37eef527a50276887d2', '../auxiliares/fotos/30185d14d266f8462e1976f3896eb941.jpg', 12, 1, NULL, 0),
(5, 'EDILSON NOGUEIRA', 'FRANCISCO EDILSON NOGUEIRA DE SOUSA', NULL, NULL, '', '51da62a4d7c1afef718ccc35f07551f2bb3879f2', '../auxiliares/fotos/71db22245c41ab464aae0032025e25ec.jpg', 10, 1, NULL, 0),
(6, 'DANIEL LIMA', 'DANIEL NILSON SÃ LIMA', NULL, NULL, '', '4529e1a17f7d2399fc1f576f1085faf437b6ce86', '../auxiliares/fotos/94bc012d9685aa02ec93efcf0d9c3ee7.jpg', 16, 1, NULL, 0),
(7, 'JOÃƒO MAMEDE', 'JOÃƒO MAMEDE DOS SANTOS', NULL, NULL, '', '618dcdfb0cd9ae4481164961c4796dd8e3930c8d', '../auxiliares/fotos/3e68373c3ca5a0313ce241f2a658373d.jpg', 10, NULL, 4, 0),
(8, 'NEURIMAR SIQUEIRA', 'NEURIMAR SIQUEIRA DA SILVA', NULL, NULL, '', '129629539ae5981a45a62f44189fdd13df871bb4', '../auxiliares/fotos/2175785e28cb293ab5269f9a23312dfd.jpg', 10, NULL, NULL, 0),
(9, 'EDIOMAR DE CARVALHO', 'EDIOMAR DE CARVALHO SILVA', NULL, NULL, '', '85568b20c3315286c4dfebb330b25146f92bed66', '../auxiliares/fotos/6e457a4b8e95a675e3a440d9a363a280.jpg', 10, NULL, NULL, 0),
(10, 'NEVES', 'ERNEVALDO PAULINO DE OLIVEIRA', NULL, NULL, '', 'f9922496ec864c9b125d22f29bae753da6b52e17', '../auxiliares/fotos/8eea436dae3b26e0ba7c92b9908dfb78.jpg', 12, 1, 2, 0),
(11, 'EDIMAR GABRIEL', 'EDIMAR GABRIEL DA ROCHA', NULL, NULL, '', 'f1abd670358e036c31296e66b3b66c382ac00812', '../auxiliares/fotos/dd0b151ffd904ad9305b84c5e9df7a63.jpg', 15, NULL, NULL, 0),
(12, 'JUDITE FONTENELE', 'JUDITE ANA DE BRITO FONTENELE', NULL, NULL, '', '74cbd2c215c2c13c4b6110ada96de8891b355dda', '../auxiliares/fotos/2d19d1de2976c9e3e12137099575152d.jpg', 12, NULL, NULL, 0),
(13, 'EDNALDO FONTENELE', 'FRANCISCO EDNALDO FONTENELE XAVIER', NULL, NULL, '', '0de7f57bd4db22d7e4a43004aea93b1f0a484259', '../auxiliares/fotos/9587d1adb9328caa4715a104918dc1d3.jpg', 9, 1, 3, 0),
(14, 'LUCINETE BRITO', 'MARIA LUCINETE DE SOUSA BRITO', NULL, NULL, '', 'b7bea17843cd602b228fef963983e3d18c884341', '../auxiliares/fotos/dd3cac19da9eb4b8f761d67f3e7c4476.jpg', 5, NULL, NULL, 0),
(15, 'PROF. NEIDE', 'MARIA NEIDE PEREIRA DA SILVA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/3c951754b0f84f3bd46c676c9642414a.jpg', 10, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votacoes`
--

CREATE TABLE `votacoes` (
  `id` int(11) NOT NULL,
  `vereador` int(11) DEFAULT NULL,
  `projeto` int(11) DEFAULT NULL,
  `tipo_voto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `votacoes`
--

INSERT INTO `votacoes` (`id`, `vereador`, `projeto`, `tipo_voto`) VALUES
(3475, 14, NULL, 1),
(3474, 11, NULL, 1),
(3473, 3, NULL, 1),
(3472, 12, NULL, 1),
(3471, 7, NULL, 1),
(3470, 4, NULL, 1),
(3469, 1, NULL, 1),
(3468, 10, NULL, 1),
(3467, 8, NULL, 1),
(3466, 13, NULL, 1),
(3465, 6, NULL, 1),
(3463, 5, NULL, 1),
(3464, 9, NULL, 1),
(3476, 15, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comissoes`
--
ALTER TABLE `comissoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comissoes_projetos`
--
ALTER TABLE `comissoes_projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cronometro`
--
ALTER TABLE `cronometro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discurso`
--
ALTER TABLE `discurso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emendas`
--
ALTER TABLE `emendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liberar`
--
ALTER TABLE `liberar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palavras`
--
ALTER TABLE `palavras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pareceres`
--
ALTER TABLE `pareceres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplentes`
--
ALTER TABLE `suplentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos_votos`
--
ALTER TABLE `tipos_votos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vereadores`
--
ALTER TABLE `vereadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votacoes`
--
ALTER TABLE `votacoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `votacao_idx` (`projeto`,`vereador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comissoes`
--
ALTER TABLE `comissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comissoes_projetos`
--
ALTER TABLE `comissoes_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cronometro`
--
ALTER TABLE `cronometro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `discurso`
--
ALTER TABLE `discurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emendas`
--
ALTER TABLE `emendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `liberar`
--
ALTER TABLE `liberar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `palavras`
--
ALTER TABLE `palavras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=597;

--
-- AUTO_INCREMENT for table `pareceres`
--
ALTER TABLE `pareceres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `presencas`
--
ALTER TABLE `presencas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1122;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sessao`
--
ALTER TABLE `sessao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `suplentes`
--
ALTER TABLE `suplentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_votos`
--
ALTER TABLE `tipos_votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vereadores`
--
ALTER TABLE `vereadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `votacoes`
--
ALTER TABLE `votacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3477;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
