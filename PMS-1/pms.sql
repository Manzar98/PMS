-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2012 at 12:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ascii_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `ascii_name`) VALUES
(1, 'Abbottabad', 'abbottabad'),
(2, 'Mansehra', 'mansehra'),
(3, 'Haripur', 'haripur'),
(4, 'Battagram', 'battagram'),
(5, 'Kohistan', 'kohistan'),
(73, 'Tor Ghar', 'tor-ghar'),
(74, 'New Karachi', 'new-karachi');

-- --------------------------------------------------------

--
-- Table structure for table `family_history`
--

CREATE TABLE IF NOT EXISTS `family_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `siblings` text NOT NULL,
  `spouse` text NOT NULL,
  `offspring` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `family_history`
--

INSERT INTO `family_history` (`id`, `patient_id`, `father`, `mother`, `siblings`, `spouse`, `offspring`) VALUES
(1, 3, '1', '2', '3', '4', '5'),
(2, 7, '11', '12', '13', '14', '15'),
(3, 38, 'Had an asthama disease', 'has blood pressure and sugar', 'Sciolosis', 'Allergies', 'Infection');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `consultation_fee` int(11) NOT NULL DEFAULT '0',
  `tests_fee` int(11) NOT NULL DEFAULT '0',
  `misc_fee` int(11) NOT NULL DEFAULT '0',
  `fee_paid` int(11) NOT NULL DEFAULT '0',
  `created_on` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fee`
--


-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE IF NOT EXISTS `instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) NOT NULL,
  `instruction` text NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `medicine_id`, `instruction`, `created_on`) VALUES
(1, 1, 'Take after meal 2+2+2', '2012-05-07 00:35:25'),
(3, 1, 'Custom', '2012-05-19 23:51:58'),
(4, 1, 'Custom', '2012-05-19 23:52:46'),
(5, 3, 'meri marzi222', '2012-05-19 23:52:56'),
(6, 2, 'meri marzi', '2012-05-19 23:53:17'),
(7, 2, 'meri marzi', '2012-05-19 23:53:39'),
(8, 2, 'kjkjhj', '2012-05-19 23:54:56'),
(9, 2, 'kjhj', '2012-05-20 00:00:00'),
(10, 2, 'kjjkj', '2012-05-20 00:03:09'),
(11, 2, 'this is custom', '2012-05-20 00:06:14'),
(12, 2, 'klkklkl', '2012-05-20 00:07:35'),
(13, 2, 'klkklkl', '2012-05-20 00:07:36'),
(14, 2, 'klkklkl', '2012-05-20 00:07:37'),
(15, 2, 'klkklkl', '2012-05-20 00:07:37'),
(16, 2, 'klkklkl', '2012-05-20 00:07:38'),
(17, 2, 'klkklkl', '2012-05-20 00:07:38'),
(18, 2, 'klkklkl', '2012-05-20 00:07:39'),
(19, 2, 'klkklkl', '2012-05-20 00:07:39'),
(20, 2, 'klkklkl', '2012-05-20 00:07:39'),
(21, 2, 'klkklkl', '2012-05-20 00:07:39'),
(22, 2, 'klkklkl', '2012-05-20 00:07:57'),
(23, 2, 'asdasdas', '2012-05-20 00:09:27'),
(24, 2, 'lkklklkl', '2012-05-20 00:10:22'),
(25, 2, 'lkklklkl', '2012-05-20 00:10:28'),
(26, 2, 'lkklklkl', '2012-05-20 00:10:31'),
(27, 1, 'lkklklkl', '2012-05-20 09:52:53'),
(28, 1, 'lkklklkl', '2012-05-20 09:52:54'),
(29, 1, '50', '2012-05-20 11:05:06'),
(30, 1, '50', '2012-05-20 11:05:13'),
(31, 1, 'Latest Instruction', '2012-05-20 11:21:00'),
(32, 1, 'new new new', '2012-05-20 11:22:23'),
(33, 1, 'New ins', '2012-05-20 11:49:55'),
(34, 1, '123', '2012-05-20 14:41:41'),
(39, 1, 'New Instruction', '2012-06-02 18:51:04'),
(40, 2, 'New Instruction', '2012-06-02 18:51:14'),
(41, 2, 'before meal 2 2 2', '2012-06-07 22:22:35'),
(42, 1, 'when pain', '2012-06-07 22:23:02'),
(43, 1, 'Take before meal 2 2 2', '2012-06-08 00:30:08'),
(44, 2, 'Take before meal 2 2 2', '2012-06-08 00:30:27'),
(46, 2, 'Latest Instruction', '2012-06-10 12:07:24'),
(47, 2, 'Take meal after medicine', '2012-06-22 21:33:36'),
(48, 1, 'new', '2012-06-22 21:36:06'),
(49, 2, 'klklklkl', '2012-06-22 23:28:11'),
(50, 1, 'nwerwer', '2012-06-23 00:14:36'),
(51, 1, 'this is the custom long instruction for this medicine', '2012-06-23 00:15:09'),
(52, 1, 'This is a custom instruction, and this is a long one', '2012-06-23 09:28:00'),
(53, 2, 'klkl', '2012-06-23 15:11:23'),
(54, 2, '1 1 1', '2012-06-24 00:47:18'),
(55, 3, 'Daily Before Meal', '2012-06-24 00:47:31'),
(56, 1, 'After Meal when having pain', '2012-06-24 00:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `lifestyle`
--

CREATE TABLE IF NOT EXISTS `lifestyle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `tabacco` tinyint(1) NOT NULL DEFAULT '0',
  `coffee` tinyint(1) NOT NULL DEFAULT '0',
  `alcohol` tinyint(1) NOT NULL DEFAULT '0',
  `recreational_drugs` tinyint(1) NOT NULL DEFAULT '0',
  `counseling` tinyint(1) NOT NULL DEFAULT '0',
  `exercise_patterns` tinyint(1) NOT NULL DEFAULT '0',
  `hazardous_activities` tinyint(1) NOT NULL DEFAULT '0',
  `sleep_patterns` tinyint(1) NOT NULL DEFAULT '0',
  `seatbelt_use` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lifestyle`
--

INSERT INTO `lifestyle` (`id`, `patient_id`, `tabacco`, `coffee`, `alcohol`, `recreational_drugs`, `counseling`, `exercise_patterns`, `hazardous_activities`, `sleep_patterns`, `seatbelt_use`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 7, 0, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 38, 1, 1, 0, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `link_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `links`
--


