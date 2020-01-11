-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 11:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `rest_tb_user`
--

CREATE TABLE `rest_tb_user` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rest_tb_user`
--

INSERT INTO `rest_tb_user` (`id`, `userid`, `password`, `username`, `type`) VALUES
(1, 'IslamHossain', '7b7a53e239400a13bd6be6c91c4f6c4e', 'Islam Hossain', 'MANAGER'),
(6, 'IslamHossain1', '81dc9bdb52d04dc20036dbd8313ed055', '', 'SALESMAN'),
(8, 'IslamHossain3', '81dc9bdb52d04dc20036dbd8313ed055', '', 'OWNER'),
(9, 'IslamHossain4', '81dc9bdb52d04dc20036dbd8313ed055', '', 'OWNER'),
(10, 'IslamHossain505', '81dc9bdb52d04dc20036dbd8313ed055', '', 'SALESMAN'),
(11, 'IslamHossain303', '81dc9bdb52d04dc20036dbd8313ed055', '', 'SALESMAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rest_tb_user`
--
ALTER TABLE `rest_tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rest_tb_user`
--
ALTER TABLE `rest_tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

