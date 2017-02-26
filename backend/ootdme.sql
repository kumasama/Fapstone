-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2017 at 11:38 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ootdme`
--

-- --------------------------------------------------------

--
-- Table structure for table `chasers`
--

CREATE TABLE `chasers` (
  `id` int(11) NOT NULL,
  `last_name` varchar(63) NOT NULL,
  `first_name` varchar(63) NOT NULL,
  `middle_name` varchar(63) DEFAULT NULL,
  `username` varchar(31) NOT NULL,
  `password` varchar(31) NOT NULL,
  `photo` varchar(512) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(63) NOT NULL,
  `bio` varchar(1023) DEFAULT NULL,
  `fb` varchar(1023) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chasers`
--

INSERT INTO `chasers` (`id`, `last_name`, `first_name`, `middle_name`, `username`, `password`, `photo`, `gender`, `address`, `birthdate`, `regdate`, `email`, `bio`, `fb`, `status`) VALUES
(1, 'Sama', 'Kuma', NULL, 'kumasama', '131322Clear', NULL, NULL, NULL, '2003-03-01', '2017-02-26 15:01:32', 'kumaaa.sama@gmail.com', NULL, NULL, 1),
(2, 'Mae', 'Glaichi', NULL, 'glaichi', '131322Clear', NULL, NULL, NULL, '2003-03-02', '2017-02-26 19:13:18', 'glaichimae@gmail.com', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `closets`
--

CREATE TABLE `closets` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `type` varchar(31) NOT NULL,
  `chaser_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `closet_items`
--

CREATE TABLE `closet_items` (
  `id` int(11) NOT NULL,
  `closet_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `type` varchar(63) NOT NULL,
  `brand` varchar(63) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `chaser_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `brand`, `size`, `photo`, `chaser_id`) VALUES
(1, 'Blue Ripped Jeans', 'Pants', 'Anthology', ' ', 'uploads/225293037418663c2.png', 1),
(2, 'GG Uips', 'Skirt', 'Art & Soul', ' ', 'uploads/12539130411121v3.jpg', 1),
(3, 'Something to wear', 'Shoes', 'Balmain', '12', 'uploads/1329058519592o.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_brands`
--

CREATE TABLE `item_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_brands`
--

INSERT INTO `item_brands` (`id`, `name`) VALUES
(1, '	ALC\r\n'),
(2, '	Abercrombie & Fitch\r\n'),
(3, '	Adidas\r\n'),
(4, '	Adina\r\n'),
(5, '	Aeropostale\r\n'),
(6, '	Agnes b\r\n'),
(7, '	Agua Bendita \r\n'),
(8, '	Alberto\r\n'),
(9, '	American Apparel\r\n'),
(10, '	American Eagle Outfitters\r\n'),
(11, '	Anello\r\n'),
(12, '	Anthill\r\n'),
(13, '	Anthology\r\n'),
(14, '	Armani\r\n'),
(15, '	Art & Soul\r\n'),
(16, '	Badgley Mischka\r\n'),
(17, '	Balenciaga\r\n'),
(18, '	Bally Shoe\r\n'),
(19, '	Balmain\r\n'),
(20, '	Balmain\r\n'),
(21, '	Banana Republic\r\n'),
(22, '	Bayo\r\n'),
(23, '	Bench\r\n'),
(24, '	Bershka\r\n'),
(25, '	Billabong\r\n'),
(26, '	Birkenstock\r\n'),
(27, '	Black Sheep\r\n'),
(28, '	Bum\r\n'),
(29, '	Burberry\r\n'),
(30, '	Bvlgari\r\n'),
(31, '	Calvin Klein\r\n'),
(32, '	Celine\r\n'),
(33, '	Champion\r\n'),
(34, '	Chanel\r\n'),
(35, '	Chloe\r\n'),
(36, '	Claires \r\n'),
(37, '	Cotton On\r\n'),
(38, '	Crocs\r\n'),
(39, '	DC\r\n'),
(40, '	Dickies\r\n'),
(41, '	Dior\r\n'),
(42, '	DKNY\r\n'),
(43, '	Dolce and Gabbana \r\n'),
(44, '	Dunlop\r\n'),
(45, '	Element\r\n'),
(46, '	Espirit\r\n'),
(47, '	Fendi\r\n'),
(48, '	Fila\r\n'),
(49, '	Folded & Hung \r\n'),
(50, '	For Me\r\n'),
(51, '	Forever \r\n'),
(52, '	Fossil\r\n'),
(53, '	French Connection\r\n'),
(54, '	Gap\r\n'),
(55, '	Gibi Shoes\r\n'),
(56, '	Ginger Snaps \r\n'),
(57, '	Givenchy\r\n'),
(58, '	Gucci\r\n'),
(59, '	Guess\r\n'),
(60, '	H&M \r\n'),
(61, '	Hanes\r\n'),
(62, '	Havaianas \r\n'),
(63, '	Heart Strings\r\n'),
(64, '	Hermes\r\n'),
(65, '	Herschel \r\n'),
(66, '	Hollister\r\n'),
(67, '	Human\r\n'),
(68, '	Hurley\r\n'),
(69, '	JCrew\r\n'),
(70, '	Jag\r\n'),
(71, '	Jansport\r\n'),
(72, '	Kamiseta \r\n'),
(73, '	Keds\r\n'),
(74, '	Kenzon\r\n'),
(75, '	Kultura Filipino\r\n'),
(76, '	Lacoste\r\n'),
(77, '	Lee\r\n'),
(78, '	Levis \r\n'),
(79, '	Loalde\r\n'),
(80, '	Louis Vuitton\r\n'),
(81, '	Lulu Lemon\r\n'),
(82, '	Mango\r\n'),
(83, '	Marc Jacobs\r\n'),
(84, '	Mario de Boro\r\n'),
(85, '	Marks & Spencer\r\n'),
(86, '	Memo\r\n'),
(87, '	Michael Kors \r\n'),
(88, '	Nick Automatic\r\n'),
(89, '	Nike\r\n'),
(90, '	Nine West\r\n'),
(91, '	Nixon\r\n'),
(92, '	Nordstrom\r\n'),
(93, '	Oakley\r\n'),
(94, '	Old Navy\r\n'),
(95, '	Onitsuka Tiger\r\n'),
(96, '	Osh Kosh\r\n'),
(97, '	Oxygen\r\n'),
(98, '	Pacsun\r\n'),
(99, '	Pandora \r\n'),
(100, '	Parisian\r\n'),
(101, '	Penshoppe\r\n'),
(102, '	People are people\r\n'),
(103, '	Periwinkle\r\n'),
(104, '	Plains & Prints\r\n'),
(105, '	Pony\r\n'),
(106, '	Prada\r\n'),
(107, '	Puma\r\n'),
(108, '	Ralph Lauren\r\n'),
(109, '	Rayban\r\n'),
(110, '	Reebok\r\n'),
(111, '	Reebook\r\n'),
(112, '	Regatta \r\n'),
(113, '	Rusty Lopez\r\n'),
(114, '	Sapatomanila\r\n'),
(115, '	Seiko\r\n'),
(116, '	Sketchers \r\n'),
(117, '	So Fab\r\n'),
(118, '	Speedo\r\n'),
(119, '	Sunnies\r\n'),
(120, '	Super Dry\r\n'),
(121, '	Supreme\r\n'),
(122, '	Swatch\r\n'),
(123, '	Terranova\r\n'),
(124, '	Think Positive\r\n'),
(125, '	Tiffany & Co\r\n'),
(126, '	Tomato\r\n'),
(127, '	Tommy Hilfiger\r\n'),
(128, '	Topshop\r\n'),
(129, '	Triumph\r\n'),
(130, '	Under armour \r\n'),
(131, '	Uniqlo\r\n'),
(132, '	Urban Outfitters \r\n'),
(133, '	Valentino\r\n'),
(134, '	Vans\r\n'),
(135, '	Vans\r\n'),
(136, '	Versace\r\n'),
(137, '	Victoria’s Secret\r\n'),
(138, '	What a girl wants\r\n'),
(139, '	Whatever\r\n'),
(140, '	World Balance \r\n'),
(141, '	Wrangler \r\n'),
(142, '	YM\r\n'),
(143, '	Zara\r\n'),
(144, '	Zerothreetwo');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`) VALUES
(2, 'Gloves\r\n'),
(3, 'Armbands\r\n'),
(4, 'Belt\r\n'),
(5, 'Coat'),
(6, 'Jacket\r\n'),
(7, 'Sweater\r\n'),
(8, 'Swimwear\r\n'),
(9, 'T-Shirt\r\n'),
(10, 'Skirt\r\n'),
(11, 'Shoes\r\n'),
(12, 'Sandals\r\n'),
(13, 'Bag\r\n'),
(14, 'Accessories \r\n'),
(15, 'Boots\r\n'),
(16, 'Pants\r\n'),
(17, 'Blouse');

-- --------------------------------------------------------

--
-- Table structure for table `ootd_categories`
--

CREATE TABLE `ootd_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ootd_categories`
--

INSERT INTO `ootd_categories` (`id`, `name`) VALUES
(1, 'Kpop\r\n'),
(2, 'Hippie\r\n'),
(3, 'Chic\r\n'),
(4, 'Casual\r\n'),
(5, 'Summer\r\n'),
(6, 'R18\r\n'),
(7, 'Coachella\r\n'),
(8, 'Gothic\r\n'),
(9, 'Punk\r\n'),
(10, '90\'s\n'),
(11, '80\'s\n'),
(12, 'Formal\r\n'),
(13, 'Semi-Formal\r\n'),
(14, 'Brandless\r\n'),
(15, 'Prom\r\n'),
(16, 'Sports\r\n'),
(17, 'Swimwear\r\n'),
(18, 'School\r\n'),
(19, 'Wedding\r\n'),
(20, 'Street Style\r\n'),
(21, 'Throwback');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chasers`
--
ALTER TABLE `chasers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closets`
--
ALTER TABLE `closets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closet_items`
--
ALTER TABLE `closet_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_brands`
--
ALTER TABLE `item_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ootd_categories`
--
ALTER TABLE `ootd_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chasers`
--
ALTER TABLE `chasers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `closets`
--
ALTER TABLE `closets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `closet_items`
--
ALTER TABLE `closet_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_brands`
--
ALTER TABLE `item_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ootd_categories`
--
ALTER TABLE `ootd_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
