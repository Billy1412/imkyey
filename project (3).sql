-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `password`) VALUES
('billy123', 'billy12', 'billy'),
('jessymmm', 'jessy', 'jessy'),
('maria1234', 'maria', 'maria'),
('sammm', 'samuel', 'samuel');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `out_date` date NOT NULL,
  `nights` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `harga_room` int(7) NOT NULL,
  `amount` int(9) NOT NULL,
  `detail` text DEFAULT NULL,
  `id_room` varchar(4) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `smoking` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `in_date`, `out_date`, `nights`, `quantity`, `harga_room`, `amount`, `detail`, `id_room`, `id_transaksi`, `breakfast`, `smoking`) VALUES
(1, '2022-09-27', '2022-09-28', 1, 1, 500000, 600000, 'Minta early check in', 'R001', 1, 1, 0),
(2, '2022-10-04', '2022-10-06', 2, 1, 500000, 1200000, '', 'R002', 2, 1, 1),
(3, '2022-10-06', '2022-10-07', 1, 1, 1100000, 1100000, '', 'R003', 3, 0, 0),
(4, '2022-10-18', '2022-10-20', 1, 2, 500000, 1000000, 'Minta ruang dengan view kolam renang\r\n', 'R001', 4, 0, 1),
(5, '2022-10-23', '2022-10-24', 1, 3, 500000, 1800000, '', 'R002', 5, 1, 0),
(6, '2022-11-01', '2022-11-04', 3, 1, 1100000, 3600000, 'Minta late check out jam 1\r\n', 'R003', 6, 1, 0),
(75, '2022-12-27', '2022-12-28', 1, 2, 1100000, 1200000, 'Minta tambah bantal 2', 'R003', 100, 1, 0),
(78, '2022-12-27', '2022-12-29', 2, 1, 8000000, 8000000, '', 'R005', 103, 0, 0),
(79, '2022-12-28', '2022-12-29', 1, 1, 8000000, 8000000, '', 'R005', 104, 0, 0),
(80, '2022-12-12', '2022-12-13', 1, 1, 1100000, 1200000, '', 'R003', 105, 1, 1),
(81, '2022-12-22', '2022-12-23', 1, 1, 8000000, 8000000, '', 'R005', 106, 0, 0),
(82, '2022-12-22', '2022-12-24', 2, 1, 3500000, 7000000, '', 'R004', 107, 0, 0),
(83, '2023-01-01', '2023-01-02', 1, 2, 500000, 1000000, '', 'R002', 108, 1, 0),
(87, '2022-12-26', '2022-12-28', 2, 2, 1100000, 1300000, '', 'R003', 112, 1, 1),
(88, '2022-12-08', '2022-12-10', 2, 1, 3500000, 7000000, '', 'R004', 113, 0, 0),
(91, '2022-12-27', '2022-12-28', 1, 1, 500000, 500000, '', 'R002', 116, 1, 0),
(94, '2022-12-27', '2022-12-28', 1, 2, 1100000, 1200000, '', 'R003', 119, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `id_room` varchar(4) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `id_room`, `nama`) VALUES
(1, 'R001', 'Air Conditioner'),
(2, 'R001', 'Fast Wireless Connectivity'),
(3, 'R001', 'Smart Tv'),
(4, 'R001', 'Hairdryer'),
(5, 'R002', 'Air Conditioner'),
(6, 'R002', 'Fast Wireless Connectivity'),
(7, 'R002', 'Smart Tv'),
(8, 'R002', 'Hairdryer'),
(9, 'R003', 'Smart Rooms & Smart '),
(10, 'R003', 'Air Conditioner'),
(11, 'R003', 'Fast Wireless Connectivity'),
(12, 'R003', 'Smart Tv'),
(13, 'R003', 'Coffee Machine'),
(14, 'R003', 'Hairdryer'),
(15, 'R004', 'Air Conditioner'),
(16, 'R005', 'Air Conditioner'),
(17, 'R006', 'Air Conditioner'),
(18, 'R004', 'Fast Wireless Connectivity'),
(19, 'R005', 'Fast Wireless Connectivity'),
(20, 'R006', 'Fast Wireless Connectivity'),
(21, 'R004', 'Smart Tv'),
(22, 'R005', 'LCD Projector'),
(23, 'R006', 'LCD Projector'),
(24, 'R005', 'Coffee Machine'),
(25, 'R006', 'Coffee Machine');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_kredit`
--

CREATE TABLE `kartu_kredit` (
  `id_kartu` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `cvv` int(3) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu_kredit`
--

