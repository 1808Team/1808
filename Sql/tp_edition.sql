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

 Date: 11/09/2020 19:35:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_edition
-- ----------------------------
DROP TABLE IF EXISTS `tp_edition`;
CREATE TABLE `tp_edition`  (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `configure` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配置',
  `money` int(11) NULL DEFAULT NULL COMMENT '价格',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tp_edition
-- ----------------------------
INSERT INTO `tp_edition` VALUES (1, 1, '全网通版 8GB+128GB', 3499);
INSERT INTO `tp_edition` VALUES (2, 1, '全网通版 6GB+64GB', 2499);
INSERT INTO `tp_edition` VALUES (3, 1, '全网通版 4GB+32GB', 1499);

SET FOREIGN_KEY_CHECKS = 1;
