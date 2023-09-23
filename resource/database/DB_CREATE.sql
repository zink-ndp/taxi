/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/09 9:13                                   */
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
   CX_MA                char(8) not null,
   TX_MA                char(8) not null,
   KH_MA                char(8) not null,
   TD_DATE              datetime not null,
   CX_SOKM              float not null,
   CX_THANHTIEN         float(8,2) not null,
   CX_TDDIEMDI_X        text not null,
   CX_TDDIEMDI_Y        text not null,
   CX_TDDIEMDEN_X       text not null,
   CX_TDDIEMDEN_Y       text not null,
   primary key (CX_MA)
);

/*==============================================================*/
/* Table: DANHGIA                                               */
/*==============================================================*/
create table DANHGIA
(
   TC_ID                char(8) not null,
   CX_MA                char(8) not null,
   DG_SAO               numeric(5,0) not null,
   DG_NOIDUNG           varchar(100),
   primary key (TC_ID, CX_MA)
);

/*==============================================================*/
/* Table: DGTIEUCHI                                             */
/*==============================================================*/
create table DGTIEUCHI
(
   TX_MA                char(8) not null,
   TC_ID                char(8) not null,
   DGTC_DIEM            numeric(8,0) not null,
   primary key (TX_MA, TC_ID)
);

/*==============================================================*/
/* Table: GIA                                                   */
/*==============================================================*/
create table GIA
(
   LX_MA                char(8) not null,
   GC_MA                char(8) not null,
   TD_DATE              datetime not null,
   G_TIEN               float(8,2) not null,
   primary key (LX_MA, GC_MA, TD_DATE)
);

/*==============================================================*/
/* Table: GIACUOC                                               */
/*==============================================================*/
create table GIACUOC
(
   GC_MA                char(8) not null,
   GC_CANTREN           float not null,
   GC_CANDUOI           float not null,
   primary key (GC_MA)
);

/*==============================================================*/
/* Table: KHACHHANG                                             */
/*==============================================================*/
create table KHACHHANG
(
   KH_MA                char(8) not null,
   QH_MA                char(8) not null,
   KH_TEN               varchar(50) not null,
   KH_SDT               varchar(10) not null,
   KH_EMAIL             varchar(30) not null,
   KH_USERNAME          varchar(30) not null,
   KH_PASSWORD          varchar(30) not null,
   KH_GIOITINH          bool not null,
   primary key (KH_MA)
);

/*==============================================================*/
/* Table: LOAIXE                                                */
/*==============================================================*/
create table LOAIXE
(
   LX_MA                char(8) not null,
   LX_MODEL             varchar(30) not null,
   LX_SOCHO             int not null,
   primary key (LX_MA)
);

/*==============================================================*/
/* Table: NHANVIEN                                              */
/*==============================================================*/
create table NHANVIEN
(
   NV_ID                char(8) not null,
   VT_MA                char(8),
   QH_MA                char(8),
   NV_TEN               varchar(50) not null,
   NV_SDT               varchar(10) not null,
   NV_EMAIL             varchar(30) not null,
   NV_USERNAME          varchar(30) not null,
   NV_PASSWORD          varchar(30) not null,
   NV_GIOITINH          bool not null,
   NV_HINHANH           char(200),
   primary key (NV_ID)
);

/*==============================================================*/
/* Table: PHUTRACH                                              */
/*==============================================================*/
create table PHUTRACH
(
   X_MA                 char(8) not null,
   TD_DATE              datetime not null,
   TX_MA                char(8) not null,
   primary key (X_MA, TD_DATE, TX_MA)
);

/*==============================================================*/
/* Table: QUANHUYEN                                             */
/*==============================================================*/
create table QUANHUYEN
(
   QH_MA                char(8) not null,
   TP_MA                char(8) not null,
   QH_TEN               varchar(50) not null,
   primary key (QH_MA)
);

/*==============================================================*/
/* Table: TAIXE                                                 */
/*==============================================================*/
create table TAIXE
(
   TX_MA                char(8) not null,
   TX_BANGLAI           char(3) not null,
   TX_TEN               varchar(30) not null,
   TX_USERNAME          varchar(30) not null,
   TX_PASSWORD          varchar(10) not null,
   TX_GIOITINH          bool not null,
   TX_HINHANH           char(200) not null,
   primary key (TX_MA)
);

/*==============================================================*/
/* Table: THANHPHO                                              */
/*==============================================================*/
create table THANHPHO
(
   TP_MA                char(8) not null,
   TP_TEN               varchar(30) not null,
   primary key (TP_MA)
);

/*==============================================================*/
/* Table: THOIDIEM                                              */
/*==============================================================*/
create table THOIDIEM
(
   TD_DATE              datetime not null,
   primary key (TD_DATE)
);

/*==============================================================*/
/* Table: TIEUCHI                                               */
/*==============================================================*/
create table TIEUCHI
(
   TC_ID                char(8) not null,
   TC_TEN               varchar(50) not null,
   primary key (TC_ID)
);

/*==============================================================*/
/* Table: TRANGTHAI                                             */
/*==============================================================*/
create table TRANGTHAI
(
   TD_DATE              datetime not null,
   TX_MA                char(8) not null,
   TT_TRANGTHAI         bool not null,
   TT_TOADOX            text not null,
   TT_TOADOY            text not null,
   primary key (TD_DATE, TX_MA)
);

/*==============================================================*/
/* Table: VAITRO                                                */
/*==============================================================*/
create table VAITRO
(
   VT_MA                char(8) not null,
   VT_TEN               varchar(20) not null,
   primary key (VT_MA)
);

/*==============================================================*/
/* Table: XE                                                    */
/*==============================================================*/
create table XE
(
   X_MA                 char(8) not null,
   LX_MA                char(8) not null,
   X_BIENSO             varchar(10) not null,
   X_HINHANH            char(200),
   primary key (X_MA)
);

alter table CHUYENXE add constraint FK_DAT_XE foreign key (KH_MA)
      references KHACHHANG (KH_MA) on delete restrict on update restrict;

alter table CHUYENXE add constraint FK_THUC_HIEN_BOI foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table CHUYENXE add constraint FK_THUC_HIEN_LUC foreign key (TD_DATE)
      references THOIDIEM (TD_DATE) on delete restrict on update restrict;

alter table DANHGIA add constraint FK_DANH_GIA_CHO foreign key (CX_MA)
      references CHUYENXE (CX_MA) on delete restrict on update restrict;

alter table DANHGIA add constraint FK_THEO_TIEU_CHI foreign key (TC_ID)
      references TIEUCHI (TC_ID) on delete restrict on update restrict;

alter table DGTIEUCHI add constraint FK_CO_DG foreign key (TX_MA)
      references TAIXE (TX_MA) on delete restrict on update restrict;

alter table DGTIEUCHI add constraint FK_DG_THEO foreign key (TC_ID)
      references TIEUCHI (TC_ID) on delete restrict on update restrict;

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

