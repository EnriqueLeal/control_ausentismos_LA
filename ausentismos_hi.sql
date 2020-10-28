/*
Navicat MySQL Data Transfer

Source Server         : HOTEL_GUIDI
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : ausentismos_hi

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-11-28 23:42:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cursos
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_curso` varchar(255) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', '1', '1', 'Herramientas Informaticas', '1');
INSERT INTO `cursos` VALUES ('2', '1', '1', 'Programacion', '1');
INSERT INTO `cursos` VALUES ('3', '1', '1', 'Diseño Grafico', '1');
INSERT INTO `cursos` VALUES ('4', '1', '1', 'Economia', '1');

-- ----------------------------
-- Table structure for c_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `c_usuarios`;
CREATE TABLE `c_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_empleado` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_usuarios
-- ----------------------------
INSERT INTO `c_usuarios` VALUES ('1', '1', '123', 'jose aguedo', 'serna', '1', 'meza');

-- ----------------------------
-- Table structure for horarios
-- ----------------------------
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of horarios
-- ----------------------------
INSERT INTO `horarios` VALUES ('1', '1', '2', '2');
INSERT INTO `horarios` VALUES ('2', '2', '3', '2');
INSERT INTO `horarios` VALUES ('3', '3', '4', '2');

-- ----------------------------
-- Table structure for periodos
-- ----------------------------
DROP TABLE IF EXISTS `periodos`;
CREATE TABLE `periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `periodo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periodos
-- ----------------------------
INSERT INTO `periodos` VALUES ('1', '2017-11-02', '2017-11-28', '11-12-2017');
