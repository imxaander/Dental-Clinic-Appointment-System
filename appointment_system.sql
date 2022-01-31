-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2022 at 06:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_Id` varchar(255) NOT NULL,
  `Patient_Id` varchar(255) NOT NULL,
  `Service` varchar(255) NOT NULL,
  `Medical_History` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appointment_Id`, `Patient_Id`, `Service`, `Medical_History`, `Time`, `Date`, `Status`, `Branch`, `Message`, `type`, `duration`) VALUES
('AP61f3895d198da', 'PT61f293954783b', 'Cleaning', 'xcxc', '11:00', '2022-01-31', 'Ongoing', 'Taguig', '', 'Onsite', ''),
('AP61f398233b24d', 'PT61f293954783b', 'Brace Metallic', '521asd2sdnf', '12:00', '2022-01-30', 'Pending', 'Taguig', '', 'Onsite', ''),
('AP61f49f83bff9e', 'PT61f293954783b', 'Root Canal', 'asdsad', '13:30', '2022-01-30', 'Pending', 'Taguig', 'asdasd', 'Onsite', '1 hour'),
('AP61f4af17c4246', 'PT61f293954783b', 'Retainer', 'Jsisis', '14:00', '2022-01-31', 'Pending', 'Taguig', 'Hsuaha', 'Onsite', '30 minutes'),
('AP61f4bb2665c4e', 'PT61f4badf81605', 'Wisdom Tooth Extraction', 'qwe', '18:30', '2022-02-16', 'Ongoing', 'Paranaque', '', 'Onsite', '2 hours'),
('AP61f4e67a7ffea', 'PT61f4badf81605', 'Brace Metallic', 'asd', '11:00', '2022-02-02', 'Ongoing', 'Paranaque', '', 'Onsite', '30 minutes'),
('AP61f62ff4c0e8f', 'PT61f4badf81605', 'Cleaning', 'none', '15:00', '2022-02-03', 'Ongoing', 'Paranaque', 'none', 'Onsite', '30 minutes');

-- --------------------------------------------------------

--
-- Table structure for table `chat_app`
--

