-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2024 at 09:22 AM
-- Server version: 5.7.39-log
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `InteriorDesignStudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `Invoices`
--

CREATE TABLE `Invoices` (
  `InvoiceID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Invoices`
--

INSERT INTO `Invoices` (`InvoiceID`, `ProjectID`, `IssueDate`, `DueDate`, `Amount`, `Status`) VALUES
(1, 1, '2024-01-05', '2024-01-20', '1200.00', 'Paid'),
(2, 2, '2024-03-01', '2024-04-01', '18000.00', 'Unpaid'),
(3, 2, '2024-06-12', '2024-05-30', '977.00', 'Оплачено');

-- --------------------------------------------------------

--
-- Table structure for table `ProjectComments`
--

CREATE TABLE `ProjectComments` (
  `CommentID` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `Author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comment` text COLLATE utf8mb4_unicode_ci,
  `DateCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ProjectComments`
--

INSERT INTO `ProjectComments` (`CommentID`, `ProjectID`, `Author`, `Comment`, `DateCreated`) VALUES
(1, 1, 'admin_user', 'Great job on the living room design!', '2024-02-02 10:00:00'),
(2, 2, 'admin', 'Excited to see the final result! asdasd', '2024-03-01 15:30:00'),
(3, 2, 'admin', 'Test comment', '2024-06-11 11:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `ProjectID` int(11) NOT NULL,
  `CreatorID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ServiceID` int(11) DEFAULT NULL,
  `ProjectName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Budget` decimal(10,2) DEFAULT NULL,
  `PhotoPath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`ProjectID`, `CreatorID`, `ClientID`, `ServiceID`, `ProjectName`, `StartDate`, `EndDate`, `Status`, `Budget`, `PhotoPath`) VALUES
(1, 2, 4, 1, 'Living Room Design', '2024-01-01', '2024-02-01', 'Completed', '1200.00', 'living.jpg'),
(2, 3, 5, 2, 'Kitchen Renovation', '2024-02-15', '2024-05-15', 'In Progress', '18000.00', 'kitchen.jpg'),
(6, 6, 5, 1, 'New 2', '2024-06-10', '2024-06-14', 'Good', '123123.00', 'kitchen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`RoleID`, `RoleName`) VALUES
(1, 'admin'),
(3, 'client'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`ServiceID`, `ServiceName`, `Description`, `Price`) VALUES
(1, 'Interior Design Consultation', 'Initial consultation for interior design', '100.00'),
(2, 'Full Room Design', 'Complete design of a single room', '1000.00'),
(3, 'Home Renovation', 'Comprehensive home renovation services', '15000.00');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `PasswordHash`, `Email`, `RoleID`, `CreatedAt`) VALUES
(1, 'admin_user', 'hashedpassword1', 'admin@example.com', 1, '2024-06-10 14:04:12'),
(2, 'employee_user1', 'hashedpassword2', 'employee1@example.com', 2, '2024-06-10 14:04:12'),
(3, 'employee_user2', 'hashedpassword3', 'employee2@example.com', 2, '2024-06-10 14:04:12'),
(4, 'client_user1', 'hashedpassword4', 'client1@example.com', 3, '2024-06-10 14:04:12'),
(5, 'client_user2', 'hashedpassword5', 'client2@example.com', 3, '2024-06-10 14:04:12'),
(6, 'admin', '$2y$10$k0bTmcngr0GRxU.QEV2BXeHU7fVp/rg0D5ifrQa0T5mtFWaRZ1cUG', 'admin@gmail.com', 3, '2024-06-10 14:48:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `ProjectComments`
--
ALTER TABLE `ProjectComments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`ProjectID`),
  ADD KEY `CreatorID` (`CreatorID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`),
  ADD UNIQUE KEY `RoleName` (`RoleName`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Invoices`
--
ALTER TABLE `Invoices`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ProjectComments`
--
ALTER TABLE `ProjectComments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Invoices`
--
ALTER TABLE `Invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `Projects` (`ProjectID`) ON DELETE CASCADE;

--
-- Constraints for table `ProjectComments`
--
ALTER TABLE `ProjectComments`
  ADD CONSTRAINT `projectcomments_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `Projects` (`ProjectID`) ON DELETE CASCADE;

--
-- Constraints for table `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `Users` (`UserID`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`ClientID`) REFERENCES `Users` (`UserID`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`ServiceID`) REFERENCES `Services` (`ServiceID`) ON DELETE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `Roles` (`RoleID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
