-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 06:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unitex_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `auser_name` text NOT NULL,
  `auser_password` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `auser_name`, `auser_password`, `date`) VALUES
(1, 'HR Admin', 'admin', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `sg_rate` text NOT NULL,
  `usd_rate` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `sg_rate`, `usd_rate`, `date`, `up_by`) VALUES
(1, '63.88', '84.79', '2021-02-20', 'Auto API'),
(3, '63.88', '84.79', '2021-02-19', 'https://free.currconv.com'),
(4, '63.88', '84.79', '2021-02-16', 'https://free.currconv.com');

-- --------------------------------------------------------

--
-- Table structure for table `expenditures`
--

CREATE TABLE `expenditures` (
  `id` int(11) NOT NULL,
  `voucher_no` text NOT NULL,
  `processed_by` text NOT NULL,
  `inv_for` text NOT NULL,
  `purpose_of_exp` text NOT NULL,
  `amount_bdt` text NOT NULL,
  `amount_sgd` text NOT NULL,
  `amount_usd` text NOT NULL,
  `approved` text NOT NULL,
  `processed` text NOT NULL,
  `scan_doc` text NOT NULL,
  `date` text NOT NULL,
  `up_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditures`
--

INSERT INTO `expenditures` (`id`, `voucher_no`, `processed_by`, `inv_for`, `purpose_of_exp`, `amount_bdt`, `amount_sgd`, `amount_usd`, `approved`, `processed`, `scan_doc`, `date`, `up_by`) VALUES
(17, 'VCH-2102161613488822', 'hasan', 'Maruf', 'Entertainment', '500', '7.83', '5.9', 'Yes', 'Yes', '1613488822327601018118139027_150164796735073_508587414670215337_n.png', '2021-02-16', 'mhasan'),
(18, 'VCH-2102191613753284', 'hasan', 'Mahmudul Hasan', 'Utility Bill', '5000', '78.27', '58.97', 'Yes', 'Yes', '16137532841924792367118297984_165494681728072_3911050435035432247_o.jpg', '2021-02-19', 'mhasan'),
(19, 'VCH-2102161613494474', 'hasan', 'Reazul Karim', 'Office Accessories', '1000', '15.65', '11.79', 'No', 'No', '1613494474734520691huawei y5p.png', '2021-02-16', 'mhasan');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure_types`
--

CREATE TABLE `expenditure_types` (
  `id` int(11) NOT NULL,
  `e_type` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure_types`
--

INSERT INTO `expenditure_types` (`id`, `e_type`, `date`) VALUES
(1, 'All', ''),
(2, 'Entertainment', ''),
(3, 'T.A', ''),
(4, 'D.A', ''),
(5, 'Utility Bill', ''),
(6, 'Office Accessories', ''),
(7, 'Mobile Bill', ''),
(9, 'Gifts', ''),
(10, 'Test Type X', ''),
(11, 'Test Type YZ', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `muser_name` text NOT NULL,
  `muser_password` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `name`, `muser_name`, `muser_password`, `date`) VALUES
(1, 'Master User', 'master', 'E10ADC3949BA59ABBE56E057F20F883E', '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `permission` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `user_password`, `permission`, `date`) VALUES
(1, 'hasan', 'mhasan', 'E10ADC3949BA59ABBE56E057F20F883E', 'Yes', '01/01/2021');

-- --------------------------------------------------------

--
-- Table structure for table `xuser`
--

CREATE TABLE `xuser` (
  `id` int(11) NOT NULL,
  `xuser_name` text NOT NULL,
  `xuser_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xuser`
--

INSERT INTO `xuser` (`id`, `xuser_name`, `xuser_password`) VALUES
(1, 'jubaer', '23f299842911f1344d0920e50117a153');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure_types`
--
ALTER TABLE `expenditure_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xuser`
--
ALTER TABLE `xuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenditures`
--
ALTER TABLE `expenditures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expenditure_types`
--
ALTER TABLE `expenditure_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `xuser`
--
ALTER TABLE `xuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
