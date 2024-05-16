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
-- Database: `cuahanglaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `baohanh`
--

CREATE TABLE `baohanh` (
  `MABAOHANH` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `DONVIBAOHANH` varchar(100) DEFAULT NULL,
  `THOIHAN` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baohanh`
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
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `ID` int(11) NOT NULL,
  `MAGH` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`ID`, `MAGH`, `MASP`, `SOLUONG`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAHD` int(11) NOT NULL,
  `MASP` int(11) DEFAULT NULL,
  `MASERI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MAHD`, `MASP`, `MASERI`) VALUES
(1, 1, 'SN0001299525'),
(1, 1, 'SN0001658558'),
(1, 3, 'SN0003303775');

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MAKM` int(11) NOT NULL,
  `NGAYBATDAU` date DEFAULT NULL,
  `NGAYKETTHUC` date DEFAULT NULL,
  `GIAMGIA` decimal(15,2) DEFAULT NULL,
  `QUATANG` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietkhuyemai`
--

INSERT INTO `chitietkhuyenmai` (`MAKM`, `NGAYBATDAU`, `NGAYKETTHUC`, `GIAMGIA`, `QUATANG`) VALUES
(1, '2024-05-08', '2024-05-23', 10.00, 'Giảm ngay 10% giá trị sản phẩm nếu có kèm theo mã giảm giá'),
(2, '2024-05-08', '2024-05-24', NULL, 'Giao hàng nhanh trong vòng 1 ngày kể từ khi đặt hàng'),
(3, '2024-05-15', '2024-05-15', NULL, 'Tặng thêm 1 balo nếu có giá trị hóa đơn trên 1 triệu');

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MAPN` int(11) DEFAULT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `MASP` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieunhap`
--

INSERT INTO `chitietphieunhap` (`MAPN`, `MANCC`, `MASP`, `SOLUONG`) VALUES
(1, 6, 1, 2),
(1, 6, 2, 1),
(2, 1, 3, 1),
(3, 9, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
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
-- Dumping data for table `chitietsanpham`
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
(19, 'Laptop ASUS Gaming ROG Zephyrus G14 GA402NJ-L4056W', 'AMD Ryzen 7 7735HS (8 lõi / 16 luồng, 16MB L3 cache, up to 4.7 GHz max boost)', '14 inches, 1920 x 1200 pixels (WUXGA), 144Hz', '8GB DDR5 Onboard\r\n8GB DDR5-4800 SO-DIMM (có thể tháo ra nâng cấp tối đa 24GB)', 'NVIDIA GeForce RTX 3050 6GB GDDR6', '512GB PCIe 4.0 NVMe M.2 SSD (1 khe SSD M.2 trống nâng cấp tối đa đến 1TB)', 'Windows 11 Home', '76WHrs, 4S1P, 4-cell Li-ion', '1.72 Kg', 'Laptop Asus Gaming ROG Zephyrus G14 GA402NJ-L4056W nổi bật với kích thước thon gọn đi kèm với hiệu suất hoạt động mạnh mẽ. Cấu hình laptop Asus gaming này được trang bị con chip thế hệ mới của nhà AMD cùng dung lượng bộ nhớ vượt trội giúp xử lý mượt mà mọi tác vụ chiến game.', 3, 'Xám', 30490000.00),
(20, 'Laptop ACER Gaming Nitro V ANV15-51-53DM', 'Intel Core i5-13420H ( 2.1 GHz - 4.6 GHz / 12MB / 8 nhân, 12 luồng )', '15.6" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , HD webcam', '2 x 8GB DDR5 5200MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 3050 6GB GDDR6 / Intel Iris Xe Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home SL', '4 cell 54 Wh , Pin liền', '2.1 kg', 'Acer Nitro V ANV15 51 53DM là sản phẩm laptop chuyên game siêu cháy với hiệu năng cực kỳ mạnh mẽ và thiết kế không kém phần hầm hố. ', 1, 'Đen', 23990000.00),
(21, 'Laptop Acer Predator Helios Neo PHN16-71-53M7', 'Intel Core i5-13500HX ( 2.5 GHz - 4.7 GHz / 24MB / 14 nhân, 20 luồng )', '16" ( 1920 x 1200 ) WUXGA IPS 165Hz , HD webcam', '2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 4060 8GB GDDR6 / Intel UHD Graphics 710', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 90 Wh , Pin liền', '2.6 kg', 'Laptop Acer Predator Helios Neo 16 PHN16 71 53M7 được ra đời như một biểu tượng laptop gaming mạnh mẽ của nhà Acer. Hứa hẹn sẽ mang lại nhiều trải nghiệm thú vị cho các game thủ trên chặng đường sắp tới. Cùng GEARVN tìm hiểu đánh giá về sản phẩm này nhé!', 1, 'Đen', 35990000.00),
(22, 'Laptop Acer Nitro 5 AN515-58-5193', 'Intel Core i5-12450H ( 2.0 GHz - 4.4 GHz / 18MB / 8 nhân, 12 luồng )', '15.6" ( 1920 x 1080 ) Full HD IPS 144Hz , HD webcam', '2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 4050 6GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 57 Wh , Pin liền', '2.5 kg', 'Laptop Acer Nitro 5 AN515-58-5193 là sự kết hợp tinh tế giữa hiệu suất và thiết kế đẳng cấp, sang trọng. Đặc biệt  RTX 4050 6GB GDDR6 hiệu suất đồ họa vượt trội cộng với RAM 16GB chiếc laptop sẵn sàng đáp ứng mọi nhu cầu giải trí, thiết kế đồ họa hay công việc đa nhiệm một cách dễ dàng, nhanh chóng.', 1, 'Đen', 25990000.00),
(23, 'Laptop Acer Nitro 5 Tiger AN515-58-52SP', 'Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )', '15.6" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , HD webcam', '1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 32GB )', 'RTX 3050 4GB GDDR6 / Intel UHD Graphics', '512GB SSD M.2 NVMe', 'Windows 11 Home', '4 cell 57 Wh', '2.5 kg', 'Laptop ACER Nitro 5 AN515 -58 -52SP NH.QFHSV.001 được ACER cho ra mắt với vẻ ngoài thu hút hơn bởi thiết kế đậm chất gaming, các cạnh được vát theo khối hình học đầy mạnh mẽ. Đối với những ai là fan của nhà Acer đang muốn tìm hiểu về những dòng laptop Acer gaming Nitro 5 Tiger 2022 mới nhất thì đây sẽ cỗ máy với bộ vi xử lý Intel tuyệt vời nhất dành cho bạn.', 1, 'Đen', 21490000.00),
(24, 'MacBook Air M3 13 inch', 'Apple M3 ( 8-Core CPU / 8-Core GPU )', '13.6" ( 2560 x 1664 ) | IPSFHD webcam', '8GB', 'Apple GPU (8-core)', '256GB SSD', 'macOS', 'Pin lithium-polymer 52,6 Wh', '1.24 kg | 21.5 x 30.41 x 1.13 cm','MacBook Air M3 13 inch (8GB/256GB SSD) là phiên bản mới nhất của dòng MacBook Air nổi tiếng từ Apple. Máy được trang bị chip M3 mạnh mẽ, màn hình Liquid Retina sắc nét, thời lượng pin ấn tượng cùng thiết kế mỏng nhẹ.. Đây là lựa chọn hoàn hảo cho những ai đang tìm kiếm một chiếc laptop di động, hiệu năng cao để phục vụ cho công việc, học tập và giải trí. Hiện những dòng MacBook đều đang được Phong Vũ phân phối chính hãng từ Apple với mức giá cực kỳ tốt, liên hệ chúng tôi ngay để được tư vấn tận tình nhất!', 2, 'Space Grey', 27490000.00),
(25, 'MacBook Pro M2 Pro 2023 16 inch', 'Apple M2 Pro ( 12-Core CPU / 19-Core GPU )', '16.2" ( 3456 x 2234 ) | Liquid Retina XDRFHD webcam', '16GB', 'Apple M2 Pro chip with 12-core CPU and 19-core GPU, 16-core Neural Engine', '512GB SSD', 'macOs', '100 Wh', '2.1 kg | 35.57 x 24.81 x 1.68 cm', 'MacBook Pro M2 Pro 2023 16 inch (16GB/512GB SSD) là một chiếc máy tính xách tay mạnh mẽ được Apple ra mắt vào năm 2023. MacBook Pro M2 Pro được trang bị chip M2 Pro mạnh mẽ mang lại hiệu năng vượt trội so với các thế hệ trước. Bên cạnh đó, máy cũng có màn hình Liquid Retina XDR 16 inch tuyệt đẹp, bàn phím Magic Keyboard thoải mái và thời lượng pin dài. Hiện sản phẩm đang được Phong Vũ phân phối chính hãng với mức giá cực kỳ tốt, liên hệ Phong Vũ ngay để được tư vấn tận tình nhất.', 2, 'Space Grey', 48990000.00),
(26, 'Laptop MacBook Air 13.6 inch', 'Apple M2 ( 8-Core CPU / 8-Core GPU )', '13.6" ( 2560 x 1664 ) | Liquid RetinaFHD webcam', '8GB', 'Apple M2 chip with 8-core CPU and 8-core GPU', '256GB SSD', 'MacOS', '52.6-watt‑hour lithium‑polymer battery', '1.3 kg | 30.41 x 21.5 x 1.13 cm', 'MacBook Air luôn là dòng sản phẩm tiêu biểu của Apple được rất nhiều người dùng lựa chọn. Trong đó, MacBook Air M2 2022 13 inch (8GB/256GB SSD) nổi trội với một mức giá cực kỳ tốt bên cạnh đó là có cấu hình mạnh mẽ và ngoại hình sang trọng.', 2, 'Space Grey', 24390000.00),
(27, 'MacBook Pro M3 Pro 2023 14 inch', 'Apple M3 Pro chip 11‑core CPU', '14" ( 3024 x 1964 ) | Liquid Retina XDR FHD webcam', '18GB', 'onboard', '512GB SSD', 'MacOS', '72 Wh', '1.6 kg | 31.26 x 22.12 x 1.55 cm', 'MacBook Pro M3 Pro 2023 14 inch (18GB/ 512GB SSD) là một chiếc laptop cao cấp của Apple, được trang bị chip M3 Pro mới nhất cùng với màn hình Liquid Retina XDR 14 inch, bàn phím Magic Keyboard và nhiều tính năng vượt trội khác. Máy là sự lựa chọn hoàn hảo cho những người dùng cần một chiếc máy tính xách tay mạnh mẽ và đa năng.', 2, 'Space Black', 49290000.00),
(28,'Laptop Gigabyte AORUS 15 9MF-E2VN583SH','Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )','15.6" ( 1920 x 1080 ) Full HD IPS 360Hz , không cảm ứng , FHD webcam','1 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','RTX 4050 6GB GDDR6 / Intel Iris Xe Graphics','512GB SSD M.2 NVMe','Windows 11 Home SL','99 Wh , Pin liền','2.4 kg','Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5,'Đen', 28690000.00),
(29,'Laptop GIGABYTE G5 KF-E3PH333SH','Intel Core i5-12500H ( 2.5 GHz - 4.5 GHz / 18MB / 12 nhân, 16 luồng )','15.6" ( 1920 x 1080 ) Full HD IPS 144Hz , HD webcam','1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','RTX 4060 8GB GDDR6 / Intel Iris Xe Graphics','512GB SSD M.2 NVMe','Windows 11 Home SL','54 Wh , Pin liền','1.9 kg','Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5,'Đen', 24690000.00),
(30,'Laptop Gigabyte AORUS 5 SE4-73VN313SH','Intel Core i7-12700H ( 2.3 GHz - 4.7GHz / 24MB / 14 nhân, 20 luồng )','15.6" ( 1920 x 1080 ) Full HD IPS 240Hz , HD webcam','2 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','RTX 3070 8GB GDDR6 / Intel Iris Xe Graphics','512GB SSD M.2 NVMe','Windows 11 Home SL','99 Wh , Pin liền','2.4 kg','Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5,'Đen', 39190000.00),
(31,'Laptop Gigabyte G6 KF-H3VN853SH','Intel Core i7-13620H ( 2.4 GHz - 4.9 GHz / 24MB / 10 nhân, 16 luồng )','16" ( 1920 x 1080 ) Full HD IPS 165Hz , không cảm ứng , HD webcam','2 x 8GB DDR5 4800MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','RTX 4060 8GB GDDR6 / Intel UHD Graphics 770','512GB SSD M.2 NVMe','Windows 11 Home SL','54 Wh , Pin liền','2.3 kg','Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5,'Đen', 28290000.00),
(32,'Laptop Gigabyte A5 K1-AVN1030SB','AMD Ryzen 5 5600H ( 3.3 GHz - 4.2 GHz / 16MB / 6 nhân, 12 luồng )','15.6" ( 1920 x 1080 ) Full HD IPS 144Hz , không cảm ứng , Màn hình chống lóa , HD webcam','1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','RTX 3060 6GB GDDR6 / AMD Radeon Graphics','512GB SSD M.2 NVMe','Windows 11 Home SL','49 Wh , Pin rời','2.2 kg','Laptop GIGABYTE, một trong những thương hiệu hàng đầu trong lĩnh vực sản xuất laptop chơi game và máy tính cao cấp, đã cho ra mắt dòng sản phẩm Laptop Gigabyte AORUS 15 9MF-E2VN583SH với sức mạnh và hiệu suất vượt trội.', 5,'Đen', 20690000.00),
(33,'Laptop LG Gram 2023 14T90R-G.AH55A5','Intel Core i5-1340P ( 1.9 GHz - 4.6 GHz / 18MB / 12 nhân, 16 luồng )','14" ( 1920 x 1200 ) WUXGA IPS cảm ứng , Màn hình chống lóa , FHD webcam','1 x 8GB DDR4 3200MHz ( 2 Khe cắm / Hỗ trợ tối đa 64GB )','Onboard Intel Iris Xe Graphics','512GB SSD M.2 NVMe','Windows 11 Home','72 Wh , Pin liền','1.3 kg','Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7,'Đen', 30590000.00),
(34,'Laptop Laptop LG Gram 14ZD90Q-G.AX31A5','Intel Core i3-1220P ( 1.5 GHz - 4.4GHz / 12MB / 10 nhân, 12 luồng )','14" ( 1920 x 1200 ) WUXGA IPS Màn hình chống lóa , FHD webcam','1 x 8GB LPDDR5 5200MHz','Onboard Intel UHD Graphics','256GB SSD M.2 NVMe','Free DOS','72 Wh , Pin liền','1 kg','Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7,'Đen', 21090000.00),
(35,'Laptop LG Gram 16ZD90Q-G.AX55A5','Intel Core i5-1240P ( 1.7 GHz - 4.4 GHz / 12MB / 12 nhân, 16 luồng )','16" ( 2560 x 1600 ) WQXGA IPS Màn hình chống lóa , FHD webcam','16GB LPDDR5 5200MHz','Onboard Intel Iris Xe Graphics','512GB SSD M.2 NVMe','Free DOS','80 Wh , Pin liền','1.2 kg','Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7,'Đen', 22990000.00),
(36,'Laptop LG Gram 17ZD90Q-G.AX73A5','Intel Core i7 1260P ( 2.1 GHz - 4.7 GHz / 18MB / 12 nhân, 16 luồng )','17" ( 2560 x 1600 ) WQXGA IPS Màn hình chống lóa , FHD webcam','16GB LPDDR5 5200MHz','Onboard Intel Iris Xe Graphics','256GB SSD M.2 NVMe','Free DOS','80 Wh , Pin liền','1.3 kg','Laptop LG Gram 2023 14T90R-G.AH55A5 2 trong 1 - bạn đồng hành đáng tin cậy cho dân văn phòng. Mẫu thiết kế laptop 2 trong 1 như Laptop LG Gram 2023 14T90R-G.AH55A5 không phải đến bây giờ mới xuất hiện nhưng có thể tối ưu cả 2 tính năng như nó thì không phải dễ kiếm trên thị trường.', 7,'Đen', 24990000.00);


-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
(1, 'Thành phố Long Xuyên', 1),
(2, 'Thành phố Châu Đốc', 1),
(3, 'Thị xã Tân Châu', 1),
(4, 'Huyện An Phú', 1),
(5, 'Huyện Châu Phú', 1),
(6, 'Huyện Châu Thành', 1),
(7, 'Huyện Chợ Mới', 1),
(8, 'Huyện Phú Tân', 1),
(9, 'Huyện Thoại Sơn', 1),
(10, 'Huyện Tịnh Biên', 1),
(11, 'Huyện Tri Tôn', 1),
(12, 'Thành phố Vũng Tàu', 2),
(13, 'Thị xã Bà Rịa', 2),
(14, 'Thị xã Phú Mỹ', 2),
(15, 'Huyện Châu Đức', 2),
(16, 'Huyện Côn Đảo', 2),
(17, 'Huyện Đất Đỏ', 2),
(18, 'Huyện Long Điền', 2),
(19, 'Huyện Tân Thành', 2),
(20, 'Huyện Xuyên Mộc', 2),
(21, 'Thành phố Bạc Liêu', 3),
(22, 'Huyện Đông Hải', 3),
(23, 'Huyện Giá Rai', 3),
(24, 'Huyện Hòa Bình', 3),
(25, 'Huyện Hồng Dân', 3),
(26, 'Huyện Phước Long', 3),
(27, 'Huyện Vĩnh Lợi', 3),
(28, 'Thị xã Bắc Kạn', 4),
(29, 'Huyện Ba Bể', 4),
(30, 'Huyện Bạch Thông', 4),
(31, 'Huyện Chợ Đồn', 4),
(32, 'Huyện Chợ Mới', 4),
(33, 'Huyện Na Rì', 4),
(34, 'Huyện Ngân Sơn', 4),
(35, 'Huyện Pác Nặm', 4),
(36, 'Thành phố Bắc Giang', 5),
(37, 'Huyện Hiệp Hòa', 5),
(38, 'Huyện Lạng Giang', 5),
(39, 'Huyện Lục Nam', 5),
(40, 'Huyện Lục Ngạn', 5),
(41, 'Huyện Sơn Động', 5),
(42, 'Huyện Tân Yên', 5),
(43, 'Huyện Việt Yên', 5),
(44, 'Huyện Yên Dũng', 5),
(45, 'Huyện Yên Thế', 5),
(46, 'Thành phố Bắc Ninh', 6),
(47, 'Thị xã Từ Sơn', 6),
(48, 'Huyện Gia Bình', 6),
(49, 'Huyện Lương Tài', 6),
(50, 'Huyện Quế Võ', 6),
(51, 'Huyện Thuận Thành', 6),
(52, 'Huyện Tiên Du', 6),
(53, 'Huyện Yên Phong', 6),
(54, 'Thành phố Bến Tre', 7),
(55, 'Huyện Ba Tri', 7),
(56, 'Huyện Bình Đại', 7),
(57, 'Huyện Châu Thành', 7),
(58, 'Huyện Chợ Lách', 7),
(59, 'Huyện Giồng Trôm', 7),
(60, 'Huyện Mỏ Cày Bắc', 7),
(61, 'Huyện Mỏ Cày Nam', 7),
(62, 'Huyện Thạnh Phú', 7),
(63, 'Thành phố Thủ Dầu Một', 8),
(64, 'Thị xã Bến Cát', 8),
(65, 'Thị xã Tân Uyên', 8),
(66, 'Huyện Bắc Tân Uyên', 8),
(67, 'Huyện Dầu Tiếng', 8),
(68, 'Huyện Dĩ An', 8),
(69, 'Huyện Phú Giáo', 8),
(70, 'Huyện Tân Uyên', 8),
(71, 'Huyện Thuận An', 8),
(72, 'Thành phố Quy Nhơn', 9),
(73, 'Huyện An Lão', 9),
(74, 'Huyện An Nhơn', 9),
(75, 'Huyện Hoài n', 9),
(76, 'Huyện Hoài Nhơn', 9),
(77, 'Huyện Phù Cát', 9),
(78, 'Huyện Phù Mỹ', 9),
(79, 'Huyện Tây Sơn', 9),
(80, 'Huyện Tuy Phước', 9),
(81, 'Huyện Vân Canh', 9),
(82, 'Huyện Vĩnh Thạnh', 9),
(83, 'Thị xã Đồng Xoài', 10),
(84, 'Thị xã Bình Long', 10),
(85, 'Thị xã Phước Long', 10),
(86, 'Huyện Bù Đăng', 10),
(87, 'Huyện Bù Đốp', 10),
(88, 'Huyện Bù Gia Mập', 10),
(89, 'Huyện Chơn Thành', 10),
(90, 'Huyện Đồng Phú', 10),
(91, 'Huyện Hớn Quản', 10),
(92, 'Huyện Lộc Ninh', 10),
(93, 'Huyện Phú Riềng', 10),
(94, 'Thành phố Phan Thiết', 11),
(95, 'Thị xã La Gi', 11),
(96, 'Huyện Bắc Bình', 11),
(97, 'Huyện Đảo Phú Quý', 11),
(98, 'Huyện Đức Linh', 11),
(99, 'Huyện Hàm Tân', 11),
(100, 'Huyện Hàm Thuận Bắc', 11),
(101, 'Huyện Hàm Thuận Nam', 11),
(102, 'Huyện Tánh Linh', 11),
(103, 'Huyện Tuy Phong', 11),
(104, 'Thành phố Cà Mau', 12),
(105, 'Huyện Cái Nước', 12),
(106, 'Huyện Đầm Dơi', 12),
(107, 'Huyện Năm Căn', 12),
(108, 'Huyện Ngọc Hiển', 12),
(109, 'Huyện Phú Tân', 12),
(110, 'Huyện Thới Bình', 12),
(111, 'Huyện Trần Văn Thời', 12),
(112, 'Huyện U Minh', 12),
(113, 'Huyện Tuy Phong', 12),
(114, 'Thị xã Cao Bằng', 13),
(115, 'Huyện Bảo Lạc', 13),
(116, 'Huyện Bảo Lâm', 13),
(117, 'Huyện Hạ Lang', 13),
(118, 'Huyện Hà Quảng', 13),
(119, 'Huyện Hòa An', 13),
(120, 'Huyện Nguyên Bình', 13),
(121, 'Huyện Phục Hòa', 13),
(122, 'Huyện Quảng Uyên', 13),
(123, 'Huyện Thạch An', 13),
(124, 'Huyện Thông Nông', 13),
(125, 'Huyện Trà Lĩnh', 13),
(126, 'Huyện Trùng Khánh', 13),
(127, 'Quận Bình Thủy', 14),
(128, 'Quận Cái Răng', 14),
(129, 'Quận Ninh Kiều', 14),
(130, 'Quận Ô Môn', 14),
(131, 'Quận Thốt Nốt', 14),
(132, 'Huyện Thới Lai', 14),
(133, 'Huyện Cờ Đỏ', 14),
(134, 'Huyện Phong Điền', 14),
(135, 'Huyện Vĩnh Thạnh', 14),
(136, 'Quận Cẩm Lệ', 15),
(137, 'Quận Hải Châu', 15),
(138, 'Quận Liên Chiểu', 15),
(139, 'Quận Ngũ Hành Sơn', 15),
(140, 'Quận Sơn Trà', 15),
(141, 'Quận Thanh Khê', 15),
(142, 'Huyện Hòa Vang', 15),
(143, 'Huyện Hoàng Sa', 15),
(144, 'Thành phố Buôn Ma Thuột', 16),
(145, 'Thị xã Buôn Hồ', 16),
(146, 'Huyện Buôn Đôn', 16),
(147, 'Huyện Cư Kuin', 16),
(148, 'Huyện Cư M''gar', 16),
(149, 'Huyện Ea H''Leo', 16),
(150, 'Huyện Ea Kar', 16),
(151, 'Huyện Ea Súp', 16),
(152, 'Huyện Krông Ana', 16),
(153, 'Huyện Krông Bông', 16),
(154, 'Huyện Krông Buk', 16),
(155, 'Huyện Krông Năng', 16),
(156, 'Huyện Krông Pắc', 16),
(157, 'Huyện Lăk', 16),
(158, 'Huyện M''Đrăk', 16),
(159, 'Thị xã Gia Nghĩa', 17),
(160, 'Huyện Cư Jút', 17),
(161, 'Huyện Dăk GLong', 17),
(162, 'Huyện Dăk Mil', 17),
(163, 'Huyện Dăk R''Lấp', 17),
(164, 'Huyện Dăk Song', 17),
(165, 'Huyện Krông Nô', 17),
(166, 'Huyện Tuy Đức', 17),
(167, 'Thành phố Biên Hòa', 18),
(168, 'Thị xã Long Khánh', 18),
(169, 'Quận Tân Phú', 18),
(170, 'Huyện Cẩm Mỹ', 18),
(171, 'Huyện Định Quán', 18),
(172, 'Huyện Long Thành', 18),
(173, 'Huyện Nhơn Trạch', 18),
(174, 'Huyện Thống Nhất', 18),
(175, 'Huyện Trảng Bom', 18),
(176, 'Huyện Vĩnh Cửu', 18),
(177, 'Huyện Xuân Lộc', 18),
(178, 'Thành phố Cao Lãnh', 19),
(179, 'Thị xã Sa Đéc', 19),
(180, 'Thị xã Hồng Ngự', 19),
(181, 'Huyện Châu Thành', 19),
(182, 'Huyện Cao Lãnh', 19),
(183, 'Huyện Huyện Hồng Ngự', 19),
(184, 'Huyện Lai Vung', 19),
(185, 'Huyện Lấp Vò', 19),
(186, 'Huyện Tam Nông', 19),
(187, 'Huyện Tân Hồng', 19),
(188, 'Huyện Thanh Bình', 19),
(189, 'Huyện Tháp Mười', 19),
(190, 'Thành phố Điện Biên Phủ', 20),
(191, 'Thị xã Mường Lay', 20),
(192, 'Huyện Điện Biên', 20),
(193, 'Huyện Điện Biên Đông', 20),
(194, 'Huyện Mường Ảng', 20),
(195, 'Huyện Mường Chà', 20),
(196, 'Huyện Mường Nhé', 20),
(197, 'Huyện Nậm Pồ', 20),
(198, 'Huyện Tủa Chùa', 20),
(199, 'Huyện Tuần Giáo', 20),
(200, 'Thành Phố Pleiku', 21),
(201, 'Thị xã An Khê', 21),
(202, 'Thị xã AYun Pa', 21),
(203, 'Huyện Chư Păh', 21),
(204, 'Huyện Chư Pưh', 21),
(205, 'Huyện Chư Sê', 21),
(206, 'Huyện ChưPRông', 21),
(207, 'Huyện Đăk Đoa', 21),
(208, 'Huyện Đăk Pơ', 21),
(209, 'Huyện Đức Cơ', 21),
(210, 'Huyện Ia Grai', 21),
(211, 'Huyện Ia Pa', 21),
(212, 'Huyện KBang', 21),
(213, 'Huyện Kông Chro', 21),
(214, 'Huyện Krông Pa', 21),
(215, 'Huyện Mang Yang', 21),
(216, 'Huyện Phú Thiện', 21),
(217, 'Thành phố Hà Giang', 22),
(218, 'Huyện Bắc Mê', 22),
(219, 'Huyện Bắc Quang', 22),
(220, 'Huyện Đồng Văn', 22),
(221, 'Huyện Hoàng Su Phì', 22),
(222, 'Huyện Mèo Vạc', 22),
(223, 'Huyện Quản Bạ', 22),
(224, 'Huyện Quang Bình', 22),
(225, 'Huyện Vị Xuyên', 22),
(226, 'Huyện Xín Mần', 22),
(227, 'Huyện Yên Minh', 22),
(228, 'Thành phố Phủ Lý', 23),
(229, 'Huyện Bình Lục', 23),
(230, 'Huyện Duy Tiên', 23),
(231, 'Huyện Kim Bảng', 23),
(232, 'Huyện Lý Nhân', 23),
(233, 'Huyện Thanh Liêm', 23),
(234, 'Quận Ba Đình', 24),
(235, 'Huyện Ba Vì', 24),
(236, 'Quận Bắc Từ Liêm', 24),
(237, 'Quận Cầu Giấy', 24),
(238, 'Huyện Chương Mỹ', 24),
(239, 'Huyện Đan Phượng', 24),
(240, 'Huyện Đông Anh', 24),
(241, 'Quận Đống Đa', 24),
(242, 'Huyện Gia Lâm', 24),
(243, 'Quận Hà Đông', 24),
(244, 'Quận Hai Bà Trưng', 24),
(245, 'Huyện Hoài Đức', 24),
(246, 'Quận Hoàn Kiếm', 24),
(247, 'Quận Hoàng Mai', 24),
(248, 'Quận Long Biên', 24),
(249, 'Huyện Mê Linh', 24),
(250, 'Huyện Mỹ Đức', 24),
(251, 'Quận Nam Từ Liêm', 24),
(252, 'Huyện Phú Xuyên', 24),
(253, 'Huyện Phúc Thọ', 24),
(254, 'Huyện Quốc Oai', 24),
(255, 'Huyện Sóc Sơn', 24),
(256, 'Thị xã Sơn Tây', 24),
(257, 'Quận Tây Hồ', 24),
(258, 'Huyện Thạch Thất', 24),
(259, 'Huyện Thanh Oai', 24),
(260, 'Huyện Thanh Trì', 24),
(261, 'Quận Thanh Xuân', 24),
(262, 'Huyện Thường Tín', 24),
(263, 'Huyện Ứng Hòa', 24),
(264, 'Thành phố Hà Tĩnh', 25),
(265, 'Thị xã Hồng Lĩnh', 25),
(266, 'Thị xã Kỳ Anh', 25),
(267, 'Huyện Cẩm Xuyên', 25),
(268, 'Huyện Can Lộc', 25),
(269, 'Huyện Đức Thọ', 25),
(270, 'Huyện Hương Khê', 25),
(271, 'Huyện Hương Sơn', 25),
(272, 'Huyện Lộc Hà', 25),
(273, 'Huyện Nghi Xuân', 25),
(274, 'Huyện Thạch Hà', 25),
(275, 'Huyện Vũ Quang', 25),
(276, 'Thành phố Hải Dương', 26),
(277, 'Thị xã Chí Linh', 26),
(278, 'Huyện Bình Giang', 26),
(279, 'Huyện Cẩm Giàng', 26),
(280, 'Huyện Gia Lộc', 26),
(281, 'Huyện Kim Thành', 26),
(282, 'Huyện Kinh Môn', 26),
(283, 'Huyện Nam Sách', 26),
(284, 'Huyện Ninh Giang', 26),
(285, 'Huyện Thanh Hà', 26),
(286, 'Huyện Thanh Miện', 26),
(287, 'Huyện Tứ Kỳ', 26),
(288, 'Quận Đồ Sơn', 27),
(289, 'Quận Dương Kinh', 27),
(290, 'Quận Hải An', 27),
(291, 'Quận Hồng Bàng', 27),
(292, 'Quận Kiến An', 27),
(293, 'Quận Lê Chân', 27),
(294, 'Quận Ngô Quyền', 27),
(295, 'Huyện An Dương', 27),
(296, 'Huyện An Lão', 27),
(297, 'Huyện Bạch Long Vĩ', 27),
(298, 'Huyện Cát Hải', 27),
(299, 'Huyện Kiến Thụy', 27),
(300, 'Huyện Thủy Nguyên', 27),
(301, 'Huyện Tiên Lãng', 27),
(302, 'Huyện Vĩnh Bảo', 27),
(303, 'Thành phố Hòa Bình', 28),
(304, 'Huyện Cao Phong', 28),
(305, 'Huyện Đà Bắc', 28),
(306, 'Huyện Kim Bôi', 28),
(307, 'Huyện Kỳ Sơn', 28),
(308, 'Huyện Lạc Sơn', 28),
(309, 'Huyện Lạc Thủy', 28),
(310, 'Huyện Lương Sơn', 28),
(311, 'Huyện Mai Châu', 28),
(312, 'Huyện Tân Lạc', 28),
(313, 'Huyện Yên Thủy', 28),
(314, 'Thành phố Vị Thanh', 29),
(315, 'Thị xã Ngã Bảy', 29),
(316, 'Huyện Châu Thành', 29),
(317, 'Huyện Châu Thành A', 29),
(318, 'Huyện Long Mỹ', 29),
(319, 'Huyện Phụng Hiệp', 29),
(320, 'Huyện Vị Thủy', 29),
(321, 'Thành phố Hưng Yên', 30),
(322, 'Huyện n Thi', 30),
(323, 'Huyện Khoái Châu', 30),
(324, 'Huyện Kim Động', 30),
(325, 'Huyện Mỹ Hào', 30),
(326, 'Huyện Phù Cừ', 30),
(327, 'Huyện Tiên Lữ', 30),
(328, 'Huyện Văn Giang', 30),
(329, 'Huyện Văn Lâm', 30),
(330, 'Huyện Yên Mỹ', 30),
(331, 'Quận 1', 31),
(332, 'Quận 2', 31),
(333, 'Quận 3', 31),
(334, 'Quận 4', 31),
(335, 'Quận 5', 31),
(336, 'Quận 6', 31),
(337, 'Quận 7', 31),
(338, 'Quận 8', 31),
(339, 'Quận 9', 31),
(340, 'Quận 10', 31),
(341, 'Quận 11', 31),
(342, 'Quận 12', 31),
(343, 'Quận Bình Tân', 31),
(344, 'Quận Bình Thạnh', 31),
(345, 'Quận Gò Vấp', 31),
(346, 'Quận Phú Nhuận', 31),
(347, 'Quận Tân Bình', 31),
(348, 'Quận Tân Phú', 31),
(349, 'Quận Thủ Đức', 31),
(350, 'Huyện Bình Chánh', 31),
(351, 'Huyện Cần Giờ', 31),
(352, 'Huyện Củ Chi', 31),
(353, 'Huyện Hóc Môn', 31),
(354, 'Huyện Nhà Bè', 31),
(355, 'Thành phố Nha Trang', 32),
(356, 'Thị xã Cam Ranh', 32),
(357, 'Thị xã Ninh Hòa', 32),
(358, 'Huyện Cam Lâm', 32),
(359, 'Huyện Diên Khánh', 32),
(360, 'Huyện Khánh Sơn', 32),
(361, 'Huyện Khánh Vĩnh', 32),
(362, 'Huyện Trường Sa', 32),
(363, 'Huyện Vạn Ninh', 32),
(364, 'Thành phố Rạch Giá', 33),
(365, 'Thị xã Hà Tiên', 33),
(366, 'Huyện An Biên', 33),
(367, 'Huyện An Minh', 33),
(368, 'Huyện Châu Thành', 33),
(369, 'Huyện Giang Thành', 33),
(370, 'Huyện Giồng Riềng', 33),
(371, 'Huyện Gò Quao', 33),
(372, 'Huyện Hòn Đất', 33),
(373, 'Huyện Kiên Hải', 33),
(374, 'Huyện Kiên Lương', 33),
(375, 'Huyện Phú Quốc', 33),
(376, 'Huyện Tân Hiệp', 33),
(377, 'Huyện U minh Thượng', 33),
(378, 'Huyện Vĩnh Thuận', 33),
(379, 'Thành phố KonTum', 34),
(380, 'Huyện Đăk Glei', 34),
(381, 'Huyện Đăk Hà', 34),
(382, 'Huyện Đăk Tô', 34),
(383, 'Huyện Kon Plông', 34),
(384, 'Huyện Kon Rẫy', 34),
(385, 'Huyện Ngọc Hồi', 34),
(386, 'Huyện Sa Thầy', 34),
(387, 'Huyện Tu Mơ Rông', 34),
(388, 'Huyện Ia H''Drai', 34),
(389, 'Thị xã Lai Châu', 35),
(390, 'Huyện Mường Tè', 35),
(391, 'Huyện Nậm Nhùn', 35),
(392, 'Huyện Phong Thổ', 35),
(393, 'Huyện Sìn Hồ', 35),
(394, 'Huyện Tam Đường', 35),
(395, 'Huyện Tân Uyên', 35),
(396, 'Huyện Than Uyên', 35),
(397, 'Thành phố Lào Cai', 36),
(398, 'Huyện Bắc Hà', 36),
(399, 'Huyện Bảo Thắng', 36),
(400, 'Huyện Bảo Yên', 36),
(401, 'Huyện Bát Xát', 36),
(402, 'Huyện Mường Khương', 36),
(403, 'Huyện Sa Pa', 36),
(404, 'Huyện Văn Bàn', 36),
(405, 'Huyện Xi Ma Cai', 36),
(406, 'Thành phố Lạng Sơn', 37),
(407, 'Huyện Bắc Sơn', 37),
(408, 'Huyện Bình Gia', 37),
(409, 'Huyện Cao Lộc', 37),
(410, 'Huyện Chi Lăng', 37),
(411, 'Huyện Đình Lập', 37),
(412, 'Huyện Hữu Lũng', 37),
(413, 'Huyện Lộc Bình', 37),
(414, 'Huyện Tràng Định', 37),
(415, 'Huyện Văn Lãng', 37),
(416, 'Huyện Văn Quan', 37),
(417, 'Thành phố Bảo Lộc', 38),
(418, 'Thành phố Đà Lạt', 38),
(419, 'Huyện Bảo Lâm', 38),
(420, 'Huyện Cát Tiên', 38),
(421, 'Huyện Đạ Huoai', 38),
(422, 'Huyện Đạ Tẻh', 38),
(423, 'Huyện Đam Rông', 38),
(424, 'Huyện Di Linh', 38),
(425, 'Huyện Đơn Dương', 38),
(426, 'Huyện Đức Trọng', 38),
(427, 'Huyện Lạc Dương', 38),
(428, 'Huyện Lâm Hà', 38),
(429, 'Thành phố Tân An', 39),
(430, 'Thị xã Kiến Tường', 39),
(431, 'Huyện Bến Lức', 39),
(432, 'Huyện Cần Đước', 39),
(433, 'Huyện Cần Giuộc', 39),
(434, 'Huyện Châu Thành', 39),
(435, 'Huyện Đức Hòa', 39),
(436, 'Huyện Đức Huệ', 39),
(437, 'Huyện Mộc Hóa', 39),
(438, 'Huyện Tân Hưng', 39),
(439, 'Huyện Tân Thạnh', 39),
(440, 'Huyện Tân Trụ', 39),
(441, 'Huyện Thạnh Hóa', 39),
(442, 'Huyện Thủ Thừa', 39),
(443, 'Huyện Vĩnh Hưng', 39),
(444, 'Thành phố Nam Định', 40),
(445, 'Huyện Giao Thủy', 40),
(446, 'Huyện Hải Hậu', 40),
(447, 'Huyện Mỹ Lộc', 40),
(448, 'Huyện Nam Trực', 40),
(449, 'Huyện Nghĩa Hưng', 40),
(450, 'Huyện Trực Ninh', 40),
(451, 'Huyện Vụ Bản', 40),
(452, 'Huyện Xuân Trường', 40),
(453, 'Huyện Ý Yên', 40),
(454, 'Thành phố Vinh', 41),
(455, 'Thị xã Cửa Lò', 41),
(456, 'Thị xã Hoàng Mai', 41),
(457, 'Thị xã Thái Hòa', 41),
(458, 'Huyện Anh Sơn', 41),
(459, 'Huyện Con Cuông', 41),
(460, 'Huyện Diễn Châu', 41),
(461, 'Huyện Đô Lương', 41),
(462, 'Huyện Hưng Nguyên', 41),
(463, 'Huyện Kỳ Sơn', 41),
(464, 'Huyện Nam Đàn', 41),
(465, 'Huyện Nghi Lộc', 41),
(466, 'Huyện Nghĩa Đàn', 41),
(467, 'Huyện Quế Phong', 41),
(468, 'Huyện Quỳ Châu', 41),
(469, 'Huyện Quỳ Hợp', 41),
(470, 'Huyện Quỳnh Lưu', 41),
(471, 'Huyện Tân Kỳ', 41),
(472, 'Huyện Thanh Chương', 41),
(473, 'Huyện Tương Dương', 41),
(474, 'Huyện Yên Thành', 41),
(475, 'Thành phố Ninh Bình', 42),
(476, 'Thị xã Tam Điệp', 42),
(477, 'Huyện Gia Viễn', 42),
(478, 'Huyện Hoa Lư', 42),
(479, 'Huyện Kim Sơn', 42),
(480, 'Huyện Nho Quan', 42),
(481, 'Huyện Yên Khánh', 42),
(482, 'Huyện Yên Mô', 42),
(483, 'Thành phố Phan Rang - Tháp Chàm', 43),
(484, 'Huyện Bác Ái', 43),
(485, 'Huyện Ninh Hải', 43),
(486, 'Huyện Ninh Phước', 43),
(487, 'Huyện Ninh Sơn', 43),
(488, 'Huyện Thuận Bắc', 43),
(489, 'Huyện Thuận Nam', 43),
(490, 'Thành phố Việt Trì', 44),
(491, 'Thị xã Phú Thọ', 44),
(492, 'Huyện Cẩm Khê', 44),
(493, 'Huyện Đoan Hùng', 44),
(494, 'Huyện Hạ Hòa', 44),
(495, 'Huyện Lâm Thao', 44),
(496, 'Huyện Phù Ninh', 44),
(497, 'Huyện Tam Nông', 44),
(498, 'Huyện Tân Sơn', 44),
(499, 'Huyện Thanh Ba', 44),
(500, 'Huyện Thanh Sơn', 44),
(501, 'Huyện Thanh Thủy', 44),
(502, 'Huyện Yên Lập', 44),
(503, 'Thành phố Tuy Hòa', 45),
(504, 'Thị xã Sông Cầu', 45),
(505, 'Huyện Đông Hòa', 45),
(506, 'Huyện Đồng Xuân', 45),
(507, 'Huyện Phú Hòa', 45),
(508, 'Huyện Sơn Hòa', 45),
(509, 'Huyện Sông Hinh', 45),
(510, 'Huyện Tây Hòa', 45),
(511, 'Huyện Tuy An', 45),
(512, 'Thành phố Đồng Hới', 46),
(513, 'Thị xã Ba Đồn', 46),
(514, 'Huyện Bố Trạch', 46),
(515, 'Huyện Lệ Thủy', 46),
(516, 'Huyện Minh Hóa', 46),
(517, 'Huyện Quảng Ninh', 46),
(518, 'Huyện Quảng Trạch', 46),
(519, 'Huyện Tuyên Hóa', 46),
(520, 'Thành phố Hội An', 47),
(521, 'Thành phố Tam Kỳ', 47),
(522, 'Huyện Bắc Trà My', 47),
(523, 'Huyện Đại Lộc', 47),
(524, 'Huyện Điện Bàn', 47),
(525, 'Huyện Đông Giang', 47),
(526, 'Huyện Duy Xuyên', 47),
(527, 'Huyện Hiệp Đức', 47),
(528, 'Huyện Nam Giang', 47),
(529, 'Huyện Nam Trà My', 47),
(530, 'Huyện Nông Sơn', 47),
(531, 'Huyện Núi Thành', 47),
(532, 'Huyện Phú Ninh', 47),
(533, 'Huyện Phước Sơn', 47),
(534, 'Huyện Quế Sơn', 47),
(535, 'Huyện Tây Giang', 47),
(536, 'Huyện Thăng Bình', 47),
(537, 'Huyện Tiên Phước', 47),
(538, 'Thành phố Quảng Ngãi', 48),
(539, 'Huyện Ba Tơ', 48),
(540, 'Huyện Bình Sơn', 48),
(541, 'Huyện Đức Phổ', 48),
(542, 'Huyện Lý Sơn', 48),
(543, 'Huyện Minh Long', 48),
(544, 'Huyện Mộ Đức', 48),
(545, 'Huyện Nghĩa Hành', 48),
(546, 'Huyện Sơn Hà', 48),
(547, 'Huyện Sơn Tây', 48),
(548, 'Huyện Sơn Tịnh', 48),
(549, 'Huyện Tây Trà', 48),
(550, 'Huyện Trà Bồng', 48),
(551, 'Huyện Tư Nghĩa', 48),
(552, 'Thành phố Hạ Long', 49),
(553, 'Thành phố Móng Cái', 49),
(554, 'Thị xã Cẩm Phả', 49),
(555, 'Thị xã Uông Bí', 49),
(556, 'Huyện Ba Chẽ', 49),
(557, 'Huyện Bình Liêu', 49),
(558, 'Huyện Cô Tô', 49),
(559, 'Huyện Đầm Hà', 49),
(560, 'Huyện Đông Triều', 49),
(561, 'Huyện Hải Hà', 49),
(562, 'Huyện Hoành Bồ', 49),
(563, 'Huyện Quảng Yên', 49),
(564, 'Huyện Tiên Yên', 49),
(565, 'Huyện Vân Đồn', 49),
(566, 'Thành phố Đông Hà', 50),
(567, 'Thị xã Quảng Trị', 50),
(568, 'Huyện Cam Lộ', 50),
(569, 'Huyện Cồn Cỏ', 50),
(570, 'Huyện Đăk Rông', 50),
(571, 'Huyện Đảo Cồn Cỏ', 50),
(572, 'Huyện Gio Linh', 50),
(573, 'Huyện Hải Lăng', 50),
(574, 'Huyện Hướng Hóa', 50),
(575, 'Huyện Triệu Phong', 50),
(576, 'Huyện Vĩnh Linh', 50),
(577, 'Thành phố Sóc Trăng', 51),
(578, 'Huyện Châu Thành', 51),
(579, 'Huyện Cù Lao Dung', 51),
(580, 'Huyện Kế Sách', 51),
(581, 'Huyện Long Phú', 51),
(582, 'Huyện Mỹ Tú', 51),
(583, 'Huyện Mỹ Xuyên', 51),
(584, 'Huyện Ngã Năm', 51),
(585, 'Huyện Thạnh Trị', 51),
(586, 'Huyện Trần Đề', 51),
(587, 'Huyện Vĩnh Châu', 51),
(588, 'Thành phố Sơn La', 52),
(589, 'Huyện Bắc Yên', 52),
(590, 'Huyện Mai Sơn', 52),
(591, 'Huyện Mộc Châu', 52),
(592, 'Huyện Mường La', 52),
(593, 'Huyện Phù Yên', 52),
(594, 'Huyện Quỳnh Nhai', 52),
(595, 'Huyện Sông Mã', 52),
(596, 'Huyện Sốp Cộp', 52),
(597, 'Huyện Thuận Châu', 52),
(598, 'Huyện Vân Hồ', 52),
(599, 'Huyện Yên Châu', 52),
(600, 'Thành phố Tây Ninh', 53),
(601, 'Huyện Bến Cầu', 53),
(602, 'Huyện Châu Thành', 53),
(603, 'Huyện Dương Minh Châu', 53),
(604, 'Huyện Gò Dầu', 53),
(605, 'Huyện Hòa Thành', 53),
(606, 'Huyện Tân Biên', 53),
(607, 'Huyện Tân Châu', 53),
(608, 'Huyện Trảng Bàng', 53),
(609, 'Thành phố Thái Bình', 54),
(610, 'Huyện Đông Hưng', 54),
(611, 'Huyện Hưng Hà', 54),
(612, 'Huyện Kiến Xương', 54),
(613, 'Huyện Quỳnh Phụ', 54),
(614, 'Huyện Thái Thuỵ', 54),
(615, 'Huyện Tiền Hải', 54),
(616, 'Huyện Vũ Thư', 54),
(617, 'Thành phố Thái Nguyên', 55),
(618, 'Thị xã Sông Công', 55),
(619, 'Huyện Đại Từ', 55),
(620, 'Huyện Định Hóa', 55),
(621, 'Huyện Đồng Hỷ', 55),
(622, 'Huyện Phổ Yên', 55),
(623, 'Huyện Phú Bình', 55),
(624, 'Huyện Phú Lương', 55),
(625, 'Huyện Võ Nhai', 55),
(626, 'Thành phố Thanh Hóa', 56),
(627, 'Thị xã Bỉm Sơn', 56),
(628, 'Thị xã Sầm Sơn', 56),
(629, 'Huyện Bá Thước', 56),
(630, 'Huyện Cẩm Thủy', 56),
(631, 'Huyện Đông Sơn', 56),
(632, 'Huyện Hà Trung', 56),
(633, 'Huyện Hậu Lộc', 56),
(634, 'Huyện Hoằng Hóa', 56),
(635, 'Huyện Lang Chánh', 56),
(636, 'Huyện Mường Lát', 56),
(637, 'Huyện Nga Sơn', 56),
(638, 'Huyện Ngọc Lặc', 56),
(639, 'Huyện Như Thanh', 56),
(640, 'Huyện Như Xuân', 56),
(641, 'Huyện Nông Cống', 56),
(642, 'Huyện Quan Hóa', 56),
(643, 'Huyện Quan Sơn', 56),
(644, 'Huyện Quảng Xương', 56),
(645, 'Huyện Thạch Thành', 56),
(646, 'Huyện Thiệu Hóa', 56),
(647, 'Huyện Thọ Xuân', 56),
(648, 'Huyện Thường Xuân', 56),
(649, 'Huyện Tĩnh Gia', 56),
(650, 'Huyện Triệu Sơn', 56),
(651, 'Huyện Vĩnh Lộc', 56),
(652, 'Huyện Yên Định', 56),
(653, 'Thành phố Huế', 57),
(654, 'Thị xã Hương Thủy', 57),
(655, 'Huyện A Lưới', 57),
(656, 'Huyện Nam Đông', 57),
(657, 'Huyện Phong Điền', 57),
(658, 'Huyện Phú Lộc', 57),
(659, 'Huyện Phú Vang', 57),
(660, 'Huyện Quảng Điền', 57),
(661, 'Thành phố Mỹ Tho', 58),
(662, 'Thị xã Gò Công', 58),
(663, 'Thị xã Cai Lậy', 58),
(664, 'Huyện Cái Bè', 58),
(665, 'Huyện Châu Thành', 58),
(666, 'Huyện Chợ Gạo', 58),
(667, 'Huyện Gò Công Đông', 58),
(668, 'Huyện Gò Công Tây', 58),
(669, 'Huyện Tân Phú Đông', 58),
(670, 'Huyện Tân Phước', 58),
(671, 'Thành phố Trà Vinh', 59),
(672, 'Huyện Càng Long', 59),
(673, 'Huyện Cầu Kè', 59),
(674, 'Huyện Cầu Ngang', 59),
(675, 'Huyện Châu Thành', 59),
(676, 'Huyện Duyên Hải', 59),
(677, 'Huyện Tiểu Cần', 59),
(678, 'Huyện Trà Cú', 59),
(679, 'Thành phố Tuyên Quang', 60),
(680, 'Huyện Chiêm Hóa', 60),
(681, 'Huyện Hàm Yên', 60),
(682, 'Huyện Lâm Bình', 60),
(683, 'Huyện Na Hang', 60),
(684, 'Huyện Sơn Dương', 60),
(685, 'Huyện Yên Sơn', 60),
(686, 'Thành phố Vĩnh Long', 61),
(687, 'Quận Bình Tân', 61),
(688, 'Huyện Bình Minh', 61),
(689, 'Huyện Long Hồ', 61),
(690, 'Huyện Mang Thít', 61),
(691, 'Huyện Tam Bình', 61),
(692, 'Huyện Trà Ôn', 61),
(693, 'Huyện Vũng Liêm', 61),
(694, 'Thành phố Vĩnh Yên', 62),
(695, 'Thị xã Phúc Yên', 62),
(696, 'Huyện Bình Xuyên', 62),
(697, 'Huyện Lập Thạch', 62),
(698, 'Huyện Sông Lô', 62),
(699, 'Huyện Tam Đảo', 62),
(700, 'Huyện Tam Dương', 62),
(701, 'Huyện Vĩnh Tường', 62),
(702, 'Huyện Yên Lạc', 62),
(703, 'Thành phố Yên Bái', 63),
(704, 'Thị xã Nghĩa Lộ', 63),
(705, 'Huyện Lục Yên', 63),
(706, 'Huyện Mù Cang Chải', 63),
(707, 'Huyện Trạm Tấu', 63),
(708, 'Huyện Trấn Yên', 63),
(709, 'Huyện Văn Chấn', 63),
(710, 'Huyện Văn Yên', 63),
(711, 'Huyện Yên Bình', 63);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MAGH` int(11) NOT NULL,
  `MATK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MAGH`, `MATK`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
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
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `MANV`, `MASHIPPER`, `NGAYTAO`, `TRANGTHAI`) VALUES
(1, 2, 1, NULL, '2024-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
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
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TEN`, `NGAYSINH`, `SDT`, `DIACHI`, `MATK`, `EMAIL`) VALUES
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 2, 'nguyenminhkiet642002@gmail.com'),
(2, 'Hồ Công Đệ', '0000-00-00', '', '', 4, ''),
(3, 'Hồ Công Đệ', '0000-00-00', '', '', 5, ''),
(4, 'Hồ Công Đệ', '0000-00-00', '', '', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
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
-- Dumping data for table `nhacungcap`
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
-- Table structure for table `nhanvien`
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
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TEN`, `NGAYSINH`, `SDT`, `DIACHI`, `MATK`, `EMAIL`, `CHUCVU`) VALUES
(1, 'Nguyễn Minh Kiệt', '2002-04-06', '0932667135', 'B16 Phan Huy Ich, p.15, q.TB', 1, 'nguyenminhkiet642002@gmail.com', 'ADMIN'),
(2, 'Phạm Minh Tuấn', '1994-04-09', '0932667222', 'Võ Văn Ngân, q.Bình Tân', 3, 'phamminhtuan12091994@gmail.com', 'QUẢN LÝ'),
(3, 'Hồ Công Đệ', '2024-05-16', '821038021', 'Bình Thuận', 6, 'Congde@gmail.com', 'QUẢN LÝ');

