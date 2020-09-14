/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : 1808

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 14/09/2020 11:07:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '账号',
  `password` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `phone` bigint(12) NULL DEFAULT NULL COMMENT '手机号',
  `personal_signature` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '个性签名',
  `my_hobbies` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '我的爱好',
  `shipping_address` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '收货地址',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES (8, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 17773574923, NULL, NULL, NULL);
INSERT INTO `tp_admin` VALUES (9, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 17773574921, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tp_color
-- ----------------------------
DROP TABLE IF EXISTS `tp_color`;
CREATE TABLE `tp_color`  (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `pid` int(11) NULL DEFAULT NULL COMMENT '配置id',
  `img` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图片',
  `font` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '颜色(字)',
  `color` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '颜色(代码颜色)',
  `kucun` int(11) NULL DEFAULT NULL COMMENT '库存',
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

-- ----------------------------
-- Table structure for tp_goods
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '购买人',
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

-- ----------------------------
-- Table structure for tp_shopcat
-- ----------------------------
DROP TABLE IF EXISTS `tp_shopcat`;
CREATE TABLE `tp_shopcat`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品名称',
  `content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品内容',
  `img` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品图片',
  `synopsis` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品简介',
  `price` int(10) NULL DEFAULT NULL COMMENT '商品起价',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tp_shopcat
-- ----------------------------
INSERT INTO `tp_shopcat` VALUES (1, '小米MIX', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 1499);

SET FOREIGN_KEY_CHECKS = 1;
