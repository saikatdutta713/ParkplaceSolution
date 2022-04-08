-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 07:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkplacesolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted_booking`
--

CREATE TABLE `accepted_booking` (
  `booking_id` bigint(20) NOT NULL,
  `service` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `city` varchar(100) NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `accepting_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` bigint(100) NOT NULL,
  `create_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `otp`, `create_at`) VALUES
(1, 'admin', '$2y$11$0YzHlLnRayHZQ8u1PiOiSe26FIDWyaBAaYzvM0inkXMMFTTKhNHyW', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` varchar(20) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `s_id` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booking_request`
--

CREATE TABLE `booking_request` (
  `booking_id` bigint(20) NOT NULL,
  `service` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `city` varchar(100) NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile_repair` float NOT NULL,
  `laptop_repair` float NOT NULL,
  `desktop_repair` float NOT NULL,
  `windows_7` float NOT NULL,
  `windows_8` float NOT NULL,
  `windows_10` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `mobile_repair`, `laptop_repair`, `desktop_repair`, `windows_7`, `windows_8`, `windows_10`) VALUES
(1, 'BARASAT', 249, 399, 349, 399, 399, 449),
(2, 'BAMUNGACHI', 249, 399, 349, 399, 399, 449),
(3, 'BADU', 249, 399, 349, 399, 399, 449),
(4, 'DUTTAPUKUR', 249, 399, 349, 399, 399, 449),
(5, 'GANGANAGAR', 249, 399, 349, 399, 399, 449),
(6, 'HRIDAYPUR', 249, 399, 349, 399, 399, 449),
(7, 'KAZIPARA', 249, 399, 349, 399, 399, 449),
(8, 'MADHYAMGRAM', 249, 399, 349, 399, 399, 449),
(9, 'NILGANJ', 249, 399, 349, 399, 399, 449),
(10, 'NEW BARRACPORE', 249, 399, 349, 399, 399, 449),
(11, 'AGARPARA', 349, 499, 449, 399, 399, 449),
(12, 'BIRATI', 349, 499, 449, 399, 399, 449),
(13, 'BARANAGAR', 349, 499, 449, 399, 399, 449),
(14, 'BELGHARIA', 349, 499, 449, 399, 399, 449),
(15, 'DURGANAGAR', 349, 499, 449, 399, 399, 449),
(16, 'DUMDUM', 349, 499, 449, 399, 399, 449),
(17, 'DUMDUM CANT', 349, 499, 449, 399, 399, 449),
(18, 'DUNLOP', 349, 499, 449, 399, 399, 449),
(19, 'KAMARHATI', 349, 499, 449, 399, 399, 449),
(20, 'RAJARHAT', 349, 499, 449, 399, 399, 449),
(21, 'SINTHI', 349, 499, 449, 399, 399, 449),
(22, 'BARRACPORE', 349, 499, 449, 399, 399, 449),
(23, 'KHARDAHA', 349, 499, 449, 399, 399, 449),
(24, 'SODEPUR', 349, 499, 449, 399, 399, 449),
(25, 'BAGUIATI', 449, 599, 549, 449, 449, 499),
(26, 'BIDHANNAGAR', 449, 599, 549, 449, 449, 499),
(27, 'DAKSHINESWAR', 449, 599, 549, 449, 449, 499),
(28, 'HABRA', 449, 599, 549, 449, 449, 499),
(29, 'KESTOPUR', 449, 599, 549, 449, 449, 499),
(30, 'NEWTOWN', 449, 599, 549, 449, 449, 499),
(31, 'SALTLAKE SEC - 1', 449, 599, 549, 449, 449, 499),
(32, 'SALTLAKE SEC - 2', 449, 599, 549, 449, 449, 499),
(33, 'SALTLAKE SEC - 3', 449, 599, 549, 449, 449, 499),
(34, 'SALTLAKE SEC - 4', 449, 599, 549, 449, 449, 499),
(35, 'SALTLAKE SEC - 5', 449, 599, 549, 449, 449, 499);

-- --------------------------------------------------------

--
-- Table structure for table `handled_booking`
--

CREATE TABLE `handled_booking` (
  `booking_id` bigint(20) NOT NULL,
  `service` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `completing_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(0, 'saikat', 'saikatdutta@gmail.c', 'test', 'testing', '2022-02-11 22:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` bigint(20) NOT NULL,
  `subject` longtext NOT NULL,
  `note` longtext NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describtion` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `special` tinyint(1) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `describtion`, `price`, `special`, `date`) VALUES
(5, 'a', 'aa', 65, 0, '2022-03-14 05:36:26'),
(6, 'b', 'bb', 75, 0, '2022-03-12 09:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(15, 5, '479887_2021-05-26.png'),
(16, 5, '479887_2021-05-26.png'),
(17, 6, '972265_2021-03-17.png'),
(18, 6, '668712_2021-05-22.png'),
(19, 6, '682647_2021-05-26 (1).png'),
(20, 6, '515232_2021-05-26.png');

-- --------------------------------------------------------

--
-- Table structure for table `p_details`
--

CREATE TABLE `p_details` (
  `p_id` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profession` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `joining_date` varchar(100) NOT NULL,
  `leaving_date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_id` bigint(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `offer` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `s_name`, `service_type`, `offer`) VALUES
(1, 'screen replacement', 'MOBILE REPAIR', 'NA'),
(2, 'motherboard repair', 'MOBILE REPAIR', 'NA'),
(3, ' charging problem', 'MOBILE REPAIR', 'NA'),
(4, 'damage battery repair / replacement', 'MOBILE REPAIR', 'NA'),
(5, 'speaker & mic solution', 'MOBILE REPAIR', 'NA'),
(6, 'general routine service', 'MOBILE REPAIR', 'NA'),
(7, 'OS INSTALLATION (GENUINE)', 'LAPTOP REPAIR', 'NA'),
(8, 'SCREEN REPLACEMENT', 'LAPTOP REPAIR', 'NA'),
(9, 'KEYBOARD REPAIR & REPLACEMENT', 'LAPTOP REPAIR', 'NA'),
(10, 'TOUCHPAD REPAIR', 'LAPTOP REPAIR', 'NA'),
(11, 'BATTERY REPLACEMENT', 'LAPTOP REPAIR', 'NA'),
(12, 'MOTHERBOARD REPAIR', 'LAPTOP REPAIR', 'NA'),
(13, 'CHARGING AND POWER PROBLEM SOLUTION', 'LAPTOP REPAIR', 'NA'),
(14, ' GENERAL ROUTINE SERVICE', 'LAPTOP REPAIR', 'NA'),
(15, 'OS INSTALLATION (GENUINE)', 'DESKTOP REPAIR', 'NA'),
(16, 'MONITOR REPAIR', 'DESKTOP REPAIR', 'NA'),
(17, 'KEYBOARD REPAIR & REPLACEMENT', 'DESKTOP REPAIR', 'NA'),
(18, 'MOTHERBOARD REPAIR', 'DESKTOP REPAIR', 'NA'),
(19, 'POWER PROBLEM SOLUTION', 'DESKTOP REPAIR', 'NA'),
(20, 'RAM UPGRADE', 'DESKTOP REPAIR', 'NA'),
(21, 'HARD DISK & SSD UPGRADATION', 'DESKTOP REPAIR', 'NA'),
(22, 'GENERAL ROUTINE SERVICE', 'DESKTOP REPAIR', 'NA'),
(23, 'NEW LAN CONNECTION SETUP (HOME, OFFICE, ETC)', 'NETWORK SERVICE', 'NA'),
(24, 'EVENT COMPUTING SETUP', 'NETWORK SERVICE', 'NA'),
(25, 'INTERNET PROBLEM SOLUTION', 'NETWORK SERVICE', 'NA'),
(26, 'Routing & Switching', 'NETWORK SERVICE', 'NA'),
(27, 'Security Appliances & Firewalls', 'NETWORK SERVICE', 'NA'),
(28, 'WAN Optimization', 'NETWORK SERVICE', 'NA'),
(29, 'VoIP & Unified Communications', 'NETWORK SERVICE', 'NA'),
(30, 'Wireless', 'NETWORK SERVICE', 'NA'),
(31, 'Frontend Web Development', 'WEB DEVELOPMENT / DESIGN', 'NA'),
(32, 'Backend Web Development', 'WEB DEVELOPMENT / DESIGN', 'NA'),
(33, 'FullStack Web Development', 'WEB DEVELOPMENT / DESIGN', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `service_catagory`
--

CREATE TABLE `service_catagory` (
  `id` bigint(50) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_catagory`
--

INSERT INTO `service_catagory` (`id`, `service_type`, `logo`) VALUES
(1, 'MOBILE REPAIR', 'image/mobile-repair.png'),
(2, 'LAPTOP REPAIR', 'image/laptop-repair.png'),
(3, 'DESKTOP REPAIR', 'image/desktop-repair.png'),
(4, 'NETWORK SERVICE', 'image/internet.png'),
(5, 'WEB DEVELOPMENT / DESIGN', 'image/webdesign.png');

-- --------------------------------------------------------

--
-- Table structure for table `temp_p_details`
--

CREATE TABLE `temp_p_details` (
  `p_id` varchar(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profession` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Request_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_booking`
--
ALTER TABLE `accepted_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `booking_request`
--
ALTER TABLE `booking_request`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_details`
--
ALTER TABLE `p_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `service_catagory`
--
ALTER TABLE `service_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_p_details`
--
ALTER TABLE `temp_p_details`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_booking`
--
ALTER TABLE `accepted_booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_request`
--
ALTER TABLE `booking_request`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_catagory`
--
ALTER TABLE `service_catagory`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
