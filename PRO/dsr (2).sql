-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 08:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `collage`
--

CREATE TABLE `collage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collage`
--

INSERT INTO `collage` (`id`, `name`) VALUES
(7, 'juh'),
(8, 'SMS'),
(10, 'dsf'),
(11, 'ddsfa'),
(12, 'adsd');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'آروبا'),
(2, 'أذربيجان'),
(3, 'أرمينيا'),
(4, 'أسبانيا'),
(5, 'أستراليا'),
(6, 'أفغانستان'),
(7, 'ألبانيا'),
(8, 'ألمانيا'),
(9, 'أنتيجوا وبربودا'),
(10, 'أنجولا'),
(11, 'أنجويلا'),
(12, 'أندورا'),
(13, 'أورجواي'),
(14, 'أوزبكستان'),
(15, 'أوغندا'),
(16, 'أوكرانيا'),
(17, 'أيرلندا'),
(18, 'أيسلندا'),
(19, 'اثيوبيا'),
(20, 'اريتريا'),
(21, 'استونيا'),
(22, 'اسرائيل'),
(23, 'الأرجنتين'),
(24, 'الأردن'),
(25, 'الاكوادور'),
(26, 'الامارات العربية المتحدة'),
(27, 'الباهاما'),
(28, 'البحرين'),
(29, 'البرازيل'),
(30, 'البرتغال'),
(31, 'البوسنة والهرسك'),
(32, 'الجابون'),
(33, 'الجبل الأسود'),
(34, 'الجزائر'),
(35, 'الدانمرك'),
(36, 'الرأس الأخضر'),
(37, 'السلفادور'),
(38, 'السنغال'),
(39, 'السودان'),
(40, 'السويد'),
(41, 'الصحراء الغربية'),
(42, 'الصومال'),
(43, 'الصين'),
(44, 'العراق'),
(45, 'الفاتيكان'),
(46, 'الفيلبين'),
(47, 'القطب الجنوبي'),
(48, 'الكاميرون'),
(49, 'الكونغو - برازافيل'),
(50, 'الكويت'),
(51, 'المجر'),
(52, 'المحيط الهندي البريطاني'),
(53, 'المغرب'),
(54, 'المقاطعات الجنوبية الفرنسية'),
(55, 'المكسيك'),
(56, 'المملكة العربية السعودية'),
(57, 'المملكة المتحدة'),
(58, 'النرويج'),
(59, 'النمسا'),
(60, 'النيجر'),
(61, 'الهند'),
(62, 'الولايات المتحدة الأمريكية'),
(63, 'اليابان'),
(64, 'اليمن'),
(65, 'اليونان'),
(66, 'اندونيسيا'),
(67, 'ايران'),
(68, 'ايطاليا'),
(69, 'بابوا غينيا الجديدة'),
(70, 'باراجواي'),
(71, 'باكستان'),
(72, 'بالاو'),
(73, 'بتسوانا'),
(74, 'بتكايرن'),
(75, 'بربادوس'),
(76, 'برمودا'),
(77, 'بروناي'),
(78, 'بلجيكا'),
(79, 'بلغاريا'),
(80, 'بليز'),
(81, 'بنجلاديش'),
(82, 'بنما'),
(83, 'بنين'),
(84, 'بوتان'),
(85, 'بورتوريكو'),
(86, 'بوركينا فاسو'),
(87, 'بوروندي'),
(88, 'بولندا'),
(89, 'بوليفيا'),
(90, 'بولينيزيا الفرنسية'),
(91, 'بيرو'),
(92, 'تانزانيا'),
(93, 'تايلند'),
(94, 'تايوان'),
(95, 'تركمانستان'),
(96, 'تركيا'),
(97, 'ترينيداد وتوباغو'),
(98, 'تشاد'),
(99, 'توجو'),
(100, 'توفالو'),
(101, 'توكيلو'),
(102, 'تونجا'),
(103, 'تونس'),
(104, 'تيمور الشرقية'),
(105, 'جامايكا'),
(106, 'جبل طارق'),
(107, 'جرينادا'),
(108, 'جرينلاند'),
(109, 'جزر أولان'),
(110, 'جزر الأنتيل الهولندية'),
(111, 'جزر الترك وجايكوس'),
(112, 'جزر القمر'),
(113, 'جزر الكايمن'),
(114, 'جزر المارشال'),
(115, 'جزر الملديف'),
(116, 'جزر الولايات المتحدة البعيدة الصغيرة'),
(117, 'جزر سليمان'),
(118, 'جزر فارو'),
(119, 'جزر فرجين الأمريكية'),
(120, 'جزر فرجين البريطانية'),
(121, 'جزر فوكلاند'),
(122, 'جزر كوك'),
(123, 'جزر كوكوس'),
(124, 'جزر ماريانا الشمالية'),
(125, 'جزر والس وفوتونا'),
(126, 'جزيرة الكريسماس'),
(127, 'جزيرة بوفيه'),
(128, 'جزيرة مان'),
(129, 'جزيرة نورفوك'),
(130, 'جزيرة هيرد وماكدونالد'),
(131, 'جمهورية افريقيا الوسطى'),
(132, 'جمهورية التشيك'),
(133, 'جمهورية الدومينيك'),
(134, 'جمهورية الكونغو الديمقراطية'),
(135, 'جمهورية جنوب افريقيا'),
(136, 'جواتيمالا'),
(137, 'جوادلوب'),
(138, 'جوام'),
(139, 'جورجيا'),
(140, 'جورجيا الجنوبية وجزر ساندويتش الجنوبية'),
(141, 'جيبوتي'),
(142, 'جيرسي'),
(143, 'دومينيكا'),
(144, 'رواندا'),
(145, 'روسيا'),
(146, 'روسيا البيضاء'),
(147, 'رومانيا'),
(148, 'روينيون'),
(149, 'زامبيا'),
(150, 'زيمبابوي'),
(151, 'ساحل العاج'),
(152, 'ساموا'),
(153, 'ساموا الأمريكية'),
(154, 'سان مارينو'),
(155, 'سانت بيير وميكولون'),
(156, 'سانت فنسنت وغرنادين'),
(157, 'سانت كيتس ونيفيس'),
(158, 'سانت لوسيا'),
(159, 'سانت مارتين'),
(160, 'سانت هيلنا'),
(161, 'ساو تومي وبرينسيبي'),
(162, 'سريلانكا'),
(163, 'سفالبارد وجان مايان'),
(164, 'سلوفاكيا'),
(165, 'سلوفينيا'),
(166, 'سنغافورة'),
(167, 'سوازيلاند'),
(168, 'سوريا'),
(169, 'سورينام'),
(170, 'سويسرا'),
(171, 'سيراليون'),
(172, 'سيشل'),
(173, 'شيلي'),
(174, 'صربيا'),
(175, 'صربيا والجبل الأسود'),
(176, 'طاجكستان'),
(177, 'عمان'),
(178, 'غامبيا'),
(179, 'غانا'),
(180, 'غويانا'),
(181, 'غيانا'),
(182, 'غينيا'),
(183, 'غينيا الاستوائية'),
(184, 'غينيا بيساو'),
(185, 'فانواتو'),
(186, 'فرنسا'),
(187, 'فلسطين'),
(188, 'فنزويلا'),
(189, 'فنلندا'),
(190, 'فيتنام'),
(191, 'فيجي'),
(192, 'قبرص'),
(193, 'قرغيزستان'),
(194, 'قطر'),
(195, 'كازاخستان'),
(196, 'كاليدونيا الجديدة'),
(197, 'كرواتيا'),
(198, 'كمبوديا'),
(199, 'كندا'),
(200, 'كوبا'),
(201, 'كوريا الجنوبية'),
(202, 'كوريا الشمالية'),
(203, 'كوستاريكا'),
(204, 'كولومبيا'),
(205, 'كيريباتي'),
(206, 'كينيا'),
(207, 'لاتفيا'),
(208, 'لاوس'),
(209, 'لبنان'),
(210, 'لوكسمبورج'),
(211, 'ليبيا'),
(212, 'ليبيريا'),
(213, 'ليتوانيا'),
(214, 'ليختنشتاين'),
(215, 'ليسوتو'),
(216, 'مارتينيك'),
(217, 'ماكاو الصينية'),
(218, 'مالطا'),
(219, 'مالي'),
(220, 'ماليزيا'),
(221, 'مايوت'),
(222, 'مدغشقر'),
(223, 'مصر'),
(224, 'مقدونيا'),
(225, 'ملاوي'),
(226, 'منطقة غير معرفة'),
(227, 'منغوليا'),
(228, 'موريتانيا'),
(229, 'موريشيوس'),
(230, 'موزمبيق'),
(231, 'مولدافيا'),
(232, 'موناكو'),
(233, 'مونتسرات'),
(234, 'ميانمار'),
(235, 'ميكرونيزيا'),
(236, 'ناميبيا'),
(237, 'نورو'),
(238, 'نيبال'),
(239, 'نيجيريا'),
(240, 'نيكاراجوا'),
(241, 'نيوزيلاندا'),
(242, 'نيوي'),
(243, 'هايتي'),
(244, 'هندوراس'),
(245, 'هولندا'),
(246, 'هونج كونج الصينية');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(1) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `name`) VALUES
(1, 'استاذ مساعد'),
(2, 'استاذ مشارك'),
(3, 'مساعد تدريس');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `collage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `collage_id`) VALUES
(3, 'CS', 7),
(4, 'Math', 7),
(5, 'dept', 8),
(6, 'dds', 10),
(7, 'dds', 10);

-- --------------------------------------------------------

--
-- Table structure for table `discharge`
--

CREATE TABLE `discharge` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `designation-date` date NOT NULL,
  `promotion-date` date NOT NULL,
  `loan-type` varchar(64) COLLATE utf8_bin NOT NULL,
  `loan-date-from` date NOT NULL,
  `loan-date-to` date NOT NULL,
  `loan-place` varchar(64) COLLATE utf8_bin NOT NULL,
  `vacation-date-from` date NOT NULL,
  `vacation-date-to` date NOT NULL,
  `vacation-place` varchar(64) COLLATE utf8_bin NOT NULL,
  `grant-date-from-1` date NOT NULL,
  `grant-date-to-1` date NOT NULL,
  `grant-place-1` varchar(64) COLLATE utf8_bin NOT NULL,
  `grant-date-from-2` date NOT NULL,
  `grant-date-to-2` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `grant-place-2` varchar(64) COLLATE utf8_bin NOT NULL,
  `request-vacation-date-from` date NOT NULL,
  `request-vacation-date-to` date NOT NULL,
  `request-vacation-num` int(11) NOT NULL,
  `edu-name` varchar(64) COLLATE utf8_bin NOT NULL,
  `edu-countryf` int(3) DEFAULT NULL,
  `edu-confirmf` int(1) DEFAULT NULL,
  `activity` varchar(64) COLLATE utf8_bin NOT NULL,
  `support-edu` varchar(255) COLLATE utf8_bin NOT NULL,
  `request-support` varchar(255) COLLATE utf8_bin NOT NULL,
  `department-confirmf` int(1) DEFAULT NULL,
  `confirm-coveragef` int(1) DEFAULT NULL,
  `collage-confirmf` int(1) DEFAULT NULL,
  `board-confirmf` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `discharge`
--

INSERT INTO `discharge` (`id`, `teacher_id`, `designation-date`, `promotion-date`, `loan-type`, `loan-date-from`, `loan-date-to`, `loan-place`, `vacation-date-from`, `vacation-date-to`, `vacation-place`, `grant-date-from-1`, `grant-date-to-1`, `grant-place-1`, `grant-date-from-2`, `grant-date-to-2`, `status`, `grant-place-2`, `request-vacation-date-from`, `request-vacation-date-to`, `request-vacation-num`, `edu-name`, `edu-countryf`, `edu-confirmf`, `activity`, `support-edu`, `request-support`, `department-confirmf`, `confirm-coveragef`, `collage-confirmf`, `board-confirmf`) VALUES
(1, 61, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-03-14', '2019-03-29', 1, '', 39, NULL, '', '', '', NULL, NULL, NULL, NULL),
(2, 61, '0000-00-00', '2019-03-01', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-03-15', '2019-03-30', 1, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(3, 66, '2019-03-28', '2019-03-29', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-03-31', '2019-04-06', 0, 'EDU', 39, 1, 'نشاط', 'دعم مقدم', 'دعم مطلوب', NULL, NULL, NULL, NULL),
(4, 71, '0000-00-00', '2019-03-16', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-03-22', '2019-03-22', 0, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(5, 56, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, '', '2019-04-01', '2019-05-31', 2, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(6, 59, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, '', '2019-04-01', '2019-05-27', 1, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(7, 63, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-01-01', '2019-04-04', 3, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(8, 67, '0000-00-00', '2019-04-05', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-01-06', '2019-04-03', 2, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(9, 63, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-04-01', '2019-04-04', 0, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(10, 59, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-03-31', '2019-04-04', 0, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL),
(11, 63, '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', 1, '', '2019-04-01', '2019-04-05', 0, '', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `place` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `participant-num` int(11) NOT NULL,
  `presenter` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `presenter-degree` int(1) DEFAULT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `participant` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`id`, `name`, `place`, `participant-num`, `presenter`, `presenter-degree`, `start-date`, `end-date`, `participant`) VALUES
(1, 'das', 'sad', 0, 'sad', NULL, '0000-00-00', '0000-00-00', ' , '),
(2, 'ds', 'dsf', 0, 'fd', NULL, '0000-00-00', '0000-00-00', ' , '),
(3, 'عنوان', 'مكان', 454, 'مشرف', 2, '0000-00-00', '0000-00-00', ' , '),
(4, 'sfd', 'ds', 0, 'dsa', NULL, '0000-00-00', '0000-00-00', ' , '),
(5, 'معرض', 'مكان', 465, 'كباشي', 2, '2019-03-20', '2019-03-12', 'يسشب , '),
(6, 'kabashi', 'fdsds', 0, 'fds', NULL, '0000-00-00', '0000-00-00', ' , '),
(7, 'jhghjjiljkl', 'jknk', 0, 'nmvb', NULL, '0000-00-00', '0000-00-00', ' , '),
(8, 'jhghjjiljkl', 'jknk', 0, 'nmvb', NULL, '0000-00-00', '0000-00-00', ' , '),
(9, 'sda', 'dsf', 32, 'dfas', NULL, '0000-00-00', '0000-00-00', ' , '),
(10, 'test', 'test', 0, 'tests', NULL, '0000-00-00', '0000-00-00', 'sfa , '),
(11, 'g', 'fdsds', 0, 'f', NULL, '0000-00-00', '0000-00-00', ' , '),
(12, 'e', 'e', 0, 'e', NULL, '0000-00-00', '0000-00-00', 'ee , '),
(13, 'd', 'd', 0, 'd', NULL, '0000-00-00', '0000-00-00', ' , '),
(14, 'f', 'f', 0, 'f', NULL, '0000-00-00', '0000-00-00', 'ff , '),
(15, 's', 's', 0, 's', NULL, '0000-00-00', '0000-00-00', ''),
(16, 'x', 'x', 0, 'x', NULL, '0000-00-00', '0000-00-00', ''),
(17, '', '', 0, '', NULL, '0000-00-00', '0000-00-00', ' , '),
(18, 'ds', '', 0, '', NULL, '0000-00-00', '0000-00-00', ' , '),
(19, 'kabashi', 'a', 0, 'ds', NULL, '0000-00-00', '0000-00-00', 'dsd , dsda'),
(20, 'dsa', 'dsa', 0, 'da', NULL, '0000-00-00', '0000-00-00', ''),
(21, 'fs', 'dsa', 0, 'das', NULL, '0000-00-00', '0000-00-00', 'dsa'),
(22, 'dsa', 'dsa', 0, 'sa', NULL, '0000-00-00', '0000-00-00', ''),
(23, 'dsa', 'ewq', 0, 'weq', NULL, '0000-00-00', '0000-00-00', ''),
(24, 'eqw', 'ewq', 0, 'qw', NULL, '0000-00-00', '0000-00-00', ''),
(25, 'ewq', 'eqw', 0, 'eqw', NULL, '0000-00-00', '0000-00-00', ''),
(26, 'eqw', 'eq', 0, 'ewq', NULL, '0000-00-00', '0000-00-00', ''),
(27, 'sda', 'sda', 0, 'dsa', NULL, '0000-00-00', '0000-00-00', ''),
(28, 'dsa', 'da', 0, 'dsa', NULL, '0000-00-00', '0000-00-00', ''),
(29, 'fds', 'fds', 0, 'fds', NULL, '0000-00-00', '0000-00-00', ''),
(30, 'aaaaaaaaaaaaa', 'aaaaaaaaa', 0, 'aaaaaaaaaaaaaa', NULL, '0000-00-00', '0000-00-00', ''),
(31, 'bbbbbbbbb', 'bbbbbbbbbbbb', 0, 'bbbbbbbbbbbbb', NULL, '0000-00-00', '0000-00-00', 'bbbbbb , bbbbbbb , bbbbbbbbb'),
(32, 'ccccccccc', 'cccccccccc', 0, 'ccccccccc', NULL, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `foreign_teacher`
--

CREATE TABLE `foreign_teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `edu` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `collage` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `receive` int(11) DEFAULT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foreign_teacher`
--

INSERT INTO `foreign_teacher` (`id`, `name`, `edu`, `collage`, `receive`, `start-date`, `end-date`, `reason`) VALUES
(1, 'كباشي الطاهر', 'الملك فهد', 'العلوم', 8, '0000-00-00', '0000-00-00', ''),
(2, 's', 's', '', 8, '2019-03-12', '0000-00-00', ''),
(3, 'sf', 'ds', '', 12, '2019-03-06', '0000-00-00', ''),
(4, 'كباشي الطاهر', 'الملك فهد', 'العلوم', 7, '2019-03-06', '2019-03-06', ''),
(5, 'كباشي الطاهر', 'q', 'نمبتشسميةب نسيبىشم', 11, '2019-02-26', '2019-03-29', 'a'),
(6, 'كباشي الطاهر', 's', 'test', NULL, '0000-00-00', '0000-00-00', 'fs');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `nameAr` varchar(64) NOT NULL,
  `nameEn` varchar(64) NOT NULL,
  `editor` varchar(64) NOT NULL,
  `publishPaperf` int(1) DEFAULT NULL,
  `publishElecf` int(1) DEFAULT NULL,
  `publishArf` int(1) DEFAULT NULL,
  `publishEnf` int(1) DEFAULT NULL,
  `spreadPaperf` int(1) DEFAULT NULL,
  `spreadElecf` int(1) DEFAULT NULL,
  `firstPublishDate` text NOT NULL,
  `currentPublishPaper` int(16) DEFAULT NULL,
  `numPaperInPublish` tinytext NOT NULL,
  `numPaperInYear` tinytext NOT NULL,
  `internalArbitrationf` int(1) DEFAULT NULL,
  `externalArbitrationf` int(1) DEFAULT NULL,
  `numArbitrator` tinytext NOT NULL,
  `paidArbitration` tinytext NOT NULL,
  `freeArbitrationf` int(1) DEFAULT NULL,
  `stopReason` text NOT NULL,
  `incomeResource` text NOT NULL,
  `publishArea` text NOT NULL,
  `journalAssets` text NOT NULL,
  `journalHr` text NOT NULL,
  `journalProblem` text NOT NULL,
  `journalSolution` text NOT NULL,
  `impactFactor` int(16) DEFAULT NULL,
  `email` varchar(16) NOT NULL,
  `phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `nameAr`, `nameEn`, `editor`, `publishPaperf`, `publishElecf`, `publishArf`, `publishEnf`, `spreadPaperf`, `spreadElecf`, `firstPublishDate`, `currentPublishPaper`, `numPaperInPublish`, `numPaperInYear`, `internalArbitrationf`, `externalArbitrationf`, `numArbitrator`, `paidArbitration`, `freeArbitrationf`, `stopReason`, `incomeResource`, `publishArea`, `journalAssets`, `journalHr`, `journalProblem`, `journalSolution`, `impactFactor`, `email`, `phone`) VALUES
