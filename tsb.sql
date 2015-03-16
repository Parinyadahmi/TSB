-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- เวอร์ชั่นของเซิร์ฟเวอร์: 5.6.12-log
-- รุ่นของ PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `tsb`
--
CREATE DATABASE IF NOT EXISTS `tsb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tsb`;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `booking_data`
--

CREATE TABLE IF NOT EXISTS `booking_data` (
  `ID` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `start` varchar(45) NOT NULL,
  `dest` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `company` varchar(45) NOT NULL,
  `leave_time` varchar(45) NOT NULL,
  `arrive_time` varchar(45) NOT NULL,
  `standard` varchar(45) NOT NULL,
  `bank` varchar(45) NOT NULL,
  `account_name` varchar(45) NOT NULL,
  `bank_account_number` bigint(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `passenger_name` varchar(45) NOT NULL,
  `passenger_tel` varchar(10) NOT NULL,
  `amount` int(1) NOT NULL,
  `departure_date` datetime NOT NULL,
  `booking_date` datetime NOT NULL,
  `pay_stat` varchar(45) NOT NULL,
  `staff_name` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `company_profile`
--

CREATE TABLE IF NOT EXISTS `company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `m_firstname` varchar(45) NOT NULL,
  `m_lastname` varchar(45) NOT NULL,
  `tel` varchar(9) NOT NULL,
  `fax` varchar(9) NOT NULL,
  `address` text NOT NULL,
  `bank` varchar(45) NOT NULL,
  `account_name` varchar(45) NOT NULL,
  `bank_account_number` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- dump ตาราง `company_profile`
--

INSERT INTO `company_profile` (`id`, `company_name`, `m_firstname`, `m_lastname`, `tel`, `fax`, `address`, `bank`, `account_name`, `bank_account_number`) VALUES
(7, 'เที่ยงธรรมพูลผล', 'นิติพล', 'ขาวมะลิ', '073331761', '073317654', '2/67', 'ธนาคารไทยพาณิชย์ (SCB)', 'นิติพล', 5664868529),
(11, 'ร่มไทร ทัวร์', 'ปริญญา', 'ดาหมิ', '073431599', '073333111', '137/1 Khokpho Pattani Thailand 94120', 'ธนาคารไทยพาณิชย์ (SCB)', 'ปริญญา ดาหมิ', 14850023815709);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- dump ตาราง `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'กรุงเทพฯ'),
(2, 'กระบี่'),
(3, 'กาญจนบุรี'),
(4, 'กาฬสินธุ์'),
(5, 'กำแพงเพชร'),
(6, 'ขอนแก่น'),
(7, 'ฉะเชิงเทรา'),
(8, 'จันทบุรี'),
(9, 'ชลบุรี'),
(10, 'ชัยนาท'),
(11, 'ชัยภูมิ'),
(12, 'ชุมพร'),
(13, 'เชียงราย'),
(14, 'เชียงใหม่'),
(15, 'ตราด'),
(16, 'ตรัง'),
(17, 'ตาก'),
(18, 'นครนายก'),
(19, 'นครปฐม'),
(20, 'นครพนม'),
(21, 'นครราชสีมา'),
(22, 'นครศรีธรรมราช'),
(23, 'นครสวรรค์'),
(24, 'นนทบุรี'),
(25, 'นราธิวาส'),
(26, 'น่าน'),
(27, 'บุรีรัมย์'),
(28, 'บึงกาฬ'),
(29, 'ปทุมธานี'),
(30, 'ประจวบคีรีขันธ์'),
(31, 'ปราจีนบุรี'),
(32, 'ปัตตานี'),
(33, 'พระนครศรีอยุธยา'),
(34, 'พะเยา'),
(35, 'พิจิตร'),
(36, 'พิษณุโลก'),
(37, 'เพชรบูรณ์'),
(38, 'เพชรบุรี'),
(39, 'แพร่'),
(40, 'พังงา'),
(41, 'พัทลุง'),
(42, 'ภูเก็ต'),
(43, 'มุกดาหาร'),
(44, 'มหาสารคาม'),
(45, 'แม่ฮ่องสอน'),
(46, 'ยะลา'),
(47, 'ยโสธร'),
(48, 'ร้อยเอ็ด'),
(49, 'ระนอง'),
(50, 'ระยอง'),
(51, 'ราชบุรี'),
(52, 'ลพบุรี'),
(53, 'ลำปาง'),
(54, 'ลำพูน'),
(55, 'เลย'),
(56, 'ศรีสะเกษ'),
(57, 'สกลนคร'),
(58, 'สงขลา'),
(59, 'สตูล'),
(60, 'สมุทรปราการ'),
(61, 'สมุทรสาคร'),
(62, 'สมุทรสงคราม'),
(63, 'สระแก้ว'),
(64, 'สระบุรี'),
(65, 'สิงห์บุรี'),
(66, 'สุโขทัย'),
(67, 'สุพรรณบุรี'),
(68, 'สุราษฎร์ธานี'),
(69, 'สุรินทร์'),
(70, 'หนองคาย'),
(71, 'หนองบัวลำภู'),
(72, 'อ่างทอง'),
(73, 'อุบลราชธานี'),
(74, 'อุทัยธานี'),
(75, 'อุดรธานี'),
(76, 'อุตรดิตถ์'),
(77, 'อำนาจเจริญ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `report_paid`
--

CREATE TABLE IF NOT EXISTS `report_paid` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `booking_code` int(8) unsigned zerofill NOT NULL,
  `paid_date` date NOT NULL,
  `paid_time` time NOT NULL,
  `company_id` int(11) NOT NULL,
  `cust_account_name` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `slip` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- dump ตาราง `report_paid`
--

INSERT INTO `report_paid` (`id`, `booking_code`, `paid_date`, `paid_time`, `company_id`, `cust_account_name`, `price`, `slip`, `status`) VALUES
(1, 00000001, '2014-03-12', '14:00:00', 7, 'นิติพล', 550, 'paid0001_slip.jpg', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `start` varchar(45) NOT NULL,
  `dest` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `company` varchar(45) NOT NULL,
  `leave_time` time NOT NULL,
  `arrive_time` time NOT NULL,
  `standard` varchar(45) NOT NULL,
  `bank` varchar(45) NOT NULL,
  `account_name` varchar(45) NOT NULL,
  `bank_account_number` bigint(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- dump ตาราง `schedule`
--

INSERT INTO `schedule` (`ID`, `start`, `dest`, `price`, `company`, `leave_time`, `arrive_time`, `standard`, `bank`, `account_name`, `bank_account_number`, `company_id`) VALUES
(1, 'กรุงเทพฯ', 'ภูเก็ต', 1058, 'ร่มไทร ทัวร์', '18:00:00', '18:20:00', 'VIP32', 'ธนาคารไทยพาณิชย์ (SCB)', 'ปริญญา ดาหมิ', 14850023815709, 11),
(2, 'ภูเก็ต', 'กรุงเทพฯ', 1058, 'ร่มไทร ทัวร์', '18:30:00', '16:30:00', 'VIP32', 'ธนาคารไทยพาณิชย์ (SCB)', 'ปริญญา ดาหมิ', 14850023815709, 11),
(3, 'กรุงเทพฯ', 'สงขลา', 1200, 'ร่มไทร ทัวร์', '18:00:00', '16:00:00', 'VIP32', 'ธนาคารไทยพาณิชย์ (SCB)', 'ปริญญา ดาหมิ', 14850023815709, 11),
(4, 'สงขลา', 'กรุงเทพฯ', 1200, 'ร่มไทร ทัวร์', '18:00:00', '16:00:00', 'VIP32', 'ธนาคารไทยพาณิชย์ (SCB)', 'ปริญญา ดาหมิ', 14850023815709, 11),
(5, 'ภูเก็ต', 'ยะลา', 550, 'เที่ยงธรรมพูลผล', '02:00:00', '05:00:00', 'VIP24', 'ธนาคารไทยพาณิชย์ (SCB)', 'นิติพล', 5664868529, 7),
(6, 'ยะลา', 'ภูเก็ต', 550, 'เที่ยงธรรมพูลผล', '08:00:00', '19:00:00', 'VIP24', 'ธนาคารไทยพาณิชย์ (SCB)', 'นิติพล', 5664868529, 7);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `staff_profile`
--

CREATE TABLE IF NOT EXISTS `staff_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `s_firstname` varchar(45) NOT NULL,
  `s_lastname` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- dump ตาราง `staff_profile`
--

INSERT INTO `staff_profile` (`id`, `title`, `s_firstname`, `s_lastname`, `tel`, `company_name`, `manager_id`, `user_id`) VALUES
(7, 'นาย', 'วรชาติ', 'ชัยทอง', '0897587432', 'เที่ยงธรรมพูลผล', 23, 38),
(8, 'นาย', 'ภควัต', 'สุวรรณสาม', '0897687432', 'เที่ยงธรรมพูลผล', 23, 41),
(9, 'นาย', 'อัรชัต', 'โชคชัย', '0877963236', 'ร่มไทร ทัวร์', 42, 43),
(10, 'นางสาว', 'นุชรี', 'นาเเจ้ง', '0877521457', 'ร่มไทร ทัวร์', 42, 44);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(12) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `type_id` int(1) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `create_date`, `last_login_date`, `type_id`, `company_id`) VALUES
(23, 'nitipon.k@hotmail.com', '02oct1992', '2014-01-28 02:07:40', '2014-03-06 02:11:32', 3, 7),
(25, 'admin', '02oct1992', '2014-01-28 00:54:40', '2014-03-04 21:48:58', 4, NULL),
(26, 'parinya@hotmail.com', '02oct1992', '2014-01-28 12:58:43', '2014-03-07 02:14:07', 1, NULL),
(35, 'ae.n@hotmail.com', '02oct1992', '2014-02-10 16:05:23', '2014-02-10 16:05:30', 1, NULL),
(37, 'aea_love_jameskung@hotmail.com', '02oct1992', '2014-02-13 14:52:24', NULL, 1, NULL),
(38, 'golf_se@hotmail.com', '02oct1992', '2014-02-18 23:47:19', '2014-03-06 02:23:17', 2, 7),
(41, 'hern_it@hotmail.com', '02oct1992', '2014-03-04 19:11:57', '2014-03-07 02:13:55', 2, 7),
(42, 'parinyadahmi@hotmail.com', '123456789', '2014-03-06 00:41:07', '2014-03-06 00:43:02', 3, 11),
(43, 'Romcaitour01@hotmail.com', '123456789', '2014-03-06 01:01:27', '2014-03-06 22:42:02', 2, 11),
(44, 'Romcaitour02@hotmail.com', '123456789', '2014-03-06 01:02:07', NULL, 2, 11);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` text,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `fk_user_profile_user1` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `user_id_4` (`user_id`),
  KEY `user_id_5` (`user_id`),
  KEY `user_id_6` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- dump ตาราง `user_profile`
--

INSERT INTO `user_profile` (`id`, `title`, `firstname`, `lastname`, `tel`, `address`, `user_id`) VALUES
(20, 'นาย', 'นิติพล', 'ขาวมะลิ', '0897685434', '15/6', 23),
(22, 'นาย', 'admin', 'admin', '0879865467', '16/7', 25),
(23, 'นาย', 'ปริญญา', 'ดาหมิ', '0897687643', '15/6', 26),
(26, 'นางสาว', 'ณรัติญา', 'โภชนาหาร', '085675432', '89/103', 35),
(28, 'นางสาว', 'ณรัติญา', 'โภชนาหาร', '0897687643', '89/19', 37),
(30, 'นาย', 'ปริญญา', 'ดาหมิ', '0877961868', '137/1 Khokpho Pattani Thailand 94120', 42);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
