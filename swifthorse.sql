/*
Navicat MySQL Data Transfer

Source Server         : XAMPP_localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : swifthorse

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-30 13:57:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sh_admin`
-- ----------------------------
DROP TABLE IF EXISTS `sh_admin`;
CREATE TABLE `sh_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `aname` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员登录名',
  `truename` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员真实姓名',
  `pwd` char(32) NOT NULL COMMENT '管理员登录密码',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员电话',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '管理员电子邮箱',
  `admingroup` tinyint(4) NOT NULL DEFAULT '0' COMMENT '管理员组ID',
  `lastlogin` int(10) NOT NULL DEFAULT '0' COMMENT '管理员上次登录时间',
  `lastip` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员上次登录IP',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '管理员账号创建时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '账号状态',
  `avatar` varchar(100) NOT NULL DEFAULT '/Public/Admin/Images/avatar1_small.jpg' COMMENT '用户头像',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aname` (`aname`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台管理用户表';

-- ----------------------------
-- Records of sh_admin
-- ----------------------------
INSERT INTO `sh_admin` VALUES ('1', 'admin', '刘赶三', '21232f297a57a5a743894a0e4a801fc3', '18888888888', 'admin@163.com', '1', '0', '', '1399136467', '0', '/Public/Admin/Images/avatar1_small.jpg');
INSERT INTO `sh_admin` VALUES ('2', 'zhangsan', '马特达蒙', 'e10adc3949ba59abbe56e057f20f883e', '11111111111', '1051225729@qq.com', '2', '0', '', '1399162107', '0', '/Public/Admin/Images/avatar1_small.jpg');

-- ----------------------------
-- Table structure for `sh_admingroup`
-- ----------------------------
DROP TABLE IF EXISTS `sh_admingroup`;
CREATE TABLE `sh_admingroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员组ID',
  `groupname` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员组名',
  `permissions` varchar(255) NOT NULL DEFAULT '' COMMENT '管理员组权限',
  `creator` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员组创建者',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '管理员组创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台管理员组表';

-- ----------------------------
-- Records of sh_admingroup
-- ----------------------------
INSERT INTO `sh_admingroup` VALUES ('1', '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21', 'admin', '1398181576');
INSERT INTO `sh_admingroup` VALUES ('2', '用户管理组', '1,2,3,4,5,6,7,8', 'admin', '1398212535');

-- ----------------------------
-- Table structure for `sh_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `sh_admin_menu`;
CREATE TABLE `sh_admin_menu` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(20) unsigned NOT NULL COMMENT '父id',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '''菜单类型;1:有界面可访问菜单,2:无界面可访问菜单,0:只作为菜单''',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态;1:显示,0:不显示',
  `list_order` tinyint(3) unsigned NOT NULL DEFAULT '100' COMMENT '排序',
  `app` varchar(15) NOT NULL COMMENT '应用名',
  `controller` varchar(30) NOT NULL COMMENT '控制器名',
  `action` varchar(30) NOT NULL COMMENT '方法名',
  `param` varchar(100) NOT NULL COMMENT '额外参数',
  `name` varchar(30) NOT NULL COMMENT '菜单名称',
  `icon` varchar(20) NOT NULL COMMENT '菜单图标',
  `remark` text NOT NULL COMMENT '备注',
  `time` bigint(15) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of sh_admin_menu
-- ----------------------------
INSERT INTO `sh_admin_menu` VALUES ('1', '0', '1', '1', '100', 'admin', 'Index', 'index', '', '主页', 'home', '       ', '0');
INSERT INTO `sh_admin_menu` VALUES ('2', '0', '1', '1', '100', 'admin', 'User', 'default', '', '用户管理', 'user', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('3', '0', '1', '1', '100', 'admin', 'Projects', 'default', '', '项目管理', 'bookmark-o', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('4', '0', '1', '1', '100', 'admin', 'Examine', 'default', '', '审核管理', 'search-plus', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('5', '0', '1', '1', '100', 'admin', 'admin', 'default', '', '管理员管理', 'user-md', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('6', '0', '1', '1', '100', 'admin', 'AdminGroup', 'default', '', '权限管理', 'group', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('7', '0', '1', '1', '100', 'admin', 'Account', 'default', '', '账号管理', 'cny', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('8', '0', '1', '1', '100', 'admin', 'Comments', 'default', '', '对话管理', 'comments-o', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('9', '0', '1', '1', '100', 'admin', 'Statistics', 'default', '', '统计管理', 'bar-chart-o', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('10', '0', '1', '1', '100', 'admin', 'syslog', 'default', '', '日志管理', 'calendar', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('11', '0', '1', '1', '100', 'admin', 'sysmanage', 'default', '', '站点配置', 'cogs', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('12', '2', '1', '1', '100', 'admin', 'Users', 'index', '', '用户列表', '', '  ', '0');
INSERT INTO `sh_admin_menu` VALUES ('13', '2', '1', '1', '100', 'admin', 'Rank', 'index', '', 'RANK积分规则', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('14', '2', '1', '1', '100', 'admin', 'Chat', 'index', '', '聊天列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('15', '3', '1', '1', '100', 'admin', 'Projects', 'index', '', '项目列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('16', '3', '1', '1', '100', 'admin', 'Classify', 'index', '', '项目分类', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('17', '3', '1', '1', '100', 'admin', 'Commodity', 'index', '', '上架项目', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('18', '3', '1', '1', '100', 'admin', 'Skill', 'index', '', '技能分类', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('19', '4', '1', '1', '100', 'admin', 'Examine', 'index', '', '项目审核列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('20', '4', '1', '1', '100', 'admin', 'QExamine', 'index', '', '问答审核列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('21', '4', '1', '1', '100', 'admin', 'Grounding', 'index', '', '上架审核列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('22', '4', '1', '1', '100', 'admin', 'AuditClassify', 'index', '', '审核分类', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('23', '5', '1', '1', '100', 'admin', 'Admin', 'index', '', '管理员列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('24', '5', '1', '0', '100', 'admin', 'Admin', 'add', '', '添加管理员', '', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('25', '6', '1', '1', '100', 'admin', 'AdminGroup', 'index', '', '管理员组列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('26', '6', '1', '0', '100', 'admin', 'AdminGroup', 'add', '', '添加管理员组', '', ' ', '0');
INSERT INTO `sh_admin_menu` VALUES ('27', '6', '1', '1', '100', 'admin', 'AdminMenu', 'index', '', '后台菜单', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('28', '7', '1', '1', '100', 'admin', 'SysAccount', 'index', '', '系统收支记录', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('29', '7', '1', '1', '100', 'admin', 'UserAccount', 'index', '', '个人交易记录', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('30', '7', '1', '1', '100', 'admin', 'Pay', 'index', '', '支付方式', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('31', '7', '1', '1', '100', 'admin', 'Monetary', 'index', '', '币值', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('32', '8', '1', '1', '100', 'admin', 'Comments', 'dlist', '', '评论列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('33', '8', '1', '1', '100', 'admin', 'Interlocution', 'index', '', '问答列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('34', '9', '1', '1', '100', 'admin', 'Statistics', 'index', '', '统计列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('35', '10', '1', '1', '100', 'admin', 'Syslog', 'index', '', '日志列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('36', '11', '1', '1', '100', 'admin', 'Sysmanage', 'index', '', '基础配置', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('37', '11', '1', '1', '100', 'admin', 'Question', 'index', '', '常见问题', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('38', '11', '1', '1', '100', 'admin', 'QuestionType', 'index', '', '常见问题类型', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('39', '11', '1', '1', '100', 'admin', 'Page', 'index', '', '单页面列表', '', '', '0');
INSERT INTO `sh_admin_menu` VALUES ('40', '11', '1', '1', '100', 'admin', 'Edition', 'index', '', '版本列表', '', '', '0');

-- ----------------------------
-- Table structure for `sh_applic`
-- ----------------------------
DROP TABLE IF EXISTS `sh_applic`;
CREATE TABLE `sh_applic` (
  `applic_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`applic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='行业列表';

-- ----------------------------
-- Records of sh_applic
-- ----------------------------
INSERT INTO `sh_applic` VALUES ('1', '水果', '1532155085', '1');
INSERT INTO `sh_applic` VALUES ('2', '建筑', '1532155095', '1');

-- ----------------------------
-- Table structure for `sh_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `sh_auth_group`;
CREATE TABLE `sh_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `rules` varchar(100) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则用“,”隔开',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:可用',
  `creator` varchar(50) NOT NULL COMMENT '管理员组创建者',
  `addtime` bigint(10) unsigned NOT NULL DEFAULT '0' COMMENT '管理员组创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of sh_auth_group
-- ----------------------------
INSERT INTO `sh_auth_group` VALUES ('1', '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21', '1', 'zhangsan', '1398181576');
INSERT INTO `sh_auth_group` VALUES ('2', '普通管理员', '1,4,19,20,21,22', '1', 'zhangsan', '1398212535');

-- ----------------------------
-- Table structure for `sh_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `sh_auth_group_access`;
CREATE TABLE `sh_auth_group_access` (
  `uid` mediumint(20) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(20) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`uid`,`group_id`),
  UNIQUE KEY `uid_2` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of sh_auth_group_access
-- ----------------------------
INSERT INTO `sh_auth_group_access` VALUES ('1', '1');
INSERT INTO `sh_auth_group_access` VALUES ('2', '2');

-- ----------------------------
-- Table structure for `sh_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `sh_auth_rule`;
CREATE TABLE `sh_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `app` varchar(20) NOT NULL COMMENT '规则所属module',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `param` varchar(100) NOT NULL COMMENT '额外url参数',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型（0存在规则就通过，1按规则表达时进行认证）',
  `condition` varchar(100) NOT NULL DEFAULT '' COMMENT '规则表达式',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of sh_auth_rule
-- ----------------------------
INSERT INTO `sh_auth_rule` VALUES ('1', 'admin', 'admin/index/index', '', '主页', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('2', 'admin', 'admin/user/default', '', '用户管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('3', 'admin', 'admin/projects/default', '', '项目管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('4', 'admin', 'admin/examine/default', '', '审核管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('5', 'admin', 'admin/admin/default', '', '管理员管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('6', 'admin', 'admin/admingroup/default', '', '权限管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('7', 'admin', 'admin/account/default', '', '账号管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('8', 'admin', 'admin/comments/default', '', '对话管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('9', 'admin', 'admin/statistics/default', '', '统计管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('10', 'admin', 'admin/syslog/default', '', '日志管理', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('11', 'admin', 'admin/sysmanage/default', '', '站点配置', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('12', 'admin', 'admin/users/index', '', '用户列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('13', 'admin', 'admin/rank/index', '', 'RANK积分规则', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('14', 'admin', 'admin/chat/index', '', '聊天列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('15', 'admin', 'admin/projects/index', '', '项目列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('16', 'admin', 'admin/classify/index', '', '项目分类', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('17', 'admin', 'admin/commodity/index', '', '上架项目', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('18', 'admin', 'admin/skill/index', '', '技能分类', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('19', 'admin', 'admin/examine/index', '', '项目审核列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('20', 'admin', 'admin/qexamine/index', '', '问答审核列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('21', 'admin', 'admin/grounding/index', '', '上架审核列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('22', 'admin', 'admin/auditclassify/index', '', '审核分类', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('23', 'admin', 'admin/admin/index', '', '管理员列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('24', 'admin', 'admin/admin/add', '', '添加管理员', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('25', 'admin', 'admin/admingroup/index', '', '管理员组列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('26', 'admin', 'admin/admingroup/add', '', '添加管理员组', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('27', 'admin', 'admin/adminmenu/index', '', '后台菜单', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('28', 'admin', 'admin/sysaccount/index', '', '系统收支记录', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('29', 'admin', 'admin/useraccount/index', '', '个人交易记录', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('30', 'admin', 'admin/pay/index', '', '支付方式', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('31', 'admin', 'admin/monetary/index', '', '币值', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('32', 'admin', 'admin/comments/dlist', '', '评论列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('33', 'admin', 'admin/interlocution/index', '', '问答列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('34', 'admin', 'admin/statistics/index', '', '统计列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('35', 'admin', 'admin/syslog/index', '', '日志列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('36', 'admin', 'admin/sysmanage/index', '', '基础配置', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('37', 'admin', 'admin/question/index', '', '常见问题', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('38', 'admin', 'admin/questiontype/index', '', '常见问题类型', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('39', 'admin', 'admin/page/index', '', '单页面列表', '0', '', '1');
INSERT INTO `sh_auth_rule` VALUES ('40', 'admin', 'admin/edition/index', '', '版本列表', '0', '', '1');

-- ----------------------------
-- Table structure for `sh_chat`
-- ----------------------------
DROP TABLE IF EXISTS `sh_chat`;
CREATE TABLE `sh_chat` (
  `chat_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `send_id` int(20) unsigned NOT NULL COMMENT '聊天甲方id',
  `response_id` int(20) unsigned NOT NULL COMMENT '聊天乙方id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL COMMENT '开启时间',
  PRIMARY KEY (`chat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='聊天窗口表';

-- ----------------------------
-- Records of sh_chat
-- ----------------------------
INSERT INTO `sh_chat` VALUES ('1', '2', '3', '1', '1531972825');

-- ----------------------------
-- Table structure for `sh_chat_content`
-- ----------------------------
DROP TABLE IF EXISTS `sh_chat_content`;
CREATE TABLE `sh_chat_content` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` int(20) unsigned NOT NULL COMMENT '聊天窗口id',
  `send_id` int(20) unsigned NOT NULL COMMENT '发送者id',
  `content` text NOT NULL COMMENT '文字内容',
  `picture` varchar(50) NOT NULL COMMENT '发送图片',
  `examine_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `sendtime` bigint(15) unsigned NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='聊天内容';

-- ----------------------------
-- Records of sh_chat_content
-- ----------------------------
INSERT INTO `sh_chat_content` VALUES ('1', '1', '2', '你好', '', '1', '1', '1531972825');
INSERT INTO `sh_chat_content` VALUES ('2', '1', '3', '你好', '', '1', '1', '1531972830');

-- ----------------------------
-- Table structure for `sh_classify`
-- ----------------------------
DROP TABLE IF EXISTS `sh_classify`;
CREATE TABLE `sh_classify` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL COMMENT '0',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `createtime` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间 时间戳',
  `line` int(5) unsigned NOT NULL DEFAULT '100' COMMENT '排列 ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='项目分类';

-- ----------------------------
-- Records of sh_classify
-- ----------------------------
INSERT INTO `sh_classify` VALUES ('1', '0', 'APP开发', '1', '1531997421', '100');
INSERT INTO `sh_classify` VALUES ('2', '0', '微信/小程序', '1', '1532052993', '100');
INSERT INTO `sh_classify` VALUES ('3', '0', '网站开发', '1', '1532053023', '100');
INSERT INTO `sh_classify` VALUES ('4', '0', '游戏开发', '1', '1532053036', '100');
INSERT INTO `sh_classify` VALUES ('5', '0', 'PC软件开发', '1', '1532053050', '100');
INSERT INTO `sh_classify` VALUES ('6', '0', '硬件开发', '1', '1532053075', '100');
INSERT INTO `sh_classify` VALUES ('7', '0', '测试验收服务', '1', '1532053089', '100');
INSERT INTO `sh_classify` VALUES ('8', '0', 'UI设计', '1', '1532053098', '100');
INSERT INTO `sh_classify` VALUES ('9', '0', 'IT人事服务', '1', '1532053107', '100');
INSERT INTO `sh_classify` VALUES ('10', '0', '品牌创意设计', '1', '1532053117', '100');
INSERT INTO `sh_classify` VALUES ('11', '0', '影视动漫动画', '1', '1532053128', '100');
INSERT INTO `sh_classify` VALUES ('12', '0', '网络安全服务', '1', '1532053136', '100');
INSERT INTO `sh_classify` VALUES ('13', '0', 'AR/VR', '1', '1532053148', '100');
INSERT INTO `sh_classify` VALUES ('14', '0', '远程工作与咨询', '1', '1532053157', '100');
INSERT INTO `sh_classify` VALUES ('15', '0', '其他', '1', '1532053166', '100');

-- ----------------------------
-- Table structure for `sh_comments`
-- ----------------------------
DROP TABLE IF EXISTS `sh_comments`;
CREATE TABLE `sh_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  `reviewerid` int(11) NOT NULL DEFAULT '0' COMMENT '评论者ID',
  `byreviewerid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论者ID',
  `pnumber` varchar(255) NOT NULL DEFAULT '' COMMENT '项目编号',
  `pname` varchar(255) NOT NULL COMMENT '项目名称',
  `comtime` int(10) NOT NULL DEFAULT '0' COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  `firstlevel` decimal(2,1) NOT NULL COMMENT '第一个评论项',
  `secondlevel` decimal(2,1) NOT NULL COMMENT '第二个评论项',
  `thirdlevel` decimal(2,1) NOT NULL COMMENT '第三个评论项',
  `fourthlevel` decimal(2,1) NOT NULL COMMENT '第四个评论项',
  `fivethlevel` decimal(2,1) NOT NULL COMMENT '第五个评论项',
  `averagelevel` decimal(2,1) NOT NULL DEFAULT '0.0' COMMENT '平均评论等级',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评论类型',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评论状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of sh_comments
-- ----------------------------
INSERT INTO `sh_comments` VALUES ('1', '7', '6', '201405061416253516', '这是zh654321发布的测试项目', '1399358137', '第一条评论！五分好评！', '5.0', '5.0', '5.0', '5.0', '5.0', '5.0', '0', '0');
INSERT INTO `sh_comments` VALUES ('2', '6', '7', '201405061416253516', '这是zh654321发布的测试项目', '1399360788', 'wufenbasfdsafsadf', '4.0', '2.0', '3.1', '3.7', '4.4', '3.4', '1', '0');
INSERT INTO `sh_comments` VALUES ('3', '12', '6', '201405081056238679', 'strlen', '1399518556', '还可以吧', '3.4', '4.5', '2.4', '3.8', '1.8', '3.2', '0', '1');

-- ----------------------------
-- Table structure for `sh_commodity`
-- ----------------------------
DROP TABLE IF EXISTS `sh_commodity`;
CREATE TABLE `sh_commodity` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `projects_id` int(20) unsigned NOT NULL COMMENT '项目id',
  `pnumber` varchar(20) NOT NULL COMMENT '项目编号',
  `title` varchar(100) NOT NULL COMMENT '商品标题',
  `img` varchar(100) NOT NULL COMMENT '标题图片',
  `monetary_id` int(10) unsigned NOT NULL COMMENT '币值id',
  `price` decimal(10,2) unsigned NOT NULL COMMENT '价格',
  `content` text NOT NULL COMMENT '详细介绍',
  `install` enum('1','2') NOT NULL DEFAULT '1' COMMENT '包安装 1:不包;2:包;',
  `modify` enum('1','2') NOT NULL DEFAULT '1' COMMENT '包修改 1:不包;2:包;',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:显示;2:隐藏;',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `examine_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='上架项目商品';

-- ----------------------------
-- Records of sh_commodity
-- ----------------------------
INSERT INTO `sh_commodity` VALUES ('1', '1', '201807211838478523', '大闹天宫', '/Uploads/Commodity/20180725/5b58183b22c57.png', '0', '20.00', '<h3 class=\"title-text\" style=\"margin: 0px; padding: 0px; font-size: 18px; font-weight: 400;\">上映信息</h3><table width=\"600\" class=\"table-view log-set-param\"><tbody><tr class=\"firstRow\"><th width=\"129\" style=\"padding-top: 2px; padding-bottom: 2px; line-height: 22px; height: 23px; border-color: rgb(230, 230, 230); text-align: left; background-color: rgb(248, 248, 248);\">国家/地区</th><th width=\"129\" style=\"padding-top: 2px; padding-bottom: 2px; line-height: 22px; height: 23px; border-color: rgb(230, 230, 230); text-align: left; background-color: rgb(248, 248, 248);\"><p>上映日期</p></th><th width=\"129\" style=\"padding-top: 2px; padding-bottom: 2px; line-height: 22px; height: 23px; border-color: rgb(230, 230, 230); text-align: left; background-color: rgb(248, 248, 248);\">国家/地区</th><th width=\"129\" style=\"padding-top: 2px; padding-bottom: 2px; line-height: 22px; height: 23px; border-color: rgb(230, 230, 230); text-align: left; background-color: rgb(248, 248, 248);\">上映日期</th></tr><tr><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">中国</td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年1月31日</td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">韩国</td><td colspan=\"1\" rowspan=\"1\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年12月11日</td></tr><tr><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">新西兰</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月30日</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">新加坡</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月30日</td></tr><tr><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\"><p>澳大利亚</p></td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月30日</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">马来西亚</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月31日</td></tr><tr><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">泰国</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月30日</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">中国台湾</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年02月07日</td></tr><tr><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">中国香港</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年01月30日</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">美国</td><td valign=\"top\" align=\"left\" width=\"129\" style=\"margin: 0px; padding-top: 2px; padding-bottom: 2px; line-height: 22px; border-color: rgb(230, 230, 230);\">2014年09月14日<a class=\"sup-anchor\" style=\"color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;\"><br/><br/></a></td></tr></tbody></table><p><br/></p>', '2', '2', '1', '1532500027', '2');

-- ----------------------------
-- Table structure for `sh_edition`
-- ----------------------------
DROP TABLE IF EXISTS `sh_edition`;
CREATE TABLE `sh_edition` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '' COMMENT '版本号',
  `content` text NOT NULL COMMENT '版本更新内容',
  `create_time` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='版本信息';

-- ----------------------------
-- Records of sh_edition
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_examine`
-- ----------------------------
DROP TABLE IF EXISTS `sh_examine`;
CREATE TABLE `sh_examine` (
  `examine_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '审核名称',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `createtime` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `admin_id` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '创建人id',
  PRIMARY KEY (`examine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='审核表格';

-- ----------------------------
-- Records of sh_examine
-- ----------------------------
INSERT INTO `sh_examine` VALUES ('1', '提交审核中', '1', '1531900328', '1');
INSERT INTO `sh_examine` VALUES ('2', '审核通过', '1', '1532055198', '1');
INSERT INTO `sh_examine` VALUES ('3', '审核失败', '1', '1532055215', '1');

-- ----------------------------
-- Table structure for `sh_frame`
-- ----------------------------
DROP TABLE IF EXISTS `sh_frame`;
CREATE TABLE `sh_frame` (
  `frame_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`frame_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='框架表';

-- ----------------------------
-- Records of sh_frame
-- ----------------------------
INSERT INTO `sh_frame` VALUES ('1', 'thinkphp3.20', '1532155391', '1');
INSERT INTO `sh_frame` VALUES ('2', 'thinkphp5.0', '1532155422', '1');

-- ----------------------------
-- Table structure for `sh_guarantee`
-- ----------------------------
DROP TABLE IF EXISTS `sh_guarantee`;
CREATE TABLE `sh_guarantee` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `RMB` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '平台担保总金额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台担保总金额';

-- ----------------------------
-- Records of sh_guarantee
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_interlocution`
-- ----------------------------
DROP TABLE IF EXISTS `sh_interlocution`;
CREATE TABLE `sh_interlocution` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `send_id` int(20) unsigned NOT NULL COMMENT '发送人id',
  `response_id` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复人id',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容 运用富文本编辑器内容存储',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `examine_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  `praise` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `collection` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '酬金',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='问答表';

-- ----------------------------
-- Records of sh_interlocution
-- ----------------------------
INSERT INTO `sh_interlocution` VALUES ('1', '0', '1', '0', '花儿为什么这么红', '<p>这是一段话</p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20180723/1532340764391201.png\" title=\"1532340764391201.png\" alt=\"logo.png\"/></p><p>这是一段话</p>', '1532340823', '1', '3', '0', '0', '0.00');

-- ----------------------------
-- Table structure for `sh_interlocution_pay`
-- ----------------------------
DROP TABLE IF EXISTS `sh_interlocution_pay`;
CREATE TABLE `sh_interlocution_pay` (
  `id` int(20) unsigned NOT NULL COMMENT '问答id',
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`,`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问答缴费id';

-- ----------------------------
-- Records of sh_interlocution_pay
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_monetary`
-- ----------------------------
DROP TABLE IF EXISTS `sh_monetary`;
CREATE TABLE `sh_monetary` (
  `monetary_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '名称',
  `conversion` float(5,2) unsigned NOT NULL DEFAULT '100.00' COMMENT '换算比例',
  `icon` varchar(10) NOT NULL COMMENT '符号',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`monetary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='币值列表';

-- ----------------------------
-- Records of sh_monetary
-- ----------------------------
INSERT INTO `sh_monetary` VALUES ('1', '人民币', '100.00', '￥', '1531996012', '1');
INSERT INTO `sh_monetary` VALUES ('2', '美元', '676.66', '$', '1532152399', '1');

-- ----------------------------
-- Table structure for `sh_page`
-- ----------------------------
DROP TABLE IF EXISTS `sh_page`;
CREATE TABLE `sh_page` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `icon` varchar(100) NOT NULL COMMENT '图标',
  `content` text NOT NULL COMMENT '内容',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='单页面管理';

-- ----------------------------
-- Records of sh_page
-- ----------------------------
INSERT INTO `sh_page` VALUES ('1', '隐私策略', '', '<h1 style=\"margin: 0px; font-weight: normal; color: rgb(119, 98, 88); font-size: 2.25em; line-height: 0.8333em; text-align: center;\">隐私策略</h1><hr/><p><span style=\"display: block; position: absolute; bottom: -25px; left: 490px; margin-left: -25px; width: 50px; height: 50px; background-image: url(&quot;../img/bookOpened.jpg&quot;); background-position: center center; background-size: initial; background-repeat: no-repeat; background-attachment: initial; background-origin: initial; background-clip: initial;\"></span></p><p><article><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">隐私保护</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">1、用户同意，个人隐私信息是指那些能够对用户进行个人辨识或涉及个人通信的信息，包括下列信息：用户真实姓名，身份证号，手机号码，IP地址。而非个人隐私信息是指用户对本服务的操作状态以及使用习惯等一些明确且客观反映在本公司服务器端的基本记录信息和其他一切个人隐私信息范围外的普通信息，以及用户同意公开的上述隐私信息；</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">2、保护用户(特别是未成年人)的隐私是掌阅的一项基本政策，掌阅将对用户所提供的资料进行严格的管理及保护，并使用相应的技术，防止用户的个人资料丢失、被盗用或遭篡改，保证不对外公开或向第三方提供单个用户的注册资料及用户在使用网络服务时存储在掌阅的非公开内容，但下列情况除外：<br/>2.1 事先获得用户的明确授权；<br/>2.2 根据有关的法律法规要求；<br/>2.3 按照相关政府主管部门的要求；<br/>2.4 为维护社会公众的利益；<br/>2.5 为维护掌阅的合法权益。<br/></p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">3、任何时候如果您对我们的隐私策略有疑问，请利用电子邮件<a href=\"mailto:privacy@zhangyue.com\" style=\"text-decoration-line: none;\">privacy@zhangyue.com</a>&nbsp;联系我们，我们会尽一切努力，请合理适当的范围内立即改善这个问题。</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">知识产权</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">1、掌阅系iReader的著作权人，未经掌阅许可，用户不得对该软件进行反向工程（reverse engineer）、反向编译（decompile）或反汇编（disassemble）。</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">2、掌阅提供的网络服务中包含的任何文本、图片、图形、音频和/或视频资料均受版权、商标和/或其它财产所有权法律的保护，未经相关权利人同意，上述资料均不得在任何媒体直接或间接发布、播放、出于播放或发布目的而改写或再发行，或者被用于其他任何商业目的。所有这些资料或资料的任何部分仅可作为私人和非商业用途而保存在用户终端内。掌阅不就由上述资料产生或在传送或递交全部或部分上述资料过程中产生的延误、不准确、错误和遗漏或从中产生或由此产生的任何损害赔偿，以任何形式，向用户或任何第三方负责。</p><p style=\"margin-top: 0px; margin-bottom: 30px; line-height: 2em; font-size: 0.875em; color: rgb(102, 102, 102);\">3、掌阅所有作品内容仅代表作者自己的立场和观点，与掌阅无关，由作者本人承担一切法律责任。</p></article></p><p><br/></p>', '1532418014', '1');
INSERT INTO `sh_page` VALUES ('2', '条款和条件', '', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;\">条款和条件的详细资料A</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">消费者的建议</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">这些银联预付卡是由Sinopay（新加坡）私营有限公司（“公司/发行人/Sinopay”）依照银联国际的许可证发行的。”发行人是卡储值基金的持有者，不需要新加坡金融管理局的批准。建议消费者（持卡人/用户）仔细阅读本网站（&nbsp;<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>）提供的这些卡的条款和条件。发行人是卡储值基金的持有者，不需要新加坡金融管理局的批准。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">当您接受、购买、签字或使用Sinopay（新加坡）私营有限公司（发行人/公司/Sinopay）发行的预付卡时，你即同意了在此列出的条款和条件的规定。由于这些条款和条件（条款和条件A的详细资料）有时会修改，了解条款和条件A详细资料的最新情况将是您自己的责任。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">定义&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">除非上下文另有要求，下列表述在以下条款和条件中具有以下含义：&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">“账户”指发行人持有的与相关的预付卡关联并由预付卡表面上的卡号所确定的每个个人账户；&nbsp;<br/>“持卡人”、“您”或“您的”指任何购买或使用或即将使用预付卡进行任何交易的人；&nbsp;<br/>“公司”、“发行人”，“Sinopay”，“我们（主格）”，“我们（宾格）”或“我们的”均指Sinopay(新加坡) 私营有限公司；&nbsp;<br/>“CUP”指中国银联股份有限公司；&nbsp;<br/>“UPI”指银联国际，即中国银联股份有限公司的子公司。”&nbsp;<br/>“截止日期”指购买预付卡之日起五年后的日期，为卡面上印刷的截止日期或卡背面规定的截止日期中较早的一个，或由发行人全权决定截止日期。&nbsp;<br/>“外汇交易”指任何除预付卡基础货币之外的任何货币交易；&nbsp;<br/>“新加坡”指新加坡共和国；&nbsp;<br/>“SG$”指新加坡元，新加坡的合法货币；&nbsp;<br/>“预付卡”指由发行人发布的有，或没有预付值的Sino P.优先支付卡/ Sino2015年第28届东南亚运动会新加坡卡（红）或 Sino2015年第28届东南亚运动会新加坡卡（白）。&nbsp;<br/>“个性化预付卡”指带有一个特定的、可识别的人的预付卡，需要正确执行适当的KYC审核批准程序。&nbsp;<br/>“预付值”指预付卡发行时计入账户的与指定的额度相同的金额。&nbsp;<br/>“交易”指使用预付卡或其账户发生的交易。&nbsp;<br/>“零售价格”指由零售店提供给公众的预付卡的零售价格，可能超过预付卡的卡储值。&nbsp;<br/>“零售店”指与该公司签订了出售预付卡渠道协议的、指定的零售店、住宅区附近的小商店、百货商店、银行分支机构或任何渠道代理商。&nbsp;<br/>“市场提价”指超出卡储值的数额，以包括包装材料、制作费用、市场到柜台的费用、及其他将预付卡带到使用场所条件下产生的费用。一致认为每张卡市场价格不得超过卡储值10新加坡元。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">预付卡</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">1 预付卡的基本货币是新加坡币。每张卡预付值最大储存额度为999新加坡元，或，我们会不时在我们的网站上确定和规定这类额度、相关促销材料、或超过999新加坡元的个性化预付卡。有两类卡，基于签名的预付卡和基于pin的预付卡。预付卡是一次性的，但不是可返还的和/或可退还的。预付卡不可转让，任何未用余额不予退还。对如下例外情况，如将未使用余额或过期未使用余额转移或任何重新激活/延长到一个新的预付卡，或延长/重新激活过期预付卡，由本公司全权酌情决定，详见下面的第24段。&nbsp;<br/>2 我们将仔细维护每个预付卡账户，每次您使用预付卡进行交易或提取现金（如果适用），我们将从您的账户上扣除相同量的额度以及适当的手续费（如有），（参见费用表）。&nbsp;<br/>3 每张卡有3新加坡元的卡片发放费（可能在促销期间由我们指定免除或者其他情况，由我们全权决定）在购买预付卡之后可付。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">预付卡的使用&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">4 在使用预付卡之前，您必须在预付卡背面指定区域签名。基于签名的预付卡没有PIN，但是基于PIN的预付卡有6位数字的个人识别交易码（PIN）。初始PIN通常打印在左下角，但是由可去除的、不透明的材料盖住。强烈建议您收到基于PIN的预付卡后，立即登陆我们的网站<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>，修改初始PIN。所有的交易均需要PIN，包括查看余额和交易明细；如果您的卡没有PIN，您应并且必须立即在预付卡背面签字，并且由于它具有现金价值，强烈建议您仔细看管好您的预付卡。如果您在任何情况下以任何形式丢失卡，公司不赔偿损失或更换您的预付卡。&nbsp;<br/>5 PIN(如果适用)通常打印在基于PIN的预付卡的背面，并用银刮膜盖住。 如果您发现银刮膜不完整或有破损，请在使用前将预付卡返回给我们，我们将为您另发一个更换卡。如果预付卡已经被使用，包括在网站上查看余额，我们将不会再为您发更换卡。由于每次您使用基于PIN的预付卡时，包括查看余额和交易明细，都会用到PIN，强烈建议您通过访问我们的网站<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>，修改您的PIN。&nbsp;<br/>6 预付卡只能在接受中国银联支付方式的商家或其他类似终端使用，我们会不时发布由我们授权的交易。 7 每次购买交易付款时，您必须提供预付卡、以与您预付卡背面相同的签字在小票上签字、并输入6位数字的PIN（只适用于基于PIN的预付卡）目前预付卡不能用于任何没有付款收据的交易，例如通过邮件、电话、移动电话和网络的订单或账单支付，以及不需要使用预付卡的其他交易。预付卡不能用于处理任何付款金额超过预付值余额的付款。 然而，通过正确的批准和遵守KYC程序，以及在严格遵守所有的新加坡规章、法律和公司政策的条件下，您的卡可以作为个性化预付卡激活，每张卡储值可超过999新加坡元，并且对在线交易、邮购交易、手机支付和/或现金提取均有效，并且将通过您和公司协定的通讯方式单独通知您。&nbsp;<br/>8 预付卡目前不允许从自动柜员机（“ATM”）取现。&nbsp;<br/>9 一旦账户中所有余额都被扣除，预付卡对于任何购买行为不再有效，但对于余额查询和交易细节核对仍然有效。&nbsp;<br/>10 预付卡不能用于任何违法或不道德的活动，除此之外，还有非法赌博、洗钱和恐怖主义融资。我们保留拒绝任何由我们全权认为可疑、非法或不正常交易的权利。例如，根据银联国际的政策决定的任何商户类别的交易，包括但不限于房地产销售、农村地区汽车销售、卡车经销商销售和罚款，或者我们可能不时发布的其他商户等。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">外汇交易&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">11 每笔外汇交易的金额将以在兑换日期参考中国银联采用的最佳汇率决定的汇率转换为新加坡元。&nbsp;<br/>12 如果外汇交易是使用预付卡进行的，需为此种交易（可能在某些时段由我们指定免除或者其他情况，由我们全权决定）付1%的转换费（目前免除），以及其他费用，我们可能不时在网站或相关宣传材料上发布或详细说明；以及中国银联可能不时向我们收取的交易征费，将从账户中扣除。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">可用余额查询&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">13 不会发布任何时段关于账户的任何声明。&nbsp;<br/>14 您可以通过访问我们的网站<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>来查询账户中的预付值余额和交易细节。此服务不收取额外费用。另外，您可以在办公时间亲自到我们的办公室来查询您账户中的剩余预付值。&nbsp;<br/>15 目前在ATM机不提供余额查询服务。&nbsp;<br/>16 您可以通过访问我们的网站<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>查询交易历史，而不收取额外费用。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">预付卡丢失或被盗/未授权交易/忘记PIN&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">17 如果预付卡丢失、被盗或未经持卡人授权而使用，我们将不退还持卡人账户的任何预付值。我们将不承担由遗失、盗窃或由未经授权使用预付卡等行为引起的持卡人损失。&nbsp;<br/>18 持卡人忘记PIN的情况下，我们不会向持卡人重发PIN，除非您能够证明卡是属于您的。例如，能够回忆起过去的月份中三次交易是卡所有权的一个关键证明。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">替换预付卡&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">19 您可以在到期日前的任何时间向我们报告卡已经失效。在失效卡返还给我们注销的前提下，由我方全权酌情决定，用新预付卡替换旧的失效卡，该新卡上的金额为该账户剩余的未用预付值，供到期日前使用。不是由持卡人的错误而引起的卡片故障，将免费发放替换预付卡。&nbsp;<br/>20 如果由于您的错误使用而损坏了预付卡，我们可能全权决定用新的预付卡来替换，账户中保留可用的未使用预付值，直到截止日期为止，条件是损坏的/故障的预付卡退还给我们以作废。在这种情况下，将自动从账户中扣除10新加坡元的替换费用。&nbsp;<br/>21 为了保护您的账户，您可能被要求提供您的身份证明，以用于替换预付卡服务。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">账户管理费&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">22 通常没有账户管理费或年费，除非预付卡自发行日起一年后，达到一整个日历月闲置或没发生购买活动。每张卡每个闲置完整日历月（即，在一个完整的日历月没有发生购买交易）的1新加坡元的账户管理费将被扣除。该费用从购卡日起的第13个月开始将可以收取，并可于每个闲置月的最后一个日历日从账户上扣除。通常，在闲置月后第一个日历日从账户上收取和扣除。对预付卡按照上述第19和20段落更换的情况，从原预付卡购买之日起的第13个月，对任何闲置月将收取闲置账户管理费。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">截止日期和转移&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">23 预付卡应在截止日期前使用。每张卡均有一个截止日期，还有一个嵌入式芯片，该芯片也有截止日期。如果预付卡的截止日期比嵌入式芯片的截止日期早，收到持卡人申请时，本公司判断后，可延长预付卡的截止日期。收到申请后，由本公司全权酌情决定，将期限延长到嵌入式芯片的截止日期，但不应超过该芯片的截止日期。收到申请后，由本公司全权酌情决定，将新的有同样卡值的预付卡发给原持卡人。&nbsp;<br/>24 截止日期满时，如果账户上还有未用的预付值，您可以在截止日期满前三个月内，经我方判断后，通过再充值200新加坡元或合法的较少金额激活未用的到期预付值。到期预付卡值的总额度加上再充值额度不能超过999新加坡元，除非是个性化预付卡（履行了正确的KYC程序）。为保护您的账户，您可能被要求为这类重新激活申请提供身份证明。任何账户均不允许分开，由我方最终判断和决定。&nbsp;<br/>25任何商户只能向有效的预付卡返还资金。我们将不接受任何商户向到期的或无效的预付卡返还资金。&nbsp;<br/>26 一旦过了截止日期，预付卡将不能再使用，并且账户上未用的预付值也不予返还，只能按照上述第24段重新激活。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">免除责任&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">27 公司对于任何商户拒绝接受预付卡支付的任何交易不负有责任。任何情况下我们不负责处理与任何交易相关的纠纷或其他任何事务。&nbsp;<br/>28 由于使用预付卡，或与使用预付卡相关的活动而引起的您或任何第三方可能遭受的损失或损害，我们不负责任。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">终止&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">29 我们可随时终止预付卡和/或任何提供给您的服务，如前面条款和条件所述，或在事先没有给予任何通知或理由的情况下拒绝任何交易。我们不承担由于终止服务或拒绝交易而使您可能直接或间接遭受的任何损失或损害，无论其性质如何。&nbsp;<br/>一旦终止，预付卡应按要求返回给我们。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">个人资料&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">30 在预付卡发放过程中，您同意为公司提供准确、完整的个人信息。 我们将使用您给我们的信息，以及我们从您使用预付卡时得到的信息，在符合公司内部政策的情况下，为您享受任何预付卡服务或其他用途提供方便。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">修正案&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">31 我们可能全权决定修改这些条款和条件，并通过发布修正案或在网站上更新来立即生效。我们可能不时在<a href=\"https://www.sinocard.sg/\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(39, 162, 223); text-decoration-line: none; outline: none;\">www.sinocard.sg</a>网站上发布与预付卡相关的所有信息。&nbsp;<br/>32 修正案生效后，对预付卡的保留或使用将相当于您接受了修正案，不论您是否实际在之前注意到或有所了解。所有的问题和纠纷将服从我们的最终决定。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">法律及司法权&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">33 条款和条件应依照新加坡法律管理和解释，持卡人在此不可撤销地服从新加坡法院的专属管辖权。&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; color: rgb(60, 60, 60);\">总则&nbsp;<br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 20px; color: rgb(144, 149, 151); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;\">34 如果任何时间，这些条款和条件成为非法、无效或在任何方面不可执行的，其余条款和规定应不受影响和损害。&nbsp;<br/>35 条款和条件用英文和中文写成。若在英文和中文版本的条款和条件之间有冲突，以英文版本为准。&nbsp;</p><p><br/></p>', '1532418322', '1');

-- ----------------------------
-- Table structure for `sh_payment`
-- ----------------------------
DROP TABLE IF EXISTS `sh_payment`;
CREATE TABLE `sh_payment` (
  `payment_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '名称',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='支付方式';

-- ----------------------------
-- Records of sh_payment
-- ----------------------------
INSERT INTO `sh_payment` VALUES ('1', '现金', '1531991332', '1');
INSERT INTO `sh_payment` VALUES ('2', '微信', '1531992627', '1');

-- ----------------------------
-- Table structure for `sh_points`
-- ----------------------------
DROP TABLE IF EXISTS `sh_points`;
CREATE TABLE `sh_points` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '积分ID',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `userrank` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户身份',
  `points` int(11) NOT NULL DEFAULT '0' COMMENT '积分数',
  `pointstime` int(10) NOT NULL DEFAULT '0' COMMENT '积分时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户积分表';

-- ----------------------------
-- Records of sh_points
-- ----------------------------
INSERT INTO `sh_points` VALUES ('1', '6', '0', '2000', '1399357344');
INSERT INTO `sh_points` VALUES ('2', '6', '0', '1700', '1399357990');
INSERT INTO `sh_points` VALUES ('3', '6', '0', '900', '1399518442');
INSERT INTO `sh_points` VALUES ('4', '6', '0', '700', '1399519441');

-- ----------------------------
-- Table structure for `sh_projects`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects`;
CREATE TABLE `sh_projects` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '项目ID',
  `pnumber` varchar(255) NOT NULL DEFAULT '' COMMENT '项目编号',
  `pname` varchar(255) NOT NULL DEFAULT '' COMMENT '项目名称',
  `eid` int(11) NOT NULL DEFAULT '0' COMMENT '雇佣者ID',
  `budget` decimal(9,1) NOT NULL DEFAULT '0.0' COMMENT '项目预算',
  `monetary_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '币值id',
  `examine_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  `biddingtime` int(11) NOT NULL DEFAULT '0' COMMENT '竞标时长（小时）',
  `projecttime` int(11) NOT NULL DEFAULT '0' COMMENT '项目时长（小时）',
  `needskills` text NOT NULL COMMENT '项目所需技能 从技能表中选择中级以，隔开',
  `classify_id` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '项目类别id',
  `description` text NOT NULL COMMENT '项目描述',
  `work_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '工作人数',
  `delivery` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '投递人数',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '项目状态 0:竞标中;1:开发中;2:完成',
  `addtime` bigint(15) NOT NULL DEFAULT '0' COMMENT '项目发布时间',
  `endtime` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '项目结束或中止时间',
  `enclosure` text NOT NULL COMMENT '附件',
  `remark` text NOT NULL COMMENT '备注',
  `have_in` enum('1','2') NOT NULL DEFAULT '1' COMMENT '是否缴纳项目金额1:否;2:是;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pnumber` (`pnumber`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='项目表';

-- ----------------------------
-- Records of sh_projects
-- ----------------------------
INSERT INTO `sh_projects` VALUES ('1', '201807211838478523', '大闹天宫', '1', '200000.0', '2', '2', '12', '300', '', '11', '孙悟空大闹天宫', '1', '1', '1', '1532169527', '1532172527', '', '', '2');
INSERT INTO `sh_projects` VALUES ('2', '201807211842448931', '饿了么', '1', '1000000.0', '1', '1', '13', '600', '', '1', '点餐系统', '0', '0', '0', '1532169764', '0', '', '', '1');
INSERT INTO `sh_projects` VALUES ('3', '201807211844277685', '百度', '1', '100000.0', '1', '1', '5', '200', '', '8', '百度页面', '0', '0', '0', '1532169867', '0', 'Uploads/projectFile/201807211844277685/5b530e8b275e0.png', '', '1');
INSERT INTO `sh_projects` VALUES ('4', '201807271518559839', '贪玩蓝月', '1', '70000.0', '1', '1', '12', '500', '', '4', '网页游戏', '0', '0', '0', '1532675935', '0', '', '', '1');
INSERT INTO `sh_projects` VALUES ('5', '201807271524472546', '龙之谷', '1', '200000.0', '1', '1', '24', '700', '', '4', '大型网游', '0', '0', '0', '1532676287', '0', '', '', '1');

-- ----------------------------
-- Table structure for `sh_projects_answer`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_answer`;
CREATE TABLE `sh_projects_answer` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(20) unsigned NOT NULL COMMENT '问题id',
  `worker_id` int(20) unsigned NOT NULL COMMENT '工作id',
  `answer` text NOT NULL COMMENT '答案',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='项目答案表';

-- ----------------------------
-- Records of sh_projects_answer
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_projects_applic`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_applic`;
CREATE TABLE `sh_projects_applic` (
  `projects_id` int(20) unsigned NOT NULL,
  `applic_id` int(20) unsigned NOT NULL,
  PRIMARY KEY (`projects_id`,`applic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目关联行业表';

-- ----------------------------
-- Records of sh_projects_applic
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_projects_frame`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_frame`;
CREATE TABLE `sh_projects_frame` (
  `projects_id` int(20) unsigned NOT NULL,
  `frame_id` int(20) unsigned NOT NULL,
  PRIMARY KEY (`projects_id`,`frame_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='项目关联框架表';

-- ----------------------------
-- Records of sh_projects_frame
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_projects_question`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_question`;
CREATE TABLE `sh_projects_question` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `projects_id` int(20) unsigned NOT NULL COMMENT '项目id',
  `question` text NOT NULL COMMENT '问题',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='项目问题表';

-- ----------------------------
-- Records of sh_projects_question
-- ----------------------------
INSERT INTO `sh_projects_question` VALUES ('1', '4', '网游用什么框架开发比较好？', '1', '0');
INSERT INTO `sh_projects_question` VALUES ('2', '5', '磨具用什么', '1', '0');
INSERT INTO `sh_projects_question` VALUES ('3', '5', '底层用什么', '1', '0');
INSERT INTO `sh_projects_question` VALUES ('4', '5', '数据库用什么', '1', '0');

-- ----------------------------
-- Table structure for `sh_projects_skill`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_skill`;
CREATE TABLE `sh_projects_skill` (
  `projects_id` int(20) unsigned NOT NULL COMMENT '项目id',
  `skill_id` int(20) unsigned NOT NULL COMMENT '技能id',
  PRIMARY KEY (`skill_id`,`projects_id`),
  KEY `id` (`projects_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目技能关联表';

-- ----------------------------
-- Records of sh_projects_skill
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_projects_worker`
-- ----------------------------
DROP TABLE IF EXISTS `sh_projects_worker`;
CREATE TABLE `sh_projects_worker` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `projects_id` int(20) unsigned NOT NULL COMMENT '项目id',
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `bond` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '保证金',
  `monetary_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '币值id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:协商中;2:合作中;3:项目未完成;4:项目完成一部分;5:项目完成;',
  `result` enum('1','2','0') NOT NULL DEFAULT '0' COMMENT '投标结果 0:竞争中;1:失败;2:成功;',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '投递时间',
  `hand_in` enum('1','2') NOT NULL DEFAULT '1' COMMENT '保证金上交状态 1:未交;2:已交;',
  `end_time` bigint(15) unsigned NOT NULL COMMENT '结束日期',
  `percentage` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '完成百分比 max:100',
  `enclosure` text NOT NULL COMMENT '约定明细',
  `attachment` varchar(50) NOT NULL COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='项目投标人';

-- ----------------------------
-- Records of sh_projects_worker
-- ----------------------------
INSERT INTO `sh_projects_worker` VALUES ('1', '1', '1', '300.00', '2', '2', '2', '1532169700', '2', '0', '10', '', '');

-- ----------------------------
-- Table structure for `sh_question`
-- ----------------------------
DROP TABLE IF EXISTS `sh_question`;
CREATE TABLE `sh_question` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(20) unsigned NOT NULL COMMENT '类型',
  `title` varchar(100) NOT NULL COMMENT '问题标题',
  `content` text NOT NULL COMMENT '解决方法',
  `praise` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞数',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='常见问题';

-- ----------------------------
-- Records of sh_question
-- ----------------------------
INSERT INTO `sh_question` VALUES ('1', '1', '怎么卸载软件', '<p>由于手机系统或者型号各不相同，</p><p>您可以尝试在手机桌面长按微信图标，</p><p>再点击图标边上的“X”，</p><p>或者拖动图标到屏幕边上的“卸载”即可卸载软件。</p>', '0', '1532417983', '1');

-- ----------------------------
-- Table structure for `sh_question_type`
-- ----------------------------
DROP TABLE IF EXISTS `sh_question_type`;
CREATE TABLE `sh_question_type` (
  `type_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT '名称',
  `icon` varchar(100) NOT NULL COMMENT '图标',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='常见问题类型';

-- ----------------------------
-- Records of sh_question_type
-- ----------------------------
INSERT INTO `sh_question_type` VALUES ('1', '其他功能', '', '1532413158', '1');

-- ----------------------------
-- Table structure for `sh_rank`
-- ----------------------------
DROP TABLE IF EXISTS `sh_rank`;
CREATE TABLE `sh_rank` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `rank_id` int(20) unsigned NOT NULL COMMENT '规则id',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='rank分数更改记录';

-- ----------------------------
-- Records of sh_rank
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_rank_rule`
-- ----------------------------
DROP TABLE IF EXISTS `sh_rank_rule`;
CREATE TABLE `sh_rank_rule` (
  `rank_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '名称',
  `content` text NOT NULL COMMENT '描述',
  `score` float(10,2) NOT NULL COMMENT '分数  减分值为负',
  `create_id` int(20) unsigned NOT NULL COMMENT '创建人id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `change_time` bigint(15) unsigned NOT NULL COMMENT '修改时间 最近',
  `change` varchar(50) NOT NULL COMMENT '修改人名称',
  PRIMARY KEY (`rank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='rank积分规则';

-- ----------------------------
-- Records of sh_rank_rule
-- ----------------------------
INSERT INTO `sh_rank_rule` VALUES ('1', '新用户注册', '基础积分', '888.00', '1', '1', '1531968639', '1531972825', 'admin');
INSERT INTO `sh_rank_rule` VALUES ('2', '未完成', '未完成一项要求', '-10.00', '1', '1', '1531969561', '0', '0');

-- ----------------------------
-- Table structure for `sh_skill`
-- ----------------------------
DROP TABLE IF EXISTS `sh_skill`;
CREATE TABLE `sh_skill` (
  `skill_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '技能名称',
  `createtime` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常;',
  PRIMARY KEY (`skill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='技能表';

-- ----------------------------
-- Records of sh_skill
-- ----------------------------
INSERT INTO `sh_skill` VALUES ('1', '.Net', '1532071107', '1');
INSERT INTO `sh_skill` VALUES ('2', 'Academic Writing', '1532141487', '1');
INSERT INTO `sh_skill` VALUES ('3', 'ActionScript', '1532141532', '1');
INSERT INTO `sh_skill` VALUES ('4', 'C Programming', '1532141763', '1');
INSERT INTO `sh_skill` VALUES ('5', 'C# Programming', '1532141779', '1');
INSERT INTO `sh_skill` VALUES ('6', 'C++ Programming', '1532141791', '1');
INSERT INTO `sh_skill` VALUES ('7', 'Data Scraping', '1532151594', '1');

-- ----------------------------
-- Table structure for `sh_stationmail`
-- ----------------------------
DROP TABLE IF EXISTS `sh_stationmail`;
CREATE TABLE `sh_stationmail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '消息编号',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '消息标题',
  `senderid` int(11) NOT NULL DEFAULT '0' COMMENT '发送用户ID',
  `receiverid` int(11) NOT NULL DEFAULT '0' COMMENT '接收用户ID',
  `sendtime` int(10) NOT NULL DEFAULT '0' COMMENT '发送时间',
  `content` text NOT NULL COMMENT '消息内容',
  `outstatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '发送的状态',
  `instatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '接收的状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='站内信表';

-- ----------------------------
-- Records of sh_stationmail
-- ----------------------------
INSERT INTO `sh_stationmail` VALUES ('1', '你好', '1', '5', '1399356549', '这是一个站内信', '0', '1');
INSERT INTO `sh_stationmail` VALUES ('2', '你好', '5', '1', '1399356593', '回复站内信', '0', '1');
INSERT INTO `sh_stationmail` VALUES ('3', 'fdsafsafdsa', '5', '3', '1399356659', 'sdafdsafsd', '2', '0');
INSERT INTO `sh_stationmail` VALUES ('4', 'sadfadsf', '5', '5', '1399356684', 'hello', '1', '2');
INSERT INTO `sh_stationmail` VALUES ('5', 'wrewr', '5', '3', '1399359578', 'werewqrew', '1', '0');

-- ----------------------------
-- Table structure for `sh_statistics`
-- ----------------------------
DROP TABLE IF EXISTS `sh_statistics`;
CREATE TABLE `sh_statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '统计编号',
  `utotal` int(11) NOT NULL DEFAULT '0' COMMENT '用户总数',
  `ptotal` int(11) NOT NULL DEFAULT '0' COMMENT '项目总数',
  `atotal` decimal(20,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '项目总金额',
  `time` bigint(15) unsigned NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='统计表';

-- ----------------------------
-- Records of sh_statistics
-- ----------------------------
INSERT INTO `sh_statistics` VALUES ('1', '20', '10', '30000.00', '0');

-- ----------------------------
-- Table structure for `sh_sysaccount`
-- ----------------------------
DROP TABLE IF EXISTS `sh_sysaccount`;
CREATE TABLE `sh_sysaccount` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `projects_id` int(10) unsigned NOT NULL COMMENT '项目id',
  `pnumber` varchar(255) NOT NULL DEFAULT '' COMMENT '项目编号',
  `prestore` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额',
  `monetary_id` int(20) unsigned NOT NULL COMMENT ' 币值',
  `income` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '项目收益',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '项目状态  0:收入;1:支出;',
  `type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '类型  1:项目预收;2:保证金;3:酬谢金;4:赔偿金;',
  `prestoretime` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`id`,`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统账户表';

-- ----------------------------
-- Records of sh_sysaccount
-- ----------------------------
INSERT INTO `sh_sysaccount` VALUES ('1', '2', '1', '201807211838478523', '60000.00', '1', '0.00', '0', '1', '1532592728');

-- ----------------------------
-- Table structure for `sh_syslog`
-- ----------------------------
DROP TABLE IF EXISTS `sh_syslog`;
CREATE TABLE `sh_syslog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '日志ID',
  `operator` varchar(50) NOT NULL DEFAULT '' COMMENT '操作员',
  `behavior` varchar(255) NOT NULL DEFAULT '' COMMENT '行为',
  `operand` varchar(50) NOT NULL DEFAULT '' COMMENT '对象',
  `result` text NOT NULL COMMENT '操作结果',
  `dateline` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COMMENT='系统日志表';

-- ----------------------------
-- Records of sh_syslog
-- ----------------------------
INSERT INTO `sh_syslog` VALUES ('1', 'admin', '登出', '系统', '成功', '1532078007');
INSERT INTO `sh_syslog` VALUES ('2', 'admin', '登录', '系统', '成功', '1532078026');
INSERT INTO `sh_syslog` VALUES ('3', 'admin', '添加', '项目技能', '名称=php', '1532141487');
INSERT INTO `sh_syslog` VALUES ('4', 'admin', '添加', '项目技能', '名称=c', '1532141532');
INSERT INTO `sh_syslog` VALUES ('5', 'admin', '修改', '项目技能', 'skill_id=2', '1532141721');
INSERT INTO `sh_syslog` VALUES ('6', 'admin', '修改', '项目技能', 'skill_id=2', '1532141727');
INSERT INTO `sh_syslog` VALUES ('7', 'admin', '修改', '项目技能', 'skill_id=3', '1532141743');
INSERT INTO `sh_syslog` VALUES ('8', 'admin', '添加', '项目技能', '名称=C Programming', '1532141763');
INSERT INTO `sh_syslog` VALUES ('9', 'admin', '添加', '项目技能', '名称=C# Programming', '1532141779');
INSERT INTO `sh_syslog` VALUES ('10', 'admin', '添加', '项目技能', '名称=C++ Programming', '1532141791');
INSERT INTO `sh_syslog` VALUES ('11', 'admin', '添加', '项目技能', '名称=Data Scraping', '1532151594');
INSERT INTO `sh_syslog` VALUES ('12', 'admin', '修改', '项目技能', 'skill_id=7', '1532151602');
INSERT INTO `sh_syslog` VALUES ('13', 'admin', '修改', '项目技能', 'skill_id=7', '1532151609');
INSERT INTO `sh_syslog` VALUES ('14', 'admin', '修改', '项目技能', 'skill_id=3', '1532151670');
INSERT INTO `sh_syslog` VALUES ('15', 'admin', '添加', '币值', '名称=美元', '1532152399');
INSERT INTO `sh_syslog` VALUES ('16', 'admin', '修改', '币值', 'monetary_id=2', '1532152406');
INSERT INTO `sh_syslog` VALUES ('17', 'admin', '修改', '币值', 'monetary_id=2', '1532152408');
INSERT INTO `sh_syslog` VALUES ('18', 'admin', '修改', '币值', 'monetary_id=2', '1532152420');
INSERT INTO `sh_syslog` VALUES ('19', 'admin', '添加', '行业分类', '名称=水果', '1532155085');
INSERT INTO `sh_syslog` VALUES ('20', 'admin', '添加', '行业分类', '名称=建筑', '1532155095');
INSERT INTO `sh_syslog` VALUES ('21', 'admin', '修改', '行业分类', 'applic_id=2', '1532155098');
INSERT INTO `sh_syslog` VALUES ('22', 'admin', '修改', '行业分类', 'applic_id=2', '1532155100');
INSERT INTO `sh_syslog` VALUES ('23', 'admin', '添加', '框架分类', '名称=thinkphp3.20', '1532155391');
INSERT INTO `sh_syslog` VALUES ('24', 'admin', '添加', '框架分类', '名称=thinkphp5.0', '1532155422');
INSERT INTO `sh_syslog` VALUES ('25', 'admin', '添加', '项目信息', '名称=防守打法', '1532169240');
INSERT INTO `sh_syslog` VALUES ('26', 'admin', '添加', '项目信息', '名称=大闹天宫', '1532169527');
INSERT INTO `sh_syslog` VALUES ('27', 'admin', '添加', '项目信息', '名称=饿了么', '1532169764');
INSERT INTO `sh_syslog` VALUES ('28', 'admin', '添加', '项目信息', '名称=百度', '1532169867');
INSERT INTO `sh_syslog` VALUES ('29', 'admin', '登录', '系统', '成功', '1532317846');
INSERT INTO `sh_syslog` VALUES ('30', 'admin', '修改', '审核项目状态', '项目id=1', '1532325985');
INSERT INTO `sh_syslog` VALUES ('31', 'admin', '修改', '审核项目状态', '项目id=1', '1532326043');
INSERT INTO `sh_syslog` VALUES ('32', 'admin', '修改', '审核项目状态', '项目id=1', '1532326244');
INSERT INTO `sh_syslog` VALUES ('33', 'admin', '修改', '评论', 'id = 3的状态', '1532330083');
INSERT INTO `sh_syslog` VALUES ('34', 'admin', '修改', '评论', 'id = 2的状态', '1532330121');
INSERT INTO `sh_syslog` VALUES ('35', 'admin', '修改', '评论', 'id = 2的状态', '1532330205');
INSERT INTO `sh_syslog` VALUES ('36', 'admin', '修改', '评论', 'id = 1的状态', '1532330271');
INSERT INTO `sh_syslog` VALUES ('37', 'admin', '添加', '问题数据', '名称=花儿为什么这么红', '1532340824');
INSERT INTO `sh_syslog` VALUES ('38', 'admin', '修改', '审核项目状态', '失败', '1532343911');
INSERT INTO `sh_syslog` VALUES ('39', 'admin', '修改', '审核项目状态', '项目id=1', '1532343949');
INSERT INTO `sh_syslog` VALUES ('40', 'admin', '修改', '审核项目状态', '项目id=1', '1532343953');
INSERT INTO `sh_syslog` VALUES ('41', 'admin', '修改', '审核项目状态', '项目id=1', '1532343955');
INSERT INTO `sh_syslog` VALUES ('42', 'admin', '登录', '系统', '成功', '1532397776');
INSERT INTO `sh_syslog` VALUES ('43', 'admin', '添加', '常见问题分类', '名称=其他功能', '1532413158');
INSERT INTO `sh_syslog` VALUES ('44', 'admin', '添加', '添加常见问题', '名称=', '1532413792');
INSERT INTO `sh_syslog` VALUES ('45', 'admin', '修改', '常见问题', 'id=1', '1532414747');
INSERT INTO `sh_syslog` VALUES ('46', 'admin', '修改', '常见问题', 'id=1', '1532414751');
INSERT INTO `sh_syslog` VALUES ('47', 'admin', '修改', '常见问题', 'id=1', '1532415806');
INSERT INTO `sh_syslog` VALUES ('48', 'admin', '添加', '添加常见问题', '名称=', '1532417819');
INSERT INTO `sh_syslog` VALUES ('49', 'admin', '添加', '添加常见问题', '名称=', '1532417983');
INSERT INTO `sh_syslog` VALUES ('50', 'admin', '添加', '添加常见问题', '名称=', '1532418014');
INSERT INTO `sh_syslog` VALUES ('51', 'admin', '添加', '添加常见问题', '名称=', '1532418322');
INSERT INTO `sh_syslog` VALUES ('52', 'admin', '登录', '系统', '失败,密码错误！', '1532484537');
INSERT INTO `sh_syslog` VALUES ('53', 'admin', '登录', '系统', '成功', '1532484545');
INSERT INTO `sh_syslog` VALUES ('54', 'admin', '添加', '上架项目', '名称=大闹天宫', '1532500027');
INSERT INTO `sh_syslog` VALUES ('55', 'admin', '修改', '上架项目', '失败', '1532500179');
INSERT INTO `sh_syslog` VALUES ('56', 'admin', '修改', '上架项目', '失败', '1532500324');
INSERT INTO `sh_syslog` VALUES ('57', 'admin', '修改', '上架项目', '失败', '1532500411');
INSERT INTO `sh_syslog` VALUES ('58', 'admin', '修改', '审核项目状态', '项目id=1', '1532500448');
INSERT INTO `sh_syslog` VALUES ('59', 'admin', '修改', '上架项目', '失败', '1532500508');
INSERT INTO `sh_syslog` VALUES ('60', 'admin', '修改', '上架项目', '失败', '1532500630');
INSERT INTO `sh_syslog` VALUES ('61', 'admin', '修改', '上架项目', '失败', '1532500638');
INSERT INTO `sh_syslog` VALUES ('62', 'admin', '修改', '上架项目', '项目id=1', '1532500670');
INSERT INTO `sh_syslog` VALUES ('63', 'admin', '登录', '系统', '成功', '1532506915');
INSERT INTO `sh_syslog` VALUES ('64', 'admin', '登录', '系统', '成功', '1532506937');
INSERT INTO `sh_syslog` VALUES ('65', 'admin', '登录', '系统', '成功', '1532571699');
INSERT INTO `sh_syslog` VALUES ('66', 'admin', '修改', '币值', 'monetary_id=1', '1532583441');
INSERT INTO `sh_syslog` VALUES ('67', 'admin', '修改', '币值', 'monetary_id=2', '1532583450');
INSERT INTO `sh_syslog` VALUES ('68', 'admin', '添加', '项目信息', '名称=贪玩蓝月', '1532675935');
INSERT INTO `sh_syslog` VALUES ('69', 'admin', '添加', '项目信息', '名称=龙之谷', '1532676287');
INSERT INTO `sh_syslog` VALUES ('70', 'admin', '登录', '系统', '成功', '1532744404');
INSERT INTO `sh_syslog` VALUES ('71', 'admin', '登录', '系统', '成功', '1532917426');
INSERT INTO `sh_syslog` VALUES ('72', 'admin', '登出', '系统', '成功', '1532922821');
INSERT INTO `sh_syslog` VALUES ('73', 'zhangsan', '登录', '系统', '成功', '1532922834');
INSERT INTO `sh_syslog` VALUES ('74', 'zhangsan', '登出', '系统', '成功', '1532922904');
INSERT INTO `sh_syslog` VALUES ('75', 'admin', '登录', '系统', '成功', '1532922941');
INSERT INTO `sh_syslog` VALUES ('76', 'admin', '修改', '管理员组', 'id = 2', '1532928513');
INSERT INTO `sh_syslog` VALUES ('77', 'admin', '登出', '系统', '成功', '1532928517');
INSERT INTO `sh_syslog` VALUES ('78', 'zhangsan', '登录', '系统', '成功', '1532928525');
INSERT INTO `sh_syslog` VALUES ('79', 'zhangsan', '修改', '审核项目状态', '项目id=1', '1532928621');
INSERT INTO `sh_syslog` VALUES ('80', 'zhangsan', '修改', '审核项目状态', '项目id=1', '1532928623');
INSERT INTO `sh_syslog` VALUES ('81', 'zhangsan', '登出', '系统', '成功', '1532929583');
INSERT INTO `sh_syslog` VALUES ('82', 'admin', '登录', '系统', '成功', '1532929589');

-- ----------------------------
-- Table structure for `sh_sysmanage`
-- ----------------------------
DROP TABLE IF EXISTS `sh_sysmanage`;
CREATE TABLE `sh_sysmanage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '网站标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '网站关键字',
  `description` text NOT NULL COMMENT '网站描述',
  `phone` varchar(100) NOT NULL DEFAULT '' COMMENT '客服电话',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '客服邮箱',
  `lasttime` int(10) NOT NULL DEFAULT '0' COMMENT '最后修改时间',
  `logo` varchar(100) NOT NULL DEFAULT '/Public/Images/logo.png' COMMENT '网站logo',
  `icon` varchar(100) NOT NULL DEFAULT '/Public/Images/favicon.ico' COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
-- Records of sh_sysmanage
-- ----------------------------
INSERT INTO `sh_sysmanage` VALUES ('1', '83bid', '威客,网站制作,LOGO制作', '这是网站的描述', '40012345678', 'admin@yxtuwen.com', '1531796970', '/Public/Images/logo.png', '/Public/Images/favicon.ico');

-- ----------------------------
-- Table structure for `sh_third_users`
-- ----------------------------
DROP TABLE IF EXISTS `sh_third_users`;
CREATE TABLE `sh_third_users` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `expire_time` bigint(15) unsigned NOT NULL COMMENT 'token过期时间',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '绑定时间',
  `login_times` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '登录次数',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `third_party` varchar(255) NOT NULL COMMENT '第三方惟一码',
  `app_id` varchar(255) NOT NULL COMMENT '第三方应用id',
  `access_token` varchar(255) NOT NULL COMMENT '第三方授权码',
  `openid` varchar(100) NOT NULL COMMENT '第三方用户id',
  `union_id` varchar(255) NOT NULL COMMENT '第三方用户多个产品中的惟一',
  `more` text COMMENT '扩展信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方登录';

-- ----------------------------
-- Records of sh_third_users
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_useraccount`
-- ----------------------------
DROP TABLE IF EXISTS `sh_useraccount`;
CREATE TABLE `sh_useraccount` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `transcash` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '转账金额',
  `payment_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '支付方式id',
  `monetary_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '币值',
  `transtype` tinyint(4) NOT NULL DEFAULT '1' COMMENT '转账类型 1:充值; 2:提现;',
  `transinfo` text NOT NULL COMMENT '转账说明信息',
  `transid` int(11) NOT NULL DEFAULT '0' COMMENT '交易ID',
  `transtime` bigint(15) NOT NULL DEFAULT '0' COMMENT '转账时间',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '账户余额',
  `bank_id` int(20) unsigned NOT NULL COMMENT '银行卡id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户账户表';

-- ----------------------------
-- Records of sh_useraccount
-- ----------------------------
INSERT INTO `sh_useraccount` VALUES ('1', '2', '19.00', '1', '1', '1', '                                                ', '2', '1532403086', '0.00', '0');
INSERT INTO `sh_useraccount` VALUES ('2', '2', '19.00', '1', '1', '2', '                                                ', '2', '1532403108', '0.00', '0');

-- ----------------------------
-- Table structure for `sh_users`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users`;
CREATE TABLE `sh_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `uname` varchar(50) NOT NULL DEFAULT '' COMMENT '用户登录名',
  `neckname` varchar(50) NOT NULL COMMENT '用户昵称',
  `pwd` varchar(32) NOT NULL DEFAULT '' COMMENT '用户登录密码',
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg' COMMENT '用户头像',
  `phone` varchar(50) NOT NULL DEFAULT '' COMMENT '用户电话',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '用户电子邮箱',
  `account` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '用户账户',
  `location` varchar(255) NOT NULL DEFAULT '' COMMENT '用户所在地',
  `dlevel` decimal(2,2) NOT NULL DEFAULT '0.00' COMMENT '用户评分',
  `skills` text NOT NULL COMMENT '开发者技能 中间用，隔开',
  `abstract` text NOT NULL COMMENT '摘要',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '账号状态',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '用户账号创建时间',
  `activation_key` varchar(100) DEFAULT NULL COMMENT '激活码',
  `rank` int(20) NOT NULL DEFAULT '0' COMMENT 'rank积分',
  `certification` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '实名认证标识 1:未认证;2:提交认证中;3:认证失败;4:认证成功;',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of sh_users
-- ----------------------------
INSERT INTO `sh_users` VALUES ('1', 'duzhenlin', '', '6846860684f05029abccc09a53cd66f1', 'default.png', '15053192091', 'duzhenlin@vip.163.com', '9778.0', '山东济南', '0.00', 'php', 'jiay', '1', '1399355555', null, '888', '1');
INSERT INTO `sh_users` VALUES ('2', 'zhaoxiaolin', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', 'zxl@qq.com', '19900.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('3', 'heraie', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', 'heraie@qq.com', '19500.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('4', 'liusonghe', '', 'dc483e80a7a0bd9ef71d8cf973673924', '53687b73cd355.jpg', '110120119', '1234567677@qq.com', '18668.0', '北京', '0.00', 'php', '相信自己', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('5', 'hello', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', 'hello@qq.com', '19300.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('6', 'zh123456', '', '741a627471982d84d67177464d006a01', 'default.jpg', '18612345678', 'zh123456@qq.com', '25162.0', '三门峡', '0.00', '', '我是一名PHP程序员。可以独立开发网站。前段做的也还不错！', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('7', 'zh654321', '', '741a627471982d84d67177464d006a01', 'default.jpg', '', 'zh654321@qq.com', '16300.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('8', 'yangmeng', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', '1234567677@qq.com', '20000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('9', 'xiaokebi', '', 'dc483e80a7a0bd9ef71d8cf973673924', '536882c48aec2.jpg', '', '12342567677@qq.com', '20000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('10', 'zhuangeiwo', '', 'dc483e80a7a0bd9ef71d8cf973673924', '536883bd12b29.jpg', '', '121234567677@qq.com', '20000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('11', 'duzhenlin1', '', '36fefa84b2a64fdf0cffe495b62479d9', 'default.jpg', '', 'duzhenlin@vip.qq.com', '20000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('12', 'strlen', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', 'strlen@qq.com', '11900.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('13', 'array', '', 'dc483e80a7a0bd9ef71d8cf973673924', 'default.jpg', '', 'array@qq.com', '20000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');
INSERT INTO `sh_users` VALUES ('14', 'hupeng', '', '39ebbd615e4ecde61654f74ff7af7f9d', 'default.jpg', '', 'guchengwuyue@163.com', '19000.0', '', '0.00', '', '', '0', '1532071107', null, '888', '1');

-- ----------------------------
-- Table structure for `sh_users_bank`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users_bank`;
CREATE TABLE `sh_users_bank` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `bank_id` int(20) unsigned NOT NULL COMMENT '银行id',
  `bank_number` varchar(20) NOT NULL COMMENT '银行卡号码',
  `createtime` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:显示;2:被删除;',
  PRIMARY KEY (`id`,`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户银行卡管理';

-- ----------------------------
-- Records of sh_users_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_users_company`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users_company`;
CREATE TABLE `sh_users_company` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(20) unsigned NOT NULL COMMENT '用户id',
  `company` varchar(50) NOT NULL COMMENT '公司名称',
  `address` varchar(100) NOT NULL COMMENT '公司地址',
  `picture` text NOT NULL COMMENT '图片 序列化',
  `vadios` text COMMENT '视频 ',
  `more` text COMMENT '更多信息',
  `examine_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户工作公司认证';

-- ----------------------------
-- Records of sh_users_company
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_users_id_card`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users_id_card`;
CREATE TABLE `sh_users_id_card` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `real_name` varchar(50) NOT NULL COMMENT '真实姓名',
  `positive` varchar(100) NOT NULL COMMENT '身份证正面',
  `opposite` varchar(100) NOT NULL COMMENT '身份证反面',
  `face` varchar(100) NOT NULL COMMENT '人脸',
  `more` text NOT NULL COMMENT '更多信息',
  `examine_id` int(20) unsigned NOT NULL DEFAULT '1' COMMENT '审核id',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1:正常',
  `time` bigint(15) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `deletetime` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '删除标识  1:正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户身份证验证信息';

-- ----------------------------
-- Records of sh_users_id_card
-- ----------------------------

-- ----------------------------
-- Table structure for `sh_users_skill`
-- ----------------------------
DROP TABLE IF EXISTS `sh_users_skill`;
CREATE TABLE `sh_users_skill` (
  `id` int(20) unsigned NOT NULL COMMENT '用户id',
  `skill_id` int(20) unsigned NOT NULL COMMENT '技能id',
  PRIMARY KEY (`id`,`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_users_skill
-- ----------------------------
