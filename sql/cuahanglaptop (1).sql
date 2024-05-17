-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2024 lúc 11:57 AM
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
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baohanh`
--

INSERT INTO `baohanh` (`MABAOHANH`, `MANV`, `DONVIBAOHANH`, `THOIHAN`, `TRANGTHAI`) VALUES
(1, 1, 'ACER', 1, 1),
(2, 1, 'APPLE', 2, 1),
(3, 1, 'ASUS', 3, 1),
(4, 1, 'DELL', 2, 1),
(5, 1, 'GIGABYTE', 1, 1),
(6, 1, 'HP', 2, 1),
(7, 1, 'LG', 3, 1),
(8, 1, 'LENOVO', 2, 1),
(9, 1, 'MSI', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `MACTGH` int(11) NOT NULL,
  `MAGH` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`MACTGH`, `MAGH`, `MASP`, `SOLUONG`) VALUES
(148, 5, 20, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAHD` int(11) NOT NULL,
  `MASP` int(11) DEFAULT NULL,
  `MASERI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MAHD`, `MASP`, `MASERI`) VALUES
(47, 14, 'SN0014305584'),
(46, 20, 'SN0020945905'),
(46, 21, 'SN0021116804'),
(48, 21, 'SN0021024639'),
(48, 21, 'SN0021165341'),
(48, 21, 'SN0021174732');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MAKM` int(11) NOT NULL,
  `NGAYBATDAU` date DEFAULT NULL,
  `NGAYKETTHUC` date DEFAULT NULL,
  `GIAMGIA` decimal(15,2) DEFAULT NULL,
  `QUATANG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkhuyenmai`
--

INSERT INTO `chitietkhuyenmai` (`MAKM`, `NGAYBATDAU`, `NGAYKETTHUC`, `GIAMGIA`, `QUATANG`) VALUES
(1, '2024-05-08', '2024-05-23', 10.00, 'Giảm ngay 10% giá trị sản phẩm nếu có kèm theo mã giảm giá'),
(2, '2024-05-08', '2024-05-24', NULL, 'Giao hàng nhanh trong vòng 1 ngày kể từ khi đặt hàng'),
(3, '2024-05-15', '2024-05-15', NULL, 'Tặng thêm 1 balo nếu có giá trị hóa đơn trên 1 triệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MAPN` int(11) DEFAULT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `MASP` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MAPN`, `MANCC`, `MASP`, `SOLUONG`) VALUES
(1, 6, 1, 2),
(1, 6, 2, 1),
(2, 1, 3, 1),
(3, 9, 9, 1),
(4, 1, 3, 10),
(4, 1, 14, 10),
(5, 2, 4, 10),
(5, 2, 15, 10),
(6, 6, 1, 10),
(6, 6, 2, 10),
(6, 6, 12, 10),
(6, 6, 13, 10),
(7, 8, 8, 10),
(12, 9, 9, 10),
(12, 9, 10, 10),
(12, 9, 18, 10),
(13, 4, 6, 10),
(15, 3, 5, 10),
(15, 3, 17, 10),
(15, 3, 19, 10),
(16, 4, 16, 10),
(17, 7, 11, 10),
(18, 1, 37, 1),
(19, 1, 14, 1),
(20, 2, 4, 2),
(21, 2, 4, 2),
(22, 2, 15, 2),
(23, 2, 15, 2),
(23, 2, 24, 10),
(23, 2, 25, 10),
(23, 2, 26, 10),
(23, 2, 27, 10),
(27, 1, 14, 2),
(27, 1, 20, 5),
(27, 1, 21, 5),
(27, 1, 22, 5),
(27, 1, 23, 5),
(28, 5, 28, 5),
(28, 5, 29, 5),
(28, 5, 30, 5),
(28, 5, 31, 5),
(28, 5, 32, 5),
(29, 7, 33, 5),
(29, 7, 34, 5),
(29, 7, 35, 5),
(29, 7, 36, 5);

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
  `GIATIEN` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MASP`, `TENSP`, `CPU`, `SCREEN`, `RAM`, `VGA`, `STORAGE`, `OS`, `PIN`, `WEIGHT`, `MOTA`, `MATHUONGHIEU`, `MAU`, `GIATIEN`) VALUES
