/*
Navicat MySQL Data Transfer

Source Server         : ProiectTW
Source Server Version : 80011
Source Host           : localhost:3306
Source Database       : tw

Target Server Type    : MYSQL
Target Server Version : 80011
File Encoding         : 65001

Date: 2018-06-12 00:00:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categorii_punctaje
-- ----------------------------
DROP TABLE IF EXISTS `categorii_punctaje`;
CREATE TABLE `categorii_punctaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  `punctaj` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorii_punctaje
-- ----------------------------

-- ----------------------------
-- Table structure for external
-- ----------------------------
DROP TABLE IF EXISTS `external`;
CREATE TABLE `external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of external
-- ----------------------------

-- ----------------------------
-- Table structure for note
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) NOT NULL,
  `categorie` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `data_notare` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of note
-- ----------------------------

-- ----------------------------
-- Table structure for plan_grupe
-- ----------------------------
DROP TABLE IF EXISTS `plan_grupe`;
CREATE TABLE `plan_grupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(2) NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plan_grupe
-- ----------------------------

-- ----------------------------
-- Table structure for prezente
-- ----------------------------
DROP TABLE IF EXISTS `prezente`;
CREATE TABLE `prezente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) NOT NULL,
  `categorie` int(11) NOT NULL,
  `data_notare` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prezente
-- ----------------------------

-- ----------------------------
-- Table structure for profesori
-- ----------------------------
DROP TABLE IF EXISTS `profesori`;
CREATE TABLE `profesori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  `prenume` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profesori
-- ----------------------------

-- ----------------------------
-- Table structure for studenti
-- ----------------------------
DROP TABLE IF EXISTS `studenti`;
CREATE TABLE `studenti` (
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

-- ----------------------------
-- Records of studenti
-- ----------------------------

-- ----------------------------
-- Table structure for sugestii
-- ----------------------------
DROP TABLE IF EXISTS `sugestii`;
CREATE TABLE `sugestii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` enum('curs','laborator','others') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sugestii
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `github_account` varchar(255) NOT NULL,
  `facebook_account` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('11', 'iftimesei.ioan@yahoo.com', 'a02df1fd80baa5565e9e1dc81c6c623b', 'Ioan', 'Iftimesei', 'hub.com/IftimeseiIoan', 'https://www.facebook.com/ioan.iftimesei', 'male', 'stud');
INSERT INTO `users` VALUES ('13', 'iftimesei.cretu@yahoo.com', 'a3dcb4d229de6fde0db5686dee47145d', 'cretu', 'marius', 'asd', 'asd', 'male', 'stud');
