-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Apr 02, 2024 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findhostels`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `aid` int(64) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `address_l1` varchar(128) NOT NULL,
  `address_l2` varchar(128) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `facilities` varchar(5000) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `price` varchar(64) NOT NULL,
  `status` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `lon` varchar(64) NOT NULL,
  `lat` varchar(64) NOT NULL,
  `landlord` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`aid`, `title`, `address_l1`, `address_l2`, `description`, `facilities`, `phone`, `price`, `status`, `gender`, `lon`, `lat`, `landlord`, `date`) VALUES
(11, 'new', 'new', 'new', 'new', 'new', '987654621', '30000', 'Pending', 'Male', '79.95513301959156', '6.729270599226682', '1', '2024-03-09 15:07:42'),
(12, 'test case', 'test case', 'test case', 'test case', 'test case', '987652', '1235456', 'Rejected', 'Male', '80.00866588553555', '6.844004351482881', '1', '2024-03-09 18:23:54'),
(13, 'two', 'two', 'two', 'two', 'two', '123123123', '1231123', 'Rejected', 'Female', '79.88379908521654', '6.845174389740611', '1', '2024-03-09 18:51:21'),
(14, 'asd', 'asadasd', 'sdfsfd', 'asd', 'asdasdasd', '4564564', '4564564', 'Rejected', 'Male', '80.24426042090951', '6.82273323824819', '1', '2024-03-10 06:40:00'),
(15, 'Nice Location', 'Nice Location', 'Nice Location', 'Nice Location', 'Nice Location', '123456', '5000', 'Rejected', 'Male', '80.1805740500599', '6.834664291924529', '3', '2024-03-11 13:23:03'),
(16, 'sasdadasdad', 'sasdadasdad', 'sasdadasdad', 'sasdadasdad', 'sasdadasdad', '6565161', '3999', 'Rejected', 'Male', '79.88274156104623', '6.802546107792497', '3', '2024-03-11 15:02:03'),
(17, 'sweethome', 'hks', 'malabe', 'bjsedghs', 'shsdjhfs', '123456', '10000', 'Approved', 'Female', '79.9669556318581', '6.818289588642237', '3', '2024-03-15 07:24:33'),
(18, 'chanuda', 'chanuda', 'chanuda', 'chanuda', 'chanuda', '123456', '1500', 'Approved', 'Male', '80.01595078956186', '6.818909309444136', '3', '2024-03-20 07:04:54'),
(19, 'asdadasdada', '654821543285', '654821543285', 'sdfsdfdsf', '654821543285', '654821543285', '654821543285', 'Approved', 'Male', '80.00300978762397', '6.82242816632823', '2', '2024-03-29 06:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `aid` int(32) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `photo` varchar(5000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`aid`, `title`, `description`, `photo`, `date`) VALUES
(1, 'asdasd', 'asdasdasd', '65f29cbead4be_banner-2-img.png', '2024-03-14 06:44:14'),
(2, 'New post see this', 'New post see this', '65f2a4955aa21_sl1.jpg', '2024-03-14 07:17:41'),
(3, 'asdasdadadsadsadsad', 'asdasdadadsadsadsad', '65f3f98e9c714_close-icon.png', '2024-03-15 07:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `iid` int(11) NOT NULL,
  `img_name` varchar(5000) NOT NULL,
  `ad_id` varchar(64) NOT NULL,
  `landlord` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`iid`, `img_name`, `ad_id`, `landlord`) VALUES
(15, '65ec7b3e1a7f1_1.png', '11', '1'),
(16, '65ec7b3e1a93d_2.png', '11', '1'),
(17, '65ec7b3e1d520_3.png', '11', '1'),
(18, '65ec7b3e1d630_3d-illustration-of-doctor-check-patient-health-condition-doctor-s-visit-to-ward-of-patient-man-lying-in-a-medical-bed-3d-illustration-png.png', '11', '1'),
(19, '65ec7b3e1d7b3_boy.png', '11', '1'),
(20, '65ec7b3e1d89a_doc-1.png', '11', '1'),
(21, '65ec7b3e1d94f_hospital-5422564-4528494.png', '11', '1'),
(22, '65eca93a92357_banner-2-img.png', '12', '1'),
(23, '65eca93a9249b_qr-scan.jpg', '12', '1'),
(24, '65ecafa92a2ba_3d-hand-with-smartphone-scans-qr-code_595064-215.jpg', '13', '1'),
(25, '65ecafa92a412_3d-illustration-of-doctor-check-patient-health-condition-doctor-s-visit-to-ward-of-patient-man-lying-in-a-medical-bed-3d-illustration-png.png', '13', '1'),
(26, '65ecafa92a533_about-img.png', '13', '1'),
(27, '65ecafa92a5fd_banner-1-img.png', '13', '1'),
(28, '65ecafa92a737_ham-menu-icon.png', '13', '1'),
(29, '65ecafa92a7f5_logo_sqr.png', '13', '1'),
(30, '65ecafa92a8a6_post-1.jpg', '13', '1'),
(31, '65ecafa92a952_post-2.jpg', '13', '1'),
(32, '65ecafa92aa14_post-3.jpg', '13', '1'),
(33, '65ecafa92ab09_service-1.jpg', '13', '1'),
(34, '65ecafa92ac2e_service-2.png', '13', '1'),
(35, '65ecafa92acfe_sl1.jpg', '13', '1'),
(36, '65ecafa92adba_sl2.jpg', '13', '1'),
(37, '65ecafa92ae9a_sl3.jpg', '13', '1'),
(38, '65ecafa92af69_tick.jpg', '13', '1'),
(39, '65ecafa92b05d_wawd.png', '13', '1'),
(40, '65ed55c078c8c_doc-1.png', '14', '1'),
(41, '65ef05b705d5a_search-icon.png', '15', '3'),
(42, '65ef05b705eb8_sl.png', '15', '3'),
(43, '65ef05b705f86_tick.jpg', '15', '3'),
(44, '65ef1ceb56a7b_girl.png', '16', '3'),
(45, '65ef1ceb56c4f_logo_.png', '16', '3'),
(46, '65f3f7b177936_1.png', '17', '3'),
(47, '65f3f7b177b2f_2.png', '17', '3'),
(48, '65f3f7b177ced_3.png', '17', '3'),
(49, '65f3f7b177e64_3d-hand-with-smartphone-scans-qr-code_595064-215.jpg', '17', '3'),
(50, '65f3f7b17800c_3d-illustration-of-doctor-check-patient-health-condition-doctor-s-visit-to-ward-of-patient-man-lying-in-a-medical-bed-3d-illustration-png.png', '17', '3'),
(51, '65f3f7b17835b_3d-qr-code-icon-hand_169241-7505.jpg', '17', '3'),
(52, '65fa8a969d49f_home.png', '18', '3'),
(53, '660661dd0e12b_HOME 3.jpg', '19', '2'),
(54, '660661dd0e469_HOME 4.jpg', '19', '2'),
(55, '660661dd0e62c_HOME 5.jpg', '19', '2');

-- --------------------------------------------------------

--
-- Table structure for table `land_loards`
--

CREATE TABLE `land_loards` (
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `nic` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address_l1` varchar(64) NOT NULL,
  `address_l2` varchar(64) NOT NULL,
  `uid` int(64) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_loards`
--

INSERT INTO `land_loards` (`first_name`, `last_name`, `nic`, `email`, `phone`, `address_l1`, `address_l2`, `uid`, `gender`, `password`) VALUES
('PDR', 'Perera', '94125862421v', 'gun@gun', '123456789', 'asdasd', 'set123', 1, 'Male', '1234'),
('Land', '2', '654821543285v', 'land@land', '8542564622', 'asdasd', 'asdasdasd', 2, 'Female', '1234'),
('Chamara', 'test two', '123456', 'asd@gmail.com', '123456', 'test two', 'test two', 3, 'Male', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(64) NOT NULL,
  `landlord` varchar(64) NOT NULL,
  `ad_id` varchar(256) NOT NULL,
  `status` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `sid` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`req_id`, `landlord`, `ad_id`, `status`, `date`, `sid`) VALUES
(7, '1', '13', 'Approved', '2024-03-11 08:28:23', 28888),
(8, '1', '12', 'Rejected', '2024-03-11 08:29:43', 28888),
(9, '1', '12', 'Approved', '2024-03-11 08:30:15', 28888),
(10, '1', '12', 'Pending', '2024-03-11 13:20:11', 123456),
(11, '3', '15', 'Rejected', '2024-03-11 13:27:33', 123456),
(12, '3', '15', 'Approved', '2024-03-11 13:28:48', 123456),
(13, '1', '11', 'Pending', '2024-03-11 14:33:34', 123456),
(14, '1', '13', 'Pending', '2024-03-11 15:00:12', 123456),
(15, '3', '16', 'Approved', '2024-03-11 15:06:02', 123456),
(16, '3', '17', 'Approved', '2024-03-15 07:29:35', 123456),
(17, '3', '18', 'Approved', '2024-03-20 07:07:20', 123456),
(18, '3', '17', 'Pending', '2024-03-29 06:35:29', 28888);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` varchar(32) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address_l1` varchar(64) NOT NULL,
  `address_l2` varchar(64) NOT NULL,
  `uid` int(64) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `first_name`, `last_name`, `batch`, `email`, `phone`, `address_l1`, `address_l2`, `uid`, `gender`, `password`) VALUES
('27252', 'James', 'Bond', '22.2', 'jb@gmail.com', '01122448816', 'pitipana', 'homagama', 1, 'Male', '1234'),
('224323432', 'asd', 'asd', '22.2', 'ss@gmail.com', '4532', 'sdfsdf', 'dfghdfgh', 2, 'Male', '123'),
('564', 'asd', 'hfhdfgndn', 'asd', 'dfgdf@sdf', '432', 'sfgnsfgn', 'sfgnsfg', 3, 'Female', 'asd'),
('28888', 'Amal', 'fff', '21.2', 'amal@gmail.com', '123456789', 'asdasd', 'l', 4, 'Male', '123123'),
('5522415', 'Janaka', 'Dissanayake', '21.2', '1@gmail.com', '123123123123', 'sdfsfsdf', 'sdfsdfsdfsfd', 6, 'Male', '1234'),
('123456', 'Kasun', 'Kalhara', '22.2', 'testone@gmail.com', '123123312', 'test one', 'test one', 7, 'Male', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `wid` int(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `land_loards`
--
ALTER TABLE `land_loards`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `aid` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `aid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `land_loards`
--
ALTER TABLE `land_loards`
  MODIFY `uid` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `uid` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `wid` int(32) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
