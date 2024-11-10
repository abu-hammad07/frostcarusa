-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2023 at 10:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forstcarusa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(255) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `user_contact` varchar(30) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `registered_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) NOT NULL,
  `email_verfied_at` datetime DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `reset_expiration` datetime DEFAULT NULL,
  `reset_token` varchar(300) DEFAULT NULL,
  `is_verified` varchar(10) DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_type`, `user_contact`, `user_image`, `registered_on`, `updated_on`, `updated_by`, `email_verfied_at`, `token`, `reset_expiration`, `reset_token`, `is_verified`, `added_on`, `added_by`) VALUES
(28, 'Abu Hammad', 'hammadking427@gmail.com', '$2y$10$oAKxSalY2awA9MfCoV/7QuO.UjyYHfSRAQaockixN0wwiM5pUw2Ta', 'Admin', '03131192139', '882618588_my_Pic.jpg', '2023-09-19 21:09:24', '2023-09-22 00:26:51', 'Abu Hammad', '2023-09-19 21:09:31', '10ddcc2754f671af36cb7ec34ef2cd', '2023-09-24 21:52:57', NULL, 'active', '2023-09-21 03:49:56', ''),
(55, 'Muhammad Afzal', 'muhammadafzal1903@gmail.com', '$2y$10$B4fbRoWQ3J3arSezu.ITXOyU4X5YctrKPCItqdEJbrfNcAGDyLqZC', 'Admin', '123456789', '', '2023-09-26 23:09:49', NULL, '', NULL, '8abb0dc6c2f3f9b94edc7920c5dcf0', NULL, NULL, 'Inactive', '2023-09-26 23:09:49', 'Abu Hammad');

-- --------------------------------------------------------

--
-- Table structure for table `importer_details`
--

