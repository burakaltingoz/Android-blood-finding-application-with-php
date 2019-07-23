-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 11 Haz 2018, 11:34:14
-- Sunucu sürümü: 10.0.35-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `zulaltur_kan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastane`
--

CREATE TABLE `hastane` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `en` text COLLATE latin1_general_ci NOT NULL,
  `boy` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `hastane`
--

INSERT INTO `hastane` (`id`, `ad`, `en`, `boy`) VALUES
(2, 'Karabük E?itim ve Ar', '41.123456', '41.123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kanlist`
--

CREATE TABLE `kanlist` (
  `Id` int(11) NOT NULL,
  `adSoy` varchar(255) DEFAULT NULL,
  `kanG` varchar(255) DEFAULT NULL,
  `sehir` varchar(255) DEFAULT NULL,
  `telNo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kanlist`
--

INSERT INTO `kanlist` (`Id`, `adSoy`, `kanG`, `sehir`, `telNo`) VALUES
(11, 'Zafer ALBAYRAK', '0rh-', 'KARABUK', '5425632248'),
(12, 'Burak ALTINGOZ', 'Arh+', 'KARABUK', '5076497530'),
(13, 'Ismail TANRIKULU', 'Arh+', 'KARABUK', '5314908027'),
(15, 'burhan', 'Arh+', 'KARABUK', '765'),
(16, 'hasan', 'Arh-', 'KARABUK', '4442'),
(17, 'kankan', 'Brh+', 'KARABUK', '5422584456'),
(18, 'ASDASD', '0rh-', 'KARABUK', '2345345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konum`
--

CREATE TABLE `konum` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `en` text COLLATE latin1_general_ci NOT NULL,
  `boy` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `konum`
--

INSERT INTO `konum` (`id`, `email`, `en`, `boy`) VALUES
(8, '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Id` int(11) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `sehir` varchar(255) DEFAULT NULL,
  `kullanici` varchar(255) DEFAULT NULL,
  `adsoy` varchar(255) DEFAULT NULL,
  `sifre` varchar(255) DEFAULT NULL,
  `yetki` varchar(255) DEFAULT NULL,
  `durum` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kan` varchar(255) DEFAULT NULL,
  `kullaniciadi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Id`, `tel`, `sehir`, `kullanici`, `adsoy`, `sifre`, `yetki`, `durum`, `adres`, `email`, `kan`, `kullaniciadi`) VALUES
(17, 'deneme11', NULL, NULL, 'deneme11', 'deneme11', NULL, NULL, NULL, 'deneme11@hotmail.com', 'a+', NULL),
(20, '+959484747', NULL, NULL, 'zafer albayrak', '123', NULL, NULL, NULL, 'zafer@hotmail.com', '0rh+', NULL),
(21, '+9ue33737', NULL, NULL, 'burak altin', '123', NULL, NULL, NULL, 'burak@hotmail.com', 'ABrh-', NULL),
(22, '+98520', NULL, NULL, 'yo', 'ok', NULL, NULL, NULL, 'yok', 'Arh+', NULL),
(23, '+95555555555', NULL, NULL, 'DevTest', 'test123', NULL, NULL, NULL, 'devtest@gmail.com', '0rh-', NULL),
(24, '+9377374', NULL, NULL, 'mubarek', 'yarak', NULL, NULL, NULL, 'mubarek@hotmail.com', 'Arh-', NULL),
(28, '', NULL, NULL, 'ismail', '12345', NULL, NULL, NULL, 'ismail@hotmail.com', 'Arh+', NULL),
(29, '1', NULL, NULL, '1', '1', NULL, NULL, NULL, '1', '1', NULL),
(30, '+95433456678', NULL, NULL, 'melo', '12345', NULL, NULL, NULL, 'melo@hotmail.com', '0rh-', NULL),
(31, '+965464654', NULL, NULL, 'deneme1234', 'den123456', NULL, NULL, NULL, 'dene@hotmail.com', 'Arh+', NULL),
(32, '+95314908027', NULL, NULL, 'Ismail TANRIKULU', '123456789', NULL, NULL, NULL, 'ismail@hotmail.com', 'Arh+', NULL),
(33, '+905343465478', NULL, NULL, 'burak alt?ngöz', '06101994', NULL, NULL, NULL, 'burakburak@gmail.com', 'Arh+', NULL),
(34, '+9555', NULL, NULL, 'burak', '0610', NULL, NULL, NULL, 'burak@hotmail.com', 'Arh-', NULL),
(35, '+9555', NULL, NULL, 'deneme', '123', NULL, NULL, NULL, 'deneme@hotmail.com', 'Arh-', NULL),
(36, '+9444', NULL, NULL, 'deneme12', '123', NULL, NULL, NULL, 'denemee@hotmail.com', 'Arh-', NULL),
(37, '+9754', NULL, NULL, 'karas', '123', NULL, NULL, NULL, 'karas@hotmail.com', 'Arh+', NULL),
(38, '+9567', NULL, NULL, 'rukiye', '123', NULL, NULL, NULL, 'rukiye@hotmail.com', '0rh-', NULL),
(39, '+9456', NULL, NULL, 'nesrin', '123', NULL, NULL, NULL, 'nesrin@hotmail.com', 'Brh-', NULL),
(40, '+9455', NULL, NULL, 'ilker', '123', NULL, NULL, NULL, 'ilker@hotmail', 'Arh+', NULL),
(41, '+9455', NULL, NULL, 'ilker', '123', NULL, NULL, NULL, 'ilker@hotmail', 'Arh+', NULL),
(42, '+9455', NULL, NULL, 'ilker', '123', NULL, NULL, NULL, 'ilker@hotmail', 'Arh+', NULL),
(43, '+98384', NULL, NULL, 'ilker', '123', NULL, NULL, NULL, 'ilker@hotmail', 'Arh+', NULL),
(44, '+9637479', NULL, NULL, 'muharrem', '123', NULL, NULL, NULL, 'muharrem@hotmail.com', 'Arh-', NULL),
(45, '+95422584456', NULL, NULL, 'testgokhan', 'test1', NULL, NULL, NULL, 'testgokhan@hotmail.com', '0rh-', NULL),
(46, '+93702145698', NULL, NULL, 'aaa', 'aaa', NULL, NULL, NULL, 'aaa@hotmail.com', 'Arh-', NULL),
(47, '+91212', NULL, NULL, '1212', '1212', NULL, NULL, NULL, '1212', 'ismailtanrikulu', NULL),
(48, '+95314963215', NULL, NULL, 'adSoyad', 'adSoyunSifresi', NULL, NULL, NULL, 'adSoyad@gmail.com', 'ismailtanrikulu', NULL),
(49, '+922', NULL, NULL, '22', '22', NULL, NULL, NULL, '22', 'ismailtanrikulu', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hastane`
--
ALTER TABLE `hastane`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kanlist`
--
ALTER TABLE `kanlist`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `konum`
--
ALTER TABLE `konum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hastane`
--
ALTER TABLE `hastane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kanlist`
--
ALTER TABLE `kanlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `konum`
--
ALTER TABLE `konum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
