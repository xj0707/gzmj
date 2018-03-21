/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : gzmj

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-02-22 16:06:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_menu
-- ----------------------------
DROP TABLE IF EXISTS `t_menu`;
CREATE TABLE `t_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) DEFAULT '0',
  `icon` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) DEFAULT NULL,
  `a` varchar(20) DEFAULT NULL,
  `data` varchar(50) NOT NULL DEFAULT '',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '999',
  `display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示(1:显示,2:不显示)',
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_menu
-- ----------------------------
INSERT INTO `t_menu` VALUES ('1', '管理设置', '0', 'fa-users', 'Admin', 'admin', '', '', '', '1', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('2', '管理员管理', '1', '', 'Admin', 'index', '', '', '', '0', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('3', '详情', '2', '', 'Admin', 'info', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('4', '添加', '2', '', 'Admin', 'add', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('5', '修改', '2', '', 'Admin', 'edit', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('6', '删除', '2', '', 'Admin', 'del', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('7', '分组管理', '1', '', 'Group', 'index', '', '', '', '0', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('8', '详情', '7', '', 'Group', 'info', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('9', '添加', '7', '', 'Group', 'add', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('10', '修改', '7', '', 'Group', 'edit', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('11', '删除', '7', '', 'Group', 'del', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('12', '菜单管理', '18', '', 'Menu', 'index', '', '', '', '0', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('13', '查看', '12', '', 'Menu', 'info', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('14', '添加', '12', '', 'Menu', 'add', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('15', '修改', '12', '', 'Menu', 'edit', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('16', '删除', '12', '', 'Menu', 'del', '', '', '', '0', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('18', '系统设置', '0', 'fa-cogs', 'Menu', 'index', '', '', '', '2', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('22', '权限设置', '2', '', 'Group', 'rule', '', '', '', '999', '2', '1476175413');
INSERT INTO `t_menu` VALUES ('23', '个人设置', '1', '', 'Admin', 'public_edit_info', '', '', '', '999', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('27', '日志管理', '18', '', 'Log', 'index', '', '', '', '999', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('31', '系统首页', '0', 'fa-bank', 'Index', 'index', '', '', '', '0', '1', '1476175413');
INSERT INTO `t_menu` VALUES ('32', '用户管理', '0', 'fa-user', 'Users', 'index', '', '', '', '999', '1', '1487645892');
INSERT INTO `t_menu` VALUES ('33', '游戏房间', '0', 'fa-home', 'GameRoom', 'index', '', '', '', '999', '1', null);
INSERT INTO `t_menu` VALUES ('34', '购买记录', '0', ' fa-shopping-cart ', 'BuyLog', 'index', '', '', '', '999', '1', null);
INSERT INTO `t_menu` VALUES ('35', '添加钻石', '32', '', 'Users', 'addcoins', '', '', '', '999', '2', '1487750080');
INSERT INTO `t_menu` VALUES ('36', 'id查询玩家', '32', '', 'Users', 'likeuserid', '', '', '', '999', '2', '1487750098');
INSERT INTO `t_menu` VALUES ('37', '账号查询玩家', '32', '', 'Users', 'likeaccount', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('38', '昵称查询玩家', '32', '', 'Users', 'likename', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('39', '查看游戏记录', '32', '', 'Users', 'gameinfo', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('40', 'id查询房间', '33', '', 'GameRoom', 'likeroomuuid', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('41', '密码查询房间', '33', '', 'GameRoom', 'likeroomid', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('42', '时间查询房间', '33', '', 'GameRoom', 'liketime', '', '', '', '999', '2', null);
INSERT INTO `t_menu` VALUES ('43', '时间查询记录', '34', '', 'BuyLog', 'liketime', '', '', '', '999', '2', null);
