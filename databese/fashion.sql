-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 12:23 PM
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(100) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_img` text NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_date` date NOT NULL,
  `blog_archive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_img`, `blog_desc`, `blog_date`, `blog_archive`) VALUES
(1, 'Modèles de sweat-shirts pour femmes', 'blog-06.jpg', '<p><strong style=\"box-sizing: border-box; font-weight: bolder; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les mod&egrave;les de sweat-shirts pour femmes qui</span></span></strong><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;viennent &agrave; votre secours pendant les mois frais du printemps, les nuits d\'&eacute;t&eacute; ou les jours d\'hiver&nbsp;&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">sont chez Colin\'s avec les designs les plus styl&eacute;s de la saison!&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Parfois, vous pourrez transmettre le message que vous souhaitez &agrave; l\'autre partie avec votre sweat-shirt portant le slogan que vous compl&eacute;tez avec votre pantalon en denim et vous appr&eacute;cierez d\'&ecirc;tre cool.&nbsp;</span></span><span lang=\"DE\" style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Le conteneur</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;USO et les poches du manteau style&nbsp;&nbsp;</span></span><span lang=\"FR\" style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">sport&nbsp;</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Avec l\'ajout de mod&egrave;les classiques &agrave; paillettes aux pulls molletonn&eacute;s ces derni&egrave;res ann&eacute;es, les femmes au style flamboyant ont commenc&eacute; &agrave; les inclure facilement dans leurs garde-robes sweat-shirts.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Dans la saison estivale 2020, une aventure mode plus flamboyante se poursuit avec des mod&egrave;les de sweat-shirts de style classique aux d&eacute;tails &eacute;tincelants, brillants, brod&eacute;s et fins.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Alors que cette aventure s\'accompagne d\'agrafes, de pompons et de fermetures &eacute;clair dans un style rebelle;&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les coupes boyfriend deviennent indispensables pour les femmes qui veulent cr&eacute;er un style masculin.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Vous pouvez&nbsp;</span><strong style=\"box-sizing: border-box; font-weight: bolder;\"><a style=\"box-sizing: border-box; color: #373e44; text-decoration: none; background-color: transparent;\" href=\"https://www.colins.com.tr/c/sweatshirt-189\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">combiner</span></a></strong><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;n\'importe quel style de&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;mod&egrave;le de&nbsp;</span><strong style=\"box-sizing: border-box; font-weight: bolder;\"><a style=\"box-sizing: border-box; color: #373e44; text-decoration: none; background-color: transparent;\" href=\"https://www.colins.com.tr/c/sweatshirt-189\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">sweat-shirt pour femme</span></a></strong><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;avec des vestes en denim, des manteaux en cuir et des accessoires en cuir,</span></span></p>', '2020-08-15', 0),
(3, 'Modèles de manteaux pour hommes', 'blog-05.jpg', '<p><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Le moyen le plus tendance de se prot&eacute;ger du froid est de passer par colins.com.tr.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">D&eacute;couvrez&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">les&nbsp;</span></span><a style=\"box-sizing: border-box; color: #373e44; text-decoration: none; background-color: #ffffff; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\" href=\"https://www.colins.com.tr/c/erkek-kaban-250\"><span style=\"box-sizing: border-box; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">mod&egrave;les de manteaux pour hommes</span></span></span>&nbsp;</a><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">les plus en vogue&nbsp;</span><a style=\"box-sizing: border-box; color: #373e44; text-decoration: none; background-color: transparent;\" href=\"https://www.colins.com.tr/c/erkek-kaban-250\"><span style=\"box-sizing: border-box; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">de la</span></span></a><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;saison &agrave;&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">des prix abordables!&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Gardez votre style debout tout au long de l\'hiver.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les mod&egrave;les de manteaux continuent de changer de forme selon les tendances de la mode et apparaissent avec des designs diff&eacute;rents au fil des ans.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Parmi&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">les&nbsp;</span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">mod&egrave;les de manteaux pour hommes</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;les plus marquants&nbsp;</span><span style=\"box-sizing: border-box; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">de</span></span><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;ces derni&egrave;res ann&eacute;es, les&nbsp;</span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">mod&egrave;les de manteaux tampons prennent la</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;t&ecirc;te.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Avec une posture simple et un style classique, les mod&egrave;les indispensables de manteaux tampons pour hommes sont pr&ecirc;ts &agrave; compl&eacute;ter les combinaisons de la nouvelle saison avec diff&eacute;rentes options de couleurs.&nbsp;</span><span style=\"box-sizing: border-box; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Tricots</span></span><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;dans diverses parties des mod&egrave;les de manteau de&nbsp;</span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">timbre</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les mod&egrave;les d&eacute;taill&eacute;s avec font partie des mod&egrave;les remarquables de la saison.&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les mod&egrave;les en tissu coupe-vent qui peuvent &ecirc;tre port&eacute;s confortablement pendant pr&egrave;s de quatre saisons s&eacute;duisent les hommes qui veulent mettre en valeur leur style sportif.&nbsp;</span><span style=\"box-sizing: border-box; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">Les mod&egrave;les de manteaux &agrave; capuche</span></span><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;en&nbsp;</span><span style=\"box-sizing: border-box; vertical-align: inherit;\">parfaite harmonie avec un&nbsp;</span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">jean</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;ou un&nbsp;</span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">pantalon en toile&nbsp;</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; font-family: \'arial black\', \'avant garde\';\"><span style=\"box-sizing: border-box; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">sont</span></span></span><span style=\"box-sizing: border-box; color: #212529; font-family: Montserrat-Light; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; vertical-align: inherit;\"><span style=\"box-sizing: border-box; vertical-align: inherit;\">&nbsp;le choix num&eacute;ro un des hommes dynamiques et &eacute;nergiques qui se sentent toujours jeunes quel que soit leur &acirc;ge.</span></span></p>', '2020-08-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `size` text NOT NULL,
  `color` text NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 22, 'coupon jackets', '200', '12344566', 4, 2),
