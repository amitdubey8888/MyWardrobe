-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 07:09 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mywardrobe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`category_id` int(10) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `customer_email`) VALUES
(2, 'Jeans', 'amitdubey8888@gmail.com'),
(3, 'Cafry', 'amitdubeycs88@gmail.com'),
(5, 'Shirts', 'amitdubey8888@gmail.com'),
(8, 'Cafry', 'amitdubey8888@gmail.com'),
(10, 'Lower', 'amitdubey8888@gmail.com'),
(17, 'Trouser', 'amitdubeycs88@gmail.com'),
(19, 'Nickker', 'amitdubeycs88@gmail.com'),
(20, 'Sari', 'amitdubeycs88@gmail.com'),
(21, 'Trouser', 'amitdubey1993@outlook.com'),
(22, 'Pants', 'amitdubey1993@outlook.com'),
(23, 'Lower', 'amitdubey1993@outlook.com'),
(24, 'Nickker', 'amitdubey1993@outlook.com'),
(25, 'Pants', 'amitdubeycs88@gmail.com'),
(28, 'Panty', 'amitdubey1993@outlook.com'),
(29, 'Cafry', 'amitdubey1993@outlook.com'),
(30, 'Panty', 'amitdubey1993@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`cusromer_id` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `Last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusromer_id`, `customer_email`, `customer_pass`, `Last_login`) VALUES
(5, 'amitdubeycs88@gmail.com', '12345678', '2017-02-12 16:27:50'),
(6, 'amitdubey8888@gmail.com', '87654321', '2017-02-12 18:02:00'),
(7, 'amitdubey1993@outlook.com', 'amitdubey', '2017-02-12 17:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `wardrobe_item`
--

CREATE TABLE IF NOT EXISTS `wardrobe_item` (
`item_number` int(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brief_description` varchar(255) NOT NULL,
  `picture` text NOT NULL,
  `date_purchased` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `wardrobe_item`
--

INSERT INTO `wardrobe_item` (`item_number`, `customer_email`, `category`, `brief_description`, `picture`, `date_purchased`, `status`) VALUES
(10, 'amitdubey8888@gmail.com', 'Shirts', 'This is very nice shirts.', 'download.png', '2017-02-11 17:09:48', 'Hello'),
(12, 'amitdubey8888@gmail.com', 'Cafry', 'This is a very attractice cafry.', '2.jpg', '2017-02-12 13:40:11', 'Nice One'),
(13, 'amitdubey8888@gmail.com', 'Lower', 'This is a very nice lower.', '1.jpg', '2017-02-12 13:41:23', 'Good'),
(14, 'amitdubeycs88@gmail.com', 'Sari', 'This is a very attractive sari.', '2.jpg', '2017-02-12 13:43:24', 'Nice'),
(15, 'amitdubeycs88@gmail.com', 'Nickker', 'This is a very attractive nickker.', '1.jpg', '2017-02-12 13:44:03', 'Good'),
(16, 'amitdubey1993@outlook.com', 'Trouser', 'This is a very nice trouser.', '2.jpg', '2017-02-12 15:32:20', 'Nice'),
(17, 'amitdubey1993@outlook.com', 'Pants', 'This is a very nice pant.', '1.jpg', '2017-02-12 15:32:45', 'New One'),
(18, 'amitdubeycs88@gmail.com', 'Trouser', 'This is a very nice Trouser.', '2.jpg', '2017-02-12 16:33:07', 'New Job'),
(20, 'amitdubeycs88@gmail.com', 'Cafry', 'Wow nice cafry.', '1.jpg', '2017-02-12 16:33:43', 'Good'),
(21, 'amitdubeycs88@gmail.com', 'Pants', 'This is a very nice pant.', '2.jpg', '2017-02-12 16:38:05', 'Well done'),
(22, 'amitdubeycs88@gmail.com', 'Trouser', 'Hi', '2.jpg', '2017-02-12 16:40:14', 'Nice'),
(30, 'amitdubey1993@outlook.com', 'Lower', 'This is a very nice lower.', '2.jpg', '2017-02-12 17:16:40', 'New'),
(31, 'amitdubey1993@outlook.com', 'Pants', 'This is a very nice lower.', '1.jpg', '2017-02-12 17:17:42', 'New One');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`cusromer_id`);

--
-- Indexes for table `wardrobe_item`
--
ALTER TABLE `wardrobe_item`
 ADD PRIMARY KEY (`item_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cusromer_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wardrobe_item`
--
ALTER TABLE `wardrobe_item`
MODIFY `item_number` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
