/*
Navicat MySQL Data Transfer

Source Server         : devine-meadow
Source Server Version : 50544
Source Host           : 45.55.67.223:3306
Source Database       : ong

Target Server Type    : MYSQL
Target Server Version : 50544
File Encoding         : 65001

Date: 2015-09-18 21:16:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for actividades
-- ----------------------------
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE `actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAct` date DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `actividades_date_unique` (`fechaAct`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of actividades
-- ----------------------------
INSERT INTO `actividades` VALUES ('42', '2015-09-30', 'Recolecion de donaciones', 'Central', '2015-09-15 02:00:12', '2015-09-16 00:26:25');
INSERT INTO `actividades` VALUES ('53', '2015-09-29', 'Actividad2', 'Lugar22', '2015-09-15 20:33:52', '2015-09-18 22:22:09');

-- ----------------------------
-- Table structure for activity_log
-- ----------------------------
DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `content_type` varchar(72) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `developer` tinyint(1) NOT NULL,
  `ip_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activity_log
-- ----------------------------
INSERT INTO `activity_log` VALUES ('1', '0', '222020202', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 01:29:37', '2015-09-10 01:29:37');
INSERT INTO `activity_log` VALUES ('2', '0', '222020202', 'Beneficiario', 'Updated', 'ACtualizacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 01:36:32', '2015-09-10 01:36:32');
INSERT INTO `activity_log` VALUES ('3', '0', '222020202', 'Beneficiario', 'Updated', 'ACtualizacion de un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 01:46:50', '2015-09-10 01:46:50');
INSERT INTO `activity_log` VALUES ('4', '0', '222020202', 'Beneficiario', 'Updated ', 'ACtualizacion de un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 01:46:58', '2015-09-10 01:46:58');
INSERT INTO `activity_log` VALUES ('5', '0', '321654', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 02:05:06', '2015-09-10 02:05:06');
INSERT INTO `activity_log` VALUES ('6', '0', '321', 'Donacion', 'Updated', 'Creacion medicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 14:20:16', '2015-09-10 14:20:16');
INSERT INTO `activity_log` VALUES ('7', '0', '321', 'Donacion', 'Updated', 'Creacion Lapices', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 14:41:19', '2015-09-10 14:41:19');
INSERT INTO `activity_log` VALUES ('8', '0', '222020202', 'Beneficiario', 'Updated', 'Actualizacion personalInfo', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 16:54:10', '2015-09-10 16:54:10');
INSERT INTO `activity_log` VALUES ('9', '0', '45646846', 'Donacion', 'Updated', 'Creacion Quimioterapia', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 19:12:26', '2015-09-10 19:12:26');
INSERT INTO `activity_log` VALUES ('10', '0', '258794', 'Donacion', 'Updated', 'Creacion Estudios', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-10 19:43:05', '2015-09-10 19:43:05');
INSERT INTO `activity_log` VALUES ('11', '0', '1234567', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:07:25', '2015-09-11 05:07:25');
INSERT INTO `activity_log` VALUES ('12', '0', '1234567', 'Personal', 'Updated', 'Actualizacion  Administrador', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:12:22', '2015-09-11 05:12:22');
INSERT INTO `activity_log` VALUES ('13', '0', '1234567', 'Personal', 'Updated', 'Actualizacion  Administrador', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:13:06', '2015-09-11 05:13:06');
INSERT INTO `activity_log` VALUES ('14', '0', '1234567', 'Personal', 'Updated', 'Eliminacion  1234567', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:13:18', '2015-09-11 05:13:18');
INSERT INTO `activity_log` VALUES ('15', '0', '123123123', 'Personal', 'Updated', 'Creacion Administrador', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:14:13', '2015-09-11 05:14:13');
INSERT INTO `activity_log` VALUES ('16', '0', '123123123', 'Personal', 'Updated', 'Eliminacion  123123123', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:14:38', '2015-09-11 05:14:38');
INSERT INTO `activity_log` VALUES ('17', '0', '123123', 'Personal', 'Updated', 'Creacion Administrador', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:15:13', '2015-09-11 05:15:13');
INSERT INTO `activity_log` VALUES ('18', '0', '666', 'Ayuda', 'Updated', 'Creacion medicamentos', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:18:31', '2015-09-11 05:18:31');
INSERT INTO `activity_log` VALUES ('19', '0', '321654', 'Donacion', 'Updated', 'Creacion para medicina', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:21:48', '2015-09-11 05:21:48');
INSERT INTO `activity_log` VALUES ('20', '0', '1111', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:28:04', '2015-09-11 05:28:04');
INSERT INTO `activity_log` VALUES ('21', '0', '1231', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:31:19', '2015-09-11 05:31:19');
INSERT INTO `activity_log` VALUES ('22', '0', '1231', 'Donacion', 'Updated', 'Creacion medicamento', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:31:45', '2015-09-11 05:31:45');
INSERT INTO `activity_log` VALUES ('23', '0', '1111', 'Ayuda', 'Updated', 'Creacion medicina', 'Usuario: Administrador ', '0', '190.103.72.229', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 05:32:26', '2015-09-11 05:32:26');
INSERT INTO `activity_log` VALUES ('24', '0', '222020202', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 14:33:44', '2015-09-11 14:33:44');
INSERT INTO `activity_log` VALUES ('25', '0', '666', 'Ayuda', 'Updated', 'Creacion meicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 15:18:37', '2015-09-11 15:18:37');
INSERT INTO `activity_log` VALUES ('26', '0', '666', 'Ayuda', 'Updated', 'Creacion ', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 20:11:35', '2015-09-11 20:11:35');
INSERT INTO `activity_log` VALUES ('27', '0', '666', 'Ayuda', 'Updated', 'Creacion aaaa', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 20:23:41', '2015-09-11 20:23:41');
INSERT INTO `activity_log` VALUES ('28', '0', '666', 'Ayuda', 'Updated', 'Creacion uuu', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 20:26:40', '2015-09-11 20:26:40');
INSERT INTO `activity_log` VALUES ('29', '0', '834621000', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:09:48', '2015-09-11 22:09:48');
INSERT INTO `activity_log` VALUES ('30', '0', '666', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:12:28', '2015-09-11 22:12:28');
INSERT INTO `activity_log` VALUES ('31', '0', '0', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:33:39', '2015-09-11 22:33:39');
INSERT INTO `activity_log` VALUES ('32', '0', '9979', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:44:48', '2015-09-11 22:44:48');
INSERT INTO `activity_log` VALUES ('33', '0', '159', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:46:00', '2015-09-11 22:46:00');
INSERT INTO `activity_log` VALUES ('34', '0', '3332', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 22:50:00', '2015-09-11 22:50:00');
INSERT INTO `activity_log` VALUES ('35', '0', '3332', 'Ayuda', 'Updated', 'Creacion Lapices', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 23:34:06', '2015-09-11 23:34:06');
INSERT INTO `activity_log` VALUES ('36', '0', '20', 'Ayuda', 'Updated', 'Actualizacion 3332', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-11 23:35:57', '2015-09-11 23:35:57');
INSERT INTO `activity_log` VALUES ('37', '0', '321', 'Donacion', 'Updated', 'Creacion medicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:07:54', '2015-09-14 14:07:54');
INSERT INTO `activity_log` VALUES ('38', '0', '321', 'Donacion', 'Updated', 'Creacion medicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:08:12', '2015-09-14 14:08:12');
INSERT INTO `activity_log` VALUES ('39', '0', '10', 'Donacion', 'Updated', 'Eliminacion 10', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:08:26', '2015-09-14 14:08:26');
INSERT INTO `activity_log` VALUES ('40', '0', '9979', 'Ayuda', 'Updated', 'Creacion Utiles', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:09:15', '2015-09-14 14:09:15');
INSERT INTO `activity_log` VALUES ('41', '0', '21', 'Ayuda', 'Updated', 'Eliminacion 21', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:09:30', '2015-09-14 14:09:30');
INSERT INTO `activity_log` VALUES ('42', '0', '9979', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:31:32', '2015-09-14 14:31:32');
INSERT INTO `activity_log` VALUES ('43', '0', '1111', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:31:32', '2015-09-14 14:31:32');
INSERT INTO `activity_log` VALUES ('44', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:32:05', '2015-09-14 14:32:05');
INSERT INTO `activity_log` VALUES ('45', '0', '3', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 14:48:58', '2015-09-14 14:48:58');
INSERT INTO `activity_log` VALUES ('46', '0', '90870', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 15:17:45', '2015-09-14 15:17:45');
INSERT INTO `activity_log` VALUES ('47', '0', '4', 'Beneficiario', 'Updated', 'Creacion del un Beneficiario', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 15:29:41', '2015-09-14 15:29:41');
INSERT INTO `activity_log` VALUES ('48', '0', '4', 'Beneficiario', 'Updated', 'Actualizacion personalInfo', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 15:39:12', '2015-09-14 15:39:12');
INSERT INTO `activity_log` VALUES ('49', '0', '4', 'Beneficiario', 'Updated', 'Actualizacion personalInfo', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 15:41:19', '2015-09-14 15:41:19');
INSERT INTO `activity_log` VALUES ('50', '0', '8346210', 'Personal', 'Updated', 'Actualizacion  Responsable', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 15:44:35', '2015-09-14 15:44:35');
INSERT INTO `activity_log` VALUES ('51', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:13:28', '2015-09-14 16:13:28');
INSERT INTO `activity_log` VALUES ('52', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:13:46', '2015-09-14 16:13:46');
INSERT INTO `activity_log` VALUES ('53', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:13:46', '2015-09-14 16:13:46');
INSERT INTO `activity_log` VALUES ('54', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:14:01', '2015-09-14 16:14:01');
INSERT INTO `activity_log` VALUES ('55', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:14:01', '2015-09-14 16:14:01');
INSERT INTO `activity_log` VALUES ('56', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:14:01', '2015-09-14 16:14:01');
INSERT INTO `activity_log` VALUES ('57', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:14:53', '2015-09-14 16:14:53');
INSERT INTO `activity_log` VALUES ('58', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:15:16', '2015-09-14 16:15:16');
INSERT INTO `activity_log` VALUES ('59', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 16:15:16', '2015-09-14 16:15:16');
INSERT INTO `activity_log` VALUES ('60', '0', '11', 'Actividad', 'Updated', 'Creacion jhgbfvdc', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 19:48:19', '2015-09-14 19:48:19');
INSERT INTO `activity_log` VALUES ('61', '0', '0', 'Actividad', 'Updated', 'Creacion afsgfdhfg', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 20:00:52', '2015-09-14 20:00:52');
INSERT INTO `activity_log` VALUES ('62', '0', '0', 'Actividad', 'Created', 'Creacion mnbf', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 20:40:18', '2015-09-14 20:40:18');
INSERT INTO `activity_log` VALUES ('63', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 20:46:33', '2015-09-14 20:46:33');
INSERT INTO `activity_log` VALUES ('64', '0', '3332', 'Beneficiario', 'Updated', 'Actualizacion personalInfo', 'Usuario: guillermo paredes', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0', '2015-09-14 20:53:15', '2015-09-14 20:53:15');
INSERT INTO `activity_log` VALUES ('65', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 20:57:22', '2015-09-14 20:57:22');
INSERT INTO `activity_log` VALUES ('66', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 20:58:56', '2015-09-14 20:58:56');
INSERT INTO `activity_log` VALUES ('67', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 21:03:24', '2015-09-14 21:03:24');
INSERT INTO `activity_log` VALUES ('68', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 21:15:21', '2015-09-14 21:15:21');
INSERT INTO `activity_log` VALUES ('69', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 21:18:52', '2015-09-14 21:18:52');
INSERT INTO `activity_log` VALUES ('70', '0', '0', 'Administrador', 'Updated', 'Creacion del un Administrador', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-14 21:28:14', '2015-09-14 21:28:14');
INSERT INTO `activity_log` VALUES ('71', '0', '0', 'Actividad', 'Updated', 'Creacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:36:03', '2015-09-15 01:36:03');
INSERT INTO `activity_log` VALUES ('72', '0', '32', 'Actividad', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:43:39', '2015-09-15 01:43:39');
INSERT INTO `activity_log` VALUES ('73', '0', '33', 'Actividad', 'Updated', 'Actualizacion Pegar afiche', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:45:37', '2015-09-15 01:45:37');
INSERT INTO `activity_log` VALUES ('74', '0', '33', 'Actividad', 'Updated', 'Actualizacion Pegar afiche', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:54:51', '2015-09-15 01:54:51');
INSERT INTO `activity_log` VALUES ('75', '0', '41', 'Actividad', 'Updated', 'Actualizacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:59:15', '2015-09-15 01:59:15');
INSERT INTO `activity_log` VALUES ('76', '0', '33', 'Actividad', 'Updated', 'Eliminacion 33', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:59:30', '2015-09-15 01:59:30');
INSERT INTO `activity_log` VALUES ('77', '0', '41', 'Actividad', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 01:59:48', '2015-09-15 01:59:48');
INSERT INTO `activity_log` VALUES ('78', '0', '0', 'Actividad', 'Updated', 'Creacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 02:00:12', '2015-09-15 02:00:12');
INSERT INTO `activity_log` VALUES ('79', '0', '0', 'Actividad', 'Updated', 'Creacion donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 02:00:39', '2015-09-15 02:00:39');
INSERT INTO `activity_log` VALUES ('80', '0', '43', 'Actividad', 'Updated', 'Actualizacion Donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 02:06:26', '2015-09-15 02:06:26');
INSERT INTO `activity_log` VALUES ('81', '0', '987654321', 'Personal', 'Updated', 'Eliminacion  987654321', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 13:34:33', '2015-09-15 13:34:33');
INSERT INTO `activity_log` VALUES ('82', '0', '43', 'Actividad', 'Updated', 'Actualizacion Donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 15:40:19', '2015-09-15 15:40:19');
INSERT INTO `activity_log` VALUES ('83', '0', '43', 'Actividad', 'Updated', 'Actualizacion Donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 16:04:15', '2015-09-15 16:04:15');
INSERT INTO `activity_log` VALUES ('84', '0', '0', 'Actividad', 'Updated', 'Creacion Actividad1', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 16:04:55', '2015-09-15 16:04:55');
INSERT INTO `activity_log` VALUES ('85', '0', '321', 'Donacion', 'Updated', 'Creacion doncion 1', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 17:31:43', '2015-09-15 17:31:43');
INSERT INTO `activity_log` VALUES ('86', '0', '90870', 'Ayuda', 'Updated', 'Creacion m', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 17:49:09', '2015-09-15 17:49:09');
INSERT INTO `activity_log` VALUES ('87', '0', '1231', 'Donacion', 'Updated', 'Creacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 18:13:42', '2015-09-15 18:13:42');
INSERT INTO `activity_log` VALUES ('88', '0', '22', 'Ayuda', 'Updated', 'Actualizacion 90870', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 18:21:09', '2015-09-15 18:21:09');
INSERT INTO `activity_log` VALUES ('89', '0', '0', 'Actividad', 'Updated', 'Creacion fdfsdfsd', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 20:12:07', '2015-09-15 20:12:07');
INSERT INTO `activity_log` VALUES ('90', '0', '0', 'Actividad', 'Updated', 'Creacion zzzxczx', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 20:32:43', '2015-09-15 20:32:43');
INSERT INTO `activity_log` VALUES ('91', '0', '0', 'Actividad', 'Updated', 'Creacion Actividad2', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 20:33:52', '2015-09-15 20:33:52');
INSERT INTO `activity_log` VALUES ('92', '0', '1231', 'Donacion', 'Updated', 'Creacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:03:27', '2015-09-15 21:03:27');
INSERT INTO `activity_log` VALUES ('93', '0', '3', 'Ayuda', 'Updated', 'Creacion mmm', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:24:38', '2015-09-15 21:24:38');
INSERT INTO `activity_log` VALUES ('94', '0', '258794', 'Donacion', 'Updated', 'Creacion Material Escolar', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:43:27', '2015-09-15 21:43:27');
INSERT INTO `activity_log` VALUES ('95', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:09', '2015-09-15 21:44:09');
INSERT INTO `activity_log` VALUES ('96', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:09', '2015-09-15 21:44:09');
INSERT INTO `activity_log` VALUES ('97', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:09', '2015-09-15 21:44:09');
INSERT INTO `activity_log` VALUES ('98', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:16', '2015-09-15 21:44:16');
INSERT INTO `activity_log` VALUES ('99', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:16', '2015-09-15 21:44:16');
INSERT INTO `activity_log` VALUES ('100', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:16', '2015-09-15 21:44:16');
INSERT INTO `activity_log` VALUES ('101', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:26', '2015-09-15 21:44:26');
INSERT INTO `activity_log` VALUES ('102', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:26', '2015-09-15 21:44:26');
INSERT INTO `activity_log` VALUES ('103', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:26', '2015-09-15 21:44:26');
INSERT INTO `activity_log` VALUES ('104', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:29', '2015-09-15 21:44:29');
INSERT INTO `activity_log` VALUES ('105', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:30', '2015-09-15 21:44:30');
INSERT INTO `activity_log` VALUES ('106', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:30', '2015-09-15 21:44:30');
INSERT INTO `activity_log` VALUES ('107', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:30', '2015-09-15 21:44:30');
INSERT INTO `activity_log` VALUES ('108', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:30', '2015-09-15 21:44:30');
INSERT INTO `activity_log` VALUES ('109', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:30', '2015-09-15 21:44:30');
INSERT INTO `activity_log` VALUES ('110', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:35', '2015-09-15 21:44:35');
INSERT INTO `activity_log` VALUES ('111', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:36', '2015-09-15 21:44:36');
INSERT INTO `activity_log` VALUES ('112', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:36', '2015-09-15 21:44:36');
INSERT INTO `activity_log` VALUES ('113', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:36', '2015-09-15 21:44:36');
INSERT INTO `activity_log` VALUES ('114', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:36', '2015-09-15 21:44:36');
INSERT INTO `activity_log` VALUES ('115', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:36', '2015-09-15 21:44:36');
INSERT INTO `activity_log` VALUES ('116', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:40', '2015-09-15 21:44:40');
INSERT INTO `activity_log` VALUES ('117', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:40', '2015-09-15 21:44:40');
INSERT INTO `activity_log` VALUES ('118', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:40', '2015-09-15 21:44:40');
INSERT INTO `activity_log` VALUES ('119', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:40', '2015-09-15 21:44:40');
INSERT INTO `activity_log` VALUES ('120', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:41', '2015-09-15 21:44:41');
INSERT INTO `activity_log` VALUES ('121', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:41', '2015-09-15 21:44:41');
INSERT INTO `activity_log` VALUES ('122', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:41', '2015-09-15 21:44:41');
INSERT INTO `activity_log` VALUES ('123', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:44', '2015-09-15 21:44:44');
INSERT INTO `activity_log` VALUES ('124', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:44', '2015-09-15 21:44:44');
INSERT INTO `activity_log` VALUES ('125', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:44', '2015-09-15 21:44:44');
INSERT INTO `activity_log` VALUES ('126', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:44', '2015-09-15 21:44:44');
INSERT INTO `activity_log` VALUES ('127', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:45', '2015-09-15 21:44:45');
INSERT INTO `activity_log` VALUES ('128', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:51', '2015-09-15 21:44:51');
INSERT INTO `activity_log` VALUES ('129', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('130', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('131', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('132', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('133', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('134', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('135', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('136', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:57', '2015-09-15 21:44:57');
INSERT INTO `activity_log` VALUES ('137', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:58', '2015-09-15 21:44:58');
INSERT INTO `activity_log` VALUES ('138', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:58', '2015-09-15 21:44:58');
INSERT INTO `activity_log` VALUES ('139', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:44:58', '2015-09-15 21:44:58');
INSERT INTO `activity_log` VALUES ('140', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:01', '2015-09-15 21:45:01');
INSERT INTO `activity_log` VALUES ('141', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:01', '2015-09-15 21:45:01');
INSERT INTO `activity_log` VALUES ('142', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:01', '2015-09-15 21:45:01');
INSERT INTO `activity_log` VALUES ('143', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('144', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('145', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('146', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('147', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('148', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('149', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('150', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('151', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('152', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:02', '2015-09-15 21:45:02');
INSERT INTO `activity_log` VALUES ('153', '0', '3', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:15', '2015-09-15 21:45:15');
INSERT INTO `activity_log` VALUES ('154', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('155', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('156', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('157', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('158', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('159', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('160', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('161', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('162', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:20', '2015-09-15 21:45:20');
INSERT INTO `activity_log` VALUES ('163', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:21', '2015-09-15 21:45:21');
INSERT INTO `activity_log` VALUES ('164', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:21', '2015-09-15 21:45:21');
INSERT INTO `activity_log` VALUES ('165', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:21', '2015-09-15 21:45:21');
INSERT INTO `activity_log` VALUES ('166', '0', '37', 'Ayuda', 'Updated', 'Eliminacion 37', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:21', '2015-09-15 21:45:21');
INSERT INTO `activity_log` VALUES ('167', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:21', '2015-09-15 21:45:21');
INSERT INTO `activity_log` VALUES ('168', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('169', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('170', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('171', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('172', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('173', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('174', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('175', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('176', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('177', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:29', '2015-09-15 21:45:29');
INSERT INTO `activity_log` VALUES ('178', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:30', '2015-09-15 21:45:30');
INSERT INTO `activity_log` VALUES ('179', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:31', '2015-09-15 21:45:31');
INSERT INTO `activity_log` VALUES ('180', '0', '37', 'Ayuda', 'Updated', 'Eliminacion 37', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:36', '2015-09-15 21:45:36');
INSERT INTO `activity_log` VALUES ('181', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:36', '2015-09-15 21:45:36');
INSERT INTO `activity_log` VALUES ('182', '0', '36', 'Ayuda', 'Updated', 'Eliminacion 36', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:45:36', '2015-09-15 21:45:36');
INSERT INTO `activity_log` VALUES ('183', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('184', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('185', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('186', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('187', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('188', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('189', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('190', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('191', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('192', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('193', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('194', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:23', '2015-09-15 21:46:23');
INSERT INTO `activity_log` VALUES ('195', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:24', '2015-09-15 21:46:24');
INSERT INTO `activity_log` VALUES ('196', '0', '37', 'Ayuda', 'Updated', 'Eliminacion 37', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:24', '2015-09-15 21:46:24');
INSERT INTO `activity_log` VALUES ('197', '0', '36', 'Ayuda', 'Updated', 'Eliminacion 36', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:24', '2015-09-15 21:46:24');
INSERT INTO `activity_log` VALUES ('198', '0', '33', 'Ayuda', 'Updated', 'Eliminacion 33', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:24', '2015-09-15 21:46:24');
INSERT INTO `activity_log` VALUES ('199', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('200', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('201', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('202', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('203', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('204', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('205', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('206', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('207', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('208', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('209', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('210', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('211', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('212', '0', '37', 'Ayuda', 'Updated', 'Eliminacion 37', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:29', '2015-09-15 21:46:29');
INSERT INTO `activity_log` VALUES ('213', '0', '36', 'Ayuda', 'Updated', 'Eliminacion 36', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:30', '2015-09-15 21:46:30');
INSERT INTO `activity_log` VALUES ('214', '0', '33', 'Ayuda', 'Updated', 'Eliminacion 33', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:30', '2015-09-15 21:46:30');
INSERT INTO `activity_log` VALUES ('215', '0', '34', 'Ayuda', 'Updated', 'Eliminacion 34', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:30', '2015-09-15 21:46:30');
INSERT INTO `activity_log` VALUES ('216', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:34', '2015-09-15 21:46:34');
INSERT INTO `activity_log` VALUES ('217', '0', '32', 'Ayuda', 'Updated', 'Eliminacion 32', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:34', '2015-09-15 21:46:34');
INSERT INTO `activity_log` VALUES ('218', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:34', '2015-09-15 21:46:34');
INSERT INTO `activity_log` VALUES ('219', '0', '39', 'Ayuda', 'Updated', 'Eliminacion 39', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:34', '2015-09-15 21:46:34');
INSERT INTO `activity_log` VALUES ('220', '0', '40', 'Ayuda', 'Updated', 'Eliminacion 40', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:35', '2015-09-15 21:46:35');
INSERT INTO `activity_log` VALUES ('221', '0', '43', 'Ayuda', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:36', '2015-09-15 21:46:36');
INSERT INTO `activity_log` VALUES ('222', '0', '42', 'Ayuda', 'Updated', 'Eliminacion 42', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('223', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('224', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('225', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('226', '0', '38', 'Ayuda', 'Updated', 'Eliminacion 38', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('227', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('228', '0', '41', 'Ayuda', 'Updated', 'Eliminacion 41', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('229', '0', '37', 'Ayuda', 'Updated', 'Eliminacion 37', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('230', '0', '36', 'Ayuda', 'Updated', 'Eliminacion 36', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('231', '0', '33', 'Ayuda', 'Updated', 'Eliminacion 33', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('232', '0', '34', 'Ayuda', 'Updated', 'Eliminacion 34', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('233', '0', '35', 'Ayuda', 'Updated', 'Eliminacion 35', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:46:41', '2015-09-15 21:46:41');
INSERT INTO `activity_log` VALUES ('234', '0', '43', 'Actividad', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:38', '2015-09-15 21:47:38');
INSERT INTO `activity_log` VALUES ('235', '0', '43', 'Actividad', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:41', '2015-09-15 21:47:41');
INSERT INTO `activity_log` VALUES ('236', '0', '44', 'Actividad', 'Updated', 'Eliminacion 44', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:41', '2015-09-15 21:47:41');
INSERT INTO `activity_log` VALUES ('237', '0', '43', 'Actividad', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:44', '2015-09-15 21:47:44');
INSERT INTO `activity_log` VALUES ('238', '0', '44', 'Actividad', 'Updated', 'Eliminacion 44', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:44', '2015-09-15 21:47:44');
INSERT INTO `activity_log` VALUES ('239', '0', '48', 'Actividad', 'Updated', 'Eliminacion 48', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:45', '2015-09-15 21:47:45');
INSERT INTO `activity_log` VALUES ('240', '0', '43', 'Actividad', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:49', '2015-09-15 21:47:49');
INSERT INTO `activity_log` VALUES ('241', '0', '44', 'Actividad', 'Updated', 'Eliminacion 44', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:50', '2015-09-15 21:47:50');
INSERT INTO `activity_log` VALUES ('242', '0', '48', 'Actividad', 'Updated', 'Eliminacion 48', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:51', '2015-09-15 21:47:51');
INSERT INTO `activity_log` VALUES ('243', '0', '0', 'Ayuda', 'Updated', 'Creacion Medicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:54', '2015-09-15 21:47:54');
INSERT INTO `activity_log` VALUES ('244', '0', '51', 'Actividad', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('245', '0', '44', 'Actividad', 'Updated', 'Eliminacion 44', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('246', '0', '43', 'Actividad', 'Updated', 'Eliminacion 43', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('247', '0', '48', 'Actividad', 'Updated', 'Eliminacion 48', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('248', '0', '51', 'Actividad', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('249', '0', '51', 'Actividad', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:47:56', '2015-09-15 21:47:56');
INSERT INTO `activity_log` VALUES ('250', '0', '2222', 'Personal', 'Updated', 'Eliminacion  2222', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:48:52', '2015-09-15 21:48:52');
INSERT INTO `activity_log` VALUES ('251', '0', '258794', 'Donacion', 'Updated', 'Creacion Medicamentos', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:49:44', '2015-09-15 21:49:44');
INSERT INTO `activity_log` VALUES ('252', '0', '3332', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:50:50', '2015-09-15 21:50:50');
INSERT INTO `activity_log` VALUES ('253', '0', '3332', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:50:55', '2015-09-15 21:50:55');
INSERT INTO `activity_log` VALUES ('254', '0', '3332', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:50:55', '2015-09-15 21:50:55');
INSERT INTO `activity_log` VALUES ('255', '0', '4343', 'Personal', 'Updated', 'Eliminacion  4343', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:51:30', '2015-09-15 21:51:30');
INSERT INTO `activity_log` VALUES ('256', '0', '11', 'Donacion', 'Updated', 'Eliminacion 11', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:51:56', '2015-09-15 21:51:56');
INSERT INTO `activity_log` VALUES ('257', '0', '11', 'Donacion', 'Updated', 'Eliminacion 11', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:52:04', '2015-09-15 21:52:04');
INSERT INTO `activity_log` VALUES ('258', '0', '11', 'Donacion', 'Updated', 'Eliminacion 11', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:52:04', '2015-09-15 21:52:04');
INSERT INTO `activity_log` VALUES ('259', '0', '13', 'Donacion', 'Updated', 'Eliminacion 13', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:52:04', '2015-09-15 21:52:04');
INSERT INTO `activity_log` VALUES ('260', '0', '45646846', 'Donacion', 'Updated', 'Creacion Material Escolar', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:52:53', '2015-09-15 21:52:53');
INSERT INTO `activity_log` VALUES ('261', '0', '90870', 'Ayuda', 'Updated', 'Creacion Material Escolar', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-15 21:53:37', '2015-09-15 21:53:37');
INSERT INTO `activity_log` VALUES ('262', '0', '42', 'Actividad', 'Updated', 'Actualizacion Recolecion de donaciones', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 00:26:25', '2015-09-16 00:26:25');
INSERT INTO `activity_log` VALUES ('263', '0', '2147483647', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 13:33:59', '2015-09-16 13:33:59');
INSERT INTO `activity_log` VALUES ('264', '0', '591110', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 13:39:59', '2015-09-16 13:39:59');
INSERT INTO `activity_log` VALUES ('265', '0', '591110', 'Donacion', 'Updated', 'Creacion programacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 14:14:14', '2015-09-16 14:14:14');
INSERT INTO `activity_log` VALUES ('266', '0', '4', 'Ayuda', 'Updated', 'Creacion comida', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 14:14:55', '2015-09-16 14:14:55');
INSERT INTO `activity_log` VALUES ('267', '0', '4', 'Ayuda', 'Updated', 'Creacion asdsda', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 14:22:55', '2015-09-16 14:22:55');
INSERT INTO `activity_log` VALUES ('268', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:13', '2015-09-16 19:50:13');
INSERT INTO `activity_log` VALUES ('269', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:16', '2015-09-16 19:50:16');
INSERT INTO `activity_log` VALUES ('270', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:17', '2015-09-16 19:50:17');
INSERT INTO `activity_log` VALUES ('271', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:20', '2015-09-16 19:50:20');
INSERT INTO `activity_log` VALUES ('272', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:20', '2015-09-16 19:50:20');
INSERT INTO `activity_log` VALUES ('273', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:20', '2015-09-16 19:50:20');
INSERT INTO `activity_log` VALUES ('274', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:24', '2015-09-16 19:50:24');
INSERT INTO `activity_log` VALUES ('275', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:24', '2015-09-16 19:50:24');
INSERT INTO `activity_log` VALUES ('276', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:24', '2015-09-16 19:50:24');
INSERT INTO `activity_log` VALUES ('277', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:24', '2015-09-16 19:50:24');
INSERT INTO `activity_log` VALUES ('278', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:27', '2015-09-16 19:50:27');
INSERT INTO `activity_log` VALUES ('279', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:27', '2015-09-16 19:50:27');
INSERT INTO `activity_log` VALUES ('280', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:27', '2015-09-16 19:50:27');
INSERT INTO `activity_log` VALUES ('281', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:27', '2015-09-16 19:50:27');
INSERT INTO `activity_log` VALUES ('282', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:50:27', '2015-09-16 19:50:27');
INSERT INTO `activity_log` VALUES ('283', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('284', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('285', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('286', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('287', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('288', '0', '52', 'Ayuda', 'Updated', 'Eliminacion 52', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:01', '2015-09-16 19:51:01');
INSERT INTO `activity_log` VALUES ('289', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('290', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('291', '0', '52', 'Ayuda', 'Updated', 'Eliminacion 52', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('292', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('293', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('294', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('295', '0', '51', 'Ayuda', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:05', '2015-09-16 19:51:05');
INSERT INTO `activity_log` VALUES ('296', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:08', '2015-09-16 19:51:08');
INSERT INTO `activity_log` VALUES ('297', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('298', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('299', '0', '52', 'Ayuda', 'Updated', 'Eliminacion 52', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('300', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('301', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('302', '0', '51', 'Ayuda', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('303', '0', '50', 'Ayuda', 'Updated', 'Eliminacion 50', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:09', '2015-09-16 19:51:09');
INSERT INTO `activity_log` VALUES ('304', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('305', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('306', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('307', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('308', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('309', '0', '52', 'Ayuda', 'Updated', 'Eliminacion 52', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('310', '0', '51', 'Ayuda', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('311', '0', '50', 'Ayuda', 'Updated', 'Eliminacion 50', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('312', '0', '49', 'Ayuda', 'Updated', 'Eliminacion 49', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:13', '2015-09-16 19:51:13');
INSERT INTO `activity_log` VALUES ('313', '0', '54', 'Ayuda', 'Updated', 'Eliminacion 54', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('314', '0', '53', 'Ayuda', 'Updated', 'Eliminacion 53', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('315', '0', '55', 'Ayuda', 'Updated', 'Eliminacion 55', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('316', '0', '57', 'Ayuda', 'Updated', 'Eliminacion 57', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('317', '0', '56', 'Ayuda', 'Updated', 'Eliminacion 56', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('318', '0', '52', 'Ayuda', 'Updated', 'Eliminacion 52', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('319', '0', '50', 'Ayuda', 'Updated', 'Eliminacion 50', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('320', '0', '51', 'Ayuda', 'Updated', 'Eliminacion 51', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('321', '0', '49', 'Ayuda', 'Updated', 'Eliminacion 49', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:17', '2015-09-16 19:51:17');
INSERT INTO `activity_log` VALUES ('322', '0', '48', 'Ayuda', 'Updated', 'Eliminacion 48', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 19:51:18', '2015-09-16 19:51:18');
INSERT INTO `activity_log` VALUES ('323', '0', '321654', 'Donacion', 'Updated', 'Creacion hhhhhh', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 20:20:04', '2015-09-16 20:20:04');
INSERT INTO `activity_log` VALUES ('324', '0', '45646846', 'Donacion', 'Updated', 'Creacion pruebas', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 23:29:22', '2015-09-16 23:29:22');
INSERT INTO `activity_log` VALUES ('325', '0', '59', 'Ayuda', 'Updated', 'Eliminacion 59', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 23:36:30', '2015-09-16 23:36:30');
INSERT INTO `activity_log` VALUES ('326', '0', '59', 'Ayuda', 'Updated', 'Eliminacion 59', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 23:36:33', '2015-09-16 23:36:33');
INSERT INTO `activity_log` VALUES ('327', '0', '60', 'Ayuda', 'Updated', 'Eliminacion 60', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-16 23:36:33', '2015-09-16 23:36:33');
INSERT INTO `activity_log` VALUES ('328', '0', '62', 'Ayuda', 'Updated', 'Eliminacion 62', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 23:37:03', '2015-09-16 23:37:03');
INSERT INTO `activity_log` VALUES ('329', '0', '61', 'Ayuda', 'Updated', 'Eliminacion 61', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 23:37:08', '2015-09-16 23:37:08');
INSERT INTO `activity_log` VALUES ('330', '0', '62', 'Ayuda', 'Updated', 'Eliminacion 62', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 23:37:08', '2015-09-16 23:37:08');
INSERT INTO `activity_log` VALUES ('331', '0', '90870', 'Ayuda', 'Updated', 'Creacion mmm', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', '2015-09-16 23:41:52', '2015-09-16 23:41:52');
INSERT INTO `activity_log` VALUES ('332', '0', '0', 'Beneficiario', 'Updated', 'Eliminacion', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 20:00:45', '2015-09-18 20:00:45');
INSERT INTO `activity_log` VALUES ('333', '0', '135', 'Personal', 'Updated', 'Creacion Aportante', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 20:17:21', '2015-09-18 20:17:21');
INSERT INTO `activity_log` VALUES ('334', '0', '135', 'Personal', 'Updated', 'Eliminacion  135', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 20:18:54', '2015-09-18 20:18:54');
INSERT INTO `activity_log` VALUES ('335', '0', '8346210', 'Personal', 'Updated', 'Actualizacion  ', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 20:26:34', '2015-09-18 20:26:34');
INSERT INTO `activity_log` VALUES ('336', '0', '8346210', 'Personal', 'Updated', 'Eliminacion  8346210', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 20:29:04', '2015-09-18 20:29:04');
INSERT INTO `activity_log` VALUES ('337', '0', '53', 'Actividad', 'Updated', 'Actualizacion Actividad2', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 22:22:09', '2015-09-18 22:22:09');
INSERT INTO `activity_log` VALUES ('338', '0', '65', 'Ayuda', 'Updated', 'Actualizacion 90870', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 22:25:36', '2015-09-18 22:25:36');
INSERT INTO `activity_log` VALUES ('339', '0', '45646846', 'Donacion', 'Updated', 'Creacion pruebas mo', 'Usuario: Administrador ', '0', '190.11.80.211', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', '2015-09-18 22:29:37', '2015-09-18 22:29:37');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'Administrador ', 'admin@4devopshub.com', '$2y$10$499kBcLs6nQDMJc4UaHiT.sfG3HnryUu0A7jZZO67cZjI3xmD.TXO', '2015-09-18 22:50:12', 'xVVYk0K4izalD8yPoDr1aUakmo79bWv5qzytrokeaDSeuziMSESGpw63Zzi3', '2015-04-29 06:03:15', '2015-09-18 22:50:12');
INSERT INTO `admins` VALUES ('2', 'guillermo paredes', 'guillermo@redefined.com', '$2y$10$Qo0Gb6DCFgfJuAnIclUkPeJyyJ..jJXlwRSKykWkDrNFOyOuU4J5i', '2015-09-14 20:52:22', 'BjCBi4UnRVkhbpo5Genq7cx1qlZPi7VUd7ImVcj0uT5UdBX1pWWl9REvmFi8', '2015-09-14 20:46:33', '2015-09-14 20:52:22');
INSERT INTO `admins` VALUES ('10', 'vivana fernandez', 'viviana@redefined.com', '$2y$10$LbwFiWOiGSNzsvlTHi.gSuAiXqC9k7d6f7WqWYRvhkWswa.YijHF2', '0000-00-00 00:00:00', null, '2015-09-14 20:57:22', '2015-09-14 20:57:22');

-- ----------------------------
-- Table structure for attendance
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` enum('absent','present') COLLATE utf8_unicode_ci NOT NULL,
  `leaveType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `halfDayType` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `application_status` enum('approved','rejected','pending') COLLATE utf8_unicode_ci DEFAULT NULL,
  `applied_on` date DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attendance_employeeid_index` (`employeeID`),
  KEY `attendance_leavetype_index` (`leaveType`),
  KEY `attendance_updated_by_index` (`updated_by`),
  KEY `attendance_halfdaytype_index` (`halfDayType`),
  CONSTRAINT `attendance_halfdaytype_foreign` FOREIGN KEY (`halfDayType`) REFERENCES `leavetypes` (`leaveType`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attendance_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attendance_leavetype_foreign` FOREIGN KEY (`leaveType`) REFERENCES `leavetypes` (`leaveType`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attendance_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES ('1', '1', '2015-08-26', 'absent', 'sick', null, '', null, null, 'admin@4devopshub.com', '2015-08-26 21:51:18', '2015-08-26 21:51:18');

-- ----------------------------
-- Table structure for awards
-- ----------------------------
DROP TABLE IF EXISTS `awards`;
CREATE TABLE `awards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `awardName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gift` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cashPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forMonth` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `forYear` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `awards_employeeid_index` (`employeeID`),
  CONSTRAINT `awards_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of awards
-- ----------------------------
INSERT INTO `awards` VALUES ('1', '1', 'lo que sea', '555', '111', 'november', '2015', '2015-09-03 18:10:38', '2015-09-04 01:32:18');

-- ----------------------------
-- Table structure for ayudas
-- ----------------------------
DROP TABLE IF EXISTS `ayudas`;
CREATE TABLE `ayudas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `aportanteID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `requerimiento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `centroSalud` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` int(10) DEFAULT NULL,
  `numfactura` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adminID` int(10) DEFAULT NULL,
  `fechaAyuda` date NOT NULL,
  `gastos` float(20,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ayuda_beneficiario` (`beneficiarioID`),
  KEY `ayuda_aportante` (`aportanteID`),
  CONSTRAINT `ayuda_aportante` FOREIGN KEY (`aportanteID`) REFERENCES `personal` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ayuda_beneficiario` FOREIGN KEY (`beneficiarioID`) REFERENCES `beneficiarios` (`beneficiarioID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ayudas
-- ----------------------------
INSERT INTO `ayudas` VALUES ('45', '90870', '45646846', 'Material Escolar', 'Las Rosas', '123', '123', '2015-09-15 21:53:37', '2015-09-15 21:53:37', null, '0000-00-00', '80');
INSERT INTO `ayudas` VALUES ('46', '4', '258794', 'llllll', 'llll', '0', '0', '2015-09-16 13:54:53', '2015-09-16 13:54:53', null, '0000-00-00', '900');
INSERT INTO `ayudas` VALUES ('47', '4', '834621000', 'lollolol', 'lolollolololo', '2147483647', '1232133', '2015-09-16 13:58:43', '2015-09-16 13:58:43', null, '0000-00-00', '123123');
INSERT INTO `ayudas` VALUES ('58', '4', '45646846', 'estudios', 'umsa', '666', '666', '2015-09-16 23:29:54', '2015-09-16 23:29:54', null, '0000-00-00', '900');
INSERT INTO `ayudas` VALUES ('63', '201510', '321654', 'lapices', 'nn', '123456', '123465', '2015-09-16 23:32:29', '2015-09-16 23:32:29', null, '0000-00-00', '5');
INSERT INTO `ayudas` VALUES ('64', '90870', '45646846', 'zzzz', 'zzz', '666', '898989', '2015-09-16 23:37:51', '2015-09-16 23:37:51', null, '0000-00-00', '1');
INSERT INTO `ayudas` VALUES ('65', '90870', '45646846', 'mmm', 'mmmnnn', '321', '321', '2015-09-16 23:41:52', '2015-09-18 22:25:36', null, '0000-00-00', '666');

-- ----------------------------
-- Table structure for bank_details
-- ----------------------------
DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE `bank_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `accountName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `accountNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bank_details_employeeid_index` (`employeeID`),
  CONSTRAINT `bank_details_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bank_details
-- ----------------------------
INSERT INTO `bank_details` VALUES ('2', '1', 'La Paz', 'Murillo', '', 'Alto Lima', '', '3 seccion', '2015-08-21 22:11:05', '2015-08-21 22:11:05');

-- ----------------------------
-- Table structure for beneficiario_documentos
-- ----------------------------
DROP TABLE IF EXISTS `beneficiario_documentos`;
CREATE TABLE `beneficiario_documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `beneficiarios_documentosid_index` (`beneficiarioID`),
  CONSTRAINT `beneficiarios_documentosid_index_foreign` FOREIGN KEY (`beneficiarioID`) REFERENCES `beneficiarios` (`beneficiarioID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of beneficiario_documentos
-- ----------------------------

-- ----------------------------
-- Table structure for beneficiarios
-- ----------------------------
DROP TABLE IF EXISTS `beneficiarios`;
CREATE TABLE `beneficiarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsableID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genero` enum('hombre','mujer','otros') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'hombre',
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fechanac` date DEFAULT NULL,
  `fechaing` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `direccionperm` text COLLATE utf8_unicode_ci,
  `status` enum('activo','inactivo') COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_desvinculacion` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `objetivo` int(11) DEFAULT NULL,
  `iddiagnostico` int(11) DEFAULT NULL,
  `diagnostico` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechadiagnostico` date DEFAULT NULL,
  `tratamiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duracion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beneficiarios_email_unique` (`email`),
  UNIQUE KEY `beneficiarios_beneficiarioid_unique` (`beneficiarioID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of beneficiarios
-- ----------------------------
INSERT INTO `beneficiarios` VALUES ('31', '201510', 'David', 'Paredes', 'gdavid.ptorrez@gmail.com', '$2y$10$ZyspOp0zgcSSsOQJfD6fo.BIRFncC2RyXKys9GpgTKpAOmA4hRwnW', '', 'hombre', '69684589', '2015-09-09', '2015-09-23', 'default.jpg', 'alto lima', '', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-12 18:51:53', '2015-09-12 18:51:53', '1', null, null, null, null, null, null, null, null);
INSERT INTO `beneficiarios` VALUES ('35', '90870', 'Demo', 'Vargas', 'sdf@hotmail.com', '$2y$10$/mBOT4wt71TWnAxNuMYB/OS9F9ly890ZVhLAlGHHMl02vEjvep9qK', '', 'hombre', '6789', '1970-01-01', '1970-01-01', 'default.jpg', 'fghjkl', '', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-14 15:17:45', '2015-09-14 15:17:45', '1', null, null, null, null, null, null, null, null);
INSERT INTO `beneficiarios` VALUES ('36', '4', 'Mikel', 'Mikel', 'mikel@hotmail.com', '$2y$10$pyz4eGa5YJFnNUrijYlZuuiwvqzdEzCv9fn9uyQjGJuaFKx8.BYti', '', 'hombre', '0986', null, '1970-01-01', 'default.jpg', 'direccion mikel', '', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-14 15:29:41', '2015-09-14 15:41:19', '1', '3', 'aasdasdsdaasdasdasd', '0000-00-00', 'adsadsasd', 'razon alyb', 'lhhn aojs', 'oyfosudhfi ', 'iubfsdf');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deptName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('2', 'Estudios', '2015-08-21 21:38:59', '2015-08-21 21:38:59');

-- ----------------------------
-- Table structure for designation
-- ----------------------------
DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deptID` int(10) unsigned NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `designation_deptid_foreign` (`deptID`),
  CONSTRAINT `designation_deptid_foreign` FOREIGN KEY (`deptID`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of designation
-- ----------------------------
INSERT INTO `designation` VALUES ('4', '2', 'Material Escolar', '2015-08-21 21:38:59', '2015-08-21 21:38:59');
INSERT INTO `designation` VALUES ('5', '2', 'Libros', '2015-08-21 21:38:59', '2015-08-21 21:38:59');

-- ----------------------------
-- Table structure for destino
-- ----------------------------
DROP TABLE IF EXISTS `destino`;
CREATE TABLE `destino` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destino` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of destino
-- ----------------------------
INSERT INTO `destino` VALUES ('7', 'Salud', '2015-08-22 02:14:30', '2015-08-22 02:14:30');
INSERT INTO `destino` VALUES ('8', 'Habitacion', '2015-08-22 14:27:07', '2015-08-22 14:27:07');
INSERT INTO `destino` VALUES ('9', 'Estudio', '2015-08-22 23:33:00', '2015-08-22 23:33:00');
INSERT INTO `destino` VALUES ('10', 'iNVALIDO', '2015-09-03 20:01:49', '2015-09-03 20:01:49');
INSERT INTO `destino` VALUES ('11', 'medicina', '2015-09-11 05:02:53', '2015-09-11 05:02:53');

-- ----------------------------
-- Table structure for donaciones
-- ----------------------------
DROP TABLE IF EXISTS `donaciones`;
CREATE TABLE `donaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aportanteID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `montodonacion` float(255,0) NOT NULL,
  `fechadon` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `donaciones_personal_foreign` (`aportanteID`),
  CONSTRAINT `donaciones_personal_foreign` FOREIGN KEY (`aportanteID`) REFERENCES `personal` (`personalID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of donaciones
-- ----------------------------
INSERT INTO `donaciones` VALUES ('12', '1231', '3', 'Recolecion de donaciones', '500', '0000-00-00', '2015-09-15 18:13:42', '2015-09-15 18:13:42');
INSERT INTO `donaciones` VALUES ('14', '258794', '000000000', 'Medicamentos', '200', '0000-00-00', '2015-09-15 21:49:44', '2015-09-15 21:49:44');
INSERT INTO `donaciones` VALUES ('15', '45646846', '90870', 'Material Escolar', '100', '0000-00-00', '2015-09-15 21:52:53', '2015-09-15 21:52:53');
INSERT INTO `donaciones` VALUES ('16', '591110', '4', 'programacion', '9000', '0000-00-00', '2015-09-16 14:14:14', '2015-09-16 14:14:14');
INSERT INTO `donaciones` VALUES ('17', '321654', '201510', 'hhhhhh', '10', '0000-00-00', '2015-09-16 20:20:04', '2015-09-16 20:20:04');
INSERT INTO `donaciones` VALUES ('18', '45646846', '4', 'pruebas mo', '9000', '0000-00-00', '2015-09-18 18:29:37', '2015-09-18 22:29:37');

-- ----------------------------
-- Table structure for employee_documents
-- ----------------------------
DROP TABLE IF EXISTS `employee_documents`;
CREATE TABLE `employee_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `employee_documents_employeeid_index` (`employeeID`),
  CONSTRAINT `employee_documents_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employee_documents
-- ----------------------------

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `fatherName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobileNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `designation` int(10) unsigned DEFAULT NULL,
  `joiningDate` date DEFAULT NULL,
  `profileImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `localAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `permanentAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_employeeid_unique` (`employeeID`),
  KEY `employees_designation_foreign` (`designation`),
  CONSTRAINT `employees_designation_foreign` FOREIGN KEY (`designation`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('2', '1', 'Ariel', 'support@4devopshub.com', '$2y$10$Of3LuoHziThpdhMqAtD0seb92omi8lykDNWtUuzkA.EY57p.WqCRe', 'male', '', '66666666', '1970-01-01', '4', '1970-01-01', 'default.jpg', 'Zona Alto Lima 3 seccion', '', 'active', '2015-08-22 19:35:48', 'U1Oh1vd7Tk3VzLg3xGUIQl3rB8MbkHMEIr84LiU6oAUYgt7AgivQvTRIAG5H', null, '2015-08-21 22:11:05', '2015-08-22 19:35:48');

-- ----------------------------
-- Table structure for expenses
-- ----------------------------
DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchaseDate` date NOT NULL,
  `purchaseFrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `bill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of expenses
-- ----------------------------

-- ----------------------------
-- Table structure for holidays
-- ----------------------------
DROP TABLE IF EXISTS `holidays`;
CREATE TABLE `holidays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `occassion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `holidays_date_unique` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of holidays
-- ----------------------------
INSERT INTO `holidays` VALUES ('1', '2015-01-04', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('2', '2015-01-11', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('3', '2015-01-18', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('4', '2015-01-25', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('5', '2015-02-01', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('6', '2015-02-08', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('7', '2015-02-15', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('8', '2015-02-22', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('9', '2015-03-01', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('10', '2015-03-08', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('11', '2015-03-15', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('12', '2015-03-22', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('13', '2015-03-29', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('14', '2015-04-05', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('15', '2015-04-12', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('16', '2015-04-19', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('17', '2015-04-26', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('18', '2015-05-03', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('19', '2015-05-10', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('20', '2015-05-17', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('21', '2015-05-24', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('22', '2015-05-31', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('23', '2015-06-07', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('24', '2015-06-14', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('25', '2015-06-21', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('26', '2015-06-28', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('27', '2015-07-05', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('28', '2015-07-12', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('29', '2015-07-19', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('30', '2015-07-26', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('31', '2015-08-02', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('32', '2015-08-09', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('33', '2015-08-16', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('34', '2015-08-23', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('35', '2015-08-30', 'Sunday', '2015-08-24 16:59:11', '2015-08-24 16:59:11');
INSERT INTO `holidays` VALUES ('36', '2015-09-06', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('37', '2015-09-13', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('38', '2015-09-20', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('39', '2015-09-27', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('40', '2015-10-04', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('41', '2015-10-11', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('42', '2015-10-18', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('43', '2015-10-25', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('44', '2015-11-01', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('45', '2015-11-08', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('46', '2015-11-15', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('47', '2015-11-22', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('48', '2015-11-29', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('49', '2015-12-06', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('50', '2015-12-13', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('51', '2015-12-20', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('52', '2015-12-27', 'Sunday', '2015-08-24 16:59:12', '2015-08-24 16:59:12');
INSERT INTO `holidays` VALUES ('53', '2015-08-24', 'lso qeyvh', '2015-08-24 16:59:44', '2015-08-24 22:58:44');
INSERT INTO `holidays` VALUES ('54', '2015-09-17', 'hgfv', '2015-09-14 16:32:59', '2015-09-14 16:32:59');

-- ----------------------------
-- Table structure for leavetypes
-- ----------------------------
DROP TABLE IF EXISTS `leavetypes`;
CREATE TABLE `leavetypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `leaveType` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `num_of_leave` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `leavetypes_leavetype_index` (`leaveType`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of leavetypes
-- ----------------------------
INSERT INTO `leavetypes` VALUES ('1', 'sick', '5', '2015-04-29 06:03:15', '2015-04-29 06:03:15');
INSERT INTO `leavetypes` VALUES ('2', 'casual', '5', '2015-04-29 06:03:15', '2015-04-29 06:03:15');
INSERT INTO `leavetypes` VALUES ('3', 'half day', '0', '2015-04-29 06:03:15', '2015-04-29 06:03:15');
INSERT INTO `leavetypes` VALUES ('4', 'maternity', '5', '2015-04-29 06:03:15', '2015-04-29 06:03:15');
INSERT INTO `leavetypes` VALUES ('5', 'others', '5', '2015-04-29 06:03:15', '2015-04-29 06:03:15');
INSERT INTO `leavetypes` VALUES ('6', 'rfthyj', '0', '2015-09-14 16:41:35', '2015-09-14 16:41:35');
INSERT INTO `leavetypes` VALUES ('7', 'hyhyyuhnuj', '0', '2015-09-14 16:41:55', '2015-09-14 16:41:55');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2013_09_12_234559_create_activity_log_table', '1');

-- ----------------------------
-- Table structure for noticeboards
-- ----------------------------
DROP TABLE IF EXISTS `noticeboards`;
CREATE TABLE `noticeboards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of noticeboards
-- ----------------------------

-- ----------------------------
-- Table structure for objetivo
-- ----------------------------
DROP TABLE IF EXISTS `objetivo`;
CREATE TABLE `objetivo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destID` int(10) DEFAULT NULL,
  `objetivo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `objetivo_destid_foreign` (`destID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of objetivo
-- ----------------------------
INSERT INTO `objetivo` VALUES ('1', '7', '100', '2015-08-22 02:14:30', '2015-08-22 14:09:40');
INSERT INTO `objetivo` VALUES ('3', '8', 'Alquieres', '2015-08-22 14:27:07', '2015-08-22 14:27:07');
INSERT INTO `objetivo` VALUES ('4', '8', 'Muebles', '2015-08-22 14:27:07', '2015-08-22 14:27:07');
INSERT INTO `objetivo` VALUES ('5', '7', 'Medicamentos', '2015-08-22 23:18:37', '2015-08-22 23:18:37');
INSERT INTO `objetivo` VALUES ('6', '7', 'Operaciones', '2015-08-22 23:24:44', '2015-08-22 23:24:44');
INSERT INTO `objetivo` VALUES ('7', '7', 'tratamientos', '2015-08-22 23:32:16', '2015-08-22 23:32:16');
INSERT INTO `objetivo` VALUES ('8', '9', 'Material Escolar', '2015-08-22 23:33:00', '2015-08-22 23:33:00');
INSERT INTO `objetivo` VALUES ('9', '9', 'Matricula', '2015-08-22 23:33:00', '2015-08-22 23:33:00');
INSERT INTO `objetivo` VALUES ('10', '10', 'NO PUEDO CAMINAR', '2015-09-03 20:01:49', '2015-09-03 20:01:49');
INSERT INTO `objetivo` VALUES ('11', '10', 'ES CIEGO', '2015-09-03 20:01:49', '2015-09-03 20:01:49');
INSERT INTO `objetivo` VALUES ('12', '11', 'curarla', '2015-09-11 05:02:53', '2015-09-11 05:02:53');

-- ----------------------------
-- Table structure for participaciones
-- ----------------------------
DROP TABLE IF EXISTS `participaciones`;
CREATE TABLE `participaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voluntarioID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `actividadID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoVoluntario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreVoluntario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of participaciones
-- ----------------------------
INSERT INTO `participaciones` VALUES ('41', '685410', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('42', '2222', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('43', '4343', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('44', '9897978', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('45', '789798', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('46', '987987', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('47', '44654', '42', '', '', '2015-09-15 18:27:12', '2015-09-15 18:27:12');
INSERT INTO `participaciones` VALUES ('48', '789798', '44', '', '', '2015-09-15 18:48:58', '2015-09-15 18:48:58');
INSERT INTO `participaciones` VALUES ('49', '987987', '44', '', '', '2015-09-15 18:48:58', '2015-09-15 18:48:58');

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personalID` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genero` enum('Hombre','Mujer') COLLATE utf8_unicode_ci DEFAULT 'Hombre',
  `tipoPersonal` enum('Administrador','Aportante','Responsable','Voluntario') COLLATE utf8_unicode_ci NOT NULL,
  `parentesco` enum('Papa / Mama','Tio / Tia','Hermano / Hermana','OtroFamiliar','Ninguno') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Ninguno',
  `tipovoluntario` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocupacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `fotoPersonal` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default.jpg',
  `estado` enum('activo','inactivo') COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `personalID` (`personalID`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('2', '', '987654321', 'Test', 'Test', 'test@test.com', '$2y$10$BN2UIVoCLcm3pUDWi6h0zegmuLSaGhsoAkX.Zudys8q5iVRFF4UJC', 'Hombre', 'Administrador', '', null, '', '12345678', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-08-28 18:40:39', '2015-08-28 18:40:39');
INSERT INTO `personal` VALUES ('3', '', '685410', 'Viviana', 'Fernandez Ochoa', 'viviana.fer@hotmail.com', '$2y$10$LaR9aA7u9TUAwpQjGE6Mo.bh3BtcKyRlywhm7ssZfN51SLjvMbQze', 'Mujer', 'Voluntario', '', null, '', '76247032', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-08-28 18:50:51', '2015-08-28 18:50:51');
INSERT INTO `personal` VALUES ('4', '', '812369567', 'Otro', 'Otro', 'otro@otro.com', '$2y$10$2N.GWO1OZXv/xk7oG/NJWuc21umCLWEV2hIUXuKey0NdxkWNweiV2', 'Hombre', 'Aportante', '', null, '', '2345678', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-08-28 20:34:48', '2015-08-28 20:34:48');
INSERT INTO `personal` VALUES ('5', '', '321', 'Aa', 'Aaa', 'aaa@aaa.com', '$2y$10$afaSIc.n7L3wRN4cEpZ0fuIo1aSiicy83TvMh8R/ELsBgJkyQachS', 'Hombre', 'Aportante', '', null, '', 'aaa', '1970-01-01', 'default.jpg', 'activo', '2015-09-16 05:34:46', '9JCWSOuoqzVWXx4snLEZ9n9NLCeCGCWNN2bWC6YwK8GmaCEBs1DPgNRyRNkp', null, '2015-08-28 21:06:59', '2015-09-16 05:34:46');
INSERT INTO `personal` VALUES ('6', '666', '2543154018', 'David Roberto', 'Vargas', '', '$2y$10$E.p4QfTKjTg/D5GXojMq.epZdTTnsbyL4gUvo0xzpqYeyPCxzdAz6', 'Mujer', 'Responsable', 'Hermano / Hermana', null, 'universitario', '', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-03 22:30:05', '2015-09-04 15:39:11');
INSERT INTO `personal` VALUES ('23', '', '2222', 'admin', 'admin', 'admin@aaa.com', null, 'Hombre', 'Voluntario', 'Ninguno', null, '', '2222', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-09 21:23:06', '2015-09-09 21:23:06');
INSERT INTO `personal` VALUES ('32', '222020202', '379202', 'test', 'test', null, null, 'Hombre', 'Responsable', 'Ninguno', null, 'test', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-10 01:29:37', '2015-09-10 01:29:37');
INSERT INTO `personal` VALUES ('33', '', '258794', 'Fides', 'Radio', 'fides@admin.com', '$2y$10$D6MN8HX/26CXYl3/kv96RuDutp0So4hX6h35MtlQksoOF5sUiWnee', '', 'Aportante', 'Ninguno', null, '', '22222222', '1970-01-01', 'default.jpg', 'activo', '2015-09-10 01:49:05', '9vcPqdnVnapBiU5cHZnsS8dNsoYs81z0E1YOv4Vm2mYuUzmykwZMxy7E10fy', null, '2015-09-10 01:48:24', '2015-09-10 01:51:55');
INSERT INTO `personal` VALUES ('34', '', '45646846', 'La Razon', 'Prensa', 'larazon@admin.com', '$2y$10$.bcYklWXi6boMeJ.CQ1fz.CVHhMowrnTLgXoFfiT8kvglYhV.46Wy', '', 'Aportante', 'Ninguno', null, '', '2222222', '1970-01-01', 'default.jpg', 'activo', '2015-09-18 19:41:16', 'y2oX20wemiixbNaDrOQVhSzles9n9fhFW97XhyR3TNC0JEGFscsBmDdkyf9c', null, '2015-09-10 01:51:39', '2015-09-18 19:41:16');
INSERT INTO `personal` VALUES ('35', '', '9897978', 'Eldiario', 'Prensa', 'eldiario@admin.com', '$2y$10$H4RwDtIyYpW9JXMntMIEk.wMc1L.TpAXt2/aWmsBBEFd3stXiIH6C', '', 'Voluntario', 'Ninguno', null, '', '3333333', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-10 01:58:41', '2015-09-10 01:58:41');
INSERT INTO `personal` VALUES ('36', '', '321654', 'Ggg', 'Gggg', 'ggg@admin.com', '$2y$10$PAVf1zD0UP.gKuMcgJeYSOofHuxWKd66btZ2QZfogMZDDtw57v/Je', '', 'Aportante', 'Ninguno', null, '', '55555', '1970-01-01', 'default.jpg', 'activo', '2015-09-10 02:07:28', null, null, '2015-09-10 02:05:06', '2015-09-10 02:07:28');
INSERT INTO `personal` VALUES ('37', '', '789798', 'vol1', 'vol', 'vol@admin.com', null, 'Hombre', 'Voluntario', 'Ninguno', null, '', '789798', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-10 22:13:27', '2015-09-10 22:13:27');
INSERT INTO `personal` VALUES ('38', '', '987987', 'voluntario', 'voluntario', 'voluntario@admin.com', null, 'Hombre', 'Voluntario', 'Ninguno', null, '', '798798', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-10 22:25:31', '2015-09-10 22:25:31');
INSERT INTO `personal` VALUES ('43', '', '44654', 'lkjhg', 'oiuyt', 'gjhg@sgjgs.vg', null, 'Hombre', 'Voluntario', 'Ninguno', null, '', '456465', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-10 23:54:59', '2015-09-10 23:54:59');
INSERT INTO `personal` VALUES ('46', '', '1234567', 'Rodrigo', 'Miranda', 'admin@2.com', '$2y$10$mmTt6t4cke5DTLOyd4Z0bO4EdofWMRvrYjn./3/zqAbBcrMB6s9Ya', 'Hombre', 'Administrador', '', null, '', '73055789', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 05:07:25', '2015-09-11 05:13:06');
INSERT INTO `personal` VALUES ('47', '', '123123123', 'Rodrigo', 'Miranda', 'admin@4devopshub.com', '$2y$10$hNQvzjUvq5xazRsZs8K82OYWBJAvPF.DC7kMEgvn.9sHLwVUytcqq', 'Hombre', 'Administrador', 'Ninguno', null, '', '123123123', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 05:14:13', '2015-09-11 05:14:13');
INSERT INTO `personal` VALUES ('48', '', '123123', 'Rodrigo', 'Miranda', 'admin@2.com', '$2y$10$hb3KEwKHvIZCIHaFrGFPA.815jR7wZLVVAgOl3pe1EUInAqPgu5Rm', 'Hombre', 'Administrador', 'Ninguno', null, '', '1231231', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 05:15:13', '2015-09-11 05:15:13');
INSERT INTO `personal` VALUES ('49', '1111', '12312', 'carlos', 'maceda', null, null, 'Hombre', 'Responsable', '', null, 'aranda', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 05:28:04', '2015-09-11 05:28:04');
INSERT INTO `personal` VALUES ('50', '', '1231', 'Hugo', 'Miranda', 'admin@312.com', '$2y$10$bKZWBsgyd/xJHd04pBz3E.SZw.rNCTvqQ8N.gkNZmxoRec4at4hLa', 'Hombre', 'Aportante', 'Ninguno', null, '', '23123', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 05:31:19', '2015-09-11 05:31:19');
INSERT INTO `personal` VALUES ('51', '', '5555555', 'pruebavoluntaio', 'voluntari', 'vol@aaa.com', null, 'Hombre', 'Voluntario', 'Ninguno', 'lo q sea ', 'colegio', '11231', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 17:49:20', '2015-09-11 17:49:20');
INSERT INTO `personal` VALUES ('52', '', '65454', 'asdfgh', 'asdfg', 'asad@assa.com', null, 'Hombre', 'Voluntario', 'Ninguno', 'tipo voluntario', 'colegio', '5454', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 17:51:05', '2015-09-11 17:51:05');
INSERT INTO `personal` VALUES ('55', '', '834621000', 'Guillermo', 'Paredes', 'guillermparedes@hotmail.com', '$2y$10$iWpyBKI98z4Oz7Z.T242vuCYlbac5o2nWTeJBrfFwLOX0Ty6FnJrO', 'Hombre', 'Aportante', 'Ninguno', null, '', '123312312231', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 22:09:48', '2015-09-11 22:09:48');
INSERT INTO `personal` VALUES ('57', '000000000', '834610', 'guillermo p', 'oaredes', null, null, 'Hombre', 'Responsable', 'Ninguno', null, 'programador', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 22:33:39', '2015-09-11 22:33:39');
INSERT INTO `personal` VALUES ('60', '09979', '648270', 'vv', 'vv', null, null, 'Hombre', 'Responsable', '', null, 'vv', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 22:44:48', '2015-09-11 22:44:48');
INSERT INTO `personal` VALUES ('61', '3332', '2543154018', 'Guillermo', 'oaredes', null, null, 'Hombre', 'Responsable', 'Ninguno', null, 'universitario', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-11 22:50:00', '2015-09-11 22:50:00');
INSERT INTO `personal` VALUES ('67', '3', '22', '22', '22', null, null, 'Hombre', 'Responsable', 'Ninguno', null, '22', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-14 14:48:58', '2015-09-14 14:48:58');
INSERT INTO `personal` VALUES ('68', '90870', '332', 'asas', 'asas', null, null, 'Hombre', 'Responsable', 'Ninguno', null, 'asd', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-14 15:17:45', '2015-09-14 15:17:45');
INSERT INTO `personal` VALUES ('69', '4', '6854636', 'viviana', 'fernandez cohcoa', null, null, 'Hombre', 'Responsable', '', null, 'programadora', null, null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-14 15:29:41', '2015-09-14 15:29:41');
INSERT INTO `personal` VALUES ('70', '', '7359897234', 'Llol', 'Llol', 'lol@hotmail.com', '$2y$10$.leF50fBL5gTw.nFFBBqUu7kFizE7GsPumCqBp/1I9Q2kVpkGacaa', 'Hombre', 'Aportante', 'Ninguno', null, '', '1233455', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-16 13:33:59', '2015-09-16 13:33:59');
INSERT INTO `personal` VALUES ('71', '', '591110', 'Laravel', 'Laravel', 'laravel@laravel.com', '$2y$10$MfAGXcoxSKtaj5Q/EKe/s.FKJtaDhUjFPIeMPPRpDtfm1N5Trke5.', 'Hombre', 'Aportante', 'Ninguno', null, '', '123123123123312', '1970-01-01', 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-16 13:39:59', '2015-09-16 13:39:59');
INSERT INTO `personal` VALUES ('72', '', '2222', 'aaa', 'aaa', 'aaa@dsdf.cpm', null, 'Hombre', 'Voluntario', 'Ninguno', 'asdas', 'asda', '2222', null, 'default.jpg', 'activo', '0000-00-00 00:00:00', null, null, '2015-09-17 13:57:58', '2015-09-17 13:57:58');

-- ----------------------------
-- Table structure for salary
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salary` double NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `salary_employeeid_index` (`employeeID`),
  CONSTRAINT `salary_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of salary
-- ----------------------------

-- ----------------------------
-- Table structure for saldos
-- ----------------------------
DROP TABLE IF EXISTS `saldos`;
CREATE TABLE `saldos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreBeneficiario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donacionesID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ayudasID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `donacion` float(20,0) NOT NULL,
  `ayuda` float(20,0) NOT NULL,
  `saldo` float(20,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of saldos
-- ----------------------------
INSERT INTO `saldos` VALUES ('5', 'Mikel', '16', '2800', '9000', '700', '8300', '2015-09-16 14:14:55', '2015-09-16 14:14:55');
INSERT INTO `saldos` VALUES ('6', 'Mikel Mikel', '16', '09000', '8300', '1500', '7500', '2015-09-16 14:22:55', '2015-09-16 14:22:55');
INSERT INTO `saldos` VALUES ('7', 'Demo Vargas', '15', '321', '100', '666', '-566', '2015-09-16 23:41:52', '2015-09-16 23:41:52');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `currency_icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `award_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `attendance_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `leave_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `notice_notification` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `ben_add` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `employee_add` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'FUNDACION UNIFRANZ', 'support@4devopshub.com', 'Administrador', 'logo.png', 'BS', 'fa-BS', '1', '0', '0', '0', '1', '2015-04-29 06:03:15', '2015-09-11 05:27:47', '1');

-- ----------------------------
-- Table structure for solicitud_donacion
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_donacion`;
CREATE TABLE `solicitud_donacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double NOT NULL,
  `nota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `beneficiarioid_index` (`beneficiarioID`),
  CONSTRAINT `solicitud_donacionbeneficiarioid_foreign` FOREIGN KEY (`beneficiarioID`) REFERENCES `beneficiarios` (`beneficiarioID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of solicitud_donacion
-- ----------------------------
INSERT INTO `solicitud_donacion` VALUES ('33', '201510', 'current', '2222', 'Primera Solicitud', '2015-09-12 18:51:53', '2015-09-12 18:51:53');
INSERT INTO `solicitud_donacion` VALUES ('35', '90870', 'current', '45678', 'Primera Solicitud', '2015-09-14 15:17:45', '2015-09-14 15:17:45');
INSERT INTO `solicitud_donacion` VALUES ('36', '4', 'current', '5555', 'Primera Solicitud', '2015-09-14 15:29:41', '2015-09-14 15:29:41');

-- ----------------------------
-- Table structure for zonificacion_beneficiario
-- ----------------------------
DROP TABLE IF EXISTS `zonificacion_beneficiario`;
CREATE TABLE `zonificacion_beneficiario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiarioID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zona` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `canton` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `otros` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `z_beneficiarioid_index` (`beneficiarioID`),
  CONSTRAINT `zonificacion_beneficiarioid_foreign` FOREIGN KEY (`beneficiarioID`) REFERENCES `beneficiarios` (`beneficiarioID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of zonificacion_beneficiario
-- ----------------------------
INSERT INTO `zonificacion_beneficiario` VALUES ('26', '201510', '', '', '', '', '', '', '2015-09-12 18:51:53', '2015-09-12 18:51:53');
INSERT INTO `zonificacion_beneficiario` VALUES ('28', '90870', '', '', '', '', '', '', '2015-09-14 15:17:45', '2015-09-14 15:17:45');
INSERT INTO `zonificacion_beneficiario` VALUES ('29', '4', '', '', '', '', '', '', '2015-09-14 15:29:41', '2015-09-14 15:29:41');
