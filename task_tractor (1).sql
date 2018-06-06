-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 07:39 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_tractor`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_versions`
--

CREATE TABLE `api_versions` (
  `id` int(11) NOT NULL,
  `version` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_versions`
--

INSERT INTO `api_versions` (`id`, `version`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sendto_user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `chat_messages` longtext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `sendto_user_id`, `project_id`, `chat_messages`, `created_on`) VALUES
(3, 2, 2, 3, 'Create Task By User', '2018-05-11 11:46:01'),
(4, 2, 1, 3, 'Create Task By User', '2018-05-11 11:46:01'),
(5, 2, 2, 3, 'Task Created ByDashrath Menaria', '2018-05-11 11:57:09'),
(6, 2, 1, 3, 'Task Created ByDashrath Menaria', '2018-05-11 11:57:09'),
(7, 1, 2, 3, 'Task Created By Admin', '2018-05-15 06:07:48'),
(8, 1, 19, 24, 'Task Created By Admin', '2018-05-15 06:18:46'),
(9, 1, 18, 24, 'Task Created By Admin', '2018-05-15 06:18:46'),
(10, 5, 5, 24, 'Task Created ByDashrath Menaria', '2018-05-15 12:17:52'),
(11, 27, 27, 29, 'Task Created Byanil pahadiya', '2018-05-15 12:30:01'),
(12, 1, 19, 32, 'Task Created By Admin', '2018-05-15 13:40:43'),
(13, 1, 18, 32, 'Task Created By Admin', '2018-05-15 13:40:43'),
(14, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-18 07:32:25'),
(15, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-18 08:12:45'),
(16, 5, 5, 35, 'Task Created ByDashrath Menaria', '2018-05-18 13:16:01'),
(17, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:13:36'),
(18, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:14:29'),
(19, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:14:29'),
(20, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:15:39'),
(21, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:15:39'),
(22, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:15:39'),
(23, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:15:39'),
(24, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:20:02'),
(25, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:20:02'),
(26, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:20:02'),
(27, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:20:02'),
(28, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:20:02'),
(29, 5, 5, 35, 'Task Created ByDashrath Menaria', '2018-05-19 11:27:34'),
(30, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:33:20'),
(31, 5, 5, 20, 'Task Created ByDashrath Menaria', '2018-05-19 11:33:31'),
(32, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 11:34:51'),
(33, 1, 5, 25, 'Task Created By Admin', '2018-05-19 12:15:26'),
(34, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-19 12:18:22'),
(35, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-19 12:21:55'),
(36, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-19 12:22:17'),
(37, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-19 12:24:10'),
(38, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:48:05'),
(39, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:48:48'),
(40, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:48:48'),
(41, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:49:39'),
(42, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:49:39'),
(43, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-19 12:49:39'),
(44, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-19 13:25:21'),
(45, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 04:55:40'),
(46, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 04:55:40'),
(47, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:10:40'),
(48, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:10:40'),
(49, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:10:40'),
(50, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:11:28'),
(51, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:11:28'),
(52, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:11:28'),
(53, 5, 5, 25, 'Task Created ByDashrath Menaria', '2018-05-21 05:11:28'),
(54, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-21 06:58:47'),
(55, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-21 07:03:17'),
(56, 18, 18, 35, 'Task Created BySonali Vijayvergia', '2018-05-21 07:09:02'),
(57, 27, 27, 29, 'Task Created ByAnil Pahadiya', '2018-05-21 11:18:50'),
(58, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:38:18'),
(59, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:38:57'),
(60, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:38:57'),
(61, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:39:33'),
(62, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:39:33'),
(63, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:39:33'),
(64, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:41:10'),
(65, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:42:04'),
(66, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-22 10:42:04'),
(67, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-22 13:25:39'),
(68, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-23 12:51:05'),
(69, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-23 12:52:50'),
(70, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-23 17:06:18'),
(71, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-24 11:09:52'),
(72, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-24 11:10:33'),
(73, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-24 11:10:33'),
(74, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-24 11:11:25'),
(75, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-24 12:57:22'),
(76, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-24 12:57:57'),
(77, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-24 12:57:57'),
(78, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:21:14'),
(79, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:21:41'),
(80, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:21:41'),
(81, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:22:52'),
(82, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:22:52'),
(83, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-25 13:22:52'),
(84, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-25 16:41:10'),
(85, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-25 16:42:20'),
(86, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-25 16:42:20'),
(87, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-25 16:43:30'),
(88, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-26 14:57:08'),
(89, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:50:29'),
(90, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:51:12'),
(91, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:51:12'),
(92, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:51:54'),
(93, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:51:54'),
(94, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:51:54'),
(95, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:52:23'),
(96, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:52:23'),
(97, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:52:23'),
(98, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-28 10:52:23'),
(99, 19, 19, 32, 'Task Created ByVaibhav Purohit', '2018-05-28 10:58:43'),
(100, 19, 19, 32, 'Task Created ByVaibhav Purohit', '2018-05-28 10:59:09'),
(101, 19, 19, 32, 'Task Created ByVaibhav Purohit', '2018-05-28 10:59:09'),
(102, 1, 19, 32, 'Task Created By Admin', '2018-05-28 11:03:31'),
(103, 1, 18, 32, 'Task Created By Admin', '2018-05-28 11:03:31'),
(104, 1, 19, 32, 'Task Created By Admin', '2018-05-28 11:07:01'),
(105, 1, 19, 32, 'Task Created By Admin', '2018-05-28 11:08:34'),
(106, 1, 18, 32, 'Task Created By Admin', '2018-05-28 11:13:46'),
(107, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-28 12:51:44'),
(108, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-28 12:52:13'),
(109, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-28 12:52:13'),
(110, 20, 20, 25, 'Task Created ByChandmal Dhakar', '2018-05-29 07:08:29'),
(111, 11, 11, 23, 'Task Created ByPrakash Sharma', '2018-05-29 12:47:31'),
(112, 1, 2, 1, 'Task Created By Admin', '2018-05-30 04:49:26'),
(113, 1, 2, 1, 'Task Created By Admin', '2018-06-01 12:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `client_visites`
--

CREATE TABLE `client_visites` (
  `id` int(11) NOT NULL,
  `master_client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `duration` varchar(100) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `reason` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(5) NOT NULL COMMENT '0= active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_visites`
--

INSERT INTO `client_visites` (`id`, `master_client_id`, `user_id`, `visit_date`, `duration`, `vehicle_type`, `reason`, `created_on`, `is_deleted`) VALUES
(1, 2, 1, '2018-05-06', '', 'own', 'Server is not working.', '2018-05-10 06:55:29', 0),
(2, 2, 27, '2018-05-24', '', 'own', 'IOS app testing', '2018-05-18 14:20:56', 0),
(3, 1, 27, '2018-05-17', '', 'company', 'New technologies present', '2018-05-11 12:00:43', 0),
(4, 1, 27, '2018-05-09', '', 'own', 'IOS application server issues', '2018-05-11 12:03:51', 0),
(5, 1, 6, '2018-05-12', '', 'Own', 'Implement Fee Software', '2018-05-12 10:22:07', 0),
(12, 1, 1, '2018-05-22', '', 'own', 'Describe Application ', '2018-05-19 08:47:39', 0),
(13, 2, 1, '2018-05-23', '', 'company', 'APPLICATION TESTING ', '2018-05-19 08:54:00', 0),
(14, 1, 1, '2018-05-21', '', 'own', 'Test', '2018-05-21 04:42:37', 0),
(15, 1, 23, '2018-05-21', '', 'own', ' APPLICATION NOT WORKING', '2018-05-21 09:29:37', 0),
(16, 2, 27, '2018-05-22', '', 'own', 'iOS application testing ', '2018-05-22 04:05:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `half_day` varchar(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `leave_reason` text NOT NULL,
  `leave_status` int(11) NOT NULL COMMENT '0 = panding, 1 = approve, 2 = rejected',
  `action_reason` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_deleted` int(5) NOT NULL COMMENT '0 = inprocess, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_type_id`, `half_day`, `date_from`, `date_to`, `leave_reason`, `leave_status`, `action_reason`, `created_on`, `created_by`, `is_deleted`) VALUES
(4, 9, 1, '', '2018-05-09', '2018-05-09', 'Not well', 1, '', '2018-05-09 07:00:48', 0, 0),
(5, 11, 1, '', '2018-05-10', '2018-05-12', 'i have to go home for dividation of properties b/w families.\ni have to arrange and club all members for this purpose within these 2 days so i would like to inform you please grant me leave for these days.\ni am sure i will complete Offserve CMS task before 20th may 2018.\nThanks', 2, '', '2018-05-10 01:55:13', 0, 0),
(9, 27, 1, '', '2018-07-14', '2018-07-16', 'Meet to doctor', 2, '', '2018-05-14 05:42:56', 0, 0),
(10, 27, 2, '', '2018-01-16', '2018-01-23', 'Not good', 1, '', '2018-05-15 05:56:23', 0, 0),
(11, 27, 2, '', '2018-03-14', '2019-03-12', 'Meet to Doctor  ', 1, '', '2018-05-15 06:26:04', 0, 0),
(12, 27, 4, '', '2018-12-15', '2018-01-15', 'Marriage and family funcation ', 1, '', '2018-05-15 10:33:55', 0, 0),
(18, 7, 1, '', '2019-05-19', '2019-05-20', 'Reasonhsks ', 1, '', '2018-05-19 07:41:02', 0, 0),
(20, 7, 3, '', '2018-05-23', '2018-05-23', 'Room shifting', 1, '', '2018-05-23 06:20:01', 0, 0),
(21, 11, 2, '', '2018-05-24', '2018-05-24', 'Sir i have to go home for an hardly urgent work.if possible then i will come after half day.', 1, '', '2018-05-23 15:11:28', 0, 0),
(22, 7, 4, '', '2018-05-24', '2018-05-24', 'Late arrival', 1, '', '2018-05-24 06:01:21', 0, 0),
(23, 9, 3, '', '2018-05-26', '2018-05-26', 'Laptop repairing.', 1, '', '2018-05-26 04:41:58', 0, 0),
(24, 9, 3, '', '2018-05-26', '2018-05-26', 'Laptop repairing.', 1, '', '2018-05-26 04:42:09', 0, 0),
(25, 14, 1, '', '2018-06-02', '2018-05-26', 'Intimated leave', 1, '', '2018-05-26 04:42:53', 0, 0),
(26, 12, 3, '', '2018-05-31', '2018-05-31', 'Function at Ashish Residence', 0, '', '2018-05-31 04:30:10', 0, 0),
(27, 17, 3, '', '2018-05-31', '2018-05-31', 'Function at Ashish Residence', 0, '', '2018-05-31 04:30:50', 0, 0),
(28, 24, 3, '', '2018-05-31', '2018-05-31', 'Function at Ashish Residence', 0, '', '2018-05-31 04:31:51', 0, 0),
(29, 13, 3, '', '2018-05-31', '2018-05-31', 'Function at Ashish Residence', 0, '', '2018-05-31 04:32:24', 0, 0),
(30, 27, 2, '', '2018-05-31', '2018-05-31', 'Retirement of my uncle.', 0, '', '2018-05-31 04:34:24', 0, 0),
(31, 9, 2, '', '2018-05-31', '2018-05-31', 'Coming from ahmedabad with family', 0, '', '2018-05-31 04:34:36', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `is_deleted` int(11) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `type`, `is_deleted`) VALUES
(1, 'Sick Leave', 0),
(2, 'Casual Leave', 0),
(3, 'Short Leave', 0),
(4, 'Other ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_clients`
--

CREATE TABLE `master_clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `edited_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited_by` int(11) NOT NULL,
  `is_deleted` int(5) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_clients`
--

INSERT INTO `master_clients` (`id`, `client_name`, `location`, `address`, `created_on`, `created_by`, `edited_on`, `edited_by`, `is_deleted`) VALUES
(2, 'St Xavier School', 'PALI', 'Pali Rajasthan', '2018-05-04 05:18:06', 0, '0000-00-00 00:00:00', 0, 0),
(3, 'Jain Thela', 'Udaipur', 'Udaipur', '2018-05-26 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'Mukesh', 'uda', 'jblnhfsdlfb', '2018-05-30 07:13:22', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'adasds', 'dasasdasd', 'dasdasd', '2018-06-05 07:19:56', 0, '0000-00-00 00:00:00', 0, 0),
(8, 'jfsdfs', 'dad', 'hmt', '2018-06-05 08:39:05', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_client_pocs`
--

CREATE TABLE `master_client_pocs` (
  `id` int(11) NOT NULL,
  `master_client_id` int(11) NOT NULL,
  `contact_person_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_client_pocs`
--

INSERT INTO `master_client_pocs` (`id`, `master_client_id`, `contact_person_name`, `email`, `username`, `password`, `mobile`, `created_on`, `created_by`, `is_deleted`) VALUES
(2, 6, 'Gopal sir', 'Gopal@123.com', '', '', '99999999999', '2018-05-04 05:16:25', 0, 0),
(5, 4, 'Dsu', 'dsu@123.com', '', '', '9680747166', '2018-05-30 07:07:46', 0, 0),
(6, 6, 'RRRRR', 'dasumenaria@gmail.com', '', '', '9680747166', '2018-05-30 07:13:22', 0, 0),
(15, 7, 'dasd', 'dsdss@fsav.fgf', '', '', '9680747166', '2018-06-05 07:19:56', 0, 0),
(36, 8, 'sfd', 'dasumenaria@gmail.com', '', '', '2222333333', '2018-06-05 08:46:36', 0, 0),
(37, 8, 'xasd', 'dasumenaria@gmail.com', '', '', '2222333333', '2018-06-05 08:46:36', 0, 0),
(38, 2, 'Darshan JI', 'Darshan@123.com', '', '', '9999999999', '2018-06-05 08:50:56', 0, 0),
(39, 2, 'Darshan@123.com', 'Darshan@123.com', '', '', '9999999999', '2018-06-05 08:50:56', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_roles`
--

CREATE TABLE `master_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_roles`
--

INSERT INTO `master_roles` (`id`, `name`, `is_deleted`) VALUES
(0, 'Users', 0),
(1, 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(3) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `master_client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'point_of_contact',
  `title` varchar(200) NOT NULL,
  `deadline` date NOT NULL,
  `completed_status` int(11) NOT NULL COMMENT '0 = Incompleted, 1 = Completed',
  `completed_date` date NOT NULL DEFAULT '0000-00-00',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editied_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `master_client_id`, `user_id`, `title`, `deadline`, `completed_status`, `completed_date`, `created_by`, `created_on`, `edited_on`, `editied_by`, `is_deleted`) VALUES
(1, 1, 1, 'Website: Wonder Cricket Academy', '1970-01-01', 0, '0000-00-00', 1, '2018-05-08 09:49:32', '0000-00-00 00:00:00', 0, 0),
(2, 1, 1, 'Fees: St.Xaviers, Pali-Branch', '2018-05-31', 0, '0000-00-00', 1, '2018-05-08 09:59:53', '0000-00-00 00:00:00', 0, 0),
(3, 1, 1, 'Choudhary Offset', '2018-05-11', 0, '0000-00-00', 1, '2018-05-08 10:01:56', '0000-00-00 00:00:00', 0, 0),
(4, 2, 1, 'Fees: St.Xaviers, Udaipur-Baranch', '2018-05-31', 0, '0000-00-00', 1, '2018-05-08 10:03:27', '0000-00-00 00:00:00', 0, 0),
(5, 1, 1, 'Fees: Alok Panchwati ', '1970-01-01', 0, '0000-00-00', 1, '2018-05-08 10:08:27', '0000-00-00 00:00:00', 0, 0),
(6, 1, 1, 'Software: ICAI', '2018-05-18', 0, '0000-00-00', 1, '2018-05-08 10:13:57', '0000-00-00 00:00:00', 0, 0),
(7, 1, 1, 'Software: Marvel Water Park', '2018-05-09', 0, '0000-00-00', 1, '2018-05-08 10:16:50', '0000-00-00 00:00:00', 0, 0),
(8, 1, 1, 'Software: Comfort Tour', '2018-05-12', 0, '0000-00-00', 1, '2018-05-08 10:20:10', '0000-00-00 00:00:00', 0, 0),
(9, 1, 1, 'Software: Suni Textile', '2018-05-19', 0, '0000-00-00', 1, '2018-05-08 10:23:12', '0000-00-00 00:00:00', 0, 0),
(10, 1, 1, 'Website: Manav Seva ', '2018-05-11', 0, '0000-00-00', 1, '2018-05-08 10:32:07', '0000-00-00 00:00:00', 0, 0),
(11, 1, 1, 'Website: UCCI', '2018-05-30', 0, '0000-00-00', 1, '2018-05-08 10:36:51', '0000-00-00 00:00:00', 0, 0),
(12, 1, 1, 'Website: Samir Samuel ', '2018-05-15', 0, '0000-00-00', 1, '2018-05-08 10:41:34', '0000-00-00 00:00:00', 0, 0),
(13, 1, 1, 'Website: Bustv', '2018-05-17', 0, '0000-00-00', 1, '2018-05-08 10:44:19', '0000-00-00 00:00:00', 0, 0),
(14, 1, 1, 'Website: Chogan Mandir ', '2018-05-12', 0, '0000-00-00', 1, '2018-05-08 10:47:27', '0000-00-00 00:00:00', 0, 0),
(15, 1, 1, 'Fee Software: CBA', '2018-05-12', 0, '0000-00-00', 1, '2018-05-08 10:50:12', '0000-00-00 00:00:00', 0, 0),
(16, 1, 1, 'Website: Sacroscant ', '2018-05-12', 0, '0000-00-00', 1, '2018-05-08 10:52:04', '0000-00-00 00:00:00', 0, 0),
(17, 1, 1, 'Kota Smart Care', '2018-05-30', 0, '0000-00-00', 1, '2018-05-08 10:54:03', '0000-00-00 00:00:00', 0, 0),
(18, 1, 1, 'Software: STL', '2018-05-11', 0, '0000-00-00', 1, '2018-05-08 10:55:33', '0000-00-00 00:00:00', 0, 0),
(19, 1, 1, 'Software: Insurance', '2018-05-19', 0, '0000-00-00', 1, '2018-05-08 10:57:48', '0000-00-00 00:00:00', 0, 0),
(20, 1, 1, 'Travel B2B', '1970-01-01', 0, '0000-00-00', 1, '2018-05-08 11:03:26', '0000-00-00 00:00:00', 0, 0),
(21, 1, 1, 'School App: Design', '2018-05-11', 0, '0000-00-00', 1, '2018-05-08 11:06:04', '0000-00-00 00:00:00', 0, 0),
(22, 1, 1, 'Website: Phppoets', '2018-05-12', 0, '0000-00-00', 1, '2018-05-08 11:07:56', '0000-00-00 00:00:00', 0, 0),
(23, 1, 1, 'Software: Observ CMS', '2018-05-16', 0, '0000-00-00', 1, '2018-05-08 11:08:53', '0000-00-00 00:00:00', 0, 0),
(24, 1, 1, 'App: Phppoets', '2018-05-14', 0, '0000-00-00', 1, '2018-05-08 11:10:40', '0000-00-00 00:00:00', 0, 0),
(25, 1, 1, 'Travel B2B Portal and App', '2018-05-16', 0, '0000-00-00', 1, '2018-05-09 05:08:15', '0000-00-00 00:00:00', 0, 0),
(26, 2, 1, 'Mobile Application', '2018-05-13', 0, '0000-00-00', 1, '2018-05-09 09:10:03', '0000-00-00 00:00:00', 0, 0),
(27, 1, 1, 'Management Function APP', '2018-05-21', 0, '0000-00-00', 1, '2018-05-09 09:14:09', '0000-00-00 00:00:00', 0, 0),
(28, 1, 27, 'Class Test managment', '2018-05-20', 0, '0000-00-00', 27, '2018-05-10 07:20:09', '0000-00-00 00:00:00', 0, 0),
(29, 2, 27, 'Attendance Management', '2018-05-24', 0, '0000-00-00', 27, '2018-05-10 07:26:03', '0000-00-00 00:00:00', 0, 0),
(30, 2, 1, 'Phppoets task tracker app ios ', '2018-05-16', 0, '0000-00-00', 1, '2018-05-10 10:37:50', '0000-00-00 00:00:00', 0, 0),
(31, 1, 27, 'Testing IOS App', '2018-05-18', 0, '0000-00-00', 1, '2018-05-11 07:27:23', '0000-00-00 00:00:00', 0, 0),
(32, 1, 19, 'Demo Project', '2018-05-15', 0, '0000-00-00', 1, '2018-05-11 12:12:46', '0000-00-00 00:00:00', 0, 0),
(33, 1, 27, 'Task Management', '2018-05-21', 0, '0000-00-00', 27, '2018-05-11 12:16:03', '0000-00-00 00:00:00', 0, 0),
(34, 2, 1, 'new project', '2018-05-25', 0, '0000-00-00', 1, '2018-05-14 10:15:55', '0000-00-00 00:00:00', 0, 0),
(35, 1, 1, 'Test App', '2018-05-30', 0, '0000-00-00', 1, '2018-05-15 13:46:22', '0000-00-00 00:00:00', 0, 0),
(36, 1, 27, 'PHP task', '2018-05-19', 0, '0000-00-00', 1, '2018-05-18 11:13:48', '0000-00-00 00:00:00', 0, 0),
(37, 1, 27, 'Class Task', '2018-05-19', 0, '0000-00-00', 1, '2018-05-18 11:21:43', '0000-00-00 00:00:00', 0, 0),
(38, 2, 27, 'Class Notes', '2018-05-19', 0, '0000-00-00', 1, '2018-05-18 11:25:09', '0000-00-00 00:00:00', 0, 0),
(39, 1, 27, 'PHP Poets ', '2018-05-22', 0, '0000-00-00', 1, '2018-05-18 11:35:36', '0000-00-00 00:00:00', 0, 0),
(40, 6, 5, 'Marvel', '2018-06-08', 0, '0000-00-00', 1, '2018-06-01 06:20:52', '0000-00-00 00:00:00', 0, 0),
(41, 6, 5, 'test', '2018-06-26', 0, '0000-00-00', 1, '2018-06-01 06:22:19', '0000-00-00 00:00:00', 0, 0),
(42, 6, 5, 'test', '2018-06-26', 0, '0000-00-00', 1, '2018-06-01 06:22:40', '0000-00-00 00:00:00', 0, 0),
(43, 6, 5, 'test', '2018-06-26', 0, '0000-00-00', 1, '2018-06-01 06:22:50', '0000-00-00 00:00:00', 0, 0),
(44, 6, 5, 'testing', '2018-06-30', 0, '0000-00-00', 1, '2018-06-01 06:23:21', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `user_id`) VALUES
(3, 2, 26),
(4, 2, 6),
(9, 6, 10),
(10, 7, 5),
(11, 8, 5),
(12, 9, 7),
(13, 9, 10),
(14, 9, 23),
(15, 10, 16),
(17, 12, 16),
(18, 13, 16),
(19, 14, 1),
(20, 15, 6),
(21, 16, 16),
(22, 17, 10),
(23, 18, 7),
(24, 19, 15),
(25, 19, 13),
(26, 20, 21),
(27, 20, 5),
(28, 21, 9),
(29, 22, 1),
(30, 23, 11),
(31, 24, 5),
(32, 24, 18),
(33, 24, 19),
(34, 25, 5),
(35, 25, 9),
(36, 25, 21),
(37, 25, 1),
(38, 25, 20),
(40, 28, 27),
(41, 29, 27),
(57, 32, 18),
(58, 32, 19),
(59, 35, 19),
(60, 35, 1),
(61, 35, 5),
(62, 35, 18),
(67, 5, 6),
(68, 5, 1),
(81, 1, 16),
(82, 1, 1),
(83, 1, 6),
(84, 1, 6),
(85, 1, 17),
(86, 1, 18),
(87, 1, 18),
(88, 1, 19),
(89, 1, 19),
(90, 1, 1),
(91, 43, 5),
(92, 44, 1),
(93, 44, 5),
(94, 44, 7),
(104, 4, 6),
(105, 4, 7),
(106, 4, 8),
(107, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `project_statuses`
--

CREATE TABLE `project_statuses` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_statuses`
--

INSERT INTO `project_statuses` (`id`, `project_id`, `deadline`, `created_on`, `created_by`) VALUES
(1, 32, '2018-05-14', '2018-05-15 11:00:16', 18),
(2, 32, '2018-05-15', '2018-05-15 11:14:00', 1),
(3, 32, '1970-01-01', '2018-05-15 11:14:18', 1),
(4, 32, '1970-01-01', '2018-05-15 13:02:37', 1),
(5, 32, '1970-01-01', '2018-05-15 13:11:08', 1),
(6, 32, '1970-01-01', '2018-05-15 13:20:08', 1),
(7, 32, '2018-05-15', '2018-05-15 13:26:05', 1),
(8, 32, '2018-05-16', '2018-05-15 13:28:34', 1),
(9, 32, '2018-05-15', '2018-05-15 13:29:10', 1),
(10, 5, '2018-05-31', '2018-05-15 13:50:28', 1),
(11, 5, '2018-05-31', '2018-05-15 13:56:16', 1),
(12, 1, '2018-05-25', '2018-05-15 13:57:02', 16),
(13, 1, '2018-05-25', '2018-05-15 14:00:27', 1),
(14, 1, '1970-01-01', '2018-05-15 14:01:00', 1),
(15, 3, '2018-05-11', '2018-05-15 14:01:32', 22),
(16, 4, '2018-05-31', '2018-05-21 06:32:17', 1),
(17, 3, '2018-05-11', '2018-05-21 06:35:08', 1),
(18, 3, '2018-05-11', '2018-05-21 06:38:35', 1),
(19, 4, '2018-05-31', '2018-05-21 06:39:07', 1),
(20, 4, '2018-05-31', '2018-05-21 09:42:07', 1),
(21, 31, '2018-05-18', '2018-05-22 04:32:54', 27),
(22, 11, '2018-05-30', '2018-05-22 04:45:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL COMMENT 'Assign to',
  `project_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=incomplete, 1=completed',
  `deadline` date NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completed_on` date NOT NULL,
  `deleted_on` date NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `project_id`, `title`, `status`, `deadline`, `created_user_id`, `created_on`, `completed_on`, `deleted_on`, `is_deleted`) VALUES
(1, 1, 1, 'Collection of data such as content of pages and images', 0, '2018-06-04', 1, '2018-06-04 06:48:35', '2018-05-19', '0000-00-00', 0),
(2, 1, 1, 'Create  my  Database', 1, '2018-05-10', 1, '2018-05-19 05:20:47', '2018-05-19', '0000-00-00', 0),
(3, 1, 3, 'Export option needed in all reports', 1, '2018-05-11', 1, '2018-05-11 09:51:27', '2018-05-11', '0000-00-00', 0),
(4, 1, 3, 'In Order, When we add new item from plus sign then item added in the drop down list but it changed name of item of all other rows which is already selected. Logically it should only add in the current row of item.', 1, '2018-05-11', 1, '2018-05-09 11:05:00', '2018-05-09', '0000-00-00', 0),
(5, 1, 3, 'In order form, Operator name can be multiple as for one order multiple operator can work', 1, '2018-05-11', 1, '2018-05-26 17:11:27', '2018-05-26', '0000-00-00', 0),
(6, 6, 4, 'Fy 2017-2018 closing balance not  carry forward in next fy 2018-2019', 0, '2018-06-08', 1, '2018-05-31 06:31:56', '2018-05-15', '0000-00-00', 0),
(7, 6, 4, 'Expense modules', 1, '2018-05-31', 1, '2018-05-18 14:03:31', '2018-05-18', '0000-00-00', 0),
(8, 1, 3, 'In spent items, filter option is needed at top of Customer Name, Order Name and Date Range', 1, '2018-05-11', 1, '2018-05-09 12:56:56', '2018-05-09', '0000-00-00', 0),
(9, 6, 5, 'Printing issue need to be reslove', 0, '2018-05-31', 1, '2018-05-08 10:11:43', '0000-00-00', '0000-00-00', 0),
(10, 10, 6, 'Software made by Pooja & Dimpal not merge ', 1, '2018-05-18', 1, '2018-05-08 10:17:34', '2018-05-08', '0000-00-00', 0),
(11, 5, 7, 'SMS not working ', 1, '2018-05-09', 1, '2018-05-09 10:53:47', '2018-05-09', '0000-00-00', 0),
(12, 5, 8, 'Email functionality on duty slip not working ', 0, '2018-05-31', 1, '2018-05-31 06:03:30', '0000-00-00', '0000-00-00', 0),
(13, 7, 9, 'Improvement in design', 0, '2018-05-19', 1, '2018-05-08 10:25:26', '0000-00-00', '0000-00-00', 0),
(14, 7, 9, 'Sales return club in sales invoice', 0, '2018-05-19', 1, '2018-05-08 10:27:09', '0000-00-00', '0000-00-00', 0),
(15, 1, 9, 'Discussion pending with client', 0, '2018-05-19', 1, '2018-05-08 10:27:52', '0000-00-00', '0000-00-00', 0),
(16, 1, 3, 'In Order Report, remove Operator Name and Job card creation name column.', 1, '2018-05-11', 1, '2018-05-09 12:58:13', '2018-05-09', '0000-00-00', 0),
(17, 5, 6, 'Software merge made by Pooja & Dimpal  ', 0, '2018-06-30', 1, '2018-05-31 06:36:37', '0000-00-00', '0000-00-00', 0),
(18, 1, 3, 'In outstanding payment report, amount is coming with comma , which is to be removed', 1, '2018-05-11', 1, '2018-05-26 17:11:26', '2018-05-26', '0000-00-00', 0),
(19, 16, 10, 'Updates on page as per client ', 0, '2018-05-11', 1, '2018-05-08 10:33:24', '0000-00-00', '0000-00-00', 0),
(20, 1, 3, 'Payment Generation and Bill entry, show total amount of order in non editable format', 1, '2018-05-11', 1, '2018-05-10 04:18:31', '2018-05-10', '0000-00-00', 0),
(21, 10, 11, 'Update on pages', 0, '2018-05-30', 1, '2018-05-08 10:38:33', '0000-00-00', '0000-00-00', 0),
(22, 1, 3, 'While entry the bill details, give option to select company name and then customer and order should be selected. You need to put condition that when company is selected as others then bill no and bill date is non mandatory', 1, '2018-05-11', 1, '2018-05-26 17:11:39', '2018-05-26', '0000-00-00', 0),
(23, 1, 3, 'Payment add option, need option of discount which is minus and total amount to be received should be less then discounted amount', 1, '2018-05-11', 1, '2018-05-26 17:13:57', '2018-05-26', '0000-00-00', 0),
(24, 16, 12, 'New design provide client', 0, '2018-05-15', 1, '2018-05-08 10:42:21', '0000-00-00', '0000-00-00', 0),
(25, 1, 3, 'Payment list, show bill no also and filter option of company is needed. Export option of complete data is to be provided.', 1, '2018-05-11', 1, '2018-05-11 09:52:16', '2018-05-11', '0000-00-00', 0),
(26, 16, 13, 'Feedback from client and changes ', 0, '2018-05-17', 1, '2018-05-08 10:46:42', '0000-00-00', '0000-00-00', 0),
(27, 1, 14, 'Pending from client side', 0, '2018-05-12', 1, '2018-05-08 10:48:08', '0000-00-00', '0000-00-00', 0),
(28, 1, 15, 'Software implement ', 0, '2018-05-12', 1, '2018-05-08 10:50:48', '0000-00-00', '0000-00-00', 0),
(29, 16, 16, 'Changes suggest by Subhangi Mam', 0, '2018-05-12', 1, '2018-05-08 10:52:52', '0000-00-00', '0000-00-00', 0),
(30, 1, 22, 'Website to be review', 1, '2018-05-12', 1, '2018-05-15 09:18:52', '2018-05-15', '0000-00-00', 0),
(31, 7, 9, 'Enter company voucher, add new field selling rate/mrp ', 0, '2018-05-19', 1, '2018-05-08 11:17:25', '0000-00-00', '0000-00-00', 0),
(32, 7, 9, 'in all voucher add & view option company name is not appering in header', 0, '2018-05-19', 1, '2018-05-08 11:18:48', '0000-00-00', '0000-00-00', 0),
(33, 22, 3, 'Ordrr, Job card and Challan should be linked internally. When any change is made in order, it should reflect in Job Card and Challan if alreadt created or new one.', 1, '2018-05-11', 1, '2018-05-11 11:27:57', '2018-05-11', '0000-00-00', 0),
(34, 1, 3, 'Order Details - Approved or Processed? what does it means. Need to be clear or rename it.', 1, '2018-05-11', 1, '2018-05-10 06:11:34', '2018-05-10', '0000-00-00', 0),
(35, 1, 3, 'Payment Mode - Add Online and when online is selected, mentioned account no', 1, '2018-05-11', 1, '2018-05-11 11:07:51', '2018-05-11', '0000-00-00', 0),
(36, 1, 3, 'Generate Bill and Add Payment option to be merged.', 1, '2018-05-11', 1, '2018-05-26 17:12:06', '2018-05-26', '0000-00-00', 0),
(37, 1, 3, 'Outstanding amount report, show payment mode Cash/Cheque column, bill no, amount and due amount with total outstanding payment.', 1, '2018-05-11', 1, '2018-05-10 06:38:59', '2018-05-10', '0000-00-00', 0),
(38, 1, 3, 'Order creation should be linked with credit limit of customer, if customer due is more then the credit given, new order can''t be punch. In that case admin needs to increase the credit limit of customer to book his order.', 1, '2018-05-11', 1, '2018-05-26 17:13:32', '2018-05-26', '0000-00-00', 0),
(39, 1, 3, 'Outstanding Report, Filter option of Company Name, Order No and Customer Name is needed.', 1, '2018-05-11', 1, '2018-05-10 05:47:55', '2018-05-10', '0000-00-00', 0),
(40, 1, 3, 'Challan list, Job card no is not needed, remove the column. New field to be added which is Receiver Name and Mobile No ( Dispatch Details )', 1, '2018-05-11', 1, '2018-05-26 17:13:21', '2018-05-26', '0000-00-00', 0),
(41, 1, 3, 'Challan view, remove detail section which appears at bottom. Add Authorized Signatory at Right Bottom Corner and Receiver Signatory at Left Bottom Corner.', 1, '2018-05-11', 1, '2018-05-10 09:27:41', '2018-05-10', '0000-00-00', 0),
(42, 1, 3, 'Challan View, Header should come with Company Name, Address and No. In Plezer, no should come 0294-2485784 and Choudhary Offset no should come 9828538861 with their respective websites.', 1, '2018-05-11', 1, '2018-05-10 09:52:06', '2018-05-10', '0000-00-00', 0),
(43, 1, 3, 'Create separate login for Hansraj Ji, Mukesh Ji and Lakshmi Mam and deactive users admin so that report can be justified.', 1, '2018-05-11', 1, '2018-05-26 17:13:06', '2018-05-26', '0000-00-00', 0),
(44, 1, 3, 'Login/Session report to be generated for evey user. Admin needs a report where he can check you is currently login and through which IP address.', 1, '2018-05-11', 1, '2018-05-26 17:12:49', '2018-05-26', '0000-00-00', 0),
(45, 1, 3, 'Order view, Job Card no and Challan no should be visible here.', 1, '2018-05-11', 1, '2018-05-26 17:12:33', '2018-05-26', '0000-00-00', 0),
(46, 1, 3, 'New report needed of mismatch of Order and Job card. Discuss with AS.', 0, '2018-05-11', 1, '2018-05-09 02:58:38', '0000-00-00', '0000-00-00', 0),
(47, 1, 3, 'New field to add in customer master, Opening Balance in CR or DR and it should be linked with payment option and outstanding report', 1, '2018-05-11', 1, '2018-05-11 09:31:09', '2018-05-11', '0000-00-00', 0),
(48, 1, 3, 'Separate report is needed of Total Outstanding payment. Need data of every customer you have paid or unpaid amount completely.', 0, '2018-05-11', 1, '2018-05-09 03:00:38', '0000-00-00', '0000-00-00', 0),
(49, 1, 3, 'Order Cancel, reason should also be visible with new column name.', 1, '2018-05-11', 1, '2018-05-10 04:45:51', '2018-05-10', '0000-00-00', 0),
(50, 1, 3, 'Software name to be changed to Printing Solutions or something else.', 1, '2018-05-11', 1, '2018-05-10 04:23:04', '2018-05-10', '0000-00-00', 0),
(51, 1, 3, 'New Module - Stock Module, Invoice Generation, SMS/Printing Module', 0, '2018-05-11', 1, '2018-05-09 03:03:05', '0000-00-00', '0000-00-00', 0),
(52, 5, 25, 'Duplicate entries are coming in cities, countries and states in promotions view setion', 1, '2018-05-14', 1, '2018-05-14 09:28:11', '2018-05-14', '0000-00-00', 0),
(53, 5, 25, 'In portal, load button on package promotions screen - size to be increase with red color', 1, '2018-05-14', 1, '2018-05-14 09:28:16', '2018-05-14', '0000-00-00', 0),
(54, 5, 25, 'In portal, user dashboard design to be changed as discuss with the client', 1, '2018-05-14', 1, '2018-05-14 09:28:24', '2018-05-14', '0000-00-00', 0),
(55, 5, 25, 'All promotions edit and delete option is needed.', 1, '2018-05-14', 1, '2018-05-19 11:12:44', '2018-05-19', '0000-00-00', 0),
(56, 5, 25, 'Posted and Expiry date is to be given in admin portal on promotions view screen.', 1, '2018-05-14', 1, '2018-05-14 12:14:58', '2018-05-14', '0000-00-00', 0),
(57, 5, 25, 'Admin can block any user, after that user should not able to signin even after he try to forgot passoword. When user try to signin display a message that '' You are block by the administrator. Contact customer care of Travel B2B Hub''', 1, '2018-05-14', 1, '2018-05-15 06:55:09', '2018-05-15', '0000-00-00', 0),
(58, 5, 25, 'When admin renew any package for user, do not redirect him to payment gateway.', 1, '2018-05-14', 1, '2018-05-15 04:53:26', '2018-05-15', '0000-00-00', 0),
(59, 1, 23, 'Discuss and create database for CMS with the help of shalendra nagori sir.', 0, '2018-05-09', 1, '2018-05-09 05:15:11', '0000-00-00', '0000-00-00', 0),
(60, 5, 25, 'Drop of all Master of Phase-2 front end is needed on admin portal.', 1, '2018-05-14', 1, '2018-05-17 17:49:16', '2018-05-17', '0000-00-00', 0),
(61, 5, 25, 'Filter option is needed in users profile and view section, in excel download give all the fields which we are capturing at time of registration. Edit option is also need along with block any user.', 1, '2018-05-14', 1, '2018-05-15 08:46:43', '2018-05-15', '0000-00-00', 0),
(62, 5, 25, 'When any user is block, put validation on button of load and view promotions, Place request, Respond to request and My Responses.', 1, '2018-05-14', 1, '2018-05-15 09:02:10', '2018-05-15', '0000-00-00', 0),
(63, 5, 25, 'Membership - Remove add option and In view option remove delete option as none of membership plan can be deleted.', 1, '2018-05-14', 1, '2018-05-15 09:13:27', '2018-05-15', '0000-00-00', 0),
(64, 5, 25, 'Testimonial menu to be rename to Review/Rating, under review/rating menu Author to be rename as Reviewer, User as Username and Comment,', 1, '2018-05-14', 1, '2018-05-15 09:22:30', '2018-05-15', '0000-00-00', 0),
(65, 5, 25, 'Request Report, created on to be rename, Start Date and End Date of promotion is needed. When any promotion date is expiry so it should display expiry instead of open.', 1, '2018-05-14', 1, '2018-05-16 11:03:59', '2018-05-16', '0000-00-00', 0),
(66, 5, 25, 'In responses report, reference id field column to be added.', 1, '2018-05-14', 1, '2018-05-15 09:34:17', '2018-05-15', '0000-00-00', 0),
(67, 5, 25, 'Request, Detail view edit option is needed. To be discuss with client.', 1, '2018-05-14', 1, '2018-05-17 17:49:24', '2018-05-17', '0000-00-00', 0),
(68, 5, 25, 'Statistics of Phase-1 to be designed as the mail sent by client. Discuss with AS before implementation.', 1, '2018-05-16', 1, '2018-05-26 11:31:20', '2018-05-26', '0000-00-00', 0),
(69, 5, 25, 'In app, primary mobile no should be read only. Non editable.', 0, '2018-05-14', 1, '2018-05-14 09:27:38', '0000-00-00', '0000-00-00', 0),
(70, 5, 25, 'Text to be improved in promotions '' Are you sure you want to delete this promotion''.', 0, '2018-05-14', 1, '2018-05-14 09:27:38', '0000-00-00', '0000-00-00', 0),
(71, 5, 25, 'When we search any hotel through search bar in promotions, duplicate entry come. Client has already discuss this issue with PV.', 0, '2018-05-14', 1, '2018-05-14 09:27:38', '0000-00-00', '0000-00-00', 0),
(72, 5, 25, 'Load package, arrow in drop down is not workin. It doesn''t open when we click on arrow.', 0, '2018-05-14', 1, '2018-05-14 09:27:38', '0000-00-00', '0000-00-00', 0),
(73, 5, 25, 'Taxi promotiins, arrow of drop down is not working when we click on it.', 0, '2018-05-14', 1, '2018-05-19 11:17:19', '2018-05-19', '0000-00-00', 0),
(74, 5, 25, 'Reports needed in excel with filter option of state, country, city and other relevant filters.', 1, '2018-05-16', 1, '2018-05-18 11:57:28', '2018-05-18', '0000-00-00', 0),
(75, 5, 25, 'New Task - Statistics of Phase-2 to be discuss with client, Payment Gateway Integration, Documentation, Process flow diagram, Favicon icon and basic SEO of website to be done.', 0, '2018-05-16', 1, '2018-05-14 09:27:38', '0000-00-00', '0000-00-00', 0),
(76, 1, 24, 'completed task list api for user and admin', 1, '2018-05-09', 1, '2018-05-09 10:55:29', '2018-05-09', '0000-00-00', 0),
(77, 1, 3, 'single bill creat of multiple orders', 1, '2018-05-13', 1, '2018-05-11 11:34:14', '2018-05-11', '0000-00-00', 0),
(78, 1, 3, 'remove contact person name required from customer ', 0, '2018-05-11', 1, '2018-05-09 10:10:54', '0000-00-00', '0000-00-00', 0),
(79, 10, 24, 'Client registration form to be developed on portal with edit option.', 0, '2018-05-12', 1, '2018-05-09 10:25:26', '0000-00-00', '0000-00-00', 0),
(80, 18, 24, 'New row to be added on top of project which will display Deadline - Date | Expected Closure - Date', 1, '2018-05-12', 1, '2018-05-15 09:40:43', '2018-05-15', '0000-00-00', 0),
(81, 10, 24, 'Task should be visible in ascending order date wise, so that first task completion appears on top.', 0, '2018-05-12', 1, '2018-05-09 10:29:22', '0000-00-00', '0000-00-00', 0),
(82, 1, 24, 'While adding project, when we select team member, it should default select POC name.', 1, '2018-05-12', 1, '2018-05-10 13:30:43', '2018-05-10', '0000-00-00', 0),
(83, 1, 24, 'Admin home screen should have all project list with search option', 0, '2018-05-12', 1, '2018-05-09 10:31:46', '0000-00-00', '0000-00-00', 0),
(84, 1, 24, 'Project list should be filter by date wise in ascending order.', 0, '2018-05-12', 1, '2018-05-09 10:44:14', '0000-00-00', '0000-00-00', 0),
(85, 1, 24, 'Chat option should have track of all actioned performed against that project.', 0, '2018-05-16', 1, '2018-05-09 10:45:12', '0000-00-00', '0000-00-00', 0),
(86, 1, 24, 'Project title right side show Team Member name to whom it is assigned and at left show 2 dates top will be deadline and bottom will be expected closure date', 0, '2018-05-12', 1, '2018-05-09 10:46:21', '0000-00-00', '0000-00-00', 0),
(87, 1, 24, 'Notification should to all team members on every action.', 0, '2018-05-16', 1, '2018-05-09 10:48:30', '0000-00-00', '0000-00-00', 0),
(88, 1, 24, 'While creating task, admin or user can select multiple team members. In this multiple task will be created in backend.', 1, '2018-05-16', 1, '2018-05-11 10:12:34', '2018-05-11', '0000-00-00', 0),
(89, 1, 24, 'edit project api from admin login ', 1, '2018-05-09', 1, '2018-05-09 10:59:26', '2018-05-09', '0000-00-00', 0),
(90, 1, 24, 'edit task api from admin login', 1, '2018-05-09', 1, '2018-05-09 10:59:22', '2018-05-09', '0000-00-00', 0),
(91, 5, 25, 'When admin change any date of project, ask him new date and reason to change.', 1, '2018-05-16', 1, '2018-05-18 13:31:43', '2018-05-18', '0000-00-00', 0),
(92, 1, 4, 'Mobile Task', 0, '2018-05-20', 1, '2018-06-04 06:41:46', '2018-05-18', '0000-00-00', 0),
(93, 1, 2, 'testing', 1, '2018-05-10', 1, '2018-05-15 09:50:51', '2018-05-15', '0000-00-00', 0),
(94, 1, 5, 'Testing', 0, '2018-05-13', 1, '2018-05-09 12:17:49', '0000-00-00', '0000-00-00', 0),
(95, 1, 6, 'New task PHP poets', 1, '2018-05-20', 1, '2018-05-26 17:18:01', '2018-05-26', '0000-00-00', 0),
(96, 1, 5, 'New project', 0, '2018-05-21', 1, '2018-05-21 11:01:55', '0000-00-00', '0000-00-00', 0),
(97, 1, 5, 'testing In IOS', 0, '2018-05-17', 1, '2018-05-09 13:01:27', '0000-00-00', '0000-00-00', 0),
(98, 1, 5, 'Testing', 0, '2018-05-24', 1, '2018-05-09 13:09:03', '0000-00-00', '0000-00-00', 0),
(99, 1, 5, 'Testing', 0, '2018-05-14', 1, '2018-05-09 13:09:33', '0000-00-00', '0000-00-00', 0),
(100, 1, 6, 'Testing', 1, '2018-05-17', 1, '2018-05-26 17:17:53', '2018-05-26', '0000-00-00', 0),
(101, 1, 6, 'Testing new', 1, '2018-05-26', 1, '2018-05-26 17:17:50', '2018-05-26', '0000-00-00', 0),
(105, 27, 29, 'TEST', 1, '2018-05-15', 27, '2018-05-21 11:12:53', '2018-05-21', '0000-00-00', 0),
(106, 4, 29, 'TEST', 1, '2018-05-15', 27, '2018-05-11 12:32:21', '2018-05-11', '0000-00-00', 0),
(114, 18, 32, 'Demo', 0, '2018-05-16', 1, '2018-05-15 09:37:03', '2018-05-15', '0000-00-00', 0),
(115, 19, 24, 'Testing of task to multiple user', 0, '2018-05-16', 1, '2018-05-15 05:36:27', '0000-00-00', '0000-00-00', 0),
(116, 19, 24, 'Testing of task to multiple user', 0, '2018-05-16', 1, '2018-05-15 05:36:51', '0000-00-00', '0000-00-00', 0),
(117, 19, 24, 'Testing of task to multiple user', 0, '2018-05-16', 1, '2018-05-15 05:51:47', '0000-00-00', '0000-00-00', 0),
(118, 2, 3, 'test from dsu', 1, '2018-05-15', 1, '2018-05-26 17:13:46', '2018-05-26', '0000-00-00', 0),
(119, 2, 3, 'test from dsu', 1, '2018-05-15', 1, '2018-05-26 17:13:50', '2018-05-26', '0000-00-00', 0),
(120, 19, 24, 'Demo 1', 0, '2018-05-16', 1, '2018-05-15 06:18:45', '0000-00-00', '0000-00-00', 0),
(121, 18, 24, 'Demo 1', 0, '2018-05-16', 1, '2018-05-15 09:40:19', '2018-05-15', '0000-00-00', 0),
(122, 5, 24, 'Demo', 1, '2018-05-17', 5, '2018-05-15 12:19:26', '2018-05-15', '0000-00-00', 0),
(123, 27, 29, 'testing', 0, '2018-05-04', 27, '2018-05-15 12:30:00', '0000-00-00', '0000-00-00', 0),
(124, 19, 32, 'Check task edit functionality', 0, '2018-05-16', 1, '2018-05-15 13:40:42', '0000-00-00', '0000-00-00', 0),
(125, 18, 32, 'Check task edit functionality', 0, '2018-05-16', 1, '2018-05-15 13:40:43', '0000-00-00', '0000-00-00', 0),
(126, 5, 25, 'Setup of cronjob on portal and app when sending push notifications.', 1, '2018-05-18', 5, '2018-05-18 07:32:31', '2018-05-18', '0000-00-00', 0),
(127, 5, 25, 'Removed +91 from mobile no and secondary mobile no  in travelb2b server db  ', 1, '2018-05-18', 5, '2018-05-18 08:13:41', '2018-05-18', '0000-00-00', 0),
(128, 5, 35, 'Test', 0, '2018-05-21', 5, '2018-05-18 13:16:01', '0000-00-00', '0000-00-00', 0),
(129, 5, 25, 'Change my response api. For response not showing on app', 1, '2018-05-19', 5, '2018-05-19 11:13:40', '2018-05-19', '0000-00-00', 0),
(130, 5, 25, 'Dashboard counter api change as my response according count', 1, '2018-05-19', 5, '2018-05-19 11:14:39', '2018-05-19', '0000-00-00', 0),
(131, 5, 25, 'Dashboard counter api change as my response according count', 1, '2018-05-19', 5, '2018-05-19 11:14:34', '2018-05-19', '0000-00-00', 0),
(132, 5, 25, 'Change background image on portal live system because some of phone not looking good.', 1, '2018-05-19', 5, '2018-05-19 11:16:20', '2018-05-19', '0000-00-00', 0),
(133, 5, 25, 'Change background image on portal live system because some of phone not looking good.', 1, '2018-05-19', 5, '2018-05-19 11:16:12', '2018-05-19', '0000-00-00', 0),
(134, 5, 25, 'Change background image on portal live system because some of phone not looking good.', 1, '2018-05-19', 5, '2018-05-19 11:15:44', '2018-05-19', '0000-00-00', 0),
(135, 5, 25, 'Change background image on portal live system because some of phone not looking good.', 1, '2018-05-19', 5, '2018-05-19 11:15:57', '2018-05-19', '0000-00-00', 0),
(136, 5, 25, 'Change dashboard counter api.', 1, '2018-05-19', 5, '2018-05-19 11:31:50', '2018-05-19', '0000-00-00', 0),
(137, 5, 25, 'Background Image of live server changes', 1, '2018-05-19', 5, '2018-05-19 11:31:52', '2018-05-19', '0000-00-00', 0),
(138, 5, 25, 'resolved edit Promotion issue and deployed', 1, '2018-05-19', 5, '2018-05-19 11:32:12', '2018-05-19', '0000-00-00', 0),
(145, 5, 25, 'test from dsu', 1, '2018-05-15', 1, '2018-05-26 11:28:32', '2018-05-26', '0000-00-00', 0),
(146, 5, 25, 'test from dsu', 1, '2018-05-15', 5, '2018-05-26 11:28:29', '2018-05-26', '0000-00-00', 0),
(147, 27, 29, 'testing', 0, '2018-05-27', 27, '2018-05-19 12:21:54', '0000-00-00', '0000-00-00', 0),
(148, 27, 29, 'testing', 0, '2018-05-27', 27, '2018-05-19 12:22:17', '0000-00-00', '0000-00-00', 0),
(149, 27, 29, 'testing', 0, '2018-05-27', 27, '2018-05-19 12:24:09', '0000-00-00', '0000-00-00', 0),
(150, 11, 23, 'Create Daily task page and save it to db properly.', 1, '2018-05-19', 11, '2018-05-19 12:50:25', '2018-05-19', '0000-00-00', 0),
(151, 11, 23, 'Create work assign page and its view.', 1, '2018-05-19', 11, '2018-05-19 12:50:28', '2018-05-19', '0000-00-00', 0),
(152, 11, 23, 'Create work assign page and its view.', 1, '2018-05-19', 11, '2018-05-19 12:50:28', '2018-05-19', '0000-00-00', 0),
(153, 11, 23, 'Create pull task page (index page) .', 1, '2018-05-19', 11, '2018-05-19 12:50:36', '2018-05-19', '0000-00-00', 0),
(154, 11, 23, 'Create pull task page (index page) .', 1, '2018-05-19', 11, '2018-05-19 12:50:34', '2018-05-19', '0000-00-00', 0),
(155, 11, 23, 'Create pull task page (index page) .', 1, '2018-05-19', 11, '2018-05-19 12:50:32', '2018-05-19', '0000-00-00', 0),
(156, 20, 25, 'Edit profile issue resolve, disable the fields which are mentioned by the client', 1, '2018-05-19', 20, '2018-05-20 14:42:10', '2018-05-20', '0000-00-00', 0),
(157, 5, 25, 'Mobile no added in user list filter option', 1, '2018-05-21', 5, '2018-05-26 11:28:50', '2018-05-26', '0000-00-00', 0),
(158, 5, 25, 'Mobile no added in user list filter option', 1, '2018-05-21', 5, '2018-05-26 11:28:04', '2018-05-26', '0000-00-00', 0),
(159, 5, 25, 'Date posted wise filter added in all filters', 1, '2018-05-23', 5, '2018-05-26 11:28:04', '2018-05-26', '0000-00-00', 0),
(160, 5, 25, 'Date posted wise filter added in all filters', 1, '2018-05-23', 5, '2018-05-26 11:28:04', '2018-05-26', '0000-00-00', 0),
(161, 5, 25, 'Date posted wise filter added in all filters', 1, '2018-05-23', 5, '2018-05-26 11:28:03', '2018-05-26', '0000-00-00', 0),
(162, 5, 25, 'Date expired filter in all promotions', 1, '2018-05-23', 5, '2018-05-26 11:28:03', '2018-05-26', '0000-00-00', 0),
(163, 5, 25, 'Date expired filter in all promotions', 1, '2018-05-23', 5, '2018-05-26 11:28:03', '2018-05-26', '0000-00-00', 0),
(164, 5, 25, 'Date expired filter in all promotions', 1, '2018-05-23', 5, '2018-05-26 11:28:02', '2018-05-26', '0000-00-00', 0),
(165, 5, 25, 'Date expired filter in all promotions', 1, '2018-05-23', 5, '2018-05-26 11:28:02', '2018-05-26', '0000-00-00', 0),
(166, 27, 29, 'testing', 1, '2018-05-04', 27, '2018-05-21 11:13:15', '2018-05-21', '0000-00-00', 0),
(167, 27, 29, 'testing', 1, '2018-05-04', 27, '2018-05-21 11:13:04', '2018-05-21', '0000-00-00', 0),
(168, 18, 35, 'Demo1', 0, '2018-05-22', 18, '2018-05-21 07:09:02', '0000-00-00', '0000-00-00', 0),
(169, 27, 29, 'testing', 0, '2018-05-04', 27, '2018-05-21 11:18:49', '0000-00-00', '0000-00-00', 0),
(170, 11, 23, 'Create new view page for master item, category, customers and supplier.', 1, '2018-05-22', 11, '2018-05-22 10:40:08', '2018-05-22', '0000-00-00', 0),
(171, 11, 23, 'Search functionality for all these pages in goft invoice software mavli.', 1, '2018-05-22', 11, '2018-05-22 10:40:13', '2018-05-22', '0000-00-00', 0),
(172, 11, 23, 'Search functionality for all these pages in goft invoice software mavli.', 1, '2018-05-22', 11, '2018-05-22 10:40:10', '2018-05-22', '0000-00-00', 0),
(173, 11, 23, 'Add row concept with new manner in CRM  for client register page.', 1, '2018-05-22', 11, '2018-05-22 10:40:20', '2018-05-22', '0000-00-00', 0),
(174, 11, 23, 'Add row concept with new manner in CRM  for client register page.', 1, '2018-05-22', 11, '2018-05-23 12:49:58', '2018-05-23', '0000-00-00', 0),
(175, 11, 23, 'Add row concept with new manner in CRM  for client register page.', 1, '2018-05-22', 11, '2018-05-23 12:50:03', '2018-05-23', '0000-00-00', 0),
(176, 11, 23, 'Create dashboard with new layout and functionalities.', 1, '2018-05-22', 11, '2018-05-23 12:50:05', '2018-05-23', '0000-00-00', 0),
(177, 11, 23, 'Make ready for testing with ankit sir after completing all task.', 1, '2018-05-21', 11, '2018-05-22 10:42:23', '2018-05-22', '0000-00-00', 0),
(178, 11, 23, 'Make ready for testing with ankit sir after completing all task.', 1, '2018-05-21', 11, '2018-05-22 10:42:26', '2018-05-22', '0000-00-00', 0),
(179, 20, 25, 'Bug fixes in travel b2bHub', 1, '2018-05-22', 20, '2018-05-22 15:38:37', '2018-05-22', '0000-00-00', 0),
(180, 11, 23, 'Make new dashboard for all activities like assign , reassign and complete task.', 1, '2018-05-23', 11, '2018-05-23 12:52:52', '2018-05-23', '0000-00-00', 0),
(181, 11, 23, 'Change all modal with new layout design.', 1, '2018-05-23', 11, '2018-05-23 12:52:54', '2018-05-23', '0000-00-00', 0),
(182, 20, 25, 'App crashes resolved', 1, '2018-05-23', 20, '2018-05-23 17:06:30', '2018-05-23', '0000-00-00', 0),
(183, 20, 25, 'Logout user from app when admin block him and show popup when login again', 1, '2018-05-24', 20, '2018-05-24 14:18:05', '2018-05-24', '0000-00-00', 0),
(184, 20, 25, 'Redirection to reports page from Renew promotions notification ', 1, '2018-05-24', 20, '2018-05-24 14:18:11', '2018-05-24', '0000-00-00', 0),
(185, 20, 25, 'Redirection to reports page from Renew promotions notification ', 1, '2018-05-24', 20, '2018-05-25 16:40:20', '2018-05-25', '0000-00-00', 0),
(186, 20, 25, 'Crash fixing', 1, '2018-05-24', 20, '2018-05-25 16:40:25', '2018-05-25', '0000-00-00', 0),
(187, 11, 23, 'Create drag and drop for image upload in crm.', 1, '2018-05-24', 11, '2018-05-24 12:58:01', '2018-05-24', '0000-00-00', 0),
(188, 11, 23, 'Change layout for setup meenu pages.', 1, '2018-05-24', 11, '2018-05-24 12:58:04', '2018-05-24', '0000-00-00', 0),
(189, 11, 23, 'Change layout for setup meenu pages.', 1, '2018-05-24', 11, '2018-05-24 12:58:06', '2018-05-24', '0000-00-00', 0),
(190, 11, 23, 'Create task dashboad with multiple assign reassign and complete.', 1, '2018-05-25', 11, '2018-05-25 13:21:45', '2018-05-25', '0000-00-00', 0),
(191, 11, 23, 'Drag and drop complete with zip download.', 1, '2018-05-25', 11, '2018-05-25 13:21:49', '2018-05-25', '0000-00-00', 0),
(192, 11, 23, 'Drag and drop complete with zip download.', 1, '2018-05-25', 11, '2018-05-25 13:21:44', '2018-05-25', '0000-00-00', 0),
(193, 11, 23, 'Update all service, categories, activities. Update design for all modals', 1, '2018-05-25', 11, '2018-05-25 13:23:01', '2018-05-25', '0000-00-00', 0),
(194, 11, 23, 'Update all service, categories, activities. Update design for all modals', 1, '2018-05-25', 11, '2018-05-26 14:56:24', '2018-05-26', '0000-00-00', 0),
(195, 11, 23, 'Update all service, categories, activities. Update design for all modals', 1, '2018-05-25', 11, '2018-05-26 14:57:13', '2018-05-26', '0000-00-00', 0),
(196, 20, 25, 'Start date and end date problem in package placing', 1, '2018-05-25', 20, '2018-05-26 05:15:17', '2018-05-26', '0000-00-00', 0),
(197, 20, 25, 'Start date end date in my request', 1, '2018-05-25', 20, '2018-05-28 10:48:49', '2018-05-28', '0000-00-00', 0),
(198, 20, 25, 'Start date end date in my request', 1, '2018-05-25', 20, '2018-05-26 05:15:46', '2018-05-26', '0000-00-00', 0),
(199, 20, 25, 'Renew Popup in report section', 1, '2018-05-25', 20, '2018-05-28 10:48:46', '2018-05-28', '0000-00-00', 0),
(200, 11, 23, 'Create new design index and modals. Make new report section for admin.', 1, '2018-05-26', 11, '2018-05-26 14:57:11', '2018-05-26', '0000-00-00', 0),
(201, 20, 25, 'Changes marked by prady singh', 1, '2018-05-28', 20, '2018-05-31 04:30:22', '2018-05-31', '0000-00-00', 0),
(202, 20, 25, 'Test ', 1, '2018-05-28', 20, '2018-05-28 10:51:38', '2018-05-28', '0000-00-00', 0),
(203, 20, 25, 'Test ', 1, '2018-05-28', 20, '2018-05-28 10:51:36', '2018-05-28', '0000-00-00', 0),
(204, 20, 25, 'Review popup', 1, '2018-05-28', 20, '2018-05-31 04:30:52', '2018-05-31', '0000-00-00', 0),
(205, 20, 25, 'Review popup', 1, '2018-05-28', 20, '2018-05-28 10:53:42', '2018-05-28', '0000-00-00', 0),
(206, 20, 25, 'Review popup', 1, '2018-05-28', 20, '2018-05-28 10:53:38', '2018-05-28', '0000-00-00', 0),
(207, 20, 25, 'Shshhsh', 1, '2018-05-31', 20, '2018-05-28 10:53:17', '2018-05-28', '0000-00-00', 0),
(208, 20, 25, 'Shshhsh', 1, '2018-05-31', 20, '2018-05-28 10:53:34', '2018-05-28', '0000-00-00', 0),
(209, 20, 25, 'Shshhsh', 1, '2018-05-31', 20, '2018-05-28 10:53:34', '2018-05-28', '0000-00-00', 0),
(210, 20, 25, 'Shshhsh', 1, '2018-05-31', 20, '2018-05-28 10:53:36', '2018-05-28', '0000-00-00', 0),
(211, 19, 32, 'Hello', 0, '2018-05-30', 19, '2018-05-28 10:58:43', '0000-00-00', '0000-00-00', 0),
(212, 19, 32, 'Demo', 0, '2018-05-30', 19, '2018-05-28 10:59:09', '0000-00-00', '0000-00-00', 0),
(213, 19, 32, 'Demo', 0, '2018-05-30', 19, '2018-05-28 10:59:09', '0000-00-00', '0000-00-00', 0),
(214, 19, 32, 'Hello ', 0, '2018-05-28', 1, '2018-05-28 11:03:30', '0000-00-00', '0000-00-00', 0),
(215, 18, 32, 'Hello ', 0, '2018-05-28', 1, '2018-05-28 11:03:31', '0000-00-00', '0000-00-00', 0),
(216, 19, 32, 'Jonty', 0, '2018-05-28', 1, '2018-05-28 11:07:00', '0000-00-00', '0000-00-00', 0),
(217, 19, 32, 'QWERTY', 0, '2018-05-28', 1, '2018-05-28 11:08:34', '0000-00-00', '0000-00-00', 0),
(218, 18, 32, 'Abc', 0, '2018-05-29', 1, '2018-05-28 11:13:46', '0000-00-00', '0000-00-00', 0),
(219, 11, 23, 'Create new pages for design work assign and completion. ', 1, '2018-05-28', 11, '2018-05-28 12:52:16', '2018-05-28', '0000-00-00', 0),
(220, 11, 23, 'Create admin approval page and two new tables', 1, '2018-05-28', 11, '2018-05-28 12:52:15', '2018-05-28', '0000-00-00', 0),
(221, 11, 23, 'Create admin approval page and two new tables', 1, '2018-05-28', 11, '2018-05-29 12:47:35', '2018-05-29', '0000-00-00', 0),
(222, 20, 25, 'Google analytics in app', 1, '2018-05-29', 20, '2018-05-31 04:30:57', '2018-05-31', '0000-00-00', 0),
(223, 11, 23, 'Create report section and also admin section for proper visualazation of any task. Now CRM is completed from my side.', 1, '2018-05-29', 11, '2018-05-29 12:47:33', '2018-05-29', '0000-00-00', 0),
(224, 2, 1, 'testing', 0, '2018-05-27', 1, '2018-05-30 04:49:26', '0000-00-00', '0000-00-00', 0),
(225, 5, 25, 'test', 0, '2018-06-01', 0, '2018-05-30 12:36:53', '0000-00-00', '0000-00-00', 0),
(226, 2, 1, 'testing', 0, '2018-05-27', 1, '2018-06-01 12:27:26', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `task_id`, `user_id`, `deadline`, `created_on`) VALUES
(1, 2, 6, '2018-05-31', '2018-05-12 09:01:30'),
(2, 96, 1, '2018-05-13', '2018-05-21 11:01:55'),
(3, 6, 1, '2018-05-31', '2018-05-31 06:34:26'),
(4, 17, 1, '2018-05-18', '2018-05-31 06:36:38'),
(5, 1, 1, '2018-05-11', '2018-06-04 06:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'Username',
  `password` text NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `master_role_id` int(11) NOT NULL COMMENT '1 for Admin, 0 for Users',
  `mobile_otp` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `is_deleted` int(11) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile_no`, `date_of_birth`, `address`, `master_role_id`, `mobile_otp`, `details`, `is_deleted`) VALUES
(1, 'Ankit Sisodiya', 'ankit@phppoets.com', '$2y$10$m0To2tdxmYkQsp5XCrZXD.c/FWslRF.l1F1uetrqRCnYJZwOEX57O', '9549993335', '2000-05-01', 'UdaipurSa', 1, '0', 'dasasdsAS', 0),
(5, 'Dashrath Menaria', 'dashrath@phppoets.in', '$2y$10$m0To2tdxmYkQsp5XCrZXD.c/FWslRF.l1F1uetrqRCnYJZwOEX57O', '9680747166', '2018-05-08', 'V/p Menaria Tehsil -Vallabh Nagar, Udaipur', 0, '0', '0', 0),
(6, 'Ashish Jain', 'ashish@phppoets.in', '$2y$10$PFcD9svSN6uyetx2WrE.4emAY7dQX5zX/xHGohAFGXqvJ9OqvnUde', '8058483636', '2018-05-08', 'Village Rundera, Techsil Vallab Nagar, Udaipur', 0, '0', '0', 0),
(7, 'Abhilash Lohar', 'abhilash@phppoets.in', '$2y$10$l0XVQpEWJjxcpxe3gjjLfeXmLoEu03zGsLkZUftdBIJ84vAmYsiBK', '9999999999', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(8, 'Rohit Joshi', 'rohit@phppoets.in', '$2y$10$7iOHMw0x/P6bl4us5mQXZ.9sxHRZILxHPPGr6ECJfoDKq2YyIfETa', '0', '2018-05-08', 'Udaipur', 0, '0', '0', 1),
(9, 'Priyanka Soni', 'priyanka@phppoets.in', '$2y$10$sRY0f80xiyhNYc5jEf8fKexwXvn50bh6ociqbn0lA8TpRO1Zv84/i', '0', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(10, 'Dimpal Jain', 'dimpal@phppoets.in', '$2y$10$RJJxVS84.R4V8AE0bmR8IuN2LM6VBim/zhfQTVAurWC0Mvuj7BNYq', '0', '2018-05-08', '0', 0, '0', '0', 1),
(11, 'Prakash Sharma', 'prakash@phppoets.in', '$2y$10$AMlNnbnIeqqxScoL.xq4cuXEvLZVMxO.qQz/JeTlrk4HaNvJijOUK', '0', '2018-05-08', '0', 0, '0', '0', 0),
(12, 'Gopesh Parihar', 'gopesh@phppoets.in', '$2y$10$vQ7k.5PyOBZfKBgPcU0ipe72KdwZ3Y7G4G9lEgsaK1keqIJAfaIBW', '0', '2018-05-08', '0', 0, '0', '0', 0),
(13, 'Shailendra Nagori', 'shailendra@phppoets.in', '$2y$10$IRduM6zgXLPwC5Uk9VGQ0OvXVvLJDifJsR/4VfAtGpopIM1ghiGKm', '0', '2018-05-08', '0', 0, '0', '0', 0),
(14, 'Priyanka Jinger', 'jpriyanka@phppoets.in', '$2y$10$45QHscGg4xkcBc9RJsubCeNm.LEkyv8UZ.A9vsq.pQJDb4QiIs81m', '0', '2018-05-08', '0', 0, '0', '0', 0),
(15, 'Vivek Bhatt', 'vivek@phppoets.in', '$2y$10$P.4yG1jwPMrT4cXRn8ZYl.lokN66xHEnCDMNZf9rdtqb5IZNnBAz6', '0', '2018-05-08', '0', 0, '0', '0', 0),
(16, 'Satyapal Singh', 'satyapal@phppoets.in', '$2y$10$YFejOqPeuTciNGqENjtbd.RZYrJcwOVXVRe0w/gurydJ5jPSRXeZq', '0', '2018-05-08', '0', 0, '0', '0', 0),
(17, 'Yaswant Rao', 'yaswant@phppoets.in', '$2y$10$LalWr7Qc5z.MFiqTMbqw3uc1WMdYZuTNLLcGnn5TdUK8xd4WhjYge', '0', '2018-05-08', '0', 0, '0', '0', 0),
(18, 'Sonali Vijayvergia', 'sonali@phppoets.in', '$2y$10$FrMRORzX/6B5CXds5HK9UueI2pF2QIOjy3IagmGBtLg0n5oTUfHbi', '0', '2018-05-08', '0', 0, '0', '0', 0),
(19, 'Vaibhav Purohit', 'vaibhav@phppoets.in', '$2y$10$BILKaPsQUIL4Gw10N.O3ye0HA4AjBciXjkbhMhPIvt70TaJaV4mEW', '0', '2018-05-08', '0', 0, '0', '0', 0),
(20, 'Chandmal Dhakar', 'cm@phppoets.in', '$2y$10$irgmYjyzsuw62Tij9a555u7tdXCKsJdIExkH/DQyJC2pv6YEoLiia', '0', '2018-05-08', '0', 0, '0', '0', 0),
(21, 'Prashant Verma', 'prashant@phppoets.in', '$2y$10$RqZZB5bLMM1XhAOMKXk.rupQ4fKDimuRpxBrAUrrnowCXhjIEvCP6', '0', '2018-05-08', '0', 0, '0', '0', 0),
(22, 'Manoj Tanwar', 'manoj@phppoets.in', '$2y$10$sXlui5HqUF5GR3p5baISIuJmewFNQvLrz8mPNIp6Ua5N5k7wYxZce', '0', '2018-05-08', '0', 0, '0', '0', 0),
(23, 'Gopal Patel', 'gopal@phppoets.in', '$2y$10$AYAr6PZwidd0TyerajoK0.2kJAXtLWKDMpF8OiVZYUI7hOIclCSjy', '0', '2018-05-08', '0', 0, '0', '0', 0),
(24, 'Rahul Chittora', 'rahul@phppoets.in', '$2y$10$waF8S7IOHEVKW7mMHbKJ7.rVe7MY1qL1M1QVNJaYmaFNTBCqGnEgm', '0', '2018-05-08', '0', 0, '0', '0', 0),
(25, 'Meenakshi ', 'meenakshi@phppoets.in', '$2y$10$0NiMGuT7Z..XkdYDPtoBFu.OY1yZrIHwvuqB20wUggbdPiZXTIq9e', '0', '2018-05-08', '0', 0, '0', '0', 1),
(26, 'Priyanka Chaplot', 'cpriyanka@phppoets.in', '$2y$10$VCt9aHzzkxqm5wM/8VmALu6yaARRQNx8uZSY8qSg5K9KfGDd4Iop2', '0', '2018-05-08', '0', 0, '0', '0', 1),
(27, 'Anil Pahadiya', 'anil@phppoets.in', '$2y$10$ujH4vFBRvx5lkw7hjgWFlOS1xH2nu69Hu3swa7chs3ADouyKwmL76', '0', '2018-05-10', '0', 0, '0', '0', 0),
(28, 'Dsu Menaria', 'dasumenaria@gmail.com', '$2y$10$qledTtaJcQfzPQOwAsJ2hubFMmzcMaiVAg.LBngnvzn6bDZqs9otC', '9680747161', '0000-00-00', 'v/p menaria teh vallabhnager  udaipur', 0, '', 'no', 0),
(29, 'Dashrath Menaria', 'dasumenariaa@gmail.com', '$2y$10$B84MQ2Uz7W4yh28vPd1Dt.PtX6QbhtvLy4.VuwgFj7Pb4e27/kfcC', '9680741111', '2018-05-15', 'v/p menaria teh vallabhnager  udaipur', 0, '', 'no', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_versions`
--
ALTER TABLE `api_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_visites`
--
ALTER TABLE `client_visites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_clients`
--
ALTER TABLE `master_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_client_pocs`
--
ALTER TABLE `master_client_pocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_roles`
--
ALTER TABLE `master_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_statuses`
--
ALTER TABLE `project_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
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
-- AUTO_INCREMENT for table `api_versions`
--
ALTER TABLE `api_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `client_visites`
--
ALTER TABLE `client_visites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_clients`
--
ALTER TABLE `master_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_client_pocs`
--
ALTER TABLE `master_client_pocs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `master_roles`
--
ALTER TABLE `master_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `project_statuses`
--
ALTER TABLE `project_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
