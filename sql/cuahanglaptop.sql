-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2024 lúc 09:53 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahanglaptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baohanh`
--

CREATE TABLE `baohanh` (
  `MABAOHANH` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `DONVIBAOHANH` varchar(100) DEFAULT NULL,
  `THOIHAN` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT 1,
  `MASP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baohanh`
--

INSERT INTO `baohanh` (`MABAOHANH`, `MANV`, `DONVIBAOHANH`, `THOIHAN`, `TRANGTHAI`, `MASP`) VALUES
(1, 1, 'ACER', 1, 1, NULL),
(2, 1, 'APPLE', 2, 1, NULL),
(3, 1, 'ASUS', 3, 1, NULL),
(4, 1, 'DELL', 2, 1, NULL),
(5, 1, 'GIGABYTE', 1, 1, NULL),
(6, 1, 'HP', 2, 1, NULL),
(7, 1, 'LG', 3, 1, NULL),
(8, 1, 'LENOVO', 2, 1, NULL),
(9, 1, 'MSI', 2, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAHD` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `DONGIA` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MAPN` int(11) NOT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MAPN`, `MANCC`, `MASP`, `SOLUONG`) VALUES
(1, 6, 1, 2),
(1, 6, 2, 1),
(2, 1, 3, 1),
(3, 9, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MASP` int(11) NOT NULL,
  `TENSP` varchar(100) DEFAULT NULL,
  `CPU` varchar(100) DEFAULT NULL,
  `SCREEN` varchar(100) DEFAULT NULL,
  `RAM` varchar(100) DEFAULT NULL,
  `VGA` varchar(100) DEFAULT NULL,
  `STORAGE` varchar(100) DEFAULT NULL,
  `OS` varchar(100) DEFAULT NULL,
  `PIN` varchar(100) DEFAULT NULL,
  `WEIGHT` varchar(100) DEFAULT NULL,
  `MOTA` text DEFAULT NULL,
  `MATHUONGHIEU` int(11) DEFAULT NULL,
  `MAU` varchar(100) DEFAULT NULL,
  `GIATIEN` decimal(15,2) DEFAULT NULL,
  `MABAOHANH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MASP`, `TENSP`, `CPU`, `SCREEN`, `RAM`, `VGA`, `STORAGE`, `OS`, `PIN`, `WEIGHT`, `MOTA`, `MATHUONGHIEU`, `MAU`, `GIATIEN`, `MABAOHANH`) VALUES
(1, 'Laptop HP Pavilion 14-dv2075TU (7C0W2PA) (i5-1235U) (Bạc)', 'Intel Core i5-1235U', '14\" IPS (1920 x 1080)', '2 x 4GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.4kg', 'Laptop HP Pavilion 14-dv2075TU đã lâu đã trở thành một lựa chọn hàng đầu cho người dùng có nhu cầu văn phòng, doanh nghiệp và học sinh - sinh viên. Với thương hiệu đáng tin cậy của HP và chế độ bảo hành 12 tháng, model HP của chiếc laptop này mang đến sự an tâm và tin cậy cho người dùng. Với cấu hình mạnh mẽ và tính năng đáng chú ý, Laptop HP Pavilion đảm bảo hiệu suất ổn định và trải nghiệm tuyệt vời. Hãy khám phá chi tiết về Laptop HP Pavilion để hiểu rõ hơn về những lí do vì sao nó xứng đáng trở thành người bạn đồng hành tin cậy của bạn.', 6, 'Bạc', 19690000.00, 6),
(2, 'Laptop HP 15s-fq5144TU (7C0R8PA) (i7-1255U) (Bạc)', 'Intel Core i7-1255U', '15.6\" IPS (1920 x 1080)', '2 x 8GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.7kg', 'HP 15s-fq5144TU (7C0R8PA) (i7-1255U) là một chiếc laptop tầm trung được thiết kế dành cho người dùng văn phòng và học sinh, sinh viên. Máy sở hữu cấu hình mạnh mẽ với bộ vi xử lý Intel Core i7 thế hệ thứ 12, RAM 16GB, ổ cứng SSD 512GB và màn hình Full HD 15.6 inch.', 4, 'BẠC', 22890000.00, 6),
(3, 'Laptop ACER Aspire 3 A315-59-51X8 (NX.K6TSV.00F) (i5-1235U/RAM 8GB/512GB SSD/ Windows 11)', 'Intel Core i5-1235U', '15.6\" (1920 x 1080)', '1 x 8GB DDR4 2400MHz', 'Onboard Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 40 Wh Pin liền', '1.7kg', 'Laptop Acer Aspire 3 A315-59-51X8 được biết đến là mẫu laptop văn phòng do thương hiệu Acer mới ra mắt gần đây. Ưu điểm của sản phẩm là cấu hình vượt trội và giá thành rẻ so với các mẫu máy tính khác cùng hiệu năng. Do đó, Acer Aspire 3 A315-59-51X8 rất phù hợp với đối tượng là học sinh, sinh viên và dân văn phòng. ', 1, 'Bạc', 15490000.00, 1),
(4, 'MacBook Air 15.3 inch (M2/ 16GB/ 512GB SSD)', 'Apple M2', '15.3\" (2880 x 1864) Liquid Retina', '16GB', 'onboard', '512GB SSD', 'macOS', '70 Wh', '1.5 kg | 1.15 x 34.04 x 23.76 cm', 'MacBook Air M2 2023 15 inch (16GB/512GB SSD) là một sản phẩm của Apple, thương hiệu nổi tiếng với sự kết hợp tinh tế giữa thiết kế và hiệu suất đỉnh cao. Trong đó, MacBook Air M2 2023 15 inch (16GB/512GB SSD) nổi bật với sự mạnh mẽ và tính di động cao, là sản phẩm phục vụ tốt cho nhu cầu văn phòng, đồ họa - kỹ thuật, doanh nghiệp và doanh nhân.', 2, 'Bạc', 45290000.00, 2),
(5, 'Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows 11)', 'AMD Ryzen 5 4600H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'RTX 3050 4GB GDDR6 / AMD Radeon Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 48 Wh Pin liền', '2.3kg', 'Laptop ASUS TUF DashFA506ICB - HN355W đến từ thương hiệu Asus nổi tiếng được khá nhiều khách hàng ưa thích và tin dùng bởi sự chất lượng, hiệu năng làm việc vượt trội cùng với mức giá hợp lý. Ngoài ra, với thiết kế bắt mắt thu hút ánh nhìn nhiều đối tượng khách hàng, đặc biệt là giới game thủ. Hãy cùng Phong Vũ khám phá xem chiếc máy tính xách tay này có gì đặc biệt nhé!', 3, 'Đen', 21990000.00, 3),
(6, 'Laptop Dell Inspiron 14 T7420 N4I5021W (i5-1235U/RAM 8GB/512GB SSD/ Windows 11 + Office)', 'Intel Core i5-1235U', '14\" WVA (1920 x 1200)', '1 x 8GB DDR4 3200MHz', 'Onboard Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL + Office Home & Student 2021', '4 cell 54 Wh Pin liền', '1.6kg', NULL, 4, 'Bạc', 24890000.00, 4),
(7, 'Laptop GIGABYTE G5 ME (i5-12500H/RAM 8GB/RTX 3050Ti/512GB SSD/ Windows 11)', 'Intel Core i5-12500H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'RTX 3050Ti 4GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '54 Wh Pin liền', '2kg', 'Laptop GIGABYTE G5 ME 51VN263SH là sự lựa chọn phù hợp cho các game thủ, tín đồ mê game. Máy tính sở hữu cấu hình mạnh mẽ từ bộ vi xử lý Intel Core i5 thế hệ thứ 12, màn hình lớn kết hợp tấm nền IPS cho hiển thị sắc nét mang đến trải nghiệm chơi game đồ họa khủng với chất lượng mượt mà, lôi cuốn. Cùng Phong Vũ điểm qua một vài tính năng nổi bật của chiếc laptop này nhé!', 5, 'Đen', 27090000.00, 5),
(8, 'Laptop Lenovo Legion 5 Pro 16IAH7H-82RF0045VN (i7-12700H/RAM 16GB/512GB SSD/ Windows 11)', 'Intel Core i7-12700H', '16\" IPS (2560 x 1600),165Hz', '2 x 8GB DDR5 4800MHz', 'RTX 3070Ti 8GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '4 cell 80 Wh Pin liền', '2.5kg', 'Laptop Lenovo Legion 5 Pro 16IAH7H 82RF0045VN là một trong những dòng laptop cao cấp đến từ thương hiệu Lenovo nổi tiếng. Chiếc laptop này sở hữu thiết kế với các đường nét cá tính, mạnh mẽ cùng hiệu năng hoạt động nổi bật. Máy được trang bị card đồ họa RTX 3070Ti 8GB GDDR6 siêu khủng hỗ trợ người dùng những trải nghiệm làm việc đồ họa hay chơi game cấu hình cao tuyệt vời. ', 7, 'Trắng', 56990000.00, 7),
(9, 'Laptop MSI Summit E14 Flip Evo A12MT-210VN (i7-1280P/RAM 16GB/512GB SSD/ Windows 11)', 'Intel Core i7-1280P', '14\" IPS (2880 x 1800)', '16GB Onboard LPDDR5 4800MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '4 cell 72 Wh Pin liền', '1.6kg', NULL, 8, 'Đen', 30990000.00, 8),
(10, 'Laptop MSI Gaming GF63 Thin 11SC (i5-11400H/RAM 8GB/GTX 1650/512GB SSD/ Windows 11)', 'Intel Core i5-11400H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'GTX 1650 4GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 51 Wh Pin liền', '1.9kg', NULL, 8, 'Đen', 19490000.00, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `MAKH` int(11) DEFAULT NULL,
  `NGAYLAP` date DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TEN` varchar(100) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `MATK` int(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TEN`, `NGAYSINH`, `SDT`, `DIACHI`, `MATK`, `EMAIL`) VALUES
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 3, 'nguyenminhkiet642002@gmail.com'),
(2, 'Hồ Công Đệ', '2004-01-04', '0353027480', '75 Xuân Hồng, phường 4, quận Tân Bình', 4, 'congdeho98@gmail.com'),
(3, 'Châu Thành', '2004-08-20', '0367489212', '125 Nguyễn Trãi, q5', 2, 'chauthanh123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MANCC` int(11) NOT NULL,
  `TENNCC` varchar(200) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MANCC`, `TENNCC`, `DIACHI`, `EMAIL`, `SDT`) VALUES
(1, 'ACER', 'Lê Thánh Tôn , q1', 'acer@gmail.com', '0988777333'),
(2, 'APPLE', 'Lê Minh Xuân , q.Tân Bình', 'apple@gmail.com', '0988333222'),
(3, 'ASUS', 'An Dương Vương , q5', 'asus@gmail.com', '0999988833'),
(4, 'DELL', 'Lê Duẩn , q1', 'dell@gmail.com', '0912888333'),
(5, 'GIGABYTE', 'Phan Huy Ích , q.Tân Bình', 'gigabyte@gmail.com', '0918888444'),
(6, 'HP', 'Lê Đức Thọ , q.Gò Vấp', 'hp@gmail.com', '0377888222'),
(7, 'LG', 'Thạnh Xuân 25 , q12', 'lg@gmail.com', '0911888333'),
(8, 'LENOVO', 'Trường Chinh , q.Tân Bình', 'lenovo@gmail.com', '0912344567'),
(9, 'MSI', 'Lê Thị Hà , q12', 'msi@gmail.com', '0933888277');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` int(11) NOT NULL,
  `TEN` varchar(100) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `DIACHI` varchar(255) DEFAULT NULL,
  `MATK` int(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `CHUCVU` varchar(100) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TEN`, `NGAYSINH`, `SDT`, `DIACHI`, `MATK`, `EMAIL`, `CHUCVU`, `TRANGTHAI`) VALUES
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 1, 'nguyenminhkiet642002@gmail.com', 'ADMIN', 1),
(2, 'Phạm Minh Tuấn', '1994-04-09', '0932667222', ' Võ Văn Ngân, q.Bình Tân', 2, 'phamminhtuan12091994@gmail.com', 'Quản lý', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomloaisanpham`
--

CREATE TABLE `nhomloaisanpham` (
  `MASP` int(11) NOT NULL,
  `MALOAISP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomloaisanpham`
--

INSERT INTO `nhomloaisanpham` (`MASP`, `MALOAISP`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MANHOMQUYEN` int(11) NOT NULL,
  `MAQUYEN` int(11) DEFAULT NULL,
  `TENNHOMQUYEN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`MANHOMQUYEN`, `MAQUYEN`, `TENNHOMQUYEN`) VALUES
(1, 1, 'ADMIN'),
(1, 2, 'ADMIN'),
(1, 3, 'ADMIN'),
(1, 4, 'ADMIN'),
(1, 5, 'ADMIN'),
(1, 6, 'ADMIN'),
(1, 7, 'ADMIN'),
(1, 8, 'ADMIN'),
(1, 9, 'ADMIN'),
(1, 10, 'ADMIN'),
(1, 11, 'ADMIN'),
(1, 12, 'ADMIN'),
(1, 13, 'ADMIN'),
(1, 14, 'ADMIN'),
(1, 15, 'ADMIN'),
(1, 16, 'ADMIN'),
(1, 17, 'ADMIN'),
(1, 18, 'ADMIN'),
(1, 19, 'ADMIN'),
(1, 20, 'ADMIN'),
(1, 21, 'ADMIN'),
(1, 22, 'ADMIN'),
(1, 23, 'ADMIN'),
(1, 24, 'ADMIN'),
(1, 25, 'ADMIN'),
(2, 23, 'QUẢN LÝ'),
(2, 24, 'QUẢN LÝ'),
(2, 15, 'QUẢN LÝ'),
(2, 16, 'QUẢN LÝ'),
(3, 23, 'THU NGÂN'),
(3, 15, 'THU NGÂN'),
(3, 16, 'THU NGÂN'),
(4, 24, 'KHO'),
(4, 15, 'KHO'),
(4, 16, 'KHO'),
(5, 19, 'KHÁCH HÀNG'),
(5, 16, 'KHÁCH HÀNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloaisanpham`
--

CREATE TABLE `phanloaisanpham` (
  `MALOAISP` int(11) NOT NULL,
  `TENLOAISP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloaisanpham`
--

INSERT INTO `phanloaisanpham` (`MALOAISP`, `TENLOAISP`) VALUES
(1, 'LAPTOP DOANH NGHIỆP'),
(2, 'LAPTOP DOANH NHÂN'),
(3, 'LAPTOP GAMING'),
(4, 'LAPTOP HỌC SINH - SINH VIÊN'),
(5, 'LAPTOP VĂN PHÒNG'),
(6, 'LAPTOP ĐỒ HỌA - KỸ THUẬT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MATK` int(11) NOT NULL,
  `MANHOMQUYEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`MATK`, `MANHOMQUYEN`) VALUES
(1, 1),
(2, 2),
(3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPN` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `NGAYNHAP` date DEFAULT NULL,
  `TONGTIEN` decimal(15,2) DEFAULT NULL,
  `TRANGTHAI` varchar(100) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MAPN`, `MANV`, `NGAYNHAP`, `TONGTIEN`, `TRANGTHAI`) VALUES
(1, 1, '2024-04-05', 62270000.00, '1'),
(2, 1, '2024-04-05', 15490000.00, '1'),
(3, 1, '2024-04-05', 30990000.00, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MAQUYEN` int(11) NOT NULL,
  `TENQUYEN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MAQUYEN`, `TENQUYEN`) VALUES
(1, 'THÊM THÔNG TIN SẢN PHẨM'),
(2, 'THÊM THÔNG TIN NHÂN VIÊN'),
(3, 'THÊM THÔNG TIN TÀI KHOẢN'),
(4, 'THÊM THÔNG TIN QUYỀN'),
(5, 'THÊM THÔNG TIN NHÓM QUYỀN'),
(6, 'THÊM THÔNG TIN BẢO HÀNH'),
(7, 'THÊM THÔNG TIN KHUYẾN MÃI'),
(8, 'THÊM THÔNG TIN KHÁCH HÀNG'),
(9, 'ẨN THÔNG TIN SẢN PHẨM'),
(10, 'ẨN THÔNG TIN NHÂN VIÊN'),
(11, 'ẨN THÔNG TIN TÀI KHOẢN'),
(12, 'ẨN THÔNG TIN KHUYẾN MÃI'),
(13, 'ẨN THÔNG TIN BẢO HÀNH'),
(14, 'SỬA THÔNG TIN SẢN PHẨM'),
(15, 'SỬA THÔNG TIN NHÂN VIÊN'),
(16, 'SỬA THÔNG TIN TÀI KHOẢN'),
(17, 'SỬA THÔNG TIN QUYỀN'),
(18, 'SỬA THÔNG TIN NHÓM QUYỀN'),
(19, 'SỬA THÔNG TIN KHÁCH HÀNG'),
(20, 'SỬA THÔNG TIN KHUYẾN MÃI'),
(21, 'SỬA THÔNG TIN BẢO HÀNH'),
(22, 'THỐNG KÊ SẢN PHẨM'),
(23, 'XUẤT HÓA ĐƠN'),
(24, 'LẬP PHIẾU NHẬP SẢN PHẨM'),
(25, 'VÀO TRANG ADMIN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `HINHSP` varchar(200) DEFAULT NULL,
  `MANV` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `HINHSP`, `MANV`, `SOLUONG`, `MANCC`, `TRANGTHAI`) VALUES
(1, 'HP_1.PNG', 1, 1, 6, 1),
(2, 'HP_2.PNG', 1, 1, 6, 1),
(3, 'ACER_1.PNG', 1, 1, 1, 1),
(4, 'APPLE_1.PNG', 1, 1, 2, 1),
(5, 'ASUS_1.PNG', 1, 1, 3, 1),
(6, 'GIGABYTE_1.PNG', 1, 1, 4, 1),
(7, 'LENOVO_1.PNG', 1, 1, 5, 1),
(8, 'MSI_1.PNG', 1, 1, 7, 1),
(9, 'MSI_2.PNG', 1, 1, 7, 1),
(10, 'DELL_1.PNG', 1, 1, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` int(11) NOT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `TENDN` varchar(50) DEFAULT NULL,
  `MATKHAU` varchar(200) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT 1,
  `LOAITK` varchar(10) NOT NULL COMMENT 'NV: nhan vien, KH: khach hang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MATK`, `NGAYTAO`, `TENDN`, `MATKHAU`, `TRANGTHAI`, `LOAITK`) VALUES
(1, '2024-01-04', 'admin1234', 'admin1234', 1, 'NV'),
(2, '2024-01-04', 'kh1', '112233', 1, 'KH'),
(3, '2024-01-04', 'kh2', '776655', 1, 'KH'),
(4, '2024-04-11', 'Depluto', '13376677', 1, 'KH');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `TENTHUONGHIEU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MATHUONGHIEU`, `TENTHUONGHIEU`) VALUES
(1, 'ACER'),
(2, 'APPLE'),
(3, 'ASUS'),
(4, 'DELL'),
(5, 'GIGABYTE'),
(6, 'HP'),
(7, 'LG'),
(8, 'LENOVO'),
(9, 'MSI');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`MABAOHANH`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MAHD`,`MASP`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MAPN`,`MASP`),
  ADD KEY `MANCC` (`MANCC`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`),
  ADD KEY `chitietsanpham_ibfk_3` (`MABAOHANH`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD KEY `MATK` (`MATK`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MANCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `MATK` (`MATK`);

--
-- Chỉ mục cho bảng `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  ADD KEY `MALOAISP` (`MALOAISP`),
  ADD KEY `MASP` (`MASP`) USING BTREE;

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD KEY `MAQUYEN` (`MAQUYEN`),
  ADD KEY `MANHOMQUYEN` (`MANHOMQUYEN`) USING BTREE;

--
-- Chỉ mục cho bảng `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  ADD PRIMARY KEY (`MALOAISP`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MATK`),
  ADD KEY `MANHOMQUYEN` (`MANHOMQUYEN`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MAPN`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MANV` (`MANV`),
  ADD KEY `MANCC` (`MANCC`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MATHUONGHIEU`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baohanh`
--
ALTER TABLE `baohanh`
  MODIFY `MABAOHANH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MANCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MANV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  MODIFY `MANHOMQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  MODIFY `MALOAISP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MAPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `MAQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MATHUONGHIEU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baohanh`
--
ALTER TABLE `baohanh`
  ADD CONSTRAINT `baohanh_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `baohanh_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `chitiethoadon` (`MASP`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`MAPN`) REFERENCES `phieunhap` (`MAPN`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_3` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`),
  ADD CONSTRAINT `chitietsanpham_ibfk_3` FOREIGN KEY (`MABAOHANH`) REFERENCES `baohanh` (`MABAOHANH`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Các ràng buộc cho bảng `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  ADD CONSTRAINT `nhomloaisanpham_ibfk_1` FOREIGN KEY (`MALOAISP`) REFERENCES `phanloaisanpham` (`MALOAISP`),
  ADD CONSTRAINT `nhomloaisanpham_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_ibfk_1` FOREIGN KEY (`MAQUYEN`) REFERENCES `quyen` (`MAQUYEN`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`),
  ADD CONSTRAINT `phanquyen_ibfk_2` FOREIGN KEY (`MANHOMQUYEN`) REFERENCES `nhomquyen` (`MANHOMQUYEN`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
