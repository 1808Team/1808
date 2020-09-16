/*
 Navicat Premium Data Transfer

 Source Server         : 1808
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : 1808

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 16/09/2020 16:44:01
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
-- Table structure for tp_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods_type`;
CREATE TABLE `tp_goods_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '类型名称',
  `types_id` int(11) NULL DEFAULT NULL COMMENT '总类型id',
  `state` int(1) NULL DEFAULT NULL COMMENT '状态(1.代表正常使用  2.代表此类型商品全部下架)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_goods_type
-- ----------------------------
INSERT INTO `tp_goods_type` VALUES (1, '小米手机', 11, 1);
INSERT INTO `tp_goods_type` VALUES (2, '红米手机', 11, 1);
INSERT INTO `tp_goods_type` VALUES (3, '平板', 14, 1);
INSERT INTO `tp_goods_type` VALUES (4, 'ipad', 13, 1);

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
  `type_id` int(11) NULL DEFAULT NULL COMMENT '商品类型',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tp_shopcat
-- ----------------------------
INSERT INTO `tp_shopcat` VALUES (1, '小米MIX', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 1499, 1);
INSERT INTO `tp_shopcat` VALUES (2, '红米MIX', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 5999, 2);
INSERT INTO `tp_shopcat` VALUES (3, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 1);
INSERT INTO `tp_shopcat` VALUES (4, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 1);
INSERT INTO `tp_shopcat` VALUES (5, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 2);
INSERT INTO `tp_shopcat` VALUES (6, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 2);
INSERT INTO `tp_shopcat` VALUES (7, '小米MIX', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 1);
INSERT INTO `tp_shopcat` VALUES (8, '平板', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 7999, 3);
INSERT INTO `tp_shopcat` VALUES (9, 'ipad', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 6999, 4);
INSERT INTO `tp_shopcat` VALUES (10, '小米3', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 5666, 1);
INSERT INTO `tp_shopcat` VALUES (11, '小米2', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 3999, 2);
INSERT INTO `tp_shopcat` VALUES (12, '小米4', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 2999, 1);
INSERT INTO `tp_shopcat` VALUES (13, '小米5', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 4999, 1);
INSERT INTO `tp_shopcat` VALUES (14, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 2999, 2);
INSERT INTO `tp_shopcat` VALUES (15, '小米7', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 1999, 1);

-- ----------------------------
-- Table structure for tp_total_type
-- ----------------------------
DROP TABLE IF EXISTS `tp_total_type`;
CREATE TABLE `tp_total_type`  (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '总类型id',
  `type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '总类型名称',
  `state` int(1) NULL DEFAULT NULL COMMENT '总类型状态(1.代表正常使用 2.代表此总类型物品全部禁用)',
  `types` int(1) NULL DEFAULT NULL COMMENT '总类型类别(0.代表总类)',
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_total_type
-- ----------------------------
INSERT INTO `tp_total_type` VALUES (1, '移动物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (2, '电脑物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (3, '影视物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (4, '配件物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (5, '电器物品 ', 1, 0);
INSERT INTO `tp_total_type` VALUES (6, '音响物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (7, '屏幕物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (8, '生活用品', 1, 0);
INSERT INTO `tp_total_type` VALUES (9, '配饰物品', 1, 0);
INSERT INTO `tp_total_type` VALUES (10, '其他', 1, 0);
INSERT INTO `tp_total_type` VALUES (11, '手机', 1, 1);
INSERT INTO `tp_total_type` VALUES (12, '电话卡', 1, 1);
INSERT INTO `tp_total_type` VALUES (13, '笔记本', 1, 2);
INSERT INTO `tp_total_type` VALUES (14, '平板', 1, 2);
INSERT INTO `tp_total_type` VALUES (15, '电视', 1, 3);
INSERT INTO `tp_total_type` VALUES (16, '盒子', 1, 3);
INSERT INTO `tp_total_type` VALUES (17, '路由器', 1, 4);
INSERT INTO `tp_total_type` VALUES (18, '智能硬件', 1, 4);
INSERT INTO `tp_total_type` VALUES (19, '电池', 1, 5);
INSERT INTO `tp_total_type` VALUES (20, '插板', 1, 5);
INSERT INTO `tp_total_type` VALUES (21, '移动电源', 1, 5);
INSERT INTO `tp_total_type` VALUES (22, '耳机', 1, 6);
INSERT INTO `tp_total_type` VALUES (23, '音响', 1, 6);
INSERT INTO `tp_total_type` VALUES (24, '音箱', 1, 6);
INSERT INTO `tp_total_type` VALUES (25, '钢化膜', 1, 7);
INSERT INTO `tp_total_type` VALUES (26, '贴膜', 1, 7);
INSERT INTO `tp_total_type` VALUES (27, '支架', 1, 8);
INSERT INTO `tp_total_type` VALUES (28, '存储卡', 1, 8);
INSERT INTO `tp_total_type` VALUES (29, '线材', 1, 8);
INSERT INTO `tp_total_type` VALUES (30, '衣服', 1, 9);
INSERT INTO `tp_total_type` VALUES (31, '鞋', 1, 9);
INSERT INTO `tp_total_type` VALUES (32, '眼镜', 1, 9);
INSERT INTO `tp_total_type` VALUES (33, '皮包', 1, 9);
INSERT INTO `tp_total_type` VALUES (34, '米兔', 1, 10);
INSERT INTO `tp_total_type` VALUES (35, '周边商城', 1, 10);

-- ----------------------------
-- Table structure for tp_types
-- ----------------------------
DROP TABLE IF EXISTS `tp_types`;
CREATE TABLE `tp_types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `types_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '总类型名称',
  `state` int(1) NULL DEFAULT NULL COMMENT '状态(1.代表正常使用  2.代表此总类型商品全部下架)',
  `types` int(1) NULL DEFAULT NULL COMMENT '类型(0代表总类型,1代表副类型)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tp_types
-- ----------------------------
INSERT INTO `tp_types` VALUES (1, '手机', 1, NULL);
INSERT INTO `tp_types` VALUES (2, '电话卡', 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
