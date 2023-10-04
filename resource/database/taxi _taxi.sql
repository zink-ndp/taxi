-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2023 lúc 12:14 PM
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
  `TX_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `CX_SOKM` float NOT NULL,
  `CX_THANHTIEN` float(8,2) NOT NULL,
  `CX_TDDIEMDI_X` text NOT NULL,
  `CX_TDDIEMDI_Y` text NOT NULL,
  `CX_TDDIEMDEN_X` text NOT NULL,
  `CX_TDDIEMDEN_Y` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenxe`
--

INSERT INTO `chuyenxe` (`CX_MA`, `TX_MA`, `KH_MA`, `TD_DATE`, `CX_SOKM`, `CX_THANHTIEN`, `CX_TDDIEMDI_X`, `CX_TDDIEMDI_Y`, `CX_TDDIEMDEN_X`, `CX_TDDIEMDEN_Y`) VALUES
(1, 2, 3, '2023-09-28 00:00:00', 4, 150000.00, '10.03002', '105.77202', '10.02914', '105.77167');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `TC_ID` int(11) NOT NULL,
  `CX_MA` int(11) NOT NULL,
  `DG_SAO` decimal(5,0) NOT NULL,
  `DG_NOIDUNG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`TC_ID`, `CX_MA`, `DG_SAO`, `DG_NOIDUNG`) VALUES
(0, 1, 4, 'Oke');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dgtieuchi`
--

CREATE TABLE `dgtieuchi` (
  `TX_MA` int(11) NOT NULL,
  `TC_ID` int(11) NOT NULL,
  `DGTC_DIEM` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dgtieuchi`
--

INSERT INTO `dgtieuchi` (`TX_MA`, `TC_ID`, `DGTC_DIEM`) VALUES
(2, 0, 10),
(3, 0, 8),
(4, 0, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `LX_MA` int(11) NOT NULL,
  `GC_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `G_TIEN` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`LX_MA`, `GC_MA`, `TD_DATE`, `G_TIEN`) VALUES