CREATE TABLE `importer_details` (
  `importer_id` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_contact` varchar(50) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_city` varchar(255) DEFAULT NULL,
  `company_state` varchar(255) DEFAULT NULL,
  `company_zipcode` int(10) DEFAULT NULL,
  `company_telephone` varchar(50) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `company_direct` varchar(255) DEFAULT NULL,
  `company_port_of_entry` varchar(255) DEFAULT NULL,
  `company_vessel_detail` varchar(255) DEFAULT NULL,
  `company_trucking` varchar(255) DEFAULT NULL,
  `company_misc` varchar(255) DEFAULT NULL,
  `total_cost` varchar(255) DEFAULT NULL,
  `custom_frieght` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `importer_details`
--

INSERT INTO `importer_details` (`importer_id`, `company_name`, `company_contact`, `company_address`, `company_city`, `company_state`, `company_zipcode`, `company_telephone`, `company_email`, `company_direct`, `company_port_of_entry`, `company_vessel_detail`, `company_trucking`, `company_misc`, `total_cost`, `custom_frieght`, `added_on`, `added_by`, `updated_on`, `updated_by`) VALUES
(9, 'Hammad Kamal', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 10:50:40', 'Abu Hammad', NULL, NULL),
(10, 'Karachi Pakistan', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 10:50:55', 'Abu Hammad', NULL, NULL),
(11, 'Lahore Islamabad', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 10:51:07', 'Abu Hammad', NULL, NULL),
(12, 'Anus Hammad Afzal Muhammad Rabee', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 10:56:45', 'Abu Hammad', NULL, NULL),
(13, 'Abu Hammad Kamal Ahmed', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 10:57:00', 'Abu Hammad', NULL, NULL),
(14, 'Huzaifa Rahi Islam Rahi', '456132', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 11:12:43', 'Abu Hammad', NULL, NULL),
(15, 'Saifullah Muhammad Ilyas ', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '2023-09-26 11:13:12', 'Abu Hammad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_details`
--

CREATE TABLE `unit_details` (
  `id` int(11) NOT NULL,
  `year` date NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `wheelbase` varchar(255) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `contact_Name` varchar(255) NOT NULL,
  `contact_Num` varchar(255) NOT NULL,
  `fc_Unit_Cost` varchar(255) NOT NULL,
  `fc_Body` varchar(255) NOT NULL,
  `body_Weight` varchar(255) NOT NULL,
  `fc_Model` varchar(255) NOT NULL,
  `exterior_Dimension` varchar(255) NOT NULL,
  `compressor` varchar(255) NOT NULL,
  `comp_Serial` varchar(255) NOT NULL,
  `voltage` varchar(255) NOT NULL,
  `sound_Decibel` varchar(255) NOT NULL,
  `current_FLA` varchar(255) NOT NULL,
  `refrigerant` varchar(255) NOT NULL,
  `condenser` varchar(255) NOT NULL,
  `solenoid` varchar(255) NOT NULL,
  `condenser_Fan` varchar(255) NOT NULL,
  `interior_Lights` varchar(255) NOT NULL,
  `control_Panel` varchar(255) NOT NULL,
  `circuit_Breaker` varchar(255) NOT NULL,
  `electric_Contactor` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `eutectic_Plate` varchar(255) NOT NULL,
  `expansion_Valve` varchar(255) NOT NULL,
  `recovery_Tank` varchar(255) NOT NULL,
  `pressure_Control` varchar(255) NOT NULL,
  `sight_Glass` varchar(255) NOT NULL,
  `filter_Drier` varchar(255) NOT NULL,
  `thermostat` varchar(255) NOT NULL,
  `misc` varchar(255) NOT NULL,
  `front_S_Image` varchar(255) NOT NULL,
  `back_S_Image` varchar(255) NOT NULL,
  `left_S_Image` varchar(255) NOT NULL,
  `right_S_Image` varchar(255) NOT NULL,
  `air_Curtains` varchar(255) NOT NULL,
  `back_Camera` varchar(255) NOT NULL,
  `body_Graphic_Warp` varchar(255) NOT NULL,
  `add_Unit_Carrier` varchar(255) NOT NULL,
  `hand_Truck_Stand` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_details`
--

INSERT INTO `unit_details` (`id`, `year`, `company_name`, `make`, `model`, `wheelbase`, `vin`, `contact_Name`, `contact_Num`, `fc_Unit_Cost`, `fc_Body`, `body_Weight`, `fc_Model`, `exterior_Dimension`, `compressor`, `comp_Serial`, `voltage`, `sound_Decibel`, `current_FLA`, `refrigerant`, `condenser`, `solenoid`, `condenser_Fan`, `interior_Lights`, `control_Panel`, `circuit_Breaker`, `electric_Contactor`, `part`, `eutectic_Plate`, `expansion_Valve`, `recovery_Tank`, `pressure_Control`, `sight_Glass`, `filter_Drier`, `thermostat`, `misc`, `front_S_Image`, `back_S_Image`, `left_S_Image`, `right_S_Image`, `air_Curtains`, `back_Camera`, `body_Graphic_Warp`, `add_Unit_Carrier`, `hand_Truck_Stand`, `other`, `added_on`, `added_by`, `updated_on`, `updated_by`) VALUES
(3, '2023-09-26', 'Abu Hammad Kamal Ahmed', 'Make', '3', 'Wheelbase', 'Vin #', 'Contact Name', 'Contact #', 'Frost Car unit Cost', 'FC Body', 'Body Weight', 'FC Model', 'Exterior Dimension', 'Compressor', 'Comp.Serial', 'Voltage', 'Sound Decibel', 'Current FLA', 'Refrigerant', 'Condenser', 'Solenoid', 'Condenser Fan', 'Interior Lights', 'Control Panel', 'Circuit Breaker', 'Electric Contactor', 'Part #', 'Eutectic Plate', 'Expansion Valve', 'Recovery Tank', 'Pressure Control', 'Sight Glass', 'Filter Drier', 'Thermostat', 'Misc', '951243936_Mens-Herringbone-Blazer-Brown01-600x764.jpg', '908395123_Mens-Lightweight-Puffer-Jacket01-600x764.jpg', '217243500_Mens-Standard-Fit-Crew-T-Shirt03-600x764.jpg', '728649125_Mens-Standard-Fit-Crew-T-Shirt01-600x764.jpg', 'Air Curtains', 'Back Camera', 'Body Graphic Warp', 'Add Unit Carrier', 'Hand Truck Stand', 'Other', '2023-09-26 03:41:59', 'Abu Hammad', '2023-09-26 11:00:24', 'Abu Hammad'),
(4, '2023-09-26', 'Abu Hammad Kamal Ahmed', 'make', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '408342465_', '930268041_', '368395100_', '231204793_', '', '', '', '', '', '', '2023-09-26 03:44:11', 'Abu Hammad', '2023-09-26 11:14:47', 'Abu Hammad'),
(5, '2023-09-26', 'Saifullah Muhammad Ilyas', 'make', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '667773767_', '871283439_', '756593315_', '138914469_', '', '', '', '', '', '', '2023-09-26 03:44:31', 'Abu Hammad', '2023-09-26 11:14:35', 'Abu Hammad'),
(6, '2023-09-26', 'Abu Hammad Kamal Ahmed', 'make', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '273508394_', '889712852_', '659756898_', '747111249_', '', '', '', '', '', '', '2023-09-26 03:44:50', 'Abu Hammad', '2023-09-26 11:10:51', 'Abu Hammad'),
(7, '2023-09-26', 'Anus Hammad Afzal Muhammad Rabee', 'make', '6', 'Wheelbase', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '893689661_', '949524507_', '388086270_', '540755162_', '', '', '', '', '', '', '2023-09-26 10:33:03', 'Abu Hammad', '2023-09-26 11:14:24', 'Abu Hammad'),
(8, '2023-09-26', 'Karachi Pakistan', 'make', '7', 'ghgg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '159184055_', '647887483_', '805142293_', '221999248_', '', '', '', '', '', '', '2023-09-26 10:51:29', 'Abu Hammad', '2023-09-26 11:14:15', 'Abu Hammad'),
(9, '2023-09-26', 'Saifullah Muhammad Ilyas ', 'Hammad', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '776490514_', '932239011_', '755081048_', '768870329_', '', '', '', '', '', '', '2023-09-26 11:14:00', 'Abu Hammad', '0000-00-00 00:00:00', ''),
(10, '2023-09-26', 'Abu Hammad Kamal Ahmed', 'Hammad', '45', 'Wheelbase', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '432355597_', '349056254_', '262415703_', '502859126_', '', '', '', '', '', '', '2023-09-26 11:29:45', 'Abu Hammad', '0000-00-00 00:00:00', ''),
(11, '2023-09-26', 'Anus Hammad Afzal Muhammad Rabee', 'Hammad', '55', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '733207131_', '612436835_', '463155467_', '532632663_', '', '', '', '', '', '', '2023-09-26 11:36:53', 'Abu Hammad', '0000-00-00 00:00:00', ''),
(12, '2020-06-10', 'Lahore Islamabad', 'fgfdg', 'fggsd', 'sgdfg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'gdfg', 'gfgd', 'dgdgsgd', '', '', '', '', '', '', '', '', '', '', '', '', '', '281173273_', '434251543_', '250091933_', '398519537_', '', '', '', '', '', '', '2023-11-14 02:13:21', 'Abu Hammad', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `importer_details`
--
ALTER TABLE `importer_details`
  ADD PRIMARY KEY (`importer_id`);

--
-- Indexes for table `unit_details`
--
ALTER TABLE `unit_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `importer_details`
--
ALTER TABLE `importer_details`
  MODIFY `importer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unit_details`
--
ALTER TABLE `unit_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