-- --------------------------------------------------------

--
-- Table structure for table `nhomloaisanpham`
--

CREATE TABLE `nhomloaisanpham` (
  `MASP` int(11) NOT NULL,
  `MALOAISP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhomloaisanpham`
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
(11, 6),
(11, 5),
(12, 3),
(12, 2),
(12, 1),
(13, 5),
(13, 3),
(14, 2),
(14, 6),
(15, 1),
(16, 1),
(16, 3),
(17, 4),
(18, 5),
(19, 6),
(19, 3),
(20, 2),
(20, 6),
(20, 1),
(21, 1),
(21, 4),
(22, 4),
(23, 4),
(23, 5),
(24, 5),
(25, 5),
(25, 6),
(26, 6),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 3),
(30, 4),
(31, 5),
(31, 6),
(31, 2),
(32, 5),
(32, 6),
(32, 1),
(33, 2),
(33, 1),
(34, 1),
(35, 5),
(35, 2),
(36, 3),
(36, 4),
(36, 5);


-- --------------------------------------------------------

--
-- Table structure for table `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MANHOMQUYEN` int(11) NOT NULL,
  `MAQUYEN` int(11) NOT NULL,
  `TENNHOMQUYEN` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhomquyen`
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
-- Table structure for table `phanloaisanpham`
--

CREATE TABLE `phanloaisanpham` (
  `MALOAISP` int(11) NOT NULL,
  `TENLOAISP` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanloaisanpham`
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
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MATK` int(11) NOT NULL,
  `MANHOMQUYEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanquyen`
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
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MAPN` int(11) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `NGAYNHAP` date DEFAULT NULL,
  `TONGTIEN` decimal(15,2) DEFAULT NULL,
  `TRANGTHAI` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`MAPN`, `MANV`, `NGAYNHAP`, `TONGTIEN`, `TRANGTHAI`) VALUES
