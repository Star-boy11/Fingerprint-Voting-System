SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*table user*/
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

/*table candidate*/
CREATE TABLE `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text(100) NOT NULL,
  `number` bigint(10) NOT NULL,
  `candidateid` varchar(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

/*table voter*/
CREATE TABLE `voter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voterid` varchar(10) NOT NULL,
  `name` text(100) NOT NULL,
  `number` bigint(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `isotemplate` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
);


