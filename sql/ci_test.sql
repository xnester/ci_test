/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50137
Source Host           : localhost:3306
Source Database       : ci_test

Target Server Type    : MYSQL
Target Server Version : 50137
File Encoding         : 65001

Date: 2012-07-01 23:20:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cus_id` int(6) unsigned zerofill NOT NULL COMMENT 'customer id',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dealer_id` int(6) NOT NULL,
  `status` enum('Active','Suspend','Terminate') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cus_id` (`cus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('000122', '123450', 'test12345', 'test@test.com', '4019', '0', 'Active', '2012-06-14 14:45:01', '2012-06-14 17:17:19');
INSERT INTO `clients` VALUES ('000123', '654321', 'Spam', 'spam@spam.com', '4321', '0', 'Active', '2012-06-14 16:06:03', '2012-06-14 17:17:22');
INSERT INTO `clients` VALUES ('000124', '020018', 'Jasmine Internet', 'domain@ji-net.com', '40190', '4', 'Active', '2012-06-14 17:08:36', '2012-07-01 18:01:18');
INSERT INTO `clients` VALUES ('000125', '033330', '3333', '3333', '33334', '5', 'Active', '2012-06-14 17:18:19', '2012-07-01 18:01:15');

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ipaddress` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', 'test', 'test@test.com', 'test', '2012-04-10 01:07:58', '');
INSERT INTO `contacts` VALUES ('2', 'Spam', 'Spam', 'Spam', '2012-04-10 10:17:35', '');
INSERT INTO `contacts` VALUES ('3', 'Spam', '111', '890', '2012-04-10 10:17:58', '');
INSERT INTO `contacts` VALUES ('4', 'Spam', '111', '890', '2012-04-10 10:18:14', '');
INSERT INTO `contacts` VALUES ('5', 'Spam', '111', '890', '2012-04-10 10:18:17', '');
INSERT INTO `contacts` VALUES ('6', 'test', 'ttest@test.com', 'test', '2012-04-17 16:09:45', '');
INSERT INTO `contacts` VALUES ('7', 'test', 'test', 'test', '2012-04-18 18:34:48', '');
INSERT INTO `contacts` VALUES ('8', '123', '123', '123', '2012-04-19 12:59:05', '');
INSERT INTO `contacts` VALUES ('9', '000', '000', '000', '2012-04-19 14:08:01', '');

-- ----------------------------
-- Table structure for `dealers`
-- ----------------------------
DROP TABLE IF EXISTS `dealers`;
CREATE TABLE `dealers` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dealers
-- ----------------------------
INSERT INTO `dealers` VALUES ('000004', 'Sales#1', '12', 'test@test.com', '', '2012-06-15 11:47:55', '2012-07-01 18:00:50');
INSERT INTO `dealers` VALUES ('000005', 'Sales#2', '0', '123', '', '2012-07-01 18:01:09', '2012-07-01 18:01:09');

-- ----------------------------
-- Table structure for `domains`
-- ----------------------------
DROP TABLE IF EXISTS `domains`;
CREATE TABLE `domains` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `registrar` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `expires` date NOT NULL,
  `changed` date NOT NULL,
  `nserver` varchar(255) NOT NULL,
  `status` enum('Suspend','Active') NOT NULL DEFAULT 'Active',
  `client_id` int(4) unsigned zerofill NOT NULL,
  `add` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `note` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domain_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of domains
-- ----------------------------
INSERT INTO `domains` VALUES ('000001', 'ji-net.com', 'NETWORK SOLUTIONS, LLC.', '1999-10-08', '2014-10-08', '2011-09-14', 'ns.ji-net.com\r\nns2.ji-net.com', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:22:15', '');
INSERT INTO `domains` VALUES ('000002', 'google.com', 'MARKMONITOR INC.', '1997-09-15', '2020-09-13', '2012-01-29', 'ns1.google.com\r\nns2.google.com\r\nns3.google.com\r\nns4.google.com\r\n', 'Active', '0125', '0000-00-00 00:00:00', '2012-07-02 00:20:09', '');
INSERT INTO `domains` VALUES ('000003', 'ji-net.co.th', 'T.H.NIC Co., Ltd.', '2000-12-15', '2013-12-14', '2011-12-07', 'ns2.ji-net.co.th\r\nns.ji-net.co.th\r\n', 'Active', '0124', '0000-00-00 00:00:00', '2012-07-02 00:20:08', '');
INSERT INTO `domains` VALUES ('000004', 'opdcacademy.com', 'REGISTER.COM, INC.', '2006-07-04', '2015-07-04', '2010-07-06', 'ns0.thai2learn.com\r\nns1.thai2learn.com', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:22:21', '');
INSERT INTO `domains` VALUES ('000005', 'google.co.th', 'T.H.NIC Co., Ltd.', '2004-10-08', '2012-10-07', '2012-06-27', 'ns2.google.com\r\nns3.google.com\r\nns1.google.com\r\nns4.google.com\r\n', 'Active', '0123', '0000-00-00 00:00:00', '2012-07-02 00:20:05', '');
INSERT INTO `domains` VALUES ('000006', 'doo-series.com', 'NAME.COM LLC', '2010-10-16', '2014-10-16', '2012-04-20', 'ns1.name.com\r\nns2.name.com\r\nns3.name.com\r\nns4.name.com\r\n', 'Active', '0123', '0000-00-00 00:00:00', '2012-07-02 00:20:04', '');
INSERT INTO `domains` VALUES ('000007', 'swi.co.th', 'T.H.NIC Co., Ltd.', '2000-09-06', '2013-09-05', '2011-09-20', 'ns2.ji-net.com\r\nns.ji-net.com\r\n', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:13:49', '');
INSERT INTO `domains` VALUES ('000008', 'fitel.co.th', 'T.H.NIC Co., Ltd.', '2001-10-12', '2013-10-11', '2012-02-27', 'master02.csloxinfo.com\r\nmaster01.csloxinfo.com\r\n', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:14:19', '');
INSERT INTO `domains` VALUES ('000009', 'manager.co.th', 'T.H.NIC Co., Ltd.', '1999-01-17', '2013-04-16', '2011-03-30', 'ns.isp-thailand.com\r\nns2.isp-thailand.com\r\n', 'Active', '0122', '0000-00-00 00:00:00', '2012-07-02 00:19:51', '');
INSERT INTO `domains` VALUES ('000010', 'thnic.co.th', 'T.H.NIC Co., Ltd.', '1999-03-30', '2030-04-01', '2011-09-20', 'ns-a.thnic.co.th\r\nns-b.thnic.co.th\r\n', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:24:12', '');
INSERT INTO `domains` VALUES ('000011', 'cic.co.th', 'T.H.NIC Co., Ltd.', '2006-08-09', '2021-10-11', '2011-11-07', 'ns2.ji-net.com\r\nns.ji-net.com\r\n', 'Active', '0000', '0000-00-00 00:00:00', '2012-06-28 01:26:45', '');
INSERT INTO `domains` VALUES ('000012', 'mthai.com', 'NETWORK SOLUTIONS, LLC.', '1998-06-13', '2015-06-12', '2010-08-10', 'dns2.proen.co.th\r\nns1.3bb.co.th\r\nns1.mthai.com\r\nns2.3bb.co.th\r\n', 'Active', '0000', '2012-06-29 00:06:30', '2012-06-29 00:06:30', '');
INSERT INTO `domains` VALUES ('000013', 'about.us', 'NEUSTAR INC.', '2002-04-18', '2013-04-17', '2012-06-02', 'pdns1.ultradns.net\r\npdns2.ultradns.net\r\npdns3.ultradns.org\r\npdns4.ultradns.org\r\npdns5.ultradns.info\r\npdns6.ultradns.co.uk\r\n', 'Active', '0123', '0000-00-00 00:00:00', '2012-07-02 00:19:54', '');

-- ----------------------------
-- Table structure for `hosts`
-- ----------------------------
DROP TABLE IF EXISTS `hosts`;
CREATE TABLE `hosts` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `space` int(11) NOT NULL,
  `free` int(11) NOT NULL,
  `status` enum('Online','Down','HW Error','Remove') NOT NULL,
  `desc` text NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hosts
-- ----------------------------
INSERT INTO `hosts` VALUES ('000001', 'test', '200', '150', 'Online', '', '2012-06-25 22:34:48');
INSERT INTO `hosts` VALUES ('000002', 'test2', '500', '200', 'Online', '', '2012-06-25 18:26:58');
INSERT INTO `hosts` VALUES ('000003', 'test3', '500', '0', 'HW Error', 'sdf', '2012-06-25 22:39:53');
INSERT INTO `hosts` VALUES ('000004', 'Spam', '500', '0', 'Online', 'Spam', '2012-06-25 23:08:58');

-- ----------------------------
-- Table structure for `ips`
-- ----------------------------
DROP TABLE IF EXISTS `ips`;
CREATE TABLE `ips` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `int` varchar(20) NOT NULL,
  `host_id` int(6) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ips
-- ----------------------------
INSERT INTO `ips` VALUES ('000001', '192.168.1.1', 'bond0.300', '1', '');
INSERT INTO `ips` VALUES ('000002', '192.168.1.2', '', '1', '');
INSERT INTO `ips` VALUES ('000003', '192.168.1.3', '', '2', '');

-- ----------------------------
-- Table structure for `periods`
-- ----------------------------
DROP TABLE IF EXISTS `periods`;
CREATE TABLE `periods` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `start` date NOT NULL,
  `stop` date NOT NULL,
  `year` year(4) NOT NULL,
  `services_id` int(6) NOT NULL,
  `services_domains_id` int(6) NOT NULL,
  `services_hosts_id` int(6) NOT NULL,
  `services_products_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of periods
-- ----------------------------

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('000001', 'Web Hosting', '12', '2012-06-30 17:07:05', '44');
INSERT INTO `products` VALUES ('000002', 'Mail Hosting', '20', '2012-06-30 17:07:16', '123456789');
INSERT INTO `products` VALUES ('000003', 'Domain EasyNIC', '', '2012-06-30 17:15:50', 'EasyNIC');
INSERT INTO `products` VALUES ('000004', 'Domain NSL', '', '2012-06-30 17:16:09', 'Network Solution\r\n');
INSERT INTO `products` VALUES ('000005', 'Domain THNIC', '630', '2012-06-30 17:16:19', 'THNIC');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `unit` int(6) NOT NULL,
  `size` int(6) NOT NULL,
  `s_user` varchar(64) NOT NULL,
  `s_pass` varchar(64) NOT NULL,
  `domains_id` int(6) NOT NULL,
  `hosts_id` int(6) NOT NULL,
  `products_id` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `domains_id` (`domains_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of services
-- ----------------------------
