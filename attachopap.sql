-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 11:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attachopap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Shadrack Onyango', 'shadrack@admin.com', 'password'),
(2, 'Doreen Korir', 'doreen@admin.com', 'password'),
(3, 'Annabel Blessing', 'annabel@admin.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `cv_details`
--

CREATE TABLE `cv_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `hobbies_interests` text DEFAULT NULL,
  `projects` text DEFAULT NULL,
  `aspirations` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cv_details`
--

INSERT INTO `cv_details` (`id`, `user_id`, `about`, `skills`, `hobbies_interests`, `projects`, `aspirations`, `phone_number`, `email`, `linkedin`) VALUES
(1, 44, 'I\'m a very abled developer. With 20 years of experience in the industry. That being said I\'ve been in this game more that your God father.', 'Communication, Problem solving, Leadership', 'Photography, Travelling, Cooking', 'IDE, Open Source Master', 'To be better than the best.', '0757963318', 'odpsha@gmail.com', 'linkedin.com/in/shadrack-onyango-729b0a213');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `business_license` varchar(255) DEFAULT NULL,
  `businessReg` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `name`, `email`, `password`, `business_license`, `businessReg`, `status`) VALUES
(4, 'Wipro Technologies ', 'admin@wipro.com', 'password', NULL, NULL, NULL),
(10, 'Mahindra', 'admin@mahindra.com', 'password', NULL, NULL, NULL),
(11, 'Tata Consultancy Services', 'admin@tcs.com', 'password', NULL, NULL, NULL),
(14, 'Infosys', 'admin@infosys.com', 'password', NULL, NULL, NULL),
(15, 'Paladion Networks', 'admin@paladion.com', 'password', NULL, NULL, NULL),
(16, 'Accenture', 'admin@accenture.com', 'password', NULL, NULL, NULL),
(26, 'Microsoft', 'admin@microsoft.com', 'password', NULL, NULL, NULL),
(27, 'Spark Foundation', 'admin@sf.com', 'password', NULL, NULL, NULL),
(28, 'Facebook', 'admin@facebook.com', 'password', NULL, NULL, NULL),
(29, 'Intel', 'admin@intel.com', 'password', NULL, NULL, NULL),
(30, 'LTI Mindtree', 'admin@lti.com', 'password', NULL, NULL, NULL),
(31, 'jhkjlk', 'odpsha@gmail.com', 'password', 'uploads/BusinessLicensesDocs/MUMIAS CENTRAL COMPREHENSIVE SCHOOL END.docx', 'uploads/BusinessRegistrationDocs/FEE STRUCTURE-CSMG24660921.pdf', NULL),
(32, 'Shadrack Odipo', 'shadrackonyango30@gmail.com', 'password', 'uploads/BusinessLicensesDocs/MUMIAS CENTRAL COMPREHENSIVE SCHOOL END.docx', 'uploads/BusinessRegistrationDocs/MUMIAS CENTRAL COMPREHENSIVE SCHOOL EN1.pdf', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `jobsapplied`
--

CREATE TABLE `jobsapplied` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobsapplied`
--

INSERT INTO `jobsapplied` (`id`, `date`, `pid`, `sid`, `status`) VALUES
(36, '2023-04-15', 40, 36, 'Accepted'),
(38, '2023-04-15', 43, 36, 'Rejected'),
(39, '2023-04-19', 43, 43, 'Accepted'),
(40, '2023-04-19', 41, 40, 'Applied'),
(41, '2023-04-19', 8, 36, 'Applied'),
(42, '2023-04-19', 41, 38, 'Applied'),
(43, '2023-04-19', 8, 38, 'Applied'),
(44, '2023-04-19', 44, 38, 'Applied'),
(45, '2024-02-10', 6, 44, 'Applied'),
(46, '2024-02-10', 40, 44, 'Applied'),
(47, '2024-02-27', 51, 50, 'Accepted'),
(48, '2024-02-28', 50, 44, 'Rejected'),
(49, '2024-02-28', 6, 37, 'Applied'),
(50, '2024-02-28', 51, 37, 'Applied'),
(51, '2024-02-28', 8, 37, 'Applied'),
(52, '2024-02-28', 51, 38, 'Applied'),
(53, '2024-02-28', 6, 38, 'Applied'),
(54, '2024-02-28', 49, 38, 'Applied'),
(55, '2024-02-28', 40, 38, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `logpost`
--

CREATE TABLE `logpost` (
  `lpid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category` varchar(500) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL,
  `employmentType` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `action` varchar(500) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logpost`
--

INSERT INTO `logpost` (`lpid`, `pid`, `eid`, `name`, `category`, `industry`, `role`, `employmentType`, `status`, `action`, `cdate`) VALUES
(7, 40, 4, 'Product Manager', 'Business Intelligence Jobs', 'IT-Software , Software Services', 'Lead', 'Permanent', 'Open', 'INSERTED', '2023-02-02 10:46:59'),
(8, 41, 29, 'Graphic Designer', 'Graphic Designer Jobs', 'Animation , Gaming', 'Intern', 'Permanent', 'Open', 'INSERTED', '2023-02-02 10:53:40'),
(9, 42, 28, 'Python Developer', 'IT Jobs', 'IT-Software , Software Services', 'Asst. Python Developer ', 'Permanent', 'Open', 'INSERTED', '2023-02-02 11:03:24'),
(10, 6, 14, 'Team Lead (Technical)', 'IT Jobs', 'IT-Software , Software Services', 'Team Lead', 'Permanent', 'open', 'UPDATED', '2023-02-02 11:07:48'),
(11, 8, 16, 'Accounts Manager', 'Accounting Jobs', 'Accounting , Finance', 'Accounts Manager', 'Permanent', 'open', 'UPDATED', '2023-02-02 11:09:58'),
(12, 43, 30, 'Software Engineer', 'IT Jobs', 'IT-Software , Software Services', 'Backend Engg.', 'Permanent', 'Open', 'INSERTED', '2023-04-15 03:22:03'),
(13, 6, 14, 'Team Lead (Technical)', 'IT Jobs', 'IT-Software , Software Services', 'Team Lead', 'Permanent', 'open', 'UPDATED', '2023-04-19 13:58:53'),
(14, 8, 16, 'Accounts Manager', 'Accounting Jobs', 'Accounting , Finance', 'Accounts Manager', 'Permanent', 'open', 'UPDATED', '2023-04-19 13:59:02'),
(15, 40, 4, 'Product Manager', 'Business Intelligence Jobs', 'IT-Software , Software Services', 'Lead', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:06'),
(16, 41, 29, 'Graphic Designer', 'Graphic Designer Jobs', 'Animation , Gaming', 'Intern', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:11'),
(17, 42, 28, 'Python Developer', 'IT Jobs', 'IT-Software , Software Services', 'Asst. Python Developer ', 'Permanent', 'Open', 'UPDATED', '2023-04-19 13:59:17'),
(18, 44, 11, 'Backend Intern', 'System Programming Jobs', 'IT-Software , Software Services', 'Intern', 'Permanent', 'Open', 'INSERTED', '2023-04-19 15:13:19'),
(19, 45, 4, 'Provider', '', '', 'Subscriber', 'Part-Time', 'Open', 'INSERTED', '2024-02-10 18:28:51'),
(20, 46, 15, 'Cleaner', 'Interior Design Jobs', 'Brewery , Distillery', 'Subscriber', '', 'Open', 'INSERTED', '2024-02-26 15:55:25'),
(21, 47, 15, 'Cleaner', 'Interior Design Jobs', 'Brewery , Distillery', 'Subscriber', '', 'Open', 'INSERTED', '2024-02-26 17:02:53'),
(22, 48, 11, 'Teller', 'Bank Jobs', 'Advertising , PR , MR , Event Management', 'Suoer Sub', '', 'Open', 'INSERTED', '2024-02-26 17:31:52'),
(23, 49, 11, 'Shadrack Odipo', 'Accounting Jobs', 'Consumer Electronics , Appliances , Durables', 'Accountant', '', 'Open', 'INSERTED', '2024-02-27 12:39:53'),
(24, 50, 16, 'Provider', 'ERP Jobs', 'Electricals , Switchgears', 'Accountant', '', 'Open', 'INSERTED', '2024-02-27 21:55:10'),
(25, 51, 16, 'tyrtdrsf', 'Application Programming Jobs', 'Chemicals , PetroChemical , Plastic , Rubber', 'hgsfdfeh', '', 'Open', 'INSERTED', '2024-02-27 22:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `eid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `desc` varchar(5000) NOT NULL,
  `compensation` varchar(200) NOT NULL,
  `industry` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `employmentType` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `county` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `date`, `eid`, `name`, `category`, `location`, `desc`, `compensation`, `industry`, `role`, `employmentType`, `status`, `county`, `constituency`) VALUES
(6, '2023-01-04 18:30:00', 14, 'Team Lead (Technical)', 'IT Jobs', '8', 'Aid a group of programmers.', '100000-150000', 'IT-Software , Software Services', 'Team Lead', 'Permanent', 'open', '', ''),
(8, '2023-01-04 18:30:00', 16, 'Accounts Manager', 'Accounting Jobs', '6', 'Experience with accounting software. General Math skills.', '70000-80000', 'Accounting , Finance', 'Accounts Manager', 'Permanent', 'open', '', ''),
(40, '2023-02-01 18:30:00', 4, 'Product Manager', 'Business Intelligence Jobs', '3', 'Communication Skills, Technical Knowledge', '40000-60000', 'IT-Software , Software Services', 'Lead', 'Permanent', 'Open', '', ''),
(41, '2023-02-01 18:30:00', 29, 'Graphic Designer', 'Graphic Designer Jobs', '3', '3D Animation, Adobe products.', '30000-50000', 'Animation , Gaming', 'Intern', 'Permanent', 'Open', '', ''),
(42, '2023-02-01 18:30:00', 28, 'Python Developer', 'IT Jobs', '2', 'Proficiency in Python, Test software components', '40000-60000', 'IT-Software , Software Services', 'Asst. Python Developer ', 'Permanent', 'Open', '', ''),
(43, '2023-04-14 18:30:00', 30, 'Software Engineer', 'IT Jobs', '3 years', 'B.Tech', '20000', 'IT-Software , Software Services', 'Backend Engg', 'Permanent', 'Open', '', ''),
(44, '2023-04-18 18:30:00', 11, 'Backend Intern', 'System Programming Jobs', '1-1.5 years', 'MERN', '25000 - 30000', 'IT-Software , Software Services', 'Intern', 'Permanent', 'Open', '', ''),
(45, '2024-02-09 21:00:00', 4, 'Provider', '', '2', 'Ability to scream', '23', '', 'Subscriber', 'Part-Time', 'Open', '', ''),
(46, '2024-02-25 21:00:00', 15, 'Cleaner', 'Interior Design Jobs', 'Kakamega', 'Ability to scream', 'Array', 'Brewery , Distillery', 'Subscriber', '', 'Open', '', ''),
(47, '2024-02-25 21:00:00', 15, 'Cleaner', 'Interior Design Jobs', 'Kakamega', 'Ability to scream', 'a:5:{i:0;s:6:\"unpaid\";i:1;s:5:\"skill\";i:2;s:11:\"certificate\";i:3;s:10:\"networking\";i:4;s:8:\"jobOffer\";}', 'Brewery , Distillery', 'Subscriber', '', 'Open', '', ''),
(48, '2024-02-25 21:00:00', 11, 'Teller', 'Bank Jobs', 'Gujarati', 'Wewe', 'a:5:{i:0;s:6:\"Unpaid\";i:1;s:5:\"Skill\";i:2;s:11:\"Certificate\";i:3;s:10:\"Networking\";i:4;s:8:\"JobOffer\";}', 'Advertising , PR , MR , Event Management', 'Suoer Sub', '', 'Open', '', ''),
(49, '2024-02-26 21:00:00', 11, 'Shadrack Odipo', 'Accounting Jobs', 'Kakamega', 'Good at accounting', 'a:2:{i:0;s:7:\"Stipend\";i:1;s:5:\"Skill\";}', 'Consumer Electronics , Appliances , Durables', 'Accountant', '', 'Open', '10', '48'),
(50, '2024-02-26 21:00:00', 16, 'Provider', 'ERP Jobs', 'Kakamega', 'Electronic Engineer', 'a:2:{i:0;s:9:\"Transport\";i:1;s:8:\"JobOffer\";}', 'Electricals , Switchgears', 'Accountant', '', 'Open', '34', '183'),
(51, '2024-02-26 21:00:00', 16, 'tyrtdrsf', 'Application Programming Jobs', 'Gujarati', 'rgsfascxrgges', 'a:1:{i:0;s:5:\"Skill\";}', 'Chemicals , PetroChemical , Plastic , Rubber', 'hgsfdfeh', '', 'Open', '20', 'Mwea');

--
-- Triggers `post`
--
DELIMITER $$
CREATE TRIGGER `Existing Row Deleted` AFTER DELETE ON `post` FOR EACH ROW INSERT INTO logpost VALUES(null, OLD.id, OLD.eid, OLD.name, OLD.category, OLD.industry, OLD.role, OLD.employmentType, OLD.status, 'DELETED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Existing Row Updated` AFTER UPDATE ON `post` FOR EACH ROW INSERT INTO logpost VALUES(null, NEW.id, NEW.eid, NEW.name, NEW.category, NEW.industry, NEW.role, NEW.employmentType, NEW.status, 'UPDATED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `New Row Inserted` AFTER INSERT ON `post` FOR EACH ROW INSERT INTO logpost VALUES(null, NEW.id, NEW.eid, NEW.name, NEW.category, NEW.industry, NEW.role, NEW.employmentType, NEW.status, 'INSERTED', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `county_id` int(11) NOT NULL,
  `county_name` varchar(255) NOT NULL,
  `constituency_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `county_id`, `county_name`, `constituency_name`) VALUES
(1, 1, 'Mombasa', 'Changamwe'),
(2, 1, 'Mombasa', 'Jomvu'),
(3, 1, 'Mombasa', 'Kisauni'),
(4, 1, 'Mombasa', 'Nyali'),
(5, 1, 'Mombasa', 'Likoni'),
(6, 1, 'Mombasa', 'Mvita'),
(7, 2, 'Kwale', 'Msambweni'),
(8, 2, 'Kwale', 'Lunga Lunga'),
(9, 2, 'Kwale', 'Matuga'),
(10, 2, 'Kwale', 'Kinango'),
(11, 3, 'Kilifi', 'Kilifi North'),
(12, 3, 'Kilifi', 'Kilifi South'),
(13, 3, 'Kilifi', 'Kaloleni'),
(14, 3, 'Kilifi', 'Rabai'),
(15, 3, 'Kilifi', 'Ganze'),
(16, 3, 'Kilifi', 'Malindi'),
(17, 3, 'Kilifi', 'Magarini'),
(18, 4, 'Tana River', 'Garsen'),
(19, 4, 'Tana River', 'Galole'),
(20, 4, 'Tana River', 'Bura'),
(21, 5, 'Lamu', 'Lamu East'),
(22, 5, 'Lamu', 'Lamu West'),
(23, 6, 'Taita–Taveta', 'Taveta'),
(24, 6, 'Taita–Taveta', 'Wundanyi'),
(25, 6, 'Taita–Taveta', 'Mwatate'),
(26, 6, 'Taita–Taveta', 'Voi'),
(27, 7, 'Garissa', 'Garissa Township'),
(28, 7, 'Garissa', 'Balambala'),
(29, 7, 'Garissa', 'Lagdera'),
(30, 7, 'Garissa', 'Dadaab'),
(31, 7, 'Garissa', 'Fafi'),
(32, 7, 'Garissa', 'Ijara'),
(33, 8, 'Wajir', 'Wajir North'),
(34, 8, 'Wajir', 'Wajir East'),
(35, 8, 'Wajir', 'Tarbaj'),
(36, 8, 'Wajir', 'Wajir West'),
(37, 8, 'Wajir', 'Eldas'),
(38, 8, 'Wajir', 'Wajir South'),
(39, 9, 'Mandera', 'Mandera West'),
(40, 9, 'Mandera', 'Banissa'),
(41, 9, 'Mandera', 'Mandera North'),
(42, 9, 'Mandera', 'Mandera South'),
(43, 9, 'Mandera', 'Mandera East'),
(44, 9, 'Mandera', 'Lafey'),
(45, 10, 'Marsabit', 'Moyale'),
(46, 10, 'Marsabit', 'North Horr'),
(47, 10, 'Marsabit', 'Saku'),
(48, 10, 'Marsabit', 'Laisamis'),
(49, 11, 'Isiolo', 'Isiolo North'),
(50, 11, 'Isiolo', 'Isiolo South'),
(51, 12, 'Meru', 'Igembe South'),
(52, 12, 'Meru', 'Igembe Central'),
(53, 12, 'Meru', 'Igembe North'),
(54, 12, 'Meru', 'Tigania West'),
(55, 12, 'Meru', 'Tigania East'),
(56, 12, 'Meru', 'North Imenti'),
(57, 12, 'Meru', 'Buuri'),
(58, 12, 'Meru', 'Central Imenti'),
(59, 12, 'Meru', 'South Imenti'),
(60, 13, 'Tharaka-Nithi', 'Maara'),
(61, 13, 'Tharaka-Nithi', 'Chuka/Igambangombe'),
(62, 13, 'Tharaka-Nithi', 'Tharaka'),
(63, 14, 'Embu', 'Manyatta'),
(64, 14, 'Embu', 'Runyenjes'),
(65, 14, 'Embu', 'Mbeere South'),
(66, 14, 'Embu', 'Mbeere North'),
(67, 15, 'Kitui', 'Mwingi North'),
(68, 15, 'Kitui', 'Mwingi West'),
(69, 15, 'Kitui', 'Mwingi Central'),
(70, 15, 'Kitui', 'Kitui West'),
(71, 15, 'Kitui', 'Kitui Rural'),
(72, 15, 'Kitui', 'Kitui Central'),
(73, 15, 'Kitui', 'Kitui East'),
(74, 15, 'Kitui', 'Kitui South'),
(75, 16, 'Machakos', 'Masinga'),
(76, 16, 'Machakos', 'Yatta'),
(77, 16, 'Machakos', 'Kangundo'),
(78, 16, 'Machakos', 'Matungulu'),
(79, 16, 'Machakos', 'Kathiani'),
(80, 16, 'Machakos', 'Mavoko'),
(81, 16, 'Machakos', 'Machakos Town'),
(82, 16, 'Machakos', 'Mwala'),
(83, 17, 'Makueni', 'Mbooni'),
(84, 17, 'Makueni', 'Kilome'),
(85, 17, 'Makueni', 'Kaiti'),
(86, 17, 'Makueni', 'Makueni'),
(87, 17, 'Makueni', 'Kibwezi West'),
(88, 17, 'Makueni', 'Kibwezi East'),
(89, 18, 'Nyandarua', 'Kinangop'),
(90, 18, 'Nyandarua', 'Kipipiri'),
(91, 18, 'Nyandarua', 'Ol Kalou'),
(92, 18, 'Nyandarua', 'Ol Jorok'),
(93, 18, 'Nyandarua', 'Ndaragwa'),
(94, 19, 'Nyeri', 'Tetu'),
(95, 19, 'Nyeri', 'Kieni'),
(96, 19, 'Nyeri', 'Mathira'),
(97, 19, 'Nyeri', 'Othaya'),
(98, 19, 'Nyeri', 'Mukurweini'),
(99, 19, 'Nyeri', 'Nyeri Town'),
(100, 20, 'Kirinyaga', 'Mwea'),
(101, 20, 'Kirinyaga', 'Gichugu'),
(102, 20, 'Kirinyaga', 'Ndia'),
(103, 20, 'Kirinyaga', 'Kirinyaga Central'),
(104, 21, 'Murang\'a', 'Kangema'),
(105, 21, 'Murang\'a', 'Mathioya'),
(106, 21, 'Murang\'a', 'Kiharu'),
(107, 21, 'Murang\'a', 'Kigumo'),
(108, 21, 'Murang\'a', 'Maragwa'),
(109, 21, 'Murang\'a', 'Kandara'),
(110, 21, 'Murang\'a', 'Gatanga'),
(111, 22, 'Kiambu', 'Gatundu South'),
(112, 22, 'Kiambu', 'Gatundu North'),
(113, 22, 'Kiambu', 'Juja'),
(114, 22, 'Kiambu', 'Thika Town'),
(115, 22, 'Kiambu', 'Ruiru'),
(116, 22, 'Kiambu', 'Githunguri'),
(117, 22, 'Kiambu', 'Kiambu'),
(118, 22, 'Kiambu', 'Kiambaa'),
(119, 22, 'Kiambu', 'Kabete'),
(120, 22, 'Kiambu', 'Kikuyu'),
(121, 22, 'Kiambu', 'Limuru'),
(122, 22, 'Kiambu', 'Lari'),
(123, 23, 'Turkana', 'Turkana North'),
(124, 23, 'Turkana', 'Turkana West'),
(125, 23, 'Turkana', 'Turkana Central'),
(126, 23, 'Turkana', 'Loima'),
(127, 23, 'Turkana', 'Turkana South'),
(128, 23, 'Turkana', 'Turkana East'),
(129, 24, 'West Pokot', 'Kapenguria'),
(130, 24, 'West Pokot', 'Sigor'),
(131, 24, 'West Pokot', 'Kacheliba'),
(132, 24, 'West Pokot', 'Pokot South'),
(133, 25, 'Samburu', 'Samburu West'),
(134, 25, 'Samburu', 'Samburu North'),
(135, 25, 'Samburu', 'Samburu East'),
(136, 26, 'Trans-Nzoia', 'Kwanza'),
(137, 26, 'Trans-Nzoia', 'Endebess'),
(138, 26, 'Trans-Nzoia', 'Saboti'),
(139, 26, 'Trans-Nzoia', 'Kiminini'),
(140, 26, 'Trans-Nzoia', 'Cherangany'),
(141, 27, 'Uasin Gishu County', 'Soy'),
(142, 27, 'Uasin Gishu County', 'Turbo'),
(143, 27, 'Uasin Gishu County', 'Moiben'),
(144, 27, 'Uasin Gishu County', 'Ainabkoi'),
(145, 27, 'Uasin Gishu County', 'Kapseret'),
(146, 27, 'Uasin Gishu County', 'Kesses'),
(147, 28, 'Elgeyo-Marakwet County', 'Marakwet East'),
(148, 28, 'Elgeyo-Marakwet County', 'Marakwet West'),
(149, 28, 'Elgeyo-Marakwet County', 'Keiyo North'),
(150, 28, 'Elgeyo-Marakwet County', 'Keiyo South'),
(151, 29, 'Nandi County', 'Tinderet'),
(152, 29, 'Nandi County', 'Aldai'),
(153, 29, 'Nandi County', 'Nandi Hills'),
(154, 29, 'Nandi County', 'Chesumei'),
(155, 29, 'Nandi County', 'Emgwen'),
(156, 29, 'Nandi County', 'Mosop'),
(157, 30, 'Baringo County', 'Tiaty'),
(158, 30, 'Baringo County', 'Baringo North'),
(159, 30, 'Baringo County', 'Baringo Central'),
(160, 30, 'Baringo County', 'Baringo South'),
(161, 30, 'Baringo County', 'Mogotio'),
(162, 30, 'Baringo County', 'Eldama Ravine'),
(163, 31, 'Laikipia County', 'Laikipia West'),
(164, 31, 'Laikipia County', 'Laikipia East'),
(165, 31, 'Laikipia County', 'Laikipia North'),
(166, 32, 'Nakuru County', 'Molo'),
(167, 32, 'Nakuru County', 'Njoro'),
(168, 32, 'Nakuru County', 'Naivasha'),
(169, 32, 'Nakuru County', 'Gilgil'),
(170, 32, 'Nakuru County', 'Kuresoi South'),
(171, 32, 'Nakuru County', 'Kuresoi North'),
(172, 32, 'Nakuru County', 'Subukia'),
(173, 32, 'Nakuru County', 'Rongai'),
(174, 32, 'Nakuru County', 'Bahati'),
(175, 32, 'Nakuru County', 'Nakuru Town West'),
(176, 32, 'Nakuru County', 'Nakuru Town East'),
(177, 33, 'Narok County', 'Kilgoris'),
(178, 33, 'Narok County', 'Emurua Dikirr'),
(179, 33, 'Narok County', 'Narok North'),
(180, 33, 'Narok County', 'Narok East'),
(181, 33, 'Narok County', 'Narok South'),
(182, 33, 'Narok County', 'Narok West'),
(183, 34, 'Kajiado County', 'Kajiado North'),
(184, 34, 'Kajiado County', 'Kajiado Central'),
(185, 34, 'Kajiado County', 'Kajiado East'),
(186, 34, 'Kajiado County', 'Kajiado West'),
(187, 34, 'Kajiado County', 'Kajiado South'),
(188, 35, 'Kericho County', 'Kipkelion East'),
(189, 35, 'Kericho County', 'Kipkelion West'),
(190, 35, 'Kericho County', 'Ainamoi'),
(191, 35, 'Kericho County', 'Bureti'),
(192, 35, 'Kericho County', 'Belgut'),
(193, 35, 'Kericho County', 'Sigowet–Soin'),
(194, 36, 'Bomet County', 'Sotik'),
(195, 36, 'Bomet County', 'Chepalungu'),
(196, 36, 'Bomet County', 'Bomet East'),
(197, 36, 'Bomet County', 'Bomet Central'),
(198, 36, 'Bomet County', 'Konoin'),
(199, 37, 'Kakamega County', 'Lugari'),
(200, 37, 'Kakamega County', 'Likuyani'),
(201, 37, 'Kakamega County', 'Malava'),
(202, 37, 'Kakamega County', 'Lurambi'),
(203, 37, 'Kakamega County', 'Navakholo'),
(204, 37, 'Kakamega County', 'Mumias West'),
(205, 37, 'Kakamega County', 'Mumias East'),
(206, 37, 'Kakamega County', 'Matungu'),
(207, 37, 'Kakamega County', 'Butere'),
(208, 37, 'Kakamega County', 'Khwisero'),
(209, 37, 'Kakamega County', 'Shinyalu'),
(210, 37, 'Kakamega County', 'Ikolomani'),
(211, 38, 'Vihiga County', 'Vihiga'),
(212, 38, 'Vihiga County', 'Sabatia'),
(213, 38, 'Vihiga County', 'Hamisi'),
(214, 38, 'Vihiga County', 'Luanda'),
(215, 38, 'Vihiga County', 'Emuhaya'),
(216, 39, 'Bungoma County', 'Mount Elgon'),
(217, 39, 'Bungoma County', 'Sirisia'),
(218, 39, 'Bungoma County', 'Kabuchai'),
(219, 39, 'Bungoma County', 'Bumula'),
(220, 39, 'Bungoma County', 'Kanduyi'),
(221, 39, 'Bungoma County', 'Webuye East'),
(222, 39, 'Bungoma County', 'Webuye West'),
(223, 39, 'Bungoma County', 'Kimilili'),
(224, 39, 'Bungoma County', 'Tongaren'),
(225, 40, 'Busia County', 'Teso North'),
(226, 40, 'Busia County', 'Teso South'),
(227, 40, 'Busia County', 'Nambale'),
(228, 40, 'Busia County', 'Matayos'),
(229, 40, 'Busia County', 'Butula'),
(230, 40, 'Busia County', 'Funyula'),
(231, 40, 'Busia County', 'Budalangi'),
(232, 41, 'Siaya County', 'Ugenya'),
(233, 41, 'Siaya County', 'Ugunja'),
(234, 41, 'Siaya County', 'Alego Usonga'),
(235, 41, 'Siaya County', 'Gem'),
(236, 41, 'Siaya County', 'Bondo'),
(237, 41, 'Siaya County', 'Rarieda'),
(238, 42, 'Kisumu County', 'Kisumu East'),
(239, 42, 'Kisumu County', 'Kisumu West'),
(240, 42, 'Kisumu County', 'Kisumu Central'),
(241, 42, 'Kisumu County', 'Seme'),
(242, 42, 'Kisumu County', 'Nyando'),
(243, 42, 'Kisumu County', 'Muhoroni'),
(244, 42, 'Kisumu County', 'Nyakach'),
(245, 43, 'Homa Bay County', 'Kasipul'),
(246, 43, 'Homa Bay County', 'Kabondo Kasipul'),
(247, 43, 'Homa Bay County', 'Karachuonyo'),
(248, 43, 'Homa Bay County', 'Rangwe'),
(249, 43, 'Homa Bay County', 'Homa Bay Town'),
(250, 43, 'Homa Bay County', 'Ndhiwa'),
(251, 43, 'Homa Bay County', 'Mbita'),
(252, 43, 'Homa Bay County', 'Suba'),
(253, 44, 'Migori County', 'Rongo'),
(254, 44, 'Migori County', 'Awendo'),
(255, 44, 'Migori County', 'Suna East'),
(256, 44, 'Migori County', 'Suna West'),
(257, 44, 'Migori County', 'Uriri'),
(258, 44, 'Migori County', 'Nyatike'),
(259, 44, 'Migori County', 'Kuria West'),
(260, 44, 'Migori County', 'Kuria East'),
(261, 45, 'Kisii County', 'Bonchari'),
(262, 45, 'Kisii County', 'South Mugirango'),
(263, 45, 'Kisii County', 'Bomachoge Borabu'),
(264, 45, 'Kisii County', 'Bobasi'),
(265, 45, 'Kisii County', 'Bomachoge Chache'),
(266, 45, 'Kisii County', 'Nyaribari Masaba'),
(267, 45, 'Kisii County', 'Nyaribari Chache'),
(268, 45, 'Kisii County', 'Kitutu Chache North'),
(269, 45, 'Kisii County', 'Kitutu Chache South'),
(270, 46, 'Nyamira County', 'Kitutu Masaba'),
(271, 46, 'Nyamira County', 'West Mugirango'),
(272, 46, 'Nyamira County', 'North Mugirango'),
(273, 46, 'Nyamira County', 'Borabu'),
(274, 47, 'Nairobi County', 'Westlands'),
(275, 47, 'Nairobi County', 'Dagoretti North'),
(276, 47, 'Nairobi County', 'Dagoretti South'),
(277, 47, 'Nairobi County', 'Langata'),
(278, 47, 'Nairobi County', 'Kibra'),
(279, 47, 'Nairobi County', 'Roysambu'),
(280, 47, 'Nairobi County', 'Kasarani'),
(281, 47, 'Nairobi County', 'Ruaraka'),
(282, 47, 'Nairobi County', 'Embakasi South'),
(283, 47, 'Nairobi County', 'Embakasi North'),
(284, 47, 'Nairobi County', 'Embakasi Central'),
(285, 47, 'Nairobi County', 'Embakasi East'),
(286, 47, 'Nairobi County', 'Embakasi West'),
(287, 47, 'Nairobi County', 'Makadara'),
(288, 47, 'Nairobi County', 'Kamukunji'),
(289, 47, 'Nairobi County', 'Starehe'),
(290, 47, 'Nairobi County', 'Mathare');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `university` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(2000) NOT NULL,
  `resume` varchar(500) NOT NULL,
  `county` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `attachment_letter` varchar(255) DEFAULT NULL,
  `school_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cv_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`id`, `name`, `email`, `password`, `university`, `dob`, `course`, `resume`, `county`, `constituency`, `attachment_letter`, `school_id`, `status`, `cv_status`) VALUES
(36, 'Nishit Killa', 'nishit@gmail.com', 'password', 'BE', '2001-06-21', 'C++, JAVA', '', '', '', NULL, NULL, 'Accepted', 0),
(37, 'Tushar Jain', 'tushar@gmail.com', 'password', 'BE', '2001-07-04', 'HTML, CSS, JS', '', '', '', NULL, NULL, NULL, 0),
(38, 'Sreeleena Ganguli', 'sreeleena@gmail.com', 'password', 'MTech', '2001-09-05', 'Backend Engg.', '', '', '', NULL, NULL, 'Rejected', 0),
(39, 'Riteek Rakesh', 'riteek@gmail.com', 'password', 'BE', '2001-06-02', 'Circuit Design', '', '', '', NULL, NULL, NULL, 0),
(40, 'Sayantan Podder', 'sayantan@gmail.com', 'password', 'BE', '1995-07-19', 'Machine Learning', '', '', '', NULL, NULL, NULL, 0),
(41, 'Sampurna Ghosh', 'sampurna@gmail.com', 'password', 'B.Sc.', '1995-11-23', 'Physiotherapy', '', '', '', NULL, NULL, NULL, 0),
(42, 'Rahul Adhikary', 'rahul@gmail.com', 'password', 'BBA', '1991-08-12', 'International Business', '', '', '', NULL, NULL, NULL, 0),
(43, 'Mariam Meerza', 'mariam@gmail.com', 'password', 'BE', '1998-03-07', 'Computer Applications', '', '', '', NULL, NULL, NULL, 0),
(44, 'Shadrack', 'odpsha@gmail.com', '123456', 'Engineer', '2001-09-04', 'tech', '', '', '', NULL, NULL, 'Accepted', 1),
(45, 'Shadrack', 'odpsha@gmail.com', 'password', 'Kabarak', '1996-12-20', 'CS', '', '', '', NULL, NULL, 'Rejected', 0),
(46, 'odipo', 'shadrackonyango30@gmail.com', '123456', 'Kabarak University', '2024-02-16', 'Computer Science', '', '', '', NULL, NULL, NULL, 0),
(47, 'Paul Antony', 'paulotieno4@gmail.com', '123456', 'Alupe University', '2003-01-25', 'Logistics and Supply Chain Management', '', '', '', NULL, NULL, NULL, 0),
(48, 'Paul Otieno', 'paulotieno4@gmail.com', 'password', 'Maseno University', '2003-01-25', 'Psychology', '', '', '', NULL, NULL, NULL, 0),
(49, 'Shadrack', 'odpsha@gmail.com', '123456', 'Kisii University', '2024-02-07', 'Accounting', '', '', '', NULL, NULL, NULL, 0),
(50, 'Cynthia', 'cynthia@gmail.com', '123456', 'Kenyatta University', '1111-01-01', 'Graphic Design', '', '11', 'Isiolo North', NULL, NULL, NULL, 0),
(51, 'Gonzaga', 'odpsha@gmail.com', '123456', 'Multimedia University of Kenya', '2003-05-23', 'Computer Science', '', '37', 'Mumias West', 'uploads/', 'uploads/Lecture 2 Kabarak Undergraduate Project Paper Guidelines.pdf', NULL, 0),
(52, 'Gonzaga', 'odpsha@gmail.com', '123456', 'Maseno University', '2002-02-02', 'Information Communication Technology (ICT)', '', '43', 'Kabondo Kasipul', 'uploads/letter/', 'uploads/schoolID/hyundai-motor-group-PSn57PpKvnA-unsplash.jpg', NULL, 0),
(53, 'Gonzaga', 'odpsha@gmail.com', '123456', 'Dedan Kimathi University of Technology', '2005-05-05', 'Computer Science', '', '28', 'Keiyo South', 'uploads/letter/admission-letter.pdf', 'uploads/schoolID/Gene-ID.jpeg', 'Accepted', 0),
(54, 'admin@accenture.com', 'annabelblessing02@gmail.com', 'password', 'Dedan Kimathi University of Technology', '2003-05-05', 'Computer Science', '', '40', 'Butula', 'uploads/letter/DATA SCIENCE AND AI CONFERENCE OFFICIAL OPENING.docx', 'uploads/schoolID/IMG-20231112-WA0032.jpg', NULL, 0),
(55, 'accenture.com', 'annabelblessing02@gmail.com', 'password', 'Maseno University', '2003-05-05', 'Computer Science', '', '11', 'Isiolo North', 'uploads/letter/DATA SCIENCE AND AI CONFERENCE OFFICIAL OPENING.docx', 'uploads/schoolID/mylonfxQR.png', 'Accepted', 0),
(56, 'admincom', 'resiatodoreen@gmail.com', 'password', 'Kibabii University', '2008-07-08', 'Computer Science', '', '22', 'Kiambaa', 'uploads/letter/GonzagaID.pdf', 'uploads/schoolID/1HZ75V_2023-09-21_13-07-03.png', 'Rejected', 0);

-- --------------------------------------------------------

--
-- Table structure for table `totalposts`
--

CREATE TABLE `totalposts` (
  `AllPosts` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalposts`
--

INSERT INTO `totalposts` (`AllPosts`) VALUES
(7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `SeekersAndEmployers` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`SeekersAndEmployers`) VALUES
(19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_details`
--
ALTER TABLE `cv_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobsapplied`
--
ALTER TABLE `jobsapplied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobapplied_seekerFK` (`sid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `logpost`
--
ALTER TABLE `logpost`
  ADD PRIMARY KEY (`lpid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `employer_postFK` (`eid`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cv_details`
--
ALTER TABLE `cv_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jobsapplied`
--
ALTER TABLE `jobsapplied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `logpost`
--
ALTER TABLE `logpost`
  MODIFY `lpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

--
-- AUTO_INCREMENT for table `seeker`
--
ALTER TABLE `seeker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
