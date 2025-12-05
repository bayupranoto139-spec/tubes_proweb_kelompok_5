-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2025 at 02:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_hp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pesan` varchar(1000) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `nomor_hp`, `pesan`) VALUES
(1, 'Barik', 'barikkk@gmail.com', '085143125472', 'Suasana cafe nya sangan bagus dan menu menu nya juga worth it untuk dipesan'),
(2, 'Yazkia', 'yazkiyazr@gmail.com', '085260564766', 'Pelayanannya sangat bagus, ramah dan cepat '),
(3, 'Pasa', 'Paspasa@gmail.com', '089654379765', 'Kopi di sini sangat enak, walaupun bikin ga tidur'),
(7, 'raja', 'rajaa@rty', '0813454', 'makan dan minumannya enak');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `rekomendasi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `nama_menu`, `harga`, `deskripsi`, `kategori`, `foto`, `rekomendasi`) VALUES
(8, 'Glaze Donut', 18000, 'Donut lembut dengan icing sugar', 'food', 'glzdnt.jpg', 'yes'),
(9, 'Pancake', 15000, 'Pancake lembut', 'food', 'pancake.jpg', NULL),
(10, 'Cinnamon Roll', 25000, 'Pastry dengan icing topping', 'food', 'cinnamnrl.jpg', NULL),
(13, 'Caramel Cheesecake', 25000, 'Cheesecake rasa caramel', 'food', 'crmlck.jpg', NULL),
(17, 'Strawberry Cake', 25000, 'Strawberry Slice Cake', 'food', 'strawberrycke.jpg', NULL),
(18, 'Cupcake', 20000, 'Soft Cupcake', 'food', 'cuocake.jpg', NULL),
(19, 'Blueberry Cake', 20000, 'Blueberry cake', 'food', 'blueberry.jpg', NULL),
(20, 'Original Cookie', 18000, 'Soft Cookie', 'food', 'ckie.jpg', NULL),
(21, 'Pizza', 20000, 'Heart Pizza', 'food', 'pizza.jpg', 'yes'),
(22, 'Strawberry Sponge Cake', 20000, 'Strawberry Soft Sponge Cake', 'food', 'spongeck.jpg', NULL),
(23, 'Choco Pancake', 20000, 'Chocolate Pancake ice cream', 'food', 'cocpnck.jpg', NULL),
(24, 'Choco Croissant', 22000, 'Chocolate Croissant', 'food', 'chococr.jpg', 'yes'),
(25, 'Pink Donut', 20000, 'Strawberry icing donut', 'food', 'pinkdonut.jpg', NULL),
(26, 'Chocolate donut', 20000, 'Long chocolate donut', 'food', 'cok.jpg', 'yes'),
(27, 'Salad', 22000, 'Healthy salad', 'food', 'salad.jpg', NULL),
(28, 'Sandwich', 18000, 'Egg sandwich', 'food', 'sandwich.jpg', NULL),
(29, 'Sugar Donut', 15000, 'Donut dengan gula tabur', 'food', 'sugar.jpg', NULL),
(30, 'Pain au Chocolate', 20000, 'Roti dengan isian cokelat', 'food', 'painau.jpg', NULL),
(31, 'Burger', 15000, 'Burger dengan isian ayam', 'food', 'burger.jpg', 'yes'),
(33, 'Blue Latte', 15000, 'Latte susu dengan lapisan biru bunga telang, segar dan estetik.', 'drink', 'bluelatte.jpg', NULL),
(35, 'Lotus Foam Latte', 15000, 'Kopi susu dingin dengan foam caramel–lotus dan biskuit Lotus di atasnya.', 'drink', 'lotusfoam.jpg', NULL),
(108, 'Ice Moca Mint', 15000, 'Kopi Hitam, yang dilapisi Sirup Mint, Whipped Cream,  dan Cokelat.', 'drink', 'icedmoca.jpg', NULL),
(136, 'Croissant Sandwich', 25000, 'Croissant isi bacon dan sayur', 'food', 'kwason.jpg', NULL),
(137, 'Apple Pie', 18000, 'Pie dengan isian apple jam ', 'food', 'apple pie.jpg', NULL),
(138, 'Lotus Cookie', 18000, 'Soft cookie dengan isian lotus biscoff', 'food', 'lotus.jpg', NULL),
(139, 'Cake Meringue', 25000, 'Cake dengan cream meringue ', 'food', 'meringue.jpg', NULL),
(140, 'Peppermint Donut', 18000, 'Donut dengan peppermint icing', 'food', 'peppermint donut.jpg', NULL),
(141, 'Cloud Coffee', 25000, 'Kopi yang di serve dengan krim lembut', 'drink', 'cloud coffe.jpg', NULL),
(142, 'Matcha Latte', 20000, 'Matcha yang dipadukan dengan krimer dan susu', 'drink', 'matcha.jpg', NULL),
(143, 'Iced Chocolate Frappucino', 24000, 'Frappucino dengan rasa coklat yang ditambahi whip cream', 'drink', 'frappucinu.jpg', NULL),
(144, 'Hot Coffe', 12000, 'Kopi panas', 'drink', 'hot coffe.jpg', NULL),
(145, 'Chocolate Drink', 18000, 'Minuman rasa coklat yang creamy', 'drink', 'choco.jpg', NULL),
(147, 'Iced Americano', 15000, 'Classic iced americano', 'drink', 'iced americano.jpg', NULL),
(148, 'Creamy Marshmallow Milk', 20000, 'Cloud milk dengan rasa marshmallow', 'drink', 'creamy milk marsmel.jpg', NULL),
(149, 'Hot Latte', 18000, 'hot latte dengan tekstur creamy', 'drink', 'artsy latte.jpg', NULL),
(150, 'Hot Matcha', 18000, 'Hot matcha creamy', 'drink', 'hot matcha.jpg', NULL),
(151, 'Apple Sparkling', 18000, 'Sparkling water dengan perisa dan potongan apel', 'drink', 'apple sparkling.jpg', NULL),
(153, 'Strawberry Cloud', 25000, 'Minuman rasa strawberry dengan cloud cream', 'drink', 'strawberry cloud.jpg', NULL),
(154, 'King Mango', 25000, 'Jus mangga dengan potongan mangga dan whipped cream', 'drink', 'king mango.jpg', NULL),
(155, 'Milk Coffee', 18000, 'Creamy kopi susu', 'drink', 'milk coffee.jpg', NULL),
(156, 'Ice Cream Chocolate', 19000, 'Vanilla ice cream dengan saus coklat', 'drink', 'icecream chocolate.jpg', NULL),
(157, 'Red Whipped', 20000, 'Aneka rasa buah buahan ditambah dengan susu', 'drink', 'red whipped.jpg', NULL),
(159, 'Pink Smoothies', 20000, 'Susu creamy yang di blend dengan strawberry', 'drink', 'pink smoothies.jpg', NULL),
(160, 'Pink Shake', 20000, 'Susu strawberry shake', 'drink', 'pink strawberry shake.jpg', NULL),
(161, 'Boba Coffee', 20000, 'Minuman kopi dengan tambahan boba topping', 'drink', 'boba coffe.jpg', NULL),
(162, 'Vanilla Milshake', 20000, 'Susu vanilla yang dicampur ice cream', 'drink', 'vanilla ms.jpg', NULL),
(163, 'Mix Ice Cream', 20000, 'Ice cream dua rasa yang dilumuri saus cokelat', 'drink', 'choco ice.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `tanggal`, `total_harga`) VALUES
(64, 5, '2025-12-04 23:19:43', 212000),
(65, 6, '2025-12-04 23:20:30', 30000),
(66, 7, '2025-12-04 23:21:22', 74000),
(69, 14, '2025-12-05 09:47:27', 85000),
(70, 3, '2025-12-05 21:28:29', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `menu_id`, `jumlah`, `subtotal`) VALUES
(1, 64, 9, 2, 30000),
(2, 64, 23, 1, 20000),
(3, 64, 141, 1, 25000),
(4, 64, 143, 1, 24000),
(5, 64, 144, 2, 24000),
(6, 64, 8, 1, 18000),
(7, 64, 19, 1, 20000),
(8, 64, 108, 1, 15000),
(9, 64, 150, 2, 36000),
(10, 65, 147, 2, 30000),
(11, 66, 18, 1, 20000),
(12, 66, 28, 1, 18000),
(13, 66, 150, 1, 18000),
(14, 66, 155, 1, 18000),
(17, 69, 10, 1, 25000),
(18, 69, 108, 4, 60000),
(19, 70, 9, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `username`, `role`) VALUES
(3, 'xxxxxx', 'xxx', 'user'),
(4, 'admin123', 'admin', 'admin'),
(5, 'barikitam', 'barik', 'user'),
(6, 'pasapasa', 'Pasa', 'user'),
(7, 'yazrii', 'Yazkia', 'user'),
(8, 'bayu123', 'bayu', 'user'),
(9, 'raja123', 'raja', 'user'),
(10, 'ryan123', 'ryan', 'user'),
(11, 'quinsha123', 'quinsha', 'user'),
(12, 'dayu123', 'dayu', 'user'),
(13, 'jona123', 'jona', 'user'),
(14, 'kuncicadang', 'rajadinata', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
