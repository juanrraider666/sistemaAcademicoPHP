/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : sistema_academico

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 27/04/2021 19:52:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for application
-- ----------------------------
DROP TABLE IF EXISTS `application`;
CREATE TABLE `application`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `source` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of application
-- ----------------------------
INSERT INTO `application` VALUES (1, 'backend', 'pages/backend/edit_users.php', 1);
INSERT INTO `application` VALUES (2, 'products_list', 'pages/products.php', 1);

-- ----------------------------
-- Table structure for application_profile
-- ----------------------------
DROP TABLE IF EXISTS `application_profile`;
CREATE TABLE `application_profile`  (
  `profile_id` int(11) NULL DEFAULT NULL,
  `application_id` int(11) NULL DEFAULT NULL,
  INDEX `idx_profile_id`(`profile_id`) USING BTREE,
  INDEX `idx_application`(`application_id`) USING BTREE,
  CONSTRAINT `application_profile_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `application_profile_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of application_profile
-- ----------------------------
INSERT INTO `application_profile` VALUES (2, 1);
INSERT INTO `application_profile` VALUES (1, 1);

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` bigint(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (1, 'LENGUAGE DE PROGRAMACION', 1, '2021-04-21 21:06:44');
INSERT INTO `course` VALUES (2, 'ADMINISTRACION', 1, '2021-04-27 18:30:23');
INSERT INTO `course` VALUES (3, 'IDIOMAS', 1, '2021-04-27 18:30:35');
INSERT INTO `course` VALUES (4, 'INV. OPERACIONES', 1, '2021-04-27 18:30:54');
INSERT INTO `course` VALUES (5, 'PSP AND TSP', 1, '2021-04-27 18:31:09');
INSERT INTO `course` VALUES (6, 'GERENCIA DE SOFTWARE', 1, '2021-04-27 18:40:45');
INSERT INTO `course` VALUES (7, 'ARQUITECTURA DE SOFTWARE', 1, '2021-04-27 18:41:44');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, 'Grupo1', 'ASD', '2021-04-21 21:06:14');
INSERT INTO `group` VALUES (2, 'Grupo2', 'asd', '2021-04-25 14:32:18');
INSERT INTO `group` VALUES (3, 'Grupo3', 'Mark', '2021-04-25 14:33:42');
INSERT INTO `group` VALUES (4, 'Grupo4', '123', '2021-04-25 14:34:14');
INSERT INTO `group` VALUES (5, 'Grupo5', 'Mark', '2021-04-25 14:34:30');
INSERT INTO `group` VALUES (6, 'Grupo6', 'sd', '2021-04-25 16:28:07');
INSERT INTO `group` VALUES (7, 'Grupo7', 'qwe', '2021-04-25 16:42:17');
INSERT INTO `group` VALUES (8, 'Grupo8', 'xxccc', '2021-04-25 16:48:52');
INSERT INTO `group` VALUES (9, 'Grupo9', 'sadasd', '2021-04-25 19:21:06');
INSERT INTO `group` VALUES (10, 'Grupo2', 'Grupo2', '2021-04-27 18:44:36');

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `order` int(255) NULL DEFAULT NULL,
  `created` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `last_update_mysql` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (1, 'example', 'assets/html/banners/10292020_promo_one.html', 1, 1, '2020-10-29 19:22:28', '2020-10-29 19:22:28', '2020-10-29 19:22:28');
INSERT INTO `media` VALUES (2, 'example2', 'assets/html/banners/10292020_promo_two.html', 1, 2, '2020-10-29 19:22:28', '2020-10-29 19:22:28', '2020-10-29 20:02:42');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_parent` int(4) NULL DEFAULT 0,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `link` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `vorder` int(5) NULL DEFAULT NULL,
  `status` int(2) NULL DEFAULT NULL,
  `created` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `last_update_mysql` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `index_primary`(`id`) USING BTREE,
  INDEX `index_idParent`(`id_parent`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 159 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (157, 0, 'backend', 'pages/backend/edit_users.php', 1, 1, '2021-02-23 21:32:14', '2021-02-23 21:32:14', '2021-02-23 21:55:50');
INSERT INTO `menu` VALUES (158, 0, 'All', 'pages/backend/edit_users.php', 1, 1, '2021-02-23 22:35:47', '2021-02-23 22:35:47', '2021-03-17 19:04:40');

-- ----------------------------
-- Table structure for menu_profile
-- ----------------------------
DROP TABLE IF EXISTS `menu_profile`;
CREATE TABLE `menu_profile`  (
  `id_menu` int(4) NOT NULL,
  `id_profile` int(2) NOT NULL,
  `created` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `last_update_mysql` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_menu`, `id_profile`) USING BTREE,
  INDEX `index_primary`(`id_menu`, `id_profile`) USING BTREE,
  INDEX `index_id_menu`(`id_menu`) USING BTREE,
  INDEX `index_id_profile`(`id_profile`) USING BTREE,
  CONSTRAINT `menu_profile_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `menu_profile_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_profile
-- ----------------------------
INSERT INTO `menu_profile` VALUES (157, 2, '2021-02-23 21:33:48', '2021-02-23 21:33:48', '2021-02-23 22:13:37');
INSERT INTO `menu_profile` VALUES (158, 2, '2021-03-17 18:54:50', '2021-03-17 18:54:50', '2021-03-17 18:54:50');

-- ----------------------------
-- Table structure for program
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` bigint(2) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES (1, 'ING SOFTWARE', 1, '2021-04-21 21:06:26');

-- ----------------------------
-- Table structure for program_group
-- ----------------------------
DROP TABLE IF EXISTS `program_group`;
CREATE TABLE `program_group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NULL DEFAULT NULL,
  `program_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_ASD4234`(`program_id`) USING BTREE,
  INDEX `IDX_AS23RTWE`(`group_id`) USING BTREE,
  CONSTRAINT `FK_2323TTER` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_AS23T23` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program_group
-- ----------------------------
INSERT INTO `program_group` VALUES (1, 1, 1, '2021-04-21 21:07:10');
INSERT INTO `program_group` VALUES (2, 7, 1, '2021-04-25 16:42:18');
INSERT INTO `program_group` VALUES (3, 8, 1, '2021-04-25 16:48:53');
INSERT INTO `program_group` VALUES (4, 9, 1, '2021-04-25 19:21:06');
INSERT INTO `program_group` VALUES (5, 10, 1, '2021-04-27 18:44:36');

-- ----------------------------
-- Table structure for program_group_course
-- ----------------------------
DROP TABLE IF EXISTS `program_group_course`;
CREATE TABLE `program_group_course`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_group_id` int(11) NULL DEFAULT NULL,
  `teacher_course_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_RQWEFSD3`(`program_group_id`) USING BTREE,
  INDEX `IDX_C3WRWSE`(`teacher_course_id`) USING BTREE,
  CONSTRAINT `FK_23ASRQW` FOREIGN KEY (`program_group_id`) REFERENCES `program_group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_32ARQQ32` FOREIGN KEY (`teacher_course_id`) REFERENCES `teacher_course` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of program_group_course
-- ----------------------------
INSERT INTO `program_group_course` VALUES (8, 4, 2, NULL);
INSERT INTO `program_group_course` VALUES (9, 4, 5, NULL);
INSERT INTO `program_group_course` VALUES (10, 5, NULL, NULL);
INSERT INTO `program_group_course` VALUES (11, 5, NULL, NULL);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_role1`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'CLIENT');
INSERT INTO `role` VALUES (2, 'USER');
INSERT INTO `role` VALUES (3, 'ADMIN');
INSERT INTO `role` VALUES (4, 'TEACHER');

-- ----------------------------
-- Table structure for teacher_course
-- ----------------------------
DROP TABLE IF EXISTS `teacher_course`;
CREATE TABLE `teacher_course`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NULL DEFAULT NULL,
  `course_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `IDX_ASDASD2`(`teacher_id`) USING BTREE,
  INDEX `IDX_AS23FSDWER`(`course_id`) USING BTREE,
  CONSTRAINT `FK_ASD3YNVFR` FOREIGN KEY (`teacher_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_GHHG435` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacher_course
-- ----------------------------
INSERT INTO `teacher_course` VALUES (1, 1, 1, '2021-04-21 21:07:00');
INSERT INTO `teacher_course` VALUES (2, 4, 2, '2021-04-27 18:35:16');
INSERT INTO `teacher_course` VALUES (3, 2, 3, '2021-04-27 18:35:20');
INSERT INTO `teacher_course` VALUES (4, 2, 4, '2021-04-27 18:37:08');
INSERT INTO `teacher_course` VALUES (5, 2, 5, '2021-04-27 18:37:11');
INSERT INTO `teacher_course` VALUES (6, 4, 6, '2021-04-27 18:41:14');
INSERT INTO `teacher_course` VALUES (7, 2, 2, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `temporary_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_id` int(3) NULL DEFAULT 1,
  `connected` tinyint(4) NULL DEFAULT NULL,
  `session` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `registration_date` datetime(0) NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bday` int(2) NULL DEFAULT NULL,
  `bmonth` int(2) NULL DEFAULT NULL,
  `byear` int(4) NULL DEFAULT NULL,
  `created` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `last_update_mysql` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  INDEX `idx_users`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'epa', 'epa2', 'juan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 1, 1, 'io73u0tvt265t1qgun6s9i1ogc', '2021-04-19 00:12:26', NULL, '123', NULL, NULL, NULL, '2021-03-17 19:03:32', '2021-03-17 19:03:32', '2021-04-19 12:43:38');
INSERT INTO `user` VALUES (2, 'Profesor1', 'profesor1', 'prof@gmail.com', '123', NULL, 1, 0, '-', '2021-04-27 18:24:28', '2021-04-27 18:24:31', '123', NULL, NULL, NULL, '2021-04-27 18:24:36', '2021-04-27 18:24:36', '2021-04-27 18:24:36');
INSERT INTO `user` VALUES (4, 'Profesor2', 'Profesor2', 'prof2@gmail.com', '123', NULL, 1, 0, '-', '2021-04-27 18:25:09', '2021-04-27 18:25:12', '123', NULL, NULL, NULL, '2021-04-27 18:25:21', '2021-04-27 18:25:21', '2021-04-27 18:25:21');
INSERT INTO `user` VALUES (5, 'Profesor3', 'Profesor3', 'prof3gmail.com', '123', NULL, 1, 0, '-', '2021-04-27 18:25:42', '2021-04-27 18:25:46', '23', NULL, NULL, NULL, '2021-04-27 18:25:49', '2021-04-27 18:25:49', '2021-04-27 18:25:49');

-- ----------------------------
-- Table structure for user_address_info
-- ----------------------------
DROP TABLE IF EXISTS `user_address_info`;
CREATE TABLE `user_address_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso_country` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `sin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'encriptado de sin user',
  `legal_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `recipientAddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `recipientCity_iso` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `recipientState_iso` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `recipientZip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `last_update_mysql` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `recipientCity_iso`(`recipientCity_iso`) USING BTREE,
  INDEX `recipientState_iso`(`recipientState_iso`) USING BTREE,
  CONSTRAINT `user_address_info_ibfk_1` FOREIGN KEY (`recipientCity_iso`) REFERENCES `cities` (`iso_city`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `user_address_info_ibfk_2` FOREIGN KEY (`recipientState_iso`) REFERENCES `states` (`iso_state`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `modified` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `last_update_mysql` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_user1`(`user_id`) USING BTREE,
  INDEX `id_role1`(`role_id`) USING BTREE,
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (2, 1, 4, '2021-04-17 14:34:26', '2021-04-17 14:34:26', '2021-04-26 20:33:43');
INSERT INTO `user_role` VALUES (3, 2, 4, '2021-04-27 18:24:43', '2021-04-27 18:24:43', '2021-04-27 18:24:43');
INSERT INTO `user_role` VALUES (4, 4, 3, '2021-04-27 18:26:00', '2021-04-27 18:26:00', '2021-04-27 18:26:00');
INSERT INTO `user_role` VALUES (7, 4, 4, '2021-04-27 18:26:09', '2021-04-27 18:26:09', '2021-04-27 18:26:09');

SET FOREIGN_KEY_CHECKS = 1;
