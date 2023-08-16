-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 04:14 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database `mydb`;
--
use `mydb`;
-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE `adopter` (
  `adopter_id` int(11) NOT NULL,
  `adopter_fname` varchar(45) DEFAULT NULL,
  `adopter_lname` varchar(100) NOT NULL,
  `adopter_contact` varchar(45) DEFAULT NULL,
  `adopter_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`adopter_id`, `adopter_fname`, `adopter_lname`, `adopter_contact`, `adopter_address`) VALUES
(1, 'Lisa', 'Manoban', '546-9807', 'Pasig City'),
(2, 'Joan', 'James', '545-6547', 'Quezon City'),
(3, 'Riza', 'Parkers', '234-2343', 'Valenzuela City');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `animal_picture` varchar(255) NOT NULL,
  `animal_name` varchar(45) NOT NULL,
  `animal_type` varchar(100) NOT NULL,
  `animal_gender` varchar(11) NOT NULL,
  `animal_color` varchar(45) NOT NULL,
  `animal_age` int(11) NOT NULL,
  `animal_breed` varchar(45) NOT NULL,
  `rescuer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `adopter_id` int(11) NOT NULL,
  `rescue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_picture`, `animal_name`, `animal_type`, `animal_gender`, `animal_color`, `animal_age`, `animal_breed`, `rescuer_id`, `employee_id`, `adopter_id`, `rescue_date`) VALUES
