-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 07:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptopshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanh`
--

CREATE TABLE `baohanh` (
  `mabh` varchar(50) NOT NULL,
  `mahd` varchar(50) NOT NULL,
  `serinumber` varchar(255) NOT NULL,
  `ngaybh` datetime NOT NULL,
  `ngaygiao` datetime NOT NULL,
  `trangthai` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `magh` varchar(50) NOT NULL,
  `serinumber` varchar(255) NOT NULL,
  `ngaythem` datetime DEFAULT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahd` varchar(50) NOT NULL,
  `serinumber` varchar(255) NOT NULL,
  `tongtien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `mapn` varchar(50) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `serinumber` varchar(255) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `CPU` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `HARDWARE` varchar(50) NOT NULL,
  `CARD` varchar(50) NOT NULL,
  `SCREEN` varchar(50) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `COLOR` varchar(50) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `magh` varchar(50) NOT NULL,
  `tendn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `mahinhanh` int(11) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `tendn` varchar(50) NOT NULL,
  `mahd` varchar(50) NOT NULL,
  `trangthai` varchar(30) NOT NULL,
  `diachigiaohang` varchar(255) NOT NULL,
  `tongtienhd` decimal(10,2) DEFAULT 0.00,
  `ngaydat` datetime NOT NULL,
  `ngaygiao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `makm` varchar(50) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `ngaybd` datetime NOT NULL,
  `ngaykt` datetime NOT NULL,
  `quatang` text DEFAULT NULL,
  `giamgia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ncc`
--

CREATE TABLE `ncc` (
  `mancc` varchar(50) NOT NULL,
  `tenncc` text DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `sdt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `tendn` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`tendn`, `hoten`, `ngaysinh`, `gioitinh`) VALUES
('khachhang', 'nguyen van A', '1999-03-19', 'nam'),
('admin', 'admin', NULL, NULL),
('quanly', 'quản lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `manhomquyen` varchar(50) NOT NULL,
  `tennhomquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhomquyen`
--

INSERT INTO `nhomquyen` (`manhomquyen`, `tennhomquyen`) VALUES
('ADMIN', 'ADMIN'),
('KH', 'KHÁCH HÀNG'),
('QL', 'QUẢN LÝ');

-- --------------------------------------------------------

--
-- Table structure for table `nhomquyentk`
--

CREATE TABLE `nhomquyentk` (
  `manhomquyen` varchar(50) NOT NULL,
  `maquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhomquyentk`
--

INSERT INTO `nhomquyentk` (`manhomquyen`, `maquyen`) VALUES
('KH', 'Q00'),
('KH', 'Q01'),
('ADMIN', 'Q00'),
('ADMIN', 'Q01'),
('ADMIN', 'Q02'),
('ADMIN', 'Q07'),
('ADMIN', 'Q09'),
('QL', 'Q00'),
('QL', 'Q01'),
('QL', 'Q02'),
('QL', 'Q03'),
('QL', 'Q04'),
('QL', 'Q05'),
('QL', 'Q06'),
('QL', 'Q07'),
('QL', 'Q08'),
('QL', 'Q09'),
('QL', 'Q10');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `mapn` varchar(50) NOT NULL,
  `mancc` varchar(50) NOT NULL,
  `ngaynhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `maquyen` varchar(50) NOT NULL,
  `tenquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`maquyen`, `tenquyen`) VALUES
('Q00', 'VIEW PRODUCT INFORMATION'),
('Q01', 'PURCHASE'),
('Q02', 'BROWSE ORDERS'),
('Q03', 'UPDATE ORDERS'),
('Q04', 'ADD ACCOUNT'),
('Q05', 'DELETE ACCOUNT'),
('Q06', 'BLOCK ACCOUNT'),
('Q07', 'UPDATE PRODUCT INFORMATION'),
('Q08', 'IMPORT GOODS'),
('Q09', 'EXPORT INVOICES'),
('Q10', 'EXPORT IMPORT SLIP');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(50) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `hangsx` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendn` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `manhomquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tendn`, `matkhau`, `manhomquyen`) VALUES
('admin', '1234', 'ADMIN'),
('khachkhang', '123456789', 'KH'),
('quanly', '1234', 'QL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`mabh`),
  ADD KEY `mahd` (`mahd`),
  ADD KEY `serinumber` (`serinumber`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD KEY `magh` (`magh`),
  ADD KEY `serinumber` (`serinumber`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `mahd` (`mahd`),
  ADD KEY `serinumber` (`serinumber`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD KEY `mapn` (`mapn`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`serinumber`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magh`),
  ADD KEY `tendn` (`tendn`);

--
-- Indexes for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`mahinhanh`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `tendn` (`tendn`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`makm`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`mancc`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD KEY `tendn` (`tendn`);

--
-- Indexes for table `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`manhomquyen`);

--
-- Indexes for table `nhomquyentk`
--
ALTER TABLE `nhomquyentk`
  ADD KEY `manhomquyen` (`manhomquyen`),
  ADD KEY `maquyen` (`maquyen`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`mapn`),
  ADD KEY `mancc` (`mancc`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`maquyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendn`),
  ADD KEY `manhomquyen` (`manhomquyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD CONSTRAINT `baohanh_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `chitiethoadon` (`mahd`),
  ADD CONSTRAINT `baohanh_ibfk_2` FOREIGN KEY (`serinumber`) REFERENCES `chitiethoadon` (`serinumber`);

--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`magh`) REFERENCES `giohang` (`magh`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`serinumber`) REFERENCES `chitietsanpham` (`serinumber`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`serinumber`) REFERENCES `chitietsanpham` (`serinumber`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`mapn`) REFERENCES `phieunhap` (`mapn`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`tendn`) REFERENCES `nguoidung` (`tendn`);

--
-- Constraints for table `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`tendn`) REFERENCES `nguoidung` (`tendn`);

--
-- Constraints for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`tendn`) REFERENCES `taikhoan` (`tendn`);

--
-- Constraints for table `nhomquyentk`
--
ALTER TABLE `nhomquyentk`
  ADD CONSTRAINT `nhomquyentk_ibfk_1` FOREIGN KEY (`manhomquyen`) REFERENCES `nhomquyen` (`manhomquyen`),
  ADD CONSTRAINT `nhomquyentk_ibfk_2` FOREIGN KEY (`maquyen`) REFERENCES `quyen` (`maquyen`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`mancc`) REFERENCES `ncc` (`mancc`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`manhomquyen`) REFERENCES `nhomquyen` (`manhomquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