-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID of the Medicine',
  `name` varchar(100) NOT NULL,
  `formula` varchar(100) NOT NULL,
  `dose` varchar(100) NOT NULL COMMENT 'Dose of Medicine (e.g 4mg, 6ml)',
  `type` varchar(100) NOT NULL COMMENT 'Type of Medicine (Tab, Cap, Inj)',
  `company` varchar(100) NOT NULL COMMENT 'Medicine''s Company name',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `formula`, `dose`, `type`, `company`, `created_on`) VALUES
(1, 'Panadol', 'Paracetamol', '500mg', 'Tablet', 'Abbott', '2012-04-30 19:10:53'),
(2, 'Augmentin', 'Amoxolin', '300mg', 'Tablet', 'GSK', '2012-05-03 21:20:00'),
(3, 'Ciprox', 'Ciprofloxacin', '500mg', 'Tablet', 'Abbott', '2012-06-23 10:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `other_history`
--

CREATE TABLE IF NOT EXISTS `other_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `field1` varchar(100) NOT NULL,
  `value1` text NOT NULL,
  `field2` varchar(100) NOT NULL,
  `value2` text NOT NULL,
  `additional_history` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `other_history`
--

INSERT INTO `other_history` (`id`, `patient_id`, `field1`, `value1`, `field2`, `value2`, `additional_history`) VALUES
(1, 7, '11', '12', '13', '14', '15'),
(2, 38, 'Old Pain', 'Yes he had old pain', 'severe pain', 'yes patient having severe pain', 'Additional diagnoses as patella lose proble.');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `has_form` enum('0','1') NOT NULL,
  `form_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Patient''s ID',
  `phone` varchar(20) NOT NULL COMMENT 'Home Phone of the Patient',
  `mobile` varchar(20) NOT NULL COMMENT 'Mobile Number of the Patient',
  `name` varchar(100) NOT NULL COMMENT 'Patient Name',
  `gender` varchar(50) NOT NULL COMMENT 'Gender of the Patient',
  `address` varchar(300) NOT NULL COMMENT 'Address of the Patient',
  `city_id` int(11) NOT NULL COMMENT 'ID of the City',
  `dob` date NOT NULL COMMENT 'Patient''s Date of Birth',
  `blood_group` varchar(50) NOT NULL COMMENT 'Blood Group of the Patient',
  `marital_status` varchar(100) NOT NULL COMMENT 'Patient''s Marital Status',
  `occupation` varchar(100) NOT NULL,
  `field1` varchar(100) NOT NULL,
  `value1` text NOT NULL,
  `field2` varchar(100) NOT NULL,
  `value2` text NOT NULL,
  `created_on` datetime NOT NULL COMMENT 'Date When Patient Added',
  `updated_on` datetime NOT NULL COMMENT 'Date when patient details updated',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `phone`, `mobile`, `name`, `gender`, `address`, `city_id`, `dob`, `blood_group`, `marital_status`, `occupation`, `field1`, `value1`, `field2`, `value2`, `created_on`, `updated_on`) VALUES
