-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2022 at 02:55 PM
-- Server version: 10.6.8-MariaDB-1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userIdA` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userIdA`, `email`, `password`, `firstName`, `lastName`, `photo`, `status`) VALUES
(1, 'admin@gmail.com', '$2y$10$bjCIsU03wkusL3ZbUOqEHuEAgTfcADAeQ5GSJbfGczV7RngLdJ/mq', 'Ssegawa', 'leon', 'IMG_20201024_141808_830.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(5) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `userIdS` int(11) DEFAULT NULL,
  `userIdD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Beverages'),
(2, 'flour'),
(3, 'Cooking Oil'),
(4, 'Sugar'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

CREATE TABLE `contain` (
  `containId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `userIdD` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `shopName` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `shopPhoto` varchar(200) DEFAULT NULL,
  `activateCode` varchar(5) DEFAULT NULL,
  `resetCode` varchar(5) DEFAULT NULL,
  `dateCreated` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`userIdD`, `email`, `password`, `firstName`, `lastName`, `tel`, `photo`, `shopName`, `address`, `description`, `shopPhoto`, `activateCode`, `resetCode`, `dateCreated`, `status`) VALUES
(1, 'supplier@gmail.com', '$2y$10$G/4ZR5D3UB1tbp/3ajcl9e3.6o/8y1MqW9CsVo4/D/67Nxq7GKGta', 'Ssegawa', 'Godfrey', '0753446252', 'index.jpeg', 'LeonShop', 'Nansana, Kibuloka', 'Distributors of rice, and all sorts of food stuffs.\r\nWith over 20 years of experience, serving you with high quality stock!', 'logoNew1.png', '46352', NULL, '2022-06-04', 1),
(2, 'supone@gmail.com', '$2y$10$BUno3jwvhNidNZpSWZM.a.62yboHIGQjoW4rKrdgEWRxnXbk9SeCq', 'leon', 'Godfrey', '0753446252', NULL, 'Longhorn publishers', 'Kasubi', 'suppliers of beverages', 'Longhorn.jpg', '06589', NULL, '2022-06-06', 1),
(3, 'andindaruth@gmail.com', '$2y$10$mKdfXU7OSrXlb53a4cHoWeilKZ1rD.asIs2uS6Rfha8bUesq3pI6G', 'Andinda', 'Ruth', '+256704284311', NULL, 'African Queen Limited', 'Kikoni makerere Kampala Uganda', 'Toiletries and  Soaps, Dish Washing, Laundry, Cussons Baby Products, Skin Care, Hair Care.', 'African_Queen.jpg', '41270', NULL, '2022-06-13', 1),
(4, 'ssegodfrey171@gmail.com', '$2y$10$s8B8M4WaYUh3By2lM/eyVulSM3aFeruiSiC3EZQqxtSNp2M7U7J2e', 'Ssegawa', 'Godfrey', '+25675344625', NULL, 'Century Bottling Company', 'Kikoni makerere Kampala Uganda', 'We are the official authorized producer and distributor of Coca-Cola products in Uganda.', 'Coca cocal.jpg', '26783', NULL, '2022-06-13', 1),
(5, 'sanga1@gmail.com', '$2y$10$vLmz4qy66UGQNFHmpskxmeCAHnEUBrtZvpx77SodxTtoiW664lAY.', 'Sanga', 'Arnold', '+256704284311', NULL, 'Fine  Spinners Limited', 'Kikoni makerere Kampala Uganda', 'We produce and supply world class, 100% African, sustainable, traceable garments. This is Field to Fashion', 'fine spinners.jpg', '95032', NULL, '2022-06-13', 1),
(6, 'nakawooyap@gmail.com', '$2y$10$j6UT55NOkPdxmf0Fg7.RUOtjcA6aOQOfPTiFVs0Y9wf7BTRyzFNkC', 'Nakawooya', 'Phionah', '+256704284311', NULL, 'Kakira Sugar', 'Kikoni makerere Kampala Uganda', 'We produce and supply Kakira sugar throughout the country', 'kakira.jpg', '59326', NULL, '2022-06-13', 1),
(7, 'wchris@gmail.com', '$2y$10$uXAlqDFb7laoUPadgic./OJ6KOAdb3R2DZDfpuFbmjXXg2XskB/aq', 'Wabyoona', 'Chrispus', '+256704284311', NULL, 'Livara', 'Kikoni makerere Kampala Uganda', 'We produce and supply lotions and creams addressing different skin needs with fresh, nourishing organic ingredients and beautiful essential oils', 'Livara.jpg', '84173', NULL, '2022-06-13', 1),
(8, 'wabyoona@gmail.com', '$2y$10$ieHyErvxdHYGGBOLCcinWejzgdCrOZ2UydSZhurz..CV.8B6dLKbi', 'Wabyoona', 'Chrispus', '+256704284311', NULL, 'Zenith Supplies', 'Kikoni makerere Kampala Uganda', 'We supply a variety of shop items ranging from baby products, home and garden, health and beauty, super market products among others.', 'Zenith.jpg', '87150', NULL, '2022-06-13', 1),
(9, 'andinda@gmail.com', '$2y$10$4YelwW1qUhjEr1jG0fVQWObyq5XU.488GD.a9BCX9Ic1QGSBUo3Ym', 'Andinda ', 'Ruth', '+256704284311', NULL, 'StockUg', 'Kikoni makerere Kampala Uganda', 'We supply a variety of shop items ranging from baby products, home and garden, health and beauty, super market products eg lotions, soaps, salt, sugar, lighters diapers, wipers etc', 'stockug.png', '46358', NULL, '2022-06-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `NewItem`
--

CREATE TABLE `NewItem` (
  `itemId` int(125) NOT NULL,
  `itemName` varchar(125) NOT NULL,
  `unitsOfMeasurement` varchar(125) NOT NULL,
  `quantityAvailabe` int(125) NOT NULL,
  `unitBuyingPrice` int(125) NOT NULL,
  `unitSellingPrice` int(125) NOT NULL,
  `userIdS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `amount` int(12) DEFAULT NULL,
  `orderNo` varchar(20) DEFAULT NULL,
  `userIdS` int(11) DEFAULT NULL,
  `userIdD` int(11) DEFAULT NULL,
  `status` varchar(150) NOT NULL,
  `productName` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `delivery` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` varchar(100) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `complaint` text DEFAULT NULL,
  `cancelComment` text DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `amount`, `orderNo`, `userIdS`, `userIdD`, `status`, `productName`, `price`, `quantity`, `delivery`, `order_date`, `order_time`, `delivery_date`, `comment`, `complaint`, `cancelComment`, `feedback`) VALUES
(1, 60000, 'st15202206300430', 1, 1, 'delivered', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '04:30:04', NULL, NULL, NULL, NULL, NULL),
(2, 180000, 'st5202206300430', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '04:30:04', NULL, NULL, NULL, NULL, NULL),
(3, 10000, 'st8202206300430', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '04:30:04', NULL, NULL, NULL, NULL, NULL),
(4, 60000, 'st15202206300443', 1, 1, 'delivered', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '04:43:20', NULL, NULL, NULL, NULL, NULL),
(5, 180000, 'st5202206300443', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '04:43:20', NULL, NULL, NULL, NULL, NULL),
(6, 10000, 'st8202206300443', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '04:43:20', NULL, NULL, NULL, NULL, NULL),
(7, 60000, 'st15202206300455', 1, 1, 'delivered', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '04:55:03', NULL, NULL, NULL, NULL, NULL),
(8, 180000, 'st5202206300455', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '04:55:03', NULL, NULL, NULL, NULL, NULL),
(9, 10000, 'st8202206300455', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '04:55:03', NULL, NULL, NULL, NULL, NULL),
(10, 60000, 'st15202206300517', 1, 1, 'delivered', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '05:17:14', '2022-07-02', NULL, NULL, NULL, NULL),
(11, 180000, 'st5202206300517', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '05:17:14', NULL, NULL, NULL, NULL, NULL),
(12, 10000, 'st8202206300517', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '05:17:14', NULL, NULL, NULL, NULL, NULL),
(13, 60000, 'st15202206300518', 1, 1, 'delivered', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '05:18:54', '2022-07-02', NULL, NULL, NULL, NULL),
(14, 180000, 'st5202206300518', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '05:18:54', NULL, NULL, NULL, NULL, NULL),
(15, 10000, 'st8202206300518', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '05:18:54', NULL, NULL, NULL, NULL, NULL),
(16, 60000, 'st15202206300521', 1, 1, 'rejected', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '05:21:27', NULL, NULL, NULL, NULL, NULL),
(17, 180000, 'st5202206300521', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '05:21:27', NULL, NULL, NULL, NULL, NULL),
(18, 10000, 'st8202206300521', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '05:21:27', NULL, NULL, NULL, NULL, NULL),
(19, 60000, 'st15202206300538', 1, 1, 'rejected', 'Sprite 350ml', 10000, 6, 'deliver', '2022-06-30', '05:38:31', NULL, NULL, NULL, NULL, NULL),
(20, 180000, 'st5202206300538', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 5, 'deliver', '2022-06-30', '05:38:31', NULL, NULL, NULL, NULL, NULL),
(21, 10000, 'st8202206300538', 1, 3, 'pending', '*12, choco primo drinking chocolate sackets', 10000, 1, 'deliver', '2022-06-30', '05:38:31', NULL, NULL, NULL, NULL, NULL),
(22, 36000, 'st5202207011258', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 1, 'deliver', '2022-07-01', '12:58:27', NULL, NULL, NULL, NULL, NULL),
(23, 120000, 'st1202207010408', 1, 1, 'delivered', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-07-01', '04:08:04 PM', NULL, NULL, NULL, NULL, 'esrdytugih'),
(24, 11725, 'st19202207020232', 1, 1, 'rejected', 'jessaasdfg', 2345, 5, 'deliver', '2022-07-02', '02:32:35 PM', NULL, NULL, NULL, NULL, NULL),
(25, 120000, 'st1202207020232', 1, 1, 'rejected', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-07-02', '02:32:35 PM', NULL, NULL, NULL, NULL, NULL),
(26, 23000, 'st16202207020232', 1, 1, 'rejected', 'minute maid', 23000, 1, 'deliver', '2022-07-02', '02:32:35 PM', NULL, NULL, NULL, NULL, NULL),
(27, 2345, 'st19202207020301', 1, 1, 'rejected', 'jessaasdfg', 2345, 1, 'deliver', '2022-07-02', '03:01:27 PM', NULL, NULL, NULL, NULL, NULL),
(28, 2345, 'st19202207020304', 1, 1, 'rejected', 'jessaasdfg', 2345, 1, 'deliver', '2022-07-02', '03:04:02 PM', NULL, 'zsdfgh', NULL, NULL, NULL),
(29, 12000, 'st4202207040220', 1, 1, 'delivered', 'Novida short 350ml carton', 12000, 1, 'deliver', '2022-07-04', '02:20:09 PM', '2022-07-04', NULL, NULL, NULL, NULL),
(30, 23000, 'st16202207040424', 1, 1, 'delivered', 'minute maid', 23000, 1, 'pickup', '2022-07-04', '04:24:07 PM', '2022-07-04', NULL, NULL, NULL, NULL),
(31, 12000, 'st4202207040424', 1, 1, 'rejected', 'Novida short 350ml carton', 12000, 1, 'pickup', '2022-07-04', '04:24:07 PM', NULL, 'Out of stock', NULL, NULL, NULL),
(32, 10000, 'st15202207040439', 1, 1, 'delivered', 'Sprite 350ml', 10000, 1, 'pickup', '2022-07-04', '04:39:20 PM', '2022-07-05', NULL, NULL, NULL, NULL),
(33, 12000, 'st4202207050247', 1, 1, 'confirmed', 'Novida short 350ml carton', 12000, 1, 'deliver', '2022-07-05', '02:47:55 PM', NULL, NULL, NULL, NULL, NULL),
(34, 120000, 'st1202207251132', 1, 1, 'rejected', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-07-25', '11:32:31 AM', NULL, NULL, NULL, 'i dont want anymore', NULL),
(35, 23000, 'st16202207251132', 1, 1, 'cancelled', 'minute maid', 23000, 1, 'deliver', '2022-07-25', '11:32:31 AM', NULL, NULL, NULL, 'cant afford', NULL),
(36, 120000, 'st1202207250302', 1, 1, 'delivered', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-07-25', '03:02:35 PM', '2022-08-22', NULL, NULL, NULL, NULL),
(37, 10000, 'st9202207250302', 1, 3, 'pending', '*12, Presol hair gel, 80g', 10000, 1, 'deliver', '2022-07-25', '03:02:35 PM', NULL, NULL, NULL, NULL, NULL),
(38, 36000, 'st5202207250302', 1, 3, 'pending', '*12, Venus smoothening body lotion, 100mls ', 36000, 1, 'deliver', '2022-07-25', '03:02:35 PM', NULL, NULL, NULL, NULL, NULL),
(39, 120000, 'st1202208220747', 1, 1, 'delivered', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-08-22', '07:47:50 AM', '2022-08-22', NULL, NULL, NULL, NULL),
(40, 10000, 'st15202208300124', 1, 1, 'pending', 'Sprite 350ml', 10000, 1, 'deliver', '2022-08-30', '01:24:57 PM', NULL, NULL, NULL, NULL, NULL),
(41, 120000, 'st1202208310337', 1, 1, 'pending', 'Coca-coal One carton1', 120000, 1, 'deliver', '2022-08-31', '03:37:06 PM', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(10) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `dateCreated` date DEFAULT NULL,
  `catId` int(11) DEFAULT NULL,
  `userIdD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `photo`, `price`, `description`, `dateCreated`, `catId`, `userIdD`) VALUES
(1, 'Coca-coal One carton1', 'dis.jpeg', 120000, '<p>Coca-cola one carton is bottle by Century bottling campany12</p>\r\n', NULL, 1, 1),
(4, 'Novida short 350ml carton', 'novida_short_350ml_cartondis1_.jpg', 12000, '<p>this is nice</p>\r\n', NULL, 1, 1),
(5, '*12, Venus smoothening body lotion, 100mls ', '*12,_venus_smoothening_body_lotion,_100mls_dis3_.png', 36000, '', NULL, 5, 3),
(6, '*12, venus ultra hydrating body lotion, 100mls', '*12,_venus_ultra_hydrating_body_lotion,_100mlsdis3_.png', 36000, '', NULL, 5, 3),
(7, '*6, Ace LTC Lavender, 500mls', '', 6000, '', NULL, 5, 3),
(8, '*12, choco primo drinking chocolate sackets', '*12,_choco_primo_drinking_chocolate_sacketsdis3_.jpeg', 10000, '', NULL, 5, 3),
(9, '*12, Presol hair gel, 80g', '*12,_presol_hair_gel,_80gdis3_.png', 10000, '', NULL, 5, 3),
(10, '*12, zesta white vinegar, 300mls', '*12,_zesta_white_vinegar,_300mlsdis3_.jpg', 15000, '', NULL, 5, 3),
(11, '*12, Cussons Baby Soft and Smooth Soap, 100g ', '*12,_cussons_baby_soft_and_smooth_soap,_100g_dis3_.png', 22000, '', NULL, 5, 3),
(12, '*12, Fay Facial 80s White (48 Pieces)', '', 30000, '', NULL, 5, 3),
(13, '*12, Comfort Love Cotton Bud Baby (60 PCS)', '', 40000, '', NULL, 5, 3),
(14, '*12, Climax Disinfectant Block', '', 30000, '', NULL, 5, 3),
(15, 'Sprite 350ml', 'sprite_350mldis1_.jpg', 10000, '<p>this is a drink</p>\r\n', '2022-06-15', 1, 1),
(16, 'minute maid', 'minute_maiddis1_.jpeg', 23000, '<b>a good drink for a day<br></b>', '2022-06-22', 1, 1),
(18, 'kalo', '', 122, 'oasdvdpm', '2022-06-24', 3, 1),
(19, 'jessaasdfg', 'jessadis1_.jpeg', 2345, 'asdfgh[poiuytrewqf=1', '2022-06-24', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sme`
--

CREATE TABLE `sme` (
  `userIdS` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `shopName` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `activateCode` varchar(5) DEFAULT NULL,
  `resetCode` varchar(5) DEFAULT NULL,
  `dateCreated` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sme`
--

INSERT INTO `sme` (`userIdS`, `email`, `password`, `firstName`, `lastName`, `tel`, `photo`, `shopName`, `address`, `activateCode`, `resetCode`, `dateCreated`, `status`) VALUES
(1, 'ssegodfrey171@gmail.com', '$2y$10$kUADXHuLySMSSoLpFna3puhICa/7741FqGSawg1ZxiVq/YZG7OSjG', 'Ssegawa', 'Godfrey', '0753446252', NULL, 'LeonShop12', 'Nansana, Kibuloka', 'M6Zjz', NULL, '2022-06-02', 1),
(2, 'sanga1@gmail.com', '$2y$10$XH2g/Bbg9GH9c6leScsije28mG6GesyExZGfvn/3EMVeDqu.G51Ka', 'Sanga', 'Arnold', '0751798367', NULL, 'Fine  Spinners Limited', 'Kikoni makerere Kampala Uganda', '35687', NULL, '2022-06-13', 1),
(3, 'nakawooyap@gmail.com', '$2y$10$j8byWzRxM8vmZnUjrEce5eMclepT3xLHpmgTVaNzGi3TEUI6qP05u', 'Nakawooya', 'Phionah', '+256704284311', NULL, 'Kakira Sugar', 'Kikoni makerere Kampala Uganda', '75206', NULL, '2022-06-13', 1),
(4, 'ssegodfrey171121@gmail.com', '$2y$10$MZSYC/q2QfSmpDL2kmBR2.R0dGXKCbFm2W8VXi1V7LVRYY.Py6E5y', 'Ssegawa', 'Godfrey', '0753446252', NULL, 'ASDFG', 'CV', '34671', NULL, '2022-06-27', 1),
(5, 'ssegodfrey17112q1@gmail.com', '$2y$10$hIYw685PcggPvyN/KmLwW.eXoDjP1CKvVPkCdpfaoRm8v.KhPGzbK', 'Ssegawa', 'Godfrey', '0753446252', NULL, 'ASDFG', 'CV', '01854', NULL, '2022-06-27', 1),
(6, 'admsddin@gmail.com', '$2y$10$q66sLMPXuVeFy8.4Wq0PZeba1dpwSnFh2wpFNR45IrFBvNKbC7t7a', 'sd', 'sf', '09876543', NULL, 'hgfds', 'hgfds', '37084', NULL, '2022-06-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `transactionId` int(125) NOT NULL,
  `itemName` varchar(125) NOT NULL,
  `unitOfMeasurement` varchar(125) NOT NULL,
  `QuantitySold` int(125) NOT NULL,
  `userIdS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userIdA`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userIdD` (`userIdD`),
  ADD KEY `userIdS` (`userIdS`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `contain`
--
ALTER TABLE `contain`
  ADD PRIMARY KEY (`containId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`userIdD`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `NewItem`
--
ALTER TABLE `NewItem`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `userIdS` (`userIdS`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userIdD` (`userIdD`),
  ADD KEY `userIdS` (`userIdS`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `userIdD` (`userIdD`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `sme`
--
ALTER TABLE `sme`
  ADD PRIMARY KEY (`userIdS`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `Transaction_ibfk_1` (`userIdS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userIdA` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contain`
--
ALTER TABLE `contain`
  MODIFY `containId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `userIdD` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `NewItem`
--
ALTER TABLE `NewItem`
  MODIFY `itemId` int(125) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sme`
--
ALTER TABLE `sme`
  MODIFY `userIdS` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `transactionId` int(125) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `NewItem`
--
ALTER TABLE `NewItem`
  ADD CONSTRAINT `NewItem_ibfk_1` FOREIGN KEY (`userIdS`) REFERENCES `sme` (`userIdS`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `Transaction_ibfk_1` FOREIGN KEY (`userIdS`) REFERENCES `sme` (`userIdS`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
