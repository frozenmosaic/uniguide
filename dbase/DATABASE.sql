-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 11, 2015 at 06:50 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uni_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `names` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `names`) VALUES
(1, 'Vy Huynh'),
(2, 'Vy Ung');

-- --------------------------------------------------------

--
-- Table structure for table `major_name`
--

CREATE TABLE `major_name` (
`id` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `class` tinyint(4) NOT NULL,
  `email` text NOT NULL,
  `birth_date` tinyint(4) NOT NULL,
  `birth_month` tinyint(4) NOT NULL,
  `birth_year` tinyint(4) NOT NULL,
  `facebook` text NOT NULL COMMENT 'link'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_criteria`
--

CREATE TABLE `school_criteria` (
  `school_id` int(11) NOT NULL,
  `criteria` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '1 -> gpa; 2 -> essay; 3 -> character; 4 -> eca; 5 -> rec_let; 6 -> interview; 7 -> test_scores',
  `importance` varchar(5) NOT NULL COMMENT '1 -> very important; 2 -> important; 3 -> considered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_facts`
--

CREATE TABLE `school_facts` (
`id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` text CHARACTER SET utf8 NOT NULL,
  `type` tinytext CHARACTER SET utf8 NOT NULL,
  `rank` smallint(6) NOT NULL,
  `population` smallint(6) NOT NULL,
  `city` tinytext CHARACTER SET utf8 NOT NULL,
  `state` tinytext CHARACTER SET utf8 NOT NULL,
  `ed` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ea` varchar(20) CHARACTER SET utf8 NOT NULL,
  `rd` varchar(20) CHARACTER SET utf8 NOT NULL,
  `wl` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tuition` mediumint(9) NOT NULL,
  `boarding` mediumint(9) NOT NULL,
  `location_type` tinytext CHARACTER SET utf8 NOT NULL,
  `class_size` varchar(20) CHARACTER SET utf8 NOT NULL,
  `intl_ratio` tinyint(4) NOT NULL,
  `gender_ratio` tinyint(4) NOT NULL,
  `vsa` tinyint(1) NOT NULL,
  `no_of_vn` tinytext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_major`
--

CREATE TABLE `school_major` (
  `school_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `popular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_ops`
--

CREATE TABLE `school_ops` (
`id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `school_id` smallint(6) NOT NULL,
  `provider_id` smallint(6) NOT NULL,
  `vn_admit` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `vn_edu_bg` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `weather` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `clothing` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `stores` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `special_pg` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `aca_difficulty` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `aca_compare` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `student_attitude` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `prof_evaluation` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `facilities` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `expenses_est` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `dining_locations` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `food` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rooms` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `typical_student` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `political_attitude` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `school_spirit` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `school_pride` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `solidarity` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `traditions` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `clubs` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `activities` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `party_scene` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `religious_aff` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rivalry` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `typical_day` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `memorable_events` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `10_likes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `10_dislikes` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_sat`
--

CREATE TABLE `school_sat` (
  `school_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `range` int(11) NOT NULL COMMENT '1 -> 700-800; 2 -> 600-690; 3 -> 500-590; 4 -> 400-490; 5 -> 300-390; 6 -> 200-290',
  `percentile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `major_name`
--
ALTER TABLE `major_name`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_facts`
--
ALTER TABLE `school_facts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_ops`
--
ALTER TABLE `school_ops`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `major_name`
--
ALTER TABLE `major_name`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_facts`
--
ALTER TABLE `school_facts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_ops`
--
ALTER TABLE `school_ops`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
