-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2017 at 02:02 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellness_consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `admin_name`, `email`, `phone`) VALUES
(1, 'admin', 'admin', 'Vimal Ghogari', NULL, NULL),
(2, 'admin', 'harami', 'Administrative', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(500) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image_path`, `is_active`, `date`) VALUES
(1, 'slide1.jpg', '0', '2016-08-15 07:10:05'),
(2, 'slide2.jpg', '1', '2016-08-15 07:10:05'),
(3, 'slide3.jpg', '1', '2016-08-15 07:10:05'),
(4, 'slide4.jpg', '0', '2016-08-15 07:10:05'),
(5, 'slide5.jpg', '1', '2016-08-15 13:22:12'),
(7, '1472197627.jpg', '0', '2016-08-26 07:47:07'),
(8, '1472197671.jpg', '0', '2016-08-26 07:47:51'),
(9, '1472235171.jpg', '0', '2016-08-26 18:12:51'),
(10, '1472235605.jpg', '0', '2016-08-26 18:20:05'),
(11, '1472235642.jpg', '1', '2016-08-26 18:20:42'),
(12, '1472235832.jpg', '1', '2016-08-26 18:23:52'),
(13, '1474192820.jpg', '1', '2016-09-18 10:00:20'),
(14, '1476550450.jpg', '1', '2016-10-15 16:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'China'),
(2, 'Georgia'),
(6, 'USA'),
(7, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `university` varchar(500) DEFAULT NULL,
  `establishment_year` varchar(10) DEFAULT NULL,
  `available_seat` int(11) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `description` text,
  `course_state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_state_id` (`course_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `university`, `establishment_year`, `available_seat`, `website`, `description`, `course_state_id`) VALUES
