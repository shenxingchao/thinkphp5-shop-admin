/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-13 16:52:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `sys_admin_log`;
CREATE TABLE `sys_admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `admin_id` int(11) unsigned NOT NULL COMMENT '管理员id',
  `log_time` int(10) unsigned NOT NULL COMMENT '操作时间',
  `log_info` varchar(255) NOT NULL COMMENT '操作内容',
  `log_ip` varchar(12) NOT NULL COMMENT 'ip',
  `log_url` varchar(255) NOT NULL COMMENT 'url',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_admin_log
-- ----------------------------
INSERT INTO `sys_admin_log` VALUES ('1', '1', '1503719764', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('2', '1', '1503720839', '登录', '10.3.9.50', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('3', '1', '1503722691', '添加管理员账号admin4', '127.0.0.1', '/admin/admin/admin_add');
INSERT INTO `sys_admin_log` VALUES ('4', '1', '1503722819', '添加角色访客', '127.0.0.1', '/admin/admin/admin_role_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('5', '1', '1503722951', '管理员编辑admin4', '127.0.0.1', '/admin/admin/admin_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('6', '1', '1503722955', '管理员编辑admin4', '127.0.0.1', '/admin/admin/admin_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('7', '1', '1503722960', '管理员编辑admin4', '127.0.0.1', '/admin/admin/admin_edit');
INSERT INTO `sys_admin_log` VALUES ('8', '1', '1503723138', '添加商品分类水晶葡萄', '127.0.0.1', '/admin/goods/goods_cat_add');
INSERT INTO `sys_admin_log` VALUES ('9', '1', '1503723196', '编辑商品分类8424西瓜', '127.0.0.1', '/admin/goods/goods_cat_edit');
INSERT INTO `sys_admin_log` VALUES ('10', '1', '1503723603', '添加商品测试商品001', '127.0.0.1', '/admin/goods/goods_add');
INSERT INTO `sys_admin_log` VALUES ('11', '1', '1503723672', '编辑商品测试商品001', '127.0.0.1', '/admin/goods/goods_edit');
INSERT INTO `sys_admin_log` VALUES ('12', '1', '1503727474', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('13', '1', '1503728229', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('14', '1', '1503730400', '登录', '10.3.9.50', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('15', '1', '1503730758', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('16', '1', '1503732365', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('17', '1', '1503732615', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('18', '1', '1503735111', '添加商品类型电器', '127.0.0.1', '/admin/goods/goods_type_add');
INSERT INTO `sys_admin_log` VALUES ('19', '1', '1503736003', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('20', '1', '1503736114', '编辑商品类型水果1', '127.0.0.1', '/admin/goods/goods_type_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('21', '1', '1503736122', '编辑商品类型水果', '127.0.0.1', '/admin/goods/goods_type_edit');
INSERT INTO `sys_admin_log` VALUES ('22', '1', '1503736241', '添加商品类型手机', '127.0.0.1', '/admin/goods/goods_type_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('23', '1', '1503879173', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('24', '1', '1503975238', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('25', '1', '1503993465', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('26', '1', '1504051821', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('27', '1', '1504059358', '添加商品属性分辨率', '127.0.0.1', '/admin/goods/goods_attr_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('28', '1', '1504059566', '添加商品属性尺寸', '127.0.0.1', '/admin/goods/goods_attr_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('29', '1', '1504060223', '添加商品属性颜色', '127.0.0.1', '/admin/goods/goods_attr_add');
INSERT INTO `sys_admin_log` VALUES ('30', '1', '1504077191', '编辑商品属性尺寸', '127.0.0.1', '/admin/goods/goods_attr_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('31', '1', '1504077201', '编辑商品属性尺寸', '127.0.0.1', '/admin/goods/goods_attr_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('32', '1', '1504077213', '编辑商品属性颜色', '127.0.0.1', '/admin/goods/goods_attr_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('33', '1', '1504077265', '添加商品属性测试删除', '127.0.0.1', '/admin/goods/goods_attr_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('34', '1', '1504079565', '添加商品分类aaa', '127.0.0.1', '/admin/goods/goods_cat_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('35', '1', '1504079579', '添加商品分类bbb', '127.0.0.1', '/admin/goods/goods_cat_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('36', '1', '1504140730', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('37', '1', '1504157982', '添加商品分类要被删除的', '127.0.0.1', '/admin/goods/goods_cat_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('38', '1', '1504158704', '编辑商品分类要被删除的啊', '127.0.0.1', '/admin/goods/goods_cat_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('39', '1', '1504158713', '编辑商品分类要被删除的啊', '127.0.0.1', '/admin/goods/goods_cat_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('40', '1', '1504158716', '编辑商品分类要被删除的', '127.0.0.1', '/admin/goods/goods_cat_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('41', '1', '1504158782', '编辑商品分类要被删除的啊', '127.0.0.1', '/admin/goods/goods_cat_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('42', '1', '1504158798', '编辑商品分类要被删除的啊', '127.0.0.1', '/admin/goods/goods_cat_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('43', '1', '1504159455', '编辑商品测试商品001', '127.0.0.1', '/admin/goods/goods_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('44', '1', '1504159477', '编辑商品测试商品001', '127.0.0.1', '/admin/goods/goods_edit');
INSERT INTO `sys_admin_log` VALUES ('45', '1', '1504161840', '添加商品11111', '127.0.0.1', '/admin/goods/goods_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('46', '1', '1504162868', '编辑商品11111', '127.0.0.1', '/admin/goods/goods_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('47', '1', '1504162872', '编辑商品11111', '127.0.0.1', '/admin/goods/goods_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('48', '1', '1504162876', '编辑商品测试商品001', '127.0.0.1', '/admin/goods/goods_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('49', '1', '1504162970', '添加商品测试少时诵诗书', '127.0.0.1', '/admin/goods/goods_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('50', '1', '1504163153', '登录', '10.3.9.50', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('51', '1', '1504167144', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('52', '1', '1504573175', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('53', '1', '1504574704', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('54', '1', '1504575772', '添加商品类型', '127.0.0.1', '/admin/goods/goods_type_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('55', '1', '1504585456', '添加角色系统管理员', '127.0.0.1', '/admin/admin/admin_role_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('56', '1', '1504585495', '添加角色商品管理员', '127.0.0.1', '/admin/admin/admin_role_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('57', '1', '1504585524', '添加角色超级管理员', '127.0.0.1', '/admin/admin/admin_role_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('58', '1', '1504585543', '添加角色访客', '127.0.0.1', '/admin/admin/admin_role_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('59', '1', '1504585855', '管理员编辑admin', '127.0.0.1', '/admin/admin/admin_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('60', '1', '1504585870', '管理员编辑admin2', '127.0.0.1', '/admin/admin/admin_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('61', '1', '1504585875', '管理员编辑admin3', '127.0.0.1', '/admin/admin/admin_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('62', '1', '1504586027', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('63', '1', '1504586288', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('64', '1', '1504586529', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('65', '2', '1504574692', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('66', '2', '1504586259', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('67', '2', '1504586469', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('68', '3', '1504586485', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('69', '4', '1504586507', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('70', '1', '1504601325', '登录', '127.0.0.1', '/admin/user/login.html');
INSERT INTO `sys_admin_log` VALUES ('71', '1', '1504682007', '登录', '127.0.0.1', '/admin/user/login');
INSERT INTO `sys_admin_log` VALUES ('72', '1', '1504683397', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('73', '1', '1504684038', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('74', '1', '1504684122', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('75', '1', '1504684639', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('76', '1', '1504688307', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('77', '1', '1505195454', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('78', '1', '1505200224', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('79', '1', '1505200809', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('80', '1', '1505202555', '添加商品规格尺寸', '127.0.0.1', '/admin/goods/goods_spec_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('81', '1', '1505202708', '添加商品规格尺寸', '127.0.0.1', '/admin/goods/goods_spec_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('82', '1', '1505203204', '添加商品规格颜色', '127.0.0.1', '/admin/goods/goods_spec_add\r\n');
INSERT INTO `sys_admin_log` VALUES ('83', '1', '1505261312', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('84', '1', '1505270749', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('85', '1', '1505280096', '编辑商品规格尺寸', '127.0.0.1', '/admin/goods/goods_spec_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('86', '1', '1505280140', '编辑商品规格风格', '127.0.0.1', '/admin/goods/goods_spec_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('87', '1', '1505280210', '编辑商品规格机身内存', '127.0.0.1', '/admin/goods/goods_spec_edit\r\n');
INSERT INTO `sys_admin_log` VALUES ('88', '1', '1505280496', '添加商品规格测试删除', '127.0.0.1', '/admin/goods/goods_spec_add');
INSERT INTO `sys_admin_log` VALUES ('89', '1', '1505288059', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('90', '1', '1505288690', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('91', '1', '1505290374', '登录', '127.0.0.1', '/admin/user/login.html\r\n');
INSERT INTO `sys_admin_log` VALUES ('92', '1', '1505290707', '登录', '127.0.0.1', '/admin/user/login.html');

-- ----------------------------
-- Table structure for sys_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_admin_role`;
CREATE TABLE `sys_admin_role` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL COMMENT '角色id',
  `privilege_id` varchar(255) NOT NULL COMMENT '权限id字符串',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_admin_role
