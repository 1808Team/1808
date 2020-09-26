/*
Navicat MySQL Data Transfer

Source Server         : 我的
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sc

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-09-25 15:38:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shopping
-- ----------------------------
DROP TABLE IF EXISTS `shopping`;
CREATE TABLE `shopping` (
  `shoppingid` varchar(64) NOT NULL,
  `userid` varchar(64) DEFAULT NULL COMMENT '用户表id',
  `orderid` varchar(64) DEFAULT NULL COMMENT '订单id',
  `receivername` varchar(20) DEFAULT NULL COMMENT '收货姓名',
  `receiverphone` varchar(20) DEFAULT NULL COMMENT '收货固定电话',
  `receivermobile` varchar(20) DEFAULT NULL COMMENT '收货移动电话',
  `receiverprovince` varchar(20) DEFAULT NULL COMMENT '省份',
  `receivercity` varchar(20) DEFAULT NULL COMMENT '城市',
  `receiverdistrict` varchar(20) DEFAULT NULL COMMENT '区/县',
  `receiveraddress` varchar(200) DEFAULT NULL COMMENT '详细地址',
  `createtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`shoppingid`),
  KEY `FK_Reference_10` (`orderid`),
  KEY `FK_Reference_4` (`userid`),
  CONSTRAINT `FK_Reference_10` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  CONSTRAINT `FK_Reference_4` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping
-- ----------------------------
