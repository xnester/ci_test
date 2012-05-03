/*
Navicat MySQL Data Transfer

Source Server         : 10.0.1.53
Source Server Version : 50152
Source Host           : 10.0.1.53:3306
Source Database       : jidm

Target Server Type    : MYSQL
Target Server Version : 50152
File Encoding         : 65001

Date: 2012-05-03 13:57:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `cust_num` int(6) unsigned zerofill DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `seller_id` int(4) NOT NULL,
  `client_note` longtext,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('0010', '020073', 'หจก. พี.พี.เค.เม็ททัล-อาร์ทส์ ดีไซเนอร์', 'ppk@ppkmetalarts.co.th', '034-852349', '41', null);
INSERT INTO `clients` VALUES ('0011', '146819', 'บริษัท บูรพาทัศน์1999จำกัด', '', '0-2693-4555 ต่อ 123', '41', null);
INSERT INTO `clients` VALUES ('0012', '146819', 'บริษัท บูรพาทัศน์1999จำกัด', '', '0-2693-4555 ต่อ 123', '41', null);
INSERT INTO `clients` VALUES ('0013', '020022', 'บริษัท กรุงเทพผลิตเหล็ก จำกัด (มหาชน)', '', '0-2225-0200 # 1703', '41', null);
INSERT INTO `clients` VALUES ('0014', '020022', 'บริษัท กรุงเทพผลิตเหล็ก จำกัด (มหาชน)', '', '0-2225-0200 # 1703', '41', null);
INSERT INTO `clients` VALUES ('0015', '326778', 'บริษัท ตรีมิตร มาร์เก็ตติ้ง จำกัด', ' ', '0-2225-0200 # 1703', '41', null);
INSERT INTO `clients` VALUES ('0016', '326780', ' บริษัท ราชสีมา ผลิตเหล็ก จำกัด', '', '0-2225-0200 # 1703', '41', null);
INSERT INTO `clients` VALUES ('0017', '375046', 'บริษัท ศรีกรุงวัฒนา จำกัด', 'boonchai@bangkoksteel.com', '0-225-0200 #  1949', '41', null);
INSERT INTO `clients` VALUES ('0018', '115490', 'บริษัท ดินแดนเทคนิคอล จำกัด', '', '0-2753-4212', '41', null);
INSERT INTO `clients` VALUES ('0019', '128109', 'บริษัท เจ.เอ็ม.แอพพาเรล จำกัด', 'yuttana@jmapparel.co.th', '02 - 862 4849 - 52  ', '41', null);
INSERT INTO `clients` VALUES ('0020', '104290', 'บริษัท ซี.เอ็ม.พี. โปรดักส์ จำกัด', '', '0-2319-0950', '41', null);
INSERT INTO `clients` VALUES ('0021', '184175', 'JSL Global Media Co., Ltd.', 'Waraluk_h@jslglobalmedia.com', '0-2731-0630', '41', null);
INSERT INTO `clients` VALUES ('0022', '229004', 'Engineering Corner Co.,Ltd.', 'anusong@eda.co.th', '0-2905-8181 ต่อ 212-213', '41', null);
INSERT INTO `clients` VALUES ('0023', '020099', 'บริษัท เสมอ จำกัด', '', '0-2749-4143', '41', null);
INSERT INTO `clients` VALUES ('0024', '020018', 'บริษัท อูเบะ เคมิคอลส์ (เอเชีย) จำกัด (มหาชน)', 'surasak@ube.co.th / chusak@ube.co.th / jettarat@ube.co.th', '089-7772713', '41', null);
INSERT INTO `clients` VALUES ('0025', '213815', 'สนง. นิคมอุตสาหกรรมมาบตาพุด จ.ระยอง', '', '038-683936-6 / 038-683942', '41', null);
INSERT INTO `clients` VALUES ('0026', '213815', 'สนง. นิคมอุตสาหกรรมมาบตาพุด จ.ระยอง', '', '', '41', null);
INSERT INTO `clients` VALUES ('0027', '228134', 'บริษัท วีรันดา รีสอร์ท แอนด์ สปา จำกัด', '', '0-2513-3003 ต่อ 305', '41', null);
INSERT INTO `clients` VALUES ('0028', '230582', 'Suree Interfoods Co., Ltd.', 'itsuree@sureepantai.com', '034-419400 ต่อ 350', '41', null);
INSERT INTO `clients` VALUES ('0029', '181469', 'United Drug (1996) Co.,Ltd.', 'rungnapa_k@united-drug.com ; narongrit@united-drug.com', '02543-8210-2 ต่อ 502', '41', null);
INSERT INTO `clients` VALUES ('0030', '238700', 'Standard Gases & Safety Product Co.,Ltd.', 'mail@standardgas.co.th', '054-327858', '41', null);
INSERT INTO `clients` VALUES ('0031', '239382', 'บริษัท บางกอกดาต้าคอม จำกัด', 'tarika_t@bdc.co.th', '0-2645-0286 ต่อ 103', '41', null);
INSERT INTO `clients` VALUES ('0032', '152186', 'บริษัท เทเวศประกันภัย จำกัด (มหาชน)', 'phattarawan_t@deves.co.th', '0-2670-4444', '41', null);
INSERT INTO `clients` VALUES ('0033', '152186', 'บริษัท เทเวศประกันภัย จำกัด (มหาชน)', 'phattarawan_t@deves.co.th', '0-2670-4444', '41', null);
INSERT INTO `clients` VALUES ('0034', '152186', 'บริษัท เทเวศประกันภัย จำกัด (มหาชน)', 'phattarawan_t@deves.co.th', '0-2670-4444', '41', null);
INSERT INTO `clients` VALUES ('0035', '020076', 'Jab-Net Co.,Ltd.', '', '0-2997-4520', '41', null);
INSERT INTO `clients` VALUES ('0036', '276396', 'Thai Software Engineering Co.,Ltd.', '', '0-2652-0811', '41', null);
INSERT INTO `clients` VALUES ('0037', '285918', 'บริษัท ห้องเย็นเอเชียลซีฟู้ด จำกัด (มหาชน)', 'it_a2@asianseafoods.net ', '034-822700 ต่อ  2501', '41', null);
INSERT INTO `clients` VALUES ('0038', '291289', 'บริษัท เอเซี่ยน ไวร์โปรดักส์ จำกัด', 'kamolwan@bangkoksteel.co.th', '0-2225-0200', '41', null);
INSERT INTO `clients` VALUES ('0039', '237141', 'Thai Synthetic Rubbers Co.,Ltd', '', '', '41', null);
INSERT INTO `clients` VALUES ('0040', '296859', 'Bangkok Airways Co., Ltd.', '', '', '41', null);
INSERT INTO `clients` VALUES ('0041', '296859', 'Bangkok Airways Co., Ltd.', 'pawee.klais@bangkokair.com', '0-2265-5836', '41', null);
INSERT INTO `clients` VALUES ('0042', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0043', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0044', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0045', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0046', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0047', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0048', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0049', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0050', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0051', '296859', 'Bangkok Airways Co., Ltd.', '', '', '41', null);
INSERT INTO `clients` VALUES ('0052', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0053', '296859', 'Bangkok Airways Co., Ltd.', 'pornrung_mor@bangkokair.com', '02 265 8796', '41', null);
INSERT INTO `clients` VALUES ('0054', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0055', '296859', 'Bangkok Airways Co., Ltd.', 'anusorndam@bangkokair.com', '(885) 023-723-963-64', '41', null);
INSERT INTO `clients` VALUES ('0056', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0057', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com ; tanet@bangkokair.com ; wuttichai@bangkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0058', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0059', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0060', '296859', 'Bangkok Airways Co., Ltd.', 'atthawut@bnagkokair.com', '0-2265-5623', '41', null);
INSERT INTO `clients` VALUES ('0061', '287789', 'Worldwide Flight Services Bangkok Air Group Handling Co.,Ltd.', ' anekkr@bfsasia.com', '0-2131-5596', '41', null);
INSERT INTO `clients` VALUES ('0062', '299884', 'บริษัท มหานครมิทอล จำกัด', 'mmetal@metropolitanmetal.com', '0-2621-6235', '41', null);
INSERT INTO `clients` VALUES ('0063', '298276', 'Quality Vacation Club Co., Ltd.', 'montree_bu@thequalitynet.com', '081-8332217 / 0-2624-5300', '41', null);
INSERT INTO `clients` VALUES ('0064', '308776', 'บริษัท เฮสซ์เทรดดิ้ง (ประเทศไทย) จำกัด', 'udomsak@doramail.com', '0-2906-8300-3', '41', null);
INSERT INTO `clients` VALUES ('0065', '247493', 'บริษัท อินฟอร์เซ็นทริก คอนซัลติ้ง จำกัด', 'support@icentric.co.th', '081-8235097', '41', null);
INSERT INTO `clients` VALUES ('0066', '362548', 'บริษัท ไอเซ็ม จำกัด', 'anuruck@extreme-systems.com , anchana@extreme-systems.com', '0-2862-2003', '41', null);
INSERT INTO `clients` VALUES ('0067', '337253', 'JSL Co.,Ltd  (รายการสุริวิภา)', 'surivipajsl@gmail.com', '081-8266542', '41', null);
INSERT INTO `clients` VALUES ('0068', '337253', 'JSL Co.,Ltd  (chrisdelivery)', '', '0-2731-0630', '41', null);
INSERT INTO `clients` VALUES ('0069', '337253', 'JSL Co.,Ltd  (johjai)', 'jj_sign@hotmail.com , multimedia@jsl.co.th , Waraluk_h@jslglobalmedia.com', '0-2731-0630 ต่อ 419', '41', null);
INSERT INTO `clients` VALUES ('0070', '338311', 'UBE Technical Center (Asia) Co.,Ltd.', '', '', '41', null);
INSERT INTO `clients` VALUES ('0071', '163801', 'Ferro Cerdec (Thailnad) Co.,Ltd.', '', '0-2709-2653-5', '41', null);
INSERT INTO `clients` VALUES ('0072', '343048', 'Inteqc Feed Co.,Ltd.', '', '081-9890608', '41', null);
INSERT INTO `clients` VALUES ('0073', '343189', 'บริษัท นอร์เกร้น จำกัด', 'orawan@norgren.co.th  ,  tarn@norgren.co.th', '089-7794884 /  0-2750-3598-9', '41', null);
INSERT INTO `clients` VALUES ('0074', '373208', 'บริษัท นอร์ทเทอร์น เทรนนิ่ง เซ็นเตอร์ จำกัด', 'anthicha_t@hotmail.com', '085-7100011 , 053-851775', '41', null);
INSERT INTO `clients` VALUES ('0075', '346443', 'บริษัท โกลเดน ไมล์ จำกัด', 'edp@dmahotel.com ', '0-2650-0288  ต่อ 7212', '41', null);
INSERT INTO `clients` VALUES ('0076', '346794', 'Patterer Technical Parts', 'vibool@patterer-thailand.com', '081-8273894', '41', null);
INSERT INTO `clients` VALUES ('0077', '020141', 'ศูนย์วิทยาศาสตร์ เพื่อการศึกษา', 'eddy2000@sci-educ.nfe.go.th', '0-2381-5521 /  02 392 5951-59  ต่อ 1023', '41', null);
INSERT INTO `clients` VALUES ('0078', '020049', 'บริษัท โมดูลาร์ คอมพาวด์ จำกัด', '', '0-2420-6125', '41', null);
INSERT INTO `clients` VALUES ('0079', '350104', 'บริษัท โอ๊คทรี จำกัด', '0-2513-5110', 'คุณพีรภรณ์  ปลีกล่ำ / คุณชินภัทร', '41', null);
INSERT INTO `clients` VALUES ('0080', '227046', 'Wisma Forwarding Limited', '', '', '41', null);
INSERT INTO `clients` VALUES ('0081', '328135', 'โคซี่ บีซ โฮเต็ล จำกัด', 'edp@cosybeachhotel.com', '038-306429 / 086-5551527', '41', null);
INSERT INTO `clients` VALUES ('0082', '358244', 'NIJI (THAILAND) LIMITED', 'tana_u@umpcomn.com', '0-2360-8319 ต่อ 14', '41', null);
INSERT INTO `clients` VALUES ('0083', '368908', 'บริษัท เพซ ดีเวลลอปเมนท์ คอร์ปอเรชั่น จำกัด (มหาชน)', 'lulathep@pacedev.com', '0-2654-3344 # 302', '41', null);
INSERT INTO `clients` VALUES ('0084', '360747', 'บริษัท เพซ ดีเวลลอปเมนท์ คอร์ปอเรชั่น จำกัด (มหาชน)', 'nalaporn@pacedev.com', '0-2654-3344 # ', '41', null);
INSERT INTO `clients` VALUES ('0085', '360747', 'บริษัท เพซ ดีเวลลอปเมนท์ คอร์ปอเรชั่น จำกัด (มหาชน)', 'nalaporn@pacedev.com', '0-2654-3344', '41', null);
INSERT INTO `clients` VALUES ('0086', '360747', 'บริษัท เพซ ดีเวลลอปเมนท์ คอร์ปอเรชั่น จำกัด (มหาชน)', 'nalaporn@pacedev.com', '0-2654-3344', '41', null);
INSERT INTO `clients` VALUES ('0087', '371810', 'บริษัท เพซ ดีเวลลอปเมนท์  จำกัด', 'it@arraybiz.com ,  thananchanok@pacedev.com , rossarin@pacedev.com', '0-2654-3344', '41', null);
INSERT INTO `clients` VALUES ('0088', '371810', 'บริษัท เพซ ดีเวลลอปเมนท์  จำกัด', 'it@arraybiz.com ,  thananchanok@pacedev.com , rossarin@pacedev.com', '0-2654-3344', '41', null);
INSERT INTO `clients` VALUES ('0089', '371810', 'บริษัท เพซ ดีเวลลอปเมนท์  จำกัด', 'it@arraybiz.com ,  thananchanok@pacedev.com , rossarin@pacedev.com', '0-2654-3344', '41', null);
INSERT INTO `clients` VALUES ('0090', '374861', 'Pace Project Four Co.,Ltd', '', '', '41', null);
INSERT INTO `clients` VALUES ('0091', '362215', 'บริษัท เฟ็นสเตอร์ อินเตอร์เนชั่นแนล จำกัด', '', '', '41', null);
INSERT INTO `clients` VALUES ('0092', '347575', 'บริษัท เชส เอ็นเตอร์ไพร์ (สยาม) จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0093', '347575', 'บริษัท เชส เอ็นเตอร์ไพร์ (สยาม) จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0094', '376480', 'บริษัท เจษฎาเทคนิค มืวเซี่ยม จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0095', '376480', 'บริษัท เจษฎาเทคนิค มืวเซี่ยม จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0096', '376479', 'บริษัท คราฟท์ จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0097', '376479', 'บริษัท คราฟท์ จำกัด', 'kanut@chasesiam.com // littlejingjo@gmail.com  / kanathip_ck@hotmail.com', '0-2883-2880', '41', null);
INSERT INTO `clients` VALUES ('0098', '271140', 'บริษัท แอตลาสทรานสปอร์ท จำกัด ', 'chartri@atlas.co.th', '0-2656-2801', '41', null);
INSERT INTO `clients` VALUES ('0099', '295888', 'โรงพยาบาลสุไหงปาดี', 'spd_hospital@hotmail.com', '073-651169 /', '41', null);
INSERT INTO `clients` VALUES ('0100', '367935', 'คุณสมุทร  สุวรรณบุตร', 'ssuwannabut@gmail.com, ssuwannabut@hotmail.com', '0-2100-3050', '41', null);
INSERT INTO `clients` VALUES ('0101', '367935', 'คุณสมุทร  สุวรรณบุตร', 'ssuwannabut@gmail.com, ssuwannabut@hotmail.com', '0-2100-3050', '41', null);
INSERT INTO `clients` VALUES ('0102', '373121', 'บริษัท คิว เมดิคอล เซ็นเตอร์ จำกัด', 'montree_bu@thequalitynet.com', '081-8332217', '41', null);
INSERT INTO `clients` VALUES ('0103', '150036', 'บริษัท บาก้า จำกัด ', '', '0-2652-9355-59', '41', null);
INSERT INTO `clients` VALUES ('0104', '347367', 'MOS Phone Line Co., Ltd.', '', '085-5609901 / 0-2713-1644', '41', null);
INSERT INTO `clients` VALUES ('0105', '164193', 'บริษัท น่ารัก เทียร่า จำกัด', '', '089-8378686', '41', null);
INSERT INTO `clients` VALUES ('0106', '356571', 'บริษัท เอ็นเอช โลจิสติคส์ จำกัด  (บริษัท 127 จำกัด)', ' thaneth@nhlog.co.th', '085-8188773', '41', null);
INSERT INTO `clients` VALUES ('0107', '146996', 'โรแยลเอเชียบริคแอนด์ไทล์ จำกัด', '', '0-2332-0352-67 # 2204', '41', null);
INSERT INTO `clients` VALUES ('0108', '374589', 'บริษัท อินเตอร์ไทย อิสดัสเตรียล ซิสเต็มส์ จำกัด', 'penpak.k@zi-th.com', '0-2656-8710 ต่อ 2120', '41', null);
INSERT INTO `clients` VALUES ('0109', '375455', 'De Lamai CO., Ltd. (ย้ายบริการไปหมดแล้วเหลือแต่โดเมนยังไม่ได้ Transfer)', 'ananya@delamai.com', '0-2502-6329 //083-5409498', '41', null);
INSERT INTO `clients` VALUES ('0110', '296631', 'Kao Su Packing Industry Co.,Ltd.', 'wcmc1013@hotmail.com', '02-336-1248 # 102', '41', null);
INSERT INTO `clients` VALUES ('0111', '154294', 'บริษัท ทรานส์ แอร์ คาร์โก้ จำกัด', 'piyamas@transaircargo.com', '02 650 9030-59 Ext.350-351', '41', null);
INSERT INTO `clients` VALUES ('0112', '376131', 'SUN108 Co.,Ltd.', 'mr_surasaks@hotmail.com', '02 683 6603 / 081 8176616', '41', null);
INSERT INTO `clients` VALUES ('0113', '349233', 'บริษัท มาสเตอร์ เทคโนคอม จำกัด', 'munenooo@hotmail.com', '081 2095979', '41', null);
INSERT INTO `clients` VALUES ('0114', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'ekkapob_ork@scib.co.th / isara_niv@scib.co.th', '0-2208-5253', '41', null);
INSERT INTO `clients` VALUES ('0115', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'wannapha_thi@scib.co.th , isara_niv@scib.co.th', '0-2208-5244', '41', null);
INSERT INTO `clients` VALUES ('0116', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'wannapha_thi@scib.co.th , isara_niv@scib.co.th', '0-2208-5244', '41', null);
INSERT INTO `clients` VALUES ('0117', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'wannapha_thi@scib.co.th , isara_niv@scib.co.th', '0-2208-5244', '41', null);
INSERT INTO `clients` VALUES ('0118', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'wannapha_thi@scib.co.th', '0-2208-5244', '41', null);
INSERT INTO `clients` VALUES ('0119', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'wannapha_thi@scib.co.th', '0-2208-5244', '41', null);
INSERT INTO `clients` VALUES ('0120', '175303', 'ธนาคาร นครหลวงไทย จำกัด (มหาชน)', 'ekkapob_ork@scib.co.th', '0-2208-5253', '41', null);
