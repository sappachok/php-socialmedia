-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 05:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_datetime` varchar(20) NOT NULL,
  `message_body` text NOT NULL,
  `message_image` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_datetime`, `message_body`, `message_image`, `user_id`, `to_user_id`, `status`) VALUES
(10, '05-12-2021 04:33:11', '<h2>Hello World!!</h2>', '', 3, 0, 0),
(11, '05-12-2021 09:28:01', 'Thank you. 12345', '', 3, 0, 0),
(12, '05-12-2021 10:08:55', 'Hello Message', '', 3, 0, 0),
(13, '05-12-2021 10:10:48', 'Hello Message', '', 3, 0, 0),
(14, '05-12-2021 10:12:09', 'Hello Message', '', 3, 0, 0),
(15, '05-12-2021 10:15:50', 'ทดสอบอีกครั้ง', '', 3, 0, 0),
(18, '14-12-2021 15:34:13', '555555', '', 7, 0, 0),
(19, '14-12-2021 15:34:32', 'Happy birth day!!', '', 7, 0, 0),
(20, '18-12-2021 16:02:41', 'ทดสอบอัพโหลดxxxx12334', 'Capture3.PNG', 3, 0, 0),
(21, '18-12-2021 15:00:51', 'xxxxxx', '', 3, 0, 0),
(22, '18-12-2021 15:05:56', '', 'email1.PNG', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `file_photo` varchar(400) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `full_name`, `file_photo`, `status`) VALUES
(1, 'lion', '123456', 'Lion King', '', 1),
(3, 'batman', '12345678', 'Bruce Wayne', 'stude-00085853_normal.png', 1),
(4, 'apple', '123456', 'Apple Jack', '', 1),
(7, 'doraemon', '123456789', 'ดราเอม่อน', 'unnamed.jpg', 1),
(9, 'red', '147852', 'แดง', 'female-student-with-books-paperworks_1258-48204.jpg', 1),
(11, 'admin', 'batman', 'ผู้ดูแลระบบ123456', 'stude-00085853_normal.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_be_friend`
--

CREATE TABLE `user_be_friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_be_friend`
--

INSERT INTO `user_be_friend` (`user_id`, `friend_id`, `status`) VALUES
(2, 4, 'R'),
(3, 1, 'R'),
(3, 5, 'R'),
(3, 7, 'R'),
(3, 9, 'R'),
(4, 5, 'R'),
(7, 1, 'R'),
(7, 3, 'R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_be_friend`
--
ALTER TABLE `user_be_friend`
  ADD UNIQUE KEY `user_id` (`user_id`,`friend_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
