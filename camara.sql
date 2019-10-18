-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Ago-2018 às 06:46
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camara`
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
(10, 4, 16);

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
(34, '2017-02-12 04:53:40', 1, NULL, 20, '2017-02-12 04:53:40', 4);

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
(1, '22:40:09', '', 1187, 0, 14, '');

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

--
-- Extraindo dados da tabela `emendas`
--

INSERT INTO `emendas` (`id`, `nome`, `descricao`, `projeto`, `aprovado`, `pautado`, `ordem`) VALUES
(1, 'Emenda 1', 'Texto referente a emenda numero 1 do projeto de teste 1, permitindo alterar a lei n 1723.21312. asdoijas', 12, NULL, 1, 6),
(2, 'Emenda 2', 'Texto referente a emenda numero 2 do projeto de teste 1, permitindo alterar a lei n 1723.21312. asdoijas', 12, NULL, 1, 4),
(3, 'Emenda 1', 'Download all the ok icons you need. Choose between 4136 ok icons in both vector SVG and PNG format. Related icons ... check, checklist, green, ok icon. $2.00.', 13, NULL, 0, NULL),
(4, 'Emenda - NÂ° 1', '', 14, NULL, NULL, NULL),
(5, 'Emenda - NÂ° 2', '', 14, NULL, NULL, NULL),
(6, 'Emenda N. 1', 'Texto da emenda nÃºmero 1', 16, NULL, 1, 1),
(7, 'Emenda N. 1', 'Texto da emenda nÃºmero 1', 16, NULL, 1, 3);

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
  `expediente` int(11) NOT NULL,
  `tv` varchar(255) COLLATE utf8_bin NOT NULL,
  `inicio_sessao` timestamp NULL DEFAULT NULL,
  `sessao` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `liberar`
--

INSERT INTO `liberar` (`id`, `pequeno_expediente`, `grande_expediente`, `votacao_projeto`, `texto_projeto`, `microfone`, `expediente`, `tv`, `inicio_sessao`, `sessao`) VALUES
(1, NULL, NULL, NULL, NULL, 0, 2, 'exibe_discursando.php', '2018-08-02 04:39:48', '25Âª SessÃ£o');

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
(460, '2018-07-12', 10);

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
(657, '2018-07-26 07:52:28', 15),
(658, '2018-07-26 02:54:19', 15),
(659, '2018-07-26 03:24:04', 2),
(660, '2018-07-28 15:57:55', 2),
(661, '2018-07-28 15:58:11', 15),
(662, '2018-07-28 15:59:42', 8),
(663, '2018-07-28 16:00:32', 14),
(664, '2018-07-28 17:09:06', 6),
(665, '2018-07-29 22:25:22', 15);

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
(4, 'PROJETO DE LEI 01-00696/2016', '\"ProÃ­be a utilizaÃ§Ã£o de cÃ£es para fins de seguranÃ§a, vigilÃ¢ncia e guarda, no Ã¢mbito da\r\nAdministraÃ§Ã£o PÃºblica do MunicÃ­pio de SÃ£o Paulo e dÃ¡ outras providÃªncias.\r\nA CÃ¢mara Municipal de SÃ£o Paulo DECRETA:\r\nArt. 1Âº Fica vedada a utilizaÃ§Ã£o de cÃ£es, para fins de guarda, no Ã¢mbito da\r\nAdministraÃ§Ã£o PÃºblica do MunicÃ­pio de SÃ£o Paulo, em imÃ³veis prÃ³prios, assim como locados\r\npelo poder pÃºblico municipal para atividades tÃ­picas da administraÃ§Ã£o.\r\nArt. 2Âº Esta lei serÃ¡ regulamentada no prazo de 60 (sessenta dias) a contar de sua\r\npublicaÃ§Ã£o.\r\nArt. 2-A A regulaÃ§Ã£o deverÃ¡ respeitar a legislaÃ§Ã£o Federal concernente ao tema, em\r\nespecial o art. 32 da lei 9.605/1998.\r\nArt. 3Âº As despesas decorrentes da execuÃ§Ã£o desta lei correrÃ£o por conta de dotaÃ§Ãµes\r\norÃ§amentarias prÃ³prias suplementadas se necessÃ¡rio.\r\nArt. 4Âº Esta lei entra em vigor na data de sua publicaÃ§Ã£o, revogadas as disposiÃ§Ãµes em\r\ncontrÃ¡rio.\r\nSala das ComissÃµes, 02 de Dezembro de 2015. Ã€s ComissÃµes competentes.\"', '10', 6, 2, NULL, 1, NULL),
(5, 'PROJETO DE LEI 01-00562/2014', '\"Estabelece adoÃ§Ã£o de combustÃ­veis menos poluentes para geradores no Ã¢mbito do\r\nmunicÃ­pio de SÃ£o Paulo e dÃ¡ outras providÃªncias.\r\nA CÃ‚MARA MUNICIPAL DE SÃƒO PAULO DECRETA:\r\nArt. 1Âº. Os novos geradores a combustÃ£o a serem instalados, fixos ou contratados,\r\npara uso eventual ou contÃ­nuo em edificaÃ§Ãµes, sistemas de emergÃªncias, panes de energia,\r\ngeraÃ§Ã£o de energia em horÃ¡rio de ponta ou tempo integral, em obras, eventos, fornecimento de\r\nexcedente Ã  rede pÃºblica e outros usos, deverÃ£o adotar combustÃ­veis de baixa emissÃ£o de\r\ngases de efeito estufa e de outros poluentes como Ã³xidos de enxofre e material particulado e\r\nem modelos que conduzam a menor geraÃ§Ã£o de ruÃ­do que equipamentos a diesel, a partir de\r\n2017, devendo-se optar por etanol, biodiesel B100 (puro), biodiesel de cana, biogÃ¡s ou gÃ¡s\r\nnatural.\r\nArt. 2Âº. Os geradores fixos existentes deverÃ£o adotar um sistema apto a consumir o\r\nbiodiesel B100 (puro) ou mistura em que 60% mÃ­nimo do diesel seja substituÃ­do por\r\ncombustÃ­veis de matriz mais limpa elencados no art. 1Âº, atÃ© o mÃªs de dezembro do ano de\r\n2018.\r\nArt. 3Âº. O descumprimento do disposto na presente Lei sujeitarÃ¡ o infrator Ã s seguintes\r\npenalidades:\r\nI - advertÃªncia;\r\nII - multa de R$ 1.000,00 (mil reais) e em valor dobrado no caso de reincidÃªncia.\r\nParÃ¡grafo Ãºnico. A multa de que trata o \"caput\" deste artigo serÃ¡ atualizada anualmente\r\npela variaÃ§Ã£o do Ãndice de PreÃ§os ao Consumidor Amplo - IPCA, apurado pelo Instituto\r\nBrasileiro de Geografia e EstatÃ­stica - IBGE, acumulada no exercÃ­cio anterior, sendo que, no\r\ncaso de extinÃ§Ã£o deste Ã­ndice, serÃ¡ aplicado outro que venha a substitui-lo.\r\nArt. 4Âº. As despesas decorrentes da implantaÃ§Ã£o desta lei correrÃ£o por conta das\r\ndotaÃ§Ãµes orÃ§amentÃ¡rias prÃ³prias, suplementadas se necessÃ¡rio.\r\nArt. 5Âº. O Poder Executivo regulamentarÃ¡ a presente lei, no que couber, no prazo\r\nmÃ¡ximo de 90 (noventa) dias, contados da data de sua publicaÃ§Ã£o.\r\nArt. 6Âº. Esta lei entra em vigor na data da sua publicaÃ§Ã£o.\r\nSala das SessÃµes, 15 de dezembro de 2014. Ã€s ComissÃµes competentes.\"', '4', 10, NULL, NULL, 0, NULL),
(6, 'PROJETO DE LEI 01-00458/2015', '\"DispÃµe sobre a prioridade do atendimento nas Unidades de SaÃºde do MunicÃ­pio de\r\nSÃ£o Paulo, Ã  todas as mulheres, com menos de 60 (sessenta) anos e que tenham sob sua\r\nresponsabilidade pessoa com necessidade de cuidados especiais.\r\nA CÃ¢mara Municipal de SÃ£o Paulo DECRETA:\r\nArtigo 1Âº - Ã‰ obrigatÃ³rio o atendimento prioritÃ¡rio nas Unidades de SaÃºde do MunicÃ­pio\r\nde SÃ£o Paulo, Ã  todas as mulheres, com menos de 60 (sessenta) anos, que tenham sob sua\r\nresponsabilidade pessoa com necessidade de cuidados especiais.\r\nÂ§ 1Âº - Entende-se como pessoa com necessidade de cuidados especiais, aquelas que\r\nnÃ£o puderem exercer, de forma autÃ´noma, seus atos cotidianos sem estarem representadas ou\r\nassistidas e ou nÃ£o tiverem discernimento, e os que nÃ£o puderem manifestar a sua vontade,\r\nmesmo que em presente ocasiÃ£o, em decorrÃªncia de:\r\nI - doenÃ§a grave, permanente ou terminal;\r\nII - que apresente ausÃªncia ou disfunÃ§Ã£o de uma estrutura psÃ­quica ou fisiolÃ³gica.\r\nArtigo 2Âº - O benefÃ­cio Ã© direcionado Ã s mulheres:\r\nI - com menos de 60 (sessenta) anos;\r\nII - que nÃ£o esteja exercendo qualquer atividade profissional;\r\nIII - que nÃ£o exerÃ§a essa funÃ§Ã£o em troca de salÃ¡rio, ou qualquer outra forma de\r\nremuneraÃ§Ã£o.\r\nArtigo 3Âº - As mulheres que poderÃ£o usufruir deste benefÃ­cio, deverÃ£o comprovar sua\r\ncondiÃ§Ã£o mediante declaraÃ§Ã£o da pessoa portadora da necessidade dos cuidados, ou de seu\r\nrepresentante legal.\r\nArtigo 4Âº - Os critÃ©rios para apreciaÃ§Ã£o e aprovaÃ§Ã£o do benefÃ­cio, deverÃ£o ser\r\napresentados e validados pela Secretaria de AssistÃªncia Social do MunicÃ­pio de SÃ£o Paulo. A\r\nserem vistos:\r\nI - RelatÃ³rio mÃ©dico que comprove a condiÃ§Ã£o da pessoa que necessita dos cuidados,\r\ne o nÃºmero do CID (classificaÃ§Ã£o internacional de doenÃ§as) correspondente;\r\nII - DeclaraÃ§Ã£o da pessoa portadora da necessidade dos cuidados, ou de seu\r\nrepresentante legal, que comprove que a requerente ao benefÃ­cio Ã© a pessoa responsÃ¡vel\r\npelos cuidados;\r\nIII - Documento pessoal com foto, para a identificaÃ§Ã£o da requerente ao benefÃ­cio.\r\nArtigo 5Âº - O Ã³rgÃ£o em questÃ£o, encarregado de validar o proposto, deverÃ¡ emitir uma\r\ndeclaraÃ§Ã£o positivando o benefÃ­cio Ã  requerente.\r\nÂ§1Âº - O modelo, forma e conteÃºdo desta declaraÃ§Ã£o serÃ¡ regulamentada pelos Ã“rgÃ£os\r\nresponsÃ¡veis em controlar e fiscalizar o benefÃ­cio, no prazo mÃ¡ximo de 45 dias apÃ³s a\r\npublicaÃ§Ã£o desta Lei.\r\nArtigo 6Âº - Este benefÃ­cio terÃ¡ a validade de 1 (um) ano, devendo ser revalidado apÃ³s o\r\ntÃ©rmino deste perÃ­odo com a documentaÃ§Ã£o mencionada atualizada.\r\nArtigo 7Âº - As despesas decorrentes desta lei correrÃ£o por conta de dotaÃ§Ãµes\r\norÃ§amentÃ¡rias prÃ³prias, suplementadas se necessÃ¡rio.\r\nArtigo 8Âº - Esta lei entrarÃ¡ em vigor na data de sua publicaÃ§Ã£o. Ã€s ComissÃµes\r\ncompetentes.\"', '13', 8, NULL, NULL, NULL, 0),
(7, 'PROJETO DE LEI 272/2016', '\"Define a omissÃ£o de receita como infraÃ§Ã£o Ã  legislaÃ§Ã£o tributÃ¡ria, bem como dispÃµe\r\nsobre a sua caracterizaÃ§Ã£o e a aplicaÃ§Ã£o de multa aos infratores.\r\nArt. 1Âº Constitui infraÃ§Ã£o Ã  legislaÃ§Ã£o tributÃ¡ria a omissÃ£o de receita, caracterizada\r\ncomo a nÃ£o escrituraÃ§Ã£o contÃ¡bil ou fiscal, pelo sujeito passivo, de receitas por ele auferidas,\r\nque acarrete a reduÃ§Ã£o da base de cÃ¡lculo de tributo de competÃªncia do MunicÃ­pio.\r\nArt. 2Âº Caracterizam-se ainda como omissÃ£o de receita, sem prejuÃ­zo de outros\r\ncomportamentos enquadrÃ¡veis no artigo 1Âº desta lei:\r\nI - a supressÃ£o ou reduÃ§Ã£o de tributo, mediante conduta definida como crime contra a\r\nordem tributÃ¡ria;\r\nII - a entrada de numerÃ¡rio, de origem nÃ£o comprovada por documento hÃ¡bil;\r\nIII - a escrituraÃ§Ã£o de suprimentos sem documentaÃ§Ã£o hÃ¡bil, idÃ´nea ou coincidente, em\r\ndatas e valores, com as importÃ¢ncias entregues pelo supridor, ou sem comprovaÃ§Ã£o da\r\ndisponibilidade financeira deste;\r\nIV - a falta de escrituraÃ§Ã£o nos livros contÃ¡beis de pagamentos efetuados;\r\nV - a ocorrÃªncia de saldo credor nas contas do ativo circulante ou do realizÃ¡vel;\r\nVI - a efetivaÃ§Ã£o de pagamento sem a correspondente disponibilidade financeira;\r\nVII - qualquer irregularidade verificada em mÃ¡quinas registradoras, relÃ³gios,\r\n\"hardwares\", \"softwares\" ou similares, utilizados pelo contribuinte, que importe em supressÃ£o\r\nou reduÃ§Ã£o de tributo, ressalvados os casos de defeitos devidamente comprovados por oficinas\r\nou profissionais habilitados;\r\nVIII - a indicaÃ§Ã£o na escrituraÃ§Ã£o contÃ¡bil de saldo credor de caixa;\r\nIX - a falta de emissÃ£o de nota fiscal na prestaÃ§Ã£o de serviÃ§os;\r\nX - os saldos bancÃ¡rios e aplicaÃ§Ãµes financeiras mantidos em instituiÃ§Ã£o financeira sem\r\norigem desses recursos.\r\nArt. 3Âº Os infratores sujeitam-se Ã  multa equivalente a 100% (cem por cento) do valor\r\ndo tributo suprimido, atualizada monetariamente na forma da legislaÃ§Ã£o municipal, sem\r\nprejuÃ­zo de outras sanÃ§Ãµes porventura aplicÃ¡veis.\r\nArt. 4Âº A imposiÃ§Ã£o da multa prevista no artigo 3Âº desta lei:\r\nI - nÃ£o exclui a obrigaÃ§Ã£o do infrator de pagar o tributo com incidÃªncia de multa\r\nmoratÃ³ria, juros e atualizaÃ§Ã£o monetÃ¡ria;\r\nII - nÃ£o exime o infrator do cumprimento das obrigaÃ§Ãµes tributÃ¡rias acessÃ³rias e de\r\noutras sanÃ§Ãµes cÃ­veis, administrativas ou criminais que couberem.\r\nArt. 5Âº Verificada a ocorrÃªncia de quaisquer das hipÃ³teses previstas nos artigos 1Âº e 2Âº\r\ndesta lei, a AdministraÃ§Ã£o TributÃ¡ria Municipal deverÃ¡ arbitrar a base de cÃ¡lculo do tributo\r\ndevido.', '7', 11, NULL, NULL, NULL, NULL),
(8, 'PROJETO DE LEI NÂ°. 38/2011', 'Autoriza o Poder Executivo, por intermÃ©dio da SAE - SuperintendÃªncia de Ãgua e Esgoto -, a receber doaÃ§Ãµes de seus usuÃ¡rios Ã  AssociaÃ§Ã£o da Santa Casa de MisericÃ³rdia de Ourinhos, incluindo o valor da contribuiÃ§Ã£o na fatura de consumo de Ã¡gua. As doaÃ§Ãµes sÃ£o de natureza facultativa e nÃ£o geram quaisquer Ã´nus ou obrigaÃ§Ãµes aos usuÃ¡rios, devendo os valores arrecadados serem lanÃ§ados separadamente na conta mensal de serviÃ§os.', '4', 13, NULL, NULL, NULL, 0),
(9, 'PROJETO DE LEI NÂ°. 37/2011', 'Autoriza o Poder Executivo, por intermÃ©dio da SAE - SuperintendÃªncia de Ãgua e Esgoto -, a receber doaÃ§Ãµes de seus usuÃ¡rios Ã  APAE - AssociaÃ§Ã£o de Pais e Amigos dos Excepcionais. incluindo o valor da contribuiÃ§Ã£o na fatura de consumo de Ã¡gua. Para Vadinho, a cobranÃ§a desta doaÃ§Ã£o mensal, com a devida autorizaÃ§Ã£o, na fatura de consumo de Ã¡gua dos sÃ³cios/contribuintes, proporcionarÃ¡ melhor comodidade aos colaboradores, alÃ©m de diminuir as despesas da APAE com cobradores. CaberÃ¡ Ã  SAE somente efetuar os repasses dos recursos recebidos Ã  APAE.', '9', 12, NULL, NULL, NULL, NULL),
(10, 'PROJETO DE LEI NÂ°. 112/2010', 'Fica criado o Programa Municipal de Desenvolvimento de Agrovilas, visando a implementaÃ§Ã£o de nÃºcleos habitacionais rurais com uma infra-estrutura que permita a interaÃ§Ã£o entre homem, trabalho e meio ambiente e seu desenvolvimento econÃ´mico, social e cultural. Na justificativa, o vereador afirma que as agrovilas representam a possibilidade de fixar os jovens no campo, atravÃ©s da disponibilizaÃ§Ã£o a seus moradores de serviÃ§os de educaÃ§Ã£o, saÃºde, cultura, esporte e lazer.', '2', 7, NULL, NULL, NULL, 1),
(11, 'PROJETO DE LEI 01', 'blah blah blah blah', '9', 8, NULL, NULL, NULL, 1),
(12, 'Projeto de Teste 1', 'Autoriza o Poder Executivo, por intermÃ©dio da SAE - SuperintendÃªncia de Ãgua e Esgoto -, a receber doaÃ§Ãµes de seus usuÃ¡rios Ã  APAE - AssociaÃ§Ã£o de Pais e Amigos dos Excepcionais. incluindo o valor da contribuiÃ§Ã£o na fatura de consumo de Ã¡gua. Para Vadinho, a cobranÃ§a desta doaÃ§Ã£o mensal, com a devida autorizaÃ§Ã£o, na fatura de consumo de Ã¡gua dos sÃ³cios/contribuintes, proporcionarÃ¡ melhor comodidade aos colaboradores, alÃ©m de diminuir as despesas da APAE com cobradores. CaberÃ¡ Ã  SAE somente efetuar os repasses dos recursos recebidos Ã  APAE.', 'Autor do Projeto de Teste', 14, NULL, NULL, NULL, 0),
(13, 'Projeto com comissÃµes', 'DescriÃ§Ã£o', 'Autor', 5, NULL, NULL, NULL, 1),
(14, 'Projeto de Lei - NÂ° 5', 'Projeto referente as verbas para a faculdade da ibiapabada', 'Fabricio F Fernadnes', 2, NULL, NULL, NULL, 1),
(16, 'Novo projeto de teste', 'DescriÃ§Ã£o do novo projeto de teste', 'Autor do projeto', 0, NULL, NULL, NULL, NULL);

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
(1, 'TOINHO', 'FRANCISCO ANTONIO SILVA CARDOSO', 'cleber', NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/8d0ab127f56849b15f4860669227e940.jpg', 17, 1, NULL, 0),
(2, 'ERANILDO FONTENELE', 'ERANILDO FONTENELE XAVIER', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/b1777e773c23e51f3e2fff5a8f0b968b.jpg', 10, NULL, 1, 0),
(3, 'NEIDE BRITO', 'IVONEIDE DA SILVA BRITO', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/83fa26381b6ccffe4f16b63c2caf4eff.jpg', 15, 1, NULL, 0),
(4, 'MANUEL ALVES', 'MANUEL ALVES DE SOUSA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/30185d14d266f8462e1976f3896eb941.jpg', 12, 1, NULL, 0),
(5, 'EDILSON NOGUEIRA', 'FRANCISCO EDILSON NOGUEIRA DE SOUSA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/71db22245c41ab464aae0032025e25ec.jpg', 10, 1, NULL, 0),
(6, 'DANIEL LIMA', 'DANIEL NILSON SÃ LIMA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/94bc012d9685aa02ec93efcf0d9c3ee7.jpg', 16, 1, NULL, 0),
(7, 'JOÃƒO MAMEDE', 'JOÃƒO MAMEDE DOS SANTOS', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/3e68373c3ca5a0313ce241f2a658373d.jpg', 10, NULL, NULL, 0),
(8, 'NEURIMAR SIQUEIRA', 'NEURIMAR SIQUEIRA DA SILVA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/2175785e28cb293ab5269f9a23312dfd.jpg', 10, NULL, 3, 0),
(9, 'EDIOMAR DE CARVALHO', 'EDIOMAR DE CARVALHO SILVA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/6e457a4b8e95a675e3a440d9a363a280.jpg', 10, NULL, NULL, 0),
(10, 'NEVES', 'ERNEVALDO PAULINO DE OLIVEIRA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/8eea436dae3b26e0ba7c92b9908dfb78.jpg', 12, 1, NULL, 0),
(11, 'EDIMAR GABRIEL', 'EDIMAR GABRIEL DA ROCHA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/dd0b151ffd904ad9305b84c5e9df7a63.jpg', 15, NULL, 5, 0),
(12, 'JUDITE FONTENELE', 'JUDITE ANA DE BRITO FONTENELE', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/2d19d1de2976c9e3e12137099575152d.jpg', 12, NULL, NULL, 0),
(13, 'EDNALDO FONTENELE', 'FRANCISCO EDNALDO FONTENELE XAVIER', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/9587d1adb9328caa4715a104918dc1d3.jpg', 9, 1, NULL, 0),
(14, 'LUCINETE BRITO', 'MARIA LUCINETE DE SOUSA BRITO', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/dd3cac19da9eb4b8f761d67f3e7c4476.jpg', 5, NULL, 4, 0),
(15, 'PROF. NEIDE PEREIRA', 'MARIA NEIDE PEREIRA DA SILVA', NULL, NULL, '', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '../auxiliares/fotos/3c951754b0f84f3bd46c676c9642414a.jpg', 10, NULL, 2, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2605;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
