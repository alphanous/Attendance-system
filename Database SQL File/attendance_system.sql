-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 11:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `sas_attendance`
--

CREATE TABLE `sas_attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` enum('present','absent','late','half_day') NOT NULL,
  `attendance_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sas_attendance`
--

INSERT INTO `sas_attendance` (`attendance_id`, `student_id`, `class_id`, `status`, `attendance_date`) VALUES
(2, 2, 33, 'absent', '2020/03/15'),
(3, 5, 38, 'present', '2020/04/06'),
(4, 2, 33, 'present', '2020/04/07'),
(5, 2, 33, 'present', '2020/04/14'),
(6, 2, 33, 'present', '2020/04/23'),
(7, 2, 33, 'absent', '2020/05/10'),
(8, 4, 35, 'present', '2020/07/01'),
(9, 3, 34, 'present', '2020/07/09'),
(10, 2, 33, 'late', '2020/07/09'),
(11, 3, 34, 'present', '2020/07/30'),
(12, 3, 34, 'present', '2020/08/13'),
(13, 2, 33, 'present', '2020/08/15'),
(14, 2, 33, 'half_day', '2020/08/29'),
(15, 2, 33, 'present', '2020/08/31'),
(16, 2, 33, 'present', '2020/09/08'),
(17, 3, 34, 'present', '2020/09/08'),
(18, 2, 33, 'present', '2020/09/13'),
(19, 2, 33, 'present', '2020/09/21'),
(20, 3, 34, 'absent', '2020/09/21'),
(21, 4, 35, 'present', '2020/09/23'),
(22, 5, 38, 'absent', '2020/09/23'),
(23, 2, 33, 'absent', '2020/09/24'),
(24, 3, 34, 'present', '2020/09/24'),
(25, 3, 34, 'present', '2020/09/25'),
(26, 2, 33, 'present', '2020/09/28'),
(27, 3, 34, 'present', '2020/09/28'),
(28, 4, 35, 'present', '2020/09/28'),
(29, 5, 38, 'present', '2020/09/28'),
(30, 3, 34, 'present', '2020/09/29'),
(31, 2, 33, 'half_day', '2020/09/29'),
(32, 4, 35, 'present', '2020/09/30'),
(33, 2, 33, 'present', '2020/10/02'),
(34, 2, 33, 'present', '2020/10/05'),
(35, 2, 33, 'half_day', '2020/10/10'),
(36, 5, 38, 'late', '2020/10/10'),
(37, 5, 38, 'present', '2020/10/16'),
(38, 4, 35, 'present', '2020/10/20'),
(39, 2, 33, 'present', '2020/10/24'),
(40, 2, 33, 'absent', '2020/10/27'),
(41, 2, 33, 'absent', '2020/11/03'),
(42, 4, 35, 'late', '2020/11/11'),
(43, 2, 33, 'late', '2020/11/14'),
(44, 3, 34, 'absent', '2020/11/18'),
(45, 2, 33, 'present', '2020/11/19'),
(46, 3, 34, 'present', '2020/11/21'),
(47, 2, 33, 'present', '2020/11/21'),
(48, 5, 38, 'present', '2020/11/21'),
(49, 2, 33, 'present', '2020/11/22'),
(50, 2, 33, 'absent', '2020/11/25'),
(51, 2, 33, 'present', '2020/11/27'),
(52, 5, 38, 'present', '2020/11/27'),
(53, 2, 33, 'present', '2020/11/28'),
(54, 3, 34, 'present', '2020/11/28'),
(55, 2, 33, 'present', '2020/11/30'),
(56, 2, 33, 'half_day', '2020/12/01'),
(57, 3, 34, 'half_day', '2020/12/03'),
(58, 2, 33, 'present', '2020/12/07'),
(59, 2, 33, 'absent', '2020/12/13'),
(60, 2, 0, 'half_day', '2020/12/15'),
(61, 2, 33, 'present', '2020/12/16'),
(62, 3, 34, 'present', '2020/12/16'),
(63, 3, 34, 'late', '2020/12/17'),
(64, 2, 33, 'present', '2020/12/17'),
(65, 2, 33, 'present', '2020/12/21'),
(66, 3, 34, 'late', '2020/12/21'),
(67, 3, 34, 'present', '2020/12/23'),
(68, 3, 34, 'present', '2020/12/27'),
(69, 2, 33, 'present', '2020/12/29'),
(70, 2, 33, 'absent', '2021/01/01'),
(71, 3, 34, 'half_day', '2021/01/08'),
(72, 4, 35, 'present', '2021/01/08'),
(73, 2, 33, 'present', '2021/01/16'),
(74, 4, 35, 'absent', '2021/01/16'),
(75, 2, 33, 'absent', '2021/01/17'),
(76, 2, 33, 'present', '2021/01/19'),
(77, 2, 33, 'present', '2021/01/21'),
(78, 2, 33, 'half_day', '2021/01/22'),
(79, 2, 33, 'present', '2021/01/26'),
(80, 2, 33, 'present', '2021/02/01'),
(81, 3, 34, 'present', '2021/02/01'),
(82, 2, 33, 'present', '2021/02/05'),
(83, 5, 38, 'absent', '2021/02/05'),
(84, 2, 33, 'present', '2021/02/06'),
(85, 2, 33, 'present', '2021/02/08'),
(86, 5, 38, 'absent', '2021/02/10'),
(87, 4, 35, 'present', '2021/02/12'),
(88, 2, 33, 'present', '2021/02/14'),
(89, 2, 33, 'present', '2021/02/15'),
(90, 2, 33, 'late', '2021/02/16'),
(91, 2, 33, 'absent', '2021/02/17'),
(92, 2, 33, 'present', '2021/02/18'),
(93, 4, 35, 'present', '2021/02/18'),
(94, 4, 35, 'present', '2021/02/20'),
(95, 2, 33, 'present', '2021/02/20'),
(96, 3, 34, 'absent', '2021/02/20'),
(97, 2, 33, 'present', '2021/02/21'),
(98, 3, 34, 'present', '2021/02/22'),
(99, 2, 33, 'present', '2021/02/22'),
(100, 2, 33, 'present', '2021/02/23'),
(101, 2, 33, 'present', '2021/02/25'),
(102, 3, 34, 'absent', '2021/02/27'),
(103, 5, 38, 'half_day', '2021/02/27'),
(104, 2, 33, 'present', '2021/02/28'),
(105, 3, 34, 'present', '2021/02/28'),
(106, 2, 33, 'present', '2021/03/02'),
(107, 4, 35, 'absent', '2021/03/08'),
(108, 5, 38, 'absent', '2021/03/08'),
(109, 5, 38, 'absent', '2021/03/14'),
(110, 2, 33, 'present', '2021/03/14'),
(111, 2, 33, 'present', '2021/03/15'),
(112, 2, 33, 'absent', '2021/03/16'),
(113, 2, 33, 'absent', '2021/03/20'),
(114, 2, 34, 'late', '2021/03/20'),
(115, 4, 35, 'half_day', '2021/03/20'),
(116, 2, 33, 'absent', '2021/03/21'),
(117, 2, 33, 'present', '2021/03/23'),
(118, 2, 33, 'present', '2021/03/24'),
(119, 3, 34, 'late', '2021/03/24'),
(120, 5, 38, 'present', '2021/03/24'),
(121, 4, 35, 'half_day', '2021/03/24'),
(122, 2, 33, 'present', '2021/03/25'),
(123, 2, 33, 'present', '2021/03/26'),
(124, 3, 34, 'present', '2021/03/26'),
(125, 4, 35, 'late', '2021/03/26'),
(126, 2, 33, 'present', '2021/03/27'),
(127, 3, 34, 'absent', '2021/04/05'),
(128, 2, 33, 'present', '2021/04/06'),
(129, 5, 34, 'present', '2021/04/06'),
(130, 4, 35, 'present', '2021/04/08'),
(131, 5, 38, 'present', '2021/04/09'),
(132, 2, 33, 'present', '2021/04/11'),
(133, 4, 35, 'half_day', '2021/04/11'),
(134, 2, 33, 'present', '2021/04/12'),
(135, 3, 34, 'present', '2021/04/12'),
(136, 3, 34, 'present', '2021/04/13'),
(137, 5, 38, 'present', '2021/04/15'),
(138, 2, 33, 'present', '2021/04/16'),
(139, 2, 33, 'present', '2021/04/17'),
(140, 2, 33, 'present', '2021/04/19'),
(141, 5, 38, 'present', '2021/04/19'),
(142, 2, 33, 'present', '2021/04/20'),
(143, 2, 33, 'late', '2021/04/21'),
(144, 5, 38, 'present', '2021/04/21'),
(145, 2, 33, 'present', '2021/04/24'),
(146, 3, 34, 'absent', '2021/04/24'),
(147, 2, 33, 'present', '2021/04/25'),
(148, 2, 33, 'present', '2021/04/26'),
(149, 2, 34, 'late', '2021/04/26'),
(150, 3, 34, 'half_day', '2021/04/27'),
(151, 4, 35, 'absent', '2021/04/27'),
(152, 5, 38, 'present', '2021/04/28'),
(153, 4, 35, 'present', '2021/04/28'),
(154, 4, 35, 'late', '2021/05/01'),
(155, 2, 33, 'present', '2021/05/01'),
(156, 3, 34, 'absent', '2021/05/01'),
(157, 2, 33, 'present', '2021/05/03'),
(158, 2, 33, 'present', '2021/05/05'),
(159, 3, 34, 'present', '2021/05/06'),
(160, 2, 33, 'present', '2021/05/07'),
(161, 5, 38, 'present', '2021/05/07'),
(162, 3, 34, 'absent', '2021/05/07'),
(163, 3, 34, 'absent', '2021/05/10'),
(164, 2, 33, 'present', '2021/05/10'),
(165, 4, 35, 'present', '2021/05/10'),
(166, 5, 38, 'present', '2021/05/10'),
(167, 2, 33, 'present', '2021/05/16'),
(168, 2, 33, 'absent', '2021/05/20'),
(169, 2, 33, 'present', '2021/05/22'),
(170, 3, 34, 'present', '2021/05/24'),
(171, 2, 33, 'present', '2021/05/24'),
(172, 2, 33, 'present', '2021/05/25'),
(173, 3, 34, 'present', '2021/05/29'),
(174, 5, 38, 'absent', '2021/05/29'),
(175, 3, 34, 'present', '2021/06/01'),
(176, 2, 33, 'present', '2021/06/02'),
(177, 4, 33, 'present', '2021/06/03'),
(178, 3, 34, 'half_day', '2021/06/03'),
(179, 5, 38, 'present', '2021/06/03'),
(180, 4, 35, 'late', '2021/06/03'),
(181, 3, 34, 'present', '2021/06/04'),
(182, 3, 34, 'absent', '2021/06/07'),
(183, 3, 34, 'present', '2021/06/08'),
(184, 2, 33, 'present', '2021/06/10'),
(185, 2, 33, 'present', '2021/06/15'),
(186, 3, 34, 'present', '2021/06/15'),
(187, 5, 38, 'half_day', '2021/06/15'),
(188, 2, 33, 'present', '2021/06/16'),
(189, 4, 35, 'present', '2021/06/16'),
(190, 5, 38, 'present', '2021/06/19'),
(191, 2, 33, 'present', '2021/06/19'),
(192, 2, 33, 'present', '2021/06/20'),
(193, 5, 38, 'absent', '2021/06/20'),
(194, 2, 33, 'present', '2021/06/22'),
(195, 3, 34, 'present', '2021/06/22'),
(196, 2, 33, 'present', '2021/06/25'),
(197, 3, 34, 'absent', '2021/06/26'),
(198, 2, 33, 'late', '2021/06/27'),
(199, 4, 35, 'present', '2021/06/27'),
(200, 5, 38, 'present', '2021/06/27'),
(201, 3, 34, 'present', '2021/06/27'),
(202, 3, 34, 'present', '2021/06/29'),
(203, 2, 33, 'present', '2021/06/29'),
(204, 2, 33, 'present', '2021/06/30'),
(205, 2, 33, 'present', '2021/07/01'),
(206, 3, 34, 'present', '2021/07/01'),
(207, 2, 33, 'present', '2021/07/02'),
(208, 5, 38, 'present', '2021/07/03'),
(209, 4, 35, 'present', '2021/07/03'),
(210, 2, 33, 'absent', '2021/07/03'),
(211, 3, 34, 'half_day', '2021/07/03'),
(212, 2, 33, 'present', '2021/07/04'),
(213, 2, 33, 'absent', '2021/07/05'),
(214, 3, 34, 'late', '2021/07/05'),
(215, 4, 35, 'present', '2021/07/05'),
(216, 2, 33, 'present', '2021/07/08'),
(217, 2, 33, 'absent', '2021/07/09'),
(218, 2, 33, 'absent', '2021/07/14'),
(219, 3, 34, 'absent', '2021/07/14'),
(220, 2, 33, 'absent', '2021/07/22'),
(221, 2, 33, 'present', '2021/07/27'),
(222, 4, 35, 'present', '2021/07/27'),
(223, 3, 34, 'absent', '2021/07/28'),
(224, 3, 34, 'present', '2021/07/30'),
(225, 2, 33, 'present', '2021/07/30'),
(226, 2, 33, 'present', '2021/08/01'),
(227, 3, 34, 'absent', '2021/08/01'),
(228, 5, 38, 'half_day', '2021/08/01'),
(229, 2, 33, 'present', '2021/08/02'),
(230, 2, 33, 'present', '2021/08/03'),
(231, 5, 38, 'present', '2021/08/04'),
(232, 2, 33, 'absent', '2021/08/05'),
(233, 3, 34, 'absent', '2021/08/09'),
(234, 3, 34, 'half_day', '2021/08/14'),
(235, 2, 33, 'present', '2021/08/15'),
(236, 2, 33, 'present', '2021/08/17'),
(237, 2, 33, 'present', '2021/08/18'),
(238, 4, 35, 'present', '2021/08/19'),
(239, 2, 33, 'present', '2021/08/21'),
(240, 3, 34, 'present', '2021/08/21'),
(241, 2, 33, 'present', '2021/08/22'),
(242, 5, 38, 'half_day', '2021/08/22'),
(243, 3, 34, 'present', '2021/08/22'),
(244, 2, 33, 'present', '2021/08/23'),
(245, 2, 33, 'half_day', '2021/08/24'),
(246, 2, 33, 'present', '2021/08/28'),
(247, 4, 35, 'absent', '2021/08/30'),
(248, 2, 33, 'present', '2021/08/31'),
(249, 4, 35, 'present', '2021/08/31'),
(250, 2, 33, 'half_day', '2021/09/01'),
(251, 3, 34, 'absent', '2021/09/01'),
(252, 2, 33, 'present', '2021/09/02'),
(253, 2, 33, 'present', '2021/09/03'),
(254, 3, 34, 'absent', '2021/09/03'),
(255, 2, 33, 'present', '2021/09/04'),
(256, 2, 33, 'present', '2021/09/05'),
(257, 2, 33, 'absent', '2021/09/06'),
(258, 2, 33, 'absent', '2021/09/14'),
(259, 4, 35, 'present', '2021/09/16'),
(260, 3, 34, 'present', '2021/09/17'),
(261, 5, 38, 'present', '2021/09/17'),
(262, 2, 33, 'late', '2021/09/19'),
(263, 4, 35, 'absent', '2021/09/19'),
(264, 2, 33, 'present', '2021/09/21'),
(265, 2, 33, 'absent', '2021/09/24'),
(266, 4, 35, 'present', '2021/09/26'),
(267, 3, 34, 'present', '2021/09/28'),
(268, 2, 33, 'present', '2021/09/29'),
(269, 3, 34, 'present', '2021/09/29'),
(270, 2, 33, 'present', '2021/09/30'),
(271, 4, 35, 'present', '2021/09/30'),
(272, 5, 38, 'late', '2021/09/30'),
(273, 2, 33, 'half_day', '2021/10/03'),
(274, 3, 34, 'present', '2021/10/03'),
(275, 5, 38, 'late', '2021/10/03'),
(276, 2, 33, 'half_day', '2021/10/04'),
(277, 5, 38, 'present', '2021/10/07'),
(278, 3, 34, 'half_day', '2021/10/11'),
(279, 2, 33, 'present', '2021/10/15'),
(280, 5, 38, 'half_day', '2021/10/16'),
(281, 2, 33, 'present', '2021/10/18'),
(282, 3, 34, 'present', '2021/10/18'),
(283, 2, 33, 'present', '2021/10/19'),
(284, 2, 33, 'late', '2021/10/20'),
(285, 3, 34, 'present', '2021/10/20'),
(286, 4, 35, 'half_day', '2021/10/21'),
(287, 5, 38, 'late', '2021/10/21'),
(288, 2, 33, 'present', '2021/10/21'),
(289, 2, 33, 'present', '2021/10/22'),
(290, 3, 34, 'half_day', '2021/10/22'),
(291, 2, 33, 'late', '2021/10/27'),
(292, 3, 34, 'present', '2021/10/27'),
(293, 2, 33, 'absent', '2021/10/28'),
(294, 5, 38, 'present', '2021/10/28'),
(295, 2, 33, 'present', '2021/10/29'),
(296, 2, 33, 'present', '2021/10/30'),
(297, 2, 33, 'present', '2021/11/02'),
(298, 3, 34, 'absent', '2021/11/02'),
(299, 4, 35, 'late', '2021/11/02'),
(300, 5, 38, 'present', '2021/11/02'),
(301, 3, 34, 'half_day', '2021/11/03'),
(302, 2, 33, 'present', '2021/11/04'),
(303, 5, 38, 'absent', '2021/11/04'),
(304, 2, 33, 'late', '2021/11/05'),
(305, 4, 35, 'present', '2021/11/07'),
(306, 3, 34, 'absent', '2021/11/09'),
(307, 2, 33, 'half_day', '2021/11/09'),
(308, 8, 35, 'absent', '2021/11/14'),
(309, 4, 35, 'present', '2021/11/14'),
(310, 2, 35, 'present', '2021/11/14');

