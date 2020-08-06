-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 09:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'meriem', 'm123@');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `size` text NOT NULL,
  `color` text NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `size`, `color`, `qty`) VALUES
(22, '::1', 'Size M', 'White', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Femmes', 'Modèles pour les Femmes'),
(2, 'Hommes ', 'Modèles pour les Hommes'),
(3, 'Enfants', 'Modèles pour les Enfants');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(225) NOT NULL,
  `coupon_price` varchar(225) NOT NULL,
  `coupon_code` varchar(225) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(1, 22, 'coupon jackets', '200', '12344566', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_info` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_archive` int(10) DEFAULT 0,
  `promotion` int(11) NOT NULL DEFAULT 0,
  `promo_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_info`, `product_desc`, `product_archive`, `promotion`, `promo_price`) VALUES
(1, 2, 1, '2020-08-04 18:45:31', 'chemise femme', '', '', '', 150, '<p>Chemise en coton</p>', '<p>Chemise des derniers mod&egrave;les pour votre &eacute;l&eacute;gance</p>', 1, 1, 99),
(3, 1, 1, '2020-07-23 16:41:56', 'chemise', '', '', '', 225, '<p>Jackets</p>', '<p>jackets femme</p>', 1, 0, 0),
(4, 4, 1, '2020-07-23 16:42:01', 'Chandail', 'kadin_kazak_123158.jpg', 'kadin_kazak_123161.jpg', 'kadin_kazak_123159.jpg', 72, '<p>Chandail</p>', '<p>chandail femme</p>', 1, 0, 0),
(6, 6, 1, '2020-07-21 17:05:26', 'pantalon', 'kadin_pantolon_126637.jpg', 'kadin_pantolon_126639.jpg', 'kadin_pantolon_126638.jpg', 150, '<p>Pantalon</p>', '<p>Pantalon femme</p>', 0, 0, 0),
(7, 6, 1, '2020-08-04 23:25:21', 'Pantalon', 'denim_kadin_pantolon_129704.jpg', 'denim_kadin_pantolon_129702.jpg', 'denim_kadin_pantolon_129703.jpg', 120, '<p>Pantalon</p>', '<p>Pantalon femme</p>', 0, 1, 90),
(8, 2, 2, '2020-07-21 17:08:37', 'Chemise', 'erkek_gomlek_kkol_114696.jpg', 'erkek_gomlek_kkol_114698.jpg', 'erkek_gomlek_kkol_114697.jpg', 200, '<p>Chemise</p>', '<p>Chemise Homme</p>', 0, 0, 0),
(9, 2, 2, '2020-07-21 17:09:45', 'Chemise', 'siyah_erkek_gomlek_ukol_113029.jpg', 'siyah_erkek_gomlek_ukol_113031.jpg', 'siyah_erkek_gomlek_ukol_113030.jpg', 200, '<p>Chemise</p>', '<p>Chemise Homme</p>', 0, 0, 0),
(10, 3, 1, '2020-07-21 17:11:48', 'Gardigan', 'kadn_hrka_109058.jpg', 'kadn_hrka_109061.jpg', 'kadn_hrka_109059.jpg', 90, '<p>Gardigan</p>', '<p>Gardigan Femme</p>', 0, 0, 0),
(12, 3, 2, '2020-07-21 17:16:14', 'Gardigan', 'mavi_erkek_hrka_115471.jpg', 'mavi_erkek_hrka_115473.jpg', 'mavi_erkek_hrka_115472.jpg', 170, '<p>Gardigan</p>', '<p>Gardigan Homme</p>', 0, 0, 0),
(13, 5, 1, '2020-07-21 17:17:51', 'T-Chert', 'kadin_tshirt_kkol_117763.jpg', 'kadin_tshirt_kkol_117766.jpg', 'kadin_tshirt_kkol_117764.jpg', 90, '<p>T-Chert</p>', '<p>T-Chert Femme</p>', 0, 0, 0),
(14, 5, 1, '2020-07-21 17:19:03', 'T-Chert', 'pembe_kadin_tshirt_kkol_112516.jpg', 'pembe_kadin_tshirt_kkol_112519.jpg', 'pembe_kadin_tshirt_kkol_112517.jpg', 90, '<p>T-Chert</p>', '<p>T-Chert Femme</p>', 0, 0, 0),
(15, 5, 2, '2020-07-21 17:20:03', 'T-Chert', 'beyaz_erkek_tshirt_kkol_118360.jpg', 'beyaz_erkek_tshirt_kkol_118363.jpg', 'beyaz_erkek_tshirt_kkol_118361.jpg', 100, '<p>T-Chert</p>', '<p>T-Chert Homme</p>', 0, 0, 0),
(16, 5, 2, '2020-07-22 17:53:12', 'T-Chert', 'erkek_tshirt_kkol_111122.jpg', 'erkek_tshirt_kkol_111124.jpg', 'erkek_tshirt_kkol_111123.jpg', 130, '<p>T-Chert</p>', '<p>T-Chert Homme</p>', 0, 0, 0),
(17, 6, 1, '2020-07-21 17:22:48', 'Pantalon', 'kadin_pantolon_130015.jpg', 'kadin_pantolon_130013.jpg', 'kadin_pantolon_130014.jpg', 200, '<p>Pantalon</p>', '<p>Pantalon Femme</p>', 0, 0, 0),
(18, 6, 2, '2020-07-21 17:23:35', 'Pantalon', '041_danny_dar_kesim_dusuk_bel_dar_paca_siyah_jean_pantolon_132041.jpg', 'siyah_erkek_pantolon_113589.jpg', '041_danny_dar_kesim_dusuk_bel_dar_paca_siyah_jean_pantolon_132040.jpg', 150, '<p>Pantalon</p>', '<p>Pantalon Homme</p>', 0, 0, 0),
(19, 2, 1, '2020-07-21 17:25:01', 'Chemise', 'mavi_kadin_gomlek_ukol_113252.jpg', 'mavi_kadin_gomlek_ukol_113255.jpg', 'mavi_kadin_gomlek_ukol_113253.jpg', 170, '<p>Chemise</p>', '<p>Chemise Femme</p>', 0, 0, 0),
(20, 1, 2, '2020-08-04 22:09:40', 'Jackets', 'erkek_ceket_106980.jpg', 'erkek_ceket_106982.jpg', 'erkek_ceket_106981.jpg', 250, '<p>Jackets</p>', '<p>Jackets Homme</p>', 0, 1, 200),
(22, 1, 1, '2020-08-04 23:22:00', 'Jackets', 'denim_kadin_ceket_126554.jpg', 'denim_kadin_ceket_126552.jpg', 'denim_kadin_ceket_126553.jpg', 250, '<p>Jacket Femme</p>', '<p>Jacket Femme</p>', 0, 0, 0),
(23, 6, 2, '2020-08-04 23:23:29', 'Pantalon', 'bej_erkek_pantolon_84671.jpg', 'bej_erkek_pantolon_84674.jpg', 'bej_erkek_pantolon_84672.jpg', 150, '<p>Pantalon Homme</p>', '<p>Pantalon Homme</p>', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Jackets', 'les derniers modèles d\'été'),
(2, 'chemise & blouse', 'les derniers modèles d\'été'),
(3, 'Gardigan', 'les derniers modèles d\'été'),
(4, 'Chandial', 'les derniers modèles d\'été'),
(5, 'T-Chert', 'les derniers modèles d\'été'),
(6, 'Pantalon', 'les derniers modèles d\'été');

-- --------------------------------------------------------

--
-- Table structure for table `register_admin`
--

CREATE TABLE `register_admin` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_admin`
--

INSERT INTO `register_admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'meriem', 'meriem123@gmail.com', 'm123@'),
(2, 'khaoula', 'khaoula@gmail.com', '12345@'),
(3, 'mery', 'm1@gmail.com', 'mm1234'),
(5, 'meriemmm', 'mmmmm@gmail.com', 'mm123');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(10) NOT NULL,
  `image_slide` text NOT NULL,
  `title_slide` varchar(100) NOT NULL,
  `desc_slide` varchar(200) NOT NULL,
  `archif_slide` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `image_slide`, `title_slide`, `desc_slide`, `archif_slide`) VALUES
