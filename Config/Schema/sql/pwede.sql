-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2013 at 02:38 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cake_plugins`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwederesources`
--

CREATE TABLE IF NOT EXISTS `pwederesources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `named` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pwederesources`
--

INSERT INTO `pwederesources` (`id`, `plugin`, `controller`, `action`, `named`, `pass`, `query`) VALUES
(1, '*', '*', '', NULL, NULL, NULL),
(2, 'pwede', 'dashboards', '*', NULL, NULL, NULL);