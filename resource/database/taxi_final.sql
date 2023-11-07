-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 08:24 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `taxi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenxe`
--

CREATE TABLE `chuyenxe` (
  `CX_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `CX_SOKM` float NOT NULL,
  `CX_THANHTIEN` float(8,2) NOT NULL,
  `CX_TDDIEMDI_X` text NOT NULL,
  `CX_TDDIEMDI_Y` text NOT NULL,
  `CX_TDDIEMDEN_X` text NOT NULL,
  `CX_TDDIEMDEN_Y` text NOT NULL,
  `CX_TRANGTHAI` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenxe`
--

INSERT INTO `chuyenxe` (`CX_MA`, `KH_MA`, `TX_MA`, `TD_DATE`, `CX_SOKM`, `CX_THANHTIEN`, `CX_TDDIEMDI_X`, `CX_TDDIEMDI_Y`, `CX_TDDIEMDEN_X`, `CX_TDDIEMDEN_Y`, `CX_TRANGTHAI`) VALUES
(1, 3, 6, '2023-09-28 00:00:00', 4, 150000.00, '10.03002', '105.77202', '10.02914', '105.77167', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `DG_MA` int(11) NOT NULL,
  `CX_MA` int(11) NOT NULL,
  `TC_MA` int(11) NOT NULL,
  `DG_SAO` decimal(5,0) NOT NULL,
  `DG_NOIDUNG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`DG_MA`, `CX_MA`, `TC_MA`, `DG_SAO`, `DG_NOIDUNG`) VALUES
(1, 1, 1, 4, 'Oke');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dgtieuchi`
--

CREATE TABLE `dgtieuchi` (
  `DG_MA` int(11) NOT NULL,
  `TC_MA` int(11) NOT NULL,
  `TX_MA` int(11) NOT NULL,
  `DGTC_DIEM` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dgtieuchi`
--

INSERT INTO `dgtieuchi` (`DG_MA`, `TC_MA`, `TX_MA`, `DGTC_DIEM`) VALUES
(1, 2, 2, 6),
(3, 4, 2, 10),
(2, 3, 3, 8),
(4, 4, 4, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `TD_DATE` datetime NOT NULL,
  `GC_MA` int(11) NOT NULL,
  `LX_MA` int(11) NOT NULL,
  `G_TIEN` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`TD_DATE`, `GC_MA`, `LX_MA`, `G_TIEN`) VALUES
('2023-09-28 00:00:00', 1, 1, 15000.00),
('2023-09-28 00:00:00', 1, 2, 20000.00),
('2023-09-28 00:00:00', 1, 3, 10000.00),
('2023-09-28 00:00:00', 1, 4, 12000.00),
('2023-09-28 00:00:00', 1, 5, 15000.00),
('2023-09-28 00:00:00', 1, 6, 15000.00),
('2023-09-28 00:00:00', 1, 7, 12000.00),
('2023-09-28 00:00:00', 1, 8, 10000.00),
('2023-09-28 00:00:00', 1, 9, 15000.00),
('2023-09-28 00:00:00', 1, 10, 10000.00),
('2023-09-28 00:00:00', 2, 1, 10000.00),
('2023-09-28 00:00:00', 2, 2, 15000.00),
('2023-09-28 00:00:00', 2, 3, 7000.00),
('2023-09-28 00:00:00', 2, 4, 10000.00),
('2023-09-28 00:00:00', 2, 5, 10000.00),
('2023-09-28 00:00:00', 2, 6, 10000.00),
('2023-09-28 00:00:00', 2, 7, 10000.00),
('2023-09-28 00:00:00', 2, 8, 8000.00),
('2023-09-28 00:00:00', 2, 9, 10000.00),
('2023-09-28 00:00:00', 2, 10, 7000.00),
('2023-09-28 00:00:00', 3, 1, 5000.00),
('2023-09-28 00:00:00', 3, 2, 10000.00),
('2023-09-28 00:00:00', 3, 3, 5000.00),
('2023-09-28 00:00:00', 3, 4, 8000.00),
('2023-09-28 00:00:00', 3, 5, 5000.00),
('2023-09-28 00:00:00', 3, 6, 8000.00),
('2023-09-28 00:00:00', 3, 7, 8000.00),
('2023-09-28 00:00:00', 3, 8, 5000.00),
('2023-09-28 00:00:00', 3, 9, 5000.00),
('2023-09-28 00:00:00', 3, 10, 5000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giacuoc`
--

CREATE TABLE `giacuoc` (
  `GC_MA` int(11) NOT NULL,
  `GC_CANTREN` float NOT NULL,
  `GC_CANDUOI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giacuoc`
--

INSERT INTO `giacuoc` (`GC_MA`, `GC_CANTREN`, `GC_CANDUOI`) VALUES
(1, 5, 0),
(2, 10, 6),
(3, 50, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(11) NOT NULL,
  `QH_MA` int(11) NOT NULL,
  `KH_TEN` varchar(50) NOT NULL,
  `KH_SDT` varchar(10) NOT NULL,
  `KH_EMAIL` varchar(30) NOT NULL,
  `KH_USERNAME` varchar(30) NOT NULL,
  `KH_PASSWORD` varchar(100) NOT NULL,
  `KH_GIOITINH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `QH_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_USERNAME`, `KH_PASSWORD`, `KH_GIOITINH`) VALUES
(1, 1, 'Duy Chủ Tịch', '0939826024', 'duybii922002@gmail.com', 'duychutich', '202cb962ac59075b964b07152d234b70', 1),
(2, 1, 'Nguyễn Đỗ Phúc Vinh', '0123456789', 'vinhtop8@gmail.com', 'vinhtop8', '202cb962ac59075b964b07152d234b70', 1),
(3, 1, 'Nguyễn Thị Phương Thư', '0987654321', 'pthuxinhdep@gmail.com', 'phuongthu', '202cb962ac59075b964b07152d234b70', 0),
(5, 1, 'Trần Thanh Kiệp', '0135792468', 'kiep@gmail.com', 'kiep', '202cb962ac59075b964b07152d234b70', 1),
(6, 14, 'D', '0123456789', 'duybii922002@gmail.com', 'd', '202cb962ac59075b964b07152d234b70', 1),
(7, 1, 'V', '0123456789', 'vinhtop8@gmail.com', 'v', '202cb962ac59075b964b07152d234b70', 1),
(8, 3, 'Yii', '0939826024', 'duybii922002@gmail.com', 'Duy', '202cb962ac59075b964b07152d234b70', 1),
(9, 1, 'Kiệp Lặc', '0147258369', 'kiep123@gmail.com', 'kieplac', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixe`
--

CREATE TABLE `loaixe` (
  `LX_MA` int(11) NOT NULL,
  `LX_MODEL` varchar(30) NOT NULL,
  `LX_SOCHO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`LX_MA`, `LX_MODEL`, `LX_SOCHO`) VALUES
(1, 'HATCH BACK', 4),
(2, 'SEDAN', 4),
(3, 'SUV', 7),
(4, 'MPV', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(11) NOT NULL,
  `QH_MA` int(11) DEFAULT NULL,
  `VT_MA` int(11) DEFAULT NULL,
  `NV_TEN` varchar(50) NOT NULL,
  `NV_SDT` varchar(10) NOT NULL,
  `NV_EMAIL` varchar(30) NOT NULL,
  `NV_USERNAME` varchar(30) NOT NULL,
  `NV_PASSWORD` varchar(100) NOT NULL,
  `NV_GIOITINH` tinyint(1) NOT NULL,
  `NV_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `QH_MA`, `VT_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_USERNAME`, `NV_PASSWORD`, `NV_GIOITINH`, `NV_HINHANH`) VALUES
(1, 3, 2, 'Nguyễn Thị Lan', '0123456789', 'lan@gmail.com', 'lan', '123', 0, NULL),
(2, 5, 2, 'Nguyễn Thị Thắm', '0123456788', 'tham@gmail.com', 'tham', '123', 0, NULL),
(3, 8, 2, 'Huỳnh Thạch Thảo', '0123456787', 'thao@gmail.com', 'thao', '123', 0, NULL),
(4, 6, 1, 'Trần Minh Khéo', '0123456786', 'kheo@gmail.com', 'kheo', '123', 1, NULL),
(5, 3, 2, 'Yii Quản Lý', '0123456783', 'yii@gmail.com', 'yii', '202cb962ac59075b964b07152d234b70', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phutrach`
--

CREATE TABLE `phutrach` (
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `X_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phutrach`
--

INSERT INTO `phutrach` (`TX_MA`, `TD_DATE`, `X_MA`) VALUES
(2, '2023-09-22 08:00:00', 2),
(3, '2023-09-22 00:00:00', 3),
(4, '2023-09-22 08:00:00', 4),
(5, '2023-09-22 08:00:00', 5),
(6, '2023-09-22 08:00:00', 6),
(7, '2023-09-22 08:00:00', 7),
(8, '2023-09-22 00:00:00', 8),
(9, '2023-09-22 08:00:00', 9),
(10, '2023-09-22 08:00:00', 10),
(25, '2023-10-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_MA` int(11) NOT NULL,
  `TP_MA` int(11) NOT NULL,
  `QH_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`QH_MA`, `TP_MA`, `QH_TEN`) VALUES
(1, 1, 'Quận Ninh Kiều'),
(2, 1, 'Quận Cái Răng'),
(3, 1, 'Quận Bình Thủy'),
(4, 1, 'Quận Ô Môn'),
(5, 1, 'Huyện Phong Điền'),
(6, 1, 'Huyện Thốt Nốt'),
(7, 1, 'Huyện Cờ Đỏ'),
(8, 2, 'Thị xã Vĩnh Châu'),
(9, 2, 'Huyện Mỹ Xuyên'),
(10, 2, 'Huyện Kế Sách'),
(11, 2, 'Huyện Trần Đề'),
(12, 2, 'Huyện Châu Thành'),
(13, 2, 'Huyện Long Phú'),
(14, 2, 'Huyện Mỹ Tú'),
(15, 2, 'Thị xã Ngã Năm'),
(16, 2, 'Huyện Thạch Trị'),
(17, 2, 'Huyện Cù Lao Dung'),
(18, 4, 'Huyện Bình Tân'),
(19, 4, 'Huyện Long Hồ'),
(20, 4, 'Huyện Mang Thít'),
(21, 4, 'Huyện Tam Bình'),
(22, 4, 'Huyện Trà Ôn'),
(23, 4, 'Huyện Vũng Liêm'),
(24, 4, 'Thị Xã Bình Minh'),
(25, 3, 'Huyện Châu Thành'),
(26, 3, 'Huyện Châu Thành A'),
(27, 3, 'Thị xã Ngã Bảy'),
(28, 3, 'huyện Phụng Hiệp'),
(29, 3, 'Thành phố Vị Thanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixe`
--

CREATE TABLE `taixe` (
  `TX_MA` int(11) NOT NULL,
  `VT_MA` int(11) NOT NULL,
  `TX_TEN` varchar(30) NOT NULL,
  `TX_BANGLAI` char(3) NOT NULL,
  `TX_SDT` char(10) NOT NULL,
  `TX_USERNAME` varchar(30) NOT NULL,
  `TX_PASSWORD` varchar(100) NOT NULL,
  `TX_GIOITINH` tinyint(1) NOT NULL,
  `TX_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taixe`
--

INSERT INTO `taixe` (`TX_MA`, `VT_MA`, `TX_TEN`, `TX_BANGLAI`, `TX_SDT`, `TX_USERNAME`, `TX_PASSWORD`, `TX_GIOITINH`, `TX_HINHANH`) VALUES
(2, 1, 'Phước Vinh', 'C2', '01', 'vinh', '123', 1, NULL),
(3, 1, 'Trần Văn Hùng', 'C1', '02', 'hung', '123', 1, NULL),
(4, 1, 'Trần Thị Linh', 'D1', '03', 'linh', '123', 0, NULL),
(5, 1, 'Lê Dương Bảo Lâm', 'C2', '0123456789', 'lam', '202cb962ac59075b964b07152d234b70', 1, NULL),
(6, 1, 'Hiếu Thứ Hai', 'C1', '0939123456', 'hieuthuhai', '202cb962ac59075b964b07152d234b70', 1, NULL),
(7, 1, 'Nguyễn Thanh Tùng', 'C2', '0939456789', 'sontungmtp', '202cb962ac59075b964b07152d234b70', 1, NULL),
(8, 1, 'Trần Phương Ly', 'C1', '0939246357', 'phuongly', '202cb962ac59075b964b07152d234b70', 0, NULL),
(9, 1, 'Ngô Kiến Huy', 'D1', '0939147289', 'ngokienhuy', '202cb962ac59075b964b07152d234b70', 1, NULL),
(10, 1, 'Ninh Dương Lan Ngọc', 'C1', '0939258147', 'lanngoc', '202cb962ac59075b964b07152d234b70', 0, NULL),
(11, 1, 'Lâm Vĩ Dạ', 'C1', '0939369369', 'vida', '202cb962ac59075b964b07152d234b70', 0, NULL),
(12, 1, 'Bùi Thị Bích Phương', 'C2', '0939111111', 'bichphuong', '202cb962ac59075b964b07152d234b70', 0, NULL),
(13, 1, 'Huỳnh Trấn Thành', 'D1', '0939222222', 'tranthanh', '202cb962ac59075b964b07152d234b70', 1, NULL),
(14, 1, 'Nguyễn Tiến Luật', 'D1', '0939258258', 'tienluat', '202cb962ac59075b964b07152d234b70', 1, NULL),
(15, 1, 'Kiều Minh Tuấn', 'C1', '0939888888', 'minhtuan', '202cb962ac59075b964b07152d234b70', 1, NULL),
(16, 1, 'Huỳnh Lập', 'D1', '0939999999', 'huynhlap', '202cb962ac59075b964b07152d234b70', 1, NULL),
(17, 1, 'Nguyễn Việt Hoàng', 'C1', '0939147278', 'mono', '202cb962ac59075b964b07152d234b70', 1, NULL),
(18, 1, 'Võ Hoài Linh', 'D1', '0939258166', 'hoailinh', '202cb962ac59075b964b07152d234b70', 1, NULL),
(19, 1, 'Nguyễn Trúc Nhân', 'C2', '0939369399', 'trucnhan', '202cb962ac59075b964b07152d234b70', 1, NULL),
(20, 1, 'Vinh Râu', 'D1', '0939111222', 'vinhrau', '202cb962ac59075b964b07152d234b70', 1, NULL),
(21, 1, 'Lê Nguyễn Trung Đan', 'D1', '0939222333', 'binz', '202cb962ac59075b964b07152d234b70', 1, NULL),
(22, 1, 'Phạm Hoàng Khoa', 'C1', '0939258999', 'karik', '202cb962ac59075b964b07152d234b70', 1, NULL),
(23, 1, 'Nghiêm Vũ Hoàng Long', 'C1', '0939888999', 'mck', '202cb962ac59075b964b07152d234b70', 1, NULL),
(24, 1, 'Thịnh Suy', 'D1', '0939999111', 'thinhsuy', '202cb962ac59075b964b07152d234b70', 1, NULL),
(25, 1, 'John Cenna', 'C1', '0858801302', 'johncenna', '202cb962ac59075b964b07152d234b70', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `TP_MA` int(11) NOT NULL,
  `TP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`TP_MA`, `TP_TEN`) VALUES
(1, 'Cần Thơ'),
(2, 'Sóc Trăng'),
(3, 'Hậu Giang'),
(4, 'Vĩnh Long');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoidiem`
--

CREATE TABLE `thoidiem` (
  `TD_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoidiem`
--

INSERT INTO `thoidiem` (`TD_DATE`) VALUES
('2023-09-22 08:00:00'),
('2023-09-28 00:00:00'),
('2023-10-02 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi`
--

CREATE TABLE `tieuchi` (
  `TC_MA` int(11) NOT NULL,
  `TC_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuchi`
--

INSERT INTO `tieuchi` (`TC_MA`, `TC_TEN`) VALUES
(1, 'Tệ'),
(2, 'Tốt '),
(3, 'Bình thường '),
(4, 'Rất tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `TT_TRANGTHAI` tinyint(1) NOT NULL,
  `TT_TOADOX` text NOT NULL,
  `TT_TOADOY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`TX_MA`, `TD_DATE`, `TT_TRANGTHAI`, `TT_TOADOX`, `TT_TOADOY`) VALUES
(2, '2023-10-02 00:00:00', 1, '10.032729', '105.774329'),
(3, '2023-10-02 00:00:00', 1, '10.02780', '105.77006'),
(4, '2023-10-02 00:00:00', 1, '10.030492', '105.76904'),
(5, '2023-10-02 00:00:00', 1, '10.035384', '105.780897'),
(6, '2023-10-02 00:00:00', 0, '10.056775', '105.778673'),
(7, '2023-10-02 00:00:00', 1, '10.0314', '105.775036'),
(8, '2023-10-02 00:00:00', 1, '10.024951', '105.768342'),
(9, '2023-10-02 00:00:00', 1, '10.024362', '105.760993'),
(10, '2023-10-02 00:00:00', 1, '10.043413', '105.765896'),
(11, '2023-10-02 00:00:00', 1, '10.035765', '105.775423'),
(12, '2023-10-02 00:00:00', 1, '10.038729', '105.760639'),
(13, '2023-10-02 00:00:00', 1, '10.032002', '105.762538'),
(14, '2023-10-02 00:00:00', 1, '10.047543', '105.782161'),
(15, '2023-10-02 00:00:00', 1, '10.034444', '105.748386'),
(16, '2023-10-02 00:00:00', 1, '10.026412', '105.780573'),
(17, '2023-10-02 00:00:00', 1, '10.039602', '105.769908'),
(18, '2023-10-02 00:00:00', 1, '10.036039', '105.766003'),
(19, '2023-10-02 00:00:00', 1, '10.02788', '105.766861'),
(20, '2023-10-02 00:00:00', 1, '10.035012', '105.785723'),
(21, '2023-10-02 00:00:00', 1, '10.046654', '105.760853'),
(22, '2023-10-02 00:00:00', 1, '10.031687', '105.758069'),
(23, '2023-10-02 00:00:00', 1, '10.021414', '105.754523'),
(24, '2023-10-02 00:00:00', 1, '10.031562', '105.787053');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `VT_MA` int(11) NOT NULL,
  `VT_TEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`VT_MA`, `VT_TEN`) VALUES
(1, 'Tài xế'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `X_MA` int(11) NOT NULL,
  `LX_MA` int(11) NOT NULL,
  `X_BIENSO` varchar(10) NOT NULL,
  `X_MOTA` text NOT NULL,
  `X_HINHANH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`X_MA`, `LX_MA`, `X_BIENSO`, `X_MOTA`, `X_HINHANH`) VALUES
(1, 1, '65A-12345', 'Mitsubishi Mirage màu xám', 'xe1.jpg'),
(2, 1, '65A-12346', 'Hyundai Grand i10 màu trắng', 'xe2.jpg'),
(3, 1, '65A-12347', 'Ford Fiesta màu trắng', 'xe3.jpg'),
(4, 2, '65A-12348', 'Toyota Vios màu đen', 'xe4.jpg'),
(5, 2, '65A-12349', 'Honda City màu trắng', 'xe5.jpg'),
(6, 2, '65A-12340', 'Hyundai Accent màu đỏ', 'xe6.jpg'),
(7, 3, '65A-13345', 'Toyota Corolla Cross màu đen', 'xe7.jpg'),
(8, 3, '65A-13445', 'Honda CR-V màu xám', 'xe8.jpg'),
(9, 4, '65A-13455', 'Mitsubishi Xpander màu đen', 'xe9.jpg'),
(10, 4, '65A-12445', 'Toyota Avanza màu đen', 'xe10.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD PRIMARY KEY (`CX_MA`),
  ADD KEY `FK_DAT_XE` (`KH_MA`),
  ADD KEY `FK_THUC_HIEN_BOI` (`TX_MA`),
  ADD KEY `FK_THUC_HIEN_LUC` (`TD_DATE`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`DG_MA`),
  ADD KEY `FK_THEO_TIEU_CHI` (`TC_MA`,`CX_MA`) USING BTREE,
  ADD KEY `FK_DANH_GIA_CHO` (`CX_MA`);

--
-- Chỉ mục cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD UNIQUE KEY `FK_CO_DG` (`TX_MA`,`TC_MA`,`DG_MA`) USING BTREE,
  ADD KEY `co_tieu_chi` (`TC_MA`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`TD_DATE`,`GC_MA`,`LX_MA`),
  ADD KEY `FK_CO_CHI_TIET_GIA` (`GC_MA`),
  ADD KEY `FK_THEO` (`LX_MA`);

--
-- Chỉ mục cho bảng `giacuoc`
--
ALTER TABLE `giacuoc`
  ADD PRIMARY KEY (`GC_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`),
  ADD KEY `FK_CO_DIA_CHI` (`QH_MA`);

--
-- Chỉ mục cho bảng `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`LX_MA`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`),
  ADD KEY `FK_CO_VAI_TRO` (`VT_MA`),
  ADD KEY `FK_DIA_CHI_NV` (`QH_MA`);

--
-- Chỉ mục cho bảng `phutrach`
--
ALTER TABLE `phutrach`
  ADD PRIMARY KEY (`TX_MA`),
  ADD KEY `FK_DUOC_PHU_TRACH` (`X_MA`),
  ADD KEY `FK_PHU_TRACH_TAI_TD` (`TD_DATE`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_MA`),
  ADD KEY `FK_BAO_GOM` (`TP_MA`);

--
-- Chỉ mục cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD PRIMARY KEY (`TX_MA`),
  ADD KEY `vitri` (`VT_MA`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`TP_MA`);

--
-- Chỉ mục cho bảng `thoidiem`
--
ALTER TABLE `thoidiem`
  ADD PRIMARY KEY (`TD_DATE`);

--
-- Chỉ mục cho bảng `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`TC_MA`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`TX_MA`,`TD_DATE`),
  ADD KEY `FK_TRANG_THAI_TAI_TD` (`TD_DATE`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`VT_MA`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`X_MA`),
  ADD KEY `FK_THUOC_LOAI` (`LX_MA`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD CONSTRAINT `FK_DAT_XE` FOREIGN KEY (`KH_MA`) REFERENCES `khachhang` (`KH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THUC_HIEN_BOI` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THUC_HIEN_LUC` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_DANH_GIA_CHO` FOREIGN KEY (`CX_MA`) REFERENCES `chuyenxe` (`CX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THEO_TIEU_CHI` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD CONSTRAINT `FK_CO_DG` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_DG_THEO` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `co_tieu_chi` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`);

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `FK_CO_CHI_TIET_GIA` FOREIGN KEY (`GC_MA`) REFERENCES `giacuoc` (`GC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CO_GIA_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THEO` FOREIGN KEY (`LX_MA`) REFERENCES `loaixe` (`LX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_CO_DIA_CHI` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_CO_VAI_TRO` FOREIGN KEY (`VT_MA`) REFERENCES `vaitro` (`VT_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_DIA_CHI_NV` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phutrach`
--
ALTER TABLE `phutrach`
  ADD CONSTRAINT `FK_DUOC_PHU_TRACH` FOREIGN KEY (`X_MA`) REFERENCES `xe` (`X_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PHU_TRACH` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `FK_BAO_GOM` FOREIGN KEY (`TP_MA`) REFERENCES `thanhpho` (`TP_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD CONSTRAINT `vitri` FOREIGN KEY (`VT_MA`) REFERENCES `vaitro` (`VT_MA`);

--
-- Các ràng buộc cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD CONSTRAINT `FK_CO_TINH_TRANG` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TRANG_THAI_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_THUOC_LOAI` FOREIGN KEY (`LX_MA`) REFERENCES `loaixe` (`LX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
