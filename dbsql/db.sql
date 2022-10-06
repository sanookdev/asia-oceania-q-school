-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2022 at 09:12 AM
-- Server version: 10.5.15-MariaDB-0+deb11u1-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oceania_asia-q-school`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filenameServer` varchar(255) NOT NULL COMMENT 'ชื่อไฟล์ใน Folder (.jpg .png .pdf)',
  `file_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info_personal`
--

CREATE TABLE `info_personal` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `prefix` varchar(100) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `familyname` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `age` int(100) NOT NULL,
  `pob` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `passportNo` varchar(100) DEFAULT NULL,
  `idcard` varchar(100) DEFAULT NULL,
  `issueddate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `formerProfessional` varchar(255) NOT NULL,
  `yearsactive` varchar(100) NOT NULL,
  `highestWorldrankingPeryear` varchar(100) DEFAULT NULL,
  `lastestWorldrankingPeryear` varchar(100) DEFAULT NULL,
  `bestPracticebreak` varchar(100) NOT NULL,
  `bestTournamentbreak` varchar(100) NOT NULL,
  `dateofarrival` date DEFAULT NULL,
  `airline` varchar(100) DEFAULT NULL,
  `flightNo` varchar(100) DEFAULT NULL,
  `partyNo` int(1) NOT NULL,
  `firstnameParty1` varchar(255) NOT NULL,
  `middlenameParty1` varchar(255) DEFAULT NULL,
  `familynameParty1` varchar(255) NOT NULL,
  `firstnameParty2` varchar(255) DEFAULT NULL,
  `middlenameParty2` varchar(255) DEFAULT NULL,
  `familynameParty2` varchar(255) DEFAULT NULL,
  `hotelReservation` varchar(100) DEFAULT NULL,
  `typeRoom` varchar(100) DEFAULT NULL,
  `homeAddress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `line_id` varchar(255) DEFAULT NULL,
  `weibo_id` varchar(255) DEFAULT NULL,
  `whatsapp_id` varchar(255) DEFAULT NULL,
  `wechat_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_personal`
--

