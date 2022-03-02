-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 08:44 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wastemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `facilityname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `facilityname`, `location`, `email`, `contact`) VALUES
(1, 'Ronny\'s', 'San Pedro', 'ronnys@gmail.com', '09102030493');

-- --------------------------------------------------------

--
-- Table structure for table `garbagetype`
--

CREATE TABLE `garbagetype` (
  `garbage_ID` int(11) NOT NULL,
  `garbage_Name` varchar(255) NOT NULL,
  `garbage_Points` int(11) NOT NULL,
  `garbage_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garbagetype`
--

INSERT INTO `garbagetype` (`garbage_ID`, `garbage_Name`, `garbage_Points`, `garbage_Img`) VALUES
(1, 'Tire', 25, 'GarbageType-001.jpg'),
(5, 'adadad', 12315, 'GarbageType-706.png'),
(6, 'gfdgdfg', 45252, 'GarbageType-269.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `daysago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user`, `activity`, `datetime`, `daysago`) VALUES
(53, 'admin', 'Patrick : Gained 150 points', '2021-12-04 12:51:46', '2022-03-01 14:30:50'),
(54, 'admin', 'Patrick : Gained 150 points', '2021-12-04 12:51:48', '2022-03-01 14:30:50'),
(55, 'admin', 'Patrick : Gained 150 points', '2021-12-04 12:51:49', '2022-03-01 14:30:50'),
(56, 'admin', 'Johannes : Gained 150 points', '2021-12-07 15:57:34', '2022-03-01 14:30:50'),
(57, 'admin', 'James : Gained 150 points', '2021-12-07 15:57:43', '2022-03-01 14:30:50'),
(58, 'admin', 'Johnny : Gained 150 points', '2021-12-07 15:57:46', '2022-03-01 14:30:50'),
(59, 'admin', 'Johannes : Gained 150 points', '2021-12-07 15:57:48', '2022-03-01 14:30:50'),
(60, 'admin', 'Johannes : Gained 150 points', '2021-12-07 15:58:27', '2022-03-01 14:30:50'),
(61, 'admin', 'Johnny : Gained 150 points', '2021-12-07 15:58:29', '2022-03-01 14:30:50'),
(62, 'admin', 'bona : Gained 150 points', '2021-12-07 15:58:30', '2022-03-01 14:30:50'),
(63, 'admin', 'James : Gained 150 points', '2021-12-07 15:58:32', '2022-03-01 14:30:50'),
(64, 'admin', 'Patrick : Gained 150 points', '2021-12-07 15:58:33', '2022-03-01 14:30:50'),
(65, 'admin', 'Added New Profile', '2021-12-07 09:14:05', '2022-03-01 14:30:50'),
(66, 'admin', 'Bonakid : Gained 150 points', '2021-12-07 16:14:13', '2022-03-01 14:30:50'),
(67, 'admin', 'Added New Profile', '2021-12-07 09:15:09', '2022-03-01 14:30:50'),
(68, 'admin', 'Added New Profile', '2021-12-07 09:15:39', '2022-03-01 14:30:50'),
(69, 'admin', 'bro : Gained 150 points', '2021-12-08 13:54:14', '2022-03-01 14:30:50'),
(70, 'admin', 'Giga Chad : Gained 150 points', '2021-12-08 14:03:50', '2022-03-01 14:30:50'),
(71, 'admin', 'Johannes : Gained 150 points', '2021-12-08 17:27:36', '2022-03-01 14:30:50'),
(72, 'admin', 'Added New Profile', '2021-12-08 10:32:47', '2022-03-01 14:30:50'),
(73, 'admin', 'Johannes : Profile Points Restarted', '2021-12-08 17:32:57', '2022-03-01 14:30:50'),
(84, 'admins', 'Updated Profile', '2022-01-03 09:01:16', '2022-03-01 14:30:50'),
(85, 'admins', 'Updated Profile', '2022-01-03 09:01:24', '2022-03-01 14:30:50'),
(86, 'admins', 'Updated Profile', '2022-01-03 09:01:38', '2022-03-01 14:30:50'),
(87, 'admins', 'Updated Profile', '2022-01-03 09:01:57', '2022-03-01 14:30:50'),
(88, 'admin', 'Updated Prize', '2022-01-04 06:26:17', '2022-03-01 14:30:50'),
(89, 'admin', 'Updated Prize', '2022-01-04 06:26:20', '2022-03-01 14:30:50'),
(90, 'admin', 'Updated Prize', '2022-01-04 06:27:02', '2022-03-01 14:30:50'),
(91, 'admin', 'Updated Prize', '2022-01-04 06:27:09', '2022-03-01 14:30:50'),
(92, 'admin', 'Updated Prize', '2022-01-04 06:32:34', '2022-03-01 14:30:50'),
(93, 'admin', 'Updated Prize', '2022-01-04 06:32:42', '2022-03-01 14:30:50'),
(94, 'admin', 'Updated Prize', '2022-01-04 06:33:32', '2022-03-01 14:30:50'),
(95, 'admin', 'Updated Prize', '2022-01-04 06:47:09', '2022-03-01 14:30:50'),
(96, 'admin', 'Updated Prize', '2022-01-04 06:47:14', '2022-03-01 14:30:50'),
(97, 'admin', 'Updated Prize', '2022-01-04 06:47:28', '2022-03-01 14:30:50'),
(98, 'admin', 'Updated Prize', '2022-01-04 06:52:44', '2022-03-01 14:30:50'),
(99, 'admin', 'Updated Prize', '2022-01-04 08:24:17', '2022-03-01 14:30:50'),
(100, 'admin', 'Updated Prize', '2022-01-04 08:24:19', '2022-03-01 14:30:50'),
(101, 'admin', 'Updated Prize', '2022-01-04 08:24:24', '2022-03-01 14:30:50'),
(102, 'admin', 'Updated Prize', '2022-01-04 08:24:33', '2022-03-01 14:30:50'),
(103, 'admin', 'Added New Prize', '2022-01-04 08:25:35', '2022-03-01 14:30:50'),
(104, 'admin', 'Deleted Profile', '2022-01-04 08:29:17', '2022-03-01 14:30:50'),
(105, 'admin', 'Deleted Profile', '2022-01-04 08:29:44', '2022-03-01 14:30:50'),
(106, 'admin', 'Added New Prize', '2022-01-04 08:29:59', '2022-03-01 14:30:50'),
(107, 'admin', 'Updated Prize', '2022-01-04 08:30:31', '2022-03-01 14:30:50'),
(108, 'admin', 'Updated Prize', '2022-01-04 08:31:13', '2022-03-01 14:30:50'),
(109, 'admin', 'Updated Prize', '2022-01-04 08:31:22', '2022-03-01 14:30:50'),
(110, 'admin', 'Added New Prize', '2022-01-04 08:32:03', '2022-03-01 14:30:50'),
(111, 'admin', 'Deleted Profile', '2022-01-04 08:32:06', '2022-03-01 14:30:50'),
(112, 'admin', 'Added New Prize', '2022-01-04 08:32:34', '2022-03-01 14:30:50'),
(113, 'admin', 'Updated Prize', '2022-01-04 08:32:58', '2022-03-01 14:30:50'),
(114, 'admin', 'Updated Prize', '2022-01-04 10:52:39', '2022-03-01 14:30:50'),
(115, 'admin', 'Updated Prize', '2022-01-04 10:52:44', '2022-03-01 14:30:50'),
(116, 'admin', 'Updated Prize', '2022-01-04 10:52:54', '2022-03-01 14:30:50'),
(117, 'admin', 'Updated Prize', '2022-01-04 10:53:10', '2022-03-01 14:30:50'),
(118, 'admin', 'Deleted Prize', '2022-01-04 10:53:19', '2022-03-01 14:30:50'),
(119, 'admin', 'Added New Prize', '2022-01-04 10:53:37', '2022-03-01 14:30:50'),
(120, 'admin', 'Updated Profile', '2022-01-04 10:58:17', '2022-03-01 14:30:50'),
(121, 'admin', 'Updated Profile', '2022-01-04 10:58:33', '2022-03-01 14:30:50'),
(122, 'admin', 'Updated Profile', '2022-01-04 10:59:07', '2022-03-01 14:30:50'),
(123, 'admin', 'Updated Prize', '2022-01-04 14:13:55', '2022-03-01 14:30:50'),
(124, 'admin', 'Updated Profile', '2022-01-04 14:14:15', '2022-03-01 14:30:50'),
(125, 'admin', 'Johannes : Gained 150 points', '2022-01-04 21:14:39', '2022-03-01 14:30:50'),
(126, 'admin', 'Johannes : Gained 150 points', '2022-01-04 21:14:45', '2022-03-01 14:30:50'),
(127, 'admin', 'Johannes : Lost 150 points', '2022-01-04 21:18:29', '2022-03-01 14:30:50'),
(128, 'admin', 'Deleted Prize', '2022-01-07 15:05:53', '2022-03-01 14:30:50'),
(129, 'admin', 'Deleted Prize', '2022-01-07 15:05:55', '2022-03-01 14:30:50'),
(130, 'admin', 'Added New Prize', '2022-01-07 15:06:07', '2022-03-01 14:30:50'),
(131, 'admin', 'Deleted Prize', '2022-01-07 16:47:19', '2022-03-01 14:30:50'),
(132, 'admin', 'Added New Prize', '2022-01-07 16:47:37', '2022-03-01 14:30:50'),
(133, 'admin', 'Updated Prize', '2022-01-07 20:08:48', '2022-03-01 14:30:50'),
(134, 'admin', 'Updated Prize', '2022-01-07 20:08:58', '2022-03-01 14:30:50'),
(135, 'admin', 'Updated Prize', '2022-01-07 20:10:00', '2022-03-01 14:30:50'),
(136, 'admin', 'Updated Profile', '2022-01-08 03:03:18', '2022-03-01 14:30:50'),
(137, 'admin', 'Updated Profile', '2022-01-08 03:03:23', '2022-03-01 14:30:50'),
(138, 'admin', 'Updated Profile', '2022-01-08 03:04:39', '2022-03-01 14:30:50'),
(139, 'admin', 'Deleted Profile', '2022-01-08 03:04:42', '2022-03-01 14:30:50'),
(140, 'admin', 'Updated Prize', '2022-01-08 03:05:44', '2022-03-01 14:30:50'),
(141, 'admin', 'Added New Prize', '2022-01-08 03:06:13', '2022-03-01 14:30:50'),
(142, 'admin', 'Deleted Prize', '2022-01-08 03:06:21', '2022-03-01 14:30:50'),
(143, 'admin', 'Added New Prize', '2022-01-09 06:37:28', '2022-03-01 14:30:50'),
(144, 'admin', 'Deleted Prize', '2022-01-09 06:37:41', '2022-03-01 14:30:50'),
(145, 'admin', 'Updated Profile', '2022-01-19 10:52:19', '2022-03-01 14:30:50'),
(146, 'admin', 'Added New Prize', '2022-01-21 03:39:56', '2022-03-01 14:30:50'),
(147, 'admin', 'Deleted Prize', '2022-01-21 03:40:07', '2022-03-01 14:30:50'),
(148, 'admin', 'Added New News', '2022-01-21 04:04:38', '2022-03-01 14:30:50'),
(149, 'admin', 'Added New News', '2022-01-24 11:25:26', '2022-03-01 14:30:50'),
(150, 'admin', 'Added New News', '2022-01-24 23:13:44', '2022-03-01 14:30:50'),
(151, 'admin', 'Added New News', '2022-01-24 23:24:28', '2022-03-01 14:30:50'),
(152, 'admin', 'Updated Prize', '2022-01-25 08:28:29', '2022-03-01 14:30:50'),
(153, 'admin', 'Updated Prize', '2022-01-25 08:28:35', '2022-03-01 14:30:50'),
(154, 'admin', 'Deleted News', '2022-01-29 21:58:46', '2022-03-01 14:30:50'),
(155, 'admin', 'Johnn : Gained 150 points', '2022-01-30 08:54:51', '2022-03-01 14:30:50'),
(156, 'admin', 'Johnn : Gained 150 points', '2022-01-30 08:54:53', '2022-03-01 14:30:50'),
(157, 'admin', 'Johnn : Gained 150 points', '2022-01-30 08:54:55', '2022-03-01 14:30:50'),
(158, 'admin', 'Johnn : Gained 150 points', '2022-01-30 08:54:57', '2022-03-01 14:30:50'),
(159, 'admin', 'Johnn : Gained 150 points', '2022-01-30 08:54:59', '2022-03-01 14:30:50'),
(160, 'admin', 'Added New News', '2022-01-31 07:33:55', '2022-03-01 14:30:50'),
(161, 'admin', 'Updated News', '2022-02-05 20:51:45', '2022-03-01 14:30:50'),
(162, 'admin', 'Updated News', '2022-02-05 20:51:51', '2022-03-01 14:30:50'),
(163, 'admin', 'Updated News', '2022-02-05 20:52:00', '2022-03-01 14:30:50'),
(164, 'admin', 'Updated News', '2022-02-05 20:52:22', '2022-03-01 14:30:50'),
(165, 'admin', 'Updated News', '2022-02-05 20:59:51', '2022-03-01 14:30:50'),
(166, 'admin', 'Updated News', '2022-02-05 21:00:27', '2022-03-01 14:30:50'),
(167, 'admin', 'Updated News', '2022-02-05 21:01:43', '2022-03-01 14:30:50'),
(168, 'admin', 'Updated News', '2022-02-07 10:16:42', '2022-03-01 14:30:50'),
(169, 'admin', 'Updated News', '2022-02-07 10:17:26', '2022-03-01 14:30:50'),
(170, 'admin', 'Deleted Prize', '2022-02-08 06:24:35', '2022-03-01 14:30:50'),
(171, 'admin', 'Added New Prize', '2022-02-08 06:25:17', '2022-03-01 14:30:50'),
(172, 'admin', 'Updated News', '2022-02-09 19:58:18', '2022-03-01 14:30:50'),
(173, 'admin', 'Added New News', '2022-02-09 20:08:26', '2022-03-01 14:30:50'),
(174, 'admin', 'Updated News', '2022-02-09 20:13:47', '2022-03-01 14:30:50'),
(175, 'admin', 'Updated News', '2022-02-09 20:14:02', '2022-03-01 14:30:50'),
(176, 'admin', 'Updated News', '2022-02-09 20:25:13', '2022-03-01 14:30:50'),
(177, 'admin', 'Updated News', '2022-02-09 20:29:59', '2022-03-01 14:30:50'),
(178, 'admin', 'Updated News', '2022-02-09 20:30:06', '2022-03-01 14:30:50'),
(179, 'admin', 'Updated News', '2022-02-10 09:09:03', '2022-03-01 14:30:50'),
(180, 'admin', 'Updated News', '2022-02-10 09:09:12', '2022-03-01 14:30:50'),
(181, 'admin', 'Updated News', '2022-02-10 09:32:19', '2022-03-01 14:30:50'),
(182, 'admin', 'Added New News', '2022-02-10 09:35:44', '2022-03-01 14:30:50'),
(183, 'admin', 'Updated News', '2022-02-10 09:37:58', '2022-03-01 14:30:50'),
(184, 'admin', 'Updated News', '2022-02-10 09:43:46', '2022-03-01 14:30:50'),
(185, 'admin', 'Added New Garbage Type', '2022-02-12 18:06:07', '2022-03-01 14:30:50'),
(186, 'admin', 'Added New Garbage Type', '2022-02-12 18:06:24', '2022-03-01 14:30:50'),
(187, 'admin', 'Added New Garbage Type', '2022-02-12 18:06:50', '2022-03-01 14:30:50'),
(188, 'admin', 'Added New Garbage Type', '2022-02-12 18:07:16', '2022-03-01 14:30:50'),
(189, 'admin', 'Added New Garbage Type', '2022-02-12 18:07:27', '2022-03-01 14:30:50'),
(190, 'admin', 'Deleted Garbage Type', '2022-02-12 18:54:33', '2022-03-01 14:30:50'),
(191, 'admin', 'Updated Garbage Type', '2022-02-12 20:03:25', '2022-03-01 14:30:50'),
(192, 'admin', 'Updated Garbage Type', '2022-02-12 20:03:30', '2022-03-01 14:30:50'),
(193, 'admin', 'Updated Garbage Type', '2022-02-12 20:03:34', '2022-03-01 14:30:50'),
(194, 'admin', 'Updated Garbage Type', '2022-02-12 20:04:02', '2022-03-01 14:30:50'),
(195, 'admin', 'Deleted News', '2022-02-12 20:05:39', '2022-03-01 14:30:50'),
(196, 'admin', 'Deleted News', '2022-02-12 20:05:41', '2022-03-01 14:30:50'),
(197, 'admin', 'Deleted News', '2022-02-12 20:05:43', '2022-03-01 14:30:50'),
(198, 'admin', 'Added New News', '2022-02-12 20:06:05', '2022-03-01 14:30:50'),
(199, 'admin', 'Updated Garbage Type', '2022-02-12 20:09:17', '2022-03-01 14:30:50'),
(200, 'admin', 'Added New Profile', '2022-02-14 21:11:54', '2022-03-01 14:30:50'),
(201, 'admin', 'Added New Profile', '2022-02-14 21:13:29', '2022-03-01 14:30:50'),
(202, 'admin', 'Added New Profile', '2022-02-14 21:45:03', '2022-03-01 14:30:50'),
(203, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:28:47', '2022-03-01 14:30:50'),
(204, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:29:26', '2022-03-01 14:30:50'),
(205, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:32:07', '2022-03-01 14:30:50'),
(206, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:33:07', '2022-03-01 14:30:50'),
(207, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:35:50', '2022-03-01 14:30:50'),
(208, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:35:52', '2022-03-01 14:30:50'),
(209, 'admin', 'Johanness : Lost 150 points', '2022-02-15 06:36:46', '2022-03-01 14:30:50'),
(210, 'admin', 'Johanness : Profile Points Restarted', '2022-02-15 06:36:47', '2022-03-01 14:30:50'),
(211, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:27', '2022-03-01 14:30:50'),
(212, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:27', '2022-03-01 14:30:50'),
(213, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:28', '2022-03-01 14:30:50'),
(214, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:28', '2022-03-01 14:30:50'),
(215, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:28', '2022-03-01 14:30:50'),
(216, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:29', '2022-03-01 14:30:50'),
(217, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:29', '2022-03-01 14:30:50'),
(218, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:29', '2022-03-01 14:30:50'),
(219, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:29', '2022-03-01 14:30:50'),
(220, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:30', '2022-03-01 14:30:50'),
(221, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:30', '2022-03-01 14:30:50'),
(222, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:30', '2022-03-01 14:30:50'),
(223, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:31', '2022-03-01 14:30:50'),
(224, 'admin', 'Johanness : Profile Points Restarted', '2022-02-15 06:37:31', '2022-03-01 14:30:50'),
(225, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:32', '2022-03-01 14:30:50'),
(226, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:32', '2022-03-01 14:30:50'),
(227, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:32', '2022-03-01 14:30:50'),
(228, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:33', '2022-03-01 14:30:50'),
(229, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:33', '2022-03-01 14:30:50'),
(230, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:33', '2022-03-01 14:30:50'),
(231, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:33', '2022-03-01 14:30:50'),
(232, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:33', '2022-03-01 14:30:50'),
(233, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:34', '2022-03-01 14:30:50'),
(234, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:34', '2022-03-01 14:30:50'),
(235, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:35', '2022-03-01 14:30:50'),
(236, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:37:36', '2022-03-01 14:30:50'),
(237, 'admin', 'Johanness : Gained 150 points', '2022-02-15 06:44:15', '2022-03-01 14:30:50'),
(238, 'admin', 'Edited Profile', '2022-02-14 23:59:23', '2022-03-01 14:30:50'),
(239, 'admin', 'Edited Profile', '2022-02-15 00:00:42', '2022-03-01 14:30:50'),
(240, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:37', '2022-03-01 14:30:50'),
(241, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:38', '2022-03-01 14:30:50'),
(242, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:38', '2022-03-01 14:30:50'),
(243, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:38', '2022-03-01 14:30:50'),
(244, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:39', '2022-03-01 14:30:50'),
(245, 'admin', 'tatakae : Gained 150 points', '2022-02-15 07:08:39', '2022-03-01 14:30:50'),
(246, 'admin', 'Edited Profile', '2022-02-15 00:09:31', '2022-03-01 14:30:50'),
(247, 'admin', 'Edited Profile', '2022-02-15 00:09:43', '2022-03-01 14:30:50'),
(248, 'admin', 'Deleted News', '2022-02-15 00:40:02', '2022-03-01 14:30:50'),
(249, 'admin', 'Updated News', '2022-02-15 00:40:44', '2022-03-01 14:30:50'),
(250, 'admin', 'Updated Prize', '2022-02-15 00:41:02', '2022-03-01 14:30:50'),
(251, 'admin', 'Deleted Prize', '2022-02-15 00:41:05', '2022-03-01 14:30:50'),
(252, 'admin', 'Added New Prize', '2022-02-15 00:41:36', '2022-03-01 14:30:50'),
(253, 'admin', 'Deleted Prize', '2022-02-15 00:43:26', '2022-03-01 14:30:50'),
(254, 'admin', 'Deleted News', '2022-02-15 00:44:47', '2022-03-01 14:30:50'),
(255, 'admin', 'Added New News', '2022-02-15 00:45:58', '2022-03-01 14:30:50'),
(256, 'admin', 'Deleted Garbage Type', '2022-02-15 00:46:35', '2022-03-01 14:30:50'),
(257, 'admin', 'Deleted Garbage Type', '2022-02-15 00:46:39', '2022-03-01 14:30:50'),
(258, 'admin', 'Deleted Profile', '2022-02-15 00:48:26', '2022-03-01 14:30:50'),
(259, 'admin', 'Deleted Profile', '2022-02-15 00:48:30', '2022-03-01 14:30:50'),
(260, 'admin', 'Deleted Profile', '2022-02-15 00:48:33', '2022-03-01 14:30:50'),
(261, 'admin', 'Added New Prize', '2022-02-18 01:36:05', '2022-03-01 14:30:50'),
(262, 'admin', 'Updated News', '2022-02-18 01:40:53', '2022-03-01 14:30:50'),
(263, 'admin', 'Updated News', '2022-02-18 02:02:01', '2022-03-01 14:30:50'),
(264, 'admin', 'Updated News', '2022-02-18 02:02:26', '2022-03-01 14:30:50'),
(265, 'admin', 'Added New Profile', '2022-02-25 18:28:29', '2022-03-01 14:30:50'),
(266, 'admin', 'Deleted Prize', '2022-02-25 18:34:35', '2022-03-01 14:30:50'),
(267, 'admin', 'Deleted Prize', '2022-02-25 18:34:36', '2022-03-01 14:30:50'),
(268, 'admin', 'Deleted Prize', '2022-02-25 18:35:09', '2022-03-01 14:30:50'),
(269, 'admin', 'Added New Prize', '2022-02-25 18:35:51', '2022-03-01 14:30:50'),
(270, 'admin', 'Added New Prize', '2022-02-25 18:36:15', '2022-03-01 14:30:50'),
(271, 'admin', 'Deleted News', '2022-02-25 18:36:48', '2022-03-01 14:30:50'),
(272, 'admin', 'Added New Prize', '2022-02-25 18:44:46', '2022-03-01 14:30:50'),
(273, 'admin', 'Deleted Prize', '2022-02-25 18:45:09', '2022-03-01 14:30:50'),
(274, 'admin', 'Added New News', '2022-02-25 19:02:35', '2022-03-01 14:30:50'),
(275, 'admin', 'Deleted News', '2022-02-25 19:14:34', '2022-03-01 14:30:50'),
(276, 'admin', 'Added New News', '2022-02-25 19:14:54', '2022-03-01 14:30:50'),
(277, 'admin', 'Added New News', '2022-02-25 19:18:01', '2022-03-01 14:30:50'),
(278, 'admin', 'Deleted News', '2022-02-25 19:35:15', '2022-03-01 14:30:50'),
(279, 'admin', 'Deleted News', '2022-02-25 19:38:29', '2022-03-01 14:30:50'),
(280, 'admin', 'Added New News', '2022-02-25 19:50:12', '2022-03-01 14:30:50'),
(281, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:46', '2022-03-01 14:30:50'),
(282, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:48', '2022-03-01 14:30:50'),
(283, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:49', '2022-03-01 14:30:50'),
(284, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:50', '2022-03-01 14:30:50'),
(285, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:51', '2022-03-01 14:30:50'),
(286, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:51', '2022-03-01 14:30:50'),
(287, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:52', '2022-03-01 14:30:50'),
(288, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:52', '2022-03-01 14:30:50'),
(289, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:53', '2022-03-01 14:30:50'),
(290, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:54', '2022-03-01 14:30:50'),
(291, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:54', '2022-03-01 14:30:50'),
(292, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:55', '2022-03-01 14:30:50'),
(293, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:57', '2022-03-01 14:30:50'),
(294, 'admin', 'Johanness : Lost 150 points', '2022-03-01 14:54:57', '2022-03-01 14:30:50'),
(295, 'admin', 'Johanness : Gained 150 points', '2022-03-01 14:54:59', '2022-03-01 14:30:50'),
(296, 'admin', 'Updated Prize', '2022-03-01 08:39:05', '2022-03-01 14:30:50'),
(297, 'admin', 'Edited Profile', '2022-03-01 08:43:09', '2022-03-01 14:30:50'),
(298, 'admin', 'Johanness : Lost 150 points', '2022-03-01 22:14:04', '2022-03-01 14:30:50'),
(299, 'admin', 'Johanness : Gained 150 points', '2022-03-01 22:14:05', '2022-03-01 14:30:50'),
(300, 'admin', 'Johanness : Gained 150 points', '2022-03-01 22:14:05', '2022-03-01 14:30:50'),
(301, 'admin', 'Johanness : Gained 150 points', '2022-03-01 22:14:06', '2022-03-01 14:30:50'),
(302, 'admin', 'Johanness : Gained 150 points', '2022-03-01 22:14:06', '2022-03-01 14:30:50'),
(303, 'admin', 'Added New News', '2022-03-01 15:16:56', '2022-03-01 14:30:50'),
(304, 'admin', 'Deleted News', '2022-03-01 15:22:04', '2022-03-01 14:30:50'),
(306, 'von', 'Edited Profile', '2022-03-02 01:38:30', '2022-03-02 00:38:30'),
(307, 'von', 'Edited Profile', '2022-03-02 01:38:42', '2022-03-02 00:38:42'),
(308, 'von', 'Updated News', '2022-03-02 01:39:02', '2022-03-02 00:39:02'),
(317, 'admin', 'tatakae : Gained 150 points', '2022-03-02 11:05:55', '2022-03-02 03:05:55'),
(319, 'bonakid', 'Edited Profile', '2022-03-02 05:09:17', '2022-03-02 04:09:17'),
(320, 'bonakid', 'Edited Profile', '2022-03-02 05:09:21', '2022-03-02 04:09:21'),
(321, 'bonakid', 'Edited Profile', '2022-03-02 05:09:36', '2022-03-02 04:09:36'),
(322, 'bonakid', 'Edited Profile', '2022-03-02 05:13:09', '2022-03-02 04:13:09'),
(323, 'bonakid', 'Edited Profile', '2022-03-02 05:13:22', '2022-03-02 04:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `profilename` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datecreated` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `profilename`, `fullname`, `status`, `username`, `password`, `datecreated`, `email`, `contact`, `address`, `img_name`, `points`) VALUES
(6, 'Johanness', 'Johannes Uther', 'Member', 'johann', '123', '2021-12-21', 'utherjohannes@gmail.com', '0192313123', 'Brgy Somethings', 'Profile-652.jpg', 2550),
(11, 'Johnn', 'Johnny Bravo', 'Member', 'john', '123', '2022-01-25', 'johnnybravo@gmail.com', '123634632135', 'Brgy Something', 'Profile-230.jpg', 1800),
(12, 'bona', 'Bone Man', 'Member', 'bonaman', '123', '2022-01-25', 'bonapzz@gmail.com', '43512311351', 'Brgy Something', 'Profile-334.png', 450),
(18, 'James', 'James DeLeon', 'Member', 'james', '123', '2022-01-25', 'james@gmail.com', '09112048324', 'Brgy Something', 'Profile-863.jpg', 900),
(19, 'Patrick', 'Patrick Bandola', 'Member', 'pat', '123', '2022-01-25', 'patrick@gmail.com', '123523453535', 'Brgy Something', 'Profile-199.jpg', 900),
(20, 'Bonakida', 'Bone Kid', 'Member', 'bonakid', '123', '2022-01-25', 'preschool@gmail.com', '+3123132', 'San Vicente', 'Profile-937.png', 150),
(22, 'bro', 'Wilkens Camil', 'Member', 'bro', 'momento', '2022-02-05', 'bro@gmail.com', '2346312788', 'Brgy Something', 'Profile-661.jpg', 150),
(26, 'tatakae', 'Eren Yaeger', 'Member', 'eren', 'rumbling', '2022-02-05', 'justgenocide@gmail.com', '800000000', 'San Vicente', 'Profile-666.jpg', 1050),
(27, 'von', 'Marvel And', 'Admin', 'admin', '123', '2022-02-25', 'vonmarvel@gmail.com', '092138534', 'Brgy Something', 'Profile-426.png', 150);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_description` varchar(255) NOT NULL,
  `news_content` mediumtext NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `lastupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_content`, `news_img`, `datetime`, `lastupdate`, `postedby`) VALUES
(8, 'Lorem Ipsum', 'Test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu magna sit amet ligula placerat hendrerit eu ut nisi. Vestibulum mauris mauris, elementum sed aliquam ut, accumsan sed libero. Cras porta in lacus ut bibendum. In ac neque vulputate, pretium mauris eget, vestibulum nisl. Maecenas porta, tortor quis vestibulum mollis, ligula eros varius lacus, nec tincidunt dui dolor quis sapien. Maecenas non facilisis felis, nec porta nunc. Pellentesque in augue faucibus, dictum augue vitae, varius est. Cras sed sem dui.</p>\r\n\r\n<p>Phasellus cursus congue nunc vitae accumsan. Nam consequat ligula non ligula dapibus, sed ultrices nisl cursus. Aliquam erat volutpat. Fusce mollis odio ac odio aliquet, ac aliquet lacus hendrerit. Suspendisse mollis metus a pharetra tincidunt. Proin sollicitudin ac erat at vestibulum. Quisque fermentum tempor quam eget efficitur.</p>\r\n\r\n<p>Maecenas sit amet placerat diam. Ut sagittis nibh sed libero maximus volutpat vel eu est. Fusce sit amet rutrum purus. Nullam purus mi, luctus vitae scelerisque at, venenatis sed ante. Fusce commodo ultricies accumsan. Integer vehicula ultricies egestas. Aliquam auctor porttitor dapibus. Nullam mattis pulvinar eleifend. Sed a eros gravida, vestibulum sem ut, molestie libero. Pellentesque vehicula sit amet leo ut volutpat. Integer sed ipsum orci. Nam arcu neque, suscipit et diam vel, pulvinar iaculis enim. Vivamus ac est eros.</p>\r\n\r\n<p>Suspendisse sed libero ligula. Quisque euismod molestie metus, quis commodo magna volutpat vel. Morbi euismod dui eu est molestie eleifend. Mauris maximus lacus in posuere consequat. Cras quis sollicitudin libero. Nunc vel elit massa. Maecenas fermentum nec urna in accumsan. Aliquam accumsan turpis purus, id consequat ligula mollis eu. Praesent vestibulum eros quis varius cursus. Praesent vel lectus eu mi pellentesque molestie et nec urna. Fusce vitae efficitur leo. Proin ligula arcu, facilisis ut leo quis, tincidunt vestibulum ante. Aliquam commodo dignissim hendrerit. Suspendisse tempus pulvinar suscipit.</p>\r\n\r\n<p>Nulla quam tellus, sodales et ultrices vitae, aliquam ac quam. Nam lacus metus, dignissim ac lorem vel, semper tempor augue. Nulla ultrices, ante ut rutrum vulputate, lorem diam pharetra libero, eu varius ex arcu in mauris. Pellentesque eu tempor justo. Sed viverra congue felis vitae vulputate. Praesent eu tempus ante. Fusce et nulla sapien. Duis porta nibh vitae laoreet malesuada. Nam efficitur metus quis condimentum vulputate. Nam facilisis est eget suscipit imperdiet. Nunc ornare ultrices lacus. Cras tempus diam vel ex vehicula, nec fringilla massa condimentum. Mauris vestibulum lectus in justo molestie aliquam. Suspendisse consectetur lectus sed augue suscipit venenatis. Duis ultricies velit sit amet dui commodo euismod.</p>\r\n\r\n<p><img alt=\"Lorem Ipsum Newspaper Stock Illustrations – 121 Lorem Ipsum Newspaper Stock  Illustrations, Vectors &amp; Clipart - Dreamstime\" src=\"https://thumbs.dreamstime.com/b/illustration-newspaper-news-related-text-lorem-ipsum-text-29794841.jpg\" style=\"height:263px; width:750px\" /></p>\r\n', 'News-46.jpg', '2022-02-10 09:35:44', '2022-03-02 00:39:02', 'Cielito C. Guerrero Jr.'),
(14, 'WASTE MANAGEMENT', 'Solid Wastes', '<p>Increasing economic (production and consumption) activity, in effect, would boost the generation of solid wastes in any given community. Based on the City&rsquo;s Environmental Code (City Ordinance No.1720-2011), &ldquo;Solid Wastes&rdquo; refer to all discarded household, commercial wastes, non-hazardous institutional and industrial wastes, street sweepings, construction debris, agricultural wastes, and other non-hazardous/non-toxic solid wastes.</p>\r\n\r\n<p>The findings of the WAC Study in 2004 on individual solid waste generation of 0.6kg/person in a day may not be relevant today due to increase economic activity of the people living in Santa Rosa. Also, the Census Office (NSO) already issued an actual population of 284,640 in 2010.</p>\r\n\r\n<p>The table shows that projected waste generation per day of the City of Santa Rosa until the year 2017. The total solid waste generation of the city with estimated population of 310,258 (2010), is about 186 metric tons per day based on the average rate of 0.6kg/person/day (WACS, 2004). An estimated 53% of the total wastes generated are recyclable.</p>\r\n\r\n<p><em>10-Year Projected Waste Generated, Diverted, and Disposal, City of Santa Rosa, 2008-2017</em></p>\r\n\r\n<p><img alt=\"\" src=\"http://santarosacity.gov.ph/file-manager/images/management.jpg\" style=\"height:auto\" /></p>\r\n\r\n<p>Source: 10 Year City Solid Waste Management Plan, City of Santa Rosa, Laguna</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Solid Waste Collection</strong></p>\r\n\r\n<p>The City Government, through the supervision of the City ENRO, is providing daily garbage collection on the 18 barangays, including almost all private subdivisions. It is spending Php 54 million per year for the collection and hauling of garbage (City ENRO, 2008).</p>\r\n\r\n<p>Pilotage Trading and Construction (PTAC) is a private contractor that owns a sanitary landfill located in San Pedro, Laguna is in charge in the everyday garbage collection of the city. PTAC is using 29 dump trucks tracking different routes per day. (Excerpt from the 10-Year City Solid Waste Management Plan)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>SWM Personnel</strong></p>\r\n\r\n<p>The Solid Waste Management in the City of Santa Rosa is supervised by the City Environment and Natural Resources Officer through the assistance of four technical and 46 supporting staff.</p>\r\n\r\n<p>In 2009, there are 449 street sweepers and 156 environmental armies that provide workforce assistance in all SWM undertakings while nine (9) utility workers assist PTAC in daily routing.<em>&nbsp;(Excerpt from the 10-Year City Solid Waste Management Plan)</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Liquid Wastes</strong></p>\r\n\r\n<p>The entire city lacks wastewater treatment facilities. The city resorts to discharging wastes into surface waters like local rivers and creeks. Consequently, Santa Rosa contributes to the unfavourable Class C status of Laguna Lake.</p>\r\n\r\n<p>Source:&nbsp;<a href=\"https://santarosacity.gov.ph/about-sta-rosa/waste-management/\">https://santarosacity.gov.ph/about-sta-rosa/waste-management/</a></p>\r\n', 'News-405.jpg', '2022-02-25 19:50:12', '2022-02-25 18:50:12', 'Cielito C. Guerrero Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE `prizes` (
  `id` int(11) NOT NULL,
  `prize` varchar(255) NOT NULL,
  `pdescription` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `prize_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prizes`
--

INSERT INTO `prizes` (`id`, `prize`, `pdescription`, `price`, `prize_img`) VALUES
(6, 'Apple Pie', 'Delicious Apple Pie', 10, 'Prize-656.jpg'),
(18, 'Cookie', 'Tasty Cookie', 5, 'Prize-199.jpg'),
(19, 'Meatballs', 'Tasty Meatballs', 10, 'Prize-979.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `status`) VALUES
(1, 'Cielito C. Guerrero Jr.', 'admin', '123', 'Administrator'),
(2, 'Joe Howard', 'admins', '1234', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garbagetype`
--
ALTER TABLE `garbagetype`
  ADD PRIMARY KEY (`garbage_ID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `prizes`
--
ALTER TABLE `prizes`
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
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `garbagetype`
--
ALTER TABLE `garbagetype`
  MODIFY `garbage_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prizes`
--
ALTER TABLE `prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
