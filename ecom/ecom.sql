-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 02:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(14, 'Domestic', 1),
(15, 'Industrial', 1),
(23, 'Cat EXAMPLE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Siddhi', 'siddhishelke2001@gmail.com', '9119447073', 'Bot Query', '2021-06-02 08:35:38'),
(2, 'Gaurav', 'kharatgaurav17@gmail.com', '9119447073', 'Siddhi', '2021-06-02 08:40:39'),
(3, 'Gaurav', 'kharatgaurav17@gmail.com', '9119447073', 'Query1', '2021-06-02 10:04:59'),
(4, 'Gaurav', 'kharatgaurav17@gmail.com', '9119447073', 'XYZ', '2021-06-02 10:05:58'),
(5, 'Gaurav', 'kharatgaurav17@gmail.com', '9119447073', 'Query', '2021-06-03 06:13:53'),
(6, 'Gaurav', 'kharatgaurav17@gmail.com', '9119447073', 'XYZ', '2021-06-03 06:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'First50', 500, 'Rupee', 2000, 1),
(2, 'First60', 10, 'Percentage', 1000, 1),
(3, 'First100', 20, 'Percentage', 15000, 1),
(4, 'First500', 2000, 'Rupee', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contacts` text NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` varchar(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `contacts`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `payu_status`, `coupon_id`, `coupon_value`, `coupon_code`, `added_on`) VALUES
(1, 1, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 44500, 'pending', 3, '5a2b5b06ffda149434cc', '', '', 1, '500', 'First50', '2021-06-02 08:29:21'),
(2, 1, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 60000, 'pending', 2, '6571d8cc55cd2212aa84', '', '', 0, '', '', '2021-06-02 09:06:58'),
(3, 2, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 43000, 'pending', 2, '69857fd281587ee0b7d7', '', '', 3, '2000', 'First100', '2021-06-02 09:58:40'),
(4, 3, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 12000, 'pending', 3, '00f1e78bc9d4c6f7624a', '', '', 0, '', '', '2021-06-03 06:03:07'),
(5, 3, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 22000, 'pending', 2, 'ef869784503b2399ea60', '', '', 4, '2000', 'First500', '2021-06-03 06:06:08'),
(6, 4, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 22000, 'pending', 1, 'ed77ae766b5211531b6c', '', '', 4, '2000', 'First500', '2021-06-03 06:42:51'),
(7, 4, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 56000, 'pending', 1, '9a3311449afc13b9273d', '', '', 0, '', '', '2021-06-03 06:45:27'),
(8, 4, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'payu', 75000, 'pending', 1, '5f95d1b64f3e60959667', '', '', 0, '', '', '2021-06-03 01:59:34'),
(9, 4, 'Flat No 2, Moti corner', 'Pune', 411006, '9119447073', 'COD', 75000, 'pending', 1, 'a38e63bb83e48100daed', '', '', 0, '', '', '2021-06-03 02:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 15, 2, 15000),
(2, 1, 14, 1, 15000),
(3, 2, 14, 2, 15000),
(4, 2, 15, 2, 15000),
(5, 3, 14, 2, 15000),
(6, 3, 15, 1, 15000),
(7, 4, 13, 1, 12000),
(8, 5, 11, 2, 12000),
(9, 6, 1, 3, 8000),
(10, 7, 1, 7, 8000),
(11, 8, 14, 5, 15000),
(12, 9, 14, 5, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Procesing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 14, 1, 'ATLANTA Standard', 12000, 8000, 10, '711155947_PRDUCT-1-i1.jpg', 'Atlanta Standard RO Electrical & Storage Water Purifier with RO Purification technology, Capacity: 9-11 Litre.', 'Electrical & Storage: Electric purification - suitable for areas with water shortage.\r\n9-11 L: More the capacity, more the users can be served with drinking water.\r\nRO: Suitable for underground water, purifies germs and chemicals.', 0, 'ATLANTA Standard', 'Electrical & Storage: Electric purification - suitable for areas with water shortage.\r\n9-11 L: More the capacity, more the users can be served with drinking water.\r\nRO: Suitable for underground water, purifies germs and chemicals.', 'ATLANTA Standard', 1),
(2, 14, 1, 'ATLANTA Dolphin', 14000, 7500, 10, '206890548_PRDUCT-2-i1.jpg', 'Atlanta Dolphin RO Storage Water Purifier, NXT UV water purifier, Capacity: 12-15 Litre.', 'Purification Capacity: 12-15 Litres/Hour, High flow rate of 2L/Minute.\r\nActive Copper Technology provides the goodness of copper in water.\r\nABS Food Grade Plastic, Digital Water Dispense Button, Semi Concealable Design.\r\nSediment Filter, Pre Carbon Filter, Mineral Guard, Post Carbon Filter, Active Copper.', 0, 'ATLANTA Dolphin', 'Purification Capacity: 12-15 Litres/Hour, High flow rate of 2L/Minute.\r\nActive Copper Technology provides the goodness of copper in water.\r\nABS Food Grade Plastic, Digital Water Dispense Button, Semi Concealable Design.\r\nSediment Filter, Pre Carbon Filter, Mineral Guard, Post Carbon Filter, Active Copper.', 'ATLANTA Dolphin', 1),
(3, 14, 1, 'ATLANTA Blaze', 16500, 12000, 10, '974593840_PRDUCT-3-i1.jpg', 'Atlanta Dolphin RO 6 litres RO+UV+MTDS+ZPP Water Purifier, Blaze with Active Copper and Mineral Guard Technology.', 'HOT & Ambient & Stainless Steel Tank feature.\r\nAll-in-one RO+UV+MTDS with Active Copper & Mineral Guard Technology.\r\nChild lock enabled Hot & Ambient water at a press of a lever.\r\nActive Copper Technology provides the goodness of copper in water.\r\nMineral Guard Technology retains essential minerals in your water.\r\nSupreme aesthetics compliment the new-age kitchen design.\r\nChemi-Block removes excess chlorine and organic impurities.\r\nHigh water storage capacity of 6 litres (Hot: 800ml & Ambient 3.2 litres).\r\nSmart LED indication alerts for service, Cartridges EOL and electronic errors.\r\nHealth Protect Electronic Authentication cartridges with EEPROM technology ensure safe water or no water always.\r\nZero Pressure Pump not only works at Zero Pressure but is also capable of creating suction of up to 3 feet.\r\nDual RO+UV technology with MTDS controller enables adjustment of taste depending upon the source of water.', 0, 'ATLANTA Blaze', 'HOT & Ambient & Stainless Steel Tank feature.\r\nAll-in-one RO+UV+MTDS with Active Copper & Mineral Guard Technology.\r\nChild lock enabled Hot & Ambient water at a press of a lever.\r\nActive Copper Technology provides the goodness of copper in water.\r\nMineral Guard Technology retains essential minerals in your water.\r\nSupreme aesthetics compliment the new-age kitchen design.\r\nChemi-Block removes excess chlorine and organic impurities.\r\nHigh water storage capacity of 6 litres (Hot: 800ml & Ambient 3.2 litres).\r\nSmart LED indication alerts for service, Cartridges EOL and electronic errors.\r\nHealth Protect Electronic Authentication cartridges with EEPROM technology ensure safe water or no water always.\r\nZero Pressure Pump not only works at Zero Pressure but is also capable of creating suction of up to 3 feet.\r\nDual RO+UV technology with MTDS controller enables adjustment of taste depending upon the source of water.', 'ATLANTA Blaze', 1),
(4, 14, 1, 'ATLANTA Altima RO1.1', 18000, 9000, 10, '934574624_PRDUCT-4-i1.jpg', 'Atlanta Altima RO 8.2 litres RO+UV Water Purifier, Capacity 8-10 Liters.', 'Type of Water Purifier: RO + UV.\r\nCapacity: 8.2 Litres.\r\nSediment Filter, Pre & Post-Carbon Filter.\r\nMultiple Source Water Supply: 1-2000ppm TDS.', 0, 'ATLANTA Altima RO1.1', 'Type of Water Purifier: RO + UV.\r\nCapacity: 8.2 Litres.\r\nSediment Filter, Pre & Post-Carbon Filter.\r\nMultiple Source Water Supply: 1-2000ppm TDS.', 'ATLANTA Altima RO1.1', 1),
(5, 14, 1, 'ATLANTA Royale', 20000, 16500, 10, '976150475_PRDUCT-5-i1.jpg', 'ATLANTA Royale RO 6 litres RO+UV+SS+ZPP Water Purifier, Capacity 6-9 Liters.', 'ATLANTA Royale 6 L RO + UV + SS + ZPP Water Purifier features the patented Active Copper Technology, which infuses the water with copper ions. This filter effectively removes organic components and lends the water a sparkling look and pure taste. Besides, this water purifier\'s Advanced Mineral Guard Technology makes sure that essential natural minerals present in the water, such as calcium and magnesium, are retained. It provides enhanced RO purification and UV e-boiling technology which boils the water for over 20 minutes.', 0, 'ATLANTA Royale', 'ATLANTA Royale 6 L RO + UV + SS + ZPP Water Purifier features the patented Active Copper Technology, which infuses the water with copper ions. This filter effectively removes organic components and lends the water a sparkling look and pure taste. Besides, this water purifier\'s Advanced Mineral Guard Technology makes sure that essential natural minerals present in the water, such as calcium and magnesium, are retained. It provides enhanced RO purification and UV e-boiling technology which boils the water for over 20 minutes.', 'ATLANTA Royale', 1),
(6, 15, 2, 'ATLANTA Moonbow', 22000, 19000, 10, '965166140_PRDUCT-6-i1.jpg', 'ATLANTA Moonbow RO 10 litres RO+UV+IOT Water Purifier, Capacity 10-15 Liters.', 'Give complete safety to your family by bringing this Moonbow Achelous Premium iPro RO Plus UV Plus IoT Water Purifier. It has 10 litres of capacity that provides clean water for the entire family. It is equipped with an advanced 6-stage filtration system that kills harmful bacteria and supplies fresh and healthy water. Constructed with non-toxic, food-safe material which makes it a smart choice for your family.\r\n10 Litres Capacity, RO + UV ensures absolute safe water.\r\nRemoves Virus, bacteria and heavy metals by 6 Stage Filtration.\r\nHeavy Duty Membrane does work up to 2000 PPM TDS level and removes many hazardous chemicals.\r\nChild lock protected hot water dispensing at 45 degree Celsius and 80 degree Celsius.', 1, 'ATLANTA Moonbow', 'Give complete safety to your family by bringing this Moonbow Achelous Premium iPro RO Plus UV Plus IoT Water Purifier. It has 10 litres of capacity that provides clean water for the entire family. It is equipped with an advanced 6-stage filtration system that kills harmful bacteria and supplies fresh and healthy water. Constructed with non-toxic, food-safe material which makes it a smart choice for your family.\r\n10 Litres Capacity, RO + UV ensures absolute safe water.\r\nRemoves Virus, bacteria and heavy metals by 6 Stage Filtration.\r\nHeavy Duty Membrane does work up to 2000 PPM TDS level and removes many hazardous chemicals.\r\nChild lock protected hot water dispensing at 45 degree Celsius and 80 degree Celsius.', 'ATLANTA Moonbow', 1),
(7, 15, 2, 'ATLANTA Pro-Planet P6', 18000, 15000, 10, '339603409_PRDUCT-7-i1.jpg', 'ATLANTA Pro-Planet P6 RO + SCMT Electrical Water Purifier (8 Stage Purification Process).', 'Bring home the ATLANTA Pro-Planet P6 RO + SCMT Electrical Water Purifier which provide your family with safe and healthy drinking water. It is crafted with RO Plus Silver charged Membrane technology (SCMT) that gives you 100 per cent RO purified, baby-safe water, using an 8-stage purification process. The names of the filters are Pre-filter Plus SCB filter Plus ART MAX (Advance Recovery Technology) Plus Side Stream RO membrane Plus Min-Tech Plus ZX Double Protection Dual Filter (Silver activated Post Carbon block Plus SCMT). It comes with a Thin Film Composite RO Membrane. This water purifier is also designed with AutoFlush Indicator, RO Change Indicator, SCPA Change Indicator, Tank Full Indicator. It has manual dispense functionality. Having an ABS Food Grade Plastic body ensures absolute durability.', 1, 'ATLANTA Pro-Planet P6', 'Bring home the ATLANTA Pro-Planet P6 RO + SCMT Electrical Water Purifier which provide your family with safe and healthy drinking water. It is crafted with RO Plus Silver charged Membrane technology (SCMT) that gives you 100 per cent RO purified, baby-safe water, using an 8-stage purification process. The names of the filters are Pre-filter Plus SCB filter Plus ART MAX (Advance Recovery Technology) Plus Side Stream RO membrane Plus Min-Tech Plus ZX Double Protection Dual Filter (Silver activated Post Carbon block Plus SCMT). It comes with a Thin Film Composite RO Membrane. This water purifier is also designed with AutoFlush Indicator, RO Change Indicator, SCPA Change Indicator, Tank Full Indicator. It has manual dispense functionality. Having an ABS Food Grade Plastic body ensures absolute durability.', 'ATLANTA Pro-Planet P6', 1),
(8, 15, 2, 'ATLANTA Natural Dolphin', 25000, 20000, 10, '716743354_PRDUCT-8-i1.jpg', 'ATLANTA Natural Dolphin 7 litres UV+UF Water Purifier, UV Plus with i-Protect purification monitoring and Smart alerts.', 'Minerals cartridge, Germicidal UV.\r\nZero splash faucet, Smart alerts.\r\nIngress protection tank cover.\r\niProtect purification monitoring.\r\nCompact design with flexible mounting.\r\nElectrical protection system, Removable tank.', 1, 'ATLANTA Natural Dolphin', 'Minerals cartridge, Germicidal UV.\r\nZero splash faucet, Smart alerts.\r\nIngress protection tank cover.\r\niProtect purification monitoring.\r\nCompact design with flexible mounting.\r\nElectrical protection system, Removable tank.', 'ATLANTA Natural Dolphin', 1),
(9, 15, 2, 'ATLANTA Puricare', 18000, 15000, 10, '251306502_PRDUCT-9-i1.jpg', 'ATLANTA Puricare WW140NP 8L RO Water Purifier.', 'This LG WW140NP RO 8 L Water Purifier is worth investing in. Its water purifying technologies will protect you from waterborne diseases that are caused by bacteria, viruses, cysts, protozoa, algae, fungi, etc. The Water Purifier is designed uniquely to fit anywhere and ultimately save space wherever it is placed. Moreover, it is equipped with a mineral booster which adds on minerals in 100% RO purified water and makes water healthier & tastier.\r\n8 Litre Water Storage Capacity.\r\n5 Stage RO Filtration System.\r\nDual Protection Stainless Steel Tank.\r\nGround Water Supply: 200-2000ppm TDS.', 1, 'ATLANTA Puricare', 'This LG WW140NP RO 8 L Water Purifier is worth investing in. Its water purifying technologies will protect you from waterborne diseases that are caused by bacteria, viruses, cysts, protozoa, algae, fungi, etc. The Water Purifier is designed uniquely to fit anywhere and ultimately save space wherever it is placed. Moreover, it is equipped with a mineral booster which adds on minerals in 100% RO purified water and makes water healthier & tastier.\r\n8 Litre Water Storage Capacity.\r\n5 Stage RO Filtration System.\r\nDual Protection Stainless Steel Tank.\r\nGround Water Supply: 200-2000ppm TDS.', 'ATLANTA Puricare', 1),
(10, 15, 2, 'ATLANTA Geneus', 16000, 13000, 10, '368773585_PRDUCT-10-i1.jpg', 'ATLANTA Geneus HD RO+ UV purification system.', 'ATLANTA Geneus comes with a unique auto Mineral Modulator built into it, that enables the user to set the taste of water according to preference while maintaining a healthy balance of Natural Minerals. Crafted with high attention to detail and greater durability, it is designed for superior performance. Works for various water conditions (1-2000 mg/litre).\r\n \r\nIntuitive LED display.\r\nAuto Mineral Modulator.\r\nG-tech senses the water source and automatically chooses the purification technology.\r\nAEWACS system.\r\nReserve Mode.\r\nEquipped with most advanced Innovative Technologies Active Copper MaxxTM, BiotronTM and Mineral GuardTM.', 1, 'ATLANTA Geneus', 'ATLANTA Geneus comes with a unique auto Mineral Modulator built into it, that enables the user to set the taste of water according to preference while maintaining a healthy balance of Natural Minerals. Crafted with high attention to detail and greater durability, it is designed for superior performance. Works for various water conditions (1-2000 mg/litre).\r\n \r\nIntuitive LED display.\r\nAuto Mineral Modulator.\r\nG-tech senses the water source and automatically chooses the purification technology.\r\nAEWACS system.\r\nReserve Mode.\r\nEquipped with most advanced Innovative Technologies Active Copper MaxxTM, BiotronTM and Mineral GuardTM.', 'ATLANTA Geneus', 1),
(11, 15, 2, 'ATLANTA Classic', 15000, 12000, 10, '851786836_PRDUCT-11-i1.jpg', 'ATLANTA Classic ABS Plastic Electric RO Water Purifier, Capacity: 8-14 Litre, Aquagrand ABS Plastic Electric RO UV Water Purifier, Capacity: 8-14 Litre.', 'ATLANTA Classic ABS Plastic Electric RO Water Purifier, Capacity: 8-14 Litre, Aquagrand ABS Plastic Electric RO UV Water Purifier, Capacity: 8-14 Litre.\r\nTank Storage Capacity: 8-15 Litre.\r\nFilter Cartridges: Sediment, Activated Carbon.\r\nInstallation Type: Wall Mounted, Table Top.', 0, 'ATLANTA Classic', 'ATLANTA Classic ABS Plastic Electric RO Water Purifier, Capacity: 8-14 Litre, Aquagrand ABS Plastic Electric RO UV Water Purifier, Capacity: 8-14 Litre.\r\nTank Storage Capacity: 8-15 Litre.\r\nFilter Cartridges: Sediment, Activated Carbon.\r\nInstallation Type: Wall Mounted, Table Top.', 'ATLANTA Classic', 1),
(12, 14, 1, 'ATLANTA Excella', 20000, 18000, 10, '375550906_PRDUCT-12-i1.jpg', 'ATLANTA Excella EX4BLAM01 6 L RO + UV Water Purifier (Black)', 'The brand will contact for free installation within 24-36 hrs. Additional charges are applicable for pre-filter, extra pipe, pump, PRV & other accessories. Colour Black Brand ATLANTA Capacity 6 litres Model Name EX4BLAM01 Material Plastic About this item Double Layered RO+UV Protection-Double layered RO+UV protection', 0, 'ATLANTA Excella', 'The brand will contact for free installation within 24-36 hrs. Additional charges are applicable for pre-filter, extra pipe, pump, PRV & other accessories. Colour Black Brand ATLANTA Capacity 6 litres Model Name EX4BLAM01 Material Plastic About this item Double Layered RO+UV Protection-Double layered RO+UV protection', 'ATLANTA Excella', 1),
(13, 15, 2, 'ATLANTA Aristo', 16500, 12000, 10, '935239919_PRDUCT-13-i1.jpg', 'ATLANTA Aristo 7 L RO + UV + UF Water Purifier with Pre Filter  (Black, Silver).', 'Bring home this water purifier and keep your family safe from water-borne diseases. This appliance features an Aqua Taste Booster, Triple-layered Protection, and an array of indicators to make sure you have clean drinking water for everyone.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n7 L: More the capacity, more the users can be served with drinking water.\r\nRO + UV + UF: Uses many filters to remove salts & microbes in multiple stages.', 0, 'ATLANTA Aristo', 'Bring home this water purifier and keep your family safe from water-borne diseases. This appliance features an Aqua Taste Booster, Triple-layered Protection, and an array of indicators to make sure you have clean drinking water for everyone.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n7 L: More the capacity, more the users can be served with drinking water.\r\nRO + UV + UF: Uses many filters to remove salts & microbes in multiple stages.', 'ATLANTA Aristo', 1),
(14, 14, 1, 'ATLANTA Opulus', 18000, 15000, 10, '577014580_PRDUCT-14-i1.jpg', 'ATLANTA Opulus 8 L RO Water Purifier With Dual Protection Stainless Steel Tank, Wall Mount  (Red).', 'With this water purifier from ATLANTA, you and your family can get safe and healthy water to consume at all times. It comes with a Stainless Steel Tank that has a Dual-protection Seal to keep water safe and hygienic for you to consume. Furthermore, it is compact and will beautifully complement your kitchen’s decor.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n8 L: More the capacity, more the users can be served with drinking water.\r\nRO: Suitable for underground water, purifies germs and chemicals.', 0, 'ATLANTA Opulus', 'With this water purifier from ATLANTA, you and your family can get safe and healthy water to consume at all times. It comes with a Stainless Steel Tank that has a Dual-protection Seal to keep water safe and hygienic for you to consume. Furthermore, it is compact and will beautifully complement your kitchen’s decor.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n8 L: More the capacity, more the users can be served with drinking water.\r\nRO: Suitable for underground water, purifies germs and chemicals.', 'ATLANTA Opulus', 1),
(15, 14, 1, 'ATLANTA Ultima Nxt', 18000, 15000, 10, '120336243_PRDUCT-15-i1.jpg', 'ATLANTA ULTIMA nxt Mineral RO+UV+MF 10 L RO + UV + MF Water Purifier  (Black).', 'ATLANTA Ultima Nxt Mineral RO+UV+MF water purifier provides advanced 7-stage purification and includes a mineral cartridge that adds essential minerals like calcium and magnesium to enhance the taste of water. It has one of a kind automated water fill feature for better convenience. Digital Purity Indicator on the water purifier senses water quality up to 5000 times per second to assure you the quality of water The device features an advanced alert and an auto-shutoff system that makes sure you never get impure water.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n10 L: More the capacity, more the users can be served with drinking water.\r\nRO + UV + MF.', 1, 'ATLANTA Ultima Nxt', 'ATLANTA Ultima Nxt Mineral RO+UV+MF water purifier provides advanced 7-stage purification and includes a mineral cartridge that adds essential minerals like calcium and magnesium to enhance the taste of water. It has one of a kind automated water fill feature for better convenience. Digital Purity Indicator on the water purifier senses water quality up to 5000 times per second to assure you the quality of water The device features an advanced alert and an auto-shutoff system that makes sure you never get impure water.\r\nElectrical & Storage: Electric purification - suitable for areas with water shortage.\r\n10 L: More the capacity, more the users can be served with drinking water.\r\nRO + UV + MF.', 'ATLANTA Ultima Nxt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(1, 1, '437485530_PRDUCT-1-i2.jpg'),
(2, 1, '285859149_PRDUCT-1-i3.jpg'),
(3, 2, '569057194_PRDUCT-2-i2.jpg'),
(4, 2, '116491678_PRDUCT-2-i3.jpg'),
(5, 3, '465681531_PRDUCT-3-i2.jpg'),
(6, 3, '361380408_PRDUCT-3-i3.jpg'),
(7, 4, '317554211_PRDUCT-4-i2.jpg'),
(8, 4, '451699139_PRDUCT-4-i3.jpg'),
(9, 5, '437126691_PRDUCT-5-i2.jpg'),
(10, 6, '502006527_PRDUCT-6-i2.jpg'),
(11, 6, '893193683_PRDUCT-6-i3.jpg'),
(12, 7, '394295445_PRDUCT-7-i2.jpg'),
(13, 7, '478634195_PRDUCT-7-i3.jpg'),
(14, 8, '911712880_PRDUCT-8-i2.jpg'),
(15, 9, '984602350_PRDUCT-9-i2.jpg'),
(16, 9, '122979243_PRDUCT-9-i3.jpg'),
(17, 10, '998165373_PRDUCT-10-i2.jpg'),
(18, 11, '245329960_PRDUCT-11-i2.jpg'),
(19, 11, '949246838_PRDUCT-11-i3.jpg'),
(20, 12, '999248213_PRDUCT-12-i2.jpg'),
(21, 12, '758750326_PRDUCT-12-i3.jpg'),
(22, 13, '641069915_PRDUCT-13-i2.jpg'),
(23, 13, '600215225_PRDUCT-13-i3.jpg'),
(24, 14, '299499252_PRDUCT-14-i2.jpg'),
(25, 14, '893125440_PRDUCT-14-i3.jpg'),
(26, 15, '855210876_PRDUCT-15-i2.jpg'),
(27, 15, '429176313_PRDUCT-15-i3.jpg'),
(28, 17, '478525164_st4bshc04-stella-ro-uv.png'),
(32, 18, '212002712_AQUAGUARD-BLAZEHOT-N-AMBIENT-WaterPurifiers-491581421-i-1-1200Wx1200H-removebg-preview.png'),
(33, 19, '554298670_PRDUCT-Exam-i2.jpg'),
(34, 19, '269534527_PRDUCT-Exam-i3.jpg'),
(35, 20, '933759633_PRDUCT-Exam-i2.jpg'),
(36, 20, '846360103_PRDUCT-Exam-i3.jpg'),
(37, 21, '751248044_PRDUCT-Exam-i2.jpg'),
(38, 21, '238080230_PRDUCT-Exam-i3.jpg'),
(39, 22, '160900711_PRDUCT-Exam-i2.jpg'),
(40, 22, '808321317_PRDUCT-Exam-i3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 14, 'Water Purifiers', 1),
(2, 15, 'Water Purifiers', 1),
(3, 15, 'Machinery', 1),
(4, 14, 'Machinery', 1),
(8, 23, 'Water Purifiers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'Siddhi', 'siddhi', 'siddhishelke2001@gmail.com', '9119447073', '2021-06-02 08:25:10'),
(2, 'Gaurav', 'gaurav', 'random@gmail.com', '9119447073', '2021-06-02 09:55:40'),
(4, 'Gaurav', 'GAURAV', 'kharatgaurav17@gmail.com', '9119447073', '2021-06-03 06:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(1, 1, 13, '2021-06-02 08:26:45'),
(2, 1, 14, '2021-06-02 08:26:47'),
(3, 2, 15, '2021-06-02 10:07:53'),
(4, 2, 14, '2021-06-02 10:11:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
