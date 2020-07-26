-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Júl 26. 19:35
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `usedcars`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cars`
--

CREATE TABLE `cars` (
  `user_id` int(11) NOT NULL,
  `marka` varchar(30) NOT NULL,
  `tipus` varchar(30) NOT NULL,
  `évjárat` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `uzemanyag` varchar(30) NOT NULL,
  `kobcenti` int(11) NOT NULL,
  `loero` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `cars`
--

INSERT INTO `cars` (`user_id`, `marka`, `tipus`, `évjárat`, `ar`, `uzemanyag`, `kobcenti`, `loero`, `car_id`) VALUES
(50, 'Opel', 'Astra H', 2008, 3900, 'Dizel', 1700, 105, 200),
(51, 'Opel', 'Astra J', 2014, 6900, 'Benzin', 1600, 120, 201),
(52, 'Opel', 'Astra K', 2016, 8000, 'Dizel', 2000, 140, 202),
(53, 'Citroen', 'C4', 2009, 4500, 'Dizel', 1900, 125, 203),
(54, 'Volkswagen', 'Passat cc', 2010, 9500, 'Benzin', 2000, 190, 204),
(55, 'Opel', 'Corsa D', 2010, 3900, 'Benzin', 1200, 60, 205),
(56, 'Fiat', 'Grande Punto', 2011, 4000, 'Benzin', 1300, 80, 206),
(57, 'Ford', 'Ranger', 2006, 5000, 'Dizel', 3000, 200, 207),
(58, 'Volkswagen', 'Golf 5', 2008, 5000, 'Dizel', 1900, 105, 208),
(59, 'Volkswagen', 'Golf 4', 2003, 2900, 'Benzin', 1600, 107, 209),
(60, 'Volkswagen', 'Passat', 2008, 5900, 'Dizel', 2000, 140, 210),
(61, 'Volvo', 'XC90', 2006, 5100, 'Dizel', 2500, 165, 211);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `car_brands`
--

CREATE TABLE `car_brands` (
  `brands_id` int(11) NOT NULL,
  `brands_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `car_brands`
--

