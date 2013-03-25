-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 06:17 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rateworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL,
  `upvote` int(11) NOT NULL,
  `downvote` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `entry_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `upvote`, `downvote`, `user_id`, `entry_id`) VALUES
(1, 'ok ok', 0, 0, 31, 1),
(8, 'fasdasda', 0, 0, 31, 2),
(9, 'gut gut', 0, 0, 31, 9),
(10, 'njk', 0, 0, 31, 11),
(11, '5', 0, 0, 31, 1),
(12, 'gfgf', 0, 0, 34, 4),
(13, 'ghg', 0, 0, 34, 2),
(14, 'fgfgfgd', 0, 0, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `degree` text NOT NULL,
  `rdegree` int(11) NOT NULL,
  `usability` text NOT NULL,
  `rusability` int(11) NOT NULL,
  `highlights` text NOT NULL,
  `links` text NOT NULL,
  `domain` text NOT NULL,
  `created` date NOT NULL,
  `rtotal` int(10) NOT NULL,
  `framework_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `name`, `description`, `degree`, `rdegree`, `usability`, `rusability`, `highlights`, `links`, `domain`, `created`, `rtotal`, `framework_id`, `user_id`) VALUES
(1, 'cakephp', 'Sau gut ey', '', 0, '', 0, '', '', '', '2013-03-20', 0, 1, 22),
(2, 'sadf', 'qwerfqwr', '', 0, '', 0, '', '', '', '2013-03-20', 0, 0, 23),
(4, 'wqeq323', 'ewrffff', '', 0, '', 0, '', '', '', '2013-03-20', 0, 0, 25),
(5, 'r3423ws', '23frw23rf', '', 0, '', 0, '', '', '', '2013-03-20', 0, 3, 26),
(6, '453dd', 'dddddd', '', 0, '', 0, '', '', '', '2013-03-20', 0, 0, 28),
(9, '1325', '56', '', 0, '', 0, '', '', '', '2013-03-21', 0, 0, 32),
(10, 'er', 'er', '', 0, '', 0, '', '', '', '2013-03-21', 0, 0, 31),
(11, '123', '123', '', 0, '', 0, '', '', '', '2013-03-21', 0, 0, 31),
(12, 'hgj', '', '', 0, '', 0, '', '', '', '2013-03-25', 0, 0, 31),
(13, 'b', 'b', '', 0, '', 0, '', '', '', '2013-03-25', 0, 0, 31);

-- --------------------------------------------------------

--
-- Table structure for table `frameworks`
--

CREATE TABLE IF NOT EXISTS `frameworks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `frameworks`
--

INSERT INTO `frameworks` (`id`, `name`, `rating`, `created`) VALUES
(0, 'CakePHP', 3, '2013-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `semester` int(10) NOT NULL,
  `matnr` int(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `entry_count` int(10) NOT NULL,
  `comment_count` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `pic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `semester`, `matnr`, `course`, `entry_count`, `comment_count`, `created`, `pic`) VALUES
(1, 'wbg', 'wbg@wbg.de', '1234', 'admin', 5, 111111, 'Medieninformatik', 0, 0, '2013-03-20 00:00:00', ''),
(22, 'troll', '', 'ea34a6c180f572f242e5544c7e6d7947fd4c9561', 'admin', 0, 0, '', 0, 0, '2013-03-20 14:39:26', ''),
(23, '123', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 14:39:40', ''),
(24, 'terz', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:34:28', ''),
(25, 'pole', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:34:38', ''),
(26, 'lol', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:34:50', 'HGichT3.jpg.4842135.'),
(27, 'goldfisch', '', 'ecce0f70665e3c897cbec06ddddf0eb9b6f4fc21', 'admin', 5, 5, 'ew', 0, 0, '2013-03-20 15:35:09', 'test.jpg'),
(28, 'senf', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:35:19', ''),
(29, 'krass', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:35:28', ''),
(30, 'testomat', '', '8b3d1caf9d5a03979d9da6cf05f1a5f7e998c93c', 'admin', 0, 0, '', 0, 0, '2013-03-20 15:35:36', ''),
(31, 'jan', '', 'd2e5d33a7126d87ecee5b2bac0f46467d07f07e0', 'admin', 0, 0, 'sdf222ffff', 0, 0, '2013-03-21 13:25:44', 'uploads/2013-03-25-171507xDDD_eulenmensch.jpg'),
(32, 'user', '', 'd2e5d33a7126d87ecee5b2bac0f46467d07f07e0', 'author', 0, 0, '', 0, 0, '2013-03-21 13:42:16', ''),
(33, 'zz', '', 'd5bf4b80b28df017a6fe451eae9ceba0d0f1b2bb', 'admin', 0, 0, '', 0, 0, '2013-03-22 14:51:51', ''),
(34, 'asd', '', 'd2e5d33a7126d87ecee5b2bac0f46467d07f07e0', 'author', 0, 0, '', 0, 0, '2013-03-25 14:03:14', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
