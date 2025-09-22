-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2025 at 04:51 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_ucc_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_table`
--

CREATE TABLE `menu_table` (
  `No` int(11) NOT NULL,
  `Status_menu` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `Group_Menu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Group_NO` int(10) NOT NULL DEFAULT '0',
  `Menu_NO` int(100) NOT NULL DEFAULT '0',
  `Name_Menu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Type_Action` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ICON_Menu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Link_Menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_table`
--

INSERT INTO `menu_table` (`No`, `Status_menu`, `Group_Menu`, `Group_NO`, `Menu_NO`, `Name_Menu`, `Type_Action`, `ICON_Menu`, `Link_Menu`) VALUES
(1, 'Y', 'COMPUTER', 3, 1, 'New Requirement Form(Epicor)', 'OPEN_IN', 'far fa-building fa-lg', 'http://app.ucc.co.th/eforms/New_Requirement_Form_R07.pdf'),
(2, 'Y', 'COMPUTER', 3, 2, 'Memo Online Admin', 'LINK_TO', 'fas fa-memory fa-lg', 'http://app.ucc.co.th/memo_online/index_admin.php'),
(3, 'Y', 'COMPUTER', 3, 3, 'ERP Memo Online', 'OPEN_IN', 'fas fa-sd-card fa-lg', 'http://app.ucc.co.th/memo_online'),
(4, 'Y', 'COMPUTER', 3, 4, 'Computer Service', 'OPEN_IN', 'fas fa-desktop fa-lg', 'http://app.ucc.co.th/new_com'),
(5, 'Y', 'COMPUTER', 3, 5, 'Stock Computer', 'LINK_TO', 'fas fa-archive fa-lg', 'http://app.ucc.co.th/Spare/'),
(6, 'Y', 'COMPUTER', 3, 6, 'New REQ(K\'Saksit)', 'LINK_TO', 'fas fa-file-alt fa-lg', 'https://booking-room.ucc.co.th/p-cha/'),
(7, 'Y', 'COMPUTER', 3, 7, 'Report REQ(ADMIN)', 'LINK_TO', 'fas fa-file-signature fa-lg', 'https://booking-room.ucc.co.th/p-cha-admin/'),
(8, 'Y', 'COMPUTER', 3, 8, 'Log Mail System Down', 'LINK_TO', 'fas fa-inbox fa-lg', 'http://app.ucc.co.th/Log_maildown/'),
(9, 'Y', 'COMPUTER', 3, 9, 'Check Stock', 'LINK_TO', 'fas fa-cube fa-lg', 'http://app.ucc.co.th/chk_stock'),
(10, 'Y', 'INFORMMATION', 1, 1, 'Web Site UCC', 'LINK_TO', 'fas fa-mail-bulk fa-lg', 'http://app.ucc.co.th/eforms/New_Requirement_Form_R07.pdf'),
(11, 'Y', 'INFORMMATION', 1, 2, 'Group Mail', 'OPEN_IN', 'fas fa-mail-bulk fa-lg', 'http://app.ucc.co.th/memo_online'),
(12, 'Y', 'INFORMMATION', 1, 3, 'Map', 'OPEN_IN', 'far fa-map fa-lg', 'http://app.ucc.co.th/map'),
(13, 'Y', 'INFORMMATION', 1, 4, 'News Management', 'LINK_TO', 'fas fa-newspaper', 'https://www.ucc.co.th/news_admin_mgmt/login.php'),
(14, 'Y', 'INFORMMATION', 1, 5, 'Opening Management', 'LINK_TO', 'fas fa-address-card', 'https://www.ucc.co.th/news_admin_opening/login.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
