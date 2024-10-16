-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 16, 2024 at 12:15 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `bookstore_db`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `address`, `gender`, `birthdate`, `phone_number`, `password`, `profile_picture`) VALUES 
(8, 'Jamier Ivan', 'Madrid', 'jamierivan123@gmail.com', 'Quezon City', 'Male', '2024-10-16', '09603081740', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(9, 'Heaven', 'Javier', 'heavenjavier76@gmail.com', 'bulacan', 'Female', '2024-10-16', '09173653009', '827ccb0eea8a706c4c34a16891f84e7b', '');
