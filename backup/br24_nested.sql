/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : br24_nested

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-01 19:12:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tree
-- ----------------------------
DROP TABLE IF EXISTS `tree`;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `left` int(11) DEFAULT NULL,
  `right` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tree
-- ----------------------------
INSERT INTO `tree` VALUES ('1', 'Root', '1', '26');
INSERT INTO `tree` VALUES ('2', 'A', '2', '9');
INSERT INTO `tree` VALUES ('3', 'A.1', '3', '4');
INSERT INTO `tree` VALUES ('4', 'A.2', '5', '6');
INSERT INTO `tree` VALUES ('5', 'A.3', '7', '8');
INSERT INTO `tree` VALUES ('6', 'B', '10', '25');
INSERT INTO `tree` VALUES ('7', 'B.1', '11', '16');
INSERT INTO `tree` VALUES ('8', 'B.1.1', '14', '15');
INSERT INTO `tree` VALUES ('9', 'B.2', '17', '20');
INSERT INTO `tree` VALUES ('10', 'B.3', '21', '24');
INSERT INTO `tree` VALUES ('11', 'B.1.2', '12', '13');
INSERT INTO `tree` VALUES ('12', 'B.2.1', '18', '19');
INSERT INTO `tree` VALUES ('13', 'B.3.1', '22', '23');
