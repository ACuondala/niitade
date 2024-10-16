-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Ago-2024 às 17:06
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `niitade_bb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `age_post`
--

CREATE TABLE `age_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `begin` int(11) NOT NULL,
  `finish` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Restauração', NULL, NULL),
(2, 'Hotelaria e Turismo', NULL, NULL),
(3, 'Automobilismo', NULL, NULL),
(4, 'Electrodomésticos', NULL, NULL),
(5, 'Bijuterias', NULL, NULL),
(6, 'Cosméticos', NULL, NULL),
(7, 'Mobiliário/Móveis', NULL, NULL),
(8, 'Construção Civil', NULL, NULL),
(9, 'IT', NULL, NULL),
(10, 'Roupas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Venha nos Visitar !', 4, 1, '2024-08-21 16:48:22', '2024-08-21 16:48:22'),
(2, 'A melhor empresa', 4, 1, '2024-08-21 16:49:35', '2024-08-21 16:49:35'),
(3, 'Gostei da Imagem', 4, 1, '2024-08-21 16:50:50', '2024-08-21 16:50:50'),
(4, 'Vou recomendar para alguém', 4, 1, '2024-08-21 19:26:43', '2024-08-21 19:26:43'),
(5, 'Primeiro a comentar', 5, 1, '2024-08-22 13:27:54', '2024-08-22 13:27:54'),
(6, 'Primeiro a comentar', 1, 1, '2024-08-22 13:48:41', '2024-08-22 13:48:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `companySlogna` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `companyImage` text DEFAULT NULL,
  `companyAlvara` text DEFAULT NULL,
  `companyDiario` text DEFAULT NULL,
  `companyNif` text DEFAULT NULL,
  `companyCertidao` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `neighbor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `kind_company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `companyName`, `companySlogna`, `address`, `status`, `companyImage`, `companyAlvara`, `companyDiario`, `companyNif`, `companyCertidao`, `user_id`, `neighbor_id`, `category_id`, `kind_company_id`, `created_at`, `updated_at`) VALUES
