-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Oca 2023, 16:02:58
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tarif`
--
CREATE DATABASE IF NOT EXISTS `tarif` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tarif`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pastaci`
--

CREATE TABLE `pastaci` (
  `gonderitarihi` date NOT NULL,
  `tarif` text NOT NULL,
  `yorum` text DEFAULT NULL,
  `baslik` varchar(255) NOT NULL,
  `dosyayolu` text NOT NULL,
  `kod` int(11) NOT NULL,
  `yukleyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `pastaci`
--

INSERT INTO `pastaci` (`gonderitarihi`, `tarif`, `yorum`, `baslik`, `dosyayolu`, `kod`, `yukleyen`) VALUES
('2023-01-11', 'PASTA MALZEMELERİ:\r\nPandispanya için;\r\n4 adet yumurta (oda ısısında, sarıları ve akları ayrı kullanılacak)\r\nBir çimdik tuz\r\n5 yemek kaşığı soğuk su\r\n155 gram şeker ( 1 su bardağından 1 parmak eksik)\r\n25 gr Kakao (1 yemek kaşığı)\r\n1 paket vanilya\r\n75 gram un (1 su bardağından 2 parmak eksik)\r\n80 gram elenmiş mısır nişastası (1 su bardağından 1 parmak eksik)\r\n1 paket kabartma tozu\r\nAra kreması için;\r\n500 ml süt (2,5 su bardağı)\r\nYarım su bardağı şeker\r\nYarım su bardağı mısır nişastası\r\n2 yemek kaşığı kakao\r\n130 gram bitter çikolata\r\n200 gram oda ısısında yumuşamış tereyağı veya margarin\r\nÜzeri için;\r\n150 gr süt kreması\r\n200 gr bitter çikolata\r\n25 gram eritilmiş beyaz çikolata\r\nKenarları için;\r\nKavrulmuş fındık kırığı\r\nPASTANIN YAPILIŞI:\r\n1.	Kreması için tencereye süt, nişasta, kakao, şeker alınarak sertleşinceye kadar karıştırılarak pişirilir.\r\n2.	Kaynayınca ocaktan alınır ve içerisine bitter çikolata ilave edilir.\r\n3.	Çikolata eriyinceye kadar karıştırılır. Üzeri streç filmle örtülerek tamamen soğumaya bırakılır.\r\n4.	Yumurta akına, su ve tuz ilave edilerek mikserin en hızlı bölmesinde karışım kar gibi oluncaya kadar çırpılır.\r\n5.	Ayrı bir kapta yumurta sarılarına şeker ve vanilya eklenerek karışım beyaz bir krema halini alıncaya kadar çırpılır.\r\n6.	Yumurta akları yumurta sarılarına ilave edilir ve bir spatula yardımıyla (bu esnadan sonra kesinlikle mikser kullanılmaz) alttan yukarı hareketlerle yumurta akı söndürülmeden karıştırılır.\r\n7.	İnce bir tel süzgeç yardımıyla un, nişasta, kakao ve kabartma tozu yumurtalı karışıma elenir.\r\n8.	Tekrar spatula yardımıyla ve yavaş hareketlerle yumurta akı söndürülmeden hamur karıştırılır.\r\n9.	Hamur 26 cm’lik kelepçeli kalıba dökülür.\r\n10.	Pandispanya önceden ısıtılmış 175 derece (alt/üst)ayar fansız fırında 25 dk. pişirilir.\r\n11.	Sıcakken üzerine temiz bir bez örtülür ve dinlendirilir.\r\n12.	Tamamen soğumuş olan muhallebi bir kez mikserle çırpılır ve oda ısısında yumuşamış yağ ilave edilir. Tekrar mikserle 3-4 dakika çırpılır.\r\n13.	Pandispanya 3 eşit parçaya bölünür.\r\n14.	Kremanın yarısı ilk parçanın üzerine kalan yarısı ikinci parçanın üzerine sürülür ve üçüncü parçada kapatılır.\r\n15.	Dışını kaplamak için 150 gr krema ısıtılır ve içerisine 200 gr bitter ilave edilir ve karıştırılır.\r\n16.	Sos ılıdığında pastanın her yeri bu sosla kaplanır.\r\n17.	Üzerine eritilmiş beyaz çikolatayla desenler yapılır ve kenarları fındığa bulanır.\r\n18.	Muhakkak bir gece buzdolabında dinlendirilip ertesi gün servis edilir.\r\nAfiyet olsun', 'Çikolata severlerin yapabileceği çok güzel bir pasta. Göz atmayı unutmayın!!!', 'Çikolatalı Pasta', 'resimler/167344231124cikolatali-yas-pasta-aysegul.jpeg', 17, 24),
('2023-01-11', 'PASTA MALZEMELERİ\r\nKeki için:\r\n2 adet yumurta\r\n1,5 çay bardağı şeker\r\n1 çay bardağı süt\r\n3 çay bardağı un\r\n1 çay bardağı sıvı yağ\r\n1 paket kabartma tozu\r\nKreması için:\r\n500 ml süt\r\n3 yemek kaşığı un\r\n1 çay bardağı şeker\r\n1 adet yumurta\r\n1 yemek kaşığı tereyağı\r\n1 paket vanilya.\r\nPASTANIN YAPILIŞI\r\n1.	İlk olarak keki hazırlamalıyız. Bu nedenle derince bir kapta 2 adet yumurta ile 1,5 çay bardağı şekeri beyazlaşana kadar çırpın.\r\n2.	Daha sonra kalan malzemeleri yani süt, un, sıvı yağ, kabartma tozunu ekleyerek kekin hamurunu oluşturun.\r\n3.	Hamuru yağlamış olduğunuz tepsiye ya da kalıba dökün.\r\n4.	Keki 160 derecede önceden ısıtılmış fırında üzeri pembeleşinceye kadar yaklaşık 20-25 dakika pişirin.\r\n5.	Kek piştikten sonra fırından çıkararak soğumaya bırakın ve bu arada kremasını hazırlayın.\r\n6.	Krema için tereyağ ve vanilya hariç yukarıda belirtilen malzemeleri bir tencereye ekleyerek koyulaşana kadar karıştırarak pişirin.\r\n7.	Koyulaştıktan sonra tereyağ ve vanilyasını ekleyerek karıştırıp ocaktan alıyoruz.\r\n8.	Krema hazır olduğunda kekinizi ortadan ikiye bölün.\r\n9.	Keklerin arasına tüm kremayı dökün ve eşit olarak yayın.\r\n10.	Kekin üst kısmını kapatın ve en üstüne pudra şekeri serpin.\r\n11.	Soğuduktan sonra servis yapabilirsiniz. Afiyet olsun..\r\n', 'Evde kolayca yapabileceğiniz çok güzel bir pasta tarifi. Umarım beğenirsiniz :)', 'Alman Pastası', 'resimler/167344673727almanpastasi.jpg', 19, 27);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE `uye` (
  `kod` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `soyisim` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `kullaniciadi` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`kod`, `isim`, `soyisim`, `mail`, `kullaniciadi`, `sifre`) VALUES
