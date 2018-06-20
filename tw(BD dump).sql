/*
 Navicat Premium Data Transfer

 Source Server         : web
 Source Server Type    : MySQL
 Source Server Version : 80011
 Source Host           : localhost:3306
 Source Schema         : tw

 Target Server Type    : MySQL
 Target Server Version : 80011
 File Encoding         : 65001

 Date: 20/06/2018 19:02:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bonus
-- ----------------------------
DROP TABLE IF EXISTS `bonus`;
CREATE TABLE `bonus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` enum('curs','laborator','bonus') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `valoare` int(11) NOT NULL,
  `data_notare` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bonus
-- ----------------------------
INSERT INTO `bonus` VALUES (1, 'sc123', 'curs', 5, '2018-06-14', 21, 5);
INSERT INTO `bonus` VALUES (2, 'sc190', 'laborator', 2, '2018-06-14', 21, 3);

-- ----------------------------
-- Table structure for categorii_punctaje
-- ----------------------------
DROP TABLE IF EXISTS `categorii_punctaje`;
CREATE TABLE `categorii_punctaje`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorii_punctaje
-- ----------------------------
INSERT INTO `categorii_punctaje` VALUES (1, 'curs');
INSERT INTO `categorii_punctaje` VALUES (2, 'laborator');
INSERT INTO `categorii_punctaje` VALUES (3, 'proiect');

-- ----------------------------
-- Table structure for ev_note
-- ----------------------------
DROP TABLE IF EXISTS `ev_note`;
CREATE TABLE `ev_note`  (
  `ev_id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` int(11) NOT NULL,
  `valoare` int(11) NULL DEFAULT NULL,
  `data_notare` date NOT NULL,
  `updated_at` datetime(0) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `saptamana` int(11) NOT NULL,
  `ev_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ev_id`) USING BTREE,
  INDEX `nota_id`(`ev_id`) USING BTREE,
  INDEX `idx_1`(`nr_matricol`) USING BTREE,
  INDEX `categorie`(`categorie`) USING BTREE,
  CONSTRAINT `ev_note_ibfk_1` FOREIGN KEY (`nr_matricol`) REFERENCES `studenti` (`nr_matricol`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `ev_note_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ev_note
-- ----------------------------
INSERT INTO `ev_note` VALUES (1, 'S1000000', 1, 8, '2018-06-14', '2018-06-14 01:53:23', 36, 0, 'add_nota');
INSERT INTO `ev_note` VALUES (2, 'S1000000', 1, 5, '2018-05-10', '2018-06-14 01:54:23', 36, 0, 'add_nota');
INSERT INTO `ev_note` VALUES (3, 'S1000000', 1, 10, '2018-08-15', '2018-06-14 01:55:27', 36, 0, 'add_nota');
INSERT INTO `ev_note` VALUES (4, 'S1000000', 1, 9, '2018-06-04', '2018-06-14 01:55:46', 36, 2, 'add_nota');
INSERT INTO `ev_note` VALUES (5, 'S1000000', 1, 7, '2018-06-14', '2018-06-14 02:07:55', 36, 4, 'add_nota');
INSERT INTO `ev_note` VALUES (6, 'S1000000', 1, 9, '2018-06-14', '2018-06-14 02:44:48', 36, 4, 'add_nota');
INSERT INTO `ev_note` VALUES (8, 'S1000000', 2, NULL, '2018-06-14', '2018-06-14 10:32:13', 36, 5, 'prez');
INSERT INTO `ev_note` VALUES (9, 'S1000000', 2, 10, '2018-06-14', '2018-06-14 10:35:19', 36, 5, 'add_nota');
INSERT INTO `ev_note` VALUES (10, 'S1000001', 1, NULL, '2018-06-12', '2018-06-14 10:36:54', 36, 5, 'prez');
INSERT INTO `ev_note` VALUES (11, 'S1000002', 2, NULL, '2018-03-29', '2018-06-14 10:57:50', 36, 5, 'prez');
INSERT INTO `ev_note` VALUES (12, 'S1000003', 2, NULL, '2018-06-12', '2018-06-14 11:03:15', 36, 6, 'prez');
INSERT INTO `ev_note` VALUES (13, 'S1000000', 3, 5, '2018-06-14', '2018-06-14 11:11:50', 36, 5, 'bonus');
INSERT INTO `ev_note` VALUES (14, 'S1000003', 4, 2, '2018-06-14', '2018-06-14 11:24:16', 36, 3, 'bonus');
INSERT INTO `ev_note` VALUES (15, 'S1000003', 1, NULL, '2018-06-14', '2018-06-14 11:35:07', 36, 5, 'prez');
INSERT INTO `ev_note` VALUES (16, 'S1000003', 1, NULL, '2018-06-13', '2018-06-14 11:35:40', 36, 3, 'prez');
INSERT INTO `ev_note` VALUES (17, 'S1000004', 2, NULL, '2018-06-14', '2018-06-14 11:37:17', 36, 7, 'prez');
INSERT INTO `ev_note` VALUES (19, 'S1000001', 3, 5, '2018-06-14', '2018-06-14 10:22:34', 36, 2, 'bonus');
INSERT INTO `ev_note` VALUES (20, 'S1000004', 1, NULL, '2018-06-14', '2018-06-14 10:52:56', 36, 5, 'prez');
INSERT INTO `ev_note` VALUES (21, 'S1000000', 3, 2, '2018-06-14', '2018-06-14 10:53:51', 36, 4, 'bonus');
INSERT INTO `ev_note` VALUES (26, 'S1000005', 2, 9, '2018-06-20', '2018-06-20 17:31:55', 36, 4, 'add_nota');
INSERT INTO `ev_note` VALUES (27, 'S1000005', 1, NULL, '2018-06-20', '2018-06-20 17:41:24', 36, 4, 'prez');
INSERT INTO `ev_note` VALUES (28, 'S1000005', 3, 3, '2018-06-20', '2018-06-20 17:42:58', 36, 10, 'bonus');
INSERT INTO `ev_note` VALUES (29, 'S1000005', 2, NULL, '2018-06-20', '2018-06-20 17:46:01', 36, 1, 'prez');

-- ----------------------------
-- Table structure for evenimente
-- ----------------------------
DROP TABLE IF EXISTS `evenimente`;
CREATE TABLE `evenimente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eveniment` varchar(1000) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `validation_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_romanian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_romanian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evenimente
-- ----------------------------
INSERT INTO `evenimente` VALUES (1, 'SmashingConf San Francisco, USA (April 17-18, 2018)', '5c324d0d34125aa3572a06bd84dc955c');
INSERT INTO `evenimente` VALUES (2, 'App Promotion Summit London, UK(March, 2018)', '922883aed0237ead1a92f5582b263ec1');
INSERT INTO `evenimente` VALUES (3, 'Experience Conference Bratislava, Slowakia(March 27, 2018)', '9683f9da55252905a17a59d36e93adc8');
INSERT INTO `evenimente` VALUES (4, 'DevConf 2018 Johannesburg, South Africa(March 27, 2018)', '');
INSERT INTO `evenimente` VALUES (5, 'University of Illinois Web Conference 2018(April 4-6, 2018)', '');
INSERT INTO `evenimente` VALUES (6, 'RWDevCon 2018 Alexandria, VA, USA(April 5-7, 2018)', '');

-- ----------------------------
-- Table structure for evidenta_evenimente
-- ----------------------------
DROP TABLE IF EXISTS `evidenta_evenimente`;
CREATE TABLE `evidenta_evenimente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidenta_evenimente
-- ----------------------------
INSERT INTO `evidenta_evenimente` VALUES (9, 1, 26);

-- ----------------------------
-- Table structure for external
-- ----------------------------
DROP TABLE IF EXISTS `external`;
CREATE TABLE `external`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for note
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note`  (
  `id` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `valoare` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data_notare` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `saptamana` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of note
-- ----------------------------
INSERT INTO `note` VALUES ('1', 'S1000000', '1', '8', '2018-06-14', 36, 0);
INSERT INTO `note` VALUES ('10', 'S1000005', '1', '5', '2018-06-19', 36, 20);
INSERT INTO `note` VALUES ('12', 'S1000005', '2', '9', '2018-06-20', 36, 4);
INSERT INTO `note` VALUES ('13', 'S1000005', '3', '3', '2018-06-20', 36, 10);
INSERT INTO `note` VALUES ('2', 'S1000000', '3', '3', '2018-06-14', 36, 6);
INSERT INTO `note` VALUES ('3', 'S1000000', '1', '9', '2018-06-14', 36, 5);
INSERT INTO `note` VALUES ('4', 'S1000000', '1', '5', '2018-05-10', 36, 0);
INSERT INTO `note` VALUES ('5', 'S1000000', '1', '10', '2018-08-15', 36, 0);
INSERT INTO `note` VALUES ('6', 'S1000000', '1', '9', '2018-06-04', 36, 0);
INSERT INTO `note` VALUES ('7', 'S1000000', '1', '7', '2018-06-14', 36, 4);
INSERT INTO `note` VALUES ('8', 'S1000000', '2', '10', '2018-06-14', 36, 5);
INSERT INTO `note` VALUES ('9', 'S1000000', '2', '9', '2018-06-13', 36, 5);

-- ----------------------------
-- Table structure for plan_grupe
-- ----------------------------
DROP TABLE IF EXISTS `plan_grupe`;
CREATE TABLE `plan_grupe`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_prof` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for prezente
-- ----------------------------
DROP TABLE IF EXISTS `prezente`;
CREATE TABLE `prezente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `categorie` int(11) NOT NULL,
  `data_notare` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `week` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prezente
-- ----------------------------
INSERT INTO `prezente` VALUES (1, 'S1000000', 2, '2018-10-03', 28, '3');
INSERT INTO `prezente` VALUES (2, 'S1000000', 2, '2018-10-04', 28, '4');
INSERT INTO `prezente` VALUES (3, 'S1000000', 2, '2018-06-14', 28, '5');
INSERT INTO `prezente` VALUES (4, 'S1000000', 1, '2018-06-12', 28, '5');
INSERT INTO `prezente` VALUES (5, 'S1000000', 2, '2018-03-29', 28, '5');
INSERT INTO `prezente` VALUES (6, 'S1000000', 2, '2018-06-12', 28, '6');
INSERT INTO `prezente` VALUES (7, 'S1000000', 1, '2018-06-14', 28, '5');
INSERT INTO `prezente` VALUES (8, 'S1000000', 1, '2018-06-13', 28, '3');
INSERT INTO `prezente` VALUES (9, 'S1000000', 2, '2018-06-14', 28, '7');
INSERT INTO `prezente` VALUES (10, 'S1000000', 1, '2018-06-14', 28, '5');
INSERT INTO `prezente` VALUES (11, 'S1000000', 2, '2018-06-14', 28, '7');
INSERT INTO `prezente` VALUES (12, 'S1000000', 2, '2018-06-14', 28, '7');
INSERT INTO `prezente` VALUES (13, 'S1000005', 1, '2018-06-20', 36, '4');
INSERT INTO `prezente` VALUES (14, 'S1000005', 2, '2018-06-20', 36, '1');
INSERT INTO `prezente` VALUES (33, 'S1000000', 2, '2018-06-14', 28, '7');

-- ----------------------------
-- Table structure for profesori
-- ----------------------------
DROP TABLE IF EXISTS `profesori`;
CREATE TABLE `profesori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for s_types
-- ----------------------------
DROP TABLE IF EXISTS `s_types`;
CREATE TABLE `s_types`  (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of s_types
-- ----------------------------
INSERT INTO `s_types` VALUES (1, 'course');
INSERT INTO `s_types` VALUES (2, 'laboratory');
INSERT INTO `s_types` VALUES (3, 'other_events');

-- ----------------------------
-- Table structure for studenti
-- ----------------------------
DROP TABLE IF EXISTS `studenti`;
CREATE TABLE `studenti`  (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data_nastere` date NOT NULL,
  `grupa` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `an` int(2) NOT NULL,
  PRIMARY KEY (`id_student`, `nr_matricol`) USING BTREE,
  UNIQUE INDEX `nr_matricol`(`nr_matricol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of studenti
-- ----------------------------
INSERT INTO `studenti` VALUES (1, 'S1000000', 'Iftimesei', 'Ioan', 'iftimesei.ioan@yahoo.com', '1996-01-14', 'A5', 2);
INSERT INTO `studenti` VALUES (2, 'S1000001', 'Luca', 'Radu', 'rd.lc@gmail.com', '1996-01-13', 'A5', 2);
INSERT INTO `studenti` VALUES (3, 'S1000002', 'Iftimesei', 'Ioan', 'if.ioana@yahoo.com', '1996-01-23', 'A5', 3);
INSERT INTO `studenti` VALUES (4, 'S1000003', 'Repciuc', 'Alexandra', 'alee.rep@gmail.com', '1996-01-23', 'B4', 1);
INSERT INTO `studenti` VALUES (5, 'S1000004', 'Arhip', 'Emanoel', 'arh.emano@gmail.com', '1996-07-18', 'B3', 3);
INSERT INTO `studenti` VALUES (6, 'S1000005', 'Cretu', 'Marius', 'mariusv.cretu@gmail.com', '1996-08-25', 'A5', 2);
INSERT INTO `studenti` VALUES (7, 'SL11111111111', 'Tomeci', 'Bianca', 'bia.tom@gmail.com', '2000-08-19', 'B3', 1);

-- ----------------------------
-- Table structure for sugestii
-- ----------------------------
DROP TABLE IF EXISTS `sugestii`;
CREATE TABLE `sugestii`  (
  `s_id` int(11) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `associated` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` date NOT NULL,
  INDEX `idx`(`s_id`) USING BTREE,
  CONSTRAINT `sugestii_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `s_types` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sugestii
-- ----------------------------
INSERT INTO `sugestii` VALUES (1, 'Week 1 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web01ArhitecturaWeb.pdf', '2018-10-03');
INSERT INTO `sugestii` VALUES (1, 'Week 2 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web02ProgramareWeb-HTTP-CGI.pdf', '2018-10-10');
INSERT INTO `sugestii` VALUES (1, 'Week 3 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web04DezvoltareaAplicatiilorWeb-InginerieWeb.pdf', '2018-10-17');
INSERT INTO `sugestii` VALUES (1, 'Week 4 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web05DezvoltareaAplicatiilorWeb-PHP.pdf', '2018-10-24');
INSERT INTO `sugestii` VALUES (1, 'Week 5 course', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/presentations/web05DezvoltareaAplicatiilorWeb-PHP.pdf', '2018-10-31');
INSERT INTO `sugestii` VALUES (1, 'Recuperation', 'https://www.w3.org/html/', '2018-06-13');
INSERT INTO `sugestii` VALUES (2, 'DEMO Node.Js', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/javascript-nodejs/javascript-nodejs.zip', '2018-10-04');
INSERT INTO `sugestii` VALUES (2, 'DEMO PHP', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/php/php.zip', '2018-10-11');
INSERT INTO `sugestii` VALUES (2, 'See all files', 'https://profs.info.uaic.ro/~busaco/teach/courses/web/demos/', '2018-06-13');
INSERT INTO `sugestii` VALUES (2, 'Laboratory 1', '', '2018-10-04');
INSERT INTO `sugestii` VALUES (2, 'Laboratory in advance', '', '2018-06-13');
INSERT INTO `sugestii` VALUES (1, 'Amazon', '', '2018-07-17');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` int(11) NOT NULL,
  `denumire` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'curs');
INSERT INTO `types` VALUES (2, 'laborator');
INSERT INTO `types` VALUES (3, 'bonus-laborator');
INSERT INTO `types` VALUES (4, 'bonus-curs');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_matricol` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `github_account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `facebook_account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (26, 'S1000000', 'iftimesei.ioan@yahoo.com', 'a02df1fd80baa5565e9e1dc81c6c623b', 'Ioan', 'Iftimesei', 'IftimeseiIoan', 'https://www.facebook.com/ioan.iftimesei', 'male', 'stud');
INSERT INTO `users` VALUES (27, 'S1000001', 'cretu.marius@yahoo.com', 'a3dcb4d229de6fde0db5686dee47145d', 'Marius Valentin Gheorghita', 'Cretu', 'asd', 'asd', 'male', 'stud');
INSERT INTO `users` VALUES (28, 'S1000002', 'iftimesei.costel@yahoo.com', 'a02df1fd80baa5565e9e1dc81c6c623b', 'Costel', 'Iftimesei', 'IftimeseiIoan', 'https://www.facebook.com/ioan.iftimesei', 'male', 'prof');
INSERT INTO `users` VALUES (29, 'S1000003', 'iftimesei.ioan2@yahoo.com', 'a3dcb4d229de6fde0db5686dee47145d', 'asd', 'asd', 'IftimeseiIoan', 'asd', 'male', 'stud');
INSERT INTO `users` VALUES (30, 'S1000004', 'radu.luca13@yahoo.com', 'b4af804009cb036a4ccdc33431ef9ac9', 'Radu', 'Luca', 'github.com/git', 'facebook.com/radu.97', 'male', 'prof');
INSERT INTO `users` VALUES (35, 'S1000005', 'mariusv.cretu@gmail.com', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Cretu', 'Marius', 'mrcretu', 'https://www.facebook.com/marius.cretu.25', 'male', 'stud');
INSERT INTO `users` VALUES (36, 'S1000006', 'bg.iere@gmail.com', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'Ieremie', 'Bogdan', 'https://github.com/mrcretu', 'https://www.facebook.com/marius.cretu.25', 'male', 'prof');

SET FOREIGN_KEY_CHECKS = 1;
