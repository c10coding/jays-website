-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 04:37 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cupworm`
--

-- --------------------------------------------------------

--
-- Table structure for table `discountcode`
--

CREATE TABLE `discountcode` (
  `code` varchar(255) NOT NULL,
  `used` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discountcode`
--

INSERT INTO `discountcode` (`code`, `used`, `percentage`) VALUES
('TESTCODE', '9', '10'),
('TESTCODE2', '23', '10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_type` text NOT NULL,
  `created` text NOT NULL,
  `price` int(11) NOT NULL,
  `black` longblob,
  `white` longblob,
  `red` longblob,
  `orange` longblob,
  `yellow` longblob,
  `green` longblob,
  `purple` longblob,
  `pink` longblob,
  `gray` longblob,
  `brown` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_type`, `created`, `price`, `black`, `white`, `red`, `orange`, `yellow`, `green`, `purple`, `pink`, `gray`, `brown`) VALUES
(1, 'Black necklace', '', '2019-11-08', 0, 0x6e65636b6c6163652e6a7067, '', '', '', '', '', '', '', '', ''),
(2, 'Red necklace', 'necklace', '2019-11-08', 20, '', '', 0x697120706f696e74732e6a7067, '', '', '', '', '', '', ''),
(5, 'Random bracelet', 'bracelet', '2019-11-10', 200, '', 0x646f776e6c6f61642e6a7067, 0x7265645f6e65636b6c6163652e6a7067, '', '', '', '', '', '', ''),
(6, 'My product name', 'bracelet', '2019-11-10', 20, 0x636c6173735363686564756c652e504e47, '', '', '', '', '', '', 0x6c6966652e504e47, '', ''),
(7, 'My necklace', 'necklace', '2019-11-10', 300, '', '', '', '', '', '', '', 0x633159485241462e706e67, 0x697120706f696e74732e6a7067, 0x46496e436861742e706e67),
(8, 'sdfa', 'bracelet', '2019-11-10', 20, '', '', '', '', '', '', '', '', 0x436170747572652e504e47, 0x323031392d30372d33315f31392e35382e30342e706e67),
(9, 'My product', 'bracelet', '2019-11-11', 1000, 0x46496e436861742e706e67, '', '', '', '', '', '', '', '', ''),
(10, 'This is my new product', 'bracelet', '2019-11-11', 324, 0x633159485241462e706e67, '', '', '', '', '', '', '', '', ''),
(11, 'fgdgsf', 'bracelet', '2019-11-11', 45325, '', '', 0x646f776e6c6f61642e6a7067, 0x436170747572652e504e47, '', '', '', '', '', ''),
(12, 'Last test hpoefully :) :) :)', 'bracelet', '2019-11-11', 32432, 0x323031392d30372d33315f31392e35382e30342e706e67, 0x633159485241462e706e67, 0x6c6966652e504e47, 0x697120706f696e74732e6a7067, '', '', '', '', '', ''),
(13, '2 test', 'bracelet', '2019-11-11', 69000, '', '', '', '', 0x54796c65722e6a7067, 0x736572766572322e504e47, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discountcode`
--
ALTER TABLE `discountcode`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