INSERT INTO `car_brands` (`brands_id`, `brands_name`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes'),
(4, 'Seat'),
(5, 'Volkswagen'),
(6, 'Fiat'),
(7, 'Opel'),
(8, 'Renault'),
(9, 'Citroen'),
(10, 'Toyota'),
(11, 'Skoda'),
(12, 'Lancia'),
(13, 'Volvo'),
(14, 'Ford');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `car_images`
--

CREATE TABLE `car_images` (
  `image_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `car_images`
--

INSERT INTO `car_images` (`image_id`, `car_id`, `image_name`) VALUES
(1878, 200, '../uploads/5f03786a9cfab4.36419294.astra_h1.jpg'),
(1879, 200, '../uploads/5f03786a9e8cb6.38699758.astra_h2.jpg'),
(1880, 200, '../uploads/5f03786a9fe6a4.20121920.astra_h3.jpg'),
(1881, 200, '../uploads/5f03786aa14b30.70837491.astra_h4.jpg'),
(1882, 200, '../uploads/5f03786aa28928.02888569.astra_h5.jpg'),
(1883, 201, '../uploads/5f0378ec1e8f51.31896134.1.jpg'),
(1884, 201, '../uploads/5f0378ec205219.25171880.2.jpg'),
(1885, 201, '../uploads/5f0378ec218f67.60700273.3.jpg'),
(1886, 201, '../uploads/5f0378ec235688.04063348.4.jpg'),
(1887, 201, '../uploads/5f0378ec24a763.55531488.5.jpg'),
(1888, 202, '../uploads/5f0379392f11b5.27035074.3a3f31da6a5f-1920x1080.jpg'),
(1889, 202, '../uploads/5f0379393125d0.23943926.7a5e4260ac6e-1920x1080.jpg'),
(1890, 202, '../uploads/5f03793932de03.88665737.ac8b3df886fc-1920x1080.jpg'),
(1891, 202, '../uploads/5f03793934c977.26467200.b28fc15a1160-1920x1080.jpg'),
(1892, 202, '../uploads/5f0379393684f8.91321209.ecf9473e597a-1920x1080.jpg'),
(1893, 203, '../uploads/5f037984abc4c4.72419687.1bf842afb478-1920x1080.jpg'),
(1894, 203, '../uploads/5f037984ae28c9.69129931.653b82a68d3b-1920x1080.jpg'),
(1895, 203, '../uploads/5f037984afe707.22325191.e6db92228474-1920x1080.jpg'),
(1896, 203, '../uploads/5f037984b1d614.78938861.eefcff76c4f5-1920x1080.jpg'),
(1897, 203, '../uploads/5f037984b373b4.70047700.fb9f03081e53-1920x1080.jpg'),
(1898, 204, '../uploads/5f0379cfcd9de1.30184264.98df6b424cfd-1920x1080.jpg'),
(1899, 204, '../uploads/5f0379cfcef4b4.51052583.58582473e2a6-1920x1080.jpg'),
(1900, 204, '../uploads/5f0379cfd029e2.45625646.db812a4e7a29-1920x1080.jpg'),
(1901, 204, '../uploads/5f0379cfd1a739.16179615.ddc16ed0b300-1920x1080.jpg'),
(1902, 204, '../uploads/5f0379cfd2caf4.93865962.e93f4b60ad47-1920x1080.jpg'),
(1903, 205, '../uploads/5f037a1c6ed533.11098043.66340a0706d8-1920x1080.jpg'),
(1904, 205, '../uploads/5f037a1c703586.50610432.36166338b3b9-1920x1080.jpg'),
(1905, 205, '../uploads/5f037a1c716c55.70371881.a33e966d7296-1920x1080.jpg'),
(1906, 205, '../uploads/5f037a1c72a3b4.52085047.b90efc1cce58-1920x1080.jpg'),
(1907, 205, '../uploads/5f037a1c741670.10999304.c775d0285e3f-1920x1080.jpg'),
(1908, 206, '../uploads/5f037a4d509986.71358112.2eef77de5b4e-1920x1080.jpg'),
(1909, 206, '../uploads/5f037a4d5398e6.00878512.28d435a413b5-1920x1080.jpg'),
(1910, 206, '../uploads/5f037a4d561230.08612359.88772546114b-1920x1080.jpg'),
(1911, 206, '../uploads/5f037a4d57ad22.88857114.af20f3ebf2a5-1920x1080.jpg'),
(1912, 206, '../uploads/5f037a4d596a54.37484891.e4e84180e0ba-1920x1080.jpg'),
(1913, 207, '../uploads/5f037aaea5c0e6.13742862.2e1a92ba05f6-1920x1080.jpg'),
(1914, 207, '../uploads/5f037aaea72bf1.69704650.17ec42217feb-1920x1080.jpg'),
(1915, 207, '../uploads/5f037aaea8e075.71744253.28d3572b4ebb-1920x1080.jpg'),
(1916, 207, '../uploads/5f037aaeaa2752.80025236.d5c6e9c80285-1920x1080.jpg'),
(1917, 207, '../uploads/5f037aaeabcaa8.35933918.fcc9beef27af-1920x1080.jpg'),
(1918, 208, '../uploads/5f037aeb7bb4f4.84888099.07fa6a1a05ee-1920x1080.jpg'),
(1919, 208, '../uploads/5f037aeb7d3f08.12285268.95f69f335972-1920x1080.jpg'),
(1920, 208, '../uploads/5f037aeb7ef181.70060495.725a0cd790c2-1920x1080.jpg'),
(1921, 208, '../uploads/5f037aeb8086f3.34964540.b7b0430ab663-1920x1080.jpg'),
(1922, 208, '../uploads/5f037aeb8205f2.81365015.b37b12028b60-1920x1080.jpg'),
(1923, 209, '../uploads/5f037b2a62bbc0.33565021.5d1a23392cdb-800x600.jpg'),
(1924, 209, '../uploads/5f037b2a641e52.14071366.9137f6f110a7-800x600.jpg'),
(1925, 209, '../uploads/5f037b2a6558d8.55210676.b4a0aeba987d-800x600.jpg'),
(1926, 209, '../uploads/5f037b2a66b427.81882943.eac237579c0b-800x600.jpg'),
(1927, 209, '../uploads/5f037b2a67e778.41148089.f4ff9e554681-800x600.jpg'),
(1928, 210, '../uploads/5f037b707bede0.73789455.1d5301e38507-1920x1080.jpg'),
(1929, 210, '../uploads/5f037b707d5c26.91492950.2b1b55a21637-1920x1080.jpg'),
(1930, 210, '../uploads/5f037b707ee1d4.42753002.516c922cd968-1920x1080.jpg'),
(1931, 210, '../uploads/5f037b70800783.76233371.804639acfdcf-1920x1080.jpg'),
(1932, 210, '../uploads/5f037b708178e7.54561179.b95c92ef5502-1920x1080.jpg'),
(1933, 211, '../uploads/5f037bba5c7383.17531094.01a1fcfaaa48-1920x1080.jpg'),
(1934, 211, '../uploads/5f037bba5e11b0.07860583.51a91c3849e6-1920x1080.jpg'),
(1935, 211, '../uploads/5f037bba5f6624.31143293.80b04f190a2b-1920x1080.jpg'),
(1936, 211, '../uploads/5f037bba60d013.70607123.1958722c6c2b-1920x1080.jpg'),
(1937, 211, '../uploads/5f037bba6241f9.04423163.ea72b5e9ae85-1920x1080.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `car_type`
--

CREATE TABLE `car_type` (
  `type_id` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `car_type`
--

INSERT INTO `car_type` (`type_id`, `brands_id`, `type_name`) VALUES
(9, 1, 'A1'),
(10, 1, 'A2'),
(11, 1, 'A3'),
(12, 1, 'A4'),
(13, 1, 'A5'),
(14, 1, 'A6'),
(15, 1, 'A7'),
(16, 2, 'X1'),
(17, 2, 'X2'),
(18, 2, 'X3'),
(19, 2, 'X4'),
(20, 2, 'X5');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_text` text NOT NULL,
  `news_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`news_id`, `user_id`, `news_title`, `news_text`, `news_image`) VALUES
(49, 44, 'Nincs ma a konnektoros X2-nél trendibb BMW', '<p style=\"text-align:center\"><span style=\"font-size:24px\">Form&aacute;s szabadidő-aut&oacute;, konnektorr&oacute;l t&ouml;lthető hajt&aacute;ssal &eacute;s BMW log&oacute;val az elej&eacute;n. Az X2 xDrive25e mindent bevet, hogy siker legyen.</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><img alt=\"\" src=\"news_image/1590595051_konnektoros_bmw.jpg\" style=\"height:305px; width:700px\" /></span></p>\r\n\r\n<p style=\"text-align:justify\">Val&oacute;sz&iacute;nűleg a BMW legtrendibb modellje a konnektorr&oacute;l t&ouml;lthető X2-es, hiszen mindent tud, ami ma elv&aacute;rhat&oacute; egy aut&oacute;t&oacute;l. A szabadidő-aut&oacute;s megjelen&eacute;s divat, ahogyan a pratikumot kicsit h&aacute;tt&eacute;rbe szor&iacute;t&oacute;, cser&eacute;be sportosabb forma is. A BMW X2 xDrive25e r&aacute;ad&aacute;sul konnektorr&oacute;l t&ouml;lthető hibrid, ami z&eacute;r&oacute; emisszi&oacute;s m&oacute;dban suhanhat a belv&aacute;rosban &eacute;s b&uuml;szk&eacute;n hordhatja a magyar z&ouml;ldrendsz&aacute;mot.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"news_image/1590595197_konnektoros_bmw2.jpg\" style=\"height:467px; width:700px\" /></p>\r\n\r\n<p>1,5 literes, h&aacute;romhengeres, turb&oacute;s benzinmotor van az X2 xDrive25e-ben, mely &ouml;nmag&aacute;ban 125 l&oacute;erőt &eacute;s 220 Nm nyomat&eacute;kot tud. Mell&eacute; j&ouml;n a 95 lovat &eacute;s 165 Nm nyomat&eacute;kot tud&oacute; elektromos hajt&aacute;s. A rendszerteljes&iacute;tm&eacute;nye 220 l&oacute;erő, nyomat&eacute;ka 385 Nm. Mindent bevetve a konnektoros X2-es&nbsp;6,8 m&aacute;sodperc alatt gyorsul 100-ra &eacute;s&nbsp;195 km/&oacute;ra a v&eacute;gsebess&eacute;ge.</p>\r\n', '1590595263_konnektoros_bmw.jpg'),
(51, 43, 'A batárság alapesete MERCEDES-BENZ GLA 200D - 2020', '<h2>M&eacute;g nem tudjuk, lass&iacute;tja-e, vagy gyors&iacute;tja a v&iacute;rus a villanyaut&oacute;z&aacute;s terjed&eacute;s&eacute;t, de a klasszikus d&iacute;zel utaz&oacute;bat&aacute;r egyelőre nem hal ki. Legal&aacute;bbis a n&eacute;metek mindent megtesznek az &uuml;gy &eacute;rdek&eacute;ben, p&eacute;ld&aacute;ul a GLA-ban csak az&eacute;rt hagytak n&eacute;h&aacute;ny hib&aacute;t, hogy legyen mi&eacute;rt dr&aacute;g&aacute;bbat v&aacute;lasztani.</h2>\r\n\r\n<p><img alt=\"\" src=\"news_image/1594034680_merci.jpg\" style=\"float:left; height:334px; width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ha&nbsp;valami&eacute;rt r&aacute;n&eacute;zek a Mercedes k&iacute;n&aacute;lat&aacute;ra, mindig el&aacute;mulok, h&aacute;nyf&eacute;le aut&oacute;t &aacute;rulnak. Az A oszt&aacute;ly alapjain p&eacute;ld&aacute;ul h&eacute;tf&eacute;le karossz&eacute;ri&aacute;t sz&aacute;moltam &ouml;ssze, amiben az a d&ouml;bbenet, hogy m&iacute;g a Mercinek ez csak egy csal&aacute;dja a sok k&ouml;z&uuml;l, a Volv&oacute;nak &ouml;sszesen van ennyi. A kompakt, alapvetően fronthajt&aacute;sos csal&aacute;dban a GLA a legfiatalabb testv&eacute;r, de ilyen n&eacute;ven volt m&aacute;r csillagos SUV 2013-t&oacute;l. Szinte v&aacute;ltoztat&aacute;s n&eacute;lk&uuml;l vette &aacute;t a korabeli A oszt&aacute;ly karossz&eacute;ri&aacute;j&aacute;t, ez&eacute;rt&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2014%2F08%2F08%2Fmercedes-benz_gla_220_cdi%2F\" id=\"hyperlink_67770823154733c27f6496f97717150e\">szűk volt az utast&eacute;r,</a>&nbsp;&eacute;s &uuml;gyetlen&uuml;l mozgott terepen. Az aktu&aacute;lis&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2018%2F11%2F28%2Fmercedes-benz_a200_7g-dct_w177_2018%2F\" id=\"hyperlink_7e99b58e081e7c5c2d7d68f561084b28\">A oszt&aacute;ly</a>&nbsp;sokkal jobb kompakt, mint az elődje volt, teh&aacute;t ha csak megemelik, akkor is &eacute;rezhetően jobb lenne az &uacute;j GLA. De ehelyett teljesen &ouml;n&aacute;ll&oacute; kocsi. Nem is &eacute;rtem, honnan van a Mercinek ennyi p&eacute;nze fejleszt&eacute;sre.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"news_image/1594034743_merci2.jpg\" style=\"float:right; height:334px; width:500px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\">Annyira m&aacute;shonnan fogt&aacute;k meg a tervezők a probl&eacute;m&aacute;t, hogy nem is az elődh&ouml;z &eacute;rdemes hasonl&iacute;tani a m&eacute;reteit, hanem a testv&eacute;reihez. Sokat elmes&eacute;l a helyzet&eacute;ről ugyanis, hogy a tengelyt&aacute;vja azonos az A oszt&aacute;llyal (2729 mm), mik&ouml;zben a szint&eacute;n erre az alapra &eacute;p&iacute;tett&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2019%2F11%2F27%2Fbemutato_mercedes-benz_glb_2019%2F\" id=\"hyperlink_c6b7d5d23ca9ed0c04cc98362575da87\">GLB</a>-&eacute; t&iacute;z centivel ny&uacute;jtott. A magass&aacute;ga f&eacute;l&uacute;ton j&aacute;r a k&eacute;t rokon k&ouml;z&ouml;tt (1611 mm), a sz&eacute;less&eacute;ge viszont m&aacute;r a GLB-vel azonos (1834 mm), &eacute;s a n&eacute;gy centi sz&eacute;les&iacute;t&eacute;st &eacute;rezni v&aacute;llban az A-hoz k&eacute;pest. Teh&aacute;t hihet&uuml;nk a szem&uuml;nknek: a GLA val&oacute;ban nagyobb az A &eacute;s B oszt&aacute;lyn&aacute;l, de m&eacute;g nem akkora bat&aacute;r, mint a kompakt gy&ouml;kereit meghazudtol&oacute;an hatalmas, h&eacute;tszem&eacute;lyesk&eacute;nt is kaphat&oacute; GLB.</span></p>\r\n', '1594034886_merci.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `user_first`, `user_last`, `user_email`, `user_pwd`, `user_usertype`) VALUES
(8, 'epernorbert', 'Eper', 'Norbert', 'epernorbert@gmail.com', '$2y$10$eLbxIxDJcn97szwN..9ezerjep.nZLqaJZoWLhJTlyW7YgWRTrXPm', 'admin'),
(43, 'bazsogabor', 'Bazso', 'Gabor', 'bazsogabor@gmail.com', '$2y$10$ZAstBesbklDjitAxd1ze3uvL5kt09rdaa5L0Po1yME9HchJ/0qcCm', 'writer'),
(44, 'draskovics', 'Draskovics', 'Andras', 'draskovicsandras@gmail.com', '$2y$10$PRixZYwJmeMdhwefaDeO/.ALp9y.YeRxSNEsHXQ9Qi6kNwZBXDK/y', 'writer'),
(50, 'elso', 'Elso', 'Elso', 'elso@gmail.com', '$2y$10$PvNoQC8LWl3Hol6j.fOZn.sxD95tc0KzH1U7LwdmhhWvzblIxqrZu', 'user'),
(51, 'masodik', 'Masodik', 'Masodik', 'masodik@gmail.com', '$2y$10$41zophelH/6ns.5g3jv.h.QBfS29SyI5tRjz1U5TbVXDmcjtQ.eqe', 'user'),
(52, 'harmadik', 'Harmadik', 'Harmadik', 'harmadik@gmail.com', '$2y$10$wO6rmIO.fY6qfR2rPKJtyuX0UTPgep76zRwxoo0uuIcj2N.njrgwG', 'user'),
(53, 'negyedik', 'Negyedik', 'Negyedik', 'negyedik@gmail.com', '$2y$10$Rh.rvQ06gg/WeDzJDGiLUeDAtyxL.meQMmAmRkH6k0h/IWhRqsLLu', 'user'),
(54, 'otodik', 'Otodik', 'Otodik', 'otodik@gmail.com', '$2y$10$VkLZxLg5HsMJ.65vXE7y3Oj/pokk3nkzGvEU/DWG8slovSNGMBWeG', 'user'),
(55, 'hatodik', 'Hatodik', 'Hatodik', 'hatodik@gmail.com', '$2y$10$4wXWNKBOdpciRcM8D4FZPu4dSlKHUE/dhCso9eeRf1C2G5YLZnksi', 'user'),
(56, 'hetedik', 'Hetedik', 'Hetedik', 'hetedik@gmail.com', '$2y$10$iCT1Pxkxyd2e2FAE6oxXZ.pcTTZN97xKuOS7lzou1EXCio2hBK.Li', 'user'),
(57, 'nyolcadik', 'Nyolcadik', 'Nyolcadik', 'nyolcadik@gmail.com', '$2y$10$R26UPjENKu2.41fi8bJ4pO9ME4YU6nDvgeaXGu1pQaPWv6W4Q3/te', 'user'),
(58, 'kilencedik', 'Kilencedik', 'Kilencedik', 'kilencedik@gmail.com', '$2y$10$C8EKv5vCBOhKjU/QgQK76O2gRcYx30SxXdr8A/mwY5YOZJifX3S6G', 'user'),
(59, 'tizedik', 'Tizedik', 'Tizedik', 'tizedik@gmail.com', '$2y$10$VhpKh.HHsbkknFL8D4LrpuvBC3j0eGqVNnDhJCHkN42SBPFeOdHtW', 'user'),
(60, 'tizenegy', 'Tizenegy', 'Tizenegy', 'tizenegy@gmail.com', '$2y$10$sNfFeNLpWOh832g4hSF3M.yusDmqjsczeZUc9nPKRRkoJF2NgoF5C', 'user'),
(61, 'tizenketto', 'Tizenketto', 'Tizenketto', 'tizenketto@gmail.com', '$2y$10$pd.BSUtV5hQSIK1Xdss9meYDRR74FB1eyv3pD1B54IaUP/4GrrkjO', 'user'),
(62, 'tizenharom', 'tizenharom', 'tizenharom', 'tizenharom@gmail.com', '$2y$10$m4GCuOUWhPbFvYeb/SYbpudeT/Z6b/ugKUm63gW3eKy0fVdne5IIC', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `car_uniq` (`car_id`);

--
-- A tábla indexei `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- A tábla indexei `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `car_id` (`car_id`);

--
-- A tábla indexei `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `brands_id` (`brands_id`);

--
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id_2` (`user_id`) USING BTREE;

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT a táblához `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `car_images`
--
ALTER TABLE `car_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1969;

--
-- AUTO_INCREMENT a táblához `car_type`
--
ALTER TABLE `car_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `car_type`
--
ALTER TABLE `car_type`
  ADD CONSTRAINT `car_type_ibfk_1` FOREIGN KEY (`brands_id`) REFERENCES `car_brands` (`brands_id`);

--
-- Megkötések a táblához `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
