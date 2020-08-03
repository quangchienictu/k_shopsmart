-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2020 lúc 06:14 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_quanlyoder`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banan`
--

CREATE TABLE `banan` (
  `id_banan` int(11) NOT NULL,
  `ten_banan` varchar(50) NOT NULL,
  `ghichu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banan`
--

INSERT INTO `banan` (`id_banan`, `ten_banan`, `ghichu`) VALUES
(1, 'Bàn 1', 0),
(2, 'Bàn 2', 0),
(3, 'Bàn 3', 0),
(4, 'Bàn 4', 0),
(5, 'Bàn 5', 0),
(6, 'Bàn 6', 0),
(7, 'Bàn 7', 0),
(8, 'Bàn 8', 0),
(9, 'Bàn 9', 0),
(10, 'Bàn 10', 0),
(11, 'Bàn 11', 0),
(12, 'Bàn 12', 0),
(13, 'Bàn 13', 0),
(14, 'Bàn 14', 0),
(15, 'Bàn 15', 0),
(16, 'Bàn 16', 0),
(17, 'Bàn 17', 0),
(18, 'Bàn 18', 0),
(19, 'Bàn 19', 0),
(20, 'Bàn 20', 0),
(21, 'Bàn 21', 0),
(22, 'bàn 22', 0),
(23, 'Bàn 23', 0),
(24, 'Bàn 24', 0),
(25, 'Bàn 25', 0),
(26, 'Bàn 26', 0),
(27, 'Bàn 27', 0),
(28, 'Bàn 28', 0),
(29, 'Bàn 29', 0),
(30, 'Bàn 30', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'Thực Đơn Món Gà'),
(2, 'Thực Đơn Món Vịt'),
(3, 'Thực Đơn Các Món Bò'),
(4, 'Thực Đơn Các Món Dê'),
(5, 'Thực Đơn Các Món Lẩu'),
(6, 'Thực Đơn Các Món Khai Vị'),
(7, 'Thực Đơn Đồ Uống'),
(8, 'Thực Đơn Các Món Hải Sản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id_oder` int(11) NOT NULL,
  `id_banan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `trangthai` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_end` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id_oder`, `id_banan`, `id_user`, `tongtien`, `trangthai`, `time_start`, `time_end`) VALUES
(69, 2, 15, 72000, 3, '2020-05-12 03:34:25', '2020-05-12 03:37:37'),
(70, 2, 15, 270000, 3, '2020-07-12 03:35:53', '2020-07-12 03:37:37'),
(71, 2, 15, 36000, 3, '2020-07-12 03:36:12', '2020-07-12 03:37:37'),
(72, 3, 15, 180000, 3, '2020-06-12 03:38:04', '2020-06-12 03:40:32'),
(73, 3, 15, 13500, 3, '2020-07-12 03:39:19', '2020-07-12 08:15:33'),
(74, 26, 15, 18000, 3, '2020-07-12 03:48:22', '2020-07-12 08:19:00'),
(75, 26, 15, 180000, 2, '2020-07-12 03:49:48', '2020-07-12 17:40:37'),
(76, 2, 15, 270000, 3, '2020-07-12 05:07:05', '2020-07-12 05:48:07'),
(77, 2, 15, 18000, 3, '2020-07-12 08:12:53', '2020-07-12 08:15:00'),
(78, 2, 15, 54000, 3, '2020-07-12 08:13:57', '2020-07-12 08:15:00'),
(79, 1, 15, 630000, 3, '2020-07-12 17:39:20', '2020-07-15 06:12:01'),
(80, 2, 14, 225000, 3, '2020-07-12 17:52:33', '2020-07-15 10:44:43'),
(81, 2, 14, 225000, 3, '2020-07-12 18:49:59', '2020-07-15 10:44:43'),
(82, 1, 15, 630000, 3, '2020-07-15 06:30:02', '2020-07-15 07:55:48'),
(83, 3, 15, 18000, 3, '2020-07-15 07:07:01', '2020-07-15 10:32:34'),
(84, 3, 15, 27000, 3, '2020-07-15 07:07:15', '2020-07-15 10:32:34'),
(85, 1, 14, 225000, 3, '2020-07-16 02:09:19', '2020-07-16 02:10:17'),
(86, 1, 14, 180000, 3, '2020-07-19 16:05:42', '2020-07-19 16:08:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_item`
--

CREATE TABLE `oder_item` (
  `id_oder_item` int(11) NOT NULL,
  `id_oder` int(11) NOT NULL,
  `soluong_sp` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_item`
--

INSERT INTO `oder_item` (`id_oder_item`, `id_oder`, `soluong_sp`, `id_sp`) VALUES
(84, 69, 4, 38),
(85, 70, 1, 6),
(86, 71, 2, 38),
(87, 72, 1, 17),
(88, 73, 1, 41),
(89, 74, 1, 37),
(90, 75, 1, 7),
(91, 76, 1, 12),
(92, 77, 1, 38),
(93, 78, 1, 33),
(94, 79, 1, 16),
(95, 79, 1, 17),
(96, 79, 1, 15),
(97, 80, 2, 15),
(98, 81, 1, 15),
(99, 82, 1, 16),
(100, 82, 1, 7),
(101, 82, 1, 10),
(102, 83, 1, 38),
(103, 84, 2, 40),
(104, 85, 1, 15),
(105, 85, 1, 16),
(106, 86, 1, 15),
(107, 86, 1, 16),
(108, 86, 1, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `gia_sp` float NOT NULL,
  `khuyenmai_sp` float NOT NULL,
  `giakhuyenmai_sp` float NOT NULL,
  `img_sp` text NOT NULL,
  `loai_sp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`id_sp`, `ten_sp`, `gia_sp`, `khuyenmai_sp`, `giakhuyenmai_sp`, `img_sp`, `loai_sp`) VALUES
(1, 'Bò Nướng Cay', 300000, 10, 0, 'bo_nuongcay.jpg', '3'),
(2, 'Bò Bít Tết', 300000, 10, 0, 'bo_bittet.jpg', '3'),
(3, 'Bò Hầm Tiêu Xanh', 300000, 10, 0, 'bo_hamtieuxanh.jpg', '3'),
(4, 'Bò Lúc Lắc', 300000, 10, 0, 'bo_luclac.jpg', '3'),
(5, 'Bò Tái Chanh', 300000, 10, 0, 'bo_taichanh.jpg', '3'),
(6, 'Vịt Chiên Cay', 300000, 10, 0, 'vit_chiencay.jpg', '2'),
(7, 'Vịt Hấp ', 200000, 10, 0, 'vit_hap.jpg', '2'),
(8, 'Vịt Nướng Chao', 200000, 10, 0, 'vit_nuongchao.jpg', '2'),
(9, 'Vịt Nướng Truyền Thống', 200000, 10, 0, 'vit_nuong.jpg', '2'),
(10, 'Vịt Tẩm Mật Ong', 250000, 10, 0, 'vit_tammatong.jpg', '2'),
(11, 'Dê Hấp Xả', 300000, 10, 0, 'de_hapxa.jpg', '4'),
(12, 'Dê Nướng Xả', 300000, 10, 0, 'de_nuongxa.jpg', '4'),
(13, 'Dê Sào Lăn', 300000, 10, 0, 'de_saolan.jpg', '4'),
(14, 'Dê Ủ Trấu', 300000, 10, 0, 'de_utrau.jpg', '4'),
(15, 'Gà Không Lối Thoát', 250000, 10, 0, 'ga_khongloithoat.jpg', '1'),
(16, 'Gà Quay Nước Dừa', 250000, 10, 0, 'ga_quaynuocdua.jpg', '1'),
(17, 'Gà Rang Muối', 200000, 10, 0, 'ga_rangmuoi.jpg', '1'),
(18, 'Gà Rút Xương Nướng Mật Ong', 200000, 10, 0, 'ga_rutxuongnuongmatong.jpg', '1'),
(19, 'Bạch Tuộc Sào Xa Tế', 150000, 10, 0, 'bachtuoc_xaosate.jpg', '8'),
(20, 'Bề Bề Rang Muối', 120000, 10, 0, 'bebe_rangmuoi.jpg', '8'),
(21, 'Cua Rang Mẻ', 150000, 10, 0, 'cua_rangme.jpg', '8'),
(22, 'Mực Chiên Nước Mắm', 150000, 10, 0, 'muc_chiennuocmam.jpg', '8'),
(23, 'Canh Bánh Ghẹ', 50000, 10, 0, 'canh_banhghe.jpg', '8'),
(24, 'Lẩu Êch', 250000, 10, 0, 'lau_ech.jpg', '5'),
(25, 'Lẩu Gà', 250000, 10, 0, 'lau_ga.jpg', '5'),
(26, 'Lẩu Hải Sản', 250000, 10, 0, 'lau_haisan.jpg', '5'),
(27, 'Lẩu Thập Cẩm', 250000, 10, 0, 'lau_thapcam.jpg', '5'),
(28, 'Lẩu Riêu Cua Bắp Bò', 250000, 10, 0, 'lau_rieucuabapbo.jpg', '5'),
(29, 'Rau Mùng Tơi Sào', 50000, 10, 0, 'rau_mungtoixaotoi.jpg', '6'),
(30, 'Rau Muống Sào Tỏi', 50000, 10, 0, 'rau_muongxaotoi.jpg', '6'),
(31, 'Rau Su Su Sào Tỏi', 50000, 10, 0, 'rau_susuxaotoi.jpg', '6'),
(32, 'Ngô Bao Tử Sào Mực', 70000, 10, 0, 'ngo_baotuxaomuc.jpg', '6'),
(33, 'Ngô Sào Thịt', 60000, 10, 0, 'ngo_xaothit.jpg', '6'),
(34, 'Khoai Lang Kén', 50000, 10, 0, 'khoailang_ken.jpg', '6'),
(35, 'Khoai Tây Chiên Giòn', 50000, 10, 0, 'khoaitay_chiendon.jpg', '6'),
(36, 'Nước Cam', 20000, 10, 0, 'nuoc_cam.jfif', '7'),
(37, 'CoCa CoLa', 20000, 10, 0, 'nuoc_coca.jfif', '7'),
(38, 'Red  Bull', 20000, 10, 0, 'nuoc_redbull.jfif', '7'),
(39, 'Bia Hà Nội', 15000, 10, 0, 'nuoc_bearhanoi.jfif', '7'),
(40, 'Bia Sài Gòn', 15000, 10, 0, 'nuoc_bearsaigon.jfif', '7'),
(41, 'Bia Tiger Bạc', 15000, 10, 0, 'nuoc_beartiger.jfif', '7'),
(42, 'Bia Tươi', 20000, 10, 0, 'nuoc_biatuoi.jfif', '7'),
(43, 'Rượu Dừa', 50000, 10, 0, 'nuoc_ruoudua.jfif', '7'),
(44, 'Rượu Nếp Cẩm', 40000, 10, 0, 'nuoc_ruounepcam2.jfif', '7'),
(45, 'Rượu Nếp Cái Hoa Vàng', 40000, 10, 0, 'nuoc_ruounepcai.jfif', '7'),
(46, 'Rượu Táo Mèo', 40000, 10, 0, 'nuoc_ruoutaomeo.jfif', '7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `ten_user` varchar(50) NOT NULL,
  `sdt_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `quyen_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `ten_user`, `sdt_user`, `email_user`, `matkhau`, `quyen_user`) VALUES
(14, 'Lê Văn Tình', '123', 'nga@gmail.com', '123', 0),
(15, 'ngô kim anh', '456', 'nka@gmail.com', '456', 1),
(16, 'ngô thanh hà', '0963274678', 'nth@gmail.com', '123', 1),
(19, 'Ngô Hoàng Khánh', '5432532', 'nka@gmail.com', '344', 1),
(21, 'Ngô Gia Hân', '033375488', 'ngh@gmail.com', 'ngh123', 0),
(22, 'Hoàng Văn Quỳnh', '43241', 'phamvantot97k60@gmail.com', 'uỵttf', 1),
(24, 'Lê Hoàng Anh', '0987654777', 'lha@gmail.com', '13245435432', 0),
(25, 'Lê Hoàng Anh', '0987654777', 'lha@gmail.com', '124525', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banan`
--
ALTER TABLE `banan`
  ADD PRIMARY KEY (`id_banan`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id_oder`),
  ADD KEY `id_banan` (`id_banan`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD PRIMARY KEY (`id_oder_item`),
  ADD KEY `id_oder` (`id_oder`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banan`
--
ALTER TABLE `banan`
  MODIFY `id_banan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `id_oder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  MODIFY `id_oder_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `sp`
--
ALTER TABLE `sp`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`id_banan`) REFERENCES `banan` (`id_banan`),
  ADD CONSTRAINT `oder_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD CONSTRAINT `oder_item_ibfk_1` FOREIGN KEY (`id_oder`) REFERENCES `oder` (`id_oder`),
  ADD CONSTRAINT `oder_item_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sp` (`id_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
