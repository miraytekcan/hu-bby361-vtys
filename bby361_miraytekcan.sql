-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Oca 2024, 11:21:15
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bby361_miraytekcan`
--
CREATE DATABASE IF NOT EXISTS `bby361_miraytekcan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bby361_miraytekcan`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Eser`
--

CREATE TABLE `Eser` (
  `eserID` int(11) NOT NULL,
  `eserAdi` text DEFAULT NULL,
  `eserAciklama` text DEFAULT NULL,
  `eserDili` text DEFAULT NULL,
  `eserISBN` text DEFAULT NULL,
  `yayinEvi_ID` int(11) DEFAULT NULL,
  `eserSayfaNo` int(11) DEFAULT NULL,
  `eserYayinYeri` text DEFAULT NULL,
  `eserBasimYili` int(11) DEFAULT NULL,
  `eserKapakResimURL` text DEFAULT NULL,
  `eserGirisTarih` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `Eser`
--

INSERT INTO `Eser` (`eserID`, `eserAdi`, `eserAciklama`, `eserDili`, `eserISBN`, `yayinEvi_ID`, `eserSayfaNo`, `eserYayinYeri`, `eserBasimYili`, `eserKapakResimURL`, `eserGirisTarih`) VALUES
(1, 'The Art of Simple Food', 'Amerikalıların yemek hakkında düşünme şeklini değiştiren kadından ev aşçıları için vazgeçilmez bir kaynak.', 'İngilizce', '978-0307336798', 1, 405, 'ABD', 2007, 'https://m.media-amazon.com/images/I/81OdqCd-t1L._SL1500_.jpg', '13.1.2022'),
(2, 'Atomic Habits', 'James Clear, alışkanlık oluşumuyla ilgili en temel bilgileri damıtlar, böylece daha azına odaklanarak daha fazlasını başarabilirsiniz.', 'İngilizce', '978-0735211292', 2, 230, 'ABD', 2018, 'https://m.media-amazon.com/images/I/81bGKUa1e0L._SL1500_.jpg', '17.4.2019'),
(3, 'The Wishing Spell: Book 1 (The Land of Stories, Volume 1)', 'Aziz bir hikaye kitabının gizemli güçleri sayesinde, dünyalarını geride bırakırlar ve kendilerini merak ve sihirle dolu yabancı bir ülkede bulurlar ve burada büyüdükleri masal karakterleri ile yüz yüze gelirler.', 'İngilizce', '978-1907411755', 3, 448, 'ABD', 2012, 'https://m.media-amazon.com/images/I/81m48ODSWbL._SL1432_.jpg', '13.12.2013'),
(4, 'The Witches', 'Cadılar, nesiller boyunca genç okuyucunun hayal gücünü yakalayan bir çocuk klasiğidir.', 'İngilizce', '978-0142410110', 4, 224, 'Birleşik Krallık', 2007, 'https://m.media-amazon.com/images/I/81Ltv+pGI+L._SL1500_.jpg', '13.9.2013'),
(5, 'Where the Crawdads Sing', 'Owens bize bir zamanlar olduğumuz çocuklar tarafından sonsuza dek şekillendiğini ve hepimizin doğanın sakladığı güzel ve şiddetli sırlara tabi olduğumuzu hatırlatıyor.', 'İngilizce', '978-0735219106', 5, 400, 'ABD', 2021, 'https://m.media-amazon.com/images/I/81O1oy0y9eL._SL1500_.jpg', '25.11.2022'),
(6, 'The Seven Husbands of Evelyn Hugo: A Novel', 'Yaşlanan ve münzevi Hollywood filmi ikonu Evelyn Hugo nihayet göz alıcı ve skandal hayatı hakkında gerçeği söylemeye hazır', 'İngilizce', '978-1501161933', 6, 400, 'ABD', 2018, 'https://m.media-amazon.com/images/I/71ZvnK+4JiL._SL1500_.jpg', '27.8.2019'),
(7, 'Daisy Jones & The Six: A Novel', 'Daisy, altmışların sonlarında Los Angeles\'ta reşit olan, Sunset Strip\'teki kulüplere gizlice giren ve Whisky a Go Go\'da şarkı söylemeyi hayal eden bir kızdır.', 'İngilizce', '978-1524798628', 7, 368, 'ABD', 2019, 'https://m.media-amazon.com/images/I/91m7RzIIXmL._SL1500_.jpg', '13.9.2022'),
(8, 'Big Magic: Creative Living Beyond Fear', 'Yaratıcı bir hayat yaşamayı umuda olan herkes için mutlaka okunması gereken bir kitap... Cesur olmak, özgür olmak ve meraklı olmak için ilham almamaya cesaret ediyorum.', 'İngilizce', '978-1594634727', 8, 304, 'ABD', 2016, 'https://m.media-amazon.com/images/I/81Kwp2X0YSL._SL1500_.jpg', '3.3.2017'),
(9, 'Rebecca', 'Roman, hem kendisinin hem de ailesinin, baş karakter olan merhum ilk karısının anısıyla perili olduğunu keşfetmeden önce, zengin bir dul ile aceleyle evlenen isimsiz bir genç kadını tasvir ediyor.', 'İngilizce', '978-0582419377', 9, 105, 'Birleşik Krallık', 1999, 'https://m.media-amazon.com/images/I/414MDG4PQ7L.jpg', '13.10.2001'),
(10, 'Selected Poems of Emily Dickinson', 'Bu çekici koleksiyon, unutulmaz eserlerinden 15\'ten fazlasını bir araya getiriyor. Doğa, aşk, yaşam, ölüm ve ölümsüzlük hakkında içgörüler içeren bu şiirler, İngiliz edebiyatının en sevilenleri arasındadır.', 'İngilizce', '978-1435162563', 10, 128, 'ABD', 2000, 'https://m.media-amazon.com/images/I/81dXTprbC-L._SL1500_.jpg', '13.11.2007'),
(11, 'A Christmas Carol', 'Charles Dickens\'ın üç ruh tarafından perili olan ve Noel\'in gerçek anlamını öğrenen Ebenezer Scrooge\'un hikayesi, Dickens\'ın diğer Noel yazılarıyla birlikte, kutlama, hayırseverlik ve hafıza zamanı olarak mevsim hakkındaki fikirlerimiz üzerinde kalıcı ve önemli bir etkiye sahipti.', 'İngilizce', '978-0141389479', 11, 112, 'Birleşik Krallık', 2012, 'https://m.media-amazon.com/images/I/81NJi8UjLFL._SL1500_.jpg', '14.4.2015'),
(12, 'Spotify - Apple Google ve Amazonu Nasıl Yendi?', 'Apple-Android teknoloji savaşının ve müzik şirketlerinin korsan ve yasa dışı müzik indirmeye karşı verdiği mücadelenin ortasında, Spotify savaş hatlarını yeniden oluşturarak Silikon Vadisi\'ni yerinden oynattı.', 'Türkçe', '978-6258431964', 5, 384, 'İstanbul', 2022, 'https://m.media-amazon.com/images/I/31IcizEmxWL.jpg', '10.5.2021'),
(13, 'Incognito', 'Bir bilim kitabı olan Incognito-Beynin Gizli Hayatı, beynin derinliklerine dalmanızı sağlıyor. Bilime ve insan vücudunun işleyişine merak duyan herkes tarafından okunabilecek kitapta, insanın düşünce ve eylemlerinin farklı bir bilinç tarafından yönetildiği gerçeği ele alınıyor.', 'Türkçe', '9780785139799', 5, 294, 'İstanbul', 2013, 'https://1k-cdn.com/resimler/kitaplar/302707_212c4_1564685954.jpg', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `EserYazar`
--

CREATE TABLE `EserYazar` (
  `eserID` int(11) DEFAULT NULL,
  `yazarID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `EserYazar`
--

INSERT INTO `EserYazar` (`eserID`, `yazarID`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 7),
(6, 8),
(7, 8),
(8, 9),
(9, 10),
(10, 11),
(11, 12),
(12, 13),
(12, 14),
(1, 1),
(13, 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `YayınEvi`
--

CREATE TABLE `YayınEvi` (
  `yayinEvi_ID` int(11) DEFAULT NULL,
  `yayinEvi_Adi` text DEFAULT NULL,
  `yayinEvi_Konum` text DEFAULT NULL,
  `yayinEvi_Web` text DEFAULT NULL,
  `yayinEvi_eposta` text DEFAULT NULL,
  `yayinEvi_KurulusTarih` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `YayınEvi`
--

INSERT INTO `YayınEvi` (`yayinEvi_ID`, `yayinEvi_Adi`, `yayinEvi_Konum`, `yayinEvi_Web`, `yayinEvi_eposta`, `yayinEvi_KurulusTarih`) VALUES
(1, 'Crown Publishing Group', '225 Park Avenue South in Midtown Manhattan', 'https://crownpublishing.com/archives/imprint/clarkson-potter', 'customerservice@prh.com', 1933),
(2, 'Avery Publishing', '120 Old Broadway, Garden City Park, NY 11040', 'https://www.penguin.com/avery-overview/', 'customersupport@penguinrandomhouse.co.uk', 1976),
(3, 'Little, Brown Books for Young Readers', '34 BEACON ST Boston, MA 02108', 'https://www.hachettebookgroup.com/imprint/little-brown-books-for-young-readers/', 'childrenspublicity@hbgusa.com', 1926),
(4, 'Penguin Young Readers Group', 'Vauxhall Bridge Road, London, United Kingdom', 'https://www.penguin.com/penguin-young-readers-overview/', 'litincolour@penguinrandomhouse.co.uk.', 1927),
(5, 'Kronik Kitap', 'Levent, Şakayıklı Sk. No: 8, 34330 Beşiktaş/İstanbul', 'https://kronikkitap.com', 'kronik@kronikkitap.com', 2016),
(6, 'G.P. Putnam\'s Sons', '345 Hudson Street New York NY United States 10014', 'https://www.penguin.com/putnam/', 'putnampublicity@us.penguingroup.com.', 1838),
(7, 'Washington Square Press', '1230 Avenue of the Americas New York NY 10020 USA', 'https://www.simonandschuster.com/search/books/Imprint-Washington-Square-Press/_/N-1z13w38', 'editor@nyunews.com', 1973),
(8, 'Ballantine Books', '1745 Broadway New York New York 10019', 'https://www.randomhousebooks.com/imprint/ballantine-books/#connect', 'BBDPublicity@randomhouse.com', 1952),
(9, 'Riverhead Books', 'Fl 21, New York City, New York, 10019, United States', 'https://www.penguin.com/riverhead-overview/', 'riverheadpublicity@us.penguingroup.com', 1994),
(10, 'Penguin Books', '20 Vauxhall Bridge Rd, London,SW1V 2SA, UK', 'https://www.penguin.co.uk', 'customersupport@penguinrandomhouse.co.uk.', 1935),
(11, 'Random House Inc', '1745 Broadway in Manhattan', 'https://www.penguinrandomhouse.com', 'consumerservices@penguinrandomhouse.com.', 1927),
(12, 'Penguin Classics', '20 Vauxhall Bridge Rd, London,SW1V 2SA, UK', 'https://penguinclassics.com', 'customersupport@penguinrandomhouse.co.uk.', 1946);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Yazar`
--

CREATE TABLE `Yazar` (
  `yazarID` int(11) NOT NULL,
  `yazarAdi` text DEFAULT NULL,
  `yazarSoyadi` text DEFAULT NULL,
  `yazarWebSayfa` text DEFAULT NULL,
  `yazarDoğumTarih` text DEFAULT NULL,
  `yazarÖlümTarih` text DEFAULT NULL,
  `yazarMilliyet` text DEFAULT NULL,
  `yazarCinsiyet` text DEFAULT NULL,
  `yazarFotoURL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `Yazar`
--

INSERT INTO `Yazar` (`yazarID`, `yazarAdi`, `yazarSoyadi`, `yazarWebSayfa`, `yazarDoğumTarih`, `yazarÖlümTarih`, `yazarMilliyet`, `yazarCinsiyet`, `yazarFotoURL`) VALUES
(1, 'Alice', 'Waters', 'https://www.masterclass.com/classes/alice-waters-teaches-the-art-of-home-cooking', '28.04.1944', '-', 'Amerikan', 'Kadın', 'https://m.media-amazon.com/images/I/B1kxesWorsS._SX300_CR0%2C0%2C0%2C0_.jpg'),
(2, 'James', 'Clear', 'https://jamesclear.com', '22.01.1986', '-', 'Amerikan', 'Erkek', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRivdYOW_-57OzvctYz2Tijd5XTm3iuSAgPahxrUVtTazMH5zHv'),
(3, 'Chris', 'Colfer', 'https://thelandofstories.com', '27.05.1990', '-', 'Amerikan', 'Erkek', 'https://m.media-amazon.com/images/I/81fFtgVdnQL._SX601_CR0%2C0%2C601%2C601_.jpg'),
(4, 'Roald', 'Dahl', 'https://roalddahl.com', '13.09.1916', '23.11.1990', 'İngiliz', 'Erkek', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcRXJjBcncfcy7GOzpybG_qaL27q0OgUS-g5u0MbDrUVEjLCmmskQC0TTE05Qn3WuekGoREP21haK6Yeigw'),
(7, 'Delia', 'Owens', 'https://www.deliaowens.com', '04.04.1949', '-', 'Amerikan', 'Kadın', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcSowE_NZAxZRzSgCOQwRRVHYltYmX_2Z3CftOKiE51JAyuA__jeF6kEcnhbDSP2zlhCQOrs2j9UDXdinNY'),
(8, 'Taylor', 'Jenkins Reid', 'https://taylorjenkinsreid.com', '20.12.1983', '-', 'Amerikan', 'Kadın', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQLhdxH8TmnodNYw-HcInz2qCHHiZhPov0jVoKKs-xMatY5527_'),
(9, 'Elizabeth', 'Gilbert', 'https://www.elizabethgilbert.com', '18.07.1969', '-', 'Amerikan', 'Kadın', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQdAr2WZY7udAQY6t3zwSGr7B2LdGBIOokw_bm_kdkIsfG1H2F7'),
(10, 'Daphne', 'du Maurier', 'https://www.dumaurier.org', '13.05.1907', '19.04.1989', 'İngiliz', 'Kadın', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-qsM1pn2k2F79P_EMaplnT3JEaCQXmQk1xEkQowYz6n0FAEbq'),
(11, 'Emily', 'Dickinson', 'https://www.poetryfoundation.org/poets/emily-dickinson', '10.12.1830', '15.10.1886', 'Amerikan', 'Kadın', 'https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcRX5M-uakEFjNKnCOjsocmOUEKL2oUHt3hHQSJCYzc-JRO0wfjXl-rvr1-VijSXGOLohV0kdoVDNLzKgdQ'),
(12, 'Charles', 'Dickens', 'https://www.bl.uk/people/charles-dickens', '07.02.1812', '09.06.1870', 'İngiliz', 'Erkek', 'https://cdn.britannica.com/17/82717-050-5D9C010D/Charles-Dickens.jpg'),
(13, 'Sven', 'Carlsson', 'https://bonnierrights.se/contact/sven-carlsson/', '1986', '-', 'İsveçli', 'Erkek', 'https://bonnierrights.se/wp-content/uploads/2023/12/47622-728x1024.jpg'),
(14, 'Jonas', 'Leijonhufvud', 'https://bonnierrights.se/contact/jonas-leijonhufvud/', '1974', '-', 'İsveçli', 'Erkek', 'https://bonnierrights.se/wp-content/uploads/2023/12/47710-scaled.jpg'),
(15, 'David', 'Eagleman', 'https://eagleman.com', '25.04.1971', '-', 'ABD ', 'Erkek', 'https://upload.wikimedia.org/wikipedia/commons/2/2b/David_Eagleman_%28cropped%29.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Eser`
--
ALTER TABLE `Eser`
  ADD PRIMARY KEY (`eserID`);

--
-- Tablo için indeksler `Yazar`
--
ALTER TABLE `Yazar`
  ADD PRIMARY KEY (`yazarID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `Eser`
--
ALTER TABLE `Eser`
  MODIFY `eserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `Yazar`
--
ALTER TABLE `Yazar`
  MODIFY `yazarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
