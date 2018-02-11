-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 11:28 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `serialNum` bigint(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `summary` varchar(3000) NOT NULL,
  `pages` int(4) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `language` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`serialNum`, `title`, `author`, `summary`, `pages`, `publisher`, `price`, `availability`, `language`) VALUES
(1, 'The Midnight Line', 'Child, Lee', ' Jack Reacher takes an aimless stroll past a pawn shop in a small Midwestern town. In the window he sees a West Point class ring from 2005. Reacher\'s a West Pointer too, and he knows what she went through to get it. Reacher tracks the ring back to its owner, step by step, down a criminal trail leading west. If she\'s OK, he\'ll walk away. ', 400, ' Bantam Press (GB) ', '32.10', 'Yes', 'English'),
(2, 'Origin', 'Brown, Dan', ' Sunday Times #1 BestsellerNew York Times #1 BestellerThe spellbinding new Robert Langdon novel from the author of The Da Vinci Code. On a trail marked only by enigmatic symbols and elusive modern art, Langdon and Vidal uncover the clues that will bring them face-to-face with a world-shaking truth that has remained buried - until now. ', 480, ' Bantam Press (GB) ', '42.80', 'Yes', 'English'),
(3, 'The Subtle Art of Not Giving a F*ck : A Counterintuitive Approach to Living a Good Life ', 'Manson, Mark', 'In this generation-defining self-help guide, a superstar blogger cuts through the crap to show us how to stop trying to be \"positive\" all the time so that we can truly become better, happier people. For decades, we?ve been told that positive thinking is the key to a happy, rich life. \"F**k positivity,\" Mark Manson says. \"Let?s be honest, shit is f**ked and we have to live with it.\" In his wildly popular Internet blog, Mason doesn?t sugarcoat or equivocate. He tells it like it is?a dose of raw, refreshing, honest truth that is sorely lacking today. The Subtle Art of Not Giving a F**k is his antidote to the coddling, let?s-all-feel-good mindset that has infected American society and spoiled a generation, rewarding them with gold medals just for showing up. Manson makes the argument, backed both by academic research and well-timed poop jokes, that improving our lives hinges not on our ability to turn lemons into lemonade, but on learning to stomach lemons better. Human beings are flawed and limited?\"not everybody can be extraordinary, there are winners and losers in society, and some of it is not fair or your fault.\" Manson advises us to get to know our limitations and accept them. Once we embrace our fears, faults, and uncertainties, once we stop running and avoiding and start confronting painful truths, we can begin to find the courage, perseverance, honesty, responsibility, curiosity, and forgiveness we seek. There are only so many things we can give a f**k about so we need to figure out which ones really matter, Manson makes clear. While money is nice, caring about what you do with your life is better, because true wealth is about experience. A much-needed grab-you-by-the-shoulders-and-look-you-in-the-eye moment of real-talk, filled with entertaining stories and profane, ruthless humor, The Subtle Art of Not Giving a F**k is a refreshing slap for a generation to help them lead contented, grounded lives. ', 304, 'Harperone (US) ', '29.96', 'Yes', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user` int(10) UNSIGNED NOT NULL,
  `serialNum` int(10) UNSIGNED NOT NULL,
  `bookname` varchar(10) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logincust`
--

CREATE TABLE `logincust` (
  `custID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logincust`
--

INSERT INTO `logincust` (`custID`, `username`, `password`) VALUES
(11, 'test', '123');

-- --------------------------------------------------------

--
-- Table structure for table `loginstaff`
--

CREATE TABLE `loginstaff` (
  `staffID` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginstaff`
--

INSERT INTO `loginstaff` (`staffID`, `name`, `username`, `password`, `role`) VALUES
(1, 'michael', 'michael', '123', 'Content Creator'),
(2, 'Mary', 'mary', '123', 'Marketing '),
(3, 'Edward', 'eddy', '123', 'Web Administrator'),
(4, 'John Willard', 'john_will', '123', 'Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`time`, `event`) VALUES
('2018-02-11 01:38:32', 'Successful Data Insertion'),
('2018-02-11 01:38:36', 'Successful Data Insertion'),
('2018-02-11 01:45:48', 'Successful Data Insertion'),
('2018-02-11 01:46:38', 'Successful Data Insertion'),
('2018-02-11 01:47:31', 'Successful Data Insertion'),
('2018-02-11 01:50:32', 'Successful Data Insertion'),
('2018-02-11 01:50:47', 'Successful Data Insertion'),
('2018-02-11 01:51:01', 'Successful Data Insertion'),
('2018-02-11 01:51:06', 'Successful Data Insertion'),
('2018-02-11 01:58:13', 'Successful Data Insertion');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `cartID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `serialNum` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`cartID`, `custID`, `serialNum`, `quantity`, `price`, `amount`) VALUES
(31, 11, 1, 2, '32.10', '64.20'),
(32, 11, 2, 2, '42.80', '85.60'),
(33, 11, 3, 2, '29.96', '59.92');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `supplier` varchar(50) NOT NULL,
  `supplier_id` int(4) UNSIGNED NOT NULL,
  `serialNum` bigint(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `wholesaleValue` decimal(6,2) UNSIGNED NOT NULL,
  `retailValue` decimal(6,2) UNSIGNED NOT NULL,
  `quantityInStock` int(6) UNSIGNED NOT NULL,
  `stockValue` decimal(9,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`supplier`, `supplier_id`, `serialNum`, `title`, `wholesaleValue`, `retailValue`, `quantityInStock`, `stockValue`) VALUES
('BookSupplier', 237, 1, 'The Midnight Lane', '25.00', '32.10', 539, '17302.90'),
('ReadingEveryday', 26, 2, 'Origin', '37.00', '42.80', 45, '1926.00'),
('Books are good for you', 324, 3, 'The Subtle Art of Not Giving a F*ck : A Counterintuitive Approach to Living a Good Life ', '37.00', '43.00', 2, '86.00'),
('Frank Bettger', 666, 4, 'How I raised myself from failure to success in selling', '10.00', '19.90', 5, '99.50'),
('Roald Dahl', 321, 5, 'Matilda', '5.90', '10.20', 202, '2060.40'),
('The Definitive Edition', 8008, 6, 'The Diary of a Young Girl - Anne Frank', '10.96', '18.73', 57, '1067.61'),
('William Golding', 9, 7, 'Lord of the Flies', '12.13', '18.14', 154, '2811.70');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `address`, `email`, `password`) VALUES
(1, 'Admin', 'Majik', 'Joker', 'Batman Lane 4 #05-24', 'MajikJoker@gmai.com', '$2y$12$8oQxIa5RUBCISK0qIW6tFumIqgTjBa5m8OgqoYQSMD3zOb68RDXNO'),
(6, 'No One', 'Bhone', 'Kyaw', 'Tampines Street 21', 'bhone.htetkyaw@gmail.com', '$2y$12$c9oV.SfjSo1/XamwqOwxZuY2a3NT8ztVUJXNP7T5KpwbhFhh0wMki'),
(7, 'hi', 'hi', 'hi', 'hi', 'hi', '$2y$12$yeVsDH.tTfQDzcmAc/TbuuLKLm/XohouI9qRGX/HS24hwRdtsrIAi'),
(9, 'asd', 'asd', 'asd', '$2y$12$cB7gqScXL93euW.l3vxRe.PcTF3Gvj3k6AW.pGrXEWIU8NtEi89Lm', 'm@gmail.com', '$2y$12$YhtJovFRFuEqdii3LKS6f.CHPpGzIjQvPb.dGHRpIxna3hWSWeXqa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`serialNum`);

--
-- Indexes for table `logincust`
--
ALTER TABLE `logincust`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `loginstaff`
--
ALTER TABLE `loginstaff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`time`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`serialNum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logincust`
--
ALTER TABLE `logincust`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loginstaff`
--
ALTER TABLE `loginstaff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `serialNum` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
