-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 10:31 PM
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
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `datecreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order-details`
--

INSERT INTO `order-details` (`orderdetail_id`, `order_id`, `id`, `price`, `quantity`, `total`, `datecreate`) VALUES
(1, 1, 1, 76000, 3, 228000, '2021-11-02 10:36:49'),
(2, 2, 2, 80000, 4, 320000, '2021-11-03 10:55:14'),
(3, 2, 3, 65000, 2, 130000, '2021-11-03 10:55:14'),
(4, 3, 4, 75000, 2, 150000, '2021-11-03 10:58:29'),
(5, 4, 3, 65000, 5, 325000, '2021-11-03 11:00:14'),
(6, 4, 8, 40000, 2, 80000, '2021-11-03 11:00:14'),
(7, 6, 1, 76000, 2, 152000, '2021-11-04 05:37:00'),
(8, 7, 2, 80000, 4, 320000, '2021-11-04 05:38:31'),
(9, 7, 9, 55000, 2, 110000, '2021-11-04 05:38:31'),
(10, 8, 3, 65000, 2, 130000, '2021-11-07 11:07:13'),
(11, 8, 22, 30000, 2, 60000, '2021-11-07 11:07:13'),
(12, 9, 3, 65000, 2, 130000, '2021-11-07 11:27:16'),
(13, 9, 20, 57000, 2, 114000, '2021-11-07 11:27:16');

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
(1, 228000, 0, 'Thuan Le', 'viethd123456@gmail.com', '211, Thanh Binh 1, Binh Thanh, Duc Trong', '0165452123', 'No', '2021-11-02 10:36:49', 1),
(2, 450000, 1, 'Cao Lê Thuần', 'vietdinh105@gmail.com', '209 Le Duc Tho TpHcm', '8888888778', 'Hehe', '2021-11-03 10:55:14', 1),
(3, 150000, 1, 'Cao Lê Thuần', 'vietdinh105@gmail.com', '209 Le Duc Tho TpHcm', '0969447852', 'Yes', '2021-11-03 10:58:29', 1),
(4, 405000, 8, 'Đinh Hoàng Việt', 'DHviet100@gmail.com', '110 Nguyễn Gia Trí', '8873623123', '766', '2021-11-03 11:00:14', 1),
(6, 152000, 1, 'Cao Lê Thuần', 'vietdinh105@gmail.com', '209 Le Duc Tho TpHcm', '8888888778', '', '2021-11-04 05:37:00', 1),
(7, 430000, 1, 'Cao Lê Thuần', 'vietdinh105@gmail.com', '209 Le Duc Tho TpHcm', '1472583697', 'Anh Bạn à', '2021-11-04 05:38:31', 1),
(8, 190000, 1, 'Cao Lê Thuần', 'vietdinh105@gmail.com', '209 Le Duc Tho TpHcm', '8888888778', 'OWO', '2021-11-07 11:07:13', 1),
(9, 244000, 10, 'Trần Văn A', 'multiple@gmail.com', '900 Hoa Binh', '0159785354', 'NGON', '2021-11-07 11:27:16', 1);

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
(4, 'Bánh Bông Lan', 'product-cake1-4.jpg', 'Vô cùng mềm mại và nhân tan chảy bên trong', 75000, 4),
(5, 'Bánh Kem Chocolate', 'seller-product-1.jpg', 'Bánh kem kết hợp hương vị chocolate đậm đà', 49000, 2),
(6, 'Bánh Kem Dâu', 'seller-product-2.jpg', 'Bánh kem kết hợp hương vị dâu tây tinh khiết', 55000, 99),
(7, 'Bánh Bông Lan', 'seller-product-3.jpg', 'Bánh Bông Lan mềm tươi ngon', 50000, 99),
(8, 'Cupcake Chocolate', 'seller-product-4.jpg', 'Bánh Cupcake mang bản sắc mới vị lạ mới', 40000, 99),
(9, 'Bánh Quy', 'seller-product-3.jpg', 'Đây là loại bánh quy pha trộn với hương vị sữa tươi', 55000, 99),
(22, 'Bánh Mật', 'product-cake1-4.jpg', 'Mật ong ngọt từ trong ra ngoài', 35000, 102),
(23, 'Bánh hạnh nhân', 'product-cake1-3.jpg', 'NGON!', 54000, 102),
(24, 'Bánh đẹp trai 6 múi', 'r2_auto_x2.jpg', 'Yupp!', 999999, 102);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product-seller`
--

CREATE TABLE `product-seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product-seller`
--

INSERT INTO `product-seller` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'Bánh Kem Chocolate', 'seller-product-1.jpg', 'Bánh kem kết hợp hương vị chocolate đậm đà', 45000.00),
(2, 'Bánh Kem Dâu', 'seller-product-2.jpg', 'Bánh kem kết hợp hương vị dâu tây tinh khiết', 55000.00),
(3, 'Bánh Bông Lan', 'seller-product-3.jpg', 'Bánh Bông Lan mềm tươi ngon', 50000.00),
(4, 'Cupcake Chocolate', 'seller-product-4.jpg', 'Bánh Cupcake mang bản sắc mới vị lạ mới', 40000.00),
(5, 'Bánh Quy', 'seller-product-3.jpg', 'Đây là loại bánh quy pha trộn với hương vị sữa tươi', 55000.00);

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
(8, 'vietu20', '841bc03ba82960e091dae30c1d0427f5', 'DHviet100@gmail.com', '0987654345', 'Đinh Hoàng Việt', '110 Nguyễn Gia Trí', 1, '2021-11-03 09:28:57', 1),
(9, 'viet0111', '2c034ac7eb7120d1d3e38f4d7dc13e89', 'viet2921@gmail.com', NULL, NULL, NULL, 1, '2021-11-03 16:23:17', 1),
(10, 'Vietdz123', 'd9e9bc0a9e53769f067a115037c03a6f', 'multiple@gmail.com', '0159785354', 'Trần Văn A', '900 Hoa Binh', 1, '2021-11-06 22:27:29', 1);

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
  ADD PRIMARY KEY (`orderdetail_id`);

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
-- Chỉ mục cho bảng `product-seller`
--
ALTER TABLE `product-seller`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT cho bảng `order-details`
--
ALTER TABLE `order-details`
  MODIFY `orderdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `order-info`
--
ALTER TABLE `order-info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product-seller`
--
ALTER TABLE `product-seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