(1, 'slide-04.jpg', 'WOMAN COLLECTION 2020', '<p>NEW SEASON</p>', 0),
(2, 'slide-02.jpg', 'MAN NEW SEASON', '<p>JAKETES &amp; COATS</p>', 0),
(3, 'slide-03.jpg', 'MEN COLLECTION 2020', '<p>NEW ARRIVALS</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_inscr` date NOT NULL,
  `user_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `date_inscr`, `user_ip`) VALUES
(1, 'Meriem Benrhabra', 'meriem.benrhabra1@gmail.com', '1e2a796539042ca860c3091662aa4346', '0000-00-00', ''),
(2, 'Marwa', 'marwa@gmail.com', '1e2a796539042ca860c3091662aa4346', '0000-00-00', ''),
(3, 'khaoula', 'khaoula1@gmail.coml', 'bc022864f419e5f201abb67179ee4acf', '2020-07-14', ''),
(4, 'mery', 'mery@gmail.com', '33911ce130141766273452d36df19b6d', '2020-07-16', ''),
(5, 'mm', 'mmm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-07-23', ''),
(6, 'mariam', 'mariam@gmail.com', 'bc022864f419e5f201abb67179ee4acf', '2020-07-23', ''),
(7, 'nouha', 'nouha@gmail.com', '14f5c0da2b4577d575c52bdcdbbbb3ee', '2020-07-27', ''),
(8, 'usertest', 'user@gmail.com', 'a176b04df256e82d5862e61a73cca8cf', '2020-08-02', ' ::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `register_admin`
--
ALTER TABLE `register_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register_admin`
--
ALTER TABLE `register_admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
