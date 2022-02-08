-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2022 at 04:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27 

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id_farmers` int(11) NOT NULL COMMENT 'รหัสเกษตรกร',
  `name_farmers` varchar(60) NOT NULL COMMENT 'ชื่อเกษตรกร',
  `email_farmers` varchar(100) NOT NULL COMMENT 'อีเมล์เกษตรกร',
  `pass_farmers` varchar(20) NOT NULL COMMENT 'รหัสเกษตรกร',
  `tel_farmers` varchar(10) NOT NULL COMMENT 'เบอร์โทรเกษตรกร',
  `line_farmers` varchar(50) DEFAULT NULL COMMENT 'line เกษตรกร',
  `face_farmers` varchar(50) DEFAULT NULL COMMENT 'facebook เกษตรกร',
  `address_farmers` text NOT NULL COMMENT 'ที่อยู่เกษตรกร',
  `id_provinces` int(11) NOT NULL COMMENT 'รหัสจังหวัด',
  `code_provinces` varchar(6) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `image_farmers` text NOT NULL COMMENT 'รูปเกษตรกร',
  `num_farm` int(11) NOT NULL COMMENT 'จำนวนพื้นที่เพาะปลูกไร่',
  `num_field` int(11) NOT NULL COMMENT 'จำนวนพื้นที่เพาะปลูกงาน',
  `lat_farm` varchar(25) NOT NULL COMMENT 'ละติจูดฟาร์ม',
  `lng_farm` varchar(25) NOT NULL COMMENT 'ลองจิจูดฟาร์ม',
  `organic_farm` int(11) NOT NULL COMMENT '1 = อินทรีย์, 2 = ไม่อินทรีย์',
  `type_sale` int(11) NOT NULL COMMENT '1 = ขายแบบพันธะสัญญา, 2 = ขายแบบเดี่ยว ',
  `detail_farm` text DEFAULT NULL COMMENT 'อธิบายละเอียดต่างๆ เช่นช่วงเวลาเก็บเกี่ยว',
  `status_farmers` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะเกษตรกร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `name_products` varchar(50) NOT NULL COMMENT 'ชื่อสินค้ากาแฟ',
  `id_typepro` int(11) NOT NULL COMMENT 'ประเภทกาแฟ',
  `num_stock` int(11) NOT NULL COMMENT 'จำนวนคงเหลือ (kg)',
  `price_unit` float NOT NULL COMMENT 'ราคาต่อหน่วย (บาท/kg)',
  `status_products` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะสินค้า\r\n0 = ปิดการมองเห็น 1 = เปิด  3 = ลบ',
  `id_farmers` int(11) NOT NULL,
  `image_pro` varchar(200) NOT NULL COMMENT 'รูปสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id_provinces` int(11) NOT NULL COMMENT 'รหัสจังหวัด',
  `name_provinces` varchar(60) NOT NULL COMMENT 'ชื่อจังหวัด',
  `province_lat` varchar(60) NOT NULL COMMENT 'ละติจูดจังหวัด',
  `province_lon` varchar(60) NOT NULL COMMENT 'ลองจิจูดจังหวัด',
  `province_zoom` int(11) NOT NULL COMMENT 'ซูม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` VALUES (1, 'กรุงเทพมหานคร', '13.7278956', '100.52412349999997', 13);