(2, 0, 'coupon pour les chemises', '', '761413114', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `image_pro` text NOT NULL,
  `title_pro` text NOT NULL,
  `qty` int(10) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `image_pro`, `title_pro`, `qty`, `color`, `size`, `order_date`, `order_status`) VALUES
(1, 0, 300, 1469365325, '041_danny_dar_kesim_dusuk_bel_dar_paca_siyah_jean_pantolon_132041.jpg', 'Pantalon', 2, 'Blue', 'Size M', '2020-08-13', 'pending'),
(2, 0, 750, 1469365325, 'denim_kadin_ceket_126554.jpg', 'Jackets', 3, 'White', 'Size M', '2020-08-13', 'pending'),
(3, 0, 150, 1469365325, 'bej_erkek_pantolon_84671.jpg', 'Pantalon', 1, 'Blue', 'Size S', '2020-08-13', 'pending'),
(4, 10, 120, 1441251583, 'denim_kadin_pantolon_129704.jpg', 'Pantalon', 1, 'Grey', 'Size M', '2020-08-13', 'pending'),
(5, 10, 90, 1441251583, 'pembe_kadin_tshirt_kkol_112516.jpg', 'T-Chert', 1, 'White', 'Size M', '2020-08-13', 'pending'),
(12, 10, 130, 164072955, 'erkek_tshirt_kkol_111122.jpg', 'T-Chert', 1, 'Blue', 'Size M', '2020-08-13', 'pending'),
(13, 10, 600, 164072955, 'kadin_pantolon_130015.jpg', 'Pantalon', 3, 'Blue', 'Size M', '2020-08-13', 'pending'),
(14, 10, 250, 2014317186, 'denim_kadin_ceket_126554.jpg', 'Jackets', 1, 'Blue', 'Size S', '2020-08-13', 'pending'),
(15, 0, 150, 1341316258, 'bej_erkek_pantolon_84671.jpg', 'Pantalon', 1, 'Blue', 'Size M', '2020-08-13', 'pending'),
(16, 0, 100, 851848114, 'beyaz_erkek_tshirt_kkol_118360.jpg', 'T-Chert', 1, 'Blue', 'Size M', '2020-08-13', 'pending'),
(17, 10, 170, 1605176076, 'mavi_kadin_gomlek_ukol_113252.jpg', 'Chemise', 1, 'Blue', 'Size M', '2020-08-13', 'Complete'),
(18, 10, 500, 1587553630, 'denim_kadin_ceket_126554.jpg', 'Jackets', 2, 'Blue', 'Size M', '2020-08-15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 1441251583, 120, 'Western Union', 123, 11234, '0000-00-00'),
(2, 164072955, 600, 'Western Union', 1234, 12345676, '0000-00-00'),
(3, 1605176076, 170, 'Western Union', 1234, 2897590, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `color` text NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `color`, `qty`, `size`, `order_status`) VALUES
(1, 0, 1469365325, 18, 'Blue', 2, 'Size M', 'pending'),
(2, 0, 1469365325, 22, 'White', 3, 'Size M', 'pending'),
(3, 0, 1469365325, 23, 'Blue', 1, 'Size S', 'pending'),
(4, 10, 1441251583, 7, 'Grey', 1, 'Size M', 'pending'),
(5, 10, 1441251583, 14, 'White', 1, 'Size M', 'pending'),
(6, 10, 1441251583, 22, 'Blue', 2, 'Size M', 'pending'),
(7, 10, 1494872278, 8, 'Blue', 1, 'Size M', 'pending'),
(8, 10, 1494872278, 13, 'Blue', 1, 'Size M', 'pending'),
(9, 10, 1494872278, 18, 'Grey', 1, 'Size M', 'pending'),
(10, 10, 180925530, 19, 'Blue', 1, 'Size M', 'pending'),
(11, 10, 1315097414, 20, 'Blue', 3, 'Size M', 'pending'),
(12, 10, 164072955, 16, 'Blue', 1, 'Size M', 'pending'),
(13, 10, 164072955, 17, 'Blue', 3, 'Size M', 'pending'),
(14, 10, 2014317186, 22, 'Blue', 1, 'Size S', 'pending'),
(15, 0, 1341316258, 23, 'Blue', 1, 'Size M', 'pending'),
(16, 0, 851848114, 15, 'Blue', 1, 'Size M', 'pending'),
(17, 10, 1605176076, 19, 'Blue', 1, 'Size M', 'Complete'),
(18, 10, 1587553630, 22, 'Blue', 2, 'Size M', 'pending');

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
  `city` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `user_img` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_inscr` date NOT NULL,
  `user_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `city`, `address`, `contact`, `user_img`, `password`, `date_inscr`, `user_ip`) VALUES
