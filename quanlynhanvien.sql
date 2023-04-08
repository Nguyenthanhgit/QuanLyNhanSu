-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2023 lúc 02:52 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhanvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chamcong`
--

CREATE TABLE `chamcong` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` int(30) DEFAULT NULL,
  `NgayLam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chamcong`
--

INSERT INTO `chamcong` (`Id`, `IdNhanVien`, `NgayLam`) VALUES
(35, 10, '2023-03-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kpi`
--

CREATE TABLE `kpi` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` int(11) DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL,
  `LoaiKpi` text DEFAULT NULL,
  `KpiDeRa` int(11) DEFAULT NULL,
  `KpiThuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` int(30) DEFAULT NULL,
  `TongNgayLam` int(30) DEFAULT NULL,
  `SoGioTangCa` int(30) DEFAULT NULL,
  `SoKpi` int(30) DEFAULT NULL,
  `TongLuong` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghiphep`
--

CREATE TABLE `nghiphep` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` int(11) DEFAULT NULL,
  `NgayBatDau` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Id` int(11) NOT NULL,
  `IdViTri` int(30) NOT NULL,
  `HoVaTenDem` varchar(255) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `SoDienThoai` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`Id`, `IdViTri`, `HoVaTenDem`, `Ten`, `SoDienThoai`, `Email`, `AnhDaiDien`) VALUES
(10, 10, 'Pham', 'Thanh', '0123123', 'a@gmail.comff', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoannhanvien`
--

CREATE TABLE `taikhoannhanvien` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` varchar(255) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `LanDangNhapCuoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoannhanvien`
--

INSERT INTO `taikhoannhanvien` (`Id`, `IdNhanVien`, `TaiKhoan`, `MatKhau`, `LanDangNhapCuoi`) VALUES
(10, '10', 'admin', '123', '2023-03-28 10:50:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tangca`
--

CREATE TABLE `tangca` (
  `Id` int(11) NOT NULL,
  `IdNhanVien` int(11) DEFAULT NULL,
  `NgayTangCa` date DEFAULT NULL,
  `SoGio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri`
--

CREATE TABLE `vitri` (
  `Id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `LuongCoBan` int(30) NOT NULL,
  `CapDo` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri`
--

INSERT INTO `vitri` (`Id`, `Ten`, `LuongCoBan`, `CapDo`) VALUES
(1, 'NhanVien', 1000, 3),
(2, 'Pho Phong', 2000, 2),
(10, 'Trưởng phòng', 5000, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `taikhoannhanvien`
--
ALTER TABLE `taikhoannhanvien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tangca`
--
ALTER TABLE `tangca`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `vitri`
--
ALTER TABLE `vitri`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `kpi`
--
ALTER TABLE `kpi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nghiphep`
--
ALTER TABLE `nghiphep`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `taikhoannhanvien`
--
ALTER TABLE `taikhoannhanvien`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tangca`
--
ALTER TABLE `tangca`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vitri`
--
ALTER TABLE `vitri`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
