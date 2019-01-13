-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 07:46 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codemail`
--

-- --------------------------------------------------------

--
-- Table structure for table `emaildata`
--

CREATE TABLE `emaildata` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `sendername` varchar(100) NOT NULL,
  `sendermail` varchar(100) NOT NULL,
  `fromMail` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `action` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emaildata`
--

INSERT INTO `emaildata` (`id`, `userId`, `sendername`, `sendermail`, `fromMail`, `subject`, `message`, `action`, `time`) VALUES
(1, 5, '', 'deepankardey12@gmail.com', 'deepankardey12@gmail.com', 'testing purpose 2', 'demo testing data', 1, '2019-01-12 18:30:00'),
(4, 5, '', 'deepankardey12@gmail.com', 'deepankardey12@gmail.com', 'asasasas', 'qwqwqwqwqwqwqw', 1, '2019-01-12 18:30:00'),
(5, 5, 'devilvires', 'dsdsd@gmail.com', 'deepankardey12@gmail.com', 'testing demo', 'swwewewew', 0, '2019-01-12 18:30:00'),
(6, 5, '', 'deepankardey12@gmail.com', 'deepankardey12@gmail.com', 'test', 'testyyy', 1, '2019-01-12 18:30:00'),
(7, 5, '', 'deepankardey12@gmail.com', 'deepankardey12@gmail.com', 'sdsdsd', 'sdsdsdsdsdsdsdsds', 1, '2019-01-12 18:30:00'),
(8, 5, '', 'deepankardey12@gmail.com', 'deepankardey12@gmail.com', 'wewewew', 'tytytyt', 1, '2019-01-13 05:49:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emaildata`
--
ALTER TABLE `emaildata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emaildata`
--
ALTER TABLE `emaildata`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
