-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2013 at 05:12 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapomail`
--
CREATE DATABASE IF NOT EXISTS `cheapomail` DEFAULT CHARACTER SET UTF8 COLLATE latin1_swedish_ci;
USE `cheapomail`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cheapousers`
--
CREATE DATABASE IF NOT EXISTS `cheapousers` DEFAULT CHARACTER SET UTF8 COLLATE utf8_swedish_ci;
USE `cheapousers`;

-- --------------------------------------------------------
--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_read`
--

CREATE TABLE IF NOT EXISTS `message_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL DEFAULT '''''',
  `lastname` varchar(40) NOT NULL DEFAULT '''''',
  `pword` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;


INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `username`) VALUES
(1, 'admin', 'admin', 'admin1001', 'admin');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;