-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 31, 2024 lúc 07:21 AM
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
-- Cấu trúc bảng cho bảng `tbl_cart_items`
--

CREATE TABLE `tbl_cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `chucvu`) VALUES
(1, 'Nguyễn Minh Tâm', 'maki', 'c4ca4238a0b923820dcc509a6f75849b', 569029353, 'mikuohandsome@gmail.com', 1),
(9, 'Lê Văn Hùng', 'lehung', '202cb962ac59075b964b07152d234b70', 123456, 'lehung@gmail.com', 0),
(10, 'Nguyễn Hoàng Việt', 'viet1', '1', 123456789, 'a@gmail.com', 1),
(11, 'Nguyễn Việt', 'viet2', '2', 123456789, 'a@gmail.com', 1);

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
(12, 'Mens', 'Screenshot 2024-01-16 092114.png');

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
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`order_id`, `id_khachhang`, `tonggia`, `cart_payment`, `hoten`, `diachi`, `sdt`) VALUES
(13, 10, 1700000, 'Chuyển khoản', 'Nguyễn Hoàng Việt', '', 123456789),
(14, 10, 3400000, 'Tiền mặt', 'Nguyễn Hoàng Việt', '', 123456789),
(15, 10, 35089000, 'Tiền mặt', 'Nguyễn Hoàng Việt', '', 123456789),
(16, 10, 3300000, 'Tiền mặt', 'Nguyễn Hoàng Việt', '02, 028, 00835', 123456789),
(17, 10, 0, 'Tiền mặt', 'Nguyễn Hoàng Việt', '30, 290, 10603', 123456789),
(18, 10, 0, 'Tiền mặt', 'Nguyễn Hoàng Việt', 'Tỉnh Hà Giang, Huyện Mèo Vạc, Xã Xín Cái', 123456789);

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
(5, 'Đồng hồ Thụy Sĩ', 'MHAQUA', 1000000, 2, 'mvw-ml005-02-nam-2-org.jpg', '', '', 2, 1),
(6, 'CASIO 25.2 mm Nữ LTP-1130A-7BRDF', 'MHFBK', 1200000, 1, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Thiết kế của đồng hồ Sheen luôn bắt mắt người đeo bởi mặt đồng hồ đa dạng và tinh tế. Những mẫu đồng hồ dành riêng cho cô nàng có phong cách cá tính và ưa thích sự mới lạ. Điểm chung của d', '', 1, 0),
(7, 'Đồng hồ MVW 40 mm Nam ML005-02', 'MHOKU', 1500000, 1, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', '', '', 2, 1),
(8, 'Đồng hồ Masstel Smart Hero 4G', 'MHAQUACB', 500000, 12, 'befit-b3-vang-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 1, 0),
(10, 'Đồng hồ cơ Rolex 3X', 'MTBHiV', 3000000, 3, 'mvw-ml005-02-nam-2-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 1, 0),
(11, 'Đồng hồ thể thao A531', 'GDUGN0', 3000000, 1, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 2, 0),
(12, 'Đồng hồ G-Shock Z123', 'MTBJG', 3500000, 1, 'g-shock-gba-900-1a6dr-nam-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 1, 0),
(13, 'Đồng hồ SamSung A7', 'MHCBKOMI', 700000, 2, 'beu-active-1-2-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 1, 1),
(14, 'Đồng hồ Apple Watch 5.0 Seris', 'MHGSBARA', 1700000, 2, 'beu-b3-den-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 1, 1),
(15, 'Đồng hồ thông minh Smart Watch 2', 'MHSAWH', 1600000, 27, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 2, 1),
(16, 'Đồng hồ Rolex Thụy Sĩ', 'MHCBMATSURI', 15000000, 1, 'dong-ho-nam-citizen-bi5051-51a-trang-ga-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn phòng', '', 2, 0),
(17, 'Đồng hồ thông minh Smart Watch 2', 'asdfdf', 13990000, 12, 'befit-b3-vang-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 1, 0),
(18, 'Đồng hồ G-Shock Z123', 'fsddf', 2990000, 5, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 2, 0),
(19, 'Đồng hồ thể thao A531', 'vcf', 19990000, 3, 'mvw-ml005-02-nam-2-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 12, 1),
(20, 'Đồng hồ SamSung A7', 'vcfs', 5999000, 1, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 12, 1),
(21, '1', '', 0, 0, 'blog_3.jpg', '', '', 0, 0),
(22, '1', '', 0, 1, 'banner_2.jpg', '1', '1', 2, 1),
(23, '2', '', 0, 2, 'banner_3.jpg', '2', '2', 2, 1),
(24, '3', '', 5, 6, 'banner_1.jpg', '3', '3', 12, 1),
(31, 'ddsadsa', 'dsa', 0, 0, 'Screenshot 2024-02-26 145742.png', 'dsa', '', 12, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

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
-- AUTO_INCREMENT cho bảng `tbl_cart_items`
--
ALTER TABLE `tbl_cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
