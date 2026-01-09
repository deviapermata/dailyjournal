-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2025 pada 16.47
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Dinus Inside 2025: Sambut 3.154 Maba', 'Universitas Dian Nuswantoro menyambut 3.154 Mahasiswa Baru (Maba) dalam program Dinus Inside 2025. Acara ini menghadirkan Kuliah Umum oleh Gubernur Jateng dan Expo UKM & Ormawa. Tujuan utamanya adalah mengenalkan dunia kampus.', 'gambar1.jpeg', '2025-09-08', 'admin'),
(2, 'Udinus Raih Top Brand di Satria Education Award', 'Udinus kembali menorehkan prestasi dengan meraih Top Brand Kategori Kampus dengan Inovasi dan Teknologi Terbaik di ajang Satria Education Award 2025. Penghargaan ini menjadi pemicu semangat untuk terus berinovasi.', 'gambar2.jpeg', '2025-12-09', 'admin'),
(3, '5 Tim PKM Udinus Lolos ke PIMNAS ke-38', 'Lima tim Program Kreativitas Mahasiswa (PKM) dari Udinus berhasil lolos untuk bersaing di Pekan Ilmiah Mahasiswa Nasional (PIMNAS) ke-38. Tim-tim ini membawa inovasi di bidang teknologi dan kewirausahaan.', 'gambar3.jpeg', '2025-11-10', 'admin'),
(4, 'Implementasi Etika AI di Era Digital', 'Mahasiswa Program Sarjana Ilmu Komunikasi Udinus mengajak pelajar untuk memahami Etika Penggunaan AI di Era Digital. Tujuannya adalah mendorong penggunaan teknologi yang bijak dan bertanggung jawab.', 'gambar4.webp', '2025-12-09', 'admin'),
(5, 'Rektor Udinus Jajaki Kerja Sama Internasional', 'Rektor Udinus terbang ke China untuk menjajaki kerja sama di empat instansi sekaligus, memperkuat visi Udinus menuju World Class University melalui kolaborasi riset dan pertukaran pelajar global.', 'gambar5.jpeg', '2025-12-05', 'admin'),
(6, 'Pustakawan Udinus Juara Harapan 2 IALA 2025', 'Pustakawan Udinus meraih gelar Juara Harapan 2 dalam Indonesian Academic Librarian Award (IALA) 2025, mengungguli puluhan pustakawan perguruan tinggi lainnya di Jawa Tengah.', 'gambar6.jpeg', '2025-08-25', 'admin'),
(7, 'Fakultas Kedokteran Gelar Sumpah Profesi Lulusan', 'Sebanyak 148 wisudawan dari Program Diploma RMIK Fakultas Kedokteran Udinus melaksanakan sumpah profesi, menandai profesionalisme mereka untuk memasuki dunia kerja dengan Surat Tanda Registrasi (STR).', 'gambar7.jpeg', '2025-12-01', 'admin'),
(8, 'Inovasi Limbah Tenun Menjadi Fashion Berkelanjutan', 'Mahasiswa Udinus berhasil menyulap limbah tenun menjadi produk fashion berkelanjutan yang tidak hanya bernilai estetika tetapi juga fungsional, menunjukkan kreativitas dalam isu lingkungan.', 'gambar8.jpg', '2025-12-01', 'admin'),
(9, 'UKM Bola Voli Udinus Raih Juara di LIVOMA 2025', 'Tim Bola Voli dari Unit Kegiatan Mahasiswa (UKM) Udinus berhasil meraih juara di ajang LIVOMA 2025. Prestasi ini menambah koleksi medali Udinus di kancah olahraga mahasiswa tingkat nasional.', 'gambar9.jpg', '2025-10-20', 'admin'),
(10, 'Jadwal Input KRS Semester Ganjil TA 2025/2026', 'Pengumuman penting untuk seluruh mahasiswa: Jadwal Input Kartu Rencana Studi (KRS) untuk Semester Ganjil TA 2025/2026 akan dimulai pada 26 Agustus 2025. Mahasiswa wajib melakukan perwalian sebelum input.', 'gambar10.jpeg', '2025-08-19', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
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
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
