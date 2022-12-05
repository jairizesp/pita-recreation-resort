-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 03:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationsystem1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `approval_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `comment`, `date`, `approval_status`) VALUES
(1, 1, 'JohnWendrick', 'Very Good', '2022-06-25', 'Reject'),
(2, 2, 'John Wendrick Brofar', '', '2022-07-04', 'Pending'),
(3, 2, 'John Wendrick Brofar', 'qwewqewq', '2022-07-04', 'Approved'),
(4, 1, 'John Wendrick Brofar', 'hehehe', '2022-07-04', 'Approved'),
(5, 2, 'John Wendrick Brofar', 'hehehe', '2022-07-04', 'Approved'),
(6, 1, 'John Wendrick Brofar', 'qwewqewqewqewq', '2022-07-04', 'Approved'),
(7, 7, 'John Wendrick Brofar', 'hahah', '2022-07-22', 'Approved'),
(9, 7, 'John  Doe', 'nice', '2022-07-24', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cottages`
--

CREATE TABLE `cottages` (
  `id` int(50) NOT NULL,
  `cottage_name` varchar(255) NOT NULL,
  `cottage_price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cottages`
--

INSERT INTO `cottages` (`id`, `cottage_name`, `cottage_price`) VALUES
(1, 'Small Cottage', 2000),
(2, 'Medium Cottage', 1000),
(3, 'Large Cottage', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `cottage_availed`
--

CREATE TABLE `cottage_availed` (
  `id` int(50) NOT NULL,
  `reservation_id` int(50) NOT NULL,
  `cottage_name` varchar(255) NOT NULL,
  `room_no` int(50) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `expenses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gcashqr`
--

CREATE TABLE `gcashqr` (
  `id` int(50) NOT NULL,
  `qr_image` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcashqr`
--

INSERT INTO `gcashqr` (`id`, `qr_image`, `contact_num`) VALUES
(1, 'IMG-62dc229be83772.72454750.png', '09267366551');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `description`) VALUES
(1, 'Welcome to Blue Waters', 'Discover our world-class spa & restaurant resort.'),
(2, 'A gorgeous place to enjoy your life.', 'Lounge under swaying palms by one of the pools or explore tranquil acres of mature tropical gardens. Rejuvenate your mind, body and soul at  secluded beach coves, where crystalline waters and powder-soft sands sparkle as brightly as the sun. Inspired spac'),
(3, 'Organized Events', 'Resort is a good venue in different occasions. The scenery and ambiance can get moods. Every minute of the day, there is nature surprise'),
(4, 'Timeless Luxury with a Caribbean Soul', 'Book Now!'),
(5, 'Enjoy the Beach and Sand!', 'Book Now!'),
(6, 'Share Your Resorts Experience!', 'Post Now!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(50) NOT NULL,
  `user_post` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `approvalstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_post`, `date`, `description`, `image`, `approvalstatus`) VALUES
(7, 'John Wendrick Brofar', '2022-07-22', 'Feedback', 'IMG-62da1810981938.43862703.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `room_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`room_id`, `name`, `rating`) VALUES
(3, 'John Wendrick Brofar', 3),
(3, 'John Wendrick Brofar', 5),
(3, 'John Wendrick Brofar', 3),
(3, 'John Wendrick Brofar', 4),
(3, 'John Wendrick Brofar', 3),
(3, 'John Wendrick Brofar', 3),
(6, 'John Wendrick Brofar', 0),
(7, 'John Wendrick Brofar', 3),
(8, 'John Does', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(50) NOT NULL,
  `cottagetype` varchar(255) NOT NULL,
  `checkin` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adult` varchar(255) NOT NULL,
  `children` varchar(50) NOT NULL,
  `approvalstatus` varchar(255) NOT NULL,
  `balance` int(50) NOT NULL,
  `expenses` int(50) NOT NULL,
  `payment_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `cottagetype`, `checkin`, `checkout`, `name`, `adult`, `children`, `approvalstatus`, `balance`, `expenses`, `payment_proof`) VALUES
(4, 'Double Room', '2022-07-24', '2022-07-27', 'John  Doe', '2', '1', 'Pending', 13300, 13300, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(50) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `reviews` int(50) NOT NULL,
  `average_rating` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `price`, `description`, `image`, `reviews`, `average_rating`) VALUES
(7, 'Single Room', 2000, 'Single Room', 'IMG-62cd847415ce49.75390924.png', 1, 3),
(8, 'Double Room', 4000, 'Double Room', 'IMG-62cd8488774770.20862441.png', 1, 0),
(9, 'Deluxe Room', 6000, 'Deluxe Room', 'IMG-62cd84a523d008.17634120.png', 0, 0),
(10, 'Luxury Room', 0, 'Luxury Room', 'IMG-62da1f9fc16192.47533472.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(50) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `price`, `description`, `image`) VALUES
(6, 'Jetski', 1000, 'Jetski Rental in the Beach', 'IMG-62da09c3377534.54845687.jpg'),
(7, 'ATV', 500, 'ATV Around the Beach', 'IMG-62da09f9497581.21122076.jpg'),
(8, 'Snorkeling', 1000, 'Snorkeling', 'IMG-62da0a4030ee14.32461136.jpg'),
(9, 'Breakfast', 2000, 'Breakfast', 'IMG-62da19b4eec690.23603909.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services_availed`
--

CREATE TABLE `services_availed` (
  `avail_id` int(50) NOT NULL,
  `reservation_number` varchar(50) NOT NULL,
  `services_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `provider`, `provider_value`) VALUES
(2, 'google', '1//0e_bfMhoGutemCgYIARAAGA4SNwF-L9IrtBWTAMcLSCcB7enqepoW8guGfvmIMZFzIMD5TFLF7Z6L544pcZeEm870JY02y_oaRVI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobilenum` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `mobilenum`, `email`, `password`, `profile_picture`) VALUES
(1, 'Admin', 'Admin', 123123123, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'default-profile.jpg'),
(2, 'Johnwendricks', 'Brofar', 926123675, 'jwendrickbrofar@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'IMG-62b733f75d83e0.06318873.jpg'),
(5, 'John ', 'Doe', 2147483647, 'johndoe@gmail.com', '4297f44b13955235245b2497399d7a93', 'default-profile.jpg'),
(6, 'John', 'Does', 926736551, 'johndoes@gmail.com', '202cb962ac59075b964b07152d234b70', 'default-profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cottages`
--
ALTER TABLE `cottages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cottage_availed`
--
ALTER TABLE `cottage_availed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcashqr`
--
ALTER TABLE `gcashqr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_availed`
--
ALTER TABLE `services_availed`
  ADD PRIMARY KEY (`avail_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cottages`
--
ALTER TABLE `cottages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cottage_availed`
--
ALTER TABLE `cottage_availed`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gcashqr`
--
ALTER TABLE `gcashqr`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_availed`
--
ALTER TABLE `services_availed`
  MODIFY `avail_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
