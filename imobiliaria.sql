-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/05/2024 às 23:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alugueis`
--

CREATE TABLE `alugueis` (
  `id` int(11) NOT NULL,
  `imovel` int(11) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `data` date NOT NULL,
  `data_pgto` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `inquilino` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `alugueis`
--

INSERT INTO `alugueis` (`id`, `imovel`, `corretor`, `valor`, `ativo`, `data`, `data_pgto`, `data_inicio`, `data_final`, `inquilino`) VALUES
(1, 137, '555.555.555-66', 750.00, 'Sim', '2020-08-12', '2020-09-11', '2020-08-12', '2025-08-12', '111.111.111-19'),
(2, 170, '555.555.555-66', 1000.00, 'Sim', '2020-08-12', '2020-09-11', '2020-08-12', '2029-08-12', '111.111.111-11'),
(3, 179, '555.555.555-66', 750.00, 'Sim', '2020-07-14', '2020-08-13', '2020-07-14', '2022-07-14', '111.111.111-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

CREATE TABLE `bairros` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`, `cidade`) VALUES
(1, 'Centro', 1),
(2, 'Barra Funda', 1),
(3, 'Jardim Itamaraty ', 1),
(4, 'Santa Carolina', 1),
(5, 'Nova Leme', 1),
(6, 'Cidade Jardim', 3),
(7, 'Jardim Alvorada', 2),
(8, 'Jardim das Árvores', 2),
(9, 'Jardim Nova Europa', 2),
(10, 'Jardim São Conrado', 2),
(11, 'Centro', 2),
(12, 'Centro', 4),
(13, 'Jardim Andrea', 4),
(14, 'Jardim da Enseada', 4),
(15, 'Jardim Alto das Águas', 4),
(16, 'Vila Portal do Lago', 4),
(17, 'Jardim América', 3),
(18, 'Jardim Bandeirantes', 3),
(19, 'Jardim Brasília', 3),
(20, 'Jardim das Laranjeiras', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`) VALUES
(1, 'Leme'),
(2, 'Araras'),
(3, 'Pirassununga'),
(4, 'Santa Cruz da Conceição');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compradores`
--

CREATE TABLE `compradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  `doc` varchar(25) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `corretor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `compradores`
--

INSERT INTO `compradores` (`id`, `nome`, `tipo_pessoa`, `doc`, `telefone`, `endereco`, `corretor`) VALUES
(1, 'Marcos Campos', 'Fisica', '111.111.111-11', '(11) 11111-111', 'Rua CC', '555.555.555-66'),
(2, 'Matheus Silva', 'Fisica', '111.111.111-20', '(11) 11111-111', 'Rua C', '555.555.555-66'),
(3, 'Carla Silva', 'Fisica', '111.111.111-19', '(11) 11111-111', 'Rua X', '555.555.555-66'),
(8, 'Empresa X', 'Juridica', '58.588.888/8888-88', '(88) 88888-8888', 'Rua 5', '555.555.555-66'),
(10, 'Fabio Freita', 'Fisica', '789.999.999-99', '(33) 33333-3333', 'Rua C', '999.996.666-66'),
(12, 'fsdfsaf', 'Fisica', '1236554', '33222', 'Rua A', '555.555.555-66'),
(13, 'dsfsdfsdffsd', 'Fisica', 'fdsffdsf', 'dsfsfds', 'fsfdfa', '555.555.555-66'),
(14, 'Maurilio', 'Fisica', 'fsdsf', 'fddsfdsf', 'dsfsfa', '555.555.555-66'),
(15, 'Matheus Campos', 'Juridica', '111111113', '333333333', 'Rua C', '555.555.555-66'),
(16, 'Maurilio', 'Fisica', 'fsdsf', 'fddsfdsf', 'dsfsfa', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(40) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `tesoureiro` varchar(20) DEFAULT NULL,
  `data` date NOT NULL,
  `foto` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id`, `valor`, `titulo`, `descricao`, `pago`, `tesoureiro`, `data`, `foto`) VALUES
(1, 750.00, 'Aluguel', 'Paula Campos', 'Não', '', '2020-07-13', '1594749125479conta2.png'),
(2, 380.00, 'Compra de Vidro', 'Vidro Janela', 'Sim', '777.777.777-77', '2020-07-14', NULL),
(3, 1000.00, 'Aluguel', 'Empreza Zx', 'Sim', '', '2020-07-14', NULL),
(4, 780.00, 'Pagamento Conta', 'Conta de Luz', 'Sim', '777.777.777-77', '2020-07-14', '1594772511596conta2.png'),
(5, 1000.00, 'Aluguel', 'Empreza Zx', 'Sim', '', '2020-07-14', NULL),
(6, 750.00, 'Aluguel', 'Paula Campos', 'Não', '', '2020-07-14', 'conta.jpg'),
(7, 750.00, 'Aluguel', 'Paula Campos', 'Sim', '', '2020-07-14', NULL),
(8, 480.00, 'Pagamento Conta', 'Conta de Água', 'Sim', '777.777.777-77', '2020-07-14', '1594774308000conta2.png'),
(9, 750.00, 'Aluguel', 'Paula Campos', 'Sim', '777.777.777-77', '2020-08-10', NULL),
(10, 1000.00, 'Aluguel', 'Empreza Zx', 'Sim', '', '2020-08-11', NULL),
(11, 1600.00, 'Compra de Cadeiras', 'Cadeiras Escritrio', 'Sim', '777.777.777-77', '2020-08-11', NULL),
(16, 685.00, 'Conta de Luz', 'Mês de Agosto', 'Sim', '777.777.777-77', '2020-08-12', NULL),
(17, 50.00, 'Conta X', 'Pagamento', 'Sim', '777.777.777-77', '2020-08-12', NULL),
(18, 860.00, 'Conta de Luz', 'Mês de Agosto', 'Sim', '777.777.777-77', '2020-08-12', NULL),
(19, 750.00, 'Aluguel', 'Paula Campos', 'Não', '', '2020-08-12', NULL),
(20, 1000.00, 'Aluguel', 'Empreza Zx', 'Não', '', '2020-08-12', NULL),
(21, 750.00, 'Aluguel', 'Paula Campos', 'Não', '', '2020-08-12', NULL),
(22, 1000.00, 'Aluguel', 'Empreza Zx', 'Não', '', '2020-08-12', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `pago` varchar(5) NOT NULL,
  `cliente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id`, `valor`, `titulo`, `descricao`, `tipo`, `corretor`, `data`, `pago`, `cliente`) VALUES
(7, 750.00, 'Pagamento Aluguel', 'Empresa X', 'Aluguel', '555.555.555-66', '2020-07-13', 'Sim', '58.588.888/8888-88'),
(8, 1000.00, 'Pagamento Aluguel', 'Marcos Campos', 'Aluguel', '555.555.555-66', '2020-07-14', 'Sim', '111.111.111-11'),
(9, 185000.00, 'Pagamento Venda', 'Carla Silva', 'Venda', '555.555.555-66', '2020-07-13', 'Sim', '111.111.111-19'),
(10, 750.00, 'Pagamento Aluguel', 'Matheus Silva', 'Aluguel', '777.777.777-77', '2020-07-14', 'Sim', '111.111.111-20'),
(11, 750.00, 'Pagamento Aluguel', 'Matheus Silva', 'Aluguel', '555.555.555-66', '2020-07-14', 'Sim', '111.111.111-20'),
(12, 1000.00, 'Pagamento Aluguel', 'Matheus Silva', 'Aluguel', '555.555.555-66', '2020-07-14', 'Sim', '111.111.111-20'),
(13, 980000.00, 'Pagamento Venda', 'Empresa X', 'Venda', '555.555.555-66', '2020-07-14', 'Sim', '58.588.888/8888-88'),
(14, 1000.00, 'Pagamento Aluguel', 'Carla Silva', 'Aluguel', '555.555.555-66', '2020-07-14', 'Não', '111.111.111-19'),
(15, 750.00, 'Pagamento Aluguel', 'Marcos Campos', 'Aluguel', '555.555.555-66', '2020-07-14', 'Não', '111.111.111-11'),
(16, 750.00, 'Pagamento Aluguel', 'Marcos Campos', 'Aluguel', '555.555.555-66', '2020-07-14', 'Sim', '111.111.111-11'),
(17, 750.00, 'Pagamento Aluguel', 'Maurilio', 'Aluguel', '555.555.555-66', '2020-08-10', 'Sim', 'fsdsf'),
(18, 60.00, 'Venda de Cadeiras', 'Venda ', 'Diversos', '777.777.777-77', '2020-08-10', 'Sim', ''),
(19, 1000.00, 'Pagamento Aluguel', 'Matheus Campos', 'Aluguel', '555.555.555-66', '2020-08-11', 'Sim', '111111113'),
(20, 680000.00, 'Pagamento Venda', 'Carla Silva', 'Venda', '555.555.555-66', '2020-08-11', 'Sim', '111.111.111-19'),
(22, 750.00, 'Pagamento Aluguel', 'Maurilio', 'Aluguel', '555.555.555-66', '2020-08-12', 'Não', 'fsdsf'),
(23, 1000.00, 'Pagamento Aluguel', 'Matheus Campos', 'Aluguel', '555.555.555-66', '2020-08-12', 'Não', '111111113'),
(24, 550.00, 'Pagamento Venda', 'Carla Silva', 'Venda', '555.555.555-66', '2020-08-12', 'Não', '111.111.111-19'),
(25, 750.00, 'Pagamento Aluguel', 'Carla Silva', 'Aluguel', '555.555.555-66', '2020-08-12', 'Não', '111.111.111-19'),
(26, 1000.00, 'Pagamento Aluguel', 'Marcos Campos', 'Aluguel', '555.555.555-66', '2020-08-12', 'Não', '111.111.111-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `corretores`
--

CREATE TABLE `corretores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descricao` varchar(90) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `corretores`
--

INSERT INTO `corretores` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `foto`, `descricao`, `twitter`, `facebook`) VALUES
(1, 'Marcelo Silva', '555.555.555-55', '(22) 22222-2222', 'marcelo@hotmail.com', 'Rua A', '1593540722860agent-1.jpg', NULL, NULL, NULL),
(2, 'Paloma Campos', '555.555.555-15', '(22) 22222-2233', 'paloma@hotmail.com', 'Rua Almeida Campos 150', '1593540760968agent-5.jpg', NULL, NULL, NULL),
(4, 'Mauricio', '999.999.999-15', '(77) 77777-7777', 'aaa@hugocursos.com.br', 'afsdfafdfa', '1593544359932agent-2.jpg', NULL, NULL, NULL),
(5, 'Marta SIlva', '645.555.555-55', '(99) 88888-8855', 'marta@hotmail.com', 'Rua XX', '1593544631752profile-agent.jpg', NULL, NULL, NULL),
(6, 'Pedro Freitas', '594.555.454-54', '(65) 55555-5555', 'pedro@hotmail.com', 'Rua A', '1593544655113agent-4.jpg', 'Enquanto não encontrar sua casa dos sonhos eu não irei desistir!!', NULL, NULL),
(7, 'Carlos Souza', '665.555.555-55', '(55) 55555-5555', 'carlos@hotmail.com', 'Rua C', '1593544683057agent-6.jpg', 'Atuo há 10 anos no ramo imobiliário, sempre encontrando os melhores imóveis!!', NULL, NULL),
(13, 'Corretor Teste', '555.555.555-66', '(31) 97527-5084', 'corretor@hotmail.com', 'Rua Almeida Campos 150', '1593546386210agent-2.jpg', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'https://www.facebook.com/hugovasconcelosfreitas/', 'https://www.facebook.com/hugovasconcelosfreitas/'),
(18, 'Pedro Silva', '999.996.666-66', '(22) 22222-2222', 'pedro@hotmail.com', '', '1594696396713agent-4.jpg', ' Atuo hÃÂ¡ 16 anos no mercado, sempre buscando as melhores oportunidades!! ', '', ''),
(19, 'Amanda', '555.555.555-59', '(55) 55555-5555', 'amanda@hotmail.com', 'bbbbbbbb', '1593540760968agent-5.jpg', NULL, NULL, NULL),
(22, 'Marcilio Silva', '123.456.985-00', '(55) 55555-55', 'marcilio@hotmail.com', 'Rua A', '1593540334911agent-1.jpg', NULL, NULL, NULL),
(24, 'Maria', '111.222.333-85', '(33) 33333-333', 'maria@hotmail.com', 'Rua A', '1593544631752profile-agent.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `valor_corretor` decimal(10,2) NOT NULL,
  `valor_caixa` decimal(10,2) NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `entradas`
--

INSERT INTO `entradas` (`id`, `valor`, `tesoureiro`, `corretor`, `valor_corretor`, `valor_caixa`, `data`, `tipo`) VALUES
(1, 1000.00, '777.777.777-77', '555.555.555-66', 70.00, 30.00, '2020-07-13', 'Aluguel'),
(2, 750.00, '777.777.777-77', '555.555.555-66', 22.50, 52.50, '2020-07-14', 'Aluguel'),
(3, 185000.00, '777.777.777-77', '555.555.555-66', 5550.00, 12950.00, '2020-07-14', 'Venda'),
(4, 750.00, '777.777.777-77', '555.555.555-66', 22.50, 52.50, '2020-07-14', 'Aluguel'),
(5, 980000.00, '777.777.777-77', '555.555.555-66', 29400.00, 68600.00, '2020-07-14', 'Venda'),
(6, 750.00, '777.777.777-77', '555.555.555-66', 22.50, 52.50, '2020-07-14', 'Aluguel'),
(7, 750.00, '777.777.777-77', '555.555.555-66', 22.50, 52.50, '2020-08-10', 'Aluguel'),
(8, 1000.00, '777.777.777-77', '555.555.555-66', 30.00, 70.00, '2020-08-11', 'Aluguel'),
(9, 750.00, '777.777.777-77', '555.555.555-66', 22.50, 52.50, '2020-08-11', 'Aluguel'),
(10, 680000.00, '777.777.777-77', '555.555.555-66', 20400.00, 47600.00, '2020-08-11', 'Venda'),
(11, 1000.00, '777.777.777-77', '555.555.555-66', 30.00, 70.00, '2020-08-12', 'Aluguel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `id_imovel` int(11) NOT NULL,
  `imagem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`id`, `id_imovel`, `imagem`) VALUES
(16, 135, '159439662148109.jpg'),
(17, 135, '159439662534808.jpeg'),
(18, 135, '159439662850207.jpeg'),
(19, 135, '159439663227606.jpg'),
(20, 170, '159439664278301.jpg'),
(21, 170, '159439664609002.jpg'),
(22, 170, '159439664910503.jpg'),
(23, 170, '159439665258404.jpg'),
(24, 137, '159439677338704.jpg'),
(25, 137, '159439677754306.jpg'),
(26, 137, '159439678133807.jpeg'),
(27, 138, '159449639273502.jpg'),
(28, 138, '159449639669705.jpg'),
(29, 138, '159449640017706.jpg'),
(30, 138, '159449640402507.jpeg'),
(31, 136, '159449650147605.jpg'),
(32, 136, '159449650497504.jpg'),
(33, 136, '159449650842206.jpg'),
(34, 171, '159449659000707.jpeg'),
(35, 171, '159449659347908.jpeg'),
(36, 171, '159449659803501.jpg'),
(37, 169, '159449661724402.jpg'),
(38, 169, '159449662008903.jpg'),
(39, 169, '159449662437705.jpg'),
(40, 174, '159469310813405.jpg'),
(41, 174, '159469311412906.jpg'),
(42, 174, '159469311922608.jpeg'),
(43, 174, '159469415524302.jpg'),
(44, 174, '159469417979201.jpg'),
(45, 174, '159469421130509.jpg'),
(46, 175, '159469448383208.jpeg'),
(47, 175, '159469448637101.jpg'),
(48, 175, '159469448947909.jpg'),
(49, 176, '1594694659282sitios.jpg'),
(50, 176, '159469466730705.jpg'),
(51, 177, '159469479840302.jpg'),
(53, 177, '159469481090206.jpg'),
(54, 178, '159469492777505.jpg'),
(55, 178, '159469493110807.jpeg'),
(56, 179, '159469502576801.jpg'),
(57, 179, '159469502887707.jpeg'),
(58, 179, '159469503188703.jpg'),
(59, 179, '159469503476109.jpg'),
(60, 180, '1594765274507lote.png'),
(61, 180, '1594765311731lotes.jpg'),
(64, 0, ''),
(65, 0, ''),
(66, 0, ''),
(67, 0, '06.jpg'),
(68, 169, '06.jpg'),
(70, 177, '01.jpg'),
(71, 177, '07.jpeg'),
(72, 181, '04.jpg'),
(73, 181, '06.jpg'),
(74, 181, '08.jpeg'),
(75, 184, '03.jpg'),
(76, 184, '02.jpg'),
(77, 184, '05.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `vendedor` varchar(25) NOT NULL,
  `corretor` varchar(25) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cidade` int(11) NOT NULL,
  `bairro` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `ano` int(11) NOT NULL,
  `visitas` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `quartos` int(11) NOT NULL,
  `banheiros` int(11) NOT NULL,
  `suites` int(11) NOT NULL,
  `garagens` int(11) NOT NULL,
  `piscinas` int(11) NOT NULL,
  `img_principal` varchar(100) NOT NULL,
  `img_planta` varchar(100) NOT NULL,
  `img_banner` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `condicao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `vendedor`, `corretor`, `titulo`, `descricao`, `tipo`, `cidade`, `bairro`, `valor`, `ano`, `visitas`, `area`, `quartos`, `banheiros`, `suites`, `garagens`, `piscinas`, `img_principal`, `img_planta`, `img_banner`, `endereco`, `status`, `condicao`) VALUES
(135, '99.999.999/9999-99', '555.555.555-66', 'Apartamento 3 Quartos', 'Apartamento com ....', 4, 1, 3, 180000.00, 1990, 0, 75, 3, 2, 1, 6, 0, '159439855577102apto.jpg', '159439659711600000000 floor-plan.jpg', '1594151051512hero-1.jpg', 'Rua Martha Denzin, 150', 'Vendido', 'Usado'),
(136, '111.111.111-11', '555.555.555-66', 'Casa Grande', '', 3, 3, 6, 680000.00, 2010, 0, 850, 4, 4, 2, 6, 1, '1594496535404sitios.jpg', '159449651829000000000-floor-plan.jpg', '1594151110324hero-2.jpg', 'Rua Alameda Samambaias, 565', 'Para Venda', 'Usado'),
(137, '111.111.111-11', '555.555.555-66', 'Apartamento Barato', '', 4, 1, 1, 750.00, 2015, 0, 65, 2, 1, 0, 1, 0, '159449690311603aptoal.jpg', '159439675615400000000 floor-plan.jpg', '159449790483502apto.jpg', 'R. Dr. Querubino Soeiro, 1552', 'Para Aluguel', 'Novo'),
(138, '99.999.999/9999-99', '555.555.555-66', 'Casa Germinada', '', 6, 1, 4, 550.00, 1990, 0, 69, 3, 1, 1, 1, 1, '1594496362611casa.jpg', '159449637504700000000-floor-plan.jpg', '1594395837724chacara.jpg', 'Rua Almeida Campos 150', 'Para Venda', 'Planta'),
(169, '99.999.999/9999-99', '555.555.555-66', 'Cobertura Luxuosa', 'fasfdasf', 4, 1, 1, 500000.00, 0, 0, 250, 4, 5, 3, 3, 1, '159469430110109.jpg', '159449663848400000000-floor-plan.jpg', '1594496830423cobertura.jpg', 'fdsfsaf', 'Para Venda', 'Usado'),
(170, '99.999.999/9999-99', '555.555.555-66', 'Apartamento 2 Quartos', 'Apartamento Localizado em uma das melhores regiões de Belo Horizonte...', 4, 1, 1, 1000.00, 2013, 0, 80, 2, 1, 0, 1, 0, '159439851252201apto.jpg', '159439629533700000000 floor-plan.jpg', '1594151082107hero-2.jpg', 'Rua Almeida Campos 150', 'Alugado', 'Usado'),
(171, '99.999.999/9999-99', '555.555.555-66', 'Casarão 5 Quartos', 'Casa com ....', 4, 1, 1, 980000.00, 2017, 5, 1400, 5, 4, 2, 4, 1, '1594496567912chacara.jpg', '159449657723600000000-floor-plan.jpg', '1594151094510hero-1.jpg', 'Rua Almeida Campos 150', 'Para Venda', 'Usado'),
(174, '887.888.888-99', '999.996.666-66', 'Cobertura Grande', 'Cobertura bem Luxuosa...', 4, 1, 5, 2300.00, 2018, 0, 190, 4, 4, 3, 4, 1, '1594692923901cobertura.jpg', '159469298510200000000-floor-plan.jpg', '1594692972184cobertura.jpg', 'Rua Almeida Campos 150', 'Para Aluguel', 'Usado'),
(175, '111.111.111-11', '555.555.555-66', 'Apartamento Ipiranga', '', 4, 1, 1, 380000.00, 2016, 0, 160, 4, 4, 3, 3, 0, '159469446607801.jpg', 'sem-img.jpg', '159469447535608.jpeg', '', 'Para Venda', 'Usado'),
(176, '99.999.999/9999-99', '555.555.555-66', 'Chácara Grande', 'Linda chácara..', 1, 3, 6, 490000.00, 1996, 0, 2500, 4, 5, 2, 10, 1, '1594694639714chacara.jpg', 'sem-img.jpg', '1594694649435chacara.jpg', '', 'Para Venda', 'Usado'),
(177, '99.999.999/9999-99', '555.555.555-66', 'Apartamento Serra Verde', '', 3, 1, 4, 125000.00, 1996, 0, 65, 3, 2, 1, 1, 0, '159469478878006.jpg', 'sem-img.jpg', '159469479382606.jpg', '', 'Para Venda', 'Usado'),
(178, '111.111.111-11', '555.555.555-66', 'Casa 4 Quartos', '', 3, 1, 3, 225000.00, 1998, 0, 120, 4, 2, 1, 3, 0, '1594694904726casa.webp', 'sem-img.jpg', '1594694917479casa.webp', '', 'Para Venda', 'Usado'),
(179, '111.111.111-11', '555.555.555-66', 'Casa 2 Quartos', '', 3, 1, 2, 750.00, 1991, 0, 65, 2, 1, 0, 1, 0, '159469501585608.jpeg', 'sem-img.jpg', '159469502090308.jpeg', '', 'Alugado', 'Usado'),
(180, '99.999.999/9999-99', '555.555.555-66', 'Lote 2 Mil Metros', '', 7, 3, 6, 80000.00, 2020, 0, 2200, 0, 0, 0, 0, 0, '1594765258003lote.png', 'sem-img.jpg', '1594765267097lotes.jpg', '', 'Para Venda', 'Novo'),
(181, '111.111.111-11', '555.555.555-66', 'Apartamento Centro', 'Apartamento ...', 4, 3, 6, 180.00, 1995, 0, 68, 3, 1, 0, 1, 0, '05.jpg', '00000000 floor-plan.jpg', '08.jpeg', 'Rua Almeida Campos 150', 'Vendido', 'Usado'),
(184, '99.999.999/9999-99', '555.555.555-66', 'Cobertura Excelente', 'Excelente Cobertura em Bairro Bom em Belo ...', 5, 1, 5, 760000.00, 2018, 0, 130, 4, 3, 2, 2, 0, '07.jpeg', '00000000 floor-plan.jpg', '09.jpg', 'Rua A', 'Para Venda', 'Usado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `movimento` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `valor`, `tesoureiro`, `data`) VALUES
(1, 'Entrada', 'Aluguel', 70.00, '777.777.777-77', '2020-07-13'),
(2, 'Entrada', 'Aluguel', 52.50, '777.777.777-77', '2020-07-14'),
(3, 'Entrada', 'Venda', 12950.00, '777.777.777-77', '2020-07-14'),
(4, 'Saída', 'Aluguel', 750.00, '777.777.777-77', '2020-07-14'),
(5, 'Saída', 'Aluguel', 75.00, '777.777.777-77', '2020-07-14'),
(6, 'Saída', 'Aluguel', 675.00, '777.777.777-77', '2020-07-14'),
(7, 'Saída', 'Compra de Vidro', 342.00, '777.777.777-77', '2020-07-14'),
(8, 'Saída', 'Compra de Vidro', 380.00, '777.777.777-77', '2020-07-14'),
(9, 'Entrada', 'Aluguel', 52.50, '777.777.777-77', '2020-07-14'),
(10, 'Entrada', 'Venda', 68600.00, '777.777.777-77', '2020-07-14'),
(11, 'Saída', 'Pagamento Conta', 780.00, '777.777.777-77', '2020-07-14'),
(12, 'Saída', 'Aluguel', 900.00, '777.777.777-77', '2020-07-14'),
(13, 'Entrada', 'Aluguel', 52.50, '777.777.777-77', '2020-07-14'),
(14, 'Saída', 'Aluguel', 675.00, '777.777.777-77', '2020-07-14'),
(15, 'Saída', 'Pagamento Conta', 480.00, '777.777.777-77', '2020-07-14'),
(16, 'Entrada', 'Aluguel', 52.50, '777.777.777-77', '2020-08-10'),
(17, 'Saída', 'Aluguel', 750.00, '777.777.777-77', '2020-08-10'),
(18, 'Saída', 'Aluguel', 750.00, '777.777.777-77', '2020-08-10'),
(19, 'Entrada', 'Pagamento Aluguel', 750.00, '777.777.777-77', '2020-08-10'),
(20, 'Entrada', 'Venda de Cadeiras', 60.00, '777.777.777-77', '2020-08-10'),
(21, 'Entrada', 'Aluguel', 70.00, '777.777.777-77', '2020-08-11'),
(22, 'Entrada', 'Aluguel', 52.50, '777.777.777-77', '2020-08-11'),
(23, 'Entrada', 'Venda', 47600.00, '777.777.777-77', '2020-08-11'),
(24, 'Saída', 'Aluguel', 900.00, '777.777.777-77', '2020-08-11'),
(25, 'Saída', 'Compra de Cadeiras', 1600.00, '777.777.777-77', '2020-08-11'),
(32, 'Saída', 'Conta de Luz', 860.00, '777.777.777-77', '2020-08-12'),
(33, 'Saída', 'Aluguel', 900.00, '777.777.777-77', '2020-08-12'),
(34, 'Entrada', 'Aluguel', 70.00, '777.777.777-77', '2020-08-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `saidas`
--

CREATE TABLE `saidas` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `saidas`
--

INSERT INTO `saidas` (`id`, `valor`, `tesoureiro`, `descricao`, `data`) VALUES
(1, 750.00, '777.777.777-77', 'Aluguel', '2020-07-14'),
(2, 75.00, '777.777.777-77', 'Aluguel', '2020-07-14'),
(3, 675.00, '777.777.777-77', 'Aluguel', '2020-07-14'),
(4, 342.00, '777.777.777-77', 'Compra de Vidro', '2020-07-14'),
(5, 380.00, '777.777.777-77', 'Compra de Vidro', '2020-07-14'),
(6, 780.00, '777.777.777-77', 'Pagamento Conta', '2020-07-14'),
(7, 900.00, '777.777.777-77', 'Aluguel', '2020-07-14'),
(8, 675.00, '777.777.777-77', 'Aluguel', '2020-07-14'),
(9, 480.00, '777.777.777-77', 'Pagamento Conta', '2020-07-14'),
(10, 900.00, '777.777.777-77', 'Aluguel', '2020-08-11'),
(16, 860.00, '777.777.777-77', 'Conta de Luz', '2020-08-12'),
(18, 900.00, '777.777.777-77', 'Aluguel', '2020-08-12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_imovel` varchar(10) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `data`, `hora`, `id_imovel`, `corretor`, `status`) VALUES
(3, 'Ir ao Cartório', 'Verificar Papelada', '2020-07-05', '10:20:00', '', '555.555.555-66', ''),
(4, 'Visita a Imóvel', 'Cliente Paulo César', '2020-07-09', '15:21:00', '171', '555.555.555-66', ''),
(5, 'Visitar Imóvel', 'Cliente Camilo', '2020-07-09', '15:30:00', '171', '555.555.555-66', 'concluida'),
(6, 'Visitar Imóvel', 'Cliente Paula', '2020-07-09', '16:30:00', '171', '555.555.555-66', 'concluida'),
(17, 'Tarefa Teste', 'Teste de Tarefa', '2020-07-09', '21:30:00', '', '555.555.555-66', ''),
(18, 'Visita ao Cliente', 'Cliente Pedro', '2020-07-09', '18:30:00', '', '555.555.555-66', ''),
(19, 'dsdsddsa', 'dsdsadsadsad', '2020-07-13', '10:15:00', '', '999.996.666-66', ''),
(20, 'Visitar Imóvel', 'Cliente Pedro Silva', '2020-07-14', '16:30:00', '171', '555.555.555-66', ''),
(21, 'Ir ao Cartório', 'Papelada', '2020-07-14', '15:10:00', '', '555.555.555-66', ''),
(22, 'Visitar Imóvel', 'Cliente Pedro', '2020-08-10', '02:10:00', '178', '555.555.555-66', 'concluida'),
(23, 'Visitar Imvel', 'Cliente Pedro', '2020-08-10', '18:30:00', '175', '555.555.555-66', ''),
(24, 'Visitar Imóvel', 'Cliente Paula', '2020-08-10', '15:15:00', '177', '555.555.555-66', ''),
(25, 'Ir ao Cartorio', 'Verificar Papeis', '2020-08-10', '18:15:00', '', '555.555.555-66', ''),
(26, 'Visitar Imóvel', 'Cliente Pedro', '2020-08-11', '12:30:00', '171', '555.555.555-66', ''),
(27, 'Visitar Imóvel', 'Cliente Sandrinha', '2020-08-12', '15:10:00', '171', '555.555.555-66', ''),
(28, 'Reunião na Imobiliária', 'Festa Confraternização', '2020-08-12', '15:45:00', '', '555.555.555-66', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tesoureiros`
--

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descricao` varchar(90) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tesoureiros`
--

INSERT INTO `tesoureiros` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `foto`, `descricao`, `twitter`, `facebook`) VALUES
(18, 'Paula Campos', '555.555.555-55', '(22) 22222-2222', 'paula@hotmail.com', 'Rua A', '1594322256615agent-5.jpg', NULL, NULL, NULL),
(19, 'Tesoureiro Testes', '777.777.777-77', '(33) 33333-3333', 'tesoureiro@hotmail.com', 'Rua A', '1594322561490agent-3.jpg', ' aaaaaaaaaaaaaa', '', ''),
(20, 'Gabriela Silva', '456.987.123-5', '(33) 33333-3333', 'gabi@hotmail.com', 'Rua C', '1593544631752profile-agent.jpg', NULL, NULL, NULL),
(23, 'Kamila Campos', '123.333.333-33', '(88) 88888-8888', 'kamila@hotmail.com', 'Rua C', '1593540760968agent-5.jpg', NULL, NULL, NULL),
(24, 'Hugo Vasconcelos', '895.555.555-55', '(33) 33333-3333', 'hugovasconcelosf@hotmail.com', 'Rua A', 'sem-foto.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `imoveis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tipos`
--

INSERT INTO `tipos` (`id`, `nome`, `imagem`, `imoveis`) VALUES
(1, 'Chacara', '1594392956630chacara.jpg', 1),
(2, 'Sitios', '1594392980034sitios.jpg', 0),
(3, 'Casa', '1594392444601casa.jpg', 4),
(4, 'Apartamento', '1594392437195apartamento.jpg', 9),
(5, 'Cobertura', '1594392965147cobertura.jpg', 1),
(6, 'Casa Geminada', '1594494714499casa-geminada.jpg', 1),
(7, 'Lotes', '1594392973025lotes.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `nivel` varchar(35) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `foto`) VALUES
(1, 'Administrador', '000.000.000-00', 'projetoimobiliariahv@gmail.com', '123', 'admin', '1593531424280hugo-profile.jpeg'),
(3, 'Corretor Teste', '555.555.555-66', 'corretor@hotmail.com', '123', 'corretor', '1593546386210agent-2.jpg'),
(8, 'Paula Campos', '555.555.555-55', 'paula@hotmail.com', '123', 'tesoureiro', '1594322256615agent-5.jpg'),
(9, 'Tesoureiro Testes', '777.777.777-77', 'tesoureiro@hotmail.com', '123', 'tesoureiro', '1594322561490agent-3.jpg'),
(10, 'Pedro Silva', '999.996.666-66', 'pedro@hotmail.com', '123', 'corretor', '1594696396713agent-4.jpg'),
(11, 'Marcilio Silva', '123.456.985-00', 'marcilio@hotmail.com', '123', 'corretor', '1593540334911agent-1.jpg'),
(13, 'Maria', '111.222.333-85', 'maria@hotmail.com', '123', 'corretor', '1593544631752profile-agent.jpg'),
(14, 'Gabriela Silva', '456.987.123-5', 'gabi@hotmail.com', '123', 'tesoureiro', '1593544631752profile-agent.jpg'),
(18, 'Kamila Campos', '123.333.333-33', 'kamila@hotmail.com', '123', 'tesoureiro', '1593540760968agent-5.jpg'),
(19, 'Hugo Vasconcelos', '895.555.555-55', 'hugovasconcelosf@hotmail.com', '123', 'tesoureiro', 'sem-foto.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `imovel` int(11) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `data` date NOT NULL,
  `data_pgto` date DEFAULT NULL,
  `comprador` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `imovel`, `corretor`, `valor`, `pago`, `data`, `data_pgto`, `comprador`) VALUES
(2, 135, '555.555.555-66', 185000.00, 'Sim', '2020-07-09', '2020-08-13', '111.111.111-19'),
(3, 138, '555.555.555-66', 550.00, 'Sim', '2020-07-09', '2020-08-12', '111.111.111-19'),
(4, 136, '555.555.555-66', 680000.00, 'Sim', '2020-07-09', '2020-08-11', '111.111.111-19'),
(5, 171, '555.555.555-66', 980000.00, 'Sim', '2020-07-01', '2020-08-14', '58.588.888/8888-88'),
(6, 181, '555.555.555-66', 190000.00, 'Não', '2020-07-14', NULL, NULL),
(7, 181, '555.555.555-66', 180.00, 'Não', '2020-08-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_pessoa` varchar(20) NOT NULL,
  `doc` varchar(25) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `corretor` varchar(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `tipo_pessoa`, `doc`, `telefone`, `endereco`, `corretor`, `foto`) VALUES
(9, 'Paula Campos', 'Fisica', '111.111.111-11', '(55) 55555-5555', 'Rua C', '555.555.555-66', '1593544631752profile-agent.jpg'),
(10, 'Empreza Zx', 'Juridica', '99.999.999/9999-99', '(99) 99999-9999', 'Rua Almeida Campos 150', '555.555.555-66', '1593544683057agent-6.jpg'),
(15, 'Marcos Silva', 'Fisica', '887.888.888-99', '(33) 33333-3333', 'Rua Almeida Campos 150', '999.996.666-66', NULL),
(16, 'Paula', 'Fisica', '787.522.222-22', '(22) 22222-2222', 'Rua C', '555.555.555-66', NULL),
(17, 'Amanda', 'Fisica', '456.322.222-22', '(22) 22222-2222', 'Rua A', '555.555.555-66', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alugueis`
--
ALTER TABLE `alugueis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compradores`
--
ALTER TABLE `compradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `corretores`
--
ALTER TABLE `corretores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alugueis`
--
ALTER TABLE `alugueis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `compradores`
--
ALTER TABLE `compradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `corretores`
--
ALTER TABLE `corretores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tesoureiros`
--
ALTER TABLE `tesoureiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
