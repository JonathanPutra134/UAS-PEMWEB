-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 10:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id_facilities` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id_facilities`, `Name`, `Image`, `Description`, `StartTime`, `EndTime`) VALUES
(29, 'Lapangan Golf besar', 'assets/images/lapangan-golf.png', '                                                                                  Tak seperti lapangan futsal atau basket, lapangan golf terbilang jarang ada di perumahan.\r\n\r\n \r\n\r\nFasilitas lapangan golf di perumahan tentu bisa menjadi daya tarik utama bagi penghuni.\r\nSalah satu perumahan yang memiliki fasilitas golf adalah Cimanggis Golf Estate. \r\nDikembangkan oleh PT Mitra Bangun Prasada, rumah dijual di Depok ini juga dilengkapi berbagai macam fasilitas olahraga lain seperti kolam renang, lapangan tenis hingga fitness center.', '10:00:00', '18:00:00'),
(30, 'Grand Ballroom', 'assets/images/ballroom11.jpeg', '             Tempat untuk merayakan suatu yang besar, dengan struktur bangunan yang amat megah dan cantik, cocok untuk kamu yang mau nikah / merayakan pesta besar besaran disini', '13:00:00', '23:00:00'),
(32, 'Kolam Renang', 'assets/images/Kolamrenang18.jpeg', '                     Rasanya tak lengkap jika fasilitas rumah mewah tak disertai kolam renang sebagai sarana olahraga dan rekreasi.\r\n\r\n \r\n\r\nKolam renang biasanya dapat digunakan oleh penghuni yang sudah terdaftar pada clubhouse, dalam artian membayar iuran sewa.\r\n\r\n \r\n\r\nBeberapa perumahan yang menawarkan fasilitas kolam renang pun cukup banyak ditemukan di perumahan di Jakarta dan Tangerang.\r\n\r\n \r\n\r\nMisalnya saja Permata Hijau Residence PIK 2 Jakarta Utara yang dikembangkan oleh Agung Sedayu Group. \r\n\r\n \r\n\r\nPerumahan ini turut dilengkapi dengan ecopark modern dan danau buatan sehingga hunian terasa lebih sejuk dan asri.\r\n\r\n \r\n\r\nAtau bisa juga pilih rumah dijual di Tangerang, dimana terdapat hunian dengan harga mulai dari Rp1 miliar dilengkapi fasilitas kolam renang yang bisa dipilih.\r\n\r\n \r\n\r\nSalah satunya perumahan mewah dengan konsep modern yang dikembangkan oleh Sinarmas Land, InfiniHauz Banjar Wijaya.', '13:00:00', '19:00:00'),
(33, 'Bioskop privat', 'assets/images/Fasilitas-Rumah-Mewah-Home-Theater.jpg', '          Di zaman yang modern, fasilitas perumahan sudah semakin lengkap demi memanjakan penghuninya. \r\n\r\n \r\n\r\nTak hanya pada lingkungan perumahan, namun juga fitur di dalam masing-masing hunian.\r\n\r\n \r\n\r\nSalah satu fasilitas  mewah ini adalah home theater yang bisa memberikan pengalaman menonton film layaknya di bioskop bersama keluarga, tanpa harus ke luar rumah.', '17:00:00', '22:00:00'),
(34, 'Amusement Park', 'assets/images/Fasilitas-Rumah-Mewah-Area-Taman.jpg', '          Taman yang amat keren, dilengkapi dengan pohon-pohon hijau yang sangat asri, sangat cocok untuk kamu yang mau refreshing!', '03:00:00', '20:00:00'),
(35, 'Giant Ferry', 'assets/images/fasilitas-mewah-di-hotel-titanic-turki-KEKdvfeBQB.jpg', '          Fasilitas mewah kapal ferry yang didalamnya ada restoran mahal, cocok buat kamu yang mau ngadain pesta nih! diatas laut dengan ferry besar!, asal jangan mabuk laut aja', '03:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_facilities` int(11) NOT NULL,
  `ReservationDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_user`, `id_facilities`, `ReservationDate`, `StartTime`, `EndTime`, `status`) VALUES
(6, 20, 30, '2021-12-29', '13:32:00', '10:35:00', 'REJECTED!'),
(7, 20, 30, '2021-02-11', '10:56:00', '10:51:00', 'REJECTED!'),
(8, 20, 29, '2022-01-02', '10:55:00', '10:56:00', 'REJECTED!'),
(9, 20, 30, '2021-12-08', '00:23:00', '23:28:00', 'REJECTED!'),
(10, 20, 30, '2021-12-06', '15:29:00', '17:29:00', 'approved!'),
(11, 20, 32, '2021-12-06', '17:36:00', '16:36:00', 'approved!'),
(12, 20, 30, '2021-12-06', '16:42:00', '16:42:00', 'approved!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Name`, `Email`, `Password`, `ProfilePicture`, `Role`) VALUES
(16, 'admin', 'admin@umn.ac.id', '$2y$10$6mwHlfd/Cfq2x3J/UqksfevUk9ggdyjy9nVZAB8tx/oweEvBNYkpK', 'assets/images/thor.jpg', 'admin'),
(18, 'Manager', 'manager@umn.ac.id', '$2y$10$vChZmJEd7oJLFtmkdiBPdeBtlryLaRh73eGwHiIorOfM9WZcXeJba', 'assets/images/JOKI_EVENT_DENGARKAN_SUARA_ALAM_ALL_REWARDS_50_k9.png', 'management'),
(19, 'atras', 'atras@gmail.com', '$2y$10$Um1.ec2vOz2d0p/4mvJTU.8ZkxIC9msgfGPM316DR5JL6uGmQXBBC', 'assets/images/Kolamrenang15.jpeg', 'user'),
(20, 'Wendyanto', 'wendy@gmail.com', '$2y$10$RSYx3jNtoqwtnS7GW8T5IuEeikAlaczK1dzj.GweThxhN8ZbhNFFi', 'assets/images/ballroom14.jpeg', 'user'),
(25, 'jojo', 'jojo@umn.ac.id', '$2y$10$yQYKWy9WIIaFvQNayBmF3em8nsc.VsLbSR56W/f0de71TaSb6nTGm', 'assets/images/messageImage_1636945481944.jpeg', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id_facilities`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id_facilities` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
