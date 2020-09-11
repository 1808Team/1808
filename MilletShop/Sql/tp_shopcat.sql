/*
 Navicat Premium Data Transfer

 Source Server         : shop
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : milletdata

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 11/09/2020 14:35:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_shopcat
-- ----------------------------
DROP TABLE IF EXISTS `tp_shopcat`;
CREATE TABLE `tp_shopcat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品名',
  `price` float(10, 2) NULL DEFAULT NULL COMMENT '单价',
  `number` char(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '数量',
  `pid` int(8) NULL DEFAULT NULL COMMENT '所属人',
  `shopimg` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片',
  `state` int(2) NULL DEFAULT NULL COMMENT '状态:0未支付 1支付成功',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_shopcat
-- ----------------------------
INSERT INTO `tp_shopcat` VALUES (1, '小米64G+8G黑色', 2499.00, '1', 1, NULL, 0);
INSERT INTO `tp_shopcat` VALUES (2, '苹果100Plus999G+120G+黑色', 333333.00, '1', 1, NULL, 0);

SET FOREIGN_KEY_CHECKS = 1;