(1, 'altahir', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', 0, '', ''),
(2, 'da', 'ad', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', 0, '', ''),
(3, 'sad', 'da', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', 0, '', ''),
(4, '', 'gh', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '', NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', 0, '', ''),
(5, 'مجلة الدراسات التاريخية', 'journal of historical studies', 'kabashi altahir alamin', 1, 2, 1, 1, 4, 4, 'عام 2006', 4548, '19', '49 كل شهر', 2, 3, '45', 'احيانا', 4, 'بسشيب سيشب يسب', 'يبشس  سيشب', 'كمبسين , بسيشب', 'يسبش  يسبش  شيب  شيسب', 'يسشبسب يسشب شيب', 'بشي بيسش بشيس', 'بسيشبشيس يسشب بشس', 87, 'ka@fsa', '09645656564'),
(6, 'd', 'k', 'k', 1, 2, 1, 1, 1, 1, '', 0, '', '', 1, 2, '', '', 2, '', '', '', '', '', '', '', 0, '', ''),
(7, 's', 's', 's', 2, 2, 4, 2, 2, 1, '', 0, '', '', 2, 3, '', '', 2, '', '', '', '', '', '', '', 0, '', ''),
(8, 'عربي', 'english', 'رئيس', 1, 1, 2, 2, 4, 4, 'تاريخ اوا اصدار', 100, 'عدد الاوراق في كل إصدارة', 'عدد مرات الإصدار في السنة', 3, 3, 'عدد المحكمين', 'مدفوع', 3, 'اسباب و فترات توقف الاصدار', 'مصادر دخل ان وجدت', 'مجالات النشر', 'مقتنيات المجلة', 'الموار البشرية (العاملين بالمجلة', 'المشاكل', 'الحلول', 200, 'email@r', '09546548945'),
(9, 'test', 'test', 'afsd', 1, 1, 1, 1, 1, 1, '', 0, '', '', 3, 3, '', '', 1, '', '', '', '', '', '', '', 0, '', ''),
(10, 'kabashiiiiiiiiii', 'kaba', 'hjkh', 1, 1, 2, 2, 1, 2, '', 0, '', '', 3, 1, '', '', 2, '', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `research-name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `researcher-name-id` int(11) DEFAULT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `donor` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` int(1) NOT NULL,
  `rate` int(3) NOT NULL,
  `abstract` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `device` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `research-name`, `researcher-name-id`, `start-date`, `end-date`, `donor`, `amount`, `currency`, `rate`, `abstract`, `device`) VALUES
(135, 'dfas', 54, '2019-03-14', '2019-03-22', '', 0, 0, 0, '', ' , '),
(137, 'kabashi', 56, '0000-00-00', '2019-03-14', '', 0, 0, 0, '', ' , '),
(138, 'sdf', 57, '2019-03-14', '2019-03-20', '', 0, 0, 0, '', ' , '),
(139, 's', 58, '2019-03-14', '2019-02-26', '', 0, 0, 0, '', ' , '),
(140, 'a', 59, '2019-03-07', '2019-03-14', 'a', 0, 0, 0, '', ' , '),
(141, 'a', 56, '2019-03-13', '2019-03-05', 'a', 0, 0, 0, '', ' , '),
(142, 'w', 54, '2019-02-28', '2019-03-05', '', 0, 0, 0, '', ' , '),
(143, 'sad', 56, '2019-03-15', '2019-03-13', '', 0, 0, 0, '', ' , '),
(144, 'kkkkkkkkkkk', 56, '2019-03-01', '2019-03-13', '', 0, 0, 0, '', ' , '),
(145, 'dsr', 63, '2019-03-22', '2019-03-30', 'جامعة الخرطوم', 455, 2, 99, 'تايستنب تينسبثش نشستبى كحشينلمكي ينستشبنم يسنشتبنى سينشبان', 'يسمب , نميسى , نميسب , ةبنمشسة ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(146, 'مشروع منسيتب نيسىبمش نبسشمةب نسيشةبى', 64, '2019-03-07', '2019-03-23', 'سبمكش سمنيبةشم نمشيسبةم', 5855655, 2, 0, '', ' , '),
(147, 'fdssfdsfa', 65, '2019-03-23', '2019-03-23', 'klfdsjflksm', 320, 1, 3, 'klfjdelsjlkskjd f eiofjas fjldsfds jflk dsalkfjlksda jfl dsflkj dslflkjdsflkdslk flds fkdsj klfdskfj', 'mkldsfamlk , lkdsmfl , mdklfsjl ,  ,  ,  ,  ,  ,  , '),
(148, 'منيبتسن يسنبتمشى نيشسىبم نسميىبشم', 67, '2019-03-15', '2019-03-22', 'نسبشتم نسشىبم نشيىسبنش شنيسبى', 44, 2, 45, 'نمصيثتب نتيسشبىن بتنسيشىب تس ينبسينبىنيسب نتيشسىبن شنستيبى نيسشبىم يسشنةبنميسى نتيشبىن سنتي ب يبى نشسي', 'جهاز 1 , جهاز 4 , جهاز 3 , جهاز 2 ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(149, 'df', 68, '2019-03-08', '2019-03-07', '', 0, 0, 0, '', 'يبسش - بشسي - بيسش - بشسي -  -  -  -  -  -  -  -  -  - '),
(150, 'يس', 64, '2019-03-09', '2019-03-06', '', 0, 0, 0, '', 'يشسبشسبيبسش'),
(151, 'ك', 69, '2019-03-15', '2019-03-14', '', 0, 0, 0, '', 'شيب ‘ بشيس ‘ يشي ‘  ‘  ‘  ‘  ‘  ‘  ‘ '),
(152, 'kled', 70, '2019-03-30', '2019-03-07', '', 0, 0, 78, 'dflkan fjksdf adsjkf', 'dsjkf , klfdsma , mkldsflan ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(153, 'fa', 68, '2019-03-09', '2019-03-19', 'dsf', 32, 2, 0, 'saf', 'fas , dsfaf , sfda ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(154, 'test', 71, '2019-03-14', '2019-03-13', '', 0, 0, 0, 'sf', 'fsd , fdssdf , fsdfd , dfsf ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(155, 'a', 56, '2019-03-07', '2019-03-05', '', 0, 0, 0, '', 'a , t , f ,  ,  ,  ,  ,  ,  , '),
(156, 'd', 72, '2019-03-15', '2019-03-11', '', 0, 0, 0, '', 'as , 33 , df , ew ,  ,  ,  ,  ,  ,  ,  ,  ,  , '),
(157, 'ds', 56, '2019-03-01', '2019-03-14', '', 0, 0, 0, '', 'test1 , etst , fs , '),
(158, 'ds', 56, '2019-03-16', '2019-03-07', '', 0, 0, 0, '', 'test , sd , test'),
(159, 'sda', 60, '2019-04-05', '2019-04-08', '', 0, 0, 0, '', ''),
(160, 'dsa', 59, '2019-04-13', '2019-04-12', '', 0, 0, 0, '', ''),
(161, 'sad', 70, '2019-04-12', '2019-04-18', '', 0, 0, 0, '', ''),
(162, 'dsa', 65, '2019-04-01', '2019-04-05', '', 0, 0, 0, '', ''),
(163, 'xds', 65, '2019-04-01', '2019-04-05', '', 0, 0, 0, '', 'dsa'),
(164, 'das', 57, '2019-04-01', '2019-04-13', '', 0, 0, 0, '', ''),
(165, 'we', 54, '2019-04-07', '2019-04-27', '', 0, 0, 0, '', ''),
(166, 'dsa', 56, '2019-04-06', '2019-04-27', '', 0, 0, 0, '', ''),
(167, 'kabashiiiiiiiiiiiiiiii', 73, '2019-04-18', '2019-04-09', 'a', 0, 0, 0, '', ''),
(168, 'dsa', 74, '2019-04-26', '2019-04-25', '', 0, 0, 0, '', ''),
(169, 'dsa', 73, '2019-04-13', '2019-04-12', '', 0, 0, 0, '', ''),
(170, 'adsf', 51, '2019-04-01', '2019-04-19', '', 0, 0, 0, '', 'dsf , fds');

-- --------------------------------------------------------

--
-- Table structure for table `selector`
--

CREATE TABLE `selector` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selector`
--

INSERT INTO `selector` (`id`, `name`) VALUES
(1, 'نعم'),
(2, 'لا'),
(3, 'احيانا'),
(4, 'غير معلوم');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dept_id` int(1) DEFAULT NULL,
  `degree_id` int(1) DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `dept_id`, `degree_id`, `phone`) VALUES
(51, 'fds', NULL, 1, ''),
(52, 'dsf', NULL, 1, ''),
(54, 'sdf', NULL, 2, ''),
(56, 'kabashi', 3, 2, ''),
(57, 'sda', 3, 1, ''),
(58, 's', 4, 1, ''),
(59, 'a', 3, 1, ''),
(60, 'altahir', 5, 3, ''),
(61, 'ahmed', 5, 1, '09122545865'),
(62, 'علي', 5, 3, '4545453'),
(63, 'كباشي الطاهر الامين ', 4, 2, '0912788430'),
(64, 'نميسبمش ينبةمن شسمبنتسش', 3, 3, ''),
(65, 'klmsfm dsalkmfsd lkml', 5, 2, ''),
(66, 'الاسم', 4, 2, '0993321969'),
(67, 'مكيسبنك مسيبشنمك منسيةبم نسيشمبة', NULL, 3, ''),
(68, 'fa', NULL, 1, ''),
(69, 'لب', NULL, 2, ''),
(70, 'fdsa', 3, 2, ''),
(71, 'test', 5, 1, ''),
(72, 'd', 5, 2, ''),
(73, 'sad', 5, 3, ''),
(74, 'dsa', 5, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `place` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `participant-num` int(11) NOT NULL,
  `presenter` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `presenter-degree` int(1) DEFAULT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `participant` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `name`, `place`, `participant-num`, `presenter`, `presenter-degree`, `start-date`, `end-date`, `participant`) VALUES
(1, 'd', '', 0, 'd', NULL, '0000-00-00', '0000-00-00', ' , '),
(2, 'تيسش تشب', 'انستيباشنت', 54, 'نتساشين', 1, '2019-03-07', '2019-03-28', 'نتسشبىس , '),
(3, 'سنبشيت', '', 0, 'ينسش', NULL, '0000-00-00', '0000-00-00', 'شنسيت , '),
(4, 'مكيسنش', 'مكشسنبي', 0, 'شيسبمكن', NULL, '0000-00-00', '0000-00-00', '32 , '),
(5, 'test', '', 0, 'test', NULL, '0000-00-00', '0000-00-00', 'test , '),
(6, 'ds', 'ds', 0, 'ds', NULL, '0000-00-00', '0000-00-00', ''),
(7, 'sd', 'ds', 0, 'ds', NULL, '0000-00-00', '0000-00-00', 'ds , ds');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `place` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `participant-num` int(11) NOT NULL,
  `presenter` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `presenter-degree` int(1) DEFAULT NULL,
  `start-date` date NOT NULL,
  `end-date` date NOT NULL,
  `participant` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `name`, `place`, `participant-num`, `presenter`, `presenter-degree`, `start-date`, `end-date`, `participant`) VALUES
(1, 'we', '', 0, 'we', NULL, '0000-00-00', '0000-00-00', ' , '),
(2, 'العنوان', 'المكان', 24, 'كباشي الطاهر', 2, '2019-03-17', '2019-03-18', 'سنميبى , '),
(3, 'test', '', 0, 'test', NULL, '0000-00-00', '0000-00-00', 'test , '),
(4, 'fd', '', 0, 'fd', NULL, '0000-00-00', '0000-00-00', 'fd , test , test'),
(5, 'ds', 'ds', 0, 'sd', NULL, '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collage`
--
ALTER TABLE `collage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collage_id` (`collage_id`);

--
-- Indexes for table `discharge`
--
ALTER TABLE `discharge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `edu-confirmf` (`edu-confirmf`),
  ADD KEY `department-confirmf` (`department-confirmf`),
  ADD KEY `confirm-coveragef` (`confirm-coveragef`),
  ADD KEY `collage-confirmf` (`collage-confirmf`),
  ADD KEY `board-confirmf` (`board-confirmf`),
  ADD KEY `edu-countryf` (`edu-countryf`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenter-degree` (`presenter-degree`);

--
-- Indexes for table `foreign_teacher`
--
ALTER TABLE `foreign_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receive` (`receive`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publishPaperf` (`publishPaperf`),
  ADD KEY `publishElecf` (`publishElecf`),
  ADD KEY `publishArf` (`publishArf`),
  ADD KEY `publishEnf` (`publishEnf`),
  ADD KEY `spreadPaperf` (`spreadPaperf`),
  ADD KEY `spreadElecf` (`spreadElecf`),
  ADD KEY `internalArbitrationf` (`internalArbitrationf`),
  ADD KEY `externalArbitrationf` (`externalArbitrationf`),
  ADD KEY `freeArbitrationf` (`freeArbitrationf`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_ibfk_1` (`researcher-name-id`);

--
-- Indexes for table `selector`
--
ALTER TABLE `selector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `teacher_ibfk_2` (`degree_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenterDegree` (`presenter-degree`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenter-degree` (`presenter-degree`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collage`
--
ALTER TABLE `collage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `discharge`
--
ALTER TABLE `discharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `foreign_teacher`
--
ALTER TABLE `foreign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `selector`
--
ALTER TABLE `selector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`collage_id`) REFERENCES `collage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discharge`
--
ALTER TABLE `discharge`
  ADD CONSTRAINT `discharge_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_2` FOREIGN KEY (`edu-confirmf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_3` FOREIGN KEY (`department-confirmf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_4` FOREIGN KEY (`confirm-coveragef`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_5` FOREIGN KEY (`collage-confirmf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_6` FOREIGN KEY (`board-confirmf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `discharge_ibfk_7` FOREIGN KEY (`edu-countryf`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD CONSTRAINT `exhibition_ibfk_1` FOREIGN KEY (`presenter-degree`) REFERENCES `degree` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `foreign_teacher`
--
ALTER TABLE `foreign_teacher`
  ADD CONSTRAINT `foreign_teacher_ibfk_1` FOREIGN KEY (`receive`) REFERENCES `collage` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`publishPaperf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_2` FOREIGN KEY (`publishElecf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_3` FOREIGN KEY (`publishArf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_4` FOREIGN KEY (`publishEnf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_5` FOREIGN KEY (`spreadPaperf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_6` FOREIGN KEY (`spreadElecf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_7` FOREIGN KEY (`internalArbitrationf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_8` FOREIGN KEY (`externalArbitrationf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_ibfk_9` FOREIGN KEY (`freeArbitrationf`) REFERENCES `selector` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_ibfk_1` FOREIGN KEY (`researcher-name-id`) REFERENCES `teacher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degree` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_ibfk_1` FOREIGN KEY (`presenter-degree`) REFERENCES `degree` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`presenter-degree`) REFERENCES `degree` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
