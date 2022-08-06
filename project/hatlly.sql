-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 11:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatlly`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `username` varchar(22) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(22) NOT NULL,
  `country` varchar(29) NOT NULL,
  `city` varchar(29) NOT NULL,
  `street` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `username`, `email`, `password`, `country`, `city`, `street`, `phone`, `age`) VALUES
('Ahmed', 'Ehab', 'ahmed2006862', 'ahmedehab280202@gmail.com', 'ahmed2006862', 'Egypt', 'Cairo', 'group 136', 1000028038, 20),
('aaaaaaa', 'aaaaaaa', 'ahmed2006862', 'ahmedehab280202@gmail.com', 'ahmed2006862', 'Egypt', 'ciro', 'ciro', 1000028038, 20),
('ahmed', '', '', '', '', '', '', '', 0, 0),
('ahmed', '', '', '', '', '', '', '', 0, 0),
('', '', '', '', '', '', '', '', 1111111111, 11),
('ali', 'ali', 'aliismail123', 'aaaaaaaaa', '123', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 2147483647, 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