INSERT INTO `provinces` VALUES (2, 'กระบี่', '8.0862997', '98.90628349999997', 13);
INSERT INTO `provinces` VALUES (3, 'กาญจนบุรี', '14.0227797', '99.53281149999998', 13);
INSERT INTO `provinces` VALUES (4, 'กาฬสินธุ์', '16.4314078', '103.5058755', 13);
INSERT INTO `provinces` VALUES (5, 'กำแพงเพชร', '16.4827798', '99.52266179999992', 13);
INSERT INTO `provinces` VALUES (6, 'ขอนแก่น', '16.4419355', '102.8359921', 13);
INSERT INTO `provinces` VALUES (7, 'จันทบุรี', '12.61134', '102.10385459999998', 13);
INSERT INTO `provinces` VALUES (8, 'ฉะเชิงเทรา', '13.6904194', '101.07795959999999', 13);
INSERT INTO `provinces` VALUES (9, 'ชลบุรี', '13.3611431', '100.98467170000004', 13);
INSERT INTO `provinces` VALUES (10, 'ชัยนาท', '15.1851971', '100.12512500000003', 13);
INSERT INTO `provinces` VALUES (11, 'ชัยภูมิ', '15.8068173', '102.03150270000003', 13);
INSERT INTO `provinces` VALUES (12, 'ชุมพร', '10.4930496', '99.18001989999993', 13);
INSERT INTO `provinces` VALUES (13, 'เชียงราย', '19.9071656', '99.83095500000002', 13);
INSERT INTO `provinces` VALUES (14, 'เชียงใหม่', '18.7877477', '98.99313110000003', 13);
INSERT INTO `provinces` VALUES (15, 'ตรัง', '7.5593851', '99.61100650000003', 13);
INSERT INTO `provinces` VALUES (16, 'ตราด', '12.2427563', '102.51747339999997', 13);
INSERT INTO `provinces` VALUES (17, 'ตาก', '16.8839901', '99.12584979999997', 13);
INSERT INTO `provinces` VALUES (18, 'นครนายก', '14.2069466', '101.21305110000003', 13);
INSERT INTO `provinces` VALUES (19, 'นครปฐม', '13.8199206', '100.06216760000007', 13);
INSERT INTO `provinces` VALUES (20, 'นครพนม', '17.392039', '104.76955079999993', 13);
INSERT INTO `provinces` VALUES (21, 'นคราชสีมา', '14.9798997', '102.09776929999998', 13);
INSERT INTO `provinces` VALUES (22, 'นครศรีธรรมราช', '8.4303975', '99.96312190000003', 13);
INSERT INTO `provinces` VALUES (23, 'นครสวรรค์', '15.6930072', '100.12255949999997', 13);
INSERT INTO `provinces` VALUES (24, 'นนทบุรี', '13.8621125', '100.51435279999998', 13);
INSERT INTO `provinces` VALUES (25, 'นราธิวาส', '6.4254607', '101.82531429999995', 13);
INSERT INTO `provinces` VALUES (26, 'น่าน', '18.7756318', '100.77304170000002', 13);
INSERT INTO `provinces` VALUES (27, 'บุรีรัมย์', '14.9930017', '103.10291910000001', 13);
INSERT INTO `provinces` VALUES (28, 'ปทุมธานี', '14.0208391', '100.52502759999993', 13);
INSERT INTO `provinces` VALUES (29, 'ประจวบคีรีขันธ์', '11.812367', '99.79732709999996', 13);
INSERT INTO `provinces` VALUES (30, 'ปราจีนบุรี', '14.0509704', '101.37274389999993', 13);
INSERT INTO `provinces` VALUES (31, 'ปัตตานี', '6.869484399999999', '101.25048259999994', 13);
INSERT INTO `provinces` VALUES (32, 'พระนครศรีอยุธยา', '14.3532128', '100.56895989999998', 13);
INSERT INTO `provinces` VALUES (33, 'พะเยา', '19.1664789', '99.9019419', 13);
INSERT INTO `provinces` VALUES (34, 'พังงา', '8.4407456', '98.51930319999997', 13);
INSERT INTO `provinces` VALUES (35, 'พัทลุง', '7.6166823', '100.07402309999998', 13);
INSERT INTO `provinces` VALUES (36, 'พิจิตร', '16.4429516', '100.34823289999997', 13);
INSERT INTO `provinces` VALUES (37, 'พิษณุโลก', '16.8298048', '100.26149150000003', 13);
INSERT INTO `provinces` VALUES (38, 'เพชรบุรี', '13.1111601', '99.93913069999996', 13);
INSERT INTO `provinces` VALUES (39, 'เพชรบูรณ์', '16.4189807', '101.15509259999999', 13);
INSERT INTO `provinces` VALUES (40, 'แพร่', '18.1445774', '100.14028310000003', 13);
INSERT INTO `provinces` VALUES (41, 'ภูเก็ต', '7.9810496', '98.36388239999997', 13);
INSERT INTO `provinces` VALUES (42, 'มหาสารคาม', '16.1850896', '103.30264609999995', 13);
INSERT INTO `provinces` VALUES (43, 'มุกดาหาร', '16.542443', '104.72091509999996', 13);
INSERT INTO `provinces` VALUES (44, 'แม่ฮ่องสอน', '19.2990643', '97.96562259999996', 13);
INSERT INTO `provinces` VALUES (45, 'ยโสธร', '15.792641', '104.14528270000005', 13);
INSERT INTO `provinces` VALUES (46, 'ยะลา', '6.541147', '101.28039469999999', 13);
INSERT INTO `provinces` VALUES (47, 'ร้อยเอ็ด', '16.0538196', '103.65200359999994', 13);
INSERT INTO `provinces` VALUES (48, 'ระนอง', '9.9528702', '98.60846409999999', 13);
INSERT INTO `provinces` VALUES (49, 'ระยอง', '12.6833115', '101.23742949999996', 13);
INSERT INTO `provinces` VALUES (50, 'ราชบุรี', '13.5282893', '99.81342110000003', 13);
INSERT INTO `provinces` VALUES (51, 'ลพบุรี', '14.7995081', '100.65337060000002', 13);
INSERT INTO `provinces` VALUES (52, 'ลำปาง', '18.2888404', '99.49087399999996', 13);
INSERT INTO `provinces` VALUES (53, 'ลำพูน', '18.5744606', '99.0087221', 13);
INSERT INTO `provinces` VALUES (54, 'เลย', '17.4860232', '101.72230020000006', 13);
INSERT INTO `provinces` VALUES (55, 'ศรีสะเกษ', '15.1186009', '104.32200949999992', 13);
INSERT INTO `provinces` VALUES (56, 'สกลนคร', '17.1545995', '104.1348365', 13);
INSERT INTO `provinces` VALUES (57, 'สงขลา', '7.1756004', '100.61434699999995', 13);
INSERT INTO `provinces` VALUES (58, 'สตูล', '6.6238158', '100.06737440000006', 13);
INSERT INTO `provinces` VALUES (59, 'สมุทรปราการ', '13.5990961', '100.59983190000003', 13);
INSERT INTO `provinces` VALUES (60, 'สมุทรสงคราม', '13.4098217', '100.00226450000002', 13);
INSERT INTO `provinces` VALUES (61, 'สมุทรสาคร', '13.5475216', '100.27439559999993', 13);
INSERT INTO `provinces` VALUES (62, 'สระแก้ว', '13.824038', '102.0645839', 13);
INSERT INTO `provinces` VALUES (63, 'สระบุรี', '14.5289154', '100.91014210000003', 13);
INSERT INTO `provinces` VALUES (64, 'สิงห์บุรี', '14.8936253', '100.39673140000002', 13);
INSERT INTO `provinces` VALUES (65, 'สุโขทัย', '17.0055573', '99.82637120000004', 13);
INSERT INTO `provinces` VALUES (66, 'สุพรรณบุรี', '14.4744892', '100.11771279999994', 13);
INSERT INTO `provinces` VALUES (67, 'สุราษฎร์ธานี', '9.1382389', '99.32174829999997', 13);
INSERT INTO `provinces` VALUES (68, 'สุรินทร์', '14.882905', '103.49371070000007', 13);
INSERT INTO `provinces` VALUES (69, 'หนองคาย', '17.8782803', '102.74126380000007', 13);
INSERT INTO `provinces` VALUES (70, 'หนองบัวลำภู', '17.2218247', '102.42603680000002', 13);
INSERT INTO `provinces` VALUES (71, 'อ่างทอง', '14.5896054', '100.45505200000002', 13);
INSERT INTO `provinces` VALUES (72, 'อำนาจเจริญ', '15.8656783', '104.62577740000006', 13);
INSERT INTO `provinces` VALUES (73, 'อุดรธานี', '17.4138413', '102.78723250000007', 13);
INSERT INTO `provinces` VALUES (74, 'อุตรดิตถ์', '17.6200886', '100.09929420000003', 13);
INSERT INTO `provinces` VALUES (75, 'อุทัยธานี', '15.3835001', '100.02455269999996', 13);
INSERT INTO `provinces` VALUES (76, 'อุบลราชธานี', '15.2286861', '104.85642170000006', 13);
INSERT INTO `provinces` VALUES (77, 'บึงกาฬ', '18.3609104', '103.64644629999998', 13);

