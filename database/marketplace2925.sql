-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2025 at 11:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace2925`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'peenjeee@gmail.com', '2519164c2caf8c855702819a485ad8e957c41939', 'Peenjeee Ch');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `judul_artikel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto_artikel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_posting` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `foto_artikel`, `tanggal_posting`) VALUES
(2, 'RacerVerse Siap Menggebrak Layar Lebar: Petualangan Bertema Minecraft Hadir untuk Penggemar Aksi', '<p>Penggemar aksi dan dunia Minecraft patut bersiap-siap&mdash;bulan Juli ini, bioskop akan kedatangan koleksi terbaru yang siap menggugah semangat petualangan: <em>RacerVerse</em>. Koleksi ini terinspirasi langsung dari dunia Minecraft yang ikonik dan dihadirkan dengan sentuhan sinematik yang memukau.</p>\r\n\r\n<p><strong>Dari Game ke Dunia Nyata</strong> RacerVerse mengangkat semangat eksplorasi dan kompetisi khas Minecraft ke dalam format film layar lebar. Karakter-karakter dalam cerita akan menghadapi tantangan balap, pertempuran, dan strategi dalam dunia blok yang penuh kejutan.</p>\r\n\r\n<p><strong>Visual Menarik dan Cerita Dinamis</strong> Film ini menawarkan visual yang khas dengan gaya pixelated, dipadukan dengan teknologi sinematografi modern untuk menciptakan pengalaman menonton yang memikat. Aksi intens dan alur cerita yang cepat dijanjikan akan membuat penonton terlibat sejak menit pertama.</p>\r\n\r\n<p><strong>Tidak Hanya untuk Penggemar Minecraft</strong> Meskipun berakar dari game populer, RacerVerse dirancang untuk menjangkau penonton luas. Tema persahabatan, keberanian, dan ketekunan yang diangkat menjadikannya tontonan yang relevan untuk berbagai kalangan.</p>\r\n\r\n<p><strong>Jadwal Tayang</strong> RacerVerse akan tayang secara serentak di berbagai jaringan bioskop mulai minggu ketiga bulan Juli 2025. Penonton dapat menikmati kisah seru yang menggabungkan dunia digital dan aksi nyata dalam satu paket hiburan.</p>\r\n', 'minecraft.png', '2025-07-17 10:59:26'),
(3, 'Bigfoot Rayakan 50 Tahun Aksi Legendaris: Mainan Edisi Khusus Hadir untuk Penggemar Setia', '<p>Sejak pertama kali muncul pada tahun 1975, Bigfoot telah menjadi ikon dalam dunia monster truck dan budaya pop. Lima dekade berlalu, pesona dan kekuatan Bigfoot tetap tak tergantikan&mdash;dan tahun ini, para penggemar diberi kesempatan emas untuk merayakan tonggak bersejarah tersebut.</p>\r\n\r\n<p>Dalam rangka ulang tahun ke-50, sebuah koleksi mainan edisi khusus diluncurkan sebagai penghormatan terhadap warisan panjang Bigfoot. Dirancang dengan detail autentik dan sentuhan nostalgia, mainan ini tidak hanya menjadi pelengkap koleksi, tetapi juga simbol dari sejarah dan semangat aksi yang telah menemani banyak generasi.</p>\r\n\r\n<p>Tak hanya menampilkan desain klasik, koleksi ini juga dilengkapi dengan kemasan eksklusif serta informasi menarik tentang perjalanan Bigfoot selama setengah abad. Produk ini tersedia terbatas dan sudah mulai dipasarkan di toko-toko mainan besar serta platform online.</p>\r\n\r\n<p>Bagi para penggemar, ini lebih dari sekadar mainan&mdash;ini adalah bagian dari sejarah. Ulang tahun ke-50 Bigfoot menjadi momen refleksi sekaligus perayaan untuk sosok legendaris yang telah menginspirasi banyak orang di seluruh dunia.</p>\r\n', 'bigfoot.png', '2025-07-17 10:59:26'),
(5, 'Kolaborasi Ikonik: Hot Wheels dan Formula 1® Hadirkan Koleksi Mainan Bertema Balap Profesional', '<p>Dua nama besar dalam dunia otomotif dan mainan, Hot Wheels dan Formula 1&reg;, kini bergabung dalam sebuah kolaborasi epik yang mengabadikan semangat balap tingkat dunia. Koleksi mainan terbaru ini dirancang untuk menghadirkan sensasi kecepatan, teknik tinggi, dan adrenalin khas Formula 1&reg; ke tangan para penggemar.</p>\r\n\r\n<p>Setiap unit dalam koleksi ini mengusung elemen autentik dari tim-tim Formula 1&reg; papan atas, mulai dari desain mobil balap yang aerodinamis hingga detail warna khas yang merepresentasikan masing-masing tim. Di balik tampilan yang keren, koleksi ini juga memiliki nilai edukatif: memperkenalkan anak-anak dan penggemar muda pada dunia teknik, desain, dan sejarah balap profesional.</p>\r\n\r\n<p>Tak hanya menjadi barang koleksi, produk ini juga bisa menjadi bagian dari pengalaman bermain yang mendekatkan dunia nyata dan imajinasi. Dipasarkan secara global mulai pertengahan tahun ini, koleksi ini menjanjikan daya tarik baik untuk kolektor, pencinta balap, maupun anak-anak yang ingin merasakan kegembiraan di lintasan.</p>\r\n', 'f1.png', '2025-07-17 10:59:26'),
(6, 'Hot Wheels Monster Trucks Live Glow-N-Fire: Jadwal dan Lokasi Tur 2025', '<p>Penggemar monster truck bersiaplah untuk pengalaman spektakuler! Tur <em>Hot Wheels Monster Trucks Live Glow-N-Fire</em> akan berlangsung sepanjang tahun 2025 di berbagai kota besar di Amerika Serikat dan internasional. Berikut beberapa tanggal dan lokasi penting:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>19&ndash;20 Juli 2025</strong> Toyota Center, Houston, TX Nationwide Arena, Columbus, OH</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>26&ndash;27 Juli 2025</strong> Gainbridge Fieldhouse, Indianapolis, IN Frost Bank Center, San Antonio, TX</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>2&ndash;3 Agustus 2025</strong> PPG Paints Arena, Pittsburgh, PA Desert Diamond Arena, Glendale, AZ</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>9 Agustus 2025</strong> Ball Arena, Denver, CO Barclays Center, Brooklyn, NY (dibatalkan)</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Setiap pertunjukan menghadirkan monster truck ikonik seperti Mega Wrex&trade;, Tiger Shark&trade;, HW 5-Alarm&trade;, Bone Shaker&trade;, Bigfoot&reg;, Gunkster&trade;, dan debut Skelesaurus&trade;, sang raksasa fosil yang menggebrak arena.</p>\r\n\r\n<p>Selain pertunjukan utama, tersedia juga:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Power Smashers Pre-Show Party</strong>: akses ke arena sebelum pertunjukan, bertemu langsung dengan para pengemudi dan melihat truk dari dekat.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>VIP Backstage Experience</strong>: tur eksklusif di balik layar, merchandise resmi, dan akses awal ke Pre-Show Party.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Untuk informasi lengkap dan pembelian tiket, kunjungihalaman resmi Hot Wheels Monster Trucks Live.</p>\r\n', 'monster.png', '2025-07-17 10:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(1, 'Collector', 'collector.png'),
(2, 'Die Cast', 'diecast.png'),
(10, 'Truck', 'truck.png'),
(11, 'Construction', 'rakit1.png');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int NOT NULL,
  `id_member_jual` int NOT NULL,
  `id_member_beli` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_member_jual`, `id_member_beli`, `id_produk`, `jumlah`) VALUES
