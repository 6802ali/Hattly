-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2022 at 08:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatlly`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand`, `price`, `quantity`, `description`, `image`, `category`, `type`) VALUES
(1, 'Apple iPhone 13 Pro', 'Apple', 1000999, 3, 'The product is refurbished, fully functional, and in excellent condition. Backed by the 90-day Amazon Renewed Guarantee. - This pre-owned product has been professionally inspected, tested and cleaned by Amazon qualified vendors. It is not certified by Apple. - This product is in \"Excellent condition\". The screen and body show no signs of cosmetic damage visible from 12 inches away. - This product will have a battery that exceeds 80% capacity relative to new. - Accessories may not be original, but will be compatible and fully functional. Product may come in generic box. - Product will come with a SIM removal tool, a charger and a charging cable. Headphone and SIM card are not included. - This product is eligible for a replacement or refund within 90-day of receipt if it does not work as expected. - Refurbished phones are not guaranteed to be waterproof.', 'AppleiPhone13Pro.png', 'Electronics', 'Mobile Phones'),
(2, 'Google Pixel 6 Pro', 'Google', 898000, 50, 'Unlocked Android cell phone gives you the flexibility to change carriers and choose your own data plan[1]; the new, redesigned Pixel 6 Pro is the smartest and fastest Pixel yet[2] The powerful Google Tensor processor is the first processor designed by Google and made for Pixel; takes performance to a whole new level Advanced camera system with wide and ultrawide lenses, 4x optical zoom, and a main sensor that captures 150% more light[3] Pixel’s Magic Eraser[4], Motion Mode, and Portrait Mode professional tools keep your photos sharp, accurate, and focused; Face Unblur can deblur a face to make it sharper[5] Pixel’s fast charging all day battery adapts to you and saves power for apps you use the most [6,7] Keeps your phone protected with the next gen Titan M2 chip, 5 years of security updates[8], and the most hardware layers of any phone[9] New Pixel experience is more modern and intuitive, with colors that reflect your personal style; the At a Glance feature shows you the apps and info you need when you need it, like a boarding pass before a flight[10]', 'GooglePixel6Pro.png', 'Electronics', 'Mobile Phones'),
(4, 'Apple MacBook Pro with Apple M1 Chip', 'Apple', 66000, 2, 'Color: Space Grey Size; 13-Inch Cutting-edge technology Packed with features', 'AppleMacBookProwithAppleM1Chip.jpg', 'Electronics', 'Laptops'),
(5, '2021 Apple MacBook Pro', 'Apple', 44000, 3, 'Apple M1 Pro or M1 Max chip for a massive leap in CPU, GPU and machine learning performance Up to 10-core CPU delivers up to 3.7x faster performance to fly through pro workflows quicker than ever Up to 32-core GPU with up to 13x faster performance for graphics-intensive apps and games 16-core Neural Engine for up to 11x faster machine learning performance Longer battery life, up to 17 hours', '2021AppleMacBookPro.jpg', 'Electronics', 'Laptops'),
(6, 'Lenovo IdeaPad Gaming 3 Laptop', 'Lenovo ', 20999, 9, 'Lenovo IdeaPad Gaming 3 Laptop - 11th Intel Core i7-11370H, 16GB RAM, 1TB HDD + 256GB SSD, NVIDIA GTX 1650 4GB GDDR6 Graphics, 15.6\" FHD 1920x1080 IPS 120Hz, 4-Zone RGB Backlit Keyboard, Dos - Black Good Quality with a high end', 'LenovoIdeaPadGaming3Laptop.jpg', 'Electronics', 'Laptops'),
(7, 'Sony PlayStation 5 Console', 'Sony', 16000, 3, 'Sony Play Station', 'SonyPlayStation5Console.jpg', 'Electronics', 'Consoles');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `username` varchar(22) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(22) NOT NULL,
  `country` varchar(29) NOT NULL,
  `city` varchar(29) NOT NULL,
  `street` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `username`, `email`, `password`, `country`, `city`, `street`, `phone`, `age`) VALUES
('Ahmed', 'Ehab', 'ahmed2006862', 'ahmedehab280202@gmail.com', 'ahmed2006862', 'Egypt', 'Cairo', 'group 136', 1000028038, 20),
('aaaaaaa', 'aaaaaaa', 'ahmed2006862', 'ahmedehab280202@gmail.com', 'ahmed2006862', 'Egypt', 'ciro', 'ciro', 1000028038, 20),
('ali', 'ali', 'aliismail123', 'aaaaaaaaa', '123', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 2147483647, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
