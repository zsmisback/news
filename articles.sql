-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 10:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(255) NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `article_summary` varchar(255) NOT NULL,
  `article_content` blob NOT NULL,
  `article_category` int(255) NOT NULL,
  `article_create` datetime NOT NULL,
  `article_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_summary`, `article_content`, `article_category`, `article_create`, `article_image`) VALUES
(24, 'An Article on football', 'Something something', 0x3c703e48656c6c6f3c2f703e0a, 6, '2020-06-07 01:44:58', 'images-1.jpg'),
(25, 'An Article on Cricket', 'Somebody', 0x3c703e4f6e63653c2f703e0a, 9, '2020-06-07 01:45:34', 'download.jpg'),
(26, 'Another article on football', 'Yea dude that was so rad!!!!', 0x3c703e5761646475703c2f703e0a0a3c703e266e6273703b3c2f703e0a0a3c703e266e6273703b3c2f703e0a, 6, '2020-06-07 01:46:40', 'download.jpg'),
(27, 'Another article on cricket', 'yup', 0x3c703e5365653c2f703e0a, 9, '2020-06-07 01:47:38', 'images-1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_category` (`article_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_category`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
