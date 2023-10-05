/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     05/10 3:32                                   */
/*==============================================================*/


drop table if exists CHUYENXE;

drop table if exists DANHGIA;

drop table if exists DGTIEUCHI;

drop table if exists GIA;

drop table if exists GIACUOC;

drop table if exists KHACHHANG;

drop table if exists LOAIXE;

drop table if exists NHANVIEN;

drop table if exists PHUTRACH;

drop table if exists QUANHUYEN;

drop table if exists TAIXE;

drop table if exists THANHPHO;

drop table if exists THOIDIEM;

drop table if exists TIEUCHI;

drop table if exists TRANGTHAI;

drop table if exists VAITRO;

drop table if exists XE;

/*==============================================================*/
/* Table: CHUYENXE                                              */
/*==============================================================*/
create table CHUYENXE
(
   CX_MA                int not null,
   KH_MA                int not null,
   TX_MA                int not null,
   TD_DATE              datetime not null,
   CX_SOKM              float not null,
   CX_THANHTIEN         float(8,2) not null,
   CX_TDDIEMDI_X        text not null,
   CX_TDDIEMDI_Y        text not null,
   CX_TDDIEMDEN_X       text not null,
   CX_TDDIEMDEN_Y       text not null,
   primary key (CX_MA)
);


--
-- Đang đổ dữ liệu cho bảng `chuyenxe`
--

INSERT INTO `chuyenxe` (`CX_MA`, `TX_MA`, `KH_MA`, `TD_DATE`, `CX_SOKM`, `CX_THANHTIEN`, `CX_TDDIEMDI_X`, `CX_TDDIEMDI_Y`, `CX_TDDIEMDEN_X`, `CX_TDDIEMDEN_Y`) VALUES
(1, 2, 3, '2023-09-28 00:00:00', 4, 150000.00, '10.03002', '105.77202', '10.02914', '105.77167');


/*==============================================================*/
/* Table: DANHGIA                                               */
/*==============================================================*/
create table DANHGIA
(
   CX_MA                int not null,
   TC_MA                int not null,
   DG_SAO               numeric(5,0) not null,
   DG_NOIDUNG           varchar(100),
   primary key (CX_MA, TC_MA)
);

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`CX_MA`, `TC_MA`, `DG_SAO`, `DG_NOIDUNG`) VALUES
(1, 1, 4, 'Oke');

/*==============================================================*/
/* Table: DGTIEUCHI                                             */
/*==============================================================*/
create table DGTIEUCHI
(
   TC_MA                int not null,
   TX_MA                int not null,
   DGTC_DIEM            numeric(8,0) not null,
   primary key (TC_MA, TX_MA)
);

--
-- Đang đổ dữ liệu cho bảng `dgtieuchi`
--

INSERT INTO `dgtieuchi` (`TC_MA`, `TX_MA`, `DGTC_DIEM`) VALUES
(2, 2, 6),
(3, 3, 8),
(4, 4, 10);

/*==============================================================*/
/* Table: GIA                                                   */
/*==============================================================*/
create table GIA
(
   TD_DATE              datetime not null,
   GC_MA                int not null,
   LX_MA                int not null,
   G_TIEN               float(8,2) not null,
   primary key (TD_DATE, GC_MA, LX_MA)
);


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


/*==============================================================*/
/* Table: GIACUOC                                               */
/*==============================================================*/
create table GIACUOC
(
   GC_MA                int not null,
   GC_CANTREN           float not null,
   GC_CANDUOI           float not null,
   primary key (GC_MA)
);


--
-- Đang đổ dữ liệu cho bảng `giacuoc`
--

INSERT INTO `giacuoc` (`GC_MA`, `GC_CANTREN`, `GC_CANDUOI`) VALUES
(1, 5, 0),
(2, 10, 6),
(3, 50, 11);


