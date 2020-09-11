/*
 Navicat Premium Data Transfer

 Source Server         : ling
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : milletdata

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 11/09/2020 19:35:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_goods
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '购买人',
  `pid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `configure_id` int(11) NULL DEFAULT NULL COMMENT '配置id',
  `color_id` int(11) NULL DEFAULT NULL COMMENT '颜色id',
  `purchase_time` datetime(0) NULL DEFAULT NULL COMMENT '加入购物车的时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tp_goods
-- ----------------------------
INSERT INTO `tp_goods` VALUES (7, 'admin', 1, 2, 5, '2020-09-11 19:34:29');

SET FOREIGN_KEY_CHECKS = 1;
