/*
 Navicat Premium Data Transfer

 Source Server         : php
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost:3306
 Source Schema         : 1808

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : 65001

 Date: 14/09/2020 16:32:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_buy
-- ----------------------------
DROP TABLE IF EXISTS `tp_buy`;
CREATE TABLE `tp_buy`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `color_id` int(11) NULL DEFAULT NULL COMMENT '颜色id',
  `edition_id` int(11) NULL DEFAULT NULL COMMENT '版本id',
  `price` int(10) NULL DEFAULT NULL COMMENT '价格',
  `buy_time` datetime(0) NULL DEFAULT NULL COMMENT '购买时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of tp_buy
-- ----------------------------
INSERT INTO `tp_buy` VALUES (1, 1, 4, 2, 2499, '2020-09-14 16:20:02');
INSERT INTO `tp_buy` VALUES (2, 1, 4, 2, 2499, '2020-09-14 16:22:19');
INSERT INTO `tp_buy` VALUES (3, 1, 4, 2, 2499, '2020-09-14 16:23:19');
INSERT INTO `tp_buy` VALUES (4, 1, 4, 2, 2499, '2020-09-14 16:23:42');
INSERT INTO `tp_buy` VALUES (5, 1, 4, 2, 2499, '2020-09-14 16:24:14');
INSERT INTO `tp_buy` VALUES (6, 1, 4, 2, 2499, '2020-09-14 16:24:29');
INSERT INTO `tp_buy` VALUES (7, 1, 4, 2, 2499, '2020-09-14 16:24:51');
INSERT INTO `tp_buy` VALUES (8, 1, 4, 2, 2499, '2020-09-14 16:26:40');

SET FOREIGN_KEY_CHECKS = 1;