(1, 1, '2024-04-05', 62270000.00, '1'),
(2, 1, '2024-04-05', 15490000.00, '1'),
(3, 1, '2024-04-05', 30990000.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`) VALUES
(1, 'An Giang'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Bạc Liêu'),
(4, 'Bắc Kạn'),
(5, 'Bắc Giang'),
(6, 'Bắc Ninh'),
(7, 'Bến Tre'),
(8, 'Bình Dương'),
(9, 'Bình Định'),
(10, 'Bình Phước'),
(11, 'Bình Thuận'),
(12, 'Cà Mau'),
(13, 'Cao Bằng'),
(14, 'Cần Thơ'),
(15, 'Đà Nẵng'),
(16, 'Đắk Lắk'),
(17, 'Đắk Nông'),
(18, 'Đồng Nai'),
(19, 'Đồng Tháp'),
(20, 'Điện Biên'),
(21, 'Gia Lai'),
(22, 'Hà Giang'),
(23, 'Hà Nam'),
(24, 'Hà Nội'),
(25, 'Hà Tĩnh'),
(26, 'Hải Dương'),
(27, 'Hải Phòng'),
(28, 'Hòa Bình'),
(29, 'Hậu Giang'),
(30, 'Hưng Yên'),
(31, 'Thành phố Hồ Chí Minh'),
(32, 'Khánh Hòa'),
(33, 'Kiên Giang'),
(34, 'Kon Tum'),
(35, 'Lai Châu'),
(36, 'Lào Cai'),
(37, 'Lạng Sơn'),
(38, 'Lâm Đồng'),
(39, 'Long An'),
(40, 'Nam Định'),
(41, 'Nghệ An'),
(42, 'Ninh Bình'),
(43, 'Ninh Thuận'),
(44, 'Phú Thọ'),
(45, 'Phú Yên'),
(46, 'Quảng Bình'),
(47, 'Quảng Nam'),
(48, 'Quảng Ngãi'),
(49, 'Quảng Ninh'),
(50, 'Quảng Trị'),
(51, 'Sóc Trăng'),
(52, 'Sơn La'),
(53, 'Tây Ninh'),
(54, 'Thái Bình'),
(55, 'Thái Nguyên'),
(56, 'Thanh Hóa'),
(57, 'Thừa Thiên - Huế'),
(58, 'Tiền Giang'),
(59, 'Trà Vinh'),
(60, 'Tuyên Quang'),
(61, 'Vĩnh Long'),
(62, 'Vĩnh Phúc'),
(63, 'Yên Bái');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `MAQUYEN` int(11) NOT NULL,
  `TENQUYEN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quyen`
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
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `HINHSP` varchar(200) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `MANCC` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
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
(19, 'ASUS_2.PNG', 1, 3, 1),
(20, 'ACER_3.PNG', 1, 1, 1),
(21, 'ACER_4.PNG', 1, 1, 1),
(22, 'ACER_5.PNG', 1, 1, 1),
(23, 'ACER_6.PNG', 1, 1, 1),
(24, 'APPLE_3.PNG', 1, 2, 1),
(25, 'APPLE_4.PNG', 1, 2, 1),
(26, 'APPLE_5.PNG', 1, 2, 1),
(27, 'APPLE_6.PNG', 1, 2, 1),
(28,'GIGABYTE_2.PNG', 1, 5, 1),
(29,'GIGABYTE_3.PNG', 1, 5, 1),
(30,'GIGABYTE_4.PNG', 1, 5, 1),
(31,'GIGABYTE_5.PNG', 1, 5, 1),
(32,'GIGABYTE_6.PNG', 1, 5, 1),
(33,'LG_2.PNG', 10, 7, 1),
(34,'LG_3.PNG', 10, 7, 1),
(35,'LG_4.PNG', 10, 7, 1),
(36,'LG_5.PNG', 10, 7, 1);




-- --------------------------------------------------------

--
-- Table structure for table `serial`
--

CREATE TABLE `serial` (
  `MASERI` varchar(100) NOT NULL,
  `MASP` int(11) NOT NULL,
  `NGAYSANXUAT` date DEFAULT NULL,
  `MABAOHANH` int(11) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serial`
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
-- Table structure for table `shipper`
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
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`MASHIPPER`, `TEN`, `DIACHI`, `SDT`, `EMAIL`, `TRANGTHAI`) VALUES
(1, 'Nguyễn Minh Kiệt', 'p15 q.Tân Bình', '0987 654 321', 'nguyenminhkiet@gmail.com', 1),
(2, 'Nguyễn Hoàng Huy', 'q.Gò Vấp', '0905 123 456', 'huy@gmail.com', 0),
(3, 'Minh Quân', 'q.8', '0973 456 789', 'quan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MATK` int(11) NOT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `TENDN` varchar(50) NOT NULL,
  `MATKHAU` varchar(200) DEFAULT NULL,
  `TRANGTHAI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
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
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `TENTHUONGHIEU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuonghieu`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD PRIMARY KEY (`MABAOHANH`),
  ADD KEY `MANV` (`MANV`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MAGH` (`MAGH`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MAHD`,`MASERI`),
  ADD KEY `MASERI` (`MASERI`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`MAKM`);

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD KEY `MAPN` (`MAPN`),
  ADD KEY `MANCC` (`MANCC`),
  ADD KEY `MASP` (`MASP`);

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MAGH`),
  ADD KEY `MATK` (`MATK`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MASHIPPER` (`MASHIPPER`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `MANV` (`MANV`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`),
  ADD KEY `MATK` (`MATK`);

--
-- Indexes for table `khuyenmai`
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
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`),
  ADD KEY `MATK` (`MATK`);

--
-- Indexes for table `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  ADD PRIMARY KEY (`MASP`,`MALOAISP`),
  ADD KEY `MALOAISP` (`MALOAISP`);

--
-- Indexes for table `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MANHOMQUYEN`,`MAQUYEN`),
  ADD KEY `MAQUYEN` (`MAQUYEN`);

