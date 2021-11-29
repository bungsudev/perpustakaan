-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 03:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neoschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tahun_lulus` date NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `penghasilan` double NOT NULL,
  `alamat_pt` text NOT NULL,
  `images` text NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `id_sekolah`, `nama`, `tahun_lulus`, `telepon`, `email`, `alamat`, `kegiatan`, `penghasilan`, `alamat_pt`, `images`, `status`, `created`, `created_by`, `edited`, `edited_by`, `deleted`) VALUES
(1, 0, 'Al Azmi', '2021-10-22', '081774124643', '', 'Jalan KH Samanhudi No 20 Medan', 'Kuliah', 50000000, 'Jalan KH Samanhudi No 20 Medan', 't-2.png', 'aktif', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, NULL),
(4, 1, 'Roberto Carla', '2021-10-22', '081774124643', 'amialazmi@gmail.com', 'Jalan KH Samanhudi No 20 Medan', 'Bekerja', 120000, 'Jalan KH Samanhudi No 20 Medan', 'c38868c3682fea4d8b6599a90da06046.png', 'aktif', '2021-10-22 21:03:27', 0, '0000-00-00 00:00:00', 0, NULL),
(5, 1, 'Fullan Bin AS', '2021-01-22', '081376667771', 'stellmarishospital2017@gmail.com', 'Jalan KH Samanhudi No 20 Medan', 'Wirausaha', 3000000, 'Jalan KH Samanhudi No 20 Medan', '7122dd16d2864b5a855407f96abb64aa.png', 'aktif', '2021-10-22 21:04:11', 0, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tag` varchar(15) DEFAULT NULL,
  `judul` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `konten` longtext NOT NULL,
  `images` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_sekolah`, `id_kategori`, `id_tag`, `judul`, `slug`, `konten`, `images`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(15, 1, 7, '', 'Daftar Penerima Bantuan Pangan Non Tunai (Kemensos) Tahun 2020 Desa Jelok Kecamatan Kaligesing', 'daftar-penerima-bantuan-pangan-non-tunai-kemensos-tahun-2020-desa-jelok-kecamatan-kaligesing', '<p>Bantuan Pangan Non Tunai (BPNT)&nbsp;adalah bantuan pangan dari pemerintah yang diberikan kepada KPM setiap bulannya melalui mekanisme akun elektronik yang digunakan hanya untuk membeli pangan di e-Warong KUBE PKH / pedagang bahan pangan yang bekerjasama dengan Bank HIMBARA. Bertujuan untuk mengurangi beban pengeluaran serta memberikan nutrisi yang lebih seimbang kepada KPM secara tepat sasaran dan tepat waktu. Berikut ini daftar penerima PKH desa Jelok Kecamatan Kaligesing :</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td colspan=\"2\">NO</td>\r\n<td>Nama</td>\r\n<td>Alamat</td>\r\n<td>Nama Ibu Kandung</td>\r\n<td>Desa</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">1</td>\r\n<td>LASTARI</td>\r\n<td>DUSUN KALISENG RW 03 RT 01</td>\r\n<td>ITHENG</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">2</td>\r\n<td>EDHI ARIYANTO</td>\r\n<td>GAMBASAN RT 01RW 04</td>\r\n<td>JUMIYATI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">3</td>\r\n<td>SUKATI</td>\r\n<td>SUKUH RT 01RW 07</td>\r\n<td>MUSIRAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">4</td>\r\n<td>NUNUNG ROMA KARYANI</td>\r\n<td>GAMBASAN RT 01RW 04</td>\r\n<td>MUSTINAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">5</td>\r\n<td>MARTINI</td>\r\n<td>KALISENG</td>\r\n<td>NGADIKEM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">6</td>\r\n<td>SUTININGSIH</td>\r\n<td>DUSUN KRAJAN 1 RW 01 RT 01</td>\r\n<td>NGASINEM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>&nbsp;</td>\r\n<td>AAM</td>\r\n<td>DUSUN KRAJAN 1 RW 01 RT 01</td>\r\n<td>OOM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>8</td>\r\n<td>&nbsp;</td>\r\n<td>SITI KHOMSATUN</td>\r\n<td>SIBATUR RT 01RW 06</td>\r\n<td>PAINI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>9</td>\r\n<td>&nbsp;</td>\r\n<td>SUNARYO</td>\r\n<td>DUSUN KALISENG RW 03 RT 01</td>\r\n<td>PAINTEN</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>10</td>\r\n<td>&nbsp;</td>\r\n<td>TUMINAH</td>\r\n<td>DUSUN KRAJAN 1 RW 01 RT 01</td>\r\n<td>PARINAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>11</td>\r\n<td>&nbsp;</td>\r\n<td>KAMSUDI</td>\r\n<td>KRAJAN 1 RT 01RW 01</td>\r\n<td>RETI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>12</td>\r\n<td>&nbsp;</td>\r\n<td>REBUT SUSANTI</td>\r\n<td>DUSUN KRAJAN 1 RW 01 RT 01</td>\r\n<td>RUBINI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>13</td>\r\n<td>&nbsp;</td>\r\n<td>SATINEM</td>\r\n<td>DUSUN KRAJAN 1 RW 01 RT 01</td>\r\n<td>SAMINAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>14</td>\r\n<td>&nbsp;</td>\r\n<td>SARINAH</td>\r\n<td>DUSUN KALISENG RW 03 RT 01</td>\r\n<td>SARIYEM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>15</td>\r\n<td>&nbsp;</td>\r\n<td>EKA PRASTIWI</td>\r\n<td>NGESONG</td>\r\n<td>SITI PATIMAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>16</td>\r\n<td>&nbsp;</td>\r\n<td>SUSANTI OKTAFIA</td>\r\n<td>SIBATUR RT 01RW 06</td>\r\n<td>SRI WAHAYU</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>17</td>\r\n<td>&nbsp;</td>\r\n<td>KASERAN</td>\r\n<td>DUSUN KALISENG RW 03 RT 01</td>\r\n<td>SURIP</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>18</td>\r\n<td>&nbsp;</td>\r\n<td>TUTUT WINDARI</td>\r\n<td>GAMBARAN</td>\r\n<td>TITI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>19</td>\r\n<td>&nbsp;</td>\r\n<td>WAGE</td>\r\n<td>DUSUN KRAJAN 2 RW 02 RT 01</td>\r\n<td>TUKIYEM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>20</td>\r\n<td>&nbsp;</td>\r\n<td>TUKIYAH</td>\r\n<td>NGESONG</td>\r\n<td>TUKIYEM</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>21</td>\r\n<td>&nbsp;</td>\r\n<td>PARIASIH</td>\r\n<td>SIBATUR RT 01RW 06</td>\r\n<td>TUNI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>22</td>\r\n<td>&nbsp;</td>\r\n<td>JUWARIYAH</td>\r\n<td>DUSUN NGESONG RW 05 RT 01</td>\r\n<td>UWUH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>23</td>\r\n<td>&nbsp;</td>\r\n<td>PARJAN</td>\r\n<td>DUSUN NGESONG RW 05 RT 01</td>\r\n<td>WAGINAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>24</td>\r\n<td>&nbsp;</td>\r\n<td>SRI SUGIHARTI</td>\r\n<td>NGESONG</td>\r\n<td>WAKINAH</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>25</td>\r\n<td>&nbsp;</td>\r\n<td>NUR AENI</td>\r\n<td>KRAJAN 2</td>\r\n<td>WASNI</td>\r\n<td>JELOK</td>\r\n</tr>\r\n<tr>\r\n<td>26</td>\r\n<td>&nbsp;</td>\r\n<td>HARYANI</td>\r\n<td>DUSUN NGESONG RW 05 RT 01</td>\r\n<td>WELAS</td>\r\n<td>JELOK</td>\r\n</tr>\r\n</tbody>\r\n</table>', '81e00916533c795b2443ee16e55e70cb.jpg', 1, '2021-09-11 13:38:48', 1, '2021-09-22 11:21:53'),
(17, 1, 6, '', 'Brikoka Dalam Pipa, Solusi Pupuk Bagi Tanaman Vanili', 'brikoka-dalam-pipa-solusi-pupuk-bagi-tanaman-vanili', '<p>Budidaya tanaman vanili dalam planter bag menjadi terobosan baru untuk mempermudah petani di Desa Jelok, Kecamatan Kaligesing, Kabupaten Purworejo.&nbsp;Inovasi tersebut dikembangkan oleh Program Kemitraan Masyarakat (PKM) Kemenristekdikti dan Universitas Muhammadiyah Purworejo (UMP).<br /><br />\"Penanaman vanili dalam planter bag ini bisa menjadi solusi bagi permasalahan petani di Desa Jelok. Karena dengan menggunakan kantong plastik, vanili bisa ditanam di dekat rumah sehingga pemeliharaan dan pemanenan lebih mudah,\" jelas Ketua Tim PKM, Jeki MW Wibawanti, SPt, MEng, MSi di lokasi penanaman siang ini (23/8).<br /><br />Vanili yang dikenal dengan istilah emas hijau, menjadi komoditi yang berharga mahal. Harga vanili basah bisa mencapai Rp550 ribu/kg. Mahalnya harga vanili, membuat orang tak bertanggung jawab mencurinya, sehingga merugikan petani.<br /><br />Alhasil, banyak petani yang kemudian tidak mau lagi menanamnya. Belum lagi bencana longsor yang sering terjadi di desa ini.</p>\r\n<p>Program kemitraan ini mengambil tema Brikoka (Briket Kotoran Kambing) Fermentasi Sebagai Isi Pipa Panjat Budidaya Vanili Dalam Planter Bag\'.<br /><br />\"Teknik penanamannya adalah dengan menggunaka pipa yang telah diisi oleh fermentasi kotoran kambing etawa, brikoka, sehingga pohon vanili yang merambat dapat sekaligus sebagai media rambat bagi akarnya,\" terang Jeki lagi.<br /><br />Pihaknya menggunakan kotoran kambing sebagai tema PKM ini karena melihat Kecamatan Kaligesing menjadi sentra kambing etawa.<br /><br />Limbah kotoran kambing tersebut bisa dimanfaatkan untuk pupuk tanaman vanili.<br /><br />Jeki berharap, adanya pipa panjat yang diisi brikoka mampu menjaga vanili tetap berbuah. Meskipun batang bawah terputus karena terserang penyakit busuk batang.<br /><br />Program ini juga menginisiasi Produk Unggulan Kawasan Pedesaan (Prukades) berupa brikoka dalam kemasan yang akan bekerjasama dengan Badan Usaha Milik Desa (Bumdes) Jelok.<strong>&nbsp;</strong></p>', 'bef4a173d59eecd83b9625284436a207.jpg', 1, '2021-09-11 18:28:34', 1, '2021-09-22 11:21:55'),
(18, 1, 7, '', 'Pelantikan Perangkat Desa Jelok 2019', 'pelantikan-perangkat-desa-jelok-2019', '<p>Kegiatan Pelantikan Perangkat Desa Jelok yang dilaksanakan di Balai Desa Jelok berlangsung tertib dan lancar. Hadir dalam kegiatan tersebut Camat Kaligesing beserta muspika, Lembaga Kemasyarakatan Desa, Anggota BPD dan warga masyarakat Desa Jelok.</p>\r\n<p>Pengambilan sumpah dan pelantikan oleh Kepala Desa Jelok yang diikuti oleh 3 Perangkat Desa baru berlangsung khidmad. Kepala Desa Jelok berharap dengan telah diambil sumpah serta dilantik menjadi perangkat desa, perangkat desa tersebut dapat segera beradaptasi dengan lingkungan di pemerintah desa Jelok. Selain itu juga diharapkan agar dapat mengemban amanah dengan penuh tanggung jawab.</p>\r\n<p>Camat Kaligesing dalam sambutan dan arahannya juga menyampaikan bahwa dengan telah diambil sumpah serta dilantik oleh kepala desa, berarti sudah resmi menjadi perangkat desa dan harus segera bekerja sesuai dengan tugas pokok dan fungsi masing-masing. Apalagi menjelang awal tahun anggaran baru diharapkan dapat ikut mempercepat kegiatan penyusunan APBDesa Tahun 2020 dan selesai sesuai dengan tahapan waktu yang telah ditentukan. Terkait dengan situasi kondisi serta cuaca saat ini yang sudah memasuki musim penghujan, diharapkan aparat pemerintah desa dan warga masyarakat desa Jelok meningkatkan kewaspadaan dilingkungan masing-masing. Sehingga jika melihat akan terjadi suatu kejadian bencana, dapat segera mengambil langkah-langkah antisipasi untuk meminimalisir kerugian yang lebih besar lagi.</p>', '8df32e099c7d99da400804b4886754c6.jpg', 1, '2021-09-11 18:32:10', 1, '2021-09-22 11:21:57'),
(20, 1, 6, '', 'Rayakan Tahun Baru 2021 Di Rumah Saja', 'rayakan-tahun-baru-2021-di-rumah-saja', '<p>Perayaan Natal dan Tahun Baru 2021 yang berpotensi membuat kerumunan, diperlukan beberapa langkah antisipatif untuk pengendalian dan pencegahan kasus Covid-19. Terkait hal itu, Bupati Purworejo RH Agus Bastian SE MM mengeluarkan surat edaran yang berisi himbauan.</p>\r\n<p>Dalam surat itu Bupati menghimbau agar protokol kesehatan diberlakukan lebih ketat di seluruh destinasi wisata. Pemilik caf&eacute; agar menutup operasionalnya maksimal pukul 22.00 WIB.</p>\r\n<p>Penyelenggara event tidak diperbolehkan menyelenggarakan event pada pergantian tahun baru, sedangkan masyarakat agar berada di rumah saja.Tiak ada acara perayaan pergantian tahun baru di alun-alun Purworejo, Kutoarjo maupun di semua kecamatan.</p>\r\n<p>Kawasan alun-alun Purworejo dan Kutoarjo ditutup mulai pukul 18.00, serta dilarang melakukan konvoi kendaraan. Sedangkan seluruh obyek wisata di Purworejo ditutup mulai 24 Desember hingga 4 Januari, untuk mengurangi penyebaran Covid-19 dan kerumunan massa.</p>\r\n<p>Bupati juga memerintahkan agar Satgas Covid-19 Kabupaten Purworejo melakukan monitoring.</p>', '22acec0cd287beb94fe09afe0c4b4188.jpg', 1, '2021-09-19 15:49:05', 1, '2021-09-19 14:08:34'),
(21, 1, 7, '', 'DAFTAR PENERIMA JPS KABUPATEN PURWOREJO DESA JELOK KECAMATAN KALIGESING TAHUN 2020', 'daftar-penerima-jps-kabupaten-purworejo-desa-jelok-kecamatan-kaligesing-tahun-2020', '<p>&nbsp; Kementerian Ketenagakerjaan bekerja sama dengan Kementerian Desa, Pembangunan Daerah Tertinggal, dan Transmigrasi menggelar program Jaring Pengaman Sosial (JPS) untuk membantu pekerja yang ter-PHK serta menciptakan lingkungan yang bersih dan sehat di desa.<br /><br />&nbsp; &nbsp; Program JPS ini ditujukan untuk menciptakan lapangan kerja bagi pekerja terdampak pandemi Covid-19, baik yang ter-PHK maupun dirumahkan, melalui program padat karya di pedesaan serta mendukung Sustainable Development Goals (SDGs) di Indonesia. Berikut daftar penerima JPS Desa Jelok Tahun 2020:</p>\r\n<p>&nbsp;</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td><strong>NO</strong></td>\r\n<td colspan=\"2\"><strong>nmkab</strong></td>\r\n<td><strong>nmkec</strong></td>\r\n<td colspan=\"3\"><strong>desa</strong></td>\r\n<td colspan=\"2\"><strong>nama</strong></td>\r\n<td colspan=\"2\"><strong>L/P</strong></td>\r\n<td colspan=\"5\"><strong>alamat</strong></td>\r\n</tr>\r\n<tr>\r\n<td>1</td>\r\n<td colspan=\"2\">PURWOREJO</td>\r\n<td>KALIGESING</td>\r\n<td colspan=\"3\">JELOK</td>\r\n<td colspan=\"2\">SUYATI</td>\r\n<td colspan=\"2\">P</td>\r\n<td colspan=\"5\">Kaliseng Rt 01 Rw 03</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td colspan=\"2\">PURWOREJO</td>\r\n<td>KALIGESING</td>\r\n<td colspan=\"3\">JELOK</td>\r\n<td colspan=\"2\">ISNUR CHOTIMAH</td>\r\n<td colspan=\"2\">P</td>\r\n<td colspan=\"5\">Kaliseng Rt 01 Rw 03</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>WITO</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Gambasa RT 01 RW 04</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>SUPRIYANTINI</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Krajan II RT 001 RW 002 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>MARSINI</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Kaliseng Rt 01 Rw 03 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>ELISA</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Krajan II RT 001 RW 002 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>SUGIATMI</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Krajan II RT 001 RW 002 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>8</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>DARMINI</td>\r\n<td>&nbsp;</td>\r\n<td>P</td>\r\n<td>&nbsp;</td>\r\n<td>Gambasan RT 01 RW 04 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>9</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>WARNO DIHARJO</td>\r\n<td>&nbsp;</td>\r\n<td>L</td>\r\n<td>&nbsp;</td>\r\n<td>Gambasa RT 01 RW 04 Desa Jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>10</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>WALUYO</td>\r\n<td>&nbsp;</td>\r\n<td>L</td>\r\n<td>&nbsp;</td>\r\n<td>sibatur rt 01 rw 06 desa jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>11</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>SAMINGUN</td>\r\n<td>&nbsp;</td>\r\n<td>L</td>\r\n<td>&nbsp;</td>\r\n<td>ngesong rt 01 rw 05 desa jelok</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>12</td>\r\n<td>PURWOREJO</td>\r\n<td>&nbsp;</td>\r\n<td>KALIGESING</td>\r\n<td>JELOK</td>\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n<td>SLAMET</td>\r\n<td>&nbsp;</td>\r\n<td>L</td>\r\n<td>&nbsp;</td>\r\n<td>sukuh rt 01 rw07 desa jelok</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'c981eb2e63c8a9203a9524d75dac7c41.jpg', 1, '2021-09-19 15:49:46', 1, '2021-09-19 14:08:23'),
(22, 1, 7, '6,7,8', 'Mendes Terbitkan Peraturan soal Prioritas Penggunaan Dana Desa 2021', 'mendes-terbitkan-peraturan-soal-prioritas-penggunaan-dana-desa-2021', '<p>Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi (Mendes PDTT) Abdul Halim Iskandar mengeluarkan peraturan mengenai&nbsp;prioritas penggunaan dana desa 2021.</p>\r\n<p>Permendes Nomor 13 tahun 2020 itu menjadi dasar bagi 74.953 desa dalam menyusun rencana kerja dan APBDes 2021. &ldquo;Saya ingin menginformasikan telah diundangkannya Peraturan Menteri Desa Pembangunan Daerah Tertinggal dan Transmigrasi tanggal 15 September 2020 dengan nomor keputusan atau Permendesa nomor 13 tahun 2020 tentang prioritas penggunaan dana desa 2021,&rdquo; kata Abdul Halim dalam konferensi pers virtual, Senin (21/9/2020).<br /><br />Abdul Halim mengatakan, peraturan tersebut sesuai dengan model pembangunan nasional yang berdasarkan pada Peraturan Presiden nomor 59 tahun 2017 tentang Pelaksanaan Pencapaian Tujuan Pembangunan Nasional Berkelanjutan atau SDGs (Sustainable Development Goals).</p>\r\n<p>Permendes menegaskan bahwa dana desa tahun anggaran 2021 diprioritaskan untuk pencapaian SDGs Desa yang mengukur seluruh aspek pembangunan, sehingga mampu mewujudkan perkembangan manusia seutuhnya.</p>\r\n<p>Tujuannya, meningkatkan kesejahteraan masyarakat.</p>\r\n<p><br />Adapun perwujudan program SDGs Desa berupa, Desa Tanpa Kemiskinan, Desa Tanpa Kelaparan, Desa Sehat dan Sejahtera, Pendidikan Desa Berkualitas, Keterlibatan Perempuan Desa, Desa Layak Air Bersih dan Sanitasi, Desa Berenergi Bersih dan Terbarukan, Pertumbuhan Ekonomi Desa Merata, Infrastruktur dan Inovasi Desa sesuai Kebutuhan, dan Desa tanpa Kesenjangan.</p>\r\n<p>Kemudian, Kawasan Permukiman Desa Aman dan Nyaman, Konsumsi dan Produksi Desa Sadar Lingkungan, Desa Tanggap Perubahan Iklim, Desa Peduli Lingkungan Laut, Desa Peduli Lingkungan Darat, Desa Damai Berkeadilan, dan Kemitraan untuk Pembangunan Desa.</p>\r\n<p>Abdul Halim menuturkan, pelaksanaan SDGs Global di Indonesia dipayungi Perpres Nomor 59 tahun 2017 tentang Pelaksanaan Pencapaian Tujuan Pembangunan Nasional Berkelanjutan di Indonesia.</p>\r\n<p>&ldquo;Karena Indonesia adalah anggota PBB kemudian Indonesia berperan aktif dalam penentuan sasaran SDGs,&rdquo; kata Mendes.<br /><br />Artikel ini telah tayang di&nbsp;<a href=\"https://www.kompas.com/\">Kompas.com</a>&nbsp;dengan judul \"Mendes Terbitkan Peraturan soal Prioritas Penggunaan Dana Desa 2021\"</p>\r\n<p>&nbsp;</p>', 'a2ed4ecd52b289b5f983b822d4f78e8d.jpg', 1, '2021-09-19 15:51:45', 1, '2021-10-10 07:33:25'),
(26, 1, 10, '7,8', 'Danau Toba', 'danau-toba', '<div id=\"paragrafParent\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>', 'a7f0bcaed1f6d6a995c21cf93af47ecf.jpg', 1, '2021-09-21 14:07:54', 1, '2021-09-21 12:08:22'),
(27, 1, 10, '6,7', 'Pemandian Air Hangat Sangubanyu', 'pemandian-air-hangat-sangubanyu', '<p>Pemandian air hangat Sangubanyu terletak di Desa Pesanggrahan Kecamatan Bawang, sekitar 50 km selatan ibukota Kabupaten Batang. Mata air hangat muncul dari sekitar bebatuan sebelah barat sungai yang merupakan perbatasan Kabupaten Batang dan Kabupaten Kendal. Objek wisata ini dilengkapi kebun binatang mini dan wahana permainan ATV. Pemandian Air Hangat Sangubanyu akan dikembangkan agar lebih baik lagi.</p>', '44f64f2e01e9e8e8ae932d11c1bd5715.jpg', 1, '2021-09-21 14:10:55', 1, '2021-09-21 12:10:55'),
(28, 1, 10, '6,7', 'Pantai Celong', 'pantai-celong', '<p>Terletak di kecamatan Bayuputih, 32 km timur ibukota Kabupaten Batang. Pantai dengan karakteristik bebatuan karang menghampar di sepanjang pantai, memecahkan gulungan ombak Laut Jawa yang saling beriringan.</p>\r\n<p>Pantai Celong diyakini sebagai tempat berlabuhnya Dapunta Syailendra (pendiri Wangsa Syailendra yang keturunannya menjadi Raja - Raja Mataram Kuno) di Tanah Jawa.</p>\r\n<p>Keindahan pantai ini dapat dilihat dari ketinggian yang memperlihatkan jalur kereta api yang menghubungkan Jakarta - Surabaya berdampingan dengan garis pantai, serta keindahan Laut Jawa bertemu dengan daratan Pulau Jawa.</p>', '9e4ac73a2b5ab19e8ffa2381065ca9a2.jpg', 1, '2021-09-21 14:12:13', 1, '2021-09-21 12:12:13'),
(29, 2, 7, '6,7', 'Transaksi Berlangsung Cepat', 'transaksi-berlangsung-cepat', '<p>asdasdasdas</p>', '74ec2d8a070a88d467de24ac754e6f50.jpg', 2, '2021-09-22 13:38:34', 2, '2021-09-22 11:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast_sms`
--

