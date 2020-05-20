-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 20. 21:35
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
  `kep` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `image_4` varchar(255) NOT NULL,
  `image_5` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `cars`
--

INSERT INTO `cars` (`user_id`, `marka`, `tipus`, `évjárat`, `ar`, `uzemanyag`, `kobcenti`, `loero`, `kep`, `image_2`, `image_3`, `image_4`, `image_5`, `car_id`) VALUES
(40, 'Volkswagen', 'Golf 5', 2008, 3900, 'Dizel', 1900, 105, '5ebaa880dc0a26.28674246.jpg', '5ebaa880dcf305.40863376.jpg', '5ebaa880de1444.61850469.jpg', '5ebaa880dee562.95121769.jpg', '5ebaa880df9f10.43710581.jpg', 131),
(41, 'volkswagen', 'passat', 2011, 10000, 'Dizel', 2000, 140, '5ec5357b9ba059.19895341.jpg', '5ec5357b9c5fa6.12820048.jpg', '5ec5357b9d0bc6.61673109.jpg', '5ec5357b9db869.88537896.jpg', '5ec5357b9e77c3.60488497.jpg', 133);

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
(2, 43, 'Random szalagcím.', 'Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. Random szöveg. ', 'randomkep.jpg'),
(4, 44, 'Tesla a kiraly.', 'Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. Tesla. ', 'tesla.jpg');

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
(40, 'eperrobert', 'Eper', 'Robert', 'eperrobert@gmail.com', '$2y$10$71Mhnr2R5QbawzClG3uPK.l6vsfuqJW67f1owZh4vum.U40pHnNUS', 'user'),
(41, 'eperdavid', 'Eper', 'David', 'eperdavid@gmail.com', '$2y$10$eEkWEdEGs8kH6RAmg1O9QOdEvbM0S6iwOaZN.zUACd.atbr04Yyfy', 'user'),
(43, 'bazsogabor', 'Bazso', 'Gabor', 'bazsogabor@gmail.com', '$2y$10$ZAstBesbklDjitAxd1ze3uvL5kt09rdaa5L0Po1yME9HchJ/0qcCm', 'writer'),
(44, 'draskovics', 'Draskovics', 'Andras', 'draskovicsandras@gmail.com', '$2y$10$PRixZYwJmeMdhwefaDeO/.ALp9y.YeRxSNEsHXQ9Qi6kNwZBXDK/y', 'writer');

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
-- A tábla indexei `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`);

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
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
