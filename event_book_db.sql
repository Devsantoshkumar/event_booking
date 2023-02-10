-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 02:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `categorys_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `meta_description` varchar(100) NOT NULL,
  `meta_keywords` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`categorys_id`, `category`, `description`, `image`, `status`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Arts', 'arts category descaripton', '63e4c6af73f5b4.94101681.jpg', 'active', 'arts category descaripton', 'arts category descaripton', '2023-02-09 11:10:55'),
(2, 'Business', 'Business concert', '63e4c726bd9b99.94335684.png', 'active', 'Business', 'Business', '2023-02-09 11:12:54'),
(3, 'Guest House', 'Guest House Wedding', '63e4c80630c5f9.80842289.jpg', 'active', 'Guest House', 'Guest House', '2023-02-09 11:16:38'),
(4, 'Hotels', 'Hotels', '63e4c784235339.33125486.jpg', 'active', 'Hotels', 'Hotels', '2023-02-09 11:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `citys_id` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`citys_id`, `city`, `created_at`, `state_id`, `status`) VALUES
(1, 'Balaganj', '2023-02-09 11:06:40', 1, 'active'),
(2, 'Jankipuram', '2023-02-09 11:08:06', 1, 'active'),
(3, 'Kanpur Dehat', '2023-02-09 11:08:20', 2, 'active'),
(4, 'Rama nagar', '2023-02-09 11:08:44', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `events_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `category` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `meta_keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`events_id`, `title`, `description`, `image`, `price`, `status`, `created_at`, `category`, `state`, `city`, `address`, `meta_description`, `meta_keywords`) VALUES
(1, 'Wedding Party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '63e4c895d9cf07.54057305.jpg', 600, 'active', '2023-02-09 11:19:01', 4, 1, 1, 'somthing else', 'sdf', 'sdf'),
(2, 'Birthday party', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '63e4c939916573.69751358.jpg', 200, 'active', '2023-02-09 11:21:45', 4, 2, 3, 'somethign', 'sdfsdf', 'enjoy'),
(4, 'Make a long trip', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '63e6406c994f41.08469372.jpg', 6587, 'active', '2023-02-10 14:03:19', 2, 3, 4, 'Make a long trip', 'Make a long trip', 'Make a long trip');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `states_id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`states_id`, `state`, `status`, `created_at`) VALUES
(1, 'Lucknow', 'active', '2023-02-09 11:04:20'),
(2, 'Kanpur', 'active', '2023-02-09 11:04:33'),
(3, 'Delhi', 'active', '2023-02-09 11:04:41'),
(4, 'Karnataka', 'active', '2023-02-09 11:04:50'),
(5, 'Maharashtra', 'active', '2023-02-09 11:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_varified` varchar(100) NOT NULL,
  `rank` varchar(20) NOT NULL DEFAULT 'normal',
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `firstname`, `lastname`, `email`, `email_varified`, `rank`, `password`, `image`, `date`, `token`) VALUES
(1, 'Santosh', 'Kumar', 'skambharti563@gmail.com', 'skambharti563@gmail.com', 'admin', '$2y$10$6D7ExzC7cKgh3Ug1AMucYeO78fr/dGMqfaI4fTzW2HSLXS0K.xooG', '', '2023-02-08 22:16:25', 'ZwV5cjPYNHQEhjThxe9Kg4DpLjYZI6v9Kq15muCgcUsVrnsV54jt8tn310EC'),
(2, 'Devsantosh', 'Kumar', 'quietudestudio@gmail.com', 'quietudestudio@gmail.com', 'normal', '$2y$10$oSx0B/65y1LL69zHdWcObeI7CnyWXOdyloPkCkPch9rqv1.xu4lei', '', '2023-02-10 14:29:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `verifys`
--

CREATE TABLE `verifys` (
  `verifys_id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `expired` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifys`
--

INSERT INTO `verifys` (`verifys_id`, `otp`, `expired`, `email`) VALUES
(1, 230465, 1675891050, 'skambharti563@gmail.com'),
(2, 959750, 1676035828, 'quietudestudio@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categorys_id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`citys_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`states_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `verifys`
--
ALTER TABLE `verifys`
  ADD PRIMARY KEY (`verifys_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categorys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `citys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `states_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verifys`
--
ALTER TABLE `verifys`
  MODIFY `verifys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
