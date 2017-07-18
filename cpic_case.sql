/*
Navicat MySQL Data Transfer

Source Server         : chindor
Source Server Version : 50537
Source Host           : 115.28.236.99:3306
Source Database       : cpic

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2017-07-13 15:30:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cpic_case
-- ----------------------------
DROP TABLE IF EXISTS `cpic_case`;
CREATE TABLE `cpic_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '案例ID',
  `user_account_id` varchar(45) DEFAULT NULL COMMENT '用户账号',
  `rater_account_id` varchar(45) DEFAULT NULL COMMENT '原始评委ID或重新指派的评委ID',
  `title` varchar(255) DEFAULT NULL COMMENT '案例标题',
  `cover_img` varchar(255) DEFAULT NULL COMMENT '封面图片',
  `content_name` varchar(255) DEFAULT NULL COMMENT '上传案例名称',
  `content_url` varchar(255) DEFAULT NULL COMMENT '案例文件地址',
  `content_id` varchar(255) DEFAULT NULL COMMENT '案例保存在百度云的文件ID',
  `content` text COMMENT '提取的文档内容',
  `client_ip` varchar(45) DEFAULT NULL COMMENT 'ip地址',
  `line` int(11) DEFAULT NULL COMMENT '所属条线条线 1-个险 2-健养 3-营运 4-后援',
  `dept_id` int(11) DEFAULT '0' COMMENT '所属部门ID',
  `status` tinyint(1) DEFAULT '0' COMMENT '案例状态 0-待提交 1-待合规审批 2-撤回 3-待评分 4-已评分  5-合规打回 6-评委打回',
  `create_time` int(11) DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `disabled` tinyint(1) DEFAULT '0' COMMENT '是否删除 0-否 1-是',
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='案例表';

-- ----------------------------
-- Records of cpic_case
-- ----------------------------
INSERT INTO `cpic_case` VALUES ('1', '2', '3', '条线1案例1', '', null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('2', '2', '3', '条线1案例2', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('3', '2', '3', '条线1案例3', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('4', '2', '3', '条线1案例4', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('5', '2', '3', '条线1案例5', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('6', '2', '3', '条线1案例6', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('7', '2', '3', '条线1案例7', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('8', '2', '3', '条线1案例8', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('9', '2', '3', '条线1案例9', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('10', '2', '3', '条线1案例10', null, null, null, null, null, null, '1', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('11', '3', '4', '条线2案例1', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('12', '3', '4', '条线2案例2', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('13', '3', '4', '条线2案例3', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('14', '3', '4', '条线2案例4', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('15', '3', '4', '条线2案例5', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('16', '3', '4', '条线2案例6', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('17', '3', '4', '条线2案例7', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('18', '3', '4', '条线2案例8', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('19', '3', '4', '条线2案例9', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
INSERT INTO `cpic_case` VALUES ('20', '3', '4', '条线2案例10', null, null, null, null, null, null, '2', '7', '0', '0', '0', '0');
