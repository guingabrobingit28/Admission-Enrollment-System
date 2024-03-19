-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 08:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `admission_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `password`, `status`, `user_type`, `admission_status`) VALUES
(1, 'admin', 'a', 'Enable', 'Admin', ''),
(3, 'a', 'a', 'Enable', 'Student', ''),
(7, 'client', 'client', 'Enable', 'Client', ''),
(12, 'ejhaygofredo@gmail.com', '2', 'Enable', 'Client', 'Off'),
(17, 'test@gmail.com', '12345', 'Enable', 'Client', 'Off'),
(18, 'head', 'head', 'Enable', 'Head_Admin', ''),
(19, 'b', '5', 'Enable', 'Head_Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admission`
--

CREATE TABLE `tbl_admission` (
  `admission_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admission`
--

INSERT INTO `tbl_admission` (`admission_id`, `id`, `date`, `status`) VALUES
(62, 58, '2024-03-19', 'Read'),
(63, 59, '2024-03-20', 'Read'),
(64, 60, '2024-03-20', 'Read'),
(65, 61, '2024-03-20', 'Read'),
(66, 62, '2024-03-20', 'Pending'),
(67, 63, '2024-03-20', 'Pending'),
(68, 64, '2024-03-20', 'Read'),
(69, 65, '2024-03-20', 'Read'),
(70, 66, '2024-03-20', 'Pending'),
(71, 67, '2024-03-20', 'Read'),
(72, 68, '2024-03-20', 'Read'),
(73, 69, '2024-03-20', 'Read'),
(74, 70, '2024-03-20', 'Read'),
(75, 71, '2024-03-20', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_description`) VALUES
(2, 'BSIT', 'Information technology (IT) is the use of any computers, storage, networking and other physical devices, infrastructure and processes to create, process, store, secure and exchange all forms of electronic data.'),
(3, 'BSTM', 'Bachelor of Science in Tourism Management, this program equips students for careers in hospitality and travel'),
(4, 'BSED', 'Bachelor of Secondary Education (BSEd) is a four-year program that prepares its students for the art and science of teaching.'),
(5, 'BSCS', 'Bachelor of Science in Computer Science (BSCS) is a four-year program that includes the study of computing concepts and theories, algorithmic foundations, and new developments in computing.'),
(6, 'BSIS', 'he Bachelor of Science in Information Systems (BSIS) program is a four-year degree program which focuses on the design and implementation of computer-based information systems and other ICT solutions to address the demands in existing business processes.'),
(7, 'BSHM', 'The Bachelor of Science in Hospitality Management (BS HM) is a four-year degree program that covers the process of planning, development, human resource management of the different aspects of the hotel, restaurant, and resorts operations. The program also'),
(8, 'BSOAD', 'he Bachelor of Science in Information Systems (BSIS) program is a four-year degree program which focuses on the design and implementation of computer-based information systems and other ICT solutions to address the demands in existing business processes.'),
(9, 'BSchem', 'Bachelor of Science in Chemistry (BSChem) is a four-year program that aims to produce graduates who comply with the current qualification requirements of professional chemists for local and overseas employment and entrepreneurship.'),
(10, 'BSCE', '(Bachelor of Science in Civil Engineering) BSCE Course Meaning. Bachelor of Science in Civil Engineering is a unique course that covers a wide range of specialities, including construction, transportation, structural, geotechnical, hydrology & hydrodynami'),
(11, 'BSEE', 'The accredited program leading to the degree of Bachelor of Science in Electrical Engineering is intended to qualify students to begin a professional career in electrical engineering or to proceed to advanced study.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment`
--

CREATE TABLE `tbl_enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `Section` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Sem` varchar(50) NOT NULL,
  `Remark` varchar(100) NOT NULL,
  `Cor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_enrollment`
--

INSERT INTO `tbl_enrollment` (`enrollment_id`, `student_id`, `date`, `Section`, `Year`, `Sem`, `Remark`, `Cor`) VALUES
(58, 58, '2024-03-19', '7', 'First Year', 'First Semester', 'Completed', 'Generated'),
(59, 59, '2024-03-20', '7', 'First Year', 'First Semester', 'Completed', 'Generated'),
(60, 60, '2024-03-20', '7', 'First Year', 'First Semester', 'Completed', 'Not Generated'),
(61, 61, '2024-03-20', '7', 'First Year', 'First Semester', 'Incomplete', 'Not Generated'),
(62, 69, '2024-03-20', '7', 'First Year', 'First Semester', 'Completed', 'Not Generated'),
(63, 67, '2024-03-20', '7', 'First Year', 'First Semester', 'Completed', 'Not Generated'),
(64, 65, '2024-03-20', '8', 'Second Year', 'First Semester', 'Completed', 'Not Generated'),
(65, 68, '2024-03-20', '8', 'Second Year', 'Second Semester', 'Incomplete', 'Not Generated'),
(66, 70, '2024-03-20', '7', 'First Year', 'First Semester', 'Incomplete', 'Not Generated'),
(67, 64, '2024-03-20', '7', 'Fourth Year', 'First Semester', 'Completed', 'Not Generated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `id_inquiry` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `messages` varchar(500) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `date_inquiry` date NOT NULL DEFAULT current_timestamp(),
  `inquiry_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`id_inquiry`, `name`, `email`, `messages`, `contact`, `date_inquiry`, `inquiry_status`) VALUES
(6, 'John Erick Langub Gofredo', 'johnerick.gofredo@yahoo.com', 'test 1', '09616341248', '2024-03-20', 'Pending'),
(7, 'Roland a Mangulabnan', 'roland.mangulabnan@yahoo.com', 'test 2', '09626341248', '2024-03-20', 'Pending'),
(8, 'Faye C Tubale', 'faye@yahoo.com', 'test 3', '09616341248', '2024-03-20', 'Pending'),
(9, 'Miguel V Lamano', 'miguel.lamano@yahoo.com', 'test 4', '09616341248', '2024-03-20', 'Pending'),
(10, 'Karl L Cabuguas', 'karl.Cabuguas@yahoo.com', 'test 5', '09616341248', '2024-03-20', 'Pending'),
(11, 'Merlita Q Delacruz', 'merlita@yahoo.com', 'test 7', '09626341248', '2024-03-20', 'Pending'),
(12, 'Nicolaine N Perez', 'nicollaine.perez@yahoo.com', 'test 8', '09616341248', '2024-03-20', 'Pending'),
(13, 'Faye C Tubale', 'faye@yahoo.com', 'test 9', '09616341248', '2024-03-20', 'Read'),
(14, 'Miguel V Lamano', 'miguel.lamano@yahoo.com', 'test 10', '09616341248', '2024-03-20', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_public`
--

CREATE TABLE `tbl_public` (
  `public_id` int(11) NOT NULL,
  `public_img` varchar(255) NOT NULL,
  `posted_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `public_content` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_public`
--

INSERT INTO `tbl_public` (`public_id`, `public_img`, `posted_date`, `public_content`, `title`, `status`) VALUES
(16, '../../Image-Container/65f9e695d5c147.67433083.jpg', '2024-03-20 03:25:09.909507', 'Attention everyone! Save the date - our school-wide event is set to take place on [insert specific date], promising a day filled with excitement and camaraderie. Get ready to join in on the fun and make lasting memories together', 'Incoming School Year', ''),
(17, '../../Image-Container/65f9e6b35ee441.59961021.jpg', '2024-03-20 03:25:39.390808', 'Dear graduating class of [Year],\r\n\r\nWe are thrilled to announce the upcoming graduation ceremony scheduled for [specific date]. This momentous occasion marks the culmination of your hard work, dedication, and achievements throughout your academic journey.', 'Graduation', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `report_title` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `report_title`, `year`, `Semester`, `section`, `gender`, `date`) VALUES
(41, 'Admission Student', 'First Year', 'First Semester', 'ALL', 'ALL', '2024-03-20'),
(42, 'Admission Student', 'First Year', 'First Semester', 'ALL', 'Male', '2024-03-20'),
(43, 'Admission Student', 'First Year', 'First Semester', 'ALL', 'Female', '2024-03-20'),
(44, 'Enrolled Student', 'First Year', 'First Semester', '7', 'ALL', '2024-03-20'),
(45, 'Enrolled Student', 'First Year', 'First Semester', '8', 'ALL', '2024-03-20'),
(46, 'Enrolled Student', 'Second Year', 'First Semester', '8', 'ALL', '2024-03-20'),
(47, 'Enrolled Student', 'Second Year', 'First Semester', 'ALL', 'ALL', '2024-03-20'),
(48, 'Enrolled Student', 'Second Year', 'Second Semester', 'ALL', 'ALL', '2024-03-20'),
(49, 'Enrolled Student', 'Fourth Year', 'First Semester', 'ALL', 'ALL', '2024-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `requirement_id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `requirement_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`requirement_id`, `student_id`, `requirement_name`) VALUES
(168, 58, 'PSA Authenticated Birth Certificate'),
(169, 58, 'Passport Size ID Picture'),
(170, 58, 'Barangay Clearance'),
(171, 58, 'Transcript of Records from Previous School'),
(172, 58, 'Honorable Dismissal'),
(173, 59, 'Form 138 (Report Card)'),
(174, 59, 'Form 137'),
(175, 59, 'Certificate of Good Moral'),
(176, 59, 'PSA Authenticated Birth Certificate'),
(177, 59, 'Passport Size ID Picture'),
(178, 59, 'Barangay Clearance'),
(179, 59, 'Transcript of Records from Previous School'),
(180, 59, 'Honorable Dismissal'),
(181, 60, 'PSA Authenticated Birth Certificate'),
(182, 60, 'Passport Size ID Picture'),
(183, 60, 'Barangay Clearance'),
(184, 60, 'Transcript of Records from Previous School'),
(185, 60, 'Honorable Dismissal'),
(186, 61, 'Barangay Clearance'),
(187, 61, 'Transcript of Records from Previous School'),
(188, 61, 'Honorable Dismissal'),
(189, 69, 'Form 138 (Report Card)'),
(190, 69, 'Form 137'),
(191, 69, 'Passport Size ID Picture'),
(192, 69, 'Barangay Clearance'),
(193, 69, 'Transcript of Records from Previous School'),
(194, 67, 'Barangay Clearance'),
(195, 67, 'Transcript of Records from Previous School'),
(196, 67, 'Honorable Dismissal'),
(197, 65, 'Passport Size ID Picture'),
(198, 65, 'Barangay Clearance'),
(199, 65, 'Transcript of Records from Previous School'),
(200, 68, 'Passport Size ID Picture'),
(201, 68, 'Barangay Clearance'),
(202, 70, 'Certificate of Good Moral'),
(203, 70, 'PSA Authenticated Birth Certificate'),
(204, 70, 'Passport Size ID Picture'),
(205, 64, 'Certificate of Good Moral'),
(206, 64, 'PSA Authenticated Birth Certificate'),
(207, 64, 'Passport Size ID Picture');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `schedule_name`) VALUES
(23, 'BSIT-Firstyear'),
(24, 'BSIT-2ndyear');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_day`
--

CREATE TABLE `tbl_schedule_day` (
  `schedule_day_id` int(11) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_in` time(6) NOT NULL,
  `time_out` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule_day`
--

INSERT INTO `tbl_schedule_day` (`schedule_day_id`, `schedule_id`, `subject`, `day`, `time_in`, `time_out`) VALUES
(33, 23, '4', 'Monday', '07:00:00.000000', '09:00:00.000000'),
(34, 23, 'Recess', 'Monday', '09:00:00.000000', '09:30:00.000000'),
(35, 23, '4', 'Monday', '10:00:00.000000', '12:00:00.000000'),
(36, 23, 'Lunch Break', 'Monday', '12:00:00.000000', '12:30:00.000000'),
(37, 23, '8', 'Monday', '12:30:00.000000', '15:00:00.000000'),
(38, 23, '9', 'Tuesday', '07:00:00.000000', '10:00:00.000000'),
(39, 23, '7', 'Tuesday', '10:00:00.000000', '12:00:00.000000'),
(40, 23, 'Lunch Break', 'Tuesday', '12:00:00.000000', '12:30:00.000000'),
(41, 23, '7', 'Tuesday', '12:30:00.000000', '15:00:00.000000'),
(42, 23, '10', 'Thursday', '09:00:00.000000', '12:00:00.000000'),
(43, 23, 'Lunch Break', 'Thursday', '12:00:00.000000', '12:30:00.000000'),
(44, 23, '4', 'Thursday', '12:30:00.000000', '15:30:00.000000'),
(45, 23, '6', 'Friday', '07:00:00.000000', '09:00:00.000000'),
(46, 23, 'Recess', 'Friday', '09:00:00.000000', '09:30:00.000000'),
(47, 23, '6', 'Friday', '09:30:00.000000', '12:00:00.000000'),
(48, 24, '4', 'Monday', '07:30:00.000000', '09:30:00.000000'),
(49, 24, 'Recess', 'Monday', '09:30:00.000000', '10:00:00.000000'),
(50, 24, '4', 'Monday', '10:00:00.000000', '12:00:00.000000'),
(51, 24, '8', 'Wednesday', '09:30:00.000000', '12:00:00.000000'),
(52, 24, 'Lunch Break', 'Wednesday', '12:00:00.000000', '12:30:00.000000'),
(53, 24, '11', 'Wednesday', '12:30:00.000000', '15:31:00.000000'),
(54, 24, '6', 'Friday', '07:30:00.000000', '09:00:00.000000'),
(55, 24, 'Recess', 'Friday', '09:00:00.000000', '09:15:00.000000'),
(56, 24, '8', 'Friday', '21:15:00.000000', '12:00:00.000000'),
(57, 24, 'Lunch Break', 'Friday', '12:00:00.000000', '13:00:00.000000'),
(58, 24, '5', 'Friday', '13:00:00.000000', '15:00:00.000000'),
(59, 24, '9', 'Friday', '15:00:00.000000', '17:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `room` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `schedule_id`, `section_name`, `room`) VALUES
(7, 23, 'BSIT-2', '302'),
(8, 24, 'BSIT-2A', '206');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_info`
--

CREATE TABLE `tbl_student_info` (
  `student_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `Suffix` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zipCode` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `fatherFirstname` varchar(50) NOT NULL,
  `fatherMiddlename` varchar(50) NOT NULL,
  `fatherLastname` varchar(50) NOT NULL,
  `fatherSuffix` varchar(50) NOT NULL,
  `fatherOccupation` varchar(50) NOT NULL,
  `motherFirstname` varchar(50) NOT NULL,
  `motherMiddlename` varchar(50) NOT NULL,
  `motherLastname` varchar(50) NOT NULL,
  `motherSuffix` varchar(50) NOT NULL,
  `MotherOccupation` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `Bod` date NOT NULL,
  `admissionType` varchar(50) NOT NULL,
  `Student_Type` varchar(50) NOT NULL,
  `pri-name` varchar(200) NOT NULL,
  `pri-year` varchar(15) NOT NULL,
  `sec` varchar(200) NOT NULL,
  `sec-year` varchar(15) NOT NULL,
  `last` varchar(200) NOT NULL,
  `last-year` varchar(15) NOT NULL,
  `gnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_info`
--

INSERT INTO `tbl_student_info` (`student_id`, `firstName`, `middleName`, `lastName`, `Suffix`, `gender`, `street`, `city`, `province`, `country`, `zipCode`, `email`, `number`, `civilStatus`, `fatherFirstname`, `fatherMiddlename`, `fatherLastname`, `fatherSuffix`, `fatherOccupation`, `motherFirstname`, `motherMiddlename`, `motherLastname`, `motherSuffix`, `MotherOccupation`, `course`, `Bod`, `admissionType`, `Student_Type`, `pri-name`, `pri-year`, `sec`, `sec-year`, `last`, `last-year`, `gnumber`) VALUES
(58, 'John Erick', 'Langub', 'Gofredo', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'johnerick.gofredo@yahoo.com', '09616341248', 'Single', 'Roderick', 'Mariano', 'Gofredo', 'Sr', 'Police', 'Mariala', 'Pardillo', 'Langub', '', 'OFW', 'BSIT', '2024-03-06', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0928-234-1242'),
(59, 'Roland', 'a', 'Mangulabnan', 'jr', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'roland.mangulabnan@yahoo.com', '09626341248', 'Single', 'Roband', 'S', 'Mangulabnan', 'Sr', 'Programmer', 'Maria', 'S', 'Mangulabnan', '', 'OFW', 'BSIT', '2024-03-08', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0923-231-3142'),
(60, 'Robin', 'a', 'Guingab', 'jr', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'robin.guingab@yahoo.com', '09626341248', 'Single', 'Robert', 'A', 'Guingab', 'Sr', 'Designer', 'Teresa', 'S', 'Guingab', '', 'Designer', 'BSED', '2024-03-08', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0923-231-3142'),
(61, 'Kristian', 'S', 'Cordero', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'kristian.cordero@yahoo.com', '09616341248', 'Single', 'Kris', 'V', 'Cordero', '', 'Programmer', 'Lina', 'C', 'Cordero', '', 'OFW', 'BSIT', '2024-02-29', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0923-231-3142'),
(62, 'Karl', 'L', 'Cabuguas', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'karl.Cabuguas@yahoo.com', '09616341248', 'Single', 'kiel', 'W', 'Cabuguas', '', 'Programmer', 'Pauline', 'Z', 'Cabuguas', '', 'OFW', 'BSIT', '2024-03-02', 'Transferee', 'NE', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0923-231-3142'),
(63, 'Alberto', 'B', 'Luceno', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'alberto.luceno@yahoo.com', '09616341248', 'Single', 'albert', 'A', 'Luceno', '', 'Programmer', 'Lita', 'A', 'Luceno', '', 'Designer', 'BSIT', '2024-03-08', 'Transferee', 'NE', 'SES', '2018', 'PNHS', '2023', 'BestLink', '2024', '0923-231-3142'),
(64, 'Miguel', 'V', 'Lamano', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'miguel.lamano@yahoo.com', '09616341248', 'Single', 'Migs', 'N', 'Lamano', '', 'Networking', 'Mila', 'C', 'Lamano', '', 'House\'wife', 'BSIT', '2024-03-06', 'Transferee', 'E', 'SES', '2010', 'PNHS', '2016', 'PDM', '2024', '0923-231-3142'),
(65, 'Andrea', 'N', 'Puria', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'andrea.puria@yahoo.com', '09616341248', 'Single', 'Dreu', 'N', 'Puria', '', 'Engineering', 'Melo', 'N', 'Puria', '', 'House\'wife', 'BSIT', '2024-03-07', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2018', 'PDM', '2024', '0923-231-3142'),
(66, 'Nicolaine', 'N', 'Perez', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'nicollaine.perez@yahoo.com', '09616341248', 'Devorced', 'Nicky', 'N', 'Pereze', '', 'Programmer', 'Nick', 'C', 'Perez', '', 'Designer', 'BSIT', '2024-03-15', 'Freshmen', 'NE', 'SES', '2012', 'PNHS', '2018', 'BestLink', '2024', '0923-231-3142'),
(67, 'Cheska', 'M', 'Bartolome', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'cheska.bartolome@yahoo.com', '09626341248', 'Single', 'Chester', 'K', 'Bartolome', '', 'Networking', 'Chesk', 'L', 'Bartolome', '', 'OFW', 'BSIT', '2024-03-08', 'Freshmen', 'E', 'SES', '2012', '', '2018', 'PDM', '2024', '0923-231-3142'),
(68, 'Faye', 'C', 'Tubale', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'faye@yahoo.com', '09616341248', 'Married', 'Fer', 'N', 'Tubale', '', 'Programmer', 'Fayer', 'N', 'Tubale', '', 'Designer', 'BSIT', '2024-03-02', 'Transferee', 'E', 'SES', '2010', 'PNHS', '2016', 'BestLink', '2022', '0923-231-3142'),
(69, 'Glydel', 'Q', 'Ereto', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'glydel@yahoo.com', '09626341248', 'Widowed', 'Glaex', 'A', 'Ereto', '', 'Programmer', 'Lina', 'A', 'Ereto', '', 'Designer', 'BSIT', '2024-02-27', 'Freshmen', 'E', 'SES', '2012', 'PNHS', '2006', 'PDM', '2024', '0923-231-3142'),
(70, 'Merlitas', 'Q', 'Delacruz', '', 'Male', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'merlita@yahoo.com', 'Bulacan', 'Single', 'Mel', 'Q', 'Dela Cruz', '', 'Programmer', 'Merlyn', 'A', 'Dela Cruz', '', 'Designer', 'BSIT', '2024-03-08', 'Ruturnee', 'E', 'SES', '2000', '', '2000', 'BestLink', '2000', '0923-231-3142'),
(71, 'Angelica', 'Q', 'Del Valle', '', 'Female', 'San Miguel St', 'San Jose', 'Bulacan', 'Philippines', '2030', 'angelica@yahoo.com', '09616341248', 'Single', 'andew', 'q', 'Del valle', 'Sr', 'Police', 'Angela', 'V', 'Del Valle', '', 'Designer', 'BSIT', '2024-03-01', 'Freshmen', 'NE', 'SES', '2004', 'PNHS', '2012', 'PDM', '2024', '0923-231-3142');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_description` varchar(50) NOT NULL,
  `subject_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `subject_code`, `subject_description`, `subject_unit`) VALUES
(4, 'OOP', '213', 'Object-oriented programming (OOP)', '3'),
(5, 'Gen-Math', 'BSIT-Math', 'General Mathematics aims to develop learners\' unde', '3'),
(6, 'DB1', 'BSIT-DB', 'A database is an organized collection of structure', '3'),
(7, 'Web Programming.', 'BSIT-2', 'Web developers design, maintain, and optimize webs', '3'),
(8, 'Digital Electronics.', 'BSIT', 'What is meant by digital electronics?\r\nDigital ele', '2'),
(9, 'Advance and Data Structure.', 'BSIT', 'Advanced Data structures are one of the essential ', '2'),
(10, 'Life and Works of Rizal', 'Gen', 'What is Rizal\'s life and works subject?\r\nSummary o', '2'),
(11, 'Programming with JAVA.', 'BSIT-1', 'Java is a multi-platform, object-oriented, and net', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admission`
--
ALTER TABLE `tbl_admission`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`id_inquiry`);

--
-- Indexes for table `tbl_public`
--
ALTER TABLE `tbl_public`
  ADD PRIMARY KEY (`public_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`requirement_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_schedule_day`
--
ALTER TABLE `tbl_schedule_day`
  ADD PRIMARY KEY (`schedule_day_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_admission`
--
ALTER TABLE `tbl_admission`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `id_inquiry` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_public`
--
ALTER TABLE `tbl_public`
  MODIFY `public_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_schedule_day`
--
ALTER TABLE `tbl_schedule_day`
  MODIFY `schedule_day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_student_info`
--
ALTER TABLE `tbl_student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admission`
--
ALTER TABLE `tbl_admission`
  ADD CONSTRAINT `tbl_admission_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_student_info` (`student_id`);

--
-- Constraints for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD CONSTRAINT `tbl_enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_info` (`student_id`);

--
-- Constraints for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD CONSTRAINT `tbl_requirements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_student_info` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
