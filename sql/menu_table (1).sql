-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2025 at 04:49 PM
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
(10, 'Y', 'INFORMMATION', 1, 1, 'Web Site UCC', 'LINK_TO', 'fas fa-mail-bulk fa-lg', 'https://www.ucc.co.th/'),
(11, 'Y', 'INFORMMATION', 1, 2, 'Group Mail', 'OPEN_IN', 'fas fa-mail-bulk fa-lg', 'http://app.ucc.co.th/test'),
(12, 'Y', 'INFORMMATION', 1, 3, 'Map', 'OPEN_IN', 'far fa-map fa-lg', 'http://app.ucc.co.th/map'),
(13, 'Y', 'INFORMMATION', 1, 4, 'News Management', 'LINK_TO', 'fas fa-newspaper', 'https://www.ucc.co.th/news_admin_mgmt/login.php'),
(14, 'Y', 'INFORMMATION', 1, 5, 'Opening Management', 'LINK_TO', 'fas fa-address-card', 'https://www.ucc.co.th/news_admin_opening/login.php'),
(15, 'Y', 'ACCOUNT', 2, 1, 'Invoive Send & Receipt', 'LINK_TO', 'fas fa-cogs fa-lg', 'https://mobileapp.ucc.co.th:22443/sales_invoice/'),
(16, 'Y', 'GENERAL_AFFAIRS', 4, 1, 'Meeting Room Booking', 'LINK_TO', 'fas fa-book-open fa-lg', 'https://booking-room.ucc.co.th/index.php'),
(17, 'Y', 'GENERAL_AFFAIRS', 4, 2, 'Car Booking Online', 'LINK_TO', 'fas fa-car-alt fa-lg', 'https://booking-room.ucc.co.th/ucc_car/index.php'),
(18, 'Y', 'GENERAL_AFFAIRS', 4, 3, 'Requisition Take Out FAC(TOF)', 'LINK_TO', 'fas fa-list-alt', 'https://booking-room.ucc.co.th/requisitionpj/'),
(19, 'Y', 'GENERAL_AFFAIRS', 4, 4, 'Welcome Board', 'LINK_TO', 'fas fa-clipboard fa-lg', 'https://booking-room.ucc.co.th/welcome-board-user/'),
(20, 'Y', 'GENERAL_AFFAIRS', 4, 5, 'Document ISO14001:2005', 'LINK_TO', 'far fa-folder-open fa-lg', 'http://app.ucc.co.th/TQA_Center/menu_ga.php'),
(21, 'Y', 'HUMAN_RESOURCES', 5, 1, 'Interprer System', 'OPEN_IN', 'fas fa-cogs fa-lg', 'https://mobileapp.ucc.co.th:22443/interpreter/'),
(22, 'Y', 'HUMAN_RESOURCES', 5, 2, 'HR APP Form', 'LINK_TO', 'fas fa-paste', 'https://booking-room.ucc.co.th/requisition_form/'),
(23, 'Y', 'IMPORT&EXPORT', 6, 1, 'IMEX Document Online', 'OPEN_IN', 'far fa-file-archive fa-lg', 'https://u3millsheet.ucc.co.th/IMEXDoc/'),
(24, 'Y', 'IMPORT&EXPORT', 6, 2, 'TISI eDocument Online', 'LINK_TO', 'fas fa-file-archive fa-lg', 'https://u3millsheet.ucc.co.th/TISI_DOC/'),
(25, 'Y', 'MANUFACTURING(MFG)', 7, 1, 'Die MTN Control', 'LINK_TO', 'fas fa-book-open fa-ls', 'http://192.168.79.11:81/Die_MTN_control.php'),
(26, 'Y', 'SALE', 8, 1, 'Invoice Send & Receipt', 'LINK_TO', 'far fa-clone fa-ls', 'https://mobileapp.ucc.co.th:22443/sales_invoice/'),
(27, 'Y', 'PLANNING&LOGISTIC', 9, 1, 'Truck Scale U2', 'OPEN_IN', 'fas fa-truck-moving fa-lg', 'https://tsu2.ucc.co.th'),
(28, 'Y', 'PLANNING&LOGISTIC', 9, 2, 'Truck Scale U3', 'OPEN_IN', 'fas fa-truck-moving fa-lg', 'https://tsu3.ucc.co.th'),
(29, 'Y', 'PLANNING&LOGISTIC', 9, 3, 'Truck Scale U4', 'OPEN_IN', 'fas fa-truck-moving fa-lg', 'https://tsu4.ucc.co.th'),
(30, 'Y', 'PLANNING&LOGISTIC', 9, 4, 'QRcode Skidlot', 'OPEN_IN', 'fas fa-qrcode fa-lg', 'https://booking-room.ucc.co.th/qrcode/'),
(31, 'Y', 'PLANNING&LOGISTIC', 9, 5, 'Skid Control', 'LINK_TO', 'fas fa-stream fa-lgs', 'http://app.ucc.co.th/skid_control'),
(32, 'Y', 'PLANNING&LOGISTIC', 9, 6, 'Customer Routing', 'OPEN_IN', 'fas fa-city fa-lg', 'https://u3millsheet.ucc.co.th/Customer-Routing/'),
(33, 'Y', 'TOTAL_QUALITY_ASSURANCE', 10, 1, 'Defect Information', 'LINK_TO', 'fas fa-cogs fa-lg', 'https://mobileapp.ucc.co.th:22443/TQA/reason_Gallery.php'),
(34, 'Y', 'TOTAL_QUALITY_ASSURANCE', 10, 2, 'U2 Millsheet', 'LINK_TO', 'far fa-folder-open fa-lg', 'https://u2millsheet.ucc.co.th:2443'),
(35, 'Y', 'TOTAL_QUALITY_ASSURANCE', 10, 3, 'U3 Millsheet', 'LINK_TO', 'far fa-folder-open fa-lg', 'https://u3millsheet.ucc.co.th'),
(36, 'Y', 'TOTAL_QUALITY_ASSURANCE', 10, 4, 'U4 Millsheet', 'LINK_TO', 'far fa-folder-open fa-lg', 'https://u4millsheet.ucc.co.th'),
(37, 'Y', 'TOTAL_QUALITY_ASSURANCE', 10, 4, 'Document Control(TQA)', 'LINK_TO', 'far fa-folder-open fa-lg', 'http://app.ucc.co.th/TQA_Center/menu_center.php');

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
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
