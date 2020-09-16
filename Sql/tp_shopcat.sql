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

 Date: 16/09/2020 16:39:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

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
INSERT INTO `tp_shopcat` VALUES (10, '小米6', '变焦双摄，4 轴防抖 / 骁龙835 旗舰处理器，6GB 大内存，最大可选128GB 闪存 / 5.15\" 护眼屏 / 四曲面玻璃/陶瓷机身', '/static/image/pinpai1.png', '9月5日-21日享花呗12期分期免息', 5666, 1);

SET FOREIGN_KEY_CHECKS = 1;
