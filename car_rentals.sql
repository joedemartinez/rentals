-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2021 at 06:37 PM
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
  `identification_type` text NOT NULL,
  `identification_number` text NOT NULL,
  `createdat` date NOT NULL,
  `photo` text NOT NULL DEFAULT 'user.png',
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients_table`
--

INSERT INTO `clients_table` (`client_id`, `fullname`, `address`, `contact`, `identification_type`, `identification_number`, `createdat`, `photo`, `status`) VALUES
(1, 'Mark Dorgbey', 'home', '0239382989', 'National ID', 'GH-03940309-3', '2021-09-06', 'profile.jpg', 0);

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
(1, 1, 1, '2021-09-06', '2021-09-10', '3.00', 'Access Bank', '0093984849390394', '2021-09-06', '2021-09-06');

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
  `phoneno` text NOT NULL,
  `createdat` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `photo` text NOT NULL DEFAULT 'profile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `username`, `password`, `fullname`, `dob`, `phoneno`, `createdat`, `status`, `photo`) VALUES
(1, 'H2021423', '$2y$10$j1Lfi95lE30yEFXJf2yTz.lt2f9Lw/ssRKKD8xENRDyGJEzP50CHq', 'Myke Tomson', '1992-09-14', '0243232323', '2021-09-06', 0, 'profile.jpg');

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
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_type`, `vehicle_brand`, `vehicle_reg_no`, `vehicle_price`, `vehicle_color`, `vehicle_location`, `vehicle_insurance_date`, `createdat`, `photo`) VALUES
(1, 'Corolla S', 'Toyota', '81093480329329432', '250000', 'dark grey', 'Tema New Town', '2021-09-09', '2021-09-06', 'car.png');

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
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
