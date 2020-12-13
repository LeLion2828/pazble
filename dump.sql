-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 09:15 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pazble`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptingbid`
--

CREATE TABLE `acceptingbid` (
  `AcceptingBid_id` int(11) NOT NULL,
  `bid_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acceptingbid`
--

INSERT INTO `acceptingbid` (`AcceptingBid_id`, `bid_id`, `user_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `biding`
--

CREATE TABLE `biding` (
  `bid_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `bid_price` varchar(200) DEFAULT NULL,
  `postjob_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biding`
--

INSERT INTO `biding` (`bid_id`, `user_id`, `job_id`, `bid_price`, `postjob_id`) VALUES
(1, 3, 1, '2500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `boss_post_job`
--

CREATE TABLE `boss_post_job` (
  `postjob_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_posted` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boss_post_job`
--

INSERT INTO `boss_post_job` (`postjob_id`, `job_id`, `user_id`, `date_posted`) VALUES
(1, 1, 1, '2020-11-25 19:04:45'),
(2, 2, 4, '2020-11-27 09:03:19'),
(3, 3, 1, '2020-12-12 09:24:08'),
(4, 4, 1, '2020-12-13 06:14:28'),
(5, 6, 1, '2020-12-13 07:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `followsystem`
--

CREATE TABLE `followsystem` (
  `followsystem_id` int(11) NOT NULL,
  `user_id_follow` int(11) DEFAULT NULL,
  `user_id_follower` int(11) DEFAULT NULL,
  `status_follow` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followsystem`
--

INSERT INTO `followsystem` (`followsystem_id`, `user_id_follow`, `user_id_follower`, `status_follow`) VALUES
(6, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgetpwds`
--

CREATE TABLE `forgetpwds` (
  `forgetpwd_id` int(11) NOT NULL,
  `mobile_num` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgetpwds`
--

INSERT INTO `forgetpwds` (`forgetpwd_id`, `mobile_num`, `user_id`, `code`) VALUES
(1, '54884669', 1, 'bHnVzr');

-- --------------------------------------------------------

--
-- Table structure for table `happenings`
--

CREATE TABLE `happenings` (
  `hapen_id` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `posted_time` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `raters` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `happenings`
--

INSERT INTO `happenings` (`hapen_id`, `comments`, `posted_time`, `user_id`, `raters`) VALUES
(1, 'hi guys', 'November 25, 2020, 7:02 pm', 1, NULL),
(2, 'test', 'December 12, 2020, 4:56 am', 10, NULL),
(3, 'ggggggg', 'December 12, 2020, 4:10 pm', 1, NULL),
(4, 'tttttt', 'December 12, 2020, 4:10 pm', 1, NULL),
(5, 'koko', 'December 12, 2020, 4:10 pm', 1, NULL),
(6, 'pokli', 'December 12, 2020, 4:12 pm', 1, '{\"1\":1}'),
(7, 'tgigig', 'December 12, 2020, 4:13 pm', 1, NULL),
(8, 'asdasd', 'December 13, 2020, 12:34 am', 1, '{\"1\":1}'),
(9, 'dhello', 'December 13, 2020, 12:36 am', 1, '{\"1\":1}'),
(10, 'dhello', 'December 13, 2020, 12:37 am', 1, '{\"1\":1}'),
(11, 'test', 'December 13, 2020, 12:39 am', 1, '{\"1\":1}'),
(12, '3r2r3', 'December 13, 2020, 1:46 pm', 1, '{\"1\":1,\"25\":25}'),
(13, 'skyad', 'December 13, 2020, 5:51 pm', 1, '{\"25\":25}'),
(14, '3e', 'December 13, 2020, 6:06 pm', 1, '{\"25\":25}'),
(15, 'wdq', 'December 13, 2020, 6:10 pm', 1, '{\"1\":1,\"25\":25}'),
(16, 'this is a test to met dan database', 'December 13, 2020, 6:11 pm', 1, '{\"1\":1,\"25\":25}'),
(17, 'helo', 'December 13, 2020, 8:33 pm', 25, '{\"25\":25}');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `Description`, `Address`, `Status`) VALUES
(1, 'Painter', 'two room to paint', 'Pulnah Lane Riche Terre', 1),
(2, 'Electricity', 'two rooms in electricity', 'Moka', 0),
(3, 'test', 'test', 'test', 0),
(4, 'Lumberjack', 'Cutting trees', 'Addr', 0),
(5, 'Lumberjack', 'Cutting trees', 'Addr', 0),
(6, 'Electrician', 'Repairs broken wires', 'Addr', 0),
(7, 'Electrician', 'Repairs broken wires', 'Addr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `service` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `service`, `category`, `description`, `rate`, `user_id`) VALUES
(1, 'ttt', 'ttt', 'tttt', 'tttt', 3),
(2, 'test', 'test', 'test', 'test', 25);

-- --------------------------------------------------------

--
-- Table structure for table `ratingworkers`
--

CREATE TABLE `ratingworkers` (
  `rate_id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingworkers`
--

INSERT INTO `ratingworkers` (`rate_id`, `worker_id`, `rating`) VALUES
(1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `reply_message` varchar(255) DEFAULT NULL,
  `hapen_id` int(11) DEFAULT NULL,
  `replyuserid` int(11) DEFAULT NULL,
  `time_reply` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_message`, `hapen_id`, `replyuserid`, `time_reply`) VALUES
(1, 'hi man ki rol', 1, 4, 'November 27, 2020, 9:01 am'),
(2, 'test', 1, NULL, 'December 11, 2020, 10:10 am'),
(3, 'dd', 1, NULL, 'December 11, 2020, 10:10 am'),
(4, 'sds', 1, NULL, 'December 11, 2020, 10:11 am'),
(5, '', 1, NULL, 'December 12, 2020, 3:41 am'),
(6, 'test', 1, 1, 'December 12, 2020, 4:45 am'),
(7, 'T1', 2, 10, 'December 12, 2020, 6:44 am'),
(13, 't5', 2, 10, 'December 12, 2020, 7:47 am'),
(16, '', 2, NULL, 'December 12, 2020, 10:07 am'),
(17, '1', 2, NULL, 'December 12, 2020, 10:07 am'),
(20, 'yyy', 2, 1, 'December 12, 2020, 2:16 pm'),
(22, 'hi man ki rol', 7, 1, 'December 12, 2020, 4:13 pm'),
(24, 'test', 7, 10, 'December 12, 2020, 6:55 pm'),
(25, 'someil', 11, 1, 'December 13, 2020, 12:40 am'),
(26, 'wa', 11, 1, 'December 13, 2020, 12:40 am'),
(28, '15 min', 11, 1, 'December 13, 2020, 12:46 am'),
(29, 'dqww', 10, 1, 'December 13, 2020, 12:53 am'),
(30, '11', 11, 1, 'December 13, 2020, 12:53 am'),
(31, '10', 10, 1, 'December 13, 2020, 12:53 am'),
(32, 'bonjor', 10, 1, 'December 13, 2020, 12:54 am'),
(33, 'pills', 9, 1, 'December 13, 2020, 12:54 am'),
(34, 'sava', 8, 1, 'December 13, 2020, 12:54 am'),
(35, 'no sava pas', 7, 1, 'December 13, 2020, 12:54 am'),
(36, '3e', 12, 1, 'December 13, 2020, 1:46 pm'),
(37, 'wer ki dir', 11, 1, 'December 13, 2020, 8:08 pm'),
(38, 'hello ', 16, 1, 'December 13, 2020, 8:09 pm'),
(39, 'ki dir tou korek', 16, 1, 'December 13, 2020, 8:09 pm'),
(40, 'oui tou korek', 15, 1, 'December 13, 2020, 8:09 pm'),
(41, 'sinon korek', 14, 1, 'December 13, 2020, 8:09 pm'),
(42, 'waa korek', 16, 25, 'December 13, 2020, 8:35 pm'),
(43, 'soupe', 17, 25, 'December 13, 2020, 8:35 pm'),
(44, '', 3, 1, 'December 13, 2020, 9:09 pm'),
(45, 'hello pokki', 6, 1, 'December 13, 2020, 9:09 pm');

-- --------------------------------------------------------

--
-- Table structure for table `uploadproof`
--

CREATE TABLE `uploadproof` (
  `uploadproof_id` int(11) NOT NULL,
  `paths` varchar(255) DEFAULT NULL,
  `status_proof` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadproof`
--

INSERT INTO `uploadproof` (`uploadproof_id`, `paths`, `status_proof`, `user_id`) VALUES
(3, 'uploadproof/3/proof5fc0bc3c40e9d9.90714783.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `Firstname` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `countryCode` varchar(10) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(200) DEFAULT NULL,
  `gravatar` varchar(255) DEFAULT NULL,
  `verify_code` varchar(200) NOT NULL,
  `status_check` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Firstname`, `Lastname`, `countryCode`, `phone`, `password`, `usertype`, `gravatar`, `verify_code`, `status_check`) VALUES
(1, 'Pravish', 'Rambo', '+230', '54884669', '$2y$10$y2VEUUvmkzUd1NtiSSRME.kvXihzcrMASXHeCNfoxwUtFnIBNFEgS', 'client', 'userpic/1/5fbea9fb080b29.19516900.jpg', '5fbea9bcba108', 1),
(2, 'Megna', 'Ujuda', '+230', '59215977', '$2y$10$aKyT.wivq7ZD.wZeaDPtUuQDxV/Bhrf53YNWT0hzs3YnQFDG.lW.S', NULL, NULL, 'JiJtFA', 1),
(3, 'kushal', 'tawa', '+230', '57160893', '$2y$10$XFVY9aGp6Xqt1U8Rz5irSOIj8lfv8PZMca96gwbYNoH43Tzp/484S', 'worker', 'userpic/3/5fc0b98fcb2077.71481031.jpg', 'jXBhWH', 1),
(4, 'Keshini', 'tawa', '+230', '59449491', '$2y$10$Q0KKxVIYNziNPCUZ0LYQDO.mRAeYnQbhhkjNYpD6XCIcYN57BhJjq', 'client', 'userpic/4/5fc0c05a681793.11301558.png', '1gtmta', 1),
(5, 'Adil', 'Aboobakar', '+230', '57060668', '$2y$10$RphvtddL9gf4RoTRJJjGjO4PpDXAkOtVxDCYUiCTu2sjdXHJYeu5W', 'worker', 'userpic/5/5fc0f6fa597490.97264654.jpg', 'XD3z1V', 1),
(6, 'Adil', 'Aboobakar', '+230', '51234567', '$2y$10$imNft9a6xhvds4ZpcLxg5OhlQWs2tXrN.xS2ZTkLWX5g2hqiiLjMK', NULL, NULL, 'yqsKpf', 0),
(8, 'Ritish', 'tawa', '+230', '58061933', '$2y$10$cNQ6GHt6qLY6ZZK0FesWMuTBI9IA3qRJIGj2LPsdLCogNBJ0SP8qO', NULL, NULL, 't5cYZM', 1),
(9, 'test', 'testa', '+230', '59796708', '$2y$10$vchgTWGD4DFJSexzYXYi.uCTMnbpw.kByN.B/ub4iBaYLiMxhUnD6', 'client', 'userpic/9/5fd448df802537.19865902.jpg', 'Zc6jpD', 1),
(10, 'Test', 'T', '+230', '59366706', '$2y$10$sN4o37S06PiFRxrEJQV5r.HCLUM3eTqxAYHe.J/vv2WMNf9FJ2j3y', 'worker', 'userpic/10/5fd44d557fc563.24661318.png', '7zGFZu', 1),
(24, 'pills', 'boi', '+230', '57871179', '$2y$10$qig7L7y7a6Oy.igIv2mn9.tfR2mjmt52U3jBB.dGAH2TRCtFu5j2C', NULL, NULL, 'na5rU6', 0),
(25, 'sky', 'test', '+230', '59072057', '$2y$10$zQKiSs.sd6BiLoxE0DD.eeMYIwf64k6eQcwZHpfvWqXfInNm.Y5zO', 'client', 'userpic/3/5fc0b98fcb2077.71481031.jpg', 'iIPqhi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptingbid`
--
ALTER TABLE `acceptingbid`
  ADD PRIMARY KEY (`AcceptingBid_id`),
  ADD KEY `bid_id` (`bid_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `biding`
--
ALTER TABLE `biding`
  ADD PRIMARY KEY (`bid_id`),
  ADD UNIQUE KEY `bid_unique` (`user_id`,`job_id`,`postjob_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `postjob_id` (`postjob_id`);

--
-- Indexes for table `boss_post_job`
--
ALTER TABLE `boss_post_job`
  ADD PRIMARY KEY (`postjob_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `followsystem`
--
ALTER TABLE `followsystem`
  ADD PRIMARY KEY (`followsystem_id`),
  ADD KEY `user_id_follow` (`user_id_follow`),
  ADD KEY `user_id_follower` (`user_id_follower`);

--
-- Indexes for table `forgetpwds`
--
ALTER TABLE `forgetpwds`
  ADD PRIMARY KEY (`forgetpwd_id`),
  ADD UNIQUE KEY `mobile_num` (`mobile_num`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `happenings`
--
ALTER TABLE `happenings`
  ADD PRIMARY KEY (`hapen_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `ratingworkers`
--
ALTER TABLE `ratingworkers`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `hapen_id` (`hapen_id`),
  ADD KEY `replyuserid` (`replyuserid`);

--
-- Indexes for table `uploadproof`
--
ALTER TABLE `uploadproof`
  ADD PRIMARY KEY (`uploadproof_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `verify_code` (`verify_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptingbid`
--
ALTER TABLE `acceptingbid`
  MODIFY `AcceptingBid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biding`
--
ALTER TABLE `biding`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boss_post_job`
--
ALTER TABLE `boss_post_job`
  MODIFY `postjob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `followsystem`
--
ALTER TABLE `followsystem`
  MODIFY `followsystem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forgetpwds`
--
ALTER TABLE `forgetpwds`
  MODIFY `forgetpwd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `happenings`
--
ALTER TABLE `happenings`
  MODIFY `hapen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratingworkers`
--
ALTER TABLE `ratingworkers`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `uploadproof`
--
ALTER TABLE `uploadproof`
  MODIFY `uploadproof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceptingbid`
--
ALTER TABLE `acceptingbid`
  ADD CONSTRAINT `acceptingBid_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `biding` (`bid_id`),
  ADD CONSTRAINT `acceptingBid_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `biding`
--
ALTER TABLE `biding`
  ADD CONSTRAINT `biding_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `biding_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `biding_ibfk_3` FOREIGN KEY (`postjob_id`) REFERENCES `boss_post_job` (`postjob_id`);

--
-- Constraints for table `boss_post_job`
--
ALTER TABLE `boss_post_job`
  ADD CONSTRAINT `boss_post_job_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `boss_post_job_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `followsystem`
--
ALTER TABLE `followsystem`
  ADD CONSTRAINT `followsystem_ibfk_1` FOREIGN KEY (`user_id_follow`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `followsystem_ibfk_2` FOREIGN KEY (`user_id_follower`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `forgetpwds`
--
ALTER TABLE `forgetpwds`
  ADD CONSTRAINT `forgetpwds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `happenings`
--
ALTER TABLE `happenings`
  ADD CONSTRAINT `happenings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ratingworkers`
--
ALTER TABLE `ratingworkers`
  ADD CONSTRAINT `ratingworkers_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`hapen_id`) REFERENCES `happenings` (`hapen_id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`replyuserid`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `uploadproof`
--
ALTER TABLE `uploadproof`
  ADD CONSTRAINT `uploadproof_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
