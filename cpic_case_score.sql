/*
Navicat MySQL Data Transfer

Source Server         : chindor
Source Server Version : 50537
Source Host           : 115.28.236.99:3306
Source Database       : cpic

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2017-07-13 15:30:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cpic_case_score
-- ----------------------------
DROP TABLE IF EXISTS `cpic_case_score`;
CREATE TABLE `cpic_case_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) DEFAULT '0' COMMENT '案例ID',
  `part_1` float DEFAULT '0' COMMENT '选题分数(总分40.0)',
  `part_2` float DEFAULT '0' COMMENT '萃取分数(总分30.0)',
  `part_3` float DEFAULT '0' COMMENT '表达分数(总分30.0)',
  `score` float DEFAULT '0' COMMENT '总分(总分100.0)',
  `client_ip` varchar(45) DEFAULT '0' COMMENT 'ip地址',
  `create_time` int(11) DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `disabled` tinyint(1) DEFAULT '0' COMMENT '是否删除 0-否 1-是',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cpic_case_score
-- ----------------------------
INSERT INTO `cpic_case_score` VALUES ('1', '1', '0', '0', '0', '20', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('2', '2', '0', '0', '0', '50', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('3', '3', '0', '0', '0', '60', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('4', '4', '0', '0', '0', '70', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('5', '5', '0', '0', '0', '80', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('6', '9', '0', '0', '0', '90', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('7', '7', '0', '0', '0', '100', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('8', '8', '0', '0', '0', '50', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('9', '10', '0', '0', '0', '80', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('10', '11', '0', '0', '0', '78', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('11', '12', '0', '0', '0', '65', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('12', '13', '0', '0', '0', '45', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('13', '14', '0', '0', '0', '18', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('14', '15', '0', '0', '0', '11', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('15', '16', '0', '0', '0', '77', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('16', '17', '0', '0', '0', '88', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('17', '18', '0', '0', '0', '89', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('18', '19', '0', '0', '0', '98', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('19', '20', '0', '0', '0', '88', '0', '0', '0', '0');
INSERT INTO `cpic_case_score` VALUES ('20', '21', '0', '0', '0', '99', '0', '0', '0', '0');
