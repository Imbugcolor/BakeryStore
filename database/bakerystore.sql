-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2021 lúc 11:54 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bakerystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cat_status` int(10) NOT NULL,
  `date_create` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_status`, `date_create`) VALUES
(1, 'Bánh Quy', 1, 'auto'),
(2, 'Bánh Kem', 1, 'auto'),
(3, 'Bánh Vòng', 1, 'auto'),
(4, 'Bánh Bông Lan', 1, 'auto'),
(99, 'Sản phẩm giảm giá', 1, 'auto'),
(101, 'Bánh Pía', 1, '2021-11-05 05:50:28'),
(102, 'Bánh Plan', 1, '2021-11-06 03:38:37'),
(104, 'Banh Moi', 0, '2021-11-08 15:00:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order-details`
--

CREATE TABLE `order-details` (
  `orderdetail_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `orderprice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `datecreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order-details`
--

INSERT INTO `order-details` (`orderdetail_id`, `order_id`, `id`, `orderprice`, `quantity`, `total`, `datecreate`) VALUES
(16, 11, 24, 999999, 2, 1999998, '2021-11-09 11:15:05'),
(17, 11, 3, 65000, 2, 130000, '2021-11-09 11:15:05'),
(18, 11, 23, 54000, 1, 54000, '2021-11-09 11:15:05'),
(24, 17, 1, 76000, 2, 152000, '2021-11-10 10:39:51'),
(25, 17, 3, 65000, 2, 130000, '2021-11-10 10:39:51'),
(29, 19, 6, 55000, 2, 110000, '2021-11-10 13:59:23'),
(30, 19, 4, 75000, 1, 75000, '2021-11-10 13:59:23'),
(31, 20, 3, 65000, 10, 650000, '2021-11-10 14:21:47'),
(32, 20, 1, 76000, 2, 152000, '2021-11-10 14:21:47'),
(40, 25, 27, 220000, 2, 440000, '2021-11-11 11:54:44'),
(41, 25, 5, 49000, 1, 49000, '2021-11-11 11:54:44'),
(42, 25, 28, 25000, 2, 50000, '2021-11-11 11:54:44'),
(44, 27, 6, 55000, 2, 110000, '2021-11-11 18:53:28'),
(45, 27, 29, 55000, 5, 275000, '2021-11-11 18:53:28'),
(46, 27, 1, 76000, 1, 76000, '2021-11-11 18:53:28'),
(47, 28, 32, 50000, 3, 150000, '2021-11-12 11:48:32'),
(48, 28, 3, 65000, 2, 130000, '2021-11-12 11:48:32'),
(49, 28, 1, 76000, 2, 152000, '2021-11-12 11:48:32'),
(50, 28, 4, 45000, 2, 90000, '2021-11-12 11:48:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order-info`
--

CREATE TABLE `order-info` (
  `order_id` int(10) NOT NULL,
  `total` double NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_order` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order-info`
--

INSERT INTO `order-info` (`order_id`, `total`, `user_id`, `full_name`, `email`, `address`, `phone`, `request`, `date_order`, `status`) VALUES
(11, 2183998, 11, 'Nguyễn Văn Chuối', 'viet18@gmail.com', '605 Nguyen Van Luong ', '0988553321', 'Shop gói hàng chắc chắn vô nha', '2021-11-09 11:15:05', 4),
(17, 282000, 10, 'Trần Văn A', 'multiple@gmail.com', '900 Hoa Binh', '0159785354', 'AAA', '2021-11-10 10:39:51', 2),
(19, 185000, 10, 'Trần Đại Test', 'multiple@gmail.com', '900 Test', '0099938882', 'Test Sp', '2021-11-10 13:59:23', 3),
(20, 802000, 1, 'Trần Mới Mua', 'thuan1303@gmail.com', '291 Binh Thanh', '0123456767', 'KHONG CO GI', '2021-11-10 14:21:47', 1),
(25, 539000, 10, 'Trần Văn A', 'multiple@gmail.com', '900 Hoa Binh', '0159785354', '', '2021-11-11 11:54:44', 1),
(27, 461000, 10, 'Lâm Dương Anh Thư', 'nu1206@gmail.com', 'X38 Nguyễn Thị Mười', '0123453212', 'Cho em thêm cái muỗng xúc bánh ăn', '2021-11-11 18:53:28', 3),
(28, 522000, 10, 'Nguyễn Duy Tân', 'multiple@gmail.com', '107 Nguyen Oanh', '05762345684', 'Nothing!', '2021-11-12 11:48:32', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `cat_id`) VALUES
(1, 'Bánh Quy Sữa', 'product-cake1-1.jpg', 'Mềm mại vị sữa', 76000, 1),
(2, 'Bánh Kem Việt Quất', 'product-cake1-2.jpg', 'Mát lạnh cùng với thị thanh của việt quất', 80000, 2),
(3, 'Bánh Vòng A', 'product-cake1-3.jpg', 'Bánh vòng dinh dưỡng ăn vào không mập', 65000, 3),
(4, 'Bánh Bông Lan', 'product-cake1-4.jpg', 'Vô cùng mềm mại và nhân tan chảy bên trong', 45000, 1),
(5, 'Bánh Kem Chocolate', 'seller-product-1.jpg', 'Bánh kem kết hợp hương vị chocolate đậm đà', 49000, 2),
(6, 'Bánh Kem Dâu', 'seller-product-2.jpg', 'Bánh kem kết hợp hương vị dâu tây tinh khiết', 55000, 99),
(7, 'Bánh Bông Lan', 'seller-product-3.jpg', 'Bánh Bông Lan mềm tươi ngon', 50000, 99),
(8, 'Cupcake Chocolate', 'seller-product-4.jpg', 'Bánh Cupcake mang bản sắc mới vị lạ mới', 45000, 1),
(9, 'Bánh Quy', 'seller-product-3.jpg', 'Đây là loại bánh quy pha trộn với hương vị sữa tươi', 59000, 99),
(22, 'Bánh Mật', 'product-cake1-4.jpg', 'Mật ong ngọt từ trong ra ngoài', 35000, 102),
(23, 'Bánh hạnh nhân', 'product-cake1-3.jpg', 'NGON!', 54000, 102),
(27, 'Bánh Kem 3 Tầng', 'pro27_ec5339af-bce5-4de0-851f-b0bb3fe94c63.jpg', 'Bánh kem 3 tầng rất thích hợp cho những bữa tiệc hoành tráng', 220000, 2),
(28, 'Bánh quy mứt dâu', 'pro3.jpg', 'Bánh Quy phủ lớp sữa kèm mứt dâu mang mùi vị ngọt và thơm hương sữa', 25000, 1),
(29, 'Bánh Plan Cherry', 'pro14.jpg', 'Bánh flan có vị béo của trứng và mùi thơm từ sữa, khi ăn mềm tan trong miệng dễ dàng chinh phục khẩu vị của bất cứ ai, từ trẻ em cho tới người lớn. ', 55000, 102),
(30, 'Bánh bông lan trái cây', 'pro5.jpg', 'Nguyên liệu: Trứng, Nước cốt chanh, dâu, việt quất', 40000, 4),
(31, 'Bánh ngọt chocolate', 'pro19.jpg', 'Bánh socola với lớp socola vị ca cao béo, thơm mà không bị đắng phủ bên ngoài lớp bánh xốp mịn rất ngon. Kẹp giữa của Bánh vị ca cao là lớp kem marshmallow dẻo thơm. (3 cái)', 20000, 99),
(32, 'Giảm giá 5', 'pro22_cf5f4b91-2ef5-4ffd-a5e4-fae215bfcecc.jpg', 'Bánh kem là một loại bánh thường có ý nghĩa quan trọng và đặc biệt nhất trong dịp kỷ niệm sinh nhật của người dùng. Đây là một loại bánh ngọt dạng tháp như bánh bông lan xốp và được phủ lên một lớp kem dày hoặc mỏng vừa để trang trí vừa để tăng thêm hương', 50000, 99),
(33, 'Giảm giá 6', 'pro24.jpg', 'Bánh kem là một loại bánh thường có ý nghĩa quan trọng và đặc biệt nhất trong dịp kỷ niệm sinh nhật của người dùng. Đây là một loại bánh ngọt dạng tháp như bánh bông lan xốp và được phủ lên một lớp kem dày hoặc mỏng vừa để trang trí vừa để tăng thêm hương', 30000, 99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL,
  `date_create_user` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `phone`, `full_name`, `address`, `role`, `date_create_user`, `status`) VALUES
(1, 'Viethoangdinh', 'b41cb62ec6767f2e41f9df7a2d161515', 'vietdinh105@gmail.com', '0555444666', 'Cao Lê Thuần', '209 Le Duc Tho TpHcm', 0, '0000-00-00 00:00:00', 1),
(3, 'thuan1303', '2ed72a22d24014d96f06b84aab68476f', 'thuan1303@gmail.com', NULL, NULL, NULL, 1, '2021-11-02 14:59:00', 1),
(8, 'vietu20', '841bc03ba82960e091dae30c1d0427f5', 'DHviet100@gmail.com', '0987654345', 'Đinh Hoàng Việt', '110 Nguyễn Gia Trí', 0, '2021-11-03 09:28:57', 1),
(10, 'Vietdz123', 'd9e9bc0a9e53769f067a115037c03a6f', 'multiple@gmail.com', '0159785354', 'Trần Văn A', '900 Hoa Binh', 1, '2021-11-06 22:27:29', 1),
(11, 'dododo123', 'd9e9bc0a9e53769f067a115037c03a6f', 'viet18@gmail.com', NULL, NULL, NULL, 0, '2021-11-09 11:09:34', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `order-details`
--
ALTER TABLE `order-details`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `order-info`
--
ALTER TABLE `order-info`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `order-details`
--
ALTER TABLE `order-details`
  MODIFY `orderdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `order-info`
--
ALTER TABLE `order-info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order-details`
--
ALTER TABLE `order-details`
  ADD CONSTRAINT `order-details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order-info` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