-- --------------------------------------------------------

--
-- Table structure for table `sas_classes`
--

CREATE TABLE `sas_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sas_classes`
--

INSERT INTO `sas_classes` (`id`, `name`, `teacher_id`) VALUES
(33, 'First', 1),
(34, 'Second', 1),
(35, 'Third', 1),
(38, 'Fourth', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sas_students`
--

CREATE TABLE `sas_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `mobile` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `current_address` varchar(40) DEFAULT NULL,
  `permanent_address` varchar(40) DEFAULT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_mobile` int(10) UNSIGNED NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_mobile` int(10) UNSIGNED NOT NULL,
  `admission_no` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `stream` int(10) UNSIGNED DEFAULT NULL,
  `admission_date` datetime NOT NULL,
  `academic_year` int(10) UNSIGNED NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sas_students`
--

INSERT INTO `sas_students` (`id`, `name`, `gender`, `dob`, `photo`, `mobile`, `email`, `current_address`, `permanent_address`, `father_name`, `father_mobile`, `father_occupation`, `mother_name`, `mother_mobile`, `admission_no`, `roll_no`, `stream`, `admission_date`, `academic_year`, `class`) VALUES
(2, 'Jhon', 'male', '2001-11-13', '1582017489image12.jpg', 1234567890, 'Jhon@gmail.com', '133, A Block, New Street, London, UK', '133, A Block, New Street, London, UK', 'David', 1234567890, 'Farmer', 'Rose', 1234567890, 123456789, 1, NULL, '2020-03-15 00:00:00', 2020, 35),
(3, 'Smith', 'male', '2002-03-03', '1582091940bg.jpg', 4294967295, 'test@gmail.com', 'test blk tst tst tst', NULL, 'test', 0, '', 'testing', 0, 2, 2, NULL, '2020-03-15 00:00:00', 2020, 34),
(4, 'Foster', 'Male', '2003-03-10', NULL, 0, NULL, NULL, NULL, '', 0, '', '', 0, 0, 3, NULL, '2020-03-15 00:00:00', 2020, 35),
(5, 'Damein', 'Male', '2001-03-03', NULL, 0, NULL, NULL, NULL, '', 0, '', '', 0, 0, 4, NULL, '2020-03-15 00:00:00', 2020, 38),
(8, 'Andy', 'male', '2021-11-14', NULL, 1234567890, 'asd@phpzag.com', 'dsdgsd', 'dsdgsd', 'dfsdf', 0, '', 'sdfsdf', 0, 0, 464634, NULL, '0000-00-00 00:00:00', 2022, 35);

-- --------------------------------------------------------

--
-- Table structure for table `sas_user`
--

CREATE TABLE `sas_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` enum('active','pending','deleted','') NOT NULL DEFAULT 'pending',
  `role` enum('administrator','teacher','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sas_user`
--

INSERT INTO `sas_user` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `mobile`, `status`, `role`) VALUES
(1, 'Kane', 'William', 'kw@coderszine.com', '202cb962ac59075b964b07152d234b70', 'male', '41242142', 'active', 'teacher'),
(2, 'Jhony', 'Rhodes', 'jhonty@coderszine.com', '202cb962ac59075b964b07152d234b70', 'male', '41242142', 'active', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sas_attendance`
--
ALTER TABLE `sas_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `sas_classes`
--
ALTER TABLE `sas_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sas_students`
--
ALTER TABLE `sas_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sas_user`
--
ALTER TABLE `sas_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sas_attendance`
--
ALTER TABLE `sas_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `sas_classes`
--
ALTER TABLE `sas_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sas_students`
--
ALTER TABLE `sas_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sas_user`
--
ALTER TABLE `sas_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