-- ----------------------------
INSERT INTO `sys_admin_role` VALUES ('1', '系统管理员', '16,13');
INSERT INTO `sys_admin_role` VALUES ('2', '商品管理员', '1,3,4,5,6,17,13');
INSERT INTO `sys_admin_role` VALUES ('3', '超级管理员', '16,1,3,4,5,6,17,8,9,10,11,12,13,14');
INSERT INTO `sys_admin_role` VALUES ('4', '访客', '13');

-- ----------------------------
-- Table structure for sys_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_admin_user`;
CREATE TABLE `sys_admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '账号名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `add_time` int(10) unsigned NOT NULL COMMENT '注册时间',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `role_id` smallint(4) unsigned NOT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_admin_user
-- ----------------------------
INSERT INTO `sys_admin_user` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '1503718502', '1505290707', '127.0.0.1', '3');
INSERT INTO `sys_admin_user` VALUES ('2', 'admin2', '96e79218965eb72c92a549dd5a330112', '1503718517', '1504586469', '127.0.0.1', '2');
INSERT INTO `sys_admin_user` VALUES ('3', 'admin3', '96e79218965eb72c92a549dd5a330112', '1503718526', '1504586485', '127.0.0.1', '1');
INSERT INTO `sys_admin_user` VALUES ('4', 'admin4', '96e79218965eb72c92a549dd5a330112', '1503722691', '1504586507', '127.0.0.1', '4');