-- INSERT INTO `provinces` (`id_provinces`, `name_provinces`,`province_lat`,`province_lon`) 
-- VALUES 
-- (1, 'กรุงเทพมหานคร'),
-- (2, 'สมุทรปราการ'),
-- (3, 'นนทบุรี'),
-- (4, 'ปทุมธานี'),
-- (5, 'พระนครศรีอยุธยา'),
-- (6, 'อ่างทอง'),
-- (7, 'ลพบุรี'),
-- (8, 'สิงห์บุรี'),
-- (9, 'ชัยนาท'),
-- (10, 'สระบุรี'),
-- (11, 'ชลบุรี'),
-- (12, 'ระยอง'),
-- (13, 'จันทบุรี'),
-- (14, 'ตราด'),
-- (15, 'ฉะเชิงเทรา'),
-- (16, 'ปราจีนบุรี'),
-- (17, 'นครนายก'),
-- (18, 'สระแก้ว'),
-- (19, 'นครราชสีมา'),
-- (20, 'บุรีรัมย์'),
-- (21, 'สุรินทร์'),
-- (22, 'ศรีสะเกษ'),
-- (23, 'อุบลราชธานี'),
-- (24, 'ยโสธร'),
-- (25, 'ชัยภูมิ'),
-- (26, 'อำนาจเจริญ'),
-- (27, 'บึงกาฬ'),
-- (28, 'หนองบัวลำภู'),
-- (29, 'ขอนแก่น'),
-- (30, 'อุดรธานี'),
-- (31, 'เลย'),
-- (32, 'หนองคาย'),
-- (33, 'มหาสารคาม'),
-- (34, 'ร้อยเอ็ด'),
-- (35, 'กาฬสินธุ์'),
-- (36, 'สกลนคร'),
-- (37, 'นครพนม'),
-- (38, 'มุกดาหาร'),
-- (39, 'เชียงใหม่'),
-- (40, 'ลำพูน'),
-- (41, 'ลำปาง'),
-- (42, 'อุตรดิตถ์'),
-- (43, 'แพร่'),
-- (44, 'น่าน'),
-- (45, 'พะเยา'),
-- (46, 'เชียงราย'),
-- (47, 'แม่ฮ่องสอน'),
-- (48, 'นครสวรรค์'),
-- (49, 'อุทัยธานี'),
-- (50, 'กำแพงเพชร'),
-- (51, 'ตาก'),
-- (52, 'สุโขทัย'),
-- (53, 'พิษณุโลก'),
-- (54, 'พิจิตร'),
-- (55, 'เพชรบูรณ์'),
-- (56, 'ราชบุรี'),
-- (57, 'กาญจนบุรี'),
-- (58, 'สุพรรณบุรี'),
-- (59, 'นครปฐม'),
-- (60, 'สมุทรสาคร'),
-- (61, 'สมุทรสงคราม'),
-- (62, 'เพชรบุรี'),
-- (63, 'ประจวบคีรีขันธ์'),
-- (64, 'นครศรีธรรมราช'),
-- (65, 'กระบี่'),
-- (66, 'พังงา'),
-- (67, 'ภูเก็ต'),
-- (68, 'สุราษฎร์ธานี'),
-- (69, 'ระนอง'),
-- (70, 'ชุมพร'),
-- (71, 'สงขลา'),
-- (72, 'สตูล'),
-- (73, 'ตรัง'),
-- (74, 'พัทลุง'),
-- (75, 'ปัตตานี'),
-- (76, 'ยะลา'),
-- (77, 'นราธิวาส');