(2, 'European Teaching University', 'no', '', 0, '', '<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_text_1">\r\n<p style="text-align: justify;"><span style="color:#696969"><img alt="" src="/kcfinder/upload/images/european-teaching-university-logo.png" style="height:150px; width:624px" /></span></p>\r\n\r\n<p style="text-align: justify;"><span style="color:#696969">European Teaching University (ETU), Georgia was founded in 1995. The university is focused on training using the European model, competitive to grow up students according to international demands.</span></p>\r\n\r\n<p style="text-align: justify;"><span style="color:#696969">European Teaching&nbsp; University is staffed by qualified and experienced teachers as well as invited specialists who got educated in the leading universities of Europe. This contributes to the international experience and high-quality, innovation-based learning in ETU.</span></p>\r\n\r\n<p style="text-align: justify;"><span style="color:#696969">European Teaching University is equipped with the modern technological base and a diverse library with a collection of both paper and e-books. Classrooms are equipped with projectors, display systems and the essential equipment for appropriate programs, which provides all the necessities for quality education.</span></p>\r\n\r\n<p style="text-align: justify;"><span style="color:#696969">Many international students are studying at the institution, including the students from Ukraine, India, Azerbaijan, Pakistan, etc. The university takes services of a specialized agency, which helps international students with shelter, food and security related issues.</span></p>\r\n\r\n<h2 style="text-align: justify;"><span style="color:#696969"><span style="font-size:24px"><strong>Partner Institutes of the University</strong></span></span></h2>\r\n\r\n<p style="text-align: justify;"><span style="color:#696969">The university has more than 20 Clinics and Medical Centers as partners. These includes:</span></p>\r\n\r\n<ul>\r\n	<li style="text-align: justify;"><span style="color:#696969">Chichua Medical Centre &ldquo;Mzera&rdquo;</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Saint Michael Archangel Multi-Profile Clinical Hospital</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Al. Tsulukidze Urology Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Tbilisi Mental Health Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Mental Health and Drug Addiction Prevention Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Institute of Neurology and Neurosurgery</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Clinical Pathology Research and Practice Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Clinical Medicine / Research Institute</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Pediatric Private Clinic</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Tbilisi Central Hospital</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Acad. O. Ghudushauri National Medical Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Georgian-American Family Medicine Clinic&ldquo;</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">S. Virsaladze Research Institute of Medical Parasitology and Tropical Medicines.</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">The National Center for Ear, Nose and Throat Diseases, Japaridz-&nbsp;&nbsp; Kevanishvili Clinic</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Medical Diagnostic Center</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Amtel Hospital</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Hepatology Clinic</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Hepa</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Amtel Hospital First Clinic</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Deka</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">S/R National Center for Dermatology and Venereology</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Globaltest</span></li>\r\n	<li style="text-align: justify;"><span style="color:#696969">Balneological Resort Tbilisi SPA &ndash; National Scientific and Practical Center of Health and Medical Rehabilitation</span></li>\r\n</ul>\r\n</div>', 14),
(3, 'David Tvildiani Medial University', 'European Teaching University', '', 0, '', '', 14),
(4, 'Suzhou University', 'Suzhou University', '', 0, '', '<p><span style="font-size:22px"><a class="link4" href="http://www.medicochina.com/universitydetails.php?id=2"><strong>Suzhou University </strong></a></span></p>\r\n\r\n<p><img alt="" src="/kcfinder/upload/images/Suzhou%20University1.jpg" style="height:375px; width:500px" /></p>\r\n\r\n<table border="0" cellpadding="3" cellspacing="0" style="height:577px; width:606px">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Type of university :</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">Government</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nearest Airport :</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">Shanghai</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>City:</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">Suzhou</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Total No of Students:</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">55000</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>International Students:</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">2500</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Accommodation:</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">Accommodation 1. Living facilities on campus: Library/ Reading Room/Network Center/Laboratories 2.Students Services: International Students&iexcl;&macr; Office/Sports Center/ Media Center/Infirmary /Education Supermarket/ Bus stop 3.Housing and Food: SU provides on-campus lodging with canteens. International student apartments have single and double-suite rooms.Furniture, air-conditioner, TV, telephone, internet connection and independent bathroom with shower are provided in the rooms. And also there is public laundry. International students can choose to take their meals at the canteen for international students or the canteen for local students. The canteens serve breakfast, lunch, supper and all kinds of snacks everyday.</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Postcode:</strong></td>\r\n			<td><span style="color:#808080"><span style="font-family:times new roman,times,serif">215006</span></span></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Address:</strong></td>\r\n			<td>\r\n			<h3><span style="font-size:14px"><span style="color:rgb(128, 128, 128)"><span style="font-family:times new roman,times,serif">1. Shiqian Street, Suzhou,Jiangsu &nbsp;China</span></span></span></h3>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h3>Admission</h3>\r\n\r\n<ul>\r\n	<li><span style="color:#808080">Applicant should be 17 years completed.</span></li>\r\n	<li><span style="color:#808080">Personal application for Admission.</span></li>\r\n	<li><span style="color:#808080">High School Certificate</span></li>\r\n	<li><span style="color:#808080">Transcript from High School</span></li>\r\n	<li><span style="color:#808080">One letter of recommendation</span></li>\r\n	<li><span style="color:#808080">University Application Form, you can download from the website.</span></li>\r\n	<li><span style="color:#808080">Passport</span></li>\r\n	<li><span style="color:#808080">&nbsp;University&nbsp;reserves the right of selection based upon the students previous academic performance </span><span style="color:#808080">and will have interview with the applicants (if needed), and then issues the letter of admission and the visa application form.</span></li>\r\n</ul>\r\n\r\n<p><span style="color:#808080">&nbsp;&nbsp;&nbsp; Incomplete application material will not be considered.</span></p>\r\n\r\n<p>&nbsp;</p>', 15);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
(4, 'MBBS'),
(5, 'BDS'),
(6, 'MD'),
(7, 'MS'),
(8, 'MDS'),
(9, 'CPS'),
(10, 'FCPS'),
(11, 'BAMS'),
(12, 'BHMS'),
(13, 'BPT'),
(14, 'B-TECH (Biotech)'),
(15, 'BSC Nursing'),
(16, 'Pharmacy'),
(17, 'GNM'),
(18, 'MCA'),
(19, 'MBA'),
(20, 'M-Tech'),
(21, 'D2D'),
(22, 'BE/B-Tech'),
(23, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `course_state`
--

CREATE TABLE IF NOT EXISTS `course_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `course_state`
--

INSERT INTO `course_state` (`id`, `course_id`, `state_id`) VALUES
(14, 4, 9),
(15, 4, 10),
(16, 4, 11),
(17, 4, 12),
(18, 5, 9),
(19, 5, 10),
(20, 5, 11),
(21, 5, 12),
(22, 6, 9),
(23, 6, 10),
(24, 6, 11),
(25, 6, 12),
(26, 7, 9),
(27, 7, 10),
(28, 7, 11),
(29, 7, 12),
(30, 8, 9),
(31, 8, 10),
(32, 8, 11),
(33, 8, 12),
(38, 10, 9),
(39, 10, 10),
(40, 10, 11),
(41, 10, 12),
(42, 11, 9),
(43, 11, 10),
(44, 11, 11),
(45, 11, 12),
(46, 12, 9),
(47, 12, 10),
(48, 12, 11),
(49, 12, 12),
(50, 13, 9),
(51, 13, 10),
(52, 13, 11),
(53, 13, 12),
(54, 14, 9),
(55, 14, 10),
(56, 14, 11),
(57, 14, 12),
(58, 15, 9),
(59, 15, 10),
(60, 15, 11),
(61, 15, 12),
(62, 16, 9),
(63, 16, 10),
(64, 16, 11),
(65, 16, 12),
(66, 17, 9),
(67, 17, 10),
(68, 17, 11),
(69, 17, 12),
(70, 18, 11),
(71, 19, 9),
(72, 19, 10),
(73, 19, 12),
(74, 20, 9),
(75, 20, 10),
(76, 20, 11),
(77, 20, 12),
(78, 21, 9),
(79, 21, 10),
(80, 21, 11),
(81, 21, 12),
(82, 22, 9),
(83, 22, 10),
(84, 22, 11),
(85, 22, 12),
(86, 23, 9),
(87, 23, 10),
(88, 23, 11),
(89, 23, 12),
(90, 9, 11);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(500) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_path`, `title`, `is_active`, `cat_id`) VALUES
(1, '1474215547.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(2, '1474215557.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(3, '1474215566.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(4, '1474215586.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(5, '1474215596.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(6, '1474215609.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2),
(7, '1474215660.jpeg', 'DAVID TVILDIANI MEDICAL UNIVERSITY', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pecentage` varchar(5) NOT NULL,
  `message` text,
  `user_ip` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'is inquiry read by admin?',
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `student_name`, `father_name`, `dob`, `address`, `mobile_no`, `email`, `pecentage`, `message`, `user_ip`, `course_id`, `state_id`, `date_time`, `is_read`) VALUES
(23, 'Ashish Rana', '', '1970-01-01', NULL, '8866280326', 'ashisharana@yahoo.com', '', NULL, '49.34.182.26', 4, 0, '2016-10-02 15:19:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `is_active`) VALUES
(9, 'Georgia', '1'),
(10, 'China', '1'),
(11, 'India', '1'),
(12, 'USA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_attend` enum('0','1') NOT NULL DEFAULT '0',
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `name`, `phone`, `email`, `date_time`, `is_attend`, `course_id`) VALUES
(14, 'morli', '7046360433', NULL, '2016-08-31 10:17:43', '1', 6),
(15, 'kalpit', '8530622330', NULL, '2016-09-18 08:50:59', '1', 4),
(16, 'vikas', '8530622330', NULL, '2016-09-18 10:21:48', '1', 9),
(17, 'sas', '123', NULL, '2016-09-18 14:42:42', '1', 18),
(18, 'jay', '9879645567', NULL, '2016-09-19 03:41:14', '1', 9),
(19, 'vandana', '9054256757', NULL, '2016-09-19 05:42:26', '1', 17),
(20, 'shourya', '8530622330', NULL, '2016-09-21 18:01:57', '1', 4),
(21, 'dr giri', '9904823451', NULL, '2016-09-23 06:24:53', '1', 9),
(22, 'sandip', '875326657986', NULL, '2016-09-23 13:26:59', '1', 4),
(23, 'Ashish', '8866280326', NULL, '2016-10-02 15:18:27', '1', 4),
(24, 'darshan', '75748648488', NULL, '2016-10-11 02:21:54', '1', 4),
(25, 'tushar', '87532665884', NULL, '2016-10-15 16:56:32', '1', 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `college`
--
ALTER TABLE `college`
  ADD CONSTRAINT `college_ibfk_1` FOREIGN KEY (`course_state_id`) REFERENCES `course_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_state`
--
ALTER TABLE `course_state`
  ADD CONSTRAINT `course_state_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_state_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