CREATE TABLE `chat_app` (
  `message_id` varchar(255) NOT NULL,
  `chat_id` varchar(255) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `message_content` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_app`
--

INSERT INTO `chat_app` (`message_id`, `chat_id`, `author_id`, `display_name`, `message_content`, `timestamp`) VALUES
('MSG61f362f027323', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd', '1643340528'),
('MSG61f362f030c41', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n', '1643340528'),
('MSG61f362f059497', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n', '1643340528'),
('MSG61f362f07d59e', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n', '1643340528'),
('MSG61f362f11cc41', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n', '1643340529'),
('MSG61f362f243ec1', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n', '1643340530'),
('MSG61f3630eb9092', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n', '1643340558'),
('MSG61f3630fe44db', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\n', '1643340559'),
('MSG61f3631132749', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340561'),
('MSG61f3631132fd2', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340561'),
('MSG61f363122daf3', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340562'),
('MSG61f3631238b6b', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340562'),
('MSG61f363143e50b', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340564'),
('MSG61f363146f0bb', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340564'),
('MSG61f363148eb79', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340564'),
('MSG61f363159cc0f', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\nJKBAS', '1643340565'),
('MSG61f36315a1dce', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\n\nJKBAS', '1643340565'),
('MSG61f363164384d', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'knasd\n\n\n\n\n\n\n\n\nJKBAS', '1643340566'),
('MSG61f3632184693', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'HBV', '1643340577'),
('MSG61f3880179208', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hi', '1643350017'),
('MSG61f388017b5ea', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hi', '1643350017'),
('MSG61f38f9ab0f79', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', '1asd', '1643351962'),
('MSG61f38fa1362a3', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'helloo', '1643351969'),
('MSG61f4975037f94', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asdasd', '1643419472'),
('MSG61f4976cbc90a', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643419500'),
('MSG61f4978252c2b', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643419522'),
('MSG61f497aee81c6', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643419566'),
('MSG61f497b203389', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hii', '1643419570'),
('MSG61f49ef992db7', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asdasd', '1643421433'),
('MSG61f49efd96b2e', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asdlkjand', '1643421437'),
('MSG61f49fbd4ffd1', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'ill tell you what', '1643421629'),
('MSG61f49fc4f0327', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'will do they fellas goods', '1643421636'),
('MSG61f49fcb1ef10', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'ok boomer', '1643421643'),
('MSG61f4a8cd9d332', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'asd', '1643423949'),
('MSG61f4a9636cdd8', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'asdasd', '1643424099'),
('MSG61f4aef090b34', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'Jdjds\n', '1643425520'),
('MSG61f4af005e5dd', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'Hey\n', '1643425536'),
('MSG61f4c4b981c18', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643431097'),
('MSG61f4f1333db2e', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'jh', '1643442483'),
('MSG61f4f13428bdc', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'jh\n', '1643442484'),
('MSG61f4fd928d810', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'sldfsg', '1643445650'),
('MSG61f4fd9309534', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'sldfsg\n', '1643445651'),
('MSG61f4fd9336ac2', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'sldfsg\n\n', '1643445651'),
('MSG61f4fd9430530', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'z', '1643445652'),
('MSG61f5166c78ccb', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'oioi', '1643452012'),
('MSG61f6799030907', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'hey', '1643542928'),
('MSG61f6799b1ba82', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'why', '1643542939'),
('MSG61f6799f1e18a', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'oijsd', '1643542943'),
('MSG61f679a21f887', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'piojsd', '1643542946'),
('MSG61f6bdf5aa8ad', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'hello', '1643560437'),
('MSG61f6c00fab1ae', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'a', '1643560975'),
('MSG61f75e4d13180', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643601485'),
('MSG61f75e53d7341', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'asd', '1643601491'),
('MSG61f75e5682a3f', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello', '1643601494'),
('MSG61f75e5708d96', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n', '1643601495'),
('MSG61f75e5b7cbf2', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n', '1643601499'),
('MSG61f75e5b7cc1a', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n', '1643601499'),
('MSG61f75e5ca7aa2', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n', '1643601500'),
('MSG61f75e5daea24', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n', '1643601501'),
('MSG61f75e6d0a5b2', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n', '1643601517'),
('MSG61f75e6d19c23', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n', '1643601517'),
('MSG61f75e716bcfe', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n', '1643601521'),
('MSG61f75e716c4fc', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n', '1643601521'),
('MSG61f75e716c885', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n', '1643601521'),
('MSG61f75e758e955', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601525'),
('MSG61f75e7a45c02', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601530'),
('MSG61f75e7a45c43', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601530'),
('MSG61f75e7a45d6d', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601530'),
('MSG61f75e7a4a222', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601530'),
('MSG61f75e7e87947', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601534'),
('MSG61f75e7fb4676', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', '1643601535'),
('MSG61f75e80720fb', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hello\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nno hi', '1643601536'),
('MSG61f75e83c8ff9', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'not?', '1643601539'),
('MSG61f75e8659eb0', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'not?\n', '1643601542'),
('MSG61f75e88cf66f', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'anymore?', '1643601544'),
('MSG61f75e97deb03', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'so slow', '1643601559'),
('MSG61f7664706378', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'skajd', '1643603526'),
('MSG61f76bb200a96', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'Kdnb', '1643604914'),
('MSG61f76bb61bcb7', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'kasnd', '1643604918'),
('MSG61f76bd9d56dd', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'askdnasd', '1643604953'),
('MSG61f76cb26837e', 'CT61f2949056993', 'STKNM ZXNK', 'Taguig Staff', 'kasd', '1643605170'),
('MSG61f76d1a2763d', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'askdnm', '1643605274'),
('MSG61f76d1e17b36', 'CT61f4bb08c0e3e', 'ST61f4cc3e3f597', 'Paranaque Staff', 'askjdn', '1643605278'),
('MSG61f76d215fc64', 'CT61f4bb08c0e3e', 'PT61f4badf81605', 'Mario', 'this is a test message this is a test message this is a test message this is a test message this is a test message this is a test message this is a test message ', '1643605281'),
('MSG61f77ce29f3c4', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'askdnas', '1643609314'),
('MSG61f784de67aec', 'CT61f2949056993', 'PT61f293954783b', 'Xander', 'hi', '1643611358');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `first_name`, `middle_name`, `last_name`, `age`, `gender`, `address`, `contact_no`, `info`) VALUES
('GT61f516f1930d8', 'carl', 'john', 'sy', 12, 'Male', '2112dsada', '09664657408', '            Have you had any illness this past week ?\r\n\r\n            Have you had any contact with someone who was ill this past week ?\r\n\r\n            Where do you live ?\r\n\r\n            Have you travel this past few weeks ?\r\n            ');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `notif_title` varchar(255) NOT NULL,
  `notif_desc` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `viewed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif_id`, `patient_id`, `notif_title`, `notif_desc`, `time`, `date`, `viewed`) VALUES
('NT61f29494576de', 'PT61f293954783b', 'Your account has been <b>Created</b>', 'Your account has been created and ready to go! Please check your email for verification link so you can start here!', '08:48 PM', '2022-01-27', '1'),
('NT61f389736e6a6', 'PT61f293954783b', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f3895d198da)has been posted. Please wait for approval and check your messages for concern.', '02:13 PM', '2022-01-28', '1'),
('NT61f38acf1bf6e', 'PT61f293954783b', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f3895d198da)has been approved. If you have concerns or want some changes Please message us.', '02:18 PM', '2022-01-28', '1'),
('NT61f38acfeea69', 'PT61f293954783b', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f3895d198da)has been approved. If you have concerns or want some changes Please message us.', '02:18 PM', '2022-01-28', '1'),
('NT61f38adcb6de8', 'PT61f293954783b', 'Your appointment has been <b>Canceled</b>.', 'Appointment (AP61f3895d198da)has been canceled. If you have concerns please message us.', '02:19 PM', '2022-01-28', '1'),
('NT61f38adfb7aa8', 'PT61f293954783b', 'Your appointment has been <b>Canceled</b>.', 'Appointment (AP61f3895d198da)has been canceled. If you have concerns please message us.', '02:19 PM', '2022-01-28', '1'),
('NT61f38c133332e', 'PT61f293954783b', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f3895d198da)has been approved. If you have concerns or want some changes Please message us.', '02:24 PM', '2022-01-28', '1'),
('NT61f38c13ae54d', 'PT61f293954783b', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f3895d198da)has been approved. If you have concerns or want some changes Please message us.', '02:24 PM', '2022-01-28', '1'),
('NT61f38e2c72d8f', 'PT61f293954783b', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f3895d198da)has been approved. If you have concerns or want some changes Please message us.', '02:33 PM', '2022-01-28', '1'),
('NT61f398509a861', 'PT61f293954783b', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f398233b24d)has been posted. Please wait for approval and check your messages for concern.', '03:16 PM', '2022-01-28', '1'),
('NT61f49fa5a4352', 'PT61f293954783b', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f49f83bff9e)has been posted. Please wait for approval and check your messages for concern.', '10:00 AM', '2022-01-29', '1'),
('NT61f4af3e9ae35', 'PT61f293954783b', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f4af17c4246)has been posted. Please wait for approval and check your messages for concern.', '11:06 AM', '2022-01-29', '1'),
('NT61f4bb0e80bd7', 'PT61f4badf81605', 'Your account has been <b>Created</b>', 'Your account has been created and ready to go! Please check your email for verification link so you can start here!', '11:57 AM', '2022-01-29', '1'),
('NT61f4bb1b8a9d5', 'PT61f4badf81605', 'Welcome to <b>JGonzales Dental Center</b>!', 'Your account has been Verified and Welcome to JGonzales Dental Center! Please check our services here and we are grateful to have you here!', '11:57 AM', '2022-01-29', '1'),
('NT61f4bb4dcfeb5', 'PT61f4badf81605', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f4bb2665c4e)has been posted. Please wait for approval and check your messages for concern.', '11:58 AM', '2022-01-29', '1'),
('NT61f4e6b4ece41', 'PT61f4badf81605', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f4e67a7ffea)has been posted. Please wait for approval and check your messages for concern.', '03:03 PM', '2022-01-29', '1'),
('NT61f52d8abfd46', 'PT61f4badf81605', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f4bb2665c4e)has been approved. If you have concerns or want some changes Please message us.', '08:05 PM', '2022-01-29', '1'),
('NT61f52d8f03853', 'PT61f4badf81605', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f4bb2665c4e)has been approved. If you have concerns or want some changes Please message us.', '08:05 PM', '2022-01-29', '1'),
('NT61f631036aacd', 'PT61f4badf81605', 'Your appointment has been <b>Posted</b>', 'Appointment(AP61f62ff4c0e8f)has been posted. Please wait for approval and check your messages for concern.', '02:32 PM', '2022-01-30', '0'),
('NT61f65f1344900', 'PT61f4badf81605', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f4e67a7ffea)has been approved. If you have concerns or want some changes Please message us.', '05:49 PM', '2022-01-30', '0'),
('NT61f65f1ea3f5a', 'PT61f4badf81605', 'Your appointment has been <b>Approved</b>.', 'Appointment (AP61f62ff4c0e8f)has been approved. If you have concerns or want some changes Please message us.', '05:49 PM', '2022-01-30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Patient_Id` varchar(50) NOT NULL,
  `Verified` varchar(255) NOT NULL,
  `vcode` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Date_of_Birth` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Civil_Status` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `chat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Patient_Id`, `Verified`, `vcode`, `Email`, `Password`, `First_Name`, `Middle_Name`, `Last_Name`, `Age`, `Date_of_Birth`, `Gender`, `Occupation`, `Branch`, `Address`, `Civil_Status`, `Contact_No`, `Image`, `chat_id`) VALUES