--
-- Indexes for table `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  ADD PRIMARY KEY (`MALOAISP`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MATK`),
  ADD KEY `MANHOMQUYEN` (`MANHOMQUYEN`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MAPN`),
  ADD KEY `MANV` (`MANV`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MAQUYEN`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`),
  ADD KEY `MANCC` (`MANCC`);

--
-- Indexes for table `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`MASERI`,`MASP`),
  ADD KEY `MASP` (`MASP`),
  ADD KEY `MABAOHANH` (`MABAOHANH`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`MASHIPPER`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MATK`,`TENDN`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MATHUONGHIEU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baohanh`
--
ALTER TABLE `baohanh`
  MODIFY `MABAOHANH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=712;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MAKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MANCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MANV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  MODIFY `MALOAISP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MAPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `MAQUYEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `MASHIPPER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MATHUONGHIEU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baohanh`
--
ALTER TABLE `baohanh`
  ADD CONSTRAINT `baohanh_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`MAGH`) REFERENCES `giohang` (`MAGH`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MASERI`) REFERENCES `serial` (`MASERI`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `chitietsanpham` (`MASP`),
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`);

--
-- Constraints for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `chitietkhuyenmai_ibfk_1` FOREIGN KEY (`MAKM`) REFERENCES `khuyenmai` (`MAKM`);