-- ----------------------------
-- Table structure for sys_goods
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods`;
CREATE TABLE `sys_goods` (
  `goods_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_name` varchar(30) NOT NULL COMMENT '商品名称',
  `goods_price` decimal(10,2) unsigned NOT NULL,
  `cat_id` mediumint(8) unsigned NOT NULL COMMENT '所属分类Id',
  `brand_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id',
  `goods_number` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '库存数',
  `goods_img` varchar(255) NOT NULL COMMENT '商品原图路径',
  `goods_thumb_img` varchar(255) NOT NULL COMMENT '商品缩略图',
  `goods_detail` text NOT NULL COMMENT '商品详情',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1上架  0 不上架',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods
-- ----------------------------
INSERT INTO `sys_goods` VALUES ('2', '333', '333.00', '11', '0', '0', '/public/upload/goods/20170731\\b920cfd0a06689d23851df2fd5d9df78.png', '/public/upload/goods/20170731\\b920cfd0a06689d23851df2fd5d9df78_thumb.png', '&lt;p&gt;444&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('3', '444', '555.00', '3', '0', '0', '/public/upload/goods/20170731\\3ed778495203fb951946bae391fd8073.png', '/public/upload/goods/20170731\\3ed778495203fb951946bae391fd8073_thumb.png', '&lt;p&gt;666&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('4', '555', '666.00', '15', '0', '777', '/public/upload/goods/20170731\\3e9ff62bcf04b74bbcc88d4fa69bb9ee.png', '/public/upload/goods/20170731\\3e9ff62bcf04b74bbcc88d4fa69bb9ee_thumb.png', '', '0');
INSERT INTO `sys_goods` VALUES ('5', '333', '444.00', '3', '0', '535', '/public/upload/goods/20170731\\77456a68f1626f3a4b0a95142c357a52.jpg', '/public/upload/goods/20170731\\77456a68f1626f3a4b0a95142c357a52_thumb.jpg', '&lt;p&gt;5555&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('6', '333', '4444.00', '13', '0', '535', '/public/upload/goods/20170731\\c6d0499d4e10659ee2a9a25435a5a644.jpg', '/public/upload/goods/20170731\\c6d0499d4e10659ee2a9a25435a5a644_thumb.jpg', '&lt;p&gt;555&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('7', 'fffa', '222.00', '3', '0', '535', '/public/upload/goods/20170731\\4779640d45510330751ed6d74dd27fdb.jpg', '/public/upload/goods/20170731\\4779640d45510330751ed6d74dd27fdb_thumb.jpg', '&lt;p&gt;333&lt;br/&gt;&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('8', '333', '444.00', '21', '0', '333', '/public/upload/goods/20170731\\2a99553212a1b2cbacb9f8b9e68aa7f9.png', '/public/upload/goods/20170731\\2a99553212a1b2cbacb9f8b9e68aa7f9_thumb.png', '&lt;p&gt;5555&lt;br/&gt;&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('9', '331', '333.00', '28', '0', '535', '/public/upload/goods/20170731\\489f9621ed565667eef6d40a611f6fa8.png', '/public/upload/goods/20170731\\489f9621ed565667eef6d40a611f6fa8_thumb.png', '&lt;p&gt;333&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('10', '441', '333.00', '22', '0', '535', '/public/upload/goods/20170731\\d0f64ffbeca9bff68d4f79e2fa966f8b.png', '/public/upload/goods/20170731\\d0f64ffbeca9bff68d4f79e2fa966f8b_thumb.png', '&lt;p&gt;444&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('11', 'fsfd', '3.00', '22', '0', '535', '/public/upload/goods/20170731\\7ce70f2e7bf7f01d1b31a497d5fb9e9c.png', '/public/upload/goods/20170731\\7ce70f2e7bf7f01d1b31a497d5fb9e9c_thumb.png', '&lt;p&gt;dd&lt;/p&gt;', '0');
INSERT INTO `sys_goods` VALUES ('12', '是大大大为', '11.00', '28', '1', '534', '/public/upload/goods/20170812\\d7482788f4aefbc319357e7fc48cc04c.png', '/public/upload/goods/20170812\\d7482788f4aefbc319357e7fc48cc04c_thumb.png', '', '0');
INSERT INTO `sys_goods` VALUES ('13', '测试商品001', '99.00', '18', '5', '534', '/public/upload/goods/20170826\\ada3bf9ec7da2566affdf2355c251e35.png', '/public/upload/goods/20170826\\ada3bf9ec7da2566affdf2355c251e35_thumb.png', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0003.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0004.gif&quot;/&gt;狗锅锅鼓&lt;/p&gt;', '1');
INSERT INTO `sys_goods` VALUES ('14', '11111', '222.00', '31', '0', '534', '/public/upload/goods/20170831\\5b371ee9be8d825f645a713936cd442b.png', '/public/upload/goods/20170831\\5b371ee9be8d825f645a713936cd442b_thumb.png', '', '1');
INSERT INTO `sys_goods` VALUES ('15', '测试少时诵诗书', '12.00', '31', '4', '13', '/public/upload/goods/20170831\\010c49faa05288d1632513439fb9c91a.png', '/public/upload/goods/20170831\\010c49faa05288d1632513439fb9c91a_thumb.png', '&lt;p&gt;222&lt;/p&gt;', '0');

-- ----------------------------
-- Table structure for sys_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_attr`;
CREATE TABLE `sys_goods_attr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `attr_name` varchar(30) NOT NULL COMMENT '属性名',
  `type_id` int(11) unsigned NOT NULL COMMENT '类型id',
  `input_type` tinyint(1) unsigned NOT NULL COMMENT '录入方式 1 设置选择值 2文本框手工录入',
  `attr_value` text NOT NULL COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_attr
-- ----------------------------
INSERT INTO `sys_goods_attr` VALUES ('1', '分辨率', '4', '2', '');
INSERT INTO `sys_goods_attr` VALUES ('2', '尺寸', '4', '1', 'a:4:{i:0;s:7:\"320*480\";i:1;s:7:\"480*640\";i:2;s:7:\"640*790\";i:3;s:7:\"790*860\";}');
INSERT INTO `sys_goods_attr` VALUES ('3', '颜色', '1', '1', 'a:5:{i:0;s:6:\"红色\";i:1;s:6:\"蓝色\";i:2;s:6:\"绿色\";i:3;s:6:\"白色\";i:4;s:6:\"黑色\";}');

-- ----------------------------
-- Table structure for sys_goods_brand
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_brand`;
CREATE TABLE `sys_goods_brand` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL COMMENT '品牌名称',
  `brand_img` varchar(255) NOT NULL COMMENT '品牌图片路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_brand
-- ----------------------------
INSERT INTO `sys_goods_brand` VALUES ('1', '品牌1', '/public/upload/brand/20170812\\78b1d11af2f0b98f52cd64487fd51a2a.png');
INSERT INTO `sys_goods_brand` VALUES ('2', '品牌2', '/public/upload/brand/20170812\\b5cd0d281cdf251bfbaae4500c87984f.png');
INSERT INTO `sys_goods_brand` VALUES ('3', '品牌3', '/public/upload/brand/20170812\\3a5c0beaa2c58e46fbb9363ed42761ed.png');
INSERT INTO `sys_goods_brand` VALUES ('4', '品牌4', '/public/upload/brand/20170812\\daa78b8c604f4ddf72982d010a9a1cc6.png');
INSERT INTO `sys_goods_brand` VALUES ('5', '品牌5', '/public/upload/brand/20170812\\500502a55747d9211ad463529861efcf.png');
INSERT INTO `sys_goods_brand` VALUES ('7', '品牌7', '/public/upload/brand/20170812\\6e2ae2298fa9d56bdc227775bd6ddcf2.png');

-- ----------------------------
-- Table structure for sys_goods_cat
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_cat`;
CREATE TABLE `sys_goods_cat` (
  `cat_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(30) NOT NULL COMMENT '商品名称',
  `parent_id` int(8) unsigned NOT NULL COMMENT '父id',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_cat
-- ----------------------------
INSERT INTO `sys_goods_cat` VALUES ('3', '水果', '0');
INSERT INTO `sys_goods_cat` VALUES ('4', '家电', '0');
INSERT INTO `sys_goods_cat` VALUES ('5', '家具', '0');
INSERT INTO `sys_goods_cat` VALUES ('6', '服饰', '0');
INSERT INTO `sys_goods_cat` VALUES ('7', '零食', '0');
INSERT INTO `sys_goods_cat` VALUES ('8', '日用品', '0');
INSERT INTO `sys_goods_cat` VALUES ('9', '苹果', '3');
INSERT INTO `sys_goods_cat` VALUES ('10', '桃子', '3');
INSERT INTO `sys_goods_cat` VALUES ('11', '香蕉', '3');
INSERT INTO `sys_goods_cat` VALUES ('12', '葡萄', '3');
INSERT INTO `sys_goods_cat` VALUES ('13', '西瓜', '3');
INSERT INTO `sys_goods_cat` VALUES ('14', '红富士', '9');
INSERT INTO `sys_goods_cat` VALUES ('15', '水蜜桃', '10');
INSERT INTO `sys_goods_cat` VALUES ('16', '毛桃', '10');
INSERT INTO `sys_goods_cat` VALUES ('17', '国产香蕉', '11');
INSERT INTO `sys_goods_cat` VALUES ('18', '进口香蕉', '11');
INSERT INTO `sys_goods_cat` VALUES ('19', '8424西瓜', '13');
INSERT INTO `sys_goods_cat` VALUES ('20', '冰箱', '4');
INSERT INTO `sys_goods_cat` VALUES ('21', '洗衣机', '4');
INSERT INTO `sys_goods_cat` VALUES ('22', '床', '5');
INSERT INTO `sys_goods_cat` VALUES ('23', '女式', '6');
INSERT INTO `sys_goods_cat` VALUES ('24', '男式', '6');
INSERT INTO `sys_goods_cat` VALUES ('25', '进口零食', '7');
INSERT INTO `sys_goods_cat` VALUES ('26', '卫生用品', '8');
INSERT INTO `sys_goods_cat` VALUES ('27', '桌子', '5');
INSERT INTO `sys_goods_cat` VALUES ('28', '海尔冰箱', '20');
INSERT INTO `sys_goods_cat` VALUES ('31', '水晶葡萄', '12');
INSERT INTO `sys_goods_cat` VALUES ('32', 'aaa', '18');

-- ----------------------------
-- Table structure for sys_goods_spec
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_spec`;
CREATE TABLE `sys_goods_spec` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `spec_name` varchar(50) NOT NULL COMMENT '规格名称',
  `type_id` smallint(5) unsigned NOT NULL COMMENT '类型id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_spec
-- ----------------------------
INSERT INTO `sys_goods_spec` VALUES ('1', '风格', '4');
INSERT INTO `sys_goods_spec` VALUES ('2', '机身内存', '4');

-- ----------------------------
-- Table structure for sys_goods_spec_item
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_spec_item`;
CREATE TABLE `sys_goods_spec_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `spec_id` int(11) unsigned NOT NULL COMMENT '规格id',
  `spec_item` varchar(50) NOT NULL COMMENT '规格项值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_spec_item
-- ----------------------------
INSERT INTO `sys_goods_spec_item` VALUES ('17', '2', '8T');
INSERT INTO `sys_goods_spec_item` VALUES ('16', '2', '1G');
INSERT INTO `sys_goods_spec_item` VALUES ('15', '2', '256M');
INSERT INTO `sys_goods_spec_item` VALUES ('14', '2', '128M');
INSERT INTO `sys_goods_spec_item` VALUES ('11', '1', '极致酷炫');
INSERT INTO `sys_goods_spec_item` VALUES ('12', '1', '优雅高尚');
INSERT INTO `sys_goods_spec_item` VALUES ('13', '1', '经典永恒');

-- ----------------------------
-- Table structure for sys_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_type`;
CREATE TABLE `sys_goods_type` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type_name` varchar(50) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_type
-- ----------------------------
INSERT INTO `sys_goods_type` VALUES ('1', '水果');
INSERT INTO `sys_goods_type` VALUES ('4', '手机');

-- ----------------------------
-- Table structure for sys_privilege_group
-- ----------------------------
DROP TABLE IF EXISTS `sys_privilege_group`;
CREATE TABLE `sys_privilege_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `group_name` varchar(50) NOT NULL COMMENT '分组名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_privilege_group
-- ----------------------------
INSERT INTO `sys_privilege_group` VALUES ('1', '系统');
INSERT INTO `sys_privilege_group` VALUES ('2', '商品');
INSERT INTO `sys_privilege_group` VALUES ('3', '管理员');
INSERT INTO `sys_privilege_group` VALUES ('4', '其他分组');

-- ----------------------------
-- Table structure for sys_privilege_src
-- ----------------------------
DROP TABLE IF EXISTS `sys_privilege_src`;
CREATE TABLE `sys_privilege_src` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `privilege_name` varchar(255) NOT NULL COMMENT '权限名称',
  `group_id` smallint(5) unsigned NOT NULL COMMENT '权限分组id',
  `privilege_code` text NOT NULL COMMENT '权限码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_privilege_src
-- ----------------------------
INSERT INTO `sys_privilege_src` VALUES ('1', '商品列表', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:9:\"goods_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:9:\"goods_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:10:\"goods_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:12:\"goods_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('3', '商品分类', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:13:\"goods_cat_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:13:\"goods_cat_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_cat_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:16:\"goods_cat_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('4', '商品类型', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_type_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_type_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:15:\"goods_type_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:17:\"goods_type_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('5', '商品品牌', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:15:\"goods_brand_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:15:\"goods_brand_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:16:\"goods_brand_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:18:\"goods_brand_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('6', '商品属性', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_attr_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_attr_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:15:\"goods_attr_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:17:\"goods_attr_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('16', '系统设置', '1', 'a:1:{i:0;a:2:{s:15:\"controller_name\";s:6:\"System\";s:11:\"action_name\";s:7:\"setting\";}}');
INSERT INTO `sys_privilege_src` VALUES ('8', '管理员管理', '3', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:9:\"admin_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:9:\"admin_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:10:\"admin_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:12:\"admin_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('9', '角色管理', '3', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:14:\"admin_role_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:14:\"admin_role_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:15:\"admin_role_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:17:\"admin_role_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('10', '权限管理', '3', 'a:5:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:19:\"admin_privilege_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:19:\"admin_privilege_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:15:\"ajax_get_action\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:20:\"admin_privilege_edit\";}i:4;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:22:\"admin_privilege_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('11', '管理员日志', '3', 'a:2:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:13:\"admin_log_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:16:\"admin_log_update\";}}');
INSERT INTO `sys_privilege_src` VALUES ('12', '权限分组', '3', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:25:\"admin_privilege_group_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:25:\"admin_privilege_group_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:26:\"admin_privilege_group_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Admin\";s:11:\"action_name\";s:28:\"admin_privilege_group_delete\";}}');
INSERT INTO `sys_privilege_src` VALUES ('13', '首页', '4', 'a:3:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Index\";s:11:\"action_name\";s:5:\"index\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Index\";s:11:\"action_name\";s:4:\"menu\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Index\";s:11:\"action_name\";s:7:\"welcome\";}}');
INSERT INTO `sys_privilege_src` VALUES ('14', 'superui', '4', 'a:1:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Index\";s:11:\"action_name\";s:3:\"sup\";}}');
INSERT INTO `sys_privilege_src` VALUES ('17', '商品规格', '2', 'a:4:{i:0;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_spec_lst\";}i:1;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:14:\"goods_spec_add\";}i:2;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:15:\"goods_spec_edit\";}i:3;a:2:{s:15:\"controller_name\";s:5:\"Goods\";s:11:\"action_name\";s:17:\"goods_spec_delete\";}}');

-- ----------------------------
-- Table structure for sys_setting
-- ----------------------------
DROP TABLE IF EXISTS `sys_setting`;
CREATE TABLE `sys_setting` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '配置项名称',
  `value` varchar(255) NOT NULL COMMENT '配置项值',
  `type` varchar(30) NOT NULL COMMENT '配置类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_setting
-- ----------------------------
INSERT INTO `sys_setting` VALUES ('3', 'goods_number', '534', 'base');
INSERT INTO `sys_setting` VALUES ('4', 'home_pagesize', '9', 'base');
INSERT INTO `sys_setting` VALUES ('5', 'admin_pagesize', '8', 'base');
