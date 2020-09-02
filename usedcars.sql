-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Sze 02. 19:27
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
  `body_style` varchar(30) NOT NULL,
  `mileage` int(11) NOT NULL,
  `euro` varchar(30) NOT NULL,
  `colour` varchar(30) NOT NULL,
  `transmission` varchar(30) NOT NULL,
  `weight` int(11) NOT NULL,
  `identification_number` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `cars`
--

INSERT INTO `cars` (`user_id`, `marka`, `tipus`, `évjárat`, `ar`, `uzemanyag`, `kobcenti`, `loero`, `body_style`, `mileage`, `euro`, `colour`, `transmission`, `weight`, `identification_number`, `description`, `car_id`) VALUES
(50, 'Opel', 'Astra H', 2007, 3200, 'Benzin', 1600, 120, 'Ferdehátú', 250000, 'euro 4', 'Szürke', 'Manuális - 5', 1390, '35438765374834876', 'Rövid leírás. Rövid leírás. Rövid leírás. Rövid leírás.', 289),
(51, 'Opel', 'Astra J', 2010, 4800, 'Benzin', 1600, 110, 'Kombi', 150000, 'euro 5', 'Kék', 'Manuális - 6', 1500, '12356985477854785', 'Rövid leírás.Rövid leírás.', 291),
(52, 'Opel', 'Astra K', 2015, 8000, 'Dizel', 1700, 135, 'Kombi', 99000, 'euro 6', 'Szürke', 'Manuális - 6', 1560, '21321321321321312', 'Rövid leírás', 295),
(53, 'Citroen', 'C4', 2009, 4500, 'Dizel', 1900, 125, 'ferdehátú', 198458, 'Euro 4', 'fekete', 'manuális - 6', 1410, 'JKL123JIO15847854', 'Extra autó.', 203),
(54, 'Volkswagen', 'Passat cc', 2010, 9500, 'Benzin', 2000, 190, 'Coupe', 145879, 'euro 5', 'Fehér', 'Automata - 6', 1450, 'DFS233DDD12587458', 'Nagyon fullos autó.', 204),
(55, 'Opel', 'Corsa D', 2010, 3900, 'Benzin', 1200, 60, 'Ferdehátú', 156789, 'euro 4', 'Kék', 'Manuális - 5', 1290, 'VGF444ASW44587785', 'Fullos kis kék autó.', 205),
(56, 'Fiat', 'Grande Punto', 2011, 4000, 'Benzin', 1300, 80, 'Ferdehátú', 133548, 'euro 4', 'Fehér', 'Manuális - 5', 1250, 'VVV489QWE55555555', 'Fullos kis fehér kocsi.', 206),
(57, 'Ford', 'Ranger', 2006, 5000, 'Dizel', 3000, 200, 'Pickup', 299845, 'euro 3', 'Fehér', 'Automata - 6', 1755, 'VGH789QWEhhgtzgfd', 'Fullos kis tereprejáros.', 207),
(58, 'BMW', 'I3', 2014, 14000, 'Elektromos', 1, 95, 'Ferdehátú', 90000, 'euro 6', 'Szürke', 'Automata - 4', 1500, '32132121532SADSAD', 'Jó kis zöld autó.', 208),
(59, 'Volkswagen', 'Golf 4', 2003, 2900, 'Benzin', 1600, 107, 'Ferdehátú', 356878, 'euro 3', 'Kék', 'Manuális - 5', 1390, 'BHJ115QWE12487458', 'Fullos kis golf.', 209),
(60, 'Volkswagen', 'Passat', 2008, 5900, 'Dizel', 2000, 140, 'Kombi', 190000, 'euro 4', 'Piros', 'Manuális - 6', 1545, 'VFG444AWE12459784', 'Fullos kis kombi.', 210),
(61, 'Volvo', 'XC90', 2006, 5100, 'Dizel', 2500, 165, 'Városi terepjáró', 255489, 'euro 3', 'Kék', 'Manuális - 6', 1650, 'VGZ789QWE45874587', 'Fullos kis SUV.', 211),
(62, 'Audi', 'A4', 2010, 9000, 'Dizel', 2000, 150, 'Sedan', 256879, 'euro 4', 'Szürke', 'Manuális - 6', 1500, 'ASD456QWE45789451', 'Szürke autó.', 236),
(81, 'Audi', 'A6', 2010, 9500, 'Dizel', 1950, 145, 'Sedan', 195789, 'euro 5', 'Fekete', 'Manuális - 6', 1500, 'VBG456QWEftwdfr23', 'Fullos fekete autó!', 234),
(82, 'Volkswagen', 'Golf 5', 2008, 5000, 'Dizel', 1900, 105, 'Ferdehátú', 256879, 'euro 4', 'Szürke', 'Manuális - 6', 1423, '', 'Fullos kis szürke autó.', 285),
(83, 'Volkswagen', 'Golf 7', 2016, 18000, 'Elektromos', 1, 135, 'Ferdehátú', 30000, 'euro 6', 'Fehér', 'Automata - 7', 1680, '38296583567438653', 'Nagyon jó kis zöld autó   . Elvisz A-ból B-be full ingyen. Na jó azért nem, mert az elektromos áramot is meg kell termelni. Random. Random. Random. Random. Random. Random. Random. Random. Random. ', 297);

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
-- Tábla szerkezet ehhez a táblához `car_extras`
--

