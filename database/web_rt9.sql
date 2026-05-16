-- Database: web_rt9
-- Created for RT 9 Sambiroto Website

CREATE DATABASE IF NOT EXISTS `web_rt9`;
USE `web_rt9`;

-- Table: admin
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default admin user (password: admin123)
INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36P4/R1i');

-- Table: artikel
CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table: galeri
CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table: penduduk
CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(20) NOT NULL UNIQUE,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15),
  `pekerjaan` varchar(100),
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table: keuangan
CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tanggal` (`tanggal`),
  KEY `tipe` (`tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table: komentar
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artikel_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `status` enum('pending','aktif','spam') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `artikel_id` (`artikel_id`),
  FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample data for artikel
INSERT INTO `artikel` (`judul`, `konten`, `gambar`) VALUES
('Selamat Datang di RT 9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'default.jpg'),
('Informasi Penting RT 9', 'Berita penting mengenai kegiatan RT 9 Sambiroto. Semua warga diharapkan berpartisipasi dalam setiap kegiatan yang diadakan.', 'default.jpg'),
('Acara Kebersamaan', 'Laporan acara kebersamaan warga RT 9 yang diadakan bulan lalu. Semua warga antusias mengikuti kegiatan ini.', 'default.jpg');

-- Sample data for penduduk
INSERT INTO `penduduk` (`nama`, `no_ktp`, `alamat`, `no_telepon`, `pekerjaan`) VALUES
('Budi Santoso', '3311111122334455', 'Jalan RT 9 No. 1', '081234567890', 'Petani'),
('Siti Nur Azizah', '3311111122334456', 'Jalan RT 9 No. 2', '082345678901', 'Ibu Rumah Tangga'),
('Ahmad Hidayat', '3311111122334457', 'Jalan RT 9 No. 3', '083456789012', 'Pedagang'),
('Dewi Lestari', '3311111122334458', 'Jalan RT 9 No. 4', '084567890123', 'PNS');

-- Sample data for keuangan
INSERT INTO `keuangan` (`tanggal`, `tipe`, `keterangan`, `nominal`) VALUES
('2024-01-01', 'masuk', 'Iuran bulanan warga', 2000000),
('2024-01-05', 'keluar', 'Pembersihan jalan', 500000),
('2024-01-10', 'masuk', 'Sumbangan sukarela', 1000000),
('2024-01-15', 'keluar', 'Perbaikan saluran air', 750000);
