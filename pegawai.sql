-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2024 pada 17.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(10) NOT NULL COMMENT '    <!-- nomor identitas terdiri atas 2404010001 (tahun,bulan,jabatan( sekretasi = 1, marketing = 2, manajer = 3, direktur = 4) urutan) -->\r\n',
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nik`, `jabatan`, `email`, `gambar`) VALUES
(1, 'Mamat Al Katiri', '2404010001', 'Sekretaris', 'alkatirimamat@gmail.com', '661aa4145343f.png'),
(2, 'Muhammah Sumbul', '2404020001', 'Marketing', 'sumbulalahmad@gmail.com', '661aa48506d38.png'),
(3, 'Sultan Al khawarizmi', '2404030001', 'Manajer', 'khawarizmisultan@gmail.com', '66193e7b485d8.png'),
(4, 'Jamal Al Hadid', '2404040001', 'Direktur', 'jahadidmal@gmail.com', '66193ef5a9771.png'),
(5, 'Ilyas Al Furqon', '2404030002', 'Direktur', 'ilyiyas05@gmail.com', '66193f5c1063a.png'),
(6, 'Karim Mane', '2404020002', 'Marketing', 'manealkarim@gmail.com', '661940b58c63e.png'),
(8, 'Ahmad Dhani ', '2402010002', 'Sekretaris', 'dhaniahmad@gmail.com', '661a4bd1ce641.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ilyas', '$2y$10$twRj/XJb3WknZNNh.XkwneM7M1VXaWuVPvJinyE4btyAsKln4wH9K'),
(2, 'admin', '$2y$10$eusTm4tqKzKWbleEkBuynOW9iRai/l3ZKHp9l0TcmkGSWUIeLQ2Iu'),
(7, 'mantap', '$2y$10$y6VOAC7CkCZj0xRbzAe9NeL6I4sNO97MjqG2b0ANdqg87AesZ5z4i');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
