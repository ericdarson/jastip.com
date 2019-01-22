-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2019 at 07:10 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jastip`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar` varchar(2000) NOT NULL,
  `keterangan` varchar(2000) NOT NULL,
  `about` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `keterangan`, `about`) VALUES
(1, './assets/img/negara/jepang.jpg', 'JEPANG', 'Japan, For Me, Will Always Be My Inspiration Source'),
(2, './assets/img/negara/paris.jpeg', 'PARIS', 'Let''s Fall In Love In This Place'),
(5, './assets/img/negara/brazil.jpg', 'BRAZIL', 'In My Heart, I''ve Never Left Brazil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `order_code` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `num_qty` int(11) NOT NULL,
  `num_price` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `category`, `slug`) VALUES
(1, 'Titipan', 'titipan'),
(2, 'Handphone', 'handphone'),
(3, 'Travel', 'travelProduct');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE IF NOT EXISTS `tbl_checkout` (
  `id_checkout` bigint(20) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `order_code` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `qty_beli` int(11) NOT NULL,
  `price_beli` int(11) NOT NULL,
  `nama_penerima` varchar(35) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `courier` varchar(3) NOT NULL,
  `bank` text NOT NULL,
  `order_date` date NOT NULL,
  `send_date` date NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`id_checkout`, `no_invoice`, `order_code`, `id_products`, `seller`, `buyer`, `qty_beli`, `price_beli`, `nama_penerima`, `alamat_penerima`, `telepon`, `province`, `city`, `postal_code`, `courier`, `bank`, `order_date`, `send_date`, `message`, `status`) VALUES
