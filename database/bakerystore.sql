-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2021 lúc 10:27 PM
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
(4, 'Cupcake', 1, 'auto'),
(99, 'Sản phẩm giảm giá', 1, 'auto'),
(101, 'Bánh Pía', 1, '2021-11-05 05:50:28'),
(102, 'Bánh Flan', 1, '2021-11-06 03:38:37'),
(104, 'Banh Bao', 1, '2021-11-08 15:00:29'),
(108, 'Bánh Su Kem', 1, '2021-11-13 13:45:02');

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
(50, 28, 4, 45000, 2, 90000, '2021-11-12 11:48:32'),
(51, 29, 8, 45000, 2, 90000, '2021-11-12 15:48:48'),
(52, 29, 6, 55000, 1, 55000, '2021-11-12 15:48:48'),
(53, 29, 7, 50000, 4, 200000, '2021-11-12 15:48:48'),
(54, 29, 4, 45000, 2, 90000, '2021-11-12 15:48:48'),
(55, 29, 32, 50000, 2, 100000, '2021-11-12 15:48:48'),
(56, 30, 31, 20000, 2, 40000, '2021-11-12 15:55:22'),
(57, 30, 4, 45000, 2, 90000, '2021-11-12 15:55:22'),
(58, 30, 5, 49000, 3, 147000, '2021-11-12 15:55:22'),
(59, 30, 33, 30000, 2, 60000, '2021-11-12 15:55:22'),
(60, 31, 3, 65000, 2, 130000, '2021-11-12 16:02:46'),
(61, 31, 8, 45000, 5, 225000, '2021-11-12 16:02:46'),
(62, 32, 1, 76000, 2, 152000, '2021-11-13 11:30:09'),
(63, 32, 4, 45000, 2, 90000, '2021-11-13 11:30:09'),
(64, 32, 31, 20000, 2, 40000, '2021-11-13 11:30:09'),
(65, 32, 6, 55000, 1, 55000, '2021-11-13 11:30:09'),
(69, 34, 4, 45000, 1, 45000, '2021-11-13 22:04:24'),
(70, 34, 22, 35000, 4, 140000, '2021-11-13 22:04:24'),
(71, 34, 29, 55000, 3, 165000, '2021-11-13 22:04:24'),
(72, 34, 5, 49000, 1, 49000, '2021-11-13 22:04:24'),
(73, 34, 1, 76000, 1, 76000, '2021-11-13 22:04:24'),
(74, 34, 7, 50000, 2, 100000, '2021-11-13 22:04:24'),
(75, 34, 35, 34000, 1, 34000, '2021-11-13 22:04:24');

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
(27, 461000, 10, 'Lâm Dương Anh Thư', 'nu1206@gmail.com', 'X38 Nguyễn Thị Mười', '0123453212', 'Cho em thêm cái muỗng xúc bánh ăn', '2021-11-11 18:53:28', 4),
(28, 522000, 10, 'Nguyễn Duy Tân', 'multiple@gmail.com', '107 Nguyen Oanh', '05762345684', 'Nothing!', '2021-11-12 11:48:32', 0),
(29, 535000, 10, 'Dương Duy Khoa', 'khoa12345@gmail.com', '108 Vo Oanh', '2233541212', 'Không có gì', '2021-11-12 15:48:48', 1),
(30, 337000, 1, 'Nguyễn Trung Thành', 'vietdinh105@gmail.com', '1008 Phường Tân Phú, Quận 9, thành phố Hồ Chí Minh', '0892365963', 'NICE PRODUCT', '2021-11-12 15:55:22', 1),
(31, 355000, 12, 'Đinh Hữu Nam', 'viet888@gmail.com', '182 Phường 29 Xã ABC Tỉnh XYZ', '0837756452', 'GOOD!', '2021-11-12 16:02:46', 2),
(32, 337000, 10, 'Trần Văn A', 'multiple@gmail.com', '900 Hoa Binh', '0159785354', '', '2021-11-13 11:30:09', 0),
(34, 609000, 10, 'Vũ Đức Lợi', 'multiple@gmail.com', '87 Le Thanh Tong', '0147258369', 'Free ship nha ', '2021-11-13 22:04:24', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `cat_id`) VALUES
(1, 'Bánh Quy Sữa', 'product-cake1-1.jpg', '<p><span style=\"font-size:14px\"><span style=\"color:#2980b9\">B&aacute;nh quy </span>nhiều lớp, giữa c&aacute;c lớp c&oacute; nh&acirc;n kem sữa ngọt. B&aacute;nh chứa bột, đường v&agrave; một số loại dầu hoặc chất b&eacute;o. B&aacute;nh quy bao gồm c&aacute;c th&agrave;nh phần kh&aacute;c như nho kh&ocirc;, yến mạch, s&ocirc; c&ocirc; la chip, c&aacute;c loại hạt, v.v.</span></p>\r\n', 76000, 1),
(2, 'Bánh Kem Việt Quất', 'product-cake1-2.jpg', '<p><strong><span style=\"color:#8e44ad\">M&aacute;t lạnh c&ugrave;ng với thị thanh của việt quất</span></strong></p>\r\n', 50000, 2),
(3, 'Bánh Vòng A', 'product-cake1-3.jpg', '<p><strong><span style=\"color:#e74c3c\">B&aacute;nh v&ograve;ng dinh dưỡng ăn v&agrave;o kh&ocirc;ng mập</span></strong></p>\r\n', 35000, 3),
(4, 'Cupcake sweet', 'imgslidefooter6.jpg', '<h4><span style=\"font-size:14px\"><span style=\"color:#e74c3c\"><strong>B&aacute;nh cupcake - phi&ecirc;n bản b&aacute;nh kem thu nhỏ</strong></span></span></h4>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/vao-bep/cach-phan-biet-banh-muffin-va-banh-cupcake-02623\">Cupcake</a> l&agrave; loại b&aacute;nh kem thu nhỏ, kh&ocirc;ng c&oacute; nh&acirc;n hoặc sử dụng nh&acirc;n ngọt, cốt b&aacute;nh thường nhẹ, mềm, vị ngọt tan v&agrave; c&oacute; lớp b&ocirc;ng kem ph&iacute;a tr&ecirc;n.</p>\r\n\r\n<p><span style=\"color:#c0392b\">Nguy&ecirc;n liệu</span> l&agrave;m l&agrave;m b&aacute;nh cupcake cũng tương tự như l&agrave;m b&aacute;nh kem lớn vậy, nhưng thợ l&agrave;m b&aacute;nh sẽ cho bột v&agrave;o khu&ocirc;n giấy nhỏ hơn rồi đem đi nướng.</p>\r\n\r\n<p>Sau đ&oacute;, mới trang tr&iacute; lớp b&ocirc;ng kem v&agrave; một số nguy&ecirc;n liệu kh&aacute;c để l&agrave;m cho b&aacute;nh cupcake trở n&ecirc;n bắt mắt hơn.</p>\r\n', 45000, 1),
(5, 'Bánh Kem Chocolate', 'seller-product-1.jpg', 'Bánh kem kết hợp hương vị chocolate đậm đà', 49000, 2),
(6, 'Bánh Kem Dâu', 'seller-product-2.jpg', 'Bánh kem kết hợp hương vị dâu tây tinh khiết', 55000, 99),
(7, 'Bánh Bông Lan', 'seller-product-3.jpg', 'Bánh Bông Lan mềm tươi ngon', 50000, 99),
(8, 'Bánh kem vanilla', 'seller-product-4.jpg', '<p><span style=\"color:#2980b9\">B&aacute;nh kem</span>&nbsp;vani mềm mịn thơm nhẹ hương vani,&nbsp;<em>b&aacute;nh kem</em>&nbsp;ngon, ko ngọt, ăn ko bị ng&aacute;n.</p>\r\n', 45000, 2),
(9, 'Bánh Quy', 'seller-product-3.jpg', 'Đây là loại bánh quy pha trộn với hương vị sữa tươi', 59000, 99),
(22, 'Bánh nhiều màu', 'product-cake1-4.jpg', '<p><span style=\"color:#e74c3c\">b&aacute;nh bao gồm 2 mặt b&aacute;nh ngọt ngọt được bọc bởi lớp socola b&ecirc;n ngo&agrave;i, ở giữa b&aacute;nh l&agrave; một lớp nh&acirc;n được l&agrave;m từ kẹo marshmallow m&agrave;u trắng c&oacute; vị ngọt v&agrave;o dẻo</span></p>\r\n', 35000, 101),
(23, 'Bánh hạnh nhân', 'product-cake1-3.jpg', 'NGON!', 54000, 102),
(27, 'Bánh Kem 3 Tầng', 'pro27_ec5339af-bce5-4de0-851f-b0bb3fe94c63.jpg', 'Bánh kem 3 tầng rất thích hợp cho những bữa tiệc hoành tráng', 220000, 2),
(28, 'Bánh quy mứt dâu', 'pro3.jpg', 'Bánh Quy phủ lớp sữa kèm mứt dâu mang mùi vị ngọt và thơm hương sữa', 25000, 1),
(29, 'Bánh Plan Cherry', 'pro14.jpg', 'Bánh flan có vị béo của trứng và mùi thơm từ sữa, khi ăn mềm tan trong miệng dễ dàng chinh phục khẩu vị của bất cứ ai, từ trẻ em cho tới người lớn. ', 55000, 102),
(30, 'Cupcake trái cây', 'pro5.jpg', '<p><strong><em>Nguy&ecirc;n liệu:</em></strong> <span style=\"color:#e74c3c\">Trứng, Nước cốt chanh, d&acirc;u, việt quất</span></p>\r\n', 40000, 4),
(31, 'Bánh ngọt chocolate', 'pro19.jpg', 'Bánh socola với lớp socola vị ca cao béo, thơm mà không bị đắng phủ bên ngoài lớp bánh xốp mịn rất ngon. Kẹp giữa của Bánh vị ca cao là lớp kem marshmallow dẻo thơm. (3 cái)', 20000, 99),
(32, 'Su kem dâu', 'pro22_cf5f4b91-2ef5-4ffd-a5e4-fae215bfcecc.jpg', '<p><span style=\"color:#27ae60\">B&aacute;nh kem l&agrave; một loại b&aacute;nh thường c&oacute; &yacute; nghĩa quan trọng v&agrave; đặc biệt nhất trong dịp kỷ niệm sinh nhật của người d&ugrave;ng. Đ&acirc;y l&agrave; một loại b&aacute;nh ngọt dạng th&aacute;p như b&aacute;nh b&ocirc;ng lan xốp v&agrave; được phủ l&ecirc;n một lớp kem d&agrave;y hoặc mỏng vừa để trang tr&iacute; vừa để tăng th&ecirc;m hương</span></p>\r\n', 15000, 99),
(33, 'Giảm giá 6', 'pro24.jpg', 'Bánh kem là một loại bánh thường có ý nghĩa quan trọng và đặc biệt nhất trong dịp kỷ niệm sinh nhật của người dùng. Đây là một loại bánh ngọt dạng tháp như bánh bông lan xốp và được phủ lên một lớp kem dày hoặc mỏng vừa để trang trí vừa để tăng thêm hương', 30000, 99),
(34, 'bánh nhân marshmalow', 'pro2.jpg', '<p><span style=\"color:#8e44ad\">Vẻ bề ngo&agrave;i đơn giản nhưng b&ecirc;n trong lại chứa đựng hương vị tinh tế, thanh nhẹ l&agrave; những g&igrave; m&agrave; người ta mi&ecirc;u tả về b&aacute;nh su kem &ndash; loại b&aacute;nh đến từ nước Ph&aacute;p xi', 34000, 104),
(35, 'Su kem sầu riêng', 'banh-su-kem-sau-rieng.jpg', '<p><span style=\"color:#e74c3c\"><strong>Vẻ bề ngo&agrave;i đơn giản nhưng b&ecirc;n trong lại chứa đựng hương vị tinh tế, thanh nhẹ l&agrave; những g&igrave; m&agrave; người ta mi&ecirc;u tả về b&aacute;nh su kem &ndash; loại b&aacute;nh đến từ nước Ph&aacute;p xinh đẹp.</strong></span></p>\r\n\r\n<p><span style=\"color:#8e44ad\"><em>B&aacute;nh su c&ograve;n c&oacute; nhiều t&ecirc;n gọi kh&aacute;c như <strong>choux &agrave; la creme</strong>, <strong>profiterole</strong> hay người Việt vẫn gọi l&agrave; b&aacute;nh su hột g&agrave;. Lớp vỏ thuộc d&ograve;ng <strong>choux pastry</strong> nhẹ, kh&ocirc;, ẩm b&ecirc;n trong nhưng gi&ograve;n dai b&ecirc;n ngo&agrave;i.</em></span></p>\r\n', 34000, 108),
(36, 'Su kem Singapore', 'banh-su-kem-singapore-bat-mat-600x400.jpg', '<p><span style=\"color:#e74c3c\"><em>B&aacute;nh Su Kem Singapore&nbsp; &ndash; Hương vị ngọt ng&agrave;o, thơm ngon của b&aacute;nh su Singapore chắc hẳn đ&atilde; khiến kh&ocirc;ng &iacute;t người phải m&ecirc; mẩn v&agrave; &ldquo;tương tư&rdquo;. Tuy nhi&ecirc;n, gi&aacute; th&agrave;nh của loại b&aacute;nh n&agrave;y tr&ecirc;n thị trường n&agrave;y lại kh&ocirc;ng hề dễ chịu.</em></span></p>\r\n\r\n<p>Ngay từ khi xuất hiện tr&ecirc;n thị trường Việt,&nbsp;<strong>b&aacute;nh su Singapore</strong>&nbsp;đ&atilde; nhanh ch&oacute;ng tạo th&agrave;nh một cơn sốt trong giới trẻ. Đều l&agrave; b&aacute;nh su nhưng m&oacute;n b&aacute;nh n&agrave;y lại c&oacute; hương vị kh&aacute;c hẳn v&agrave; hấp dẫn hơn rất nhiều so với b&aacute;nh su kem truyền thống.</p>\r\n\r\n<p>Vỏ b&aacute;nh vừa mềm mềm lại c&oacute; độ dai đặc trưng, nh&acirc;n b&aacute;nh ngọt ng&agrave;o kết hợp c&ugrave;ng topping được th&ecirc;m l&ecirc;n mặt b&aacute;nh th&igrave; quả thật l&agrave; cực phẩm.</p>\r\n', 45000, 108),
(37, 'Bông Lan bơ', 'imgslidefooter6.jpg', '<p><strong><span style=\"color:#ffffff\"><span style=\"background-color:#8e44ad\">High-fat cake</span></span> c</strong>h&iacute;nh l&agrave; d&ograve;ng b&aacute;nh b&ocirc;ng lan ngọt cổ điển chứa nhiều chất b&eacute;o như dầu bơ. V&igrave; vậy b&aacute;nh c&oacute; độ mềm mại cộng với độ phồng từ muối nở. B&aacute;nh c&oacute; kết cấu ẩm, tơi v&agrave; nở c&ugrave;ng vị thơm ngậy của bơ, l&agrave; vị b&ocirc;ng lan ưa th&iacute;ch của nhiều người.</p>\r\n', 25000, 4),
(38, 'Cupcake kem', 'cupcakekem.jpg', '<p><span style=\"font-size:16px\"><span style=\"color:#2980b9\"><strong>B&aacute;nh cupcake</strong> </span>được trang tr&iacute; kh&aacute; cầu k&igrave; với lớp b&ocirc;ng kem ph&iacute;a tr&ecirc;n, vừa l&agrave; m&oacute;n b&aacute;nh thưởng thức tại nh&agrave;, lại vừa c&oacute; thể l&agrave;m qu&agrave; tặng d&agrave;nh cho bạn b&egrave;, người th&acirc;n nh&acirc;n dịp đặc biệt.</span></p>\r\n', 35000, 1);

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
(10, 'Vietdz123', 'c0a2ec07370475c8a163d23815a89378', 'multiple@gmail.com', '0159785354', 'Trần Văn A', '900 Hoa Binh', 1, '2021-11-06 22:27:29', 1),
(11, 'dododo123', 'd9e9bc0a9e53769f067a115037c03a6f', 'viet18@gmail.com', NULL, NULL, NULL, 0, '2021-11-09 11:09:34', 1),
(12, 'dododo98', 'd9e9bc0a9e53769f067a115037c03a6f', 'viet888@gmail.com', NULL, NULL, NULL, 0, '2021-11-12 16:00:48', 1);

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
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `order-details`
--
ALTER TABLE `order-details`
  MODIFY `orderdetail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `order-info`
--
ALTER TABLE `order-info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