(68, 1, 4, 10, 1),
(77, 2, 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int NOT NULL,
  `email_member` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password_member` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_member` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_member` text COLLATE utf8mb4_general_ci NOT NULL,
  `wa_member` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_distrik_member` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_distrik_member` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `email_member`, `password_member`, `nama_member`, `alamat_member`, `wa_member`, `kode_distrik_member`, `nama_distrik_member`) VALUES
(1, 'tangkeke@gmail.com', 'c54b2c209e166393cb768a8dd1052754871528dc', 'Tang Keke', 'Bumi', '085777419874', '79', 'Kota Bogor Jawa Barat'),
(2, 'liyuu@gmail.com', 'f5b526a3d62015ae93da05b965a929be0628bdfa', 'Liyuu', 'China', '085280664986', '250', 'Kota Magelang Jawa Tengah'),
(4, 'shikimori@gmail.com', 'c48ad30a961799c82a1610a51df961dbadb13820', 'Shikimori Micchon', 'Alam Semesta', '081318897775', '281', 'Kabupaten Merauke Papua');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `id_member` int NOT NULL,
  `id_kategori` int NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_produk` text COLLATE utf8mb4_general_ci NOT NULL,
  `berat_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_member`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `berat_produk`) VALUES
(8, 1, 2, 'Hot Wheels Bugatti Bolide', 50000, '1.jpg', 'HW Exotics 3/10', 250),
(9, 1, 2, 'Hot Wheels McLaren P1', 55000, '21.jpg', 'Quarter Mile Heroes 1/5', 250),
(10, 1, 1, 'Lamborghini Sian FKP 37', 150000, '31.jpg', 'Hot Wheels Collector Vehículo de Colección', 250),
(11, 1, 1, 'Hot Wheels Exotics 7/10 \'16 Bugatti Chiron', 100000, '4.jpg', '236/250, azul', 250),
(12, 2, 10, 'Hot Wheels - Tesla Cybertruck', 75000, '5.png', 'Metal 4/5 - HTB55 - Short Card - ZAMAC - Mattel 2024 - 1:64', 300),
(13, 2, 10, 'Hot Wheels 20 Toyota Tacoma', 60000, '6.png', 'azul, HW Dirt 4/10', 310),
(14, 2, 11, 'HW 2018 50th Anniversary HW Fun Park Bazoomka', 50000, '8.jpg', '(Propeller Plane Car) 60/365, rojo y verde', 150),
(15, 2, 11, 'Hot Wheels X-34 Landspeeder', 65000, '7.jpg', 'HW Screen Time 4/10 [marrón] 31/250', 175);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `caption_slider` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto_slider` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `caption_slider`, `foto_slider`) VALUES
(2, '<p>More Thrilling Action</p>\r\n', '1.png'),
(3, '<p>TRY, FAIL, REPEAT, GROW</p>\r\n', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `kode_transaksi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_member_beli` int NOT NULL,
  `id_member_jual` int NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `belanja_transaksi` int NOT NULL,
  `status_transaksi` enum('pesan','lunas','batal','dikirim','selesa') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pesan',
  `ongkir_transaksi` int NOT NULL,
  `total_transaksi` int NOT NULL,
  `bayar_transaksi` int NOT NULL,
  `distrik_pengirim` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pengirim` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `wa_pengirim` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_pengirim` text COLLATE utf8mb4_general_ci NOT NULL,
  `distrik_penerima` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penerima` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `wa_penerima` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_penerima` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama_ekspedisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `layanan_ekspedisi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `estimasi_ekspedisi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `berat_ekspedisi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `resi_ekspedisi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_member_beli`, `id_member_jual`, `tanggal_transaksi`, `belanja_transaksi`, `status_transaksi`, `ongkir_transaksi`, `total_transaksi`, `bayar_transaksi`, `distrik_pengirim`, `nama_pengirim`, `wa_pengirim`, `alamat_pengirim`, `distrik_penerima`, `nama_penerima`, `wa_penerima`, `alamat_penerima`, `nama_ekspedisi`, `layanan_ekspedisi`, `estimasi_ekspedisi`, `berat_ekspedisi`, `resi_ekspedisi`) VALUES
