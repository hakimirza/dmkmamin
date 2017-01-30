-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2016 at 08:32 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9041412_dmkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dimensi`
--

CREATE TABLE `dimensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodedimensi` varchar(10) NOT NULL,
  `labeldimensi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `timecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dimensi`
--

INSERT INTO `dimensi` VALUES(3, 'ldr', 'Leadership', 'Kepemimpinan', '2016-08-20 18:37:53');
INSERT INTO `dimensi` VALUES(4, 'scl', 'Social', 'Kemampuan berinteraksi dengan sesama', '2016-08-20 18:38:20');
INSERT INTO `dimensi` VALUES(5, 'rsp', 'Responsibility', 'Tanggung jawab dalam melaksanakan tugas dan amanah', '2016-08-20 18:38:58');
INSERT INTO `dimensi` VALUES(6, 'smp', 'Sampling', 'Kemampuan dalam menerapkan metodologi sampling', '2016-08-20 18:40:04');
INSERT INTO `dimensi` VALUES(7, 'anl', 'Analysis', 'Kemampuan dalam melakukan analisis', '2016-08-20 18:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text NOT NULL,
  `idjabatanbos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` VALUES(1, 'Administrator', NULL);
INSERT INTO `jabatan` VALUES(5, 'Korlap', 1);
INSERT INTO `jabatan` VALUES(6, 'Kortim', 5);
INSERT INTO `jabatan` VALUES(7, 'PCL', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddimensi` int(11) NOT NULL,
  `idtest` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` VALUES(10, 3, 8, 7, 100, NULL, '2016-08-20 19:45:49');
INSERT INTO `nilai` VALUES(11, 4, 9, 7, 67, NULL, '2016-08-20 19:46:32');
INSERT INTO `nilai` VALUES(12, 5, 10, 7, 100, NULL, '2016-08-20 19:47:21');
INSERT INTO `nilai` VALUES(13, 6, 11, 7, 100, NULL, '2016-08-20 19:47:53');
INSERT INTO `nilai` VALUES(14, 7, 12, 7, 33, NULL, '2016-08-20 19:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `jenis` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `truejawaban` text NOT NULL,
  `idtest` int(11) NOT NULL,
  `timecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` VALUES(12, 'Yang bukan kunci kepemimpinan menurut Andrew E. Sikula?', 1, 'Bahwa kepemimpinan itu merupakan proses,Bahwa kepemimpinan itu berarti membantu orang lain,Bahwa kepemimpinan itu berarti mengarahkan orang lain,Bahwa kepemimpinan itu berarti memimpin orang lain', 'Bahwa kepemimpinan itu berarti membantu orang lain', 8, '2016-08-20 19:09:21');
INSERT INTO `soal` VALUES(13, 'Dalam mempelajari kepemimpinan, banyak pendekatan yang dapat dipergunakannya. Yang bukan pendekatan kepemimpinan adalah?', 1, 'Pendekatan teknologi,Pendekatan tradisional,Pendekatan perilaku, Pendekatan aktivitas sosial', 'Pendekatan teknologi', 8, '2016-08-20 19:09:21');
INSERT INTO `soal` VALUES(14, 'Ada berapa macam tipe atau gaya kepemimpinan ini, kecuali?', 1, 'Tipe atau gaya kepemimpinan otokratis,Tipe atau gaya kepemimpinan dinamis,  Tipe atau gaya kepemimpinan paternalistis,Tipe atau gaya kepemimpinan kharismatis', 'Tipe atau gaya kepemimpinan dinamis', 8, '2016-08-20 19:09:21');
INSERT INTO `soal` VALUES(15, 'Berikut bukan indikator yang menceminkan kompetensi sosial guru menurut Arikunto?', 1, 'Interaksi guru dengan siswa,Interaksi guru dengan kepala sekolah,Interaksi guru dengan rekan kerja,Interaksi guru dengan kucing', 'Interaksi guru dengan kucing', 9, '2016-08-20 19:15:59');
INSERT INTO `soal` VALUES(16, 'Apa saja peran penting guru di tengah masyarakat, kecuali?', 1, 'Pemberi Mindset,Pendidik,Penggerak Potensi,Pengatur Irama', 'Pemberi Mindset', 9, '2016-08-20 19:15:59');
INSERT INTO `soal` VALUES(17, 'Apa jenis-jenis kompetensi sosial yang harus dimiliki guru menurut Cece Wijaya, kecuali?', 1, 'Terampil Berkomunikasi dengan Peserta Didik dan Orang Tua Peserta Didik,Bersikap Simpatik,Dapat bekerja sama dengan Dewan Pendidikan/Komite Sekolah,Mampu membuat suatu hidangan makanan yang enak', 'Mampu membuat suatu hidangan makanan yang enak', 9, '2016-08-20 19:15:59');
INSERT INTO `soal` VALUES(18, 'Hampir semua pegawai di kantor instansi saya meminta uang tanda terimakasih atas pengurusan surat ijin tertentu. Namun menurut peraturan kantor, hal itu tidaklah diperbolehkan, maka saya', 1, 'Ikut melakukannya karena bagaimanapun juga kawan-kawan kantor juga melakukannya,Terkadang saja melakukan hal tersebut,Berusaha semampunya untuk tidak melakukannya,Tidak ingin melakukannya sama sekali', 'Tidak ingin melakukannya sama sekali', 10, '2016-08-20 19:20:52');
INSERT INTO `soal` VALUES(19, 'Atasan anda melakukan rekayasa laporan keuangan kantor, maka anda', 1, 'Dalam hati tidak menyetujui hal tersebut,Hal tersebut sering terjadi di kantor manapun,Mengingatkan dan melaporkan kepada yang berwenang,Tidak ingin terlibat dalam proses rekayasa tersebut', 'Mengingatkan dan melaporkan kepada yang berwenang', 10, '2016-08-20 19:20:52');
INSERT INTO `soal` VALUES(20, 'Andi, teman karib anda, melakukan kecurangan absensi. Maka anda', 1, 'Menegur dan melaporkan apa adanya kepada atasan,Mentoleransi sebab baru kali ini Andi melakukannya,Menanyakan kepadanya mengapa dia melakukan hal tersebut,Mengingatkan dan menegur', 'Menegur dan melaporkan apa adanya kepada atasan', 10, '2016-08-20 19:20:52');
INSERT INTO `soal` VALUES(21, 'Berikut yang bukan merupakan teknik pengambilan sampel adalah', 1, 'Simple Random Sampling,Simple Dummy Sampling,Stratified Random Sampling,Probability Proportional to Size', 'Simple Dummy Sampling', 11, '2016-08-20 19:29:58');
INSERT INTO `soal` VALUES(22, 'Teknik pengambilan sampel, yang memanfaatkan teknik pengambilan sampel dengan memanfaatkan variabel tambahan sebagai dasar penarikan peluang terpilih adalah', 1, 'Simple Random Sampling,Simple Dummy Sampling,Stratified Random Sampling,Probability Proportional to Size', 'Probability Proportional to Size', 11, '2016-08-20 19:29:58');
INSERT INTO `soal` VALUES(23, 'Berikut yang bukan merupakan teknik pengambilan sample non probability adalah', 1, 'Judgmental Sampling,Haphazard,Eden Hazard,Snowball Sampling', 'Eden Hazard', 11, '2016-08-20 19:29:58');
INSERT INTO `soal` VALUES(24, 'Uji atau metode yang digunakan untuk melakukan uji normalitas adalah sebagai berikut, kecuali', 1, 'Liliefors,Saphiro Wilk,Rumus Somers,Metode Chi Square', 'Rumus Somers', 12, '2016-08-20 19:40:07');
INSERT INTO `soal` VALUES(25, 'Uji atau metode yang digunakan untuk melakukan uji homogenitas adalah sebagai berikut, kecuali', 1, 'Bartlett,Levene,Spearman,Fisher', 'Spearman', 12, '2016-08-20 19:40:07');
INSERT INTO `soal` VALUES(26, 'Apa nama chart yang digunakan dalam website ini untuk memperlihatkan kemampuan sesorang?', 1, 'Amoeba Chart,Round Chart,Spider Chart,Ability Chart', 'Spider Chart', 12, '2016-08-20 19:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `iddimensi` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` VALUES(8, 'Testing Leadership (Soal Googling)', 7, '2016-08-22 23:59:00', 3, '2016-08-20 19:09:21');
INSERT INTO `test` VALUES(9, 'Mengukur Kemampuan Sosial (Soal Googling)', 7, '2016-08-22 23:59:00', 4, '2016-08-20 19:15:59');
INSERT INTO `test` VALUES(10, 'Mengukur Tanggung Jawab (Soal Googling)', 7, '2016-08-22 23:59:00', 5, '2016-08-20 19:20:52');
INSERT INTO `test` VALUES(11, 'Buktikan Anda Statisticians', 7, '2016-08-22 23:59:00', 6, '2016-08-20 19:29:58');
INSERT INTO `test` VALUES(12, 'Soal Analisis', 7, '2016-08-22 23:59:00', 7, '2016-08-20 19:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `idjabatan` int(11) NOT NULL,
  `idbos` int(11) NOT NULL,
  `iduserbos` int(11) NOT NULL,
  `timecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'admin', 'Admin', 1, 0, 0, '2016-08-20 08:57:43', 'admin@bps.go.id', 'sayaadmin', '1.png');
INSERT INTO `user` VALUES(4, 'korlap', '', 5, 1, 1, '2016-08-20 18:51:52', 'korlap@bps.go.id', 'sayakorlap', '4.jpg');
INSERT INTO `user` VALUES(5, 'kortim1', 'Alexis Sanchez', 6, 5, 4, '2016-08-20 18:53:37', 'kortim1@bps.go.id', 'sayakortim1', '5.jpg');
INSERT INTO `user` VALUES(6, 'kortim2', 'Mesut Ozil', 6, 5, 4, '2016-08-20 18:54:20', 'kortim2@bps.go.id', 'sayakortim2', '6.jpg');
INSERT INTO `user` VALUES(7, '13.7508', 'Ardya Reyhan Yafie', 7, 6, 5, '2016-08-20 18:56:22', '13.7508@stis.ac.id', '12345', 'default.png');
INSERT INTO `user` VALUES(8, '13.7530', 'Bambang Dwi Putra', 7, 6, 5, '2016-08-20 18:57:14', '13.7530@stis.ac.id', '12345', 'default.png');
INSERT INTO `user` VALUES(9, '13.7739', 'Mugi Rohimah', 7, 6, 5, '2016-08-20 18:58:14', '13.7739@stis.ac.id', '12345', 'default.png');
INSERT INTO `user` VALUES(10, '13.7743', 'Muhamad Tohir', 7, 6, 6, '2016-08-20 18:59:18', '13.7743@stis.ac.id', '12345', 'default.png');
INSERT INTO `user` VALUES(11, '13.7665', 'Indra Pratam Adi', 7, 6, 6, '2016-08-20 19:00:20', '13.7665@stis.ac.id', '12345', 'default.png');
INSERT INTO `user` VALUES(12, '13.7931', 'Zahirah Husin Shahab', 7, 6, 6, '2016-08-20 19:01:12', '13.7931@stis.ac.id', '12345', 'default.png');