(1, 1, '2023-09-28 00:00:00', 15000.00),
(1, 2, '2023-09-28 00:00:00', 10000.00),
(1, 3, '2023-09-28 00:00:00', 5000.00),
(2, 1, '2023-09-28 00:00:00', 20000.00),
(2, 2, '2023-09-28 00:00:00', 15000.00),
(2, 3, '2023-09-28 00:00:00', 10000.00),
(3, 1, '2023-09-28 00:00:00', 10000.00),
(3, 2, '2023-09-28 00:00:00', 7000.00),
(3, 3, '2023-09-28 00:00:00', 5000.00),
(4, 1, '2023-09-28 00:00:00', 12000.00),
(4, 2, '2023-09-28 00:00:00', 10000.00),
(4, 3, '2023-09-28 00:00:00', 8000.00),
(5, 1, '2023-09-28 00:00:00', 15000.00),
(5, 2, '2023-09-28 00:00:00', 10000.00),
(5, 3, '2023-09-28 00:00:00', 5000.00),
(6, 1, '2023-09-28 00:00:00', 15000.00),
(6, 2, '2023-09-28 00:00:00', 10000.00),
(6, 3, '2023-09-28 00:00:00', 8000.00),
(7, 1, '2023-09-28 00:00:00', 12000.00),
(7, 2, '2023-09-28 00:00:00', 10000.00),
(7, 3, '2023-09-28 00:00:00', 8000.00),
(8, 1, '2023-09-28 00:00:00', 10000.00),
(8, 2, '2023-09-28 00:00:00', 8000.00),
(8, 3, '2023-09-28 00:00:00', 5000.00),
(9, 1, '2023-09-28 00:00:00', 15000.00),
(9, 2, '2023-09-28 00:00:00', 10000.00),
(9, 3, '2023-09-28 00:00:00', 5000.00),
(10, 1, '2023-09-28 00:00:00', 10000.00),
(10, 2, '2023-09-28 00:00:00', 7000.00),
(10, 3, '2023-09-28 00:00:00', 5000.00);

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
  `KH_PASSWORD` varchar(30) NOT NULL,
  `KH_GIOITINH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `QH_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_USERNAME`, `KH_PASSWORD`, `KH_GIOITINH`) VALUES
(1, 0, 'Duy Chủ Tịch', '0939826024', 'duybii922002@gmail.com', 'duychutich', '123', 1),
(2, 0, 'Nguyễn Đỗ Phúc Vinh', '0123456789', 'vinhtop8@gmail.com', 'vinhtop8', '123', 1),
(3, 0, 'Nguyễn Thị Phương Thư', '0987654321', 'pthuxinhdep@gmail.com', 'phuongthu', '123', 0),
(5, 0, 'Trần Thanh Kiệp', '0135792468', 'kiep@gmail.com', 'kiep', '123', 1);

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
(1, 'SUV', 4),
(2, 'HATCH BACK', 4),
(3, 'SEDAN', 4),
(4, 'PICK UP', 4),
(5, 'MPV', 4),
(6, 'SUV', 7),
(7, 'HATCH BACK', 7),
(8, 'SEDAN', 7),
(9, 'PICK UP', 7),
(10, 'MPV', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(11) NOT NULL,
  `VT_MA` int(11) DEFAULT NULL,
  `QH_MA` int(11) DEFAULT NULL,
  `NV_TEN` varchar(50) NOT NULL,
  `NV_SDT` varchar(10) NOT NULL,
  `NV_EMAIL` varchar(30) NOT NULL,
  `NV_USERNAME` varchar(30) NOT NULL,
  `NV_PASSWORD` varchar(30) NOT NULL,
  `NV_GIOITINH` tinyint(1) NOT NULL,
  `NV_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `VT_MA`, `QH_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_USERNAME`, `NV_PASSWORD`, `NV_GIOITINH`, `NV_HINHANH`) VALUES
