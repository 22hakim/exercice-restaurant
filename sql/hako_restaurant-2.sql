-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : dim. 11 juil. 2021 à 16:57
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hako_restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `cocktail`
--

CREATE TABLE `cocktail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) NOT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cocktail`
--

INSERT INTO `cocktail` (`id`, `name`, `price`, `date_creation`, `picture`, `sold`) VALUES
(71, 'Winter whiskey', '9.00', '2021-06-11 09:30:39', 'drink-01.jpg', 0),
(72, 'Paloma cocktail', '10.50', '2021-06-11 09:32:16', 'drink-02.jpg', 0),
(73, 'Bellini cocktail', '10.80', '2021-06-11 09:32:16', 'drink-03.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) NOT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dessert`
--

INSERT INTO `dessert` (`id`, `name`, `price`, `date_creation`, `picture`, `sold`) VALUES
(51, 'Tiramisu', '8.90', '2021-06-11 09:34:11', 'desert-01.jpg', 0),
(52, 'Freshly pancakes', '7.90', '2021-06-11 09:34:11', 'desert-02.jpg', 0),
(53, 'Red berries cup', '7.90', '2021-06-11 09:34:11', 'desert-03.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `main_dish`
--

CREATE TABLE `main_dish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `category` enum('meat','vegan','fish') NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `main_dish`
--

INSERT INTO `main_dish` (`id`, `name`, `description`, `price`, `picture`, `category`, `date_creation`, `sold`) VALUES
(1, 'Grilled mussels', 'poisson crustassant de Benjamin', '14.00', 'fish-01.jpg', 'fish', '2021-06-11 12:59:42', 0),
(2, 'Mixed vegetables', 'vegan de fou', '9.99', 'vegan-03.jpg', 'vegan', '2021-06-11 12:59:42', 0),
(3, 'Freshly kebabs', 'poulet agneau sans oignons !', '15.00', 'meat-03.jpg', 'meat', '2021-06-11 12:59:42', 0),
(4, 'Cajun shrimp', 'poisson curstassan Mc Cajun', '15.00', 'fish-02.jpg', 'fish', '2021-06-11 12:59:42', 0),
(5, 'Freshly burger', 'burger double steak de poney', '16.00', 'meat-01.jpg', 'meat', '2021-06-11 12:59:42', 0),
(6, 'Grilled eggplants', 'vegan de fou', '12.20', 'vegan-02.jpg', 'vegan', '2021-06-11 12:59:42', 0),
(7, 'Beef stew with pasta', 'viande de bœuf avec ses tagliatelles à la bien', '14.50', 'meat-02.jpg', 'meat', '2021-06-11 12:59:42', 0),
(8, 'Grilled salmon', 'poisson', '16.00', 'fish-03.jpg', 'fish', '2021-06-11 12:59:42', 0),
(9, 'Vegetable jambalaya', 'vegan de fou, supplément lardon', '12.30', 'vegan-01.jpg', 'vegan', '2021-06-11 12:59:42', 0);

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(11, 6, 1, 1, '14.00'),
(12, 6, 5, 1, '16.00'),
(13, 6, 72, 1, '10.50'),
(14, 6, 3, 1, '15.00'),
(15, 6, 52, 1, '7.90'),
(16, 7, 1, 1, '14.00'),
(17, 8, 1, 1, '14.00'),
(18, 10, 2, 1, '9.99'),
(19, 10, 1, 1, '14.00'),
(30, 11, 1, 1, '14.00'),
(31, 11, 2, 1, '9.99'),
(32, 12, 2, 1, '9.99'),
(33, 12, 1, 1, '14.00'),
(34, 13, 1, 2, '14.00'),
(35, 13, 3, 1, '15.00'),
(36, 14, 8, 1, '16.00'),
(37, 14, 53, 1, '7.90'),
(38, 15, 6, 1, '12.20'),
(39, 16, 9, 2, '12.30'),
(40, 17, 51, 1, '8.90');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(6,2) DEFAULT NULL,
  `paid` enum('yes','no') NOT NULL DEFAULT 'no',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `paid`, `order_date`) VALUES
(6, 1, NULL, 'no', '2021-06-18 08:08:58'),
(7, 1, NULL, 'no', '2021-06-18 08:09:42'),
(8, 1, NULL, 'no', '2021-06-18 08:12:11'),
(9, 1, NULL, 'no', '2021-06-18 08:12:31'),
(10, 1, NULL, 'no', '2021-06-18 08:13:46'),
(11, 1, NULL, 'no', '2021-06-18 08:20:49'),
(12, 1, NULL, 'no', '2021-06-18 10:40:10'),
(13, 2, NULL, 'no', '2021-06-18 12:27:43'),
(14, 1, NULL, 'no', '2021-06-18 13:56:30'),
(15, 1, NULL, 'no', '2021-06-18 14:47:58'),
(16, 1, NULL, 'no', '2021-06-18 14:48:42'),
(17, 1, '8.90', 'yes', '2021-06-18 14:56:12');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `ref` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`ref`, `price`) VALUES
(1, '14.00'),
(2, '9.99'),
(3, '15.00'),
(4, '15.00'),
(5, '16.00'),
(6, '12.20'),
(7, '14.50'),
(8, '16.00'),
(9, '12.30'),
(51, '8.90'),
(52, '7.90'),
(53, '7.90'),
(71, '9.00'),
(72, '10.50'),
(73, '10.80');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `creation_date`) VALUES
(1, 'test', '$2y$10$C5B391dAJLn3Xd9Mb0LuYOkZ6Cr2cW/D5cVNpcL9IafHG/AKG2eK6', 'test@test.fr', '2021-06-11 11:20:23'),
(2, 'test', '$2y$10$UWhHx6IFGNnxap09hAucbeH.bh77Rp77DRzEVJDZJ/wiP5bu5M0u.', 'test@live.fr', '2021-06-14 09:38:23'),
(3, 'aaa', '$2y$10$SPdBIvRfwH3xXfojFKfFY.4UJWVG/z4rJFmuttn6dnEWVCTSupooy', 'aaa@aaa.fr', '2021-06-16 09:10:28'),
(4, 'Jacques', '$2y$10$5JWSXLpY.r/2XrSljYuI/.518Vm/UndbgzRKciSjcJnj3wPRakeYi', 'jacques@gmail.com', '2021-06-17 14:46:01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cocktail`
--
ALTER TABLE `cocktail`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `main_dish`
--
ALTER TABLE `main_dish`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ref`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cocktail`
--
ALTER TABLE `cocktail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `main_dish`
--
ALTER TABLE `main_dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