(35, '202505061321106698', 4, 1, '2025-05-06 13:21:10', 205000, 'lunas', 195000, 400000, 400000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '5-9', '750', 'JNE-11062005'),
(36, '202505061416018395', 4, 1, '2025-05-06 14:16:01', 150000, 'lunas', 195000, 345000, 345000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '5-9', '500', 'JNE-50026011'),
(37, '202505061431111570', 4, 2, '2025-05-06 14:31:11', 165000, 'pesan', 169000, 334000, 334000, 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '6-9', '475', NULL),
(38, '202506241305422593', 4, 1, '2025-06-24 13:05:42', 100000, 'pesan', 300000, 400000, 400000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '16-26', '250', NULL),
(39, '202506241313419094', 4, 1, '2025-06-24 13:13:41', 50000, 'pesan', 195000, 245000, 245000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '5-9', '250', NULL),
(40, '202506241315162970', 4, 1, '2025-06-24 13:15:16', 55000, 'pesan', 300000, 355000, 355000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kabupaten Merauke Papua', 'Shikimori Micchon', '081318897775', 'Alam Semesta', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '16-26', '250', NULL),
(41, '202506241320156249', 2, 1, '2025-06-24 13:20:15', 50000, 'lunas', 55000, 105000, 105000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '3-4', '250', NULL),
(42, '202506241335507995', 2, 1, '2025-06-24 13:35:50', 55000, 'pesan', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(43, '202506241348013294', 2, 1, '2025-06-24 13:48:01', 50000, 'pesan', 21000, 71000, 71000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(44, '202506301029129107', 2, 1, '2025-06-30 10:29:12', 50000, 'lunas', 21000, 71000, 71000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(45, '202507120758509100', 2, 1, '2025-07-12 07:58:50', 55000, 'pesan', 55000, 110000, 110000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '3-4', '250', NULL),
(46, '202507120759577664', 2, 1, '2025-07-12 07:59:57', 55000, 'pesan', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(47, '202507120847471934', 2, 1, '2025-07-12 08:47:47', 55000, 'pesan', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(48, '202507120902306687', 2, 1, '2025-07-12 09:02:30', 55000, 'pesan', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(49, '202507120905022298', 2, 1, '2025-07-12 09:05:02', 55000, 'pesan', 55000, 110000, 110000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '3-4', '250', NULL),
(50, '202507120912463788', 2, 1, '2025-07-12 09:12:46', 100000, 'pesan', 21000, 121000, 121000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(51, '202507120914093281', 2, 1, '2025-07-12 09:14:09', 55000, 'lunas', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(52, '202507120923381127', 2, 1, '2025-07-12 09:23:38', 55000, 'pesan', 21000, 76000, 76000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'Bima Sakti', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(53, '202507131543288933', 2, 1, '2025-07-13 15:43:28', 50000, 'lunas', 21000, 71000, 71000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'China', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(54, '202507131547148439', 2, 1, '2025-07-13 15:47:14', 50000, 'lunas', 21000, 71000, 71000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'China', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL),
(55, '202507131551127968', 2, 1, '2025-07-13 15:51:12', 55000, 'pesan', 55000, 110000, 110000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'China', 'Jalur Nugraha Ekakurir (JNE)', 'JNE Trucking', '3-4', '250', NULL),
(56, '202507131552394028', 2, 1, '2025-07-13 15:52:39', 50000, 'pesan', 21000, 71000, 71000, 'Kota Bogor Jawa Barat', 'Tang Keke', '085777419874', 'Bumi', 'Kota Magelang Jawa Tengah', 'Liyuu', '085280664986', 'China', 'Jalur Nugraha Ekakurir (JNE)', 'Layanan Reguler', '1-2', '250', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `id_produk` int NOT NULL,
  `nama_beli` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah_beli` int NOT NULL,
  `jumlah_rating` int DEFAULT NULL,
  `ulasan_rating` text COLLATE utf8mb4_general_ci,
  `waktu_rating` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_produk`, `nama_beli`, `harga_beli`, `jumlah_beli`, `jumlah_rating`, `ulasan_rating`, `waktu_rating`) VALUES
(41, 35, 11, 'Hot Wheels Exotics 7/10 \'16 Bugatti Chiron', 100000, 1, 5, 'keren ', '2025-05-06 14:06:26'),
(42, 35, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 5, 'bagus', '2025-05-06 14:06:26'),
(43, 35, 9, 'Hot Wheels McLaren P1', 55000, 1, 5, 'murah', '2025-05-06 14:06:26'),
(44, 36, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 5, 'menarik', '2025-05-06 14:16:34'),
(45, 36, 11, 'Hot Wheels Exotics 7/10 \'16 Bugatti Chiron', 100000, 1, 5, 'ganteng', '2025-05-06 14:16:44'),
(46, 37, 14, 'HW 2018 50th Anniversary HW Fun Park Bazoomka', 50000, 2, NULL, NULL, NULL),
(47, 37, 15, 'Hot Wheels X-34 Landspeeder', 65000, 1, NULL, NULL, NULL),
(48, 38, 11, 'Hot Wheels Exotics 7/10 \'16 Bugatti Chiron', 100000, 1, NULL, NULL, NULL),
(49, 39, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, NULL, NULL, NULL),
(50, 40, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(51, 41, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 5, 'dad', '2025-07-12 09:28:48'),
(52, 42, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(53, 43, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, NULL, NULL, NULL),
(54, 44, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 5, 'kakakaka', '2025-06-30 10:30:08'),
(55, 45, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(56, 46, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(57, 47, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(58, 48, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(59, 49, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(60, 50, 11, 'Hot Wheels Exotics 7/10 \'16 Bugatti Chiron', 100000, 1, NULL, NULL, NULL),
(61, 51, 9, 'Hot Wheels McLaren P1', 55000, 1, 5, 'dad', '2025-07-12 09:20:35'),
(62, 52, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(63, 53, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 5, 'pl', '2025-07-13 15:45:54'),
(64, 54, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, 2, 'dada', '2025-07-13 15:48:20'),
(65, 55, 9, 'Hot Wheels McLaren P1', 55000, 1, NULL, NULL, NULL),
(66, 56, 8, 'Hot Wheels Bugatti Bolide', 50000, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