-- --------------------------------------------------------

--
-- Table structure for table `roasters`
--

CREATE TABLE `roasters` (
  `id_roasters` int(11) NOT NULL COMMENT 'รหัสโรงคั่วกาแฟ',
  `name_roasters` varchar(60) NOT NULL COMMENT 'ชื่อโรงคั่วกาแฟ',
  `num_trade_reg` varchar(30) NOT NULL COMMENT 'เลขทะเบียนการค้า',
  `name_entrep` varchar(60) NOT NULL COMMENT 'ชื่อผู้ประกอบการ',
  `address_office` text NOT NULL COMMENT 'ที่ตั้งสำนักงาน',
  `id_provinces` int(11) NOT NULL COMMENT 'รหัสจังหวัด',
  `code_provinces` varchar(6) NOT NULL COMMENT 'ไปรษณีย์',
  `lat_roasters` varchar(30) NOT NULL COMMENT 'ละติจูดโรงคั่วกาแฟ',
  `lng_roasters` varchar(30) NOT NULL COMMENT 'ลองจิจูดโรงคั่วกาแฟ',
  `detail_roasters` text NOT NULL COMMENT 'รายละเอียดต่างๆ ของโรงคั่วกาแฟ',
  `e_mail_roasters` varchar(50) NOT NULL COMMENT 'อีเมลโรงคั่วกาแฟ',
  `pass_roasters` varchar(25) NOT NULL COMMENT 'รหัสผ่านโรงคั่วกาแฟ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transale`
--

CREATE TABLE `transale` (
  `id_transale` int(11) NOT NULL COMMENT 'รหัสรายการขาย',
  `date_transale` datetime NOT NULL COMMENT 'วันที่ทำรายการขาย',
  `id_farmers` int(11) NOT NULL COMMENT 'รหัสเกษตรกร',
  `id_roasters` int(11) NOT NULL COMMENT 'รหัสโรงคั่วกาแฟ',
  `sum_price` float NOT NULL COMMENT 'ราคายอดรวม',
  `status_transale` int(11) NOT NULL DEFAULT 1 COMMENT 'สถานะ 1 = รอยืนยันคำสั่งขาย , 2 = ยืนยันคำสั่งขายและดำเนินการ ,  3 = การซื้อขายเสร็จสิ้น \r\n,  4 = ยกเลิกการซื้อขาย '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transalede`
--

CREATE TABLE `transalede` (
  `id_transalede` int(11) NOT NULL COMMENT 'รหัสรายละเอียดการขาย',
  `id_transale` int(11) NOT NULL COMMENT 'รหัสรายการขาย',
  `id_products` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `num_item` int(11) NOT NULL COMMENT 'จำนวนที่ขาย (kg)',
  `price_tran` float NOT NULL COMMENT 'ราคาสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typepro`
--

CREATE TABLE `typepro` (
  `id_typepro` int(11) NOT NULL COMMENT 'รหัสประเภทกาแฟ',
  `name_typepro` varchar(60) NOT NULL COMMENT 'ชื่อประเภทกาแฟ',
  `detail_typepro` text NOT NULL COMMENT 'รายละเอียดประเภทกาแฟ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typepro`
--

INSERT INTO `typepro` (`id_typepro`, `name_typepro`, `detail_typepro`) VALUES
(1, 'กาแฟอราบิก้า (Arabica)', ''),
(2, 'กาแฟโรบัสต้า (Robusta)', ''),
(3, 'กาแฟลิเบอริก้า (Liberica)', ''),
(4, 'กาแฟเอ็กซ์เซลซ่า (Excelsa)', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id_farmers`),
  ADD KEY `id_provinces` (`id_provinces`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_farmers` (`id_farmers`),
  ADD KEY `id_typepro` (`id_typepro`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id_provinces`);

--
-- Indexes for table `roasters`
--
ALTER TABLE `roasters`
  ADD PRIMARY KEY (`id_roasters`),
  ADD KEY `id_provinces` (`id_provinces`);

--
-- Indexes for table `transale`
--
ALTER TABLE `transale`
  ADD PRIMARY KEY (`id_transale`),
  ADD KEY `id_farmers` (`id_farmers`),
  ADD KEY `id_roasters` (`id_roasters`);

--
-- Indexes for table `transalede`
--
ALTER TABLE `transalede`
  ADD PRIMARY KEY (`id_transalede`),
  ADD KEY `id_transale` (`id_transale`),
  ADD KEY `id_products` (`id_products`);

--
-- Indexes for table `typepro`
--
ALTER TABLE `typepro`
  ADD PRIMARY KEY (`id_typepro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id_farmers` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเกษตรกร';

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า';

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id_provinces` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสจังหวัด', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `roasters`
--
ALTER TABLE `roasters`
  MODIFY `id_roasters` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโรงคั่วกาแฟ';

--
-- AUTO_INCREMENT for table `transale`
--
ALTER TABLE `transale`
  MODIFY `id_transale` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการขาย';

--
-- AUTO_INCREMENT for table `transalede`
--
ALTER TABLE `transalede`
  MODIFY `id_transalede` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการขาย';

--
-- AUTO_INCREMENT for table `typepro`
--
ALTER TABLE `typepro`
  MODIFY `id_typepro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทกาแฟ', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmers`
--
ALTER TABLE `farmers`
  ADD CONSTRAINT `farmers_ibfk_1` FOREIGN KEY (`id_provinces`) REFERENCES `provinces` (`id_provinces`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_farmers`) REFERENCES `farmers` (`id_farmers`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_typepro`) REFERENCES `typepro` (`id_typepro`);

--
-- Constraints for table `roasters`
--
ALTER TABLE `roasters`
  ADD CONSTRAINT `roasters_ibfk_1` FOREIGN KEY (`id_provinces`) REFERENCES `provinces` (`id_provinces`);

--
-- Constraints for table `transale`
--
ALTER TABLE `transale`
  ADD CONSTRAINT `transale_ibfk_1` FOREIGN KEY (`id_farmers`) REFERENCES `farmers` (`id_farmers`),
  ADD CONSTRAINT `transale_ibfk_2` FOREIGN KEY (`id_roasters`) REFERENCES `roasters` (`id_roasters`);

--
-- Constraints for table `transalede`
--
ALTER TABLE `transalede`
  ADD CONSTRAINT `transalede_ibfk_1` FOREIGN KEY (`id_transale`) REFERENCES `transale` (`id_transale`),
  ADD CONSTRAINT `transalede_ibfk_2` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