(28, '201807081558785', 785, 58, 16, 15, 1, 1000000, 'Martna', 'Karawaci', '081111111', 'Banten', 'Tangerang', 3112, 'jne', 'BCA 12121221 an Martina', '2018-07-08', '2018-07-08', 'secepatnya ya', 7),
(29, '5a6a63f6577dbd649c98d191eed6be', 264, 59, 16, 15, 3, 30000, 'Gian', 'Jl.Scientia', '121212', 'Banten', 'Tangerang', 2121, 'jne', 'BCA 1111111 an Gian', '2018-07-08', '2018-07-08', 'tidak ada', 11),
(32, '23050b56227f2aabb309aa38c11c9d', 224, 61, 16, 15, 5, 50000, 'eric', 'asdf', '1212', 'Bantn', 'Tangerang', 1212, 'jne', 'BCA 222222 an akka', '2018-07-08', '2018-07-08', 'aaa', 6),
(33, 'f5f9ea1bcf429f0ce087107885ab19', 114, 61, 16, 15, 5, 50000, 'eric', 'adf', '12', 'Banten', 'Tangerang', 1212, 'jne', 'BCA 12212121 an asd', '2018-07-08', '2018-07-08', 'afsdjkfdas', 11),
(34, '97e273f25fd6406d76e6d4762992b3', 540, 61, 16, 15, 1, 10000, 'eric', 'a', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(35, '78f18357908c33e18cf3b6967d4692', 558, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(36, 'f84b7e47621e6c5d56af3b679f0cf3', 503, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(37, '9b3c39254f747e96b044fbb4acdf9d', 710, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(38, 'c02ce293154d26759eca51d1b74f88', 247, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(39, '60d81a35bbbb44932f91e46949892b', 646, 61, 16, 15, 5, 50000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 6),
(40, '6dd1ee591fbabdb0ff2e6c99a234f9', 639, 61, 16, 15, 5, 50000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 8),
(41, 'b9b77bfe6bd55b99433c78bbfc1771', 836, 61, 16, 15, 5, 50000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 8),
(42, 'd8fb769154f485d57e80a1030f8c09', 918, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 6),
(43, '6588c5d71604bbce4e0e3d4ccd09db', 697, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 6),
(44, 'a318019c2af5957239e4f8fb3ae446', 800, 61, 16, 15, 1, 10000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 99),
(45, '201807081562331', 331, 62, 16, 15, 1, 100000, '', '', '', '', '', 0, '', '', '2018-07-08', '2018-07-08', '', 6),
(46, '7002921063c14ac91e34f838f037d3', 241, 60, 16, 19, 3, 30000, 'eric', 'ruko dalton', '089507526220', 'Banten', 'Tangerang', 1344, 'jne', 'BCA 1223221221212121 a.n Bebe', '2018-07-08', '2018-07-08', 'yang enak', 6),
(47, '119f6278f9a55619fa7eef4d5ca576', 964, 61, 16, 19, 4, 40000, 'gandhi', 'asdd', '271727112', 'Banten', 'Tangerang', 1223, 'tik', 'BCA 1223221221212121 a.n Bebe', '2018-07-08', '2018-07-08', 'sjd', 99),
(48, '201807081963328', 328, 63, 16, 19, 5, 50000, 'andi', 'asdad', '123131', 'Banten', 'adasd', 1233, 'jne', 'BCA 1223221221212121 a.n Bebe', '2018-07-08', '2018-07-08', 'sdssds', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id_products` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_products` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tgl_pulang` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `price` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `nomorHP` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_products`, `id_category`, `id_user`, `name_products`, `slug`, `description`, `qty`, `kondisi`, `berat`, `tujuan`, `tgl_pulang`, `tgl_terima`, `price`, `image1`, `image2`, `image3`, `image4`, `image5`, `nomorHP`) VALUES
(58, 1, 15, 'iron man action figure', 'iron-man-action-figure', 'Jangan sampai rusak ya, kalau rusak saya tidak mau terima.', 0, '', '', 'Jepang', '0000-00-00', '2018-07-10', 1000000, './assets/img/penitip/630509622443.jpg', '', '', '', '', '081122221'),
(60, 3, 16, 'Kitkat', 'kitkat', 'mimimii', 2, '', '', 'Jepang', '2018-07-20', '0000-00-00', 10000, './assets/img/traveler/kitkat.jpg', '', '', '', '', '08080888'),
(61, 3, 16, 'Barbie', 'barbie', 'Ini kitkat punya barbie', 8, '', '', 'Paris', '2018-07-20', '0000-00-00', 10000, './assets/img/traveler/kitkat.jpg', '', '', '', '', '121221'),
(62, 1, 15, 'Ticket', 'ticket', '', 4, '', '', 'Jepang', '0000-00-00', '2018-07-12', 100000, './assets/img/penitip/ticket.jpg', '', '', '', '', '12931238'),
(63, 1, 19, 'Yakult Korea', 'yakult-korea', 'yang warna putih', 20, '', '', 'Korea', '0000-00-00', '2018-07-29', 10000, './assets/img/penitip/yakult.jpg', '', '', '', '', '0895712928');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traveler`
--

CREATE TABLE IF NOT EXISTS `tbl_traveler` (
  `id_products` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_products` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `nomorHP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `ip_address` varchar(35) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `dana` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `password`, `nama_lengkap`, `gender`, `alamat`, `ip_address`, `user_agent`, `dana`) VALUES
(15, 'stie', 'stie@gmail.com', '98479a03d674c1dd688cd680585b19f5', 'stievensen', 2, 'jl. scienia', '', '', 10000),
(16, 'traveler', 'traveler@gmail.com', '98479a03d674c1dd688cd680585b19f5', 'traveler', 2, 'lalala', '', '', 1300000),
(17, 'ericdarson', 'eric@yahoo.com', '98479a03d674c1dd688cd680585b19f5', 'eric darson', 2, 'jl scientia', '', '', 0),
(18, 'andre', 'andre@gmail.com', '98479a03d674c1dd688cd680585b19f5', 'andre', 2, 'scientia residence', '', '', 0),
(19, 'dermawan', 'dermawan@yahoo.com', '98479a03d674c1dd688cd680585b19f5', 'dermawan rizal', 2, 'ruko newton', '', '', 40000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_products` (`id_products`,`buyer`),
  ADD KEY `id_user` (`buyer`),
  ADD KEY `seller` (`seller`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_products` (`id_products`,`seller`,`buyer`),
  ADD KEY `seller` (`seller`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_traveler`
--
ALTER TABLE `tbl_traveler`
  ADD PRIMARY KEY (`id_products`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id_checkout` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_traveler`
--
ALTER TABLE `tbl_traveler`
  MODIFY `id_products` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
