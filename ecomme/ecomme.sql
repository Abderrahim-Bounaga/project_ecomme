-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 juil. 2020 à 06:54
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecomme`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `client_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `item_title` varchar(50) NOT NULL,
  `item_image` varchar(50) NOT NULL,
  `item_price` int(50) NOT NULL,
  `item_quantity` int(20) NOT NULL,
  `promo_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`client_id`, `item_id`, `item_title`, `item_image`, `item_price`, `item_quantity`, `promo_price`) VALUES
(1, 5, 'bracelet', 'banner-02.jpg', 500, 2, 0),
(49, 8, 'rell', 'banner-04.jpg', 300, 2, 0),
(49, 10, 'glass', 'banner-05.jpg', 199, 2, 0),
(49, 16, 'asta', 'banner-07.jpeg', 566, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_form` text NOT NULL,
  `product_info` varchar(350) NOT NULL,
  `product_image` text NOT NULL,
  `product_image2` text NOT NULL,
  `product_image3` text NOT NULL,
  `Category_id` int(11) DEFAULT NULL,
  `product_archif` int(11) DEFAULT 0,
  `product_date` date NOT NULL,
  `Sou_Category_id` int(3) NOT NULL,
  `trend_product` int(20) NOT NULL DEFAULT 0,
  `promotion` int(11) NOT NULL DEFAULT 0,
  `promo_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_form`, `product_info`, `product_image`, `product_image2`, `product_image3`, `Category_id`, `product_archif`, `product_date`, `Sou_Category_id`, `trend_product`, `promotion`, `promo_price`) VALUES
(22, 'Sonata', 300, 'Sonata offers stylish and contemporary designs that adds an element of preciousness to all special o', '', 'Dial Color: Grey, Case Shape: Round\r\nBand Color: Black, Band Material: Silicone\r\nWatch Movement Type: Quartz, Watch Display Type: Digital\r\nAlarm, EL backlight, Chronograph and Day & Date with 24Hr time setting\r\nWater Resistance Depth: 30 meters\r\nWarranty type:Manufacturer; 1 Year Domestic Warranty\r\nUnisex watch', '714mA4RDCEL._UL1500_.jpg', '81rctlPk3oL._UL1500_.jpg', '81KVf2HzRcL._UL1500_.jpg', 0, 0, '2020-07-30', 1, 1, 0, 0),
(23, 'Timex', 577, 'A simpler execution with a linear calendar, capturing the boldness of its elements through color and', '', 'Dial Color: Blue, Case Shape: Round, Dial Glass Material: Mineral\r\nBand Color: Blue, Band Material: Leather\r\nWatch Movement Type: Quartz, Watch Display Type: Analog\r\nCase Material: Brass, Case Diameter: 45 millimeters\r\nWater Resistance Depth: 30 meters\r\n1 year warranty', '81OSo9cKseL._UL1500_.jpg', '91hMCo2yC4L._UL1500_.jpg', '719gm05UODL._UL1500_.jpg', 0, 0, '2020-07-30', 1, 1, 0, 0),
(24, 'Fossil', 459, 'Stainless steel case. Two-tone stainless steel bracelet features rhinestone accents with a fold-over', '', 'Dial Color: Mother of Pearl, Case Shape: Round\r\nBand Color: Rose Gold, Band Material: Leather\r\nWatch Movement Type: Quartz, Watch Display Type: Analog\r\nCase Material: Stainless Steel, Circumference: 185 +/- 5mm\r\nWarranty type: Manufacturer; 2 Years International Warranty\r\nRemove plastic at crown to start the watch', '81tao8Ek0WL._UL1500_.jpg', '71fJk6e2zjL._UL1500_.jpg', '71OZ5g8NCqL._UL1500_.jpg', 0, 0, '2020-07-30', 1, 1, 0, 0),
(25, 'Zonarwood', 300, '7 BENEFITS OF WEARING ZONARWOD RUDRAKSHAM BRACELET -- 1 .Rudraksham change the karma of the wearer, ', '', 'A beautiful handmade rudraksha bracelet. Colour: brown quality: AAA (1 % Authentic). 5mm diameter beads are throughout the bracelet. However, quality of rudraksha brads ( Seeds ) and length varies. We assure you the best quality we provide', '81Hx5mIysXL._UL1500_.jpg', '81BTiwCpwoL._UL1500_.jpg', '816yUr+afuL._UL1500_.jpg', 0, 0, '2020-07-30', 2, 1, 0, 0),
(26, 'RUDRADIVINE', 277, 'Stimulate the balancing of your chakras by using this Chakra Bracelet. There are seven energy center', '', 'RUDRA DIVINE - Find the magic You have been missing. Rudra Divine Presents Nature Inspired Jewelry, Inspirational Jewelry, Yoga Inspired Jewelry, Artisan Jewelry & Energy Gemstone Jewelry. Every product is handmade with love and positive intention. These designs are a wonderful way to be uplifted, inspired and reminded of our daily intentions.', '718mDdtfUwL._UL1500_.jpg', '916oGngDdkL._UL1500_.jpg', '61OF0rle3yL._UL1025_.jpg', 0, 0, '2020-07-30', 2, 1, 0, 0),
(27, 'Aqeeqee', 499, 'The bracelet is 7 inches made of stretchable elastic bracelet. We always believe in domestic product', '', '\"Black Obsidian\" has been used since the paleolithic tines when it was used in wars to make arrowheads and other tools. Obsidian is shiny/ glossy and is made from the molten lava which cools down very quickly.', '61BLBG5lIIL._UL1500_.jpg', '61ObuHm-D3L._UL1500_.jpg', '61wv3-aivnL._UL1500_.jpg', 0, 0, '2020-07-30', 2, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) DEFAULT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(48, 'Abderrahim', 'Bounaga', 'bounaga1997@gmail.com', 'abderrahim'),
(49, 'Abderrahim', 'Bounaga', 'aboodbounaga@gmail.com', '$2y$10$8x/q.sOkhxoHGLJNBbnBl.oBVZ5iZzvBI2IdZzUqXuFdewJSvElNG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
