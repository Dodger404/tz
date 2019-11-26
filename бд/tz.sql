-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 26 2019 г., 13:31
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tz_uzers`
--

CREATE TABLE `tz_uzers` (
  `tz_id` int(11) NOT NULL,
  `tz_login` varchar(150) NOT NULL,
  `tz_pass` varchar(150) NOT NULL,
  `tz_email` varchar(150) NOT NULL,
  `tz_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tz_uzers`
--

INSERT INTO `tz_uzers` (`tz_id`, `tz_login`, `tz_pass`, `tz_email`, `tz_status`) VALUES
(1, 'admin', '111', 'tz@em.ail', 1),
(2, 'user', 'pass', 'em@a.il', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tz_uzers`
--
ALTER TABLE `tz_uzers`
  ADD PRIMARY KEY (`tz_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tz_uzers`
--
ALTER TABLE `tz_uzers`
  MODIFY `tz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