(1, 'Laptop HP Pavilion 14-dv2075TU (7C0W2PA) (i5-1235U) (Bạc)', 'Intel Core i5-1235U', '14&amp;quot; IPS (1920 x 1080)', '2 x 4GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.4kg', 'Laptop HP Pavilion 14-dv2075TU đã lâu đã trở thành một lựa chọn hàng đầu cho người dùng có nhu cầu văn phòng, doanh nghiệp và học sinh - sinh viên. Với thương hiệu đáng tin cậy của HP và chế độ bảo hành 12 tháng, model HP của chiếc laptop này mang đến sự an tâm và tin cậy cho người dùng. Với cấu hình mạnh mẽ và tính năng đáng chú ý, Laptop HP Pavilion đảm bảo hiệu suất ổn định và trải nghiệm tuyệt vời. Hãy khám phá chi tiết về Laptop HP Pavilion để hiểu rõ hơn về những lí do vì sao nó xứng đáng trở thành người bạn đồng hành tin cậy của bạn.', 6, 'Bạc', 19690000.00),
(2, 'Laptop HP 15s-fq5144TU (7C0R8PA) (i7-1255U) (Bạc)', 'Intel Core i7-1255U', '15.6&amp;quot; IPS (1920 x 1080)', '2 x 8GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.7kg', 'HP 15s-fq5144TU (7C0R8PA) (i7-1255U) là một chiếc laptop tầm trung được thiết kế dành cho người dùng văn phòng và học sinh, sinh viên. Máy sở hữu cấu hình mạnh mẽ với bộ vi xử lý Intel Core i7 thế hệ thứ 12, RAM 16GB, ổ cứng SSD 512GB và màn hình Full HD 15.6 inch.', 6, 'Bạc', 24990000.00),
(3, 'Laptop ACER Aspire 3 A315-59-51X8 (NX.K6TSV.00F) (i5-1235U/RAM 8GB/512GB SSD/ Windows 11)', 'Intel Core i5-1235U', '15.6\" (1920 x 1080)', '1 x 8GB DDR4 2400MHz', 'Onboard Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 40 Wh Pin liền', '1.7kg', 'Laptop Acer Aspire 3 A315-59-51X8 được biết đến là mẫu laptop văn phòng do thương hiệu Acer mới ra mắt gần đây. Ưu điểm của sản phẩm là cấu hình vượt trội và giá thành rẻ so với các mẫu máy tính khác cùng hiệu năng. Do đó, Acer Aspire 3 A315-59-51X8 rất phù hợp với đối tượng là học sinh, sinh viên và dân văn phòng. ', 1, 'Bạc', 15490000.00),
(4, 'MacBook Air 15.3 inch (M2/ 16GB/ 512GB SSD)', 'Apple M2', '15.3\" (2880 x 1864) Liquid Retina', '16GB', 'onboard', '512GB SSD', 'macOS', '70 Wh', '1.5 kg | 1.15 x 34.04 x 23.76 cm', 'MacBook Air M2 2023 15 inch (16GB/512GB SSD) là một sản phẩm của Apple, thương hiệu nổi tiếng với sự kết hợp tinh tế giữa thiết kế và hiệu suất đỉnh cao. Trong đó, MacBook Air M2 2023 15 inch (16GB/512GB SSD) nổi bật với sự mạnh mẽ và tính di động cao, là sản phẩm phục vụ tốt cho nhu cầu văn phòng, đồ họa - kỹ thuật, doanh nghiệp và doanh nhân.', 2, 'Bạc', 45290000.00),
(5, 'Laptop ASUS TUF Gaming FA506ICB-HN355W (Ryzen 5 4600H/RAM 8GB/RTX 3050/512GB SSD/ Windows 11)', 'AMD Ryzen 5 4600H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'RTX 3050 4GB GDDR6 / AMD Radeon Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 48 Wh Pin liền', '2.3kg', 'Laptop ASUS TUF DashFA506ICB - HN355W đến từ thương hiệu Asus nổi tiếng được khá nhiều khách hàng ưa thích và tin dùng bởi sự chất lượng, hiệu năng làm việc vượt trội cùng với mức giá hợp lý. Ngoài ra, với thiết kế bắt mắt thu hút ánh nhìn nhiều đối tượng khách hàng, đặc biệt là giới game thủ. Hãy cùng Phong Vũ khám phá xem chiếc máy tính xách tay này có gì đặc biệt nhé!', 3, 'Đen', 21990000.00),
(6, 'Laptop Dell Inspiron 14 T7420 N4I5021W (i5-1235U/RAM 8GB/512GB SSD/ Windows 11 + Office)', 'Intel Core i5-1235U', '14&quot; WVA (1920 x 1200)', '1 x 8GB DDR4 3200MHz', 'Onboard Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL + Office Home &amp; Student 2021', '4 cell 54 Wh Pin liền', '1.6kg', '', 4, 'Bạc', 24990000.00),
(7, 'Laptop GIGABYTE G5 ME (i5-12500H/RAM 8GB/RTX 3050Ti/512GB SSD/ Windows 11)', 'Intel Core i5-12500H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'RTX 3050Ti 4GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '54 Wh Pin liền', '2kg', 'Laptop GIGABYTE G5 ME 51VN263SH là sự lựa chọn phù hợp cho các game thủ, tín đồ mê game. Máy tính sở hữu cấu hình mạnh mẽ từ bộ vi xử lý Intel Core i5 thế hệ thứ 12, màn hình lớn kết hợp tấm nền IPS cho hiển thị sắc nét mang đến trải nghiệm chơi game đồ họa khủng với chất lượng mượt mà, lôi cuốn. Cùng Phong Vũ điểm qua một vài tính năng nổi bật của chiếc laptop này nhé!', 5, 'Đen', 27090000.00),
(8, 'Laptop Lenovo Legion 5 Pro 16IAH7H-82RF0045VN (i7-12700H/RAM 16GB/512GB SSD/ Windows 11)', 'Intel Core i7-12700H', '16\" IPS (2560 x 1600),165Hz', '2 x 8GB DDR5 4800MHz', 'RTX 3070Ti 8GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '4 cell 80 Wh Pin liền', '2.5kg', 'Laptop Lenovo Legion 5 Pro 16IAH7H 82RF0045VN là một trong những dòng laptop cao cấp đến từ thương hiệu Lenovo nổi tiếng. Chiếc laptop này sở hữu thiết kế với các đường nét cá tính, mạnh mẽ cùng hiệu năng hoạt động nổi bật. Máy được trang bị card đồ họa RTX 3070Ti 8GB GDDR6 siêu khủng hỗ trợ người dùng những trải nghiệm làm việc đồ họa hay chơi game cấu hình cao tuyệt vời. ', 8, 'Trắng', 56990000.00),
(9, 'Laptop MSI Summit E14 Flip Evo A12MT-210VN (i7-1280P/RAM 16GB/512GB SSD/ Windows 11)', 'Intel Core i7-1280P', '14\" IPS (2880 x 1800)', '16GB Onboard LPDDR5 4800MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '4 cell 72 Wh Pin liền', '1.6kg', NULL, 9, 'Đen', 30990000.00),
(10, 'Laptop MSI Gaming GF63 Thin 11SC (i5-11400H/RAM 8GB/GTX 1650/512GB SSD/ Windows 11)', 'Intel Core i5-11400H', '15.6\" IPS (1920 x 1080),144Hz', '1 x 8GB DDR4 3200MHz', 'GTX 1650 4GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home', '3 cell 51 Wh Pin liền', '1.9kg', NULL, 9, 'Đen', 19490000.00),
(11, 'Laptop LG Gram 2023 14Z90RS-G.AH54A5', 'Intel Core i5-1340P (up to 4.6 GHz, 12MB, 12 lõi/luồng)', '14 inches (2880 x 1800 pixels)', '16GB', 'Intel Iris Xe Graphics', '512GB SSD NVMe Gen 4 (1 khe cắm SSD M.2 trống)', 'Windows 11 Home', '72 Wh Li-Ion', '999g', 'Laptop LG Gram 2023 14Z90RS-G.AH54A5 là một dòng máy tính xách tay nhẹ và mạnh mẽ được phát hành vào năm 2023. Thông qua nhiều đặc điểm nổi bật, phiên bản laptop LG Gram 2023 này hứa hẹn sẽ mang đến những giây phút làm việc và giải trí tuyệt vời dành cho bạn.', 7, 'Trắng', 29490000.00),
(12, 'Laptop HP Envy X360 BF0112TU 7C0N9PA', 'Intel Core i5 Alder Lake - 1230U (10 nhân 12 luồng)\r\nXung nhịp 1Ghz - Turbo Boost 4.4 GHz', '13.3 inches, 2880 x 1800 pixels, 60 Hz', '16GB LPDDR4X (Onboard) 4266 MHz', 'Intel Iris Xe Graphics', '512 GB SSD NVMe PCIe', 'Windows 11 Home SL', '4-cell Li-ion, 66 Wh', '1.34 kg', 'HP Envy X360 là dòng laptop sở hữu bộ vi xử lý Intel Core i5 Alder Lake - 1230U, kết hợp cùng RAM 16 GB xử lý mượt mà các tác vụ đa nhiệm nặng. Máy tích hợp ổ cứng 512GB PCIe Gen4 NVMe cho không gia lưu trữ lớn, cùng màn 13.3 inch với độ phân giải sắc nét. Đặc biệt, laptop có thiết kế bản lề 360 độ linh hoạt cùng đầy đủ các cổng kết nối.', 6, 'Trắng', 23190000.00),
(13, 'Laptop HP Gaming Victus 15-FB1023AX 94F20PA', 'AMD Ryzen 5 7535HS (16MB Cache, up to 4.5 GHz, 6 lõi / 12 luồng)', '15.6 inches, 1920 x 1080 pixels (FullHD)', '8GB DDR5 4800 MHz', 'NVIDIA GeForce RTX 2050 4GB GDD6', '512 GB PCIe Gen4 NVMe TLC M.2 SSD', 'Windows 11 Home', '52.5 Wh , 3 Cell', '2.29 kg', 'Laptop HP Gaming Victus 15 FB1023AX 94F20PA được trang bị bộ xử lý trung tâm AMD Ryzen 5 7535HS 6 nhân, 12 luồng với tốc độ xung nhịp lên tới 4.5GHz. RAM dung lượng 8GB xử lý tốt khối lượng công việc tốt và phù hợp để thiết kế đồ hoạ 2D. VGA NVIDIA Geforce RTX 2050 4GB trên laptop HP Victus này mang tới trải nghiệm chiến game mượt mà trên màn hình rộng 15.6 inch cùng tần số quét 144Hz ấn tượng. ', 6, 'Bạc', 17590000.00),
(14, 'Laptop Gaming Acer Nitro 5 Tiger AN515 58 52SP', 'Intel® Core™ i5-12500H (upto 4.5 GHz, 18MB), 12 nhân, 16 luồng', '15.6 inches, 1920 x 1080 pixels (FullHD), 144Hz', '8GB DDR4 3200MHz', 'NVIDIA® GeForce RTX™ 3050 with 4GB of dedicated GDDR6 VRAM', '512GB PCIe NVMe SED SSD cắm sẵn (nâng cấp tối đa 2TB Gen4, 16 Gb/s, NVMe và 1 TB 2.5-inch 5400 RPM)', 'Windows 11 Home', '4-cell, 57.5 Wh', '2.5kg', 'Laptop Acer Nitro 5 Tiger AN515-58-52SP mang vẻ ngoài phong thái sắc sảo, tích hợp hàng loạt công nghệ phần mềm đời mới và đặc biệt là bộ vi xử lý Intel ổn định. Chứa đựng hiệu năng siêu vượt trội đã góp phần làm nên chiếc laptop Acer Nitro 5 dẫn đầu phân khúc.', 1, 'Đen', 21490000.00),
(15, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', '8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện', '13.3 inches, 2560 x 1600 pixels (2K), Tấm nền IPS, Độ sáng 400 nits, Hỗ trợ dải màu P3, True-Tone', '8GB LPDDR4', 'GPU 7 nhân, 16 nhân Neural Engine\r\n', '256GB SSD', 'macOS Big Sur', '49.9-watt lithium-polymer, củ sạc công suất 30W\r\n', '1.29 kg\r\n', 'Macbook Air M1 là dòng sản phẩm có thiết kế mỏng nhẹ, sang trọng và tinh tế cùng với đó là giá thành phải chăng nên MacBook Air đã thu hút được đông đảo người dùng yêu thích và lựa chọn. Đây cũng là một trong những phiên bản Macbook Air mới nhất mà khách hàng không thể bỏ qua khi đến với CellphoneS. Dưới đây là chi tiết về thiết kế, cấu hình của máy.', 2, 'Xám', 18490000.00),
(16, 'Laptop Dell Inspiron 15 3520-5810BLK 102F0', 'Intel Core i5-1155G7 (15 W, 4 lõi / 8 luồng, 2.50 GHz to 4.50 GHz, 8 MB)\r\n', '15.6 inches, 1920 x 1080 pixels (FullHD), 120 Hz', '8GB DDR4 2666 MHz', 'Intel Iris Xe Graphics', '256 GB\r\n', 'Windows 11\r\n', 'lithium-polymer', '1.90 kg', 'Là chiếc laptop Dell Inspiron tầm trung, Dell Inspiron 15 3520-5810BLK 102F0 gây ấn tượng với thiết kế màn hình cảm ứng thời thượng và hiệu năng mạnh mẽ, xử lý tác vụ êm mượt với Core i5-1155G7.', 4, 'Đen', 11990000.00),
(17, 'Laptop ASUS Zenbook 14 OLED UM3402YA-KM405W', 'AMD Ryzen 5 7530U (2.0GHz, 6 lõi / 12 luồng, 16MB cache, up to 4.5 GHz max boost)', '14 inches, 2880 x 1800 pixels, 90 Hz', '16GB LPDDR4X Onboard', 'AMD Radeon Graphics', '512GB M.2 NVMe PCIe 3.0 SSD', 'Windows 11 Home', '75WHrs, 2S2P, 4-cell Li-ion', '1.35 kg', 'Nếu bạn đang muốn sở hữu một chiếc laptop vừa mỏng nhẹ vừa có hiệu suất mạnh mẽ, thì ASUS Zenbook 14 OLED (UM3402YA-KM405W) là một sự lựa chọn đáng cân nhắc. Chiếc laptop này không chỉ mang lại sức mạnh xử lý kiệt sức mà còn thiết kế mỏng nhẹ, phù hợp với nhu cầu di động của người dùng văn phòng. ', 3, 'Đen', 20490000.00),
(18, 'Laptop MSI Gaming GF63 12UC-887VN', 'Intel Core i7-12650H 3.5GHz up to 4.70GHz 24MB, 10 nhân, 16 luồng', '15.6 inches,  Full HD (1920x1080), 144Hz', '8GB (8x1) DDR4 3200MHz', 'Nvidia Geforce RTX 3050 4GB GDDR6', '512GB NVMe PCIe Gen 4x4 SSD (Còn trống 1 khe 2.5\" SATA)', 'Windows 11', '3 Cell 52.4 WHr', '1.85 kg', NULL, 9, 'Đen', 18990000.00),
(19, 'Laptop ASUS Gaming ROG Zephyrus G14 GA402NJ-L4056W', 'AMD Ryzen 7 7735HS (8 lõi / 16 luồng, 16MB L3 cache, up to 4.7 GHz max boost)', '14 inches, 1920 x 1200 pixels (WUXGA), 144Hz', '8GB DDR5 Onboard\r\n8GB DDR5-4800 SO-DIMM (có thể tháo ra nâng cấp tối đa 24GB)', 'NVIDIA GeForce RTX 3050 6GB GDDR6', '512GB PCIe 4.0 NVMe M.2 SSD (1 khe SSD M.2 trống nâng cấp tối đa đến 1TB)', 'Windows 11 Home', '76WHrs, 4S1P, 4-cell Li-ion', '1.72 Kg', 'Laptop Asus Gaming ROG Zephyrus G14 GA402NJ-L4056W nổi bật với kích thước thon gọn đi kèm với hiệu suất hoạt động mạnh mẽ. Cấu hình laptop Asus gaming này được trang bị con chip thế hệ mới của nhà AMD cùng dung lượng bộ nhớ vượt trội giúp xử lý mượt mà mọi tác vụ chiến game.', 3, 'Xám', 30490000.00),
(20, 'Laptop ACER Gaming Nitro V ANV15-51-53DM', 'Intel Core i5-13420H ( 2.1 GHz - 4.6 GHz / 12MB / 8 nhân, 12 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , HD webcam', '2 x 8GB DDR5 5200MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 3050 6GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '4 cell 54 Wh , Pin liền', '2.1 kg', 'Acer Nitro V ANV15 51 53DM là sản phẩm laptop chuyên game siêu cháy với hiệu năng cực kỳ mạnh mẽ và thiết kế không kém phần hầm hố. ', 1, 'Đen', 23990000.00),
(21, 'Laptop Acer Predator Helios Neo PHN16-71-53M7', 'Intel Core i5-13500HX ( 2.5 GHz - 4.7 GHz / 24MB / 14 nhân, 20 luồng )', '16\" ( 1920 x 1200 ) WUXGA IPS 165Hz , HD webcam', '2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 4060 8GB GDDR6 / Intel UHD Graphics 710', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 90 Wh , Pin liền', '2.6 kg', 'Laptop Acer Predator Helios Neo 16 PHN16 71 53M7 được ra đời như một biểu tượng laptop gaming mạnh mẽ của nhà Acer. Hứa hẹn sẽ mang lại nhiều trải nghiệm thú vị cho các game thủ trên chặng đường sắp tới. Cùng GEARVN tìm hiểu đánh giá về sản phẩm này nhé!', 1, 'Đen', 35990000.00),
(22, 'Laptop Acer Nitro 5 AN515-58-5193', 'Intel Core i5-12450H ( 2.0 GHz - 4.4 GHz / 18MB / 8 nhân, 12 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 144Hz , HD webcam', '2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 4050 6GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 57 Wh , Pin liền', '2.5 kg', 'Laptop Acer Nitro 5 AN515-58-5193 là sự kết hợp tinh tế giữa hiệu suất và thiết kế đẳng cấp, sang trọng. Đặc biệt  RTX 4050 6GB GDDR6 hiệu suất đồ họa vượt trội cộng với RAM 16GB chiếc laptop sẵn sàng đáp ứng mọi nhu cầu giải trí, thiết kế đồ họa hay công việc đa nhiệm một cách dễ dàng, nhanh chóng.', 1, 'Đen', 25990000.00),
(23, 'Laptop Acer Nitro 5 Tiger AN515-58-52SP', 'Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , HD webcam', '1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 3050 4GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 57 Wh', '2.5 kg', 'Laptop ACER Nitro 5 AN515 -58 -52SP NH.QFHSV.001 được ACER cho ra mắt với vẻ ngoài thu hút hơn bởi thiết kế đậm chất gaming, các cạnh được vát theo khối hình học đầy mạnh mẽ. Đối với những ai là fan của nhà Acer đang muốn tìm hiểu về những dòng laptop Acer gaming Nitro 5 Tiger 2022 mới nhất thì đây sẽ cỗ máy với bộ vi xử lý Intel tuyệt vời nhất dành cho bạn.', 1, 'Đen', 21490000.00),
(24, 'MacBook Air M3 13 inch', 'Apple M3 ( 8-Core CPU / 8-Core GPU )', '13.6\" ( 2560 x 1664 ) | IPSFHD webcam', '8GB', 'Apple GPU (8-core)', '256GB SSD', 'macOS', 'Pin lithium-polymer 52,6 Wh', '1.24 kg | 21.5 x 30.41 x 1.13 cm', 'MacBook Air M3 13 inch (8GB/256GB SSD) là phiên bản mới nhất của dòng MacBook Air nổi tiếng từ Apple. Máy được trang bị chip M3 mạnh mẽ, màn hình Liquid Retina sắc nét, thời lượng pin ấn tượng cùng thiết kế mỏng nhẹ.. Đây là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc laptop di động, hiệu năng cao để phục vụ cho công việc, học tập và giải trí. Hiện những dòng MacBook đều đang được Phong Vũ phân phối chính hãng từ Apple với mức giá cực kỳ tốt, liên hệ chúng tôi ngay để được tư vấn tận tình nhất!', 2, 'Space Grey', 27490000.00),
(25, 'MacBook Pro M2 Pro 2023 16 inch', 'Apple M2 Pro ( 12-Core CPU / 19-Core GPU )', '16.2\" ( 3456 x 2234 ) | Liquid Retina XDRFHD webcam', '16GB', 'Apple M2 Pro chip with 12-core CPU and 19-core GPU, 16-core Neural Engine', '512GB SSD', 'macOs', '100 Wh', '2.1 kg | 35.57 x 24.81 x 1.68 cm', 'MacBook Pro M2 Pro 2023 16 inch (16GB/512GB SSD) là một chiếc máy tính xách tay mạnh mẽ được Apple ra mắt vào năm 2023. MacBook Pro M2 Pro được trang bị chip M2 Pro mạnh mẽ mang lại hiệu năng vượt trội so với các thế hệ trước. Bên cạnh đó, máy cũng có màn hình Liquid Retina XDR 16 inch tuyệt đẹp, bàn phím Magic Keyboard thoải mái và thời lượng pin dài. Hiện sản phẩm đang được Phong Vũ phân phối chính hãng với mức giá cực kỳ tốt, liên hệ Phong Vũ ngay để được tư vấn tận tình nhất.', 2, 'Space Grey', 48990000.00),
(26, 'Laptop MacBook Air 13.6 inch', 'Apple M2 ( 8-Core CPU / 8-Core GPU )', '13.6\" ( 2560 x 1664 ) | Liquid RetinaFHD webcam', '8GB', 'Apple M2 chip with 8-core CPU and 8-core GPU', '256GB SSD', 'MacOS', '52.6-watt‑hour lithium‑polymer battery', '1.3 kg | 30.41 x 21.5 x 1.13 cm', 'MacBook Air luôn là dòng sản phẩm tiêu biểu của Apple được rất nhiều người dùng lựa chọn. Trong đó, MacBook Air M2 2022 13 inch (8GB/256GB SSD) nổi trội với một mức giá cực kỳ tốt bên cạnh đó là có cấu hình mạnh mẽ và ngoại hình sang trọng.', 2, 'Space Grey', 24390000.00),
(27, 'MacBook Pro M3 Pro 2023 14 inch', 'Apple M3 Pro chip 11‑core CPU', '14\" ( 3024 x 1964 ) | Liquid Retina XDR FHD webcam', '18GB', 'onboard', '512GB SSD', 'MacOS', '72 Wh', '1.6 kg | 31.26 x 22.12 x 1.55 cm', 'MacBook Pro M3 Pro 2023 14 inch (18GB/ 512GB SSD) là một chiếc laptop cao cấp của Apple, được trang bị chip M3 Pro mới nhất cùng với màn hình Liquid Retina XDR 14 inch, bàn phím Magic Keyboard và nhiều tính năng vượt trội khác. Máy là sự lựa chọn hoàn hảo cho những người dùng cần một chiếc máy tính xách tay mạnh mẽ và đa năng.', 2, 'Space Black', 49290000.00),
(28, 'Laptop Gigabyte AORUS 15 9MF-E2VN583SH', 'Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 360Hz , không cảm ứng , FHD webcam', '1 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'RTX 4050 6GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '99 Wh , Pin liền', '2.4 kg', 'Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5, 'Đen', 28690000.00),
(29, 'Laptop GIGABYTE G5 KF-E3PH333SH', 'Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 144Hz , HD webcam', '1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'RTX 4060 8GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '54 Wh , Pin liền', '1.9 kg', 'Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5, 'Đen', 24690000.00),
(30, 'Laptop Gigabyte AORUS 5 SE4-73VN313SH', 'Intel Core i7-12700H ( 2.3 GHz - 4.7GHz / 24MB / 14 nhân, 20 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 240Hz , HD webcam', '2 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'RTX 3070 8GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '99 Wh , Pin liền', '2.4 kg', 'Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5, 'Đen', 39190000.00),
(31, 'Laptop Gigabyte G6 KF-H3VN853SH', 'Intel Core i7-13620H ( 2.4 GHz - 4.9 GHz / 24MB / 10 nhân, 16 luồng )', '16\" ( 1920 x 1080 ) Full HD IPS 165Hz , không cảm ứng , HD webcam', '2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'RTX 4060 8GB GDDR6 / Intel UHD Graphics 770', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '54 Wh , Pin liền', '2.3 kg', 'Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5, 'Đen', 28290000.00),
(32, 'Laptop Gigabyte A5 K1-AVN1030SB', 'AMD Ryzen 5 5600H ( 3.3 GHz - 4.2 GHz / 16MB / 6 nhân, 12 luồng )', '15.6\" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , Màn hình chống lóa , HD webcam', '1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'RTX 3060 6GB GDDR6 / AMD Radeon Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '49 Wh , Pin rời', '2.2 kg', 'Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5, 'Đen', 20690000.00),
(33, 'Laptop LG Gram 2023 14T90R-G.AH55A5', 'Intel Core i5-1340P ( 1.9 GHz - 4.6 GHz / 18MB / 12 nhân, 16 luồng )', '14\" ( 1920 x 1200 ) WUXGA IPS cảm ứng , Màn hình chống lóa , FHD webcam', '1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home', '72 Wh , Pin liền', '1.3 kg', 'Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7, 'Đen', 30590000.00),
(34, 'Laptop Laptop LG Gram 14ZD90Q-G.AX31A5', 'Intel Core i3-1220P ( 1.5 GHz - 4.4GHz / 12MB / 10 nhân, 12 luồng )', '14\" ( 1920 x 1200 ) WUXGA IPS Màn hình chống lóa , FHD webcam', '1 x 8GB LPDDR5 5200MHz', 'Onboard Intel UHD Graphics', '256GB SSD M.2 NVMe', 'Free DOS', '72 Wh , Pin liền', '1 kg', 'Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7, 'Đen', 21090000.00),
(35, 'Laptop LG Gram 16ZD90Q-G.AX55A5', 'Intel Core i5-1240P ( 1.7 GHz - 4.4 GHz / 12MB / 12 nhân, 16 luồng )', '16\" ( 2560 x 1600 ) WQXGA IPS Màn hình chống lóa , FHD webcam', '16GB LPDDR5 5200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Free DOS', '80 Wh , Pin liền', '1.2 kg', 'Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7, 'Đen', 22990000.00),
(36, 'Laptop LG Gram 17ZD90Q-G.AX73A5', 'Intel Core i7 1260P ( 2.1 GHz - 4.7 GHz / 18MB / 12 nhân, 16 luồng )', '17\" ( 2560 x 1600 ) WQXGA IPS Màn hình chống lóa , FHD webcam', '16GB LPDDR5 5200MHz', 'Onboard Intel Iris Xe Graphics', '256GB SSD M.2 NVMe', 'Free DOS', '80 Wh , Pin liền', '1.3 kg', 'Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7, 'Đen', 24990000.00),
(37, 'sanphammoi123', '123', '123', '123', '123', '123', '123', '123', '123', '123', 1, 'bạc', 10000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachidathang`
--

CREATE TABLE `diachidathang` (
  `MAHD` int(11) NOT NULL,
  `TINH` varchar(50) NOT NULL,
  `HUYEN` varchar(50) NOT NULL,
  `XA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diachidathang`
--

INSERT INTO `diachidathang` (`MAHD`, `TINH`, `HUYEN`, `XA`) VALUES
(46, 'Tỉnh Sơn La', 'Huyện Mường La', 'Xã Hua Trai'),
(47, 'Tỉnh Sơn La', 'Huyện Bắc Yên', 'Xã Xím Vàng'),
(48, 'Tỉnh Sơn La', 'Huyện Thuận Châu', 'Xã Chiềng La');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MAGH` int(11) NOT NULL,
  `MAKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MAGH`, `MAKH`) VALUES
(3, 1),
(1, 2),
(2, 3),
(4, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MAKH` int(11) DEFAULT NULL,
  `MANV` int(11) DEFAULT NULL,
  `MASHIPPER` int(11) DEFAULT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `MANV`, `MASHIPPER`, `NGAYTAO`, `TRANGTHAI`) VALUES
(46, 2, 1, NULL, '2024-05-17', 3),
(47, 2, 1, NULL, '2024-05-17', 3),
(48, 2, 1, NULL, '2024-05-17', 3);

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
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 2, 'nguyenminhkiet642002@gmail.com'),
(2, 'Hồ Công Đệ', '2024-05-07', '0928392321', 'Bình Thuận', 4, 'congdeho98@gmail.com'),
(3, 'Hồ Công Đệ', '0000-00-00', '', '', 5, ''),
(5, 'Hồ Công Đệ', '0000-00-00', '', '', 10, ''),
(6, 'Hồ Công Đệ', '0000-00-00', '', '', 11, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MAKM` int(11) NOT NULL,
  `MASP` int(11) DEFAULT NULL,
  `MANV` int(11) DEFAULT NULL,
  `TENKM` varchar(255) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MAKM`, `MASP`, `MANV`, `TENKM`, `TRANGTHAI`) VALUES
(1, 3, 1, 'Giảm giá', NULL),
(2, 14, 1, 'Giao hàng nhanh', NULL),
(3, 15, 1, 'Quà tặng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motanhomquyen`
--

CREATE TABLE `motanhomquyen` (
  `MANHOMQUYEN` int(11) NOT NULL,
  `MOTA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `motanhomquyen`
--

INSERT INTO `motanhomquyen` (`MANHOMQUYEN`, `MOTA`) VALUES
(6, 'đơn hàng, khách hàng, nhóm quyền'),
(5, 'Mua hàng'),
(4, 'Quản lý nhập hàng'),
(2, 'Quản lý nhân viên, khách hàng, đơn hàng'),
(3, 'Xem thống kê, quản lý phiếu bảo hành'),
(1, 'Toàn quyền');

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
  `CHUCVU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TEN`, `NGAYSINH`, `SDT`, `DIACHI`, `MATK`, `EMAIL`, `CHUCVU`) VALUES
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 1, 'nguyenminhkiet642002@gmail.com', 'ADMIN'),
(2, 'Phạm Minh Tuấn', '1994-04-09', '0932667222', 'Võ Văn Ngân, q.Bình Tân', 3, 'phamminhtuan12091994@gmail.com', 'QUẢN LÝ'),
(3, 'Hồ Công Đệ', '2024-05-16', '821038021', 'Bình Thuận', 6, 'Congde@gmail.com', 'QUẢN LÝ'),
(4, 'Hồ Công Đệ', '2024-05-15', '0987654321', 'Bình Thuận', 8, 'Congde@gmail.com', 'ADMIN'),
(5, 'Hồ Công Đệ', '2024-05-16', '0987654321', 'Bình Thuận', 7, 'Congde@gmail.com', 'QUẢN LÝ'),
(6, 'Hồ Công Đệ', '2024-05-16', '0929213623', 'sadasdas', 9, 'Congde@gmail.com', 'KHO');

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
(8, 3),
(9, 1),
(10, 1),
(10, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 1),
(12, 2),
(12, 3),
(13, 3),
(13, 5),
(14, 2),
(14, 6),
(15, 1),
(16, 1),
(16, 3),
(17, 4),
(18, 5),
(19, 3),
(19, 6),
(20, 1),
(20, 2),
(20, 6),
(21, 1),
(21, 4),
(22, 4),
(23, 4),
(23, 5),
(24, 5),
(25, 5),
(25, 6),
(26, 2),
(26, 6),
(27, 2),
(28, 2),
(29, 2),
(30, 3),
(30, 4),
(31, 2),
(31, 5),
(31, 6),
(32, 1),
(32, 5),
(32, 6),
(33, 1),
(33, 2),
(34, 1),
(35, 2),
(35, 5),
(36, 3),
(36, 4),
(36, 5),
(37, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MANHOMQUYEN` int(11) NOT NULL,
  `MAQUYEN` int(11) NOT NULL,
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
(1, 26, 'ADMIN'),
(1, 27, 'ADMIN'),
(1, 28, 'ADMIN'),
(1, 29, 'ADMIN'),
(2, 2, 'QUẢN LÝ'),
(2, 3, 'QUẢN LÝ'),
(2, 4, 'QUẢN LÝ'),
(2, 5, 'QUẢN LÝ'),
(2, 6, 'QUẢN LÝ'),
(2, 7, 'QUẢN LÝ'),
(2, 8, 'QUẢN LÝ'),
(2, 9, 'QUẢN LÝ'),
(2, 10, 'QUẢN LÝ'),
(2, 11, 'QUẢN LÝ'),
(2, 12, 'QUẢN LÝ'),
(2, 13, 'QUẢN LÝ'),
(2, 14, 'QUẢN LÝ'),
(2, 15, 'QUẢN LÝ'),
(2, 16, 'QUẢN LÝ'),
(2, 18, 'QUẢN LÝ'),
(2, 19, 'QUẢN LÝ'),
(2, 20, 'QUẢN LÝ'),
(2, 22, 'QUẢN LÝ'),
(2, 23, 'QUẢN LÝ'),
(2, 24, 'QUẢN LÝ'),
(2, 26, 'QUẢN LÝ'),
(2, 27, 'QUẢN LÝ'),
(2, 28, 'QUẢN LÝ'),
(3, 2, 'THU NGÂN'),
(3, 3, 'THU NGÂN'),
(3, 4, 'THU NGÂN'),
(3, 6, 'THU NGÂN'),
(3, 7, 'THU NGÂN'),
(3, 8, 'THU NGÂN'),
(3, 10, 'THU NGÂN'),
(3, 11, 'THU NGÂN'),
(3, 12, 'THU NGÂN'),
(3, 14, 'THU NGÂN'),
(3, 15, 'THU NGÂN'),
(3, 16, 'THU NGÂN'),
(3, 18, 'THU NGÂN'),
(3, 19, 'THU NGÂN'),
(3, 20, 'THU NGÂN'),
(3, 22, 'THU NGÂN'),
(3, 23, 'THU NGÂN'),
(3, 24, 'THU NGÂN'),
(3, 25, 'THU NGÂN'),
(3, 26, 'THU NGÂN'),
(3, 27, 'THU NGÂN'),
(3, 28, 'THU NGÂN'),
(3, 29, 'THU NGÂN'),
(4, 1, 'KHO'),
(4, 2, 'KHO'),
(4, 3, 'KHO'),
(4, 4, 'KHO'),
(4, 5, 'KHO'),
(4, 6, 'KHO'),
(4, 7, 'KHO'),
(4, 8, 'KHO'),
(4, 9, 'KHO'),
(4, 10, 'KHO'),
(4, 11, 'KHO'),
(4, 12, 'KHO'),
(4, 13, 'KHO'),
(4, 14, 'KHO'),
(4, 15, 'KHO'),
(4, 16, 'KHO'),
(4, 17, 'KHO'),
(4, 18, 'KHO'),
(4, 19, 'KHO'),
(4, 20, 'KHO'),
(4, 21, 'KHO'),
(4, 22, 'KHO'),
(4, 23, 'KHO'),
(4, 24, 'KHO'),
(4, 25, 'KHO'),
(4, 26, 'KHO'),
(4, 27, 'KHO'),
(4, 28, 'KHO'),
(4, 29, 'KHO'),
(5, 30, 'KHÁCH HÀNG'),
(6, 5, 'QUẢN LÝ 2'),
(6, 6, 'QUẢN LÝ 2'),
(6, 7, 'QUẢN LÝ 2'),
(6, 8, 'QUẢN LÝ 2'),
(6, 9, 'QUẢN LÝ 2'),
(6, 10, 'QUẢN LÝ 2'),
(6, 11, 'QUẢN LÝ 2'),
(6, 12, 'QUẢN LÝ 2'),
(6, 13, 'QUẢN LÝ 2'),
(6, 14, 'QUẢN LÝ 2'),
(6, 15, 'QUẢN LÝ 2'),
(6, 16, 'QUẢN LÝ 2'),
(6, 17, 'QUẢN LÝ 2'),
(6, 18, 'QUẢN LÝ 2'),
(6, 19, 'QUẢN LÝ 2'),
(6, 20, 'QUẢN LÝ 2');

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
(8, 1),
(3, 2),
(6, 2),
(9, 2),
(2, 5),
(4, 5),
(5, 5),
(10, 5),
(11, 5),
(7, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPN` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `NGAYNHAP` date DEFAULT NULL,
  `TONGTIEN` decimal(15,2) DEFAULT NULL,
  `TRANGTHAI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MAPN`, `MANV`, `NGAYNHAP`, `TONGTIEN`, `TRANGTHAI`) VALUES
(1, 1, '2024-04-05', 62270000.00, '1'),
(2, 1, '2024-04-05', 15490000.00, '1'),
(3, 1, '2024-04-05', 30990000.00, '1'),
(4, 1, '2024-05-16', 369800000.00, '0'),
(5, 2, '2024-05-16', 637800000.00, '0'),
(6, 1, '2024-05-16', 854600000.00, '0'),
(7, 1, '2024-05-16', 569900000.00, '0'),
(8, 1, '2024-05-16', 0.00, '0'),
(9, 1, '2024-05-16', 0.00, '0'),
(10, 1, '2024-05-16', 0.00, '0'),
(11, 1, '2024-05-16', 0.00, '0'),
(12, 1, '2024-05-16', 694700000.00, '0'),
(13, 1, '2024-05-16', 249900000.00, '0'),
(14, 1, '2024-05-16', 0.00, '0'),
(15, 1, '2024-05-16', 729700000.00, '0'),
(16, 1, '2024-05-16', 119900000.00, '0'),
(17, 1, '2024-05-16', 294900000.00, '0'),
(18, 1, '2024-05-18', 10000000.00, '0'),
(19, 1, '2024-05-18', 21490000.00, '0'),
(20, 1, '2024-05-18', 90580000.00, '0'),
(21, 1, '2024-05-18', 90580000.00, '0'),
(22, 1, '2024-05-18', 36980000.00, '0'),
(23, 1, '2024-05-18', 1538580000.00, '0'),
(24, 1, '2024-05-18', 0.00, '0'),
(25, 1, '2024-05-18', 0.00, '0'),
(26, 1, '2024-05-18', 0.00, '0'),
(27, 1, '2024-05-18', 580280000.00, '0'),
(28, 1, '2024-05-18', 707750000.00, '0'),
(29, 1, '2024-05-18', 498300000.00, '0');

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
(1, 'truy cập sản phẩm'),
(2, 'thêm sản phẩm'),
(3, 'sửa sản phẩm'),
(4, 'xóa sản phẩm'),
(5, 'truy cập nhân viên'),
(6, 'thêm nhân viên'),
(7, 'sửa nhân viên'),
(8, 'vô hiệu hóa nhân viên'),
(9, 'truy cập khách hàng'),
(10, 'thêm khách hàng'),
(11, 'sửa khách hàng'),
(12, 'vô hiệu hóa khách hàng'),
(13, 'truy cập đơn hàng'),
(14, 'thêm đơn hàng'),
(15, 'sửa đơn hàng'),
(16, 'xóa đơn hàng'),
(17, 'truy cập phân quyền'),
(18, 'thêm phân quyền'),
(19, 'sửa phân quyền'),
(20, 'xóa phân quyền'),
(21, 'truy cập nhập hàng'),
(22, 'thêm phiếu nhập'),
(23, 'sửa phiếu nhập'),
(24, 'xóa phiếu nhập'),
(25, 'truy cập bảo hành'),
(26, 'thêm phiếu bảo hành'),
(27, 'sửa phiếu bảo hành'),
(28, 'xóa phiếu bảo hành'),
(29, 'truy cập thống kê'),
(30, 'mua hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `HINHSP` varchar(200) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `HINHSP`, `SOLUONG`, `MANCC`, `TRANGTHAI`) VALUES
(1, 'HP_1.PNG', 10, 6, 0),
(2, 'HP_2.PNG', 11, 6, 1),
(3, 'ACER_1.PNG', 10, 1, 0),
(4, 'APPLE_1.PNG', 15, 2, 1),
(5, 'ASUS_1.PNG', 11, 3, 1),
(6, 'DELL_1.PNG', 11, 4, 1),
(7, 'GIGABYTE_1.PNG', 3, 5, 1),
(8, 'LENOVO_1.PNG', 11, 8, 1),
(9, 'MSI_1.PNG', 11, 9, 1),
(10, 'MSI_2.PNG', 11, 9, 1),
(11, 'LG_1.PNG', 11, 7, 1),
(12, 'HP_3.PNG', 11, 6, 1),
(13, 'HP_4.PNG', 11, 6, 1),
(14, 'ACER_2.PNG', 3, 1, 1),
(15, 'APPLE_2.PNG', 11, 2, 1),
(16, 'DELL_2.PNG', 11, 4, 1),
(17, 'ASUS_2.PNG', 8, 3, 1),
(18, 'MSI_3.PNG', 11, 9, 1),
(19, 'ASUS_2.PNG', 11, 3, 1),
(20, 'ACER_3.PNG', -8, 1, 1),
(21, 'ACER_4.PNG', 8, 1, 1),
(22, 'ACER_5.PNG', 12, 1, 1),
(23, 'ACER_6.PNG', 14, 1, 1),
(24, 'APPLE_3.PNG', 15, 2, 1),
(25, 'APPLE_4.PNG', 15, 2, 1),
(26, 'APPLE_5.PNG', 20, 2, 1),
(27, 'APPLE_6.PNG', 20, 2, 1),
(28, 'GIGABYTE_2.PNG', 15, 5, 1),
(29, 'GIGABYTE_3.PNG', 15, 5, 1),
(30, 'GIGABYTE_4.PNG', 15, 5, 1),
(31, 'GIGABYTE_5.PNG', 14, 5, 1),
(32, 'GIGABYTE_6.PNG', 14, 5, 1),
(33, 'LG_2.PNG', 15, 7, 1),
(34, 'LG_3.PNG', 15, 7, 1),
(35, 'LG_4.PNG', 15, 7, 1),
(36, 'LG_5.PNG', 15, 7, 1),
(37, 'laptoplogo.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `serial`
--

CREATE TABLE `serial` (
  `MASERI` varchar(100) NOT NULL,
  `MASP` int(11) NOT NULL,
  `NGAYSANXUAT` date DEFAULT NULL,
  `MABAOHANH` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `serial`
--

INSERT INTO `serial` (`MASERI`, `MASP`, `NGAYSANXUAT`, `MABAOHANH`, `TRANGTHAI`) VALUES
('SN0001019584', 1, '2024-05-16', 6, NULL),
('SN0001038668', 1, '2024-05-16', 6, NULL),
('SN0001055986', 1, '2024-05-16', 6, NULL),
('SN0001092482', 1, '2024-05-16', 6, NULL),
('SN0001125904', 1, '2024-05-16', 6, NULL),
('SN0001201701', 1, '2024-05-16', 6, NULL),
('SN0001203107', 1, '2024-05-16', 6, NULL),
('SN0001244402', 1, '2024-05-16', 6, NULL),
('SN0001299525', 1, '2024-04-05', 6, 1),
('SN0001321807', 1, '2024-05-16', 6, NULL),
('SN0001405002', 1, '2024-05-16', 6, NULL),
('SN0001530196', 1, '2024-05-16', 6, NULL),
('SN0001567929', 1, '2024-05-16', 6, NULL),
('SN0001594469', 1, '2024-05-16', 6, NULL),
('SN0001658558', 1, '2024-04-08', 6, 1),
('SN0001709657', 1, '2024-05-16', 6, NULL),
('SN0001714259', 1, '2024-05-16', 6, NULL),
('SN0001739386', 1, '2024-05-16', 6, NULL),
('SN0001811692', 1, '2024-05-16', 6, NULL),
('SN0001859492', 1, '2024-05-16', 6, NULL),
('SN0001918792', 1, '2024-05-16', 6, NULL),
('SN0001999609', 1, '2024-05-16', 6, NULL),
('SN0002021976', 2, '2024-05-16', 6, NULL),
('SN0002066842', 2, '2024-05-16', 6, NULL),
('SN0002083394', 2, '2024-05-16', 6, NULL),
('SN0002152300', 2, '2024-05-16', 6, NULL),
('SN0002210915', 2, '2024-05-16', 6, NULL),
('SN0002215173', 2, '2024-05-16', 6, NULL),
('SN0002223072', 2, '2024-05-16', 6, NULL),
('SN0002291238', 2, '2024-05-16', 6, NULL),
('SN0002326888', 2, '2024-02-08', 6, 1),
('SN0002331908', 2, '2024-05-16', 6, NULL),
('SN0002396982', 2, '2024-05-16', 6, NULL),
('SN0002439874', 2, '2024-05-16', 6, NULL),
('SN0002455714', 2, '2024-01-08', 6, 1),
('SN0002459785', 2, '2024-05-16', 6, NULL),
('SN0002555147', 2, '2024-05-16', 6, NULL),
('SN0002567591', 2, '2024-05-16', 6, NULL),
('SN0002574343', 2, '2024-05-16', 6, NULL),
('SN0002613078', 2, '2024-05-16', 6, NULL),
('SN0002784656', 2, '2024-05-16', 6, NULL),
('SN0002902487', 2, '2024-05-16', 6, NULL),
('SN0002904677', 2, '2024-05-16', 6, NULL),
('SN0003014477', 3, '2024-05-16', 1, NULL),
('SN0003036961', 3, '2024-05-16', 1, NULL),
('SN0003070193', 3, '2024-05-16', 1, NULL),
('SN0003148318', 3, '2024-05-16', 1, NULL),
('SN0003167394', 3, '2024-05-16', 1, NULL),
('SN0003215933', 3, '2024-05-16', 1, NULL),
('SN0003253974', 3, '2024-05-16', 1, NULL),
('SN0003260107', 3, '2024-05-16', 1, NULL),
('SN0003303775', 3, '2024-02-08', 1, 1),
('SN0003317315', 3, '2024-05-16', 1, NULL),
('SN0003323998', 3, '2024-01-08', 1, 1),
('SN0003421424', 3, '2024-05-16', 1, NULL),
('SN0003443352', 3, '2024-05-16', 1, NULL),
('SN0003494484', 3, '2024-05-16', 1, NULL),
('SN0003581972', 3, '2024-05-16', 1, NULL),
('SN0003603408', 3, '2024-05-16', 1, NULL),
('SN0003606062', 3, '2024-05-16', 1, NULL),
('SN0003613971', 3, '2024-05-16', 1, NULL),
('SN0003712299', 3, '2024-05-16', 1, NULL),
('SN0003742888', 3, '2024-03-08', 1, 1),
('SN0003795057', 3, '2024-05-16', 1, NULL),
('SN0003938791', 3, '2024-05-16', 1, NULL),
('SN0003960352', 3, '2024-05-16', 1, NULL),
('SN0004010780', 4, '2024-05-16', 2, NULL),
('SN0004040060', 4, '2024-05-16', 2, NULL),
('SN0004084178', 4, '2024-05-16', 2, NULL),
('SN0004099156', 4, '2024-05-16', 2, NULL),
('SN0004151547', 4, '2024-05-16', 2, NULL),
('SN0004186517', 4, '2024-05-16', 2, NULL),
('SN0004321397', 4, '2024-05-16', 2, NULL),
('SN0004342940', 4, '2024-05-16', 2, NULL),
('SN0004399515', 4, '2024-05-16', 2, NULL),
('SN0004412157', 4, '2024-05-16', 2, NULL),
('SN0004428514', 4, '2024-05-16', 2, NULL),
('SN0004438294', 4, '2024-05-16', 2, NULL),
('SN0004472365', 4, '2024-04-08', 2, 1),
('SN0004521190', 4, '2024-05-16', 2, NULL),
('SN0004532875', 4, '2024-05-16', 2, NULL),
('SN0004544328', 4, '2024-05-16', 2, NULL),
('SN0004551015', 4, '2024-05-16', 2, NULL),
('SN0004556320', 4, '2024-05-08', 2, 1),
('SN0004574270', 4, '2024-05-16', 2, NULL),
('SN0004580692', 4, '2024-05-16', 2, NULL),
('SN0004844999', 4, '2024-06-08', 2, 1),
('SN0004943242', 4, '2024-05-16', 2, NULL),
('SN0004954894', 4, '2024-05-16', 2, NULL),
('SN0004989745', 4, '2024-07-08', 2, 1),
('SN0005010268', 5, '2024-05-16', 3, NULL),
('SN0005084331', 5, '2024-05-16', 3, NULL),
('SN0005099321', 5, '2024-05-16', 3, NULL),
('SN0005159677', 5, '2024-05-16', 3, NULL),
('SN0005213130', 5, '2024-05-16', 3, NULL),
('SN0005346724', 5, '2024-05-16', 3, NULL),
('SN0005375030', 5, '2024-05-16', 3, NULL),
('SN0005380865', 5, '2024-05-16', 3, NULL),
('SN0005403589', 5, '2024-05-16', 3, NULL),
('SN0005404035', 5, '2024-05-16', 3, NULL),
('SN0005475586', 5, '2024-05-16', 3, NULL),
('SN0005529409', 5, '2024-05-16', 3, NULL),
('SN0005539132', 5, '2024-05-16', 3, NULL),
('SN0005627262', 5, '2024-05-16', 3, NULL),
('SN0005679462', 5, '2024-05-16', 3, NULL),
('SN0005754392', 5, '2024-08-08', 3, 1),
('SN0005799097', 5, '2024-05-16', 3, NULL),
('SN0005853112', 5, '2024-05-16', 3, NULL),
('SN0005937355', 5, '2024-05-16', 3, NULL),
('SN0005958935', 5, '2024-05-16', 3, NULL),
('SN0005989528', 5, '2024-05-16', 3, NULL),
('SN0006009307', 6, '2024-05-16', 4, NULL),
('SN0006013400', 6, '2024-05-16', 4, NULL),
('SN0006024242', 6, '2024-05-16', 4, NULL),
('SN0006030980', 6, '2024-05-16', 4, NULL),
('SN0006116902', 6, '2024-05-16', 4, NULL),
('SN0006118369', 6, '2024-05-16', 4, NULL),
('SN0006155115', 6, '2024-05-16', 4, NULL),
('SN0006272854', 6, '2024-09-08', 4, 1),
('SN0006422992', 6, '2024-05-16', 4, NULL),
('SN0006430733', 6, '2024-05-16', 4, NULL),
('SN0006609903', 6, '2024-05-16', 4, NULL),
('SN0006666984', 6, '2024-05-16', 4, NULL),
('SN0006678857', 6, '2024-05-16', 4, NULL),
('SN0006695439', 6, '2024-05-16', 4, NULL),
('SN0006727712', 6, '2024-05-16', 4, NULL),
('SN0006734646', 6, '2024-05-16', 4, NULL),
('SN0006760626', 6, '2024-05-16', 4, NULL),
('SN0006824974', 6, '2024-05-16', 4, NULL),
('SN0006863698', 6, '2024-05-16', 4, NULL),
('SN0006971813', 6, '2024-05-16', 4, NULL),
('SN0006972494', 6, '2024-05-16', 4, NULL),
('SN0007010801', 7, '2024-10-08', 5, 1),
('SN0007089558', 7, '2024-11-08', 5, 1),
('SN0007271982', 7, '2024-12-08', 5, 1),
('SN0008137805', 8, '2024-05-16', 8, NULL),
('SN0008169557', 8, '2024-05-16', 8, NULL),
('SN0008188211', 8, '2024-05-16', 8, NULL),
('SN0008268575', 8, '2024-02-01', 8, 1),
('SN0008434880', 8, '2024-05-16', 8, NULL),
('SN0008463357', 8, '2024-05-16', 8, NULL),
('SN0008509558', 8, '2024-05-16', 8, NULL),
('SN0008527935', 8, '2024-05-16', 8, NULL),
('SN0008632341', 8, '2024-05-16', 8, NULL),
('SN0008638347', 8, '2024-05-16', 8, NULL),
('SN0008666366', 8, '2024-05-16', 8, NULL),
('SN0008679196', 8, '2024-05-16', 8, NULL),
('SN0008728065', 8, '2024-05-16', 8, NULL),
('SN0008835647', 8, '2024-05-16', 8, NULL),
('SN0008837705', 8, '2024-05-16', 8, NULL),
('SN0008863480', 8, '2024-05-16', 8, NULL),
('SN0008870532', 8, '2024-05-16', 8, NULL),
('SN0008879083', 8, '2024-05-16', 8, NULL),
('SN0008907120', 8, '2024-05-16', 8, NULL),
('SN0008939770', 8, '2024-05-16', 8, NULL),
('SN0008971427', 8, '2024-05-16', 8, NULL),
('SN0009010128', 9, '2024-05-16', 9, NULL),
('SN0009010968', 9, '2024-05-16', 9, NULL),
('SN0009031248', 9, '2024-05-16', 9, NULL),
('SN0009140272', 9, '2024-05-16', 9, NULL),
('SN0009156494', 9, '2024-05-16', 9, NULL),
('SN0009193900', 9, '2024-05-16', 9, NULL),
('SN0009331260', 9, '2024-04-02', 9, 1),
('SN0009335598', 9, '2024-05-16', 9, NULL),
('SN0009532660', 9, '2024-05-16', 9, NULL),
('SN0009614719', 9, '2024-05-16', 9, NULL),
('SN0009625404', 9, '2024-05-16', 9, NULL),
('SN0009637409', 9, '2024-05-16', 9, NULL),
('SN0009739380', 9, '2024-05-16', 9, NULL),
('SN0009783446', 9, '2024-05-16', 9, NULL),
('SN0009836743', 9, '2024-05-16', 9, NULL),
('SN0009838886', 9, '2024-05-16', 9, NULL),
('SN0009841793', 9, '2024-05-16', 9, NULL),
('SN0009889797', 9, '2024-05-16', 9, NULL),
('SN0009905384', 9, '2024-05-16', 9, NULL),
('SN0009916351', 9, '2024-05-16', 9, NULL),
('SN0009988406', 9, '2024-05-16', 9, NULL),
('SN0010006574', 10, '2024-05-16', 9, NULL),
('SN0010273913', 10, '2024-05-16', 9, NULL),
('SN0010274323', 10, '2024-05-16', 9, NULL),
('SN0010291903', 10, '2024-05-16', 9, NULL),
('SN0010326187', 10, '2024-05-16', 9, NULL),
('SN0010360283', 10, '2024-05-16', 9, NULL),
('SN0010480670', 10, '2024-05-16', 9, NULL),
('SN0010481659', 10, '2024-05-16', 9, NULL),
('SN0010491100', 10, '2024-05-16', 9, NULL),
('SN0010515329', 10, '2024-05-16', 9, NULL),
('SN0010545550', 10, '2024-05-16', 9, NULL),
('SN0010718230', 10, '2024-04-03', 9, 1),
('SN0010735861', 10, '2024-05-16', 9, NULL),
('SN0010771368', 10, '2024-05-16', 9, NULL),
('SN0010831892', 10, '2024-05-16', 9, NULL),
('SN0010894412', 10, '2024-05-16', 9, NULL),
('SN0010903015', 10, '2024-05-16', 9, NULL),
('SN0010924906', 10, '2024-05-16', 9, NULL),
('SN0010947605', 10, '2024-05-16', 9, NULL),
('SN0010980967', 10, '2024-05-16', 9, NULL),
('SN0010982809', 10, '2024-05-16', 9, NULL),
('SN0011005064', 11, '2024-05-16', 7, NULL),
('SN0011086654', 11, '2024-05-16', 7, NULL),
('SN0011107152', 11, '2024-05-16', 7, NULL),
('SN0011120785', 11, '2024-05-16', 7, NULL),
('SN0011120971', 11, '2024-05-16', 7, NULL),
('SN0011182740', 11, '2024-05-16', 7, NULL),
('SN0011213050', 11, '2024-05-16', 7, NULL),
('SN0011265190', 11, '2024-05-16', 7, NULL),
('SN0011311825', 11, '2024-05-16', 7, NULL),
('SN0011535605', 11, '2024-05-16', 7, NULL),
('SN0011542910', 11, '2024-05-16', 7, NULL),
('SN0011581604', 11, '2024-05-16', 7, NULL),
('SN0011604601', 11, '2024-05-16', 7, NULL),
('SN0011618971', 11, '2024-05-16', 7, NULL),
('SN0011666826', 11, '2024-05-16', 7, NULL),
('SN0011730092', 11, '2024-05-16', 7, NULL),
('SN0011738392', 11, '2024-05-16', 7, NULL),
('SN0011745610', 11, '2024-05-16', 7, NULL),
('SN0011811569', 11, '2024-05-16', 7, NULL),
('SN0011822289', 11, '2024-05-16', 7, NULL),
('SN0011969387', 11, '2024-04-04', 7, 1),
('SN0012091905', 12, '2024-05-16', 6, NULL),
('SN0012110472', 12, '2024-05-16', 6, NULL),
('SN0012151074', 12, '2024-05-16', 6, NULL),
('SN0012159350', 12, '2024-05-16', 6, NULL),
('SN0012191373', 12, '2024-05-16', 6, NULL),
('SN0012202771', 12, '2024-05-16', 6, NULL),
('SN0012285538', 12, '2024-05-16', 6, NULL),
('SN0012310571', 12, '2024-05-16', 6, NULL),
('SN0012328276', 12, '2024-04-05', 6, 1),
('SN0012422328', 12, '2024-05-16', 6, NULL),
('SN0012518178', 12, '2024-05-16', 6, NULL),
('SN0012523796', 12, '2024-05-16', 6, NULL),
('SN0012593190', 12, '2024-05-16', 6, NULL),
('SN0012635990', 12, '2024-05-16', 6, NULL),
('SN0012685175', 12, '2024-05-16', 6, NULL),
('SN0012693394', 12, '2024-05-16', 6, NULL),
('SN0012695668', 12, '2024-05-16', 6, NULL),
('SN0012730365', 12, '2024-05-16', 6, NULL),
('SN0012912103', 12, '2024-05-16', 6, NULL),
('SN0012952220', 12, '2024-05-16', 6, NULL),
('SN0012962210', 12, '2024-05-16', 6, NULL),
('SN0013057059', 13, '2024-05-16', 6, NULL),
('SN0013146413', 13, '2024-05-16', 6, NULL),
('SN0013201369', 13, '2024-05-16', 6, NULL),
('SN0013260379', 13, '2024-05-16', 6, NULL),
('SN0013376448', 13, '2024-04-06', 6, 1),
('SN0013512391', 13, '2024-05-16', 6, NULL),
('SN0013517506', 13, '2024-05-16', 6, NULL),
('SN0013540465', 13, '2024-05-16', 6, NULL),
('SN0013605711', 13, '2024-05-16', 6, NULL),
('SN0013607170', 13, '2024-05-16', 6, NULL),
('SN0013619851', 13, '2024-05-16', 6, NULL),
('SN0013620360', 13, '2024-05-16', 6, NULL),
('SN0013622083', 13, '2024-05-16', 6, NULL),
('SN0013720398', 13, '2024-05-16', 6, NULL),
('SN0013723279', 13, '2024-05-16', 6, NULL),
('SN0013785144', 13, '2024-05-16', 6, NULL),
('SN0013790497', 13, '2024-05-16', 6, NULL),
('SN0013831870', 13, '2024-05-16', 6, NULL),
('SN0013837471', 13, '2024-05-16', 6, NULL),
('SN0013973670', 13, '2024-05-16', 6, NULL),
('SN0013984128', 13, '2024-05-16', 6, NULL),
('SN0014022495', 14, '2024-05-16', 1, NULL),
('SN0014032180', 14, '2024-05-16', 1, NULL),
('SN0014039279', 14, '2024-05-16', 1, NULL),
('SN0014072370', 14, '2024-05-16', 1, NULL),
('SN0014105415', 14, '2024-05-16', 1, NULL),
('SN0014177728', 14, '2024-05-16', 1, NULL),
('SN0014277130', 14, '2024-05-16', 1, NULL),
('SN0014305584', 14, '2024-04-07', 1, 1),
('SN0014533270', 14, '2024-05-16', 1, NULL),
('SN0014534262', 14, '2024-05-16', 1, NULL),
('SN0014544982', 14, '2024-05-16', 1, NULL),
('SN0014599727', 14, '2024-05-16', 1, NULL),
('SN0014641029', 14, '2024-05-16', 1, NULL),
('SN0014669787', 14, '2024-05-16', 1, NULL),
('SN0014681998', 14, '2024-05-16', 1, NULL),
('SN0014695190', 14, '2024-05-16', 1, NULL),
('SN0014759324', 14, '2024-05-16', 1, NULL),
('SN0014868765', 14, '2024-05-16', 1, NULL),
('SN0014870683', 14, '2024-05-16', 1, NULL),
('SN0014874354', 14, '2024-05-16', 1, NULL),
('SN0014916461', 14, '2024-05-16', 1, NULL),
('SN0015090961', 15, '2024-05-16', 2, NULL),
('SN0015093554', 15, '2024-05-16', 2, NULL),
('SN0015136899', 15, '2024-05-16', 2, NULL),
('SN0015145428', 15, '2024-05-16', 2, NULL),
('SN0015174930', 15, '2024-05-16', 2, NULL),
('SN0015234983', 15, '2024-05-16', 2, NULL),
('SN0015235329', 15, '2024-05-16', 2, NULL),
('SN0015270170', 15, '2024-05-16', 2, NULL),
('SN0015286088', 15, '2024-05-16', 2, NULL),
('SN0015332717', 15, '2024-05-16', 2, NULL),
('SN0015460039', 15, '2024-05-16', 2, NULL),
('SN0015614933', 15, '2024-04-08', 2, 1),
('SN0015635519', 15, '2024-05-16', 2, NULL),
('SN0015652318', 15, '2024-05-16', 2, NULL),
('SN0015659989', 15, '2024-05-16', 2, NULL),
('SN0015662562', 15, '2024-05-16', 2, NULL),
('SN0015684572', 15, '2024-05-16', 2, NULL),
('SN0015734842', 15, '2024-05-16', 2, NULL),
('SN0015793612', 15, '2024-05-16', 2, NULL),
('SN0015954957', 15, '2024-05-16', 2, NULL),
('SN0015990989', 15, '2024-05-16', 2, NULL),
('SN0016247196', 16, '2024-05-16', 4, NULL),
('SN0016248294', 16, '2024-05-16', 4, NULL),
('SN0016279612', 16, '2024-05-16', 4, NULL),
('SN0016284389', 16, '2024-05-16', 4, NULL),
('SN0016288012', 16, '2024-04-10', 4, 1),
('SN0016306477', 16, '2024-05-16', 4, NULL),
('SN0016331938', 16, '2024-05-16', 4, NULL),
('SN0016344603', 16, '2024-05-16', 4, NULL),
('SN0016345591', 16, '2024-05-16', 4, NULL),
('SN0016349174', 16, '2024-05-16', 4, NULL),
('SN0016404802', 16, '2024-05-16', 4, NULL),
('SN0016406872', 16, '2024-05-16', 4, NULL),
('SN0016521381', 16, '2024-05-16', 4, NULL),
('SN0016552312', 16, '2024-05-16', 4, NULL),
('SN0016555063', 16, '2024-05-16', 4, NULL),
('SN0016596114', 16, '2024-05-16', 4, NULL),
('SN0016753463', 16, '2024-05-16', 4, NULL),
('SN0016804197', 16, '2024-05-16', 4, NULL),
('SN0016918890', 16, '2024-05-16', 4, NULL),
('SN0016956717', 16, '2024-05-16', 4, NULL),
('SN0016974396', 16, '2024-05-16', 4, NULL),
('SN0017036595', 17, '2024-04-11', 3, 1),
('SN0017081960', 17, '2024-05-16', 3, NULL),
('SN0017085633', 17, '2024-05-16', 3, NULL),
('SN0017177417', 17, '2024-05-16', 3, NULL),
('SN0017179793', 17, '2024-05-16', 3, NULL),
('SN0017224168', 17, '2024-05-16', 3, NULL),
('SN0017239189', 17, '2024-05-16', 3, NULL),
('SN0017315593', 17, '2024-05-16', 3, NULL),
('SN0017564744', 17, '2024-05-16', 3, NULL),
('SN0017584954', 17, '2024-05-16', 3, NULL),
('SN0017622188', 17, '2024-05-16', 3, NULL),
('SN0017645635', 17, '2024-05-16', 3, NULL),
('SN0017736007', 17, '2024-05-16', 3, NULL),
('SN0017745270', 17, '2024-05-16', 3, NULL),
('SN0017763461', 17, '2024-05-16', 3, NULL),
('SN0017812220', 17, '2024-05-16', 3, NULL),
('SN0017826089', 17, '2024-05-16', 3, NULL),
('SN0017856149', 17, '2024-05-16', 3, NULL),
('SN0017864647', 17, '2024-05-16', 3, NULL),
('SN0017871748', 17, '2024-05-16', 3, NULL),
('SN0017951879', 17, '2024-05-16', 3, NULL),
('SN0018002601', 18, '2024-05-16', 9, NULL),
('SN0018074838', 18, '2024-05-16', 9, NULL),
('SN0018075068', 18, '2024-05-16', 9, NULL),
('SN0018087725', 18, '2024-05-16', 9, NULL),
('SN0018156149', 18, '2024-05-16', 9, NULL),
('SN0018169641', 18, '2024-05-16', 9, NULL),
('SN0018171328', 18, '2024-05-16', 9, NULL),
('SN0018262276', 18, '2024-05-16', 9, NULL),
('SN0018315623', 18, '2024-05-16', 9, NULL),
('SN0018316380', 18, '2024-05-16', 9, NULL),
('SN0018395096', 18, '2024-05-16', 9, NULL),
('SN0018448099', 18, '2024-04-12', 9, 1),
('SN0018534158', 18, '2024-05-16', 9, NULL),
('SN0018537561', 18, '2024-05-16', 9, NULL),
('SN0018549080', 18, '2024-05-16', 9, NULL),
('SN0018613880', 18, '2024-05-16', 9, NULL),
('SN0018847882', 18, '2024-05-16', 9, NULL),
('SN0018853688', 18, '2024-05-16', 9, NULL),
('SN0018858693', 18, '2024-05-16', 9, NULL),
('SN0018874980', 18, '2024-05-16', 9, NULL),
('SN0018960303', 18, '2024-05-16', 9, NULL),
('SN0019089302', 19, '2024-05-16', 3, NULL),
('SN0019262630', 19, '2024-05-16', 3, NULL),
('SN0019314113', 19, '2024-05-16', 3, NULL),
('SN0019321444', 19, '2024-05-16', 3, NULL),
('SN0019395306', 19, '2024-05-16', 3, NULL),
('SN0019398032', 19, '2024-05-16', 3, NULL),
('SN0019451079', 19, '2024-04-13', 3, 1),
('SN0019455759', 19, '2024-05-16', 3, NULL),
('SN0019476666', 19, '2024-05-16', 3, NULL),
('SN0019504334', 19, '2024-05-16', 3, NULL),
('SN0019511870', 19, '2024-05-16', 3, NULL),
('SN0019648036', 19, '2024-05-16', 3, NULL),
('SN0019725771', 19, '2024-05-16', 3, NULL),
('SN0019806171', 19, '2024-05-16', 3, NULL),
('SN0019825176', 19, '2024-05-16', 3, NULL),
('SN0019854485', 19, '2024-05-16', 3, NULL),
('SN0019902727', 19, '2024-05-16', 3, NULL),
('SN0019923344', 19, '2024-05-16', 3, NULL),
('SN0019967477', 19, '2024-05-16', 3, NULL),
('SN0019972792', 19, '2024-05-16', 3, NULL),
('SN0019986256', 19, '2024-05-16', 3, NULL),
('SN0020031904', 20, '2024-05-18', 1, NULL),
('SN0020166766', 20, '2024-05-18', 1, NULL),
('SN0020181301', 20, '2024-05-18', 1, NULL),
('SN0020214600', 20, '2024-05-18', 1, NULL),
('SN0020269554', 20, '2024-05-18', 1, NULL),
('SN0020321855', 20, '2024-05-18', 1, NULL),
('SN0020330734', 20, '2024-05-18', 1, NULL),
('SN0020584643', 20, '2024-05-18', 1, NULL),
('SN0020642736', 20, '2024-05-18', 1, NULL),
('SN0020740443', 20, '2024-05-18', 1, NULL),
('SN0020745795', 20, '2024-05-18', 1, NULL),
('SN0020811410', 20, '2024-05-18', 1, NULL),
('SN0020887404', 20, '2024-05-18', 1, NULL),
('SN0020945905', 20, '2024-05-18', 1, NULL),
('SN0021024639', 21, '2024-05-18', 1, NULL),
('SN0021116804', 21, '2024-05-18', 1, NULL),
('SN0021165341', 21, '2024-05-18', 1, NULL),
('SN0021174732', 21, '2024-05-18', 1, NULL),
('SN0021203743', 21, '2024-05-18', 1, NULL),
('SN0021338350', 21, '2024-05-18', 1, NULL),
('SN0021339679', 21, '2024-05-18', 1, NULL),
('SN0021347717', 21, '2024-05-18', 1, NULL),
('SN0021418781', 21, '2024-05-18', 1, NULL),
('SN0021481768', 21, '2024-05-18', 1, NULL),
('SN0021595899', 21, '2024-05-18', 1, NULL),
('SN0021610283', 21, '2024-05-18', 1, NULL),
('SN0021757012', 21, '2024-05-18', 1, NULL),
('SN0021802781', 21, '2024-05-18', 1, NULL),
('SN0021907798', 21, '2024-05-18', 1, NULL),
('SN0021928209', 21, '2024-05-18', 1, NULL),
('SN0021963176', 21, '2024-05-18', 1, NULL),
('SN0021970290', 21, '2024-05-18', 1, NULL),
('SN0022012002', 22, '2024-05-18', 1, NULL),
('SN0022041147', 22, '2024-05-18', 1, NULL),
('SN0022084484', 22, '2024-05-18', 1, NULL),
('SN0022115310', 22, '2024-05-18', 1, NULL),
('SN0022174218', 22, '2024-05-18', 1, NULL),
('SN0022178376', 22, '2024-05-18', 1, NULL),
('SN0022363715', 22, '2024-05-18', 1, NULL),
('SN0022434169', 22, '2024-05-18', 1, NULL),
('SN0022467310', 22, '2024-05-18', 1, NULL),
('SN0022474402', 22, '2024-05-18', 1, NULL),
('SN0022476408', 22, '2024-05-18', 1, NULL),
('SN0022549574', 22, '2024-05-18', 1, NULL),
('SN0022648571', 22, '2024-05-18', 1, NULL),
('SN0022649492', 22, '2024-05-18', 1, NULL),
('SN0022695172', 22, '2024-05-18', 1, NULL),
('SN0022741615', 22, '2024-05-18', 1, NULL),
('SN0022873609', 22, '2024-05-18', 1, NULL),
('SN0022957880', 22, '2024-05-18', 1, NULL),
('SN0023011704', 23, '2024-05-18', 1, NULL),
('SN0023033259', 23, '2024-05-18', 1, NULL),
('SN0023047016', 23, '2024-05-18', 1, NULL),
('SN0023150598', 23, '2024-05-18', 1, NULL),
('SN0023166311', 23, '2024-05-18', 1, NULL),
('SN0023275718', 23, '2024-05-18', 1, NULL),
('SN0023310626', 23, '2024-05-18', 1, NULL),
('SN0023358431', 23, '2024-05-18', 1, NULL),
('SN0023359015', 23, '2024-05-18', 1, NULL),
('SN0023362877', 23, '2024-05-18', 1, NULL),
('SN0023366061', 23, '2024-05-18', 1, NULL),
('SN0023389592', 23, '2024-05-18', 1, NULL),
('SN0023433745', 23, '2024-05-18', 1, NULL),
('SN0023476439', 23, '2024-05-18', 1, NULL),
('SN0023724109', 23, '2024-05-18', 1, NULL),
('SN0023738871', 23, '2024-05-18', 1, NULL),
('SN0023793897', 23, '2024-05-18', 1, NULL),
('SN0023826516', 23, '2024-05-18', 1, NULL),
('SN0023842133', 23, '2024-05-18', 1, NULL),
('SN0023893825', 23, '2024-05-18', 1, NULL),
('SN0024082058', 24, '2024-05-18', 2, NULL),
('SN0024120375', 24, '2024-05-18', 2, NULL),
('SN0024122487', 24, '2024-05-18', 2, NULL),
('SN0024145233', 24, '2024-05-18', 2, NULL),
('SN0024163864', 24, '2024-05-18', 2, NULL),
('SN0024182474', 24, '2024-05-18', 2, NULL),
('SN0024243265', 24, '2024-05-18', 2, NULL),
('SN0024315053', 24, '2024-05-18', 2, NULL),
('SN0024319153', 24, '2024-05-18', 2, NULL),
('SN0024338379', 24, '2024-05-18', 2, NULL),
('SN0024459976', 24, '2024-05-18', 2, NULL),
('SN0024468489', 24, '2024-05-18', 2, NULL),
('SN0024568161', 24, '2024-05-18', 2, NULL),
('SN0024658453', 24, '2024-05-18', 2, NULL),
('SN0024698087', 24, '2024-05-18', 2, NULL),
('SN0024747457', 24, '2024-05-18', 2, NULL),
('SN0024763461', 24, '2024-05-18', 2, NULL),
('SN0024785575', 24, '2024-05-18', 2, NULL),
('SN0024805322', 24, '2024-05-18', 2, NULL),
('SN0024824442', 24, '2024-05-18', 2, NULL),
('SN0024862365', 24, '2024-05-18', 2, NULL),
('SN0024877620', 24, '2024-05-18', 2, NULL),
('SN0024897413', 24, '2024-05-18', 2, NULL),
('SN0024916967', 24, '2024-05-18', 2, NULL),
('SN0024918386', 24, '2024-05-18', 2, NULL),
('SN0024929225', 24, '2024-05-18', 2, NULL),
('SN0024932159', 24, '2024-05-18', 2, NULL),
('SN0024972286', 24, '2024-05-18', 2, NULL),
('SN0024979771', 24, '2024-05-18', 2, NULL),
('SN0025085933', 25, '2024-05-18', 2, NULL),
('SN0025103079', 25, '2024-05-18', 2, NULL),
('SN0025142982', 25, '2024-05-18', 2, NULL),
('SN0025238216', 25, '2024-05-18', 2, NULL),
('SN0025354692', 25, '2024-05-18', 2, NULL),
('SN0025363754', 25, '2024-05-18', 2, NULL),
('SN0025381140', 25, '2024-05-18', 2, NULL),
('SN0025399736', 25, '2024-05-18', 2, NULL),
('SN0025400381', 25, '2024-05-18', 2, NULL),
('SN0025408136', 25, '2024-05-18', 2, NULL),
('SN0025435155', 25, '2024-05-18', 2, NULL),
('SN0025472602', 25, '2024-05-18', 2, NULL),
('SN0025495153', 25, '2024-05-18', 2, NULL),
('SN0025560579', 25, '2024-05-18', 2, NULL),
('SN0025562509', 25, '2024-05-18', 2, NULL),
('SN0025607995', 25, '2024-05-18', 2, NULL),
('SN0025638016', 25, '2024-05-18', 2, NULL),
('SN0025647477', 25, '2024-05-18', 2, NULL),
('SN0025661189', 25, '2024-05-18', 2, NULL),
('SN0025691149', 25, '2024-05-18', 2, NULL),
('SN0025703201', 25, '2024-05-18', 2, NULL),
('SN0025711566', 25, '2024-05-18', 2, NULL),
('SN0025715499', 25, '2024-05-18', 2, NULL),
('SN0025790406', 25, '2024-05-18', 2, NULL),
('SN0025830254', 25, '2024-05-18', 2, NULL),
('SN0025855939', 25, '2024-05-18', 2, NULL),
('SN0025932327', 25, '2024-05-18', 2, NULL),
('SN0025957579', 25, '2024-05-18', 2, NULL),
('SN0025959650', 25, '2024-05-18', 2, NULL),
('SN0025963927', 25, '2024-05-18', 2, NULL),
('SN0026048731', 26, '2024-05-18', 2, NULL),
('SN0026075717', 26, '2024-05-18', 2, NULL),
('SN0026163598', 26, '2024-05-18', 2, NULL),
('SN0026164928', 26, '2024-05-18', 2, NULL),
('SN0026195978', 26, '2024-05-18', 2, NULL),
('SN0026197489', 26, '2024-05-18', 2, NULL),
('SN0026321915', 26, '2024-05-18', 2, NULL),
('SN0026326329', 26, '2024-05-18', 2, NULL),
('SN0026328599', 26, '2024-05-18', 2, NULL),
('SN0026390951', 26, '2024-05-18', 2, NULL),
('SN0026401386', 26, '2024-05-18', 2, NULL),
('SN0026433191', 26, '2024-05-18', 2, NULL),
('SN0026508174', 26, '2024-05-18', 2, NULL),
('SN0026525347', 26, '2024-05-18', 2, NULL),
('SN0026526611', 26, '2024-05-18', 2, NULL),
('SN0026563870', 26, '2024-05-18', 2, NULL),
('SN0026597577', 26, '2024-05-18', 2, NULL),
('SN0026614277', 26, '2024-05-18', 2, NULL),
('SN0026732079', 26, '2024-05-18', 2, NULL),
('SN0026756271', 26, '2024-05-18', 2, NULL),
('SN0026795916', 26, '2024-05-18', 2, NULL),
('SN0026798058', 26, '2024-05-18', 2, NULL),
('SN0026802165', 26, '2024-05-18', 2, NULL),
('SN0026802802', 26, '2024-05-18', 2, NULL),
('SN0026814467', 26, '2024-05-18', 2, NULL),
('SN0026849488', 26, '2024-05-18', 2, NULL),
('SN0026859010', 26, '2024-05-18', 2, NULL),
('SN0026902557', 26, '2024-05-18', 2, NULL),
('SN0026906993', 26, '2024-05-18', 2, NULL),
('SN0026978702', 26, '2024-05-18', 2, NULL),
('SN0027016234', 27, '2024-05-18', 2, NULL),
('SN0027045717', 27, '2024-05-18', 2, NULL),
('SN0027054358', 27, '2024-05-18', 2, NULL),
('SN0027058000', 27, '2024-05-18', 2, NULL),
('SN0027064701', 27, '2024-05-18', 2, NULL),
('SN0027117083', 27, '2024-05-18', 2, NULL),
('SN0027138567', 27, '2024-05-18', 2, NULL),
('SN0027158626', 27, '2024-05-18', 2, NULL),
('SN0027216759', 27, '2024-05-18', 2, NULL),
('SN0027231394', 27, '2024-05-18', 2, NULL),
('SN0027315686', 27, '2024-05-18', 2, NULL),
('SN0027381592', 27, '2024-05-18', 2, NULL),
('SN0027407432', 27, '2024-05-18', 2, NULL),
('SN0027439736', 27, '2024-05-18', 2, NULL),
('SN0027444353', 27, '2024-05-18', 2, NULL),
('SN0027512503', 27, '2024-05-18', 2, NULL),
('SN0027561768', 27, '2024-05-18', 2, NULL),
('SN0027664956', 27, '2024-05-18', 2, NULL),
('SN0027715260', 27, '2024-05-18', 2, NULL),
('SN0027717643', 27, '2024-05-18', 2, NULL),
('SN0027729935', 27, '2024-05-18', 2, NULL),
('SN0027756144', 27, '2024-05-18', 2, NULL),
('SN0027800935', 27, '2024-05-18', 2, NULL),
('SN0027818275', 27, '2024-05-18', 2, NULL),
('SN0027839226', 27, '2024-05-18', 2, NULL),
('SN0027843691', 27, '2024-05-18', 2, NULL),
('SN0027861124', 27, '2024-05-18', 2, NULL),
('SN0027876957', 27, '2024-05-18', 2, NULL),
('SN0027922780', 27, '2024-05-18', 2, NULL),
('SN0027949124', 27, '2024-05-18', 2, NULL),
('SN0028035406', 28, '2024-05-18', 5, NULL),
('SN0028051524', 28, '2024-05-18', 5, NULL),
('SN0028101143', 28, '2024-05-18', 5, NULL),
('SN0028103020', 28, '2024-05-18', 5, NULL),
('SN0028181501', 28, '2024-05-18', 5, NULL),
('SN0028210343', 28, '2024-05-18', 5, NULL),
('SN0028263841', 28, '2024-05-18', 5, NULL),
('SN0028466102', 28, '2024-05-18', 5, NULL),
('SN0028534296', 28, '2024-05-18', 5, NULL),
('SN0028618098', 28, '2024-05-18', 5, NULL),
('SN0028663690', 28, '2024-05-18', 5, NULL),
('SN0028679930', 28, '2024-05-18', 5, NULL),
('SN0028730786', 28, '2024-05-18', 5, NULL),
('SN0028763107', 28, '2024-05-18', 5, NULL),
('SN0028804543', 28, '2024-05-18', 5, NULL),
('SN0028814610', 28, '2024-05-18', 5, NULL),
('SN0028899887', 28, '2024-05-18', 5, NULL),
('SN0028914988', 28, '2024-05-18', 5, NULL),
('SN0028917910', 28, '2024-05-18', 5, NULL),
('SN0028940519', 28, '2024-05-18', 5, NULL),
('SN0029011477', 29, '2024-05-18', 5, NULL),
('SN0029063910', 29, '2024-05-18', 5, NULL),
('SN0029081745', 29, '2024-05-18', 5, NULL),
('SN0029248630', 29, '2024-05-18', 5, NULL),
('SN0029299897', 29, '2024-05-18', 5, NULL),
('SN0029348550', 29, '2024-05-18', 5, NULL),
('SN0029358126', 29, '2024-05-18', 5, NULL),
('SN0029364115', 29, '2024-05-18', 5, NULL),
('SN0029374400', 29, '2024-05-18', 5, NULL),
('SN0029385257', 29, '2024-05-18', 5, NULL),
('SN0029438438', 29, '2024-05-18', 5, NULL),
('SN0029525333', 29, '2024-05-18', 5, NULL),
('SN0029579902', 29, '2024-05-18', 5, NULL),
('SN0029717999', 29, '2024-05-18', 5, NULL),
('SN0029756242', 29, '2024-05-18', 5, NULL),
('SN0029784570', 29, '2024-05-18', 5, NULL),
('SN0029790692', 29, '2024-05-18', 5, NULL),
('SN0029874844', 29, '2024-05-18', 5, NULL),
('SN0029904245', 29, '2024-05-18', 5, NULL),
('SN0029969573', 29, '2024-05-18', 5, NULL),
('SN0030051422', 30, '2024-05-18', 5, NULL),
('SN0030087243', 30, '2024-05-18', 5, NULL),
('SN0030116349', 30, '2024-05-18', 5, NULL),
('SN0030179300', 30, '2024-05-18', 5, NULL),
('SN0030228590', 30, '2024-05-18', 5, NULL),
('SN0030262847', 30, '2024-05-18', 5, NULL),
('SN0030347592', 30, '2024-05-18', 5, NULL),
('SN0030383373', 30, '2024-05-18', 5, NULL),
('SN0030412299', 30, '2024-05-18', 5, NULL),
('SN0030467008', 30, '2024-05-18', 5, NULL),
('SN0030483904', 30, '2024-05-18', 5, NULL),
('SN0030517805', 30, '2024-05-18', 5, NULL),
('SN0030602817', 30, '2024-05-18', 5, NULL),
('SN0030607807', 30, '2024-05-18', 5, NULL),
('SN0030619850', 30, '2024-05-18', 5, NULL),
('SN0030658510', 30, '2024-05-18', 5, NULL),
('SN0030664527', 30, '2024-05-18', 5, NULL),
('SN0030850092', 30, '2024-05-18', 5, NULL),
('SN0030884442', 30, '2024-05-18', 5, NULL),
('SN0030977419', 30, '2024-05-18', 5, NULL),
('SN0031064974', 31, '2024-05-18', 5, NULL),
('SN0031083701', 31, '2024-05-18', 5, NULL),
('SN0031167939', 31, '2024-05-18', 5, NULL),
('SN0031211109', 31, '2024-05-18', 5, NULL),
('SN0031261116', 31, '2024-05-18', 5, NULL),
('SN0031295306', 31, '2024-05-18', 5, NULL),
('SN0031313496', 31, '2024-05-18', 5, NULL),
('SN0031409591', 31, '2024-05-18', 5, NULL),
('SN0031449901', 31, '2024-05-18', 5, NULL),
('SN0031528433', 31, '2024-05-18', 5, NULL),
('SN0031539138', 31, '2024-05-18', 5, NULL),
('SN0031593734', 31, '2024-05-18', 5, NULL),
('SN0031598381', 31, '2024-05-18', 5, NULL),
('SN0031677438', 31, '2024-05-18', 5, NULL),
('SN0031809437', 31, '2024-05-18', 5, NULL),
('SN0031823136', 31, '2024-05-18', 5, NULL),
('SN0031876551', 31, '2024-05-18', 5, NULL),
('SN0031941176', 31, '2024-05-18', 5, NULL),
('SN0031969533', 31, '2024-05-18', 5, NULL),
('SN0031995558', 31, '2024-05-18', 5, NULL),
('SN0032013539', 32, '2024-05-18', 5, NULL),
('SN0032018026', 32, '2024-05-18', 5, NULL),
('SN0032042633', 32, '2024-05-18', 5, NULL),
('SN0032097606', 32, '2024-05-18', 5, NULL),
('SN0032118069', 32, '2024-05-18', 5, NULL),
('SN0032121413', 32, '2024-05-18', 5, NULL),
('SN0032169169', 32, '2024-05-18', 5, NULL),
('SN0032278921', 32, '2024-05-18', 5, NULL),
('SN0032281020', 32, '2024-05-18', 5, NULL),
('SN0032442041', 32, '2024-05-18', 5, NULL),
('SN0032459245', 32, '2024-05-18', 5, NULL),
('SN0032489955', 32, '2024-05-18', 5, NULL),
('SN0032536236', 32, '2024-05-18', 5, NULL),
('SN0032580418', 32, '2024-05-18', 5, NULL),
('SN0032596515', 32, '2024-05-18', 5, NULL),
('SN0032642278', 32, '2024-05-18', 5, NULL),
('SN0032825266', 32, '2024-05-18', 5, NULL),
('SN0032869487', 32, '2024-05-18', 5, NULL),
('SN0032918537', 32, '2024-05-18', 5, NULL),
('SN0032950714', 32, '2024-05-18', 5, NULL),
('SN0033002120', 33, '2024-05-18', 7, NULL),
('SN0033006457', 33, '2024-05-18', 7, NULL),
('SN0033014781', 33, '2024-05-18', 7, NULL),
('SN0033094888', 33, '2024-05-18', 7, NULL),
('SN0033243572', 33, '2024-05-18', 7, NULL),
('SN0033324949', 33, '2024-05-18', 7, NULL),
('SN0033413110', 33, '2024-05-18', 7, NULL),
('SN0033424812', 33, '2024-05-18', 7, NULL),
('SN0033514657', 33, '2024-05-18', 7, NULL),
('SN0033538066', 33, '2024-05-18', 7, NULL),
('SN0033553982', 33, '2024-05-18', 7, NULL),
('SN0033659151', 33, '2024-05-18', 7, NULL),
('SN0033702828', 33, '2024-05-18', 7, NULL),
('SN0033704741', 33, '2024-05-18', 7, NULL),
('SN0033710472', 33, '2024-05-18', 7, NULL),
('SN0033763999', 33, '2024-05-18', 7, NULL),
('SN0033783541', 33, '2024-05-18', 7, NULL),
('SN0033839987', 33, '2024-05-18', 7, NULL),
('SN0033850539', 33, '2024-05-18', 7, NULL),
('SN0033893992', 33, '2024-05-18', 7, NULL),
('SN0034000900', 34, '2024-05-18', 7, NULL),
('SN0034010101', 34, '2024-05-18', 7, NULL),
('SN0034051256', 34, '2024-05-18', 7, NULL),
('SN0034161704', 34, '2024-05-18', 7, NULL),
('SN0034180762', 34, '2024-05-18', 7, NULL),
('SN0034339128', 34, '2024-05-18', 7, NULL),
('SN0034355511', 34, '2024-05-18', 7, NULL),
('SN0034450082', 34, '2024-05-18', 7, NULL),
('SN0034570816', 34, '2024-05-18', 7, NULL),
('SN0034686554', 34, '2024-05-18', 7, NULL),
('SN0034738946', 34, '2024-05-18', 7, NULL),
('SN0034749911', 34, '2024-05-18', 7, NULL),
('SN0034769052', 34, '2024-05-18', 7, NULL),
('SN0034780129', 34, '2024-05-18', 7, NULL),
('SN0034824166', 34, '2024-05-18', 7, NULL),
('SN0034829510', 34, '2024-05-18', 7, NULL),
('SN0034830727', 34, '2024-05-18', 7, NULL),
('SN0034873277', 34, '2024-05-18', 7, NULL),
('SN0034903563', 34, '2024-05-18', 7, NULL),
('SN0034934803', 34, '2024-05-18', 7, NULL),
('SN0035011873', 35, '2024-05-18', 7, NULL),
('SN0035034222', 35, '2024-05-18', 7, NULL),
('SN0035163698', 35, '2024-05-18', 7, NULL),
('SN0035194565', 35, '2024-05-18', 7, NULL),
('SN0035253628', 35, '2024-05-18', 7, NULL),
('SN0035255611', 35, '2024-05-18', 7, NULL),
('SN0035289321', 35, '2024-05-18', 7, NULL),
('SN0035291792', 35, '2024-05-18', 7, NULL),
('SN0035342090', 35, '2024-05-18', 7, NULL),
('SN0035412174', 35, '2024-05-18', 7, NULL),
('SN0035412931', 35, '2024-05-18', 7, NULL),
('SN0035433000', 35, '2024-05-18', 7, NULL),
('SN0035473326', 35, '2024-05-18', 7, NULL),
('SN0035529432', 35, '2024-05-18', 7, NULL),
('SN0035560579', 35, '2024-05-18', 7, NULL),
('SN0035651264', 35, '2024-05-18', 7, NULL),
('SN0035728770', 35, '2024-05-18', 7, NULL),
('SN0035818751', 35, '2024-05-18', 7, NULL),
('SN0035832027', 35, '2024-05-18', 7, NULL),
('SN0035896445', 35, '2024-05-18', 7, NULL),
('SN0036075470', 36, '2024-05-18', 7, NULL),
('SN0036080646', 36, '2024-05-18', 7, NULL),
('SN0036083030', 36, '2024-05-18', 7, NULL),
('SN0036104119', 36, '2024-05-18', 7, NULL),
('SN0036241943', 36, '2024-05-18', 7, NULL),
('SN0036342715', 36, '2024-05-18', 7, NULL),
('SN0036421857', 36, '2024-05-18', 7, NULL),
('SN0036476426', 36, '2024-05-18', 7, NULL),
('SN0036615565', 36, '2024-05-18', 7, NULL),
('SN0036616424', 36, '2024-05-18', 7, NULL),
('SN0036661312', 36, '2024-05-18', 7, NULL),
('SN0036725864', 36, '2024-05-18', 7, NULL),
('SN0036730855', 36, '2024-05-18', 7, NULL),
('SN0036734019', 36, '2024-05-18', 7, NULL),
('SN0036789949', 36, '2024-05-18', 7, NULL),
('SN0036803802', 36, '2024-05-18', 7, NULL),
('SN0036855174', 36, '2024-05-18', 7, NULL),
('SN0036880263', 36, '2024-05-18', 7, NULL),
('SN0036978701', 36, '2024-05-18', 7, NULL),
('SN0036990601', 36, '2024-05-18', 7, NULL),
('SN0037525989', 37, '2024-05-18', 1, NULL),
('SN0037734554', 37, '2024-05-18', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipper`
--

CREATE TABLE `shipper` (
  `MASHIPPER` int(11) NOT NULL,
  `TEN` varchar(100) DEFAULT NULL,
  `DIACHI` varchar(200) DEFAULT NULL,
  `SDT` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shipper`
--

INSERT INTO `shipper` (`MASHIPPER`, `TEN`, `DIACHI`, `SDT`, `EMAIL`, `TRANGTHAI`) VALUES
(1, 'Nguyễn Minh Kiệt', 'p15 q.Tân Bình', '0987 654 321', 'nguyenminhkiet@gmail.com', 1),
(2, 'Nguyễn Hoàng Huy', 'q.Gò Vấp', '0905 123 456', 'huy@gmail.com', 0),
(3, 'Minh Quân', 'q.8', '0973 456 789', 'quan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` int(11) NOT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `TENDN` varchar(50) NOT NULL,
  `MATKHAU` varchar(200) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MATK`, `NGAYTAO`, `TENDN`, `MATKHAU`, `TRANGTHAI`) VALUES
(1, '2024-01-04', 'admin', '999999', 1),
(2, '2024-01-04', 'kh1234', 'kh1234', 1),
(3, '2024-01-04', 'ql1234', 'ql1234', 1),
(4, '2024-04-29', 'de123', '123', 1),
(5, '2024-04-29', '123', '111', 1),
(6, '2024-05-08', 'congde', '123', 1),
(7, '2024-05-15', 'de98', '999999', 1),
(8, '2024-05-15', 'admin2', '999999', 1),
(9, '2024-05-15', 'admin3', '999999', 1),
(10, '2024-05-16', 'admin9999', '999999', 1),
(11, '2024-05-17', 'de1234', '999999', 1);

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
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`MACTGH`),
  ADD KEY `MAGH` (`MAGH`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MAHD`,`MASERI`),
  ADD KEY `MASERI` (`MASERI`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`MAKM`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD KEY `MAPN` (`MAPN`),
  ADD KEY `MANCC` (`MANCC`),
  ADD KEY `MASP` (`MASP`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`);

--
-- Chỉ mục cho bảng `diachidathang`
--
ALTER TABLE `diachidathang`
  ADD KEY `MAHD` (`MAHD`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MAGH`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MASHIPPER` (`MASHIPPER`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD KEY `MATK` (`MATK`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MAKM`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `motanhomquyen`
--
ALTER TABLE `motanhomquyen`
  ADD KEY `MANHOMQUYEN` (`MANHOMQUYEN`);

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
  ADD PRIMARY KEY (`MASP`,`MALOAISP`),
  ADD KEY `MALOAISP` (`MALOAISP`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MANHOMQUYEN`,`MAQUYEN`),
  ADD KEY `MAQUYEN` (`MAQUYEN`);

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
  ADD PRIMARY KEY (`MAPN`),
  ADD KEY `MANV` (`MANV`);

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
  ADD KEY `MANCC` (`MANCC`);

--
-- Chỉ mục cho bảng `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`MASERI`,`MASP`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `MABAOHANH` (`MABAOHANH`);

--
-- Chỉ mục cho bảng `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`MASHIPPER`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`,`TENDN`);

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
-- AUTO_INCREMENT cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `MACTGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MAGH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MAKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MANCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MANV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  MODIFY `MALOAISP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MAPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `MAQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `shipper`
--
ALTER TABLE `shipper`
  MODIFY `MASHIPPER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `baohanh_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`MAGH`) REFERENCES `giohang` (`MAGH`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MASERI`) REFERENCES `serial` (`MASERI`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `chitietsanpham` (`MASP`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`);

--
-- Các ràng buộc cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_1` FOREIGN KEY (`MAKM`) REFERENCES `khuyenmai` (`MAKM`);

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
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`);

--
-- Các ràng buộc cho bảng `diachidathang`
--
ALTER TABLE `diachidathang`
  ADD CONSTRAINT `diachidathang_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MASHIPPER`) REFERENCES `shipper` (`MASHIPPER`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  ADD CONSTRAINT `khuyenmai_ibfk_2` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Các ràng buộc cho bảng `motanhomquyen`
--
ALTER TABLE `motanhomquyen`
  ADD CONSTRAINT `motanhomquyen_ibfk_1` FOREIGN KEY (`MANHOMQUYEN`) REFERENCES `nhomquyen` (`MANHOMQUYEN`);

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
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`);

--
-- Các ràng buộc cho bảng `serial`
--
ALTER TABLE `serial`
  ADD CONSTRAINT `serial_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `chitietsanpham` (`MASP`),
  ADD CONSTRAINT `serial_ibfk_2` FOREIGN KEY (`MABAOHANH`) REFERENCES `baohanh` (`MABAOHANH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
