-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2023 lúc 04:28 AM
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
  `CX_MA` char(8) NOT NULL,
  `TX_MA` char(8) NOT NULL,
  `KH_MA` char(8) NOT NULL,
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
('01', '02', '03', '2023-09-28 00:00:00', 4, 150000.00, '10.03002', '105.77202', '10.02914', '105.77167');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `TC_ID` char(8) NOT NULL,
  `CX_MA` char(8) NOT NULL,
  `DG_SAO` decimal(5,0) NOT NULL,
  `DG_NOIDUNG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`TC_ID`, `CX_MA`, `DG_SAO`, `DG_NOIDUNG`) VALUES
('Good', '01', 4, 'Oke');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dgtieuchi`
--

CREATE TABLE `dgtieuchi` (
  `TX_MA` char(8) NOT NULL,
  `TC_ID` char(8) NOT NULL,
  `DGTC_DIEM` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dgtieuchi`
--

INSERT INTO `dgtieuchi` (`TX_MA`, `TC_ID`, `DGTC_DIEM`) VALUES
('02', 'Good', 10),
('03', 'Not bad', 8),
('04', 'Very Goo', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `LX_MA` char(8) NOT NULL,
  `GC_MA` char(8) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `G_TIEN` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`LX_MA`, `GC_MA`, `TD_DATE`, `G_TIEN`) VALUES
('01', '01', '2023-09-28 00:00:00', 15000.00),
('01', '02', '2023-09-28 00:00:00', 10000.00),
('01', '03', '2023-09-28 00:00:00', 5000.00),
('02', '01', '2023-09-28 00:00:00', 20000.00),
('02', '02', '2023-09-28 00:00:00', 15000.00),
('02', '03', '2023-09-28 00:00:00', 10000.00),
('03', '01', '2023-09-28 00:00:00', 10000.00),
('03', '02', '2023-09-28 00:00:00', 7000.00),
('03', '03', '2023-09-28 00:00:00', 5000.00),
('04', '01', '2023-09-28 00:00:00', 12000.00),
('04', '02', '2023-09-28 00:00:00', 10000.00),
('04', '03', '2023-09-28 00:00:00', 8000.00),
('05', '01', '2023-09-28 00:00:00', 15000.00),
('05', '02', '2023-09-28 00:00:00', 10000.00),
('05', '03', '2023-09-28 00:00:00', 5000.00),
('06', '01', '2023-09-28 00:00:00', 15000.00),
('06', '02', '2023-09-28 00:00:00', 10000.00),
('06', '03', '2023-09-28 00:00:00', 8000.00),
('07', '01', '2023-09-28 00:00:00', 12000.00),
('07', '02', '2023-09-28 00:00:00', 10000.00),
('07', '03', '2023-09-28 00:00:00', 8000.00),
('08', '01', '2023-09-28 00:00:00', 10000.00),
('08', '02', '2023-09-28 00:00:00', 8000.00),
('08', '03', '2023-09-28 00:00:00', 5000.00),
('09', '01', '2023-09-28 00:00:00', 15000.00),
('09', '02', '2023-09-28 00:00:00', 10000.00),
('09', '03', '2023-09-28 00:00:00', 5000.00),
('10', '01', '2023-09-28 00:00:00', 10000.00),
('10', '02', '2023-09-28 00:00:00', 7000.00),
('10', '03', '2023-09-28 00:00:00', 5000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giacuoc`
--

CREATE TABLE `giacuoc` (
  `GC_MA` char(8) NOT NULL,
  `GC_CANTREN` float NOT NULL,
  `GC_CANDUOI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giacuoc`
--

INSERT INTO `giacuoc` (`GC_MA`, `GC_CANTREN`, `GC_CANDUOI`) VALUES
('01', 5, 0),
('02', 10, 6),
('03', 50, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` char(8) NOT NULL,
  `QH_MA` char(8) NOT NULL,
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
('01', 'CT03', 'Duy Chủ Tịch', '0939826024', 'duybii922002@gmail.com', 'duychutich', '123', 1),
('02', 'CT01', 'Nguyễn Đỗ Phúc Vinh', '0123456789', 'vinhtop8@gmail.com', 'vinhtop8', '123', 1),
('03', 'CT02', 'Nguyễn Thị Phương Thư', '0987654321', 'pthuxinhdep@gmail.com', 'phuongthu', '123', 0),
('04', 'CT01', 'Nguyễn Ngọc Kiều Hân', '0246813579', 'kieuhan@gmail.com', 'kieuhan', '123', 0),
('05', 'CT01', 'Trần Thanh Kiệp', '0135792468', 'kiep@gmail.com', 'kiep', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixe`
--

CREATE TABLE `loaixe` (
  `LX_MA` char(8) NOT NULL,
  `LX_MODEL` varchar(30) NOT NULL,
  `LX_SOCHO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`LX_MA`, `LX_MODEL`, `LX_SOCHO`) VALUES
('01', 'SUV', 4),
('02', 'HATCH BACK', 4),
('03', 'SEDAN', 4),
('04', 'PICK UP', 4),
('05', 'MPV', 4),
('06', 'SUV', 7),
('07', 'HATCH BACK', 7),
('08', 'SEDAN', 7),
('09', 'PICK UP', 7),
('10', 'MPV', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` char(8) NOT NULL,
  `VT_MA` char(8) DEFAULT NULL,
  `QH_MA` char(8) DEFAULT NULL,
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
('01', '02', 'CT03', 'Nguyễn Thị Lan', '0123456789', 'lan@gmail.com', 'lan', '123', 0, NULL),
('02', '02', 'SG01', 'Nguyễn Thị Thắm', '0123456788', 'tham@gmail.com', 'tham', '123', 0, NULL),
('03', '02', 'SG06', 'Huỳnh Thạch Thảo', '0123456787', 'thao@gmail.com', 'thao', '123', 0, NULL),
('04', '02', 'CT08', 'Trần Minh Khéo', '0123456786', 'kheo@gmail.com', 'kheo', '123', 1, NULL),
('05', '01', 'ST02', 'Lý Thanh Hùng', '0123456783', 'hung@gmail.com', 'hung', '123', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phutrach`
--

CREATE TABLE `phutrach` (
  `X_MA` char(8) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `TX_MA` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phutrach`
--

INSERT INTO `phutrach` (`X_MA`, `TD_DATE`, `TX_MA`) VALUES
('01', '2023-09-28 00:00:00', '03'),
('02', '2023-09-28 00:00:00', '02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_MA` char(8) NOT NULL,
  `TP_MA` char(8) NOT NULL,
  `QH_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`QH_MA`, `TP_MA`, `QH_TEN`) VALUES
('CT01', '01', 'Quận Ninh Kiều'),
('CT02', '01', 'Quận Cái Răng'),
('CT03', '01', 'Quận Bình Thủy'),
('CT04', '01', 'Quận Ô Môn'),
('CT05', '01', 'Huyện Phong Điền'),
('CT06', '01', 'Huyện Thốt Nốt'),
('CT07', '01', 'Huyện Cờ Đỏ'),
('CT08', '01', 'Huyện Vĩnh Thạnh'),
('CT09', '01', 'Huyện Thới Lai'),
('DT01', '10', 'Huyện Tân Hồng'),
('DT02', '10', 'Huyện Hồng Ngự'),
('DT03', '10', 'Huyện Tam Nông'),
('DT04', '10', 'Huyện Thanh Bình'),
('DT05', '10', 'Huyện Tháp Mười'),
('DT06', '10', 'Huyện Cao Lãnh'),
('DT07', '10', 'Huyện Lấp Vò'),
('DT08', '10', 'Huyện Lai Vung'),
('DT09', '10', 'Huyện Châu Thành'),
('SG01', '02', 'Quận 1'),
('SG02', '02', 'Quận 2'),
('SG03', '02', 'Quận 3'),
('SG04', '02', 'Quận 4'),
('SG05', '02', 'Quận 5'),
('SG06', '02', 'Quận 6'),
('SG07', '02', 'Quận 7'),
('SG08', '02', 'Quận 8'),
('SG09', '02', 'Quận 10'),
('SG10', '02', 'Quận 11'),
('SG11', '02', 'Quận 12'),
('SG12', '02', 'Quận Bình Tân'),
('SG13', '02', 'Quận Bình Thạnh'),
('SG14', '02', 'Quận Gò Vấp'),
('SG15', '02', 'Quận Phú Nhuận'),
('SG16', '02', 'Quận Tân Bình'),
('SG17', '02', 'Quận Tân Phú'),
('SG18', '02', 'Quận Thủ Đức'),
('SG19', '02', 'Huyện Bình Chánh'),
('SG20', '02', 'Huyện Cần Giờ'),
('SG21', '02', 'Huyện Củ Chi'),
('SG22', '02', 'Huyện Hóc Môn'),
('SG23', '02', 'Huyện Nhà Bè'),
('ST01', '09', 'Thị xã Vĩnh Châu'),
('ST02', '09', 'Huyện Mỹ Xuyên'),
('ST03', '09', 'Huyện Kế Sách'),
('ST04', '09', 'Huyện Trần Đề'),
('ST05', '09', 'Huyện Châu Thành'),
('ST06', '09', 'Huyện Long Phú'),
('ST07', '09', 'Huyện Mỹ Tú'),
('ST08', '09', 'Thị xã Ngã Năm'),
('ST09', '09', 'Huyện Thạch Trị'),
('ST10', '09', 'Huyện Cù Lao Dung'),
('VL01', '11', 'Huyện Bình Tân'),
('VL02', '11', 'Huyện Long Hồ'),
('VL03', '11', 'Huyện Mang Thít'),
('VL04', '11', 'Huyện Tam Bình'),
('VL05', '11', 'Huyện Trà Ôn'),
('VL06', '11', 'Huyện Vũng Liêm'),
('VL07', '11', 'Thị Xã Bình Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixe`
--

CREATE TABLE `taixe` (
  `TX_MA` char(8) NOT NULL,
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
('01', '001', 'Nguyễn Thanh Hậu', 'hau', '123', 1, ''),
('02', '002', 'Phước Vinh', 'vinh', '123', 1, ''),
('03', '003', 'Trần Văn Hùng', 'hung', '123', 1, ''),
('04', '004', 'Trần Thị Linh', 'linh', '123', 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `TP_MA` char(8) NOT NULL,
  `TP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`TP_MA`, `TP_TEN`) VALUES
('01', 'Cần Thơ'),
('02', 'Sài Gòn'),
('03', 'An Giang'),
('04', 'Tiền Giang'),
('05', 'Kiên Giang'),
('06', 'Hậu Giang'),
('07', 'Long An'),
('08', 'Trà Vinh'),
('09', 'Sóc Trăng'),
('10', 'Đồng Tháp'),
('11', 'Vĩnh Long'),
('12', 'Bạc Liêu'),
('13', 'Cà Mau'),
('14', 'Bến Tre');

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
  `TX_MA` char(8) NOT NULL,
  `TT_TRANGTHAI` tinyint(1) NOT NULL,
  `TT_TOADOX` text NOT NULL,
  `TT_TOADOY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`TD_DATE`, `TX_MA`, `TT_TRANGTHAI`, `TT_TOADOX`, `TT_TOADOY`) VALUES
('2023-10-02 13:41:25', '03', 1, '10.02780', '105.77006');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `VT_MA` char(8) NOT NULL,
  `VT_TEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`VT_MA`, `VT_TEN`) VALUES
('01', 'Tài xế'),
('02', 'Kế toán ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `X_MA` char(8) NOT NULL,
  `LX_MA` char(8) NOT NULL,
  `X_BIENSO` varchar(10) NOT NULL,
  `X_MOTA` text NOT NULL,
  `X_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`X_MA`, `LX_MA`, `X_BIENSO`, `X_MOTA`, `X_HINHANH`) VALUES
('01', '02', 'B123', 'Đây là xe 4 chỗ', 'car-1.jpg'),
('02', '04', 'A123', 'Đây là xe 4 chỗ ', 'car-2.jpg'),
('03', '05', 'C123', 'Đây là xe 4 chỗ', 'car-3.jpg'),
('04', '02', 'D123', 'Đây là xe 4 chỗ', 'car-4.jpg'),
('05', '01', 'E123', 'Đây là xe 4 chỗ', 'car-5.jpg'),
('06', '07', 'F123', 'Đây là xe 7 chỗ', 'car-6.jpg'),
('07', '08', 'G123', 'Đây là xe 7 chỗ', 'car-7.jpg'),
('08', '03', 'H123', 'Đây là xe 4 chỗ', 'car-8.jpg'),
('09', '06', 'I123', 'Đây là xe 7 chỗ', 'car-9.jpg'),
('10', '08', 'K123', 'Đây là xe 7 chỗ', 'car-10.jpg');

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
  ADD PRIMARY KEY (`X_MA`,`TD_DATE`,`TX_MA`),
  ADD KEY `FK_PHU_TRACH` (`TX_MA`),
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
  ADD PRIMARY KEY (`X_MA`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD CONSTRAINT `FK_DAT_XE` FOREIGN KEY (`KH_MA`) REFERENCES `khachhang` (`KH_MA`),
  ADD CONSTRAINT `FK_THUC_HIEN_BOI` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`),
  ADD CONSTRAINT `FK_THUC_HIEN_LUC` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_DANH_GIA_CHO` FOREIGN KEY (`CX_MA`) REFERENCES `chuyenxe` (`CX_MA`),
  ADD CONSTRAINT `FK_THEO_TIEU_CHI` FOREIGN KEY (`TC_ID`) REFERENCES `tieuchi` (`TC_ID`);

--
-- Các ràng buộc cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD CONSTRAINT `FK_CO_DG` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`),
  ADD CONSTRAINT `FK_DG_THEO` FOREIGN KEY (`TC_ID`) REFERENCES `tieuchi` (`TC_ID`);

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `FK_CO_CHI_TIET_GIA` FOREIGN KEY (`GC_MA`) REFERENCES `giacuoc` (`GC_MA`),
  ADD CONSTRAINT `FK_CO_GIA_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`),
  ADD CONSTRAINT `FK_THEO` FOREIGN KEY (`LX_MA`) REFERENCES `loaixe` (`LX_MA`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_CO_DIA_CHI` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_CO_VAI_TRO` FOREIGN KEY (`VT_MA`) REFERENCES `vaitro` (`VT_MA`),
  ADD CONSTRAINT `FK_DIA_CHI_NV` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`);

--
-- Các ràng buộc cho bảng `phutrach`
--
ALTER TABLE `phutrach`
  ADD CONSTRAINT `FK_DUOC_PHU_TRACH` FOREIGN KEY (`X_MA`) REFERENCES `xe` (`X_MA`),
  ADD CONSTRAINT `FK_PHU_TRACH` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`),
  ADD CONSTRAINT `FK_PHU_TRACH_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`);

--
-- Các ràng buộc cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `FK_BAO_GOM` FOREIGN KEY (`TP_MA`) REFERENCES `thanhpho` (`TP_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