(1, 'Meriem Benrhabra', 'meriem.benrhabra1@gmail.com', '', '', '', '', '1e2a796539042ca860c3091662aa4346', '0000-00-00', ''),
(2, 'Marwa', 'marwa@gmail.com', '', '', '', '', '1e2a796539042ca860c3091662aa4346', '0000-00-00', ''),
(3, 'khaoula', 'khaoula1@gmail.coml', '', '', '', '', 'bc022864f419e5f201abb67179ee4acf', '2020-07-14', ''),
(4, 'mery', 'mery@gmail.com', '', '', '', '', '33911ce130141766273452d36df19b6d', '2020-07-16', ''),
(5, 'mm', 'mmm@gmail.com', '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', '2020-07-23', ''),
(6, 'mariam', 'mariam@gmail.com', '', '', '', '', 'bc022864f419e5f201abb67179ee4acf', '2020-07-23', ''),
(7, 'nouha', 'nouha@gmail.com', '', '', '', '', '14f5c0da2b4577d575c52bdcdbbbb3ee', '2020-07-27', ''),
(8, 'usertest', 'user@gmail.com', '', '', '', '', 'a176b04df256e82d5862e61a73cca8cf', '2020-08-02', ' ::1'),
(9, 'nouhaila', 'nouhaila@gmail.com', '', '', '', '', 'bf5591a2b1a5bdd8ecf788ea595513d3', '2020-08-06', ' ::1'),
(10, 'meryy', 'username@gmail.com', 'marrakech', 'hussna 1 mhamid', '0601770194', 'gallery-03.jpg', '952f65a3e898eb679fe678ecfa495b9c', '2020-08-06', ' ::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

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
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