('PT61f293954783b', '1', 'FOVOD', 'xander22.ison@gmail.com', 'admin', 'Xander', 'Batiles', 'Ison', '22', '2005-07-22', 'Male', 'Vendor', 'Taguig', '8280 Dr. A Santos Ave. Sucat Paranaque City', 'Single', '09668122352', 'FB_IMG_1638141354477.jpg', 'CT61f2949056993'),
('PT61f4badf81605', '1', '0', 'isonmario17@gmail.com', 'test', 'Mario', 'Batiles', 'Ison', '21', '2000-06-17', 'Male', 'wala', 'Paranaque', '8280 Dr. A Santos Ave San Isidro Parañaque City', 'Single', '09664657408', 'image_2022-01-29_115651.png', 'CT61f4bb08c0e3e');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `image1` varchar(999) NOT NULL,
  `image2` varchar(999) NOT NULL,
  `image3` varchar(999) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service`, `description`, `image1`, `image2`, `image3`, `duration`) VALUES
(1, 'Brace Removal', 'Direct-to-consumer removable braces may not provide individual care and services like you would get with a local orthodontist. ', 'brace_removal_1.png', 'brace_removal_2.png', 'brace_removal_3.png', '30 minutes'),
(2, 'Cleaning', 'Dentist aims to remove the dental plaque and tartar that have accumulated on the teeth to protect them from cavities or dental caries as well as other tooth and gum problems.', 'cleaning_1.jpg', 'cleaning_2.jpg', 'cleaning_3.jpg', '30 minutes'),
(3, 'Toot Extraction', 'Surgical extractions are performed on teeth that are either invisible or inaccessible, like un-erupted wisdom teeth. An incision is usually made in the gum tissue and a drill is used to precisely remove some of the adjacent bone tissue. Sometimes, the tooth has to be split into several pieces to completely remove it.\r\n', 'extraction_3.jpg', 'extraction_2.jpeg', 'extraction_1.jpg', '30 minutes'),
(4, 'Wisdom Tooth Extraction', 'It is a procedure wherein the dentist will remove the tooth by separating and opening the gums, sometimes there is the necessity to remove bone around the tooth. This is especially common to third molar teeth due to the fact that most of the third molars are impacted (embedded under the jaw bone).\r\n', 'wisdom_extraction_1.jpg', 'wisdom_extraction_2.jpg', 'wisdom_extraction_3.jpg', '2 hours'),
(5, 'Root Canal', 'Root canal is a treatment to repair and save a badly damaged or infected tooth instead of removing it. The term \"root canal\" comes from cleaning of the canals inside a tooth\'s root.', 'root_canal_1.jpg', 'root_canal_2.jpg', 'root_canal_3.jpg', '1 hour'),
(6, 'Retainer', 'for teeth are mostly used as the last phase of orthodontics treatment. After the braces have been removed, teeth can shift back to their original position. So, retainers worn overnight (if not longer) can help maintain the position of straightened teeth.\r\n', 'retainer_1.png', 'retainer_2.png', 'retainer_3.png', '30 minutes'),
(7, 'Brace Metallic', 'are dental tools that help correct problems with your teeth, like crowding, crooked teeth, or teeth that are out of alignment. Many people get braces when they\'re teenagers, but adults get them too. As you wear them, braces slowly straighten and align your teeth so you have a normal bite.\r\n', 'brace_metallic_1.jpg', 'brace_metallic_2.jpg', 'brace_metallic_3.jpeg', '30 minutes'),
(9, 'Teeth Restoration ', 'The procedure for a dental filling is used to repair minor fractures or decay in the teeth, as a form of restorative dental treatment. A dental filling can help to even out the surface of the tooth and improve the function of the jaw for biting and chewing\r\n', 'pasta_1.jpg', 'pasta_2.jpg', 'pasta_3.jpg', '30 minutes'),
(10, 'Fixed Bridge', 'Sometimes called a fixed partial denture, a bridge replaces missing teeth with artificial teeth and literally “bridges” the gap where one or more teeth used to be.\r\n', 'fixed_bridge_1.png', 'fixed_bridge_2.png', 'fixed_bridge_3.png', '1 hour'),
(12, 'Whitening', 'is a simple process. Whitening products contain one of two tooth bleaches (hydrogen peroxide or carbamide peroxide). These bleaches break stains into smaller pieces, which makes the color less concentrated and your teeth brighter.\r\n', 'whitening_1.png', 'whitening_2.png', 'whitening_3.png', '30 minutes'),
(13, 'Jacket teeth ', 'It\'s used as a covering over a tooth that is chipped, broken or otherwise damaged to create a permanently restored, functional and esthetic natural look to the teeth.\r\n', 'jacket_teeth_1.png', 'jacket_teeth_2.png', 'jacket_teeth_3.png', '30 minutes'),
(14, 'Ceramic braces', 'are dental tools that help correct problems with your teeth, like crowding, crooked teeth, or teeth that are out of alignment. Many people get braces when they\'re teenagers, but adults get them too. As you wear them, braces slowly straighten and align your teeth so you have a normal bite.', 'ceramic_brace_1.png', 'ceramic_brace_2.png', 'ceramic_brace_3.png', '1 hour');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `Staff_Id` varchar(50) NOT NULL,
  `Verified` varchar(255) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`Staff_Id`, `Verified`, `User_Name`, `Password`, `Branch`, `Image`) VALUES
('ST1sALLADMIN', '1', 'admin@jgonzales.com', 'admin', 'All', 'https://cdn2.iconfinder.com/data/icons/mobile-banking-ver-1a/100/1-11-512.png'),
('ST61f4cc3e3f597', '1', 'paranaqueadmin@jgonzales.com', 'admin', 'Paranaque', 'https://www.pngkit.com/png/detail/301-3011853_brue-blank-person.png'),
('ST61f4cc4f5791c', '1', 'cupangadmin@jgonzales.com', 'admin', 'Cupang', 'https://www.pngkit.com/png/detail/301-3011853_brue-blank-person.png'),
('STKNM ZXNK', '1', 'taguigadmin@jgonzales.com', 'admin', 'Taguig', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_Id`);

--
-- Indexes for table `chat_app`
--
ALTER TABLE `chat_app`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Patient_Id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`Staff_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
