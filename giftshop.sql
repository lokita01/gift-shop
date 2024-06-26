-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 11:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE `adminmaster` (
  `adminid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `userID` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `description` text NOT NULL,
  `imagename` text NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` text NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userID`, `categoryid`, `description`, `imagename`, `productid`, `productname`, `rate`) VALUES
(3, 11, 'Diamond Pendant', '2014-Hot-Sale-Fashion-Silver-Plated-Crystal-Pendants-Necklace-Earrings-Wedding-Accessories-Jewelry-Sets-For-Women.jpg', 10, 'Silver diamond', 200);

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`categoryid`, `categoryname`) VALUES
(11, 'Jewellery'),
(12, 'Bangles'),
(13, 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detailsid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` binary(1) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detailsid`, `productid`, `quantity`, `rate`, `amount`, `orderid`) VALUES
(11, 9, 0x31, '500', '500', 24),
(12, 12, 0x33, '300', '900', 29),
(13, 16, 0x31, '200', '200', 31),
(14, 16, 0x31, '200', '200', 33),
(15, 12, 0x31, '300', '300', 43),
(16, 12, 0x31, '300', '300', 45),
(17, 12, 0x31, '300', '300', 46),
(18, 18, 0x31, '200', '200', 47),
(19, 18, 0x34, '200', '800', 49);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `orderid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `membername` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `cardno` varchar(255) NOT NULL,
  `netamount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`orderid`, `orderdate`, `membername`, `address`, `email`, `mobileno`, `cardno`, `netamount`) VALUES
(24, '2020-02-14 19:32:40', 'Anshu', 'Sinnar', 'kushwaha.anshu8@gmail.com', '7744019160', '', '400'),
(29, '2020-02-14 19:59:03', 'Sanjeev', 'Dhoke Nagar', 'akthebest8@gmail.com', '8857992154', '', '720'),
(30, '0000-00-00 00:00:00', '', '', '', '', '1234567891234', ''),
(31, '2020-02-14 20:39:03', 'Anshu', 'sinnar', 'kushwaha.anshu8@gmail.com', '7744019160', '', '160'),
(32, '0000-00-00 00:00:00', '', '', '', '', '21212121212', ''),
(33, '2020-02-15 16:54:12', 'Anshu', 'Sinnar', 'kushwaha.anshu8@gmail.com', '7744019160', '', '160'),
(34, '0000-00-00 00:00:00', '', '', '', '', '657877665588', ''),
(35, '0000-00-00 00:00:00', '', '', '', '', '53454657', ''),
(36, '0000-00-00 00:00:00', '', '', '', '', '53454657', ''),
(37, '0000-00-00 00:00:00', '', '', '', '', '1234567898', ''),
(38, '0000-00-00 00:00:00', '', '', '', '', '1234567898', ''),
(39, '0000-00-00 00:00:00', '', '', '', '', '67658768', ''),
(40, '0000-00-00 00:00:00', '', '', '', '', '676879', ''),
(41, '0000-00-00 00:00:00', '', '', '', '', '12345678', ''),
(42, '0000-00-00 00:00:00', '', '', '', '', '76897766', ''),
(43, '2020-02-16 19:10:57', 'Anshu', 'Anshu', 'kushwaha.anshu8@gmail.com', '7744019160', '', '240'),
(44, '0000-00-00 00:00:00', '', '', '', '', '7688776655', ''),
(45, '2020-02-16 19:57:29', 'Anshu', 'Anshu', 'kushwaha.anshu8@gmail.com', '7744019160', '', '240'),
(46, '2020-02-16 21:33:44', 'Anshu', 'sinnar', 'kushwaha.anshu8@gmail.com', '7744019160', '', '240'),
(47, '2020-02-16 22:51:58', 'Sanjeev', 'Dhoke Nagar', 'akthebest8@gmail.com', '8857992154', '', '160'),
(48, '0000-00-00 00:00:00', '', '', '', '', '1234567', ''),
(49, '2020-02-16 22:57:49', 'Sanjeev', 'sinnar', 'akthebest8@gmail.com', '8857992154', '', '640');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE `productmaster` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`productid`, `productname`, `rate`, `description`, `imagename`, `categoryid`, `quantity`) VALUES
(18, 'Aliya Bangles', '200', 'Gold Bangles', 'Aaliyab.jpg', 12, 5),
(19, 'Bangles', '300', 'Gold Bangles', '9e21b6e535a95ae06204825448f459c5.jpg', 12, 9),
(20, 'Bangles', '200', 'silver Bangles', 'bangle1.jpg', 12, 0),
(21, 'Ear Rings', '500', 'ear rings', 'gold-fancy-rays-earrings-31.jpg', 12, 0),
(22, 'Diamond', '200', 'ear rings', '9e21b6e535a95ae06204825448f459c5.jpg', 11, 10),
(23, 'Necklace', '200', 'silver necklace', '2014-Hot-Sale-Fashion-Silver-Plated-Crystal-Pendants-Necklace-Earrings-Wedding-Accessories-Jewelry-Sets-For-Women.jpg', 11, 10),
(24, 'Diamond ', '500', 'Bangles', '384e98483dee3301080f827a01c81990_small.jpg', 11, 10),
(25, 'Chain Necklace', '200', 'chain necklace', '2015-New-Statement-Chain-Necklace-Women-Chunky-Collar-Fashion-Vintage-Jewelry-Accessories-Pendant-Necklace-Jewellery.jpg', 11, 20),
(26, 'diamond ring', '200', 'Ring', 'Daimond-ring.jpg', 11, 10),
(27, 'Bracelett', '300', 'bracelett', 'DB-Designs-Sterling-Silver-Blue-Diamond-Accent-Leaf-Design-Ring-P16260431.jpg', 11, 20),
(28, 'Ring', '300', 'Ring', 'Eternity_ring_1.jpg', 11, 20),
(29, 'Bag', '700', 'Latest Bags', '3-latest-design-teen-age-purse.jpg', 12, 20),
(32, 'Latest Bags', '300', 'bags', '', 13, 50),
(33, 'bags', '600', 'bags latest', '3-latest-design-teen-age-purse.jpg', 13, 60),
(34, 'colored bag', '700', 'fancy bags', '2b3f27c7a8856b2b229f797d49ee6f2c.jpg', 13, 50),
(35, 'Bags', '200', 'Latest bags', '2015-New-arrival-Fashion-handbags-Designer-brands-messenger-bag-PU-leather-women-bag-high-quality-lady.jpg', 13, 20),
(36, 'Clutcher', '200', 'best clutcher', 'Best-Clutches-for-Teen-Girls-by-Utsav-fashion-2.jpg', 13, 10),
(37, 'side bags', '600', 'best bags', 'Black and Pink Laptop Bag small.jpg', 13, 500);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingmaster`
--

CREATE TABLE `shoppingmaster` (
  `shoppingid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingmaster`
--

INSERT INTO `shoppingmaster` (`shoppingid`, `productid`, `quantity`, `sessionid`) VALUES
(4, 10, 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `mobile`, `email`, `password`) VALUES
(3, 'Anshu', 'kushwaha', '7744019160', 'kushwaha.anshu8@gmail.com', 'Anshuak@47'),
(4, 'Sanjeev', 'kushwaha', '8857992154', 'akthebest8@gmail.com', 'Anshuak@47'),
(7, 'Anshu', 'kushwaha', '7744019160', 'wwc@worldwincoder.com', 'Anshuak@47'),
(8, 'Sanjeev', 'kushwaha', '9595946587', 'akthebest8@gmail.com', 'Anshuak@47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmaster`
--
ALTER TABLE `adminmaster`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detailsid`);

--
-- Indexes for table `ordermaster`
--
ALTER TABLE `ordermaster`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `productmaster`
--
ALTER TABLE `productmaster`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `shoppingmaster`
--
ALTER TABLE `shoppingmaster`
  ADD PRIMARY KEY (`shoppingid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmaster`
--
ALTER TABLE `adminmaster`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ordermaster`
--
ALTER TABLE `ordermaster`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `productmaster`
--
ALTER TABLE `productmaster`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `shoppingmaster`
--
ALTER TABLE `shoppingmaster`
  MODIFY `shoppingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
