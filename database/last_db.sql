-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 09:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `last_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `type`) VALUES
(1, 'larrysmith@gmail.com', 'popcornsss', 'admin'),
(4, 'nickeylim@gmail.com', 'frenchfries', 'user'),
(5, 'sherrydc@gmail.com', 'bankbank', 'user'),
(6, 'luiszamora@gmail.com', 'vroomvroom', 'user'),
(7, 'nicolelim@gmail.com', 'avocadosss', 'user'),
(9, 'jdelacruz@gmail.com', 'matchalatte', 'user'),
(10, 'racquellim@gmail.com', 'applebees', 'user'),
(11, 'nclim@gmail.com', 'bukopieee', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(3) NOT NULL,
  `u_id` int(3) NOT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `u_id`, `role`, `description`) VALUES
(1, 1, 'IT Head', 'Head of the IT Department'),
(4, 4, 'Intern', 'Intern in the company        '),
(5, 5, 'Accountant', 'Employee in finance'),
(6, 6, 'Employee', 'Employee in marketing'),
(7, 7, 'Intern', 'Intern in the company'),
(9, 9, 'Assistant Manager', 'Employee from Accounting department'),
(10, 10, 'Assistant Manager', 'Assistant manager in Marketing Department'),
(11, 11, 'Manager', 'Business Development Manager');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(3) NOT NULL,
  `r_id` int(3) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `c_pass` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `r_id`, `first_name`, `last_name`, `Email`, `c_pass`, `role`, `description`, `type`) VALUES
(1, 1, 'Larry', 'Smith', 'larrysmith@gmail.com ', 'popcornsss', 'IT Head', 'Head of the IT Department ', 'admin'),
(4, 4, 'Nickey', 'Lim', 'nickeylim@gmail.com ', 'frenchfries', 'Intern', 'Intern in the company         ', 'user'),
(5, 5, 'Sherry', 'Dela Cruz', 'sherrydc@gmail.com', 'bankbank', 'Accountant', 'Employee in finance', 'user'),
(6, 6, 'Luis', 'Zamora', 'luiszamora@gmail.com ', 'vroomvroom', 'Employee', 'Employee in marketing ', 'user'),
(7, 7, 'Nicole', 'Lim', 'nicolelim@gmail.com ', 'avocadosss', 'Intern', 'Intern in the company ', 'user'),
(9, 9, 'Juan', 'Dela Cruz', 'jdelacruz@gmail.com', 'matchalatte', 'Assistant Manager', 'Employee from Accounting department', 'user'),
(10, 10, 'Racquel', 'Lim', 'racquellim@gmail.com', 'applebees', 'Assistant Manager', 'Assistant manager in Marketing Department', 'user'),
(11, 11, 'Nestor', 'Lim', 'nclim@gmail.com', 'bukopieee', 'Manager', 'Business Development Manager', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
