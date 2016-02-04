/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : lux

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-05-27 11:50:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `contact_info`
-- ----------------------------
DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` longtext,
  `email_1` longtext,
  `email_2` longtext,
  `phone_1` longtext,
  `phone_2` longtext,
  `phone_3` longtext,
  `administrator_email` longtext,
  `moderator_email` longtext,
  `feedback_restricted_ips` longtext,
  `map_image` longtext,
  `map_link` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact_info
-- ----------------------------
INSERT INTO `contact_info` VALUES ('1', '[LEFT]', '', null, '', '', null, 'darkoffalex@gmail.com', null, null, 'trkeN6tTtyHtRA3.jpg', 'https://www.google.ru/');
INSERT INTO `contact_info` VALUES ('2', '[RIGHT]', '', null, '', '', null, 'darkoffalex@gmail.com', null, null, 'G9nAQTNEtSaN5AK.jpg', 'https://www.google.ru/');

-- ----------------------------
-- Table structure for `contact_info_lng`
-- ----------------------------
DROP TABLE IF EXISTS `contact_info_lng`;
CREATE TABLE `contact_info_lng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `text` longtext,
  `small_text` longtext,
  `language` longtext,
  `feedback_subject` longtext,
  `feedback_message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact_info_lng
-- ----------------------------
INSERT INTO `contact_info_lng` VALUES ('1', '1', 'INLUX office', '<p>Central office in Moscow<br />\r\nLebedev Studio<br />\r\nStr. 1905, Building 7, page 1<br />\r\nMoscow, 123995<br />\r\nRussia<br />\r\n<br />\r\nEmail: arrington@gmail.com<br />\r\nPhone: +370 123 456789<br />\r\nMobile: +370 000 598533 <!-- p--></p>\r\n', 'en', 'Message form INLUX', null);
INSERT INTO `contact_info_lng` VALUES ('2', '1', 'Офис INLUX', '<p>Центральный офис в Москве<br />\r\nСтудия Артемия Лебедева<br />\r\nул. 1905 года, дом 7, стр. 1<br />\r\nМосква, 123995<br />\r\nРоссия<br />\r\n<br />\r\nEmail: arrington@gmail.com<br />\r\nPhone: +370 123 456789<br />\r\nMobile: +370 000 598533</p>\r\n', 'ru', 'Сообщение из INLUX', null);
INSERT INTO `contact_info_lng` VALUES ('3', '2', 'INLUX representative office', '<p>Central office in Moscow<br />\r\nLebedev Studio<br />\r\nStr. 1905, Building 7, page 1<br />\r\nMoscow, 123995<br />\r\nRussia<br />\r\n<br />\r\nEmail: arrington@gmail.com<br />\r\nPhone: +370 123 456789<br />\r\nMobile: +370 000 598533</p>\r\n', 'en', 'Message form INLUX', null);
INSERT INTO `contact_info_lng` VALUES ('4', '2', 'INLUX представительство', '<p>Центральный офис в Москве<br />\r\nСтудия Артемия Лебедева<br />\r\nул. 1905 года, дом 7, стр. 1<br />\r\nМосква, 123995<br />\r\nРоссия<br />\r\n<br />\r\nEmail: arrington@gmail.com<br />\r\nPhone: +370 123 456789<br />\r\nMobile: +370 000 598533</p>\r\n', 'ru', 'Сообщение из INLUX', null);

-- ----------------------------
-- Table structure for `content_unit`
-- ----------------------------
DROP TABLE IF EXISTS `content_unit`;
CREATE TABLE `content_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tree_id` int(11) DEFAULT NULL,
  `branch` longtext,
  `type` longtext,
  `price` int(11) DEFAULT NULL,
  `price_disscount` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `thumb` longtext,
  `label` longtext,
  `priority` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content_unit
-- ----------------------------
INSERT INTO `content_unit` VALUES ('1', '1', null, '5', null, null, null, null, 'packing_goods', '1', '1', '1396881541', '1396881541');
INSERT INTO `content_unit` VALUES ('2', '1', null, '5', null, null, null, null, 'tortor', '2', '1', '1396881673', '1396881673');
INSERT INTO `content_unit` VALUES ('3', '1', null, '5', null, null, null, null, 'maecenas_adipiscing_non', '3', '1', '1396881795', '1396881795');
INSERT INTO `content_unit` VALUES ('4', '2', null, '5', null, null, null, null, 'agribusiness_solutions', '1', '1', '1396881906', '1396881906');
INSERT INTO `content_unit` VALUES ('5', '2', null, '5', null, null, null, null, 'right_tortor', '2', '1', '1396881964', '1396881964');
INSERT INTO `content_unit` VALUES ('6', '2', null, '5', null, null, null, null, 'maecenas_adipiscing_non_right', '3', '1', '1396882022', '1396882022');
INSERT INTO `content_unit` VALUES ('7', '3', null, '5', null, null, null, null, 'tortor_1', '1', '1', '1396948849', '1396950560');
INSERT INTO `content_unit` VALUES ('8', '3', null, '5', null, null, null, null, 'tortor_2', '2', '1', '1396948890', '1396950576');
INSERT INTO `content_unit` VALUES ('9', '4', null, '5', null, null, null, null, 'right_tortor_1', '1', '1', '1396949642', '1396953042');
INSERT INTO `content_unit` VALUES ('10', '4', null, '5', null, null, null, null, 'right_tortor_2', '2', '1', '1396949695', '1396949695');
INSERT INTO `content_unit` VALUES ('11', '5', null, '5', null, null, null, null, 'about_tor_tor_1', '1', '1', '1396953566', '1396953566');
INSERT INTO `content_unit` VALUES ('12', '5', null, '5', null, null, null, null, 'about_tor_tor_2', '2', '1', '1396955279', '1396955279');
INSERT INTO `content_unit` VALUES ('13', '6', null, '5', null, null, null, null, 'about_tor_tor_3', '1', '1', '1396955341', '1396955341');
INSERT INTO `content_unit` VALUES ('14', '6', null, '5', null, null, null, null, 'about_tor_tor_4', '2', '1', '1396955422', '1396955422');

-- ----------------------------
-- Table structure for `content_unit_lng`
-- ----------------------------
DROP TABLE IF EXISTS `content_unit_lng`;
CREATE TABLE `content_unit_lng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `language` longtext,
  `description` longtext,
  `text` longtext,
  `additional_text` longtext,
  `title` longtext,
  `thumb` longtext,
  `settings_json` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of content_unit_lng
