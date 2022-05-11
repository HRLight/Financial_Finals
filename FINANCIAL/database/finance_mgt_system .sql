-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payable`
--

CREATE TABLE `accounts_payable` (
  `transaction_no` int(20) NOT NULL,
  `Pk_Account_no` int(20) NOT NULL,
  `Order_no` int(20) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `Discription` text NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Amount` decimal(50,0) NOT NULL,
  `Due_date` date NOT NULL,
  `Date_paid` date NOT NULL,
  `Date_transac` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_payable`
--

INSERT INTO `accounts_payable` (`transaction_no`, `Pk_Account_no`, `Order_no`, `supplier`, `Discription`, `Product_name`, `Amount`, `Due_date`, `Date_paid`, `Date_transac`, `status`) VALUES
(1, 1, 912, 'kier', 'hatdog ni kier', 'hatdog', '123', '2021-12-08', '2021-12-10', '2021-12-24', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `account_receivable`
--

CREATE TABLE `account_receivable` (
  `PK_Transaction_no` int(20) NOT NULL,
  `Account_no` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Value` int(20) NOT NULL,
  `Date_Transact` date NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_receivable`
--

INSERT INTO `account_receivable` (`PK_Transaction_no`, `Account_no`, `Name`, `Description`, `Quantity`, `Value`, `Date_Transact`, `Status`) VALUES
(1, 1234, 'Noel', 'Delivered', 123, 20000, '2021-12-30', 'Collected'),
(2, 123456, 'kier', 'Delivered', 123, 20000, '2022-01-03', 'Collected');

-- --------------------------------------------------------

--
-- Table structure for table `apr_reports`
--

CREATE TABLE `apr_reports` (
  `PK_Request_id` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Requestor` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `Purpose` varchar(50) NOT NULL,
  `Payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `asset_sales`
--

CREATE TABLE `asset_sales` (
  `id` int(11) NOT NULL,
  `seler_name` varchar(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `total_sales` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `description` varchar(20) NOT NULL,
  `s_fname` varchar(100) NOT NULL,
  `s_contact` varchar(15) NOT NULL,
  `s_add` varchar(100) NOT NULL,
  `s_city` varchar(50) NOT NULL,
  `r_fname` varchar(100) NOT NULL,
  `r_contact` varchar(15) NOT NULL,
  `r_add` varchar(100) NOT NULL,
  `r_city` varchar(50) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `type` varchar(25) NOT NULL,
  `weight` int(10) NOT NULL,
  `price` float NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`book_id`, `ref_no`, `description`, `s_fname`, `s_contact`, `s_add`, `s_city`, `r_fname`, `r_contact`, `r_add`, `r_city`, `payment`, `type`, `weight`, `price`, `time`, `date`, `status`, `email`, `Qty`) VALUES
(1, '624c5dc630ca3', '', 'jomar santos', '12345678909', 'novaliches', 'quezon city', 'amber matumbacal', '12345678909', 'camarin', 'caloocan city ', 'Gcash', 'parcel', 1, 500, '23:18:30', '2022-04-05', 'Paid', 'herson@gmail.com', 1),
(9, '624c600a9b5f2', 'For my Cousin', 'francis santosidad', '12234567876', 'jab', 'xnk', 'jomar santos', '12345678909', 'novaliches', 'quezon city ', 'Gcash', 'parcel', 1, 500, '23:28:10', '2022-04-05', 'Paid', 'marrio@gmail.com', 1),
(11, '624c5dc630ca4', 'For the province', 'Mayor', '9070368238', 'novaliche', 'quezon city', 'amber matumbacal', '12345678909', 'camarin', 'caloocan city ', 'Gcash', 'parcel', 1, 500, '23:18:30', '2022-04-05', 'Pending', 'mayor@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `budget_allo`
--

CREATE TABLE `budget_allo` (
  `id` int(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `amount` decimal(50,0) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reccurrence` varchar(50) NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_allo`
--

INSERT INTO `budget_allo` (`id`, `department`, `amount`, `start_date`, `end_date`, `reccurrence`, `document`) VALUES
(4, 'Human ReSource 2', '49500', '2022-04-01', '2022-04-30', 'Monthly', ''),
(5, 'Human ReSource 3', '80000', '2022-04-01', '2022-04-30', 'Monthly', ''),
(9, 'HR1', '16000', '2022-04-01', '2022-04-30', 'Monthly', ''),
(10, 'Human ReSource 5', '50000', '2022-04-01', '2022-04-30', 'Monthly', ''),
(11, 'HR5', '50000', '2022-04-01', '2022-04-30', 'Monthly', '');

-- --------------------------------------------------------

--
-- Table structure for table `budget_report`
--

CREATE TABLE `budget_report` (
  `Pk_Budget_id` int(20) NOT NULL,
  `Month` date NOT NULL,
  `Year` date NOT NULL,
  `Total_cash` decimal(20,0) NOT NULL,
  `Total_budget` decimal(20,0) NOT NULL,
  `Accumulated_Budget` decimal(20,0) NOT NULL,
  `Remaining_Budget` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_report`