(4, 'Clã Tecnoart', 'Tecnologia ao serviço da literatura', 'Rua Augusto Tadeu Bastos, Maianga, Luanda - Angola', 'active', '/nitade/companyLogo/iDksxbnGEsFE7uFoqydmBkHrWQVGlObF1iCuEok0.jpg', '/nitade/company/Document/FTOsDi5kmGNIz5jxEgm2lxbIZ4HvpzBNC8rD136M.pdf', '/nitade/company/Document/FQZUoGUeXLcb3OeUITAyn2Qs4DYrL7d5YNwNE2tV.pdf', '/nitade/company/Document/u55V5ZezqtMbsP9gdO20zSTSBCN7yzijzMe3l3RG.pdf', '/nitade/company/Document/iAd6rhgr6TqIzZEzATmFZ2g7vs0HNTXKDXkVet3X.pdf', 1, 1, 9, 1, '2024-08-15 04:30:07', '2024-08-15 04:30:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `company_user`
--

CREATE TABLE `company_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `company_user`
--

INSERT INTO `company_user` (`id`, `company_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Angola', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `deliveryImage` varchar(255) NOT NULL,
  `bi` text NOT NULL,
  `carta` text NOT NULL,
  `registroCriminal` text DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'pedding',
  `neighbor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `delivery_modes`
--

CREATE TABLE `delivery_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `delivery_modes`
--

INSERT INTO `delivery_modes` (`id`, `mode`, `created_at`, `updated_at`) VALUES
(1, 'Via Entregador', NULL, NULL),
(2, 'Via Encontro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `document_company`
--

CREATE TABLE `document_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyOtherDocument` text DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expecific_publics`
--

CREATE TABLE `expecific_publics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `expecific_publics`
--

INSERT INTO `expecific_publics` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, 5000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `interest` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `interests`
--

INSERT INTO `interests` (`id`, `interest`, `created_at`, `updated_at`) VALUES
(1, 'Desporto', NULL, NULL),
(2, 'Comidas', NULL, NULL),
(3, 'Musicas', NULL, NULL),
(4, 'Filmes', NULL, NULL),
(5, 'Animes', NULL, NULL),
(6, 'Cosmeticos', NULL, NULL),
(7, 'IT', NULL, NULL),
(8, 'Roupas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interest_post`
--

CREATE TABLE `interest_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `interest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interest_users`
--

CREATE TABLE `interest_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `interest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `interest_users`
--

INSERT INTO `interest_users` (`id`, `user_id`, `interest_id`, `created_at`, `updated_at`) VALUES
(34, 1, 1, '2024-08-15 03:43:51', '2024-08-15 03:43:51'),
(35, 1, 5, '2024-08-15 03:43:51', '2024-08-15 03:43:51'),
(36, 1, 7, '2024-08-15 03:43:51', '2024-08-15 03:43:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kind_companies`
--

CREATE TABLE `kind_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kind` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `kind_companies`
--

INSERT INTO `kind_companies` (`id`, `kind`, `created_at`, `updated_at`) VALUES
(1, 'Formal', NULL, NULL),
(2, 'Informal', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `kind_products`
--

CREATE TABLE `kind_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kind` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `kind_products`
--

INSERT INTO `kind_products` (`id`, `kind`, `created_at`, `updated_at`) VALUES
(1, 'Físico', NULL, NULL),
(2, 'Digital', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `kind_vehicles`
--

CREATE TABLE `kind_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kind` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 1, 5, '2024-08-22 08:52:10', '2024-08-22 08:52:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(255) NOT NULL,
  `kind_vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_04_20_153151_create_countries_table', 1),
(5, '2024_04_20_153212_create_provinces_table', 1),
(6, '2024_04_20_153234_create_municipes_table', 1),
(7, '2024_04_20_153300_create_neighbors_table', 1),
(8, '2024_04_20_153310_create_users_table', 1),
(9, '2024_04_20_153330_create_interests_table', 1),
(10, '2024_04_20_153514_create_user_interests_table', 1),
(11, '2024_04_23_150427_create_categories_table', 1),
(12, '2024_04_23_150723_create_kind_companies_table', 1),
(13, '2024_04_23_150747_create_companies_table', 1),
(14, '2024_04_23_150856_create_document_company_table', 1),
(15, '2024_04_28_042004_create_kind_vehicles_table', 1),
(16, '2024_04_28_042305_create_marcas_table', 1),
(17, '2024_04_28_042412_create_modelos_table', 1),
(18, '2024_04_28_042523_create_deliveries_table', 1),
(19, '2024_04_28_042631_create_vehicles_table', 1),
(20, '2024_04_28_043038_create_vehicle_images_table', 1),
(21, '2024_04_28_075509_create_kind_products_table', 1),
(22, '2024_04_28_075629_create_delivery_modes_table', 1),
(23, '2024_04_28_075733_create_products_table', 1),
(24, '2024_04_28_075836_create_product_images_table', 1),
(25, '2024_04_28_085852_create_post_links_table', 1),
(26, '2024_04_28_085942_create_plans_table', 1),
(27, '2024_04_28_090005_create_sponsors_table', 1),
(28, '2024_04_28_090158_create_expecific_publics_table', 1),
(29, '2024_04_28_090249_create_posts_table', 1),
(30, '2024_04_28_090405_create_post_contents_table', 1),
(31, '2024_04_28_090517_create_interest_post_table', 1),
(32, '2024_04_28_090546_create_age_post_table', 1),
(33, '2024_04_28_090618_create_municipe_post_table', 1),
(34, '2024_04_28_091727_create_post_user_table', 1),
(35, '2024_04_28_093508_create_comments_table', 1),
(36, '2024_04_28_114948_create_followers_table', 1),
(37, '2024_05_27_135808_create_favorites_table', 1),
(38, '2024_07_14_143727_create_postviews_table', 1),
(39, '2024_08_14_102332_create_company_user_table', 1),
(40, '2024_08_14_184207_create_interest_users_table', 1),
(41, '2024_08_15_064327_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipes`
--

CREATE TABLE `municipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `municipe` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `municipes`
--

INSERT INTO `municipes` (`id`, `municipe`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Maianga', 1, NULL, NULL),
(2, 'Rangel', 1, NULL, NULL),
(3, 'Viana', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipe_post`
--

CREATE TABLE `municipe_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `municipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `neighbors`
--

CREATE TABLE `neighbors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `neighbor` varchar(255) NOT NULL,
  `municipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `neighbors`
--

INSERT INTO `neighbors` (`id`, `neighbor`, `municipe_id`, `created_at`, `updated_at`) VALUES
(1, 'Maianga', 1, NULL, NULL),
(2, 'Vila Alice', 2, NULL, NULL),
(3, 'Vila de Viana', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `plans`
--

INSERT INTO `plans` (`id`, `plan`, `price`, `created_at`, `updated_at`) VALUES
(1, '1 Semana', 3500, NULL, NULL),
(2, '2 Semanas', 7000, NULL, NULL),
(3, '3 Semanas', 10500, NULL, NULL),
(4, '4 Semanas', 15000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namePost` varchar(255) NOT NULL,
  `titlePost` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `cost` int(11) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `post_link_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sponsor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expecific_public_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `namePost`, `titlePost`, `description`, `view_count`, `cost`, `product_id`, `company_id`, `post_link_id`, `plan_id`, `category_id`, `sponsor_id`, `expecific_public_id`, `created_at`, `updated_at`) VALUES
(1, 'Conheça o Clã', 'Nossos Valores', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 0, 0, NULL, 4, 1, NULL, 9, NULL, NULL, '2024-08-21 03:42:08', '2024-08-21 03:42:08'),
(3, 'Carrot', 'The New Carrot Phone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type', 0, 0, 1, 4, 2, 1, 9, 2, 1, '2024-08-21 16:27:03', '2024-08-21 16:27:03'),
(4, 'O Clã', 'Conheça os nossos serviços tecnológicos!', 'No Clã Tecnoarte, nos dedicamos a oferecer soluções de qualidade para atender às suas necessidades. Estamos comprometidos em ajudar os nossos clientes a transformar suas ideias em realidade com os nossos serviços do sector tecnológico.', 0, 0, NULL, 4, 1, NULL, 9, NULL, NULL, '2024-08-21 16:42:09', '2024-08-21 16:42:09'),
(5, 'AngoTic', 'Destaques do Angotic', '📷 Entre as fotos, destacamos nosso CEO Alfredo Dobia em entrevista para a rádio Correio da Kianda com a querida Sophia Bocu, participantes comprando os nossos livros, momentos de união com a nossa equipa e apresentações da nossa plataforma “Clã da Literatura” para os visitantes. 😊', 0, 0, NULL, 4, 1, 2, 9, 2, 1, '2024-08-22 08:51:32', '2024-08-22 08:51:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postviews`
--

CREATE TABLE `postviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `postviews`
--

INSERT INTO `postviews` (`id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2024-08-21 16:48:59', '2024-08-21 16:48:59'),
(2, 4, 1, '2024-08-21 18:59:40', '2024-08-21 18:59:40'),
(3, 4, 1, '2024-08-21 19:00:01', '2024-08-21 19:00:01'),
(4, 4, 1, '2024-08-21 19:03:27', '2024-08-21 19:03:27'),
(5, 4, 1, '2024-08-21 19:03:55', '2024-08-21 19:03:55'),
(6, 4, 1, '2024-08-21 19:16:36', '2024-08-21 19:16:36'),
(7, 4, 1, '2024-08-21 19:20:38', '2024-08-21 19:20:38'),
(8, 4, 1, '2024-08-21 19:28:44', '2024-08-21 19:28:44'),
(9, 4, 1, '2024-08-22 03:12:55', '2024-08-22 03:12:55'),
(10, 4, 1, '2024-08-22 03:55:18', '2024-08-22 03:55:18'),
(11, 4, 1, '2024-08-22 04:05:21', '2024-08-22 04:05:21'),
(12, 4, 1, '2024-08-22 04:06:16', '2024-08-22 04:06:16'),
(13, 4, 1, '2024-08-22 04:17:58', '2024-08-22 04:17:58'),
(14, 4, 1, '2024-08-22 04:21:10', '2024-08-22 04:21:10'),
(15, 4, 1, '2024-08-22 04:25:50', '2024-08-22 04:25:50'),
(16, 5, 1, '2024-08-22 08:51:41', '2024-08-22 08:51:41'),
(17, 5, 1, '2024-08-22 08:51:57', '2024-08-22 08:51:57'),
(18, 5, 1, '2024-08-22 09:35:44', '2024-08-22 09:35:44'),
(19, 5, 1, '2024-08-22 09:36:06', '2024-08-22 09:36:06'),
(20, 5, 1, '2024-08-22 09:36:10', '2024-08-22 09:36:10'),
(21, 5, 1, '2024-08-22 09:36:14', '2024-08-22 09:36:14'),
(22, 5, 1, '2024-08-22 09:36:18', '2024-08-22 09:36:18'),
(23, 5, 1, '2024-08-22 09:36:54', '2024-08-22 09:36:54'),
(24, 5, 1, '2024-08-22 12:43:24', '2024-08-22 12:43:24'),
(25, 5, 1, '2024-08-22 12:45:00', '2024-08-22 12:45:00'),
(26, 5, 1, '2024-08-22 12:46:05', '2024-08-22 12:46:05'),
(27, 5, 1, '2024-08-22 12:51:28', '2024-08-22 12:51:28'),
(28, 5, 1, '2024-08-22 12:53:17', '2024-08-22 12:53:17'),
(29, 5, 1, '2024-08-22 13:03:28', '2024-08-22 13:03:28'),
(30, 5, 1, '2024-08-22 13:04:40', '2024-08-22 13:04:40'),
(31, 5, 1, '2024-08-22 13:09:03', '2024-08-22 13:09:03'),
(32, 5, 1, '2024-08-22 13:11:03', '2024-08-22 13:11:03'),
(33, 5, 1, '2024-08-22 13:18:49', '2024-08-22 13:18:49'),
(34, 5, 1, '2024-08-22 13:38:40', '2024-08-22 13:38:40'),
(35, 5, 1, '2024-08-22 13:49:57', '2024-08-22 13:49:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_contents`
--

CREATE TABLE `post_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `files` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `post_contents`
--

INSERT INTO `post_contents` (`id`, `files`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'nitade/post/content//pnyGw5fVfUadas1IAqvGENBpvCdJCqOoFzYKNJ74.jpg', 1, '2024-08-21 03:42:08', '2024-08-21 03:42:08'),
(2, 'nitade/post/content//lueZWrFuBdVkLUcNp0LadPkn05lOLJjZxXhyMtGD.jpg', 3, '2024-08-21 16:27:03', '2024-08-21 16:27:03'),
(3, 'nitade/post/content//WbA4N8LiRgYqdeRh1YvTEVEYNtEjyAOyRnB50tDB.jpg', 3, '2024-08-21 16:27:03', '2024-08-21 16:27:03'),
(4, 'nitade/post/content//PtDoCuSaeyzqEHcbiMBFHy98FzHuxi8rDw6YaFrW.jpg', 4, '2024-08-21 16:42:09', '2024-08-21 16:42:09'),
(5, 'nitade/post/content//0zUoawT1LqsOlIJF5mzC5sQKoB5Oj9Bvrj7SJkF9.jpg', 5, '2024-08-22 08:51:32', '2024-08-22 08:51:32'),
(6, 'nitade/post/content//27tXdvqQf5m7PXWhHBl6dbXAPDfSATinOGFUZJ97.jpg', 5, '2024-08-22 08:51:32', '2024-08-22 08:51:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_links`
--

CREATE TABLE `post_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `post_links`
--

INSERT INTO `post_links` (`id`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Loja', NULL, NULL),
(2, 'Pagina de Compra', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post_user`
--

CREATE TABLE `post_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `subprice` int(11) NOT NULL,
  `quatity` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bonus` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `kind_product_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_mode_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `images`, `price`, `subprice`, `quatity`, `reference`, `status`, `bonus`, `description`, `kind_product_id`, `company_id`, `delivery_mode_id`, `created_at`, `updated_at`) VALUES
(1, 'Carrot phone', '/nitade/product/XFzdLrnDkwPON2OHoixCX6Lu0vInDK8Amt4oPtUW.jpg', 125000, 111000, 8, 'Carrot 4', 'Novo', 'capa personalizada', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 1, 4, 1, '2024-08-21 13:57:19', '2024-08-21 13:57:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `productImage`, `created_at`, `updated_at`) VALUES
(1, 1, '/nitade/product/other/84MHpy49NgrnK0abfojhmOHFeTECzf1mpE1O5wFl.jpg', '2024-08-21 13:57:19', '2024-08-21 13:57:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Luanda', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sponsors`
--

INSERT INTO `sponsors` (`id`, `sponsor`, `price`, `created_at`, `updated_at`) VALUES
(1, '1 Semana', 7000, NULL, NULL),
(2, '2 Semanas', 14000, NULL, NULL),
(3, '3 Semanas', 21000, NULL, NULL),
(4, '4 Semanas', 30000, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `images` varchar(255) DEFAULT 'user.png',
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otherphone` varchar(255) DEFAULT NULL,
  `terms` tinyint(1) NOT NULL,
  `neighbor_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `images`, `gender`, `phone`, `otherphone`, `terms`, `neighbor_id`, `password`, `money`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'cazaki', '2000-06-06', 'nitade/users/Zf34G86aLNmvY8WINMGQDS7ZoMc3MxQBNt4hpSYd.png', 'M', '999999999', '999999998', 1, 2, '$2y$10$46gyCu3fhYSH3tNmvtir..I3F4PZq.VRbTtkJ6nejW1QUmGrJHkBe', 500000, NULL, '2024-08-15 03:13:03', '2024-08-15 03:13:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_interests`
--

CREATE TABLE `user_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `interest_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `Carimages` varchar(255) NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `kind_vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `modelo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `othercarImage` varchar(255) NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `age_post`
--
ALTER TABLE `age_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_post_post_id_foreign` (`post_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Índices para tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_companyname_unique` (`companyName`),
  ADD UNIQUE KEY `companies_companyslogna_unique` (`companySlogna`),
  ADD KEY `companies_user_id_foreign` (`user_id`),
  ADD KEY `companies_neighbor_id_foreign` (`neighbor_id`),
  ADD KEY `companies_category_id_foreign` (`category_id`),
  ADD KEY `companies_kind_company_id_foreign` (`kind_company_id`);

--
-- Índices para tabela `company_user`
--
ALTER TABLE `company_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user_company_id_foreign` (`company_id`),
  ADD KEY `company_user_user_id_foreign` (`user_id`);

--
-- Índices para tabela `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_neighbor_id_foreign` (`neighbor_id`);

--
-- Índices para tabela `delivery_modes`
--
ALTER TABLE `delivery_modes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `document_company`
--
ALTER TABLE `document_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_company_company_id_foreign` (`company_id`);

--
-- Índices para tabela `expecific_publics`
--
ALTER TABLE `expecific_publics`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_post_id_foreign` (`post_id`);

--
-- Índices para tabela `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_user_id_foreign` (`user_id`),
  ADD KEY `followers_company_id_foreign` (`company_id`);

--
-- Índices para tabela `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `interest_post`
--
ALTER TABLE `interest_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_post_post_id_foreign` (`post_id`),
  ADD KEY `interest_post_interest_id_foreign` (`interest_id`);

--
-- Índices para tabela `interest_users`
--
ALTER TABLE `interest_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_users_user_id_foreign` (`user_id`),
  ADD KEY `interest_users_interest_id_foreign` (`interest_id`);

--
-- Índices para tabela `kind_companies`
--
ALTER TABLE `kind_companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `kind_products`
--
ALTER TABLE `kind_products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `kind_vehicles`
--
ALTER TABLE `kind_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marcas_kind_vehicle_id_foreign` (`kind_vehicle_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelos_marca_id_foreign` (`marca_id`);

--
-- Índices para tabela `municipes`
--
ALTER TABLE `municipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipes_province_id_foreign` (`province_id`);

--
-- Índices para tabela `municipe_post`
--
ALTER TABLE `municipe_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipe_post_post_id_foreign` (`post_id`),
  ADD KEY `municipe_post_municipe_id_foreign` (`municipe_id`);

--
-- Índices para tabela `neighbors`
--
ALTER TABLE `neighbors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `neighbors_municipe_id_foreign` (`municipe_id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_product_id_foreign` (`product_id`),
  ADD KEY `posts_company_id_foreign` (`company_id`),
  ADD KEY `posts_post_link_id_foreign` (`post_link_id`),
  ADD KEY `posts_plan_id_foreign` (`plan_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_sponsor_id_foreign` (`sponsor_id`),
  ADD KEY `posts_expecific_public_id_foreign` (`expecific_public_id`);

--
-- Índices para tabela `postviews`
--
ALTER TABLE `postviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postviews_post_id_foreign` (`post_id`),
  ADD KEY `postviews_user_id_foreign` (`user_id`);

--
-- Índices para tabela `post_contents`
--
ALTER TABLE `post_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_contents_post_id_foreign` (`post_id`);

--
-- Índices para tabela `post_links`
--
ALTER TABLE `post_links`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_post_id_foreign` (`post_id`),
  ADD KEY `post_user_user_id_foreign` (`user_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_kind_product_id_foreign` (`kind_product_id`),
  ADD KEY `products_company_id_foreign` (`company_id`),
  ADD KEY `products_delivery_mode_id_foreign` (`delivery_mode_id`);

--
-- Índices para tabela `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Índices para tabela `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_country_id_foreign` (`country_id`);

--
-- Índices para tabela `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_neighbor_id_foreign` (`neighbor_id`);

--
-- Índices para tabela `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_interests_user_id_foreign` (`user_id`),
  ADD KEY `user_interests_interest_id_foreign` (`interest_id`);

--
-- Índices para tabela `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_delivery_id_foreign` (`delivery_id`),
  ADD KEY `vehicles_kind_vehicle_id_foreign` (`kind_vehicle_id`),
  ADD KEY `vehicles_modelo_id_foreign` (`modelo_id`);

--
-- Índices para tabela `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `age_post`
--
ALTER TABLE `age_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `company_user`
--
ALTER TABLE `company_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `delivery_modes`
--
ALTER TABLE `delivery_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `document_company`
--
ALTER TABLE `document_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `expecific_publics`
--
ALTER TABLE `expecific_publics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `interest_post`
--
ALTER TABLE `interest_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `interest_users`
--
ALTER TABLE `interest_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `kind_companies`
--
ALTER TABLE `kind_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `kind_products`
--
ALTER TABLE `kind_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `kind_vehicles`
--
ALTER TABLE `kind_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `municipes`
--
ALTER TABLE `municipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `municipe_post`
--
ALTER TABLE `municipe_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `neighbors`
--
ALTER TABLE `neighbors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `postviews`
--
ALTER TABLE `postviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `post_contents`
--
ALTER TABLE `post_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `post_links`
--
ALTER TABLE `post_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `post_user`
--
ALTER TABLE `post_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `age_post`
--
ALTER TABLE `age_post`
  ADD CONSTRAINT `age_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `companies_kind_company_id_foreign` FOREIGN KEY (`kind_company_id`) REFERENCES `kind_companies` (`id`),
  ADD CONSTRAINT `companies_neighbor_id_foreign` FOREIGN KEY (`neighbor_id`) REFERENCES `neighbors` (`id`),
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `company_user`
--
ALTER TABLE `company_user`
  ADD CONSTRAINT `company_user_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `company_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_neighbor_id_foreign` FOREIGN KEY (`neighbor_id`) REFERENCES `neighbors` (`id`);

--
-- Limitadores para a tabela `document_company`
--
ALTER TABLE `document_company`
  ADD CONSTRAINT `document_company_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Limitadores para a tabela `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `interest_post`
--
ALTER TABLE `interest_post`
  ADD CONSTRAINT `interest_post_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`),
  ADD CONSTRAINT `interest_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `interest_users`
--
ALTER TABLE `interest_users`
  ADD CONSTRAINT `interest_users_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`),
  ADD CONSTRAINT `interest_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_kind_vehicle_id_foreign` FOREIGN KEY (`kind_vehicle_id`) REFERENCES `kind_vehicles` (`id`);

--
-- Limitadores para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`);

--
-- Limitadores para a tabela `municipes`
--
ALTER TABLE `municipes`
  ADD CONSTRAINT `municipes_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Limitadores para a tabela `municipe_post`
--
ALTER TABLE `municipe_post`
  ADD CONSTRAINT `municipe_post_municipe_id_foreign` FOREIGN KEY (`municipe_id`) REFERENCES `municipes` (`id`),
  ADD CONSTRAINT `municipe_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `neighbors`
--
ALTER TABLE `neighbors`
  ADD CONSTRAINT `neighbors_municipe_id_foreign` FOREIGN KEY (`municipe_id`) REFERENCES `municipes` (`id`);

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `posts_expecific_public_id_foreign` FOREIGN KEY (`expecific_public_id`) REFERENCES `expecific_publics` (`id`),
  ADD CONSTRAINT `posts_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `posts_post_link_id_foreign` FOREIGN KEY (`post_link_id`) REFERENCES `post_links` (`id`),
  ADD CONSTRAINT `posts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `posts_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`);

--
-- Limitadores para a tabela `postviews`
--
ALTER TABLE `postviews`
  ADD CONSTRAINT `postviews_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `postviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `post_contents`
--
ALTER TABLE `post_contents`
  ADD CONSTRAINT `post_contents_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `post_user`
--
ALTER TABLE `post_user`
  ADD CONSTRAINT `post_user_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `products_delivery_mode_id_foreign` FOREIGN KEY (`delivery_mode_id`) REFERENCES `delivery_modes` (`id`),
  ADD CONSTRAINT `products_kind_product_id_foreign` FOREIGN KEY (`kind_product_id`) REFERENCES `kind_products` (`id`);

--
-- Limitadores para a tabela `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_neighbor_id_foreign` FOREIGN KEY (`neighbor_id`) REFERENCES `neighbors` (`id`);

--
-- Limitadores para a tabela `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `user_interests_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`),
  ADD CONSTRAINT `user_interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`),
  ADD CONSTRAINT `vehicles_kind_vehicle_id_foreign` FOREIGN KEY (`kind_vehicle_id`) REFERENCES `kind_vehicles` (`id`),
  ADD CONSTRAINT `vehicles_modelo_id_foreign` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