--
-- Constraints for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`MAPN`) REFERENCES `phieunhap` (`MAPN`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_3` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`),
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MASHIPPER`) REFERENCES `shipper` (`MASHIPPER`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`);

--
-- Constraints for table `khuyenmai`
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
-- Constraints for table `nhomloaisanpham`
--
ALTER TABLE `nhomloaisanpham`
  ADD CONSTRAINT `nhomloaisanpham_ibfk_1` FOREIGN KEY (`MALOAISP`) REFERENCES `phanloaisanpham` (`MALOAISP`),
  ADD CONSTRAINT `nhomloaisanpham_ibfk_2` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);

--
-- Constraints for table `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD CONSTRAINT `nhomquyen_ibfk_1` FOREIGN KEY (`MAQUYEN`) REFERENCES `quyen` (`MAQUYEN`);

--
-- Constraints for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_ibfk_1` FOREIGN KEY (`MATK`) REFERENCES `taikhoan` (`MATK`),
  ADD CONSTRAINT `phanquyen_ibfk_2` FOREIGN KEY (`MANHOMQUYEN`) REFERENCES `nhomquyen` (`MANHOMQUYEN`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MANCC`) REFERENCES `nhacungcap` (`MANCC`);

--
-- Constraints for table `serial`
--
ALTER TABLE `serial`
  ADD CONSTRAINT `serial_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `chitietsanpham` (`MASP`),
  ADD CONSTRAINT `serial_ibfk_2` FOREIGN KEY (`MABAOHANH`) REFERENCES `baohanh` (`MABAOHANH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
