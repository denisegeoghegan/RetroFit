-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2017 at 09:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retrofitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `jerseys`
--

CREATE TABLE `jerseys` (
  `id` int(11) NOT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `design` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `players` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jerseys`
--

INSERT INTO `jerseys` (`id`, `condition`, `design`, `price`, `team`, `players`, `image`, `details`) VALUES
(1, 'Used', 'Reebok', 60.55, 'Liverpool', ' Mellor, Cisse, Hyypia, Crouch, Carragher', 'Images/Jersey/jersey1.jpg', 'Rare Champions League home shirt as worn when the holders progressed from the group stages as winners, but were knocked out by Benfica in the last 16, losing 3-0 on aggregate.'),
(2, 'New', 'Nike', 55.95, 'Arsenal', 'Wright, Bergkamp, Adams, Platt, Bould', 'Images/Jersey/jersey2.jpg', 'Away shirt as worn in Bruce Rioch\'s first and only season in charge with Arsenal finishing 5th in the Premier League and making it to the Semi Finals of the League Cup, losing on away goals against Aston Villa.'),
(3, 'New', 'Umbro', 35.45, 'Manchester United', 'Solskjaer, Scholes, Sheringham, Cole, Berg, Beckham, Keane', 'Images/Jersey/jersey3.jpg', 'Classic home shirt as worn when the side won the Premier League with 75 points and reached the Semi-Finals of the Champions League in 96-97 but lost 2-0 on aggregate to German outfit, Borussia Dortmund, new signing Ole Gunner Solskjaer was the clubs top goalscorer on 19, and a 22yr old David Beckham won the PFA Young Player of the Year Award.'),
(4, 'Used', 'Adidas', 40.45, 'Republic of Ieland', 'McCarthy, Aldridge, Cascarino, Sheedy, Townsend', 'Images/Jersey/jersey4.jpg', 'Very rare home shirt with great vintage design as worn in the 1990 World Cup against Egypt and Holland in the group stages, and the very unlucky 1-0 defeat to Italy in the quarter-finals.'),
(5, 'New', 'Umbro', 30.99, 'Manchester United', 'Cantona, Blackmore, Pallister, Ince, Giggs, Hughes', 'Images/Jersey/jersey5.jpg', 'Classic tiger skin away shirt as worn when Manchester United were crowned champions in the inaugural Premier League season, meaning that they won their first league title since 1967, finishing 10 points ahead of second placed Aston Villa.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fName` varchar(200) NOT NULL,
  `lName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jerseys`
--
ALTER TABLE `jerseys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jerseys`
--
ALTER TABLE `jerseys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
