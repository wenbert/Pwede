-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2013 at 03:57 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cake_plugins`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups_pwederesources`
--

CREATE TABLE IF NOT EXISTS `groups_pwederesources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `pwederesource_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Dumping data for table `groups_pwederesources`
--

INSERT INTO `groups_pwederesources` (`id`, `group_id`, `pwederesource_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwederesources`
--

CREATE TABLE IF NOT EXISTS `pwederesources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `named` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pwederesources`
--

INSERT INTO `pwederesources` (`id`, `plugin`, `controller`, `action`, `named`, `pass`, `query`) VALUES
(1, '*', '*', NULL, NULL, NULL, NULL);
