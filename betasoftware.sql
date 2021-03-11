-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 09:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betasoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codeAgent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matriculeAgent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titreAgent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveauEtude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatCivil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeClient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenomClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titreClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genreClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professionClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresseClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `villeClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinceClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paysClient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domaineActivite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termepaiement` int(11) DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typeclient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devis_id` bigint(20) UNSIGNED NOT NULL,
  `datecommande` datetime NOT NULL,
  `montant` double NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenomContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titreContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genreContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professionContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courriel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaineActivite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbreAgent` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departements`
--

INSERT INTO `departements` (`id`, `designation`, `nbreAgent`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'PLANIFICATION', 5, 1, '2021-01-16 07:15:15', '2021-01-16 07:15:15'),
(2, 'RESSOURCE HUMAINE', 35, 1, '2021-01-16 12:13:19', '2021-01-16 12:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `datedepense` datetime NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `etape_id` bigint(20) UNSIGNED NOT NULL,
  `tache_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `montant` double NOT NULL,
  `etatdepense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedevis` datetime NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `etatdevis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montantdevis` double NOT NULL,
  `modalite` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `echanges`
--

CREATE TABLE `echanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valeurEchanges` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `echanges`
--

INSERT INTO `echanges` (`id`, `valeurEchanges`, `created_at`, `updated_at`) VALUES
(3, 2005, '2021-01-16 03:48:01', '2021-01-16 03:48:01'),
(4, 2005, '2021-01-16 03:48:58', '2021-01-16 03:48:58'),
(5, 2010, '2021-01-16 05:58:30', '2021-01-16 06:19:42'),
(6, 3000, '2021-01-16 10:58:30', '2021-01-16 10:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idNat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RCCM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numImpot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courriel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employe` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `logo`, `idNat`, `RCCM`, `numImpot`, `telephone`, `mobile`, `courriel`, `siteweb`, `adresse`, `ville`, `province`, `pays`, `employe`, `created_at`, `updated_at`) VALUES
(1, 'BETA ENGENEERING', NULL, 'N441/156/Kat/2010', '14-B-1993', 'A1414660B', '0999273585', '0820511586', 'betaengeneeringsarl8@gmail.com', NULL, '2732, AV/LAC KIPOPO', 'LUBUMBASHI', 'HAUT-KATANGA', 'R.D CONGO', 23, '2021-01-16 13:30:25', '2021-01-16 13:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `etapes`
--

CREATE TABLE `etapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomEtape` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `debutEtape` datetime NOT NULL,
  `debutFin` datetime NOT NULL,
  `tempsprevu` int(11) NOT NULL,
  `avancement` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etatEtape` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etapeprerequise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paiement_id` bigint(20) UNSIGNED NOT NULL,
  `datefacture` date NOT NULL,
  `echeance` date NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etatfacture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modalite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lignes`
--

CREATE TABLE `lignes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `materiaux_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materiels`
--

CREATE TABLE `materiels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeMateriaux` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materiels`
--

INSERT INTO `materiels` (`id`, `codeMateriaux`, `designation`, `prix`, `type`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'MAT001', 'TUYAU 1\"', 5, 'MATERIELS', 1, '2021-01-15 21:54:29', '2021-01-15 21:54:29'),
(2, 'TY002', 'Tuyau 2\"', 7, 'Materiel', 1, '2021-01-16 08:23:22', '2021-01-16 08:23:22'),
(3, 'CV001', 'CUVE EN PORCELAINE', 50, 'Matériel', 1, '2021-01-16 08:28:37', '2021-01-16 08:28:37'),
(4, 'PT001', 'PEINTURE 1L', 25, 'Materiel', 1, '2021-01-16 08:36:15', '2021-01-16 08:36:15'),
(5, 'CM001', 'CIMENT DE CONSTRUCTION', 10, 'Materiel', 1, '2021-01-16 10:59:52', '2021-01-16 10:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_15_175119_create_permission_tables', 1),
(5, '2021_01_15_191514_create_echanges_table', 1),
(6, '2021_01_15_191740_create_monnaies_table', 1),
(7, '2021_01_15_191813_create_professions_table', 1),
(8, '2021_01_15_191856_create_entreprises_table', 1),
(9, '2021_01_15_192127_create_pays_table', 1),
(10, '2021_01_15_192155_create_provinces_table', 1),
(11, '2021_01_15_192236_create_villes_table', 1),
(12, '2021_01_15_192335_create_agents_table', 1),
(13, '2021_01_15_192407_create_clients_table', 1),
(14, '2021_01_15_192620_create_contacts_table', 1),
(15, '2021_01_15_192751_create_projets_table', 1),
(16, '2021_01_15_192855_create_etapes_table', 1),
(17, '2021_01_15_193120_create_paiements_table', 1),
(18, '2021_01_15_193209_create_factures_table', 1),
(19, '2021_01_15_193314_create_departements_table', 1),
(20, '2021_01_15_193359_create_services_table', 1),
(21, '2021_01_15_193514_create_taches_table', 1),
(22, '2021_01_15_193718_create_materiels_table', 1),
(23, '2021_01_15_193842_create_lignes_table', 1),
(24, '2021_01_15_193907_create_devis_table', 1),
(25, '2021_01_15_194115_create_commandes_table', 1),
(26, '2021_01_15_194158_create_depenses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monnaies`
--

CREATE TABLE `monnaies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeMonnaie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviationMonnaie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symboleMonnaie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intituleMonnaie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datepaiement` date NOT NULL,
  `montant` date NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `projet_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codePays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomPays` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-01-15 18:48:13', '2021-01-15 18:48:13'),
(2, 'role-create', 'web', '2021-01-15 18:48:13', '2021-01-15 18:48:13'),
(3, 'role-edit', 'web', '2021-01-15 18:48:13', '2021-01-15 18:48:13'),
(4, 'role-delete', 'web', '2021-01-15 18:48:13', '2021-01-15 18:48:13'),
(5, 'client-list', 'web', '2021-01-15 18:48:13', '2021-01-15 18:48:13'),
(6, 'client-create', 'web', '2021-01-15 18:48:14', '2021-01-15 18:48:14'),
(7, 'client-edit', 'web', '2021-01-15 18:48:14', '2021-01-15 18:48:14'),
(8, 'client-delete', 'web', '2021-01-15 18:48:14', '2021-01-15 18:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `intituleFr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intituleEn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeProjet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomProjet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `methodepaiement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etatprojet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chefprojet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BudgetProjet` double DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomProvince` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-01-15 18:48:49', '2021-01-15 18:48:49'),
(2, 'chef projet', 'web', '2021-01-16 05:23:04', '2021-01-16 05:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nbreAgent` int(11) NOT NULL,
  `chefservice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `designation`, `nbreAgent`, `chefservice`, `users_id`, `departement_id`, `created_at`, `updated_at`) VALUES
(1, 'ARCHITECTURE', 10, 'Steven', 1, 1, '2021-01-16 13:26:43', '2021-01-16 13:26:43'),
(2, 'Terrassement', 15, 'Junior k', 1, 1, '2021-01-16 17:56:55', '2021-01-16 17:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `taches`
--

CREATE TABLE `taches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `priorite` int(11) NOT NULL,
  `avancement` int(11) NOT NULL,
  `etat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etape_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `agent_id`, `etat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Steven MBIYA', 'admin@gmail.com', NULL, '$2y$10$60ey0DwbQSlt7VEKUhM.9eLakukEBcoU/hY6vusEnaDeG4Yng5OlC', 1, 'active', NULL, '2021-01-15 18:48:49', '2021-01-15 18:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomVille` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agents_codeagent_unique` (`codeAgent`),
  ADD UNIQUE KEY `agents_matriculeagent_unique` (`matriculeAgent`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_codeclient_unique` (`codeClient`),
  ADD KEY `clients_users_id_foreign` (`users_id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `commandes_reference_unique` (`reference`),
  ADD KEY `commandes_devis_id_foreign` (`devis_id`),
  ADD KEY `commandes_users_id_foreign` (`users_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_client_id_foreign` (`client_id`),
  ADD KEY `contacts_users_id_foreign` (`users_id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departements_users_id_foreign` (`users_id`);

--
-- Indexes for table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `depenses_reference_unique` (`reference`),
  ADD KEY `depenses_commande_id_foreign` (`commande_id`),
  ADD KEY `depenses_projet_id_foreign` (`projet_id`),
  ADD KEY `depenses_etape_id_foreign` (`etape_id`),
  ADD KEY `depenses_tache_id_foreign` (`tache_id`),
  ADD KEY `depenses_service_id_foreign` (`service_id`),
  ADD KEY `depenses_users_id_foreign` (`users_id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devis_reference_unique` (`reference`),
  ADD KEY `devis_projet_id_foreign` (`projet_id`),
  ADD KEY `devis_client_id_foreign` (`client_id`),
  ADD KEY `devis_service_id_foreign` (`service_id`),
  ADD KEY `devis_users_id_foreign` (`users_id`);

--
-- Indexes for table `echanges`
--
ALTER TABLE `echanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entreprises_nom_unique` (`nom`);

--
-- Indexes for table `etapes`
--
ALTER TABLE `etapes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etapes_nometape_unique` (`nomEtape`),
  ADD KEY `etapes_projet_id_foreign` (`projet_id`),
  ADD KEY `etapes_users_id_foreign` (`users_id`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `factures_reference_unique` (`reference`),
  ADD KEY `factures_projet_id_foreign` (`projet_id`),
  ADD KEY `factures_users_id_foreign` (`users_id`),
  ADD KEY `factures_client_id_foreign` (`client_id`),
  ADD KEY `factures_paiement_id_foreign` (`paiement_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lignes`
--
ALTER TABLE `lignes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lignes_users_id_foreign` (`users_id`),
  ADD KEY `lignes_materiaux_id_foreign` (`materiaux_id`);

--
-- Indexes for table `materiels`
--
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materiels_codemateriaux_unique` (`codeMateriaux`),
  ADD KEY `materiels_users_id_foreign` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `monnaies`
--
ALTER TABLE `monnaies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `monnaies_codemonnaie_unique` (`codeMonnaie`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paiements_reference_unique` (`reference`),
  ADD KEY `paiements_projet_id_foreign` (`projet_id`),
  ADD KEY `paiements_users_id_foreign` (`users_id`),
  ADD KEY `paiements_client_id_foreign` (`client_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pays_codepays_unique` (`codePays`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projets_codeprojet_unique` (`codeProjet`),
  ADD KEY `projets_client_id_foreign` (`client_id`),
  ADD KEY `projets_contact_id_foreign` (`contact_id`),
  ADD KEY `projets_users_id_foreign` (`users_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_pays_id_foreign` (`pays_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_users_id_foreign` (`users_id`),
  ADD KEY `services_departement_id_foreign` (`departement_id`);

--
-- Indexes for table `taches`
--
ALTER TABLE `taches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taches_users_id_foreign` (`users_id`),
  ADD KEY `taches_etape_id_foreign` (`etape_id`),
  ADD KEY `taches_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_province_id_foreign` (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `echanges`
--
ALTER TABLE `echanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etapes`
--
ALTER TABLE `etapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lignes`
--
ALTER TABLE `lignes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materiels`
--
ALTER TABLE `materiels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `monnaies`
--
ALTER TABLE `monnaies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taches`
--
ALTER TABLE `taches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_devis_id_foreign` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `commandes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `contacts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `depenses_etape_id_foreign` FOREIGN KEY (`etape_id`) REFERENCES `etapes` (`id`),
  ADD CONSTRAINT `depenses_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `depenses_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `depenses_tache_id_foreign` FOREIGN KEY (`tache_id`) REFERENCES `taches` (`id`),
  ADD CONSTRAINT `depenses_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `devis_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `devis_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `devis_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `etapes`
--
ALTER TABLE `etapes`
  ADD CONSTRAINT `etapes_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `etapes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `factures_paiement_id_foreign` FOREIGN KEY (`paiement_id`) REFERENCES `paiements` (`id`),
  ADD CONSTRAINT `factures_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `factures_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lignes`
--
ALTER TABLE `lignes`
  ADD CONSTRAINT `lignes_materiaux_id_foreign` FOREIGN KEY (`materiaux_id`) REFERENCES `materiels` (`id`),
  ADD CONSTRAINT `lignes_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `materiels`
--
ALTER TABLE `materiels`
  ADD CONSTRAINT `materiels_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `paiements_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `paiements_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `projets_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `projets_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_pays_id_foreign` FOREIGN KEY (`pays_id`) REFERENCES `pays` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `services_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_etape_id_foreign` FOREIGN KEY (`etape_id`) REFERENCES `etapes` (`id`),
  ADD CONSTRAINT `taches_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `taches_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
