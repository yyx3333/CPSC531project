-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2020 at 02:16 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs531`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(8) NOT NULL AUTO_INCREMENT,
  `u_id` int(8) NOT NULL,
  `p_id` int(8) NOT NULL,
  `c_date` datetime NOT NULL,
  `c_body` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `f_id` int(8) NOT NULL,
  `u_id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`f_id`, `u_id`) VALUES
(2, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `f_id` int(8) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `f_description` varchar(255) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`f_id`, `f_name`, `f_description`) VALUES
(1, 'games', 'Post your games here for sell.'),
(2, 'books', 'post your books here for sell.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `filename` varchar(100) NOT NULL,
  `photoname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `photographer` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`filename`, `photoname`, `date`, `location`, `photographer`) VALUES
('testPic.png', 'testpic', '2020-12-12', 'ca', 'oreo'),
('testPic2.png', '1', '2020-12-12', 'ca', 'yyx'),
('timg.jpg', 'qqqq', '2019-12-13', 'fullerton', 'oreo'),
('login.PNG', 'testpic', '2020-03-12', 'ca', 'yyx'),
('login.PNG', 'testpic', '2020-03-12', 'ca', 'yyx'),
('login.PNG', 'testpic', '2003-12-31', 'ca', 'yyx'),
('login.PNG', 'testpic', '2003-12-31', 'ca', 'yyx'),
('testPic4.png', '123', '1212-12-12', 'fullerton', 'yyx'),
('8f4.jpg', 'testpic1234', '2020-05-06', 'ca', 'yyx'),
('animalcorssingjpg.jpg', '1', '2020-12-01', 'ca', 'yyx');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(20) NOT NULL AUTO_INCREMENT,
  `u_id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `p_id` int(8) NOT NULL AUTO_INCREMENT,
  `p_title` varchar(255) NOT NULL,
  `f_id` int(8) NOT NULL,
  `p_subject` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_body` text NOT NULL,
  `p_image` varchar(20) NOT NULL,
  `u_id` int(8) NOT NULL,
  `p_time` datetime NOT NULL,
  `p_likes` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

DROP TABLE IF EXISTS `replys`;
CREATE TABLE IF NOT EXISTS `replys` (
  `r_id` int(8) NOT NULL AUTO_INCREMENT,
  `u_id` int(8) NOT NULL,
  `c_id` int(8) NOT NULL,
  `r_date` datetime NOT NULL,
  `r_body` text NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(8) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(255) NOT NULL,
  `u_pwd` varchar(255) NOT NULL,
  `u_nickname` varchar(255) NOT NULL,
  `u_avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_pwd`, `u_nickname`, `u_avatar`) VALUES
(1, 'yyx3333', '123', 'oreo', 'timg.jpg'),
(2, 'yyx1212', '123', 'Amos', NULL),
(3, 'test', '123', 'Amos', ''),
(4, 'test2', '123', 'img', ''),
(5, '123', '321', '1', ''),
(6, 'luffyyyx@hotmail.com', '123', 'Amos', ''),
(7, 'YIXIANGYAN2325', '123', 'oreo', ''),
(8, 'anjinchj@uci.edu', '123', 'oreo', ''),
(9, '123321', '123', '123', 'passportphoto (2).jpg'),
(10, 'qqqq', 'qqq', 'qqq', 'minipig.jpg'),
(11, 'test123', '123', 'Amos', ''),
(12, 'qqqq123', '123', '123', ''),
(13, 'test123123', '$2y$10$ToHyvf2V1yg63tMnVQAouusa/ekyRi7UkbLM4FqCwraswAgchv9Ou', 'Amos', ''),
(14, 'testqqq', '$2y$10$HczNxqsx5V0T1aS0bwr12eySvaUpGf.S4Lq1OYFHAK9MmQ6Qfo.q2', 'oreo', ''),
(15, 'yyxtest3', '$2y$10$xaDPEtvEbtF1AlS5Hm138uvH30MigrkaD75gfBdv7JfqQnwCrmCZi', 'test', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
