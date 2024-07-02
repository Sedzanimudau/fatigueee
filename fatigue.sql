-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2024 at 01:18 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u179023685_fatigue`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `camera_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`id`, `camera_id`, `date`) VALUES
(1, 'Cam_094', '2023-10-23 08:00:22'),
(2, 'CAM_120', '2023-10-23 08:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `fatigue`
--

CREATE TABLE `fatigue` (
  `id` int(255) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `camera_id` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `violation` varchar(255) NOT NULL,
  `hour_of_operation` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_fatigue_incidents` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fatigue`
--

INSERT INTO `fatigue` (`id`, `vehicle_id`, `camera_id`, `surname`, `name`, `violation`, `hour_of_operation`, `date_time`, `total_fatigue_incidents`) VALUES
(1, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '10', '2023-11-07 10:21:51', '56'),
(6, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '1', '2023-11-07 10:22:04', ''),
(7, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '2', '2023-11-07 10:22:15', ''),
(287, 'C307', 'CAM_120', 'Ramukumba', 'Charles', ' Drowsiness detected ', '6', '2023-11-07 10:22:28', ''),
(288, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Mobile phone detected', '', '2023-11-07 10:22:38', ''),
(289, 'C307', 'CAM_120', 'Ramukumba', 'Charles', ' Drowsiness detected ', '17', '2023-11-07 10:22:46', ''),
(290, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Mobile phone detected ', '', '2023-11-07 10:22:56', ''),
(291, 'C307', 'CAM_120', 'Ramukumba', 'Charles', ' Drowsiness detected ', '21', '2023-11-07 10:23:08', ''),
(292, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-07 10:23:22', ''),
(293, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-08 11:40:30', ''),
(294, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-10 15:57:23', ''),
(295, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-09 11:17:16', ''),
(296, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-14 07:12:52', ''),
(297, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-13 15:28:27', ''),
(298, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-13 14:11:10', ''),
(299, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-14 10:27:44', ''),
(300, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-16 09:08:24', ''),
(301, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-15 16:26:08', ''),
(693, 'C307', 'CAM_120', 'Ramukumba', 'Charles', 'Drowsiness detected', '', '2023-11-08 11:23:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `road_sign`
--

CREATE TABLE `road_sign` (
  `id` int(11) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `camera_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `speed` varchar(255) NOT NULL,
  `road_sign` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_sign`
--

INSERT INTO `road_sign` (`id`, `vehicle_id`, `camera_id`, `name`, `surname`, `speed`, `road_sign`, `date_time`) VALUES
(1, 'C307', 'Cam_094', 'Charles', 'Ramukumba', '6.05015', 'Stop', '2023-10-24 15:21:09'),
(2, 'C307', 'Cam_094', 'Charles', 'Ramukumba', '4.987', 'Stop', '2023-10-23 16:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `deptid` varchar(255) NOT NULL,
  `emplist` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `deptid`, `emplist`, `description`, `start_datetime`, `end_datetime`) VALUES
(61, 'Check motor', '14', '', 'Check motor every 4th day', '2023-09-10 07:00:00', '2023-09-14 07:00:00'),
(62, 'Check motor', '14', '', 'Check motor every 4th day', '2023-09-14 07:00:00', '2023-09-18 07:00:00'),
(63, 'Check motor', '14', '', 'Check motor every 4th day', '2023-09-18 07:00:00', '2023-09-22 07:00:00'),
(64, 'Check motor', '14', '', 'Check motor every 4th day', '2023-09-22 07:00:00', '2023-09-26 07:00:00'),
(65, 'Check motor', '14', '', 'Check motor every 4th day', '2023-09-26 07:00:00', '2023-09-30 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblasset`
--

CREATE TABLE `tblasset` (
  `ID` int(255) NOT NULL,
  `asset_id` varchar(255) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblasset`
--

INSERT INTO `tblasset` (`ID`, `asset_id`, `asset_name`, `CreationDate`) VALUES
(10, 'welder#0123', 'Welder  VANTAGE 500', '2023-08-02 09:59:55'),
(11, 'welder#0127', 'Welding   DUAL MAVERICK 450', '2023-08-02 10:01:01'),
(12, 'Motor_M10', 'Drive motor', '2023-08-02 10:02:45'),
(13, 'Pump_P034', 'Concrete pump', '2023-08-02 10:04:14'),
(14, 'Truck_T013', ' Truck Concrete mixer', '2023-08-02 10:05:46'),
(15, 'Cutter_C220', 'Cable Cutter 40mm Diameter ', '2023-08-02 10:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblassetinspection`
--

CREATE TABLE `tblassetinspection` (
  `id` int(255) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `asset_id` varchar(255) NOT NULL,
  `emp_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `oil` varchar(255) NOT NULL,
  `noise` varchar(255) NOT NULL,
  `vibration` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `damage` varchar(255) NOT NULL,
  `general` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `captured_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblassetinspection`
--

INSERT INTO `tblassetinspection` (`id`, `asset_name`, `asset_id`, `emp_number`, `name`, `surname`, `temperature`, `oil`, `noise`, `vibration`, `shift`, `damage`, `general`, `notes`, `date_time`, `captured_image`) VALUES
(8, 'welder#0123', 'welder#0123', '004', 'johannes', 'medupe', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', 'Excellent', '2023-08-02 10:30:51', ''),
(9, 'Pump_P034', 'Pump_P034', '004', 'Johannes', 'Medupe', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Bad', 'oil spilage on the motor', '2023-08-02 13:01:51', ''),
(36, 'Truck_T013', 'Truck_T013', 'emp_006', 'thabang', 'mongale', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', 'Hi', '2023-08-05 13:09:44', ''),
(37, 'welder#0127', 'welder#0127', '004', 'johannes', 'medupe', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', 'Test3', '2023-08-05 13:17:55', ''),
(38, 'Cutter_C220', 'Cutter_C220', '004', 'Johannes', 'Medupe', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', 'Hi', '2023-08-05 13:21:39', ''),
(39, 'welder#0127', 'welder#0127', 'emp_006', 'thabang', 'mongale', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', '', '2023-08-05 13:34:53', ''),
(40, 'welder#0123', 'welder#0123', '003', 'Khangwelo ', 'Mmbengeni ', 'Normal', 'Yes', 'Yes', 'Normal', 'No', 'No', 'Good', 'Needs  replacement ', '2023-08-10 14:18:40', ''),
(41, 'welder#0123', 'welder#0123', '003', 'Khangwelo ', 'Mmbengeni ', 'Normal', 'Yes', 'Yes', 'Normal', 'No', 'No', 'Good', 'Needs  replacement ', '2023-08-10 14:20:29', ''),
(42, 'welder#0127', 'welder#0127', '003', 'Johannes ', 'Medupe', 'Normal', 'No', 'No', 'Normal', 'No', 'No', 'Good', 'Excellent ', '2023-08-10 14:22:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldefects`
--

CREATE TABLE `tbldefects` (
  `id` int(255) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `asset_id` varchar(255) NOT NULL,
  `emp_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `general` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `ID` int(5) NOT NULL,
  `DepartmentName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`ID`, `DepartmentName`, `CreationDate`) VALUES
(13, 'ELECTRICAL', '2023-08-01 11:06:30'),
(14, 'MECHANICAL', '2023-08-01 11:51:25'),
(15, 'INSTRUMENTATION', '2023-08-01 13:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(5) NOT NULL,
  `DepartmentID` int(5) DEFAULT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `EmpName` varchar(200) DEFAULT NULL,
  `EmpEmail` varchar(200) DEFAULT NULL,
  `EmpContactNumber` bigint(10) DEFAULT NULL,
  `Designation` varchar(200) DEFAULT NULL,
  `EmpDateofbirth` date DEFAULT NULL,
  `EmpAddress` varchar(250) DEFAULT NULL,
  `EmpDateofjoining` date DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `DepartmentID`, `EmpId`, `EmpName`, `EmpEmail`, `EmpContactNumber`, `Designation`, `EmpDateofbirth`, `EmpAddress`, `EmpDateofjoining`, `Description`, `Password`, `ProfilePic`, `CreationDate`, `UpdationDate`) VALUES
(18, 13, '000', 'Charles Ramukumba', 'charles.ramukumba@gmail.com', 716442810, 'Technician', '1998-02-05', '41 juta street braamfontein 2001', '2023-02-02', 'Ramukumba', '81dc9bdb52d04dc20036dbd8313ed055', '51382800134c3db25ec5b9bcc8a35f731693985443.png', '2023-09-06 07:30:43', NULL),
(19, 13, '007', 'johannes medupe', 'jayjoules5@gmail.com', 842452172, 'Technician', '2023-09-13', 'bc1qljh07gasluqttq5vh22eweeetvgqvyw3kw877p', '2023-09-12', 'N/a', '202cb962ac59075b964b07152d234b70', '25be31ce77aef28d8aee95e7052aad201694592011jpeg', '2023-09-13 08:00:11', NULL),
(20, 13, 'exxaro@belfast', 'exxaro', 'belfast@exxaro.com', 678388403, 'Technician', '2019-11-01', 'Mpumalanga', '2023-10-25', 'N/A', '3b8d189262d3e589f091b108a6ae1330', '25be31ce77aef28d8aee95e7052aad201698312988jpeg', '2023-10-26 09:36:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '                                                                                 Employee Task Management System\r\nWelcome to about Us page', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'taskinfo@gmail.com', 7896541239, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbltask`
--

CREATE TABLE `tbltask` (
  `ID` int(5) NOT NULL,
  `DeptID` int(5) DEFAULT NULL,
  `AssignTaskto` int(5) DEFAULT NULL,
  `TaskPriority` varchar(100) DEFAULT NULL,
  `TaskTitle` varchar(250) DEFAULT NULL,
  `TaskDescription` mediumtext DEFAULT NULL,
  `TaskEnddate` date DEFAULT NULL,
  `TaskAssigndate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `WorkCompleted` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltask`
--

INSERT INTO `tbltask` (`ID`, `DeptID`, `AssignTaskto`, `TaskPriority`, `TaskTitle`, `TaskDescription`, `TaskEnddate`, `TaskAssigndate`, `Status`, `WorkCompleted`, `Remark`, `UpdationDate`) VALUES
(1, 1, 2, 'Medium', 'Candidate Hiring', 'Approx 100 candidate will come to interview.', '2022-03-18', '2022-03-16 07:12:32', 'Completed', '100', 'Task Completed', NULL),
(3, 3, 4, 'Most Urgent', 'Develop project', 'Project Title: Employees hgfghfuyvuytuyuyiui\r\nghdfdhdhcfbugsuytcbucubter\r\nycrbcetfoyxwieyiuctrywui\r\nbtuuurcuewbcyreiufi\r\nbitooiyuuncrewourwetiurou\r\n', '2022-03-26', '2022-03-22 12:15:22', 'Completed', '100', 'Task Completed', NULL),
(4, 1, 2, 'Urgent', 'Hiring of a Software Developer', 'Hire a  Software Developer\r\nSkills Required PHP, MySQL', '2022-04-05', '2022-03-26 06:05:55', 'Inprogress', '20', 'Interview Going on', NULL),
(5, 4, 5, 'Most Urgent', 'Prepare Bill For Laptop', 'Create bill for laptop', '2022-03-29', '2022-03-26 06:12:55', 'Completed', '100', 'Bill Prepared', NULL),
(6, 3, 6, 'Most Urgent', 'Fix pc', 'not switching on', '2023-07-27', '2023-07-26 08:31:43', 'Completed', '100', 'pc fixed', NULL),
(7, 3, 7, 'Most Urgent', 'Fix reception desktop', 'The computer tower is slow', '2023-07-28', '2023-07-26 14:52:06', 'Completed', '100', 'Task complete', NULL),
(8, 3, 8, 'Medium', 'Fix the camera code', 'Comment out the turn button fro mobile phones.', '2023-07-28', '2023-07-28 08:42:56', 'Completed', '100', 'done', NULL),
(9, 3, 8, 'Most Urgent', 'Book boardroom', 'We are having a meeting', '2023-07-28', '2023-07-28 10:08:18', NULL, NULL, NULL, NULL),
(10, 10, 9, 'Most Urgent', 'Fix honda taillight', 'broken light', '2023-08-02', '2023-08-01 07:42:58', 'Completed', '100', 'Taillight fixed', NULL),
(12, 13, 12, 'Most Urgent', 'Electric shock on the drive motor', 'fix the electric shock problem', '2023-08-07', '2023-08-01 11:29:13', 'Inprogress', '70', 'Task started', NULL),
(14, 14, 13, 'Most Urgent', 'Oil spilage on the gearbox ', 'Check the engine warning light on the dashboard if its not faulty.', '2023-08-11', '2023-08-01 12:13:51', 'Completed', '100', 'Task started', NULL),
(15, 15, 14, 'Most Urgent', 'Faulty speed sensor and engine control unit.', 'Fix a faulty speed sensor and faulty engine control unit.', '2023-08-10', '2023-08-01 13:51:40', 'Inprogress', '55', 'Task started', NULL),
(16, 12, 11, 'Most Urgent', 'RIP detected', 'RIP detected on the conveyerbelt', '2023-08-11', '2023-08-02 11:10:17', 'Completed', '100', 'Task started', NULL),
(17, 14, 15, 'Most Urgent', 'Oil spilage', 'motor has oil spilage', '2023-08-07', '2023-08-03 09:15:21', 'Inprogress', '30', 'started working', NULL),
(18, 14, 0, NULL, 'fix gear motor', 'Fix oil leak', '2023-08-12', '2023-08-04 10:54:17', NULL, NULL, NULL, NULL),
(19, 13, 12, NULL, 'fix motor', 'inspect motor', '2023-08-09', '2023-08-04 11:05:00', NULL, NULL, NULL, NULL),
(20, 13, 12, NULL, 'fix motor', 'inspect motor', '2023-08-10', '2023-08-04 11:05:00', NULL, NULL, NULL, NULL),
(21, 14, 15, NULL, 'Gear', 'Go fix', '2023-08-05', '2023-08-04 11:53:10', NULL, NULL, NULL, NULL),
(22, 12, 0, NULL, 'fix motor', 'inspect motor', '2023-08-08', '2023-08-04 12:10:37', NULL, NULL, NULL, NULL),
(23, 12, 11, NULL, 'Gear', 'Go fix', '2023-08-05', '2023-08-04 12:13:31', NULL, NULL, NULL, NULL),
(24, 12, 11, NULL, 'Gear', 'Go fix', '2023-08-06', '2023-08-04 12:13:31', NULL, NULL, NULL, NULL),
(25, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-05', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(26, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-09', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(27, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-13', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(28, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-17', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(29, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-21', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(30, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-25', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(31, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-29', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(32, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-02', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(33, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-06', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(34, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-10', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(35, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-14', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(36, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-18', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(37, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-22', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(38, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-26', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(39, 14, 0, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-30', '2023-08-08 15:04:19', NULL, NULL, NULL, NULL),
(40, 14, 15, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-29', '2023-08-08 15:05:56', NULL, NULL, NULL, NULL),
(41, 14, 15, NULL, 'Check motor', 'Check motor every 4th day', '2023-09-02', '2023-08-08 15:05:57', NULL, NULL, NULL, NULL),
(42, 14, 13, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-05', '2023-08-10 11:37:37', NULL, NULL, NULL, NULL),
(43, 14, 13, NULL, 'Check motor', 'Check motor every 4th day', '2023-08-09', '2023-08-10 11:37:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltasktracking`
--

CREATE TABLE `tbltasktracking` (
  `ID` int(10) NOT NULL,
  `TaskID` int(10) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `WorkCompleted` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltasktracking`
--

INSERT INTO `tbltasktracking` (`ID`, `TaskID`, `Remark`, `Status`, `WorkCompleted`, `UpdationDate`) VALUES
(2, 1, 'Task Completed', 'Completed', '100', '2022-03-20 18:30:00'),
(4, 3, 'Task Completed', 'Completed', '100', '2022-03-23 05:28:14'),
(5, 4, 'Interview Going on', 'Inprogress', '20', '2022-03-26 06:07:29'),
(6, 5, 'Preparing the bill', 'Inprogress', '50', '2022-03-26 06:13:52'),
(7, 5, 'Bill Prepared', 'Completed', '100', '2022-03-26 06:14:34'),
(8, 6, 'working on it.', 'Inprogress', '50', '2023-07-26 08:33:37'),
(9, 6, 'pc fixed', 'Completed', '100', '2023-07-26 08:34:28'),
(10, 7, 'Work in progress ', 'Inprogress', '40', '2023-07-26 19:36:36'),
(11, 8, 'started', 'Inprogress', '80', '2023-07-28 08:46:46'),
(12, 8, 'done', 'Completed', '100', '2023-07-28 08:47:47'),
(13, 7, 'Task complete', 'Completed', '100', '2023-07-28 10:00:53'),
(14, 10, 'I have started', 'Inprogress', '70', '2023-08-01 07:52:38'),
(15, 10, 'Taillight fixed', 'Completed', '100', '2023-08-01 07:53:08'),
(16, 11, 'Task started', 'Inprogress', '65', '2023-08-01 11:02:06'),
(17, 11, 'Task completed.', 'Completed', '100', '2023-08-01 11:32:37'),
(18, 12, 'Task started', 'Inprogress', '70', '2023-08-01 11:48:18'),
(19, 14, 'Task started', 'Inprogress', '80', '2023-08-01 13:07:55'),
(20, 14, 'Task started', 'Completed', '100', '2023-08-01 13:13:49'),
(21, 15, 'Task started', 'Inprogress', '55', '2023-08-01 13:52:46'),
(22, 16, 'Task started', 'Completed', '100', '2023-08-02 12:58:51'),
(23, 17, 'started working', 'Inprogress', '30', '2023-08-03 11:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblurl`
--

CREATE TABLE `tblurl` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblurl`
--

INSERT INTO `tblurl` (`id`, `page_name`, `url`) VALUES
(1, 'asset inspection', 'https://www.heineken-pds.com/asset_inspection_form.html'),
(2, 'vehicle inspection', 'https://www.heineken-pds.com/vehicle_inspection_form.html');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicleinspect`
--

CREATE TABLE `tblvehicleinspect` (
  `id` int(255) NOT NULL,
  `asset_name` varchar(255) NOT NULL,
  `asset_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `emp_number` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `tires` varchar(255) NOT NULL,
  `lights` varchar(255) NOT NULL,
  `mirrors` varchar(255) NOT NULL,
  `horn` varchar(255) NOT NULL,
  `windshield_wiper` varchar(255) NOT NULL,
  `fluids` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `safety` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvehicleinspect`
--

INSERT INTO `tblvehicleinspect` (`id`, `asset_name`, `asset_id`, `name`, `surname`, `emp_number`, `reg_no`, `temperature`, `tires`, `lights`, `mirrors`, `horn`, `windshield_wiper`, `fluids`, `engine`, `safety`, `notes`, `date_time`) VALUES
(3, 'Truck_T013', 'Truck_T013', 'johannes', 'medupe', '004', 'jm67hjgp', 'Normal', 'Good', 'Good', 'Good', 'Good', 'Good', 'Adequate', 'Good', 'Good', 'ok', '2023-08-02 21:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(250) NOT NULL DEFAULT 0 COMMENT '1=active, others=non-active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `username`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'daniyalhussain', 'daniyalhussain', 'daniyalhussain32', 'daniyalhussain32@gmail.com', '$2y$10$utu2uwz/ONRQWFKVpuWta.Pul0pmq/zQ08QcNPsXzHOXw/Ef1z4ku', 1, '2022-12-15 14:17:02'),
(2, 'medupe', 'johannes', 'jaymedupe', 'jayjoules5@gmail.com', '$2y$10$wgTA7lMY60QaaSMvQ54DQ.7U2a1W0BYURCOvxxGn7h/r301uwMML.', 1, '2022-12-15 17:56:07'),
(3, 'Pitsoane', 'Lesego', 'Lesego', 'lesegopits@gmail.com', '$2y$10$tB.pgiWldP05M4RVHN1rEOoqDuACWR.uagyj7iNqHBHKIamzFvddi', 1, '2023-01-07 16:05:57'),
(4, 'Talha', 'Talha', 'Talha', 'talhajuttt344@gmail.com', '$2y$10$7Z9wadHCgyNw/.XqLmPd3OeG/M/ks9F.W/FiCrhP4wnuOIrM1jvvK', 1, '2023-01-07 17:30:01'),
(5, 'talha', 'talha', 'talhaaaaa', 'talhahussain344@gmail.com', '$2y$10$mEE6GUnuJrAYD/tba8AtK.lA9myzvF3k.ZKm9iPz8e6Xf7RqnxRNS', 950602, '2023-01-24 15:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_id` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_id`, `date`) VALUES
(1, 'C307', '2023-10-23 12:53:24.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fatigue`
--
ALTER TABLE `fatigue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road_sign`
--
ALTER TABLE `road_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblasset`
--
ALTER TABLE `tblasset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblassetinspection`
--
ALTER TABLE `tblassetinspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldefects`
--
ALTER TABLE `tbldefects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltask`
--
ALTER TABLE `tbltask`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblurl`
--
ALTER TABLE `tblurl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicleinspect`
--
ALTER TABLE `tblvehicleinspect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fatigue`
--
ALTER TABLE `fatigue`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=694;

--
-- AUTO_INCREMENT for table `road_sign`
--
ALTER TABLE `road_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblasset`
--
ALTER TABLE `tblasset`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblassetinspection`
--
ALTER TABLE `tblassetinspection`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbldefects`
--
ALTER TABLE `tbldefects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltask`
--
ALTER TABLE `tbltask`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblurl`
--
ALTER TABLE `tblurl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvehicleinspect`
--
ALTER TABLE `tblvehicleinspect`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
