-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 12:02 PM
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
-- Database: `qtshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `sanpham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cate_v1`
--

CREATE TABLE `cate_v1` (
  `id_cate` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `decribe` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `level` int(11) NOT NULL DEFAULT 2,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cate_v1`
--

INSERT INTO `cate_v1` (`id_cate`, `name`, `decribe`, `date`, `level`, `status`, `image`) VALUES
(12, 'Áo thun nam', 'áo thun nam', '2023-12-12 15:15:39', 2, 1, 'aothunnam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dh_chitiet`
--

CREATE TABLE `dh_chitiet` (
  `id_chitiet` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `id_sp` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `tong_dh` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dh_chitiet`
--

INSERT INTO `dh_chitiet` (`id_chitiet`, `id_dh`, `id_sp`, `soluong`, `tong_dh`, `date_create`, `size`, `color`) VALUES
(1, 1, 1, 1, 80000, '2023-11-07 14:22:40', 'S', 'xanh đen'),
(2, 1, 1, 1, 80000, '2023-12-14 14:22:40', 'S', 'xanh đen'),
(3, 3, 1, 1, 150000, '2023-12-14 18:44:50', '2XL', 'trắng'),
(4, 3, 1, 5, 750000, '2023-12-14 18:44:50', 'm', 'nâu'),
(5, 4, 1, 1, 150000, '2023-12-14 20:12:19', 'S', 'xanh đen'),
(6, 4, 1, 3, 450000, '2023-12-14 20:12:19', 'M', 'xanh đen');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tongdh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL,
  `pay` int(11) DEFAULT NULL,
  `hoten` varchar(250) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `thanhtoan` int(11) NOT NULL DEFAULT 1,
  `giaohang` int(11) NOT NULL DEFAULT 1,
  `area_ship` int(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `id_voucher` int(11) DEFAULT NULL,
  `id_ebanking` int(11) DEFAULT NULL,
  `date_update_thanhtoan` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update_giaohang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_dh`, `id_user`, `tongdh`, `ngaydat`, `pay`, `hoten`, `phone`, `email`, `address`, `thanhtoan`, `giaohang`, `area_ship`, `zipcode`, `facebook`, `id_voucher`, `id_ebanking`, `date_update_thanhtoan`, `date_update_giaohang`) VALUES
(1, 1, 72000, '2023-12-14 14:22:40', 2, 'Phạm Thị Thanh Nhàn', '853326611', '', 'Xóm 2 KDC An Hòa, xã Phước An, huyện Tây Sơn, Bình Định', 1, 1, 1, 1, 'trống', 3, 1, '2023-12-14 14:23:24', '2023-12-14 14:23:30'),
(2, 1, 72000, '2023-12-14 14:22:40', 2, 'Phạm Thị Thanh Nhàn', '853326611', '', 'Xóm 2 KDC An Hòa, xã Phước An, huyện Tây Sơn, Bình Định', 2, 2, 1, 1, 'trống', 3, 1, '2023-12-14 14:23:24', '2023-12-14 14:23:30'),
(3, 1, 810000, '2023-12-14 18:44:50', 2, 'Lê Hồng Nam', '375621447', '', '12 Lê Thánh Tông, Phường Quang Trung, Quận Đống Đa, Quy Nhơn', 2, 2, 2, 1, 'trống', 3, 2, '2023-12-14 18:44:50', '2023-12-14 18:44:50'),
(4, 1, 540000, '2023-12-14 20:12:19', 1, 'Lê Hoàng Khanh', '965279041', '', '12 Lê Thánh Tông, Phường Quang Trung, Quận Đống Đa, Quy Nhơn', 2, 2, 1, 1, 'trống', 3, 1, '2023-12-14 20:12:19', '2023-12-14 20:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `ebanking`
--

CREATE TABLE `ebanking` (
  `id_ebanking` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_dh` int(11) DEFAULT NULL,
  `tongdh` int(11) DEFAULT NULL,
  `name_bank` varchar(255) DEFAULT NULL,
  `id_bank` varchar(50) DEFAULT NULL,
  `user_bank` varchar(50) DEFAULT NULL,
  `money_bank` varchar(20) DEFAULT NULL,
  `decribe_bank` text DEFAULT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_change` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebanking`
--

INSERT INTO `ebanking` (`id_ebanking`, `id_user`, `id_dh`, `tongdh`, `name_bank`, `id_bank`, `user_bank`, `money_bank`, `decribe_bank`, `date_create`, `date_change`, `status`) VALUES
(1, 1, 1, 72000, 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', '2023-12-14 14:22:40', '2023-12-14 14:22:40', 1),
(2, 1, 3, 810000, 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', 'chưa cập nhật', '2023-12-14 18:44:50', '2023-12-14 18:44:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infomation`
--

CREATE TABLE `infomation` (
  `info` int(12) NOT NULL,
  `web_name` varchar(100) DEFAULT NULL,
  `image_favicon` varchar(255) DEFAULT NULL,
  `image_logo` varchar(255) DEFAULT NULL,
  `web_phone` varchar(15) DEFAULT NULL,
  `web_email` varchar(100) DEFAULT NULL,
  `web_introduce` text DEFAULT NULL,
  `web_address` varchar(255) DEFAULT NULL,
  `link_fanpage` varchar(255) DEFAULT NULL,
  `link_twitter` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `bank_name1` varchar(100) DEFAULT NULL,
  `bank_id1` varchar(100) DEFAULT NULL,
  `bank_user1` varchar(100) DEFAULT NULL,
  `text_copyright` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infomation`
--

INSERT INTO `infomation` (`info`, `web_name`, `image_favicon`, `image_logo`, `web_phone`, `web_email`, `web_introduce`, `web_address`, `link_fanpage`, `link_twitter`, `link_instagram`, `bank_name1`, `bank_id1`, `bank_user1`, `text_copyright`) VALUES
(1, 'THỜI TRANG QT', 'logo520x520_final.png', 'logo520x520_final.png', '0366 455 679', 'lienhe@thoitrangqt.shop', 'Chuyên cung cấp đồ thời trang sỉ và lẻ trên toàn quốc. Mẫu mã đa dạng về thời trang và lứa tuổi từ 4+ đến 65.', '102/5/4 TTN 1, p TTN, q 12, tp Hồ Chí Minh', 'https://fb.com/ngmh3105', 'https://fb.com/ngmh3105', 'https://fb.com/ngmh3105', 'Việt Á Bank (VietABank)', '66 45 56 79', 'Lê Thị Hồng Hà', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `id_loaihang` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `decribe` text DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'product_default.png',
  `status` int(11) DEFAULT 1,
  `id_cate_v1` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`id_loaihang`, `name`, `decribe`, `image`, `status`, `id_cate_v1`, `date`) VALUES
(2, 'Áo thun thể thao cổ tròn', 'áo thun thể thao cổ tròn tay ngắn', 'cate_thunnam_thuntheothao_cotron.png', 1, 12, '2023-12-12 15:19:25'),
(3, 'Áo thun in hình', 'áo in hình độc quyền, custom', 'cate_thunnam_thunin_ladyrose.jpg', 1, 12, '2023-12-12 15:21:38'),
(4, 'Áo thun trơn ', 'áo thun vải trơn', 'cate_thunnam_thuntron_01.png', 1, 12, '2023-12-12 15:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_ct` int(11) DEFAULT NULL,
  `id_dh` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT current_timestamp(),
  `date_submit` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_sp`, `id_ct`, `id_dh`, `noidung`, `rating`, `image`, `status`, `date_create`, `date_submit`) VALUES
(1, 1, 1, 1, 1, 'áo mặc đẹp, thích hợp với font ôm của nam', 5, 'cate_ak_bomber_origin2.jpg', 2, '2023-12-14 14:23:47', '2023-12-14 14:24:29'),
(2, 1, 1, 1, 1, 'áo mặc đẹp, thích hợp với font ôm của nam', 5, 'cate_ak_bomber_origin2.jpg', 1, '2023-12-14 14:23:47', '2023-12-14 14:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Date_import` datetime NOT NULL,
  `Viewsp` int(11) DEFAULT NULL,
  `Decribe` longtext DEFAULT NULL,
  `Mount` int(11) NOT NULL,
  `Sale` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `id_loai` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `%sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `Name`, `Price`, `Date_import`, `Viewsp`, `Decribe`, `Mount`, `Sale`, `image`, `id_loai`, `status`, `color`, `size`, `%sale`) VALUES
(1, 'Áo thun trơn cotton cổ tròn', 150000, '2023-12-13 19:20:28', 46, 'Áo thun trơn 100% cotton nữ với màu sắc tươi mới, thích hợp cho những bạn trẻ năng động, cá tính.\r\n\r\nChất liệu vải Cotton 100% mang đến sự mát mẻ khi mặc, từng mối chỉ đường kim được gia công kỹ lưỡng chắc chắn.\r\n\r\nĐối với sản phẩm mới, giặt qua lần đầu để hết bụi vải và hình in được bền hơn, không bong tróc\r\nLộn trái áo khi giặt và không giặt ngâm chung với đồ dễ phai màu', 100, 80000, 'thuntron_nam_mau_nau.jpg', 4, 1, 'xanh đen,xanh dương,nâu,trắng', 's m l 1xl 2xl', 46);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `title1` varchar(255) NOT NULL DEFAULT 'Tiêu đề h4 trống',
  `title2` varchar(255) NOT NULL DEFAULT 'Tiêu đề h3 trống',
  `image` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `title1`, `title2`, `image`, `link`, `status`, `date`) VALUES
(1, 'GIẢM GIÁ 10% TẤT CẢ SẢN PHẨM', 'Bộ sưu tập mùa hè', 'slide_1.jpg', 'index.php?act=detail&edit=0&id=27', 1, '2023-11-23 22:16:25'),
(2, 'VOURCHER SALE 5%', 'Mã giảm giá THANG11', 'slide_2.jpg', 'index.php?act=shop', 3, '2023-11-23 22:18:25'),
(3, 'GIẢM GIÁ 10% TOÀN BỘ SẢN PHẨM', 'Khung giờ vàng', 'slide_3.jpg', 'index.php?act=shop', 1, '2023-11-23 22:19:59'),
(4, 'GIẢM GIÁ ĐỒNG BỘ TỪ 59K', 'Bộ sưu tập NEM', 'pari.jpg', 'index.php?act=shop', 1, '2023-11-23 23:45:07'),
(5, 'GIẢM GIÁ 15%', 'chương trình KIDDIE', 'kid.jpg', 'index.php?act=shop', 1, '2023-11-24 18:28:42'),
(6, 'GIẢM GIÁ ĐỒNG BỘ TỪ 59K', 'Bộ sưu tập NEM', 'pari.jpg', 'index.php?act=shop', 1, '2023-11-28 23:45:07'),
(7, 'GIẢM GIÁ 15%', 'chương trình KIDDIE', 'kid.jpg', 'index.php?act=shop', 2, '2023-11-28 18:28:42'),
(8, 'GIẢM GIÁ ĐỒNG BỘ TỪ 59K', 'Bộ sưu tập NEM', 'pari.jpg', 'index.php?act=shop', 2, '2023-12-13 12:46:21'),
(9, '', '', 'carousel-2.jpg', '#', 3, '2023-12-13 19:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `born` date DEFAULT NULL,
  `sex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_user`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `position`, `image`, `born`, `sex`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Minh Hiếu', 'hieunguyen3105@gmail.com', 965279041, '102/5/4 TTN 1, P.TTN, Q.12, TP.HCM', 0, '066.jpg', '0000-00-00', 1),
(2, 'user', '769293f63654059f4372e2c2ba0beee3', 'Nguyễn Thị Bưởi', 'buoi5roi@gmail.com', 335662581, '12 Nguyễn Trãi', 1, 'user_image.jpg', '2023-12-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vourcher`
--

CREATE TABLE `vourcher` (
  `id_voucher` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `condition_voucher` int(11) DEFAULT NULL,
  `number_voucher` int(11) DEFAULT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_end` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `decribe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vourcher`
--

INSERT INTO `vourcher` (`id_voucher`, `code`, `condition_voucher`, `number_voucher`, `time_start`, `time_end`, `amount`, `date_create`, `status`, `decribe`) VALUES
(0, 'NULLVOUCHER', 0, 0, '2023-11-01 00:00:00', '2023-11-30 23:59:59', 0, '2023-10-28 07:06:50', 1, 'NULL VOUCHER (không điều lệnh)'),
(1, 'THANG12', 1000000, 100000, '2023-12-08 00:00:00', '2023-12-31 23:59:59', 1000, '2023-12-08 07:06:50', 2, 'Vourcher tháng 12 số lượng 1000 giảm 100K cho đơn hàng trên 1 triệu'),
(2, 'THANG11', 0, 50000, '2023-11-01 00:00:00', '2023-11-30 23:59:59', 1000, '2023-10-28 07:06:50', 2, 'Vourcher tháng 11 số lượng 1000 giảm 20K cho tất cả hóa đơn'),
(3, 'SUPERSALE', 0, 10, '2023-11-01 00:00:00', '2023-12-31 23:59:59', 100, '2023-10-28 07:06:50', 3, 'Vourcher SUPERSALE cho tất cả hóa đơn'),
(5, 'FREESHIP12', 300000, 0, '2023-12-01 00:00:00', '2023-12-31 23:59:59', 300, '2023-12-09 03:06:50', 4, 'Vourcher miễn phí giao hàng cho hóa đơn từ 500k trở lên ở trường hợp ngoài tp'),
(6, 'TESTVOUCHER', 1000000, 100000, '2023-12-08 00:00:00', '2023-12-31 23:59:59', 0, '2023-12-08 07:06:50', 2, 'voucher test 0 số lượng'),
(7, 'GIAM100K', 500000, 100000, '2023-12-15 03:26:33', '2023-12-15 10:26:33', 12, '2023-12-15 03:26:33', 2, 'trống');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sp` (`sanpham`);

--
-- Indexes for table `cate_v1`
--
ALTER TABLE `cate_v1`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `dh_chitiet`
--
ALTER TABLE `dh_chitiet`
  ADD PRIMARY KEY (`id_chitiet`),
  ADD KEY `fk_ct_sp` (`id_sp`),
  ADD KEY `fk_ct_dh` (`id_dh`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`),
  ADD KEY `fk_id_user` (`id_user`),
  ADD KEY `fk_dh_vc` (`id_voucher`),
  ADD KEY `fk_dh_eb` (`id_ebanking`);

--
-- Indexes for table `ebanking`
--
ALTER TABLE `ebanking`
  ADD PRIMARY KEY (`id_ebanking`),
  ADD KEY `fk_eb_tk` (`id_user`);

--
-- Indexes for table `infomation`
--
ALTER TABLE `infomation`
  ADD PRIMARY KEY (`info`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`id_loaihang`),
  ADD KEY `fk_v1_v2` (`id_cate_v1`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `fk_review` (`id_sp`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_rv_ct` (`id_ct`),
  ADD KEY `fk_rv_dh` (`id_dh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `fk_loai` (`id_loai`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vourcher`
--
ALTER TABLE `vourcher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `cate_v1`
--
ALTER TABLE `cate_v1`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dh_chitiet`
--
ALTER TABLE `dh_chitiet`
  MODIFY `id_chitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ebanking`
--
ALTER TABLE `ebanking`
  MODIFY `id_ebanking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `infomation`
--
ALTER TABLE `infomation`
  MODIFY `info` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `id_loaihang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vourcher`
--
ALTER TABLE `vourcher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_tk` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Constraints for table `dh_chitiet`
--
ALTER TABLE `dh_chitiet`
  ADD CONSTRAINT `fk_ct_dh` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`),
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_dh_tk` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`),
  ADD CONSTRAINT `fk_dh_vc` FOREIGN KEY (`id_voucher`) REFERENCES `vourcher` (`id_voucher`),
  ADD CONSTRAINT `fk_hd_tk` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Constraints for table `ebanking`
--
ALTER TABLE `ebanking`
  ADD CONSTRAINT `fk_eb_tk` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Constraints for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD CONSTRAINT `fk_v1_v2` FOREIGN KEY (`id_cate_v1`) REFERENCES `cate_v1` (`id_cate`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_rv_ct` FOREIGN KEY (`id_ct`) REFERENCES `dh_chitiet` (`id_chitiet`),
  ADD CONSTRAINT `fk_rv_dh` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`),
  ADD CONSTRAINT `fk_rv_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `fk_rv_tk` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`),
  ADD CONSTRAINT `fk_rv_user` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_loai` FOREIGN KEY (`id_loai`) REFERENCES `loaihang` (`id_loaihang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
