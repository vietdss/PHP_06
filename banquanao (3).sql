-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 07, 2024 lúc 12:11 PM
-- Phiên bản máy phục vụ: 8.0.17
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id_blog` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `ngaydang` date NOT NULL,
  `hinhanhblog` varchar(100) NOT NULL,
  `noidung` text NOT NULL,
  `tomtat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`id_blog`, `tieude`, `ngaydang`, `hinhanhblog`, `noidung`, `tomtat`) VALUES
(3, '1', '2024-06-07', 'blog_3.jpg', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n\r\n<blockquote>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>\r\n</blockquote>\r\n\r\n<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n\r\n<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_3.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_3.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_4.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_4.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\" /></a></p>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 32px; left: 27.2375px;\"><img src=\"chrome-extension://cianljdimgjlpmjllcbahmpdnicglaap/logo/48.png\" /></div>\r\n', '2'),
(4, '1', '2024-06-07', 'blog_2.jpg', '2', '2'),
(5, '1', '2024-06-07', 'blog_1.jpg', '<p>&nbsp;</p>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n\r\n<blockquote>\r\n<p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn&rsquo;t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>\r\n</blockquote>\r\n\r\n<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>\r\n\r\n<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_3.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_3.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_4.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_4.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_1.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\"><img alt=\"Image\" src=\"https://preview.colorlib.com/theme/magdesign/images/post_lg_2.jpg\" /></a></p>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n\r\n<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_items`
--

INSERT INTO `tbl_cart_items` (`cart_item_id`, `id_giohang`, `id_sanpham`, `soluongmua`, `gia`) VALUES
(39, 5, 41, 3, 30),
(40, 5, 34, 1, 3),
(41, 5, 39, 1, 8),
(42, 5, 38, 2, 14),
(43, 5, 40, 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id_order_detail`, `id_order`, `id_sanpham`, `soluongmua`) VALUES
(2, 23, 41, 3),
(3, 23, 40, 1),
(4, 24, 41, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`) VALUES
(10, 'Nguyễn Hoàng Việt', 'viet1', '1', 123456789, 'a@gmail.com'),
(11, 'Nguyễn Việt', 'viet2', '2', 123456789, 'a@gmail.com'),
(12, 'viet3', 'viet3', '3', 1, '1000nghia1000@gmial.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `banner`) VALUES
(1, 'Womens', 'banner_1.jpg'),
(2, 'Accessories', 'banner_2.jpg'),
(12, 'Mens', 'banner_3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `order_id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `tonggia` float NOT NULL,
  `cart_payment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`order_id`, `id_khachhang`, `tonggia`, `cart_payment`, `hoten`, `diachi`, `sdt`, `thoigian`) VALUES
(24, 10, 30, 'Tiền mặt', 'Nguyễn Hoàng Việt', 'Tỉnh Phú Thọ, Thị xã Phú Thọ, Phường Âu Cơ', 123456789, '2024-06-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_giohang`, `id_khachhang`) VALUES
(5, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `id_lienhe` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_lienhe`
--

INSERT INTO `tbl_lienhe` (`id_lienhe`, `name`, `email`, `message`) VALUES
(1, '1', '1000nghia1000@gmial.com', '1'),
(2, '1', '1000nghia1000@gmial.com', '1'),
(3, '1', '1000nghia1000@gmial.com', '1'),
(4, 'a', 'a@gmail.coma', 'a'),
(5, 'aa', 'a@gmail.coma', 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `id_danhmuc`, `trangthai`) VALUES
(21, '1', '', 0, 0, 'blog_3.jpg', '', '', 0, 0),
(32, '1', '1', 1, 0, 'product_1.png', '1', '1', 12, 1),
(33, '2', '2', 2, 2, 'product_2.png', '2', '2', 1, 1),
(34, '3', '3', 3, 3, 'product_3.png', '3', '3', 1, 1),
(35, '4', '4', 4, 4, 'product_4.png', '4', '4', 2, 1),
(36, '5', '5', 5, 5, 'product_5.png', '5', '5', 1, 1),
(37, '6', '6', 6, 6, 'product_6.png', '6', '6', 2, 1),
(38, '7', '7', 7, 7, 'product_7.png', '7', '7', 1, 1),
(39, '8', '8', 8, 8, 'product_8.png', '8', '8', 2, 1),
(40, '10', '9', 9, 9, 'product_9.png', '9', '9', 12, 1),
(41, '10', '10', 10, 10, 'product_10.png', '10', '10', 12, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `id_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