(3, '10997938-1x1-large.jpg', 'Mario', 'Cat', 'Male', 'White&Black', 3, 'Asian', 7, 3, 2, '2021-01-02'),
(6, 'de6190c4965dc5ad91e53a7fcf6d6ec6.jpg', 'Chu-Chu', 'Dog', 'Female', 'Brown', 2, 'Bulldog', 8, 1, 0, '2021-01-09'),
(7, '1f30417c19bb470f232687b726e6c7c6.jpg', 'Limbo', 'Dog', 'Male', 'Brown&Black', 6, 'German Shepherd', 3, 2, 3, '2021-01-09'),
(8, 'SnapPhoto_18-11-2020_64656_PM.jpeg', 'Tin', 'Dog', 'Male', 'Brown', 6, 'Ragdoll', 10, 2, 1, '2021-01-09'),
(9, 'pet-responsibility-cat-dog-fostering-adoption--1-.jpg', 'Sally', 'Cat', 'Female', 'Brown&Black', 2, 'Bengal', 10, 1, 1, '2021-01-09'),
(10, 'eeee7e97805c100764b385e0254ce69b.jpg', 'Dolly', 'Dog', 'Male', 'White', 3, 'Bulldog', 7, 3, 0, '2021-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_Id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `disease_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_Id`, `disease_name`, `disease_desc`) VALUES
(1, 'None', 'None'),
(2, 'Anthrax', 'Anthrax is an infection caused by the bacterium Bacillus anthracis');

-- --------------------------------------------------------

--
-- Table structure for table `diseased`
--

CREATE TABLE `diseased` (
  `disease_Id` int(11) NOT NULL,
  `animal_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diseased`
--

INSERT INTO `diseased` (`disease_Id`, `animal_Id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(2, 15),
(2, 23),
(2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `donation_fname` varchar(100) NOT NULL,
  `donation_lname` varchar(100) NOT NULL,
  `donation_amount` varchar(45) DEFAULT NULL,
  `donation_date` date DEFAULT NULL,
  `donation_method` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `donation_fname`, `donation_lname`, `donation_amount`, `donation_date`, `donation_method`) VALUES
(1, 'Marie', 'Simons', '3000', '2021-01-06', 'Cash'),
(4, 'Fernando', 'Poe', '5000', '2021-01-11', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `donation1`
--

CREATE TABLE `donation1` (
  `donation1_id` int(11) NOT NULL,
  `donation1_fname` varchar(100) NOT NULL,
  `donation1_lname` varchar(100) NOT NULL,
  `donation1_type` varchar(45) DEFAULT NULL,
  `donation1_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation1`
--

INSERT INTO `donation1` (`donation1_id`, `donation1_fname`, `donation1_lname`, `donation1_type`, `donation1_date`) VALUES
(1, 'Rodolf', 'Dear', 'Medicine', '2021-01-01'),
(2, 'Robin', 'Lopez', 'cat food', '2021-01-03'),
(4, 'Mark', 'Santos', 'Dog Food', '2021-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_picture` varchar(100) NOT NULL,
  `employee_desc` varchar(255) NOT NULL,
  `employee_fname` varchar(45) DEFAULT NULL,
  `employee_lname` varchar(100) NOT NULL,
  `employee_age` int(11) NOT NULL,
  `employee_gender` varchar(100) NOT NULL,
  `employee_contact` varchar(45) DEFAULT NULL,
  `employee_address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_picture`, `employee_desc`, `employee_fname`, `employee_lname`, `employee_age`, `employee_gender`, `employee_contact`, `employee_address`) VALUES
(1, '1ta6paxd9ja21.jpg', 'Vet', 'Jihyo', 'Park', 23, 'Female', '845-6544', 'Taguig City'),
(2, 'Dahyun-Wiki-Net-Worth-Dating-286x286.jpg', 'Caretaker', 'Dahyun', 'Kim', 22, 'Female', '045-6545', 'Makati City'),
(3, 'tzuyu.jpg', 'Vet', 'Tzuyu', 'Chou', 20, 'Female', '564-8789', 'Pasig City');

-- --------------------------------------------------------

--
-- Table structure for table `rescuer`
--

CREATE TABLE `rescuer` (
  `rescuer_id` int(11) NOT NULL,
  `rescuer_picture` varchar(255) DEFAULT NULL,
  `rescuer_fname` varchar(45) DEFAULT NULL,
  `rescuer_lname` varchar(100) NOT NULL,
  `rescuer_age` int(11) NOT NULL,
  `rescuer_gender` varchar(100) NOT NULL,
  `rescuer_contact` varchar(45) DEFAULT NULL,
  `rescuer_address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rescuer`
--

INSERT INTO `rescuer` (`rescuer_id`, `rescuer_picture`, `rescuer_fname`, `rescuer_lname`, `rescuer_age`, `rescuer_gender`, `rescuer_contact`, `rescuer_address`) VALUES
(3, '20191008163106-Getty-Rogers-Curry-64714.jpeg', 'Stephen', 'Curry', 28, 'Male', '305-6545', 'Pasay City'),
(7, 'dwayne-the-rock-0718-1400x800.jpg', 'Dwayne', 'Johnson', 45, 'Male', '233-4343', 'Pasig City'),
(8, 'nayeon.jpg', 'Nayeon', 'Lim', 25, 'Female', '233-4343', 'Makati City'),
(10, 'sana.jpg', 'Sanake', 'Minatozaki', 24, 'Female', '233-4343', 'Taguig City');

-- --------------------------------------------------------

--
-- Table structure for table `transaction1`
--

CREATE TABLE `transaction1` (
  `animal_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction2`
--

CREATE TABLE `transaction2` (
  `animal_id` int(11) NOT NULL,
  `donation1_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(0, 'Justine', 'Castaneda', 'admin', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`adopter_id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `fk_animal_adopter` (`adopter_id`),
  ADD KEY `fk_animal_employee` (`employee_id`),
  ADD KEY `fk_animal_rescuer1` (`rescuer_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_Id`);

--
-- Indexes for table `diseased`
--
ALTER TABLE `diseased`
  ADD PRIMARY KEY (`disease_Id`,`animal_Id`) USING BTREE,
  ADD KEY `fk_diseased_diseases` (`disease_Id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donation1`
--
ALTER TABLE `donation1`
  ADD PRIMARY KEY (`donation1_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `rescuer`
--
ALTER TABLE `rescuer`
  ADD PRIMARY KEY (`rescuer_id`);

--
-- Indexes for table `transaction1`
--
ALTER TABLE `transaction1`
  ADD PRIMARY KEY (`animal_id`,`donation_id`),
  ADD KEY `fk_transaction1_donation1` (`donation_id`);

--
-- Indexes for table `transaction2`
--
ALTER TABLE `transaction2`
  ADD PRIMARY KEY (`animal_id`,`donation1_id`),
  ADD KEY `fk_transaction2_donation11` (`donation1_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopter`
--
ALTER TABLE `adopter`
  MODIFY `adopter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donation1`
--
ALTER TABLE `donation1`
  MODIFY `donation1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rescuer`
--
ALTER TABLE `rescuer`
  MODIFY `rescuer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction1`
--
ALTER TABLE `transaction1`
  ADD CONSTRAINT `fk_transaction1_animal1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction1_donation1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction2`
--
ALTER TABLE `transaction2`
  ADD CONSTRAINT `fk_transaction2_animal1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction2_donation11` FOREIGN KEY (`donation1_id`) REFERENCES `donation1` (`donation1_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