(23, 'Furkan', 'Seber', 'sbrfrkn@gmail.com', 'Fseber', '$2y$10$EABBSEdBrViojkqvaEwkNeLFctv1DoGISpE5JjSnFpHD6yhhnImNS'),
(24, 'Mehmet', 'Seber', 'mehmets@gmail.com', 'Mseber', '$2y$10$Bbut.KNRqU8k/.mUAWNJYOZkTi.GMafoJ75NXCUhtJhhDCvFqZrQu'),
(27, 'a’<br>”b ', 'a’<br>”b ', 'proje@gmail.com', 'a’<br>”b ', '$2y$10$WNbW1atq7Ds1KN44UORfoulvARBQ1MTmzjt1n0CZaTv/4CAUyc7tu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorumyapan` int(11) NOT NULL,
  `yorumyapilan` int(11) NOT NULL,
  `metin` text NOT NULL,
  `vakit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorumyapan`, `yorumyapilan`, `metin`, `vakit`) VALUES
(23, 17, 'Muazzam bir pasta tarifi, kesinlikle deneyin arkadaşlar. Bayıldım...', '2023-01-11 13:07:09'),
(23, 17, '\" \' <br>', '2023-01-11 13:13:07'),
(23, 19, 'Gerçekten güzel bir tarif, mutlaka deniyeceğim.\r\n\" \' <br>', '2023-01-11 14:19:40');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `pastaci`
--
ALTER TABLE `pastaci`
  ADD PRIMARY KEY (`kod`),
  ADD KEY `yukleyen` (`yukleyen`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`kod`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `kullaniciadi` (`kullaniciadi`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorumyapan`,`yorumyapilan`,`vakit`),
  ADD KEY `yorumyapilan` (`yorumyapilan`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `pastaci`
--
ALTER TABLE `pastaci`
  MODIFY `kod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `kod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `pastaci`
--
ALTER TABLE `pastaci`
  ADD CONSTRAINT `pastaci_ibfk_1` FOREIGN KEY (`yukleyen`) REFERENCES `uye` (`kod`);

--
-- Tablo kısıtlamaları `yorum`
--
ALTER TABLE `yorum`
  ADD CONSTRAINT `yorum_ibfk_1` FOREIGN KEY (`yorumyapan`) REFERENCES `uye` (`kod`),
  ADD CONSTRAINT `yorum_ibfk_2` FOREIGN KEY (`yorumyapilan`) REFERENCES `pastaci` (`kod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