/*==============================================================*/
/* Table: KHACHHANG                                             */
/*==============================================================*/
create table KHACHHANG
(
   KH_MA                int not null,
   QH_MA                int not null,
   KH_TEN               varchar(50) not null,
   KH_SDT               varchar(10) not null,
   KH_EMAIL             varchar(30) not null,
   KH_USERNAME          varchar(30) not null,
   KH_PASSWORD          varchar(30) not null,
   KH_GIOITINH          bool not null,
   primary key (KH_MA)
);


--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `QH_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_USERNAME`, `KH_PASSWORD`, `KH_GIOITINH`) VALUES
(1, 1, 'Duy Chủ Tịch', '0939826024', 'duybii922002@gmail.com', 'duylottop', '123', 1),
(2, 1, 'Nguyễn Đỗ Phúc Vinh', '0123456789', 'vinhtop8@gmail.com', 'vinhtop1', '123', 1),
(3, 1, 'Nguyễn Thị Phương Thư', '0987654321', 'pthuxinhdep@gmail.com', 'phuongthu', '123', 0),
(5, 1, 'Trần Thanh Kiệp', '0135792468', 'kiep@gmail.com', 'kiep', '123', 1);


/*==============================================================*/
/* Table: LOAIXE                                                */
/*==============================================================*/
create table LOAIXE
(
   LX_MA                int not null,
   LX_MODEL             varchar(30) not null,
   LX_SOCHO             int not null,
   primary key (LX_MA)
);


--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`LX_MA`, `LX_MODEL`, `LX_SOCHO`) VALUES
(1, 'HATCH BACK', 4),
(2, 'SEDAN', 4),
(3, 'SUV', 7),
(4, 'MPV', 7);


/*==============================================================*/
/* Table: NHANVIEN                                              */
/*==============================================================*/
create table NHANVIEN
(
   NV_ID                int not null,
   QH_MA                int,
   VT_MA                int,
   NV_TEN               varchar(50) not null,
   NV_SDT               varchar(10) not null,
   NV_EMAIL             varchar(30) not null,
   NV_USERNAME          varchar(30) not null,
   NV_PASSWORD          varchar(30) not null,
   NV_GIOITINH          bool not null,
   NV_HINHANH           char(200),
   primary key (NV_ID)
);


--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `VT_MA`, `QH_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_USERNAME`, `NV_PASSWORD`, `NV_GIOITINH`, `NV_HINHANH`) VALUES
(1, 2, 3, 'Nguyễn Thị Lan', '0123456789', 'lan@gmail.com', 'lan', '123', 0, NULL),
(2, 2, 5, 'Nguyễn Thị Thắm', '0123456788', 'tham@gmail.com', 'tham', '123', 0, NULL),
(3, 2, 8, 'Huỳnh Thạch Thảo', '0123456787', 'thao@gmail.com', 'thao', '123', 0, NULL),
(4, 2, 6, 'Trần Minh Khéo', '0123456786', 'kheo@gmail.com', 'kheo', '123', 1, NULL),
(5, 1, 2, 'Lý Thanh Hùng', '0123456783', 'hung@gmail.com', 'hung', '123', 1, NULL);


/*==============================================================*/
/* Table: PHUTRACH                                              */
/*==============================================================*/
create table PHUTRACH
(
   TX_MA                int not null,
   TD_DATE              datetime not null,
   X_MA                 int not null,
   primary key (TX_MA, TD_DATE, X_MA)
);


--
-- Đang đổ dữ liệu cho bảng `phutrach`
--

INSERT INTO `phutrach` (`TX_MA`, `TD_DATE`, `X_MA`) VALUES
(1, '2023-09-22 08:00:00', 1),
(2, '2023-09-22 08:00:00', 2),
(3, '2023-09-22 00:00:00', 3),
(4, '2023-09-22 08:00:00', 4),
(5, '2023-09-22 08:00:00', 5),
(6, '2023-09-22 08:00:00', 6),
(7, '2023-09-22 08:00:00', 7),
(8, '2023-09-22 00:00:00', 8),
(9, '2023-09-22 08:00:00', 9),
(10, '2023-09-22 08:00:00', 10);

