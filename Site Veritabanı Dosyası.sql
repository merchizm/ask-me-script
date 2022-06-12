--
-- Database : askme
--
-- --------------------------------------------------
-- ---------------------------------------------------
SET AUTOCOMMIT = 0 ;
SET FOREIGN_KEY_CHECKS=0 ;
--
-- Tabel structure for table `ayarlar`
--
DROP TABLE  IF EXISTS `ayarlar`;
CREATE TABLE `ayarlar` (
  `site_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_keyw` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_desc` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_durum` int(11) NOT NULL,
  `site_kd` int(11) NOT NULL,
  `site_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_tema` int(11) NOT NULL,
  `site_kullanicisi` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `site_pass` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  UNIQUE KEY `site_kd` (`site_kd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `ayarlar`  VALUES ( "EK.AskMe | Bana Sor !","Enes Kayalar, EK.Projeleri, EK.AskMe, EK.AskMe Scripti","Anonim olarak soru sorabilece?iniz ki?isel sayfam.","1","0","bunu doldurmanıza gerek yok.","2","Site Sahibi","2a78ed5289f8a6072aa824470cdb4a04");


--
-- Tabel structure for table `csorular`
--
DROP TABLE  IF EXISTS `csorular`;
CREATE TABLE `csorular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soruyazi` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sorutipi` int(11) DEFAULT NULL,
  `soruip` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



--
-- Tabel structure for table `sorular`
--
DROP TABLE  IF EXISTS `sorular`;
CREATE TABLE `sorular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime NOT NULL,
  `answer` varchar(535) COLLATE utf8_turkish_ci NOT NULL,
  `catagory` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


--
-- Tabel structure for table `temalar`
--
DROP TABLE  IF EXISTS `temalar`;
CREATE TABLE `temalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themename` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `settings` varchar(535) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `temalar`  VALUES ( "1","AndBoo","{\"fisim\" : \"EnesKayalar\",  \"fadress\" : \"http://eneskayalar.com\", \"pp\" : \"./images/blank-profile-picture.png\"}");
INSERT INTO `temalar`  VALUES ( "2","HollaDroid","{\"fisim\":\"Enes Kayalar\", \"fadress\":\"http://eneskayalar.com\",\"bio\":\"\", \"facebooklnk\":\"\", \"twitterlnk\":\"\", \"bgimg\":\"./images/profilbg.jpg\", \"pp\" : \"./images/blank-profile-picture.png\" }");


--
-- Tabel structure for table `yasaklilar`
--
DROP TABLE  IF EXISTS `yasaklilar`;
CREATE TABLE `yasaklilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;



SET FOREIGN_KEY_CHECKS = 1 ;
COMMIT ;
SET AUTOCOMMIT = 1 ;
