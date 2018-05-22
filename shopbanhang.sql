-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 09:44 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Macthd` int(15) NOT NULL,
  `Mahd` int(15) DEFAULT NULL,
  `Masp` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `Mactsp` int(15) NOT NULL,
  `Masp` int(15) DEFAULT NULL,
  `Ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Soluong` int(15) DEFAULT NULL,
  `Dongia` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `Madgsp` int(15) NOT NULL,
  `Masp` int(15) DEFAULT NULL,
  `Vote` float NOT NULL,
  `Noidung` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Makh` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `Madm` int(15) NOT NULL,
  `Tendm` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`Madm`, `Tendm`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Túi xách'),
(4, 'Kính');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `Mahd` int(15) NOT NULL,
  `Ngaytao` date DEFAULT NULL,
  `Makh` int(15) DEFAULT NULL,
  `Tongtien` int(15) NOT NULL,
  `Noinhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `Makh` int(15) NOT NULL,
  `Tendn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ghichu` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Manv` int(15) NOT NULL,
  `Tendn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Thongtin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Chucvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Manv`, `Tendn`, `Matkhau`, `Thongtin`, `Chucvu`) VALUES
(1, 'Hoai', '1234', 'Hương Khê - Hà Tĩnh', 'QLBH'),
(2, 'Phu', '1234', 'Can Lộc - Hà Tĩnh', 'QLK'),
(3, 'Linh', '1234', 'Quỳnh Lưu- Nghệ An', 'HTKH');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Masp` int(15) NOT NULL,
  `Madm` int(15) DEFAULT NULL,
  `Tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Anh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(15) NOT NULL,
  `Ngaynhap` date DEFAULT NULL,
  `Luotxem` int(15) NOT NULL,
  `Soluong` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Macthd`),
  ADD KEY `Mahd` (`Mahd`),
  ADD KEY `Masp` (`Masp`);

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`Mactsp`),
  ADD KEY `Masp` (`Masp`);

--
-- Indexes for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`Madgsp`),
  ADD KEY `Masp` (`Masp`),
  ADD KEY `Makh` (`Makh`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`Madm`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Mahd`),
  ADD KEY `Makh` (`Makh`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Makh`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Manv`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Masp`),
  ADD KEY `Madm` (`Madm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `Macthd` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `Mactsp` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `Madgsp` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `Madm` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Mahd` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Makh` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Manv` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `Masp` int(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`Mahd`) REFERENCES `hoadon` (`Mahd`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`);

--
-- Constraints for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`);

--
-- Constraints for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `danhgiasanpham_ibfk_1` FOREIGN KEY (`Masp`) REFERENCES `sanpham` (`Masp`),
  ADD CONSTRAINT `danhgiasanpham_ibfk_2` FOREIGN KEY (`Makh`) REFERENCES `khachhang` (`Makh`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`Makh`) REFERENCES `khachhang` (`Makh`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Madm`) REFERENCES `danhmucsanpham` (`Madm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
