-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 11:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` varchar(5) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_desc` text NOT NULL,
  `book_auth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_desc`, `book_auth`) VALUES
('00001', 'คณิตศาสตร์', 'คณิตศาสตร์\nคณิตศาสตร์', 'สมชาย สมใจ'),
('00002', 'ภาษาไทย', 'ภาษาไทย\nภาษาไทย', 'สมชาย สมใจ'),
('00003', 'ภาษาจีน', 'ภาษาจีน\nภาษาจีน', 'สมหวัง สมดี'),
('00004', 'ภาษาซี', 'ภาษาซี\nภาษาซี', 'สมดี สมคิด'),
('00005', 'สังคม', 'สังคม\nสังคม', 'สมชาย หวังดี');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `member_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `borrow_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `book_id`, `member_id`, `qty`, `borrow_date`) VALUES
(1, '00005', 2, 1, '2020-09-06 16:22:00'),
(2, '00004', 2, 2, '2020-09-06 16:22:00'),
(3, '00003', 2, 1, '2020-09-06 16:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `book_id` varchar(5) NOT NULL,
  `member_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_lname`, `username`, `password`) VALUES
(1, 'นูรดีน', 'แฉตุ', 'nurdin', 'din123'),
(2, 'มารู', 'อารง', 'maru', 'maru123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
