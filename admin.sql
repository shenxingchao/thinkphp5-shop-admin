/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : admin

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-26 16:56:27
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for sys_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_admin_role`;
CREATE TABLE `sys_admin_role` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL COMMENT '角色id',
  `privilege_id` varchar(255) NOT NULL COMMENT '权限id字符串',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_admin_role
-- ----------------------------
INSERT INTO `sys_admin_role` VALUES ('6', '超级管理员', '1,2,3,4,5,6,7,21,22,26,27,28,29,30,35,36,8,9,10,11,12,13,14,15,31,32,33,34,37,38,39,40,41,16,17,25,19,20');
INSERT INTO `sys_admin_role` VALUES ('4', '商品管理员', '8,9,10,11,12,13,14,15,31,32,33,34,16,17,25,19');
INSERT INTO `sys_admin_role` VALUES ('5', '系统管理员', '16,17,25,19,20');
INSERT INTO `sys_admin_role` VALUES ('7', '访客', '1,3,5,35,8,12,31,16,17,25,19,20');

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
INSERT INTO `sys_admin_user` VALUES ('1', 'admin', '96e79218965eb72c92a549dd5a330112', '1503718502', '1503736003', '127.0.0.1', '6');
INSERT INTO `sys_admin_user` VALUES ('2', 'admin2', '96e79218965eb72c92a549dd5a330112', '1503718517', '1503718601', '127.0.0.1', '4');
INSERT INTO `sys_admin_user` VALUES ('3', 'admin3', '96e79218965eb72c92a549dd5a330112', '1503718526', '1503718625', '127.0.0.1', '5');
INSERT INTO `sys_admin_user` VALUES ('4', 'admin4', '96e79218965eb72c92a549dd5a330112', '1503722691', '0', '', '4');

-- ----------------------------
-- Table structure for sys_goods
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods`;
CREATE TABLE `sys_goods` (
  `goods_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_name` varchar(30) NOT NULL COMMENT '商品名称',
  `goods_price` decimal(10,2) unsigned NOT NULL,
  `cat_id` mediumint(8) unsigned NOT NULL COMMENT '所属分类Id',
  `brand_id` mediumint(8) unsigned NOT NULL COMMENT '品牌id',
  `goods_number` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '库存数',
  `goods_img` varchar(255) NOT NULL COMMENT '商品原图路径',
  `goods_thumb_img` varchar(255) NOT NULL COMMENT '商品缩略图',
  `goods_detail` text NOT NULL COMMENT '商品详情',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods
-- ----------------------------
INSERT INTO `sys_goods` VALUES ('2', '333', '333.00', '11', '0', '0', '/public/upload/goods/20170731\\b920cfd0a06689d23851df2fd5d9df78.png', '/public/upload/goods/20170731\\b920cfd0a06689d23851df2fd5d9df78_thumb.png', '&lt;p&gt;444&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('3', '444', '555.00', '3', '0', '0', '/public/upload/goods/20170731\\3ed778495203fb951946bae391fd8073.png', '/public/upload/goods/20170731\\3ed778495203fb951946bae391fd8073_thumb.png', '&lt;p&gt;666&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('4', '555', '666.00', '15', '0', '777', '/public/upload/goods/20170731\\3e9ff62bcf04b74bbcc88d4fa69bb9ee.png', '/public/upload/goods/20170731\\3e9ff62bcf04b74bbcc88d4fa69bb9ee_thumb.png', '');
INSERT INTO `sys_goods` VALUES ('5', '333', '444.00', '3', '0', '535', '/public/upload/goods/20170731\\77456a68f1626f3a4b0a95142c357a52.jpg', '/public/upload/goods/20170731\\77456a68f1626f3a4b0a95142c357a52_thumb.jpg', '&lt;p&gt;5555&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('6', '333', '4444.00', '13', '0', '535', '/public/upload/goods/20170731\\c6d0499d4e10659ee2a9a25435a5a644.jpg', '/public/upload/goods/20170731\\c6d0499d4e10659ee2a9a25435a5a644_thumb.jpg', '&lt;p&gt;555&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('7', 'fffa', '222.00', '3', '0', '535', '/public/upload/goods/20170731\\4779640d45510330751ed6d74dd27fdb.jpg', '/public/upload/goods/20170731\\4779640d45510330751ed6d74dd27fdb_thumb.jpg', '&lt;p&gt;333&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('8', '333', '444.00', '21', '0', '333', '/public/upload/goods/20170731\\2a99553212a1b2cbacb9f8b9e68aa7f9.png', '/public/upload/goods/20170731\\2a99553212a1b2cbacb9f8b9e68aa7f9_thumb.png', '&lt;p&gt;5555&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('9', '331', '333.00', '28', '0', '535', '/public/upload/goods/20170731\\489f9621ed565667eef6d40a611f6fa8.png', '/public/upload/goods/20170731\\489f9621ed565667eef6d40a611f6fa8_thumb.png', '&lt;p&gt;333&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('10', '441', '333.00', '22', '0', '535', '/public/upload/goods/20170731\\d0f64ffbeca9bff68d4f79e2fa966f8b.png', '/public/upload/goods/20170731\\d0f64ffbeca9bff68d4f79e2fa966f8b_thumb.png', '&lt;p&gt;444&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('11', 'fsfd', '3.00', '22', '0', '535', '/public/upload/goods/20170731\\7ce70f2e7bf7f01d1b31a497d5fb9e9c.png', '/public/upload/goods/20170731\\7ce70f2e7bf7f01d1b31a497d5fb9e9c_thumb.png', '&lt;p&gt;dd&lt;/p&gt;');
INSERT INTO `sys_goods` VALUES ('12', '是大大大为', '11.00', '28', '1', '534', '/public/upload/goods/20170812\\d7482788f4aefbc319357e7fc48cc04c.png', '/public/upload/goods/20170812\\d7482788f4aefbc319357e7fc48cc04c_thumb.png', '');
INSERT INTO `sys_goods` VALUES ('13', '测试商品001', '99.00', '26', '5', '534', '/public/upload/goods/20170826\\ada3bf9ec7da2566affdf2355c251e35.png', '/public/upload/goods/20170826\\ada3bf9ec7da2566affdf2355c251e35_thumb.png', '&lt;p&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0003.gif&quot;/&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0004.gif&quot;/&gt;狗锅锅鼓&lt;/p&gt;');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for sys_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `sys_goods_type`;
CREATE TABLE `sys_goods_type` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type_name` varchar(50) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_goods_type
-- ----------------------------
INSERT INTO `sys_goods_type` VALUES ('1', '水果');
INSERT INTO `sys_goods_type` VALUES ('4', '手机');
INSERT INTO `sys_goods_type` VALUES ('3', '电器');

-- ----------------------------
-- Table structure for sys_privilege_src
-- ----------------------------
DROP TABLE IF EXISTS `sys_privilege_src`;
CREATE TABLE `sys_privilege_src` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `privilege_name` varchar(255) NOT NULL COMMENT '权限名称',
  `controller_name` varchar(255) NOT NULL COMMENT '控制器名',
  `action_name` varchar(255) NOT NULL COMMENT '方法名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_privilege_src
-- ----------------------------
INSERT INTO `sys_privilege_src` VALUES ('1', '管理员列表', 'Admin', 'admin_lst');
INSERT INTO `sys_privilege_src` VALUES ('2', '添加管理员', 'Admin', 'admin_add');
INSERT INTO `sys_privilege_src` VALUES ('3', '角色列表', 'Admin', 'admin_role_lst');
INSERT INTO `sys_privilege_src` VALUES ('4', '添加角色', 'Admin', 'admin_role_add');
INSERT INTO `sys_privilege_src` VALUES ('5', '权限列表', 'Admin', 'admin_privilege_lst');
INSERT INTO `sys_privilege_src` VALUES ('6', '添加权限', 'Admin', 'admin_privilege_add');
INSERT INTO `sys_privilege_src` VALUES ('7', '读取权限', 'Admin', 'ajax_get_action');
INSERT INTO `sys_privilege_src` VALUES ('8', '商品分类列表', 'Goods', 'goods_cat_lst');
INSERT INTO `sys_privilege_src` VALUES ('9', '添加商品分类', 'Goods', 'goods_cat_add');
INSERT INTO `sys_privilege_src` VALUES ('10', '商品分类编辑', 'Goods', 'goods_cat_edit');
INSERT INTO `sys_privilege_src` VALUES ('11', '删除商品分类', 'Goods', 'goods_cat_delete');
INSERT INTO `sys_privilege_src` VALUES ('12', '商品列表', 'Goods', 'goods_lst');
INSERT INTO `sys_privilege_src` VALUES ('13', '添加商品', 'Goods', 'goods_add');
INSERT INTO `sys_privilege_src` VALUES ('14', '编辑商品', 'Goods', 'goods_edit');
INSERT INTO `sys_privilege_src` VALUES ('15', '删除商品', 'Goods', 'goods_delete');
INSERT INTO `sys_privilege_src` VALUES ('16', '首页', 'Index', 'index');
INSERT INTO `sys_privilege_src` VALUES ('17', '菜单', 'Index', 'menu');
INSERT INTO `sys_privilege_src` VALUES ('25', 'sup-ui', 'Index', 'sup');
INSERT INTO `sys_privilege_src` VALUES ('19', '欢迎页', 'Index', 'welcome');
INSERT INTO `sys_privilege_src` VALUES ('20', '系统设置', 'System', 'setting');
INSERT INTO `sys_privilege_src` VALUES ('21', '权限编辑', 'Admin', 'admin_privilege_edit');
INSERT INTO `sys_privilege_src` VALUES ('22', '删除权限', 'Admin', 'admin_privilege_delete');
INSERT INTO `sys_privilege_src` VALUES ('26', '角色编辑', 'Admin', 'admin_role_edit');
INSERT INTO `sys_privilege_src` VALUES ('27', '管理员编辑', 'Admin', 'admin_edit');
INSERT INTO `sys_privilege_src` VALUES ('28', '删除管理员', 'Admin', 'admin_delete');
INSERT INTO `sys_privilege_src` VALUES ('29', '删除角色', 'Admin', 'admin_role_delete');
INSERT INTO `sys_privilege_src` VALUES ('30', '权限存在ajax', 'Admin', 'privilege_exist');
INSERT INTO `sys_privilege_src` VALUES ('31', '品牌列表', 'Goods', 'goods_brand_lst');
INSERT INTO `sys_privilege_src` VALUES ('32', '添加品牌', 'Goods', 'goods_brand_add');
INSERT INTO `sys_privilege_src` VALUES ('33', '编辑品牌', 'Goods', 'goods_brand_edit');
INSERT INTO `sys_privilege_src` VALUES ('34', '删除品牌', 'Goods', 'goods_brand_delete');
INSERT INTO `sys_privilege_src` VALUES ('35', '管理员日志', 'Admin', 'admin_log_lst');
INSERT INTO `sys_privilege_src` VALUES ('36', '管理员日志更新', 'Admin', 'admin_log_update');
INSERT INTO `sys_privilege_src` VALUES ('37', '属性列表', 'Goods', 'goods_attr_lst');
INSERT INTO `sys_privilege_src` VALUES ('38', '类型列表', 'Goods', 'goods_type_lst');
INSERT INTO `sys_privilege_src` VALUES ('39', '添加类型', 'Goods', 'goods_type_add');
INSERT INTO `sys_privilege_src` VALUES ('40', '编辑商品类型', 'Goods', 'goods_type_edit');
INSERT INTO `sys_privilege_src` VALUES ('41', '删除商品类型', 'Goods', 'goods_type_delete');

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