(2, '0992504247', '03445600020', 'Patient Name with id 2', 'male', '', 2, '0000-00-00', 'b+', 'married', '', '', '', '', '', '2012-04-11 21:29:59', '0000-00-00 00:00:00'),
(3, '', '', 'Patient Name', 'male', '', 2, '0000-00-00', 'b+', 'married', '', '', '', '', '', '2012-04-11 21:31:35', '0000-00-00 00:00:00'),
(4, '', '', 'Patient Name', 'male', '', 2, '0000-00-00', 'b+', 'married', '', '', '', '', '', '2012-04-11 21:31:36', '0000-00-00 00:00:00'),
(5, '', '', 'Patient Name', 'male', '', 2, '0000-00-00', 'b+', 'married', '', '', '', '', '', '2012-04-11 21:31:38', '0000-00-00 00:00:00'),
(6, '0992381658', '03445600020', 'Shoaib iqbal', 'female', 'ddddaddress address address address address address address address', 2, '0000-00-00', 'b+', 'married', 'Software Developer', '', '', '', '', '2012-04-11 21:33:29', '2012-04-13 12:10:34'),
(7, '923335486236', '923335486236', 'Shoaib Iqbal', 'male', 'address', 1, '2012-04-02', 'b+', 'married', 'Software Engineer', 'Field11', 'Value11', 'Field22', 'Value22', '2012-04-16 20:01:17', '2012-04-16 20:04:36'),
(8, '923335486236', '923335486236', 'Shoaib Iqbal', 'male', '', 1, '2012-05-10', 'b+', 'married', '', 'Shoaib iqbal', '', '', '', '2012-05-03 21:17:50', '0000-00-00 00:00:00'),
(9, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:28', '0000-00-00 00:00:00'),
(10, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:30', '0000-00-00 00:00:00'),
(11, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:32', '0000-00-00 00:00:00'),
(12, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:32', '0000-00-00 00:00:00'),
(13, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:33', '0000-00-00 00:00:00'),
(14, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:50:33', '0000-00-00 00:00:00'),
(15, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:52:44', '0000-00-00 00:00:00'),
(16, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:52:45', '0000-00-00 00:00:00'),
(17, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:52:46', '0000-00-00 00:00:00'),
(18, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:52:47', '0000-00-00 00:00:00'),
(19, '', '', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:52:48', '0000-00-00 00:00:00'),
(20, '', '', 'Shoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:55:20', '0000-00-00 00:00:00'),
(21, '', '', 'Shoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:55:22', '0000-00-00 00:00:00'),
(22, '', '', 'shoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:55:48', '0000-00-00 00:00:00'),
(23, '', '', 'Shoaib Iqbal', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:56:34', '0000-00-00 00:00:00'),
(24, '', '', 'shoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 12:58:42', '0000-00-00 00:00:00'),
(25, '', '', 'Shoaib Iqbal', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:02:28', '0000-00-00 00:00:00'),
(26, '', '', 'askdkl', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:15:45', '0000-00-00 00:00:00'),
(27, '', '', 'ssdf', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:18:15', '0000-00-00 00:00:00'),
(28, '', '', 'ssdf', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:19:08', '0000-00-00 00:00:00'),
(29, '', '', 'name', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:20:44', '0000-00-00 00:00:00'),
(30, '', '', 'ssdf', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:23:24', '0000-00-00 00:00:00'),
(31, '', '', 'skljkljkl', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:25:48', '0000-00-00 00:00:00'),
(32, '', '445445', 'skljkljkl', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:26:08', '0000-00-00 00:00:00'),
(33, '', '445445', 'skljkljkl', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:26:20', '0000-00-00 00:00:00'),
(34, '', '0300050202', 'Shoaib Iqbal', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:27:17', '0000-00-00 00:00:00'),
(35, '', '23423423', 'SHoaib', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 13:28:12', '0000-00-00 00:00:00'),
(36, '', '03008117700', 'Waqas Tanoli', '', '', 1, '0000-00-00', '', '', '', '', '', '', '', '2012-06-02 18:49:49', '0000-00-00 00:00:00'),
(37, '0992992992', '03445600020', 'Shoaib iqbal', 'male', 'Sir Syed Colony, Mandian, Abbottabad, Pakistan', 1, '1987-10-21', 'b-', 'married', 'Web Developer', '', '', '', '', '2012-06-24 00:36:52', '2012-06-26 20:48:11'),
(38, '099299299', '03445600020', 'Shoaib Iqbal', 'male', 'Mandian Abbottabad', 1, '1987-10-21', 'b-', 'married', 'Web Developer', 'Old patient', 'Yes', 'Long Term Treatment', 'Yes', '2012-06-30 21:46:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `complain` varchar(1000) DEFAULT NULL,
  `complain_detail` text NOT NULL,
  `next_plan` text NOT NULL,
  `next_date` datetime NOT NULL,
  `fee_received` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `description`, `complain`, `complain_detail`, `next_plan`, `next_date`, `fee_received`, `created_on`, `updated_on`) VALUES
(8, 5, 'desc', 'Headache', 'headache details', 'next plan', '2012-06-14 00:00:00', 0, '2012-06-08 00:31:43', '2012-06-08 00:31:43'),
(9, 25, 'desc', 'Headache', 'complain detail', 'next plan', '2012-06-14 00:00:00', 0, '2012-06-08 08:02:47', '2012-06-08 08:02:47'),
(10, 6, 'description', 'Headache', 'headache detail', 'next plan', '2012-06-14 00:00:00', 0, '2012-06-10 08:42:02', '2012-06-10 08:42:02'),
(11, 6, 'description', 'Headache', 'headache detail', 'next plan', '2012-06-14 00:00:00', 0, '2012-06-10 08:44:42', '2012-06-10 08:44:42'),
(12, 6, 'description', 'Headache', 'headache detail', 'next plan', '2012-06-14 00:00:00', 0, '2012-06-10 08:54:41', '2012-06-10 08:54:41'),
(13, 6, 'This is a description for the prescription, it may contain right to left language', 'Headache', 'Half headache after having a meal', 'On Next Visit, Please bring all your documents', '2012-06-06 00:00:00', 0, '2012-06-23 09:30:39', '2012-06-23 09:30:39'),
(14, 6, 'This is a description for the prescription, it may contain right to left language', 'Headache', 'Half headache after having a meal', 'On Next Visit, Please bring all your documents', '2012-06-06 00:00:00', 0, '2012-06-23 09:31:52', '2012-06-23 09:31:52'),
(15, 37, 'The patient is getting huge pain in his abdominal area from last night, the patient was shifted to DHQ from where he was shifted to Ayub Medical College and now he is now improving.', 'Abdominal pain', 'Having severe kind of pain at lower abdominal area.', 'Please bring all documents/X-rays.', '2012-06-30 00:00:00', 0, '2012-06-24 00:51:12', '2012-06-24 00:51:12'),
(16, 37, 'desc', 'Headache', 'pain', 'next_plan', '2012-06-18 00:00:00', 0, '2012-06-24 10:58:36', '2012-06-24 10:58:36'),
(17, 37, 'desc', 'Headache', 'pain', 'next_plan', '2012-06-18 00:00:00', 0, '2012-06-24 10:59:03', '2012-06-24 10:59:03'),
(18, 17, '12212', '12', '12', '12', '2012-08-04 00:00:00', 200, '2012-08-04 17:17:08', '2012-08-04 17:17:08'),
(19, 17, '12212', '12', '12', '12', '2012-08-04 00:00:00', 200, '2012-08-04 17:17:14', '2012-08-04 17:17:14'),
(20, 17, '12212', '12', '12', '12', '2012-08-04 00:00:00', 200, '2012-08-04 17:17:34', '2012-08-04 17:17:34'),
(21, 17, '12212', '12', '12', '12', '2012-08-04 00:00:00', 200, '2012-08-04 17:20:10', '2012-08-04 17:20:10'),
(22, 17, '12212', '12', '12', '12', '2012-08-04 00:00:00', 200, '2012-08-04 17:20:14', '2012-08-04 17:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_instructions`
--

CREATE TABLE IF NOT EXISTS `prescription_instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `instruction_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `prescription_instructions`
--

INSERT INTO `prescription_instructions` (`id`, `prescription_id`, `instruction_id`) VALUES
(2, 4, 11),
(4, 4, 11),
(5, 7, 1),
(6, 7, 41),
(7, 7, 42),
(11, 9, 1),
(12, 9, 44),
(13, 9, 42),
(14, 11, 1),
(15, 11, 41),
(16, 11, 43),
(17, 12, 1),
(18, 12, 41),
(19, 12, 43),
(20, 13, 6),
(21, 13, 1),
(22, 13, 52),
(23, 14, 6),
(24, 14, 1),
(25, 14, 52),
(26, 15, 54),
(27, 15, 55),
(28, 15, 56),
(29, 16, 11),
(30, 16, 11),
(31, 16, 11),
(32, 17, 11),
(33, 17, 11),
(34, 17, 11);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tests`
--

CREATE TABLE IF NOT EXISTS `prescription_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prescription_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `prescription_tests`
--

INSERT INTO `prescription_tests` (`id`, `prescription_id`, `option_id`, `result`) VALUES
(2, 9, 6, '100'),
(3, 12, 7, '50'),
(4, 12, 6, '20'),
(5, 12, 8, '30'),
(6, 12, 9, '40'),
(7, 13, 7, '50'),
(8, 13, 6, '500'),
(9, 13, 8, '100'),
(10, 14, 7, '50'),
(11, 14, 6, '500'),
(12, 14, 8, '100'),
(13, 15, 7, '100'),
(14, 15, 6, '50'),
(15, 15, 8, '50'),
(16, 15, 9, '50'),
(17, 16, 7, '50'),
(18, 17, 7, '50');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE IF NOT EXISTS `relatives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `cancer` int(11) NOT NULL,
  `diabetes` int(11) NOT NULL,
  `epilepsy` int(11) NOT NULL,
  `heart` int(11) NOT NULL,
  `high_blood_pressure` int(11) NOT NULL,
  `mental_illness` int(11) NOT NULL,
  `stroke` int(11) NOT NULL,
  `suicide` int(11) NOT NULL,
  `tuberculosis` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `patient_id`, `cancer`, `diabetes`, `epilepsy`, `heart`, `high_blood_pressure`, `mental_illness`, `stroke`, `suicide`, `tuberculosis`) VALUES
(1, 7, 10, 2, 3, 5, 8, 9, 8, 9, 2),
(2, 3, 1, 2, 3, 4, 5, 6, 7, 8, 9),
(3, 38, 1, 2, 0, 1, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `data_type` varchar(255) DEFAULT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `input_options` text,
  `validation` text,
  `value` longtext,
  `ordering` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `category_id`, `name`, `title`, `description`, `data_type`, `input_type`, `input_options`, `validation`, `value`, `ordering`) VALUES
(1, 1, 'site_name', 'Clinic Name', 'Name of Clinic/Hospital', NULL, NULL, NULL, NULL, 'PMS', 1),
(8, 1, 'pagination', 'Pagination', NULL, 'integer', NULL, NULL, 'not_empty', '20', 5),
(6, 2, 'default_fee', 'Default Fee', 'Default Fee in Your Currency', 'integer', NULL, NULL, 'not_empty', '400', 1),
(7, 2, 'fee_display', 'Display fee on print', 'Default settings to print fee.', 'boolean', 'radiobutton', 'no|yes', NULL, '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings_categories`
--

CREATE TABLE IF NOT EXISTS `settings_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `var_name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings_categories`
--

INSERT INTO `settings_categories` (`id`, `name`, `var_name`, `description`) VALUES
(1, 'Main Settings', 'main', 'The main settings for your Website. This includes settings such as site name, meta-tags etc.'),
(2, 'Fee Settings', 'fee-settings', 'Settings related to fee');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Test Name',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `created_on`) VALUES
(3, 'Urine Test', '2012-05-06 20:12:47'),
(4, 'White Blood Test', '2012-05-06 20:12:57'),
(5, 'new test', '2012-05-16 08:56:31'),
(6, 'New Test', '2012-06-02 18:45:50'),
(7, 'new test', '2012-06-23 11:02:24'),
(8, 'new new new', '2012-06-23 11:03:47'),
(9, 'new new new', '2012-06-23 11:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `test_options`
--

CREATE TABLE IF NOT EXISTS `test_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'Test Field Name',
  `measurement` varchar(100) NOT NULL COMMENT 'Measurement of the Test Field e.g %, mg/hg',
  `normal_range` varchar(500) NOT NULL COMMENT 'Normal range of test field',
  `test_id` int(11) NOT NULL COMMENT 'Test ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `test_options`
--

INSERT INTO `test_options` (`id`, `name`, `measurement`, `normal_range`, `test_id`) VALUES
(6, 'White Blood Cells', '%', '25-100', 3),
(7, 'Red Blood Cells', '%', '25-100', 3),
(8, 'Red Blood Cells', '%', '25-100', 5),
(9, 'White Blood Cells', '%', '25-100', 5);
