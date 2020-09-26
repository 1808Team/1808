/*
Navicat MySQL Data Transfer

Source Server         : 我的
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : 1808xiaomi

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-09-26 09:58:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_dizhi
-- ----------------------------
DROP TABLE IF EXISTS `tp_dizhi`;
CREATE TABLE `tp_dizhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quyu` varchar(255) DEFAULT NULL COMMENT '区域',
  `name` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `phone` varchar(255) DEFAULT NULL COMMENT '收货人联系方式',
  `address` varchar(255) DEFAULT NULL COMMENT '详细地址',
  `tinyint` int(1) DEFAULT NULL COMMENT '是否默认地址 1:是 0否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_dizhi
-- ----------------------------
INSERT INTO `tp_dizhi` VALUES ('6', '安徽池州东至县', '12213', '15886556073', '122121', '0');