/*==============================================================*/
/* Table: QUANHUYEN                                             */
/*==============================================================*/
create table QUANHUYEN
(
   QH_MA                int not null,
   TP_MA                int not null,
   QH_TEN               varchar(50) not null,
   primary key (QH_MA)
);


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

/*==============================================================*/
/* Table: TAIXE                                                 */
/*==============================================================*/
create table TAIXE
(
   TX_MA                int not null,
   TX_TEN               varchar(30) not null,
   TX_BANGLAI           char(3) not null,
   TX_SDT               numeric(10,0) not null,
   TX_USERNAME          varchar(30) not null,
   TX_PASSWORD          varchar(10) not null,
   TX_GIOITINH          bool not null,
   TX_HINHANH           char(200),
   primary key (TX_MA)
);


--
-- Đang đổ dữ liệu cho bảng `taixe`
--

INSERT INTO `taixe` (`TX_MA`, `TX_BANGLAI`, `TX_TEN`, `TX_USERNAME`, `TX_PASSWORD`, `TX_GIOITINH`, `TX_HINHANH`) VALUES
(1, 'C2', 'Nguyễn Thanh Hậu', 'hau', '123', 1, null),
(2, 'C2', 'Phước Vinh', 'vinh', '123', 1, null),
(3, 'C1', 'Trần Văn Hùng', 'hung', '123', 1, null),
(4, 'D1', 'Trần Thị Linh', 'linh', '123', 0, null);


/*==============================================================*/
/* Table: THANHPHO                                              */
/*==============================================================*/
create table THANHPHO
(
   TP_MA                int not null,
   TP_TEN               varchar(30) not null,
   primary key (TP_MA)
);

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`TP_MA`, `TP_TEN`) VALUES
(1, 'Cần Thơ'),
(2, 'Sóc Trăng'),
(3, 'Hậu Giang'),
(4, 'Vĩnh Long');


/*==============================================================*/
/* Table: THOIDIEM                                              */
/*==============================================================*/
create table THOIDIEM
(
   TD_DATE              datetime not null,
   primary key (TD_DATE)
);

INSERT INTO `thoidiem` (`TD_DATE`) VALUES
('2023-09-22 08:00:00'),
('2023-10-02 00:00:00'),
('2023-09-28 00:00:00');

/*==============================================================*/
/* Table: TIEUCHI                                               */
/*==============================================================*/
create table TIEUCHI
(
   TC_MA                int not null,
   TC_TEN               varchar(50) not null,
   primary key (TC_MA)
);

--
-- Đang đổ dữ liệu cho bảng `tieuchi`
--

INSERT INTO `tieuchi` (`TC_MA`, `TC_TEN`) VALUES
(1, 'Tệ'),
(2, 'Tốt '),
(3, 'Bình thường '),
(4, 'Rất tốt');


/*==============================================================*/
/* Table: TRANGTHAI                                             */
/*==============================================================*/
create table TRANGTHAI
(
   TX_MA                int not null,
   TD_DATE              datetime not null,
   TT_TRANGTHAI         bool not null,
   TT_TOADOX            text not null,
   TT_TOADOY            text not null,
   primary key (TX_MA, TD_DATE)
);

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`TD_DATE`, `TX_MA`, `TT_TRANGTHAI`, `TT_TOADOX`, `TT_TOADOY`) VALUES
('2023-10-02 00:00:00', 3, 1, '10.02780', '105.77006');


/*==============================================================*/
/* Table: VAITRO                                                */
/*==============================================================*/
create table VAITRO
(
   VT_MA                int not null,
   VT_TEN               varchar(20) not null,
   primary key (VT_MA)
);

INSERT INTO `vaitro` (`VT_MA`, `VT_TEN`) VALUES
(1, 'Tài xế'),
(2, 'Quản lý');

/*==============================================================*/
/* Table: XE                                                    */
/*==============================================================*/
create table XE
(
   X_MA                 int not null,
   LX_MA                int not null,
   X_BIENSO             varchar(10) not null,
   X_MOTA               text not null,
   X_HINHANH            varchar(200) not null,
   primary key (X_MA)
);


