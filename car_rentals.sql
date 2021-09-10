-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2021 at 03:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_table`
--

CREATE TABLE `clients_table` (
  `client_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `identification_type` text NOT NULL,
  `identification_number` text NOT NULL,
  `createdat` date NOT NULL,
  `createdby` text NOT NULL,
  `photo` text NOT NULL DEFAULT 'user.png',
  `status` int(2) NOT NULL DEFAULT 0,
  `updatedby` text DEFAULT NULL,
  `updatedat` date DEFAULT NULL,
  `deletedby` text DEFAULT NULL,
  `deletedat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_table`
--

INSERT INTO `clients_table` (`client_id`, `fullname`, `address`, `contact`, `email`, `identification_type`, `identification_number`, `createdat`, `createdby`, `photo`, `status`, `updatedby`, `updatedat`, `deletedby`, `deletedat`) VALUES
(2, 'Tom Syd', 'Ghana gh', '0938239408', 'tom@gmail.co', 'Ghana Card', '092903892302', '2021-09-09', 'Myke Tomson', 'user.png', 1, 'Myke Tomson', '2021-09-09', '', '0000-00-00'),
(3, 'Davis lvan', 'Ghana gh', '0938239408', 'tom@gmail.co', 'Ghana Card', '092903892302', '2021-09-09', 'Myke Tomson', 'user.png', 0, 'Myke Tomson', '2021-09-09', 'Myke Tomson', '2021-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE `payment_table` (
  `payment_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `commulative_amount` decimal(10,2) NOT NULL,
  `remaining_bal` decimal(10,2) NOT NULL,
  `opening_bal` decimal(10,2) NOT NULL,
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rentals_table`
--

CREATE TABLE `rentals_table` (
  `rental_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `bank` text NOT NULL,
  `bank_account` text NOT NULL,
  `payment_date` date NOT NULL,
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentals_table`
--

INSERT INTO `rentals_table` (`rental_id`, `client_id`, `vehicle_id`, `start_date`, `end_date`, `rate`, `bank`, `bank_account`, `payment_date`, `createdat`) VALUES
(1, 2, 1, '2021-09-06', '2021-09-10', '3.00', 'Access Bank', '0093984849390394', '2021-09-06', '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `phoneno` text NOT NULL,
  `createdat` date NOT NULL,
  `createdby` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `photo` text NOT NULL DEFAULT 'profile.jpg',
  `updatedby` text DEFAULT NULL,
  `updatedat` date DEFAULT NULL,
  `deletedby` text DEFAULT NULL,
  `deletedat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `fullname`, `dob`, `address`, `phoneno`, `createdat`, `createdby`, `status`, `photo`, `updatedby`, `updatedat`, `deletedby`, `deletedat`) VALUES
(1, 'H2021423', '$2y$10$j1Lfi95lE30yEFXJf2yTz.lt2f9Lw/ssRKKD8xENRDyGJEzP50CHq', 'Myke Tomson', '1992-09-14', '', '0243232323', '2021-09-06', '', 0, 'profile.jpg', '', '0000-00-00', '', '0000-00-00'),
(2, 'Emp65294', '$2y$10$SQesIJ4yCsTCjhgsF1ic8eJDGu5kBVjxurBZ/mlqeZ4Vu.yz5jOEG', 'Tom West', '1986-01-06', 'Salaga1', '03390389033', '2021-09-10', 'Myke Tomson', 0, 'profile.jpg', 'Myke Tomson', '2021-09-10', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_type` text NOT NULL,
  `vehicle_brand` text NOT NULL,
  `vehicle_reg_no` text NOT NULL,
  `vehicle_price` text NOT NULL,
  `vehicle_color` text NOT NULL,
  `vehicle_location` text NOT NULL,
  `vehicle_insurance_date` date NOT NULL,
  `createdat` date NOT NULL,
  `createdby` text NOT NULL,
  `updatedby` text DEFAULT NULL,
  `updatedat` date DEFAULT NULL,
  `deletedby` text DEFAULT NULL,
  `deletedat` date DEFAULT NULL,
  `photo` text NOT NULL DEFAULT 'car.png',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_type`, `vehicle_brand`, `vehicle_reg_no`, `vehicle_price`, `vehicle_color`, `vehicle_location`, `vehicle_insurance_date`, `createdat`, `createdby`, `updatedby`, `updatedat`, `deletedby`, `deletedat`, `photo`, `status`) VALUES
(1, 'Corolla S II', 'Toyota', '81093480329329432', '250000', 'dark grey', 'Tema New Town', '2021-09-09', '2021-09-06', '', 'Myke Tomson', '2021-09-10', '', '0000-00-00', 'car.png', 0),
(2, 'Corolla', 'Nissan', '093802382342309', '16000', 'Dark Grey', 'New York', '2021-09-24', '2021-09-10', 'Myke Tomson', NULL, NULL, NULL, NULL, 'car.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients_table`
--
ALTER TABLE `clients_table`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `payment_table`
--
ALTER TABLE `payment_table`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rentals_table`
--
ALTER TABLE `rentals_table`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients_table`
--
ALTER TABLE `clients_table`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_table`
--
ALTER TABLE `payment_table`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals_table`
--
ALTER TABLE `rentals_table`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
