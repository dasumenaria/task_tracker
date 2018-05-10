-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2018 at 04:49 AM
-- Server version: 5.6.32-78.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwstxav_task`
--

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
(1, 1, 1, '', '2018-06-08', '2018-06-09', 'Family function\n', 0, '', '2018-05-08 10:13:27', 0, 0),
(2, 1, 1, '', '2018-07-08', '2018-07-09', 'Appointment to Doctor ', 0, '', '2018-05-08 10:25:02', 0, 0),
(3, 1, 3, '', '2018-02-08', '2018-08-08', 'Reason', 0, '', '2018-05-08 13:01:18', 0, 0),
(4, 1, 1, '', '2018-05-09', '2018-05-09', 'Not well', 0, '', '2018-05-09 07:00:48', 0, 0),
(5, 11, 1, '', '2018-05-10', '2018-05-12', 'i have to go home for dividation of properties b/w families.\ni have to arrange and club all members for this purpose within these 2 days so i would like to inform you please grant me leave for these days.\ni am sure i will complete Offserve CMS task before 20th may 2018.\nThanks', 0, '', '2018-05-10 01:55:13', 0, 0);

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
(1, 'CBA School', 'RAJSAMAND', 'Rajsamanad Rajasthan', '2018-05-04 05:16:25', 0, '0000-00-00 00:00:00', 0, 0),
(2, 'St. Xavier School', 'PALI', 'Pali Rajasthan', '2018-05-04 05:18:06', 0, '0000-00-00 00:00:00', 0, 0);

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
(1, 1, 'Darshan JI', 'Darshan@123.com', '', '', '9999999999', '2018-05-04 05:16:25', 0, 0),
(2, 1, 'Gopal sir', 'Gopal@123.com', '', '', '99999999999', '2018-05-04 05:16:25', 0, 0),
(3, 2, 'Ramesh sir', 'Ramesh@123.com', '', '', '9999999999', '2018-05-04 05:18:06', 0, 0),
(4, 2, 'Piyush sir', 'Piyush@123.com', '', '', '99999999999', '2018-05-04 05:18:06', 0, 0);

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
(1, 1, 1, 'Website: Wonder Cricket Academy', '2018-05-25', 0, '0000-00-00', 16, '2018-05-08 09:49:32', '0000-00-00 00:00:00', 0, 0),
(2, 1, 1, 'Fees: St.Xaviers, Pali-Branch', '2018-05-31', 0, '0000-00-00', 1, '2018-05-08 09:59:53', '0000-00-00 00:00:00', 0, 0),
(3, 1, 1, 'Choudhary Offset', '2018-05-11', 0, '0000-00-00', 22, '2018-05-08 10:01:56', '0000-00-00 00:00:00', 0, 0),
(4, 2, 1, 'Fees: St.Xaviers, Udaipur-Baranch', '2018-05-31', 0, '0000-00-00', 1, '2018-05-08 10:03:27', '0000-00-00 00:00:00', 0, 0),
(5, 1, 1, 'Fees: Alok Panchwati ', '2018-05-31', 0, '0000-00-00', 1, '2018-05-08 10:08:27', '0000-00-00 00:00:00', 0, 0),
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
(27, 1, 1, 'Management Function APP', '2018-05-21', 0, '0000-00-00', 1, '2018-05-09 09:14:09', '0000-00-00 00:00:00', 0, 0);

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
(1, 1, 17),
(2, 1, 16),
(3, 2, 26),
(4, 2, 6),
(5, 3, 22),
(6, 4, 26),
(7, 4, 6),
(8, 5, 6),
(9, 6, 10),
(10, 7, 5),
(11, 8, 5),
(12, 9, 7),
(13, 9, 10),
(14, 9, 23),
(15, 10, 16),
(16, 11, 10),
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
(38, 25, 20);

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
(1, 1, 1, 'Collection of data such as content of pages and images', 0, '2018-05-11', 1, '2018-05-08 10:37:23', '2018-05-08', '0000-00-00', 0),
(2, 6, 2, 'Expense module', 0, '2018-05-31', 1, '2018-05-08 10:01:25', '0000-00-00', '0000-00-00', 0),
(3, 1, 3, 'Export option needed in all reports', 0, '2018-05-11', 1, '2018-05-08 10:02:51', '0000-00-00', '0000-00-00', 0),
(4, 1, 3, 'In Order, When we add new item from plus sign then item added in the drop down list but it changed name of item of all other rows which is already selected. Logically it should only add in the current row of item.', 1, '2018-05-11', 1, '2018-05-09 11:05:00', '2018-05-09', '0000-00-00', 0),
(5, 1, 3, 'In order form, Operator name can be multiple as for one order multiple operator can work', 1, '2018-05-11', 1, '2018-05-09 12:38:22', '2018-05-09', '0000-00-00', 0),
(6, 6, 4, 'Fy 2017-2018 closing balance not  carry forward in next fy 2018-2019', 0, '2018-05-31', 1, '2018-05-08 10:06:08', '0000-00-00', '0000-00-00', 0),
(7, 6, 4, 'Expense modules', 0, '2018-05-31', 1, '2018-05-08 10:06:34', '0000-00-00', '0000-00-00', 0),
(8, 1, 3, 'In spent items, filter option is needed at top of Customer Name, Order Name and Date Range', 1, '2018-05-11', 1, '2018-05-09 12:56:56', '2018-05-09', '0000-00-00', 0),
(9, 6, 5, 'Printing issue need to be reslove', 0, '2018-05-31', 1, '2018-05-08 10:11:43', '0000-00-00', '0000-00-00', 0),
(10, 10, 6, 'Software made by Pooja & Dimpal not merge ', 1, '2018-05-18', 1, '2018-05-08 10:17:34', '2018-05-08', '0000-00-00', 0),
(11, 5, 7, 'SMS not working ', 1, '2018-05-09', 1, '2018-05-09 10:53:47', '2018-05-09', '0000-00-00', 0),
(12, 5, 8, 'Email functionality on duty slip not working ', 0, '2018-05-12', 1, '2018-05-08 10:21:00', '0000-00-00', '0000-00-00', 0),
(13, 7, 9, 'Improvement in design', 0, '2018-05-19', 1, '2018-05-08 10:25:26', '0000-00-00', '0000-00-00', 0),
(14, 7, 9, 'Sales return club in sales invoice', 0, '2018-05-19', 1, '2018-05-08 10:27:09', '0000-00-00', '0000-00-00', 0),
(15, 1, 9, 'Discussion pending with client', 0, '2018-05-19', 1, '2018-05-08 10:27:52', '0000-00-00', '0000-00-00', 0),
(16, 1, 3, 'In Order Report, remove Operator Name and Job card creation name column.', 1, '2018-05-11', 1, '2018-05-09 12:58:13', '2018-05-09', '0000-00-00', 0),
(17, 10, 6, 'Software merge made by Pooja & Dimpal  ', 0, '2018-05-18', 1, '2018-05-08 10:29:12', '0000-00-00', '0000-00-00', 0),
(18, 1, 3, 'In outstanding payment report, amount is coming with comma , which is to be removed', 0, '2018-05-11', 1, '2018-05-08 10:32:11', '0000-00-00', '0000-00-00', 0),
(19, 16, 10, 'Updates on page as per client ', 0, '2018-05-11', 1, '2018-05-08 10:33:24', '0000-00-00', '0000-00-00', 0),
(20, 1, 3, 'Payment Generation and Bill entry, show total amount of order in non editable format', 1, '2018-05-11', 1, '2018-05-10 04:18:31', '2018-05-10', '0000-00-00', 0),
(21, 10, 11, 'Update on pages', 0, '2018-05-30', 1, '2018-05-08 10:38:33', '0000-00-00', '0000-00-00', 0),
(22, 1, 3, 'While entry the bill details, give option to select company name and then customer and order should be selected. You need to put condition that when company is selected as others then bill no and bill date is non mandatory', 0, '2018-05-11', 1, '2018-05-08 10:39:53', '0000-00-00', '0000-00-00', 0),
(23, 1, 3, 'Payment add option, need option of discount whih is minus and total amount to be received should be less then discounted amount', 0, '2018-05-11', 1, '2018-05-08 10:42:01', '0000-00-00', '0000-00-00', 0),
(24, 16, 12, 'New design provide client', 0, '2018-05-15', 1, '2018-05-08 10:42:21', '0000-00-00', '0000-00-00', 0),
(25, 1, 3, 'Payment list, show bill no also and filter option of company is needed. Export option of complete data is to be provided.', 0, '2018-05-11', 1, '2018-05-08 10:43:05', '0000-00-00', '0000-00-00', 0),
(26, 16, 13, 'Feedback from client and changes ', 0, '2018-05-17', 1, '2018-05-08 10:46:42', '0000-00-00', '0000-00-00', 0),
(27, 1, 14, 'Pending from client side', 0, '2018-05-12', 1, '2018-05-08 10:48:08', '0000-00-00', '0000-00-00', 0),
(28, 1, 15, 'Software implement ', 0, '2018-05-12', 1, '2018-05-08 10:50:48', '0000-00-00', '0000-00-00', 0),
(29, 16, 16, 'Changes suggest by Subhangi Mam', 0, '2018-05-12', 1, '2018-05-08 10:52:52', '0000-00-00', '0000-00-00', 0),
(30, 1, 22, 'Website to be review', 0, '2018-05-12', 1, '2018-05-08 11:08:17', '0000-00-00', '0000-00-00', 0),
(31, 7, 9, 'Enter company voucher, add new field selling rate/mrp ', 0, '2018-05-19', 1, '2018-05-08 11:17:25', '0000-00-00', '0000-00-00', 0),
(32, 7, 9, 'in all voucher add & view option company name is not appering in header', 0, '2018-05-19', 1, '2018-05-08 11:18:48', '0000-00-00', '0000-00-00', 0),
(33, 22, 3, 'Ordrr, Job card and Challan should be linked internally. When any change is made in order, it should reflect in Job Card and Challan if alreadt created or new one.', 0, '2018-05-11', 1, '2018-05-08 17:49:42', '0000-00-00', '0000-00-00', 0),
(34, 1, 3, 'Order Details - Approved or Processed? what does it means. Need to be clear or rename it.', 0, '2018-05-11', 1, '2018-05-08 17:51:13', '0000-00-00', '0000-00-00', 0),
(35, 1, 3, 'Payment Mode - Add Online and when online is selected, mentioned account no', 0, '2018-05-11', 1, '2018-05-08 17:51:58', '0000-00-00', '0000-00-00', 0),
(36, 1, 3, 'Generate Bill and Add Payment option to be merged.', 0, '2018-05-11', 1, '2018-05-08 17:52:43', '0000-00-00', '0000-00-00', 0),
(37, 1, 3, 'Outstanding amount report, show payment mode Cash/Cheque column, bill no, amount and due amount with total outstanding payment.', 0, '2018-05-11', 1, '2018-05-09 02:45:03', '0000-00-00', '0000-00-00', 0),
(38, 1, 3, 'Order creation should be linked with credit limit of customer, if customer due is more then the credit given, new order can\'t be punch. In that case admin needs to increase the credit limit of customer to book his order.', 0, '2018-05-11', 1, '2018-05-09 02:46:36', '0000-00-00', '0000-00-00', 0),
(39, 1, 3, 'Outstanding Report, Filter option of Company Name, Order No and Customer Name is needed.', 0, '2018-05-11', 1, '2018-05-09 02:47:22', '0000-00-00', '0000-00-00', 0),
(40, 1, 3, 'Challan list, Job card no is not needed, remove the column. New field to be added which is Receiver Name and Mobile No ( Dispatch Details )', 0, '2018-05-11', 1, '2018-05-09 02:48:21', '0000-00-00', '0000-00-00', 0),
(41, 1, 3, 'Challan view, remove detail section which appears at bottom. Add Authorized Signatory at Right Bottom Corner and Receiver Signatory at Left Bottom Corner.', 0, '2018-05-11', 1, '2018-05-09 02:49:46', '0000-00-00', '0000-00-00', 0),
(42, 1, 3, 'Challan View, Header should come with Company Name, Address and No. In Plezer, no should come 0294-2485784 and Choudhary Offset no should come 9828538861 with their respective websites.', 0, '2018-05-11', 1, '2018-05-09 02:54:47', '0000-00-00', '0000-00-00', 0),
(43, 1, 3, 'Create separate login for Hansraj Ji, Mukesh Ji and Lakshmi Mam and deactive users admin so that report can be justified.', 0, '2018-05-11', 1, '2018-05-09 02:55:56', '0000-00-00', '0000-00-00', 0),
(44, 1, 3, 'Login/Session report to be generated for evey user. Admin needs a report where he can check you is currently login and through which IP address.', 0, '2018-05-11', 1, '2018-05-09 02:57:09', '0000-00-00', '0000-00-00', 0),
(45, 1, 3, 'Order view, Job Card no and Challan no should be visible here.', 0, '2018-05-11', 1, '2018-05-09 02:57:58', '0000-00-00', '0000-00-00', 0),
(46, 1, 3, 'New report needed of mismatch of Order and Job card. Discuss with AS.', 0, '2018-05-11', 1, '2018-05-09 02:58:38', '0000-00-00', '0000-00-00', 0),
(47, 1, 3, 'New field to add in customer master, Opening Balance in CR or DR and it should be linked with payment option and outstanding report', 0, '2018-05-11', 1, '2018-05-09 02:59:42', '0000-00-00', '0000-00-00', 0),
(48, 1, 3, 'Separate report is needed of Total Outstanding payment. Need data of every customer you have paid or unpaid amount completely.', 0, '2018-05-11', 1, '2018-05-09 03:00:38', '0000-00-00', '0000-00-00', 0),
(49, 1, 3, 'Order Cancel, reason should also be visible with new column name.', 1, '2018-05-11', 1, '2018-05-10 04:45:51', '2018-05-10', '0000-00-00', 0),
(50, 1, 3, 'Software name to be changed to Printing Solutions or something else.', 1, '2018-05-11', 1, '2018-05-10 04:23:04', '2018-05-10', '0000-00-00', 0),
(51, 1, 3, 'New Module - Stock Module, Invoice Generation, SMS/Printing Module', 0, '2018-05-11', 1, '2018-05-09 03:03:05', '0000-00-00', '0000-00-00', 0),
(52, 1, 25, 'Duplicate entries are coming in cities, countries and states in promotions view setion', 0, '2018-05-14', 1, '2018-05-09 05:09:23', '0000-00-00', '0000-00-00', 0),
(53, 1, 25, 'In portal, load button on package promotions screen - size to be increase with red color', 0, '2018-05-14', 1, '2018-05-09 05:10:22', '0000-00-00', '0000-00-00', 0),
(54, 1, 25, 'In portal, user dashboard design to be changed as discuss with the client', 0, '2018-05-14', 1, '2018-05-09 05:11:00', '0000-00-00', '0000-00-00', 0),
(55, 1, 25, 'All promotions edit and delete option is needed.', 0, '2018-05-14', 1, '2018-05-09 05:11:25', '0000-00-00', '0000-00-00', 0),
(56, 1, 25, 'Posted and Expiry date is to be given in admin portal on promotions view screen.', 0, '2018-05-14', 1, '2018-05-09 05:12:03', '0000-00-00', '0000-00-00', 0),
(57, 1, 25, 'Admin can block any user, after that user should not able to signin even after he try to forgot passoword. When user try to signin display a message that \' You are block by the administrator. Contact customer care of Travel B2B Hub\'', 0, '2018-05-14', 1, '2018-05-09 05:13:54', '0000-00-00', '0000-00-00', 0),
(58, 1, 25, 'When admin renew any package for user, do not redirect him to payment gateway.', 0, '2018-05-14', 1, '2018-05-09 05:14:55', '0000-00-00', '0000-00-00', 0),
(59, 1, 23, 'Discuss and create database for CMS with the help of shalendra nagori sir.', 0, '2018-05-09', 1, '2018-05-09 05:15:11', '0000-00-00', '0000-00-00', 0),
(60, 1, 25, 'Drop of all Master of Phase-2 front end is needed on admin portal.', 0, '2018-05-14', 1, '2018-05-09 05:15:35', '0000-00-00', '0000-00-00', 0),
(61, 1, 25, 'Filter option is needed in users profile and view section, in excel download give all the fields which we are capturing at time of registration. Edit option is also need along with block any user.', 0, '2018-05-14', 1, '2018-05-09 05:21:22', '0000-00-00', '0000-00-00', 0),
(62, 1, 25, 'When any user is block, put validation on button of load and view promotions, Place request, Respond to request and My Responses.', 0, '2018-05-14', 1, '2018-05-09 05:22:22', '0000-00-00', '0000-00-00', 0),
(63, 1, 25, 'Membership - Remove add option and In view option remove delete option as none of membership plan can be deleted.', 0, '2018-05-14', 1, '2018-05-09 05:23:23', '0000-00-00', '0000-00-00', 0),
(64, 1, 25, 'Testimonial menu to be rename to Review/Rating, under review/rating menu Author to be rename as Reviewer, User as Username and Comment,', 0, '2018-05-14', 1, '2018-05-09 05:29:34', '0000-00-00', '0000-00-00', 0),
(65, 1, 25, 'Request Report, created on to be rename, Start Date and End Date of promotion is needed. When any promotion date is expiry so it should display expiry instead of open.', 0, '2018-05-14', 1, '2018-05-09 05:31:06', '0000-00-00', '0000-00-00', 0),
(66, 1, 25, 'In responses report, reference id field column to be added.', 0, '2018-05-14', 1, '2018-05-09 05:31:52', '0000-00-00', '0000-00-00', 0),
(67, 1, 25, 'Request, Detail view edit option is needed. To be discuss with client.', 0, '2018-05-14', 1, '2018-05-09 05:32:49', '0000-00-00', '0000-00-00', 0),
(68, 1, 25, 'Statistics of Phase-1 to be designed as the mail sent by client. Discuss with AS before implementation.', 0, '2018-05-16', 1, '2018-05-09 05:34:00', '0000-00-00', '0000-00-00', 0),
(69, 1, 25, 'In app, primary mobile no should be read only. Non editable.', 0, '2018-05-14', 1, '2018-05-09 05:35:15', '0000-00-00', '0000-00-00', 0),
(70, 21, 25, 'Text to be improved in promotions \' Are you sure you want to delete this promotion\'.', 0, '2018-05-14', 1, '2018-05-09 05:36:11', '0000-00-00', '0000-00-00', 0),
(71, 1, 25, 'When we search any hotel through search bar in promotions, duplicate entry come. Client has already discuss this issue with PV.', 0, '2018-05-14', 1, '2018-05-09 05:37:07', '0000-00-00', '0000-00-00', 0),
(72, 1, 25, 'Load package, arrow in drop down is not workin. It doesn\'t open when we click on arrow.', 0, '2018-05-14', 1, '2018-05-09 05:37:47', '0000-00-00', '0000-00-00', 0),
(73, 1, 25, 'Taxi promotiins, arrow of drop down is not working when we click on it.', 0, '2018-05-14', 1, '2018-05-09 05:38:25', '0000-00-00', '0000-00-00', 0),
(74, 1, 25, 'Reports needed in excel with filter option of state, country, city and other relevant filters.', 0, '2018-05-16', 1, '2018-05-09 05:39:31', '0000-00-00', '0000-00-00', 0),
(75, 1, 25, 'New Task - Statistics of Phase-2 to be discuss with client, Payment Gateway Integration, Documentation, Process flow diagram, Favicon icon and basic SEO of website to be done.', 0, '2018-05-16', 1, '2018-05-09 05:41:04', '0000-00-00', '0000-00-00', 0),
(76, 1, 24, 'completed task list api for user and admin', 1, '2018-05-09', 1, '2018-05-09 10:55:29', '2018-05-09', '0000-00-00', 0),
(77, 1, 3, 'single bill creat of multiple orders', 0, '2018-05-13', 1, '2018-05-09 10:10:07', '0000-00-00', '0000-00-00', 0),
(78, 1, 3, 'remove contact person name required from customer ', 0, '2018-05-11', 1, '2018-05-09 10:10:54', '0000-00-00', '0000-00-00', 0),
(79, 10, 24, 'Client registration form to be developed on portal with edit option.', 0, '2018-05-12', 1, '2018-05-09 10:25:26', '0000-00-00', '0000-00-00', 0),
(80, 18, 24, 'New row to be added on top of project which will display Deadline - Date | Expected Closure - Date', 0, '2018-05-12', 1, '2018-05-09 10:28:11', '0000-00-00', '0000-00-00', 0),
(81, 10, 24, 'Task should be visible in ascending order date wise, so that first task completion appears on top.', 0, '2018-05-12', 1, '2018-05-09 10:29:22', '0000-00-00', '0000-00-00', 0),
(82, 1, 24, 'While adding project, when we select team member, it should default select POC name.', 0, '2018-05-12', 1, '2018-05-09 10:30:32', '0000-00-00', '0000-00-00', 0),
(83, 1, 24, 'Admin home screen should have all project list with search option', 0, '2018-05-12', 1, '2018-05-09 10:31:46', '0000-00-00', '0000-00-00', 0),
(84, 1, 24, 'Project list should be filter by date wise in ascending order.', 0, '2018-05-12', 1, '2018-05-09 10:44:14', '0000-00-00', '0000-00-00', 0),
(85, 1, 24, 'Chat option should have track of all actioned performed against that project.', 0, '2018-05-16', 1, '2018-05-09 10:45:12', '0000-00-00', '0000-00-00', 0),
(86, 1, 24, 'Project title right side show Team Member name to whom it is assigned and at left show 2 dates top will be deadline and bottom will be expected closure date', 0, '2018-05-12', 1, '2018-05-09 10:46:21', '0000-00-00', '0000-00-00', 0),
(87, 1, 24, 'Notification should to all team members on every action.', 0, '2018-05-16', 1, '2018-05-09 10:48:30', '0000-00-00', '0000-00-00', 0),
(88, 1, 24, 'While creating task, admin or user can select multiple team members. In this multiple task will be created in backend.', 0, '2018-05-16', 1, '2018-05-09 10:55:03', '0000-00-00', '0000-00-00', 0),
(89, 1, 24, 'edit project api from admin login ', 1, '2018-05-09', 1, '2018-05-09 10:59:26', '2018-05-09', '0000-00-00', 0),
(90, 1, 24, 'edit task api from admin login', 1, '2018-05-09', 1, '2018-05-09 10:59:22', '2018-05-09', '0000-00-00', 0),
(91, 1, 25, 'When admin change any date of project, ask him new date and reason to change.', 0, '2018-05-16', 1, '2018-05-09 11:05:39', '0000-00-00', '0000-00-00', 0),
(92, 1, 4, 'Mobile Task', 0, '2018-05-20', 1, '2018-05-09 11:52:30', '0000-00-00', '0000-00-00', 0),
(93, 1, 2, 'testing', 0, '2018-05-10', 1, '2018-05-09 11:57:44', '0000-00-00', '0000-00-00', 0),
(94, 1, 5, 'Testing', 0, '2018-05-13', 1, '2018-05-09 12:17:49', '0000-00-00', '0000-00-00', 0),
(95, 1, 6, 'New task PHP poets', 0, '2018-05-20', 1, '2018-05-09 12:59:06', '0000-00-00', '0000-00-00', 0),
(96, 1, 5, 'New project', 0, '2018-05-13', 1, '2018-05-09 13:00:59', '0000-00-00', '0000-00-00', 0),
(97, 1, 5, 'testing In IOS', 0, '2018-05-17', 1, '2018-05-09 13:01:27', '0000-00-00', '0000-00-00', 0),
(98, 1, 5, 'Testing', 0, '2018-05-24', 1, '2018-05-09 13:09:03', '0000-00-00', '0000-00-00', 0),
(99, 1, 5, 'Testing', 0, '2018-05-14', 1, '2018-05-09 13:09:33', '0000-00-00', '0000-00-00', 0),
(100, 1, 6, 'Testing', 0, '2018-05-17', 1, '2018-05-09 13:12:03', '0000-00-00', '0000-00-00', 0),
(101, 1, 6, 'Testing new', 0, '2018-05-26', 1, '2018-05-09 13:12:27', '0000-00-00', '0000-00-00', 0);

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
(1, 'Ankit SIsodiya', 'ankit@phppoets.com', '$2y$10$BadQoHwfn96ItR9WiWwpaODwhAI7rT3VoygV.fKO5ecCpN03LDJr.', '9549993335', '2000-05-04', 'Udaipur', 1, '0', '', 0),
(5, 'Dashrath Menaria', 'dashrath@phppoets.in', '$2y$10$m0To2tdxmYkQsp5XCrZXD.c/FWslRF.l1F1uetrqRCnYJZwOEX57O', '9680747166', '2018-05-08', 'v/p menaria teh vallabhnager  udaipur', 0, '0', '0', 0),
(6, 'Aashish Jain', 'ashish@phppoets.in', '$2y$10$PFcD9svSN6uyetx2WrE.4emAY7dQX5zX/xHGohAFGXqvJ9OqvnUde', '8058483636', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(7, 'Abhilash Lohar', 'abhilash@phppoets.in', '$2y$10$l0XVQpEWJjxcpxe3gjjLfeXmLoEu03zGsLkZUftdBIJ84vAmYsiBK', '0', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(8, 'Rohit Joshi', 'rohit@phppoets.in', '$2y$10$7iOHMw0x/P6bl4us5mQXZ.9sxHRZILxHPPGr6ECJfoDKq2YyIfETa', '0', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(9, 'Priyanka Soni', 'priyanka@phppoets.in', '$2y$10$sRY0f80xiyhNYc5jEf8fKexwXvn50bh6ociqbn0lA8TpRO1Zv84/i', '0', '2018-05-08', 'Udaipur', 0, '0', '0', 0),
(10, 'Dimpal Jain', 'dimpal@phppoets.in', '$2y$10$RJJxVS84.R4V8AE0bmR8IuN2LM6VBim/zhfQTVAurWC0Mvuj7BNYq', '0', '2018-05-08', '0', 0, '0', '0', 0),
(11, 'Prakash Menariya', 'prakash@phppoets.in', '$2y$10$AMlNnbnIeqqxScoL.xq4cuXEvLZVMxO.qQz/JeTlrk4HaNvJijOUK', '0', '2018-05-08', '0', 0, '0', '0', 0),
(12, 'Gopesh singh Parihar', 'gopesh@phppoets.in', '$2y$10$vQ7k.5PyOBZfKBgPcU0ipe72KdwZ3Y7G4G9lEgsaK1keqIJAfaIBW', '0', '2018-05-08', '0', 0, '0', '0', 0),
(13, 'Shailendra Nagori', 'shailendra@phppoets.in', '$2y$10$IRduM6zgXLPwC5Uk9VGQ0OvXVvLJDifJsR/4VfAtGpopIM1ghiGKm', '0', '2018-05-08', '0', 0, '0', '0', 0),
(14, 'Priyanka Jinger', 'jpriyanka@phppoets.in', '$2y$10$45QHscGg4xkcBc9RJsubCeNm.LEkyv8UZ.A9vsq.pQJDb4QiIs81m', '0', '2018-05-08', '0', 0, '0', '0', 0),
(15, 'Vivek Bhatt', 'vivek@phppoets.in', '$2y$10$P.4yG1jwPMrT4cXRn8ZYl.lokN66xHEnCDMNZf9rdtqb5IZNnBAz6', '0', '2018-05-08', '0', 0, '0', '0', 0),
(16, 'Satyapal Singh', 'satyapal@phppoets.in', '$2y$10$YFejOqPeuTciNGqENjtbd.RZYrJcwOVXVRe0w/gurydJ5jPSRXeZq', '0', '2018-05-08', '0', 0, '0', '0', 0),
(17, 'Yaswant Rao', 'yaswant@phppoets.in', '$2y$10$LalWr7Qc5z.MFiqTMbqw3uc1WMdYZuTNLLcGnn5TdUK8xd4WhjYge', '0', '2018-05-08', '0', 0, '0', '0', 0),
(18, 'Sonali Vijayvergia', 'sonali@phppoets.in', '$2y$10$FrMRORzX/6B5CXds5HK9UueI2pF2QIOjy3IagmGBtLg0n5oTUfHbi', '0', '2018-05-08', '0', 0, '0', '0', 0),
(19, 'Vaibhav Purohit', 'vaibhav@phppoets.in', '$2y$10$BILKaPsQUIL4Gw10N.O3ye0HA4AjBciXjkbhMhPIvt70TaJaV4mEW', '0', '2018-05-08', '0', 0, '0', '0', 0),
(20, 'Chand Mal Dhakar', 'cm@phppoets.in', '$2y$10$irgmYjyzsuw62Tij9a555u7tdXCKsJdIExkH/DQyJC2pv6YEoLiia', '0', '2018-05-08', '0', 0, '0', '0', 0),
(21, 'prashant verma', 'prashant@phppoets.in', '$2y$10$RqZZB5bLMM1XhAOMKXk.rupQ4fKDimuRpxBrAUrrnowCXhjIEvCP6', '0', '2018-05-08', '0', 0, '0', '0', 0),
(22, 'Manoj Tanwer', 'manoj@phppoets.in', '$2y$10$sXlui5HqUF5GR3p5baISIuJmewFNQvLrz8mPNIp6Ua5N5k7wYxZce', '0', '2018-05-08', '0', 0, '0', '0', 0),
(23, 'Goppal', 'gopal@phppoets.in', '$2y$10$AYAr6PZwidd0TyerajoK0.2kJAXtLWKDMpF8OiVZYUI7hOIclCSjy', '0', '2018-05-08', '0', 0, '0', '0', 0),
(24, 'Rahul Chittora', 'rahul@phppoets.in', '$2y$10$waF8S7IOHEVKW7mMHbKJ7.rVe7MY1qL1M1QVNJaYmaFNTBCqGnEgm', '0', '2018-05-08', '0', 0, '0', '0', 0),
(25, 'Meenakshi ', 'meenakshi@phppoets.in', '$2y$10$0NiMGuT7Z..XkdYDPtoBFu.OY1yZrIHwvuqB20wUggbdPiZXTIq9e', '0', '2018-05-08', '0', 0, '0', '0', 0),
(26, 'Priyanka Chaplot', 'cpriyanka@phppoets.in', '$2y$10$VCt9aHzzkxqm5wM/8VmALu6yaARRQNx8uZSY8qSg5K9KfGDd4Iop2', '0', '2018-05-08', '0', 0, '0', '0', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `client_visites`
--
ALTER TABLE `client_visites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_clients`
--
ALTER TABLE `master_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_client_pocs`
--
ALTER TABLE `master_client_pocs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_roles`
--
ALTER TABLE `master_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `project_statuses`
--
ALTER TABLE `project_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
