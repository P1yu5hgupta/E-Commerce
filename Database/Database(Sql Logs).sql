-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 07:52 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `c_image` varchar(30) NOT NULL,
  `c_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `c_name`, `c_image`, `c_des`) VALUES
(1, 'Mobiles, Computers', 'images/category/mc.jpg', 'Buy Motorola Mobile Computer Handheld Terminal MC 45 online at low price in India. Check out Motorola?Mobile Computer?Handheld Terminal...'),
(2, 'TV, Appliances, Electronics', 'images/category/tae.jfif', 'Online shopping for Electronics from a great selection of Projectors, AV Receivers & Amplifiers, Televisions, DVD Players & Recorders, Home Theater Systems...'),
(3, 'Mens Fashion', 'images/category/mf.jfif', 'Mens\' Fashion: Shop for Mens\' Clothing & accessories online at best prices in India. Choose from a wide range of Men\' Clothing...'),
(4, 'Womens Fashion', 'images/category/wf.jfif', 'An elegant sarees, a gorgeous dress, a pretty top paired with trendy palazzos  redefine yourself in multiple ways with women\'s clothing online'),
(5, 'Home and Kitchen', 'images/category/hk.jpg', 'India\'s Largest Home & Kitchen Store. Shop for Kitchen Appliances, Bedsheets, Jars & Containers, LED & CFL bulbs, Drying Racks, Laundry Baskets, Vases, Clocks and more...'),
(6, 'Beauty, Health, Grocery', 'images/category/h&b.jpg', 'Choose from a wide range of Beauty products. Get Free 1 ... Deals and discounts Beauty Beauty coupons ..... Clinic Plus Strong and Long Health...'),
(7, 'Sports, Fitness, Bags, Luggage', 'images/category/sf.jpg', 'When you hear the word sports you probably think basketball, baseball, or football. When you read fitness you may imagine intense daily workouts at a gym...'),
(8, 'Toys, Baby Products, Kids Fashion', 'images/category/tb.jpg', 'Buy Baby toddlers toys, baby bath toys, soft toys, kids games, motor activity toys, sound toys and more at low prices in India...'),
(9, 'Car, Motorbike, Industrial', 'images/category/cm.jpg', 'Discover our large selection of products for Your Car and Motorbike including Motor Oils, Sponges, Cloths, Helmets, riding Gears, Car Electronics...'),
(10, 'Books and Audible', 'images/category/books.jfif', 'Find a great new listen in our best selling audio book titles. Your first book is Free with Trial! Download the?Audible?app and start listening now...');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--
-- Error reading structure for table ecommerce.mycart: #1932 - Table 'ecommerce.mycart' doesn't exist in engine
-- Error reading data for table ecommerce.mycart: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `ecommerce`.`mycart`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `myorders`
--

CREATE TABLE `myorders` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myorders`
--

INSERT INTO `myorders` (`id`, `email`, `p_name`, `address`, `date`) VALUES
(3, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(4, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(5, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(6, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(7, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(8, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(9, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(10, 'harsh1129pandey@gmail.com', '', 'jiit sectr 62', '2018-11-27'),
(11, 'harsh1129pandey@gmail.com', '', 'jiit sectr 62', '2018-11-27'),
(12, 'harsh1129pandey@gmail.com', '', 'jiit sectr 62', '2018-11-27'),
(13, 'harsh1129pandey@gmail.com', '', 'jiit sectr 62', '2018-11-27'),
(14, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27'),
(15, 'piyushgupta3211@gmail.com', '', 'ABB 3,Jaypee Institute of information technology', '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Error reading structure for table ecommerce.product: #1932 - Table 'ecommerce.product' doesn't exist in engine
-- Error reading data for table ecommerce.product: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `ecommerce`.`product`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `address`, `gender`, `image`) VALUES
('akmax101', 'amankhare010@gmail.com', 'qwertyuiop', 'wakanda city', 'male', ''),
('Piyush gupta', 'darksun2798@gmail.com', '12345678', 'ABB 3,Jaypee Institute of information technology, Sec. 62, Block A, Noida', 'male', ''),
('harsh pandey', 'harsh1129pandey@gmail.com', 'Harsh@1129', 'jiit sectr 62', 'male', ''),
('Piyush gupta', 'piyushgupta3211@gmail.com', '12345678', 'ABB 3,Jaypee Institute of information technology', 'male', ''),
('Piyush gupta', 'piyushgupta3214@gmail.com', '12345678', 'ABB 3,Jaypee Institute of information technology, Sec. 62, Block A, Noida', 'male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `myorders`
--
ALTER TABLE `myorders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `myorders`
--
ALTER TABLE `myorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myorders`
--
ALTER TABLE `myorders`
  ADD CONSTRAINT `myorders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