--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`X_MA`, `LX_MA`, `X_BIENSO`, `X_MOTA`, `X_HINHANH`) VALUES
(1, 1, '65A-12345', 'Mitsubishi Mirage màu xám', null),
(2, 1, '65A-12346', 'Hyundai Grand i10 màu trắng', null),
(3, 1, '65A-12347', 'Ford Fiesta màu trắng', null),
(4, 2, '65A-12348', 'Toyota Vios màu đen', null),
(5, 2, '65A-12349', 'Honda City màu trắng', null),
(6, 2, '65A-12340', 'Hyundai Accent màu đỏ', null),
(7, 3, '65A-13345', 'Toyota Corolla Cross màu đen', null),
(8, 3, '65A-13445', 'Honda CR-V màu xám', null),
(9, 4, '65A-13455', 'Mitsubishi Xpander màu đen', null),
(10, 4, '65A-12445', 'Toyota Avanza màu đen', null);


alter table CHUYENXE add constraint FK_DAT_XE foreign key (KH_MA)
      references KHACHHANG (KH_MA) on delete restrict on update restrict;

alter table CHUYENXE add constraint FK_THUC_HIEN_BOI foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table CHUYENXE add constraint FK_THUC_HIEN_LUC foreign key (TD_DATE)
      references THOIDIEM (TD_DATE) on delete restrict on update restrict;

alter table DANHGIA add constraint FK_DANH_GIA_CHO foreign key (CX_MA)
      references CHUYENXE (CX_MA) on delete restrict on update restrict;

alter table DANHGIA add constraint FK_THEO_TIEU_CHI foreign key (TC_MA)
      references TIEUCHI (TC_MA) on delete restrict on update restrict;

alter table DGTIEUCHI add constraint FK_CO_DG foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table DGTIEUCHI add constraint FK_DG_THEO foreign key (TC_MA)
      references TIEUCHI (TC_MA) on delete restrict on update restrict;

alter table GIA add constraint FK_CO_CHI_TIET_GIA foreign key (GC_MA)
      references GIACUOC (GC_MA) on delete restrict on update restrict;

alter table GIA add constraint FK_CO_GIA_TAI_TD foreign key (TD_DATE)
      references THOIDIEM (TD_DATE) on delete restrict on update restrict;

alter table GIA add constraint FK_THEO foreign key (LX_MA)
      references LOAIXE (LX_MA) on delete restrict on update restrict;

alter table KHACHHANG add constraint FK_CO_DIA_CHI foreign key (QH_MA)
      references QUANHUYEN (QH_MA) on delete restrict on update restrict;

alter table NHANVIEN add constraint FK_CO_VAI_TRO foreign key (VT_MA)
      references VAITRO (VT_MA) on delete restrict on update restrict;

alter table NHANVIEN add constraint FK_DIA_CHI_NV foreign key (QH_MA)
      references QUANHUYEN (QH_MA) on delete restrict on update restrict;

alter table PHUTRACH add constraint FK_DUOC_PHU_TRACH foreign key (X_MA)
      references XE (X_MA) on delete restrict on update restrict;

alter table PHUTRACH add constraint FK_PHU_TRACH foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table PHUTRACH add constraint FK_PHU_TRACH_TAI_TD foreign key (TD_DATE)
      references THOIDIEM (TD_DATE) on delete restrict on update restrict;

alter table QUANHUYEN add constraint FK_BAO_GOM foreign key (TP_MA)
      references THANHPHO (TP_MA) on delete restrict on update restrict;

alter table TRANGTHAI add constraint FK_CO_TINH_TRANG foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table TRANGTHAI add constraint FK_TRANG_THAI_TAI_TD foreign key (TD_DATE)
      references THOIDIEM (TD_DATE) on delete restrict on update restrict;

alter table XE add constraint FK_THUOC_LOAI foreign key (LX_MA)
      references LOAIXE (LX_MA) on delete restrict on update restrict;