--

INSERT INTO `budget_report` (`Pk_Budget_id`, `Month`, `Year`, `Total_cash`, `Total_budget`, `Accumulated_Budget`, `Remaining_Budget`) VALUES
(1, '2022-01-05', '2022-01-13', '45000', '50000', '5000', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `budget_request`
--

CREATE TABLE `budget_request` (
  `id` int(20) NOT NULL,
  `Date` text NOT NULL,
  `Requestor` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Amount` decimal(50,0) NOT NULL,
  `Remarks` text NOT NULL,
  `Purpose` text NOT NULL,
  `Payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget_request`
--

INSERT INTO `budget_request` (`id`, `Date`, `Requestor`, `Department`, `Amount`, `Remarks`, `Purpose`, `Payment_type`) VALUES
(1, '2021-2-12', 'Mix Colaste', 'HR1', '5000', 'Release', 'Reimbursement', 'Cheque'),
(2, '2021-2-12', 'herson', 'HR1', '12000', 'Release', 'payroll', 'Bank Tranfer');

-- --------------------------------------------------------

--
-- Table structure for table `chart_accounts`
--

CREATE TABLE `chart_accounts` (
  `PK_Account_id` int(20) NOT NULL,
  `Acc_no` int(20) NOT NULL,
  `Acc_Name` varchar(50) NOT NULL,
  `Account_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_accounts`
--

INSERT INTO `chart_accounts` (`PK_Account_id`, `Acc_no`, `Acc_Name`, `Account_type`) VALUES
(1, 10010, 'cash On Hand', 'Bank'),
(2, 100012, 'Accounts Recievable(AR)', 'Accounts Recievable(AR)');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `PK_Account_id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Account_no` varchar(20) NOT NULL,
  `Particular` varchar(50) NOT NULL,
  `Ref_no` varchar(20) NOT NULL,
  `Date_recieve` date NOT NULL DEFAULT current_timestamp(),
  `Payment_type` varchar(20) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Collection_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`PK_Account_id`, `Name`, `Account_no`, `Particular`, `Ref_no`, `Date_recieve`, `Payment_type`, `Amount`, `Description`, `Collection_id`) VALUES
(100, 'herson', 'SINV-101028350674', 'Delivery Sales', '624c5dc630ca3', '2022-04-11', 'Cash on Delivery', 2500, 'hatdog lang', 0),
(102, 'herson', 'SINV-101034197625', 'Delivery Sales', '624c5dc630ca3', '2022-04-11', 'Cash on Delivery', 7444, 'hello', 0),
(103, 'hersonlang', 'SINV-101025739486', 'Delivery Sales', '624c600a9b5f2', '2022-04-13', 'Cash on Delivery', 2500, 'hatdog lang', 0),
(104, 'herson', 'SINV-101054908172', 'Delivery Sales', '624c600a9b5f2', '2022-04-14', 'Bank Transfer', 12000, 'hatdog lang', 0),
(105, 'Name', 'SINV-101043190825', 'Delivery Sales', '624c600a9b5f2', '2022-04-14', 'Bank Transfer', 2500, 'hatdog lang', 0),
(106, 'herson', 'SINV-101042318690', 'Delivery Sales', '624c600a9b5f2', '2022-04-14', 'Bank Transfer', 12000, 'hatdog lang', 0),
(107, 'herson', 'SINV-101075061482', 'Delivery Sales', '624c5dc630ca3', '2022-04-14', 'Bank Transfer', 500, 'hatdog lang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone_no` int(11) NOT NULL,
  `vouchers` int(11) NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `status` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`id`, `name`, `address`, `phone_no`, `vouchers`, `amount`, `status`, `email`) VALUES
(1, 'noel ', 'cebu city', 907036823, 0, '500', 'to pay', 'dmadaigmichelle@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `disbursement_form`
--

CREATE TABLE `disbursement_form` (
  `Pk_Request_id_no` int(20) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Requestor` varchar(20) NOT NULL,
  `Amount` decimal(20,0) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disbursement_form`
--

INSERT INTO `disbursement_form` (`Pk_Request_id_no`, `Department`, `Description`, `Requestor`, `Amount`, `Status`, `Date`, `Remarks`) VALUES
(1, 'HR1', 'PAY-ROLL', 'herson', '12000', 'approve', '2012-03-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `journal_entry`
--

CREATE TABLE `journal_entry` (
  `id` int(10) NOT NULL,
  `Acc_no` varchar(20) NOT NULL,
  `Particulars` varchar(100) NOT NULL,
  `credit` decimal(20,0) NOT NULL,
  `debit` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_entry`
--

INSERT INTO `journal_entry` (`id`, `Acc_no`, `Particulars`, `credit`, `debit`) VALUES
(1, 'SINV-101098274351', 'Accounts Recievable(AR)', '500', '0'),
(3, 'SINV-101098274351', 'Collected Sales', '0', '500'),
(4, 'PINV-10001', 'PAY-ROLL', '2000', '0'),
(5, 'SINV-101064715380', 'Accounts Receivable', '500', '0'),
(6, 'SINV-101064715380', 'Collected Sales', '0', '500'),
(7, 'PINV-10001', 'Disburse', '2000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Pk_Disburse_no` int(20) NOT NULL,
  `Request_no` int(20) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Requestor` varchar(50) NOT NULL,
  `Discription` text NOT NULL,
  `Amount` decimal(20,0) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `PK_Rep_id` int(20) NOT NULL,
  `Rep_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_form`
--

CREATE TABLE `request_form` (
  `PK_no` int(20) NOT NULL,
  `Request_no` int(20) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Purpose` varchar(50) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Requestor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trail_bal`
--

CREATE TABLE `trail_bal` (
  `id` int(20) NOT NULL,
  `acc_name` varchar(50) NOT NULL,
  `Acc_no` varchar(20) NOT NULL,
  `credit` decimal(10,0) NOT NULL,
  `debit` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trail_bal`
--

INSERT INTO `trail_bal` (`id`, `acc_name`, `Acc_no`, `credit`, `debit`) VALUES
(3, 'Accounts Recievable(AR)', 'SINV-101098274351', '500', '0'),
(4, 'Collected Sales', 'SINV-101098274351', '0', '500'),
(5, 'Accounts Receivable', 'SINV-101064715380', '500', '0'),
(6, 'Collected Sales', 'SINV-101064715380', '0', '500');

-- --------------------------------------------------------

--
-- Table structure for table `user_mgt`
--

CREATE TABLE `user_mgt` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `user_level` int(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_mgt`
--

INSERT INTO `user_mgt` (`id`, `fname`, `lname`, `username`, `password`, `created`, `user_level`, `user_type`) VALUES
(1, 'Herson ', 'Bontilao', 'herson@gmail.com', '12345', '2022-01-01', 1, 'admin'),
(3, 'Christian ', 'Mayor', 'mayor@gmail.com', '12345', '2022-01-01', 2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  ADD PRIMARY KEY (`transaction_no`);

--
-- Indexes for table `account_receivable`
--
ALTER TABLE `account_receivable`
  ADD PRIMARY KEY (`PK_Transaction_no`);

--
-- Indexes for table `apr_reports`
--
ALTER TABLE `apr_reports`
  ADD PRIMARY KEY (`PK_Request_id`);

--
-- Indexes for table `asset_sales`
--
ALTER TABLE `asset_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `budget_allo`
--
ALTER TABLE `budget_allo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_report`
--
ALTER TABLE `budget_report`
  ADD PRIMARY KEY (`Pk_Budget_id`);

--
-- Indexes for table `budget_request`
--
ALTER TABLE `budget_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_accounts`
--
ALTER TABLE `chart_accounts`
  ADD PRIMARY KEY (`PK_Account_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`PK_Account_id`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disbursement_form`
--
ALTER TABLE `disbursement_form`
  ADD PRIMARY KEY (`Pk_Request_id_no`);

--
-- Indexes for table `journal_entry`
--
ALTER TABLE `journal_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Pk_Disburse_no`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`PK_Rep_id`);

--
-- Indexes for table `request_form`
--
ALTER TABLE `request_form`
  ADD PRIMARY KEY (`PK_no`);

--
-- Indexes for table `trail_bal`
--
ALTER TABLE `trail_bal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mgt`
--
ALTER TABLE `user_mgt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_sales`
--
ALTER TABLE `asset_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `budget_allo`
--
ALTER TABLE `budget_allo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `budget_request`
--
ALTER TABLE `budget_request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `PK_Account_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `disbursement_form`
--
ALTER TABLE `disbursement_form`
  MODIFY `Pk_Request_id_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journal_entry`
--
ALTER TABLE `journal_entry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trail_bal`
--
ALTER TABLE `trail_bal`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_mgt`
--
ALTER TABLE `user_mgt`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
