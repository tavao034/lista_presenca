-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Set-2024 às 01:14
-- Versão do servidor: 8.0.31
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ccb`
--
CREATE DATABASE IF NOT EXISTS `db_ccb` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `db_ccb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

DROP TABLE IF EXISTS `cards`;
CREATE TABLE IF NOT EXISTS `cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `card` int NOT NULL,
  `id_user` int NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `card`, `id_user`, `data_hora`) VALUES
(32, 12272630, 73, '2024-05-03 01:58:45'),
(41, 12272630, 73, '2024-09-12 23:43:08'),
(40, 10199245, 72, '2024-09-12 23:33:05'),
(39, 30765418, 74, '2024-09-12 23:32:32'),
(38, 12272630, 73, '2024-06-13 23:47:56'),
(37, 19176960, 83, '2024-05-03 02:05:29'),
(36, 30765418, 74, '2024-05-03 02:04:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presents`
--

DROP TABLE IF EXISTS `presents`;
CREATE TABLE IF NOT EXISTS `presents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `card` varchar(8) NOT NULL,
  `role` varchar(200) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `church` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `presents`
--

INSERT INTO `presents` (`id`, `name`, `card`, `role`, `sector`, `church`, `city`, `date_time`) VALUES
(1, 'Juarez Ronaldo', '', 'Profeta', 'setor 01', 'jardim brasilia', 'uberlandia', '2024-09-13 00:30:24'),
(2, 'Aline Alves Machado Dias', '', 'Coord. do Fundo Bíblico/Distr.', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 00:41:15'),
(3, 'Aline Alves Machado Dias', '', 'Coord. do Fundo Bíblico/Distr.', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 00:41:50'),
(4, 'Aline Alves Machado Dias', '12272630', 'Coord. do Fundo Bíblico/Distr.', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 00:45:53'),
(5, 'Aline Alves Machado Dias', '12272630', 'Coord. do Fundo Bíblico/Distr.', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 01:04:02'),
(6, 'Aline Alves Machado Dias', '12272630', 'Coord. do Fundo Bíblico/Distr.', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 01:04:50'),
(7, 'Altagimar rodrigues da silva filho', '30765418', 'Coord. Segurança do Trabalho', 'Setor 01', 'Liberdade', 'Uberlândia-MG', '2024-09-13 01:06:53'),
(8, 'Anísio Gomes Neto', '17009204', 'Coord. Patrimônio Bens Móveis', 'Setor 01', 'Maravilha', 'Uberlândia-MG', '2024-09-13 01:08:28'),
(9, 'Carlos Enrique Justino', '92749770', 'Enc. de Manutenção', 'Setor 01', 'Cruzeiro dos Peixotos', 'Uberlândia-MG', '2024-09-13 01:08:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `siblings`
--

DROP TABLE IF EXISTS `siblings`;
CREATE TABLE IF NOT EXISTS `siblings` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `card` varchar(8) NOT NULL,
  `role` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `sector` varchar(15) NOT NULL,
  `church` varchar(25) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `card` (`card`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `siblings`
--

INSERT INTO `siblings` (`id`, `name`, `sex`, `card`, `role`, `city`, `sector`, `church`, `create_at`) VALUES
(72, 'Ademir Soares de Oliveira', 'M', '10199245', 'Almoxarifado', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(73, 'Aline Alves Machado Dias', 'F', '12272630', 'Coord. do Fundo Bíblico/Distr.', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(74, 'Altagimar rodrigues da silva filho', 'M', '30765418', 'Coord. Segurança do Trabalho', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(75, 'Anísio Gomes Neto', 'M', '17009204', 'Coord. Patrimônio Bens Móveis', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(76, 'Carlos Enrique Justino', 'M', '92749770', 'Enc. de Manutenção', 'Uberlândia-MG', 'Setor 01', 'Cruzeiro dos Peixotos', '2024-04-27 21:53:02'),
(77, 'Cleidio Marques Duarte', 'M', '12721240', 'Ancião', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(78, 'Eli Gabilon', 'M', '85356896', 'Coord. de Informática', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(79, 'Eolicio Ricardo De Oliveira', 'M', '88620763', 'Coord. Patrimônio Bens Móveis', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(80, 'Jeu Barbosa Moreira', 'M', '87033128', 'Coord. Brigada', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(81, 'Jonas Profeta Borges', 'M', '69303357', 'Coord. de Manutenção', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(82, 'José Ferreira de Carvalho', 'M', '85417406', 'Ancião', 'Uberlândia-MG', 'Setor 01', 'Jardim Brasília', '2024-04-27 21:53:02'),
(83, 'Jovenna Karla Silva Pereira', 'F', '19176960', 'Revisora', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(84, 'Jucilaine Figueira de Moura', 'F', '39632588', 'Secretaria', 'Uberlândia-MG', 'Setor 01', 'Osvaldo Rezende', '2024-04-27 21:53:02'),
(85, 'Juliano Gonçalves de Araújo', 'M', '40632064', 'Coord. Brigada', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(86, 'Leonardo Cardoso Gonçalves', 'M', '84262556', 'Conselho Fiscal', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(87, 'Márcia Ângela Duarte Rocha', 'F', '99416595', 'Coord. Trabalhos Voluntários', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(88, 'Marianne Tavares da Silva Martin', 'F', '44295310', 'Jurídico', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(89, 'Marivaldo Carrilho da Silva Júnior', 'M', '23226769', 'Ancião', 'Uberlândia-MG', 'Setor 01', 'Maria Rezende', '2024-04-27 21:53:02'),
(90, 'Miriã Marcacine Pereira dos Santos', 'F', '83247919', 'Coord. Eng./Arq. e Bens Imóveis', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(91, 'Osmar lasaro ananias', 'M', '46559289', 'Enc. Manutenção', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(92, 'Otávio Luiz Pereira', 'M', '83052695', 'Informática', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(93, 'Pablo Henrique de Jesus', 'M', '75585610', 'Enc. de Manutenção', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(94, 'Paulo Sérgio de Menezes', 'M', '28769968', 'Comprador', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(95, 'Raquel Ferreira de Almeida Reis', 'F', '17093013', 'Coord. CCLimp', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(96, 'Ricardo Dias Reis Siqueira', 'M', '99155166', 'Coord.Trabalhos Voluntários', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(97, 'Roberto Mendes', 'M', '44496793', 'Enc. Manutenção', 'Uberlândia-MG', 'Setor 01', 'Osvaldo Rezende', '2024-04-27 21:53:02'),
(98, 'Ronan Geraldo Monteiro', 'M', '25018472', 'Enc. Manutenção', 'Uberlândia-MG', 'Setor 01', 'Minas Gerais', '2024-04-27 21:53:02'),
(100, 'Samuel da Silva Gomes', 'M', '82954505', 'Conselho Fiscal', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(101, 'Samuel Ferreira de Almeida', 'M', '39966579', 'Coord. CCLimp', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(102, 'Tarcisio nascimento', 'M', '50969383', 'Coord. do Anexo', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02'),
(103, 'Valdir Gonçalves Ferreira', 'M', '34947182', 'Manutenção de Climatizadores', 'Uberlândia-MG', 'Setor 01', 'Jardim Brasília', '2024-04-27 21:53:02'),
(104, 'Victor Malta Nunes', 'M', '21827764', 'Assessor', 'Uberlândia-MG', 'Setor 01', 'Jardim Brasília', '2024-04-27 21:53:02'),
(105, 'Wender Domingues Bernardes', 'M', '04297277', 'Patrimônio', 'Uberlândia-MG', 'Setor 01', 'Maravilha', '2024-04-27 21:53:02'),
(106, 'Wesley  Azevedo de Carvalho', 'M', '56003096', 'Secretário/Tesoureiro', 'Uberlândia-MG', 'Setor 01', 'Jardim Brasília', '2024-04-27 21:53:02'),
(107, 'Xênia Rodrigues Borges', 'F', '67123655', 'Contabilidade', 'Uberlândia-MG', 'Setor 01', 'Liberdade', '2024-04-27 21:53:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_hour` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date_hour`) VALUES
(1, 'Otavio Luiz', 'otavio@gmail.com', 'otavio1', '2024-06-14 00:48:09');
--
-- Banco de dados: `nomeai`
--
CREATE DATABASE IF NOT EXISTS `nomeai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `nomeai`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `updated_at`, `created_at`) VALUES
(1, 'otavio', 'joao', '123', '2023-10-27 04:47:47', '2023-10-27 04:47:47'),
(2, 'otavio', 'joao', '123456', '2023-10-27 04:49:07', '2023-10-27 04:49:07'),
(3, 'otavio', 'joao', '14521', '2023-10-27 04:53:01', '2023-10-27 04:53:01'),
(4, 'joao', 'j125', '10245', '2023-10-27 04:55:39', '2023-10-27 04:55:39'),
(5, 'joao', 'j1212', '1245', '2023-10-27 04:56:54', '2023-10-27 04:56:54'),
(6, 'otavio', 'joao', '12345', '2023-10-27 04:57:41', '2023-10-27 04:57:41'),
(7, 'otavio', 'j125', '44444', '2023-10-27 04:59:54', '2023-10-27 04:59:54'),
(8, 'otavio', 'joao', '5555', '2023-10-27 05:04:19', '2023-10-27 05:04:19'),
(9, 'otavio', 'joao', '555', '2023-10-27 05:05:16', '2023-10-27 05:05:16'),
(10, 'jbfejb', 'dfe11', '12345', '2023-10-27 05:07:07', '2023-10-27 05:07:07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