CREATE TABLE `car_extras` (
  `extras` varchar(50) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `car_extras`
--

INSERT INTO `car_extras` (`extras`, `car_id`) VALUES
('Tempomat', 234),
('Klima', 234),
('Napfénytető', 234),
('Xenon fényszóró', 234),
('Tolatóradar', 234),
('Multifunkcionális kormány', 234),
('Klima', 236),
('Napfénytető', 236),
('Centrálzár', 236),
('Riasztó', 208),
('Led Fényszóró', 208),
('Xenon fényszóró', 208),
('Tolatóradar', 208),
('Multifunkcionális kormány', 208),
('Kartámasz', 208),
('Tempomat', 297),
('Klima', 297),
('Napfénytető', 297),
('Centrálzár', 297),
('Riasztó', 297),
('Led Fényszóró', 297),
('Xenon fényszóró', 297),
('Tolatóradar', 297),
('Multifunkcionális kormány', 297),
('Kartámasz', 297);

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
(1918, 285, '../uploads/5f037aeb7bb4f4.84888099.07fa6a1a05ee-1920x1080.jpg'),
(1919, 285, '../uploads/5f037aeb7d3f08.12285268.95f69f335972-1920x1080.jpg'),
(1920, 285, '../uploads/5f037aeb7ef181.70060495.725a0cd790c2-1920x1080.jpg'),
(1921, 285, '../uploads/5f037aeb8086f3.34964540.b7b0430ab663-1920x1080.jpg'),
(1922, 285, '../uploads/5f037aeb8205f2.81365015.b37b12028b60-1920x1080.jpg'),
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
(1937, 211, '../uploads/5f037bba6241f9.04423163.ea72b5e9ae85-1920x1080.jpg'),
(1997, 234, '../uploads/5f25775c44df40.49640187.1.jpg'),
(1998, 234, '../uploads/5f25775c47abf8.78523748.2.jpg'),
(1999, 234, '../uploads/5f25775c497036.21540571.3.jpg'),
(2000, 234, '../uploads/5f25775c4ab617.67118176.4.jpg'),
(2001, 234, '../uploads/5f25775c4c4d12.71584750.5.jpg'),
(2007, 236, '../uploads/5f2580483feb27.35219567.1.jpg'),
(2008, 236, '../uploads/5f25804841b876.39958004.2.jpg'),
(2009, 236, '../uploads/5f258048439739.58727311.3.jpg'),
(2010, 236, '../uploads/5f258048459a47.79655261.4.jpg'),
(2011, 236, '../uploads/5f25804847bc51.27014457.5.jpg'),
(2143, 208, '../uploads/5f4d39a5c2f374.01672968.1.jpg'),
(2144, 208, '../uploads/5f4d39a5c46336.04514254.2.jpg'),
(2145, 208, '../uploads/5f4d39a5c61e48.72458835.3.jpg'),
(2146, 208, '../uploads/5f4d39a5c78897.12276246.4.jpg'),
(2147, 208, '../uploads/5f4d39a5c8ea56.92692362.5.jpg'),
(2157, 289, '../uploads/5f4e47a7e34314.65424912.astra_h1.jpg'),
(2158, 289, '../uploads/5f4e47a7e4c6e2.72596294.astra_h2.jpg'),
(2159, 289, '../uploads/5f4e47a7e61e58.57872329.astra_h3.jpg'),
(2160, 289, '../uploads/5f4e47a7e749a6.05575329.astra_h4.jpg'),
(2161, 289, '../uploads/5f4e47a7e88e21.38511714.astra_h5.jpg'),
(2167, 291, '../uploads/5f4e49072a8ee1.08217821.1.jpg'),
(2168, 291, '../uploads/5f4e49072beff8.35286965.2.jpg'),
(2169, 291, '../uploads/5f4e49072d94c0.78539322.3.jpg'),
(2170, 291, '../uploads/5f4e49072f2b71.21342088.4.jpg'),
(2171, 291, '../uploads/5f4e490730cee7.83475157.5.jpg'),
(2179, 295, '../uploads/5f4e4db2291108.10532822.3a3f31da6a5f-1920x1080.jpg'),
(2180, 295, '../uploads/5f4e4db22a4f91.63183891.7a5e4260ac6e-1920x1080.jpg'),
(2181, 295, '../uploads/5f4e4db22b8932.58104870.ac8b3df886fc-1920x1080.jpg'),
(2182, 295, '../uploads/5f4e4db22cc5b0.88482317.b28fc15a1160-1920x1080.jpg'),
(2183, 295, '../uploads/5f4e4db22e21b6.91568596.ecf9473e597a-1920x1080.jpg'),
(2193, 297, '../uploads/5f4e4e45672674.41950342.1.jpg'),
(2194, 297, '../uploads/5f4e4e4568f878.87827243.2.jpg'),
(2195, 297, '../uploads/5f4e4e456a5cb3.63448030.3.jpg'),
(2196, 297, '../uploads/5f4e4e456baee2.92738636.4.jpg'),
(2197, 297, '../uploads/5f4e4e456d38e2.53089839.5.jpg'),
(2198, 297, '../uploads/5f4e4e456e6c15.00649254.6.jpg'),
(2199, 297, '../uploads/5f4e4e456fb617.54799794.7.jpg'),
(2200, 297, '../uploads/5f4e4e45715078.11182700.8.jpg'),
(2201, 297, '../uploads/5f4e4e4572be76.79091361.9.jpg');

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
(235, 1, 'A1'),
(236, 1, 'A2'),
(237, 1, 'A3'),
(238, 1, 'A4'),
(239, 1, 'A5'),
(240, 1, 'A6'),
(241, 1, 'A7'),
(242, 1, 'A8'),
(243, 1, 'Q3'),
(244, 1, 'Q5'),
(245, 2, 'M3'),
(246, 2, 'M4'),
(247, 2, 'M5'),
(248, 2, 'X1'),
(249, 2, 'X2'),
(250, 2, 'X3'),
(251, 2, 'X4'),
(252, 2, 'X5'),
(253, 2, 'X6'),
(254, 2, 'X7'),
(255, 9, 'C1'),
(256, 9, 'C2'),
(257, 9, 'C3'),
(258, 9, 'C4'),
(259, 9, 'C5'),
(260, 9, 'C6'),
(261, 9, 'C8'),
(262, 9, 'Xsara'),
(263, 9, 'CX'),
(264, 9, 'C15'),
(265, 6, '500'),
(266, 6, '500L'),
(267, 6, 'Brava'),
(268, 6, 'Bravo'),
(269, 6, 'Croma'),
(270, 6, 'EVO'),
(271, 6, 'Grande Punto'),
(272, 6, 'Multipla'),
(273, 6, 'Punto'),
(274, 6, 'Tipo'),
(275, 14, 'B-Max'),
(276, 14, 'C-Max'),
(277, 14, 'Escort'),
(278, 14, 'Fiesta'),
(279, 14, 'Ka'),
(280, 14, 'Mustang'),
(281, 14, 'Puma'),
(282, 14, 'Sierra'),
(283, 14, 'Ranger'),
(284, 14, 'Fusion'),
(285, 3, 'A 220'),
(286, 3, 'A 250'),
(287, 3, 'B 180'),
(288, 3, 'B 200'),
(289, 3, 'C 400'),
(290, 3, 'C 350'),
(291, 3, 'C 55 AMG'),
(292, 3, 'CLA 180'),
(293, 3, 'CLA 200'),
(294, 3, 'GLE 400'),
(295, 4, 'Altea'),
(296, 4, 'Altea'),
(297, 4, 'Alte XL'),
(298, 4, 'Arona'),
(299, 4, 'Arosa'),
(300, 4, 'Ibiza'),
(301, 4, 'Inca'),
(302, 4, 'Leon'),
(303, 4, 'Toledo'),
(304, 4, 'Exeo'),
(305, 5, 'Passat'),
(306, 5, 'Passat CC'),
(307, 5, 'Golf 1'),
(308, 5, 'Golf 2'),
(309, 5, 'Golf 3'),
(310, 5, 'Golf 4'),
(311, 5, 'Golf 5'),
(312, 5, 'Golf 6'),
(313, 5, 'Golf 7'),
(314, 5, 'Tiguan'),
(315, 7, 'Astra F'),
(316, 7, 'Astra G'),
(317, 7, 'Astra H'),
(318, 7, 'Astra J'),
(319, 7, 'Astra K'),
(320, 7, 'Calibra'),
(321, 7, 'Corsa C'),
(322, 7, 'Corsa D'),
(323, 7, 'Corsa E'),
(324, 7, 'Corsa F'),
(325, 8, 'Clio'),
(326, 8, 'Espace'),
(327, 8, 'Express'),
(328, 8, 'Fluence'),
(329, 8, 'Kangoo'),
(330, 8, 'Laguna'),
(331, 8, 'Megane'),
(332, 8, 'Talisman'),
(333, 8, 'Thalia'),
(334, 8, 'Twingo'),
(335, 10, 'Auris'),
(336, 10, 'Avensis'),
(337, 10, 'Aygo'),
(338, 10, 'Celica'),
(339, 10, 'Corolla'),
(340, 10, 'iQ'),
(341, 10, 'Prius'),
(342, 10, 'Supra'),
(343, 10, 'Yaris'),
(344, 11, 'Citigo'),
(345, 11, 'Fabia'),
(346, 11, 'Favorit'),
(347, 11, 'Felicia'),
(348, 11, 'Kodiaq'),
(349, 11, 'Octavia'),
(350, 11, 'Rapid'),
(351, 11, 'Karoq'),
(352, 11, 'Praktik'),
(353, 11, 'Roomster'),
(354, 12, 'Debra'),
(355, 12, 'Delta'),
(356, 12, 'Kappa'),
(357, 12, 'Lybra'),
(358, 12, 'Musa'),
(359, 12, 'Phedra'),
(360, 12, 'Thema'),
(361, 12, 'Thesis'),
(362, 12, 'Ypsilon'),
(363, 12, 'Zeta'),
(364, 13, 'C30'),
(365, 13, 'C70'),
(366, 13, 'S40'),
(367, 13, 'S60'),
(368, 13, 'S70'),
(369, 13, 'S80'),
(370, 13, 'S90'),
(371, 13, 'V40'),
(372, 13, 'V50'),
(373, 13, 'V60'),
(374, 2, 'I3');

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
(57, 85, 'Gyári kémfotókon a következő Mercedes SL', '<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">&Eacute;vek &oacute;ta hallani a Mercedes SL fejleszt&eacute;s&eacute;ről, de ez az első alkalom, hogy n&eacute;h&aacute;ny elejtett megjegyz&eacute;sn&eacute;l t&ouml;bbet mutatnak az aut&oacute;b&oacute;l. Az &aacute;lc&aacute;z&aacute;s m&eacute;g el&eacute;g alapos, de az aut&oacute; ar&aacute;nyai az&eacute;rt &iacute;gy is &aacute;tsejlenek a f&oacute;li&aacute;z&aacute;son.</span></span></p>\r\n\r\n<hr />\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\"><img alt=\"\" src=\"news_image/1598540345_merci.jpg\" style=\"float:right; height:407px; margin-left:10px; margin-right:10px; width:723px\" />Az SL-ről kor&aacute;bban annyit &aacute;rultak el, hogy az AMG GT műszaki alapjaira &eacute;p&iacute;tik, &eacute;s &ndash; nyilv&aacute;n ennek is k&ouml;sz&ouml;nhetően &ndash; k&ouml;nnyebb &eacute;s sportosabb karakterű aut&oacute; lesz, mint az elődje. Mindebből kev&eacute;s l&aacute;tszik a k&eacute;peken, sőt, ink&aacute;bb &uacute;gy n&eacute;z ki, az &uacute;jdons&aacute;g sz&eacute;lesebb &eacute;s hosszabb, mint az elődje. Az l&aacute;tszik, hogy a t&iacute;pus legkarakteresebb von&aacute;sa, az ar&aacute;nytalanul hossz&uacute; orr tal&aacute;n m&eacute;g hangs&uacute;lyosabb, mint kor&aacute;bban b&aacute;rmikor, a viszonylag magasra h&uacute;zott farr&eacute;sz viszont meglepő, m&aacute;r csak az&eacute;rt is, mert &aacute;ll&iacute;t&oacute;lag a Mercedes is v&aacute;lt az &ouml;sszecsukhat&oacute; kem&eacute;ny tetőről v&aacute;szontetős kialak&iacute;t&aacute;sra, aminek j&oacute;val kisebb a helyig&eacute;nye.&nbsp;Egy l&eacute;nyeges pont, amiben az SL &eacute;s az AMG GT elt&eacute;r egym&aacute;st&oacute;l, a helyk&iacute;n&aacute;lat lesz. A Mercedes ezen a t&eacute;ren &aacute;ll&iacute;t&oacute;lag a Porsche 911-essel szeretne versenyezni, &iacute;gy lesz h&aacute;ts&oacute; &uuml;l&eacute;ssor, igaz, csak jelk&eacute;pes, &eacute;s az aut&oacute; hangol&aacute;s&aacute;t is &uacute;gy dolgozz&aacute;k ki, hogy ne legyen f&aacute;jdalmasan k&eacute;nyelmetlen a mindennapi haszn&aacute;latban, ami a GT-ről nem mondhat&oacute; el.</span></span></p>\r\n\r\n<hr />\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\"><img alt=\"\" src=\"news_image/1598540508_merci2.jpg\" style=\"height:481px; width:727px\" /></span></span></p>\r\n\r\n<hr />\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">Műszaki &eacute;rtelemben nem v&aacute;rhat&oacute;k nagy &uacute;jdons&aacute;gok: val&oacute;sz&iacute;nű, hogy itt is a 3 literes hathengeres soros turb&oacute;motor, illetve a 4 literes V8-as AMG v&aacute;ltozatait alkalmazz&aacute;k majd, az előbbi a 350 &eacute;s 450 l&oacute;erő k&ouml;zti tartom&aacute;nyt fedheti le, az ut&oacute;bbi pedig bőven 700 l&oacute;erő f&ouml;l&eacute; is h&uacute;zhat&oacute;, ahogy a leg&uacute;jabb AMG GT v&aacute;ltozat, a&nbsp;<a href=\"https://totalcar.hu/magazin/hirek/2020/07/15/itt_a_730_loeros_amg_mercedes_sportkocsi/\" id=\"hyperlink_cf4fa98aea1c85434078cfcd8c39b389\" target=\"_blank\" title=\"Itt a 730 lóerős AMG Mercedes sportkocsi\">Black Series</a>&nbsp;is bizony&iacute;tja. V12-es val&oacute;sz&iacute;nűleg m&aacute;r nem k&eacute;sz&uuml;l az SL-ből sem &ndash; ez val&oacute;sz&iacute;nűleg sz&eacute;p lassan el is tűnik a Mercedes k&iacute;n&aacute;lat&aacute;b&oacute;l.</span></span></p>\r\n\r\n<hr />\r\n<p><img alt=\"\" src=\"news_image/1598540624_merci3.jpg\" style=\"float:right; height:408px; width:727px\" /><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A Mercedes v&aacute;rhat&oacute;an a j&ouml;vő &eacute;v elej&eacute;n mutatja be az SL k&ouml;vetkező gener&aacute;ci&oacute;j&aacute;t, de val&oacute;sz&iacute;nű, hogy addig is lesznek m&eacute;g előzetesek&nbsp;<a href=\"https://totalcar.hu/magazin/hirek/2020/08/13/a_mercedes_belsoter-forradalomrol_beszel/\" id=\"hyperlink_b6eea5f14a9b40e5738a11d75166a0ac\" target=\"_blank\" title=\"A Mercedes belsőtér-forradalomról beszél\">hasonl&oacute;an az S oszt&aacute;lyhoz</a>, amelynek a bemutat&aacute;s&aacute;t szint&eacute;n vagy f&eacute;l &eacute;ves bevezető kamp&aacute;ny előzi meg.&nbsp;Egy l&eacute;nyeges pont, amiben az SL &eacute;s az AMG GT elt&eacute;r egym&aacute;st&oacute;l, a helyk&iacute;n&aacute;lat lesz. A Mercedes ezen a t&eacute;ren &aacute;ll&iacute;t&oacute;lag a Porsche 911-essel szeretne versenyezni, &iacute;gy lesz h&aacute;ts&oacute; &uuml;l&eacute;ssor, igaz, csak jelk&eacute;pes, &eacute;s az aut&oacute; hangol&aacute;s&aacute;t is &uacute;gy dolgozz&aacute;k ki, hogy ne legyen f&aacute;jdalmasan k&eacute;nyelmetlen a mindennapi haszn&aacute;latban, ami a GT-ről nem mondhat&oacute; el.</span></span></p>\r\n', '1598540734_merci.jpg'),
(59, 86, 'A leggyorsabb volt a Teslával, beleállt a földbe', '<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:Times New Roman,Times,serif\">B&aacute;r a koronav&iacute;rus-j&aacute;rv&aacute;ny miatt elhalasztott&aacute;k, most vas&aacute;rnap v&eacute;g&uuml;l megtartj&aacute;k az idei Pikes Peak hegyi felfut&oacute;t, amelynek most zajlanak az időm&eacute;rői. Ezeken eddig a Tesla Model 3 tűnik a legkev&eacute;sb&eacute; szerencs&eacute;s t&iacute;pusnak: eddig a h&aacute;rom benevezett p&eacute;ld&aacute;nyb&oacute;l kettőt t&ouml;rtek &ouml;ssze &uacute;gy, hogy nem indulhat el a versenyen.</span></span></p>\r\n\r\n<hr />\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Times New Roman,Times,serif\"><img alt=\"\" src=\"news_image/1598541300_tesla.jpg\" style=\"float:left; height:409px; margin-left:10px; margin-right:10px; width:727px\" />&nbsp;Az egyik esetet siker&uuml;lt is r&ouml;gz&iacute;teni: Randy Pobst szab&aacute;lyosan bele&aacute;llt egy domboldalba, miut&aacute;n az aut&oacute;t az &uacute;t egy m&eacute;lyed&eacute;se &eacute;pp a kanyar előtt megdobta. Szemtan&uacute;k szerint egyszerűen elm&eacute;rte a temp&oacute;t, t&uacute;l gyorsan k&ouml;zel&iacute;tette meg a k&eacute;rd&eacute;ses kanyart. Ezzel egy&eacute;bk&eacute;nt az egyik komoly es&eacute;lyes&eacute;t vesztette el az idei futam: Pobst az Unplugged Performance Tesl&aacute;j&aacute;val az als&oacute; szakasz időm&eacute;rőj&eacute;n a legjobb időt futotta, 26 m&aacute;sodpercet verve minden m&aacute;s indul&oacute;ra. &Eacute;rdemes belen&eacute;zni, a temp&oacute; t&eacute;nyleg hajmeresztő. (Itt a sebess&eacute;gm&eacute;rő m&eacute;rf&ouml;ldben van, azaz a 60-as sz&aacute;m az 96 km/h-t, a sz&aacute;z meg 161 km/h-t jelent.)&nbsp;Egy m&aacute;sik, Model 3-mal indul&oacute; versenyző, a kezdő Josh Allen m&aacute;r kedden le&iacute;rta a saj&aacute;t aut&oacute;j&aacute;t, &iacute;gy a t&iacute;pusb&oacute;l m&aacute;r csak egy maradt, igaz, azt egy igaz&aacute;n rutinos pil&oacute;ta, Blake Fuller ir&aacute;ny&iacute;tja, aki 2016-ban a Tesla Model S-szel rekordot futott ugyanitt &ndash; rem&eacute;lhetőleg ő gond n&eacute;lk&uuml;l c&eacute;lba &eacute;r majd.</span></span></p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n', '1598541366_tesla.jpg'),
(60, 87, 'Drágán mérik a sportosságot a Peugeot-nál', '<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A Peugeot tett egy apr&oacute; tipeg&eacute;st a pr&eacute;miums&aacute;g fel&eacute;. Az &aacute;raz&aacute;ssal mindenk&eacute;pp, minden m&aacute;s meg ink&aacute;bb v&eacute;lem&eacute;nyes, mint objekt&iacute;v ugr&aacute;s a mezőnyből. De a magasra lőni akar&aacute;s nagyon &aacute;tj&ouml;n.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">Kezdj&uuml;k ott, hogy az sem lenne eretneks&eacute;g, ha t&eacute;nyleg elhinn&eacute;k magukr&oacute;l, hogy t&ouml;bbre hivatottak a k&ouml;z&eacute;pszerűs&eacute;gn&eacute;l. Mert nem az van, hogy p&eacute;ld&aacute;ul egy Toyota alkatilag k&eacute;ptelen a felső lig&aacute;ba aut&oacute;t gy&aacute;rtani. Megy nekik a Lexus kisujjb&oacute;l, ahogy a Nissannak az Infiniti, &eacute;s &iacute;gy tov&aacute;bb. A Peugeot &eacute;s a Mazda j&oacute;l tejelő alm&aacute;rk&aacute;k helyett viszont azt kezdt&eacute;k j&aacute;tszani, hogy kitolj&aacute;k a l&aacute;bukat a senki f&ouml;ldj&eacute;re, ahonnan a pr&eacute;miumok m&eacute;g galaxisnyi t&aacute;vols&aacute;gra vannak, de m&aacute;r nem fojtogatja őket annyira a k&ouml;z&eacute;p&aacute;ras t&ouml;meg.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"news_image/1598541619_peugeot.jpg\" style=\"float:left; height:452px; margin-left:10px; margin-right:10px; width:727px\" /><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A kis szabadidőaut&oacute;k zs&uacute;folt piac&aacute;n kitűnni t&eacute;nyleg neh&eacute;z, annyi a konkurens bel&aacute;that&oacute; t&aacute;vols&aacute;gra:&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2017%2F12%2F22%2Fseat_arona_1.0_tsi_-_2017.%2F\" id=\"hyperlink_6c59e844c652aed9fd40ccac6dbe80a8\" target=\"_self\">Seat Arona</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2020%2F04%2F20%2Fford_puma_1_0t_125_le_mhev_titanium_x_2020%2F\" id=\"hyperlink_b8f5740b8eb731f7706bbcfa62d9d692\" target=\"_self\">Ford Puma</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2020%2F03%2F12%2Frenault_captur_tce_130_dpf_dct_intense%2F\" id=\"hyperlink_f96ec9716f136f6bdc0300f18f276868\" target=\"_self\">Renault Captur</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2017%2F05%2F22%2Fopel_crossland_x_2017_bemutato%2F\" id=\"hyperlink_2c9a94235cdf89a4e9bd5b0d1c493a1a\" target=\"_self\">Opel Crossland X</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2019%2F11%2F05%2Fbemutato_nissan_juke_2019%2F\" id=\"hyperlink_880074dda8c739d7010ea34e75afa341\" target=\"_self\">Nissan Juke</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2018%2F04%2F16%2Fvolkswagen_t-roc_1_5_tsi_act_2018%2F\" id=\"hyperlink_2ecb7888d1145472bd2e472fb9eb656f\" target=\"_self\">Volkswagen T-Roc</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2020%2F02%2F05%2Fskoda_kamiq_style_1_5_tsi_dsg_act%2F\" id=\"hyperlink_355ad0c963b158551bb44e6158defedb\" target=\"_self\">Skoda Kamiq</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2020%2F02%2F24%2Fmegerkeztek_az_uj_suzuki_hibridek%2F\" id=\"hyperlink_6f5b1e7c11f5c1073c31338f88ecb7dc\" target=\"_self\">Suzuki SX4 S-Cross</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2017%2F01%2F30%2Ftoyota_c-hr_2017%2F\" id=\"hyperlink_cd6b96316e8f6ce5cf3ab18308e85009\" target=\"_self\">Toyota CH-R</a>,&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2018%2F11%2F06%2Fmazda_cx3%2F\" id=\"hyperlink_4546e7b1c113ef956e5753801ae81b22\" target=\"_self\">Mazda CX-3</a>... &Eacute;s akkor az olyan f&eacute;l m&eacute;rettel kisebb tov&aacute;bbi &ouml;tajt&oacute;sokr&oacute;l, mint p&eacute;ld&aacute;ul a Mokka vagy a T-Cross m&eacute;g nem is besz&eacute;lt&uuml;nk, pedig a v&aacute;s&aacute;rl&oacute;k java nem felt&eacute;tlen colstokkal megy a szalonba. A 2008 egyszerre menek&uuml;l innen &aacute;rban, m&eacute;retben &eacute;s formavil&aacute;gban messzire &ndash; előbbiekben felfel&eacute;, a diz&aacute;jn meg ugye csak szimpl&aacute;n nagyon mell&eacute; lett lőve b&aacute;rminek. B&aacute;r ezzel m&eacute;g csak nincs is egyed&uuml;l errefel&eacute;.&nbsp;Val&oacute;j&aacute;ban hossz&uacute; &eacute;vek &oacute;ta megy ez a&nbsp;<em>csin&aacute;ljunk boh&oacute;cot a crossover&uuml;nkből</em>-t&eacute;ma. A CH-R &eacute;s a Juke tervezői kaphatt&aacute;k messze a legt&ouml;bb LSD-t a feladathoz, de a Pum&aacute;&eacute; sem ak&aacute;rmilyen forma lett, a Capturnek pedig sz&uuml;let&eacute;se &oacute;ta fontos st&iacute;lusjegye, hogy ő a kateg&oacute;ria bolondja. J&oacute; ideje nem az van itt, hogy el&eacute;g a sz&aacute;mokban kifejezhető param&eacute;tereket hozni, &eacute;s van egy aut&oacute;d erre a szegmensre is. A Peugeot is meg&eacute;rezte, hogy v&aacute;ltoznak idők &eacute;s ig&eacute;nyek, &iacute;gy m&eacute;g ha a 2008 nagyon szolid sr&aacute;c is volt&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2013%2F09%2F23%2Fa_fogyasztasa_kene%2F\" id=\"hyperlink_00788a5d0320b5ce49f5c0e8a4a771ed\" target=\"_self\">eddig</a>, a gener&aacute;ci&oacute;v&aacute;lt&aacute;ssal nem vette fel a &ndash; szint&eacute;n nem szolid &ndash; egyenpof&aacute;t, hanem olyan tagolt lett a k&eacute;pe, hogy t&ouml;bb rajta a fekete r&aacute;cs, mint a f&eacute;nyezett idom. &Eacute;s ez sem volt el&eacute;g: erre a kis orra m&eacute;g r&aacute;tett&eacute;k azokat a f&uuml;ggőleges ledcs&iacute;kokat, amiről most az a marketingduma, hogy olyanok, mintha egy oroszl&aacute;n karmolta volna oda őket.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"news_image/1598541749_peugeot2.jpg\" style=\"float:left; height:454px; margin-left:10px; margin-right:10px; width:727px\" /><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A tesztaut&oacute; maga egy GT. Kicsit zavaros mostans&aacute;g, ahogy a m&aacute;rk&aacute;n&aacute;l ezzel a k&eacute;t betűvel b&aacute;nnak, mert a konfigur&aacute;torukban a 136 lovas villanyos is GT-k&eacute;nt fut, n&eacute;hol meg&nbsp;<em>e-GT</em>-k&eacute;nt. &Eacute;s akkor ott vannak m&eacute;g ugye a GT Line-ok, amik k&uuml;lsőre szint&eacute;n ilyenek, mint ez a 155 lovas benzines GT, csak kicsit szer&eacute;nyebb a felszerelts&eacute;g&uuml;k, &eacute;s ott a 130 l&oacute;erő a cs&uacute;cs. A legegyszerűbben tal&aacute;n &uacute;gy lehet besorolni őket rendszertanilag, hogy minden, aminek a nev&eacute;ben valamennyire ott a GT a 2008-n&aacute;l, ann&aacute;l az oszlopokkal egy&uuml;tt a tető is full fekete. K&uuml;lsőre nagyj&aacute;b&oacute;l ennyi, meg m&eacute;g esetleg szemet b&ouml;khet, hogy a cs&uacute;csbenzines GT-vel van dolgunk, ha ezeken a 18-as felniken &aacute;ll, ugyanis az is sz&eacute;ria a csomagban.&nbsp;Form&aacute;ra n&aacute;lam most magasan az&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2018%2F06%2F14%2Fmenetproba_peugeot_508_2018%2F\" id=\"hyperlink_45fb161e25b8260c40166c4f3fc4d675\" target=\"_self\">508</a>&nbsp;a cs&uacute;cs-Peugeot, az &ouml;sszes t&ouml;bbi bent vesz meg. Ez az i-Cockpit valami&eacute;rt minden m&eacute;retben műk&ouml;dik, pedig m&aacute;r annyit vari&aacute;lt&aacute;k, ahogy v&eacute;gigj&aacute;rta a modellk&iacute;n&aacute;latot, de nem b&iacute;rj&aacute;k elrontani.</span></span></p>\r\n', '1598541874_peugeot3.jpg'),
(61, 88, 'Porsche Panamera Modellfrissítés Statikus Bemutató - 2020', '<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A telefonokat nem kobozt&aacute;k el, de a Porsche PR-ese kis matric&aacute;kkal ragasztotta le a kamer&aacute;k ny&iacute;l&aacute;sait. Val&oacute;sz&iacute;nűleg nem csin&aacute;lt m&eacute;g ilyet, mert &eacute;n sz&oacute;ltam neki, hogy a harmadik kis k&ouml;r is kamera, a negyedik pedig a vaku, azt m&aacute;r nem kell leragasztani.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"news_image/1598543092_porsche.jpg\" style=\"height:545px; width:727px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">Sz&eacute;p lett a h&aacute;tlap, &eacute;s mire kigy&ouml;ny&ouml;rk&ouml;dtem magam az &uacute;j matric&aacute;imban, eszembe jutott, hogy 2020 l&eacute;v&eacute;n frontkamera is van m&aacute;r minden telefonban. Erről viszont m&aacute;r nem sz&oacute;ltam. Nem mintha k&eacute;mkedni akartam volna, ink&aacute;bb hogy az&eacute;rt teljesen m&eacute;gse bolonduljunk meg: a Porsche Panamera m&aacute;sodik gener&aacute;ci&oacute;j&aacute;nak (G2) f&eacute;lidős&nbsp;<em>modellfriss&iacute;t&eacute;s&eacute;n</em>&nbsp;vagyunk. A r&aacute;ncfelvarr&aacute;son. A facelift kellős k&ouml;zep&eacute;ben. M&eacute;gis mi az any&aacute;nk k&iacute;nj&aacute;t tudn&aacute;nk egy&aacute;ltal&aacute;n f&eacute;nyk&eacute;pezni?!</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"news_image/1598543181_porsche2.jpg\" style=\"float:left; height:545px; margin-left:10px; margin-right:10px; width:727px\" /><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">Ilyenben m&eacute;g nem volt r&eacute;szem. J&uacute;lius 30-&aacute;t &iacute;rtunk, a hajnali munk&aacute;sg&eacute;ppel &eacute;rkezt&uuml;nk Stuttgartba egy frankfurti &aacute;tsz&aacute;ll&aacute;s ut&aacute;n, a rept&eacute;rről azzal a&nbsp;<a href=\"https://dex.hu/x.php?id=totalcar_tesztek_cikklink&amp;url=https%3A%2F%2Ftotalcar.hu%2Ftesztek%2F2020%2F08%2F13%2Fporsche_cayenne_gts%2F\" id=\"hyperlink_34329ff2ce3de1dbd43293e97b775380\">Cayenne GTS Coup&eacute;val</a>, aminek augusztus 13-&aacute;n jelent meg a tesztje. A naviba beprogramozt&aacute;k az &uacute;ti c&eacute;lt, ami a v&aacute;rakoz&aacute;soknak megfelelően egy nagy, modern betonkocka fot&oacute;st&uacute;di&oacute;nak bizonyult. A műterem r&eacute;szbe csak chipk&aacute;rty&aacute;val lehetett bejutni, sz&oacute;val k&eacute;m legyen a talp&aacute;n, aki egy&aacute;ltal&aacute;n r&aacute;j&ouml;n, mit kell itt egy&aacute;ltal&aacute;n kik&eacute;mlelni. Egy fot&oacute;s a ki&aacute;ll&iacute;tott Panamer&aacute;kat f&eacute;nyk&eacute;pezte r&aacute;&eacute;rősen, Mario Grellmann, a villamoss&aacute;g &eacute;s elektronika felelőse, Arno B&ouml;gl, a hajt&aacute;sl&aacute;nc fejlesztője, &eacute;s Oliver Grandel, projektigazgat&oacute; &aacute;lltak sz&iacute;ves rendelkez&eacute;s&uuml;nkre.&nbsp;B&aacute;r a megh&iacute;v&oacute;ban is fontos t&eacute;tel volt, itt is majdnem mindenki figyelmeztetett, hogy az anyag augusztus 26-ig embarg&oacute;s, vagyis nem szabad publik&aacute;lni. Az egyszerűs&eacute;g kedv&eacute;&eacute;rt az &oacute;r&aacute;t &eacute;s percet is megszabt&aacute;k, nehogy valaki egy &eacute;jf&eacute;li &eacute;les&iacute;t&eacute;ssel szerezzen jogosulatlan előnyt a baglyok k&ouml;z&ouml;tt.</span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n', '1598543293_porsche3.jpg'),
(62, 89, 'Egész kis motort kap a hibrid Kia Sorento', '<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A Kia most r&eacute;szletezte elősz&ouml;r, hogy mi ker&uuml;l a Sorento konnektoros hibrid v&aacute;ltozat&aacute;ba. A r&ouml;vid t&aacute;von villanyaut&oacute;k&eacute;nt is haszn&aacute;lhat&oacute; modellt egy 1,6 literes turb&oacute;motor &eacute;s egy villanymotor hajtja, &ouml;sszesen ak&aacute;r 265 l&oacute;erővel.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\"><img alt=\"\" src=\"news_image/1598543428_kia.jpg\" style=\"float:left; height:410px; margin-left:10px; margin-right:10px; width:727px\" />&nbsp;A k&eacute;t motort hatfokozat&uacute; automata v&aacute;lt&oacute; kapcsolja &ouml;ssze. A villanymotor cs&uacute;csteljes&iacute;tm&eacute;nye &ouml;nmag&aacute;ban 91 l&oacute;erő, m&iacute;g az 1,6 literes turb&oacute;felt&ouml;ltős benzines, amelyet eddig elsősorban sokkal kisebb szem&eacute;lyaut&oacute;kban alkalmaztak, 180 l&oacute;erőt adhat le. Az akkumul&aacute;tor folyad&eacute;khűt&eacute;ses Li-ion csomag, 13,8 kWh kapacit&aacute;ssal, ami a becsl&eacute;sek szerint &uacute;gy &ouml;tven kilom&eacute;ter megt&eacute;tel&eacute;re lesz elegendő.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">Az &uacute;j konnektoros hibrid Sorento csak j&ouml;vőre &eacute;rkezik a keresked&eacute;sekbe, &eacute;s m&eacute;g &aacute;t sem esett teljesen a t&iacute;pusvizsg&aacute;hoz kapcsol&oacute;d&oacute; m&eacute;r&eacute;seken &eacute;s vizsg&aacute;latokon. Val&oacute;sz&iacute;nűleg ez&eacute;rt nem is k&ouml;z&ouml;lte a gy&aacute;rt&oacute; a fogyaszt&aacute;si, &eacute;s a pontosabb hat&oacute;t&aacute;v-adatokat, ahogy azt sem, hogy a nagy bat&aacute;rt hogy mozgatja a kis motor elektromos seg&iacute;ts&eacute;ggel &ndash; minderre v&aacute;rhat&oacute;an a j&ouml;vő &eacute;v elej&eacute;n, a forgalmaz&aacute;s elind&iacute;t&aacute;sa idej&eacute;n der&uuml;lhet f&eacute;ny.</span></span></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\"><img alt=\"\" src=\"news_image/1598543503_kia2.jpg\" style=\"height:410px; width:727px\" /></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:18px\">A t&iacute;pus egy&eacute;bk&eacute;nt addig 2,2 literes, 200 l&oacute;erős d&iacute;zelmotorral, illetve egyes piacokon szint&eacute;n 1,6 literes, de &ouml;nt&ouml;ltő, 230 l&oacute;erős hibridhajt&aacute;ssal lesz el&eacute;rhető.</span></span></p>\r\n', '1598543539_kia2.jpg');

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
  `user_usertype` varchar(255) NOT NULL DEFAULT 'user',
  `user_telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `user_first`, `user_last`, `user_email`, `user_pwd`, `user_usertype`, `user_telephone`) VALUES
(8, 'epernorbert', 'Eper', 'Norbert', 'epernorbert@gmail.com', '$2y$10$eLbxIxDJcn97szwN..9ezerjep.nZLqaJZoWLhJTlyW7YgWRTrXPm', 'admin', 12345678),
(43, 'bazsogabor', 'Bazso', 'Gabor', 'bazsogabor@gmail.com', '$2y$10$ZAstBesbklDjitAxd1ze3uvL5kt09rdaa5L0Po1yME9HchJ/0qcCm', 'writer', 125478547),
(44, 'draskovics', 'Draskovics', 'Andras', 'draskovicsandras@gmail.com', '$2y$10$PRixZYwJmeMdhwefaDeO/.ALp9y.YeRxSNEsHXQ9Qi6kNwZBXDK/y', 'writer', 25874589),
(50, 'elso', 'Elso', 'Elso', 'elso@gmail.com', '$2y$10$PvNoQC8LWl3Hol6j.fOZn.sxD95tc0KzH1U7LwdmhhWvzblIxqrZu', 'user', 1458745),
(51, 'masodik', 'Masodik', 'Masodik', 'masodik@gmail.com', '$2y$10$41zophelH/6ns.5g3jv.h.QBfS29SyI5tRjz1U5TbVXDmcjtQ.eqe', 'user', 12569874),
(52, 'harmadik', 'Harmadik', 'Harmadik', 'harmadik@gmail.com', '$2y$10$wO6rmIO.fY6qfR2rPKJtyuX0UTPgep76zRwxoo0uuIcj2N.njrgwG', 'user', 12555478),
(53, 'negyedik', 'Negyedik', 'Negyedik', 'negyedik@gmail.com', '$2y$10$Rh.rvQ06gg/WeDzJDGiLUeDAtyxL.meQMmAmRkH6k0h/IWhRqsLLu', 'user', 12569854),
(54, 'otodik', 'Otodik', 'Otodik', 'otodik@gmail.com', '$2y$10$VkLZxLg5HsMJ.65vXE7y3Oj/pokk3nkzGvEU/DWG8slovSNGMBWeG', 'user', 785589462),
(55, 'hatodik', 'Hatodik', 'Hatodik', 'hatodik@gmail.com', '$2y$10$4wXWNKBOdpciRcM8D4FZPu4dSlKHUE/dhCso9eeRf1C2G5YLZnksi', 'user', 555444879),
(56, 'hetedik', 'Hetedik', 'Hetedik', 'hetedik@gmail.com', '$2y$10$iCT1Pxkxyd2e2FAE6oxXZ.pcTTZN97xKuOS7lzou1EXCio2hBK.Li', 'user', 85479651),
(57, 'nyolcadik', 'Nyolcadik', 'Nyolcadik', 'nyolcadik@gmail.com', '$2y$10$R26UPjENKu2.41fi8bJ4pO9ME4YU6nDvgeaXGu1pQaPWv6W4Q3/te', 'user', 854785698),
(58, 'kilencedik', 'Kilencedik', 'Kilencedik', 'kilencedik@gmail.com', '$2y$10$C8EKv5vCBOhKjU/QgQK76O2gRcYx30SxXdr8A/mwY5YOZJifX3S6G', 'user', 854785412),
(59, 'tizedik', 'Tizedik', 'Tizedik', 'tizedik@gmail.com', '$2y$10$VhpKh.HHsbkknFL8D4LrpuvBC3j0eGqVNnDhJCHkN42SBPFeOdHtW', 'user', 859595478),
(60, 'tizenegy', 'Tizenegy', 'Tizenegy', 'tizenegy@gmail.com', '$2y$10$sNfFeNLpWOh832g4hSF3M.yusDmqjsczeZUc9nPKRRkoJF2NgoF5C', 'user', 259841265),
(61, 'tizenketto', 'Tizenketto', 'Tizenketto', 'tizenketto@gmail.com', '$2y$10$pd.BSUtV5hQSIK1Xdss9meYDRR74FB1eyv3pD1B54IaUP/4GrrkjO', 'user', 12647),
(62, 'tizenharom', 'tizenharom', 'tizenharom', 'tizenharom@gmail.com', '$2y$10$m4GCuOUWhPbFvYeb/SYbpudeT/Z6b/ugKUm63gW3eKy0fVdne5IIC', 'user', 1234567),
(81, 'tizenot', 'Tizenot', 'Tizenot', 'tizenot@gmail.com', '$2y$10$UFALZ9g01AKaTwAuRl80o.apXy9Y/foYG9mimZIfv3QqhijLmx3ua', 'user', 23658947),
(82, 'tizenhat', 'Tizenhat', 'Tizenhatt', 'tizenhar@gmail.com', '$2y$10$anJyoDHD8B7ufixkfp.VwOYWiILHTZBeR9N5iv3vM5NyvdJmFAA62', 'user', 55589658),
(83, 'tizenhet', 'Tizenhet', 'Tizenhet', 'tizenhet@gmail.com', '$2y$10$5pjA/CoDfTkW39JwbXOdkudZvWqPxMVo45.Qq5Ssadmcmt2ki1lXW', 'user', 888479541),
(85, 'elsoUjsagiro', 'elsoUjsagiro', 'elsoUjsagiro', 'elsoUjsagiro@gmail.com', '$2y$10$8QX1.HZ52ZsmaG1irYKC1.pJFxLl4jjC0LyzM8jTQlQLslv7ceZg.', 'writer', 12321312),
(86, 'masodikUjsagiro', 'masodikUjsagiro', 'masodikUjsagiro', 'masodikUjsagiro@gmail.com', '$2y$10$Hm8282gQP6XzLuCrVVvlFOMZQe.IFPtYfuKx6NTJgPrGCTlyYF0gS', 'writer', 213123),
(87, 'harmadikUjsagiro', 'harmadikUjsagiro', 'harmadikUjsagiro', 'harmadikUjsagiro@gmail.com', '$2y$10$SxJSk..62xXHqdyssivAVunIyd65IEGK0dvURv3cDrju.uBrnPiTS', 'writer', 43543543),
(88, 'negyedikUjsagiro', 'negyedikUjsagiro', 'negyedikUjsagiro', 'negyedikUjsagiro@gmail.com', '$2y$10$5FF5CVmBIHL7nNH7ZQ7IrOJyWf9D2S95LVO3S.Ep3wWx/eGSDO.PO', 'writer', 345435435),
(89, 'otodikUjsagiro', 'otodikUjsagiro', 'otodikUjsagiro', 'otodikUjsagiro@gmail.com', '$2y$10$hkANOERfPxJXDdcVv3QUD.byn1bBrHvN747OA9cnyauRAVs9q8Pwi', 'writer', 2147483647),
(90, 'tizennyolc', 'Tizennyolc', 'Tizennyolc', 'tizennyolc@gmail.com', '$2y$10$Q9RF9gQ8e0fYQwbbMnnZO.9jA8Zq4J7TmmNE5Aeaz9WHNHs6EejoW', 'user', 1561561561);

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
-- A tábla indexei `car_extras`
--
ALTER TABLE `car_extras`
  ADD KEY `car_id` (`car_id`);

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
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT a táblához `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `car_images`
--
ALTER TABLE `car_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2202;

--
-- AUTO_INCREMENT a táblához `car_type`
--
ALTER TABLE `car_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `car_extras`
--
ALTER TABLE `car_extras`
  ADD CONSTRAINT `car_extras_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