-- ----------------------------
INSERT INTO `content_unit_lng` VALUES ('1', '1', 'en', null, '<p>Praesent hendrerit tincidunt magna, eget adipiscing tellus dictum in</p>\r\n', null, 'Packing of goods', null, null);
INSERT INTO `content_unit_lng` VALUES ('2', '1', 'ru', null, '<p>Praesent hendrerit tincidunt magna, eget adipiscing tellus dictum in</p>\r\n', null, 'Упаковка товаров', null, null);
INSERT INTO `content_unit_lng` VALUES ('3', '2', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.&nbsp;</p>\r\n\r\n<p>Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('4', '2', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.&nbsp;</p>\r\n\r\n<p>Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('5', '3', 'en', null, '<p>Nunc justo sapien, dignissim sit amet posuere eu, pellentesque in velit. Etiam imperdiet erat nibh, eu vehicula nisl adipiscing auctor. Pellentesque rutrum porttitor est, a dapibus ante hendrerit vitae.</p>\r\n', null, 'Maecenas adipiscing non', null, null);
INSERT INTO `content_unit_lng` VALUES ('6', '3', 'ru', null, '<p>Nunc justo sapien, dignissim sit amet posuere eu, pellentesque in velit. Etiam imperdiet erat nibh, eu vehicula nisl adipiscing auctor. Pellentesque rutrum porttitor est, a dapibus ante hendrerit vitae.</p>\r\n', null, 'Maecenas adipiscing non', null, null);
INSERT INTO `content_unit_lng` VALUES ('7', '4', 'en', null, '<p>Pellentesque magna enim, feugiat sit amet accumsan nec, consectetur in mauris</p>\r\n', null, 'Agribusiness solutions', null, null);
INSERT INTO `content_unit_lng` VALUES ('8', '4', 'ru', null, '<p>Pellentesque magna enim, feugiat sit amet accumsan nec, consectetur in mauris</p>\r\n', null, 'Агробизнес', null, null);
INSERT INTO `content_unit_lng` VALUES ('9', '5', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.&nbsp;</p>\r\n\r\n<p>Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('10', '5', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.&nbsp;</p>\r\n\r\n<p>Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('11', '6', 'en', null, '<p>Nunc justo sapien, dignissim sit amet posuere eu, pellentesque in velit. Etiam imperdiet erat nibh, eu vehicula nisl adipiscing auctor. Pellentesque rutrum porttitor est, a dapibus ante hendrerit vitae.</p>\r\n', null, 'Maecenas adipiscing non', null, null);
INSERT INTO `content_unit_lng` VALUES ('12', '6', 'ru', null, '<p>Nunc justo sapien, dignissim sit amet posuere eu, pellentesque in velit. Etiam imperdiet erat nibh, eu vehicula nisl adipiscing auctor. Pellentesque rutrum porttitor est, a dapibus ante hendrerit vitae.</p>\r\n', null, 'Maecenas adipiscing non', null, null);
INSERT INTO `content_unit_lng` VALUES ('13', '7', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img1.jpg\" style=\"width: 448px; height: 138px;\" /></p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortorz', null, null);
INSERT INTO `content_unit_lng` VALUES ('14', '7', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img1.jpg\" style=\"width: 448px; height: 138px;\" />​</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('15', '8', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img3.jpg\" style=\"width: 448px; height: 138px;\" /></p>\r\n', null, 'Quisque augue tortorzz', null, null);
INSERT INTO `content_unit_lng` VALUES ('16', '8', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img3.jpg\" style=\"width: 448px; height: 138px;\" />​</p>\r\n', null, 'Quisque augue tortorzz', null, null);
INSERT INTO `content_unit_lng` VALUES ('17', '9', 'en', null, '<p>Quisque augue tortor, vestibulum et metus eu, blandit pharetra sem. Cras in justo nec nunc pellentesque vehicula. Suspendisse potenti.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img2.jpg\" style=\"width: 448px; height: 138px;\" /></p>\r\n\r\n<p>Aenean ultrices gravida mauris, id fringilla erat dictum et. In hac habitasse platea dictumst. Praesent eu fermentum diam. Nam faucibus aliquam ante, sed sollicitudin quam.<br />\r\n<br />\r\n<span style=\"line-height: 1.6em;\">Donec auctor neque at enim volutpat lobortis. Nulla facilisi. Pellentesque vulputate leo a sodales consequat. Quisque luctus dolor nisl, at commodo orci accumsan eget.</span></p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('18', '9', 'ru', null, '<p>Quisque augue tortor, vestibulum et metus eu, blandit pharetra sem. Cras in justo nec nunc pellentesque vehicula. Suspendisse potenti.</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/services_img2.jpg\" style=\"width: 448px; height: 138px;\" /></p>\r\n\r\n<p>Aenean ultrices gravida mauris, id fringilla erat dictum et. In hac habitasse platea dictumst. Praesent eu fermentum diam. Nam faucibus aliquam ante, sed sollicitudin quam.<br />\r\n<br />\r\n<span style=\"line-height: 1.6em;\">Donec auctor neque at enim volutpat lobortis. Nulla facilisi. Pellentesque vulputate leo a sodales consequat. Quisque luctus dolor nisl, at commodo orci accumsan eget.</span></p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('19', '10', 'en', null, '<p>Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo.&nbsp;</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis.&nbsp;</p>\r\n\r\n<p>Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.</p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('20', '10', 'ru', null, '<p>Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo.&nbsp;</p>\r\n\r\n<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis.&nbsp;</p>\r\n\r\n<p>Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc.</p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('21', '11', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('22', '11', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla.&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus. Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo. Mauris et dui sit amet purus convallis hendrerit.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('23', '12', 'en', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('24', '12', 'ru', null, '<p>Nulla suscipit, diam vitae interdum aliquet, massa risus luctus sem, vitae commodo risus nisi nec nisl. Morbi volutpat ullamcorper adipiscing. Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim.</p>\r\n', null, 'Quisque augue tortor', null, null);
INSERT INTO `content_unit_lng` VALUES ('25', '13', 'en', null, '<p>Quisque augue tortor, vestibulum et metus eu, blandit pharetra sem. Cras in justo nec nunc pellentesque vehicula. Suspendisse potenti. Aenean ultrices gravida mauris, id fringilla erat dictum et. In hac habitasse platea dictumst. Praesent eu fermentum diam. Nam faucibus aliquam ante, sed sollicitudin quam.&nbsp;</p>\r\n\r\n<p>Donec auctor neque at enim volutpat lobortis. Nulla facilisi. Pellentesque vulputate leo a sodales consequat. Quisque luctus dolor nisl, at commodo orci accumsan eget.</p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('26', '13', 'ru', null, '<p>Quisque augue tortor, vestibulum et metus eu, blandit pharetra sem. Cras in justo nec nunc pellentesque vehicula. Suspendisse potenti. Aenean ultrices gravida mauris, id fringilla erat dictum et. In hac habitasse platea dictumst. Praesent eu fermentum diam. Nam faucibus aliquam ante, sed sollicitudin quam.&nbsp;</p>\r\n\r\n<p>Donec auctor neque at enim volutpat lobortis. Nulla facilisi. Pellentesque vulputate leo a sodales consequat. Quisque luctus dolor nisl, at commodo orci accumsan eget.</p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('27', '14', 'en', null, '<p>Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus.&nbsp;</p>\r\n\r\n<p>Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo.</p>\r\n', null, 'Vestibulum et metus', null, null);
INSERT INTO `content_unit_lng` VALUES ('28', '14', 'ru', null, '<p>Mauris nec sapien vel lorem ultrices accumsan sed nec nulla. Suspendisse vehicula eget diam non venenatis. Pellentesque lacinia erat mauris. Integer pellentesque faucibus dignissim. Curabitur ut posuere risus.&nbsp;</p>\r\n\r\n<p>Nulla sed neque ac magna vestibulum mattis eget ut nunc. Fusce iaculis sed ligula id consectetur. Vestibulum sollicitudin et justo nec commodo.</p>\r\n', null, 'Vestibulum et metus', null, null);

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` longtext,
  `parent_id` int(11) DEFAULT NULL,
  `parent_type` int(11) DEFAULT NULL,
  `thumbnail` longtext,
  `image` longtext,
  `priority` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for `images_lng`
-- ----------------------------
DROP TABLE IF EXISTS `images_lng`;
CREATE TABLE `images_lng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `language` longtext,
  `name` longtext,
  `text` longtext,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images_lng
-- ----------------------------

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` longtext,
  `original_language_name` longtext,
  `english_language_name` longtext,
  `russian_language_name` longtext,
  `notification` longtext,
  `prefix` longtext,
  `priority` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'english', 'English', 'English', 'Английский', 'EN', 'en', '1', '1');
INSERT INTO `languages` VALUES ('2', 'russian', 'Русский', 'Rusian', 'Русский', 'RU', 'ru', '2', '1');
INSERT INTO `languages` VALUES ('3', 'german', 'Deutsch', 'German', 'Немецкий', 'DE', 'de', '3', '0');

-- ----------------------------
-- Table structure for `seo`
-- ----------------------------
DROP TABLE IF EXISTS `seo`;
CREATE TABLE `seo` (
  `site_title` longtext,
  `site_keywords` longtext,
  `site_description` longtext,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seo
-- ----------------------------
INSERT INTO `seo` VALUES ('{\"en\":\"Inlux\",\"ru\":\"\\u0418\\u043d\\u043b\\u044e\\u043a\\u0441\"}', '{\"en\":\"service, Europe, inlux\",\"ru\":\"service, Europe, inlux\"}', '{\"en\":\"Service Europe\",\"ru\":\"\\u0421\\u0435\\u0440\\u0432\\u0438\\u0441 \\u0432 \\u0415\\u0432\\u0440\\u043e\\u043f\\u0435\"}', '1', 'ACTIVE');

-- ----------------------------
-- Table structure for `translation`
-- ----------------------------
DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `label` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translation
-- ----------------------------
INSERT INTO `translation` VALUES ('1', '1', 'Home');
INSERT INTO `translation` VALUES ('2', '1', 'Services');
INSERT INTO `translation` VALUES ('3', '1', 'About');
INSERT INTO `translation` VALUES ('4', '1', 'Contacts');
INSERT INTO `translation` VALUES ('5', '1', 'Feedback');
INSERT INTO `translation` VALUES ('6', '1', 'Send');
INSERT INTO `translation` VALUES ('7', '1', 'Enter symbols ');
INSERT INTO `translation` VALUES ('8', '1', 'in the picture');
INSERT INTO `translation` VALUES ('9', '1', 'error');

-- ----------------------------
-- Table structure for `translation_lng`
-- ----------------------------
DROP TABLE IF EXISTS `translation_lng`;
CREATE TABLE `translation_lng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `word` longtext,
  `language` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of translation_lng
-- ----------------------------
INSERT INTO `translation_lng` VALUES ('1', '1', 'Home', 'en');
INSERT INTO `translation_lng` VALUES ('2', '1', 'Главная', 'ru');
INSERT INTO `translation_lng` VALUES ('3', '2', 'Services', 'en');
INSERT INTO `translation_lng` VALUES ('4', '2', 'Услуги', 'ru');
INSERT INTO `translation_lng` VALUES ('5', '3', 'About', 'en');
INSERT INTO `translation_lng` VALUES ('6', '3', 'О нас', 'ru');
INSERT INTO `translation_lng` VALUES ('7', '4', 'Contacts', 'en');
INSERT INTO `translation_lng` VALUES ('8', '4', 'Контакты', 'ru');
INSERT INTO `translation_lng` VALUES ('9', '5', 'Feedback', 'en');
INSERT INTO `translation_lng` VALUES ('10', '5', 'Обратная связь', 'ru');
INSERT INTO `translation_lng` VALUES ('11', '6', 'Send', 'en');
INSERT INTO `translation_lng` VALUES ('12', '6', 'Отправить', 'ru');
INSERT INTO `translation_lng` VALUES ('13', '7', 'Enter symbols ', 'en');
INSERT INTO `translation_lng` VALUES ('14', '7', 'Введите символы', 'ru');
INSERT INTO `translation_lng` VALUES ('15', '8', 'in the picture', 'en');
INSERT INTO `translation_lng` VALUES ('16', '8', 'на картинке', 'ru');
INSERT INTO `translation_lng` VALUES ('17', '9', 'Error: Something gone wrong', 'en');
INSERT INTO `translation_lng` VALUES ('18', '9', 'Ошибка: Не все поля заполнены верно', 'ru');

-- ----------------------------
-- Table structure for `tree`
-- ----------------------------
DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `branch` longtext,
  `label` longtext,
  `type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `access` longtext,
  `user_id` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_changed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tree
-- ----------------------------
INSERT INTO `tree` VALUES ('1', null, null, 'title_left', '95', '1', '1', null, null, '1396880225', '1396945510');
INSERT INTO `tree` VALUES ('2', null, null, 'title_right', '85', '1', '2', null, null, '1396881180', '1396945532');
INSERT INTO `tree` VALUES ('3', null, null, 'services_left', '53', '1', '3', null, null, '1396948686', '1396948749');
INSERT INTO `tree` VALUES ('4', null, null, 'services_right', '43', '1', '4', null, null, '1396948725', '1396948725');
INSERT INTO `tree` VALUES ('5', null, null, 'about_left', '23', '1', '5', null, null, '1396953317', '1396956105');
INSERT INTO `tree` VALUES ('6', null, null, 'about_right', '34', '1', '6', null, null, '1396953383', '1396956116');

-- ----------------------------
-- Table structure for `tree_lng`
-- ----------------------------
DROP TABLE IF EXISTS `tree_lng`;
CREATE TABLE `tree_lng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `language` longtext,
  `name` longtext,
  `description` longtext,
  `text` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tree_lng
-- ----------------------------
INSERT INTO `tree_lng` VALUES ('1', '1', 'en', 'Title part (left)', null, null);
INSERT INTO `tree_lng` VALUES ('2', '1', 'ru', 'Титульная часть (слева)', null, null);
INSERT INTO `tree_lng` VALUES ('3', '2', 'en', 'Title part (left)', null, null);
INSERT INTO `tree_lng` VALUES ('4', '2', 'ru', 'Титульная часть (справа)', null, null);
INSERT INTO `tree_lng` VALUES ('5', '3', 'en', 'Services(left)', null, null);
INSERT INTO `tree_lng` VALUES ('6', '3', 'ru', 'Услуги(левый)', null, null);
INSERT INTO `tree_lng` VALUES ('7', '4', 'en', 'Services(right)', null, null);
INSERT INTO `tree_lng` VALUES ('8', '4', 'ru', 'Услуги(справа)', null, null);
INSERT INTO `tree_lng` VALUES ('9', '5', 'en', 'About(left)', null, null);
INSERT INTO `tree_lng` VALUES ('10', '5', 'ru', 'О нас(слева)', null, null);
INSERT INTO `tree_lng` VALUES ('11', '6', 'en', 'About(right)', null, null);
INSERT INTO `tree_lng` VALUES ('12', '6', 'ru', 'О нас(справа)', null, null);
