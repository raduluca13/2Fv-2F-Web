-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2018 at 04:32 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorii_punctaje`
--

DROP TABLE IF EXISTS `categorii_punctaje`;
CREATE TABLE IF NOT EXISTS `categorii_punctaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  `punctaj` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `external`
--

DROP TABLE IF EXISTS `external`;
CREATE TABLE IF NOT EXISTS `external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) NOT NULL,
  `categorie` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `data_notare` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plan_grupe`
--

DROP TABLE IF EXISTS `plan_grupe`;
CREATE TABLE IF NOT EXISTS `plan_grupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(2) NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prezente`
--

DROP TABLE IF EXISTS `prezente`;
CREATE TABLE IF NOT EXISTS `prezente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) NOT NULL,
  `categorie` int(11) NOT NULL,
  `data_notare` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

DROP TABLE IF EXISTS `profesori`;
CREATE TABLE IF NOT EXISTS `profesori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  `prenume` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

DROP TABLE IF EXISTS `studenti`;
CREATE TABLE IF NOT EXISTS `studenti` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) NOT NULL,
  `nume` text NOT NULL,
  `prenume` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_nastere` date NOT NULL,
  `grupa` varchar(2) NOT NULL,
  PRIMARY KEY (`id_student`),
  UNIQUE KEY `nr_matricol` (`nr_matricol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sugestii`
--

DROP TABLE IF EXISTS `sugestii`;
CREATE TABLE IF NOT EXISTS `sugestii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` enum('curs','laborator','others') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `user_type` enum('stud','prof','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
