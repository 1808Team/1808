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

 Date: 11/09/2020 19:35:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_color
-- ----------------------------
DROP TABLE IF EXISTS `tp_color`;
CREATE TABLE `tp_color`  (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `pid` int(11) NULL DEFAULT NULL COMMENT '配置id',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片',
  `font` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '颜色(字)',
  `color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '颜色(代码颜色)',
  `kucun` int(255) NULL DEFAULT NULL COMMENT '库存',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tp_color
-- ----------------------------
INSERT INTO `tp_color` VALUES (1, 1, 1, '/static/image/pinpai1.png', '亮黑色', '#000', 10);
INSERT INTO `tp_color` VALUES (2, 1, 1, '/static/image/liebiao_hongmin4x.jpg', '暗金色', '#ffcc66', 10);
INSERT INTO `tp_color` VALUES (3, 1, 1, '/static/image/liebiao_xiaomi5c.jpg', '粉红色', 'pink', 10);
INSERT INTO `tp_color` VALUES (4, 1, 2, '/static/image/pinpai1.png', '亮黑色', '#000', 10);
INSERT INTO `tp_color` VALUES (5, 1, 2, '/static/image/liebiao_xiaomi5c.jpg', '粉红色', 'pink', 10);
INSERT INTO `tp_color` VALUES (6, 1, 3, '/static/image/pinpai1.png', '亮黑色', '#000', 10);

SET FOREIGN_KEY_CHECKS = 1;
