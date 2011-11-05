-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2011 at 04:24 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `memoriez`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventlocations`
--

CREATE TABLE IF NOT EXISTS `eventlocations` (
  `eventid` text COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL DEFAULT '0',
  `lng` double NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `eventlocations`
--

INSERT INTO `eventlocations` (`eventid`, `lat`, `lng`, `id`) VALUES
('131657286936629', 41, 87, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`) VALUES
('131657286936629');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `eventid` text COLLATE utf8_unicode_ci NOT NULL,
  `picid` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `albumid` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`eventid`, `picid`, `id`, `userid`, `albumid`) VALUES
('131657286936629', 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/276426_144682542295731_1770123730_s.jpg', 2, '1184942072', ''),
('131657286936629', 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v1/yi/r/zSnTif5Rf_V.png', 6, '1184942072', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
