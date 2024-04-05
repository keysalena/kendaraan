-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2024 pada 05.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `nama_driver` varchar(255) DEFAULT NULL,
  `status` enum('Bebas','Terisi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`driver_id`, `nama_driver`, `status`) VALUES
(3, 'Suprianto', 'Terisi'),
(4, 'John Doe', 'Bebas'),
(5, 'Jane Doe', 'Bebas'),
(6, 'Michael Smith', 'Bebas'),
(7, 'Emily Johnson', 'Terisi'),
(8, 'Daniel Williams', 'Terisi'),
(9, 'Olivia Brown', 'Bebas'),
(10, 'James Wilson', 'Bebas'),
(11, 'Sophia Anderson', 'Bebas'),
(12, 'William Martinez', 'Bebas'),
(13, 'Emma Taylor', 'Bebas'),
(14, 'David Garcia', 'Bebas'),
(15, 'Ava Hernandez', 'Bebas'),
(16, 'Alexander Martin', 'Bebas'),
(17, 'Ella Young', 'Bebas'),
(18, 'Matthew Lopez', 'Bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `kendaraan_id` int(11) NOT NULL,
  `nama_kendaraan` varchar(255) DEFAULT NULL,
  `jenis_kendaraan` enum('Angkutan orang','Angkutan barang') DEFAULT NULL,
  `konsumsi_BBM` varchar(50) DEFAULT NULL,
  `jadwal_service` varchar(100) DEFAULT NULL,
  `status_kendaraan` enum('Tersedia','Dipesan') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`kendaraan_id`, `nama_kendaraan`, `jenis_kendaraan`, `konsumsi_BBM`, `jadwal_service`, `status_kendaraan`) VALUES
(3, 'Honda', 'Angkutan orang', '45 Km/liter', 'Setiap 3.000 Km', 'Tersedia'),
(4, 'Toyota', 'Angkutan barang', '30 Km/liter', 'Setiap 5.000 Km', 'Dipesan'),
(7, 'Suzuki', 'Angkutan orang', '50 Km/liter', 'Setiap 2.500 Km', 'Tersedia'),
(8, 'Mitsubishi', 'Angkutan barang', '35 Km/liter', 'Setiap 4.000 Km', 'Dipesan'),
(9, 'Nissan', 'Angkutan orang', '40 Km/liter', 'Setiap 3.500 Km', 'Dipesan'),
(10, 'Isuzu', 'Angkutan barang', '32 Km/liter', 'Setiap 4.500 Km', 'Tersedia'),
(11, 'Chevrolet', 'Angkutan orang', '48 Km/liter', 'Setiap 2.800 Km', 'Tersedia'),
(12, 'Ford', 'Angkutan barang', '28 Km/liter', 'Setiap 5.500 Km', 'Tersedia'),
(13, 'Hyundai', 'Angkutan orang', '42 Km/liter', 'Setiap 3.200 Km', 'Tersedia'),
(14, 'BMW', 'Angkutan barang', '38 Km/liter', 'Setiap 3.800 Km', 'Tersedia'),
(15, 'Mercedes-Benz', 'Angkutan orang', '46 Km/liter', 'Setiap 2.700 Km', 'Tersedia'),
(16, 'Audi', 'Angkutan barang', '33 Km/liter', 'Setiap 4.300 Km', 'Tersedia'),
(17, 'Lexus', 'Angkutan orang', '44 Km/liter', 'Setiap 3.100 Km', 'Tersedia'),
(18, 'Volvo', 'Angkutan barang', '31 Km/liter', 'Setiap 4.700 Km', 'Tersedia'),
(19, 'Kia', 'Angkutan orang', '47 Km/liter', 'Setiap 2.600 Km', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status_persetujuan` enum('Pending','Ditolak','Disetujui') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `nama_pegawai`, `kendaraan_id`, `driver_id`, `user_id`, `tanggal_pemesanan`, `tanggal_mulai`, `tanggal_selesai`, `status_persetujuan`) VALUES
(1, 'Nuaiman', NULL, NULL, NULL, '2024-04-04', '2024-04-05', '2024-04-09', 'Pending'),
(2, 'Nuaiman2', NULL, NULL, NULL, '2024-04-05', '2024-04-16', '2024-04-16', 'Pending'),
(7, 'Nuaiman', 4, 3, 2, '2024-04-05', '2024-04-10', '2024-04-11', 'Disetujui'),
(8, 'Nuaiman', 9, 8, 9, '2024-04-05', '2024-04-25', '2024-04-17', 'Ditolak'),
(9, 'Ayam', 8, 7, 9, '2024-04-05', '2024-04-12', '2024-04-11', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','pihak yang menyetujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama_user`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'admin', '123', 'admin'),
(2, 'Pihak1', 'pihak1', '123', 'pihak yang menyetujui'),
(9, 'Pihak2', 'pihak2', '1234', 'pihak yang menyetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`kendaraan_id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `kendaraan_id` (`kendaraan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_driver_id` (`driver_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `kendaraan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_driver_id` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`),
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`kendaraan_id`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