INSERT INTO `info_personal` (`id`, `created`, `prefix`, `firstname`, `middlename`, `familyname`, `gender`, `dateofbirth`, `age`, `pob`, `country`, `nationality`, `passportNo`, `idcard`, `issueddate`, `expirydate`, `formerProfessional`, `yearsactive`, `highestWorldrankingPeryear`, `lastestWorldrankingPeryear`, `bestPracticebreak`, `bestTournamentbreak`, `dateofarrival`, `airline`, `flightNo`, `partyNo`, `firstnameParty1`, `middlenameParty1`, `familynameParty1`, `firstnameParty2`, `middlenameParty2`, `familynameParty2`, `hotelReservation`, `typeRoom`, `homeAddress`, `email`, `mobile`, `facebook`, `twitter`, `line_id`, `weibo_id`, `whatsapp_id`, `wechat_id`) VALUES
(1, '2022-04-05 12:53:36', 'Mr.', 'Pasin', '-', 'Puoborm', 'Male', '1968-02-07', 54, 'Bangkok ', 'Bangkok', 'Thail', '', '3100904782038', '2015-10-15', '2024-02-06', 'No', '', 'None', 'None', '64', '85', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '555/73 Sawanya2 Village\r\nPhachautid90 , PhasamutJedi\r\nSutprakran', 'pasin_tum@hotmail.com ', '0914355883', 'Pasin Puoborm', '', '', '', '', ''),
(2, '2022-04-09 20:59:29', 'Mr.', 'Wiphu', '', 'Phuthisabodi ', 'Male', '2002-08-31', 19, 'Nakhon Ratchasim', 'Thailand ', 'Thailand ', '', '1309902991501', '2020-12-01', '2029-08-30', 'No', '', '', '', '145', '120', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '43/2 Samwa Road Minburi Minburi Bangkok 10510', 'wiphu.phuthisabodi@gmail.com', '0949944147', '', '', 'bwp0147', '', '', ''),
(3, '2022-04-20 02:14:13', 'Mr.', 'AHMED', 'ABDULLAH ', 'ASEERI ', 'Male', '1977-09-23', 44, 'Jeddah', 'SAUDI ARABIA ', 'SAUDI', 'T288288', '', '2016-07-10', '2026-03-24', 'No', '', '', '', '147', '136', '2022-04-14', '', '', 0, 'AMR', 'MOHAMAD', 'FELFELA', '', '', '', 'No', '', '4738 Al Manini - Al Marwah Dist.\r\nUnit Number : 10 JEDDAH 23545 - 8552 Kingdom of Saudi Arabia', 'aseeri147@yahoo.com', '00966541107007', '', '', '', '', '00966541107007', ''),
(4, '2022-04-20 02:26:40', 'Mr.', 'Moataz', '', 'Qurunfula', 'Male', '1978-09-09', 44, 'Cairo', 'Egypt', 'Saudi', 'T950919', '', '2017-01-19', '2026-10-02', 'No', '', '', '', '129', '49', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', 'Faisaliyah District \r\nAl Jamoum', 'moataz.s.q@hotmail.com', '00966542242222', '', '', '', '', '', ''),
(5, '2022-04-20 02:33:29', 'Mr.', 'Mohamed', '', 'Elshareif', 'Male', '1999-03-06', 23, 'Jeddah', 'Saudi Arabia ', 'Palestinian ', 'P00289596', '', '2022-03-06', '2027-03-05', 'No', '', '', '', '50', '35', '0000-00-00', '', '', 1, 'Raied', '', 'Elshareif', '', '', '', 'No', '', ' Faisaliyah District\r\nAl Jamoum', 'Mohammedalsharef66@gmail.com', '00966533008382', '', '', '', '', '', ''),
(11, '2022-04-24 10:05:41', 'Mr.', 'Hao', 'Hong', 'Luo', 'Male', '2000-01-31', 22, 'China', 'China', 'China', 'EH1749274', NULL, '2019-09-03', '2029-09-04', 'Yes', '3', '', '', '131', '131', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, ' China', '519903543@qq.com', '15879080179', '', '', '', '', '', 'wxid-hirjfh2h3c6m22'),
(13, '2022-04-27 02:39:27', 'Mr.', 'Umer', 'Naeem', 'Memon', 'Male', '1992-12-04', 29, 'Hyderabad ', 'Pakistan', 'Pakistani', 'AT9950362', '', '2013-05-24', '2023-05-22', 'No', '', '', '', '140', '140', '2022-05-25', 'Thai Airways International ', 'TG342', 0, '', '', '', '', '', '', 'No', '', ' House # B-6, Memon co-operative housing society.\r\nHyderabad \r\nPakistan.', 'umermemon92@yahoo.com', '00923213051639', 'Umermemon92@yahoo.com', '', '', '', '00923213051639', ''),
(14, '2022-04-27 05:28:45', 'Mr.', 'Hunain', 'Hanif', 'Memon', 'Male', '1991-08-05', 30, 'Hyderabad', 'Pakistan', 'Pakistani', 'AJ0200143', '', '2018-01-24', '2028-01-24', 'No', '', 'None', 'None', '123', '70', '2022-05-25', 'Thai international', 'TG342', 0, '', '', '', '', '', '', 'No', '', ' Bunglow no C/39 \r\nMemon coperative housing society \r\nQasimabad Hyderabad', 'shirazmemon01@live.com', '+923133868208', 'Mani memon', '', '', '', '+923322697989', ''),
(15, '2022-04-28 11:53:35', 'Mr.', 'YUANJUN', '', 'HNG', 'Male', '1994-03-15', 28, 'Penang', 'Malaysia ', 'Malaysia ', 'A55931703', '', '2022-05-13', '2027-09-16', 'No', '', '', '', '147', '117', '2022-05-30', 'Thai smile', 'WE5416', 1, 'PAK THONG', '', 'CHOW', '', '', '', 'Yes', 'Twin', ' 2X, jalan beriksa 3,11500,ayer itam,pulau pinang ,Malaysia.', 'hugo_hng94@hotmail.com', '+60164731341', '', '', '', '', '+60164731341', ''),
(16, '2022-04-28 14:37:18', 'Mr.', 'DECHAWAT', '', 'POOMJAENG', 'Male', '1978-07-11', 43, 'Saraburi', 'Thailand', 'Thai', '', '3199900291755', '2014-06-26', '2022-07-10', 'Yes', '2011-2017', '37/2015', '', '147', '147', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', ' 14 Soi Supapong 1 Yak 3\r\nKwang Nongbon\r\nKhet Praves\r\nBangkok', 'poomjang2521@gmail.com', '0855639879', 'https://www.facebook.com/dechawat.poomjang', '', '', '', '', ''),
(17, '2022-04-29 02:47:33', 'Mr.', 'Asutosh', '', 'Padhy', 'Male', '1996-11-05', 25, 'Bhubaneswar, Odisha', 'India', 'Indian', 'N6431045', '', '2016-02-23', '2026-02-22', 'No', '', '', '', '147', '131', '2022-05-28', 'Air India', 'AI 332', 1, '', '', '', '', '', '', 'No', '', ' Plot no-1267/1A, Nayapalli, Bhubaneswar Urban, Odisha, India', 'ashu.padhy@gmail.com', '+919867763831', 'Asutosh Padhy', 'AsutoshPadhy147', '+919867763831', '', '+919867763831', ''),
(18, '2022-04-30 07:29:31', 'Mr.', 'Mubashir', 'Faraz, Muhammad Zahid', 'Raza ', 'Male', '1994-04-22', 28, 'Lahore', 'Pakistan', 'Pakistani', 'LD9894762', '', '2019-09-26', '2024-09-24', 'No', '', '', '', '147', '147', '2022-05-27', 'Thai airways international', 'TG34', 0, '', '', '', '', '', '', 'No', '', '34/b , Street 1,habibia colony mustafabad, Lahore cantt, Lahore Pakistan', 'Mubashirraza06@gmail.com', '+923224660338', 'https:/https://www.facebook.com/Razi.sheikh147/www.facebook.com/Razi.sheikh147', '', '', '', '+923224660338', ''),
(19, '2022-04-30 08:14:00', 'Mr.', 'Haris', '', 'Tahir', 'Male', '2000-04-09', 22, 'Lahore', 'Pakistan', 'Pakistan', 'AB6913194', '', '2018-07-24', '2028-07-23', 'No', '', '', '', '147', '143', '2022-05-27', 'Thai airways international', 'TG345', 0, '', '', '', '', '', '', 'No', '', 'House No:E-503/A Eden Cottage Road New Iqbal Park Lahore Pakistan', 'haristahir12@hotmail.com ', '+923214887788 ', 'www.facebook.com/haristahirchampion', '', '', '', '+923214887788', ''),
(22, '2022-04-30 09:03:13', 'Mr.', 'Asjad', 'Iqbal, Muhammad', 'Iqbal', 'Male', '1991-11-15', 31, 'Sargodha', 'Pakistan', 'Pakistan', 'FT1333503', '', '2019-03-07', '2029-03-05', 'No', '', '', '', '147', '143', '2022-05-27', 'Thai airways international', 'TG345', 0, '', '', '', '', '', '', 'No', '', ' Daak-khana khas chak no 40NB\r\nSargodha Pakistan', 'prosnooker.pk@gmail.com', '+92 323 7000491', 'https://www.facebook.com/Asjadiqbal147', '', '', '', '+923237000491', ''),
(23, '2022-04-30 09:49:52', 'Mr.', 'Muhammad', 'Anwar, Muhammad', 'Asif', 'Male', '1982-03-17', 40, 'Faisalabad', 'Pakistan', 'Pakistan', 'BK1885373', '', '2019-03-07', '2023-03-06', 'No', '', '', '', '147', '144', '2022-05-27', 'Thai airways international', 'TG345', 0, '', '', '', '', '', '', 'No', '', 'Near Sargodha sizing House no 943\r\nKausarabad Faisalabad Pakistan', 'Mbilalasif5044@gmail.com', '+923236600975', 'https://www.facebook.com/profile.php?id=100037504090561', '', '', '', '+923236600975', ''),
(25, '2022-04-30 10:48:33', 'Mr.', 'Muhammad Naseem', 'Chatta, Khalid Shaban', 'Akhtar', 'Male', '2001-01-07', 21, 'Sahiwal', 'Pakistan', 'Pakistan', 'NR1346522', '', '2022-04-12', '2027-04-11', 'No', '', '', '', '147', '139', '2022-05-27', 'Thai airways international', 'TG345', 0, '', '', '', '', '', '', 'No', '', ' Treet no 12 Kot Fareed Khan Noor shah road near civil hospital sahiwal Pakistan', 'naseemakhtar1470@gmail.com', '+923164032268', 'https://www.facebook.com/chotawaseem.chotawaseem', '', '', '', '+923164032268', ''),
(29, '2022-04-30 12:33:44', 'Mr.', 'Anekthana', '', 'Sangnil', 'Male', '1977-07-09', 45, 'Bangkok', 'Thailand', 'Thai', NULL, '3101701809668', '2022-01-20', '2030-07-08', 'No', '', '', '', '147', '142', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, 'THA City Loft Hotel\r\n2 Eakamai 6 Sukhumvit 63 Phra Kanong Nua ,', 'noppadolsangnil@gmail.com', '0644654598', '', '', 'saxophone999', '', '', ''),
(30, '2022-05-02 17:18:55', 'Mr.', 'MORTEZA', '', 'TORABI', 'Male', '1988-09-15', 33, 'Tehran', 'Iran', 'Iranian', 'X55074142', NULL, '2021-11-03', '2026-11-03', 'No', '', '', '', '145', '102', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, 'No22, Goudarzi alley, Parastar St, Piroozi St, Tehran, Iran', 'morteza.torabi147@gmail.com', '+989355400010', '', '', '', '', '+989355400010', ''),
(31, '2022-05-02 17:50:37', 'Mr.', 'Jongrak', '', 'Boonrod', 'Male', '2000-11-13', 21, 'Krabi', 'Thailand', 'Thai', NULL, '1819900338104', '2019-04-08', '2027-11-12', 'No', '', '', '', '131', '105', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '9/740 Soi 13\r\nMooban Aue-a-thon (Tapong)\r\nTumbon Tapong, Amphur Muang\r\nRayong, 21000', 'id.jongrak1400@gmail.com', '+66813041400', '', '', '', '', '', ''),
(32, '2022-05-02 23:52:14', 'Mr.', 'Thitiphong', '', 'Choolasak', 'Male', '2004-06-09', 17, 'Saraburi', 'Thailand', 'Thai', NULL, '1199600381795', '2021-12-08', '2030-06-08', 'No', '', '', '', '134', '135', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '140 Moo 9 Tumbon Koonklone\r\nAmphur Praputhabaht\r\nSaraburi ', 'nong251168@gmail.com', '+6662 406 2551', '', '', '', '', '', ''),
(33, '2022-05-03 17:31:05', 'Mr.', 'Narongdat', '', 'Takantong', 'Male', '1999-08-31', 22, 'Ubonratchathani', 'Thailand', 'Thai', '', '1341100349982', '2020-03-13', '2028-02-02', 'No', '', '', '', '147', '123', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '76 Moo 8 Tumbon Napin\r\nAmphur Trakarn Puechphon\r\nUbonrathchathani 34130', 'phonnevada030842@gmail.com', '+6695 229-8168', '', '', '', '', '', ''),
(34, '2022-05-03 17:50:33', 'Mr.', 'Putthakarn', '', 'Kimsuk', 'Male', '2000-05-31', 12, 'Bangkok', 'Thailand', 'Thai', NULL, '1104200158512', '2015-11-30', '2024-05-30', 'No', '', '', '', '130', '141', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '126/39 Moo 4, Moobaan Domethong Village 3\r\nSoi 13, Liab klong Premprachakorn\r\nTumbon Suanprikthai\r\nAmphur Muang, Pathumthani 12000\r\nThailand', 'puttakarn.2543@gmail.com', '+6686 783-7943', '', '', '', '', '', ''),
(35, '2022-05-03 18:09:32', 'Mr.', 'Taweesap', '', 'Kongkitchertchoo', 'Male', '2002-11-21', 12, 'Bangkok', 'Thailand', 'Thai', NULL, '1102400139366', '2021-06-24', '2029-11-20', 'No', '', '', '', '107', '89', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '72 Soi Suksawat 26 Yak 7\r\nKwang Bangpakok, Khet Ratburana\r\nBangkok  10140\r\nThailand', 'taweesap1515@gmail.com', '+6695 391-9896', '', '', '', '', '', ''),
(36, '2022-05-03 18:24:00', 'Mr.', 'Thanaphon', '', 'Bunplot', 'Male', '1998-03-30', 24, 'Surin', 'Thailand', 'Thai', NULL, '1321000382201', '2015-04-30', '2024-03-29', 'No', '', '', '', '110', '68', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '46 Moo 3 Tumbon Narong\r\nAmphur Srinarong\r\nSurin  32150\r\nThailand', 'tanaponball1998bb@gmail.com', '+6689 021-7147', '', '', '', '', '', ''),
(37, '2022-05-03 18:37:52', 'Mr.', 'Pantakan', '', 'Kamwiang', 'Male', '2001-07-09', 20, 'Konkaen', 'Thailand', 'Thai', NULL, '1409903037044', '2020-02-18', '2028-07-08', 'No', '', '', '', '128', '79', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '88 Moo 11 \r\nTumbon Noantun\r\nAmphur Nongrua\r\nKonkaen  40210\r\nThailand', 'Dreampyptk@hotmail.com', '+6661 698-6688', '', '', '', '', '', ''),
(38, '2022-05-03 18:47:51', 'Mr.', 'Rachata', '', 'Khantee', 'Male', '2002-10-07', 19, 'Chonburi', 'Thailand', 'Thai', '', '1209702073975', '2019-03-28', '2027-10-06', 'No', '', '', '', '134', '92', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '7 Soi 7 Bangsaen Sai 2 Road\r\nTumbon Saensuk\r\nAmphur Muang Chonburi\r\nChonburi  20130\r\nThailand', 'rachata_bs@hotmail.com', '+6696 208-3712', '', '', '', '', '', ''),
(39, '2022-05-04 17:48:18', 'Mr.', 'Kritsanut', '', 'Lertsattayathorn', 'Male', '1988-12-16', 33, 'Songkhla', 'Thailand', 'Thai', NULL, '1909900192486', '2019-03-05', '2024-03-04', 'Yes', '2016-2018', '89/2017', '121/2018', '147', '147', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '222/263 Mooban Casaville Bangna-Teparak\r\nMoo 11, Teparak Road, Tumbon Bangpleeyai\r\nAmphur Bangplee\r\nSamutprakarn, 10540', 'nook-.-147@hotmail.com', '+6681 171-8190', '', '', '', '', '', ''),
(40, '2022-05-04 18:13:53', 'Mr.', 'Thanawat', '', 'Tirapongpaiboon', 'Male', '1993-12-14', 28, 'Nakhon Pathom', 'Thailand', 'Thai', NULL, '1739900443448', '2015-11-12', '2023-12-13', 'Yes', '2010-2011, 2012-2016', '67/2012', '97/2016', '147', '147', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '546/4 Thang Rodfai Tawantok Road\r\nTumbon Pra Pathomjedi\r\nAmphur Muang\r\nNakhon Pathom, 73000\r\nThailand', 'manthanawat147@gmail.com', '+6692 653-5455', '', '', '', '', '', ''),
(41, '2022-05-05 05:20:01', 'Mr.', 'Muhammad', 'Shahbaz', 'Altaf', 'Male', '1998-10-03', 23, 'Multan', 'Pakistan', 'Pakistani', 'MP5158701', '', '2018-01-22', '2023-01-21', 'No', '', '', '', '147', '135', '2022-05-27', 'Thai airways international', 'TG345', 0, '', '', '', '', '', '', 'No', '', 'Basti mehmood kot,neel kot,post office gulgast,tehseel zilla Multan.', 'shoaibazmee@gmail.com', '+923027318739', 'https://www.facebook.com/profile.php?id=100025196775413', '', '', '', '+923027318739', ''),
(42, '2022-05-05 22:41:18', 'Mr.', 'Tawan', '', 'Pooltong', 'Male', '1999-11-27', 22, 'Chanthaburi', 'Thailand', 'Thai', NULL, '1229900881571', '2022-02-08', '2030-11-26', 'No', '', '', '', '136', '98', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '34 Sukhumvit Road\r\nTumbon Klung\r\nAmphur Klung\r\nChanthaburi 22110\r\nThailand', 'Tawanyoyo168@gmail.com', '+6690 896-5004', '', '', '', '', '', ''),
(43, '2022-05-05 22:54:55', 'Mr.', 'Pornpiya', '', 'Kaosumran', 'Male', '1998-06-24', 23, 'Bangkok', 'Thailand', 'Thai', NULL, '1100702724758', '2021-02-09', '2029-06-23', 'No', '', '', '', '147', '127', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '6/429 Soi Koobon 27 Yak 58\r\nKwang Taraeng\r\nKhet Bangkhen\r\nBangkok 10220\r\nThailand', 'Banksnooker147147@gmail.com', '+6681 914-7147', '', '', '', '', '', ''),
(44, '2022-05-05 23:05:38', 'Mr.', 'Yanawarut', '', 'Phuekklom', 'Male', '2001-07-03', 20, 'Nakornsawan', 'Thailand', 'Thai', NULL, '1730201371989', '2018-02-22', '2026-07-22', 'No', '', '', '', '137', '106', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '295/2 Moo 5 Tumbon Nongpling\r\nAmphur Muang Nakornsawan\r\nNakornsawan 60000\r\nThailand', 'Yanawarut@gmail.com', '+6664 818-5341', '', '', '', '', '', ''),
(45, '2022-05-05 23:33:40', 'Mr.', 'Rattanachai', '', 'Tupadilok', 'Male', '2004-04-24', 18, 'Nakornnayok', 'Thailand', 'Thai', NULL, '1269900385809', '0021-12-12', '2030-04-23', 'No', '', '', '', '137', '94', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '162 Moo 8 Tumbon Sarika\r\nAmphur Muang Nakornnayok\r\nNokornnayok  26000\r\nThailand', 'fewchaba@gmail.com', '+6696 982-6365', '', '', '', '', '', ''),
(46, '2022-05-05 23:45:34', 'Mr.', 'Teerawat', '', 'Srikaithai', 'Male', '2003-12-16', 18, 'Chanthaburi', 'Thailand', 'Thai', NULL, '1119600101211', '2021-06-11', '2029-12-15', 'No', '', '', '', '120', '93', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '29/2 Moo 13 Tumbon Changkham\r\nAmphur Na-saam-arm\r\nChanthaburi  22160\r\nThailand', 'twkbenz2546@hotmail.com', '+6692 515-4901', '', '', '', '', '', ''),
(47, '2022-05-05 23:53:53', 'Mr.', 'Nutdanai', '', 'Manawm', 'Male', '2004-05-10', 18, 'Kanchanaburi', 'Thailand', 'Thai', NULL, '1710101203553', '2019-05-28', '2028-05-09', 'No', '', '', '', '118', '94', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '588/293 Moo 10 Mooban Siwalee\r\nTumbon Koakkruad\r\nAmphur Muang\r\nNakorn Ratchasima  30280\r\nThailand', 'Fogus10052547@gmail.com', '+6696 982-6365', '', '', '', '', '', ''),
(48, '2022-05-06 00:01:16', 'Mr.', 'Anukkhapon', '', 'Kidsumran', 'Male', '2004-03-15', 18, 'Chanthaburi', 'Thailand', 'Thai', '', '1199900977821', '2019-05-07', '2028-03-14', 'No', '', '', '', '135', '97', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '89/1 Moo 7 Tumbon Saton\r\nAmphur Soidao\r\nChanthaburi  22180\r\nThailand', 'Anukkhaponkidsumran@gmail.com', '+6665 529-9434', '', '', '', '', '', ''),
(49, '2022-05-06 00:08:23', 'Mr.', 'Chayanon', '', 'Thiansuk', 'Male', '2002-08-21', 21, 'Nakornsawan', 'Thailand', 'Thai', NULL, '1600101911737', '2021-06-18', '2029-08-20', 'No', '', '', '', '100', '100', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '17/3 Moo 3 Tumbon Phranon\r\nAmphur Muang Nakornsawan\r\nNakornsawan  60000\r\nThailand', 'kunnudear31@gmail.com', '+6697 979-3633', '', '', '', '', '', ''),
(50, '2022-05-06 19:23:56', 'Mr.', 'Siyavosh ', '', 'Mozayani ', 'Male', '1995-03-23', 27, 'Tehran', 'Iran', 'Iranian', '156628212', '', '2022-04-29', '2027-04-29', 'No', '', '', '', '147', '142', '2022-05-29', 'Qatar airline', 'QR 491', 0, '', '', '', '', '', '', 'No', '', 'No 5 , west first St , Motahari St , Ayatollah kashani blv , Tehran , Iran', 'siavashmozayani139139@yahoo.com', '+989127575669', '', '', '', '', '+989127575669', ''),
(51, '2022-05-06 20:06:03', 'Mr.', 'Jefrey', 'Consigna ', 'Roda', 'Male', '2000-03-01', 22, 'Surigao Del Sur', 'Philippines', 'Filipino', 'P2541116B', NULL, '2019-07-15', '2029-07-14', 'No', '', 'NA', 'NA', '143', '120', '2022-05-29', '', '', 0, 'Alvin', 'Ambatali', 'Barbero', '', '', '', 'No', NULL, '48 Rose Avenue Pilar Las Piñas', 'rodajefs@gmail.com', '09389139446', 'Jefrey Consigna Roda', '', '', '', '', ''),
(52, '2022-05-06 20:22:06', 'Mr.', 'Alvin', 'Ambatali', 'Barbero', 'Male', '1984-03-16', 38, 'Cauayan City, Isabela', 'Philippines', 'Filipino', 'P2539001B', NULL, '2019-07-15', '2029-07-14', 'No', '', '', '', '70', '75', '2022-05-29', '', '', 1, 'Jefrey', 'Consigna', 'Roda', '', '', '', 'No', NULL, 'Unit3 # 869 Kasipagan Street, Brgy. Plainview, Mandaluyong City Philippines', 'alvin_astig@yahoo.com', '+639178942597', 'Alvin Barbero', '', '', '', '09178952597', ''),
(54, '2022-05-07 20:47:04', 'Mr.', 'Mendsaikhan', '', 'Bat-erdene', 'Male', '1988-03-16', 34, 'Mongolia', 'Mongolia', 'Mongolia', 'E2549733', '', '2019-05-22', '2029-05-21', 'No', '', '', '', '100', '100', '2022-05-25', 'Asiana Airlines', 'OZ 742', 0, 'Amarjargal', '', 'Dashdorj', '', '', '', 'No', '', 'Khan-Uul District, 17-r Khoroo, 57-14, Ulaanbaatar, Mongolia.', 'mendsaikhan.baterdene@gmail.com', '+97680000147', 'https://www.facebook.com/mendi147/', '', '', '', '', ''),
(55, '2022-05-07 22:36:13', 'Mr.', 'Nader', '', 'Jahadi', 'Male', '1991-11-05', 30, 'Ahvaz', 'Iran', 'Iranian', 'V56566597', '', '2022-04-24', '2027-04-24', 'No', '', '', '', '140', '131', '2022-05-29', 'Qatar airline', 'QR 491', 0, '', '', '', '', '', '', 'No', '', 'No 14 , 9th east st , Kianpars blv , Ahvaz , Iran', 'naderjahadi@gmail.com', '+989330934502', '', '', '', '', '+989330934502', ''),
(56, '2022-05-08 04:39:53', 'Mr.', 'Zhong Wei', '', 'Tan ', 'Male', '1981-12-02', 40, 'Singapore', 'Singapore', 'Singaporean', 'K2249036Z', '', '2021-08-18', '2026-08-18', 'No', '', 'NA', 'NA', '50', '30', '2022-05-31', 'SQ', '708', 1, 'Ivan', '', 'Tan', '', '', '', 'No', '', '60 Tanah Merah Kechil Ave\r\n#03-20\r\nSingapore 465529', 'icues88@yahoo.com', '6597662033', 'NA', 'NA', 'NA', 'Na', '6597662033', 'Na'),
(57, '2022-05-08 09:54:32', 'Mr.', 'Lkhagvadorj', '', 'Ochirbal', 'Male', '1988-03-23', 34, 'Mongolia', 'Mongolia', 'Mongolia', 'E2955899', NULL, '2022-01-21', '2032-01-20', 'No', '', '', '', '100', '100', '2022-05-25', 'Asiana Airlines', 'OZ 742', 0, '', '', '', '', '', '', 'No', NULL, 'Bayanzurkh duureg, Tsaiz 16 district, ', 'roket_147@yahoo.com', '+97699901110', 'https://www.facebook.com/ochirbal.lkhagvadorj', '', '', '', '', ''),
(58, '2022-05-08 14:37:27', 'Mr.', 'Amin', '', 'Sanjaei', 'Male', '1998-04-30', 24, 'Khorramabad ', 'Iran', 'Iran', 'R42750714', '', '2018-02-26', '2023-02-26', 'No', '13', '120', '100', '147', '140', '2022-05-24', 'Mahan air', 'W5051', 0, 'Arman', '', 'Mardani', 'Hossein', '', 'Sanjaei', 'No', '', ' Tehran, Farjam St., Mazaheri St., No. 2, 3rd floor, Unit 6', 'Asanjaei147@gmail.com', '00989368525159', '', '', '', '', '', ''),
(60, '2022-05-08 22:24:45', 'Mr.', 'WAI CHUNG', '', 'CHANG', 'Male', '1985-11-05', 37, 'MALAYSIA', 'MALAYSIA', 'MALAYSIA', 'A50558782', NULL, '2018-02-21', '2023-08-21', 'No', '', '', '', '137', '87', '2022-05-29', 'AIRASIA', 'AK882', 2, 'CHATSIRI', '', 'PHIENPAYUKHET', 'JING ERN', '', 'CHANG', 'No', NULL, 'AS-66A, JALAN HANG TUAH 4, SALAK SOUTH GARDEN, 57100 KUALA LUMPUR, MALAYSIA', 'waichung_chang@hotmail.com', '+60122258683', '', '', 'waichung147', '', '+60122258683', ''),
(61, '2022-05-09 16:08:41', 'Mr.', 'Chuan Leong', '', 'Thor', 'Male', '1988-03-24', 34, 'Penang, Malaysia', 'Malaysia', 'Malaysian', 'A52451234', NULL, '2019-01-03', '2024-07-03', 'Yes', '5', '83', '', '145', '140', '2022-05-29', 'Air Asia', 'AK884', 2, 'Chuan Leong', '', 'Thor', 'Ying Shien', '', 'Goh', 'No', NULL, '2-19-06, Relau Vista Apartment,\r\nLebuh Relau 6, 11900 Bayan Lepas,\r\nPulau Pinang', 'clthor147@hotmail.com', '+60108115149', '', '', '', '', '+60108115149', ''),
(62, '2022-05-09 19:46:42', 'Mr.', 'Lkhagvasuren', '', 'Tumurchudur', 'Male', '1993-12-29', 28, 'Mongolia', 'Mongolia', 'Mongolia', 'E2985648', NULL, '2022-03-24', '2032-03-23', 'No', '', '', '', '143', '112', '2022-05-25', 'Asiana Airlines', 'OZ 742', 0, '', '', '', '', '', '', 'No', NULL, 'Orkhon aimag, Bayanundur district, 29-9.', 'lkhagwasurent147@gmail.com', '+97699352173', 'https://www.facebook.com/tumuruu.lhagwaa', '', '', '', '', ''),
(63, '2022-05-09 20:04:11', 'Mr.', 'Temuujin', '', 'Enkhbold', 'Male', '2000-07-24', 21, 'Mongolia', 'Mongolia', 'Mongolia', 'E3021197', '', '2022-05-11', '2032-05-10', 'No', '', '', '', '100', '122', '2022-05-25', 'Asiana Airlines', 'OZ 742', 0, '', '', '', '', '', '', 'No', '', 'Bayangol district, 16-r khoroo, 5-85.', 'Temuujin0724@gmail.com', '+97691889977', 'https://www.facebook.com/profile.php?id=100004562298385', '', '', '', '', ''),
(64, '2022-05-09 22:29:12', 'Mr.', 'Moti', '', 'Pakharin', 'Male', '1995-07-22', 26, 'Nepal', 'Nepal', 'Nepalese', '10920545', '', '2018-05-22', '2028-05-21', 'No', '', '', '', '147', '104', '2022-05-30', 'Thai airways', 'TG476', 0, '', '', '', '', '', '', 'No', '', '2-4 Maida Rd , Epping', 'Lnima220@gmail.com', '0415911190', 'Nima Lama', '', '', '', '', ''),
(66, '2022-05-10 03:48:47', 'Mr.', 'Mohammadreza', '', 'Rafieyan', 'Male', '1994-05-23', 28, 'Tehran', 'Iran', 'Iranian', 'V52993860', '', '2020-06-29', '2025-06-29', 'No', '', '', '', '142', '130', '2022-05-29', 'Qatar airline', 'QR 491', 0, '', '', '', '', '', '', 'No', '', 'No 11 , Mahtab st , Roodaki st , Tehran , Iran ', 'Mohammadrezarafieyan@yahoo.com', '+989352950545', '', '', '', '', '+989352950545', ''),
(67, '2022-05-10 18:22:58', 'Mr.', 'KEEN HOO', '', 'MOH', 'Male', '1986-11-29', 35, 'PULAU PINANG', 'MALAYSIA', 'MALAYSIAN', 'A55533598', '', '2022-02-26', '2027-02-26', 'No', '', '', '', '147', '142', '2022-05-28', 'AIR ASIA', 'AK884', 2, 'SHIN YEE', '', 'YEOH', '', '', '', 'No', '', 'NO.32, JALAN USJ 3A/4,\r\n47500 SUBANG JAYA,\r\nSELANGOR, MALAYSIA', 'khmoh1129@gmail.com', '+60 19-414 7147', '', '', '', '', '+60 19-414 7147', ''),
(68, '2022-05-10 20:49:45', 'Mr.', 'KOK LEONG', '', 'LIM', 'Male', '1995-05-16', 27, 'PULAU PINANG', 'MALAYSIA', 'MALAYSIAN', 'A41244660', '', '2017-10-13', '2023-01-04', 'No', '', '', '', '143', '139', '2022-05-28', 'AIR ASIA', 'AK884', 1, '', '', '', '', '', '', 'No', '', 'NO.8-07, PANGSAPURI TANJUNG INDAH,\r\nTAMAN TANJUNG INDAH I\r\n13400 BUTTERWORTH,\r\nPULAU PINANG, MALAYSIA', 'yeap_1418@yahoo.com', '+60 11-3603 0485', '', '', '', '', '+60 11-3603 0485', ''),
(70, '2022-05-10 21:20:41', 'Mr.', 'CHUNG LEONG', '', 'LOH', 'Male', '1988-04-16', 34, 'PULAU PINANG', 'MALAYSIA', 'MALAYSIAN', 'A55568900', '', '2022-04-30', '2027-04-30', 'No', '', '', '', '147', '139', '2022-05-28', 'AIR ASIA', 'AK884', 2, 'MOHD ', '', 'LUQMAN', 'KANNIKA', '', 'SONGKINJUN', 'Yes', 'Single', 'NO. 3A-15, EMERALD RESIDENCE,\r\nJALAN MUTIARA CHERAS 1,\r\n43200 SELANGOR, MALAYSIA', 'zackloh880416@gmail.com', '+60 10-313 2200', '', '', '', '', '+60 10-313 2200', ''),
(71, '2022-05-10 22:48:31', 'Mr.', 'FAHAD', 'UL HAQ', 'ALVI', 'Male', '1992-05-15', 30, 'ISLAMABAD', 'PAKISTAN', 'PAKISTANI', 'KZ1793543', '', '2022-04-20', '2027-04-19', 'No', '', 'NIL', 'NIL', '130', '101', '2022-05-28', 'THAI AIRLINE', 'TG350', 1, 'FAHAD', 'UL HAQ', 'ALVI', '', '', '', 'Yes', 'Single', 'HOUSE # 0/1024 MUHALLA HARI-PURA GHAZI ROAD RAWALPINDI\r\nHOUSE # 838 BLOCK # B ST # 11/2 POLICE FOUNDATION ISLAMABAD', 'fahadulhaqalvi999@gmail.com', '923455999591', 'https://www.facebook.com/ehmar.alvi', '', '', '', '', ''),
(80, '2022-05-11 21:09:06', 'Mr.', 'Himanshu', 'Dinesh ', 'Jain', 'Male', '1991-09-06', 30, 'Chennai, Tamil Nadu ', 'India ', 'Indian ', 'V5840013', '', '2021-12-16', '2031-12-15', 'No', '', '', '', '137', '130', '2022-05-29', 'Thai Smile ', 'WE 330', 0, '', '', '', '', '', '', 'No', '', '3-16-376, balamrai, Secunderabad, Hyderabad, Telangana, India - 500003', 'fullelectric9@gmail.com', '+919505147147', '', '', '', '', '+919505147147', ''),
(82, '2022-05-12 16:58:05', 'Mr.', 'Nader', 'Jaber', 'Saad Dhafer Aldoseri', 'Male', '1972-02-12', 50, 'Muharraq', 'Bahrain', 'Bahraini', '2597198', '', '2016-12-05', '2026-12-05', 'No', '', '', '', '140', '67', '2022-05-26', 'GULF AIR', 'GF 0152', 0, '', '', '', '', '', '', 'Yes', 'Single', 'Flat- 2, Entrance 335, Road 55, Block 210, Muharraq, Bahrain', 'elitehiringbh@gmail.com', '39402666', '', '', '', '', '39402666', ''),
(83, '2022-05-12 20:18:17', 'Mr.', 'Chee Keong (Zhi Qiang)', '', 'Chan (Chen)', 'Male', '1988-08-16', 34, 'Singapore', 'Singapore', 'Singaporean', 'K2659843N', '', '2022-05-12', '2032-05-12', 'No', '', '', '', '132', '118', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', '', '54 Lorong 5 Toa Payoh #11-214 Singapore 310054', 'Buttergaps@gmail.com', '+6587518919', '', '', '', '', '', ''),
(84, '2022-05-13 17:07:35', 'Mr.', 'Muhammad', 'Azhar', 'Khan', 'Male', '1973-04-26', 48, 'Lahore', 'Pakistan', 'Pakistan', 'QR4101973', '', '2019-07-02', '2024-07-01', 'No', '', '', '', '125', '110', '2022-05-28', 'Thai airways', 'TG 0345', 0, '', '', '', '', '', '', 'No', '', 'Block M2a house # 602 street # 55 Lake city holdings Lahore', 'azhark0323@gmail.com', '00923071004499', 'https://www.facebook.com/profile.php?id=100014719209562', '', '', '', '00923071004499', ''),
(86, '2022-05-13 17:22:45', 'Mr.', 'Muhammad', 'Umar', 'Khan', 'Male', '2003-08-26', 19, 'Lahore', 'Pakistan', 'Pakistan', 'DR4133242', '', '2019-07-02', '2024-07-01', 'No', '', '', '', '141', '132', '2022-05-28', 'Thai airways', 'TG 0345', 0, '', '', '', '', '', '', 'No', '', 'Block M2a house # 602 street # 55 Lake city holdings Lahore', 'uk243736@icloud.com', '+92 307 1004499', 'https://www.facebook.com/profile.php?id=100009283123808', '', '', '', '+92 307 1004499', ''),
(95, '2022-05-14 11:20:07', 'Mr.', 'Khash-Ochir', '', 'Tuvshinjargal', 'Male', '1990-06-19', 31, 'Mongolia', 'Mongolia', 'Mongolia', 'E2053685', NULL, '2018-01-15', '2023-01-14', 'No', '', '', '', '144', '128', '2022-05-25', 'Asiana Airlines', 'OZ 742', 0, '', '', '', '', '', '', 'No', NULL, 'Ulaanbaatar, Sukhbaatar District, 10r khoroo, 42-6.', 'ko_smite@yahoo.com', '+97699183648', 'https://www.facebook.com/khashochir.tuvshinjargal', '', '', '', '', ''),
(110, '2022-05-14 19:08:34', 'Mr.', 'Amir', '', 'Sarkhosh', 'Male', '1991-05-30', 31, 'Karaj', 'Iran', 'Iranian', 'Y48377776', NULL, '2019-04-07', '2024-04-06', 'No', '', '', '', '147', '145', '2022-05-30', '', '', 0, '', '', '', '', '', '', 'No', NULL, 'No253. Yaghoobi, pamchal, azimiye , karaj, iran', 'Amir.sarkhosh.147@gmail.com', '00989122448656', '', '', '', '', '', ''),
(113, '2022-05-15 06:58:41', 'Mr.', 'Hamza', 'Akbar', 'Muhammad Akbar', 'Male', '1993-11-12', 29, 'Faisalabad', 'Pakistan', 'Pakistan', 'FW1337003', NULL, '2018-02-02', '2028-02-02', 'Yes', '', '81', 'Non', '147', '147', '2022-05-28', 'Thai airways international', 'TG 0345', 0, '', '', '', '', '', '', 'No', NULL, 'Muslim town No #1 House No #121 Sargodha Road Faisalabad', 'Hamza147p@hotmail.com', '+92 323 7287872', 'https://www.facebook.com/Hamza.Akbar147', '', '', '', '+92 323 7287872', ''),
(115, '2022-05-15 08:44:06', 'Mr.', 'MUHAMMAD', 'Ahsan ', 'javaid', 'Male', '1990-04-25', 32, 'Sialkot', 'Pakistan', 'Pakistan', 'AJ8692113', NULL, '2019-08-19', '2024-08-17', 'No', '', '', '', '147', '146', '2022-05-28', 'Thai airways international', 'TG 0345', 0, '', '', '', '', '', '', 'No', NULL, 'Home adrees naie abadi hamza ghos mohala Habib pura Sialkot', 'Ladosports@gmail.com', '+92 331 6147319', 'https://www.facebook.com/ahsan.javed.3762', '', '', '', '+92 331 6147319', ''),
(116, '2022-05-15 08:46:02', 'Mr.', 'TAN', 'SENG', 'TECK', 'Male', '1973-11-11', 48, 'WP, Kuala Lumpur', 'MALAYSIA', 'MALAYSIAN', 'A52908096', '', '2019-03-17', '2024-07-16', 'No', '', '', '', '128', '123', '2022-05-30', 'AIR ASIA', 'AK 888', 1, '', '', '', '', '', '', 'No', '', '15 Lorong CP 7/66 \r\nCheras Perdana Batu 9 3/4 \r\nJalan Cheras 43200 Kajang , \r\nSelangor , Malaysia', 'tsengteck@yahoo.Com', '+601114393495', '', '', '', '', '+601114393495', ''),
(117, '2022-05-15 13:24:05', 'Mr.', 'Alireza', '', 'Rezaei', 'Male', '1995-02-02', 27, 'Hamedan', 'Iran', 'Iranian', 'T56377282', NULL, '2022-04-04', '2027-04-04', 'No', '', '', '', '147', '142', '2022-05-31', 'Qatar airways ', '836', 0, '', '', '', '', '', '', 'No', NULL, 'Iran', 'bbfir0501@yahoo.com', '00989125595269', '', '', '', '', '00905439180147', ''),
(119, '2022-05-15 21:11:28', 'Mr.', 'Poramin', '', 'Danjirakul', 'Male', '1988-12-01', 34, 'Nakornsawan', 'Thailand', 'Thai', NULL, '1609990028152', '2015-06-23', '2024-11-09', 'No', '', '', '', '143', '144', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'No', NULL, '21/19 Moo 11, Tumbon Watsai\r\nAmphur Muang Nakornsawan\r\nNakornsawan 60000\r\nThailand', 'nookfairladyz@gmail.com', '+6685 -199-5993', '', '', '', '', '', ''),
(120, '2022-05-15 21:37:45', 'Mr.', 'Ehsan', '', 'Heydari nezhad', 'Male', '1990-11-19', 31, 'Ahvaz', 'Iran', 'Iran', 'M51349553', NULL, '2019-10-10', '2024-10-09', 'No', '', '', '', '147', '142', '2022-05-30', 'Qatar airways', '836', 0, '', '', '', '', '', '', 'No', NULL, 'Number 12 vali asr street narmak tehran', 'ehsan.snooker@yahoo.com', '00989163199486', '', '', '', '', '', ''),
(121, '2022-05-16 02:37:49', 'Mr.', 'Mohammad Ali', '', 'Moghadam', 'Male', '2000-04-19', 22, 'Yazd', 'Iran', 'Iranian', 'M54964585', '', '2021-10-27', '2026-10-27', 'No', '', '', '', '120', '105', '2022-05-28', 'Qatar airline ', 'FHY934', 0, '', '', '', '', '', '', 'No', '', 'Block 1 , Phase 1 , Ekbatan , Tehran , Iran', 'Mohammad.moghadam2018@gmail.com', '+98 912 923 8874', '', '', '', '', '+98 912 923 8874', ''),
(122, '2022-05-16 05:28:01', 'Mr.', 'Muhammad', 'Zeeshan', 'Siddiqui', 'Male', '1988-08-24', 34, 'Lahore', 'Pakistan', 'Pakistan', 'CE5468753', '', '2020-11-05', '2030-11-04', 'No', '', '', '', '139', '122', '2022-05-25', 'Emirates', 'EK372', 0, '', '', '', '', '', '', 'No', '', '476 block (p) johar town lahore pakistan ', 'zeesid147@gmail.com', '+976586298460', 'https://www.facebook.com/profile.php?id=100058058371019', '', '', '', '+923234147147', ''),
(123, '2022-05-16 05:40:00', 'Mr.', 'Muhammad ', 'Hassan', 'Naziri fahim', 'Male', '1995-12-27', 27, 'Peshawer', 'Pakistan ', 'Pakistani', 'CR9823634', NULL, '2021-09-20', '2026-09-19', 'No', '', '', '', '80', '50', '2022-05-25', 'Emirate ', 'Ek372', 0, '', '', '', '', '', '', 'No', NULL, 'H.no.97,sector c-1,block 2 Town ship lahore', 'Hassannaziri96@gmail.com ', '+971527341010', 'https://www.facebook.com/harry.khan.50552', '', '', '', '+971527341010', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` int(1) NOT NULL DEFAULT 1,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userType`, `user_created`) VALUES
(1, 'ADMIN', 'pass', 1, '2022-03-27 13:01:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_personal`
--
ALTER TABLE `info_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_personal`
--
ALTER TABLE `info_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
