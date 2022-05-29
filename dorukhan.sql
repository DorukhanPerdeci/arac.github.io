-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220503.92457c1607
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 May 2022, 02:05:59
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dorukhan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `arac_id` int(11) NOT NULL,
  `arac_resim` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `arac_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `arac_model` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `arac_yazi` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `arac_fiyat` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `arac_sira` varchar(2) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `arac`
--

INSERT INTO `arac` (`arac_id`, `arac_resim`, `arac_ad`, `arac_model`, `arac_yazi`, `arac_fiyat`, `arac_sira`) VALUES
(2, 'upimg/29-05-2022_02-30-57_car2.png', 'Ford', 'Mustang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum blandit eros dignissim lacinia. Phasellus consectetur pretium massa in cursus. ', '900.000', '2'),
(3, 'upimg/29-05-2022_02-49-49_pngegg.png', 'Volvo', 'XC90', 'Vovo tarafından üretilen XC90 modeliyle tanışın.', '950.000', '1'),
(4, 'upimg/29-05-2022_02-52-03_car1.png', 'Mercedes', 'W230', '1977 Model Mercedes W230 ile tanışın', '380.000', '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_password` varchar(500) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_ad`, `kullanici_password`) VALUES
(0, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`arac_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `arac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



