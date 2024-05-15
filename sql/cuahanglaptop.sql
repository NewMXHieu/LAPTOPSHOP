-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 14, 2024 lúc 08:34 PM
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
(1, 1, 'SN0001299525'),
(1, 1, 'SN0001658558'),
(1, 3, 'SN0003303775');

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
  `GIATIEN` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MASP`, `TENSP`, `CPU`, `SCREEN`, `RAM`, `VGA`, `STORAGE`, `OS`, `PIN`, `WEIGHT`, `MOTA`, `MATHUONGHIEU`, `MAU`, `GIATIEN`) VALUES
(1, 'Laptop HP Pavilion 14-dv2075TU (7C0W2PA) (i5-1235U) (Bạc)', 'Intel Core i5-1235U', '14\" IPS (1920 x 1080)', '2 x 4GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.4kg', 'Laptop HP Pavilion 14-dv2075TU đã lâu đã trở thành một lựa chọn hàng đầu cho người dùng có nhu cầu văn phòng, doanh nghiệp và học sinh - sinh viên. Với thương hiệu đáng tin cậy của HP và chế độ bảo hành 12 tháng, model HP của chiếc laptop này mang đến sự an tâm và tin cậy cho người dùng. Với cấu hình mạnh mẽ và tính năng đáng chú ý, Laptop HP Pavilion đảm bảo hiệu suất ổn định và trải nghiệm tuyệt vời. Hãy khám phá chi tiết về Laptop HP Pavilion để hiểu rõ hơn về những lí do vì sao nó xứng đáng trở thành người bạn đồng hành tin cậy của bạn.', 6, 'Bạc', 19690000.00),
(2, 'Laptop HP 15s-fq5144TU (7C0R8PA) (i7-1255U) (Bạc)', 'Intel Core i7-1255U', '15.6&amp;quot; IPS (1920 x 1080)', '2 x 8GB DDR4 3200MHz', 'Onboard Intel Iris Xe Graphics', '512GB SSD M.2 NVMe /', 'Windows 11 Home SL', '3 cell 41 Wh Pin liền', '1.7kg', 'HP 15s-fq5144TU (7C0R8PA) (i7-1255U) là một chiếc laptop tầm trung được thiết kế dành cho người dùng văn phòng và học sinh, sinh viên. Máy sở hữu cấu hình mạnh mẽ với bộ vi xử lý Intel Core i7 thế hệ thứ 12, RAM 16GB, ổ cứng SSD 512GB và màn hình Full HD 15.6 inch.', 6, 'BẠC', 24990000.00),
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
(19, 'Laptop ASUS Gaming ROG Zephyrus G14 GA402NJ-L4056W', 'AMD Ryzen 7 7735HS (8 lõi / 16 luồng, 16MB L3 cache, up to 4.7 GHz max boost)', '14 inches, 1920 x 1200 pixels (WUXGA), 144Hz', '8GB DDR5 Onboard\r\n8GB DDR5-4800 SO-DIMM (có thể tháo ra nâng cấp tối đa 24GB)', 'NVIDIA GeForce RTX 3050 6GB GDDR6', '512GB PCIe 4.0 NVMe M.2 SSD (1 khe SSD M.2 trống nâng cấp tối đa đến 1TB)', 'Windows 11 Home', '76WHrs, 4S1P, 4-cell Li-ion', '1.72 Kg', 'Laptop Asus Gaming ROG Zephyrus G14 GA402NJ-L4056W nổi bật với kích thước thon gọn đi kèm với hiệu suất hoạt động mạnh mẽ. Cấu hình laptop Asus gaming này được trang bị con chip thế hệ mới của nhà AMD cùng dung lượng bộ nhớ vượt trội giúp xử lý mượt mà mọi tác vụ chiến game.', 3, 'Xám', 30490000.00);

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
(1, 2, 1, NULL, '2024-04-02', 0);

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
(2, 'Hồ Công Đệ', '0000-00-00', '', '', 4, ''),
(3, 'Hồ Công Đệ', '0000-00-00', '', '', 5, ''),
(4, 'Hồ Công Đệ', '0000-00-00', '', '', 9, '');

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
(3, 'Hồ Công Đệ', '2024-05-16', '821038021', 'Bình Thuận', 6, 'Congde@gmail.com', 'QUẢN LÝ');

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
(10, 3);

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
(3, 2),
(6, 2),
(5, 4),
(2, 5),
(4, 5),
(9, 5);

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
(1, 'HP_1.PNG', 2, 6, 1),
(2, 'HP_2.PNG', 1, 6, 1),
(3, 'ACER_1.PNG', 3, 1, 1),
(4, 'APPLE_1.PNG', 4, 2, 1),
(5, 'ASUS_1.PNG', 1, 3, 1),
(6, 'DELL_1.PNG', 1, 4, 1),
(7, 'GIGABYTE_1.PNG', 3, 5, 1),
(8, 'LENOVO_1.PNG', 1, 8, 1),
(9, 'MSI_1.PNG', 1, 9, 1),
(10, 'MSI_2.PNG', 1, 9, 1),
(11, 'LG_1.PNG', 1, 7, 1),
(12, 'HP_3.PNG', 1, 6, 1),
(13, 'HP_4.PNG', 1, 6, 1),
(14, 'ACER_2.PNG', 1, 1, 1),
(15, 'APPLE_2.PNG', 1, 2, 1),
(16, 'DELL_2.PNG', 1, 4, 1),
(17, 'ASUS_2.PNG', 1, 3, 1),
(18, 'MSI_3.PNG', 1, 9, 1),
(19, 'ASUS_2.PNG', 1, 3, 1);

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
('SN0001299525', 1, '2024-04-05', 6, 1),
('SN0001658558', 1, '2024-04-08', 6, 1),
('SN0002326888', 2, '2024-02-08', 6, 1),
('SN0002455714', 2, '2024-01-08', 6, 1),
('SN0003303775', 3, '2024-02-08', 1, 1),
('SN0003323998', 3, '2024-01-08', 1, 1),
('SN0003742888', 3, '2024-03-08', 1, 1),
('SN0004472365', 4, '2024-04-08', 2, 1),
('SN0004556320', 4, '2024-05-08', 2, 1),
('SN0004844999', 4, '2024-06-08', 2, 1),
('SN0004989745', 4, '2024-07-08', 2, 1),
('SN0005754392', 5, '2024-08-08', 3, 1),
('SN0006272854', 6, '2024-09-08', 4, 1),
('SN0007010801', 7, '2024-10-08', 5, 1),
('SN0007089558', 7, '2024-11-08', 5, 1),
('SN0007271982', 7, '2024-12-08', 5, 1),
('SN0008268575', 8, '2024-02-01', 8, 1),
('SN0009331260', 9, '2024-04-02', 9, 1),
('SN0010718230', 10, '2024-04-03', 9, 1),
('SN0011969387', 11, '2024-04-04', 7, 1),
('SN0012328276', 12, '2024-04-05', 6, 1),
('SN0013376448', 13, '2024-04-06', 6, 1),
('SN0014305584', 14, '2024-04-07', 1, 1),
('SN0015614933', 15, '2024-04-08', 2, 1),
('SN0016288012', 16, '2024-04-10', 4, 1),
('SN0017036595', 17, '2024-04-11', 3, 1),
('SN0018448099', 18, '2024-04-12', 9, 1),
('SN0019451079', 19, '2024-04-13', 3, 1);

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
(9, '2024-05-13', 'deho123', '123', 1);

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
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MAKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MANCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MANV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `MAQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `shipper`
--
ALTER TABLE `shipper`
  MODIFY `MASHIPPER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