(1, 2, 3, 'Nguyễn Thị Lan', '0123456789', 'lan@gmail.com', 'lan', '123', 0, NULL),
(2, 2, 5, 'Nguyễn Thị Thắm', '0123456788', 'tham@gmail.com', 'tham', '123', 0, NULL),
(3, 2, 8, 'Huỳnh Thạch Thảo', '0123456787', 'thao@gmail.com', 'thao', '123', 0, NULL),
(4, 2, 6, 'Trần Minh Khéo', '0123456786', 'kheo@gmail.com', 'kheo', '123', 1, NULL),
(5, 1, 2, 'Lý Thanh Hùng', '0123456783', 'hung@gmail.com', 'hung', '123', 1, NULL);

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
(1, '2023-09-22 08:00:00', 1),
(2, '2023-09-27 08:00:00', 2),
(3, '2023-09-28 00:00:00', 3),
(4, '2023-09-22 08:00:00', 4),
(5, '2023-09-27 08:00:00', 5),
(6, '2023-09-27 08:00:00', 6),
(7, '2023-09-22 08:00:00', 7),
(8, '2023-09-28 00:00:00', 8),
(9, '2023-09-27 08:00:00', 9),
(10, '2023-09-27 08:00:00', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_MA` int(11) NOT NULL,
  `TP_MA` int(11) NOT NULL,
  `QH_TEN` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

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
(7, 1, 'Huyện Cờ Đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixe`
--

CREATE TABLE `taixe` (
  `TX_MA` int(11) NOT NULL,
  `TX_BANGLAI` char(3) NOT NULL,
  `TX_TEN` varchar(30) NOT NULL,
  `TX_USERNAME` varchar(30) NOT NULL,
  `TX_PASSWORD` varchar(10) NOT NULL,
  `TX_GIOITINH` tinyint(1) NOT NULL,
  `TX_HINHANH` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taixe`
--

INSERT INTO `taixe` (`TX_MA`, `TX_BANGLAI`, `TX_TEN`, `TX_USERNAME`, `TX_PASSWORD`, `TX_GIOITINH`, `TX_HINHANH`) VALUES
(1, '1', 'Nguyễn Thanh Hậu', 'hau', '123', 1, ''),
(2, '2', 'Phước Vinh', 'vinh', '123', 1, ''),
(3, '3', 'Trần Văn Hùng', 'hung', '123', 1, ''),
(4, '4', 'Trần Thị Linh', 'linh', '123', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `TP_MA` int(11) NOT NULL,
  `TP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`TP_MA`, `TP_TEN`) VALUES
(1, 'Cần Thơ'),
(3, 'An Giang');

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
('2023-09-28 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi`
--

CREATE TABLE `tieuchi` (
  `TC_ID` char(8) NOT NULL,
  `TC_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuchi`
--

INSERT INTO `tieuchi` (`TC_ID`, `TC_TEN`) VALUES
('Bad', 'Tệ'),
('Good', 'Tốt '),
('Not bad', 'Bình thường '),
('Very Goo', 'Rất tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `TD_DATE` datetime NOT NULL,
  `TX_MA` int(11) NOT NULL,
  `TT_TRANGTHAI` tinyint(1) NOT NULL,
  `TT_TOADOX` text NOT NULL,
  `TT_TOADOY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`TD_DATE`, `TX_MA`, `TT_TRANGTHAI`, `TT_TOADOX`, `TT_TOADOY`) VALUES
('2023-10-02 13:41:25', 3, 1, '10.02780', '105.77006');

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
(2, 'Kế toán ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `X_MA` int(11) NOT NULL,
  `LX_MA` int(11) NOT NULL,
  `X_BIENSO` varchar(10) DEFAULT NULL,
  `X_MOTA` text NOT NULL,
  `X_HINHANH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`X_MA`, `LX_MA`, `X_BIENSO`, `X_MOTA`, `X_HINHANH`) VALUES
(1, 1, '65A-12345', 'màu đỏ\r\n', ''),
(2, 2, '65A-12346', 'màu xanh', ''),
(3, 3, '65A-12347', 'màu vàng', ''),
(4, 4, '65A-12348', 'màu cam', ''),
(5, 5, '65A-12349', 'màu tím', ''),
(6, 6, '65A-12340', 'màu bạc', ''),
(7, 7, '65A-13345', 'màu lục', ''),
(8, 8, '65A-13445', 'màu làm', ''),
(9, 9, '65A-13455', 'màu nâu', ''),
(10, 10, '65A-12445', 'màu hồng nhạt', '');

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
  ADD PRIMARY KEY (`TC_ID`,`CX_MA`),
  ADD KEY `FK_DANH_GIA_CHO` (`CX_MA`);

--
-- Chỉ mục cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD PRIMARY KEY (`TX_MA`,`TC_ID`),
  ADD KEY `FK_DG_THEO` (`TC_ID`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`LX_MA`,`GC_MA`,`TD_DATE`),
  ADD KEY `FK_CO_CHI_TIET_GIA` (`GC_MA`),
  ADD KEY `FK_CO_GIA_TAI_TD` (`TD_DATE`);

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
  ADD PRIMARY KEY (`TX_MA`,`TD_DATE`,`X_MA`),
  ADD KEY `FK_DUOC_PHU_TRACH` (`X_MA`),
  ADD KEY `FK_PHU_TRACH_TAI_TD` (`TD_DATE`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_MA`),
  ADD KEY `TP_MA` (`TP_MA`);

--
-- Chỉ mục cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD PRIMARY KEY (`TX_MA`);

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
  ADD PRIMARY KEY (`TC_ID`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`TD_DATE`,`TX_MA`);

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
  ADD KEY `FK_COXE` (`LX_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `QH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
