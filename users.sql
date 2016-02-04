/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : users

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-05-27 11:51:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users_yii`
-- ----------------------------
DROP TABLE IF EXISTS `users_yii`;
CREATE TABLE `users_yii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` longtext,
  `password` longtext,
  `name` longtext,
  `role` longtext,
  `email` longtext,
  `user_id` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_yii
-- ----------------------------
INSERT INTO `users_yii` VALUES ('1', 'admin', '1234', '', 'admin', 'test@email.test', 'GhkRKtYYhYH7');
INSERT INTO `users_yii` VALUES ('2', 'user', '1234', '', 'user', 'user@test.ts', 'T3s8EQss7DzY');