INSERT INTO `kartu_kredit` (`id_kartu`, `nama`, `cvv`, `expired_date`) VALUES
('1435346547474475', 'Fadil Jaidi', 236, '2025-06-19'),
('1913192391923919', 'Agnes Monica', 134, '2025-12-10'),
('2436574753524678', 'Tiara Andini', 567, '2023-02-15'),
('3565475685253521', 'Jason Andika', 464, '2023-05-23'),
('4534535243566793', 'Taylor Swift', 680, '2024-08-19'),
('5345365475868681', 'Ani Astuti', 342, '2022-09-15'),
('9423243929442431', 'Budi Santoso', 435, '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `tanggal_lahir`, `no_telp`, `email`, `password`) VALUES
('bill', 'Billay', '2010-06-30', '08675', 'c14210043@john.petra.ac.id', 'gaerf'),
('jessy', 'jessy1', '2019-06-05', '081239239192', 'jessyyy@gmail.com', 'jessy123'),
('M001', 'Bruno Mars', '1983-05-17', '081293193192', 'brunomars98@gmail.com', 'coding1234'),
('M002', 'Taylor Swift', '1978-02-09', '0812358542121', 'taylorkeren@gmail.com', 'yeyyliburr'),
('M003', 'Harry Styles', '1993-07-31', '085123913292', 'harry1d@gmail.com', 'nyanyii983'),
('M004', 'Agnes Monica', '1990-02-14', '0812313212366', 'agnesmo14@gmail.com', 'tralalalaa'),
('M005', 'Fadil Jaidi', '1994-06-22', '081321213891', 'pasukanghoib@gmail.com', 'ghoibanget'),
('M006', 'Selena Gomez', '2000-09-06', '081292539204', 'selenaaaa@gmail.com', 'pizzaenak5'),
('M007', 'Rihanna', '2001-11-22', '0812939131011', 'rihannacantik@gmail.com', 'dufann9836'),
('M008', 'Billie Eillish', '2003-11-19', '0859123910139', 'badguy99@gmail.com', 'happierr44'),
('M009', 'Charlie Puth', '1976-01-11', '081939386935', 'sukamusik123@gmail.com', 'gorilla123'),
('M010', 'Tiara Andini', '2003-10-15', '0810423592955', 'tiaraidol@gmail.com', 'selenmacan'),
('M011', 'Mira', '1983-03-08', '081232492394', 'miraaaakuy@gmail.com', 'rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `detail` text DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal_review` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `user_rating`, `detail`, `id_transaksi`, `tanggal_review`) VALUES
(14, 5, 'Kamar luas dan bagus. Fasilitas juga lengkap, Super recommended buat stay disini!', 1, '2022-09-28'),
(15, 4, 'Staffnya ramah-ramah, selalu senyum ketika bertemu dengan tamu. Kamar juga bersih dan nyaman.', 2, '2022-10-04'),
(16, 5, 'Pelayanannya sangat memuaskan! staff sangat friendly dan membantu. Kamar juga bersih dan luas. Kolam renangnya juga sangat luas dan banyak permainan yang dapat dinikmati pengunjung.', 3, '2022-10-06'),
(17, 5, 'Breakfast sangat enak! Kamar juga leluasa dan bersih. Ada area playground untuk anak-anak bermain dilengkapi dengan keamanan yang baik. Kami sekeluarga super enjoy dan pastinya bakal balik lagi!!!', 4, '2022-10-18'),
(18, 5, 'Kamar super mewah dan lengkap. Staff juga selalu sigap membantu. Suka sekali dengan hotel ini', 5, '2022-10-23'),
(19, 3, 'Di toiler kamar ada kecoak, Kecewa!', 6, '2022-11-01'),
(20, 4, 'Bagus, Luas, Muat banyak orang', 103, '2022-12-17'),
(21, 5, 'Ruangan megah dengan fasilitas lengkap', 104, '2022-12-17'),
(22, 4, 'Kamar bersih banget! Pelayanan juga super gercep', 105, '2022-12-18'),
(23, 5, 'Nyaman bangett', 111, '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` varchar(4) NOT NULL,
  `tipe_room` varchar(20) NOT NULL,
  `harga` int(8) NOT NULL,
  `stock` int(3) NOT NULL,
  `ukuran_room` int(3) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `tipe_room`, `harga`, `stock`, `ukuran_room`, `image`, `detail`) VALUES
('R001', 'Classic Twin', 500000, 100, 23, 'images/rooms/twinn.jpg', 'Enjoy this spacious, clean and comfortable room with the view of Surabaya city. You will get the best experience with the affordable price. '),
('R002', 'Classic Deluxe', 500000, 80, 23, 'images/rooms/deluxe6n.jpg', 'Enjoy this spacious, clean and comfortable room with the view of Surabaya city. You will get the best experience with the affordable price. '),
('R003', 'King Suite', 1100000, 5, 45, 'images/rooms/suite2.jpg', 'It is a perfect room for you and your family to stay. It has a very complete facility and of course with the view of Surabaya city. We promise that you will get your best time here.'),
('R004', 'Rafflesia', 3500000, 1, 70, 'images/rooms/rafflesia.jpg', 'All your joy at a single place'),
('R005', 'Fuchsia', 8000000, 1, 100, 'images/rooms/Fuchsia.jpg', 'An elegant company for all events'),
('R006', 'Cruss', 5000000, 2, 93, 'images/rooms/Cruss.jpg', 'Enjoy your meeting without any problem');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `subtotal` int(8) NOT NULL,
  `pajak` int(8) NOT NULL,
  `total_transaksi` int(8) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_member` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `subtotal`, `pajak`, `total_transaksi`, `status`, `id_member`) VALUES
(1, '2022-09-20', 600000, 60000, 660000, 1, 'M004'),
(2, '2022-10-01', 1200000, 120000, 1320000, 1, 'M005'),
(3, '2022-10-02', 1100000, 110000, 1210000, 1, 'M002'),
(4, '2022-10-16', 1200000, 120000, 1320000, 1, 'M001'),
(5, '2022-10-16', 1800000, 180000, 1980000, 1, 'M010'),
(6, '2022-10-29', 3600000, 360000, 3960000, 1, 'M002'),
(100, '2022-12-17', 1200000, 120000, 1320000, 1, 'M002'),
(103, '2022-12-17', 8000000, 800000, 8800000, 1, 'M007'),
(104, '2022-12-17', 8000000, 800000, 8800000, 1, 'M003'),
(105, '2022-12-18', 1200000, 120000, 1320000, 1, 'M006'),
(106, '2022-12-18', 8000000, 800000, 8800000, 0, 'M006'),
(107, '2022-12-18', 7000000, 700000, 7700000, 0, 'M006'),
(108, '2022-12-18', 1200000, 120000, 1320000, 0, 'M006'),
(111, '2022-12-18', 2200000, 220000, 2420000, 0, 'M009'),
(112, '2022-12-18', 1300000, 130000, 1430000, 1, 'M009'),
(113, '2022-12-18', 7000000, 700000, 7700000, 1, 'M009'),
(116, '2022-12-18', 600000, 60000, 660000, 1, 'M009'),
(119, '2022-12-19', 1200000, 120000, 1320000, 1, 'M002');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_member` varchar(20) NOT NULL,
  `detail` text DEFAULT NULL,
  `in_date` date NOT NULL,
  `id_room` varchar(4) NOT NULL,
  `out_date` date NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `smoking` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_member`, `detail`, `in_date`, `id_room`, `out_date`, `breakfast`, `smoking`, `quantity`) VALUES
(2, 'M007', '', '2023-01-31', 'R003', '2023-01-02', 1, 1, 2),
(3, 'M004', NULL, '2023-01-23', 'R001', '2022-12-25', 1, 0, 2),
(5, 'M004', NULL, '2023-01-23', 'R001', '2022-12-26', 0, 0, 2),
(6, 'M002', NULL, '2022-01-20', 'R003', '2023-01-22', 0, 0, 1),
(7, 'M002', NULL, '2022-01-08', 'R001', '2023-01-11', 0, 0, 1),
(15, 'M002', '', '2022-12-13', 'R001', '2022-12-14', 1, 0, 1),
(19, 'M002', '', '2022-12-27', 'R003', '2022-12-28', 1, 1, 3),
(38, 'M001', '', '2022-12-27', 'R001', '2022-12-28', 0, 1, 1),
(40, 'M001', '', '2022-12-28', 'R002', '2022-12-29', 1, 1, 2),
(45, 'M006', '', '2022-12-27', 'R001', '2022-12-28', 1, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_room` (`id_room`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_room2` (`id_room`);

--
-- Indexes for table `kartu_kredit`
--
ALTER TABLE `kartu_kredit`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `transaction_id` (`id_transaksi`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id_member` (`id_member`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `fk_id_member2` (`id_member`),
  ADD KEY `fk_id_room3` (`id_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1232;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32136;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_id_room` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `fk_id_room2` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_id_transaksi2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id_member` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_id_member2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`),
  ADD CONSTRAINT `fk_id_room3` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
