-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 08:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
  `id_farmers` int(6) NOT NULL COMMENT 'รหัสเกษตรกร',
  `name_farmers` varchar(60) NOT NULL COMMENT 'ชื่อเกษตรกร',
  `email_farmers` varchar(100) NOT NULL COMMENT 'อีเมล์เกษตรกร',
  `pass_farmers` varchar(20) NOT NULL COMMENT 'รหัสเกษตรกร',
  `tel_farmers` varchar(10) NOT NULL COMMENT 'เบอร์โทรเกษตรกร',
  `line_farmers` varchar(50) NOT NULL COMMENT 'line เกษตรกร',
  `face_farmers` varchar(50) NOT NULL COMMENT 'facebook เกษตรกร',
  `address_farmers` text NOT NULL COMMENT 'ที่อยู่เกษตรกร',
  `id_provinces` int(4) NOT NULL COMMENT 'รหัสจังหวัด',
  `code_provinces` varchar(6) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `image_farmers` varchar(200) NOT NULL COMMENT 'รูปเกษตรกร',
  `num_farm` int(6) NOT NULL COMMENT 'จำนวนพื้นที่เพาะปลูกไร่',
  `num_field` int(2) NOT NULL COMMENT 'จำนวนพื้นที่เพาะปลูกงาน',
  `lat_farm` varchar(25) NOT NULL COMMENT 'ละติจูดฟาร์ม',
  `lng_farm` varchar(25) NOT NULL COMMENT 'ลองจิจูดฟาร์ม',
  `organic_farm` int(2) NOT NULL COMMENT '1 = อินทรีย์, 2 = ไม่อินทรีย์',
  `type_sale` int(2) NOT NULL COMMENT '1 = ขายแบบพันธะสัญญา, 2 = ขายแบบเดี่ยว ',
  `detail_farm` text NOT NULL COMMENT 'อธิบายละเอียดต่างๆ เช่นช่วงเวลาเก็บเกี่ยว',
  `status_farmers` int(2) NOT NULL COMMENT 'สถานะเกษตรกร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_products` int(6) NOT NULL COMMENT 'รหัสสินค้า',
  `name_products` varchar(50) NOT NULL COMMENT 'ชื่อสินค้ากาแฟ',
  `id_typepro` int(4) NOT NULL COMMENT 'ประเภทกาแฟ',
  `num_stock` int(6) NOT NULL COMMENT 'จำนวนคงเหลือ (kg)',
  `price_unit` float NOT NULL COMMENT 'ราคาต่อหน่วย (บาท/kg)',
  `status_products` int(2) NOT NULL COMMENT 'สถานะสินค้า',
  `id_farmers` int(6) NOT NULL,
  `image_pro` varchar(200) NOT NULL COMMENT 'รูปสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id_provinces` int(4) NOT NULL COMMENT 'รหัสจังหวัด',
  `name_provinces` varchar(60) NOT NULL COMMENT 'ชื่อจังหวัด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id_provinces`, `name_provinces`) VALUES
(1, 'กรุงเทพมหานคร'),
(2, 'สมุทรปราการ'),
(3, 'นนทบุรี'),
(4, 'ปทุมธานี'),
(5, 'พระนครศรีอยุธยา'),
(6, 'อ่างทอง'),
(7, 'ลพบุรี'),
(8, 'สิงห์บุรี'),
(9, 'ชัยนาท'),
(10, 'สระบุรี'),
(11, 'ชลบุรี'),
(12, 'ระยอง'),
(13, 'จันทบุรี'),
(14, 'ตราด'),
(15, 'ฉะเชิงเทรา'),
(16, 'ปราจีนบุรี'),
(17, 'นครนายก'),
(18, 'สระแก้ว'),
(19, 'นครราชสีมา'),
(20, 'บุรีรัมย์'),
(21, 'สุรินทร์'),
(22, 'ศรีสะเกษ'),
(23, 'อุบลราชธานี'),
(24, 'ยโสธร'),
(25, 'ชัยภูมิ'),
(26, 'อำนาจเจริญ'),
(27, 'บึงกาฬ'),
(28, 'หนองบัวลำภู'),
(29, 'ขอนแก่น'),
(30, 'อุดรธานี'),
(31, 'เลย'),
(32, 'หนองคาย'),
(33, 'มหาสารคาม'),
(34, 'ร้อยเอ็ด'),
(35, 'กาฬสินธุ์'),
(36, 'สกลนคร'),
(37, 'นครพนม'),
(38, 'มุกดาหาร'),
(39, 'เชียงใหม่'),
(40, 'ลำพูน'),
(41, 'ลำปาง'),
(42, 'อุตรดิตถ์'),
(43, 'แพร่'),
(44, 'น่าน'),
(45, 'พะเยา'),
(46, 'เชียงราย'),
(47, 'แม่ฮ่องสอน'),
(48, 'นครสวรรค์'),
(49, 'อุทัยธานี'),
(50, 'กำแพงเพชร'),
(51, 'ตาก'),
(52, 'สุโขทัย'),
(53, 'พิษณุโลก'),
(54, 'พิจิตร'),
(55, 'เพชรบูรณ์'),
(56, 'ราชบุรี'),
(57, 'กาญจนบุรี'),
(58, 'สุพรรณบุรี'),
(59, 'นครปฐม'),
(60, 'สมุทรสาคร'),
(61, 'สมุทรสงคราม'),
(62, 'เพชรบุรี'),
(63, 'ประจวบคีรีขันธ์'),
(64, 'นครศรีธรรมราช'),
(65, 'กระบี่'),
(66, 'พังงา'),
(67, 'ภูเก็ต'),
(68, 'สุราษฎร์ธานี'),
(69, 'ระนอง'),
(70, 'ชุมพร'),
(71, 'สงขลา'),
(72, 'สตูล'),
(73, 'ตรัง'),
(74, 'พัทลุง'),
(75, 'ปัตตานี'),
(76, 'ยะลา'),
(77, 'นราธิวาส');

