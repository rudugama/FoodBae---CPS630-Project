-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2017 at 10:37 PM
-- Server version: 5.6.33-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodbaee`
--

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `deal_id` varchar(8) NOT NULL DEFAULT '',
  `place_id` varchar(50) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `day` int(1) NOT NULL,
  `date` date NOT NULL,
  `deal_name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`deal_id`),
  UNIQUE KEY `deal_id` (`deal_id`),
  UNIQUE KEY `place_id` (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Deals Table will contain dem deals fam.';

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `place_id`, `price`, `day`, `date`, `deal_name`, `user_id`) VALUES
('BK245', 'pla', 0, 3, '2017-03-23', '2 For 5 Mix & Match', 0),
('bk4bc', 'bur', 0, 8, '2017-03-24', 'Buy one, get 1 free! AAA grade, starbucks-fed chipotle flavor bootycheeks', 0),
('bk241', 'ChIJ1aYQC9A0K4gRn08hfkM9o6A', 8, 2, '2017-03-31', '2 FOR 1 FAMMM!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE IF NOT EXISTS `friday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE IF NOT EXISTS `monday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Place`
--

CREATE TABLE IF NOT EXISTS `Place` (
  `place_id` varchar(100) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_address` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This table contains Places';

--
-- Dumping data for table `Place`
--

INSERT INTO `Place` (`place_id`, `place_name`, `place_address`, `user_id`) VALUES
('ChIJ1aYQC9A0K4gRn08hfkM9o6A', 'Burger King', '130 King Street West, Toronto, ON M5X 1A6, Canada', 0),
('1235fff', 'KFC CHICK', 'CF Toronto Eaton Centre, 260 Yonge St, Toronto, ON M5B 2L9', 17);

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE IF NOT EXISTS `saturday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE IF NOT EXISTS `sunday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `visitNumber` int(11) NOT NULL,
  `studentName` varchar(24) NOT NULL,
  `location` varchar(24) NOT NULL,
  `reason` text NOT NULL,
  `idNumber` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `visitNumber`, `studentName`, `location`, `reason`, `idNumber`) VALUES
(1, 1, 'John', 'SLC', 'Fuck bitches, get money', 500200100);

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE IF NOT EXISTS `thursday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE IF NOT EXISTS `tuesday` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` varchar(24) NOT NULL,
  `place_name` varchar(24) NOT NULL,
  `deal_name` text NOT NULL,
  `price` double(3,2) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2007 ;

--
-- Dumping data for table `tuesday`
--

INSERT INTO `tuesday` (`deal_id`, `place_id`, `place_name`, `deal_name`, `price`, `end`) VALUES
(2001, '', 'ASAP City', 'Neopolitan Sandwich ', 5.95, '2018-03-29'),
(2002, '', 'ASAP City', 'A slakting', 4.20, '2018-03-31'),
(2003, '', 'McDonald''s', 'Ice Coffee', 1.00, '2017-04-29'),
(2004, '', 'KFC', '2 Piece Chicken ', 2.79, '0000-00-00'),
(2005, '', 'Popeyes', 'Free Biscuit w/ M Fries', 3.29, '0000-00-00'),
(2006, '', 'KFC', 'Free Combo between 3 - 5PM', 5.79, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `isAdmin`) VALUES
(15, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(16, 'roshane', 'rudugama@ryerson.ca', '9e8c01ce27e7646d2a5f24c18ffac8a7', 0),
(17, 'KFC', 'kfc@kfc.com', '877638bce3f1d247e42fb90fe358d116', 0),
(20, 'semir121', 'semirnik2@gmail.com', '817029486cc80d50f7239929c95dffaf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE IF NOT EXISTS `wednesday` (
  `deal_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
