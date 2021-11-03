-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 04:52 AM
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
(100, 'Bánh Gạo', 1, 'auto');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order-details`
--

CREATE TABLE `order-details` (
  `orderdetail_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `datecreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order-details`
--

INSERT INTO `order-details` (`orderdetail_id`, `order_id`, `id`, `price`, `quantity`, `total`, `datecreate`) VALUES
(1, 1, 1, 76000.00, 3, 228000, '2021-11-02 10:36:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order-info`
--

CREATE TABLE `order-info` (
  `order_id` int(10) NOT NULL,
  `total` double NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `order-info` (`order_id`, `total`, `user_name`, `email`, `address`, `phone`, `request`, `date_order`, `status`) VALUES
(1, 228000, 'Thuan Le', 'viethd123456@gmail.com', '211, Thanh Binh 1, Binh Thanh, Duc Trong', '0165452123', 'No', '2021-11-02 10:36:49', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `cat_id`) VALUES
(1, 'Bánh Quy Sữa', 'product-cake1-1.jpg', 'Mềm mại vị sữa', 76000.00, 1),
(2, 'Bánh Kem Việt Quất', 'product-cake1-2.jpg', 'Mát lạnh cùng với thị thanh của việt quất', 80000.00, 2),
(3, 'Bánh Vòng A', 'product-cake1-3.jpg', 'Bánh vòng dinh dưỡng ăn vào không mập', 65000.00, 3),
(4, 'Bánh Bông Lan', 'product-cake1-4.jpg', 'Vô cùng mềm mại và nhân tan chảy bên trong', 75000.00, 4),
(5, 'Bánh Kem Chocolate', 'seller-product-1.jpg', 'Bánh kem kết hợp hương vị chocolate đậm đà', 45000.00, 99),
(6, 'Bánh Kem Dâu', 'seller-product-2.jpg', 'Bánh kem kết hợp hương vị dâu tây tinh khiết', 55000.00, 99),
(7, 'Bánh Bông Lan', 'seller-product-3.jpg', 'Bánh Bông Lan mềm tươi ngon', 50000.00, 99),
(8, 'Cupcake Chocolate', 'seller-product-4.jpg', 'Bánh Cupcake mang bản sắc mới vị lạ mới', 40000.00, 99),
(9, 'Bánh Quy', 'seller-product-3.jpg', 'Đây là loại bánh quy pha trộn với hương vị sữa tươi', 55000.00, 99);

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
  `status` int(1) NOT NULL,
  `date_create_user` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `status`, `date_create_user`) VALUES
(1, 'Viethoangdinh', 'b41cb62ec6767f2e41f9df7a2d161515', 'vietdinh105@gmail.com', 1, '0000-00-00 00:00:00'),
(2, 'Viethdgaming1', '2c034ac7eb7120d1d3e38f4d7dc13e89', 'viethd123456@gmail.com', 1, '2021-11-02 14:23:40'),
(3, 'thuan1303', '2ed72a22d24014d96f06b84aab68476f', 'thuan1303@gmail.com', 1, '2021-11-02 14:59:00'),
(4, 'viet222', '94f3911e07030348468ac94f61af5a4a', 'Viet8098@gmail.com', 1, '2021-11-02 15:00:52'),
(5, 'viet89', 'a0322a49772cda01650ec7b4ce9eebb3', 'viet@gmail.com', 1, '2021-11-03 04:19:49');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `order-details`
--
ALTER TABLE `order-details`
  MODIFY `orderdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order-info`
--
ALTER TABLE `order-info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product-seller`
--
ALTER TABLE `product-seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1113;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