-- --------------------------------------------------------

--
-- Table structure for table `roasters`
--

CREATE TABLE `roasters` (
  `id_roasters` int(4) NOT NULL COMMENT 'รหัสโรงคั่วกาแฟ',
  `name_roasters` varchar(60) NOT NULL COMMENT 'ชื่อโรงคั่วกาแฟ',
  `num_trade_reg` varchar(30) NOT NULL COMMENT 'เลขทะเบียนการค้า',
  `name_entrep` varchar(60) NOT NULL COMMENT 'ชื่อผู้ประกอบการ',
  `address_office` text NOT NULL COMMENT 'ที่ตั้งสำนักงาน',
  `id_provinces` int(4) NOT NULL COMMENT 'รหัสจังหวัด',
  `code_provinces` varchar(6) NOT NULL COMMENT 'ไปรษณีย์',
  `lat_roasters` varchar(30) NOT NULL COMMENT 'ละติจูดโรงคั่วกาแฟ',
  `lng_roasters` varchar(30) NOT NULL COMMENT 'ลองจิจูดโรงคั่วกาแฟ',
  `detail_roasters` text NOT NULL COMMENT 'รายละเอียดต่างๆ ของโรงคั่วกาแฟ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transale`
--

CREATE TABLE `transale` (
  `id_transale` int(8) NOT NULL COMMENT 'รหัสรายการขาย',
  `date_transale` date NOT NULL COMMENT 'วันที่ทำรายการขาย',
  `id_farmers` int(6) NOT NULL COMMENT 'รหัสเกษตรกร',
  `id_roasters` int(4) NOT NULL COMMENT 'รหัสโรงคั่วกาแฟ',
  `sum_price` float NOT NULL COMMENT 'ราคายอดรวม',
  `status_transale` int(2) NOT NULL COMMENT 'สถานะ 1 = รอยืนยันคำสั่งขาย 2 = ยืนยันคำสั่งขายและดำเนินการ 3 = การซื้อขายเสร็จสิ้น 4 = ยกเลิกการซื้อขาย '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transalede`
--

CREATE TABLE `transalede` (
  `id_transalede` int(10) NOT NULL COMMENT 'รหัสรายละเอียดการขาย',
  `id_transale` int(8) NOT NULL COMMENT 'รหัสรายการขาย',
  `id_products` int(6) NOT NULL COMMENT 'รหัสสินค้า',
  `num_item` int(10) NOT NULL COMMENT 'จำนวนที่ขาย (kg)',
  `price_tran` float NOT NULL COMMENT 'ราคาสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `typepro`
--

CREATE TABLE `typepro` (
  `id_typepro` int(4) NOT NULL COMMENT 'รหัสประเภทกาแฟ',
  `name_typepro` varchar(60) NOT NULL COMMENT 'ชื่อประเภทกาแฟ',
  `detail_typepro` text NOT NULL COMMENT 'รายละเอียดประเภทกาแฟ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id_farmers` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเกษตรกร';

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_products` int(6) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า';

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id_provinces` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสจังหวัด', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `roasters`
--
ALTER TABLE `roasters`
  MODIFY `id_roasters` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสโรงคั่วกาแฟ';

--
-- AUTO_INCREMENT for table `transale`
--
ALTER TABLE `transale`
  MODIFY `id_transale` int(8) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการขาย';

--
-- AUTO_INCREMENT for table `transalede`
--
ALTER TABLE `transalede`
  MODIFY `id_transalede` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดการขาย';

--
-- AUTO_INCREMENT for table `typepro`
--
ALTER TABLE `typepro`
  MODIFY `id_typepro` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทกาแฟ';

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
