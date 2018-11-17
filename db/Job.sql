-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 02:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Job`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_offer`
--

CREATE TABLE `job_offer` (
  `id` int(6) NOT NULL,
  `job_title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `company` varchar(30) CHARACTER SET utf8 NOT NULL,
  `category` tinyint(1) NOT NULL COMMENT '0 part-time, 1 full-time',
  `address` varchar(20) CHARACTER SET utf8 NOT NULL,
  `street` varchar(20) CHARACTER SET utf8 NOT NULL,
  `city` varchar(15) CHARACTER SET utf8 NOT NULL,
  `job_description` varchar(400) CHARACTER SET utf8 NOT NULL,
  `job_requirements` varchar(200) CHARACTER SET utf8 NOT NULL,
  `salary` int(6) NOT NULL,
  `contact_info` varchar(20) CHARACTER SET utf8 NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_offer`
--

INSERT INTO `job_offer` (`id`, `job_title`, `company`, `category`, `address`, `street`, `city`, `job_description`, `job_requirements`, `salary`, `contact_info`, `image`, `type`, `post_date`, `username`) VALUES
(0, 'FronEnd Developer', 'Masar', 0, '123', 'Astreet', 'Hebron', 'FrontEnd web Debeloper', 'Be good with:\r\n HTML\r\n Css', 3000, '123456789', '', 1, '2018-11-07 03:44:54', 'user1'),
(1, 'c++ Unreal Developer', 'A', 1, '123', 'Astreet', 'Jerusalem', 'c++ Unreal Debeloper', 'Be good with:\r\n c++\r\n Unreal development', 6000, '123456789', '', 1, '2018-11-07 03:44:54', 'user2'),
(2, 'Backend Developer', 'Masar', 0, '123', 'Astreet', 'Hebron', 'we need a skilled PHP Debeloper', 'Be good with:\r\n PHP\r\n Mysql\r\n HTML', 4000, '123456789', '', 0, '2018-11-07 03:55:31', 'user1'),
(3, 'Cyber Security analyst', 'A', 1, '123', 'Astreet', 'Jerusalem', 'Cyber Security analys', 'CEH Certification', 10000, '1234567890', '', 1, '2018-11-07 03:55:31', 'user2'),
(4, 'FronEnd Developer', 'Masar', 0, '123', 'Astreet', 'Hebron', 'FrontEnd web Debeloper', 'Be good with:\r\n HTML\r\n Css', 3000, '123456789', '', 1, '2018-11-07 03:44:54', 'user1'),
(5, 'c++ Unreal Developer', 'A', 1, '123', 'Astreet', 'Jerusalem', 'c++ Unreal Debeloper', 'Be good with:\r\n c++\r\n Unreal development', 6000, '123456789', '', 1, '2018-11-07 03:44:54', 'user2'),
(6, 'Backend Developer', 'Masar', 0, '123', 'Astreet', 'Hebron', 'we need a skilled PHP Debeloper', 'Be good with:\r\n PHP\r\n Mysql\r\n HTML', 4000, '123456789', '', 0, '2018-11-07 03:55:31', 'user1'),
(7, 'Cyber Security analyst', 'A', 1, '123', 'Astreet', 'Jerusalem', 'Cyber Security analys', 'CEH Certification', 10000, '1234567890', '', 1, '2018-11-07 03:55:31', 'user2'),
(10, 'FronEnd Developer', 'Masar', 0, '123', 'Astreet', 'Hebron', 'FrontEnd web Debeloper', 'Be good with:\r\n HTML\r\n Css', 3000, '123456789', '', 1, '2018-11-07 03:44:54', 'user1'),
(11, 'c++ Unreal Developer', 'A', 1, '123', 'Astreet', 'Jerusalem', 'c++ Unreal Debeloper', 'Be good with:\r\n c++\r\n Unreal development', 6000, '123456789', '', 1, '2018-11-07 03:44:54', 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) CHARACTER SET ascii NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `tel` int(11) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `tel`, `address`, `email`) VALUES
('user1', 'password1', 1234567891, '123', '123@gmail.com'),
('user2', 'password2', 1234567891, '1234', '1234@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_offer`
--
ALTER TABLE `job_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
