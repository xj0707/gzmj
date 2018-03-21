/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : db_dealers

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-02-20 22:38:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_bills`
-- ----------------------------
DROP TABLE IF EXISTS `t_bills`;
CREATE TABLE `t_bills` (
  `orderid` bigint(20) NOT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `target` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_bills
-- ----------------------------

-- ----------------------------
-- Table structure for `t_buy_goods_log`
-- ----------------------------
DROP TABLE IF EXISTS `t_buy_goods_log`;
CREATE TABLE `t_buy_goods_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(11) DEFAULT NULL,
  `goods_type` int(11) DEFAULT NULL,
  `goods_num` int(11) DEFAULT NULL,
  `goods_price` int(11) DEFAULT NULL,
  `price_type` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_buy_goods_log
-- ----------------------------

-- ----------------------------
-- Table structure for `t_charge_log`
-- ----------------------------
DROP TABLE IF EXISTS `t_charge_log`;
CREATE TABLE `t_charge_log` (
  `orderid` varchar(20) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `account` char(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_charge_log
-- ----------------------------

-- ----------------------------
-- Table structure for `t_dealers`
-- ----------------------------
DROP TABLE IF EXISTS `t_dealers`;
CREATE TABLE `t_dealers` (
  `account` char(11) NOT NULL COMMENT 'phone number of this admin',
  `password` varchar(41) NOT NULL COMMENT 'password of this admin',
  `name` varchar(255) DEFAULT NULL,
  `create_time` bigint(11) NOT NULL COMMENT 'when this account created',
  `gems` int(11) DEFAULT '0' COMMENT '房卡',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  `parent` char(11) DEFAULT NULL COMMENT '上级',
  `token` char(32) DEFAULT NULL COMMENT 'the token of this admin',
  `last_login_time` int(11) DEFAULT NULL COMMENT 'last_login_time',
  `privilege_level` int(11) NOT NULL COMMENT 'privilige level of this admin.  999 super 0 normal',
  `all_gems` int(11) DEFAULT '0' COMMENT '累计获得房卡',
  `all_score` int(11) DEFAULT '0' COMMENT '累计获得积分',
  `all_subs` int(11) DEFAULT '0' COMMENT '累计新增用户',
  `state` int(11) DEFAULT '0' COMMENT '0正常1冻结',
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='代理系统数据库';

-- ----------------------------
-- Records of t_dealers
-- ----------------------------
INSERT INTO `t_dealers` VALUES ('123456', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'admin', '0', '999999999', '0', null, 'f9b29e10954384e2160ef42006f56a50', '0', '999', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `t_dealers_goods`
-- ----------------------------
DROP TABLE IF EXISTS `t_dealers_goods`;
CREATE TABLE `t_dealers_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(45) NOT NULL,
  `goods_type` int(11) NOT NULL COMMENT '1：  房卡 2： 积分',
  `goods_num` int(11) NOT NULL COMMENT '数量',
  `goods_price` int(11) NOT NULL COMMENT '单价',
  `price_type` int(11) NOT NULL COMMENT ' 1:积分 2：房卡： 3 RMB ',
  `state` int(11) NOT NULL COMMENT '0，关闭 1，启用',
  `act_time` bigint(20) NOT NULL COMMENT '启用时间',
  `end_time` bigint(20) DEFAULT NULL COMMENT '结束失效时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_dealers_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `t_dealers_kpi`
-- ----------------------------
DROP TABLE IF EXISTS `t_dealers_kpi`;
CREATE TABLE `t_dealers_kpi` (
  `account` char(11) NOT NULL COMMENT '账号id',
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `gems` int(11) DEFAULT '0' COMMENT '累计值',
  `score` int(11) DEFAULT '0',
  `subs` int(11) DEFAULT '0',
  PRIMARY KEY (`account`,`year`,`month`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='按月统计考核代理';

-- ----------------------------
-- Records of t_dealers_kpi
-- ----------------------------

-- ----------------------------
-- Table structure for `t_dealers_notice`
-- ----------------------------
DROP TABLE IF EXISTS `t_dealers_notice`;
CREATE TABLE `t_dealers_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` varchar(2048) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `act_time` bigint(20) DEFAULT NULL,
  `end_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_dealers_notice
-- ----------------------------
INSERT INTO `t_dealers_notice` VALUES ('9', '万www', '额喂喂喂', '0', '1487580364250', '-1');

-- ----------------------------
-- Table structure for `t_pay_orders`
-- ----------------------------
DROP TABLE IF EXISTS `t_pay_orders`;
CREATE TABLE `t_pay_orders` (
  `orderid` bigint(20) NOT NULL,
  `operator` varchar(255) NOT NULL COMMENT '申请者账号',
  `open_id` varchar(128) DEFAULT NULL COMMENT '微信open_id',
  `score_nums` int(11) DEFAULT NULL,
  `price_nums` int(11) NOT NULL DEFAULT '0' COMMENT '购买积分数量',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0 未付款 1 已付款',
  `pay_type` int(11) DEFAULT '-1' COMMENT '-1未支付 0 微信 1 支付宝 2 网银 ',
  `start_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `pay_time` bigint(20) DEFAULT NULL COMMENT '支付时间',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_pay_orders
-- ----------------------------

-- ----------------------------
-- Table structure for `t_rates`
-- ----------------------------
DROP TABLE IF EXISTS `t_rates`;
CREATE TABLE `t_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate1` int(11) DEFAULT NULL,
  `rate2` int(11) DEFAULT NULL,
  `rate3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_rates
-- ----------------------------
INSERT INTO `t_rates` VALUES ('1', '23', '15', '10');

-- ----------------------------
-- Table structure for `t_super_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_super_user`;
CREATE TABLE `t_super_user` (
  `userid` int(11) NOT NULL,
  `nick_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_super_user
-- ----------------------------
