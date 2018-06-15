/*
Navicat MySQL Data Transfer

Source Server         : ProiectTW
Source Server Version : 80011
Source Host           : localhost:3306
Source Database       : tw

Target Server Type    : MYSQL
Target Server Version : 80011
File Encoding         : 65001

Date: 2018-06-15 11:07:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categorii_punctaje
-- ----------------------------
DROP TABLE IF EXISTS `categorii_punctaje`;
CREATE TABLE `categorii_punctaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categorii_punctaje
-- ----------------------------
INSERT INTO `categorii_punctaje` VALUES ('1', 'curs');
INSERT INTO `categorii_punctaje` VALUES ('2', 'laborator');
INSERT INTO `categorii_punctaje` VALUES ('3', 'proiect');

-- ----------------------------
-- Table structure for evenimente
-- ----------------------------
DROP TABLE IF EXISTS `evenimente`;
CREATE TABLE `evenimente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eveniment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

-- ----------------------------
-- Records of evenimente
-- ----------------------------
INSERT INTO `evenimente` VALUES ('1', 'SmashingConf San Francisco, USA (April 17-18, 2018)');
INSERT INTO `evenimente` VALUES ('2', 'App Promotion Summit London, UK(March, 2018)');
INSERT INTO `evenimente` VALUES ('3', 'Experience Conference Bratislava, Slowakia(March 27, 2018)');
INSERT INTO `evenimente` VALUES ('4', 'DevConf 2018 Johannesburg, South Africa(March 27, 2018)');
INSERT INTO `evenimente` VALUES ('5', 'University of Illinois Web Conference 2018(April 4-6, 2018)');
INSERT INTO `evenimente` VALUES ('6', 'RWDevCon 2018 Alexandria, VA, USA(April 5-7, 2018)');

-- ----------------------------
-- Table structure for ev_note
-- ----------------------------
DROP TABLE IF EXISTS `ev_note`;
CREATE TABLE `ev_note` (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` int(11) NOT NULL,
  `valoare` int(11) DEFAULT NULL,
  `data_notare` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_prof` int(11) NOT NULL,
  `saptamana` int(11) NOT NULL,
  `ev_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  KEY `nota_id` (`ev_id`) USING BTREE,
  KEY `idx_1` (`nr_matricol`) USING BTREE,
  KEY `categorie` (`categorie`) USING BTREE,
  CONSTRAINT `ev_note_ibfk_1` FOREIGN KEY (`nr_matricol`) REFERENCES `studenti` (`nr_matricol`) ON DELETE CASCADE,
  CONSTRAINT `ev_note_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ev_note
-- ----------------------------
INSERT INTO `ev_note` VALUES ('1', 'S1000000', '1', '8', '2018-06-14', '2018-06-14 01:53:23', '28', '0', 'add_nota');
INSERT INTO `ev_note` VALUES ('2', 'S1000000', '1', '5', '2018-05-10', '2018-06-14 01:54:23', '28', '0', 'add_nota');
INSERT INTO `ev_note` VALUES ('3', 'S1000000', '1', '10', '2018-08-15', '2018-06-14 01:55:27', '28', '0', 'add_nota');
INSERT INTO `ev_note` VALUES ('4', 'S1000000', '1', '9', '2018-06-04', '2018-06-14 01:55:46', '28', '2', 'add_nota');
INSERT INTO `ev_note` VALUES ('5', 'S1000000', '1', '7', '2018-06-14', '2018-06-14 02:07:55', '28', '4', 'add_nota');
INSERT INTO `ev_note` VALUES ('6', 'S1000000', '1', '9', '2018-06-14', '2018-06-14 02:44:48', '28', '4', 'add_nota');
INSERT INTO `ev_note` VALUES ('8', 'S1000000', '2', null, '2018-06-14', '2018-06-14 10:32:13', '28', '5', 'prez');
INSERT INTO `ev_note` VALUES ('9', 'S1000000', '2', '10', '2018-06-14', '2018-06-14 10:35:19', '28', '5', 'add_nota');
INSERT INTO `ev_note` VALUES ('10', 'S1000001', '1', null, '2018-06-12', '2018-06-14 10:36:54', '28', '5', 'prez');
INSERT INTO `ev_note` VALUES ('11', 'S1000002', '2', null, '2018-03-29', '2018-06-14 10:57:50', '28', '5', 'prez');
INSERT INTO `ev_note` VALUES ('12', 'S1000003', '2', null, '2018-06-12', '2018-06-14 11:03:15', '28', '6', 'prez');
INSERT INTO `ev_note` VALUES ('13', 'S1000000', '3', '5', '2018-06-14', '2018-06-14 11:11:50', '28', '5', 'bonus');
INSERT INTO `ev_note` VALUES ('14', 'S1000003', '4', '2', '2018-06-14', '2018-06-14 11:24:16', '28', '3', 'bonus');
INSERT INTO `ev_note` VALUES ('15', 'S1000003', '1', null, '2018-06-14', '2018-06-14 11:35:07', '28', '5', 'prez');
INSERT INTO `ev_note` VALUES ('16', 'S1000003', '1', null, '2018-06-13', '2018-06-14 11:35:40', '28', '3', 'prez');
INSERT INTO `ev_note` VALUES ('17', 'S1000004', '2', null, '2018-06-14', '2018-06-14 11:37:17', '28', '7', 'prez');
INSERT INTO `ev_note` VALUES ('18', 'S1000000', '2', '9', '2018-06-13', '2018-06-14 10:20:28', '28', '4', 'add_note');
INSERT INTO `ev_note` VALUES ('19', 'S1000001', '3', '5', '2018-06-14', '2018-06-14 10:22:34', '28', '2', 'bonus');
INSERT INTO `ev_note` VALUES ('20', 'S1000004', '1', null, '2018-06-14', '2018-06-14 10:52:56', '28', '5', 'prez');
INSERT INTO `ev_note` VALUES ('21', 'S1000000', '3', '2', '2018-06-14', '2018-06-14 10:53:51', '28', '4', 'bonus');
INSERT INTO `ev_note` VALUES ('22', 'S1000000', '3', '3', '2018-06-14', '2018-06-14 15:05:43', '28', '6', 'add_note');
INSERT INTO `ev_note` VALUES ('23', 'S1000000', '1', '9', '2018-06-14', '2018-06-14 15:13:21', '28', '5', 'add_note');

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
  `id` varchar(11) NOT NULL,
  `nr_matricol` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` varchar(11) NOT NULL,
  `valoare` varchar(11) NOT NULL,
  `data_notare` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `saptamana` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of note
-- ----------------------------
INSERT INTO `note` VALUES ('1', 'S1000000', '1', '8', '2018-06-14', '28', '0');
INSERT INTO `note` VALUES ('10', 'S1000000', '3', '3', '2018-06-14', '28', '6');
INSERT INTO `note` VALUES ('11', 'S1000000', '1', '9', '2018-06-14', '28', '5');
INSERT INTO `note` VALUES ('2', 'S1000000', '1', '5', '2018-05-10', '28', '0');
INSERT INTO `note` VALUES ('3', 'S1000000', '1', '10', '2018-08-15', '28', '0');
INSERT INTO `note` VALUES ('4', 'S1000000', '1', '9', '2018-06-04', '28', '0');
INSERT INTO `note` VALUES ('5', 'S1000000', '1', '7', '2018-06-14', '28', '4');
INSERT INTO `note` VALUES ('6', 'S1000000', '2', '10', '2018-06-14', '28', '5');
INSERT INTO `note` VALUES ('7', 'S1000000', '2', '9', '2018-06-13', '28', '4');
INSERT INTO `note` VALUES ('8', 'S1000000', '3', '5', '2018-06-14', '28', '2');
INSERT INTO `note` VALUES ('9', 'S1000000', '3', '2', '2018-06-14', '28', '4');

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
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` int(11) NOT NULL,
  `data_notare` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `week` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of prezente
-- ----------------------------
INSERT INTO `prezente` VALUES ('1', 'S1000000', '2', '2018-10-03', '28', '3');
INSERT INTO `prezente` VALUES ('2', 'S1000000', '2', '2018-10-04', '28', '4');
INSERT INTO `prezente` VALUES ('3', 'S1000000', '2', '2018-06-14', '28', '5');
INSERT INTO `prezente` VALUES ('4', 'S1000000', '1', '2018-06-12', '28', '5');
INSERT INTO `prezente` VALUES ('5', 'S1000000', '2', '2018-03-29', '28', '5');
INSERT INTO `prezente` VALUES ('6', 'S1000000', '2', '2018-06-12', '28', '6');
INSERT INTO `prezente` VALUES ('7', 'S1000000', '1', '2018-06-14', '28', '5');
INSERT INTO `prezente` VALUES ('8', 'S1000000', '1', '2018-06-13', '28', '3');
INSERT INTO `prezente` VALUES ('9', 'S1000000', '2', '2018-06-14', '28', '7');
INSERT INTO `prezente` VALUES ('10', 'S1000000', '1', '2018-06-14', '28', '5');
INSERT INTO `prezente` VALUES ('11', 'S1000000', '2', '2018-06-14', '28', '7');
INSERT INTO `prezente` VALUES ('12', 'S1000000', '2', '2018-06-14', '28', '7');
INSERT INTO `prezente` VALUES ('33', 'S1000000', '2', '2018-06-14', '28', '7');

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
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data_nastere` date NOT NULL,
  `grupa` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `an` int(2) NOT NULL,
  PRIMARY KEY (`id_student`,`nr_matricol`) USING BTREE,
  UNIQUE KEY `nr_matricol` (`nr_matricol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of studenti
-- ----------------------------
INSERT INTO `studenti` VALUES ('1', 'S1000000', 'Iftimesei', 'Ioan', 'iftimesei.ioan@yahoo.com', '1996-01-14', 'A5', '2');
INSERT INTO `studenti` VALUES ('2', 'S1000001', 'Luca', 'Radu', 'rd.lc@gmail.com', '1996-01-13', 'A5', '2');
INSERT INTO `studenti` VALUES ('3', 'S1000002', 'Iftimesei', 'Ioan', 'if.ioana@yahoo.com', '1996-01-23', 'A5', '3');
INSERT INTO `studenti` VALUES ('4', 'S1000003', 'Repciuc', 'Alexandra', 'alee.rep@gmail.com', '1996-01-23', 'B4', '1');
INSERT INTO `studenti` VALUES ('5', 'S1000004', 'Arhip', 'Emanoel', 'arh.emano@gmail.com', '1996-07-18', 'B3', '3');

-- ----------------------------
-- Table structure for sugestii
-- ----------------------------
DROP TABLE IF EXISTS `sugestii`;
CREATE TABLE `sugestii` (
  `s_id` int(11) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `associated` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` date NOT NULL,
  KEY `idx` (`s_id`) USING BTREE,
  CONSTRAINT `sugestii_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `s_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sugestii
-- ----------------------------
INSERT INTO `sugestii` VALUES ('1', 'Week 1 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web01ArhitecturaWeb.pdf', '2018-10-03');
INSERT INTO `sugestii` VALUES ('1', 'Week 2 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web02ProgramareWeb-HTTP-CGI.pdf', '2018-10-10');
INSERT INTO `sugestii` VALUES ('1', 'Week 3 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web04DezvoltareaAplicatiilorWeb-InginerieWeb.pdf', '2018-10-17');
INSERT INTO `sugestii` VALUES ('1', 'Week 4 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web05DezvoltareaAplicatiilorWeb-PHP.pdf', '2018-10-24');
INSERT INTO `sugestii` VALUES ('1', 'Week 5 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web05DezvoltareaAplicatiilorWeb-PHP.pdf', '2018-10-31');
INSERT INTO `sugestii` VALUES ('1', 'Recuperation', 'https://www.w3.org/html/', '2018-06-13');
INSERT INTO `sugestii` VALUES ('2', 'DEMO Node.Js', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/javascript-nodejs/javascript-nodejs.zip', '2018-10-04');
INSERT INTO `sugestii` VALUES ('2', 'DEMO PHP', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/php/php.zip', '2018-10-11');
INSERT INTO `sugestii` VALUES ('2', 'See all files', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/', '2018-06-13');
INSERT INTO `sugestii` VALUES ('2', 'Laboratory 1', '', '2018-10-04');
INSERT INTO `sugestii` VALUES ('2', 'Laboratory in advance', '', '2018-06-13');
INSERT INTO `sugestii` VALUES ('1', 'Amazon', '', '2018-07-17');

-- ----------------------------
-- Table structure for s_types
-- ----------------------------
DROP TABLE IF EXISTS `s_types`;
CREATE TABLE `s_types` (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of s_types
-- ----------------------------
INSERT INTO `s_types` VALUES ('1', 'course');
INSERT INTO `s_types` VALUES ('2', 'laboratory');
INSERT INTO `s_types` VALUES ('3', 'other_events');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `denumire` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'curs');
INSERT INTO `types` VALUES ('2', 'laborator');
INSERT INTO `types` VALUES ('3', 'bonus-laborator');
INSERT INTO `types` VALUES ('4', 'bonus-curs');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `github_account` varchar(255) NOT NULL,
  `facebook_account` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('26', 'S1000000', 'iftimesei.ioan@yahoo.com', 'a02df1fd80baa5565e9e1dc81c6c623b', 'Ioan', 'Iftimesei', 'IftimeseiIoan', 'https://www.facebook.com/ioan.iftimesei', 'male', 'stud');
INSERT INTO `users` VALUES ('27', 'S1000001', 'cretu.marius@yahoo.com', 'a3dcb4d229de6fde0db5686dee47145d', 'Marius Valentin Gheorghita', 'Cretu', 'asd', 'asd', 'male', 'stud');
INSERT INTO `users` VALUES ('28', 'S1000002', 'iftimesei.costel@yahoo.com', 'a02df1fd80baa5565e9e1dc81c6c623b', 'Costel', 'Iftimesei', 'IftimeseiIoan', 'https://www.facebook.com/ioan.iftimesei', 'male', 'prof');
INSERT INTO `users` VALUES ('29', 'S1000003', 'iftimesei.ioan2@yahoo.com', 'a3dcb4d229de6fde0db5686dee47145d', 'asd', 'asd', 'IftimeseiIoan', 'asd', 'male', 'stud');
DROP TRIGGER IF EXISTS `t_evidenta`;
DELIMITER ;;
CREATE TRIGGER `t_evidenta` AFTER INSERT ON `note` FOR EACH ROW begin
if(new.categorie = 1 || new.categorie = 2) then
  insert into ev_note (nr_matricol, categorie, valoare, data_notare, updated_at, id_prof, saptamana, ev_type) values (new.nr_matricol, new.categorie, new.valoare, new.data_notare, SYSDATE(), new.id_prof, new.saptamana, 'add_note');
	else
insert into ev_note (nr_matricol, categorie, valoare, data_notare, updated_at, id_prof, saptamana, ev_type) values (new.nr_matricol, new.categorie, new.valoare, new.data_notare, SYSDATE(), new.id_prof, new.saptamana, 'bonus');
end if;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `t_evidenta_p`;
DELIMITER ;;
CREATE TRIGGER `t_evidenta_p` AFTER INSERT ON `prezente` FOR EACH ROW begin
  insert into ev_note (nr_matricol, categorie, valoare, data_notare, updated_at, id_prof, saptamana, ev_type) values (new.nr_matricol, new.categorie, new.data_notare, SYSDATE(), new.id_prof, new.week, 'add_note');

end
;;
DELIMITER ;
