-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Jun-2019 às 15:34
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_pretor_2_0`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `place` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complement` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `addresses_persona_id_foreign` (`persona_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` enum('Judicial','Administrativo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Judicial',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `areas`
--

INSERT INTO `areas` (`id`, `name`, `origin`, `created_at`, `updated_at`) VALUES
(1, 'Penal', 'Administrativo', '2019-06-24 11:59:48', '2019-06-24 12:05:17'),
(2, 'Previdenciário', 'Administrativo', '2019-06-24 11:59:48', '2019-06-24 12:00:49'),
(3, 'Ambiental', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:04:20'),
(4, 'Ambiental', 'Administrativo', '2019-06-24 11:59:48', '2019-06-24 12:04:32'),
(5, 'Previdenciário', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:00:30'),
(6, 'Cível', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:01:01'),
(7, 'Penal', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:05:33'),
(8, 'Família', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:01:20'),
(9, 'Consumidor', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:04:48'),
(10, 'Trabalhista', 'Judicial', '2019-06-24 11:59:48', '2019-06-24 12:03:23'),
(11, 'Família', 'Administrativo', '2019-06-24 12:06:02', '2019-06-24 12:06:02'),
(12, 'Cível', 'Administrativo', '2019-06-24 12:06:28', '2019-06-24 12:06:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('Documento','Valor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Documento',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cidades_estado_id_foreign` (`estado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doctypes`
--

DROP TABLE IF EXISTS `doctypes`;
CREATE TABLE IF NOT EXISTS `doctypes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctype_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_doctype_id_foreign` (`doctype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents_processes`
--

DROP TABLE IF EXISTS `documents_processes`;
CREATE TABLE IF NOT EXISTS `documents_processes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `document_id` int(10) UNSIGNED NOT NULL,
  `process_id` int(10) UNSIGNED NOT NULL,
  `sts` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_processes_document_id_foreign` (`document_id`),
  KEY `documents_processes_process_id_foreign` (`process_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entities`
--

DROP TABLE IF EXISTS `entities`;
CREATE TABLE IF NOT EXISTS `entities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entities`
--

INSERT INTO `entities` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'INSS - Instituto Nacional da Seguridade Social', NULL, '2019-06-24 12:30:15', '2019-06-24 12:30:15'),
(2, 'TRF1', NULL, '2019-06-24 12:30:27', '2019-06-24 12:30:27'),
(3, 'TRF1 - Seção Judiciária de Goiás', NULL, '2019-06-24 12:31:23', '2019-06-24 12:34:38'),
(5, 'TRF1 - Subseção Judiciária de Anápolis-GO - 2ª Vara - Juizado Especial Cível', NULL, '2019-06-24 12:34:51', '2019-06-24 12:34:51'),
(4, 'TRF1 - Subseção Judiciária de Anápolis-GO - 1ª Vara - Juizado Especial Cível', NULL, '2019-06-24 12:33:45', '2019-06-24 12:33:45'),
(6, 'TJGO - Tribunal de Justiça do Estado de Goiás - Câmara Cível', NULL, '2019-06-24 12:35:21', '2019-06-24 12:39:37'),
(7, 'TJGO - Anápolis - Família e Sucessões - 1ª Vara', NULL, '2019-06-24 12:36:53', '2019-06-24 12:42:43'),
(8, 'TJGO - Anápolis - Família e Sucessões - 2ª Vara', NULL, '2019-06-24 12:39:56', '2019-06-24 12:42:30'),
(9, 'TJGO - Anápolis - Cível - 1ª Vara', NULL, '2019-06-24 12:40:40', '2019-06-24 12:42:10'),
(10, 'TJGO - Anápolis - Cível - 2ª Vara', NULL, '2019-06-24 12:40:56', '2019-06-24 12:41:56'),
(11, 'TJGO - Anápolis - Cível - 3ª Vara', NULL, '2019-06-24 12:41:42', '2019-06-24 12:41:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fones`
--

DROP TABLE IF EXISTS `fones`;
CREATE TABLE IF NOT EXISTS `fones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fones_persona_id_foreign` (`persona_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `holders`
--

DROP TABLE IF EXISTS `holders`;
CREATE TABLE IF NOT EXISTS `holders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `kinds`
--

DROP TABLE IF EXISTS `kinds`;
CREATE TABLE IF NOT EXISTS `kinds` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `area_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kinds_area_id_foreign` (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `kinds`
--

INSERT INTO `kinds` (`id`, `area_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ação de Anulação de Auto de Infração', NULL, '2019-06-24 11:59:48', '2019-06-24 12:10:31'),
(2, 6, 'Ação de Execução de Título Extrajudicial', NULL, '2019-06-24 11:59:48', '2019-06-24 12:13:48'),
(3, 6, 'Ação de Usucapião', NULL, '2019-06-24 11:59:48', '2019-06-24 12:07:21'),
(4, 1, 'Acompanhamento Delegacia', NULL, '2019-06-24 11:59:48', '2019-06-24 12:09:37'),
(5, 5, 'Ação de Auxílio Doença c/c Aposentadoria por Invalidez', NULL, '2019-06-24 11:59:48', '2019-06-24 12:12:10'),
(6, 4, 'Defesa em Auto de Infração', NULL, '2019-06-24 11:59:48', '2019-06-24 12:08:02'),
(7, 5, 'Aposentadoria por Tempo de Contribuição', NULL, '2019-06-24 11:59:48', '2019-06-24 12:10:59'),
(8, 10, 'Reclamação Trabalhista', NULL, '2019-06-24 11:59:48', '2019-06-24 12:09:08'),
(9, 2, 'Aposentadoria Especial Trabalhador Rural', NULL, '2019-06-24 11:59:48', '2019-06-24 12:08:42'),
(10, 6, 'Ação de Indenização por Dano Material e Moral', NULL, '2019-06-24 11:59:48', '2019-06-24 12:10:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kinds_processes`
--

DROP TABLE IF EXISTS `kinds_processes`;
CREATE TABLE IF NOT EXISTS `kinds_processes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kind_id` int(10) UNSIGNED NOT NULL,
  `process_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kinds_processes_kind_id_foreign` (`kind_id`),
  KEY `kinds_processes_process_id_foreign` (`process_id`),
  KEY `kinds_processes_entity_id_foreign` (`entity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_26_163034_create_areas_table', 1),
(4, '2019_05_13_172508_create_paises_table', 1),
(5, '2019_05_13_172538_create_estados_table', 1),
(6, '2019_05_13_172551_create_cidades_table', 1),
(7, '2019_06_15_185439_create_kinds_table', 1),
(8, '2019_06_18_134544_create_entities_table', 1),
(9, '2019_06_19_095809_create_processes_table', 1),
(10, '2019_06_19_102242_create_kinds_processes_table', 1),
(11, '2019_06_19_103444_create_attributes_table', 1),
(12, '2019_06_19_103739_create_qualifications_table', 1),
(13, '2019_06_19_103759_create_personas_table', 1),
(14, '2019_06_19_104537_create_addresses_table', 2),
(15, '2019_06_19_105222_create_fones_table', 3),
(16, '2019_06_19_105545_create_stakeholders_table', 4),
(17, '2019_06_19_105603_create_holders_table', 4),
(18, '2019_06_19_111047_create_doctypes_table', 5),
(19, '2019_06_19_111146_create_documents_table', 6),
(20, '2019_06_19_112653_create_documents_processes_table', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paises`
--

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processes`
--

DROP TABLE IF EXISTS `processes`;
CREATE TABLE IF NOT EXISTS `processes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sts` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE IF NOT EXISTS `qualifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qualifications_persona_id_foreign` (`persona_id`),
  KEY `qualifications_attribute_id_foreign` (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stakeholders`
--

DROP TABLE IF EXISTS `stakeholders`;
CREATE TABLE IF NOT EXISTS `stakeholders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `holder_id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `process_id` int(10) UNSIGNED NOT NULL,
  `contract` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stakeholders_holder_id_foreign` (`holder_id`),
  KEY `stakeholders_persona_id_foreign` (`persona_id`),
  KEY `stakeholders_process_id_foreign` (`process_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
