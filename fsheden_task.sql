-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2019 at 10:46 PM
-- Server version: 10.2.26-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fsheden_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `post_index` int(5) NOT NULL,
  `country` varchar(2) NOT NULL DEFAULT 'uk',
  `city` varchar(50) NOT NULL DEFAULT 'Kiev',
  `street` varchar(100) NOT NULL,
  `house` int(3) NOT NULL,
  `flat` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `id_customer`, `post_index`, `country`, `city`, `street`, `house`, `flat`) VALUES
(1, 5, 12356, 'EN', 'Kiev', 'Inkasatorov', 12, NULL),
(2, 6, 12345678, 'UK', 'Kiev', 'Magnitogorska', 5, NULL),
(3, 8, 1234, 'US', 'New York', 'Wall Street', 89, 56),
(4, 5, 1236, 'GE', 'Munhen', 'Shcrichnafierch', 98, 709),
(5, 7, 78123, 'PO', 'Lissabon', 'Saint st', 8, 19),
(6, 3, 96325, 'BR', 'Brazilia', 'football st', 6, 9),
(7, 1, 36258, 'CA', 'Ottava', 'Corso Italia', 13, 25),
(8, 5, 11223, 'EN', 'London', 'Sherloc Holms st', 5, 6),
(9, 5, 22313, 'FR', 'Paris', 'Elisey Fieds st', 8, 79),
(10, 5, 98878, 'UK', 'Nikolaev', 'Крайняя', 80, 6),
(11, 5, 78977, 'UK', 'Jitomer', 'Окружная', 15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `sex` enum('male','female','none') NOT NULL DEFAULT 'male',
  `created` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'none'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `login`, `password`, `first_name`, `last_name`, `sex`, `created`, `email`) VALUES
(1, 'Pavel12345', 'qwerty', 'Павел', 'Шевченко', 'male', 1567831321, 'pavel.shevchenko@gmail.com'),
(3, 'Nickola', 'qwerty', 'Николай', 'Коломиец', 'male', 1567831568, 'kolo@gmail.com'),
(6, 'Dima', 'dima123', 'Дмитро', 'Ревуцький', 'male', 1567836949, 'reva@ukr.net'),
(5, 'Vitaliy', 'qwe31234', 'Виталий', 'Жолудев', 'male', 1567842152, 'jolyd1@bigmir.net'),
(7, 'Olesya', 'olesya1234', 'Олеся', 'Данькевич', 'female', 1567837091, 'olesya@bigmir.net'),
(8, 'Nadejda', 'nadya918237', 'надежда', 'Круглицкая', 'female', 1567837216, 'nadejda@microsoft.com');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1567866550),
('m130524_201442_init', 1567866552),
('m190124_110200_add_verification_token_column_to_user_table', 1567866552);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'sheden', 'Hgklzm7WtVqziQwSY83F-vDpLd2MJkEt', '$2y$13$Sdzy6WC9SZjKPav6glFTmuSnrGPx0TJTmft8p.xzAnGclaCz75woK', NULL, 'filakatleta@gmail.com', 10, 1567867678, 1567867843, 'GlHgmS47OuJLahtt6UoIoxUvYXt_gz6K_1567867678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