CREATE TABLE `broadcast_sms` (
  `id_broadcast_sms` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_pengumuman` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('pending','done') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broadcast_sms`
--

INSERT INTO `broadcast_sms` (`id_broadcast_sms`, `id_sekolah`, `id_pengumuman`, `pesan`, `status`, `created`, `created_by`, `edited`, `edited_by`, `deleted`) VALUES
(1, 1, 0, 'asdasdadsa', 'pending', '2021-10-16 20:47:33', 1, '0000-00-00 00:00:00', 0, NULL),
(2, 1, 0, 'dsasdasdas', 'pending', '2021-10-16 20:48:22', 1, '0000-00-00 00:00:00', 0, NULL),
(3, 1, 0, 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak', 'pending', '2021-10-18 20:22:16', 1, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dumy`
--

CREATE TABLE `dumy` (
  `id` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galleri`
--

CREATE TABLE `galleri` (
  `id_galleri` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `caption` varchar(150) NOT NULL,
  `images` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleri`
--

INSERT INTO `galleri` (`id_galleri`, `id_sekolah`, `caption`, `images`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(19, 1, 'Pemberian Penghargaan Lomba Linmas', 'd1ced7685ce3686353e9794b37211134.jpg', 1, '2021-09-19 14:45:26', 1, '2021-09-22 11:37:09'),
(20, 1, 'Ujian Seleksi Sekdes', '550d6fbaede11911724f403325c9f6a2.jpg', 1, '2021-09-19 15:11:17', 1, '2021-09-19 13:11:17'),
(21, 1, 'Pelantikan Sekretaris Desa', 'fe45141dda3b977438f69c6a344fd515.jpg', 1, '2021-09-19 15:12:21', 1, '2021-09-19 13:12:21'),
(22, 1, 'Ucapan Selamat Kepada Perangkat Desa', '7472d6dcda8eb9de601b9f31e6730427.jpg', 1, '2021-09-19 15:12:48', 1, '2021-09-19 13:12:48'),
(23, 1, 'Foto Bersama', '5584b7e6fed7b36d6b3c8392b2c8c59a.jpg', 1, '2021-09-19 15:13:14', 1, '2021-09-19 13:13:14'),
(24, 2, 'Pemberian Penghargaan Lomba Linmas', '964af97bb22105152951a338a16def1a.jpg', 2, '2021-09-22 14:17:50', 2, '2021-09-22 12:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` int(11) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` longtext DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` varchar(128) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identitas_sekolah`
--

CREATE TABLE `identitas_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(128) NOT NULL,
  `npsn` varchar(128) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `alamat` longtext NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `website` varchar(255) NOT NULL,
  `tentang` longtext NOT NULL,
  `maps` longtext NOT NULL,
  `lambang_desa` longtext DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `edited` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_sekolah`
--

INSERT INTO `identitas_sekolah` (`id_sekolah`, `nama_sekolah`, `npsn`, `kode_pos`, `alamat`, `email`, `telepon`, `website`, `tentang`, `maps`, `lambang_desa`, `status`, `edited`) VALUES
(1, 'Kutacane', '01', '20146', 'Jalan KH Samanhudi No 20 Medan', 'amialazmi@gmail.com', '081774124643', 'localhost/sekolah/webprofile', 'Tentang desa', 'https://goo.gl/maps/qrkT5SEQzBjTfXtq8', 'a0d9a758c4f6281549d3b1512ca257c8.png', 'Aktif', '2021-10-11 19:27:34'),
(2, 'Desa Contoh\r\n', '02', '20146', 'Jalan KH Samanhudi No 20 Medan', 'amialazmi@gmail.com', '081774124643', 'localhost/desa/desacontoh', 'Tentang desa', 'https://goo.gl/maps/qrkT5SEQzBjTfXtq8', 'a0d9a758c4f6281549d3b1512ca257c8.png', 'Aktif', '2021-09-16 16:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_jurusan` varchar(128) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_sekolah`, `nama_kategori`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(6, 1, 'Kesehatan', 1, '2021-09-11 11:18:56', 1, '2021-09-11 09:18:56'),
(7, 1, 'Politik', 1, '2021-09-11 12:32:35', 1, '2021-09-11 10:32:35'),
(10, 1, 'Wisata Desa', 1, '2021-09-21 14:01:47', 1, '2021-09-21 12:01:47'),
(11, 1, 'rse', 1, '2021-10-16 19:36:54', 1, '2021-10-16 12:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_loker`
--

CREATE TABLE `kategori_loker` (
  `id_kategori_loker` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_kategori` varchar(150) CHARACTER SET latin1 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_loker`
--

INSERT INTO `kategori_loker` (`id_kategori_loker`, `id_sekolah`, `nama_kategori`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(6, 1, 'Kesehatan', 1, '2021-09-11 11:18:56', 1, '2021-09-11 09:18:56'),
(7, 1, 'Pertambangan', 1, '2021-09-11 12:32:35', 1, '2021-10-21 09:30:06'),
(10, 1, 'PNS', 1, '2021-09-21 14:01:47', 1, '2021-10-21 09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_wali_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `ip_address` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` longtext NOT NULL,
  `status` enum('publish','hide','pending') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `edited` datetime DEFAULT NULL,
  `edited_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_sekolah`, `id_artikel`, `ip_address`, `nama`, `email`, `komentar`, `status`, `created`, `edited`, `edited_by`) VALUES
(6, 1, 22, '::1', 'Firman', 'admin@gmail.com', ' There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', 'hide', '2021-10-13 17:26:14', '2021-10-14 00:26:14', 1),
(7, 1, 21, '::1', 'Roland Pardosi', 'member@gmail.com', 'Testing', 'publish', '2021-10-13 17:02:13', '2021-10-14 00:02:13', 1),
(9, 1, 22, '::1', 'Firman', 'admin@gmail.com', 'asdasdasdas', 'publish', '2021-10-18 13:15:10', '2021-10-18 20:15:10', 1),
(10, 2, 22, '::1', 'Ary Fahreza', 'admin@gmail.com', 'Artikel ini telah tayang di Kompas.com dengan judul \"Mendes Terbitkan Peraturan soal Prioritas Penggunaan Dana Desa 2021\"', 'pending', '2021-10-13 13:56:30', '2021-10-13 20:30:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id_log_login` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `browser` varchar(150) NOT NULL,
  `ip_address` varchar(150) NOT NULL,
  `os` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id_log_login`, `id_sekolah`, `id_user`, `nama`, `level`, `browser`, `ip_address`, `os`, `created`, `created_by`) VALUES
(6, 2, 2, 'Firman', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:13:19', 2),
(7, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:16:21', 1),
(8, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:34:10', 1),
(9, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:34:10', 1),
(10, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:34:10', 1),
(11, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 14:16:21', 1),
(12, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 21:51:43', 1),
(13, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 21:54:06', 1),
(14, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-07 22:24:05', 1),
(15, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-08 09:59:53', 1),
(16, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-08 14:27:49', 1),
(17, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-08 21:02:36', 1),
(18, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-08 22:00:45', 1),
(19, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-09 02:17:17', 1),
(20, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-09 02:18:40', 1),
(21, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-09 08:55:53', 1),
(22, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-09 10:27:38', 1),
(23, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-09 19:05:59', 1),
(24, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-10 03:22:40', 1),
(25, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-10 14:24:20', 1),
(26, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-10 19:07:51', 1),
(27, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-11 08:06:17', 1),
(28, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-11 13:10:05', 1),
(29, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-11 19:14:32', 1),
(30, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-12 20:11:29', 1),
(31, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-13 07:58:46', 1),
(32, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:20:51', 1),
(33, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:33:47', 1),
(34, 1, 2, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:39:20', 2),
(35, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:39:35', 1),
(36, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:41:24', 1),
(37, 1, 1, 'Admin', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13 19:42:05', 1),
(38, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-14 09:28:41', 1),
(39, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 12:00:22', 1),
(40, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:34:14', 1),
(41, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:34:24', 1),
(42, 1, 2, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:34:37', 2),
(43, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:34:46', 1),
(44, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:38:05', 1),
(45, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16 19:38:48', 1),
(46, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-17 23:09:56', 1),
(47, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-18 20:12:49', 1),
(48, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-20 21:01:04', 1),
(49, 1, 1, 'Firman', 'Administrator', 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-20 21:33:50', 1),
(50, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 14:31:53', 1),
(51, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 14:57:43', 1),
(52, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 15:54:47', 1),
(53, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:46:22', 1),
(54, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:47:23', 1),
(55, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:47:57', 1),
(56, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:48:53', 1),
(57, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:52:59', 1),
(58, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-13 16:53:31', 1),
(59, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 16:32:34', 1),
(60, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 16:33:28', 1),
(61, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 16:34:20', 1),
(62, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 16:35:47', 1),
(63, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 17:26:15', 1),
(64, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 17:29:22', 1),
(65, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-14 23:51:02', 1),
(66, 1, 1, 'Firman', 'Administrator', 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-15 09:40:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id_loker` int(11) NOT NULL,
  `jenis` enum('basic','advance') NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tags` text CHARACTER SET latin1 DEFAULT NULL,
  `judul` varchar(150) CHARACTER SET latin1 NOT NULL,
  `slug` text CHARACTER SET latin1 NOT NULL,
  `konten` longtext CHARACTER SET latin1 NOT NULL,
  `nama_pt` varchar(128) NOT NULL,
  `posisi` varchar(128) NOT NULL,
  `gaji` double NOT NULL,
  `durasi` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `penempatan` varchar(500) NOT NULL,
  `syarat` text NOT NULL,
  `images` text CHARACTER SET latin1 NOT NULL,
  `visitor` bigint(20) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loker`
--

INSERT INTO `loker` (`id_loker`, `jenis`, `id_sekolah`, `id_kategori`, `tags`, `judul`, `slug`, `konten`, `nama_pt`, `posisi`, `gaji`, `durasi`, `alamat`, `telepon`, `penempatan`, `syarat`, `images`, `visitor`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(36, 'advance', 1, 6, 'Pertanian, Kang Tusok', 'Nekan Sapi', 'nekan-sapi', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'RSIA Stella Maris', 'SPV', 3000000, 'Full Time', 'Jalan KH Samanhudi No 20 Medan', '081774124643', 'Medan', '- S1\r\n- Mampu memerah sapi\r\n- Memiliki sertifikat memerah', 'f41318e53e0ba773fbf056ec2893175f.jpg', 2, 1, '2021-10-21 22:49:32', 1, '2021-11-04 15:25:01'),
(41, 'advance', 1, 0, 'Design,Banking', 'UI/UX Design Pattern For Succesfull Software Applications', 'uiux-design-pattern-for-succesfull-software-applications', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'PT Setia Abadi', 'SPV', 1500000, 'Full Time', 'Jalan KH Samanhudi No 20 Medan', '081774124643', 'Medan', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '11564f463457d2d18d77890a2ac777e6.jpg', 0, 1, '2021-10-22 19:46:33', 1, '2021-10-22 13:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `golongan` varchar(128) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_sk_pengangkatan` varchar(128) NOT NULL,
  `tgl_sk_pengangkatan` varchar(50) NOT NULL,
  `no_sk_berhenti` varchar(128) NOT NULL,
  `tgl_sk_berhenti` varchar(50) NOT NULL,
  `masa_jabatan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tupoksi` longtext NOT NULL,
  `foto` longtext DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` varchar(128) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id_pejabat`, `id_sekolah`, `nik`, `nip`, `golongan`, `no_hp`, `no_sk_pengangkatan`, `tgl_sk_pengangkatan`, `no_sk_berhenti`, `tgl_sk_berhenti`, `masa_jabatan`, `jabatan`, `tupoksi`, `foto`, `status`, `created`, `created_by`, `edited`, `edited_by`, `deleted`) VALUES
(4, 1, '1271034711970012', '123213213', 'Kepala Desa', '7869-7989-3433', '12321312312', '2021-09-19', '12321321321', '2021-09-19', '5', '3', 'dsadasdasdas', 'default.png', 'aktif', '2021-09-18 19:23:03', 1, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `konten` longtext NOT NULL,
  `images` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_sekolah`, `judul`, `slug`, `konten`, `images`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(17, 1, 'Daftar Penerima Bantuan Pangan Non Tunai (Kemensos) Tahun 2020 Desa Jelok Kecamatan Kaligesing', 'daftar-penerima-bantuan-pangan-non-tunai-kemensos-tahun-2020-desa-jelok-kecamatan-kaligesing', '<p>Bantuan Pangan Non Tunai (BPNT) adalah bantuan pangan dari pemerintah yang diberikan kepada KPM setiap bulannya melalui mekanisme akun elektronik yang digunakan hanya untuk membeli pangan di e-Warong KUBE PKH / pedagang bahan pangan yang bekerjasama dengan Bank HIMBARA. Bertujuan untuk mengurangi beban pengeluaran serta memberikan nutrisi yang lebih seimbang kepada KPM secara tepat sasaran dan tepat waktu. Berikut ini daftar penerima PKH desa Jelok Kecamatan Kaligesing :</p>', '4095ac52e591f3a63d40051dba3cd35d.jpg', 1, '2021-09-11 16:33:00', 1, '2021-09-11 14:34:05'),
(18, 1, 'Wisata Alam Air Terjun Bali', 'wisata-alam-air-terjun-bali', '<p>adasdasd</p>', '226dc095e8781d35db989bbdc3cf34d9.png', 1, '2021-10-16 20:46:32', 1, '2021-10-16 13:46:32'),
(23, 1, 'TRestdas', 'trestdas', '<p>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak</p>', '99b8407f108cab0427ded86f86b71696.png', 1, '2021-10-18 20:22:16', 1, '2021-10-18 13:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `page_name` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `konten` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_sekolah`, `page_name`, `slug`, `konten`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(8, 1, 'Profil Wilayah Desa', 'profil-wilayah-desa', '<div class=\"panel-title\">\r\n<div class=\"single-title\">PROFIL WILAYAH DESA</div>\r\n</div>\r\n<div class=\"panel-body\">\r\n<div class=\"artikel-single\">\r\n<p>&nbsp; &nbsp; &nbsp;Dalam hal pemerintahan umum, Pemerintah Desa Jelok, senantiasa memberi pelayanan kepada segenap mesyarakat &nbsp;dalam beberapa hal ,seperti KK ,KTP , Akte, Pemakaman dll, juga pelayanan dalam bidang keamanan dan ketertiban masyarakat.seperti dibawah ini.</p>\r\n<p>Desa Jelok merupakan desa di Kecamatan Kaligesing Kabupaten Purworejo.</p>\r\n<p><strong>A. LUAS DAN BATAS-BATAS</strong>&nbsp;<strong>:</strong></p>\r\n<ol>\r\n<li>Desa Jelok mempunyai luas wilayah : 318 ha</li>\r\n</ol>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; a.&nbsp;Jumlah Penduduk&nbsp;: 1.113 jiwa</p>\r\n<ol start=\"2\">\r\n<li>Batas Desa :</li>\r\n</ol>\r\n<ol>\r\n<li>Batas Wilayah : Timur dengan Desa Kedunggubah</li>\r\n<li>Selatan dengan Desa Brenggong</li>\r\n<li>Barat dengan Desa Brenggong</li>\r\n<li>Utara dengan Desa Sudimoro</li>\r\n</ol>\r\n</div>\r\n</div>', 1, '2021-09-11 16:17:12', 1, '2021-09-12 03:17:51'),
(9, 1, 'Demografi', 'demografi', '<p>test</p>', 1, '2021-09-11 16:46:23', 1, '2021-09-11 14:46:23'),
(10, 1, 'Visi & Misi', 'visi-and-misi', '<p><strong>Visi :</strong></p>\r\n<p>&ldquo; Menyelenggarakan&nbsp; pemerintahan yang bersih, transparan dan bertanggungjawab untuk mewujudkan masyarakat Desa Jelok yang demokratis, mandiri dan sejahtera &rdquo;</p>\r\n<p><strong>MISI :</strong></p>\r\n<p>Misi Desa Jelok adalah sebagai berikut :</p>\r\n<ol>\r\n<li aria-level=\"1\">Meningkatkan dan memperluas jaringan kerjasama pemerintah dan Non Pemerintah.</li>\r\n<li aria-level=\"1\">Mewujudkan pelayanan yang profesional melalui peningkatan tata kelola pemerintahan desa yang responsif dan transparan.</li>\r\n<li aria-level=\"1\">Mewujudkan kehidupan sosial budaya yang dinamis dan damai.</li>\r\n<li aria-level=\"1\">Meningkatkan potensi dan daya dukung lingkungan untuk menciptakan peluang usaha.</li>\r\n<li aria-level=\"1\">Meningkatkan kesejahteraan masyarakat melalui pembangunan yang partisipatif</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p>Visi tersebut mengandung pengertian bahwa pemerintah Desa Jelok berkeinginan mewujudkan kehidupan mandiri dan berkesejahteraan dalam kehidupan yang demokratis dengan menyelenggarakan pemerintahan yang bersih, transparan dan bertanggungjawab. Makna dari masing masing kata yang terdapat dalam visi tersebut adalah sebagai berikut :</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Bersih&nbsp;</strong>dalam arti pemerintahan dijalankan dengan dilandasi dengan niat yang tulus ikhlas dan suci serta dilandasi dengan semangat pengabdian yang tinggi.</li>\r\n<li aria-level=\"1\"><strong>Transparan&nbsp;dalam arti setiap keputusan yang diambil dapat dipertanggungjawabkan secara terbuka.</strong></li>\r\n<li aria-level=\"1\"><strong>Bertanggung jawab</strong>&nbsp;dalam arti pemertintahan yang wajib menanggung segala sesuatunya dan menerima pembebanan sebagai akibat sikap tindakan sendiri atau pihak lain.</li>\r\n<li aria-level=\"1\"><strong>Demokratis</strong>&nbsp;dalam arti bahwa adanya kebebasan berpendapat, berbeda pendapat dan menerima pendapat orang lain. Akan tetapi apabila sudah menjadi keputusan harus dilaksanakan bersama &ndash; sama dengan penuh rasa tanggungjawab.</li>\r\n<li aria-level=\"1\"><strong>Mandiri</strong>&nbsp;dalam arti bahwa kondisi atau keadaan masyarakat Desa Jelok yang dengan prakarsa lokal dan potensi lokal mampu memenuhi kebutuhan hidupnya.</li>\r\n<li aria-level=\"1\"><strong>Sejahtera</strong>&nbsp;dalam arti bahwa kebutuhan dasar masyarakat Desa jelok telah terpenuhi secara lahir dan batin. Kebutuhan dasar tersebut berupa kecukupan dan mutu pangan, sandang, papan, kesehatan, pendidikan dan kebutuhan dasar lainnya seperti lingkungan yang bersih, aman dan nyaman, juga terpenuhinya hak asasi dan partisipasi serta terwujudnya masyarakat beriman dan bertaqwa kepada Tuhan Yang Maha Esa.</li>\r\n<li aria-level=\"1\"><strong>Berkesadaran Lingkungan</strong>&nbsp;dalam arti bahwa kelestarian lingkungan dijadikan sebagai ruh atas segala kegiatan pembangunan.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Untuk mencapai misi Desa Jelok, maka nilai-nilai yang harus dijunjung tinggi adalah :</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Partisipatif ( Keterlibatan )</strong></li>\r\n</ul>\r\n<p>&nbsp; &nbsp; &nbsp;Setiap anggota masyarakat Desa Jelok mempunyai hak untuk berpartisipasi dalam konteks pembangunan dengan prinsip&nbsp;<strong>dari, oleh dan untuk</strong>&nbsp;<strong>masyarakat</strong>&nbsp;<strong>( DOUM )</strong>. Oleh karena itu setiap proses pembangunan masyarakat harus dilibatkan mulai dari perncanaan, pelaksanaan dan pengawasan sampai pada pemeliharaan.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Transparan ( Keterbukaan )</strong></li>\r\n</ul>\r\n<p>&nbsp; &nbsp; &nbsp;Adanya sifat keterbukaan pemerintan Desa Jelok dengan batas &ndash; batas kewajaran dalam rangka meningkatkan kepercayaan masyarakat.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Demokratis&nbsp;</strong></li>\r\n</ul>\r\n<p>&nbsp; &nbsp; &nbsp;Masyarakat diberi kebebasan dalam mengemukakan dan menerima pendapat orang lain.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Efektif dan efisien</strong></li>\r\n</ul>\r\n<p>&nbsp; &nbsp; &nbsp;Mengedepankan hasil yang optimal dengan pengorbanaan yang relatif sedikit (biaya maupun waktu) sehingga berhasil guna dan berdaya guna.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\"><strong>Berbudaya dan beragama</strong></li>\r\n</ul>\r\n<p>&nbsp; &nbsp; Setiap gerak langkah pembangunan selaras dengan agama dan budaya yang berkembang di masyarakat, dengan demikian pelaksanaan pemerintahan desa senantiasa menjunjung tinggi agama, budaya dan budi pekerti yang luhur.</p>', 1, '2021-09-11 16:46:37', 1, '2021-09-12 03:18:53'),
(12, 1, 'Keuangan Desa', 'keuangan-desa', '<p>\" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour \"</p>', 1, '2021-10-10 19:42:29', 1, '2021-10-10 12:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_semester` varchar(128) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `id_sekolah`, `nama_semester`, `status`, `created`, `created_by`, `edited`, `edited_by`, `deleted`) VALUES
(1, 1, 'Ganjil', 'aktif', '2021-11-14 17:00:43', 1, '2021-11-14 17:00:43', 1, NULL),
(2, 1, 'Genap', 'tidak aktif', '2021-11-14 17:00:59', 1, '2021-11-14 17:00:59', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_lengkap` int(11) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `pekerjaan_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `pekerjaan_ibu` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` longtext DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` varchar(128) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_tag` varchar(150) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `id_sekolah`, `nama_tag`, `created_by`, `created_date`, `edited_by`, `edited_date`) VALUES
(6, 1, 'Wisata', 1, '2021-09-11 11:18:56', 1, '2021-09-21 12:02:11'),
(7, 1, 'Pemandian', 1, '2021-09-11 12:32:35', 1, '2021-09-21 12:02:15'),
(8, 1, 'Explore', 1, '2021-09-11 12:32:35', 1, '2021-09-21 12:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nama_tahun_ajaran` varchar(128) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited` datetime NOT NULL,
  `edited_by` int(11) NOT NULL,
  `deleted` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `id_sekolah`, `nama_tahun_ajaran`, `status`, `created`, `created_by`, `edited`, `edited_by`, `deleted`) VALUES
(1, 1, 'Ganjil', 'aktif', '2021-11-14 17:00:43', 1, '2021-11-14 17:00:43', 1, NULL),
(2, 1, 'Genap', 'tidak aktif', '2021-11-14 17:00:59', 1, '2021-11-14 17:00:59', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Administrator','Owner','Operator') NOT NULL,
  `image` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_sekolah`, `email`, `password`, `nama`, `jk`, `nohp`, `alamat`, `level`, `image`, `status`, `created_date`) VALUES
(1, 1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Firman', 'Laki-Laki', '082237962182', 'Jalan KH Samanhudi No 20 Medan', 'Administrator', 'ba6b8139da8d29e79e06849cca0085ad.jpg', 'Aktif', '2021-10-13 13:52:02'),
(2, 1, 'iman@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Firman', '', '0', '', 'Administrator', 'default.jpg', 'Aktif', '2021-10-13 12:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id_visitor` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `visitor` int(50) NOT NULL,
  `browser` varchar(150) DEFAULT NULL,
  `ip_address` varchar(150) NOT NULL,
  `os` varchar(150) DEFAULT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `id_sekolah`, `visitor`, `browser`, `ip_address`, `os`, `created`) VALUES
(62, 1, 1, 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-10'),
(63, 1, 5, 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-10'),
(64, 1, 1, 'Chrome 94.0.4606.71', '::1', 'Windows 10', '2021-10-11'),
(65, 1, 30, 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-13'),
(66, 1, 20, 'Chrome 94.0.4606.81', '::1', 'Windows 10', '2021-10-16'),
(67, 1, 11, 'Chrome 94.0.4606.81', '212312312', 'Windows 10', '2021-10-16'),
(68, 1, 1, 'Chrome 94.0.4606.81', '212312312', 'Windows 10', '2021-10-16'),
(69, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-03'),
(70, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-03'),
(71, 0, 1, 'Safari 604.1', '::1', 'iOS', '2021-11-03'),
(72, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-03'),
(73, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-03'),
(74, 1, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-03'),
(75, 1, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-04'),
(76, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-04'),
(77, 0, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-04'),
(78, 1, 1, 'Chrome 95.0.4638.54', '::1', 'Windows 10', '2021-11-05'),
(79, 1, 1, 'Chrome 95.0.4638.69', '::1', 'Windows 10', '2021-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `broadcast_sms`
--
ALTER TABLE `broadcast_sms`
  ADD PRIMARY KEY (`id_broadcast_sms`);

--
-- Indexes for table `galleri`
--
ALTER TABLE `galleri`
  ADD PRIMARY KEY (`id_galleri`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `identitas_sekolah`
--
ALTER TABLE `identitas_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_loker`
--
ALTER TABLE `kategori_loker`
  ADD PRIMARY KEY (`id_kategori_loker`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`id_log_login`);

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `broadcast_sms`
--
ALTER TABLE `broadcast_sms`
  MODIFY `id_broadcast_sms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleri`
--
ALTER TABLE `galleri`
  MODIFY `id_galleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_loker`
--
ALTER TABLE `kategori_loker`
  MODIFY `id_kategori_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `id_log_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id_loker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
