-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Máj 26. 19:42
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
(41, 'volkswagen', 'golf 5', 2007, 4000, 'Dizel', 1900, 105, '5ec64edc30fbe6.34808155.jpg', '5ec64edc31f995.61052596.jpg', '5ec64edc333bf0.51120663.jpg', '5ec64edc3427e2.42809421.jpg', '5ec64edc354cf8.91561826.jpg', 134);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`news_id`, `user_id`, `news_title`, `news_text`) VALUES
(44, 44, 'Harmadik hir.', '<p>jsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf <strong>hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs </strong>hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweak<img alt=\"\" src=\"news_image/passat_3.jpg\" style=\"float:right; height:150px; width:200px\" />jfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf h<img alt=\"\" src=\"news_image/passat_2.jpg\" style=\"float:left; height:138px; width:200px\" />wjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda hfjsahdfkjsdhf kjsdhaf kjshadf kjsdahf jklhwk3flweklfnsdakjf hwjekfnjksdanfkjsdahfkjsdhfjkwekhfjs hjkewfhjkshfakjhsadjkfhsjkfhjkwhwjekfhlkajwhfjklweakjfhdkjhfsdkjhsdakjhfkjlksda&nbsp;</p>\r\n');

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
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT a táblához `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
