-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Server version: 5.5.32
-- PHP Version: 5.5.12


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Database: `cheapousers`
CREATE DATABASE IF NOT EXISTS `cheapousers` DEFAULT CHARACTER SET UTF8 /*latin1*/ COLLATE latin1_swedish_ci;
USE `cheapousers`;

---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pword` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;

-- Populating table `user`
-- Dumping users who are admins 
INSERT INTO `users` (`firstname`, `lastname`, `pword`, `username`) VALUES
('admin', 'admin', 'admin1001', 'admin'),
('Admin', 'Flemmings', 'Admin1', 'Admin.Flemmings'),
('Admin', 'Robinson', 'Admin2', 'Admin.Robinson'),
('Admin', 'Hinds', 'Admin3', 'Admin.Hinds'),
('Jermaine', 'Flemmings', 'J.Flemmings001', 'Jermaine.F'),
('Roshane', 'Robinson', 'R.Robinson001', 'Roshane.R'),
('Zola', 'Hinds', 'Z.Hinds001', 'Zola.');


-- Dumping generic users
INSERT INTO `users` (`firstname`, `lastname`, `pword`, `username`) VALUES 
('David', 'Baine', 'D.Baine001', 'David.B'),
('user1', 'Random', 'Random1', 'user1.R'),
('user2', 'Random', 'Random2', 'user2.R'),
('user3', 'Random', 'Random3', 'user3.R'),
('user4', 'Random', 'Random4', 'user4.R'),
('user5', 'Random', 'Random5', 'user5.R');

---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------

-- Table structure for table `message`
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `recipient_id` int(11)) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)  ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;

-- Populating table `message`
INSERT INTO `message` (`user_id`, `recipient_id`, `subject`,`body`) VALUES
(2, 3,'new users', 'I just gave you both generic user profiles'),
(3,2,'Re:new users',"Ahh flemmo. I'll go pree"),
(2,1,'hello admin',"Hi there random admin");
---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------

-- Table structure for table `message_read`
CREATE TABLE IF NOT EXISTS `message_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;


---------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------

